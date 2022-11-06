<?php
include_once("../conexion/conexionBD.php"); 

?>
<html>
<head>    
		<title>Smart House</title>
		<meta charset="UTF-8">
		<!-- <link rel="stylesheet" href="../style.css"> -->
		<link rel="stylesheet" href="../found.css" />

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
	margin:2%;
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
     <div class="wave"></div>
     <div class="wave"></div>
     <div class="wave"></div>
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
		
		<tr><th colspan="9"><h1>CLIENTES</h1><th colspan="2"><a style="font-weight: normal; font-size: 14px;" onclick="location.href='../admi/venta.php'">Regresar</a></th></tr>
		<tr>
		    <th>Nro</th>
			<th>No. Cliente</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Fecha Nac.</th>
            <th>Sexo</th>
            <th>Correo</th>
            <th>Tel</th>
            <th>Direccion</th>
            <th>Accion</th>
			</tr>
        <?php 

if(isset($_POST['btnbuscar']))
{
$buscar = $_POST['txtbuscar'];
$queryusuarios = mysqli_query($conexion, "SELECT nombre FROM clientes where id_cliente and estatus='0' like '".$buscar."%'");
}
else
{
$queryusuarios = mysqli_query($conexion, "SELECT * from clientes  where estatus='0' ORDER BY id_cliente asc");
}
		$numerofila = 0;
        while($mostrar = mysqli_fetch_array($queryusuarios)) 
		{    $numerofila++;    
            echo "<tr>";
			echo "<td>".$numerofila."</td>";
			echo "<td>".$mostrar['id_cliente']."</td>";
            echo "<td>".$mostrar['nombre']."</td>";
            echo "<td>".$mostrar['apellidos']."</td>";    
			echo "<td>".$mostrar['fecha_nac']."</td>"; 
			echo "<td>".$mostrar['sexo']."</td>";  
			echo "<td>".$mostrar['correo']."</td>";  
			echo "<td>".$mostrar['num_tel']."</td>";  
			echo "<td>".$mostrar['direccion']."</td>"; 
            echo "<td style='width:26%'><a href=\"eliminar_cliente.php?nd=$mostrar[id_cliente]\" onClick=\"return confirm('¿Estás seguro de eliminar al cliente $mostrar[nombre]?')\">Eliminar</a></td>";           
		}
        ?>
    </table>

	<br>

	<table>
		
		<tr><th colspan="4"><h1>Clientes con proyectos</h1></tr>
			<tr>
			<th>Nro</th>
			<th>No. Cliente</th>
            <th>Nombrer</th>
            <th>Nombre de proyecto</th>
			</tr>
        <?php 


		$queryusuarios = mysqli_query($conexion, "Select clientes.id_cliente, clientes.nombre, proyectos.nombre as  Nombre_proyecto FROM clientes, proyectos where clientes.id_cliente = proyectos.id_cliente ORDER BY id_cliente asc");
		$numerofila = 0;
        while($mostrar = mysqli_fetch_array($queryusuarios)) 
		{    $numerofila++;    
            echo "<tr>";
			echo "<td>".$numerofila."</td>";
            echo "<td>".$mostrar['id_cliente']."</td>";
            echo "<td>".$mostrar['nombre']."</td>";    
			echo "<td>".$mostrar['Nombre_proyecto']."</td>";  


		}
        ?>
    </table>

</body>
</html>