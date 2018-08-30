<?php
   include('conexion.php');
   session_start();
   $user_check = $_SESSION['login_user'];
   $tipo_user = $_SESSION['username'];

   $sqlqueryV = "SELECT *  FROM usuarios WHERE nombre = '$user_check' ";

          if ($resultV = $mysqli->query($sqlqueryV))
          {
            if ($resultV->num_rows > 0)
            {
              while ($rowV = $resultV->fetch_object())
              {
                $id_user= $rowV->id_usuario;
              }
             }
          }

   $id_usuario = $id_user;
   if(!isset($_SESSION['login_user'])){
      header("location:index.php");
   }

?>
