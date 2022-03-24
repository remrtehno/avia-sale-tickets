@foreach ($preAssignChairs as $chair)
  <div class="alert alert-warning py-0 px-1 my-0 mx-1">
    <b>
      {{ $chair->ownerUser->name }}
      {{ $chair->ownerUser->email }}
    </b>
    пользователь продает вам кресла в кол-ве <b>{{ $chair->count_chairs }}</b> шт.
    <br>
    <a href="{{ route('dashboard.flight.chairs.assign.accept', ['id' => $chair->id]) }}"
      class="text-dark">Принять</a>
    <a href="{{ route('dashboard.flight.chairs.assign.reject', ['id' => $chair->id]) }}"
      class="text-dark">Отменить</a>
  </div>

  @push('js')
    <script>
      alert(
        '{{ $chair->ownerUser->name }} {{ $chair->ownerUser->email }} продает вам кресла в кол-ве {{ $chair->count_chairs }} шт. Вам нужно принять или отменить покупку.'
      )
    </script>
  @endpush
@endforeach
@if ($message = Session::get('assigned_to'))
  <div class="alert alert-success alert-block py-0 px-1 my-0 mx-1">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
  </div>
@endif
@if ($message = Session::get('not_avaliable'))
  <div class="alert alert-danger alert-block py-0 px-1 my-0 mx-1">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
  </div>
@endif

