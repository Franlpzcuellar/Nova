<?php

class Carga{


    private $db;

    public function __construct(){
        require_once("models/Conectar.php");
        $this->db = Conectar::conexion();
    }


    public function crearCarga($idUbicacion,$fecha){

     $consulta=$this->db->prepare("INSERT INTO carga(idUbicacion,fecha) VALUES(:u, :f)");

     $consulta->execute(
        array(
            ':u' => $idUbicacion,
            ':f' => $fecha
        )
        );
        


    }

}


?>