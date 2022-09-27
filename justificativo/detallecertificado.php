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
    require_once('ajax/conexion.php');
    $conexion = new conexion();
    $conexion->conectar();
    $id_cert = $_GET['id'];
 ?>
 <br><br><br>
    <div class="container">
      <div class="col-lg-12">
        <div class="col-lg-5">
          <div class="bs-component">
  					<div class="panel panel-primary">
  						<div class="panel-heading">
  							<h3 class="panel-title">Detalle del certificado</h3>
              </div>
                <?php
                $query2 = "SELECT certificado.id_certificado, alumno.rut_alumno, alumno.n_alumno, alumno.app_alumno,
                alumno.apm_alumno, emisor.n_emisor, certificado.diagnostico, certificado.fecha_emision,
                certificado.fecha_entrega, nivel.n_nivel, certificado.reposo
                FROM alumno, certificado, emisor, nivel
                WHERE certificado.n_alumno=alumno.rut_alumno AND certificado.n_nivel=nivel.id_nivel
                AND certificado.n_emisor=emisor.id_emisor
                AND certificado.id_certificado='$id_cert'";
                $q2 = $conexion->mysqli->query($query2);
                while ($certificado2 = $q2->fetch_object()):
                ?>
                  <div class="panel-body">
                  <p>Codigo certificado: <?=$certificado2->id_certificado?></p>
                  <p>Emisor del certificado: <?=$certificado2->n_emisor?></p>
                  <p>Nivel en curso: <?=$certificado2->n_nivel?></p>
                  <p>Motivo de inasistencia: <?=$certificado2->diagnostico?></p>
                  <p>Días de inasistencia: <?=$certificado2->reposo?></p>
                  <p>Fecha de emision del certificado: <?=$certificado2->fecha_emision?></p>
                  <p>Fecha de entrega del certificado: <?=$certificado2->fecha_entrega?></p>
                </div>
                <?php endwhile; ?>
  						</div>
              </div>
            </div>
        <div class="col-lg-7">
          <form class="form-horizontal">
            <fieldset>
              <legend>Registro de asignaturas a justificar</legend>
              <div class="form-group">
                <label>Unidad a justificar</label>
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
              <div class="form-group">
                <label>Actividad académica justificada</label>
                <select class="form-control" name="id_entidad" id="actividad">
                  <option value="0">SELECCIONE</option>
                  <option value="Teoria">Teoria</option>
                  <option value="Laboratorio">Laboratorio</option>
                  <option value="Evaluación">Evaluación</option>
                  <option value="Experiencia clínica">Experiencia clínica</option>
                </select>
              </div>
              <div class="form-group">
                <label>Docente responsable</label>
                <select class="form-control" name="docente" id="docente">
                  <option value="0">SELECCIONE</option>
                  <?php
                  $qequipo = "SELECT * FROM docente WHERE docente.estado_docente = 'Activo' ORDER BY n_docente ASC";
                  if($equ = $conexion->mysqli->query($qequipo)){
                    while($equipo = $equ->fetch_object()):
                  ?>
                    <option value="<?=$equipo->rut_docente?>"><?=$equipo->n_docente." ".$equipo->app_docente." ".$equipo->apm_docente?> </option>
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
              <div class="form-group">
                  <label for="fecha"></span>Fecha de inasistencia</label>
                  <input type="date" class="form-control" name="fecha" id="fecha">
              </div>
              <div class="form-group">
                  <button type="button" class="btn btn-primary" id="ingresar">Ingresar</button>
                </div>
              <div class="form-group">
                    <input type="hidden" id="id_cert" name="id_cert" value="<?php echo $id_cert; ?>">
                  </div>
            </fieldset>
          </form>
        </div>
    </div>
</div>
<div class="container">
  <div class="col-lg-12">
      <div class="bs-component">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Detalle de actividades</h3>
          </div>
          <div class="panel-form" id="detalles">

          </div>
          <!--<div class="form-group">
              <button type="button" class="btn btn-primary" id="eliminar"> Eliminar dato</button>
          </div>-->
    </div>
  </div>

</div>
    <script>
    $(document).ready(function() {
      $( "#detalles" ).load( "ajax/salida/detcertificado.php?id=<?php echo $id_cert?>",function() {
      });
      $( "#ingresar" ).click(function() {
        $.ajax({
          type: "POST",
          url: "ajax/salida/detcertificado.php",
          data: "unidad=" + $("#unidad").val()
          + '&actividad=' + $("#actividad").val()
          + '&certificado=' + $("#id_cert").val()
          + '&fecha=' + $("#fecha").val()
          + '&docente=' + $("#docente").val(),
          success: function(data) {
            $("#detalles").html(data);
          },
          error: function(data){
          console.log(data);
          }
        });
      });
      /*$( "#eliminar" ).click(function() {
        $.ajax({
          type: "POST",
          url: "ajax/ingreso/eliminar.php",
          data: "certificado=" + $("#id_cert").val(),
          success: function(data) {
            window.location.reload();
          },
          error: function(data){
          console.log(data);
        }
        });
      });*/
    });
    </script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
