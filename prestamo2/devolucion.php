<html lang="es">
<head>
  <title>Devolución</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link rel="stylesheet" href="css/bootstrap.css" media="screen">
  <link rel="stylesheet" href="assets/css/custom.min.css">
  <link rel="icon" href="img/favicon.png" type="image/png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script></head>
  <body>
      <?php
      	require_once('include/nav.php');
      	require_once('ajax/conexion.php');
      	$conexion = new conexion();
      	$conexion->conectar();
        $id_prestamo = $_GET['id'];

        $prestamos = " select alumno.rut_alumno as RUT, alumno.n_alumno as NA, alumno.app_alumno as APA, alumno.apm_alumno AS AMA,
        equipo.id_equipo AS IDE, equipo.n_equipo AS NEQ, equipo.det_equipo AS DETE, docente.rut_docente as IDO, docente.n_docente as NDO,
        docente.app_docente AS APD, docente.apm_docente AS AMD, prestamo2.det_actividad AS ACTI, prestamo2.asig_actividad AS ASIG,
        prestamo2.dir_actividad AS DIRE, prestamo2.contacto_est AS CONTACTO, prestamo2.fecha_solcitud AS SOLI, prestamo2.estado_prestamo AS ESTADO,
        prestamo2.observ_prestamo AS OBSERV, prestamo2.id_prestamo AS IDP, prestamo2.contacto_est AS CORREO
        from alumno, docente, equipo, prestamo2
        WHERE alumno.rut_alumno = prestamo2.det_alumno AND equipo.id_equipo = prestamo2.det_equipo AND docente.rut_docente = prestamo2.det_docente
        AND prestamo2.id_prestamo = '$id_prestamo'
        ORDER BY prestamo2.id_prestamo DESC";
        if($q = $conexion->mysqli->query($prestamos)){
          while($datos=$q->fetch_object()):
          ?>
          <div class="container">
            <br><br><br>
            <div class="col-lg-12">
              <legend>Datos del prestamo</legend>
              <p>Detalle del Equipo: <?=$datos->NEQ." ".$datos->DET." ".$datos->DETE?></p>
              <p>Estudiante que solicitó: <?=$datos->RUT." ".$datos->NA." ".$datos->APA." ".$datos->AMA?></p>
              <p>Actividad realizada: <?=$datos->ASIG." ".$datos->ACTI?></p>
              <p>Observaciones previas: <?=$datos->OBSERV?></p>
              <form method="post" id="form_devolucion">
                <div class="form-group">
                    <label for="fecha_entrega" class="col-lg-8 control-label"></span>Fecha de devolución</label>
                    <input type="date" class="form-control" name="entrega" id="entrega">
                </div>
                <div class="form-group">
                    <label for="diagnostico" class="col-lg-8 control-label">Observaciones</label>
                    <input type="text" class="form-control" name="observacion" id="observacion">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" name="detalle" id="detalle" value="<?php echo $id_prestamo; ?>">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" name="equipo" id="equipo" value="<?=$datos->IDE?>">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" name="correo" id="correo" value="<?=$datos->CORREO?>">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" name="nombremail" id="nombremail" value="<?=$datos->NEQ." ".$datos->DETE?>">
                </div>
                <div class="form-group">
                  <div class="col-lg-10 col-lg-offset-2">
                    <button type="button" class="btn btn-primary" id="enviar">Actualizar</button>
                  </div>
              </form>
            </div>
          </div>
        </div>
<?php
endwhile;
        }

  ?>
  <script src="js/bootstrap.min.js"></script>
  <script>
        $(document).ready(function() {
      $("#enviar").click(function(){
      $.ajax({
          type: "POST",
          url: "ajax/devolucion.php",
          data: "entrega=" + $("#entrega").val() +
          '&detalle=' + $("#detalle").val() +
          '&equipo=' + $("#equipo").val() +
          '&observacion=' + $("#observacion").val() +
          '&correo=' + $("#correo").val() +
          '&nombremail=' + $("#nombremail").val(),
          success: function(data) {
            if(data.success) {
              $("#form_devolucion").html('<h1><center>Devolución ingresada</center></h1>');
              window.setTimeout(function () { location.replace("verp.php"); }, 3000);
            }
            else {
              console.log("error");
              console.log(data);
            }
          }, error: function(data){
            console.log("error");
            console.log(data);
          }
        });});});
    </script>
    </body>
</html>
