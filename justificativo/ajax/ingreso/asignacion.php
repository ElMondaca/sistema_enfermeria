<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');


$entidad = filter_input(INPUT_POST, 'entidad', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$diagnostico = filter_input(INPUT_POST, 'diagnostico', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$reposo = filter_input(INPUT_POST, 'reposo', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$fecha_emision1 = filter_input(INPUT_POST, 'emision', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$fecha_entrega1 = filter_input(INPUT_POST, 'entrega', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$nivel = filter_input(INPUT_POST, 'nivel', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$alumno = filter_input(INPUT_POST, 'alumno', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

require_once('../conexion.php');

$conexion = new conexion();
$conexion->conectar();
$asignar_certificado = "INSERT INTO certificado (n_alumno, n_nivel, n_emisor, diagnostico, reposo, fecha_emision, fecha_entrega)
                        VALUES ('$alumno', '$nivel', '$entidad', '$diagnostico', '$reposo', '$fecha_emision1', '$fecha_entrega1')";
  if($conexion->mysqli->query($asignar_certificado)) {
    	print_r(json_encode(array("success" => 1)));
  }
  else {
  	print_r(json_encode(array("error" => $conexion->mysqli->error)));
  	exit();
  }
  $conexion->desconectar();
?>
