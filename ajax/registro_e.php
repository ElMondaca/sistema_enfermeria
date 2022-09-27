<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

    $id_equipo = filter_input(INPUT_POST, 'id_equipo', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $n_equipo = filter_input(INPUT_POST, 'n_equipo', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $det_equipo = filter_input(INPUT_POST, 'det_equipo', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $observ_equipo = filter_input(INPUT_POST, 'observ_equipo', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $tipo_equipo = filter_input(INPUT_POST, 'tipo_equipo ', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

require_once('conexion.php');

$conexion = new conexion();
$conexion->conectar();

    $insertar_usuario = "INSERT INTO equipo (id_equipo, n_equipo, det_equipo, observ_equipo, tipo_equipo, estado_equipo)
    					           VALUES ('$id_equipo', '$n_equipo', '$det_equipo', '$observ_equipo', '$tipo_equipo', 0)";
    if($conexion->mysqli->query($insertar_usuario)) {
    	print_r(json_encode(array("success" => 1)));
    }
    else {
    	print_r(json_encode(array("error" => $conexion->mysqli->error)));
    	exit();
    }
    $conexion->desconectar();

?>
