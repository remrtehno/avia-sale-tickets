<h1>Email отправлен на адрес</h1>
@foreach (session()->get('emailCollection') as $key => $email)
  <a href="mailto:{{ $email }}">{{ $email }}</a>
  <br>
@endforeach


<p>Вы будете перенаправлены через
<div id="count"></div> секунд</p>
<script>
  count.innerHTML = 9;

  setInterval(() => {
    count.innerHTML = --count.innerHTML;

    if (count.innerHTML == '0') {
      window.location.href = "{{ $back }}";
    }
  }, 1000);
</script>
