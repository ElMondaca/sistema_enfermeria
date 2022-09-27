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
$query = "SELECT * FROM carnet_vacuna WHERE id_carnet = '$r_alumno'";
if($q = $conexion->mysqli->query($query)) {
  $datos=$q->fetch_object();
}else{
  print_r(json_encode(array("error" => $conexion->mysqli->error)));
  exit();
}
?>
<br><br>
<div class="container">
    <legend>DOCUMENTO REGISTRADO</legend>
      <?php
        $carnet_vacuna = $datos->ruta_carnet;
       ?>
       <iframe id="descFrame" scrolling="auto" name="descFrame" src='<?=$carnet_vacuna?>' width="100%" height="100%" frameborder="0"></iframe> 
  </div>
</div>


<script>
                    $(document).ready(function(){





                    });
</script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
