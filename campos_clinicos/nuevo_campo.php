<html>
<head lang="es">
  <title>Campos Clínicos</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link rel="stylesheet" href="css/bootstrap.css" media="screen">
  <link rel="stylesheet" href="assets/css/custom.min.css">
  <link rel="icon" href="img/favicon.png" type="image/png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
  <?php
require_once('include/nav.php');
?>

<div class="container">
  <br><br><br>
  <div class="col-lg-12">
    <legend>Registro de campos clínicos</legend>
    <div class="col-lg-12" id="registro">
      <form method="post" id="form_registro">
        <div class="form-group">
            Lugar de desarrollo: <input type="text" class="form-control" name="recinto" id="recinto">
        </div>
        <div class="form-group">
            Cupos:  <input type="text" class="form-control" name="cupos" id="cupos">
        </div>
        <div class="form-group">
            <button type="button" class="btn btn-primary" id="enviar">Ingresar</button>
        </div>
      </form>
    </div>
    <div class="col-lg-12">
      <legend>Campos registrados</legend>
      <div class="col-lg-12" id="campos">
      </div>
    </div>
  </div>
  <br><br>


<script src="js/bootstrap.min.js"></script>
<script>
      $(document).ready(function() {
        $( "#campos" ).load( "ajax/campos.php", function() {});
      });
      $("#enviar").click(function(){
      $.ajax({
          type: "POST",
          url: "ajax/nuevo_campo.php",
          data: "recinto=" + $("#recinto").val() +
          '&cupos=' + $("#cupos").val(),
          success: function(data) {
            if(data.success) {
              $( "#campos" ).load( "ajax/campos.php", function() {
              });
              document.getElementById("form_registro").reset();
            }
            else {
              console.log("error");
              console.log(data);
            }
          }, error: function(data){
            console.log("error");
            console.log(data);
          }
        });});




</script>

</body>
</hmtl>
