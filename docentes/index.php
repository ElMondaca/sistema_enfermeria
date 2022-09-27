<html>
<head lang="es">
  <title>Docentes</title>
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

<br><br><br>
<div class="container">
  <div class="col-lg-12">
    <div class="col-lg-12">
    <form class="form-horizontal">
        <fieldset>
          <legend>Búsqueda</legend>
          <div class="form-group">
            <label for="select">Ingrese apellido del Docente</label>
            <input type="text" class="form-control" id="apellido_docente">
            <button type="button" class="btn btn-primary" id="filtrar">Buscar</button>
            </div>
        </fieldset>
      </form>
    </div>
    <legend>Listado de Docentes</legend>
    <div class="col-lg-12" id="alumnos">
    </div>
  </div>
</div>


<script>
  $(document).ready(function() {
    $( "#alumnos" ).load( "ajax/docentes.php", function() {
    });

    $("#filtrar").click(function(){
      $.ajax({
        type: "POST",
        url: "ajax/salida_docente.php",
        data: "busqueda=" + $("#apellido_docente").val(),
        success: function(data) {
          $("#alumnos").html(data);
        },
        error: function(data){
          console.log(data);
        }
      });
    });

    $("#enviar").click(function(){
    $.ajax({
        type: "POST",
        url: "ajax/registro_alumno.php",
        data: "rut=" + $("#rut").val() +
        '&nalu=' + $("#nalu").val() +
        '&app=' + $("#app").val() +
        '&año=' + $("#año").val() +
        '&mail=' + $("#mail").val() +
        '&apm=' + $("#apm").val() ,
        success: function(data) {
          if(data.success) {
            $( "#alumnos" ).load( "ajax/docentes.php", function() {
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


  });
</script>
<script src="js/bootstrap.min.js"></script>


</body>
</hmtl>
