<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

$rut = filter_input(INPUT_POST, 'rut', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$nombre = filter_input(INPUT_POST, 'nalu', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$app = filter_input(INPUT_POST, 'app', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$apm = filter_input(INPUT_POST, 'apm', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$año = filter_input(INPUT_POST, 'año', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$mail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_FULL_SPECIAL_CHARS);


require_once('conexion.php');
  $conexion = new conexion();
  $conexion->conectar();
  $prestamo = "INSERT INTO docente (rut_docente, n_docente, app_docente, apm_docente, ingreso_docente, mail_docente, estado_docente)
                          VALUES ('$rut', '$nombre', '$app', '$apm', '$año', '$mail', 'Inactivo')";
    if($conexion->mysqli->query($prestamo)) {
      print_r(json_encode(array("success" => 1)));
  }
  else {
    print_r(json_encode(array("error" => $conexion->mysqli->error)));
    exit();
  }
  $conexion->desconectar();
?>
