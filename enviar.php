<?php
//meto en variables la info que inserta el cliente y entre comillas va el name del formulario
$nom = $_GET["usuario"];
$com = $_GET["comentario"];

$resultados = array();

//1.Que el soft de PHP se identifique ante MySQL, si es otra maquina se pone la direcion IP del 
 if($conexion = mysqli_connect("mysql.hostinger.com.ar","u947898560_dany","kuro123","u947898560_app")){
	
	//2. Preparar la consulta SQL , los campos autoincrement no van en la tabla y la consulta
	$consulta= "INSERT INTO comentarios (usuario,comentario) VALUES ('$nom','$com')";
	
	//3. Ejecutar esa consulta en la base no es necesario el resultado porque no trae nada, sino que sube datos
	//es un boolean y te tira true o false entra en el if y te dice si es true o false
	if(mysqli_query($conexion,$consulta)){
				
		//echo"se pudo insertar el dato :)";
		
		$resultados["respuesta"] = 'Validacion Correcta';
		$resultados["validacion"] = 'ok';	
		
	} else{
		
		//echo"no se pudo :(";
		
		$resultados["respuesta"] = 'Validacion Correcta';
		$resultados["validacion"] = 'ok';
	}	
 }
/*convierte los resultados a formato json*/
$resultadosJson = json_encode($resultados);

/*muestra el resultado en un formato que no da problemas de seguridad en browsers */
echo $_GET['jsoncallback'] . '(' . $resultadosJson . ');'
?>

