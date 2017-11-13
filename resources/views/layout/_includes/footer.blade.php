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
  $('.modal-trigger').on('click', function(){
      var id = $(this).data('id'); // vamos buscar o valor do atributo data-id
  });


</script>
</body>
</html>
