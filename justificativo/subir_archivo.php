<?php
require_once('ajax/conexion.php');
$conexion = new conexion();
$conexion->conectar();

$nombre = $_FILES['docto']['name'];
$ruta = $_FILES['docto']['tmp_name'];
$vacunacion = $_POST['det_alumno'];
$destino = "documento/".$nombre;

if(move_uploaded_file($ruta, 'documento/'.$nombre)){
      $qdocto = "INSERT INTO documento_certificado (nombre_certificado, ruta_certificado) VALUES ('$nombre', '$destino')";
      if($conexion->mysqli->query($qdocto)) {
        $qid = "SELECT * FROM documento_certificado WHERE nombre_certificado = '$nombre' AND ruta_certificado = '$destino'";
            if($q = $conexion->mysqli->query($qid)){
              $datos=$q->fetch_object();
              $qupdate = "UPDATE certificado SET detalle_certificado = '$datos->id_certificado2' WHERE certificado.id_certificado = '$vacunacion'";
              $idalu = "SELECT n_alumno from certificado where certificado.id_certificado = '$vacunacion'";
              $w = $conexion->mysqli->query($idalu);
              $alumno=$w->fetch_object();
                if($conexion->mysqli->query($qupdate)) {
                  header( 'refresh:0.0001; url=certificados.php?id='.$alumno->n_alumno);
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
