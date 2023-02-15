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

    $(".salirPantallaOscuraBorrarPersonal").click(function (e) { 
        e.preventDefault();
        
        $("#idBorrarPersonal").val("");
        $("." + $(this).data("div")).addClass("d-none");
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
        
        $("#idEditPersonal").val($(this).data("id"));
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
        $("#editObsVehiculo").val($(this).data("observaciones"));
        $("#editImgVehiculo").val($(this).data("imagen"));        
        $("#editImgItvVehiculo").val($(this).data("imagenitv"));
        $("#editImgPermisoVehiculo").val($(this).data("imagenPermisoCirculacion"));
    });

    $(".delBotonV").click(function (e) { 
        e.preventDefault();
        
        $("#idBorrarVehiculo").val($(this).data("id"));
        $("." + $(this).data("div")).removeClass("d-none");
    });



    $(".modBotonU").click(function (e) { 
        e.preventDefault();
        $("." + $(this).data("div")).removeClass("d-none");
        
        $("#idEditU").val($(this).data("id"));
        $("#editLocalidad").val($(this).data("localidad"));
        $("#editRe").val($(this).data("recinto"));
        $("#editDir").val($(this).data("direccion"));
    });
   

    $(".delBotonU").click(function (e) { 
        e.preventDefault();

        $("#idBorrarU").val($(this).data("id"));
        $("." + $(this).data("div")).removeClass("d-none");

    });
});