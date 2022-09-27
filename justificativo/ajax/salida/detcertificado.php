<?php
require_once('../conexion.php');

$conexion = new conexion();
$conexion->conectar();
$uni= filter_input(INPUT_POST, 'unidad', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$acti = filter_input(INPUT_POST, 'actividad', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$certi = filter_input(INPUT_POST, 'certificado', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$profesor = filter_input(INPUT_POST, 'docente', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$fechainasistencia = filter_input(INPUT_POST, 'fecha', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$det_certifi = $_GET['id'];

if($certi == null){
  $query = "SELECT * FROM docente, detalle_certificado WHERE docente.rut_docente = detalle_certificado.det_profesor AND det_certificado = '$det_certifi'";
  if($q = $conexion->mysqli->query($query)) {
    echo "<div class='panel-body'>";
    echo "<p>Identificador de certificado: ".$det_certifi."</p>";
      while($datos=$q->fetch_object()): ?>
      <div class="col-lg-4">
        <p>Asignatura justificada: <?=$datos->unidad?> </p>
        <p>Actividad académica justificada: <?=$datos->actividad?> </p>
        <p>Docente responsable: <?=$datos->n_docente." ".$datos->app_docente." ".$datos->apm_docente?> </p>
        <p>Fecha de inasistencia: <?=$datos->fecha_justificada?> </p>
        <a href="documento.php?id=<?=$datos->id_detalle?>">Descargar PDF</a>
        <p>~~~~~~~~~~~~~~~~~~~~~~~~~</p>
     </div>
<?php
endwhile;
  }
}
else{
  $queryinsert = "INSERT INTO detalle_certificado (actividad, unidad, det_profesor, fecha_justificada, det_certificado)
  VALUES ('$acti', '$uni', '$profesor', '$fechainasistencia' ,'$certi')";
  $conexion->mysqli->query($queryinsert);
  $query = "SELECT * FROM docente, detalle_certificado WHERE docente.rut_docente = detalle_certificado.det_profesor AND det_certificado = '$certi'";
  if($q = $conexion->mysqli->query($query)) {
    echo "<div class='panel-body'>";
    echo "<p>Identificador de certificado: ".$certi."</p>";
      while($datos=$q->fetch_object()): ?>
      <div class="col-lg-4">
        <p>Asignatura justificada: <?=$datos->unidad?> </p>
        <p>Actividad académica justificada: <?=$datos->actividad?> </p>
        <p>Docente responsable: <?=$datos->n_docente." ".$datos->app_docente." ".$datos->apm_docente?> </p>
        <p>Fecha de inasistencia: <?=$datos->fecha_justificada?> </p>
        <a href="documento.php?id=<?=$datos->id_detalle?>">Descargar PDF</a>
        <p>~~~~~~~~~~~~~~~~~~~~~~~~~</p>
     </div>
<?php
endwhile;
    }
}
?>
