<?php
include_once("../conexion/conexionBD.php");

    session_start();
    $nd = $_SESSION['user'];
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
		<a onclick="location.href='../logout.php'">Logout</a>

		<input type="submit" value="Buscar" name="btnbuscar"><input type="text" name="txtbuscar" id="cajabuscar" placeholder="&#128270;Ingresar nombre de usuario">
		</form>
		</div>
			<tr><th colspan="5"><h1>MIS REPORTES</h1><th><a style="font-weight: normal; font-size: 14px;" onclick="abrirform()">Nueva queja</a></th><th colspan="2" style="font-weight: normal; font-size: 16px;"><h2>Eliminar</h2><th></tr>
			<tr>
		    <th>Nro</th>
			<th>Nd</th>
            <th>nombre de usuario</th>
            <th>Correo</th>
            <th>Descripcion de su queja</th>
            <th>Status</th>
            <th>Eliminar</th>
			</tr>
        <?php 

if(isset($_POST['btnbuscar']))
{
$buscar = $_POST['txtbuscar'];
$queryusuarios = mysqli_query($conexion, "SELECT nd,user,correo,descripcion,estatus FROM tickets where nd='$nd' and user like '".$buscar."%'");
}
else
{
$queryusuarios = mysqli_query($conexion, "SELECT * FROM tickets where user='$nd' ORDER BY nd asc");
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
            echo "<td style='width:26%'> <a href=\"eliminar_tic.php?nd=$mostrar[nd]\" onClick=\"return confirm('¿Estás seguro de eliminar su reporte $mostrar[user]?')\">Eliminar</a></td>";           
}
        ?>
    </table>
	 <script>
function abrirform() {
    
  document.getElementById("formregistrar").style.display = "block";
  $nd_regis = $mostrar['nd'];
}

function cancelarform() {
  document.getElementById("formregistrar").style.display = "none";
}

</script>
<div class="caja_popup" id="formregistrar">
  <form action="agregar_tick.php" class="contenedor_popup" method="POST">
        <table>
		<tr><th colspan="2">Nueva Queja</th></tr>
        <tr> 
                <td>Usuario</td>
                <td><input type="TEXT" name="user" maxlength='50' required></td>
            </tr>
            <tr> 
                <td>Correo</td>
                <td><input type="email" name="correo" maxlength='50' required></td>
            </tr>
            <tr> 
                <td>Descripcion de su queja</td>
                <td><input type="text" name="descripcion" maxlength='256' required></td>
            </tr>
            <tr> 	
               <td colspan="2">
				   <button type="button" onclick="cancelarform()">Cancelar</button>
				   <input type="submit" name="btnregistrar" value="Registrar" onClick="javascript: return confirm('¿Deseas registrar su queja?');">
			</td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>