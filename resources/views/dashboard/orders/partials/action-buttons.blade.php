<nobr>
  <a class="btn btn-xs btn-default text-primary mx-1 shadow"
    href="{{ route('dashboard.orders.edit', ['order' => $id]) }}" title="Edit">
    <i class="fa fa-lg fa-fw fa-pen"></i>
  </a>
  @if ($order->isTicketsExist())
    <a class="btn btn-xs btn-default text-primary mx-1 shadow" title="Распечатать билеты"
      href="{{ route('dashboard.order.tickets.pdf', ['order' => $id]) }}">
      <i class="fa fa-lg fa-fw fa-print"></i>
    </a>
    <a class="btn btn-xs btn-default text-primary mx-1 shadow" title="Выслать на емеил билеты"
      href="{{ route('dashboard.order.tickets.pdf.email', ['order' => $id]) }}">
      <i class="fa fa-lg fa-fw fa-envelope"></i>
    </a>
  @endif

</nobr>
