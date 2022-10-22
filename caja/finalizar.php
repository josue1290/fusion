<?php
include_once("../conexion/conexion.php");
 
$nd = $_GET['nd'];
$pago= 'realizado';
mysqli_query($conexion, "UPDATE pagos SET pago='$pago' WHERE id=$nd");

mysqli_query($conexion, "UPDATE mesa1 SET pago='realizado' WHERE pago='procesando'");

 
header("Location:caja.php");

?>