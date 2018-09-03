<?php
include('../check.php');

$id_usuario = $_POST['id_usuario'];
$nombre = strtoupper($_POST['nombre']);
$pass = $_POST['pass'];
$tipo = $_POST['tipo'];

include('../conexion.php');
if($tipo < 0)
{
	$nombre = $nombre . " (Deshabilitado)";
}

$sqlquery = "UPDATE usuarios SET nombre= '$nombre',password='$pass', tipo='$tipo' WHERE id_usuario = '$id_usuario'";

if($result = $mysqli->query($sqlquery)){

		echo "<script type='text/javascript'> alert('Se edito el usuario correctamente'); window.location.replace('../login.php'); </script>";

}else{
	echo "<script type='text/javascript'> alert('Un errror impidio editar usuario '); javascript:history.go(-1); </script>";
}
?>