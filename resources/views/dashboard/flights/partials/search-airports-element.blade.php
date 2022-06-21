<x-adminlte-input enable-old-support :disabled="$disabled" :name="$name" :value="$value" :placeholder="$placeholder"
  class="search-city" fgroup-class="col-md-6">
</x-adminlte-input>


@once
  @push('css')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  @endpush

  @push('js')
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script>
      $(() => {
        $(".search-city").autocomplete({
          source: function(request, response) {
            $.ajax({
              url: "https://autocomplete.travelpayouts.com/jravia?locale=en&with_countries=false",
              dataType: "jsonp",
              data: {
                q: request.term
              },
              success: function(data) {
                response(data.map(({
                  city_fullname,
                  code,
                  title,
                  country_name,
                  country_code
                }, index) => {
                  if (title.length > 12) {
                    return `${country_code} ${title} (${code})`;
                  }
                  return `${country_name} ${title} (${code})`
                }));
              }
            });
          },
          minLength: 2,
          select: function(event, ui) {
            //log("Selected: " + ui.item.value + " aka " + ui.item.id);
          }

        })

        return;
        $('.search-city').select2({
          "theme": "bootstrap4",
          minimumInputLength: 1,
          'ajax': {
            'url': "https://autocomplete.travelpayouts.com/jravia?locale=en&with_countries=false",
            'dataType': 'json',
            'cache': true,
            delay: 500,
            processResults: function(data, params) {
              return {
                results: data.map(({
                  city_fullname,
                  code,
                  title,
                  country_name,
                }, index) => ({
                  id: index,
                  text: `${country_name} ${title} (${code})`
                })),

              };
            },
            cache: true
          },
        });



      })
    </script>
  @endpush

@endonce
