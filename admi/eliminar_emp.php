<?php
include_once("../conexion/conexionBD.php");
 
$nd = $_GET['nd'];
 
mysqli_query($conexion, "UPDATE empleados SET estatus='1' WHERE id_empleado=$nd");
 
header("Location:lis_emp.php");

?>