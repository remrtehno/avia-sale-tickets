<tr>
  <td>{{ $row->uuid }}</td>
  <td>
    <a target="_blank" href="{{ route('dashboard.flights.edit', ['flight' => $row->flight?->id ?: 0]) }}">
      <i class="fa fa-xs fa-fw fa-external-link-alt"></i>
      {{ $row->flight?->flight }}
      <br>
      {{ $row->flight?->getDate() }}
    </a>
  </td>
  <td>UZS {{ $row->getTotalFormatted() }}</td>
  <td>{{ $row->created_at }}</td>
  <td>
    @include('dashboard.partials.status', ['status' => $row->status])
    <div></div>
    @if ($row->payed_by_deposit)
      <small class="badge bg-warning">DEPOSIT</small>
      <div></div>
      <small>{{ $row->user->getSummary() }}</small>
    @endif

  </td>
  <td>
    <div class="alert alert-warning p-1 m-0">
      @if ($row->booking)
        @foreach ($row->booking->tickets as $key => $ticket)
          <a class="btn btn-xs btn-default text-primary mx-1 shadow btn"
            href="{{ route('dashboard.tickets.edit', ['ticket' => $ticket->uuid]) }}" title="Edit">
            <i class="fas fa-pen-square"></i>
            {{ $key + 1 }} {{ $ticket->type }}
          </a>
        @endforeach
      @elseif($row->is_returned)
        <small class="d-block">
          Места вернул пользователь
          <br> {{ $row->count_chairs }}. шт -
          {{ $row->getUserReturned()->name }}
          {{ $row->getUserReturned()->email }}

        </small>
      @else
        <small class="d-block">
          Места проданы пользователю
          <br> {{ $row->count_chairs }}. шт -
          {{ $row->chairs->first()?->user?->name }}
          {{ $row->chairs->first()?->user?->email }}
        </small>
      @endif
    </div>
  </td>
  <td>
    @include('dashboard.orders.partials.action-buttons', [
        'id' => $row->uuid ?: 1,
        'order' => $row,
    ])
  </td>
</tr>
