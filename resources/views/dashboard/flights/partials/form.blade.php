@php
$config = ['format' => 'DD-MM-YYYY HH:mm'];

$configTextEditor = [
    'height' => '200',
];

@endphp

<div class="row">
  <x-adminlte-input-date autocomplete="off" :config="$config" name="date" label="{{ __('dashboard.date_flight') }}"
    fgroup-class="col-md-3" value="{{ isset($flight) ? $flight->date->format('d-m-Y H:i') : old('date') }}"
    placeholder="01-12-2022 00:59" :disabled="$isAssigned" />

  <x-adminlte-input-date autocomplete="off" :config="$config" name="date_arrival"
    label="{{ __('dashboard.date_arrival') }}" fgroup-class="col-md-3"
    value="{{ isset($flight) ? $flight->date_arrival->format('d-m-Y H:i') : old('date_arrival') }}"
    placeholder="01-12-2022 00:59" :disabled="$isAssigned" />

  <x-adminlte-input value="{{ $flight->flight ?? null }}" name="flight"
    label="{{ __('dashboard.number_of_flight') }}" fgroup-class="col-md-3" enable-old-support :disabled="$isAssigned" />

  @if ($flight->count_chairs ?? null)
    <x-adminlte-input value="{{ $flight->chairs->count() ?? null }}" name="" disabled
      label="{{ __('dashboard.count_seats_flight') }}" fgroup-class="col-md-2" disabled />
    <input type="hidden" name="count_chairs" value="{{ $flight->count_chairs ?? null }}">
  @else
    <x-adminlte-input value="{{ $flight->count_chairs ?? null }}" name="count_chairs"
      label="{{ __('dashboard.count_seats_flight') }}" fgroup-class="col-md-2" enable-old-support />
  @endif



  <div class="col-md-6">
    <div>
      <label for="iLabel">
        {{ __('dashboard.direction_flight') }}
      </label>
    </div>
    <div class="row">
      @include('dashboard.flights.partials.search-airports-element', [
          'name' => 'direction_from',
          'disabled' => $isAssigned,
          'placeholder' => 'Откуда',
          'value' => $flight->direction_from ?? null,
      ])


      @include('dashboard.flights.partials.search-airports-element', [
          'name' => 'direction_to',
          'disabled' => $isAssigned,
          'placeholder' => 'Куда',
          'value' => $flight->direction_to ?? null,
      ])
    </div>

  </div>


  @if (!$isAssigned)
    <x-adminlte-input-file name="logo" label="{{ __('dashboard.avia_logo') }}" fgroup-class="col-md-4"
      placeholder="Choose a file...">
      <x-slot name="prependSlot">
        <div class="input-group-text bg-lightblue">
          <i class="fas fa-upload"></i>
        </div>
      </x-slot>
    </x-adminlte-input-file>
  @endif
  @if (isset($flight) && $flight->getImage())
    <div class="col-md-2">
      <img loading="lazy" class="img-fluid mt-4" src="{{ $flight->getImage() }}" alt="">
    </div>
  @endif



  <div class="col-md-12"></div>



  <div class="col-md-12">
    <label>{{ __('dashboard.price_ticket') }}</label>
  </div>

  <div class="col-md-5">
    <div class="row">

      <x-adminlte-input value="{{ $flight->price_adult ?? null }}" name="price_adult"
        label="{{ __('dashboard.adult') }}" fgroup-class="col-md-4" enable-old-support :disabled="$isAssigned" />
      <x-adminlte-input value="{{ $flight->price_child ?? null }}" name="price_child"
        label="{{ __('dashboard.child') }}" fgroup-class="col-md-4" enable-old-support :disabled="$isAssigned" />
      <x-adminlte-input value="{{ $flight->price_infant ?? null }}" name="price_infant"
        label="{{ __('dashboard.infant') }}" fgroup-class="col-md-4" enable-old-support :disabled="$isAssigned" />

      <x-adminlte-input value="{{ $flight->price_adult_bag ?? null }}" name="price_adult_bag"
        label="{{ __('dashboard.adult_bag') }}" fgroup-class="col-md-4" enable-old-support :disabled="$isAssigned" />
      <x-adminlte-input value="{{ $flight->price_child_bag ?? null }}" name="price_child_bag"
        label="{{ __('dashboard.child_bag') }}" fgroup-class="col-md-4" enable-old-support :disabled="$isAssigned" />
      <x-adminlte-input value="{{ $flight->price_infant_bag ?? null }}" name="price_infant_bag"
        label="{{ __('dashboard.infant_bag') }}" fgroup-class="col-md-4" enable-old-support :disabled="$isAssigned" />
    </div>
  </div>
  <div class="col-md-4">
    <x-adminlte-input value="{{ $flight->penalty ?? null }}" name="penalty" label="{{ __('dashboard.penalty') }}"
      fgroup-class="col-md-4" enable-old-support :disabled="$isAssigned" />
  </div>

  <div class="col-md-12"></div>


  <x-adminlte-text-editor name="comment" label="Комментарий" fgroup-class="col-md-6" :config="$configTextEditor"
    enable-old-support>


    @if (trim($flight->comment ?? null))
      {{ $flight->comment }}
    @else
      {{ $flight_comment ?? null }}
    @endif


  </x-adminlte-text-editor>

  <div class="col-md-12"></div>

</div>


@if ($isAssigned)
  @section('js')
    <script>
      $(function() {
        $('#comment').summernote('disable')
      })
    </script>
  @stop
@endif
