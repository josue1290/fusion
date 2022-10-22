<?php 
include_once '../conexion/conexion.php';
    
    $user 	= $_POST['nombre'];
    $correo 	= $_POST['correo'];
    $metodo 	= $_POST['metodo'];
    $Nomesa = $_POST['No_mesa'];
    $pago= 'procesando';

        mysqli_query($conexion, "INSERT INTO pagos (nombre,correo,metodo,mesa,pago,fecha) VALUES ('$user','$correo','$metodo','$Nomesa','$pago',now())");

        mysqli_query($conexion, "UPDATE mesa1 SET pago='$pago' WHERE pago='esperando' and mesa='$Nomesa'");

        // echo $user;
        // echo $correo;
        // echo $descripcion;
        // echo $estatus;
        header("Location:mesa1.php");

?>