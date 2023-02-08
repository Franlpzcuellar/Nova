<?php

class Lugar{

    private $db;

    public function __construct(){
        require_once("modelo/Conectar.php");
        $this->db = Conexion::conexion();
    }

    public function readLugar(){
        $consulta = $this->db->prepare("SELECT * FROM lugar");
        $consulta->execute();

        $final = $consulta->fetchAll(PDO::FETCH_OBJ);

        return $final;
    }

    public function updateLugar($id, $localidad, $recinto, $direccion){
        $consulta = $this->db->prepare("UPDATE lugar SET localidad=:l, recinto=:r, direccion=:d WHERE id=:i");

        $consulta->execute(
            array(
                ":l" => $localidad,
                ":r" => $recinto,
                ":d" => $direccion,
                ":i" => $id
            )
        );
    }

    public function deleteLugar($id){
        $consulta = $this->db->prepare("DELETE FROM lugar WHERE id=:i");

        $consulta->execute(
            array(
                ":i" => $id
            )
        );
    }


public function createLugar($localidad, $recinto, $direccion){
        $consulta = $this->db->prepare("INSERT INTO lugar(localidad, recinto, direccion) VALUES (':l', ':r', ':d')");

        $consulta->execute(
            array(
                ":l" => $localidad,
                ":r" => $recinto,
                ":d" => $direccion,
            )
        );
    }


}

?>