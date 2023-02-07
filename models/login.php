<?php

    class Usuario{

        private $db;

        public function construct(){

            require_once 'models/conectar.php';
            $this->db=Conectar::conexion();

        }


        function ValidarLogin($user,$pass){

            $consulta=$this->db->prepare("SELECT * FROM nova WHERE usuario=:usu and pass =:pass ");
            $consulta=execute();
            $resultado=false;

            if($consulta->rowCount(1)){
                
                return true;
                
            }
            return $resultado;
        }

        function getRol($id){

            $consulta = $this->db->prepare("SELECT rol FROM nova WHERE usuario=:usu");
            $consulta=execute(array(
                
                ":i"=>$id

            )
        );
            
            


            
        }


    }





?>