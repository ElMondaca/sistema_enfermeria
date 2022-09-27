<html>
<head lang="es">
  <title>Inmunizaciones</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link rel="stylesheet" href="css/bootstrap.css" media="screen">
  <link rel="stylesheet" href="assets/css/custom.min.css">
  <link rel="icon" href="img/favicon.png" type="image/png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
  <?php
  require_once('ajax/conexion.php');
require_once('include/nav.php');
$rut_alumno = $_GET['id'];
$conexion = new conexion();
$conexion->conectar();
$r_alumno = $_GET['id'];
?>
<br><br>
<div class="container">
  <div class="col-lg-12">
    <legend>CERTIFICADO DE INASISTENCIA - DOCUMENTO</legend>
    <form action="subir_archivo.php" method="post" enctype="multipart/form-data" >
      <div class="form-group">
          Adjunte certificado: <input type="file" class="form-control" name="docto" id="docto">
      </div>
      <div class="form-group">
          <input type="hidden" class="form-control" name="det_alumno" id="det_alumno" value="<?=$r_alumno;?>">
      </div>
      <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
          <button class="btn btn-primary" id="enviar">Ingresar</button>
        </div>
      </div>

    </form>
  </div>
</div>


<script>
    $(document).ready(function(){


    });
</script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
