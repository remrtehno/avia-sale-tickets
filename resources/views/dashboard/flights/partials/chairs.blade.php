@php
$heads = ['ID', 'Статус', 'Действия'];

$config = [
    'order' => [],
    'language' => ['url' => '/lang/datatable/ru.json'],
];
@endphp

<hr>

@if ($isAssigned)
  <h5>Хотите вернуть места?</h5>
  <form action="{{ route('dashboard.order.return', ['order' => 
$flight->getChairs()->first()->order->uuid ?? 0]) }}"
    method="POST">
    @csrf

    <label for="count_chairs">
      Кол-во мест, максимально {{ $flight->getChairs()->count() }}
    </label>
    <div class="d-flex flex-wrap align-items-start my-2">
      <x-adminlte-input name="count_chairs" type="number" class="input-number" />

      <x-adminlte-button class="btn-md mb-3" label="Вернуть" type="submit" icon="fas fa-xs fa-minus" theme="danger"
        onclick="return confirm('Вернуть места?')" />
    </div>
  </form>

  <h5>Ожидающие подтверждения возврата</h5>
  <table class="table">
    <tr>
      <td>Количество кресел</td>
      <td>Кому возвращаем (ждем подтверждения от пользователя)</td>
      <td>На сумму</td>
    </tr>
    @foreach ($returnedAssignedChairs as $returnedChair)
      <tr>
        <td>{{ $returnedChair->count_chairs }} шт.</td>
        <td>{{ $returnedChair->user->name }} {{ $returnedChair->user->email }}</td>
        <td>{{ number_format($returnedChair->count_chairs * $returnedChair->flight->price_adult, 2, '.', ' ') }}</td>
      </tr>
    @endforeach

  </table>


  <hr>
@endif

<div class="d-flex justify-content-between flex-wrap align-items-center my-2">
  <h4 class="py-0">Места</h4>
  <h5>
    доступно <div class="badge badge-warning">{{ $flight->getNotAssignedAvailableChairs()->count() }}</div>
  </h5>

  <x-adminlte-button :disabled="$isAssigned" class="btn-md" label="Добавить место" type="submit"
    icon="fas fa-xs fa-plus" theme="danger"
    onclick="confirm('Добавть место для этого рейса') ? location = '{{ route('dashboard.flight.chairs.create', [
        'flight' => $flight->id,
    ]) }}' : null" />
</div>

<div class="p-2"></div>

<x-adminlte-datatable id="table12" :heads="$heads" :config="$config">
  @foreach ($flight->getChairs() as $key => $row)
    <tr>

      <td>{{ $row->uuid }}</td>
      <td>
        @include('dashboard.partials.status', ['status' => $row->getStatus()])
      </td>
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
