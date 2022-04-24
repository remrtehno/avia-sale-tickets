<form action="" method="get">
  <input type="hidden" name="user_id" value="{{ request('user_id') ?? null }}">
  <div class="row">
    <div class="col-12">
      <h5 class="text-bold">Выбрать другую дату:</h5>
    </div>
    <div class="col-md-3">От:</div>
    <div class="col-md-9">До:</div>
    <div class="col-md-3">
      <x-adminlte-input-date name="from" :value="$from" :config="$configDate" />
    </div>
    <div class="col-md-3">
      <x-adminlte-input-date name="to" :value="$to" :config="$configDate" />
    </div>
    <div class="col-md-3">
      <x-adminlte-button type="submit" label="Показать" />
      <a href="{{ route('dashboard.reports.index') }}" class="btn btn-default">Сброс фильтра</a>
    </div>
  </div>
</form>
