<body>

  <?php
  $nombreUsuario = @$_SESSION["nombre"];

  if (isset($_GET["categoria"])) {
    $categoria = $_GET["categoria"];
  } else {
    $categoria = "registrar";
  }
  ?>

  <input type="hidden" id="categoriaInicio" value="<?php echo $categoria ?>"> <!-- Para que el js organice categorias -->



  <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark barra" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <svg class="bi me-2" width="40" height="32">
        <use xlink:href="#bootstrap"></use>
      </svg>
      <h1 class="logo">n<img src="view/nova.png" width="40" height="40">va</h1>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li>
        <a href="#" class="nav-link text-white" data-div="registrar">
          <svg class="bi me-2" width="16" height="16">
            <use xlink:href="#speedometer2"></use>
          </svg>
          Registrar
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link text-white" data-div="personal" aria-current="page">
          <svg class="bi me-2" width="16" height="16">
            <use xlink:href="#home"></use>
          </svg>
          Personal
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white" data-div="vehiculos">
          <svg class="bi me-2" width="16" height="16">
            <use xlink:href="#speedometer2"></use>
          </svg>
          Vehículos
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white" data-div="material">
          <svg class="bi me-2" width="16" height="16">
            <use xlink:href="#table"></use>
          </svg>
          Material
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white" data-div="carga">
          <svg class="bi me-2" width="16" height="16">
            <use xlink:href="#grid"></use>
          </svg>
          Fichas de Carga
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white" data-div="ubicaciones">
          <svg class="bi me-2" width="16" height="16">
            <use xlink:href="#people-circle"></use>
          </svg>
          Ubicaciones
        </a>
      </li>
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://cdn0.bodas.net/vendor/70721/3_2/960/jpg/logotipo-nova-eventos-y-producciones_1_70721.jpeg" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>Admin: <?php
                        echo $nombreUsuario;
                        ?></strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
        <li><a class="dropdown-item" href="index.php?cerrarSesion=true">Desconectar</a></li>
      </ul>
    </div>
  </div>

  <main class="fondo">

    <!-- DIV PERSONAL -->

    <div class="personal d-none">
      <h2>Personal</h2>
      <div class="container arriba">
        <div class="mb-3 row">
          <i class="bi bi-plus-square nuevoanadir" data-div="anadirP">&nbsp Añadir nueva ficha de personal</i><!-- sumar fichero-->
        </div>
      </div>

      <?php foreach ($paginasPersonal as $x) : ?> <!-- EMPIEZA EL BUCLE -->

        <div class="container mb-5 modelo">
          <div class="columna1">
            <label><span class="titulo">Nombre: </span><?php echo $x->nombre  ?></label>
            <label><span class="titulo">DNI: </span><?php echo $x->dni  ?></label>
            <label><span class="titulo">Tarjeta Sanitaria: </span><?php echo $x->tarjetaSanitaria  ?></label>
            <label><span class="titulo">Nº S/S: </span><?php echo $x->nSeguridadSocial  ?></label>
            <label><span class="titulo">Dirección: </span><?php echo $x->direccion  ?></label>
            <label><span class="titulo">Telefono: </span><?php echo $x->telefono  ?></label>
            <label><span class="titulo">Comentarios: </span><?php echo $x->comentarios  ?></label>

            <div class="botones botonesPersonal mt-3">
              <div class="btnModificar">
                <input type="button" class="modBoton modBotonP" name="modBotonP" id="modBotonP" data-div="pantallaOscuraEditPersonal" data-id="<?php echo $x->id ?>" value="MODIFICAR" data-nombre="<?php echo $x->nombre ?>" data-dni="<?php echo $x->dni ?>" data-ts="<?php echo $x->tarjetaSanitaria ?>" data-ss="<?php echo $x->nSeguridadSocial ?>" data-direccion="<?php echo $x->direccion ?>" data-telefono="<?php echo $x->telefono ?>" data-comentarios="<?php echo $x->comentarios ?>" data-imagen="<?php echo $x->imagen ?>"></input>
              </div>
              <div class="btnEliminar">
                <input type="button" class="delBoton delBotonP" name="delBotonP" id="delBotonP" data-div="pantallaOscuraBorrarPersonal" data-id="<?php echo $x->id ?>" value="ELIMINAR"></input>
              </div>
            </div>
          </div>
          <div class="columna2">
            <label class="supFoto"><span class="titulo">Fotografía</span><img src="<?php echo 'upload/images/' . $x->imagen ?>"></label>
          </div>
        </div>

      <?php endforeach; ?> <!-- ACABA EL BUCLE -->

      <div class='paginacion'>

        <?php

        for ($i = 1; $i <= $numeroDePaginasPersonal; $i++) {
          echo "<a class='pagina' href ='?paginaPersonal=" . $i . "&categoria=personal'>" . $i . "</a>";
        };
        ?>

      </div>

    </div>






    <!-- DIV DE REGISTRAR -->
    <form class="mb-3 formRegistrar registrar activo" action="index.php" method="post">
      <h2>Registrar Usuario</h2>
      <label for="nombre" class="form-label"></label>
      <input type="text" class="form-control" name="nregistrar" id="nombre" placeholder="Usuario">
      <label for="contra" class="form-label"></label>
      <input type="password" class="form-control" name="cregistrar" id="contra" placeholder="Contraseña">
      <br>
      <select class="form-select form-select-select-sm" aria-label=".form-select-sm example" name="rol" id="rol" required>
        <option value="" selected disabled hidden>Rol</option>
        <option value="admin">Administrador</option>
        <option value="empleado">Empleado</option>
      </select><br>
      <input type="submit" class="form-control registrar" name="registrar" id="registrar" value="Registrar">
    </form>


    <!-- DIV VEHICULOS -->
    <div class="vehiculos d-none">
      <h2>Vehiculos</h2>
      <div class="container arriba">
        <div class="mb-3 row">
          <i class="bi bi-plus-square nuevoanadir" data-div="anadirV">&nbsp Añadir nuevo vehículo</i><!-- sumar fichero-->
        </div>
      </div>

      <?php foreach ($paginasVehiculo as $x) : ?> <!-- EMPIEZA EL BUCLE -->
        <div class="container mb-5 modelo">
          <div class="columna1">
            <label><span class="titulo">Marca:</span><?php echo $x->marca ?></label>
            <label><span class="titulo">Modelo:</span><?php echo $x->modelo ?></label>
            <label><span class="titulo">Matrícula:</span><?php echo $x->matricula ?></label>
            <label><span class="titulo">Averías:</span><?php echo $x->averias ?></label>
            <label><span class="titulo">Última ITV:</span><?php echo $x->ultimaItv ?></label>
            <label><span class="titulo">KMs:</span><?php echo $x->kms ?></label>
            <label><span class="titulo">Seguro:</span><?php echo $x->seguro ?></label>
            <label><span class="titulo">Fecha Seguro:</span><?php echo $x->fechaSeguro ?></label>
            <label><span class="titulo">Observaciones:</span><?php echo $x->observaciones ?></label>

            <div class="botones mt-3">
              <div class="btnModificar">
                <input type="button" class="modBoton modBotonV" name="modBotonV" id="modBotonV" value="MODIFICAR" data-div="pantallaOscuraEditVehiculo" data-id="<?php echo $x->id ?>" data-marca="<?php echo $x->marca ?>" data-modelo="<?php echo $x->modelo ?>" data-matricula="<?php echo $x->matricula ?>" data-averias="<?php echo $x->averias ?>" data-ultimaitv="<?php echo $x->ultimaItv ?>" data-kms="<?php echo $x->kms ?>" data-seguro="<?php echo $x->seguro ?>" data-fechaseguro="<?php echo $x->fechaSeguro ?> " data-observaciones="<?php echo $x->observaciones ?>" data-imagen="<?php echo $x->imagen ?>" data-imagenItv="<?php echo $x->imagenItv ?>" data-imagenPermisoCirculacion="<?php echo $x->imagenPermisoCirculacion ?>"></input>
              </div>
              <div class="btnEliminar">
                <input type="button" class="delBoton delBotonV" name="delBotonV" data-div="pantallaOscuraBorrarVehiculo" data-id="<?php echo $x->id ?>" id="delBotonV" value="ELIMINAR"></input>
              </div>
            </div>
          </div>
          <div class="columna2">
            <label class="supFoto2"><span class="titulo">Imagen</span>
              <img src="<?php echo 'upload/images/' . $x->imagen ?>"></label>
            <label class="supFoto2"><span class="titulo">ITV</span>
              <img src="<?php echo 'upload/images/' . $x->imagenItv ?>"></label>
            <label class="supFoto2"><span class="titulo">Permiso Circulación</span>
              <img src="<?php echo 'upload/images/' . $x->imagenPermisoCirculacion ?>"></label>
          </div>
        </div>
      <?php endforeach; ?> <!-- ACABA EL BUCLE -->

      <div class='paginacion'>

        <?php

        for ($i = 1; $i <= $numeroDePaginasVehiculo; $i++) {
          echo "<a class='pagina' href ='?paginaVehiculo=" . $i . "&categoria=vehiculos'>" . $i . "</a>";
        };
        ?>

      </div>
    </div>


    <!-- DIV MATERIAL -->
    <div class="material d-none">

      <h2>Material</h2>

      <div class="container arriba">
        <div class="mb-3 row">
          <i class="bi bi-plus-square nuevoanadir" data-div="anadirM">&nbsp Añadir nuevo material</i><!-- sumar fichero-->
        </div>
      </div>

      <!--BUSCADOR-->
      <div class="input-group">
        <form method="post" action="index.php" class="form-outline">
          <button type="submit" name="buscar" id="buscar" value="buscar" class="buscar">
            <i class="bi bi-search"></i>
          </button>
          <input type="text" name="nombre" id="nombre" placeholder="Buscar..." required></input>
          <label class="form-label" for="buscar"></label>
        </form>
      </div>

      <!--FILTRO FAMILIA-->
      <div class="container mb-5 modelo divCategorias">
        <a href='?categoria=material&familia=CABLEADO' name="cableado" class="btn categoria">Cableado</a>
        <a href='?categoria=material&familia=ESTRUCTURAS' name="estructuras" class="btn categoria">Estructuras</a>
        <a href='?categoria=material&familia=ILUMINACION' name="iluminacion" class="btn categoria">Iluminación</a>
        <a href='?categoria=material&familia=SONIDO' name="sonido" class="btn categoria">Sonido</a>
        <a href='?categoria=material&familia=UTILES' name="utiles" class="btn categoria">Útiles y Herramientas</a>
        <a href='?categoria=material&familia=VARIOS' name="varios" class="btn categoria">Varios</a>
        <a href='?categoria=material&familia=VIDEO' name="video" class="btn categoria ulti">Video</a>
      </div>
      <!--MATERIALES BUSCADOS-->
      <div class="materiales <?php if (!isset($_GET["buscar"])) {echo "d-none";} ?>">

        <div class="fichaProducto">
            <h2>Ficha Producto</h2>
          <?php foreach ($_SESSION['materialBuscado'] as $j) : ?>

            <div class="container mb-5 modelo modeloFichaProducto">
              <label><span class="titulo espacioTitulo">ID:</span><?php echo "#" . $j->id ?></label>
              <label><span class="titulo espacioTitulo">Nombre:</span><?php echo $j->nombre ?></label>
              <label><span class="titulo espacioTitulo">Familia:</span><?php echo $j->familia ?></label>
              <label><span class="titulo espacioTitulo">Marca:</span><?php echo $j->marca ?></label>
              <label><span class="titulo espacioTitulo">Ubicacion:</span><?php echo $j->ubicacionMaterial ?></label>
              <label class="fotoMaterial supFoto"><span class="titulo">Foto</span><img src="<?php echo 'upload/images/' . $j->foto ?>"></label>
              <label><span class="titulo espacioTitulo">Datos:</span><?php echo $j->datos ?></label>

              <div class="btnModificar btnModificar2">
                <input type="button" class="modBoton" name="modBotonM" id="modBotonM" value="MODIFICAR" data-div="pantallaOscuraEditMaterial" data-id="<?php echo $j->id ?>" data-nombre="<?php echo $j->nombre ?>" data-familia="<?php echo $j->familia ?>" data-marca="<?php echo $j->marca ?>" data-foto="<?php echo $j->foto ?>" data-datos="<?php echo $j->datos ?>" data-ubicacionMaterial="<?php echo $j->ubicacionMaterial ?>"></input>
                <input type="button" class="modBoton addBotonF" name="addBotonF" id="addBotonF" data-div="pantallaOscuraAnadirF" data-id="<?php echo $j->id; ?>" value="AÑADIR A FICHA DE CARGA"></input>
                <input type="button" class="delBoton delBotonM" name="delBotonM" data-id="<?php echo $j->id; ?>" data-div="pantallaOscuraBorrarM" id="delBotonM" value="ELIMINAR"></input>
              </div>

            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!--MATERIALES-->
      <div class="materiales <?php if (!isset($_GET["familia"])) {echo "d-none";}?>">

        <div class="fichaProducto">
          <h2>Ficha Producto</h2>

          <?php foreach ($paginasMaterial as $x) : ?>

            <div class="container mb-5 modelo modeloFichaProducto">
              <label><span class="titulo espacioTitulo">ID:</span><?php echo "#" . $x->id ?></label>
              <label><span class="titulo espacioTitulo">Nombre:</span><?php echo $x->nombre ?></label>
              <label><span class="titulo espacioTitulo">Familia:</span><?php echo $x->familia ?></label>
              <label><span class="titulo espacioTitulo">Marca:</span><?php echo $x->marca ?></label>
              <label><span class="titulo espacioTitulo">Ubicacion:</span><?php echo $x->ubicacionMaterial ?></label>
              <label class="fotoMaterial supFoto"><span class="titulo">Foto</span><img src="<?php echo 'upload/images/' . $x->foto ?>"></label>
              <label><span class="titulo espacioTitulo">Datos:</span><?php echo $x->datos ?></label>

              <div class="btnModificar btnModificar2">
                <input type="button" class="modBoton" name="modBotonM" id="modBotonM" value="MODIFICAR" data-div="pantallaOscuraEditMaterial" data-id="<?php echo $x->id ?>" data-nombre="<?php echo $x->nombre ?>" data-familia="<?php echo $x->familia ?>" data-marca="<?php echo $x->marca ?>" data-foto="<?php echo $x->foto ?>" data-datos="<?php echo $x->datos ?>" data-ubicacionMaterial="<?php echo $x->ubicacionMaterial ?>"></input>
                <input type="button" class="modBoton addBotonF" name="addBotonF" id="addBotonF" data-div="pantallaOscuraAnadirF" data-id="<?php echo $x->id; ?>" value="AÑADIR A FICHA DE CARGA"></input>
                <input type="button" class="delBoton delBotonM" name="delBotonM" data-id="<?php echo $x->id; ?>" data-div="pantallaOscuraBorrarM" id="delBotonM" value="ELIMINAR"></input>
              </div>

            </div>


          <?php endforeach; ?>

          <div class='paginacion'>

            <?php

            if (isset($_GET["familia"])) {
              $family = $_GET["familia"];
            } else {
              $family = "";
            }

            for ($i = 1; $i <= $numeroDePaginasMaterial; $i++) {
              echo "<a class='pagina' href ='?paginaMaterial=" . $i . "&categoria=material&familia=" . $family . "'>" . $i . "</a>";
            };
            ?>

          </div>
        </div>
      </div>
    </div>

    <!-- DIV CARGA -->
    <div class="carga d-none">
      <h2>Fichas de Carga</h2>
      <div class="container arriba">
        <div class="mb-3 row">
          <i class="bi bi-plus-square nuevoanadir" data-div="anadirC">&nbsp Añadir Fichero</i><!-- sumar fichero-->
        </div>
      </div>

      <?php foreach ($lugar as $x) : ?>
        <div class="container mb-5 modelo factura"><!-- mb-5 modelo container -->
          <div class="cabeceraFactura">
            <label><span class="titulo">Localidad: </span><?php echo $x->loc; ?></label>
            <label><span class="titulo">Recinto: </span><?php echo $x->rec; ?></label>
            <label><span class="titulo">Fecha: </span><?php echo $x->fec; ?></label>
            <label><span class="titulo">Direccion: </span><?php echo $x->dir; ?></label>
          </div>

          <div class="cuerpoFactura">

            <table class="tablaMaterial">
              <tr>
                <td class="tituloColumna">ID</td>
                <td class="tituloColumna">NOMBRE</td>
                <td class="tituloColumna">FAMILIA</td>
                <td class="tituloColumna">MARCA</td>
                <td class="tituloColumna">UBICACION</td>
                <td class="tituloColumna"></td>
              </tr>

              <?php
              $carguita = new Carga();
              $nuevaFichas = $carguita->selectCargaWhere($x->cid);
              foreach ($nuevaFichas as $y) : ?>
                <tr>

                  <td><label class="contenido" id="idBorrarMaterialFicha" name="idBorrarMaterialFicha"><?php echo $y->id; ?></label></td>
                  <td><label class="contenido"><?php echo $y->nom; ?></label>
                  <td><label class="contenido"><?php echo $y->fam; ?></label></td>
                  <td><label class="contenido"><?php echo $y->mar; ?></label></td>
                  <td><label class="contenido"><?php echo $y->ubi; ?></label></td>

                  <td><i class="bi bi-trash3-fill"><input type="button" name="botonBorrarMF" id="idBotonBorrarMaterial" class="d-none idBotonBorrarMaterial" data-div=<?php echo $y->id ?>></i></td>
                </tr>
              <?php endforeach; ?>
            </table>

            <br>
            <div>
              <label for="">Observaciones: <input type="text" class="observacion" id="observacion" name="observacion"></label>
              <input type="button" class="anadirBoton" name="anadirOb" id="anadirOb" value="Enviar Observaciones" data-id="<?php echo $x->id;?>" data-observacion="<?php echo $x->observacion;?>">
            </div>
            <div class="pieBotones">
              <div class="btnModificar">
                <input type="button" class="modBoton delBotonFicha" name="delBotonFicha" id="delBotonFicha" data-div="pantallaOscuraBorrarC" value="ELIMINAR"></input>
              </div>
              <div class="pdfFicha">
                <i class="bi bi-filetype-pdf nuevoanadir">&nbsp Descargar PDF</i>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>









    <!-- DIV UBICACIONES -->

    <div class="ubicaciones d-none">
      <h2>Ubicaciones</h2>
      <div class="container arriba">
        <div class="mb-3 row">
          <i class="bi bi-plus-square nuevoanadir" data-div="pantallaOscuraAnadirU">&nbsp Añadir nueva ubicación</i><!-- sumar fichero-->
        </div>
      </div>

      <?php foreach ($paginasUbicacion as $x) : ?>

        <div class="container mb-5 modelo">
          <div class="columna1">
            <label><span class="titulo">Localidad: </span> <?php echo $x->localidad; ?> </label>
            <label><span class="titulo">Recinto: </span> <?php echo $x->recinto; ?> </label>
            <label><span class="titulo">Direccion: </span> <?php echo $x->direccion; ?> </label>
          </div>

          <div class="botones2">
            <div class="btnModificar">
              <input type="button" class="modBoton modBotonU" name="modBotonU" data-div="pantallaOscuraEditU" data-id="<?php echo $x->id; ?>" data-localidad="<?php echo $x->localidad; ?>" data-recinto="<?php echo $x->recinto; ?>" data-direccion="<?php echo $x->direccion; ?>" id="modBoton" value="MODIFICAR"></input>
            </div>
            <div class="btnEliminar">
              <input type="button" class="delBoton delBotonU" name="delBotonU" data-id="<?php echo $x->id; ?>" data-div="pantallaOscuraBorrarU" id="delBoton" value="ELIMINAR"></input>
            </div>
          </div>
        </div>

      <?php endforeach; ?>

      <div class='paginacion'>
        <?php
        for ($i = 1; $i <= $numeroDePaginasUbicacion; $i++) {
          echo "<a class='pagina' href ='?paginaUbicacion=" . $i . "&categoria=ubicaciones'>" . $i . "</a>";
        };
        ?>
      </div>

    </div>



  </main>











  <!--




