<tr>
  <td>{{ $row->id }}</td>
  <td>{{ $row->getMedia('logo') }}</td>
  <td>{{ $row->flight }}</td>
  <td>{{ $row->countChairs() }}</td>
  <td>{{ $row->getDate() }}</td>
  <td>
    @include('dashboard.flights.partials.action-buttons', ['id' => $row->id])
  </td>
</tr>
