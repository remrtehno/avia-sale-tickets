@foreach ($returnAssignedChairs as $chair)
  <div class="alert alert-primary py-0 px-1 my-0 mx-1">
    <b>
      {{ $chair->ownerUser->name }}
      {{ $chair->ownerUser->email }}
    </b>
    <br>
    пользователь возвращает <br> вам кресла в кол-ве <b>{{ $chair->count_chairs }}</b> шт.
    <br>
    для рейса <a target="_blank"
      href="{{ route('dashboard.flights.edit', ['flight' => $chair->flight->id]) }}"><b>{{ $chair->flight->flight }}</b></a>
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
