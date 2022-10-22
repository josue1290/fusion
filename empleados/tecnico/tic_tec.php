<?php 
require ('../../conexion/conexionBD.php'); 
?>
<html>
<head>    
		<title>Quejas</title>
		<meta charset="UTF-8">
</head>
<body>

<style>
	body
{
    background: linear-gradient(to bottom, #58005E, white);
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
    width: 90%;
    border-collapse: collapse;
    border: 1px solid black;
	margin:50px auto;
    background: white;
	position: absolute;
	top: 10%;
	left: 5%;
}
th 
{
    background: #58005E;
    height: 40px;
    font-weight: lighter;
    text-shadow: 0 1px 0 black;
    color: white;
    border: 1px solid black;
    box-shadow: inset 0px 1px 2px black;
    transition: all 0.2s;
	font-size: 18px;
}
tr 
{
    border-bottom: 1px solid black;
	width:100%;
}
td 
{
    border: 1px solid black;
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
	background-color: black;
	padding: 20px;
	color:white;
	font-size:24px;
	margin: 20px;
	font-weight: lighter;
	border-radius:5px;
	border:2px solid black;
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
	position: absolute;
	top: 2%;
	left: 5%;
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
	position: absolute;
	left: 55%;
	top: 5%;
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

    <table>
	<img src="../../img/iconosh2.png">
			<div id="barrabuscar">
		<form method="POST">
	    <a onclick="location.href='../../login/log.php'">Logout</a>
	    <input type="submit" value="Buscar" name="btnbuscar"><input type="text" name="txtbuscar" id="cajabuscar" placeholder="&#128270;Ingresar nombre de usuario">
		</form>
		</div>
		<tr><th colspan="8"><h1>QUEJAS</h1></th></tr>
			<tr>
			<th>Nro</th>
			<th>Nd</th>
            <th>nombre de usuario</th>
            <th>Correo</th>
            <th>Descripcion de su queja</th>
            <th>Status</th>
            <th>Area</th>
            <th>Asignar</th>
			</tr>
        <?php 

if(isset($_POST['btnbuscar']))
{
$buscar = $_POST['txtbuscar'];
$queryusuarios = mysqli_query($conexion, "SELECT nd,user,correo,descripcion,estatus, asignar FROM tickets where asignar='Tecnico' and user like '".$buscar."%'");
}
else
{
$queryusuarios = mysqli_query($conexion, "SELECT * FROM tickets where asignar='Tecnico' ORDER BY nd asc");
}
		$numerofila = 0;
        while($mostrar = mysqli_fetch_array($queryusuarios)) 
		{    $numerofila++;    
			echo "<tr>";
			echo "<td>".$numerofila."</td>";
            echo "<td>".$mostrar['nd']."</td>";
            echo "<td>".$mostrar['user']."</td>";
            echo "<td>".$mostrar['correo']."</td>";    
			echo "<td>".$mostrar['descripcion']."</td>";  
			echo "<td>".$mostrar['estatus']."</td>";  
			echo "<td>".$mostrar['asignar']."</td>"; 
            echo "<td style='width:26%'><a href=\"revizando_tic.php?nd=$mostrar[nd]\" onClick=\"return confirm('Favor de leer correctamente el reporte del cliente $mostrar[user]')\">Revisar</a> | <a href=\"finalizar_tic.php?nd=$mostrar[nd]\" onClick=\"return confirm('Gracias por completar el reporte en tiempo y forma del cliente $mostrar[user]')\">Finalizado</a></td>";           

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
</body>
</html>