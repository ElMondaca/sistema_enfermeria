<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

$alumno = filter_input(INPUT_POST, 'det_alumno', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$vacuna = filter_input(INPUT_POST, 'id_vac', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$fecha = filter_input(INPUT_POST, 'fecha_vac', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

require_once('conexion.php');
  $conexion = new conexion();
  $conexion->conectar();
  $prestamo = "INSERT INTO vacunacion2 (det_vacuna, det_alumno, fecha_vacunacion)
                          VALUES ('$vacuna', '$alumno', '$fecha')";
    if($conexion->mysqli->query($prestamo)) {
      print_r(json_encode(array("success" => 1)));
  }
  else {
    print_r(json_encode(array("error" => $conexion->mysqli->error)));
    exit();
  }
  $conexion->desconectar();
?>
