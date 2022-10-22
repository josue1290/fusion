<?php 
include_once("../conexion/conexionBD.php");
include_once("../admi/lis_emp.php");

$codigo = $_GET['nd'];
 
$querybuscar = mysqli_query($conexion, "SELECT * FROM empleados WHERE id_empleado=$codigo");
 
while($mostrar = mysqli_fetch_array($querybuscar))
{
    $nombre = $mostrar['nombre'];
    $apellidos = $mostrar['apellidos'];    
	$sexo = $mostrar['sexo'];  
	$fecha_nac = $mostrar['fecha_nac'];  
	$rfc= $mostrar['rfc'];  
    $correo = $mostrar['correo'];  
	$tel = $mostrar['num_tel'];  
    $fecha_con = $mostrar['fecha_contratacion'];  
    $puesto = $mostrar['puesto'];  
	$direccion = $mostrar['direccion'];
}
?>
<html>
<head>    
		<title>Modificar</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="caja_popup2" id="formmodificar">
  <form method="POST" class="contenedor_popup" >
        <table>
		<tr><th colspan="2">Modificar usuario</th></tr>
        <tr> 
                <td>Nombre</td>
                <td><input type="text" name="nombre" value="<?php echo $nombre;?>"required></td>
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
            <tr>
				
                <td colspan="2">
				<a href="../admi/lis_emp.php">Cancelar</a>
				<input type="submit" name="btnmodificar" value="Modificar" onClick="javascript: return confirm('¿Deseas modificar a este usuario?');">
				</td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>

<?php
	
	if(isset($_POST['btnmodificar']))
{    
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];    
	$sexo = $_POST['sexo'];  
	$fecha_nac = $_POST['fecha_nac'];  
	$rfc= $_POST['rfc'];  
    $correo = $_POST['correo'];  
	$tel = $_POST['num_tel'];  
    $fecha_con = $_POST['fecha_contratacion'];  
    $puesto = $_POST['puesto'];  
	$direccion = $_POST['direccion'];

    $querymodificar = mysqli_query($conexion, "UPDATE empleados 
    SET 
    nombre=$nombre,
    apellidos=$apellidos,  
	sexo=$sexo,
	fecha_nac=$fecha_nac,  
	rfc=$rfc, 
    correo=$correo, 
	num_tel=$tel,
    fecha_contratacion=$fecha_con,  
    puesto=$puesto, 
	direccion=$direccion,
   
    WHERE id_empleado=$nd");

  	echo "<script>window.location= '../admi/lis_emp.php' </script>";
    
}
?>