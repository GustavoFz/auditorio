<!-- Modal Login -->
<div id="modal-login" class="modal">
    <div class="modal-content">
        <div id="login" class="col s12">
            <h4 class="center-align">Login</h4>

            <form class="" action="{{ route('login') }}" method="post">
                {{ csrf_field() }}
                @include('agendamento._form-login')
            </form>
        </div>
    </div>
</div>


<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        Materialize.updateTextFields();
        $(".button-collapse").sideNav();
    });

    $(document).ready(function () {
        $('select').material_select();
    });

    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15, // Creates a dropdown of 15 years to control year,
        today: 'Hoje',
        clear: 'Limpar',
        close: 'Ok',
        closeOnSelect: true, // Close upon selecting a date,
        format: 'yyyy-mm-dd'
    });

    $(document).ready(function () {
        // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
        $('.modal').modal();
    });

    function erroFormulario() {
        Materialize.toast('I am a toast!', 4000);
    }

    $(document).ready(function () {
        $('ul.tabs').tabs();
    });

  // DISPARA METODO E ATUALIZA PAGINA AO SELECIONAR UM TIPO DE PERMISSÃO
    $('.mudar-permissao').change(function () {
       // var id4 = $(this).attr("id");
       // var id3 = document.getElementById('pega-id');
      //  var id2 = $('.pega-email').text();
        var id = jQuery(this).val();
        alert(id);
        //adicionar metodos aqui!
        location.reload();
    })
</script>
</body>
</html>
