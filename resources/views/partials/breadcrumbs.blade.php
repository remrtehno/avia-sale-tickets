@unless ($breadcrumbs->isEmpty())
<div class="breadcrumbs1_wrapper">
  <div class="container">
    <div class="breadcrumbs1">
        @foreach ($breadcrumbs as $breadcrumb)

            @if (!is_null($breadcrumb->url) && !$loop->last)
              <a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
              <span>/</span>
            @else
              {{ $breadcrumb->title }}
            @endif

        @endforeach
    </div>
  </div>
</div>
@endunless

