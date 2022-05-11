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
    {{ $item->flight->flight }}
  </td>
  <td>
    {{ $item->uuid }}
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
