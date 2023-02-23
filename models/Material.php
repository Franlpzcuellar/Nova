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

    public function searchMaterial($nombre){
        $consulta = $this->db->prepare("SELECT * FROM material WHERE nombre LIKE '%$nombre%'");
        $consulta->execute();

        $final = $consulta->fetchAll(PDO::FETCH_OBJ);

        return $final;
    }
    
    public function updateMaterial($id, $nombre, $familia, $marca, $foto, $datos, $ubicacion, $observaciones, $numeroSerie){
        $consulta = $this->db->prepare("UPDATE material SET nombre=:n, familia=:f, marca=:m, foto=:o, datos=:d, ubicacionMaterial=:u, observaciones=:ob, numero_serie=:ns WHERE id=:i");

        $consulta->execute(
            array(
                ":n" => $nombre,
                ":f" => $familia,
                ":m" => $marca,
                ":o" => $foto,
                ":d" => $datos,
                ":u" => $ubicacion,
                ":ob" => $observaciones,
                ":ns" => $numeroSerie,
                ":i" => $id
            )
        );
    }

    public function deleteMaterial($id){
        $consulta = $this->db->prepare("DELETE FROM material WHERE id=:i");

        $consulta->execute(
            array(
                ':i' => $id,)
        );
    }

    public function createMaterial($nombre, $familia, $marca, $foto, $datos, $ubicacion, $observaciones, $numeroSerie){
        $consulta = $this->db->prepare("INSERT INTO material(nombre, familia, marca, foto, datos, ubicacionMaterial, observaciones, numero_serie ) VALUES (:n, :f, :m, :o, :d, :u, :ob, :ns)");

        $consulta->execute(
            array(
                ":n" => $nombre,
                ":f" => $familia,
                ":m" => $marca,
                ":o" => $foto,
                ":d" => $datos,
                ":u" => $ubicacion,
                ":ob" => $observaciones,
                ":ns" => $numeroSerie
            )
        );
    }


    public function getFilas($familia){
        // Devuelve un int con las filas que hay en una table
        
        $consulta = $this->db->prepare("SELECT * FROM material WHERE familia=:f");
        $consulta->execute(array(
            ":f"=>$familia
        ));

        $total = $consulta->rowCount();

        return $total;

    }

    public function getLimit($numeroDePagina, $cuantosElementosPorPagina, $familia){
        // Devuelve un SELECT * CON LIMIT

        $numeroEmpieza = $cuantosElementosPorPagina * ($numeroDePagina - 1);

        $consulta = $this->db->prepare('SELECT * FROM material WHERE familia="' . $familia . '" LIMIT '. $numeroEmpieza .', '. $cuantosElementosPorPagina);
        $consulta->execute();

        $fila = $consulta->fetchAll(PDO::FETCH_OBJ);

        return $fila;

    }

    public function anadirAFicha($idFicha, $idMaterial){
        $consulta = $this->db->prepare("UPDATE material SET id_fichaCarga=:fi WHERE id=:mi");
        $consulta->execute(array(
            ":fi"=>$idFicha,
            ":mi"=>$idMaterial
        ));
    }

    public function quitarFicha($id){
        $consulta = $this->db->prepare("UPDATE material SET id_fichaCarga=NULL WHERE id=:mi");
        $consulta->execute(array(
            ":mi"=>$id
        ));
    }

}

?>