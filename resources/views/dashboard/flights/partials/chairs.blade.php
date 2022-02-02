@php
$heads = ['ID', 'Тип кресла', 'Цена', 'Действия'];

$config = [
    'order' => [[0, 'asc']],
    'language' => ['url' => '/lang/datatable/ru.json'],
];
@endphp

<hr>
<h4 class="py-0">Места</h4>

<x-adminlte-datatable id="table12" :heads="$heads" :config="$config">
  @foreach ($chairs as $row)
    <tr>
      <td>{{ $row->uuid }}</td>
      <td>{{ $row->type }}</td>
      <td>{{ $row->price }}</td>
      <td>
        @include('dashboard.flights.partials.action-buttons-chairs', ['id' => $row->id])
      </td>
    </tr>
  @endforeach
</x-adminlte-datatable>
