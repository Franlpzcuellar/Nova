<?php

    class Vehiculo{

    private $db;

    public function __construct(){
        require_once("modelo/Conectar.php");
        $this->db = Conectar::conexion();

    }

    public function getVehiculo(){

        $consulta = $this->db->prepare('SELECT * FROM vehiculo');
        $consulta->execute();

        $fila = $consulta->fetchAll(PDO::FETCH_OBJ);

        return $fila;

    }

    public function createVehiculo($matricula, $modelo, $revision, $seguro, $fechaVencimiento){


        $consulta = 'INSERT INTO vehiculo(matricula, modelo, revision, seguro, fechaVencimiento) VALUES (:matriculal, :modelo, :revision, :seguro, :fechaVencimiento)';
        $resultado=$this->db->prepare($consulta);
        $resultado->execute(array(":matricula" => $matricula, ":modelo" => $modelo, ":revision" => $revision, ":seguro" => $seguro, ":fechaVencimiento" => $fechaVencimiento));

    }
    
    public function deleteVehiculo($id){

        $consulta = 'DELETE FROM vehiculo where ID=:id';
        $resultado = $this->db->prepare($consulta);

        $resultado->execute(array(":id" => $id));
        
    }

    public function updateVehiculo($id, $matricula, $modelo, $revision, $seguro, $fechaVencimiento){

        $consulta = 'UPDATE FROM vehiculo SET MATRICULA = :matricula, MODELO = :modelo, REVISION = :revision, SEGURO = :seguro, FECHAVENCIMIENTO = :fechaVencimiento WHERE ID = :id';
        $resultado = $this->db->prepare($consulta);
        $resultado->execute(array(
            ":id" => $id,
            ":matricula" => $matricula,
            ":modelo" => $modelo,
            ":revision" => $revision,
            ":seguro" => $seguro,
            ":fechaVencimiento" => $fechaVencimiento
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

        $fila = $consulta->fetch(PDO::FETCH_OBJ);

        return $fila;

    }

    }


?>