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
	            <a onclick="location.href='../admi/reporte_ventas.php'">Reporte</a>
	            <a onclick="location.href='../admi/proyectos.php'">Proyectos</a>
                <a onclick="location.href='../admi/lis_emp.php'">Empleados</a>
                <a onclick="location.href='../admi/venta.php'">Ventas</a>
                <a onclick="location.href='../admi/tic_admi.php'">Reportes</a>
                <input type="submit" value="Buscar" name="btnbuscar"><input type="text" name="txtbuscar" id="cajabuscar" placeholder="&#128270;Ingresar nombre de usuario">
		    </form>
		</div>
			<tr><th colspan="8"><h1>Productos</h1></tr>
			<tr>
		    <th>Nro</th>
			<th>Nd</th>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Acción</th>
			</tr>
        <?php 

if(isset($_POST['btnbuscar']))
{
$buscar = $_POST['txtbuscar'];
$queryusuarios = mysqli_query($conexion, "SELECT id_producto,nombre FROM productos where nombre like '".$buscar."%' and estatus='0'");
}
else
{
$queryusuarios = mysqli_query($conexion, "SELECT * FROM productos where estatus='0' ORDER BY id_producto asc");
}
		$numerofila = 0;
        while($mostrar = mysqli_fetch_array($queryusuarios)) 
		{    $numerofila++;    
            echo "<tr>";
			echo "<td>".$numerofila."</td>";
            echo "<td>".$mostrar['id_producto']."</td>";
            echo "<td>".$mostrar['nombre']."</td>";
            echo "<td>".$mostrar['marcha']."</td>";    
			echo "<td>".$mostrar['descripcion']."</td>";  
			echo "<td>".$mostrar['precio']."</td>";  
			echo "<td>".$mostrar['inventario']."</td>";  
            echo "<td style='width:26%'><a href=\"eliminar.php?nd=$mostrar[id_producto]\" onClick=\"return confirm('¿Estás seguro de eliminar el producto $mostrar[nombre]?')\">Eliminar</a></td>";           
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
  <form action="agregar.php" class="contenedor_popup" method="POST">
        <table>
		<tr><th colspan="2">Nuevo Producto</th></tr>
            <tr> 
                <td>Nombre</td>
                <td><input type="text" name="nombre" required></td>
            </tr>
            <tr> 
                <td>Marca</td>
                <td><input type="email" name="marca" required></td>
            </tr>
            <tr> 
                <td>Descripcion</td>
                <td><input type="text" name="descripcion" required></td>
            </tr> 
            <tr> 
                <td>Precio</td>
                <td><input type="text" name="precio" required></td>
            </tr> 
            <tr> 
                <td>Stock</td>
                <td><input type="text" name="inventario" required></td>
            </tr>
            <tr> 	
               <td colspan="2">
				   <button type="button" onclick="cancelarform()">Cancelar</button>
				   <input type="submit" name="btnregistrar" value="Registrar" onClick="javascript: return confirm('¿Desea registrar este producto?');">
			</td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>