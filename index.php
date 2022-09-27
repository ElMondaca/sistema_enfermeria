<html>
<head lang="es">
  <title>Home Enfermería</title>
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
?>
<style>
  input[type=number] {
    max-width: 100px;
  }
</style>

  <div class="container"><br><br>
      <div class="col-lg-4" align="center">
            <a href="justificativo">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-time" width="100" height="100" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M11.795 21h-6.795a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v4" />
            <circle cx="18" cy="18" r="4" />
            <path d="M15 3v4" />
            <path d="M7 3v4" />
            <path d="M3 11h16" />
            <path d="M18 16.496v1.504l1 1" />
          </svg>
            <center>Registro de justificativos de inasistencia<br>de estudiantes de Enfermería</a></center>
          </div>

        <div class="col-lg-4" align="center">
          <a href="prestamo2">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-news" width="100" height="100" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11" />
            <line x1="8" y1="8" x2="12" y2="8" />
            <line x1="8" y1="12" x2="12" y2="12" />
            <line x1="8" y1="16" x2="12" y2="16" />
          </svg>
            <center>Registro de prestamo de equipamiento<br> dependendiente de  Dirección de Escuela</center></a>
          </div>
          <div class="col-lg-4" align="center">
            <a href="vacunacion">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building-hospital" width="100" height="100" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
              <line x1="3" y1="21" x2="21" y2="21" />
              <path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16" />
              <path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4" />
              <line x1="10" y1="9" x2="14" y2="9" />
              <line x1="12" y1="7" x2="12" y2="11" />
            </svg>  
            <center>Registro de Inmunizaciones de estudiantes <br> de Enfermería</center></a>
            </div>
            <br><br>
            <div class="col-lg-12" align="center">
              <a href="docentes">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="100" height="100" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <circle cx="12" cy="7" r="4" />
                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
              </svg>
                <center>Registro de Docentes y Académicos adscritos al <br> Departamento de Enfermería</center></a></img>
              </div>
  </div>

        <script>

$(document).ready(function() {
        $("#abrir_registro").click(function() {
                  $("#modal_registro").modal();
              });

        $("#abrir_equipo").click(function() {
                  $("#modal_equipo").modal();
              });

              $("#registro_e").click(function(){
                $.ajax({
               		type: "POST",
               		url: "ajax/registro_e.php",
               		data: "id_equipo=" + $("#id_equipo").val() +
                  '&n_equipo=' + $("#n_equipo").val() +
                  '&det_equipo=' + $("#det_equipo").val() +
                  '&observ_equipo=' + $("#observ_equipo").val() +
                  '&tipo_equipo=' + $("#tipo_equipo").val(),
               		success: function(data) {
               		if(data.success) {
               					$("#registro_mensaje").html("<h1>Registrado correctamente</h1>");
               		}
                  	else {
                 				$("#registro_mensaje").html("<h1>Ha ocurrido un error</h1>");
                 	}
                 	},
                 	error: function(data){
                 	console.log(data);
                 	}
                 });
               });

        $("#registro_a").click(function(){
       		$.ajax({
         		type: "POST",
         		url: "ajax/registro.php",
         		data: "rut_usuario=" + $("#rut_usuario").val() +
            '&nombre_usuario=' + $("#nombre_usuario").val() +
             '&app_usuario=' + $("#app_usuario").val() +
             '&apm_usuario=' + $("#apm_usuario").val(),
         		success: function(data) {
         		if(data.success) {
         					$("#registro_mensaje").html("<h1>Registrado correctamente</h1>");
         		}
            	else {
           				$("#registro_mensaje").html("<h1>Ha ocurrido un error</h1>");
           	}
           	},
           	error: function(data){
           	console.log(data);
           	}
           });
         });


});
        </script>
        <script src="js/bootstrap.min.js"></script>
</body>
</html>
