<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

$rut = filter_input(INPUT_POST, 'rut_doc', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$contrato= filter_input(INPUT_POST, 'contrato', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$colab = filter_input(INPUT_POST, 'colab', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$asig = filter_input(INPUT_POST, 'asignatura', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$horas = filter_input(INPUT_POST, 'horas', FILTER_SANITIZE_FULL_SPECIAL_CHARS);


require_once('conexion.php');
  $conexion = new conexion();
  $conexion->conectar();
  $prestamo = "INSERT INTO asignatura_impartida (det_docente, det_asignatura, ded_horaria, jornada_docente, año_colab)
                          VALUES ('$rut', '$asig', '$horas', '$contrato', '$colab')";
    if($conexion->mysqli->query($prestamo)) {
      print_r(json_encode(array("success" => 1)));
  }
  else {
    print_r(json_encode(array("error" => $conexion->mysqli->error)));
    exit();
  }
  $conexion->desconectar();
















?>
