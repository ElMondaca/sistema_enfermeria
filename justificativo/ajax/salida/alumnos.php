<?php
require_once('../conexion.php');

$conexion = new conexion();
$conexion->conectar();

$r_usuario = filter_input(INPUT_POST, 'busqueda', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
if($r_usuario == NULL){
	$query = "SELECT * FROM alumno";
	if($q = $conexion->mysqli->query($query)) {
			while($datos=$q->fetch_object()):
			?>
			<div class="col-lg-4">
				<br>
				<div class="bs-component">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Detalles</h3>
						</div>
						<div class="panel-body">
							<p>Rut Estudiante: <?=$datos->rut_alumno?></p>
							<p>Nombre: <?=$datos->n_alumno?></p>
							<p>Apellido paterno: <?=$datos->app_alumno?></p>
							<p>Apellido materno: <?=$datos->apm_alumno?></p>
							<a href="certificados.php?id=<?=$datos->rut_alumno?>" class="btn btn-success btn-block">Ver Certificados</a>
							<a href="asignar.php?id=<?=$datos->rut_alumno?>" class="btn btn-success btn-block">Asignar Certificado</a>
						</div>
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
	}else{
		$query = "SELECT * FROM alumno WHERE alumno.app_alumno = '$r_usuario'OR alumno.apm_alumno = '$r_usuario'";
		if($q = $conexion->mysqli->query($query)) {
				while($datos=$q->fetch_object()):
				?>
				<div class="col-lg-4">
					<br>
					<div class="bs-component">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title">Alumno</h3>
							</div>
							<div class="panel-body">
								<p>Rut Estudiante: <?=$datos->rut_alumno?></p>
								<p>Nombre: <?=$datos->n_alumno?></p>
								<p>Apellido paterno: <?=$datos->app_alumno?></p>
								<p>Apellido materno: <?=$datos->apm_alumno?></p>
								<a href="certificados.php?id=<?=$datos->rut_alumno?>" class="btn btn-success btn-block">Ver Certificados</a>
								<a href="asignar.php?id=<?=$datos->rut_alumno?>" class="btn btn-success btn-block">Asignar Certificado</a>
							</div>
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

	}
?>
