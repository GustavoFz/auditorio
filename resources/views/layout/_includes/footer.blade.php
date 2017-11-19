<!-- Modal Login -->
<div id="modal-login" class="modal">
    <div class="modal-content">
        <ul class="tabs">
            <li class="tab col s3"><a href="#login">Login</a></li>
            <li class="tab col s3"><a href="#registro">Registrar</a></li>
        </ul>
    </div>
    <div id="login" class="col s12">
        <h4 class="center-align">Login</h4>

        <form class="" action="{{ route('site.login.entrar') }}" method="post">
            {{ csrf_field() }}
            @include('agendamento._form-login')
        </form>

    </div>
    <div id="registro" class="col s12">
        <h4 class="center-align">Registro</h4>
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
  $(document).ready(function(){
      $('ul.tabs').tabs();
  });

</script>
</body>
</html>
