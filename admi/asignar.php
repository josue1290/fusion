<?php 
include_once("../conexion/conexionBD.php");
include_once("../admi/tic_admi.php");

$codigo = $_GET['nd'];
 
$querybuscar = mysqli_query($conexion, "SELECT * FROM tickets WHERE nd=$codigo");
 
while($mostrar = mysqli_fetch_array($querybuscar))
{
    $codigo = $mostrar['nd'];
    $asignar = $mostrar['asignar'];
}
?>
<html>
<head>    
		<title>Asignar</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="caja_popup2" id="formmodificar">
  <form method="POST" class="contenedor_popup" >
        <table>
		<tr><th colspan="2">Asignar Area</th></tr>
        <tr> 
                <td>Codigo</td>
                <td><input type="view" name="nd" value="<?php echo $codigo;?>" ></td>
            </tr>
            <tr> 
                <td>Area</td>
                <td>
                    <select name="asignar" required>
                    <option values='diseñador'>Diseñador</option>
                    <option values='ingeniero'>Ingeniero</option>
                    <option values='tecnico' selected>Tecnico</option>
                    </select>
                </td>
            </tr>
            <tr>
				
                <td colspan="2">
				<a href="../admi/tic_admi.php">Cancelar</a>
				<input type="submit" name="btnmodificar" value="Asignar" onClick="javascript: return confirm('¿Deseas asignar este reporte?');">
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
    $asignar = $_POST['asignar'];

    $querymodificar = mysqli_query($conexion, "UPDATE tickets SET asignar='$asignar' WHERE ND=$nd");

  	echo "<script>window.location= '../admi/tic_admi.php' </script>";
    
}
?>