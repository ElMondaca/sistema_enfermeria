<html>
<head lang="es">
  <title>Inmunizaciones</title>
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
      <form class="form-horizontal">
        <fieldset>
          <legend>Búsqueda</legend>
          <div class="form-group">
            <label for="select">Ingrese apellido del estudiante</label>
            <input type="text" class="form-control" id="apellido_alumno">
            <button type="button" class="btn btn-primary" id="filtrar">Buscar</button>
            </div>
        </fieldset>
      </form>
    </div>
    <div class="col-lg-12" id="excel">
    <a href="excel_vacunados.php"><button class="btn btn-primary" id="excel">Historial de Vacunas Registradas</button></a></br>
    </div>
    <legend>Listado de estudiantes</legend>
    <div class="col-lg-12" id="alumnos">
    </div>
  </div>
</div>


<script>
  $(document).ready(function() {
    $( "#alumnos" ).load( "ajax/alumnos.php", function() {
    });

    $("#filtrar").click(function(){
      $.ajax({
        type: "POST",
        url: "ajax/salida_alumnos.php",
        data: "busqueda=" + $("#apellido_alumno").val(),
        success: function(data) {
          $("#alumnos").html(data);
        },
        error: function(data){
          console.log(data);
        }
      });
    });                    });
</script>
<script src="js/bootstrap.min.js"></script>


</body>
</hmtl>
