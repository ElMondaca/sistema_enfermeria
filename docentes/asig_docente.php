<html>
<head lang="es">
  <title>Admin. Docentes</title>
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
  require_once('ajax/conexion.php');
require_once('include/nav.php');
$rut_alumno = $_GET['id'];
$conexion = new conexion();
$conexion->conectar();
$r_alumno = $_GET['id'];
$query = "SELECT * FROM docente WHERE docente.rut_docente = '$r_alumno'";
if($q = $conexion->mysqli->query($query)) {
  $datos=$q->fetch_object();
}else{
  print_r(json_encode(array("error" => $conexion->mysqli->error)));
  exit();
}
?>
<br><br>
<div class="container">
  <div class="col-lg-4">
    <legend>Datos del Docente.</legend>
    <div class="panel-body">
      <p>Rut Docente: <?=$datos->rut_docente?></p>
      <p>Nombre: <?=$datos->n_docente." ".$datos->app_docente." ".$datos->apm_docente?></p>
      <p>Titulo Profesional: <?=$datos->titulo_docente?></p>
      <p>Especialidad: <?=$datos->esp_docente?></p>
      <p>Mail: <?=$datos->mail_docente?></p>
      <p>Inicio actividades en Universidad: <?=$datos->ingreso_docente?></p>
      <p>Departamento adscrito: <?=$datos->depto_docente?></p>
      <p>Estado del docente: <?=$datos->estado_docente?></p>
      <p>Grado académico: <?=$datos->grado_academico?></p>
      <p>Jerarquía: <?=$datos->jerar_docente?></p>
    </div>
  </div>
  <div class="col-lg-8" id="actividad">
    <legend>Registro de Asignatura impartida</legend>
    <form method="post" id="form_registro">
      <div class="form-group">
        Asignatura Impartida
        <select class="form-control" name="asignatura" id="asignatura">
          <option value="0">SELECCIONE</option>
        <?php
        $qequipo = "SELECT * FROM asignatura";
        if($equ = $conexion->mysqli->query($qequipo)){
          while($equipo = $equ->fetch_object()):
        ?>
          <option value="<?=$equipo->id_asignatura?>"><?=$equipo->n_asignatura?> </option>
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
          Tipo de Jornada:
          <select class="form-control" name="contrato" id="contrato">
            <option value="0">SELECCIONE</option>
            <option value="Parcial">Parcial</option>
            <option value="Completa">Completa</option>
          </select>
      </div>
      <div class="form-group">
          Tipo de Contrato:
          <select class="form-control" name="horas" id="horas">
            <option value="0">SELECCIONE</option>
            <option value="Honorarios">Honorarios</option>
            <option value="Media Jornada">Media Jornada</option>
            <option value="Jornada Completa">Jornada Completa</option>
          </select>
      </div>
      <div class="form-group">
          Año de colaboración: <input type="text" class="form-control" name="colab" id="colab">
      </div>
      <div class="form-group">
        <input type="hidden" name="rut_doc" value="<?php echo $r_alumno;?>" id="rut_doc">
      </div>
      <div class="form-group">
        <button type="button" class="btn btn-primary" id="enviar">Ingresar</button>
      </div>
    </form>
  </div>
  <div class="col-lg-12" id="actividades_doc" name="actividades_doc">


  </div>
</div>


<script>
                    $(document).ready(function(){

                      $( "#actividades_doc" ).load( "ajax/actividades.php?id=<?php echo $r_alumno;?>", function() {});


                      $("#enviar").click(function(){
                      $.ajax({
                          type: "POST",
                          url: "ajax/registro_actividad.php",
                          data: "rut_doc=" + $("#rut_doc").val() +
                          '&contrato=' + $("#contrato").val() +
                          '&colab=' + $("#colab").val() +
                          '&asignatura=' + $("#asignatura").val() +
                          '&horas=' + $("#horas").val(),
                          success: function(data) {
                            if(data.success) {
                              $( "#actividades_doc" ).load(  "ajax/actividades.php?id=<?php echo $r_alumno;?>", function() {
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
</html>
