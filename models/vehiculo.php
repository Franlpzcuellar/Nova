<?php

    class Vehiculo{

    private $db;

    public function __construct(){
        require_once("modelo/conectar.php");
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



    }


?>