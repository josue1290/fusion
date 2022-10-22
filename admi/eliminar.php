<?php
include_once("../conexion/conexionBD.php");
 
$nd = $_GET['id_producto'];
 
mysqli_query($conexion, "UPDATE productos SET estatus='1' WHERE id_producto=$nd");
 
header("Location:admi.php");

?>