<?php

Class Personal {

    private $db;

    public function __construct(){

        require_once("models/Conectar.php");
        $this->db = Conectar::conexion();
    }

    public function getPersonal(){
        $consulta = $this->db->prepare('SELECT * FROM personal');
        $consulta->execute();

        $final = $consulta->fetchAll(PDO::FETCH_OBJ);

        return $final;
    }

    public function updatePersonal($id, $nombre, $dni, $tarjetaSanitaria, $nSeguridadSocial, $imagen, $direccion, $telefono, $comentarios){
        $consulta = $this->db->prepare("UPDATE personal SET nombre=:n, dni = :d,
         tarjetaSanitaria = :t, nSeguridadSocial = :ss, imagen = :i, direccion = :di, telefono = :tf, comentarios = :c WHERE id = :id");

        $consulta->execute(
            array(
                ':id' => $id,
                ':n' => $nombre,
                ':d' => $dni,
                ':t' => $tarjetaSanitaria,
                ':ss' => $nSeguridadSocial,
                ':i' => $imagen,
                ':di' => $direccion,
                ':tf' => $telefono,
                ':c' => $comentarios
            )
        );
    }

    public function deletePersonal($id){
        $consulta = $this->db->prepare("DELETE FROM personal WHERE id = :i");

        $consulta->execute(
            array(':i' => $id,)
        );
    }

    public function createPersonal($nombre, $dni, $tarjetaSanitaria, $nSeguridadSocial, $imagen, $direccion, $telefono, $comentarios){
        $consulta = $this->db->prepare("INSERT INTO personal(nombre, dni, tarjetaSanitaria, nSeguridadSocial, imagen, direccion, telefono, comentarios) 
        VALUES
        (:n, :d, :t, :ss, :i, :di, :tf, :c)");

        $consulta->execute(
            array(
                ':n' => $nombre,
                ':d' => $dni,
                ':t' => $tarjetaSanitaria,
                ':ss' => $nSeguridadSocial,
                ':i' => $imagen,
                ':di' => $direccion,
                ':tf' => $telefono,
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

        $consulta = $this->db->prepare('SELECT * FROM personal ORDER BY nombre ASC LIMIT '. $numeroEmpieza .', '. $cuantosElementosPorPagina);
        $consulta->execute();

        $fila = $consulta->fetchAll(PDO::FETCH_OBJ);

        return $fila;

    }
}

?>