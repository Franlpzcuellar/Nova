<?php

class Material{

    private $db;

    public function __construct(){
        require_once("modelo/Conectar.php");
        $this->db = Conexion::conexion();
    }

    public function readMaterial(){
        $consulta = $this->db->prepare("SELECT * FROM material");
        $consulta->execute();

        $final = $consulta->fetchAll(PDO::FETCH_OBJ);

        return $final;
    }

    public function updateMaterial($id, $nombre, $familia, $marca, $foto, $datos, $averias, $fechaCarga, $lugarCarga){
        $consulta = $this->db->prepare("UPDATE material SET nombre=:n, familia=:f, marca=:m, foto=:o, datos=:d, averias=:a, fechaCarga=:fc, lugarCarga=:lc WHERE id=:i");

        $consulta->execute(
            array(
                ":n" => $nombre,
                ":f" => $familia,
                ":m" => $marca,
                ":o" => $foto,
                ":d" => $datos,
                ":a" => $averias,
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

    public function createMaterial($nombre, $familia, $marca, $foto, $datos, $averias){
        $consulta = $this->db->prepare("INSERT INTO material(nombre, familia, marca, foto, datos, averias) VALUES (:n, :f, :m, :o, :d, :a)");

        $consulta->execute(
            array(
                ":n" => $nombre,
                ":f" => $familia,
                ":m" => $marca,
                ":o" => $foto,
                ":d" => $datos,
                ":a" => $averias
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

}

?>