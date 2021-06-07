async function traerPersonas(){
  $('#cargando').show();

  const response = await fetch(ruta+'personas/listado', 
    {
        method: 'GET',
    });
    // waits until the request completes...
    const res = await response.json();
    return res;       
}


/**
*Si la funcion responde, realiza la acción
*
*
*/
traerPersonas().then(dato => {
    console.log(dato);
	for(i = 0; i < dato.length; i++){
		$('#datosPersonas').append('<tr><td>'+dato[i].nombre+'</td><td>'+dato[i].apellido+'</td></tr>');				
		}
	$('#cargando').hide();
});	



/**
*Función para ingresar datos
*
*Realizada con JQuery Ajax
*/
function ingresarPersona(nom, ape){
    var datos = {nombre : nom, apellido : ape};

    $.ajax({
        url: ruta+'personas/ingresar',
        method : 'POST',
        dataType: "json",
        data : JSON.stringify(datos),
        success: function(respuesta) {
            console.log(respuesta);
            $('#resultado').html(respuesta);
        },
        error: function() {
            console.log("No se ha podido obtener la información");
    }
    });
}



