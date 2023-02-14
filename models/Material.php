<?php

class Material{

    private $db;

    public function __construct(){
        require_once("models/Conectar.php");
        $this->db = Conectar::conexion();
    }

    public function readMaterial(){
        $consulta = $this->db->prepare("SELECT * FROM material");
        $consulta->execute();

        $final = $consulta->fetchAll(PDO::FETCH_OBJ);

        return $final;
    }

    public function updateMaterial($id, $nombre, $familia, $marca, $foto, $datos, $fechaCarga, $lugarCarga){
        $consulta = $this->db->prepare("UPDATE material SET nombre=:n, familia=:f, marca=:m, foto=:o, datos=:d, fechaCarga=:fc, lugarCarga=:lc WHERE id=:i");

        $consulta->execute(
            array(
                ":n" => $nombre,
                ":f" => $familia,
                ":m" => $marca,
                ":o" => $foto,
                ":d" => $datos,
                ":fc" => $fechaCarga,
                ":lc" => $lugarCarga,
                ":i" => $id
            )
        );
    }

    public function deleteMaterial($id){
        $consulta = $this->db->prepare("DELETE FROM material WHERE id=:i");

        $consulta->execute(
            array(
                ":i" => $id
            )
        );
    }

    public function createMaterial($nombre, $familia, $marca, $foto, $datos){
        $consulta = $this->db->prepare("INSERT INTO material(nombre, familia, marca, foto, datos) VALUES (:n, :f, :m, :o, :d)");

        $consulta->execute(
            array(
                ":n" => $nombre,
                ":f" => $familia,
                ":m" => $marca,
                ":o" => $foto,
                ":d" => $datos
            )
        );
    }

    public function anadirCarga($id, $fechaCarga, $lugarCarga){
        $consulta = $this->db->prepare("UPDATE material SET lugarCarga=:l, fechaCarga=:f WHERE id=:i");
        $consulta->execute(
            array(
                ":l" => $lugarCarga,
                ":f" => $fechaCarga,
                ":i" => $id
            )
        );
    }

    public function borrarElementoDeCarga($id){
        $consulta = $this->db->prepare("UPDATE material SET lugarCarga=NULL, fechaCarga=NULL WHERE id=:i");
        $consulta->execute(
            array(
                ":i" => $id
            )
        );
    }

    public function borrarCargaCompleta($lugarCarga, $fechaCarga){
        $consulta = $this->db->prepare("UPDATE material SET lugarCarga=NULL, fechaCarga=NULL WHERE lugarCarga=:l AND fechaCarga=:f");
        $consulta->execute(
            array(
                ":l" => $lugarCarga,
                ":f" => $fechaCarga
            )
        );
    }

    public function getFilas(){
        // Devuelve un int con las filas que hay en una table
        
        $consulta = $this->db->prepare("SELECT * FROM material");
        $consulta->execute();

        $total = $consulta->rowCount();

        return $total;

    }

    public function getLimit($numeroDePagina, $cuantosElementosPorPagina){
        // Devuelve un SELECT * CON LIMIT

        $numeroEmpieza = $cuantosElementosPorPagina * ($numeroDePagina - 1);

        $consulta = $this->db->prepare('SELECT * FROM material LIMIT '. $numeroEmpieza .', '. $cuantosElementosPorPagina);
        $consulta->execute();

        $fila = $consulta->fetchAll(PDO::FETCH_OBJ);

        return $fila;

    }

}

?>