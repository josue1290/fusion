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
		
		<tr><th colspan="5"><h1>REPORTE DE VENTAS</h1><th colspan="2"><a style="font-weight: normal; font-size: 14px;" onclick="abrirform()">Filtrar</a></th></tr>
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
$queryusuarios = mysqli_query($conexion, "SELECT ventas.id_producto, nombre, descripcion, ventas.fecha, count(*) as total_ventas FROM  productos, ventas where productos.id_producto = ventas.id_producto group by id_producto");
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
			echo "<td>".$mostrar['total_ventas']."</td>";  


}
        ?>
    </table>

	<script>
function abrirform() {
  document.getElementById("formregistrar").style.display = "block";
  
}

function cancelarform() {
  document.getElementById("formregistrar").style.display = "none";
}

</script>
<div class="caja_popup" id="formregistrar">
  <form action="kpi.php" class="contenedor_popup" method="POST">
        <table>
		<tr><th colspan="2">Filtrar por fechas</th></tr>
            <tr> 
                <td>Fecha 1</td>
                <td><input type="text" name="fecha1" required></td>
            </tr>
            <tr> 
                <td>Fecha 2</td>
                <td><input type="text" name="fecha2" required></td>
            </tr>
            <tr> 	
               <td colspan="2">
				   <button type="button" onclick="cancelarform()">Cancelar</button>
				   <input type="submit" name="btnregistrar" value="Buscar" >
			</td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>