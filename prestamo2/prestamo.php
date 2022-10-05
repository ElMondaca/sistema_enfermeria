<html lang="es">
<head>
  <title>Prestamo de equipo</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link rel="stylesheet" href="css/bootstrap.css" media="screen">
  <link rel="stylesheet" href="assets/css/custom.min.css">
  <link rel="icon" href="img/favicon.png" type="image/png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script></head>
<body>
<?php
    	require_once('include/nav.php');
    	require_once('ajax/conexion.php');
    	$conexion = new conexion();
    	$conexion->conectar();
      ?>

      <div class="container">
        <br><br><br>
        <div class="col-lg-12">
          <legend>Datos del prestamo</legend>
          <form method="post" id="form_registro">
          <div class="form-group">
              <label for="select" class="col-lg-8 control-label">Estudiante que solicita:</label>
              <div class="col-lg-12">
                <select class="form-control" name="rut_alumno" id="rut_alumno">
                  <option value="0">Seleccionar</option>
                  <?php
                  $qalumno = "SELECT * FROM alumno ORDER BY rut_alumno ASC";
                  if($alu = $conexion->mysqli->query($qalumno)){
                    while($estu = $alu->fetch_object()):

                  ?>
                    <option value="<?=$estu->rut_alumno?>"><?=$estu->rut_alumno." ".$estu->n_alumno." ".$estu->app_alumno." ".$estu->app_alumno?> </option>
                    <?php
                  endwhile;
                  }
                  else{
                    print_r(json_encode(array("error" => $conexion->mysqli->error)));
                    exit();
                  }
                  ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                  <label for="contacto" class="col-lg-8 control-label"></span>Email del estudiante</label>
                  <input type="text" class="form-control" name="contacto" id="contacto">
              </div>
              <div class="form-group">
                  <label for="diagnostico" class="col-lg-8 control-label">Teléfono Estudiante</label>
                  <input type="text" class="form-control" name="telefono" id="telefono">
              </div>
              <div class="form-group">
              <label for="select" class="col-lg-8 control-label">Equipo Disponible:</label>
              <div class="col-lg-12">
                <select class="form-control" name="id_equipo" id="id_equipo">
                  <option value="0">Seleccionar</option>
                  <?php
                  $qequipo = "SELECT * FROM equipo WHERE estado_equipo = 'Disponible'";
                  if($equ = $conexion->mysqli->query($qequipo)){
                    while($equipo = $equ->fetch_object()):
                  ?>
                    <option value="<?=$equipo->id_equipo?>"><?=$equipo->id_equipo." ".$equipo->n_equipo." ".$equipo->det_equipo." ".$equipo->observ_equipo?> </option>
                    <?php
                  endwhile;
                  }
                  else{
                    print_r(json_encode(array("error" => $conexion->mysqli->error)));
                    exit();
                  }
                  ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                  <label for="fecha_emision" class="col-lg-8 control-label"></span>Fecha de solicitud</label>
                  <input type="date" class="form-control" name="solicitud" id="solicitud">
              </div>
              <div class="form-group">
                  <label for="fecha_emision" class="col-lg-8 control-label"></span>Fecha estimada de devolución</label>
                  <input type="date" class="form-control" name="solicitud" id="solicitud">
              </div>
              <div class="form-group">
                  <label for="diagnostico" class="col-lg-8 control-label">Actividad a realizar</label>
                  <input type="text" class="form-control" name="actividad" id="actividad">
              </div>
              <div class="form-group">
                <label for="select" class="col-lg-8 control-label">Asignatura </label>
                <div class="col-lg-12">
                <select class="form-control" name="id_entidad" id="unidad">
                  <option value="0">SELECCIONE</option>
                  <option value="Fundamentos teoricos de Enfermeria">Fundamentos teoricos de Enfermeria</option>
                  <option value="Filosofia">Filosofia</option>
                  <option value="Interaccion Humana">Interaccion Humana</option>
                  <option value="Psicologia General">Psicologia General</option>
                  <option value="Biologia">Biologia</option>
                  <option value="Matematicas">Matemáticas</option>
                  <option value="Quimica General">Quimica General</option>
                  <option value="Anatomia Humana">Anatomia Humana</option>
                  <option value="Proceso de Enfermeria">Proceso de Enfermeria</option>
                  <option value="Ciencias de la Salud Comunitaria">Ciencias de la Salud Comunitaria</option>
                  <option value="Socio Antropologia">Socio Antropologia</option>
                  <option value="Psicologia evolutiva">Psicologia evolutiva</option>
                  <option value="Enfermeria Psicosocial">Enfermeria Psicosocial</option>
                  <option value="Fisica">Fisica</option>
                  <option value="Bioquimica">Bioquimica</option>
                  <option value="Histologia y embriologia">Histologia y embriologia</option>
                  <option value="Anatomia II">Anatomia II</option>
                  <option value="Fisiologia">Fisiologia</option>
                  <option value="Microbiologia y parasitologia">Microbiologia y parasitologia</option>
                  <option value="Proceso de Enfermeria I">Proceso de Enfermeria I</option>
                  <option value="Administracion en Enfermeria">Administracion en Enfermeria</option>
                  <option value="Estadistica de la Salud">Estadistica de la Salud</option>
                  <option value="Higiene y primeros auxilios">Higiene y primeros auxilios</option>
                  <option value="Educacion para el autocuidado">Educacion para el autocuidado</option>
                  <option value="Psicologia social">Psicologia social</option>
                  <option value="Proceso de Enfermeria psicosocial">Proceso de Enfermeria psicosocial</option>
                  <option value="Fisiopatologia">Fisiopatologia</option>
                  <option value="Farmacologia">Farmacologia</option>
                  <option value="Proceso de Enfermeria II">Proceso de Enfermeria II</option>
                  <option value="Administracion y liderazgo en Enfermeria">Administracion y liderazgo en Enfermeria</option>
                  <option value="Enfermeria en salud Comunitaria I">Enfermeria en salud Comunitaria I</option>
                  <option value="Administracion en Enfermeria">Administracion en Enfermeria</option>
                  <option value="Enfermeria de la mujer">Enfermeria de la mujer</option>
                  <option value="Proceso de enfermeria de la mujer">Proceso de enfermeria de la mujer</option>
                  <option value="Enfermeria en salud mental">Enfermeria en salud mental</option>
                  <option value="Proceso de enfermeria en salud mental">Proceso de enfermeria en salud mental</option>
                  <option value="Enfermeria del adulto">Enfermeria del adulto</option>
                  <option value="Proceso de enfermeria del adulto">Proceso de enfermeria del adulto</option>
                  <option value="Proceso de enfermeria en salud comunitaria I">Proceso de enfermeria en salud comunitaria I</option>
                  <option value="Enfermeria en adulto II">Enfermeria en adulto II</option>
                  <option value="Proceso de enfermeria del adulto II">Proceso de enfermeria del adulto II</option>
                  <option value="Enfermeria en emergencias y desastres">Enfermeria en emergencias y desastres</option>
                  <option value="Enfermeria en salud comunitaria II">Enfermeria en salud comunitaria II</option>
                  <option value="Enfermeria en epidemiologia">Enfermeria en epidemiologia</option>
                  <option value="Proceso de enfermeria del nino">Proceso de enfermeria del nino</option>
                  <option value="Proceso de enfermeria del adolescente">Proceso de enfermeria del adolescente</option>
                  <option value="Administracion y liderazgo en enfermeria">Administracion y liderazgo en enfermeria</option>
                  <option value="Bioetica">Bioetica</option>
                  <option value="Investigacion en enfermeria">Investigacion en enfermeria</option>
                  <option value="Enfermeria del nino y del adolescente">Enfermeria del nino y del adolescente</option>
                  <option value="Enfermeria en salud ocupacional">Enfermeria en salud ocupacional</option>
                  <option value="Investigacion en Enfermeria">Investigacion en Enfermeria</option>
                  <option value="Proceso de enfermeria rural">Proceso de enfermeria rural</option>
                  <option value="Proceso de enfermeria en emergencias">Proceso de enfermeria en emergencias</option>
                  <option value="Internado profesional I">Internado profesional I</option>
                  <option value="Internado profesional II">Internado profesional II</option>
                </select>
              </div>
                </div>
              </div>
              <div class="form-group">
                <label for="select" class="col-lg-8 control-label">Docente a cargo</label>
                <div class="col-lg-12">
                  <select class="form-control" name="docente" id="docente">
                    <option value="0">Seleccione</option>
                    <?php
                    $qdocente = "SELECT * FROM docente ORDER BY rut_docente ASC";
                    if($vd = $conexion->mysqli->query($qdocente)){
                      while($doce = $vd->fetch_object()):
                        ?>
                        <option value="<?=$doce->rut_docente?>"><?=$doce->n_docente." ".$doce->app_docente." ".$doce->apm_docente?></option>
                    <?php
                  endwhile;
                    }
                    else{
                      print_r(json_encode(array("error" => $conexion->mysqli->error)));
                      exit();
                    }
                     ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                  <label for="diagnostico" class="col-lg-8 control-label">Dirección de la actividad</label>
                  <input type="text" class="form-control" name="direccion" id="direccion">
              </div>
            <div class="form-group">
                <label for="diagnostico" class="col-lg-8 control-label">Observaciones</label>
                <input type="text" class="form-control" name="observacion" id="observacion">
            </div>
              <div class="form-group">
								<div class="col-lg-10 col-lg-offset-2">
									<button type="button" class="btn btn-primary" id="enviar">Ingresar</button>
								</div>
              </div>
        </form>
      </div>


      <script src="js/bootstrap.min.js"></script>
      <script>
            $(document).ready(function() {
    			$("#enviar").click(function(){
    			$.ajax({
    					type: "POST",
    					url: "ajax/prestamo.php",
    					data: "equipo=" + $("#id_equipo").val() +
              '&alumno=' + $("#rut_alumno").val() +
              '&direccion=' + $("#direccion").val() +
              '&solicitud=' + $("#solicitud").val() +
              '&docente=' + $("#docente").val() +
              '&actividad=' + $("#actividad").val() +
              '&contacto=' + $("#contacto").val() +
              '&telefono=' + $("#telefono").val() +
              '&observacion=' + $("#observacion").val() +
              '&asignatura=' + $("#asignatura").val(),
    					success: function(data) {
    						if(data.success) {
    							$("#form_registro").html('<h1><center>Prestamo ingresado</center></h1>');
                  window.setTimeout(function () { location.replace("verp.php"); }, 3000);
    						}
    						else {
    							console.log("error");
                  console.log(data);
    						}
    					}, error: function(data){
    						console.log("error");
    						console.log(data);
    					}
    				});});});
        </script>
    </body>
    </html>
