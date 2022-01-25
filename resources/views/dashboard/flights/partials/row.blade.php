<tr>
  <td>{{ $row->id }}</td>
  <td>{{ $row->title }}</td>
  <td>{{ $row->id }}</td>
  <td>
     @include('dashboard.flights.partials.action-buttons', ['id' => $row->id])
  </td>
</tr>