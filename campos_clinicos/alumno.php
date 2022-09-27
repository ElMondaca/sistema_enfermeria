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
    <legend>Menu Alumno.</legend>
    <div class="col-lg-12">
          Campos clínicos disponibles
    </div>
    <form method="post" id="form_registro">
    <div class="col-lg-12" id="campos">


    </div>
      <div class="form-group">
          <button type="button" class="btn btn-primary" id="enviar">Registrar</button>
      </div>
    </form>
  </div>
  <div class="col-lg-12" id="documentos">


  </div>

  </div>
  <br><br>


<script src="js/bootstrap.min.js"></script>
<script>
      $(document).ready(function() {
        $( "#campos" ).load( "ajax/inscripcion_campos.php", function() {});

        $("#enviar").click(function(){
          $("#documentos").load("ajax/form_documentos.php", function() {});
        });


      });



    </script>

</body>
</hmtl>
