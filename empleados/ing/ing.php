<?php
include_once ('../../conexion/conexionBD.php'); 
?>
<html>
<head>    
		<title>Smart House</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../../style.css">
</head>
<body>
	


    <table>
	<img src="../../img/iconosh2.png">
			<div id="barrabuscar">
		<form method="POST">
		<a onclick="location.href='../../login/log.php'">Cerrar sesión</a>
        <input type="submit" value="Buscar" name="btnbuscar"><input type="text" name="txtbuscar" id="cajabuscar" placeholder="&#128270;Ingresar nombre de usuario">
		</form>
		</div>
		<tr><th colspan="8"><h1>Quejas</h1></th></tr>
			<tr>
			<th>Nro</th>
			<th>Nd</th>
            <th>nombre de usuario</th>
            <th>Correo</th>
            <th>Descripcion de su queja</th>
            <th>Status</th>
            <th>Asignado</th>
			</tr>
        <?php 

if(isset($_POST['btnbuscar']))
{
$buscar = $_POST['txtbuscar'];
$queryusuarios = mysqli_query($conexion, "SELECT nd,user,correo,descripcion,estatus, asignar FROM tickets where asignar='Ingeniero' and user like '".$buscar."%'");
}
else
{
$queryusuarios = mysqli_query($conexion, "SELECT * FROM tickets where asignar='Ingeniero' ORDER BY nd asc");
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
            echo "<td style='width:26%'><a href=\"revizando_tic.php?nd=$mostrar[nd]\" onClick=\"return confirm('Favor de leer correctamente el reporte del cliente $mostrar[user]')\">Revisar</a> | <a href=\"finalizar_tic.php?nd=$mostrar[nd]\" onClick=\"return confirm('Gracias por completar el reporte en tiempo y forma del cliente $mostrar[user]')\">Finalizado</a></td>";           
		}
        ?>
    </table>
</body>
</html>