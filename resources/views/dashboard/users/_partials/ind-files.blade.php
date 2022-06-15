<div class="border border-rounded p-3 mb-4">
  <h5><b>Скан паспорта.</b></h5>
  <div class="col-md-6 mb-3">

    @foreach ($user->getImages('passport_file') as $key => $image)
      @if (str_ends_with($image->getUrl(), '.pdf'))
        @include('dashboard.users._partials.show-pdf', [
            'url' => $image->getUrl(),
        ])
      @else
        @include('dashboard.users._partials.users-image', [
            'url' => $image->getUrl(),
        ])
      @endif
    @endforeach




  </div>
</div>
