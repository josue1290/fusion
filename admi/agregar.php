<?php include_once("../conexion/conexionBD.php"); 
    
    $nombre 	= $_POST['nombre'];
    $marca 	= $_POST['marca'];
    $descripcion 	= $_POST['descripcion'];
    $precio	= $_POST['precio'];
    $inventario 	= $_POST['inventario'];
    
	mysqli_query($conexion, "INSERT INTO usuario(nombre,marcha.descripcion,precio,inventario,estatus) 
    VALUES('$nombre','$marca','$descripcion',$precio,$inventario, estatus='0')");
    
header("Location:../admi/admi.php");
	

?>