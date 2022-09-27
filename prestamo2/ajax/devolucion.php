<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

$entrega = filter_input(INPUT_POST, 'entrega', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$detalle = filter_input(INPUT_POST, 'detalle', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$observacion = filter_input(INPUT_POST, 'observacion', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$equipo = filter_input(INPUT_POST, 'equipo', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$correoentrega = filter_input(INPUT_POST, 'correo', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$equipoentrega = filter_input(INPUT_POST, 'nombremail', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

require_once('conexion.php');
$conexion = new conexion();
$conexion->conectar();
$fechacorreo= $entrega;
$newDate1 = date("d/m/Y", strtotime($fechacorreo));


  $destinatario = $correoentrega.", jmondaca@userena.cl";
  $titulo = "Notificación de entrega de equipo";
  $mensaje = "Estimado/a estudiante.

  Junto con saludar, se confirma su devolución del equipo $equipoentrega
  Con fecha de devolución $newDate1

  Saluda atentamente,
  Dirección de Escuela";
  $tucorreo = "From: jmondaca@userena.cl";
  $prestamo = "INSERT INTO entrega (fecha_entrega, obs_entrega, det_prestamo)
                          VALUES ('$entrega', '$observacion', '$detalle')";
    if($conexion->mysqli->query($prestamo)) {
      $actualiza = "UPDATE prestamo2 SET estado_prestamo = 'Entregado' WHERE id_prestamo = '$detalle'";
        if($conexion->mysqli->query($actualiza)) {
          $acequipo = "UPDATE equipo SET estado_equipo= 'Disponible' WHERE id_equipo = '$equipo'";
            if($conexion->mysqli->query($acequipo)) {
              print_r(json_encode(array("success" => 1)));
              mail($destinatario, $titulo, $mensaje, $tucorreo);
              }else {
                print_r(json_encode(array("error" => $conexion->mysqli->error)));
                exit();
              }
            }else {
              print_r(json_encode(array("error" => $conexion->mysqli->error)));
              exit();
          }
        }else {
            print_r(json_encode(array("error" => $conexion->mysqli->error)));
            exit();
      }

  $conexion->desconectar();
?>
