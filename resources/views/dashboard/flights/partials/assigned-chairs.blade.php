@php
$heads = ['Имя пользователя', 'Кол-во кресел'];

$config = [
    'order' => [],
    'language' => ['url' => '/lang/datatable/ru.json'],
];
@endphp

@section('plugins.Select2', true)

<div class="pt-5"></div>
<h4 class="mb-3">Проданные кресла</h4>

<div>Доступно: <span class="badge bg-warning text-dark">{{ $flight->getNotAssignedAvailableChairs()->count() }}</span>
</div>

<div class="p-2"></div>

<form action="{{ route('dashboard.flight.chairs.assign', ['flight' => $flight->id]) }}" method="POST"
  enctype="multipart/form-data">
  @method('PUT')
  @csrf


  <div class="d-flex align-items-start mb-2">
    Продать кресла
    <div>
      <input type="text" name="count_chairs" class="mx-2 text-center input-number" style="width: 40px" value="0">
      <br>
      <small class="position-absolute text-red">
        @error('count_chairs')
          {{ $message }}
        @enderror
      </small>
    </div>

    шт. пользователю

    <div class="mx-2" style="width: 340px; margin-bottom: -1rem;">
      <x-adminlte-select2 igroup-size="sm" name="user_id">
        @foreach ($users as $user)
          <option value="{{ $user->id }}">{{ $user->id }}) {{ $user->name }} {{ $user->surname }} |
            {{ $user->email }}</option>
        @endforeach
      </x-adminlte-select2>
    </div>

    <x-adminlte-button class="btn-sm" type="submit" label="Продать" />
  </div>
</form>

<div class="p-2"></div>
@if ($message = Session::get('assigned_to'))
  <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
  </div>
@endif

@if ($message = Session::get('not_avaliable'))
  <div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
  </div>
@endif

<div class="p-3"></div>

<x-adminlte-datatable id="table122" :heads="$heads" :config="$config">
  @foreach ($assignedChairs as $key => $row)
    <tr>
      <td>{{ $row->first()->user->name }} {{ $row->first()->user->email }}</td>
      <td>продано: {{ $row->count() }}</td>
    </tr>
  @endforeach
</x-adminlte-datatable>

@section('js')
  <script src="{{ mix('js/app.js') }}"></script>
@stop
