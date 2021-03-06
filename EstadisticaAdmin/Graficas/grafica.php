<?php
include('../../check.php');
	 header("Content-Type: text/html;charset=utf-8");
 ?>
<!DOCTYPE html>
<head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="../../css/materialize.min.css"  media="screen,projection"/>

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<html>
<title>Grafica</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<body class="blue-grey">

  <!--contenedor Principal-->
  <br>
  <div class="container center grey darken-4 white-text">

    <?php
    $date1 = new DateTime("now");
    $today = $date1->format('Y-m-d');
      echo "<br><div class='row'><a class='dropdown-button left white-text col s2' href='../index.php' ><i class='material-icons'>arrow_back</i> Regresar</a>";
      echo"<a onclick='window.close();' class='waves-effect blue-grey btn col s2 offset-s7'>Cerrar</a></div>";
      echo "<br><div class='row '>Bienvenido $user_check <br> Busquedas de resultados</div>";

      if(!$_GET)
      {
        header('Location: ../index.php');
      }

      else
      {
        $sqlencode = $_GET['consulta'];
        $sql = base64_decode($sqlencode);

        $Horziontal = $_GET['ordenar'];
        ///consulta de objetos diferentes integrado a los parametros de la otra busqueda                                               integracion de parametros

        $sqlSobreResult = "SELECT distinct $Horziontal as horizontal FROM incidentes INNER JOIN usuarios ON incidentes.id_usuario = usuarios.id_usuario  ". $sql ." ";

        $datos[0] = array('Cantidad','Servicios');

        if ($result = $mysqli->query($sqlSobreResult))
        {
          if ($result->num_rows > 0)
          {
            $i = 1;
            while ($row = $result->fetch_object())
            {

              //consulta de cantidad de objetos buscados
              $sqlSobreResultCantidad = "SELECT COUNT(*) as numero FROM incidentes INNER JOIN usuarios ON incidentes.id_usuario = usuarios.id_usuario ". $sql ." AND $Horziontal = '$row->horizontal'";
              if ($resultCantidad = $mysqli->query($sqlSobreResultCantidad))
              {
                if ($resultCantidad->num_rows > 0)
                {
                  while ($rowCantidad = $resultCantidad->fetch_object())
                  {
                    /////Insersion en arreglo para impresion en graficas
                    $datos[$i] = array( $row->horizontal , (int)$rowCantidad->numero ); 
                    $i = $i +1;
                  }
                }
              }
              ///Se acaba consulta de cantidad de objetos
            }
          }
        }

        ?>
        <!--Script Grafica impresion -->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
          google.charts.load('current', {'packages':['bar']});
          google.charts.setOnLoadCallback(drawStuff);

          var cargaDatos = <?php echo json_encode($datos); ?>;

          function drawStuff() {
            var data = new google.visualization.arrayToDataTable(cargaDatos);

            var options = {
              width: 600,
              height: 400,
              legend: { position: 'none' },
              chart: {
                title: 'Grafica opcional',
                subtitle: 'Sistema de control a mantenimeinto chapas y cajas de seguridad' },
              axes: {
                x: {
                  0: { side: 'top', label: <?php echo "'". $Horziontal ."'"?>} // Top x-axis.
                }
              },
              bar: { groupWidth: "30%" }
            };

            var chart = new google.charts.Bar(document.getElementById('top_x_div'));
            // Convert the Classic options to Material options.
            chart.draw(data, google.charts.Bar.convertOptions(options));
          };
        </script>
        <!--FIN Grafica impresion -->
        <div class="container"><div class="row"><div id="top_x_div" style="width: 750px; height: 500px;"></div></div></div><!-- Grafica impresion -->
        <?php

      }
      
    ?>

  </div>
     <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="../../js/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="../../js/materialize.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function(){
          $('select').material_select();
        });
      </script>
</body>
</html>


