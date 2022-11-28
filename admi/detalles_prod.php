<?php 
include_once("../conexion/conexionBD.php");
include_once("../admi/admi.php");

$codigo = $_GET['nd'];
 
$querybuscar = mysqli_query($conexion, "SELECT * FROM productos WHERE id_producto=$codigo");
 
while($mostrar = mysqli_fetch_array($querybuscar))
{
    $id = $mostrar['id_producto'];
    $nombre = $mostrar['nombre'];
    $marca = $mostrar['marcha'];    
	$descripcion = $mostrar['descripcion'];  
	$precio = $mostrar['precio'];  
	$inventario= $mostrar['inventario'];  
}
?>
<html>
<head>    
		<title>Descripcion</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="caja_popup2" id="formmodificar">
  <form method="POST" class="contenedor_popup" >
        <table>
		<tr><th colspan="2">Descripcion del producto</th></tr>
        <tr> 
                <td>No. Producto</td>
                <td><input value="<?php echo $id;?>" disabled></td>
            </tr>
            <tr> 
                <td>Nombre</td>
                <td><input value="<?php echo $nombre;?>" disabled></td>
            </tr>
            <tr> 
                <td>Marca</td>
                <td><input value="<?php echo $marca;?>"  disabled></td>
            </tr>
            <tr> 
                <td>Descripcion</td>
                <td><input value="<?php echo $descripcion;?>" disabled></td>
            </tr> 
            <tr> 
                <td>Precio</td>
                <td><input  value="<?php echo $precio;?>" disabled></td>
            </tr> 
            <tr> 
                <td>Stock</td>
                <td><input value="<?php echo $inventario;?>" disabled></td>
            </tr>
            <tr>
				
                <td colspan="2">
				<a href="../admi/admi.php">Cerrar</a>
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