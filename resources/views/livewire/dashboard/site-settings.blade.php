<div>

  <h1>Контакты</h1>


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
    <div class="alert alert-success fixed-top" style="z-index: 99999" role="alert">
      {{ session()->get('success') }}
      <a href="#" wire:click="disableUpdate()" class="close" data-dismiss="alert">&times;</a>
      <script>
        setTimeout(() => {
          window.location.reload()
        }, 2000);
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
      <td rowspan="2" style="vertical-align: bottom;">
        <button wire:click="update({{ 1 }})" class="btn btn-sm btn-outline-danger py-0">Обновить</button>
      </td>
    </tr>
    <tr>
      <td>Address:</td>
      <td colspan="3">
        <textarea type="text" wire:model="address" class="form-control input-sm"></textarea>
      </td>
    </tr>

  </table>


  <hr>


  <div class="p-2"></div>
  <h3 class="mb-4">Внутренние страницы</h3>

  <form wire:submit.prevent="updatePages">
    @foreach ($pages as $index => $page)
      <div wire:key="post-field-{{ $page->id }}">
        <h5>{{ $page->title }}</h5>
        <div wire:ignore>
          <x-adminlte-text-editor wire:model.debounce.500ms="pages.{{ $index }}.content" :name="'content' . $page->id">
          </x-adminlte-text-editor>
        </div>

        {{-- <textarea wire:model="pages.{{ $index }}.content"></textarea> --}}
        @push('js')
          <script>
            setTimeout(() => {
              $("#content{{ $page->id }}").summernote().on('summernote.change', function(we, contents, $editable) {
                console.log('summernote\'s content is changed.');
                @this.set("pages.{{ $index }}.content", contents);
              });
            }, 1000);
          </script>
        @endpush
        <div class="p-2"></div>

      </div>
    @endforeach

    <button type="submit">Save</button>
  </form>


  <div class="p-4"></div>



</div>
