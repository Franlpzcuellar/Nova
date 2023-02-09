<?php

Class Personal {

    private $db;

    public function __construct(){

        require_once("conexion/Conectar.php");
        $this->db = Conexion::conexion();
        

    }

    public function getPersonal(){
        $consulta = $this->db->prepare('SELECT * FROM personal');
        $consulta->execute();

        $final = $consulta->fetchAll(PDO::FETCH_OBJ);

        return $final;
    }

    public function updatePersonal($id, $nombre, $dni, $tarjetaSanitaria, $imagen, $direccion, $comentarios){
        $consulta = $this->db->prepare("UPDATE personal SET nombre = ':n', dni = ':d',
         tarjetaSanitaria = ':t', imagen = ':i', direccion = ':di', comentarios = ':c'");

        $consulta->execute(
            array(
                ':n' => $nombre,
                ':d' => $dni,
                ':t' => $tarjetaSanitaria,
                ':i' => $imagen,
                ':di' => $direccion,
                ':c' => $comentarios
            )
        );
    }

    public function deletePersonal($id){
        $consulta = $this->db->prepare("DELETE FROM personal WHERE id = '$id'");

        $consulta->execute(
            array(':i' => $id,)
        );
    }

    public function createPersonal($nombre, $dni, $tarjetaSanitaria, $imagen, $direccion, $comentarios){
        $consulta = $this->db->prepare("INSERT INTO personal (nombre, dia, tarjetaSanitaria, imagen, direccion, comentarios) 
        VALUES
        (':n', ':d', ':t',':i',':di',':c')");

        $consulta->execute(
            array(
                ':n' => $nombre,
                ':d' => $dni,
                ':t' => $tarjetaSanitaria,
                ':i' => $imagen,
                ':di' => $direccion,
                ':c' => $comentarios
            )
        );
    }

    public function getFilas(){
        // Devuelve un int con las filas que hay en una table
        
        $consulta = $this->db->prepare("SELECT * FROM personal");
        $consulta->execute();

        $total = $consulta->rowCount();

        return $total;

    }

    public function getLimit($numeroDePagina, $cuantosElementosPorPagina){
        // Devuelve un SELECT * CON LIMIT

        $numeroEmpieza = $cuantosElementosPorPagina * ($numeroDePagina - 1);

        $consulta = $this->db->prepare('SELECT * FROM personal LIMIT '. $numeroEmpieza .', '. $cuantosElementosPorPagina);
        $consulta->execute();

        $fila = $consulta->fetch(PDO::FETCH_OBJ);

        return $fila;

    }
}