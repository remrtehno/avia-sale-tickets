<nobr>
  <a 
      class="btn btn-xs btn-default text-teal mx-1 shadow"  
      href="{{ route('dashboard.flights.show', ['flight' => $id]) }}" 
      title="Details"
    >
      <i class="fa fa-lg fa-fw fa-eye"></i>
  </a>
  <a 
      class="btn btn-xs btn-default text-primary mx-1 shadow" 
      href="{{ route('dashboard.flights.edit', ['flight' => $id]) }}" 
      title="Edit"
    >
    <i class="fa fa-lg fa-fw fa-pen"></i>
  </a>

  <form 
    method="POST"
    action="{{ route('dashboard.flights.destroy', ['flight' => $id]) }}" 
    class="d-inline-block"
    >
    @csrf
    @method('delete')
    <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
      <i class="fa fa-lg fa-fw fa-trash"></i>
    </button> 
  </form>
</nobr>