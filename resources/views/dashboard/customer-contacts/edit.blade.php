@extends('dashboard.page')

@section('content_header')
  <h1>@lang('dashboard.customer-contacts')</h1>
@stop

@php
$labels = ['Имя', 'Фамилия', 'Отчество', 'Email', 'Дата рождения', 'Дата паспрта', 'Серия паспорта', 'Гражданство', 'Телефон', 'Виза', 'Адрес'];
$fields = ['name', 'surname', 'surname2', 'email', 'birthday', 'passport_date', 'passport_number', 'citizenship', 'tel', 'visa', 'address'];
@endphp


@section('content')
  <div class="row">
    <div class="col-md-6">
      <form action="{{ route('dashboard.customer-contacts.update', ['customer_contact' => $customerContact->id]) }}"
        method="post">
        @csrf
        @method('put')

        @foreach ($fields as $key => $field)
          <x-adminlte-input :name="$field" :value="$customerContact[$field]" :label="$labels[$key]" />
        @endforeach

        @include('components.select-sex-form', ['gender' => $customerContact['gender']])

        <x-adminlte-button type="submit" label="{{ __('common.edit') }}" theme="primary" />
      </form>
      <p></p>
    </div>
  </div>

@endsection
