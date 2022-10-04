<?php 

header("Pragma: public");
header("Expires: 0");
$filename = "resumen_prestamo.xls";
header("Content-Type: text/html;charset=utf-8");
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");


require_once('ajax/conexion.php');
$conexion = new conexion();
$conexion->conectar();


$id = $_GET['id'];


if($id==0){

    $prestamos = "select alumno.rut_alumno as RUT, alumno.n_alumno as NA, alumno.app_alumno as APA, alumno.apm_alumno AS AMA,
    equipo.id_equipo AS IDE, equipo.n_equipo AS NEQ, equipo.det_equipo AS DET, docente.rut_docente as IDO, docente.n_docente as NDO,
    docente.app_docente AS APD, docente.apm_docente AS AMD, prestamo2.det_actividad AS ACTI, prestamo2.asig_actividad AS ASIG,
    prestamo2.dir_actividad AS DIRE, prestamo2.contacto_est AS CONTACTO, prestamo2.fecha_solcitud AS SOLI, prestamo2.estado_prestamo AS ESTADO,
    prestamo2.observ_prestamo AS OBSERV, prestamo2.id_prestamo AS IDP, entrega.fecha_entrega AS ENTREG, entrega.obs_entrega AS OBSE
    from alumno, docente, equipo, prestamo2, entrega
    WHERE alumno.rut_alumno = prestamo2.det_alumno AND equipo.id_equipo = prestamo2.det_equipo AND docente.rut_docente = prestamo2.det_docente
    AND prestamo2.id_prestamo = entrega.det_prestamo
    ORDER BY prestamo2.id_prestamo DESC";
    $texto = "Detalle de prestamo";
    
}else{
    
    $prestamos = "select alumno.rut_alumno as RUT, alumno.n_alumno as NA, alumno.app_alumno as APA, alumno.apm_alumno AS AMA,
    equipo.id_equipo AS IDE, equipo.n_equipo AS NEQ, equipo.det_equipo AS DET, docente.rut_docente as IDO, docente.n_docente as NDO,
    docente.app_docente AS APD, docente.apm_docente AS AMD, prestamo2.det_actividad AS ACTI, prestamo2.asig_actividad AS ASIG,
    prestamo2.dir_actividad AS DIRE, prestamo2.contacto_est AS CONTACTO, prestamo2.fecha_solcitud AS SOLI, prestamo2.estado_prestamo AS ESTADO,
    prestamo2.observ_prestamo AS OBSERV, prestamo2.id_prestamo AS IDP, entrega.fecha_entrega AS ENTREG, entrega.obs_entrega AS OBSE
    from alumno, docente, equipo, prestamo2, entrega
    WHERE alumno.rut_alumno = prestamo2.det_alumno AND equipo.id_equipo = prestamo2.det_equipo AND docente.rut_docente = prestamo2.det_docente
    AND prestamo2.id_prestamo = entrega.det_prestamo AND prestamo2.id_prestamo = '$id'
    ORDER BY prestamo2.id_prestamo DESC";
    $texto = "Datos del Prestamo";

}


?>
<table border="1">
<tbody>
<?php
if($q = $conexion->mysqli->query($prestamos)) {
    while($datos=$q->fetch_object()):
?>
<tr>
<th colspan="2">
<h2><?=$texto?></h2>
</th>
</tr>
<tr>
<td>Datos Estudiante</td>
<td><center><?=$datos->RUT." ".$datos->NA." ".$datos->APA?></td>
</tr>
<tr>
<td>Correo electronico del Estudiante</td>
<td><center><?=$datos->CONTACTO?></center></td>
</tr>
<tr>
<td>Datos Docente</td>
<td><center><?=$datos->IDO." ".$datos->NDO." ".$datos->APD." ".$datos->AMD?></center></td>
</tr>
<tr>
<td>Detalle actividad</td>
<td><center><?="Asignatura: ".$datos->ASIG."; Actividad: ".$datos->ACTI?></center></td>
</tr>
<tr>
<td>Fecha solicitud de equipo</td>
<td><center><?=$datos->SOLI?></center></td>
</tr>
<tr>
<td>Observaciones</td>
<td><center><?=$datos->OBSERV?></center></td>
</tr>
<tr>
<td>Fecha de devolucion</td>
<td><center><?=$datos->ENTREG?></center></td>
</tr>
<tr>
<td>Observaciones de entrega</td>
<td><center><?=$datos->OBSE?></center></td>
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
<th colspan="2">
<h2>Enfermeria</h2>
</th>
</table>