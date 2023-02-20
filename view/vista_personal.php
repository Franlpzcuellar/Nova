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
        <a href="#" class="nav-link text-white" data-div="vehiculos">
          <svg class="bi me-2" width="16" height="16">
            <use xlink:href="#speedometer2"></use>
          </svg>
          Vehiculos
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
        <strong>Usuario: <?php
                        echo $nombreUsuario;
                        ?></strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
        <li><a class="dropdown-item" href="index.php?cerrarSesion=true">Desconectar</a></li>
      </ul>
    </div>
  </div>

  <main class="fondo">
    
    
    <!-- DIV VEHICULOS -->
    <div class="vehiculos d-none">
      <h2>Vehiculos</h2>
      <div class="container arriba">
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

      </div>

      <!--BUSCADOR-->
      <div class="input-group">
        <form method="get" action="index.php" class="form-outline">
          <button href='?categoria=material' class="buscar">
            <i class="bi bi-search"></i>
          </button>
          <input name="buscar" id="buscar" placeholder="Buscar..."></input>
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

      <!--MATERIALES-->
      <div class="materiales <?php if (!isset($_GET["familia"])) {
                                echo "d-none";
                              }
                              /*if (!isset($_GET["buscar"])) {echo "d-none";}*/ ?>">

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
        
      </div>

      <div class="container mb-5 modelo factura"><!-- mb-5 modelo container -->
        <div class="cabeceraFactura">
          <label><span class="titulo">Localidad: </span>Granada</label>
          <label><span class="titulo">Recinto: </span>Ferial Granada</label>
          <label><span class="titulo">Fecha: </span>25-11-2220</label>
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
            <tr>
              <td><label class="contenido">1</label></td>
              <td><label class="contenido">Microfono XP</label>
              <td><label class="contenido">SONIDO</label></td>
              <td><label class="contenido">Razer</label></td>
              <td><label >SON6</label></td>
              <td><i class="bi bi-trash3-fill"></td>
            </tr> 
          </table>
          <br>
            <div>
              <label for="">Observaciones: <input class="observacion" id="observacion" name="observacion"></label>
            </div>
           
          </div>
        </div>
      </div>




      <!-- DIV UBICACIONES -->

      <div class="ubicaciones d-none">
        <h2>Ubicaciones</h2>
        <div class="container arriba">
        
        </div>

        <?php foreach ($paginasUbicacion as $x) : ?>

          <div class="container mb-5 modelo">
            <div class="columna1">
              <label><span class="titulo">Localidad: </span> <?php echo $x->localidad; ?> </label>
              <label><span class="titulo">Recinto: </span> <?php echo $x->recinto; ?> </label>
              <label><span class="titulo">Direccion: </span> <?php echo $x->direccion; ?> </label>
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

</body>