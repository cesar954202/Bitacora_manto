<?php
include('../check.php');

$room = $_POST['numeroHab'];
$servicio = $_POST['servicio'];
$objeto = $_POST['objeto'];
$comentario = $_POST['comentario'];

include('../conexion.php');

for ($i=0;$i<count($servicio);$i++)
{
	$sqlquery = "INSERT INTO incidentes( habitacion, objeto , servicio, id_usuario, comentario) VALUES ('$room', '$objeto' , '$servicio[$i]' , '$id_usuario' , '$comentario')";

	if($result = $mysqli->query($sqlquery)){

			echo "<script type='text/javascript'> alert('Se agrego  al historial correctamente'); window.location.replace('index.php'); </script>";

	}else{
		echo "<script type='text/javascript'> alert('Un errror impidio agregar la nueva unidad '); javascript:history.go(-1); </script>";
	}
}
?>