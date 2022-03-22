<tr>
  <td>{{ $row->id }}</td>
  <td>
    <a target="_blank" href="{{ route('dashboard.flights.edit', ['flight' => $row->flight->id]) }}">
      <i class="fa fa-xs fa-fw fa-external-link-alt"></i>
      {{ $row->flight->flight }}
      <br>
      {{ $row->flight->getDate() }}
    </a>
  </td>
  <td>UZS {{ $row->getTotalFormatted() }}</td>
  <td>{{ $row->created_at }}</td>
  <td>
    @include('dashboard.partials.status', ['status' => $row->status])
  </td>
  <td>
    <div class="alert alert-warning p-1 m-0">
      @if ($row->booking)
        @foreach ($row->booking->tickets as $key => $ticket)
          <a class="btn btn-xs btn-default text-primary mx-1 shadow btn"
            href="{{ route('dashboard.tickets.edit', ['ticket' => $ticket->id]) }}" title="Edit">
            <i class="fas fa-pen-square"></i>
            {{ $key + 1 }} {{ $ticket->type }}
          </a>
        @endforeach
      @else
        <small class="d-block">
          продано пользователю <br> {{ $row->chairs->count() }}. шт -
          {{ $row->chairs->first()?->user?->name }}
          {{ $row->chairs->first()?->user?->email }}
        </small>
      @endif
    </div>
  </td>
  <td>
    @include('dashboard.orders.partials.action-buttons', [
        'id' => $row->id,
    ])
  </td>
</tr>
