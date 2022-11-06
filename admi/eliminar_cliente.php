<?php
include_once("../conexion/conexionBD.php");
 
$nd = $_GET['id_cliente'];
 
mysqli_query($conexion, "UPDATE clientes SET estatus='1' WHERE id_cliente=$nd");
 
header("Location:admi.php");

?>