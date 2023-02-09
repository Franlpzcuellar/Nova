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
        // ESTO VA LO ULTIMO ------
        
        require("view/login.html");        // Si no existen usuario y contraseña directamente se pide otra vez el login
    
    }
}else{  /* Aquí introduciremos las redirecciones al resto de pestañas */
    
        // AQUI YA SE HA INICIADO SESION

        //MOSTRAR PERSONAL 
        $personal = new Personal();
        

        $filasPersonal = $personal->getFilas();
        $filasPersonalPorPagina = 3;
        
        if(isset($_GET["paginaPersonal"])){
            $paginaPersonalActual = $_GET["paginaPersonal"];
        }   else{
            $paginaPersonalActual = 1;
        }

        
        $paginasPersonal = $personal->getLimit($paginaPersonalActual, $filasPersonalPorPagina);
        
        $numeroDePaginasPersonal = ceil($filasPersonal / $filasPersonalPorPagina);


        
        //parte de registrar en admin 
    if(isset($_POST["registrar"])){

        $claseUsuario = new Usuario();  //nos traemos las clases usuario
    
        if($claseUsuario->registrar($_POST['nregistrar'], $_POST['cregistrar'],$_POST['rol'] )){
            echo
                    "<script>
                    confirm ('Sent Successfully');
                    document.location.href = 'index.php';
                    </script>
                    ";    
        }
        
    }

    //AÑADIR PERSONAL 

    if(isset($_POST['addBotonP'])){

        $clasePersonal = new Personal();

        $clasePersonal->createPersonal($_POST['addNombre'], $_POST['addDNI'], $_POST['addTarjetasanitaria'], $_POST['addNumss'], $_FILES["addImagen"]["name"], $_POST['addDireccion'], $_POST['addTelefono'], $_POST["addCom"]);
            
        header("Location: index.php");
    }


    //ELIMINAR PERSONAL

    if(isset($_POST['delBotonP'])){
        $clasePersonal = new Personal();

        $clasePersonal->deletePersonal($_POST['id']);

        header("Location: index.php");
    }

    //MODIFICAR PERSONAL

    /*if(isset($_POST['modBotonP'])){
        $clasePersonal = new Personal();

        $clasePersonal->updatePersonal($_POST['id'], $_POST['nombre'], $_POST['dni'], $_POST['tarjetaSanitaria'], $_POST['nSeguridadSocial'], $_POST['imagen'], $_POST['direccion'], $_POST['telefono'], $_POST['comentarios']);
    }*/

    //AÑADIR VEHICULOS

    if(isset($_POST['addBotonV'])){

        $claseVehiculo = new Vehiculo();

        $clasePersonal->createVehiculo($_POST['addMarca'],$_POST['addModelo'],$_POST['addMatricula'],$_POST['addRevision'],$_POST['addITV'],$_POST['addKM'],$_POST['addSeguro'],$_POST['addObs']);

        header("Location: index.php");
        
    
    }

    //ELIMINAR VEHICULOS

   /* if(isset($_POST["delBotonV"])){
        $claseVehiculo = new Vehiculo();
        $claseVehiculo->deleteVehiculo($_POST["id"]);
        header("Location: index.php);
    }*/


    //MODIFICAR VEHICULOS
    /*if(isset($_POST['modBotonP'])){
        $claseVehiculo = new Vehiculo();

        $claseVehiculo->updateVehiculo($_POST['id'], $_POST['matricula'], $_POST['modelo'], $_POST['revision'], $_POST['seguro'], $_POST['imagen'], $_POST['fechaVencimiento']);
    }*/
    

    //AÑADIR MATERIAL

    /*if(isset($_POST['addBotonM'])){

        $claseMaterial = new Material();

        $claseMaterial->createMaterial($_POST['addNom'],$_POST['addFam'],$_POST['addMarca'],$_POST['addFoto'],$_POST['']);
    }*/


    //ELIMINAR MATERIAL
    
    /*
    if(isset($_POST['']))

     */

    //MODIFICAR MATERIAL


    //AÑADIR LUGAR

    /*if(isset($_POST["addBotonU"])){
        $claseLugar = new Lugar();
        $claseLugar->createLugar($_POST['addLocalidad'], $_POST['addRe'], $_POST['addDir']);

        header('Location: index.php');
        
    }*/


    /*ELIMINAR UBICACION
        
    if(isset($_POST[""]))  
    
    */
    //MODIFICAR UBICACION


    /* PROVISIONAL */
    if($_SESSION["rol"] == "admin"){
        require("view/vista_admin.php");
    }else{
        echo "PROVISIONAL_LECTURA";
    }
    /* PROVISIONAL */

}















?>