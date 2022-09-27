<?php
require_once('conexion.php');

$conexion = new conexion();
$conexion->conectar();

$r_usuario = filter_input(INPUT_POST, 'busqueda', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$id = $r_usuario;
$query = "SELECT * FROM docente WHERE docente.app_docente = '$r_usuario' OR docente.apm_docente = '$r_usuario'";
if($q = $conexion->mysqli->query($query)) {
    while($datos=$q->fetch_object()):
    ?>
    <div class="">

            <p>Rut: <?=$datos->rut_docente." Nombre Docente: ".$datos->n_docente." ".$datos->app_docente." ".$datos->apm_docente." Titulo Profesional:".$datos->titulo_docente." - Año de ingreso: ".$datos->ingreso_docente." - Correo: ".$datos->mail_docente." - Departamento adscrito: ".$datos->depto_docente?></p>
            <a href='asig_docente.php?id=<?php echo $datos->rut_docente;?>'>Detalle de Actividades</a> --- <a href='detalle_docente.php?id=<?php echo $datos->rut_docente;?>'>Actualizar información</a>


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
