@extends('layout')

@section('content')
  <x-breadcrumbs>
    Форма для жалоб и предложений
  </x-breadcrumbs>



  <div id="content" v-pre style="min-height: 40vh;">

    <div class="container" style="padding: 0px;display: flex;justify-content: center;">
      <div class="col-sm-6 m-auto">

        <h4 class="text-center py-25">ФОРМА ОБРАТНОЙ СВЯЗИ</h4>

        <div id="note"></div>
        <div id="fields">
          <form id="ajax-contact-form" class="form-horizontal" action="javascript:alert('success!');">

            <div class="form-group">
              <label for="inputName">Your Name</label>
              <input type="text" class="form-control" id="inputName" name="name" value="Full Name"
                onBlur="if(this.value=='') this.value='Full Name'" onFocus="if(this.value =='Full Name' ) this.value=''">
            </div>

            <div class="form-group">
              <label for="inputEmail">Email</label>
              <input type="text" class="form-control" id="inputEmail" name="email" value="E-mail address"
                onBlur="if(this.value=='') this.value='E-mail address'"
                onFocus="if(this.value =='E-mail address' ) this.value=''">
            </div>


            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="inputMessage">Your Message</label>
                  <textarea class="form-control" rows="7" id="inputMessage" name="content"
                    onBlur="if(this.value=='') this.value='Message'"
                    onFocus="if(this.value =='Message' ) this.value=''">Message</textarea>
                </div>
              </div>
            </div>
            <button type="submit" class="btn-default btn-cf-submit">send message</button>
          </form>
        </div>


      </div>
    </div>
  </div>
@endsection
