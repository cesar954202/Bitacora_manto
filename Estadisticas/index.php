<?php
include('../check.php');
	 header("Content-Type: text/html;charset=utf-8");
 ?>
<!DOCTYPE html>
<head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<html>
<title>Buscar</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<body class="blue-grey">

    <!--contenedor Principal-->
  <br>
  <br>
  <br>
  <div class="container center grey darken-4 white-text">


    <?php
      echo "<div class='row'><a class='dropdown-button left white-text col s2' href='../login.php' ><i class='material-icons'>arrow_back</i> Regresar</a></div>";
      echo "<br><div class='row '>Bienvenido $user_check</div>";
      echo"<br><div class = 'row '><a href='../logout.php' class='waves-effect blue-grey btn right'>Cerrar sesión</a></div>";
      if(!$_POST)
      {

        echo"
        <div class='row'>

          <div class='col s4'>
            <div class='input-field col s12 m12 white-text'>
              <select multiple name='servicio[]'>
                 <option value= 'Cambio de baterias' > Cambio de baterias </option>
                 <option value= 'Apertura' > Apertura</option>
                 <option value= 'Reprogramacion' > Reprogramacion </option>
                 <option value= 'Problema mecanico' > Problema mecanico </option>
                 <option value= 'Marca seguro interno' > Marca seguro interno </option>
              </select>
              <label>Servicio</label>
            </div>
          </div>

          <div class='col s2'>
            <div class='input-field col s12 m12'>
              <input type='text' name='numeroHab' id='habitacion' class='validate' onkeypress='return valida(event)' >
              <label for='habitacion'># Habitación</label>
            </div>
          </div>

          <div class='col s2'>
            <div class='input-field white-text'>
              <select name='objeto' required>
                <option value= 'chapa' > Chapa </option >
                <option value= 'caja' > Caja </option>
              </select>
              <label>Servicio a</label>
            </div>
          </div>

          <div class='col s2'>
            <div class='input-field col s12 m12'>
              <input type='text' name='comentario' id='comentario' class='validate'  >
              <label for='comentario'>Comentario</label>
            </div>
          </div>

          <div class='col s2'>
            <div class='input-field col s12 m12'>
              <input type='text' name='usuario' id='usuario' class='validate'  >
              <label for='Usuario'>Usuario</label>
            </div>
          </div>

        </div>

        ";

      }
      else
      {

      }

      
    ?>

  </div>
     <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="../js/materialize.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function(){
          $('select').material_select();
        });
      </script>
</body>
</html>