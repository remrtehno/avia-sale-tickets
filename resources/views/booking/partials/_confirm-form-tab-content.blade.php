<div class="tab-content">
  <div role="tabpanel" class="tab-pane fade in active" id="cash-or-card-transfer">
    <textarea rows="5" class="form-control resize-off" rows="3" placeholder="Комментарий..."></textarea>
  </div>
  <div role="tabpanel" class="tab-pane fade" id="transfer">

    @if (Auth::user()->isOrg())

      Ваш депозит: 0
      
    @elseif (Auth::user()->isInd())
      <div class="alert alert-warning" role="alert">
        Вы не можете оплатить перечислением, так как вы явялетесь Физ. лицом.
        Для того что-бы оплатить перечислением, вам не обходимо скачать бланки, 
        заполнить их и отправить на Email администратору на адрес {!! $contacts->email_footer !!}.
      </div>
      
      <a href="#">Бланк 1</a> <a href="#">Бланк 2</a>
      <div class="py-10"></div>
      

    @endif

  </div>
</div>


