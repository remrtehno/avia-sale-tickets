<tr>
  <td>{{ $row->id }}</td>
  <td>
    @if ($row->getImage())
      <img loading="lazy" src="{{ $row->getImage() }}" style="max-width: 68px" class="img-fluid">
    @else
      <small class="text-muted">(нету логотипа)</ы>
    @endif

    @if ($assignedFlihts ?? null)
      <small class="alert py-0 px-1 d-inline-block alert-success">
        куплен
      </small>
    @endif

    @can('is-admin')
      <br>
      {{ $row->user->name }}
      {{ $row->user->email }}
    @endcan
  </td>
  <td>{{ $row->flight }}</td>
  <td>{{ $row->getChairs()->count() }}</td>
  <td class="text-capitalize">
    {{ $row->getTime() }} <span class="p-1"></span> {{ $row->getFullDate() }}
  </td>
  <td>
    @include('dashboard.flights.partials.action-buttons', [
        'id' => $row->id,
    ])
  </td>
</tr>
