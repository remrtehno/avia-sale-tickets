@php
$colorsMap = [
    'booked' => 'alert-danger',
    'paid' => 'alert-success',
    'available' => '',
];
@endphp

@if ($status)
  <div class="alert py-0 px-1 d-inline-block {{ $colorsMap[$status] }}">
    {{ $status }}
  </div>
@endif