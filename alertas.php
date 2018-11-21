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
        
      $date2 = new DateTime("now");

      echo "<br><div class='row '>Bienvenido $user_check</div>";
      echo "<br><br><div class='row '>Habitaciones con mas de 4 meses sin cambio de bateria</div>";
      echo "<table class='bordered grey darken-2'>
        <thead class='teal darken-4'>
          <tr>
              <th># habitacion</th>
              <th>Fecha ultimo cambio de baterias</th>
              <th>Dias transcurridos</th>
          </tr>
        </thead>
        <tbody>";

      $sql= "SELECT distinct habitacion as hab, (SELECT MAX(date_1) FROM incidentes WHERE habitacion = hab) as fecha FROM incidentes WHERE servicio = 'Cambio de baterias'";

      if ($result= $mysqli->query($sql))
      {
        if ($result->num_rows > 0)
        {
          while ($row = $result->fetch_object())
          {
            $date1 = new DateTime($row->fecha);
            $diff = $date1->diff($date2);

            if($diff->days >= 120 )
            {

              $newDate = date("d/F/Y g:i a", strtotime($row->fecha));

              echo "<tr>
                        <td>$row->hab</td>
                        <td>$newDate</td>
                        <td>$diff->days dias</td>
                    </tr>
             ";
            }
          }
        }
      }

      echo "</tbody>
        </table>";

      echo"<br><br><br><div class = 'row '><a href='logout.php' class='waves-effect blue-grey btn '>Cerrar sesión</a></div>";
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