<?php
include_once("../conexion/conexionBD.php");

$nd = $_GET['nd'];

mysqli_query($conexion, "UPDATE tickets SET estatus='eliminado' WHERE nd=$nd");

$borar_tupla="DELETE FROM tickets where nd=$nd";
$resultados=mysqli_query($conexion,$borar_tupla) or die ('FALLO AL ELIMINAR');

    header("Location:../usuario/quejas.php");

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


 

    // echo $user;
    // echo $correo;
    // echo $descripcion;
    // echo $estatus;
    // echo $asignado;
    // echo $DateAndTime;


?>