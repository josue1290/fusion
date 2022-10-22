<?php include_once("../conexion/conexionBD.php"); 
    
    $user 	= $_POST['user'];
    $correo 	= $_POST['correo'];
    $passcode 	= $_POST['pass'];
    $puesto = $_POST['puesto'];


    $dictionary = array('A','B','C','1','D','E','2','F','G','H','3','I','J','K','4','L','M','N','5','Ñ','O','P',
    'Q','R','6','S','T','U','V','W','7','X','Y','Z','a', 'b', '8', 'c', 'd', 'e', 'f', 'g', 
    'h', '9', 'i', 'j', 'k', 'l', 'm', '0', 'n', 'ñ', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');

    $new_dictionary = array('ei', 'bi', 'si', '|', 'di', 'i', '||', 'ef', '||i', 'eich', '|||', 'a|', '||e|', 'ke|', 
        '|V', 'e|', 'em', 'en','V','eñ','ou','p|','k|u','ar','V|','es','ti','iu','vi','daob||u',
        'V||','ecs','ua|','z||','E|', 'B|', 'V|||', 'S|', 'D|', '|', 'EF', '||I', 'E|CH', 'V|V', 
        'A|', '||EI', 'KE|', 'E|', 'EM', '0', 'EN', 'EÑ', 'OU', 'P|', 'K|U', 'AR', 'ES', 'T|', '|U',
        'V|', 'DA0B||U', 'ECS', 'UA|', 'ZEB');
   // $dictionary = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');

    //$new_dictionary = array('!', '#', '$', '%', '&', '/', ')', '(', '=', '?', '¡', '*', '[', ']', ',', '.', '-', ';', ':', '', '{', '}', '+', '@', '~', '^');

    // 3. Convertir el input del usuario en un arreglo iterable
    $passcode_arr = str_split($passcode); // ['a', 'b', 'c', 'd', 'e', 'f', 'g']

    $encoded_pass = array(); // ['0', '1', '2', '3', '4', '5']
    // 4. Comparar el input del usuario con el diccionario
    foreach ($passcode_arr as &$passcode_val) {

    foreach ($dictionary as $dic_key => $dic_val) {
        if ($passcode_val == $dic_val) {
        array_push($encoded_pass, $new_dictionary[$dic_key]);
        }
    }
    }

    $new_pass = implode($encoded_pass);
    
	mysqli_query($conexion, "INSERT INTO empleado(user,correo,pass,estatus,puesto) VALUES('$user','$correo','$new_pass',estatus='0','$puesto')");
    
header("Location:../admi/lis_emp.php");
	

?>