<table id="{{ $uuid }}" :heads="$heads" :config="$config" class="table dataTable no-footer">
  <thead>
    <tr>
      @foreach ($heads as $th)
        <th @isset($th['width']) style="width:{{ $th['width'] }}%" @endisset
          @isset($th['no-export']) dt-no-export @endisset>
          {{ is_array($th) ? $th['label'] ?? '' : $th }}
        </th>
      @endforeach
    </tr>
  </thead>
  <tbody>{{ $slot }}</tbody>
</table>




@push('js')
  <script>
    $(document).ready(function() {
      $.fn.dataTable.moment('DD-MM-YYYY HH:mm:ss');

      setTimeout(() => {
        $('#{{ $uuid }}').DataTable(@json($config));
      }, 1000);
    });
  </script>
@endpush
