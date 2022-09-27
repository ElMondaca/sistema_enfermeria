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
  require_once('ajax/conexion.php');
require_once('include/nav.php');
$rut_alumno = $_GET['id'];
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
<br><br>
<div class="container">
  <div class="col-lg-4">
    <legend>DATOS DEL ESTUDIANTE</legend>
    <div class="panel-body">
      <p>Rut del Estudiante: <?=$datos->rut_alumno?></p>
      <p>Nombre: <?=$datos->n_alumno." ".$datos->app_alumno." ".$datos->apm_alumno?></p>
      <p>Correo electrónico: <?=$datos->mail_alumno?></p>
      <p>Telefono: <?=$datos->tel_alumno?></p>
      <p>Año de ingreso: <?=$datos->ingreso_alumno?></p>
      <p>Estado del Estudiante: <?=$datos->estado_alumno?></p>
    </div>
  </div>
    <div class="col-lg-8" id="vacunados">
      <legend>REGISTRO DE INMUNIZACIÓN</legend>
    </div>
  <div class="col-lg-12">
    <legend>REGISTRO DE VACUNAS ADMINISTRADAS</legend>
    <form method="post" id="vacunas">
      <select class="form-control" name="id_vac" id="id_vac">
        <option value="0">Vacunas administradas</option>
        <?php
        $qequipo = "SELECT * FROM vacuna";
        if($equ = $conexion->mysqli->query($qequipo)){
          while($equipo = $equ->fetch_object()):
        ?>
          <option value="<?=$equipo->id_vacuna?>"><?=$equipo->n_vacuna?> </option>
          <?php
        endwhile;
        }
        else{
          print_r(json_encode(array("error" => $conexion->mysqli->error)));
          exit();
        }
        ?>
      </select>
      <br>
      <div class="form-group">
          Indique fecha de vacunación: <input type="date" class="form-control" name="fecha_vac" id="fecha_vac">
      </div>
      <div class="form-group">
          <input type="hidden" class="form-control" name="det_alumno" id="det_alumno" value="<?=$r_alumno;?>">
      </div>
      <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
          <button type="button" class="btn btn-primary" id="enviar">Ingresar</button>
        </div>
      </div>

    </form>
  </div>
</div>


<script>
  $(document).ready(function(){

    $( "#vacunados" ).load( "ajax/vacunados.php?id=<?php echo $r_alumno;?>", function() {});


    $("#enviar").click(function(){
    $.ajax({
        type: "POST",
        url: "ajax/registro_vacunas.php",
        data: "det_alumno=" + $("#det_alumno").val() +
        '&id_vac=' + $("#id_vac").val() +
        '&fecha_vac=' + $("#fecha_vac").val(),
        success: function(data) {
          if(data.success) {
            $( "#vacunados" ).load( "ajax/vacunados.php?id=<?php echo $r_alumno;?>", function() {});
            document.getElementById("vacunas").reset();
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
