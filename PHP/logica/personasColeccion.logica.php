<?php
/**
*Clase coleccionPersonas
*
*Listado de personas
*/
class coleccionPersonas{
	private $listado;
	//public $listado;

	public function __construct(){
		$this->listado = [];
	}

	/**
	*Trae personas desde la base
	*
	*Trae los datos de las personas desde la base de datos
	*
	*/
	public function cargarPersonas(){
		$personaDB = new personasBD();
 		$datos = $personaDB->traerDatosPersonas();
 		foreach ($datos as $key => $value) {
 			extract($value);
 			$pers = new Persona($nombre, $apellido);
 			array_push($this->listado, $pers);		
 		}
	}

	/**
	*Devuelve personas
	*
	*Devuelve datos de personas en formato JSON
	*
	*@return JSON $listado
	*/
	public function devolverPersonas(){
		return json_encode($this->listado);
	}


	/**
	*Ingresa personas a la base
	*
	*
	*/
	public function ingresarPersona($nombre, $apellido){
 		$personaDB = new personasBD();
 		$personaDB->ingresarPersonas($nombre, $apellido);
 	}

}

?>