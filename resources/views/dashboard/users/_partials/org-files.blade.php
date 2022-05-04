@php
$labels = ['Скан паспорта директора', 'ИНН', 'Лицензия', 'Соглашение', 'Файл кадастра'];
$images = ['dir_passport_file', 'inn_file', 'license_file', 'agreement_contract_file', 'cadastre_file'];
@endphp

<div class="border border-rounded p-3 mb-4">
  <h5><b>ФИО Директора.</b></h5>
  <x-adminlte-input name="name" value="{{ $user->name }}" />
  <x-adminlte-input name="dir_surname" value="{{ $user->dir_surname }}" />
  <x-adminlte-input name="dir_surname2" value="{{ $user->dir_surname2 }}" />
</div>

<div class="border border-rounded p-3 mb-4">
  <h5><b>Сканы документов.</b></h5>
  <div class="row">
    @foreach ($images as $key => $imageLibrary)
      @foreach ($user->getImages($imageLibrary) as $image)
        <div class="col-md-6 mb-3">
          <h5>{{ $labels[$key] }}</h5>
          @include('dashboard.users._partials.users-image', [
              'url' => $image->getUrl(),
          ])
        </div>
      @endforeach
    @endforeach
  </div>
</div>
