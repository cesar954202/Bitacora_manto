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
        

        echo"
        <div class='row'>

          <ul class='collapsible col s4 offset-s4 teal lighten-2'>
            <li>
              <div class='collapsible-header teal lighten-2 white-text '><center>ADMINISTRAR USUARIOS</center></div>
              <div class='collapsible-body'><span>
                <div class='row'><a href='Usuario/nuevo.php' class='waves-effect btn col s12 teal darken-1'>Crear</a></div>
                <div class='row'><a href='#editarUsuario' class='waves-effect btn modal-trigger col s12 teal darken-1'>Editar</a></div>
              </span></div>
            </li>
          </ul>
        </div>
        ";
        ///Modal de opciones de editar usuario
        if($user_check == 'ADMIN')
        {
          $sql= "SELECT * FROM usuarios";
        }
        else
        {
          $sql= "SELECT * FROM usuarios WHERE tipo >= 0";
        }

      echo"<div class='modal blue-grey' id='editarUsuario'>
            <div class='modal-content'>
                <h5 class='header'> Escoge usuario: </h5>
                <div class='row white-text blue-grey'>";
                  echo '<form action="Usuario/editar.php" method="post">';
                        echo "<div class='input-field col s12'>
                                <select name='id_usuario'>";

                                if ($result= $mysqli->query($sql))
                                {
                                  if ($result->num_rows > 0)
                                  {
                                    while ($row = $result->fetch_object())
                                    {
                                      echo "<option value= '$row->id_usuario' > $row->nombre </option>";

                                    }
                                  }
                                }
                        echo "</select>
                          <label>Usuario</label>
                        </div>";

                  echo '<button class="waves-effect  btn  row col s4 offset-s4" type="submit" name="Submit">Editar</button>
                        </form>
                </div>
            </div>
          </div>';

        /// FIN Modal de opciones de editar usuario

        echo"<br><div class = 'row'><a class='waves-effect btn col s4 offset-s4 center'>Administrar opciones</a></div>";

      }
      echo"<div class = 'row'><a href='incidente/index.php' class='waves-effect btn col s4 offset-s4'>Nuevo incidencia</a></div>";
      echo"<div class = 'row'><a href='Estadisticas/index.php' class='waves-effect btn col s4 offset-s4'>Estadisticas</a></div>";
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
          $('.modal').modal();
          $('select').material_select();
        });
      </script>
</body>
</html>