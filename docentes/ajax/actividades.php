<?php

require_once('conexion.php');
$conexion = new conexion();
$conexion->conectar();

$id_doc = $_GET['id'];

$qdocente = "SELECT asignatura.n_asignatura AS ASIGN, asignatura_impartida.ded_horaria AS HORAS, asignatura_impartida.jornada_docente AS JORNADA, asignatura_impartida.año_colab AS AÑO
FROM docente, asignatura, asignatura_impartida
WHERE docente.rut_docente = asignatura_impartida.det_docente AND asignatura_impartida.det_asignatura = asignatura.id_asignatura
AND docente.rut_docente = '$id_doc'
ORDER BY asignatura_impartida.año_colab ASC";

echo "<legend>Detalle de asignaturas impartidas</legend>";
echo "<div class='bs-component'>";
		echo "<div class='panel-body'>";
if($q = $conexion->mysqli->query($qdocente)) {
			while($datos=$q->fetch_object()):
					?>

									<p>Asignatura Impartida: <?=$datos->ASIGN." - Dedicación Horaria: ".$datos->HORAS." - Jornada: ".$datos->JORNADA." - Año de colaboración: ".$datos->AÑO?></p>

<?php
	endwhile;
echo "</div>";
echo "</div>";
echo "</div>";
	}
	else {
						print_r(json_encode(array("error" => $conexion->mysqli->error)));
						exit();
					}
?>
