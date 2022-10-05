<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Registro de asistencia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="assets/css/custom.min.css">
    <link rel="icon" href="img/favicon.png" type="image/png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

</head>
<body>
  <br><br><br>
      <?php
    	require_once('include/nav.php');
    	require_once('ajax/conexion.php');
    	$conexion = new conexion();
    	$conexion->conectar();
      $r_alumno = $_GET['id'];
        $query2 = "SELECT certificado.id_certificado, alumno.rut_alumno, alumno.n_alumno, alumno.app_alumno,
        alumno.apm_alumno, emisor.n_emisor, certificado.diagnostico, certificado.fecha_emision,
        certificado.fecha_entrega, certificado.detalle_certificado as CERTIFI
        FROM alumno, certificado, emisor, nivel
        WHERE certificado.n_alumno=alumno.rut_alumno AND certificado.n_nivel=nivel.id_nivel
        AND certificado.n_emisor=emisor.id_emisor
        AND alumno.rut_alumno = '$r_alumno'";
        $q2 = $conexion->mysqli->query($query2);
        echo "<br> <div class='container'>";
          while ($certificado2 = $q2->fetch_object()):
    			?>

          <div class="col-lg-4">
                <legend>Detalle de certificado</legend>
                <div class="panel-body">
    							<p>Codigo certificado: <?=$certificado2->id_certificado?></p>
                  <p>Emisor del certificado: <?=$certificado2->n_emisor?></p>
    							<p>Motivo de inasistencia: <?=$certificado2->diagnostico?></p>
    							<p>Fecha de entrega del certificado: <?=$certificado2->fecha_entrega?></p>
                  <p>Días de inasistencia: <?php echo "5 días";?></p>
                  <p>Fecha de inicio de las inasistencias: <?php echo "10/7/2022";?></p>
                  <p>Estado del certificado: <?php echo "Aceptado";?></p>
                  <a href='detallecertificado.php?id=<?=$certificado2->id_certificado?>'>Agregar detalle</a>
                  <?php
                    if ($certificado2->CERTIFI == 0){
                   ?>
                  <a href='documento_certificado.php?id=<?=$certificado2->id_certificado?>'>Subir documento</a>
                  <?php
                }else{
                   ?>
                   <a href='ver_documento.php?id=<?=$certificado2->CERTIFI?>'>Ver documento</a>
                 <?php } ?>
    						</div>
          </div>
          <?php

          endwhile;

          ?>
          </div>
