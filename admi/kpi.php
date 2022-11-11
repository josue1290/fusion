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


<style>
    
    .bajo{
        font-family: sans-serif;
        font-size: 20px;
        color:black;
    }
    .bajo div{
        width: 35px;
        height: 35px;
        padding:0;
        margin:0;
        background-color:red;
        border-radius:50%;
	    text-decoration: none;
    }
    .medio{
        font-family: sans-serif;
        color:black;
        font-size: 20px;
    }
    .medio div{
        width: 35px;
        height: 35px;
        padding:0;
        margin:0;
        background-color:yellow;
        border-radius:50%;
	    text-decoration: none;
    }
    .alto{
        font-family: sans-serif;
        font-size: 20px;
    }
    .alto div{
        width: 35px;
        height: 35px;
        padding:0;
        margin:0;
        color:white;
        background-color: green;
        border-radius:50%;
	    text-decoration: none;
    }

</style>



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
		
		<tr><th colspan="5"><h1>REPORTE DE VENTAS</h1><th colspan="1"><a style="font-weight: normal; font-size: 14px;" onclick="location.href='../admi/reporte_ventas.php'">Regresar</a></th></tr>
			<tr>
			<th>Nro</th>
			<th>No. Producto</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Fecha</th>
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
$queryusuarios = mysqli_query($conexion, "SELECT ventas.id_producto, nombre, descripcion, ventas.fecha, count(*) as total_ventas FROM  productos, ventas where fecha between '$fecha1' and '$fecha2' and productos.id_producto = ventas.id_producto  group by id_producto");
}
		$numerofila = 0;
        while($mostrar = mysqli_fetch_array($queryusuarios)) 
		{    $numerofila++;    
            echo "<tr>";
			echo "<td>".$numerofila."</td>";
            echo "<td>".$mostrar['id_producto']."</td>";
            echo "<td>".$mostrar['nombre']."</td>";    
			echo "<td>".$mostrar['descripcion']."</td>";  
			echo "<td>".$mostrar['fecha']."</td>";  
			// echo "<td>".$mostrar['total_ventas']."</td>"; 
            switch ($mostrar['total_ventas']) {
                case ($mostrar['total_ventas']<=5):
                    echo "<td class=bajo><div>".$mostrar['total_ventas']."</div></td>";
                    break;
                case  ($mostrar['total_ventas']<=15):
                    echo "<td  class=medio><div>".$mostrar['total_ventas']."</div></td>";
                    break;
                case ($mostrar['total_ventas']>=15):
                    echo "<td class=alto><div>".$mostrar['total_ventas']."</div></td>";
                    break;
            }; 


}
        ?>
    </table>

</body>
</html>