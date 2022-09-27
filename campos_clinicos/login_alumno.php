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
    <legend>Acceso alumno</legend>
    <form method="post" id="form_registro">
      <div class="form-group">
          Correo de usuario: <input type="text" class="form-control" name="idalu" id="idalu">
      </div>
      <div class="form-group">
          Contraseña:  <input type="password" class="form-control" name="passalu" id="passalu">
      </div>
      <div class="form-group">
          <button type="button" class="btn btn-primary" id="enviar">Ingresar</button>
      </div>
    </form>
  </div>
  <div class="col-lg-12" id="menu_alumno">

  </div>
</div>
  <br><br>


<script src="js/bootstrap.min.js"></script>

<script>

      $("#enviar").click(function(){
      $.ajax({
          type: "POST",
          url: "ajax/menu_alumno.php",
          data: "idalu=" + $("#idalu").val() +
          '&passalu=' + $("#passalu").val(),
          success: function(data) {
            if(data.success) {
              $( "#menu_alumno" ).load( "ajax/menu_alumno.php", function() {
              });
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
