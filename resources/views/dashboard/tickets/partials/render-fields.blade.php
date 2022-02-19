<table>
  <tr>
    <td>Имя: </td>
    <td>{{ $row->name }}</td>
  </tr>
  <tr>
    <td>Фамилия: </td>
    <td>{{ $row->surname }}</td>
  </tr>
  <tr>
    <td>Отчество: </td>
    <td>{{ $row->surname2 }}</td>
  </tr>
  <tr>
    <td>Email:</td>
    <td> {{ $row->email }}</td>
  </tr>
  <tr>
    <td>Дата рождения: </td>
    <td>{{ $row->birthday }}</td>
  </tr>
  <tr>
    <td>Пол:</td>
    <td>{{ $row->getGender() }}</td>
  </tr>
  <tr>
    <td>Дата выпуска
      паспорта: </td>
    <td>{{ $row->passport_date }}</td>
  </tr>
  <tr>
    <td>Серия паспорта: </td>
    <td>{{ $row->passport_number }}</td>
  </tr>
  <tr>
    <td>Гражданство: </td>
    <td>{{ $row->citizenship }}</td>
  </tr>
  <tr>
    <td>Мобильный тел:</td>
    <td> {{ $row->tel }}</td>
  </tr>
  <tr>
    <td>Виза:</td>
    <td> {{ $row->visa }}</td>
  </tr>
  <tr>
    <td>Адрес: </td>
    <td>{{ $row->address }}</td>
  </tr>
</table>
