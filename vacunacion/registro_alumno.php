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
    <legend>Registro de Estudiante</legend>
    <div class="col-lg-12" id="registro">
      <form method="post" id="form_registro">
        <div class="form-group">
            Rut del estudiante: <input type="text" class="form-control" name="rut" id="rut">
        </div>
        <div class="form-group">
            Nombre:  <input type="text" class="form-control" name="nalu" id="nalu">
        </div>
        <div class="form-group">
            Apellido paterno: <input type="text" class="form-control" name="app" id="app">
        </div>
        <div class="form-group">
          Apellido Materno:<input type="text" class="form-control" name="apm" id="apm">
        </div>
        <div class="form-group">
          Telefono del estudiante:<input type="text" class="form-control" name="tel" id="tel">
        </div>
        <div class="form-group">
          Mail del estudiante:<input type="text" class="form-control" name="mail" id="mail">
        </div>
        <div class="form-group">
          Año de Ingreso:<input type="text" class="form-control" name="ingre" id="ingre">
        </div>
        <div class="form-group">
            <button type="button" class="btn btn-primary" id="enviar">Ingresar</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
                    $(document).ready(function() {

                     $("#enviar").click(function(){
                     $.ajax({
                         type: "POST",
                         url: "ajax/registro_alumno.php",
                         data: "rut=" + $("#rut").val() +
                         '&nalu=' + $("#nalu").val() +
                         '&app=' + $("#app").val() +
                         '&apm=' + $("#apm").val() +
                         '&tel=' + $("#tel").val() +
                         '&mail=' + $("#mail").val() +
                         '&ingre=' + $("#ingre").val(),
                         success: function(data) {
                           if(data.success) {
                             $( "#alumnos" ).load( "ajax/alumnos.php", function() {
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
