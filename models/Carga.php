<?php

class Carga{


    private $db;

    public function __construct(){
        require_once("models/Conectar.php");
        $this->db = Conectar::conexion();
    }

    public function indexCarga(){
        $consulta = $this->db->prepare("SELECT * FROM carga");
        $consulta->execute();

        $final = $consulta->fetchAll(PDO::FETCH_OBJ);

        return $final;
    }

    public function borrarCarga($id){
        $consulta = $this->db->prepare("DELETE FROM carga WHERE id=:i");
        $consulta->execute(array(
            ":i"=>$id
        ));
    }
    

    public function selectCarga(){
        $consulta = $this->db->prepare(
        "SELECT
            C.id AS cid,
            M.id AS id,
            M.nombre AS nom,
            M.familia AS fam,
            M.marca AS mar,
            M.ubicacionMaterial AS ubi,
            C.fecha AS fec,
            C.observaciones AS obs,
            L.localidad AS loc,
            L.recinto AS rec,
            L.direccion AS dir
        
        FROM carga C
        LEFT JOIN material M
        ON C.id = M.id_fichaCarga
        LEFT JOIN lugar L
        ON C.idUbicacion = L.id");
        $consulta->execute();

        $final = $consulta->fetchAll(PDO::FETCH_OBJ);

        return $final;
    }

    public function selectCargaWhere($idCarga){
        $consulta = $this->db->prepare(
        "SELECT
            C.id AS cid,
            M.id AS id,
            M.nombre AS nom,
            M.familia AS fam,
            M.marca AS mar,
            M.ubicacionMaterial AS ubi,
            C.fecha AS fec,
            L.localidad AS loc,
            L.recinto AS rec,
            L.direccion AS dir
        
        FROM carga C
        LEFT JOIN material M
        ON C.id = M.id_fichaCarga
        LEFT JOIN lugar L
        ON C.idUbicacion = L.id
        WHERE C.id = :cid");
        $consulta->execute(array(":cid"=>$idCarga));

        $final = $consulta->fetchAll(PDO::FETCH_OBJ);

        return $final;
    }

    public function selectLugar(){
        $consulta = $this->db->prepare(
        "SELECT
            C.id AS cid,
            C.fecha AS fec,
            L.localidad AS loc,
            L.recinto AS rec,
            L.direccion AS dir
        
        FROM carga C
        LEFT JOIN lugar L
        ON C.idUbicacion = L.id");
        $consulta->execute();

        $final = $consulta->fetchAll(PDO::FETCH_OBJ);

        return $final;
    }

    public function crearCarga($idUbicacion,$fecha){

     $consulta=$this->db->prepare("INSERT INTO carga(idUbicacion,fecha) VALUES(:u, :f)");

     $consulta->execute(
        array(
            ':u' => $idUbicacion,
            ':f' => $fecha
        )
        );
    }

    public function updateOb($id,$observaciones){
        $consulta=$this->db->prepare("UPDATE carga SET observaciones=:o WHERE id=:i");
        $consulta->execute(
            array(
                ':i' => $id,
                ':o' => $observaciones
            )
            );
    }

}


?>