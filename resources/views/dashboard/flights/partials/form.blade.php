@php
$config = ['format' => 'DD-MM-YYYY HH:mm'];
@endphp

<div class="row">
  <x-adminlte-input-date autocomplete="off" :config="$config" name="date" label="{{ __('dashboard.date_flight') }}"
    fgroup-class="col-md-3" value="{{ isset($flight) ? $flight->date->format('d-m-Y H:i') : old('date') }}"
    placeholder="01-12-2022 00:59" />

  <x-adminlte-input-date autocomplete="off" :config="$config" name="date_arrival"
    label="{{ __('dashboard.date_arrival') }}" fgroup-class="col-md-3"
    value="{{ isset($flight) ? $flight->date_arrival->format('d-m-Y H:i') : old('date_arrival') }}"
    placeholder="01-12-2022 00:59" />

  <x-adminlte-input value="{{ $flight->flight ?? null }}" name="flight"
    label="{{ __('dashboard.number_of_flight') }}" fgroup-class="col-md-3" enable-old-support />

  @if ($flight->count_chairs ?? null)
    <x-adminlte-input value="{{ $flight->chairs->count() ?? null }}" name="" disabled
      label="{{ __('dashboard.count_seats_flight') }}" fgroup-class="col-md-2" />
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
      <x-adminlte-input value="{{ $flight->direction_from ?? null }}" name="direction_from"
        fgroup-class="col-md-6" placeholder="Откуда" enable-old-support />
      <x-adminlte-input value="{{ $flight->direction_to ?? null }}" name="direction_to" fgroup-class="col-md-6"
        placeholder="Куда" enable-old-support />
    </div>

  </div>



  <x-adminlte-input-file name="logo" label="{{ __('dashboard.avia_logo') }}" fgroup-class="col-md-4"
    placeholder="Choose a file...">
    <x-slot name="prependSlot">
      <div class="input-group-text bg-lightblue">
        <i class="fas fa-upload"></i>
      </div>
    </x-slot>
  </x-adminlte-input-file>
  @if (isset($flight) && $flight->getImage())
    <div class="col-md-2">
      <img class="img-fluid mt-4" src="{{ $flight->getImage() }}" alt="">
    </div>
  @endif



  <div class="col-md-12"></div>

  @if ($flight->total_purchased_price ?? null)
    <x-adminlte-input value="{{ $flight->total_purchased_price ?? null }}" name="" disabled label="Приобретеная цена"
      fgroup-class="col-md-3" />
    <input type="hidden" name="total_purchased_price" value="{{ $flight->total_purchased_price ?? null }}">
  @else
    <x-adminlte-input value="{{ $flight->total_purchased_price ?? null }}" name="total_purchased_price"
      label="Приобретеная цена" fgroup-class="col-md-3" enable-old-support />
  @endif

  <x-adminlte-input value="{{ $flight->total_sales_price ?? null }}" name="total_sales_price"
    label="Продаваемая цена" fgroup-class="col-md-3" enable-old-support />

  <div class="col-md-12">
    <label>{{ __('dashboard.price_ticket') }}</label>
  </div>

  <div class="col-md-5">
    <div class="row">

      <x-adminlte-input value="{{ $flight->price_adult ?? null }}" name="price_adult"
        label="{{ __('dashboard.adult') }}" fgroup-class="col-md-4" enable-old-support />
      <x-adminlte-input value="{{ $flight->price_child ?? null }}" name="price_child"
        label="{{ __('dashboard.child') }}" fgroup-class="col-md-4" enable-old-support />
      <x-adminlte-input value="{{ $flight->price_infant ?? null }}" name="price_infant"
        label="{{ __('dashboard.infant') }}" fgroup-class="col-md-4" enable-old-support />
    </div>
  </div>

  <div class="col-md-12"></div>

  <x-adminlte-textarea name="comment" label="Комментарий" fgroup-class="col-md-4" enable-old-support>
    {{ $flight->comment ?? null }}
  </x-adminlte-textarea>

  <div class="col-md-12"></div>

</div>
