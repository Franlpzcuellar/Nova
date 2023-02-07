<?php

    class Usuario{

        private $db;

        public function construct(){

            require_once 'models/conectar.php';
            $this->db=Conectar::conexion();

        }


        function ValidarLogin($user,$pass){

            $consulta=$this->db->prepare("SELECT * FROM nova WHERE usuario=:usu and pass =:pass");
            $consulta=execute();
            $resultado=false;

            if($consulta->rowCount()){
                
                
            }
            return $resultado
        }


    }





?>