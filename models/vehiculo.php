<?php

    class Vehiculo{

    private $db;

    public function __construct(){
        require_once("models/Conectar.php");
        $this->db = Conectar::conexion();

    }

    public function getVehiculo(){

        $consulta = $this->db->prepare('SELECT * FROM vehiculo');
        $consulta->execute();

        $fila = $consulta->fetchAll(PDO::FETCH_OBJ);

        return $fila;
    }

    public function createVehiculo($marca, $matricula, $modelo, $ultimaItv, $averias, $kms, $seguro, $fechaSeguro, $img, $imgItv, $imgPermiso, $observaciones){


        $consulta = 'INSERT INTO vehiculo(marca, matricula, modelo, ultimaItv, averias, kms, seguro, fechaSeguro, imagen, imagenItv, imagenPermisoCirculacion, observaciones)
        VALUES
        (:m, :ma, :mo, :u, :a, :k, :s, :f, :i, :im, :ima, :o)';
        $resultado=$this->db->prepare($consulta);
        $resultado->execute(array(
            ":m" => $marca,
            ":ma" => $matricula,
            ":mo" => $modelo,
            ":u" => $ultimaItv,
            ":a" => $averias,
            ":k" => $kms,
            ":s" => $seguro,
            ":f" => $fechaSeguro,
            ":i" => $img,
            ":im" => $imgItv,
            ":ima" => $imgPermiso,
            ":o" => $observaciones
        ));

    }
    
    public function deleteVehiculo($id){

        $consulta = 'DELETE FROM vehiculo where ID=:id';
        $resultado = $this->db->prepare($consulta);

        $resultado->execute(array(":id" => $id));
        
    }

    public function updateVehiculo($id, $marca, $matricula, $modelo, $ultimaItv, $averias, $kms, $seguro, $fechaSeguro, $img, $imgItv, $imgPermiso, $observaciones){

        $consulta = 'UPDATE vehiculo SET marca = :m, matricula = :ma, modelo = :mo, ultimaItv = :u, averias = :a, kms = :k, seguro = :s, fechaSeguro = :f, imagen = :i, imagenItv = :im, imagenPermisoCirculacion = :ima, observaciones = :o WHERE id = :id';
        $resultado = $this->db->prepare($consulta);
        $resultado->execute(array(
            ":id" => $id,
            ":m" => $marca,
            ":ma" => $matricula,
            ":mo" => $modelo,
            ":u" => $ultimaItv,
            ":a" => $averias,
            ":k" => $kms,
            ":s" => $seguro,
            ":f" => $fechaSeguro,
            ":i" => $img,
            ":im" => $imgItv,
            ":ima" => $imgPermiso,
            ":o" => $observaciones
        ));
    }

    public function getFilas(){
        // Devuelve un int con las filas que hay en una table
        
        $consulta = $this->db->prepare("SELECT * FROM vehiculo");
        $consulta->execute();

        $total = $consulta->rowCount();

        return $total;
    }

    public function getLimit($numeroDePagina, $cuantosElementosPorPagina){
        // Devuelve un SELECT * CON LIMIT

        $numeroEmpieza = $cuantosElementosPorPagina * ($numeroDePagina - 1);

        $consulta = $this->db->prepare('SELECT * FROM vehiculo ORDER BY marca ASC LIMIT '. $numeroEmpieza .', '. $cuantosElementosPorPagina);
        $consulta->execute();

        $fila = $consulta->fetchAll(PDO::FETCH_OBJ);

        return $fila;
    }

    }


?>