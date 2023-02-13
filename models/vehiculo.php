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
        (:marca, :matricula, :modelo, :ultimaItv, :averias, :kms, :seguro, :fechaSeguro, :imagen, :imagenItv, :imagenPermisoCirculacion, :observaciones)';
        $resultado=$this->db->prepare($consulta);
        $resultado->execute(array(
            ":marca" => $marca,
            ":matricula" => $matricula,
            ":modelo" => $modelo,
            ":ultimaItv" => $ultimaItv,
            ":averias" => $averias,
            ":kms" => $kms,
            ":seguro" => $seguro,
            ":fechaSeguro" => $fechaSeguro,
            ":imagen" => $img,
            ":imagenItv" => $imgItv,
            ":imagenPermisoCirculacion" => $imgPermiso,
            ":observaciones" => $observaciones
        ));

    }
    
    public function deleteVehiculo($id){

        $consulta = 'DELETE FROM vehiculo where ID=:id';
        $resultado = $this->db->prepare($consulta);

        $resultado->execute(array(":id" => $id));
        
    }

    public function updateVehiculo($id,$marca, $matricula, $modelo, $ultimaItv, $averias, $kms, $seguro, $fechaSeguro, $observaciones){

        $consulta = 'UPDATE FROM vehiculo SET MARCA = :marca, MATRICULA = :matricula, MODELO = :modelo, ultimaItv = :ultimaItv, averias = :averias, kms = :kms, seguro = :seguro, fechaSeguro = :fechaSeguro, observaciones = :observaciones WHERE ID = :id';
        $resultado = $this->db->prepare($consulta);
        $resultado->execute(array(
            ":id" => $id,
            ":marca" => $marca,
            ":matricula" => $matricula,
            ":modelo" => $modelo,
            ":ultimaItv" => $ultimaItv,
            ":averias" => $averias,
            ":kms" => $kms,
            ":seguro" => $seguro,
            ":fechaSeguro" => $fechaSeguro,
            ":observaciones" => $observaciones
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

        $consulta = $this->db->prepare('SELECT * FROM vehiculo LIMIT '. $numeroEmpieza .', '. $cuantosElementosPorPagina);
        $consulta->execute();

        $fila = $consulta->fetchAll(PDO::FETCH_OBJ);

        return $fila;

    }

    }


?>