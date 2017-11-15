<!-- Modal Login -->
<div id="modal-login" class="modal">
    <div class="modal-content">
        <h4 class="center-align">Login</h4>

        <form class="" action="{{ route('site.login.entrar') }}" method="post">
            {{ csrf_field() }}
            @include('agendamento._form-login')
        </form>
        
        <a href="{{ route('site.login.sair') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>

        <form id="logout-form" action="{{ route('site.login.sair') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>

    </div>
</div>


<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
     Materialize.updateTextFields();
     $(".button-collapse").sideNav();
  });

   $(document).ready(function() {
    $('select').material_select();
  });

   $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year,
    today: 'Today',
    clear: 'Clear',
    close: 'Ok',
    closeOnSelect: false // Close upon selecting a date,
  });

  $(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });

  function erroFormulario(){
      Materialize.toast('I am a toast!', 4000);
  }
  /*------------CARREGAMENTO AJAX------------*/
  $(document).ready(function(){
      // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered$('.btn_carrega_conteudo
      $('.btn_carrega_conteudo').click(function () {

          var carrega_url = this.id;
          carrega_url = carrega_url;

          $.ajax({

              url: carrega_url,
              success: function (data) {
                  $('#div_conteudo').html(data);
              },

              beforeSend: function () {
                  $('loader').css({display:"block"})
              },

              complete: function () {
                  $('loader').css({display:"none  "})
              }
          })
      })
  });
</script>
</body>
</html>
