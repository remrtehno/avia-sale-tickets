<div class="d-flex my-25" style="align-items: center">
  <div>
    <h4 class="my-0 py-0">наличными, или </h4>
    <h4 class="my-0 py-0">перевод с карты на карту</h4>
  </div>
  @auth
    <label class="switch mx-25">
      <input type="checkbox" id="cash-or-transfer" tab-1="#cash-or-card-transfer-link" tab-2="#transfer-link">
      <span class="slider round"></span>
    </label>
    <h4>перечислением</h4>
  @endauth
</div>


<ul class="nav nav-tabs" role="tablist" style="display: none">
  <li class="active"><a id="cash-or-card-transfer-link" href="#cash-or-card-transfer" role="tab"
      data-toggle="tab">Home</a></li>
  <li><a id="transfer-link" href="#transfer" role="tab" data-toggle="tab">Profile</a></li>
</ul>

@include('booking.partials._confirm-form-tab-content')
