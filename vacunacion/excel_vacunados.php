<?php 

header("Pragma: public");
header("Expires: 0");
$filename = "Concentrado_Inmunizaciones.xls";
header("Content-Type: text/html;charset=utf-8");
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

require_once('ajax/conexion.php');
$conexion = new conexion();
$conexion->conectar();


$vacunas = "SELECT alumno.rut_alumno as RUT, alumno.n_alumno as NA, 
alumno.app_alumno as APA, alumno.apm_alumno AS AMA, 
vacuna.n_vacuna AS VACUNA, vacunacion2.fecha_vacunacion AS FECHAVAC, 
vacunacion2.id_vacunacion AS IDVAC 
FROM alumno, vacuna, vacunacion2 
WHERE alumno.rut_alumno = vacunacion2.det_alumno 
AND vacuna.id_vacuna = vacunacion2.det_vacuna 
ORDER BY IDVAC";

?>
<table border="1">
<tbody>
  <tr>
    <td>Rut Estudiante</td>
    <td>Nombre Completo</td>
    <td>Vacuna registrada</td>
    <td>Fecha de vacunaci&oacute;n</td>
  </tr>
  <?php
  if($q = $conexion->mysqli->query($vacunas)) {
    while($datos=$q->fetch_object()):
  ?>
  <tr>
    <td><center><?=$datos->RUT?></td>
    <td><center><?=utf8_decode($datos->NA)." ".utf8_decode($datos->APA)." ".utf8_decode($datos->AMA)?></td>
    <td><center><?=$datos->VACUNA?></td>
    <td><center><?=$datos->FECHAVAC?></td>
  </tr>
  <?php
    endwhile;
  }
  else {
    print_r(json_encode(array("error" => $conexion->mysqli->error)));
    exit();
  }
  ?>
</tbody>
</table>