<html>
<head lang="es">
  <title>Detalles</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link rel="stylesheet" href="css/bootstrap.css" media="screen">
  <link rel="stylesheet" href="assets/css/custom.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
  <?php
      	require_once('include/nav.php');
      	require_once('ajax/conexion.php');
      	$conexion = new conexion();
      	$conexion->conectar();
        ?>

        <div class="container">
          <br><br><br>
          <div class="col-lg-12">
            <legend>Prestamos Activos</legend>
            <div class="col-lg-12" id="activos">
            </div>
          </div>
          <div class="col-lg-12">
            <legend>Prestamos Entregados</legend>
            <div class="col-lg-12" id="boton">
            <a href="excel_prestados.php?id=0"><button class="btn btn-primary" id="excel">Generar Excel</button></a></br>
            </div>
            <div class="col-lg-12" id="entregados">
            </div>
          </div>
        </div>

<script>
                    $(document).ready(function() {
                      $( "#activos" ).load( "ajax/prestados.php", function() {
                			});
                      $( "#entregados" ).load( "ajax/prestados2.php", function() {
                			});

                    });
</script>
<script>

</script>
<script src="js/bootstrap.min.js"></script>

</body>
</hmtl>
