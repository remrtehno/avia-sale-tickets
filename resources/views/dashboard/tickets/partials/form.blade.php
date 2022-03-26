<table>
  <tr>
    <td>Имя: </td>
    <td>
      <x-adminlte-input name="name" value="{{ $ticket->name }}" :disabled="$disabled ?? null" />
    </td>
  </tr>
  <tr>
    <td>Фамилия: </td>
    <td>
      <x-adminlte-input name="surname" value="{{ $ticket->surname }}" :disabled="$disabled ?? null" />
    </td>
  </tr>
  <tr>
    <td>Отчество: </td>
    <td>
      <x-adminlte-input name="surname2" value="{{ $ticket->surname2 }}" :disabled="$disabled ?? null" />
    </td>
  </tr>
  <tr>
    <td>Email:</td>
    <td>
      <x-adminlte-input name="email" value="{{ $ticket->email }}" :disabled="$disabled ?? null" />
    </td>
  </tr>
  <tr>
    <td>Дата рождения: </td>
    <td>
      <x-adminlte-input name="birthday" value="{{ $ticket->birthday }}" :disabled="$disabled ?? null" />
    </td>
  </tr>
  <tr>
    <td>Пол:</td>
    <td>
      {{ $ticket->getGender('f') }}
      <input name="gender" type="radio" value="f" {{ $ticket->gender == 'f' ? 'checked' : null }}
        value="{{ $ticket->gender }}" @if ($disabled ?? null) disabled @endif>
      {{ $ticket->getGender('m') }}
      <input name="gender" type="radio" value="m" {{ $ticket->gender == 'm' ? 'checked' : null }}
        value="{{ $ticket->gender }}" @if ($disabled ?? null) disabled @endif>
    </td>
  </tr>
  <tr>
    <td>Дата выпуска
      паспорта: </td>
    <td>
      <x-adminlte-input name="passport_date" value="{{ $ticket->passport_date }}" :disabled="$disabled ?? null" />
    </td>
  </tr>
  <tr>
    <td>Серия паспорта: </td>
    <td>
      <x-adminlte-input name="passport_number" value="{{ $ticket->passport_number }}"
        :disabled="$disabled ?? null" />
    </td>
  </tr>
  <tr>
    <td>Гражданство: </td>
    <td>
      <x-adminlte-input name="citizenship" value="{{ $ticket->citizenship }}" :disabled="$disabled ?? null" />
    </td>
  </tr>
  <tr>
    <td>Мобильный тел:</td>
    <td>
      <x-adminlte-input name="tel" value="{{ $ticket->tel }}" :disabled="$disabled ?? null" />
    </td>
  </tr>
  <tr>
    <td>Виза:</td>
    <td>
      <x-adminlte-input name="visa" value="{{ $ticket->visa }}" :disabled="$disabled ?? null" />
    </td>
  </tr>
  <tr>
    <td>Адрес: </td>
    <td>
      <x-adminlte-input name="address" value="{{ $ticket->address }}" :disabled="$disabled ?? null" />
    </td>
  </tr>
</table>
