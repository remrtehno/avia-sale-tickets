@php
$heads = ['дата платежки', 'сумма', 'Покупатель', 'Рейс', 'тариф', ['label' => 'Действия', 'no-export' => true, 'width' => 5]];

$config = [
    'order' => [[1, 'desc']],
    'language' => ['url' => '/lang/datatable/ru.json'],
];
@endphp

@section('plugins.Select2', true)

<div>
  {{-- The Master doesn't talk, he acts. --}}

  @if (session()->has('success'))
    <script>
      window.location.reload()
    </script>
  @endif

  @if (!$isOpen)
    <x-adminlte-datatable wire:ignore id="table1" :heads="$heads" :config="$config">
      @foreach ($topPayments as $topPaymentItem)
        <tr>
          <td>{{ $topPaymentItem->date }}</td>
          <td>{{ $topPaymentItem->getSum() }} UZS</td>
          <td>{{ $topPaymentItem->customer->name }} {{ $topPaymentItem->customer->email }}</td>
          <td>{{ $topPaymentItem->flight->getSummary() }}</td>
          <td>{{ $topPaymentItem->tariff }}</td>
          <td>
            <button wire:click="edit({{ $topPaymentItem->id }})" class="btn btn-primary btn-sm reset-select2"><i
                class="fa fa-lg fa-fw fa-pen"></i></button>
            <button wire:click="delete({{ $topPaymentItem->id }})" class="btn btn-danger btn-sm"><i
                class="fa fa-lg fa-fw fa-trash"></i></button>
          </td>
        </tr>
      @endforeach

    </x-adminlte-datatable>

    <x-adminlte-button label="Создать" wire:click="create" data-toggle="modal" data-target="#modalPurple"
      class="bg-purple reset-select2" />
  @endif

  <x-adminlte-modal wire:ignore.self wire:key="second" id="modalPurple" title="Добавить запись" theme="purple"
    icon="fas fa-bolt" size='lg' disable-animations>
    <form>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="exampleFormControlInput1">Дата платежки</label>
            <small class="badge bg-warning">
              @if ($topPayment->date)
                {{ $topPayment->date }}
              @endif
            </small>
            <input required type="datetime-local" class="form-control" id="exampleFormControlInput1"
              wire:model="topPayment.date">
            @error('topPayment.date')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="exampleFormControlInput1">Сумма</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" wire:model="topPayment.sum">
            @error('topPayment.sum')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="flight_id">Рейс</label>
            <br>
            <div wire:ignore>
              <x-adminlte-select2 required name="flight_id">
                <option>Выбрать</option>
                @foreach ($flights as $flight)
                  <option value="{{ $flight->id }}" @if ($topPayment->flight_id === $flight->id) selected @endif>
                    {{ $flight->getSummary() }}
                  </option>
                @endforeach
              </x-adminlte-select2>
            </div>
            @error('topPayment.flight_id')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="exampleFormControlInput1">Продавец</label>
            <br>
            <div wire:ignore>
              <x-adminlte-select disabled required name="seller_id" class="w-100"
                wire:model="topPayment.seller_id">
                <option selected>{{ auth()->user()->getSummary() }}</option>
              </x-adminlte-select>
            </div>
            @error('topPayment.seller_id')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="exampleFormControlInput1">Покупатель</label>
            <div wire:ignore>
              <x-adminlte-select2 required name="customer_id" class="w-100"
                wire:model="topPayment.customer_id">
                <option>Выбрать</option>
                @foreach ($users as $user)
                  <option value="{{ $user->id }}" @if ($topPayment->customer_id === $user->id) selected @endif>
                    {{ $user->name }} {{ $user->email }}
                  </option>
                @endforeach
              </x-adminlte-select2>
            </div>
            @error('topPayment.customer_id')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="exampleFormControlInput1">Тариф</label>
            <div wire:ignore>
              <x-adminlte-select required name="tariff" class="w-100" wire:model="topPayment.tariff">
                <option>Выбрать</option>
                @foreach ($periods as $key => $period)
                  <option value="{{ $key }}" @if ($topPayment->tariff === $key) selected @endif>
                    {{ $key }}
                  </option>
                @endforeach
              </x-adminlte-select>
            </div>
            @error('topPayment.tariff')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
      </div>

    </form>

    <x-slot name="footerSlot">
      <x-adminlte-button class="mr-auto reset-select2" type="submit" theme="success" :label="__('common.save')"
        wire:click.prevent="store()" />
      <x-adminlte-button theme="danger" label="Закрыть" data-dismiss="modal" />
    </x-slot>
  </x-adminlte-modal>

</div>




@push('js')
  <script>
    $(document).ready(function() {
      $('.select2-hidden-accessible').on('change', function(e) {
        var data = $(this).select2("val");
        @this.set('topPayment.' + this.name, data);
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
