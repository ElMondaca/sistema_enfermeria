<?php 

header("Pragma: public");
header("Expires: 0");
$filename = "participacion_docente.xls";
header("Content-Type: text/html;charset=utf-8");
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");


require_once('ajax/conexion.php');
$conexion = new conexion();
$conexion->conectar();


$id = $_GET['id'];
$qdocente = "SELECT asignatura.n_asignatura AS ASIGN, asignatura_impartida.ded_horaria AS HORAS, asignatura_impartida.jornada_docente AS JORNADA, asignatura_impartida.año_colab AS AÑO
FROM docente, asignatura, asignatura_impartida
WHERE docente.rut_docente = asignatura_impartida.det_docente AND asignatura_impartida.det_asignatura = asignatura.id_asignatura
AND docente.rut_docente = '$id'
ORDER BY asignatura_impartida.año_colab ASC";


$query = "SELECT * FROM docente WHERE docente.rut_docente = '$id'";
if($k = $conexion->mysqli->query($query)) {
  $data=$k->fetch_object();
}else{
  print_r(json_encode(array("error" => $conexion->mysqli->error)));
  exit();
}


?>
<table border="1">
<tbody>
<tr>
<th colspan="4">
<h4><?php echo "Rut docente: ".utf8_decode($data->rut_docente); ?></h4>
</th>
</tr>
<tr>
<th colspan="4">
<h4><?php echo "Nombre Docente: ".utf8_decode($data->n_docente)." ".utf8_decode($data->app_docente)." ".utf8_decode($data->apm_docente);?></h4>
</th>
</tr>
<tr>
<th colspan="4">
<h4><?php echo "Departamento: ".utf8_decode($data->depto_docente)?></h4>
</th>
</tr>
<tr>
<th colspan="4">
<h4><?php echo "A&ntilde;o inicio actividades U.L.S: ".utf8_decode($data->ingreso_docente)?></h4>
</th>
</tr>
<tr>
<td>Asignatura Impartida</td>
<td>Dedicaci&oacute;n Horaria</td>
<td>Jornada</td>
<td>A&ntilde;o de colaboraci&oacute;n</td>
</tr>
<?php
if($q = $conexion->mysqli->query($qdocente)) {
    while($datos=$q->fetch_object()):
?>
<tr>
<td><?=utf8_decode($datos->ASIGN)?></td>
<td><?=utf8_decode($datos->HORAS)?></td>
<td><?=utf8_decode($datos->JORNADA)?></td>
<td><?=utf8_decode($datos->AÑO)?></td>
</tr>
<?php
endwhile;
}
else {
    print_r(json_encode(array("error" => $conexion->mysqli->error)));
    exit();
}
?>
</tr>