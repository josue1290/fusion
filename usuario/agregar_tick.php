<?php include_once("../conexion/conexionBD.php"); 

session_start();
$nd = $_SESSION['user'];
    
    $user 	= $_POST['user'];
    $correo 	= $_POST['correo'];
    $descripcion 	= $_POST['descripcion'];
    $estatus = 'recibido';
    $asignar = 'Asignar';


    if($nd == $user){
        mysqli_query($conexion, "INSERT INTO tickets(user,correo,descripcion,estatus, asignar) VALUES('$user','$correo','$descripcion','$estatus',$asignar)");
    
        header("Location:../usuario/quejas.php");
    }

else{
    ?>
    
        <script>
            alert("El Usuario o Correo estan incorrectos");
            window.location="quejas.php";
            
        </script>
    <?php
}

?>