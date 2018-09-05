<?php
   include("conexion.php"); // Monumental de la conexión a BD
   session_start(); // Varible de Sesión Iniciada

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // Usamos el nombre de usuario enviado de nuestro formulario

      $myusername = mysqli_real_escape_string($mysqli,strtoupper($_POST['usuario_l'])); // Nombre del usuario convertido a Mayusculas
      $mypassword = mysqli_real_escape_string($mysqli,$_POST['contrasena_l']); // Pdw del usuario 



      $sql= "SELECT * FROM usuarios WHERE nombre = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($mysqli,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      $count = mysqli_num_rows($result);
          if ($result = $mysqli->query($sql))
          {
            if ($result->num_rows > 0)
            {
              while ($row = $result->fetch_object())
              {$tipo =  $row->tipo;}
             }
          }
      

      // Si el resultado combinado $myusername y $mypassword, fila de la tabla debe estar en 1 fila

      if($count == 1) {
        #session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         $_SESSION['loggedin'] = true; // Restrincción si la sessión esta activa 
         $_SESSION['username'] = $tipo; // usuario administrador
         $_SESSION['start'] = time(); // Variable para determinar el tiempo de la sesión
         $_SESSION['expire'] = $_SESSION['start']; //Duración de la sesión inactiva

         header("location: login.php");
      }else {
        echo "<script>";
        echo "alert ('Usuario o Contraseña Incorrecto Vuelve a intentarlo')";
        echo "</script>";
        echo"<script language='javascript'>window.location='index.php'</script>;";
        echo"<script language='javascript'>window.location='logout.php'</script>;"; // Truena la conexión a BD
      }
   }
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
<body  class="blue-grey">

    <!--contenedor Principal-->

  <div class="row center">

    <div class="col s12 m4"></div>
  <!--contenedor de login-->
    <div class="col s12 m4">
      <div = class="row">

        <form class="row grey darken-4 white-text z-depth-5" action="" method="post" enctype="multipart/form-data" >
        <div class="row"><center><h4 class="center col s12" >Bienvenido</h4></center></div>
        <div class="row"><center><h6 class="center col s12" >Sistema para control de mantenimeinto a chapas y cajas de seguridad</h6><br></center></div>


        <div class="row center"><img src="img/logo1.png"></div>
        

        <div class="row">
          <div class="input-field col s12">
            <input id="usuario" type="text" class="validate" name="usuario_l" required>
            <label for="usuario">Usuario</label>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s12">
            <input id="password" type="password" class="validate" name="contrasena_l" required>
            <label for="password">Password</label>
          </div>
        </div>

        <button class="btn block amber round-xxlarge hover-orange row col s4 offset-s4" type="submit" name="Submit">Ingresar</button>

        </form>
      </div>
    </div>
  <!--fin contenedor de login-->
  </div>
     <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>
