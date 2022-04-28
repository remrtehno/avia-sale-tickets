<form method="POST" action="{{ $route }}" class="d-inline-block">
  @csrf
  @method('delete')
  <x-adminlte-button class="btn-xs" type="submit" theme="outline-danger" icon="fas fa-lg fa-trash"
    onclick="return confirm('Уверены что хотите удалить?')" />
</form>
