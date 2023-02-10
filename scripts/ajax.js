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


    $(document).on("click", ".bi-plus-square", function () {    // Botones de añadir
        $("." + $(this).data("div")).removeClass("d-none");
    });

    $(document).on("click", ".bi-x", function () {              // Cerrar div añadir
        $("." + $(this).data("div")).addClass("d-none");
    });

});