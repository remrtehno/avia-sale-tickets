<nobr>
  <a class="btn btn-xs btn-default text-teal mx-1 shadow" target="_blank"
    href="{{ route('dashboard.flights.show', ['flight' => $id]) }}" title="Details">
    <i class="fa fa-lg fa-fw fa-eye"></i>
  </a>
  <a class="btn btn-xs btn-default text-primary mx-1 shadow"
    href="{{ route('dashboard.flights.edit', ['flight' => $id]) }}" title="Edit">
    <i class="fa fa-lg fa-fw fa-pen"></i>
  </a>


  <a @if ($row->getCountTickets()) class="btn btn-xs btn-default text-primary mx-1 shadow" href="{{ route('dashboard.flights.customers_to_txt', ['flight' => $id]) }}" @else
    class="btn btn-xs btn-default mx-1 shadow" @endif
    title="Выгрузить данные покупателей в txt">
    <i class="fa fa-lg fa-fw fa-save"></i>
  </a>

  @if (!Route::is('dashboard.top-flights.index'))
    <form method="POST"
      @if (!$row?->canBeDeleted()) action="{{ route('dashboard.flights.destroy', ['flight' => $id]) }}" @endif
      class="d-inline-block">
      @csrf
      @method('delete')
      <button @if (!$row?->canBeDeleted()) disabled @endif onclick="return confirm('Уверены что хотите удалить?')"
        class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
        <i class="fa fa-lg fa-fw fa-trash"></i>
      </button>
    </form>
  @endif
</nobr>
