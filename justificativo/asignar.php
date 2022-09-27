<html lang="es">
<head>
  <title>Registro de asistencia</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link rel="stylesheet" href="css/bootstrap.css" media="screen">
  <link rel="stylesheet" href="assets/css/custom.min.css">
  <link rel="icon" href="img/favicon.png" type="image/png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script></head>
<body>
  <br><br><br>
      <?php
    	require_once('include/nav.php');
    	require_once('ajax/conexion.php');
    	$conexion = new conexion();
    	$conexion->conectar();
    	$r_alumno = $_GET['id'];
      $query = "SELECT * FROM alumno WHERE rut_alumno = '$r_alumno'";
    	if($q = $conexion->mysqli->query($query)) {
        $datos=$q->fetch_object();
      }else{
        print_r(json_encode(array("error" => $conexion->mysqli->error)));
				exit();
      }
      ?>
      <div class="container">
        <div class="col-lg-4">
          <legend>Datos del Estudiante</legend>
          <div class="panel-body">
            <p>Rut Estudiante: <?=$datos->rut_alumno?></p>
            <p>Nombre: <?=$datos->n_alumno?></p>
            <p>Apellido paterno: <?=$datos->app_alumno?></p>
            <p>Apellido materno: <?=$datos->apm_alumno?></p>
          </div>
        </div>
        <div class="col-lg-8">
          <legend>Detalle de certificado</legend>
          <form method="post" id="form_registro">
            <div class="form-group">
              <label for="select" class="col-lg-8 control-label">Entidad emisora del justificativo</label>
              <div class="col-lg-12">
                <select class="form-control" name="id_entidad" id="id_entidad">
                  <option value="0">SELECCIONE</option>
                  <?php
                  if($entidades = $conexion->mysqli->query("SELECT * FROM emisor ORDER BY n_emisor ASC")) {
                		while ($entidad = $entidades->fetch_object()) {
                			$datos_entidad[] = (object)array("id_emisor" => $entidad->id_emisor, "n_emisor" => $entidad->n_emisor);
                		}
                		$entidades->close();
                		$datos_entidad = (object)$datos_entidad;
                	}
                	else {
                		echo 'ha ocurrido un error en la base de datos';
                		exit();
                	}
                  foreach($datos_entidad as $entidad):
                  ?>
                  <option value="<?=$entidad->id_emisor?>"><?=$entidad->n_emisor?></option>
                  <?php
                  endforeach;
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="select" class="col-lg-8 control-label">Nivel en curso</label>
              <div class="col-lg-12">
                <select class="form-control" name="id_nivel" id="id_nivel">
                  <option value="0">SELECCIONE</option>
                  <?php
                  if($ni8vel = $conexion->mysqli->query("SELECT * FROM nivel")) {
                    while ($nivel = $ni8vel->fetch_object()) {
                      $datos_nivel[] = (object)array("id_nivel" => $nivel->id_nivel, "n_nivel" => $nivel->n_nivel);
                    }
                    $ni8vel->close();
                    $datos_nivel = (object)$datos_nivel;
                  }
                  else {
                    echo 'ha ocurrido un error en la base de datos';
                    exit();
                  }
                  foreach($datos_nivel as $nivel):
                  ?>
                  <option value="<?=$nivel->id_nivel?>"><?=$nivel->n_nivel?></option>
                  <?php
                  endforeach;
                  ?>
                </select>
              </div>
            </div>
              <div class="form-group"><br>
                  <label for="diagnostico" class="col-lg-8 control-label">Motivo de inasistencia</label>
                  <input type="text" class="form-control" name="diagnostico" id="diagnostico">
              </div>
              <div class="form-group"><br>
                  <label for="diagnostico" class="col-lg-8 control-label">Días de reposo</label>
                  <input type="text" class="form-control" name="reposo" id="reposo">
              </div>
              <div class="form-group">
                  <label for="emision" class="col-lg-8 control-label"></span>Fecha de emisión del justificativo</label>
                  <input type="date" class="form-control" name="emision" id="emision">
              </div>
              <div class="form-group">
                  <label for="entrega" class="col-lg-8 control-label"></span>Fecha de recepción del justificativo</label>
                  <input type="date" class="form-control" name="entrega" id="entrega">
              </div>
              <div class="form-group">
                  <input type="hidden" id="rut_alumno" name="rut_alumno" value="<?php echo $r_alumno ?>">
              </div>
              <div class="form-group">
								<div class="col-lg-10 col-lg-offset-2">
									<button type="button" class="btn btn-primary" id="enviar">Ingresar</button>
								</div>
              </div>
          </feorm>
      </div>
      <script src="js/bootstrap.min.js"></script>
      <script>
            $(document).ready(function() {
    			$("#enviar").click(function(){
    			$.ajax({
    					type: "POST",
    					url: "ajax/ingreso/asignacion.php",
    					data: "entidad=" + $("#id_entidad").val() +
              '&nivel=' + $("#id_nivel").val() +
              '&diagnostico=' + $("#diagnostico").val() +
              '&reposo=' + $("#reposo").val() +
              '&emision=' + $("#emision").val() +
              '&entrega=' + $("#entrega").val() +
              '&alumno=' + $("#rut_alumno").val(),
    					success: function(data) {
    						if(data.success) {
    							$("#form_registro").html('<h1><center>Certificado registrado</center></h1><br><a href="index.php">Volver al inicio</a>');
    						}
    						else {
    							console.log("error");
    						}
    					}, error: function(data){
    						console.log("error");
    						console.log(data);
    					}
    				});});});
        </script>
</body>
</html>
