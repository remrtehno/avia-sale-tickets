@if (count($errors) > 0)
  <div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <strong>Sorry!</strong> invalid input.<br><br>
    <ul style="list-style-type:none;">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

@if (session()->has('success'))
  <div class="alert alert-success" role="alert">
    {{ session()->get('success') }}
    <a href="#" wire:click="disableUpdate()" class="close" data-dismiss="alert">&times;</a>
    <script>
      setTimeout(() => {
        window.location.reload()
      }, 3000);
    </script>
  </div>
@endif



<table class="table table-striped" style="margin-top:20px;">
  <tr>
    <td>Email header</td>
    <td>Email footer</td>
    <td>Phone header</td>
    <td>phone footer</td>
    <td>Действие</td>
  </tr>

  <tr>
    <td>
      <input type="text" wire:model="emailHeader" class="form-control input-sm">
      @error('emailHeader')
        <span class="text-danger">{{ $message }}</span>
      @enderror
    </td>
    <td><input type="text" wire:model="emailFooter" class="form-control input-sm"></td>
    <td><input type="text" wire:model="phoneHeader" class="form-control input-sm"></td>
    <td><input type="text" wire:model="phoneFooter" class="form-control input-sm"></td>
    <td>
      <button wire:click="update({{ 1 }})" class="btn btn-sm btn-outline-danger py-0">Обновить</button>
    </td>
  </tr>

</table>
