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
<title>Nuevo usuario</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<body class="blue-grey">

    <!--contenedor Principal-->
  <br>
  <br>
  <br>
  <div class="container center grey darken-4 white-text">


    <div class="col s4 offset-s4 ">

        <form class="row grey darken-4 white-text z-depth-5" action="guardando_usuario.php" method="post" enctype="multipart/form-data" >
          <?php
            echo "<div class='row'><a class='dropdown-button left white-text col s2' href='../login.php' ><i class='material-icons'>arrow_back</i> Regresar</a></div>";
            echo "<br><div class='row '>Bienvenido $user_check</div>";
            echo" <div class='input-field col s12 m12'>
                    <input type='text' name='nombre' id='nombre' class='validate' required>
                    <label for='nombre'>Nombre de usuario</label>
                  </div>";
                  
          ?>
          <div class="col s12 m12">
            <div class="input-field white-text">
              <select name="tipo" required>
                <option value= '1' > Estandar </option >
                <option value= '0' > Administrador </option>
              </select>
            <label>Permiso:</label>
            </div>

          </div>
          <div class="input-field col s12">
            <input id="password" type="password" class="validate" name="pass" required>
            <label for="password">Password</label>
          </div>

        <button class="waves-effect  btn  row col s4 offset-s4" type="submit" name="Submit">Guardar</button>
        </form>

    </div>
    <div class = 'row '><a href='../logout.php' class='waves-effect blue-grey btn '>Cerrar sesión</a></div>
  </div>
     <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="../js/materialize.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function() {
        $('select').material_select();
      });
      </script>

</body>
</html>