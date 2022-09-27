<html>
<head lang="es">
  <title>Registro de asistencia</title>
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
  	<style>
  		input[type=number] {
  			max-width: 100px;
  		}
  	</style>
    <br><br>
    <div class="container">
        <div class="col-lg-12">
          <div class="col-lg-12">
            <form class="form-horizontal">
              <fieldset>
                <legend>Búsqueda</legend>
                <div class="form-group">
                  <label for="select">Ingrese Apellido del Estudiante</label>
                  <input type="text" class="form-control" id="apellido_alumno">
                  <button type="button" class="btn btn-primary" id="filtrar">Buscar</button>
                  </div>
              </fieldset>
            </form>
          </div>
            <div class="col-lg-12" id="alumnos">
            </div>
        </div>
</div>
      <script>
          $(document).ready(function() {
            $( "#alumnos" ).load( "ajax/salida/alumnos.php", function() {
      			});

  		$("#registro").click(function(){
      		$.ajax({
        		type: "POST",
        		url: "ajax/ingreso/registro.php",
        		data: "rut_usuario=" + $("#rut_usuario").val() + '&nombre_usuario=' + $("#nombre_usuario").val()
            + '&app_usuario=' + $("#app_usuario").val() + '&apm_usuario=' + $("#apm_usuario").val(),
        		success: function(data) {
        		if(data.success) {
        					$("#registro_mensaje").html("<h1>Registrado correctamente</h1>");
        		}
           	else {
          				$("#registro_mensaje").html("<h1>Ha ocurrido un error</h1>");
          	}
          	},
          	error: function(data){
          	console.log(data);
          	}
          });
        });

        $("#filtrar").click(function(){
       		$.ajax({
         		type: "POST",
         		url: "ajax/salida/alumnos.php",
         		data: "busqueda=" + $("#apellido_alumno").val(),
         		success: function(data) {
              $("#alumnos").html(data);
  					},
  					error: function(data){
  						console.log(data);
  					}
         });
       });

          });
      </script>
      <script src="js/bootstrap.min.js"></script>
</body>
</html>
