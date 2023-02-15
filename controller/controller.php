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

if(!isset($_SESSION["nombre"])){ // Este if sirve para que nos envíe al login si no hay un usuario logeado en este momento*/
    if(isset($_POST['userName']) && isset($_POST['pwd'])){
        $claseUsuario = new Usuario();      // Nuevo Usuario para tener los métodos de validación de usuarios.

        if($claseUsuario->validarLogin($_POST["userName"], $_POST["pwd"])){
            $_SESSION["nombre"] = $_POST["userName"];

            if($claseUsuario->getRol($_SESSION["nombre"]) == "admin"){
                $_SESSION["rol"] = "admin";

                header("Location: index.php");

            }   else{
                $_SESSION["rol"] = "lectura";
                // Aquí irá el require que importará la vista de PERSONAL.
            }
        }

    }else{
        // ESTO VA LO ULTIMO ------
        
        require("view/login.html");        // Si no existen usuario y contraseña directamente se pide otra vez el login
    
    }
}else{  // Aquí introduciremos las redirecciones al resto de pestañas */
    
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


        
        // ELIMINAR PERSONAL

        if(isset($_POST["botonBorrarPersonal"])){
            $personal->deletePersonal($_POST["idBorrarPersonal"]);

            header("Location: index.php");
        }


        // MOSTRAR VEHICULOS

        
        $vehiculo = new Vehiculo();

        $filasVehiculo = $vehiculo->getFilas();
        $filasVehiculoPorPagina = 3;

        if(isset($_GET["paginaVehiculo"])){
            $paginaVehiculoActual = $_GET["paginaVehiculo"];
        } else {
            $paginaVehiculoActual = 1;
        }

        $paginasVehiculo = $vehiculo->getLimit($paginaVehiculoActual, $filasVehiculoPorPagina);
        $numeroDePaginasVehiculo = ceil($filasVehiculo / $filasVehiculoPorPagina);
        
        
        //parte de registrar en admin 
    if(isset($_POST["registrar"])){

        $claseUsuario = new Usuario();  //nos traemos las clases usuario
        $claseUsuario->registrar($_POST['nregistrar'], $_POST['cregistrar'],$_POST['rol']);
        
    }

    //AÑADIR PERSONAL 

    if(isset($_POST['addBotonP'])){

        $nombreImagen = $_FILES["addImagen"]["name"];
        $tipoImagen = $_FILES["addImagen"]["type"];
        $tamImagen = $_FILES["addImagen"]["size"];
        
        $carpetaDestino = $_SERVER["DOCUMENT_ROOT"].'/php/proyectonova/upload/images/';
        move_uploaded_file($_FILES["addImagen"]["tmp_name"], $carpetaDestino.$nombreImagen);

        $clasePersonal = new Personal();

        $clasePersonal->createPersonal($_POST['addNombre'], $_POST['addDNI'], $_POST['addTarjetasanitaria'], $_POST['addNumss'], $nombreImagen , $_POST['addDireccion'], $_POST['addTelefono'], $_POST["addCom"]);
        header("Location: index.php");
    }


    //ELIMINAR PERSONAL

    if(isset($_POST['delBotonP'])){
        $clasePersonal = new Personal();
        $clasePersonal->deletePersonal($_POST['id']);

        header("Location: index.php");
    }

    //MODIFICAR PERSONAL

    if(isset($_POST['editBotonP'])){
        $nombreImagenPersonal = $_FILES["editImagenPersonal"]["name"];
        $tipoImagenPersonal = $_FILES["editImagenPersonal"]["type"];
        $tamImagenPersonal = $_FILES["editImagenPersonal"]["size"];

        $carpetaDestino = $_SERVER["DOCUMENT_ROOT"].'/php/proyectonova/upload/images/';
        move_uploaded_file($_FILES["editImagenPersonal"]["tmp_name"], $carpetaDestino.$nombreImagenPersonal);

        $clasePersonal = new Personal();
        $clasePersonal->updatePersonal($_POST['idEditPersonal'], $_POST['editNombrePersonal'], $_POST['editDNIPersonal'], $_POST['editTarjetaSanitariaPersonal'], $_POST['editNumSSPersonal'], $nombreImagenPersonal, $_POST['editDireccionPersonal'], $_POST['editTelefonoPersonal'], $_POST['editComPersonal']);

        header("Location: index.php");
    }

    

    //AÑADIR VEHICULOS

    if(isset($_POST['addBotonV'])){

        $nombreImg = $_FILES["addImg"]["name"];
        $tipoImg = $_FILES["addImg"]["type"];
        $tamImg = $_FILES["addImg"]["size"];

        $nombreImgItv = $_FILES["addImgItv"]["name"];
        $tipoImgItv = $_FILES["addImgItv"]["type"];
        $tamImgItv = $_FILES["addImgItv"]["size"];

        $nombreImgPermiso = $_FILES["addImgPermiso"]["name"];
        $tipoImgPermiso = $_FILES["addImgPermiso"]["type"];
        $tamImgPermiso = $_FILES["addImgPermiso"]["size"];

        if($tamImg <= 1000000 && $tamImgItv <= 1000000 && $tamImgPermiso <= 1000000){
            if($tipoImg=="image/jpg" || $tipoImg == "image/jpeg" || $tipoImg == "image/png" || $tipoImg == "image/gif"){
                $carpetaDestino = $_SERVER["DOCUMENT_ROOT"].'/php/proyectonova/upload/images/'. $nombreImg;
                move_uploaded_file($_FILES["addImg"]["tmp_name"], $carpetaDestino);
            }
            if($tipoImgPermiso=="image/jpg" || $tipoImgPermiso == "image/jpeg" || $tipoImgPermiso == "image/png" || $tipoImgPermiso == "image/gif"){
                $carpetaDestino = $_SERVER["DOCUMENT_ROOT"].'/php/proyectonova/upload/images/'. $nombreImgItv;
                move_uploaded_file($_FILES["addImgItv"]["tmp_name"], $carpetaDestino);
            }
            if($tipoImgPermiso=="image/jpg" || $tipoImgPermiso == "image/jpeg" || $tipoImgPermiso == "image/png" || $tipoImgPermiso == "image/gif"){
                $carpetaDestino = $_SERVER["DOCUMENT_ROOT"].'/php/proyectonova/upload/images/'. $nombreImgPermiso;
                move_uploaded_file($_FILES["addImgPermiso"]["tmp_name"], $carpetaDestino);
            }
        }

        $claseVehiculo = new Vehiculo();

        $claseVehiculo->createVehiculo($_POST['addMarca'],$_POST['addModelo'],$_POST['addMatricula'],$_POST['addAverias'],$_POST['addItv'],$_POST['addKm'],$_POST['addSeguro'],$_POST['addFechaSeguro'], $nombreImg, $nombreImgItv, $nombreImgPermiso, $_POST['addObs']);

        header("Location: index.php");
    }

    //ELIMINAR VEHICULOS

    if(isset($_POST["botonBorrarVehiculo"])){
        $claseVehiculo = new Vehiculo();
        $claseVehiculo->deleteVehiculo($_POST["idBorrarVehiculo"]);
        
        header("Location: index.php");
    }


    //MODIFICAR VEHICULOS
    if(isset($_POST['editBotonV'])){
        $claseVehiculo = new Vehiculo();
        $claseVehiculo->updateVehiculo($_POST['idEditVehiculo'], $_POST['editMarcaVehiculo'],$_POST['editModeloVehiculo'],$_POST['editMatriculaVehiculo'],$_POST['editAveriasVehiculo'],$_POST['editItvVehiculo'],$_POST['editKmVehiculo'],$_POST['editSeguroVehiculo'],$_POST['editFechaSeguroVehiculo'], $_FILES['editImgVehiculo']['name'], $_FILES['editImgItvVehiculo']['name'], $_FILES['editImgPermisoVehiculo']['name'], $_POST['editObsVehiculo']);
        
        header("Location: index.php");
    }


    // MOSTRAR MATERIAL 
    if (isset($_GET["familia"])){
        $material = new Material();

        $familia = $_GET["familia"];

        $filasMaterial = $material->getFilas($familia);
        $filasMaterialPorPagina = 3;

        if(isset($_GET["paginaMaterial"])){
            $paginaMaterialActual = $_GET["paginaMaterial"];
        } else {
            $paginaMaterialActual = 1;
        }

        $paginasMaterial = $material->getLimit($paginaMaterialActual, $filasMaterialPorPagina, $familia);
        $numeroDePaginasMaterial = ceil($filasMaterial / $filasMaterialPorPagina);
    }
    

    //AÑADIR MATERIAL // estaba comentado

    if(isset($_POST['addBotonM'])){

        $claseMaterial = new Material();

        $claseMaterial->createMaterial($_POST['addNom'],$_POST['addFam'],$_POST['addMarca'],$_POST['addFoto'],$_POST['addDatos'], $_POST['addUbicacion']);

        header("Location: index.php");
    }
    


    //ELIMINAR MATERIAL
    
    
    if(isset($_POST["botonBorrarMaterial"])){
        $claseMaterial = new Material();
        $claseMaterial->deleteMaterial($_POST["id"]);
        
        header("Location: index.php");
    }


    //MODIFICAR MATERIAL

    if(isset($_POST['modBotonM'])){
        $claseMaterial = new Material();
        $claseMaterial->updateMaterial($_POST['id'], $_POST['editNombre'],$_POST['editFamilia'],$_POST['editMarca'],$_POST['editFoto'],$_POST['editDatos'], $_POST['editUbicacion']);
        
        header("Location: index.php");
    }


    //AÑADIR UBICACION

    if(isset($_POST["addBotonU"])){
        $claseLugar = new Lugar();
        $claseLugar->createLugar($_POST['addLocalidad'], $_POST['addRe'], $_POST['addDir']);

        header('Location: index.php');
        
    }


    /*  MOSTRAR UBICACION */
    
        $ubicacion = new Lugar();

        $filasUbicacion = $ubicacion->getFilas();
        $filasUbicacionPorPagina = 3;

        if(isset($_GET["paginaUbicacion"])){
            $paginaUbicacionActual = $_GET["paginaUbicacion"];
        } else {
            $paginaUbicacionActual = 1;
        }

        $paginasUbicacion = $ubicacion->getLimit($paginaUbicacionActual, $filasUbicacionPorPagina);
        $numeroDePaginasUbicacion = ceil($filasUbicacion / $filasUbicacionPorPagina);


    /*ELIMINAR UBICACION */
        
    if(isset($_POST['botonBorrarU'])){
        $claseLugar = new Lugar();
        $claseLugar->deleteLugar($_POST['idBorrarU']);
        
        header("Location: index.php");
    }  
    

    /*MODIFICAR UBICACION*/
    
    if(isset($_POST['editBotonU'])){
        $claseLugar = new Lugar();
        $claseLugar->updateLugar($_POST['idEditU'], $_POST['editLocalidad'],$_POST['editRe'],$_POST['editDir']);
        
        header("Location: index.php");
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