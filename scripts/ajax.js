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

    $(".salirPantallaOscuraBorrarM").click(function (e) {
        e.preventDefault();

        $("#idBorrarM").val("");
        $("." + $(this).data("div")).addClass("d-none");

    });

    $(".salirPantallaOscuraBorrarC").click(function (e) {
        e.preventDefault();

        $("#idBorrarC").val("");
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
        $("#editImgPermisoVehiculo").val($(this).data("imagenpermisocirculacion"));
    });


    $(".delBotonV").click(function (e) {
        e.preventDefault();

        $("#idBorrarVehiculo").val($(this).data("id"));
        $("." + $(this).data("div")).removeClass("d-none");
    });

    $(".addBotonF").click(function (e) {
        e.preventDefault();

        $("." + $(this).data("div")).removeClass("d-none");
        $("#idMaterialFichaAnadir").val($(this).data("id"));
        $("#seleccionar").val($(this).data("seleccionar"));//EL NOMBRE SELECCIONAR ES PROVISIONAL


    });

    $(".delBotonFicha").click(function (e) {
        e.preventDefault();

        $("#idBorrarC").val($(this).data("id"));
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

    $("#modBotonM").click(function (e) {
        e.preventDefault();

        $("." + $(this).data("div")).removeClass("d-none");

        $("#idEditMaterial").val($(this).data("id"));
        $("#editNumero_serie").val($(this).data("numero_serie"));
        $("#editNombreMaterial").val($(this).data("nombre"));
        $("#editFamiliaMaterial").val($(this).data("familia"));
        $("#editMarcaMaterial").val($(this).data("marca"));
        $("#editFotoMaterial").val($(this).data("foto"));
        $("#editDatosMaterial").val($(this).data("datos"));
        $("#editUbicacionMaterial").val($(this).data("ubicacionmaterial"));
        $("#editObservacionesMaterial").val($(this).data("observaciones"));
    });


    $(".delBotonM").click(function (e) {
        e.preventDefault();

        $("#idBorrarM").val($(this).data("id"));
        $("." + $(this).data("div")).removeClass("d-none");

    });

    $(".idBotonBorrarMaterial").click(function (e) {
        e.preventDefault();
        $("#idBorrarMaterialFicha").val($(this).data("id"));
    });


    //BOTON OBSERVACIONES


    $("#anadirOb").click(function (e) {
        e.preventDefault();
        $("#id").val($(this).data("id"));
        $("#observacion").val($(this).data("observacion"));

    });


    //pdf

    var nuevaTabla = document.querySelector(".tablaMaterial");
    var cabecera = document.querySelector(".cabeceraFactura");
    var createPDF = document.querySelector('.pdfFicha');



    createPDF.onclick = function () {
        imprimirElemento(nuevaTabla, cabecera);
    }

    function imprimirElemento(elemento, cabecera) {
        var ventana = window.open('', 'PRINT', 'height=400,width=600');
        ventana.document.write('<html><head><title>' + document.title + '</title>');
        ventana.document.write('<link href="http://localhost/php/ProyectoNova/view/main.css" rel="stylesheet" type="text/css">'); //Aquí agregué la hoja de estilos
        ventana.document.write('</head><body><div class="cabeceraFactura">');
        ventana.document.write(cabecera.innerHTML);
        ventana.document.write('</div><table>');
        ventana.document.write(elemento.innerHTML);
        ventana.document.write('</table></body></html>');
        ventana.document.close();
        ventana.focus();
        ventana.onload = function() {
          ventana.print();
          ventana.close();
        };
        return true;
      }

});