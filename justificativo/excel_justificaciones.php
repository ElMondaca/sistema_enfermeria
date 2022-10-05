<?php 

header("Pragma: public");
header("Expires: 0");
$filename = "registro_total_justificaciones.xls";
header("Content-Type: text/html;charset=utf-8");
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

require_once('ajax/conexion.php');
$conexion = new conexion();
$conexion->conectar();


$certificados = "SELECT alumno.rut_alumno AS RUTA, alumno.n_alumno AS NA, 
alumno.app_alumno AS APA, alumno.apm_alumno AS AMA, nivel.n_nivel AS NIVEL, 
emisor.n_emisor AS EMISOR, certificado.fecha_emision AS INICIO, certificado.reposo AS DIAS, 
certificado.id_certificado AS IDCERT 
FROM alumno, nivel, emisor, certificado 
WHERE alumno.rut_alumno = certificado.n_alumno AND 
nivel.id_nivel = certificado.n_nivel AND 
emisor.id_emisor = certificado.n_emisor 
ORDER BY IDCERT";


?>
<table border="1">
  <tbody>
    <tr>
      <td>Rut Estudiante</td>
      <td>Nombre Completo</td>
      <td>Nivel al momento de entregar certificado</td>
      <td>Entidad emisora del documento</td>
      <td>Fecha de emisi&oacute;n del documento</td>
      <td>D&iacute;as de Licencia</td>
    </tr>
    <?php
    if($q = $conexion->mysqli->query($certificados)) {
      while($datos=$q->fetch_object()):
    ?>
    <tr>
      <td><center><?=$datos->RUTA?></td>
      <td><center><?=utf8_decode($datos->NA)." ".utf8_decode($datos->APA)." ".utf8_decode($datos->AMA)?></td>
      <td><center><?=$datos->NIVEL?></td>
      <td><center><?=$datos->EMISOR?></td>
      <td><center><?=$datos->INICIO?></td>
      <td><center><?=$datos->DIAS?></td>
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