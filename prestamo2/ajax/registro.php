<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

$id = filter_input(INPUT_POST, 'inventario', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$nombre = filter_input(INPUT_POST, 'nequipo', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$detalle = filter_input(INPUT_POST, 'detalle', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$observacion = filter_input(INPUT_POST, 'observacion', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$origen = filter_input(INPUT_POST, 'origen', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$fcompra= filter_input(INPUT_POST, 'compra', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

require_once('conexion.php');
  $conexion = new conexion();
  $conexion->conectar();
  $prestamo = "INSERT INTO equipo (id_equipo, n_equipo, det_equipo, tipo_equipo, observ_equipo, estado_equipo, origen_equipo, compra_equipo)
                          VALUES ('$id', '$nombre', '$detalle', '$tipo', '$observacion', 'Disponible', '$origen', '$fcompra')";
    if($conexion->mysqli->query($prestamo)) {
      print_r(json_encode(array("success" => 1)));
  }
  else {
    print_r(json_encode(array("error" => $conexion->mysqli->error)));
    exit();
  }
  $conexion->desconectar();
?>
