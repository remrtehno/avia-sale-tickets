<x-adminlte-modal id="modalMin-{{ $ticket->id }}">
  @include('dashboard.tickets.partials.render-fields', [
      'row' => $ticket,
  ])
</x-adminlte-modal>
<x-adminlte-button class="btn-xs" label="Просмотреть" data-toggle="modal"
  data-target="#modalMin-{{ $ticket->id }}" />
