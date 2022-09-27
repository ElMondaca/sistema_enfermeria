<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
require_once('../conexion.php');
$conexion = new conexion();
$conexion->conectar();
/*
$certificado = filter_input(INPUT_POST, 'certificado', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$querydelete = "DELETE FROM detalle_certificado WHERE id_detalle = '$certificado'";
$conexion->mysqli->query($querydelete);

$query = "SELECT * FROM detalle_certificado WHERE det_certificado = '$certi'";
if($q = $conexion->mysqli->query($query)) {
  echo "<div class='panel-body'>";
  echo "<p>Identificador de certificado: ".$certi."</p>";
    while($datos=$q->fetch_object()): ?>
    <div class="col-lg-4">
      <p>Unidad justificada: <?=$datos->unidad?> </p>
      <p>Actividad justificada: <?=$datos->actividad?> </p>
      <p>Docente responsable: <?=$datos->det_profesor?> </p>
      <p>Fecha de inasistencia: <?=$datos->fecha_justificada?> </p>
      <p><input type="radio" id="certificado" value="<?php echo $id_detalle; ?>">Seleccionar justificacion</p>
      <p>~~~~~~~~~~~~~~~~~~~~~~~~~</p>
   </div>
<?php
endwhile;
echo "</div>";
}*/


?>
