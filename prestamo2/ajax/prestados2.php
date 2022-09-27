<?php

require_once('conexion.php');
$conexion = new conexion();
$conexion->conectar();

$prestamos = " select alumno.rut_alumno as RUT, alumno.n_alumno as NA, alumno.app_alumno as APA, alumno.apm_alumno AS AMA,
equipo.id_equipo AS IDE, equipo.n_equipo AS NEQ, equipo.det_equipo AS DET, docente.rut_docente as IDO, docente.n_docente as NDO,
docente.app_docente AS APD, docente.apm_docente AS AMD, prestamo2.det_actividad AS ACTI, prestamo2.asig_actividad AS ASIG,
prestamo2.dir_actividad AS DIRE, prestamo2.contacto_est AS CONTACTO, prestamo2.fecha_solcitud AS SOLI, prestamo2.estado_prestamo AS ESTADO,
prestamo2.observ_prestamo AS OBSERV, prestamo2.id_prestamo AS IDP, entrega.fecha_entrega AS ENTREG, entrega.obs_entrega AS OBSE
from alumno, docente, equipo, prestamo2, entrega
WHERE alumno.rut_alumno = prestamo2.det_alumno AND equipo.id_equipo = prestamo2.det_equipo AND docente.rut_docente = prestamo2.det_docente
AND prestamo2.id_prestamo = entrega.det_prestamo
ORDER BY prestamo2.id_prestamo DESC";
if($q = $conexion->mysqli->query($prestamos)) {
			while($datos=$q->fetch_object()):
        ?>
      	<div class="bs-component">
      			<div class="panel panel-primary">
      				<div class="panel-heading">
      					<h3 class="panel-title">Detalle del prestamo</h3>
      				</div>
      				<div class="panel-body">
					  	<p>Datos Estudiante: <?=$datos->RUT." ".$datos->NA." ".$datos->APA?></p>
		              	<p>Correo electronico del Estudiante: <?=$datos->CONTACTO?></p>
      					<p>Datos Docente: <?=$datos->IDO." ".$datos->NDO." ".$datos->APD." ".$datos->AMD?></p>
      					<p>Detalle actividad: <?="Asignatura: ".$datos->ASIG."; Actividad: ".$datos->ACTI?></p>
      					<p>Fecha solicitud de equipo: <?=$datos->SOLI?></p>
      					<p>Observaciones: <?=$datos->OBSERV?></p>
      					<p>Estado del prestamo: <?=$datos->ESTADO?></p>
      					<p>Fecha de devolucion: <?=$datos->ENTREG?></p>
      					<p>Observaciones de entrega: <?=$datos->OBSE?></p>
      				</div>
      			</div>
      		</div>
      <?php
      	endwhile;
      	}
      	else {
      						print_r(json_encode(array("error" => $conexion->mysqli->error)));
      						exit();
      					}
?>
