@foreach ($returnAssignedChairs as $chair)
  <div class="alert alert-primary py-0 px-1 my-0 mx-1">
    <b>

    </b>
    пользователь возвращает вам кресла в кол-ве <b>{{ $chair->count_chairs }}</b> шт.
    <br>
    <a href="{{ route('dashboard.return.assigned.chairs.accept', ['id' => $chair->id]) }}">Принять</a>
    <a href="{{ route('dashboard.return.assigned.chairs.reject', ['id' => $chair->id]) }}">Отменить</a>
  </div>
@endforeach


@if ($message = Session::get('returned'))
  <div class="alert alert-success alert-block py-0 px-1 my-0 mx-1">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
  </div>
@endif
