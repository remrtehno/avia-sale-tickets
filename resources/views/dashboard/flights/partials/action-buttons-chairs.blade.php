<nobr>
  <form method="POST" action="{{ route('dashboard.chairs.destroy', ['chair' => $id]) }}" class="d-inline-block">
    @csrf
    @method('delete')
    <x-adminlte-button class="btn-xs" type="submit" theme="outline-danger" icon="fas fa-lg fa-trash"
      onclick="return confirm('Уверены что хотите удалить?')" />
  </form>
</nobr>
