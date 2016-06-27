<?php 

if($conexion = mysqli_connect("mysql.hostinger.com.ar","u947898560_dany","kuro123","u947898560_app")){
	$consulta="SELECT * FROM debate";
	
		$resultado = mysqli_query($conexion,$consulta);
		

		$matriz = array();
		
		while($obj = mysqli_fetch_object($resultado)){
			
			$matriz[] = array("T" => utf8_encode($obj -> titulo), "A" => utf8_encode($obj ->nombre));
		
			
			};

echo json_encode($matriz);


}
		?>