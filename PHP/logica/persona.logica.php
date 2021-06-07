<?php

/**
*Clase persona
*
*
*/	
 class Persona{
 	//private $nombre;
 	//private $apellido;

	public $nombre;
 	public $apellido;


 	/**
 	*Constructor
 	*
 	*@param string $nom
 	*@param string $ape
 	*/
 	public function __construct($nom, $ape){
 		$this->nombre = $nom;
 		$this->apellido = $ape;
 	}
 	
 }


?>