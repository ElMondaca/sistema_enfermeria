<?php
require_once('conexion.php');

$conexion = new conexion();
$conexion->conectar();

$r_usuario = filter_input(INPUT_POST, 'busqueda', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$id = $r_usuario;
$query = "SELECT * FROM alumno WHERE alumno.app_alumno = '$r_usuario' OR alumno.apm_alumno = '$r_usuario'";
if($q = $conexion->mysqli->query($query)) {
    while($datos=$q->fetch_object()):
    ?>
    <div class="">

            <p>Rut: <?=$datos->rut_alumno." <br>Nombre del estudiante: ".$datos->n_alumno." ".$datos->app_alumno." ".$datos->apm_alumno?></p>
            <p>Correo electronico del estudiante: <?=$datos->mail_alumno?> - Telefono del alumno: <?=$datos->tel_alumno?></p>
            <p>Estado del estudiante: <?=$datos->estado_alumno?> </p>
            <p>Año de ingreso: <?=$datos->ingreso_alumno?></p>
            <p>RNI ingresado: <?=$datos->rni_alumno?></p>
            <a href='inmunizaciones.php?id=<?php echo $datos->rut_alumno;?>'> Detalle de inmunizaciones</a> ----- <a href='rni.php?id=<?php echo $datos->rut_alumno;?>'>Registro de RNI</a>


          </div>
          <br>
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
