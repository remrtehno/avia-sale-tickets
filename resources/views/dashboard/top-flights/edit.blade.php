@extends('dashboard.page')


@section('content')
  <h3> Продвинуть в топ {{ $flights->flight }}</h3>

  <form action="{{ route('dashboard.top-flights.update', ['top_flight' => $flights->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <label>
      В топ <span class="p-2"></span>
      <input name="top" type="checkbox" @if ($flights->top) checked @endif>
    </label>
    <div></div>
    <button>@lang('common.save')</button>
  </form>
@endsection
