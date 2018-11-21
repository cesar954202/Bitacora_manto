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

        if(isset($_POST['finicio']))
        {
          $finicio = $_POST['finicio'];
          $ffinal = $_POST['ffinal'];


        }
        else
        {
          $date1 = new DateTime("now");
          $today = $date1->format('Y-m-d');
          $finicio = $today;
          $ffinal = $today;
        }

       echo "
        <div class='row'>
         <form method = 'post'>
            <div class='row'>
            <div class='col s3 offset-s3'>
              <div class='col s12 m12'>
                <input type='date' name='finicio' id='finicio' value='$finicio' required>
                <label for='finicio'>Fecha incial</label>
              </div>
            </div>
            <div class='col s3'>
              <div class='col s12 m12'>
                <input type='date' name='ffinal' id='ffinal' value='$ffinal' required>
                <label for='ffinal'>Fecha final</label>
              </div>
            </div>            <button class='waves-effect  btn  row col s4 offset-s4' type='submit' name='Submit'>Buscar</button>
         </form>
        </div>

        ";

        $ffinalMasUno = strtotime ( '+1 day' , strtotime ( $ffinal ) ) ;
        $ffinalMasUno = date ( 'Y-m-j' , $ffinalMasUno );
        $sqlSobreResult = "SELECT DISTINCT usuarios.nombre as usuario FROM incidentes INNER JOIN usuarios ON incidentes.id_usuario = usuarios.id_usuario WHERE date_1 BETWEEN '$finicio' AND '$ffinalMasUno' ";

        $datos[0] = array('Cantidad','Servicios');

        //echo "<br> Consulta: " . $sqlSobreResult;
        if ($result = $mysqli->query($sqlSobreResult))
        {
          if ($result->num_rows > 0)
          {
            $i = 1;
            while ($row = $result->fetch_object())
            {
              //echo $Horizontal . ": " . $row->horizontal;
              $sqlSobreResultCantidad = "SELECT COUNT(*) as numero FROM incidentes INNER JOIN usuarios ON incidentes.id_usuario = usuarios.id_usuario WHERE nombre = '$row->usuario' AND date_1 BETWEEN '$finicio' AND '$ffinalMasUno'";
              if ($resultCantidad = $mysqli->query($sqlSobreResultCantidad))
              {
                if ($resultCantidad->num_rows > 0)
                {
                  while ($rowCantidad = $resultCantidad->fetch_object())
                  {
                    //echo " Cantidad: " . $rowCantidad->numero . "<br>";
                    $datos[$i] = array( $row->usuario , (int)$rowCantidad->numero ); 
                    $i = $i +1;
                  }
                }
              }
            }
          }
        }
        echo "<div class='row'>";

        ?>


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
                      title: 'Grafica Usuario ',
                      subtitle: 'Sistema de control a mantenimeinto chapas y cajas de seguridad' },
                    axes: {
                      x: {
                        0: { side: 'top', label: <?php echo "'habitacion'"?>} // Top x-axis.
                      }
                    },
                    bar: { groupWidth: "30%" }
                  };

                  var chart = new google.charts.Bar(document.getElementById('top_x_div'));
                  // Convert the Classic options to Material options.
                  chart.draw(data, google.charts.Bar.convertOptions(options));
                };
              </script>
              <div class="container"><div class="row"><div id="top_x_div" style="width: 750px; height: 500px;"></div></div></div>
            </div>

        <?php
      
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


