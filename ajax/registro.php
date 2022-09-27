<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

$r_usuario = filter_input(INPUT_POST, 'rut_usuario', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$n_usuario = filter_input(INPUT_POST, 'nombre_usuario', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$app_usuario = filter_input(INPUT_POST, 'app_usuario', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$apm_usuario = filter_input(INPUT_POST, 'apm_usuario', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

require_once('conexion.php');

$conexion = new conexion();
$conexion->conectar();

$insertar_usuario = "INSERT INTO alumno (rut_alumno, n_alumno, app_alumno, apm_alumno)
					           VALUES ('$r_usuario', '$n_usuario', '$app_usuario', '$apm_usuario')";
if($conexion->mysqli->query($insertar_usuario)) {
	print_r(json_encode(array("success" => 1)));
}
else {
	print_r(json_encode(array("error" => $conexion->mysqli->error)));
	exit();
}
$conexion->desconectar();

?>
