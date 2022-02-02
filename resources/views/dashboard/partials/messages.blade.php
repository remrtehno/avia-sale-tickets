@if (session()->has('status'))
  <p style="color: green; padding: 20px 0;">
    {{ session()->get('status') }}
  </p>
@endif
