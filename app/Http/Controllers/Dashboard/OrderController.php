<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Mail\TicketMarkDown;
use App\Models\Order;
use App\Models\ReturnAssignedChairs;
use App\Services\OrderService;
use App\Services\PDFService;
use App\Services\EmailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;

class OrderController extends Controller
{
    private $service;
    private $PDFService;
    private $emailService;

    function __construct(OrderService $orderService, PDFService $PDFService, EmailService $emailService)
    {
        $this->service = $orderService;
        $this->PDFService = $PDFService;
        $this->emailService = $emailService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Order $order)
    {

        $orders = $order->getOrders();

        return view('dashboard.orders.index', [
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('dashboard.orders.show', [
            'orders' => [$order]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('dashboard.orders.edit', [
            'order' => $order
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $validated = $request->validated();
        $order->changeStatus($validated['status']);

        return redirect()->route('dashboard.orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }



    public function returnToOwner(Request $request, Order $order)
    {
        $flight = $order->flight;

        if ($request->count_chairs > $flight->getChairs()->count() or $request->count_chairs < 1) {
            return back()->withErrors(['count_chairs' => 'Не верное кол-во мест']);
        }
        $user_id = Auth::user()->id;
        $returnChairs = ReturnAssignedChairs::where('owner_id', $user_id)->where('flight_id', $flight->id)->get();

        $countReturnedChairs = $returnChairs->reduce(function ($sum, $flight) {
            return $sum + $flight->count_chairs;
        });

        $totalCountReturnedChairs = $request->count_chairs + $countReturnedChairs;

        if ($totalCountReturnedChairs > $flight->getChairs()->count()) {
            return back()->withErrors(['count_chairs' => 'Вы уже вернули максимальное количество или укажите меньшее кол-во']);
        }

        $this->service->createNotificationReturnChairs($flight->user_id, $request->count_chairs, $flight->id, $order->id);

        return back();
    }


    public function paymoCallback(Request $request)
    {
        $order = Order::where('uuid', $request->invoice)->firstOrFail();

        if (!$order->canBePayed()) {
            return response()->json(['status' => '0', 'message' => 'Срок брони истек']);
        }

        if (number_format($order->total, 2, '', '') === $request->amount) {
            $order->changeStatus(Order::PAID);

            if ($order->save()) {
                return response()->json(['status' => '1', 'message' => 'Успешно']);
            }
        }

        return response()->json(['status' => '0', 'message' => 'Инвойс не существует или не верная сумма']);
    }

    public function gerateTicketsPDF(Request $request, Order $order)
    {
        return Response::make($this->PDFService->generatePDFFromOrder($order), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="pdf.file"'
        ]);
    }

    public function emailTickets(Request $request, Order $order)
    {
        $emailCollection = $order->booking->tickets->filter(function ($ticket) use ($order) {
            return $ticket->email && !$order->booking->tickets->has($ticket->email);
        })->map(function ($ticket) {
            return $ticket->email;
        });

        $data['from'] = $order->seller->email;
        $data["title"] = "Билеты на рейс {$order->booking->flight->flight}";
        $data["body"] = "Ваши билеты";
        $data['file'] = $this->PDFService->generatePDFFromOrder($order);
        $data['flight'] = $order->booking->flight;
        $data['subject'] = 'Ваши билеты на рейс ' . $data['flight']->flight;

        $this->emailService->sendTicketsByOrder($emailCollection, $data);

        $request->session()->put(['emailCollection' => $emailCollection]);

        return redirect()->route('dashboard.order.tickets.pdf.email.success');
    }
}
