<tr>
  <td>{{ $row->id }}</td>
  <td>
    @if ($row->getImage())
      <img src="{{ $row->getImage() }}" style="max-width: 68px" class="img-fluid">
    @else
      <small class="text-muted">(нету логотипа)</ы>
    @endif
  </td>
  <td>{{ $row->flight }}</td>
  <td>{{ $row->countChairs() }}</td>
  <td class="text-capitalize">{{ $row->getFullDate() }}</td>
  <td>
    @include('dashboard.flights.partials.action-buttons', ['id' => $row->id])
  </td>
</tr>
