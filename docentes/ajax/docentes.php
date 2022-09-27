<?php

require_once('conexion.php');
$conexion = new conexion();
$conexion->conectar();

$querya = "SELECT * FROM docente";

if($q = $conexion->mysqli->query($querya)) {
			while($datos=$q->fetch_object()):
					?>
					<div class="">

						<p>Rut: <?=$datos->rut_docente."<br> Nombre Docente: ".$datos->n_docente." ".$datos->app_docente." ".$datos->apm_docente."<br> Titulo Profesional: ".$datos->titulo_docente."<br> Especialidad del Docente: ".$datos->esp_docente." <br> Año de ingreso: ".$datos->ingreso_docente."  Correo: ".$datos->mail_docente." <br> Departamento adscrito: ".$datos->depto_docente?></p>
									<a href='asig_docente.php?id=<?php echo $datos->rut_docente;?>'>Detalle de Actividades</a> --- <a href='detalle_docente.php?id=<?php echo $datos->rut_docente;?>'>Actualizar información</a><br>
									_______________________________________________
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
