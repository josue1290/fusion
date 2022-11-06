<?php
include_once("../conexion/conexionBD.php"); 


$fecha1 = $_POST['fecha1']; 
$fecha2	= $_POST['fecha2'];

?>
<html>
<head>    
		<title>Smart House</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../style.css">
</head>
<body>
    <table>
	<img src="../img/iconosh2.png">
			<div id="barrabuscar">
		<form method="POST">
		<a onclick="location.href='../login/log.php'">Logout</a>
        <a onclick="location.href='../admi/lis_emp.php'">Empleados</a>
        <a onclick="location.href='../admi/admi.php'">Usuarios</a>
	    <input type="submit" value="Buscar" name="btnbuscar"><input type="text" name="txtbuscar" id="cajabuscar" placeholder="&#128270;Ingresar nombre de usuario">
		</form>
		</div>
		
		<tr><th colspan="4"><h1>REPORTE DE VENTAS</h1><th colspan="2"><a style="font-weight: normal; font-size: 14px;" onclick="location.href='../admi/venta.php'">Regresar</a></th></tr>
			<tr>
			<th>Nro</th>
			<th>No. Producto</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Total ventas</th>
			</tr>
        <?php 

if(isset($_POST['btnbuscar']))
{
$buscar = $_POST['txtbuscar'];
$queryusuarios = mysqli_query($conexion, "SELECT nombre FROM productos where id_producto like '".$buscar."%'");
}
else
{
$queryusuarios = mysqli_query($conexion, "SELECT ventas.id_producto, nombre, descripcion, count(*) as total_ventas FROM  productos, ventas where productos.id_producto = ventas.id_producto group by id_producto");
}
		$numerofila = 0;
        while($mostrar = mysqli_fetch_array($queryusuarios)) 
		{    $numerofila++;    
            echo "<tr>";
			echo "<td>".$numerofila."</td>";
            echo "<td>".$mostrar['id_producto']."</td>";
            echo "<td>".$mostrar['nombre']."</td>";    
			echo "<td>".$mostrar['descripcion']."</td>";  
			echo "<td>".$mostrar['total_ventas']."</td>";  


}
        ?>
    </table>

</body>
</html>