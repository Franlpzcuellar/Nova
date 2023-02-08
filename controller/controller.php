<?php

session_start();

require_once 'models/Conectar.php';
require_once 'models/Usuario.php';
require_once 'models/Lugar.php';
require_once 'models/Material.php';
require_once 'models/Personal.php';
require_once 'models/Vehiculo.php';

//$_SESSION["nombre"] = NOMBRE DEL USUARIO
//$_SESSION["rol] = ROL DEL USUARIO     (o admin o lectura)

// ------------------------------------------------------------------

if(isset($_GET["cerrarSesion"])){
    session_destroy();
    header("Location: index.php");
}

if(!isset($_SESSION["nombre"])){ /* Este if sirve para que nos envíe al login si no hay un usuario logeado en este momento*/
    if(isset($_POST['userName']) && isset($_POST['pwd'])){
        $claseUsuario = new Usuario();      // Nuevo Usuario para tener los métodos de validación de usuarios.

        if($claseUsuario->validarLogin($_POST["userName"], $_POST["pwd"])){
            $_SESSION["nombre"] = $_POST["userName"];

            if($claseUsuario->getRol($_SESSION["nombre"]) == "admin"){
                $_SESSION["rol"] = "admin";
                require("view/vista_admin.php");
            }   else{
                $_SESSION["rol"] = "lectura";
                // Aquí irá el require que importará la vista de PERSONAL.
            }
        }

    }else{
        require("view/login.html");        // Si no existen usuario y contraseña directamente se pide otra vez el login
    }
}else{  /* Aquí introduciremos las redirecciones al resto de pestañas */
        //parte de registrar en admin 
    if(isset($_POST["registrar"])){

        $claseUsuario = new Usuario();  //nos traemos las clases usuario
    
        if($claseUsuario->registrar($_POST['nregistrar'], $_POST['cregistrar'],$_POST['rol'] )){
            
            require("index.php");           
        }
        
    }

    /* PROVISIONAL */
    if($_SESSION["rol"] == "admin"){
        require("view/vista_admin.php");
    }else{
        echo "PROVISIONAL_LECTURA";
    }
    /* PROVISIONAL */
}










?>