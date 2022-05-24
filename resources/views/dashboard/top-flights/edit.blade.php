@extends('dashboard.page')


@section('content')
  <h3> Продвинуть в топ {{ $flights->flight }}</h3>
  <h4>Текущий период: {{ !$flights->isPeriodExpired() ? $flights->getPeriod() : '-' }}</h4>
  <h5>Осталось дней: {{ $flights->getDaysLeftInTop() }} </h5>

  <form action="{{ route('dashboard.top-flights.update', ['top_flight' => $flights->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <label>
      В топ <span class="p-2"></span>
      <input name="top" type="checkbox" @if ($flights->top) checked @endif>
    </label>
    <div></div>
    <label>
      Период в топе <span class="p-2"></span>
      <select name="period">
        @foreach ($periods as $period)
          <option value="{{ $period }}">{{ $period }}</option>
        @endforeach
      </select>
    </label>
    <div></div>
    <br>
    <button>@lang('common.save')</button>
  </form>
@endsection
