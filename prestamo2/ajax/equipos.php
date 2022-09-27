<?php

require_once('conexion.php');
$conexion = new conexion();
$conexion->conectar();

$querya = "SELECT * FROM equipo";

if($q = $conexion->mysqli->query($querya)) {
	while($datos=$q->fetch_object()):
	?>
	<div class="bs-component">
		<div class="">
			<p>Nº Inventario: <?=$datos->id_equipo." Información del equipo: ".$datos->n_equipo." ".$datos->det_equipo." <br>Tipo: ".$datos->tipo_equipo." <br>Estado: ".$datos->estado_equipo."<br>Observaciones: ".$datos->observ_equipo."<br>Procedencia: ".$datos->origen_equipo."<br>Fecha de adquisición: ".$datos->compra_equipo."<br>"?></p>
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
