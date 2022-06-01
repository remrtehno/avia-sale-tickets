<div class="my-18">
  <table class="table">
    <tr>
      <td>ID Заказа</td>
      <td>{{ $booking->order->get(0)->uuid }}</td>
    </tr>
    <tr>
      <td>Бронь заказа</td>
      <td>действует 30 минут</td>
    </tr>
    <tr>
      <td>Сумма</td>
      <td>{{ number_format($booking->order->get(0)->total, 2, '.', ' ') }} UZS</td>
    </tr>
  </table>
</div>
