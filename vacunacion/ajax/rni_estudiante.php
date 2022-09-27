<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

$alumno = filter_input(INPUT_POST, 'det_alumno', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$rnialu = filter_input(INPUT_POST, 'rnialu', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

require_once('conexion.php');
  $conexion = new conexion();
  $conexion->conectar();
  $prestamo = "UPDATE alumno SET rni_alumno = '$rnialu' WHERE alumno.rut_alumno = '$alumno'";
    if($conexion->mysqli->query($prestamo)) {
      print_r(json_encode(array("success" => 1)));
  }
  else {
    print_r(json_encode(array("error" => $conexion->mysqli->error)));
    exit();
  }
  $conexion->desconectar();
?>
