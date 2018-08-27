<?php
include('check.php');
	 header("Content-Type: text/html;charset=utf-8");
 ?>
<!DOCTYPE html>
<head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<html>
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<body class="blue-grey">

    <!--contenedor Principal-->
  <br>
  <br>
  <br>
  <div class="container center grey darken-4 white-text">


    <?php
      echo "<br><div class='row '>Bienvenido $user_check</div>";
      if($tipo_user == 0)
      {
        echo"<br><div class = 'row'><a class='waves-effect btn col s4 offset-s4'>Administrar opciones</a></div>";

        echo"
        <div class='row'>

          <ul class='collapsible col s4 offset-s4 teal lighten-2'>
            <li>
              <div class='collapsible-header teal lighten-2 white-text'>ADMINISTRAR USUARIOS</div>
              <div class='collapsible-body'><span>
                <div class='row'><a href='Usuario/nuevo.php' class='waves-effect btn col s12 teal darken-1'>Crear</a></div>
                <div class='row'><a class='waves-effect btn col s12 teal darken-1'>Borrar</a></div>
                <div class='row'><a class='waves-effect btn col s12 teal darken-1'>Editar</a></div>
              </span></div>
            </li>
          </ul>

        </div>

        ";

      }
      echo"<div class = 'row'><a href='incidente/index.php' class='waves-effect btn col s4 offset-s4'>Nuevo incidencia</a></div>";
      echo"<div class = 'row'><a class='waves-effect btn col s4 offset-s4'>Estadisticas</a></div>";
      echo"<div class = 'row'><a class='waves-effect btn col s4 offset-s4'>Alertas</a></div>";

      echo"<br><div class = 'row '><a href='logout.php' class='waves-effect blue-grey btn '>Cerrar sesión</a></div>";
    ?>

  </div>
     <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function(){
          $('.collapsible').collapsible();
        });
      </script>
</body>
</html>