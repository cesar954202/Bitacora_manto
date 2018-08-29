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

        $sqlquery = "SELECT * FROM incidentes INNER JOIN usuarios ON incidentes.id_usuario = usuarios.id_usuario";
        
      
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

      //
//////////////////////////Termina construccion de la consulta
      echo $sqlquery . "<br>";


        echo "<div class='row'>
                <a class='waves-effect btn col s2 offset-s3 teal darken-1' onclick='history.back()'>Editar</a>
                <a href='index.php' class='waves-effect btn col s2 offset-s2 teal darken-1 '>Nueva Busqueda</a>
              </div>";

        echo "<table class='bordered grey darken-2'>
                <thead class='teal darken-4'>
                  <tr>
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

        //$sqlquery = "SELECT * FROM incidentes INNER JOIN usuarios ON incidentes.id_usuario = usuarios.id_usuario";
        if ($result = $mysqli->query($sqlquery))
        {
          if ($result->num_rows > 0)
          {
            echo "Cantidad de resultados: " . $result->num_rows . "<br>";
            while ($row = $result->fetch_object())
            {
             echo "<tr>
                      <td>$row->id_incidente</td>
                      <td>$row->habitacion</td>
                      <td>$row->objeto</td>
                      <td>$row->servicio</td>
                      <td>$row->comentario</td>
                      <td>$row->date</td>
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
        });
      </script>
</body>
</html>