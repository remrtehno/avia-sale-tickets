<div class="border border-rounded p-3 mb-4">
  <h5><b>Скан паспорта.</b></h5>
  <div class="col-md-6 mb-3">

    @foreach ($user->getImages('passport_file') as $key => $image)
      @include('dashboard.users._partials.users-image', [
          'url' => $image->getUrl(),
      ])
    @endforeach



  </div>
</div>
