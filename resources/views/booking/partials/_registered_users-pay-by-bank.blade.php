@if (Auth::user()->isOrg())
  Ваш депозит: <strong>{{ number_format($deposit, 2, '.', ' ') }} UZS</strong>
  @if ($deposit < $booking->order->get(0)->total)
    <div style="background: red;" class="badge">Не достаточно средств на депозите</div>
  @endif

  @include('booking.partials._order-info')
@elseif (Auth::user()->isInd())
  <div class="alert alert-warning" role="alert">
    Вы не можете оплатить перечислением, так как вы явялетесь Физ. лицом.
    Для того что-бы оплатить перечислением, вам не обходимо скачать бланки,
    заполнить их и отправить на Email администратору на адрес {!! $contacts->email_footer !!}.
  </div>

  <a href="#">Бланк 1</a> <a href="#">Бланк 2</a>
  <div class="py-10"></div>
@endif
