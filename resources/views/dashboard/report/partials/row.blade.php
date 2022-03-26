<tr>
  <td>{{ $ticket->updated_at->format('Y-m-d H:i') }}</td>

  <td>
    <a href="?name={{ $ticket->name }}">{{ $ticket->name }}</a>
  </td>

  <td>
    @include('dashboard.report.partials.ticket-modal')
  </td>

  <td>{{ $flight = $ticket->booking->flight->getSummary() }}</td>

  <td>
    <a href="{{ route('dashboard.orders.show', ['order' => ($orderID = $ticket->booking->order->first()->id)]) }}">
      {{ $orderID }}
    </a>
  </td>

  <td>
    <a href="{{ route('dashboard.tickets.show', ['ticket' => $ticket->id]) }}">
      {{ $ticket->id }}
    </a>
  </td>

  <td>{{ $ticket->type }}</td>

  <td>{{ number_format($ticket->price, 2, '.', ' ') }}</td>
</tr>
