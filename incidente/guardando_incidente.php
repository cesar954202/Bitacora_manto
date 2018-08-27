<?php
include('../check.php');

$room = $_POST['numeroHab'];
$servicio = $_POST['servicio'];
$objeto = $_POST['objeto'];
$comentario = $_POST['comentario'];

include('../conexion.php');

$sqlquery = "INSERT INTO incidentes( habitacion, objeto , servicio, id_usuario) VALUES ('$room', '$objeto' , '$servicio' , '$id_usuario')";

if($result = $mysqli->query($sqlquery)){

		echo "<script type='text/javascript'> alert('Se agrego  al historial correctamente'); window.location.replace('index.php'); </script>";

}else{
	echo "<script type='text/javascript'> alert('Un errror impidio agregar la nueva unidad '); javascript:history.go(-1); </script>";
}
?>