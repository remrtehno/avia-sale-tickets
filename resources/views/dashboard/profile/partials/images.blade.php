@foreach ($images as $img)
  <a target="_blank" href="{{ $img->getFullUrl() }}">
    <img loading="lazy" src="{{ $img->getFullUrl() }}"
      style="max-width: 65px; height: 45px;     object-fit: cover;" />
  </a>
@endforeach
