<?php

    class Usuario{

        private $db;

        public function __construct(){

            require_once 'models/Conectar.php';
            $this->db = Conectar::conexion();

        }


        public function validarLogin($user,$pass){

            $consulta = $this->db->prepare("SELECT * FROM usuarios WHERE usuario=:usu");
            $consulta->execute(array(
                ":usu"=>$user
            ));

            $contrasenaDeLaBaseDeDatos = $consulta->fetch(PDO::FETCH_ASSOC)["pass"];

            $resultado = false;


            if(($consulta->rowCount() > 0) && (password_verify($pass, $contrasenaDeLaBaseDeDatos))){
                
                $resultado = true;
                
            }

            return $resultado;
        }

        public function registrar($user,$pass,$rol){

            $pass_encriptada = password_hash($pass,PASSWORD_BCRYPT);
            $consulta = $this->db->prepare("INSERT INTO usuarios(usuario,pass,rol) VALUES(:usu, :pwd, :rol)");
            $consulta->execute(array(
                ":usu"=>$user,
                ":pwd"=>$pass_encriptada,
                ":rol"=>$rol
            ));

        }



        public function getRol($usuario){

            $consulta = $this->db->prepare("SELECT * FROM usuarios WHERE  usuario=:u");
            $consulta->execute(array(
                ":u"=>$usuario
                )
            );

            return $consulta->fetch(PDO::FETCH_ASSOC)["rol"];
        }


        public function getFilas(){
            // Devuelve un int con las filas que hay en una table
            
            $consulta = $this->db->prepare("SELECT * FROM usuario");
            $consulta->execute();

            $total = $consulta->rowCount();

            return $total;
    
        }

        public function getLimit($numeroDePagina, $cuantosElementosPorPagina){
            // Devuelve un SELECT * CON LIMIT
    
            $numeroEmpieza = $cuantosElementosPorPagina * ($numeroDePagina - 1);
    
            $consulta = $this->db->prepare('SELECT * FROM usuario LIMIT '. $numeroEmpieza .', '. $cuantosElementosPorPagina);
            $consulta->execute();
    
            $fila = $consulta->fetchAll(PDO::FETCH_OBJ);
    
            return $fila;
    
        }
    }
?>