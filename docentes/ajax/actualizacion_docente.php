<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');


$rut = filter_input(INPUT_POST, 'rut', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$gradoaca = filter_input(INPUT_POST, 'gradoaca', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$jerarquia = filter_input(INPUT_POST, 'jerarq', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$estadodoc = filter_input(INPUT_POST, 'estadodoc', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$especialidad = filter_input(INPUT_POST, 'esp', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
require_once('conexion.php');
$conexion = new conexion();
$conexion->conectar();


$prestamo = "UPDATE docente SET docente.grado_academico = '$gradoaca', docente.jerar_docente = '$jerarquia', docente.estado_docente = '$estadodoc', docente.esp_docente = '$especialidad'
WHERE docente.rut_docente = '$rut'";
  if($conexion->mysqli->query($prestamo)) {
    print_r(json_encode(array("success" => 1)));
}
else {
  print_r(json_encode(array("error" => $conexion->mysqli->error)));
  exit();
}
$conexion->desconectar();
?>
