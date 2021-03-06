@php
$user_link = '?user_id=' . $ticket->user?->id;

if (request('from') || request('to')) {
    $user_link .= "&from=$from&to=$to";
}
@endphp

<tr>
  <td>{{ $ticket->updated_at }}</td>

  <td>
    <a href="{{ $user_link }}">{{ $ticket->user?->name }}</a>
  </td>

  <td>
    @include('dashboard.report.partials.ticket-modal')
  </td>

  <td>
    <a href="{{ route('dashboard.flights.show', ['flight' => $ticket->booking->flight->id]) }}">
      {{ $flight = $ticket->booking->flight->getSummary() }}
    </a>
  </td>

  <td>
    <a href="{{ route('dashboard.orders.show', ['order' => ($orderID = $ticket->booking->order->first()->uuid)]) }}">
      {{ $orderID }}
    </a>
    @if ($ticket->booking->order->first()->payed_by_deposit)
      <span class="badge bg-warning">DEPOSIT</span>
    @endif
  </td>

  <td>
    <a href="{{ route('dashboard.tickets.show', ['ticket' => $ticket->uuid]) }}">
      {{ $ticket->uuid }}
    </a>
  </td>

  <td>{{ $ticket->type }}</td>

  <td>{{ number_format($ticket->price, 2, '.', ' ') }}</td>
</tr>
