<tr>
  <td>
    {{ $item->created_at }}
  </td>
  <td>
    @php
      $user_link = '?user_id=' . $item->user?->id;
      
      if (request('from') || request('to')) {
          $user_link .= "&from=$from&to=$to";
      }
    @endphp
    <a href="{{ $user_link }}">{{ $item->user?->name }}</a>
  </td>
  <td>
    N/A
  </td>
  <td>
    <a href="{{ route('dashboard.flights.show', ['flight' => $item->flight->id]) }}">
      {{ $item->flight->getSummary() }}
    </a>
  </td>
  <td>
    <a href="{{ route('dashboard.orders.show', ['order' => $item->uuid ?: 0]) }}">
      {{ $item->uuid }}
    </a>
  </td>
  <td>
    N/A
  </td>
  <td>
    N/A
  </td>
  <td>
    <div>
      <b>{{ $item->count_chairs }} кресел</b>
    </div>
    {{ $item->getTotalFormatted() }} сум
  </td>
</tr>
