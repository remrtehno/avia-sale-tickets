<nobr>
  <a class="btn btn-xs btn-default text-primary mx-1 shadow"
    href="{{ route('dashboard.chairs.edit', ['chair' => $id]) }}" title="Edit">
    <i class="fa fa-lg fa-fw fa-pen"></i>
  </a>

  <form method="POST" action="{{ route('dashboard.chairs.destroy', ['chair' => $id]) }}" class="d-inline-block">
    @csrf
    @method('delete')
    <x-adminlte-button class="btn-xs" type="submit" theme="outline-danger" icon="fas fa-lg fa-trash"
      onclick="return confirm('Уверены что хотите удалить?')" />
  </form>
</nobr>
