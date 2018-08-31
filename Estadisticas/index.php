<?php
include('../check.php');
	 header("Content-Type: text/html;charset=utf-8");
 ?>
<!DOCTYPE html>
<head>


  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
  <div class="container center grey darken-4 white-text">

    <?php
    $date1 = new DateTime("now");
    $today = $date1->format('Y-m-d');
      echo "<br><div class='row'><a class='dropdown-button left white-text col s2' href='../login.php' ><i class='material-icons'>arrow_back</i> Regresar</a>";
      echo"<a href='../logout.php' class='waves-effect blue-grey btn col s2 offset-s7'>Cerrar sesión</a></div>";
      echo "<br><div class='row '>Bienvenido $user_check <br> Busquedas de resultados</div>";

      if(!$_POST)
      {

        echo"
      <form action='' method='post'>
        <div class='row'>

          <div class='col s4'>
            <div class='input-field col s12 m12 white-text'>
              <select multiple name='servicio[]' required>
                 <option value= ' ' selected> Cualquiera </option>
                 <option value= 'Cambio de baterias'> Cambio de baterias </option>
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
              <select name='objeto[]' multiple required>
                <option value= ' ' selected>Cualquiera</option>
                <option value= 'chapa' >Chapa</option >
                <option value= 'caja' >Caja</option>
              </select>
              <label>Servicio a</label>
            </div>
          </div>

          <div class='col s2'>
            <div class='input-field col s12 m12'>
              <input type='text' name='comentario' id='comentario' class='validate'  >
              <label for='comentario'>Comentario</label>
            </div>
          </div>";
/////////impresion de usuarios en opciones
        echo "<div class='input-field col s2 white-text'>
              <select name='usuario[]' multiple>
                <option value= ' ' selected>Cualquiera</option>
              ";

              $sqlquery = "SELECT * FROM usuarios";
              if ($result = $mysqli->query($sqlquery))
              {
                if ($result->num_rows > 0)
                {
                  while ($row = $result->fetch_object())
                  {
                   echo "<option value= '$row->id_usuario' > $row->nombre</option>";
                  }
                }
              }

        echo "</select>
              <label>Usuario</label>
            </div>";
/////////fin impresion de usuarios

  echo "</div>
          <div class='row'>Entre las fechas</div>

          <div class='row'>
            <div class='col s3 offset-s3'>
              <div class='col s12 m12'>
                <input type='date' name='finicio' id='finicio' value='2018-08-27' required>
                <label for='finicio'>Fecha incial</label>
              </div>
            </div>
            <div class='col s3'>
              <div class='col s12 m12'>
                <input type='date' name='ffinal' id='ffinal' value='$today' required>
                <label for='ffinal'>Fecha final</label>
              </div>
            </div>
          </div>
          <button class='waves-effect  btn  row col s4 offset-s4' type='submit' name='Submit'>Buscar</button>
      </form>
        ";

      }
      //////////////////////////////////////////////////////////////////////////////////////////////////////////////
      //////////////////////////////////////////////////////////////////////////////////////////////////////////////
      //////////////////////////////////////////////////////////////////////////////////////////////////////////////
      //////////////////////////////////////////////////////////////////////////////////////////////////////////////
      //////////////////////////////////////////////////////////////////////////////////////////////////////////////
      //////////////////////////////////////////////////////////////////////////////////////////////////////////////
      /////////////////////////////////////////////////////////////////////////////////////////////////////////////////Realizando Busquedas
      else
      {

        $servicio = $_POST["servicio"];
        if(isset($_POST['numeroHab']))
        {
          $habitacion = $_POST["numeroHab"];
        }
        else
        {
          $habitacion = (-1);
        }
        
        $objeto = $_POST["objeto"];
        $comentario = $_POST["comentario"];
        $usuario = $_POST["usuario"];
        $finicio = $_POST["finicio"];
        $ffinal = $_POST["ffinal"];

        $anterior = 0;

        $sql1Parte = "SELECT id_incidente,habitacion,objeto,servicio,comentario,date_1,nombre FROM incidentes INNER JOIN usuarios ON incidentes.id_usuario = usuarios.id_usuario";

        $sqlquery = "";
        
      
/////integraciones de la consulta
          ////Servicio
      if($servicio[0] != ' ')
      {
        $anterior = 1;
        $sqlquery = $sqlquery .' WHERE ( ';

        for ($i=0;$i<count($servicio);$i++)
        {
          $sqlquery = $sqlquery ." servicio = '" .$servicio[$i] ."' ";

          if($i != (count($servicio)-1))
          {
            $sqlquery = $sqlquery .' OR ';
          }
        }

        $sqlquery = $sqlquery . ' )';
      }
        ////Habitacion

      if(!empty($habitacion) )
      {
        if($anterior == 1)
        {
          $sqlquery = $sqlquery .' AND ';
        }
        else
        {
          $sqlquery = $sqlquery .' WHERE ';
        }
        $anterior = 1;
        $sqlquery = $sqlquery ." ( habitacion LIKE '" . $habitacion . "' ) ";
      }

      ///Objeto

      if($objeto[0] != ' ')
      {
        if($anterior == 1)
        {
          $sqlquery = $sqlquery .' AND ';
        }
        else
        {
          $sqlquery = $sqlquery .' WHERE ';
        }
        $anterior = 1;

        $sqlquery = $sqlquery . ' ( ';

        for ($i=0;$i<count($objeto);$i++)
        {
          $sqlquery = $sqlquery ." objeto = '" .$objeto[$i] ."' ";

          if($i != (count($objeto)-1))
          {
            $sqlquery = $sqlquery .' OR ';
          }
        }

        $sqlquery = $sqlquery . ' )';
      }

      ///////Comentario
      
      if(!empty($comentario))
      {
        if($anterior == 1)
        {
          $sqlquery = $sqlquery .' AND ';
        }
        else
        {
          $sqlquery = $sqlquery .' WHERE ';
        }
        $anterior = 1;
        $sqlquery = $sqlquery ." ( comentario LIKE '" . $comentario . "' ) ";
      }

      ///Usuario

      if($usuario[0] != ' ')
      {
        if($anterior == 1)
        {
          $sqlquery = $sqlquery .' AND ';
        }
        else
        {
          $sqlquery = $sqlquery .' WHERE ';
        }
        $anterior = 1;

        $sqlquery = $sqlquery . ' ( ';

        for ($i=0;$i<count($usuario);$i++)
        {
          $sqlquery = $sqlquery ." usuarios.id_usuario = " . $usuario[$i] ." ";

          if($i != (count($usuario)-1))
          {
            $sqlquery = $sqlquery .' OR ';
          }
        }

        $sqlquery = $sqlquery . ' )';
      }

      // Fechas
      if($anterior == 1)
      {
        $sqlquery = $sqlquery .' AND ';
      }
      else
      {
        $sqlquery = $sqlquery .' WHERE ';
      }

      $ffinalMasUno = strtotime ( '+1 day' , strtotime ( $ffinal ) ) ;
      $ffinalMasUno = date ( 'Y-m-j' , $ffinalMasUno );

      $sqlquery = $sqlquery . "( date_1 BETWEEN '" . $finicio . "' AND '" . $ffinalMasUno . "' )";


//////////////////////////Termina construccion de la consulta

      //Se construye la consulta 
      $sql2Parte = $sqlquery;
      $sqlquery = $sql1Parte . $sqlquery;
      echo $sqlquery . "<br>";


        echo "<div class='row'>
                <a class='waves-effect btn col s2 offset-s3 teal darken-1' onclick='history.back()'>Editar</a>
                <a href='index.php' class='waves-effect btn col s2 offset-s2 teal darken-1 '>Nueva Busqueda</a>
              </div>";

        echo "<table class='bordered grey darken-2'>
                <thead class='teal darken-4'>
                  <tr>
                      <th></th>
                      <th>id</th>
                      <th># habitacion</th>
                      <th>Objeto</th>
                      <th>Servicio</th>
                      <th>Comentario</th>
                      <th>Fecha</th>
                      <th>Usuario</th>
                  </tr>
                </thead>
                <tbody>";

        if ($result = $mysqli->query($sqlquery))
        {
          if ($result->num_rows > 0)
          {
            $sqlqueryEnvio = $sql2Parte;
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////Modal Opciones de Grafica
            echo "<div class='btn-large col s10 modal-trigger teal darken-1' href = '#modalgrafica'> Graficar</div>";

            echo"<div class='modal blue-grey' id='modalgrafica'>
                  <div class='modal-content'>

                      <h5 class='header'> Graficar por: </h5>
                      <div class='row white-text blue-grey'>";

                        echo "<div class='btn-large row col s4 offset-s4 modal-trigger teal darken-1' href = 'Graficas/index.php?consulta=". $sqlqueryEnvio ."&ordenar=habitacion'> Graficar habitacion test</div>";

                        echo '<form action="Graficas/index.php" method="post">
                                <input type="hidden" value="'. $sqlqueryEnvio .'" name="consulta">
                                <input type="hidden" value="nombre" name="ordenar">
                                <button class="waves-effect  btn  row col s4 offset-s4" type="submit" name="Submit">Graficar por usuario</button>
                              </form>';

                        echo '<form action="Graficas/index.php" method="post">
                                <input type="hidden" value="'. $sqlqueryEnvio .'" name="consulta">
                                <input type="hidden" value="servicio" name="ordenar">
                                <button class="waves-effect  btn  row col s4 offset-s4" type="submit" name="Submit">Graficar por servicio</button>
                              </form>';

                    echo "</div>";
                echo"</div> ";
              echo"</div>";

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////Grafica por Habitacion
              echo"<div class='modal blue-grey' id='modalgraficaHabitacion'>
                  <div class='modal-content'>

                      <h5 class='header'>Habitacion</h5>
                      <div class='row white-text blue-grey'>";

                      $sql = $sqlqueryEnvio;
                      $Horziontal = "Habitacion";
          ///////////////////////PHP Para la grafica
                      $sqlSobreResult = "SELECT distinct $Horziontal as horizontal FROM incidentes INNER JOIN usuarios ON incidentes.id_usuario = usuarios.id_usuario  ". $sql ." ";

                      $datos[0] = array('Cantidad',$Horziontal);

                      //echo "<br> Segunda consulta: " . $sqlSobreResult;
                      if ($resultGrafica = $mysqli->query($sqlSobreResult))
                      {
                        if ($resultGrafica->num_rows > 0)
                        {
                          $i = 1;
                          while ($row = $resultGrafica->fetch_object())
                          {
                            //echo $Horziontal . ": " . $row->horizontal;
                            $sqlSobreResultCantidad = "SELECT COUNT(*) as numero FROM incidentes INNER JOIN usuarios ON incidentes.id_usuario = usuarios.id_usuario ". $sql ." AND $Horziontal = '$row->horizontal'";
                            if ($resultCantidad = $mysqli->query($sqlSobreResultCantidad))
                            {
                              if ($resultCantidad->num_rows > 0)
                              {
                                while ($rowCantidad = $resultCantidad->fetch_object())
                                {
                                  //echo " Cantidad: " . $rowCantidad->numero . "<br>";
                                  $datos[$i] = array( $row->horizontal , (int)$rowCantidad->numero ); 
                                  $i = $i +1;
                                }
                              }
                            }
                          }
                        }
                      }
          /////////////Script Grafica
                      echo "
                      <script>
                      google.charts.load('current', {'packages':['bar']});
                      google.charts.setOnLoadCallback(drawStuff);

                      var cargaDatos = "; echo json_encode($datos); echo";

                      function drawStuff() {

                        var data = new google.visualization.arrayToDataTable(cargaDatos);

                        var options = {
                          title: 'Chess opening moves',
                          width: 750,
                          height: 480,
                          legend: { position: 'none' },
                          chart: { title: 'Chess opening moves',
                                   subtitle: 'popularity by percentage' },
                          bars: 'horizontal', // Required for Material Bar Charts.
                          axes: {
                            x: {
                              0: { side: 'top', label: 'Percentage'} // Top x-axis.
                            }
                          },
                          bar: { groupWidth: '90%' }
                        };

                        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
                        chart.draw(data, options);
                      };
                      </script>
                      <div class='row'><div id='top_x_div' style='width: 750px; height: 480px;'></div></div>

                      ";


                    echo "</div>";
                echo"</div> ";
              echo"</div>";
    //////////////Fin grafica habitacion
/////////////////////////////////////////////////////////////////Fin Modales Graficas


            echo '<br>Cantidad de resultados: ' . $result->num_rows . '<br>';


            $cuenta = 0;
            while ($row = $result->fetch_object())
            {
              $cuenta = $cuenta+1;
             echo "<tr>
                      <td>$cuenta</td>
                      <td>C$row->id_incidente</td>
                      <td>$row->habitacion</td>
                      <td>$row->objeto</td>
                      <td>$row->servicio</td>
                      <td>$row->comentario</td>
                      <td>$row->date_1</td>
                      <td>$row->nombre</td>
                  </tr>
             ";
            }
          }
          else 
          {
            echo "Sin resultados";
          }
        }

        echo "</tbody>
        </table>";

      }

      
    ?>

  </div>
     <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="../js/materialize.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function(){
          $('select').material_select();
          $(".modal").modal();
        });
      </script>
</body>
</html>