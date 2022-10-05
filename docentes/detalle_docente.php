<html>
<head lang="es">
  <title>Admin. Docentes</title>
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
    require_once('ajax/conexion.php');
    $conexion = new conexion();
    $conexion->conectar();
    $id_cert = $_GET['id'];
    $query = "SELECT * FROM docente WHERE docente.rut_docente = '$id_cert'";
    if($q = $conexion->mysqli->query($query)) {
      $datos=$q->fetch_object();
    }else{
      print_r(json_encode(array("error" => $conexion->mysqli->error)));
      exit();
    }
    ?>
    <br><br>
    <div class="container">
      <div class="col-lg-4">
        <legend>Datos del Docente.</legend>
        <div class="panel-body">
          <p>Rut Docente: <?=$datos->rut_docente?></p>
          <p>Nombre: <?=$datos->n_docente." ".$datos->app_docente." ".$datos->apm_docente?></p>
          <p>Mail: <?=$datos->mail_docente?></p>
          <p>Inicio actividades en Universidad: <?=$datos->ingreso_docente?></p>
          <p>Departamento adscrito: <?=$datos->depto_docente?></p>
          <p>Especialidad: <?=$datos->esp_docente?></p>
          <p>Estado del docente: <?=$datos->estado_docente?></p>
        </div>
      </div>
      <div class="col-lg-8">
        <legend>Modificar estado del Docente</legend>
        <form method="post" id="form_registro">
        <div class="form-group">
            Grado académico:
            <select class="form-control" name="gradoaca" id="gradoaca">
              <option value="0">SELECCIONE</option>
              <option value="Licenciado">Licenciado</option>
              <option value="Magister">Magister</option>
              <option value="Doctorado">Doctorado</option>
            </select>
        </div>
        <div class="form-group">
            Jerarquía Docente:
            <select class="form-control" name="jerarq" id="jerarq">
              <option value="0">SELECCIONE</option>
              <option value="Sin Jerarquia">Sin Jerarquia</option>
              <option value="Asistente">Asistente</option>
              <option value="Profesor Asociado">Profesor Asociado</option>
              <option value="Profesor Titular">Profesor Titular</option>
            </select>
        </div>
        <div class="form-group">
            Estado del docente:
            <select class="form-control" name="estadodoc" id="estadodoc">
              <option value="0">SELECCIONE</option>
              <option value="Activo">Activo</option>
              <option value="Inactivo">Inactivo</option>
            </select>
        </div>
        <div class="form-group">
            Especialidad del Docente:
            <input type="text" class="form-control" name="esp" id="esp">
        </div>
        <div class="form-group">
            <input type="hidden" class="form-control" name="rut" id="rut" value="<?=$id_cert?>">
        </div>
        <div class="form-group">
          <div class="col-lg-10 col-lg-offset-2">
            <button type="button" class="btn btn-primary" id="enviar">Actualizar</button>
          </div>
        </div>
      </form>
      </div>
 <script>
 $(document).ready(function() {

   $("#enviar").click(function(){
   $.ajax({
       type: "POST",
       url: "ajax/actualizacion_docente.php",
       data: "rut=" + $("#rut").val() +
       '&gradoaca=' + $("#gradoaca").val() +
       '&jerarq=' + $("#jerarq").val() +
       '&estadodoc=' + $("#estadodoc").val() +
       '&esp=' + $("#esp").val(),
       success: function(data) {
         if(data.success) {
           document.getElementById("form_registro").reset();
           window.setTimeout(function () { location.replace("index.php"); }, 2000);
         }
         else {
           console.log("error");
           console.log(data);
         }
       }, error: function(data){
         console.log("error");
         console.log(data);
       }
     });});







 });
 </script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
