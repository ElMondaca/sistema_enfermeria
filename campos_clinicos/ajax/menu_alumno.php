<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

$alumno = filter_input(INPUT_POST, 'idalu', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$password = filter_input(INPUT_POST, 'passalu', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
/*
require_once('conexion.php');
$conexion = new conexion();
$conexion->conectar();

$query = "SELECT * FROM rad_alumno, usuario_plataforma
WHERE usuario_plataforma.det_alumno = rad_alumno.id_alumno
AND usuario_plataforma.correo_usuario = $alumno
AND  usuario_plataforma.password_usuario = $password";

if($q = $conexion->mysqli->query($query)) {
			while($datos=$q->fetch_object()):
				*/	?>
          <div class="bs-component">
            <legend>Datos del Alumno </legend>
                <div class="">
                    <?php echo $alumno." ".$password ?>
								</div>
						</div>


<?php/*
endwhile;
}
else {
          print_r(json_encode(array("error" => $conexion->mysqli->error)));
          exit();
        }
*/
?>
