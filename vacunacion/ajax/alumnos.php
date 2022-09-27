<?php

require_once('conexion.php');
$conexion = new conexion();
$conexion->conectar();

$querya = "SELECT * FROM alumno";

if($q = $conexion->mysqli->query($querya)) {
while($datos=$q->fetch_object()):
 ?>
 <div class="">

     <p>Rut: <?=$datos->rut_alumno." <br>Nombre del estudiante: ".$datos->n_alumno." ".$datos->app_alumno." ".$datos->apm_alumno."<br>Correo electronico: ".$datos->mail_alumno."- Telefono: ".$datos->tel_alumno?></p>
     <p>Estado del estudiante: <?=$datos->estado_alumno?> </p>
     <p>Año de ingreso: <?=$datos->ingreso_alumno?></p>
     <a href='inmunizaciones.php?id=<?php echo $datos->rut_alumno;?>'> Detalle de inmunizaciones</a><br>
     __________________________________________________________
    </div>
   </div>
  </div>
<?php
endwhile;
}
else {
  print_r(json_encode(array("error" => $conexion->mysqli->error)));
  exit();
 }
?>