----------------------------------------------------------------





-->



















  <!-- DIV AÑADIR PERSONAL-->

  <div class="pantallaOscura anadirP d-none">
    <form class="pantallaFrontal container mb-5" method="post" action="index.php" enctype="multipart/form-data">
      <i class="bi bi-x" data-div="anadirP"></i>
      <label><span class="titulo">Nombre:</span></label>
      <input class="input" type="text" name="addNombre">
      <label><span class="titulo">DNI:</span></label>
      <input class="input" type="text" name="addDNI">
      <label><span class="titulo">Tarjeta Sanitaria:</span></label>
      <input class="input" type="text" name="addTarjetasanitaria">
      <label><span class="titulo">Número SS:</span></label>
      <input class="input" type="text" name="addNumss">
      <label><span class="titulo">Foto:</span></label>
      <input class="input file" type="file" name="addImagen" value="">
      <label><span class="titulo">Direccion:</span></label>
      <input class="input" type="text" name="addDireccion">
      <label><span class="titulo">Teléfono:</span></label>
      <input class="input" type="text" name="addTelefono">
      <label><span class="titulo">Comentarios:</span></label>
      <input class="input" type="text" name="addCom"><br>
      <div class="botones2">
        <input type="submit" class="anadirBoton" name="addBotonP" id="addBotonP" value="AÑADIR"></input>
      </div>
    </form>
  </div>

  <!-- DIV EDITAR PERSONAL-->


  <div class="pantallaOscura pantallaOscuraEditPersonal editP d-none">
    <form class="pantallaFrontal container mb-5" method="post" action="index.php" enctype="multipart/form-data">
      <i class="bi bi-x" data-div="pantallaOscuraEditPersonal"></i>
      <input class="input" type="hidden" name="idEditPersonal" id="idEditPersonal" value="">
      <label><span class="titulo">Nombre:</span></label>
      <input class="input" type="text" name="editNombrePersonal" id="editNombrePersonal">
      <label><span class="titulo">DNI:</span></label>
      <input class="input" type="text" name="editDNIPersonal" id="editDNIPersonal">
      <label><span class="titulo">Tarjeta Sanitaria:</span></label>
      <input class="input" type="text" name="editTarjetaSanitariaPersonal" id="editTarjetaSanitariaPersonal">
      <label><span class="titulo">Número SS:</span></label>
      <input class="input" type="text" name="editNumSSPersonal" id="editNumSSPersonal">
      <label><span class="titulo">Foto:</span></label>
      <input class="input" class="file" type="file" name="editImagenPersonal" id="editImagenPersonal">
      <label><span class="titulo">Direccion:</span></label>
      <input class="input" type="text" name="editDireccionPersonal" id="editDireccionPersonal">
      <label><span class="titulo">Teléfono:</span></label>
      <input class="input" type="text" name="editTelefonoPersonal" id="editTelefonoPersonal">
      <label><span class="titulo">Comentarios:</span></label>
      <input class="input" type="text" name="editComPersonal" id="editComPersonal">
      <br>
      <div class="botones2">
        <input type="submit" class="anadirBoton" name="editBotonP" id="editBotonP" value="MODIFICAR"></input>
      </div>
    </form>
  </div>


  <!-- DIV ELIMINAR PERSONAL -->

  <div class="pantallaOscura pantallaOscuraBorrarPersonal d-none">
    <form class="pantallaFrontal container mb-5" method="post" action="index.php">
      <input type="hidden" name="idBorrarPersonal" id="idBorrarPersonal" value="">
      <p class="textoEliminar">¿Estás seguro/a de que quieres borrar la ficha seleccionada?</p>

      <input type="submit" class="modBoton" name="botonBorrarPersonal" value="BORRAR">
      <input type="button" class="salirPantallaOscuraBorrarPersonal modBoton" data-div="pantallaOscuraBorrarPersonal" value="CANCELAR Y SALIR">
    </form>
  </div>

  <!-- DIV AÑADIR VEHICULOS -->


  <div class="pantallaOscura anadirV d-none">
    <form class="pantallaFrontal container mb-5" method="post" action="index.php" enctype="multipart/form-data">
      <i class="bi bi-x" data-div="anadirV"></i>
      <label><span class="titulo">Marca:</span></label>
      <input class="input" type="text" name="addMarca">
      <label><span class="titulo">Modelo:</span></label>
      <input class="input" type="text" name="addModelo">
      <label><span class="titulo">Matrícula:</span></label>
      <input class="input" type="text" name="addMatricula">
      <label><span class="titulo">Averias:</span></label>
      <input class="input" type="text" name="addAverias">
      <label><span class="titulo">Última ITV:</span></label>
      <input class="input" type="text" name="addItv">
      <label><span class="titulo">KMs:</span></label>
      <input class="input" type="text" name="addKm">
      <label><span class="titulo">Seguro:</span></label>
      <input class="input" type="text" name="addSeguro">
      <label><span class="titulo">Fecha Seguro:</span></label>
      <input class="input" type="text" name="addFechaSeguro">
      <label><span class="titulo">Imagen:</span></label>
      <input class="input" type="file" name="addImg">
      <label><span class="titulo">Imagen ITV:</span></label>
      <input class="input" type="file" name="addImgItv">
      <label><span class="titulo">Imagen Permiso Circulación:</span></label>
      <input class="input" type="file" name="addImgPermiso">
      <label><span class="titulo">Observaciones:</span>
        <input class="input" type="text" name="addObs">
        <div class="botones2">
          <input type="submit" class="anadirBoton" name="addBotonV" id="addBotonV" value="AÑADIR"></input>
        </div>
    </form>
  </div>


  <!-- DIV MODIFICAR VEHICULO -->

  <div class="pantallaOscura pantallaOscuraEditVehiculo d-none">
    <form method="post" action="index.php" enctype="multipart/form-data" class="pantallaFrontal container mb-5">
      <i class="bi bi-x" data-div="pantallaOscuraEditVehiculo"></i>
      <input type="hidden" name="idEditVehiculo" id="idEditVehiculo" value="">
      <label><span class="titulo">Marca:</span></label>
      <input class="input" type="text" name="editMarcaVehiculo" id="editMarcaVehiculo">
      <label><span class="titulo">Modelo:</span></label>
      <input class="input" type="text" name="editModeloVehiculo" id="editModeloVehiculo">
      <label><span class="titulo">Matrícula:</span></label>
      <input class="input" type="text" name="editMatriculaVehiculo" id="editMatriculaVehiculo">
      <label><span class="titulo">Averias:</span></label>
      <input class="input" type="text" name="editAveriasVehiculo" id="editAveriasVehiculo">
      <label><span class="titulo">Última ITV:</span></label>
      <input class="input" type="text" name="editItvVehiculo" id="editItvVehiculo">
      <label><span class="titulo">KMs:</span></label>
      <input class="input" type="text" name="editKmVehiculo" id="editKmVehiculo">
      <label><span class="titulo">Seguro:</span></label>
      <input class="input" type="text" name="editSeguroVehiculo" id="editSeguroVehiculo">
      <label><span class="titulo">Fecha Seguro:</span></label>
      <input class="input" type="text" name="editFechaSeguroVehiculo" id="editFechaSeguroVehiculo">
      <label><span class="titulo">Imagen:</span></label>
      <input class="input" type="file" name="editImgVehiculo" id="editImgVehiculo">
      <label><span class="titulo">Imagen ITV:</span></label>
      <input class="input" type="file" name="editImgItvVehiculo" id="editImgItvVehiculo">
      <label><span class="titulo">Imagen Permiso Circulación:</span></label>
      <input class="input" type="file" name="editImgPermisoVehiculo" id="editImgPermisoVehiculo">
      <label><span class="titulo">Observaciones:</span>
        <input class="input" type="text" name="editObsVehiculo" id="editObsVehiculo">
        <div class="botones2">
          <input type="submit" class="anadirBoton" name="editBotonV" id="editBotonV" value="MODIFICAR"></input>
        </div>
    </form>
  </div>


  <!-- DIV ELIMINAR VEHICULO -->

  <div class="pantallaOscura pantallaOscuraBorrarVehiculo d-none">
    <form class="pantallaFrontal container mb-5" method="post" action="index.php">
      <input type="hidden" name="idBorrarVehiculo" id="idBorrarVehiculo" value="">
      <p class="textoEliminar">¿Estás seguro/a de que quieres borrar el vehículo seleccionado?</p>

      <input type="submit" class="modBoton" name="botonBorrarVehiculo" value="BORRAR">
      <input type="button" class="salirPantallaOscuraBorrarVehiculo modBoton" data-div="pantallaOscuraBorrarVehiculo" value="CANCELAR Y SALIR">
    </form>
  </div>

  <!-- DIV AÑADIR MATERIAL -->

  <div class="pantallaOscura anadirM d-none ">
    <form action="index.php" method="post" enctype="multipart/form-data" class="pantallaFrontal container mb-5">
      <i class="bi bi-x" data-div="anadirM"></i>
      <label><span class="titulo">Nombre:</span></label>
      <input type="text" name="addNom">
      <label><span class="titulo">Familia:</span></label>
      <select name="addFam">
        <option value="CABLEADO">Cableado</option>
        <option value="ESTRUCTURAS">Estructuras</option>
        <option value="ILUMINACION">Iluminación</option>
        <option value="SONIDO">Sonido</option>
        <option value="UTILES">Útiles y Herramientas</option>
        <option value="VARIOS">Varios</option>
        <option value="VIDEO">Video</option>
      </select>
      <label><span class="titulo">Marca:</span></label>
      <input type="text" name="addMarca">
      <label><span class="titulo">Fotografía:</span></label>
      <input type="file" name="addFoto" value="">
      <label><span class="titulo">Datos:</span></label>
      <input type="text" name="addDatos">
      <label><span class="titulo">Ubicación del material:</span></label>
      <input type="text" name="addUbicacion">
      <input type="submit" name="addBotonM" id="addBotonM">AÑADIR</select>
    </form>
  </div>

  <!--DIV AÑADIR FICHA DESDE MATERIALES-->

  <div class="pantallaOscura pantallaOscuraAnadirF d-none ">
    <form method="post" action="index.php" class="pantallaFrontal container mb-5">
      <i class="bi bi-x" data-div="pantallaOscuraAnadirF"></i>
      <input type="hidden" name="idMaterial" id="idMaterialFichaAnadir" value="">
      <select id="seleccionar" name="seleccionar" class="seleccionar">
        <option value="" selected disabled>HOJAS DE CARGA</option>
        <?php
        foreach ($lugar as $x) {
          echo "<option value='" . $x->cid . "'>" . $x->rec . " - " . $x->fec . "</option>";
        }
        ?>
      </select>
      <div class="botones2">
        <input type="submit" class="anadirBoton" name="anadirAFicha" id="anadirAFicha" value="AÑADIR A FICHA"></input>
      </div>
    </form>
  </div>

  <!-- DIV AÑADIR CARGA -->


  <div class="pantallaOscura anadirC d-none">
    <form class="pantallaFrontal container mb-5" method="post" action="index.php" enctype="multipart/form-data">
      <i class="bi bi-x" data-div="anadirC"></i>
      <input class="input" type="hidden" name="idAddtPersonal" id="idAddPersonal" value="">
      <select name="addLocalidad">
        <option value="" selected disabled>Localidad</option>
        <?php foreach ($lugaresSelect as $x)

          echo "<option value='$x->id'>$x->localidad - $x->recinto</option>";

        ?>
      </select>
      <label><span class="titulo">Fecha:</span></label>
      <input class="input" type="date" name="addFecha">
      <div class="botones2">
        <input type="submit" class="anadirBoton" name="addBotonC" id="addBotonC" value="AÑADIR"></input>
      </div>
    </form>
  </div>

  <!-- DIV ELIMINAR CARGA-->

  <div class="pantallaOscura pantallaOscuraBorrarC d-none">
    <form class="pantallaFrontal container mb-5" method="post" action="index.php">
      <input type="hidden" name="idBorrarC" id="idBorrarC" value="">
      <p class="textoEliminar">¿Estás seguro/a de que quieres borrar la carga seleccionada?</p>

      <input type="submit" class="modBoton" name="botonBorrarC" id="botonBorrarC" value="BORRAR">
      <input type="button" class="salirPantallaOscuraBorrarC modBoton" data-div="pantallaOscuraBorrarC" value="CANCELAR Y SALIR">
    </form>
  </div>

  <!-- DIV MODIFICAR MATERIAL -->

  <div class="pantallaOscura pantallaOscuraEditMaterial d-none">
    <form method="post" action="index.php" enctype="multipart/form-data" class="pantallaFrontal container mb-5">
      <i class="bi bi-x" data-div="pantallaOscuraEditMaterial"></i>
      <input type="hidden" name="idEditMaterial" id="idEditMaterial" value="">
      <label><span class="titulo">Nombre:</span></label>
      <input class="input" type="text" name="editNombreMaterial" id="editNombreMaterial">
      <label><span class="titulo">Familia:</span></label>
      <input class="input" type="text" name="editFamiliaMaterial" id="editFamiliaMaterial">
      <label><span class="titulo">Marca:</span></label>
      <input class="input" type="text" name="editMarcaMaterial" id="editMarcaMaterial">
      <label><span class="titulo">Foto:</span></label>
      <input class="input" type="text" name="editFotoMaterial" id="editFotoMaterial">
      <label><span class="titulo">Datos:</span></label>
      <input class="input" type="text" name="editDatosMaterial" id="editDatosMaterial">
      <label><span class="titulo">Ubicacion:</span></label>
      <input class="input" type="text" name="editUbicacionMaterial" id="editUbicacionMaterial">

      <div class="botones2">
        <input type="submit" class="anadirBoton" name="editBotonM" id="editBotonM" value="MODIFICAR"></input>
      </div>
    </form>
  </div>

  <!-- DIV ELIMINAR Material -->

  <div class="pantallaOscura pantallaOscuraBorrarM d-none">
    <form class="pantallaFrontal container mb-5" method="post" action="index.php">
      <input type="hidden" name="idBorrarM" id="idBorrarM" value="">
      <p class="textoEliminar">¿Estás seguro/a de que quieres eliminar el producto seleccionado?</p>

      <input type="submit" class="modBoton" name="botonBorrarM" value="BORRAR">
      <input type="button" class="salirPantallaOscuraBorrarM modBoton" data-div="pantallaOscuraBorrarM" value="CANCELAR Y SALIR">
    </form>
  </div>

  <!--DIV AÑADIR UBICACIONES -->

  <div class="pantallaOscura pantallaOscuraAnadirU d-none"><i class="bi bi-x" data-div="anadirU"></i>
    <form method="post" action="index.php" class="pantallaFrontal container mb-5">
      <i class="bi bi-x" data-div="pantallaOscuraAnadirU"></i>
      <label><span class="titulo">Localidad:</span></label>
      <input type="text" name="addLocalidad" id="addLocalidad">
      <label><span class="titulo">Recinto:</span></label>
      <input type="text" name="addRe" id="addRe">
      <label><span class="titulo">Direccion:</span></label>
      <input type="text" name="addDir" id="addDir">
      <div class="botones2">
        <input type="submit" class="anadirBoton" name="addBotonU" id="addBotonU" value="AÑADIR"></input>
      </div>
    </form>
  </div>

  <!-- DIV EDITAR UBICACIONES -->
  <div class="pantallaOscura pantallaOscuraEditU d-none ">
    <form class="pantallaFrontal container mb-5" action="index.php" method="post" enctype="multipart/form-data">
      <i class="bi bi-x" data-div="pantallaOscuraEditU"></i>
      <input type="hidden" name="idEditU" id="idEditU" value="">
      <label><span class="titulo">Localidad:</span></label>
      <input class="input" type="text" name="editLocalidad" id="editLocalidad">
      <label><span class="titulo">Recinto:</span></label>
      <input class="input" type="text" name="editRe" id="editRe">
      <label><span class="titulo">Direccion:</span></label>
      <input class="input" type="text" name="editDir" id="editDir">
      <div class="botones2">
        <input type="submit" class="anadirBoton" name="editBotonU" id="editBotonU" value="MODIFICAR"></input>
      </div>
    </form>
  </div>

  <!-- DIV ELIMINAR UBICACION-->

  <div class="pantallaOscura pantallaOscuraBorrarU d-none">
    <form class="pantallaFrontal container mb-5" method="post" action="index.php">
      <input type="hidden" name="idBorrarU" id="idBorrarU" value="">
      <p class="textoEliminar">¿Estás seguro/a de que quieres borrar la ubicación seleccionada?</p>

      <input type="submit" class="modBoton" name="botonBorrarU" id="botonBorrarU" value="BORRAR">
      <input type="button" class="salirPantallaOscuraBorrarU modBoton" data-div="pantallaOscuraBorrarU" value="CANCELAR Y SALIR">
    </form>
  </div>



</body>