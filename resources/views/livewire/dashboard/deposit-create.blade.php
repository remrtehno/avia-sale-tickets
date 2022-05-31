@section('plugins.Select2', true)

<div>
  @if (session()->has('success'))
    <script>
      window.location.href = "{{ route('dashboard.deposit.index') }}";
    </script>
  @endif
  {{-- Do your work, then step back. --}}
  <form>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="exampleFormControlInput1">Дата платежки</label>
          <small class="badge bg-warning">{{ $deposit->date }}</small>
          <input type="datetime-local" class="form-control" id="exampleFormControlInput1" wire:model="deposit.date">
          @error('deposit.date')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label for="exampleFormControlInput2">Сумма</label>
          <input type="text" class="form-control" id="exampleFormControlInput2" wire:model="deposit.sum">
          @error('deposit.sum')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <div wire:ignore>
            <x-adminlte-select2 name="customer_id" label="Покупатель">
              <option value="">Выбрать</option>
              @foreach ($users as $user)
                <option @if ($user->id === $deposit->customer_id) selected @endif value="{{ $user->id }}">
                  {{ $user->getSummary() }}</option>
              @endforeach
            </x-adminlte-select2>
          </div>
          @error('deposit.customer_id')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label for="exampleFormControlInput2">Комментарий</label>
          <textarea type="text" class="form-control" id="exampleFormControlInput2" wire:model="deposit.comment"></textarea>
          @error('deposit.comment')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
    </div>


    <button wire:click.prevent="store()" class="btn btn-success">Save</button>
  </form>
</div>



@push('js')
  <script>
    function setParams() {
      $('.select2-hidden-accessible').each(function(e) {
        var data = $(this).select2("val");
        @this.set('deposit.' + this.name, data);
      });
    }

    $(document).ready(function() {

      if ({{ $depositId ?? 0 }}) {
        setParams();
      }

      $('.select2-hidden-accessible').on('change', function(e) {
        var data = $(this).select2("val");
        @this.set('deposit.' + this.name, data);
      });

      $(document).on('click', '.reset-select2', function() {
        $('#modalPurple').modal('show')
        setTimeout(() => {
          $('.select2-hidden-accessible').select2()
        }, 500);
      })
    });
  </script>
@endpush
