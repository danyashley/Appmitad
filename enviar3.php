<?php

	$server = "mysql.hostinger.com.ar"; //"mysql.hostinger.com.ar";
	$user = "u947898560_dany"; //"u872921304_app";
	$pass = "kuro123"; //"pG8h2V3QGo";
	$namedb = "u947898560_app"; //"u872921304_appm";

	// VARIABLES DEL FORM
	$tit = $_GET["titulo"];
	$cat = $_GET["categoria"];
	$nom = $_GET["nombre"];
	$cuer = $_GET["cuerpo"];

	// ARRAY DE MENSAJES
	$resultados = array();

	// CONEXION A DB
	if($link = mysqli_connect($server, $user, $pass, $namedb))
	{
		// ARRAY DE OBJETOS
		$matriz = array();

		// CONSULTA DEPENDIENDO LAS VARIABLES
		$consulta = "INSERT INTO debate (titulo, categoria, nombre, cuerpo) VALUES ('$tit', '$cat', '$nom', '$cuer')";
		
		// RESPUESTA DESDE LA DB
		if(mysqli_query($link,$consulta)){
			
			$resultados["mensaje"] = "El alta se realizo correctamente";
			$resultados["validacion"] = "ok";
		} else {

			$resultados["mensaje"] = "Existio un error, vuelva a intentarlo mas tarde";
			$resultados["validacion"] = "No";
		}
	} else {
		echo "alert('NO se conecto');";
	}

	// PASA A JSON LOS MENSAJES
	$resultadosJson = json_encode($resultados);

	// PASA ENCODEADO LOS MENSAJES
	echo $_GET['jsoncallback'] . '(' . $resultadosJson . ');';
?>