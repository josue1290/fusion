<?php

include_once '../conexion/conexion.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../assets/css/found.css" />

    <title>CAJA</title>
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
        <a onclick="location.href='../login.php'">Login</a>
        <a onclick="location.href='../index.html'">Home</a>
		<input type="submit" value="Buscar" name="btnbuscar"><input type="text" name="txtbuscar" id="cajabuscar" placeholder="&#128270;Ingresar nombre">

		</form>
		</div>
			<tr><th colspan="5"><h1>MENU</h1></tr>
			<tr>
			<!-- <th>Nro</th>
			<th>Nd</th> -->
            <!-- <th>Imagen</th> -->
            <th>Nombre</th>
            <th>correc</th>
            <th>metodo de pago</th>
            <th>Mesa</th>
            <th>Finalizar</th>
			</tr>
        <?php 

if(isset($_POST['btnbuscar']))
{
$buscar = $_POST['txtbuscar'];
$queryusuarios = mysqli_query($conexion, "SELECT id,nombre,correo,metodo,mesa FROM pagos where nombre like '".$buscar."%'");
}
else
{
$queryusuarios = mysqli_query($conexion, "SELECT * FROM pagos where pago='procesando'  ORDER BY id asc");
}
		$numerofila = 0;
        while($mostrar = mysqli_fetch_array($queryusuarios)) 
		{    $numerofila++;    
            echo "<tr>";
			// echo "<td>".$numerofila."</td>";
			// echo "<td>".$mostrar['nd']."</td>";
			// echo "<td img src='img/>".$mostrar['Imagen']."</td width='100' height='100'>";
            // echo "<td>".$mostrar['imagenes']."</td>";
            echo "<td>".$mostrar['nombre']."</td>";      
            echo "<td>".$mostrar['correo']."</td>";      
			echo "<td>".$mostrar['metodo']."</td>";  
			echo "<td>".$mostrar['mesa']."</td>";  
            echo "<td style='width:26%'> <a href=\"finalizar.php?nd=$mostrar[id]\" onClick=\"return confirm('Pago realizado con exito de mesa $mostrar[mesa] bajo el nombre de $mostrar[nombre]')\">Realizar pago</a></td>";           

        }
        ?>
    </table>

    <table><br>
			<tr><th colspan="3"><h1>cargo</h1></tr>
			<tr>
			<!-- <th>Nro</th>
			<th>Nd</th> -->
            <!-- <th>Imagen</th> -->
            <th>Pedido</th>
            <th>mesa</th>
            <th>fecha</th>
			</tr>
        <?php 


$queryusuarios = mysqli_query($conexion, "SELECT * FROM mesa1 where pago='procesando'  ORDER BY id asc");

		$numerofila = 0;
        while($mostrar = mysqli_fetch_array($queryusuarios)) 
		{    $numerofila++;    
            echo "<tr>";
			// echo "<td>".$numerofila."</td>";
			// echo "<td>".$mostrar['nd']."</td>";
			// echo "<td img src='img/>".$mostrar['Imagen']."</td width='100' height='100'>";
            // echo "<td>".$mostrar['imagenes']."</td>";
            echo "<td>".$mostrar['pedido']."</td>";      
            echo "<td>".$mostrar['mesa']."</td>";      
			echo "<td>".$mostrar['fecha']."</td>";  

        }
        ?>
    </table>
</body>
</html>