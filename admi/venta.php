<?php
include_once("../conexion/conexionBD.php"); 
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
		
			<th colspan="9"><h1>REPORTES</h1></th>
			<tr>
			<th>Nro</th>
			<th>Nd</th>
			<th>No. Producto</th>
            <th>Total</th>
            <th>Fecha</th>
            <th>No. Proyecto</th>
            <th>No. Promocion</th>
            <th>No. Codigo</th>
            <th>No. Cliente</th>
			</tr>
        <?php 

if(isset($_POST['btnbuscar']))
{
$buscar = $_POST['txtbuscar'];
$queryusuarios = mysqli_query($conexion, "SELECT id_venta FROM ventas where id_venta like '".$buscar."%'");
}
else
{
$queryusuarios = mysqli_query($conexion, "SELECT * FROM ventas ORDER BY id_ventas asc");
}
		$numerofila = 0;
        while($mostrar = mysqli_fetch_array($queryusuarios)) 
		{    $numerofila++;    
            echo "<tr>";
			echo "<td>".$numerofila."</td>";
            echo "<td>".$mostrar['id_ventas']."</td>";
            echo "<td>".$mostrar['id_producto']."</td>";
            echo "<td>".$mostrar['total_venta']."</td>";    
			echo "<td>".$mostrar['fecha']."</td>";  
			echo "<td>".$mostrar['id_proyecto']."</td>";  
			echo "<td>".$mostrar['id_promocion']."</td>";  
			echo "<td>".$mostrar['id_codigo']."</td>";  
			echo "<td>".$mostrar['id_cliente']."</td>";  


}
        ?>
    </table>

</body>
</html>