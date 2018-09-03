<?php
include('../check.php');

$nombre = strtoupper($_POST['nombre']);
$pass = $_POST['pass'];
$tipo = $_POST['tipo'];

include('../conexion.php');


$sqlquery = "INSERT INTO usuarios( nombre, password , tipo) VALUES ('$nombre', '$pass' , '$tipo')";

if($result = $mysqli->query($sqlquery)){

		echo "<script type='text/javascript'> alert('Se agrego  el usuario correctamente'); window.location.replace('../login.php'); </script>";

}else{
	echo "<script type='text/javascript'> alert('Un errror impidio agregar usuario '); javascript:history.go(-1); </script>";
}
?>