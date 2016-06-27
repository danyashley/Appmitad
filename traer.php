<?php 

if($conexion = mysqli_connect("mysql.hostinger.com.ar","u947898560_dany","kuro123","u947898560_app")){
	$consulta="SELECT * FROM comentarios ";
	
		$resultado = mysqli_query($conexion,$consulta);
		

		$matriz = array();
		
		while($obj = mysqli_fetch_object($resultado)){
			
			$matriz[] = array("F" => utf8_encode($obj -> usuario), "C" => utf8_encode($obj ->comentario));
		
			
			};

echo json_encode($matriz);


}
		?>