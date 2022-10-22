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
        <a onclick="location.href='../admi/admi.php'">Productos</a>
        <a onclick="location.href='../admi/tic_admi.php'">Reportes</a>
	    <input type="submit" value="Buscar" name="btnbuscar"><input type="text" name="txtbuscar" id="cajabuscar" placeholder="&#128270;Ingresar nombre de usuario">
		</form>
		</div>
			<tr><th colspan="12"><h1>LISTA EMPLEADOS</h1><th><a style="font-weight: normal; font-size: 14px;" onclick="abrirform()">Agregar</a></th></tr>
			<tr>
		    <th>Nro</th>
			<th>Nd</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Sexo</th>
            <th>Fecha Nac.</th>
            <th>RFC</th>
            <th>Correo</th>
            <th>Tel</th>
            <th>Fecha Con.</th>
            <th>Puesto</th>
            <th>Direccion</th>
            <th>Accion</th>
			</tr>
        <?php 

if(isset($_POST['btnbuscar']))
{
$buscar = $_POST['txtbuscar'];
$queryusuarios = mysqli_query($conexion, "SELECT nd,user,correo,pass FROM empleado where user like '".$buscar."%' and estatus='0'");
}
else
{
$queryusuarios = mysqli_query($conexion, "SELECT * FROM empleados where estatus=0 ORDER BY id_empleado asc");
}
		$numerofila = 0;
        while($mostrar = mysqli_fetch_array($queryusuarios)) 
		{    $numerofila++;    
            echo "<tr>";
			echo "<td>".$numerofila."</td>";
            echo "<td>".$mostrar['id_empleado']."</td>";
            echo "<td>".$mostrar['nombre']."</td>";
            echo "<td>".$mostrar['apellidos']."</td>";    
			echo "<td>".$mostrar['sexo']."</td>";  
			echo "<td>".$mostrar['fecha_nac']."</td>";  
			echo "<td>".$mostrar['rfc']."</td>";  
			echo "<td>".$mostrar['correo']."</td>";  
			echo "<td>".$mostrar['num_tel']."</td>";  
			echo "<td>".$mostrar['fecha_contratacion']."</td>";  
			echo "<td>".$mostrar['puesto']."</td>";  
			echo "<td>".$mostrar['direccion']."</td>";  
            echo "<td style='width:26%'><a href=\"../admi/editar_emp.php?nd=$mostrar[id_empleado]\">Modificar</a> | <a href=\"../admi/eliminar_emp.php?nd=$mostrar[id_empleado]\" onClick=\"return confirm('¿Estás seguro de eliminar a $mostrar[nombre]?')\">Eliminar</a></td>";           
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
  <form action="agregar_emp.php" class="contenedor_popup" method="POST">
        <table>
		<tr><th colspan="2">Nuevo usuario</th></tr>
            <tr> 
                <td>Nombre</td>
                <td><input type="text" name="nombre" value="<?php echo $nombre;?>" required></td>
            </tr>
            <tr> 
                <td>Apellidos</td>
                <td><input type="text" name="apellidos" required></td>
            </tr>
            <tr> 
                <td>Sexo</td>
                <td>
                    <select name="sexo" required>
                    <option values='F'>Femenino</option>
                    <option values='M'>Masculino</option>
                    </select>
                </td>
            </tr>
            <tr> 
                <td>Fecha Nacimiento</td>
                <td><input type="date" name="fecha_nac" required></td>
            </tr>
            <tr> 
                <td>RFC</td>
                <td><input type="text" name="rfc" required></td>
            </tr>
            <tr> 
                <td>Correo</td>
                <td><input type="email" name="correo" required></td>
            </tr>
            <tr> 
                <td>Telefono</td>
                <td><input type="text" name="num_tel" required></td>
            </tr>
            <tr> 
                <td>Fecha contratacion</td>
                <td><input type="date" name="fecha_contratcion" required></td>
            </tr>
            <tr> 
                <td>puesto</td>
                <td>
                    <select name="puesto" required>
                    <option values='diseñador'>Instalador</option>
                    <option values='ingeniero'>Ingeniero</option>
                    <option values='tecnico' selected>Soporte</option>
                    <option values='supervisor'>Gerente</option>
                    </select>
                </td>
            </tr>
            <tr> 
                <td>Direccion</td>
                <td><input type="text" name="direccion" required></td>
            </tr>
            <tr> 	
               <td colspan="2">
				   <button type="button" onclick="cancelarform()">Cancelar</button>
				   <input type="submit" name="btnregistrar" value="Registrar" onClick="javascript: return confirm('¿Deseas registrar este empleado?');">
			</td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>

