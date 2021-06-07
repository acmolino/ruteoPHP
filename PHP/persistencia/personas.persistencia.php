 <?php

 class personasBD {
  private $conexion;

  public function __construct(){
    $obtenerConexion = new conexionBD();
    $this->conexion = $obtenerConexion->conectar();
  }

  public function cerrar(){
    $this->conexion = null;
  }

  public function traerDatosPersonas(){
  	$consulta = "SELECT nombre, apellido
                FROM personas";
                //echo $consulta;
    $sentencia= $this->conexion->prepare($consulta);

    if (!$sentencia) {
      echo "\nPDO::errorInfo():\n";
      print_r($this->conexion->errorInfo());
    }
   /*Ejecuta la sentencia SQL*/
    $sentencia->execute();

   $num = $sentencia->rowCount();
    if($num > 0){
        $listado = [];
        while($fila = $sentencia->fetch(PDO::FETCH_ASSOC)){
          array_push($listado, $fila);
        }
        return $listado;
      }
    return 0; 
  } 
  

  public function ingresarPersonas($nombre, $apellido){
    $consulta = "INSERT INTO 
                  personas (nombre, apellido)
                  VALUES ('$nombre', '$apellido')";

    $sentencia= $this->conexion->prepare($consulta);

    if (!$sentencia) {
      echo "\nPDO::errorInfo():\n";
      print_r($this->conexion->errorInfo());
    }
   /*Ejecuta la sentencia SQL*/
    $sentencia->execute();

  }

}//Fin de la clase

?>