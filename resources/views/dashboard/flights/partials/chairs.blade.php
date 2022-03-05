@php
$heads = ['ID', 'Статус', 'Действия'];

$config = [
    'order' => [],
    'language' => ['url' => '/lang/datatable/ru.json'],
];
@endphp

<hr>

<div class="d-flex justify-content-between flex-wrap align-items-center my-2">
  <h4 class="py-0">Места</h4>

  <x-adminlte-button class="btn-xs" label="Добавить место" type="submit" icon="fas fa-xs fa-plus" theme="danger"
    onclick="confirm('Добавть место для этого рейса') ? location = '{{ route('dashboard.flight.chairs.create', [
        'flight' => $flight->id,
    ]) }}' : null" />
</div>


<x-adminlte-datatable id="table12" :heads="$heads" :config="$config">
  @foreach ($chairs as $key => $row)
    <tr>
      <td>{{ $row->uuid }}</td>
      <td>{{ $row->getStatus() }}</td>
      <td>
        @if ($row->canDelete())
          @include(
              'dashboard.flights.partials.action-buttons-chairs',
              ['id' => $row->id]
          )
        @else
          <x-adminlte-button class="btn-xs" type="submit" icon="fas fa-lg fa-trash"
            onclick="return alert('удалению не подлежит')" />
        @endif
      </td>
    </tr>
  @endforeach
</x-adminlte-datatable>
