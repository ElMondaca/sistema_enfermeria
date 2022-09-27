<?php


require_once('conexion.php');
$conexion = new conexion();
$conexion->conectar();

$r_alumno = $_GET['id'];


$query = "SELECT alumno.rut_alumno AS RUT, vacuna.n_vacuna AS VACCU, vacunacion2.fecha_vacunacion AS FECHAVACCU,
vacunacion2.id_vacunacion AS IDVAC, vacunacion2.detalle_carnet AS CARNET
FROM vacuna, vacunacion2, alumno
WHERE vacunacion2.det_vacuna = vacuna.id_vacuna AND vacunacion2.det_alumno = alumno.rut_alumno
AND vacunacion2.det_alumno = '$r_alumno'
ORDER BY vacunacion2.fecha_vacunacion";

echo "<legend>VACUNACIONES DE ESTUDIANTE</legend>";
echo "<div class='bs-component'>";
echo "<div class='panel-body'>";
if($q = $conexion->mysqli->query($query)) {
while($datos=$q->fetch_object()):
  ?>
         <p>Datos de vacuna: <?=$datos->VACCU." - Fecha vacunación: ".$datos->FECHAVACCU?><br>
    <?php
      if($datos->CARNET == 0){
     ?>
   <a href='carnet_vacuna.php?id=<?php echo $datos->IDVAC;?>'>Cargar comprobante de vacuna</a></p>
   <br>
       <?php
 }else{
  ?>
  <a href='ver_carnet.php?id=<?php echo $datos->CARNET;?>' target="_blank">Ver comprobante de vacuna</a></p>
  <br>
 <?php
}
        endwhile;
         echo "</div>";
         echo "</div>";
        }
        else {
             print_r(json_encode(array("error" => $conexion->mysqli->error)));
             exit();
            }
       ?>
