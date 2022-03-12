@extends('dashboard.page')

@section('content_header')
  <h1>@lang('dashboard.tickets')</h1>
@stop


@section('content')

  <form method="POST" action="{{ route('dashboard.tickets.update', [
      'ticket' => $ticket->id,
  ]) }}">
    @csrf
    @method('PUT')

    <input type="hidden" name="flight_id" value="{{ $ticket->booking->flight->id }}">

    <table>
      <tr>
        <td>Имя: </td>
        <td>
          <x-adminlte-input name="name" value="{{ $ticket->name }}" />
        </td>
      </tr>
      <tr>
        <td>Фамилия: </td>
        <td>
          <x-adminlte-input name="surname" value="{{ $ticket->surname }}" />
        </td>
      </tr>
      <tr>
        <td>Отчество: </td>
        <td>
          <x-adminlte-input name="surname2" value="{{ $ticket->surname2 }}" />
        </td>
      </tr>
      <tr>
        <td>Email:</td>
        <td>
          <x-adminlte-input name="email" value="{{ $ticket->email }}" />
        </td>
      </tr>
      <tr>
        <td>Дата рождения: </td>
        <td>
          <x-adminlte-input name="birthday" value="{{ $ticket->birthday }}" />
        </td>
      </tr>
      <tr>
        <td>Пол:</td>
        <td>
          {{ $ticket->getGender('f') }}
          <input name="gender" type="radio" value="f" {{ $ticket->gender == 'f' ? 'checked' : null }}
            value="{{ $ticket->gender }}">
          {{ $ticket->getGender('m') }}
          <input name="gender" type="radio" value="m" {{ $ticket->gender == 'm' ? 'checked' : null }}
            value="{{ $ticket->gender }}">
        </td>
      </tr>
      <tr>
        <td>Дата выпуска
          паспорта: </td>
        <td>
          <x-adminlte-input name="passport_date" value="{{ $ticket->passport_date }}" />
        </td>
      </tr>
      <tr>
        <td>Серия паспорта: </td>
        <td>
          <x-adminlte-input name="passport_number" value="{{ $ticket->passport_number }}" />
        </td>
      </tr>
      <tr>
        <td>Гражданство: </td>
        <td>
          <x-adminlte-input name="citizenship" value="{{ $ticket->citizenship }}" />
        </td>
      </tr>
      <tr>
        <td>Мобильный тел:</td>
        <td>
          <x-adminlte-input name="tel" value="{{ $ticket->tel }}" />
        </td>
      </tr>
      <tr>
        <td>Виза:</td>
        <td>
          <x-adminlte-input name="visa" value="{{ $ticket->visa }}" />
        </td>
      </tr>
      <tr>
        <td>Адрес: </td>
        <td>
          <x-adminlte-input name="address" value="{{ $ticket->address }}" />
        </td>
      </tr>
    </table>

    <x-adminlte-button type="submit" label="{{ __('common.save') }}" theme="primary" />
  </form>
@endsection
