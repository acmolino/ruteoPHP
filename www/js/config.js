/**
*Scripts generales para los efectos de la pagina
*
*
*/
var ruta = "http://localhost/logosofico/Integrada/ejemploRouter/PHP/";



//Las rutas deben tener la clase RUTA y el hiperviculo
$(document).ready(function(){
 $('.ruta').on('click', function(e){  
    e.preventDefault( );
    var referencia = $(this).attr('href');
  
   llamarPag(referencia);

  });
});

function llamarPag(referencia){
  $.ajax({
    url: referencia,
    type: "GET",
    dataType: "text",

    success: function( response ) {
      $('#contenido').html(response);
    },
  }); 
}
/*******************************************************************************************************************************/
/*******************************************************************************************************************************/





