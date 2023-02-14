$(document).ready(function () {

    $(".activo").addClass("d-none");            // Para pagina inicial
    $(".activo").removeClass("activo");
    $("." + $("#categoriaInicio").val()).removeClass("d-none");
    $("." + $("#categoriaInicio").val()).addClass("activo");


    
    $(document).on("click", ".nav-link", function () {          // Botones de sidebar
        $(".activo").addClass("d-none");
        $(".activo").removeClass("activo");

        $("." + $(this).data("div")).removeClass("d-none");
        $("." + $(this).data("div")).addClass("activo");
    });


    $(document).on("click", ".bi-plus-square", function () {    // Botones de añadir Personal
        $("." + $(this).data("div")).removeClass("d-none");
    });

    $(document).on("click", ".bi-x", function () {              // Cerrar div añadir Personal
                $("." + $(this).data("div")).addClass("d-none");
    });

    $(document).on("click", ".modBotonP", function () {              // Boton div modifcar Perosnal
        $("." + $(this).data("div")).removeClass("d-none");

        $("#idEditPersonal").val($(this).data("id"));
        
    });

    $(document).on("click", ".modBotonV", function () {              // Boton div modifcar Vehiculo
            $("." + $(this).data("div")).removeClass("d-none");

        $("#idEditVehiculo").val($(this).data("id"));

        //modificar para vehiculo
        $("#editNombrePersonal").val($(this).data("nombre"));
        $("#editDNIPersonal").val($(this).data("dni"));
        $("#editTarjetaSanitariaPersonal").val($(this).data("ts"));
        $("#editNumSSPersonal").val($(this).data("ss"));
        $("#editDireccionPersonal").val($(this).data("direccion"));
        $("#editTelefonoPersonal").val($(this).data("telefono"));
        $("#editComPersonal").val($(this).data("comentarios"));

        
    });

    

    $(".delBotonP").click(function (e) { 
        e.preventDefault();  //Boton Eliminar Personal
          
        $("#idBorrarPersonal").val($(this).data("id"));
        $("." + $(this).data("div")).removeClass("d-none");
    });

    $(".salirPantallaOscuraBorrarPersonal").click(function (e) { 
        e.preventDefault();
        
        $("#idBorrarPersonal").val("");
        $("." + $(this).data("div")).addClass("d-none");
    });

    $(".delBotonV").click(function (e) { 
        e.preventDefault();
        
        $("#idBorrarVehiculo").val($(this).data("id"));
        $("." + $(this).data("div")).removeClass("d-none");
    });

    $(".salirPantallaOscuraBorrarVehiculo").click(function (e) { 
        e.preventDefault();
        
        $("#idBorrarVehiculo").val("");
        $("." + $(this).data("div")).addClass("d-none");
    });


    $(".salirPantallaOscuraBorrarU").click(function (e) { 
        e.preventDefault();
        
        $("#idBorrarU").val("");
        $("." + $(this).data("div")).addClass("d-none");
        
    });

    $(".modBotonP").click(function (e) { 
        e.preventDefault();
        $("." + $(this).data("div")).removeClass("d-none");
        
        // AUN NO SE PUEDEN ADCTUALIZAR FOTOS Y ADEMAS FUMAMOS PORROSxd'DX'

        $("#idEditPersonal").val($(this).data("id"));
        $("#editNombrePersonal").val($(this).data("nombre"));
        $("#editDNIPersonal").val($(this).data("dni"));
        $("#editTarjetaSanitariaPersonal").val($(this).data("ts"));
        $("#editNumSSPersonal").val($(this).data("ss"));
        $("#editDireccionPersonal").val($(this).data("direccion"));
        $("#editTelefonoPersonal").val($(this).data("telefono"));
        $("#editComPersonal").val($(this).data("comentarios"));
    });

    $(".modBotonU").click(function (e) { 
        e.preventDefault();
        $("." + $(this).data("div")).removeClass("d-none");
        
        $("#idEditU").val($(this).data("id"));
        $("#editLocalidad").val($(this).data("localidad"));
        $("#editRe").val($(this).data("recinto"));
        $("#editDir").val($(this).data("direccion"));
    });


    $(".modBotonV").click(function (e) {
        e.preventDefault();

        $("." + $(this).data("div")).removeClass("d-none");

        $("#idEditVehiculo").val($(this).data("id"));
        $("#editMarcaVehiculo").val($(this).data("marca"));
        $("#editModeloVehiculo").val($(this).data("modelo"));
        $("#editMatriculaVehiculo").val($(this).data("matricula"));
        $("#editAveriasVehiculo").val($(this).data("averias"));
        $("#editItvVehiculo").val($(this).data("ultimaitv"));
        $("#editKmVehiculo").val($(this).data("kms"));
        $("#editSeguroVehiculo").val($(this).data("seguro"));
        $("#editFechaSeguroVehiculo").val($(this).data("fechaseguro"));
        $("#editImgVehiculo").val($(this).data("imagen"));
        $("#editImgItvVehiculo").val($(this).data("imagenitv"));
        $("#editImgPermisoVehiculo").val($(this).data("imagenPermisoCirculacion"));
        $("#editObsVehiculo").val($(this).data("observaciones"));

    });
   

    $(".delBotonU").click(function (e) { 
        e.preventDefault();

        $("#idBorrarU").val($(this).data("id"));
        $("." + $(this).data("div")).removeClass("d-none");

    });

    

});