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
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<body class="blue-grey">

    <!--contenedor Principal-->
  <br>
  <br>
  <br>
  <div class="container center grey darken-4 white-text">


    <div class="col s4 offset-s4 ">

        <form class="row grey darken-4 white-text z-depth-5" action="guardando_incidente.php" method="post" enctype="multipart/form-data" >
          <?php
            echo "<div class='row'><a class='dropdown-button left white-text col s2' href='../login.php' ><i class='material-icons'>arrow_back</i> Regresar</a></div>";
            echo "<br><div class='row '>Bienvenido $user_check</div>";
            echo" <div class='input-field col s12 m12'>
                    <input type='text' name='numeroHab' id='habitacion' class='validate' onkeypress='return valida(event)' required>
                    <label for='habitacion'># Habitación</label>
                  </div>";
                  

            echo "<div class='input-field col s12 m12 white-text'>
              <select multiple name='servicio[]' required>";
                       echo "<option value= 'Cambio de baterias' > Cambio de baterias </option>";
                       echo "<option value= 'Apertura' >Apertura</option>";
                       echo "<option value= 'Reprogramacion' > Reprogramacion </option>";
                       echo "<option value= 'Problema mecanico' > Problema mecanico </option>";
                       echo "<option value= 'Marca seguro interno' > Marca seguro interno </option>";
              echo"</select>
              <label>Servicio</label>
            </div>";
          ?>
          <div class="col s12 m12">
            <div class="input-field white-text">
              <select name="objeto" required>
                <option value= 'chapa' > Chapa </option >
                <option value= 'caja' > Caja </option>
              </select>
            <label>Servicio a</label>
            </div>

          </div>
          <div class="input-field col s12 m12">
            <textarea name="comentario" id="comentario" class="materialize-textarea" data-length="50" required></textarea>
            <label for="comentario">Comentario</label>
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
        $('input#input_text, textarea#textarea1').characterCounter();
      });

        function valida(e){
          tecla = (document.all) ? e.keyCode : e.which;

          //Tecla de retroceso para borrar, siempre la permite
          if (tecla==8){
              return true;
          }
              
          // Patron de entrada, en este caso solo acepta numeros
          patron =/[0-9]/;
          tecla_final = String.fromCharCode(tecla);
          return patron.test(tecla_final);
      }
      </script>

</body>
</html>
<div class="footer-copyright">
  <div class="container">
    <div align="right">by Cesar Sanchez</div>
  </div>
</div>