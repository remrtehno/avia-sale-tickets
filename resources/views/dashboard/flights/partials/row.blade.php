<tr>
  <td>{{ $row->id }}</td>
  <td><img src="{{ $row->getImage() }}" class="img-fluid"></td>
  <td>{{ $row->flight }}</td>
  <td>{{ $row->countChairs() }}</td>
  <td class="text-capitalize">{{ $row->getFullDate() }}</td>
  <td>
    @include('dashboard.flights.partials.action-buttons', ['id' => $row->id])
  </td>
</tr>
