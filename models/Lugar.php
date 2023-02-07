<?php

class Lugar{

    private $db;

    public function __construct(){
        require_once("modelo/conectar.php");
        $this->db = Conexion::conectar();
    }

    public function readLugar(){
        $consulta = $this->db->prepare("SELECT * FROM lugar");
        $consulta->execute();

        $final = $consulta->fetchAll(PDO::FETCH_OBJ);

        return $final;
    }

public function updateLugar($id, $nombre){
        $consulta = $this->db->prepare("UPDATE lugar SET nombre=:n WHERE id=:i");

        $consulta->execute(
            array(
                ":n" => $nombre,
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


public function createLugar($nombre){
        $consulta = $this->db->prepare("INSERT INTO lugar(nombre) VALUES (:n)");

        $consulta->execute(
            array(
                ":n" => $nombre
            )
        );
    }


}

?>