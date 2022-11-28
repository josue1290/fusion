<?php
include_once("../conexion/conexionBD.php"); 
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
        width: 30%;
        height: 35%;
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
        width: 30%;
        height: 35%;
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
        width: 30%;
        height: 35%;
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
	            <!-- <a onclick="location.href='../login/log.php'">Logout</a> -->
	            <a onclick="location.href='../admi/reporte_ventas.php'">Reporte</a>
	            <!-- <a onclick="location.href='../admi/proyectos.php'">Proyectos</a> -->
                <a onclick="location.href='../admi/lis_emp.php'">Empleados</a>
                <a onclick="location.href='../admi/venta.php'">Ventas</a>
                <a onclick="location.href='../admi/tic_admi.php'">Reportes</a>
                <input type="submit" value="Buscar" name="btnbuscar"><input type="text" name="txtbuscar" id="cajabuscar" placeholder="&#128270;Ingresar nombre de usuario">
		    </form>
		</div>
			<tr><th colspan="8"><h1>Productos</h1></tr>
			<tr>
		    <th>Nro</th>
		    <th>Modelo</th>
            <th>Nombre</th>
            <th>Marca</th>
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
            switch ($mostrar['inventario']) {
                case ($mostrar['inventario']<=10):
                    echo "<td class=bajo><div>".$mostrar['inventario']."</div></td>";
                    break;
                case  ($mostrar['inventario']<=20):
                    echo "<td  class=medio><div>".$mostrar['inventario']."</div></td>";
                    break;
                case ($mostrar['inventario']>=21):
                    echo "<td class=alto><div>".$mostrar['inventario']."</div></td>";
                    break;
            };
            // else{
            //     echo "<td>".$mostrar['inventario']."</td>";
            // };   
             
            echo "<td style='width:26%'> <a href=\"../admi/detalles_prod.php?nd=$mostrar[id_producto]\">Detalles</a> | <a href=\"eliminar.php?nd=$mostrar[id_producto]\" onClick=\"return confirm('¿Estás seguro de eliminar el producto $mostrar[nombre]?')\">Eliminar</a>  </td>";           
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
  <form action="" class="contenedor_popup" method="POST">
        <table>
		<tr><th colspan="2">Nuevo Producto</th></tr>
            <tr> 
                <td>No. Producto</td>
                <td><input type="text" name="nombre" required value="<?php echo $id;?>"></td>
            </tr>
            <tr> 
                <td>Nombre</td>
                <td><input type="text" name="nombre" required value="<?php echo $nombre;?>"></td>
            </tr>
            <tr> 
                <td>Marca</td>
                <td><input type="email" name="marca" required value="<?php echo $marcha;?>"></td>
            </tr>
            <tr> 
                <td>Descripcion</td>
                <td><input type="text" name="descripcion" required value="<?php echo $descripcion;?>"></td>
            </tr> 
            <tr> 
                <td>Precio</td>
                <td><input type="text" name="precio" required value="<?php echo $precio;?>"></td>
            </tr> 
            <tr> 
                <td>Stock</td>
                <td><input type="text" name="inventario" required value="<?php echo $inventario;?>"></td>
            </tr>
            <tr> 	
               <td colspan="2">
				   <button type="button" onclick="cancelarform()">Cancelar</button>
			</td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>