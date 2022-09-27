<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
require_once('conexion.php');
  $conexion = new conexion();
  $conexion->conectar();

$equipo = filter_input(INPUT_POST, 'equipo', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$alumno = filter_input(INPUT_POST, 'alumno', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$actividad = filter_input(INPUT_POST, 'actividad', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$asignatura = filter_input(INPUT_POST, 'asignatura', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$fecha_soli = filter_input(INPUT_POST, 'solicitud', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$docente = filter_input(INPUT_POST, 'docente', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$direccion = filter_input(INPUT_POST, 'direccion', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$contacto = filter_input(INPUT_POST, 'contacto', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$telefono = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$observacion = filter_input(INPUT_POST, 'observacion', FILTER_SANITIZE_FULL_SPECIAL_CHARS);


$fechacorreo= $fecha_soli;
$newDate1 = date("d/m/Y", strtotime($fechacorreo));
$queryequipo = "SELECT * FROM equipo WHERE equipo.id_equipo = '$equipo'";
$valores = $conexion->mysqli->query($queryequipo);
$val = $valores->fetch_object();

$destinatario = $contacto.", jmondaca@userena.cl";
$titulo = "Notificación de solicitud de equipo";
$mensaje = "Estimado/a estudiante.

Junto con saludar, se confirma su solicitud del equipo $val->n_equipo $val->det_equipo
Para la fecha $newDate1

Saluda atentamente,
Dirección de Escuela";
$tucorreo = "From: jmondaca@userena.cl";

$prestamo = "INSERT INTO prestamo2 (det_equipo, det_alumno, det_actividad, asig_actividad, dir_actividad, contacto_est, tel_estudiante ,observ_prestamo, fecha_solcitud, estado_prestamo, det_docente)
                          VALUES ('$equipo', '$alumno', '$actividad', '$asignatura', '$direccion', '$contacto', '$telefono' ,'$observacion', '$fecha_soli', 'Prestado',  '$docente')";
    if($conexion->mysqli->query($prestamo)) {
      $equi = "UPDATE equipo SET estado_equipo= 'Prestado' WHERE id_equipo = '$equipo'";
      if($conexion->mysqli->query($equi)) {
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
  $conexion->desconectar();
?>
