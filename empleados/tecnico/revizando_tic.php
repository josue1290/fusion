<?php
include_once ('../../conexion/conexionBD.php');  
$nd = $_GET['nd'];
 
mysqli_query($conexion, "UPDATE tickets SET estatus='revisando' WHERE nd=$nd");
 
header("Location:tic_tec.php");

?>