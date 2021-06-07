<?php
//LAs rutas internas
require_once "rutas.php";
//La clase para el routeo
require_once CONFIG.'router/autoload.php';
//Todos los includes, no es necesario, pero ayuda a odenar
require_once CONFIG.'includes.php';

//Inicio el enrutador
$router = new AltoRouter();

//Mi directorio base
$router->setBasePath('/logosofico/Integrada/ejemploRouter/PHP');


/**
*Listar personas
*
*
*/
$router->map('GET', '/personas/listado', function() {
  try {
  	$perColec = new coleccionPersonas();
    $perColec->cargarPersonas();
    echo $perColec->devolverPersonas();
    http_response_code(200);

  } catch (\Exception $e) {
    http_response_code(500);
    echo '{"Message" : "Error, no se pudo obtener personas"}';
  }
});

/**
*Ingresar personas
*
*
*/
$router->map('POST', '/personas/ingresar', function() {
  $obj=json_decode(file_get_contents('php://input'));
  try {
	 $per = new coleccionPersonas();
	 $per->ingresarPersona($obj->nombre, $obj->apellido);
   echo '{"Message" : "Ingresado con exito"}';
   http_response_code(201);

  } catch (\Exception $e) {
    http_response_code(500);
    echo '{"Message" : "Error, no se pudo obtener personas"}';
  }
});




/**
*Necesario para el routeo
*
*
*/
$match = $router->match();
if( is_array($match) && is_callable( $match['target'] ) ) {
  call_user_func_array( $match['target'], $match['params'] );
} else {
  // no route was matched
  header( $_SERVER["SERVER_PROTOCOL"] . ' 403 Not Found');
}

?>