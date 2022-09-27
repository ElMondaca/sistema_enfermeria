<?php

require_once('conexion.php');
$conexion = new conexion();
$conexion->conectar();

$querya = "SELECT * FROM oferta_campos";

if($q = $conexion->mysqli->query($querya)) {
			while($datos=$q->fetch_object()):
					?>
					<div class="bs-component">
								<div class="">
									<p><input type="radio" name="contact" value="<?=$datos->id_oferta?>"></input> <?=$datos->institucion_oferta." Cupos disponibles: " .$datos->cupo_oferta?></p>
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
