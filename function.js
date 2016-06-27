$(document).ready(function(){
   
        $.getJSON("http://debateapp.esy.es/traer.php", function(resultados){
            
			for(i = 0; i<resultados.length; i++){
				$.each(resultados[i], function(i, campo){
               	 	$("#listacom").append('<li style="list-style-type:none">' + campo + '</li></br>');
            	});
			} 
        });
		
		$.getJSON("http://debateapp.esy.es/traerd.php", function(resultados){
            
			for(k = 0; k<resultados.length; k++){
				$.each(resultados[k], function(k, com){
               	 	$("#vermas").append('<li style="list-style-type:none">' + com + '</li></br>');
            	});
			} 
        });
    });
	
$('#formulario').submit(function() { 
	
	 "use strict";
	// recolecta los valores que inserto el usuario
	var datosUsuario = $("#usuario").val();
	var datosComentario = $("#comentario").val();
	
  	var archivoValidacion = "http://debateapp.esy.es/enviar.php?jsoncallback=?";
	
	$.getJSON(archivoValidacion, {usuario:datosUsuario ,comentario:datosComentario})
	.done(function(respuestaServer) {

	$('#listacom').empty();
	$.getJSON("http://debateapp.esy.es/traer.php", function(resultados){
            
			for(i = 0; i<resultados.length; i++){
				$.each(resultados[i], function(i, campo){
               	 	$("#listacom").append('<li style="list-style-type:none">' + campo + '</li></br>');
            	});
			} 
        });

				
		if(respuestaServer.validacion == "ok"){
		  
		
			$.mobile.changePage("#home");
$('#formulario')[0].reset();

			
					  
		}else{
		  
		  /// ejecutar una conducta cuando la validacion falla
		}
  
	});
	return false;
});


    $('#foorm').submit(function() {
        // recolecta los valores que inserto el usuario
		"use strict";
        var datosTitulo = $("#titulo").val();
        var datosCategoria = $("#categoria").val();
        var datosNombre = $("#nombre").val();
        var datosCuerpo = $('#cuerpo').val();
        
        var archivoValidacion = "http://debateapp.esy.es/enviar3.php?jsoncallback=?";

        $.getJSON( archivoValidacion, { titulo:datosTitulo , categoria:datosCategoria, nombre:datosNombre, cuerpo:datosCuerpo}).done(function(respuestaServer) {
			
			$('#vermas').empty();
	$.getJSON("http://debateapp.esy.es/traerd.php", function(resultados){
            
			for(k = 0; k<resultados.length; k++){
				$.each(resultados[k], function(k, com){
               	 	$("#vermas").append('<li style="list-style-type:none">' + com + '</li></br>');
            	});
			} 
        });

            
          //  alert(respuestaServer.mensaje);

            if(respuestaServer.validacion == "ok"){
                $.mobile.changePage("#home");
				
				$('#foorm')[0].reset();
            }else{
                alert(respuestaServer.mensaje);
            }
        });
        return false;
    });