<?php
$servidor="localhost";
$user="root";
$contraseña="123456";
$bd="smart_house";

$conexion=mysqli_connect($servidor,$user,$contraseña,$bd) or die("pedo del server");
mysqli_select_db($conexion,"smart_house") or die("pedo con la bd");

?>