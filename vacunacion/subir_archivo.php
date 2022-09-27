<?php
require_once('ajax/conexion.php');
$conexion = new conexion();
$conexion->conectar();

$nombre = $_FILES['docto']['name'];
$ruta = $_FILES['docto']['tmp_name'];
$vacunacion = $_POST['det_alumno'];
$destino = "documento/".$nombre;

if(move_uploaded_file($ruta, 'documento/'.$nombre)){
      $qdocto = "INSERT INTO carnet_vacuna (nombre_carnet, ruta_carnet) VALUES ('$nombre', '$destino')";
      if($conexion->mysqli->query($qdocto)) {
        $qid = "SELECT * FROM carnet_vacuna WHERE nombre_carnet = '$nombre' AND ruta_carnet = '$destino'";
            if($q = $conexion->mysqli->query($qid)){
              $datos=$q->fetch_object();
              $qupdate = "UPDATE vacunacion2 SET detalle_carnet = '$datos->id_carnet' WHERE vacunacion2.id_vacunacion = '$vacunacion'";
              $idalu = "SELECT det_alumno from vacunacion2 where vacunacion2.id_vacunacion = '$vacunacion'";
              $w = $conexion->mysqli->query($idalu);
              $alumno=$w->fetch_object();
                if($conexion->mysqli->query($qupdate)) {
                  header( 'refresh:0.0001; url=inmunizaciones.php?id='.$alumno->det_alumno);
                }else{
                  print_r(json_encode(array("error" => $conexion->mysqli->error)));
                  exit();
                }
            }else{
              echo "No hay datos";
            }
      }else {
        print_r(json_encode(array("error" => $conexion->mysqli->error)));
        exit();
      }
  }else{
    print_r(json_encode(array("error" => $conexion->mysqli->error)));
    exit();
  }

?>
