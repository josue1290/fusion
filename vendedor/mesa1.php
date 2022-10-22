<?php

include_once '../conexion/conexionBD.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../found.css" />

    <title>MESA 1</title>
</head>

<style>
    body
{
    /* background: linear-gradient(to bottom, #3380B5, white); */
	font-family: sans-serif;
	margin:0;
	padding:0;
	height: 100%;
    width: 100%;
	display: flex;
	flex-direction: column;	
}
table
{
	text-align:center;
    width: 98%;
	border-radius:5px;
    /* border-collapse: collapse; */
    border: 1px solid black;
	margin:50px auto;
    background: lightblue;
    /* filter:alpha(opacity=100); 
    opacity:1; */
}
th 
{
    background: color:black;
    /* filter:alpha(opacity=100); 
    opacity:1; */
    height: 40px;
    font-weight: black;
    text-shadow: 0 1px 0 #38678f;
    /* color: black; */
    border: 1px solid #38678f;
    box-shadow: inset 0px 1px 2px #568ebd;
    transition: all 0.2s;
	font-size: 18px;

}
tr 
{
    border-bottom: 1px solid #cccccc;
	width:100%;
}
td 
{
    border: 1px solid #cccccc;
    padding: 10px;
    transition: all 0.2s;
	font-size: 14px;
}
a,input[type="submit"],button
{
	font-size: 14px;
	text-align:center;
	width: 100px;
	display: inline-block;
	background-color:#FABD44;
	padding: 6px 10px;
	border-radius:5px;
	text-decoration: none;
	color:black;
	border:1px solid black;
	cursor:pointer;
}
h1
{
	font-family: sans-serif;
	margin:5px;
}
label
{
	width:250px;
	background-color:#009BFF;
	padding: 20px;
	color:white;
	font-size:24px;
	margin: 20px;
	font-weight: lighter;
	border-radius:5px;
	border:2px solid #f3f3f3;
}

.caja_popup 
{
	display: none;
    position: absolute;
	padding:0;
	background-color:rgba(0, 0, 0, 0.5);
	width:100%;
	height:100%;
}
.contenedor_popup 
{
	border-radius: 5px;
	top: 50%;
	left: 50%;
	position: absolute;
	transform: translate(-50%,-50%);
	width:400px;
	border-radius: 5px;
	transition: all 0.2s;
}
img
{
	width:100px;
	height:100px;
	float:left;
	position:absolute;
	margin-left:2%;
}
.caja_popup2 
{
	display: block;
    position: absolute;
	padding:0;
	background-color:rgba(0, 0, 0, 0.5);
	width:100%;
	height:100%;
}
#barrabuscar
{
	color:white;
	text-align:right;
}
#cajabuscar
{
	width:500px;
	height:30px;
	font-size:18px;
	background-color:#f3f3f3;
	border-color:white;
	padding-left:10px;
	margin: 0px 30px;
}

</style>

<body>
<div>
     <div class="wave"></div>
     <div class="wave"></div>
     <div class="wave"></div>
  </div>
    <table><br>
			<div id="barrabuscar">
		<form method="POST">
        <!-- <a onclick="location.href='../login.php'">Login</a> -->
        <a onclick="location.href='../index.php'">Home</a>
		<input type="submit" value="Buscar" name="btnbuscar"><input type="text" name="txtbuscar" id="cajabuscar" placeholder="&#128270;Ingresar nombre">

		</form>
		</div>
			<tr><th colspan="8"><h1>Productos</h1></tr>
			<tr>
			<th>Nro</th>
			<th>Nd</th>
            <!-- <th>Imagen</th> -->
            <th>Nombre</th>
            <th>Marca</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Venta</th>
			</tr>
        <?php 

if(isset($_POST['btnbuscar']))
{
$buscar = $_POST['txtbuscar'];
$queryusuarios = mysqli_query($conexion, "SELECT id,nombre,precio,descripcion,imagenes FROM images_tabla where nombre like '".$buscar."%'");
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
			// echo "<td img src='img/>".$mostrar['']."</td width='100' height='100'>";
            // echo "<td>".$mostrar['imagenes']."</td>";
            echo "<td>".$mostrar['nombre']."</td>";      
            echo "<td>".$mostrar['marcha']."</td>";      
			echo "<td>".$mostrar['descripcion']."</td>";  
			echo "<td>".$mostrar['precio']."</td>";  
			echo "<td>".$mostrar['inventario']."</td>";  
            echo "<td style='width:26%'> <a href=\"ordenes_1.php?nd=$mostrar[id_producto]\")\">Ordenar</a></td>";    
        }
        ?>
    </table>


	<table><br>
	<tr><th colspan="4"><h1>PEDIDO</h1><th><a style="font-weight: normal; font-size: 14px;" onclick="abrirform()">PAGAR</a></th></tr>
			<tr>
			<th>Nro</th>
			<th>Nd</th>
            <th>Descripcion</th>
            <th>precio</th>
            <th>Estatus</th>
			</tr>
        <?php 

if(isset($_POST['btnbuscar']))
{
$buscar = $_POST['txtbuscar'];
$queryusuarios = mysqli_query($conexion, "SELECT id_producto,nombre,precio,descripcion,imagenes FROM images_tabla where nombre like '".$buscar."%'");
}
else
{
$queryusuarios = mysqli_query($conexion, "SELECT * FROM pre_venta ORDER BY id asc");
}
		$numerofila = 0;
        while($mostrar = mysqli_fetch_array($queryusuarios)) 
		{    $numerofila++;    
            echo "<tr>";
			// echo "<td>".$numerofila."</td>";
			// echo "<td>".$mostrar['nd']."</td>";
			// echo "<td img src='img/>".$mostrar['Imagen']."</td width='100' height='100'>";
			echo "<td>".$mostrar['pedido']."</td>";  
			echo "<td>".$mostrar['mesa']."</td>";  
			echo "<td>".$mostrar['mesero']."</td>";  
            // echo "<td style='width:26%'> <a href=\"ordenes_1.php?nombre=$mostrar[nombre] descripcion=$mostrar[descripcion] precio=$mostrar[precio]\" onClick=\"return confirm('¿Desea ordenar $mostrar[nombre]?')\">Ordenar</a></td>";    
        }
        ?>
    </table>


    <!-- <button onclick="location.href='index.php'" aling='left'>Login</button>
    <button onclick="location.href='https://www.youtube.com/watch?v=qCpEp8wvs2c'" aling='left'>Ramdon</button> -->
	 <script>
function abrirform() {
  document.getElementById("formregistrar").style.display = "block";
  
}

function cancelarform() {
  document.getElementById("formregistrar").style.display = "none";
}

</script>
<div class="caja_popup" id="formregistrar">
<form action="pago.php" class="contenedor_popup" method="POST">
        <table>
		<tr><th colspan="2">PAGAR</th></tr>
            <tr> 
                <td>Nombre</td>
                <td><input type="text" name="nombre" maxlength='50' required></td>
            </tr>
            <tr> 
                <td>Correo</td>
                <td><input type="email" name="correo" maxlength='50' required></td>
            </tr>
            <tr> 
                <td>Metodo de pago</td>
                <td><input type="text" name="metodo" maxlength='256' required></td>
            </tr>
			<tr> 
                <td>Numero de mesa</td>
                <td><input type="number" name="No_mesa" maxlength='2' required></td>
            </tr>
            <tr> 	
               <td colspan="2">
				   <button type="button" onclick="cancelarform()">Cancelar</button>
				   <input type="submit" name="btnregistrar" value="Pagar" onClick="javascript: return confirm('Gracias por visitarnos');">
			</td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
		
</body>
</html>