<?php

class Lugar{

    private $db;

    public function __construct(){
        require_once("models/Conectar.php");
        $this->db = Conectar::conexion();
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
        $consulta = $this->db->prepare("INSERT INTO lugar(localidad, recinto, direccion) VALUES (:l, :r, :d)");

        $consulta->execute(
            array(
                ":l" => $localidad,
                ":r" => $recinto,
                ":d" => $direccion,
            )
        );
    }

    public function getFilas(){
        // Devuelve un int con las filas que hay en una table
        
        $consulta = $this->db->prepare("SELECT * FROM lugar");
        $consulta->execute();

        $total = $consulta->rowCount();

        return $total;
    }

    public function getLimit($numeroDePagina, $cuantosElementosPorPagina){
        // Devuelve un SELECT * CON LIMIT

        $numeroEmpieza = $cuantosElementosPorPagina * ($numeroDePagina - 1);

        $consulta = $this->db->prepare('SELECT * FROM lugar ORDER BY localidad ASC LIMIT '. $numeroEmpieza .', '. $cuantosElementosPorPagina);
        $consulta->execute();

        $fila = $consulta->fetchAll(PDO::FETCH_OBJ);

        return $fila;

    }
}



?>