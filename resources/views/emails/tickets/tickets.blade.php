@component('mail::message')
  # {{ $data['title'] }}

  ## {{ $data['body'] }}

  @component('mail::button', ['url' => route('flights.show', ['flight' => $data['flight']->id])])
    Посмотреть рейс
  @endcomponent

  Спасибо,<br>
  {{ config('app.name') }}
@endcomponent
