<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

$recinto = filter_input(INPUT_POST, 'recinto', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$cupo = filter_input(INPUT_POST, 'cupos', FILTER_SANITIZE_FULL_SPECIAL_CHARS);


require_once('conexion.php');
  $conexion = new conexion();
  $conexion->conectar();
  $prestamo = "INSERT INTO oferta_campos ( institucion_oferta, cupo_oferta)
                          VALUES ('$recinto', '$cupo')";
    if($conexion->mysqli->query($prestamo)) {
      print_r(json_encode(array("success" => 1)));
  }
  else {
    print_r(json_encode(array("error" => $conexion->mysqli->error)));
    exit();
  }
  $conexion->desconectar();
?>
