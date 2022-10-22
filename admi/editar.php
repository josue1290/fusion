<?php 
include_once("../conexion/conexionBD.php");
include_once("../admi/admi.php");

$codigo = $_GET['nd'];
 
$querybuscar = mysqli_query($conexion, "SELECT * FROM usuario WHERE nd=$codigo");
 
while($mostrar = mysqli_fetch_array($querybuscar))
{
    $codigo = $mostrar['nd'];
    $user = $mostrar['user'];
    $correo = $mostrar['correo'];
	$pass = $mostrar['pass'];
}
?>
<html>
<head>    
		<title>VaidrollTeam</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="caja_popup2" id="formmodificar">
  <form method="POST" class="contenedor_popup" >
        <table>
		<tr><th colspan="2">Modificar usuario</th></tr>
		     <tr> 
                <td>Codigo</td>
                <td><input type="hidden" name="nd" value="<?php echo $codigo;?>" ></td>
            </tr>
            <tr> 
                <td>Nombre</td>
                <td><input type="text" name="user" value="<?php echo $user;?>" required></td>
            </tr>
            <tr> 
                <td>Correo</td>
                <td><input type="text" name="correo" value="<?php echo $correo;?>" required></td>
            </tr>
            <tr>
				
                <td colspan="2">
				<a href="admi.php">Cancelar</a>
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
    $nd = $_POST['nd'];
	
	$user 	= $_POST['user'];
    $correo 	= $_POST['correo'];
      
    $querymodificar = mysqli_query($conexion, "UPDATE usuario SET user='$user',correo='$correo' WHERE nd=$nd");

  	echo "<script>window.location= 'admi.php' </script>";
    
}
?>