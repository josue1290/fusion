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
		
			<tr><th colspan="8"><h1>REPORTES</h1></th></tr>
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
$queryusuarios = mysqli_query($conexion, "SELECT nd,user,correo,descripcion,estatus FROM tickets where user like '".$buscar."%'");
}
else
{
$queryusuarios = mysqli_query($conexion, "SELECT * FROM tickets where estatus='recibido' or estatus='revisando' or estatus='finalizado' ORDER BY nd asc");
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
            echo "<td style='width:26%'><a href=\"asignar.php?nd=$mostrar[nd]\">Asignar</a></td>";           


}
        ?>
    </table>

</body>
</html>