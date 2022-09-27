<html>
<head lang="es">
  <title>Prestamo de equipos</title>
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
require_once('include/nav.php');
?>
<div class="container">
  <br><br><br>
  <div class="col-lg-12">
    <legend>Registro de equipos</legend>
    <div class="col-lg-12" id="registro">
      <form method="post" id="form_registro">
        <div class="form-group">
            Inventario ULS: <input type="text" class="form-control" name="inventario" id="inventario">
        </div>
        <div class="form-group">
            Inventario Interno Enfermería: <input type="text" class="form-control" name="inventario" id="inventario">
        </div>
        <div class="form-group">
            Equipo:  <input type="text" class="form-control" name="nequipo" id="nequipo">
        </div>
        <div class="form-group">
            Detalle: <input type="text" class="form-control" name="detalle" id="detalle">
        </div>
        <div class="form-group">
          Procedencia: <select class="form-control" name="origen" id="origen">
            <option value="0">SELECCIONE</option>
            <option value="Comprado">Comprado</option>
            <option value="Donado">Donado</option>
            <option value="En comodato">En comodato</option>
          </select>
        </div>
        <div class="form-group">
            Fecha de adquisición: <input type="date" class="form-control" name="compra" id="compra">
        </div>
        <div class="form-group">
          Observaciones:<input type="text" class="form-control" name="observacion" id="observacion">
        </div>
        <div class="form-group">
    Tipo:
          <select class="form-control" name="tipo" id="tipo">
            <option value="0">SELECCIONE</option>
            <option value="Informático">Informático</option>
            <option value="Equipamiento">Equipamiento</option>
            <option value="Materiales">Materiales</option>
          </select>
        </div>
        <div class="form-group">
            <button type="button" class="btn btn-primary" id="enviar">Ingresar</button>
        </div>
      </form>
    </div>
  </div>
  <br><br>
  <div class="col-lg-12">
    <legend>Detalle de equipos</legend>
    <div class="col-lg-12" id="equipos">
    </div>
  </div>
</div>

<script src="js/bootstrap.min.js"></script>
<script>
      $(document).ready(function() {

        $( "#equipos" ).load( "ajax/equipos.php", function() {
        });



    $("#enviar").click(function(){
    $.ajax({
        type: "POST",
        url: "ajax/registro.php",
        data: "inventario=" + $("#inventario").val() +
        '&nequipo=' + $("#nequipo").val() +
        '&detalle=' + $("#detalle").val() +
        '&observacion=' + $("#observacion").val() +
        '&origen=' + $("#origen").val() +
        '&compra=' + $("#compra").val() +
        '&tipo=' + $("#tipo").val() ,
        success: function(data) {
          if(data.success) {
            $( "#equipos" ).load( "ajax/equipos.php", function() {
            });
            document.getElementById("form_registro").reset();
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
</hmtl>
