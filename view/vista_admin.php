<body>

  <?php
    $nombreUsuario = @$_SESSION["nombre"];
  ?>
    
<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark barra" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
      <h1 class="logo">n<img src="view/nova.png" width="40" height="40">va</h1>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="#" class="nav-link text-white" data-div="personal" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
          Personal
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white" data-div="registrar">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
          Registrar
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white" data-div="vehiculos">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
          Vehículos
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white" data-div="material">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
          Material
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white" data-div="carga">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
          Fichas de Carga
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white" data-div="ubicaciones">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
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
      <h2 >PERSONAL</h2>
      <div class = "container arriba">
          <div class="mb-3 row">
            <i class="bi bi-plus-square" data-div="anadirP"> Añadir Fichero</i><!-- sumar fichero-->
          </div>
      </div>

      <?php foreach($paginasPersonal as $x): ?>     <!-- EMPIEZA EL BUCLE -->
        
      <div class = "container mb-5 modelo">
        <div class="columna1">
          <label><span class="titulo">Nombre: </span><?php echo $x->nombre  ?></label>
          <label><span class="titulo">DNI: </span><?php echo $x->dni  ?></label>
          <label><span class="titulo">Tarjeta Sanitaria: </span><?php echo $x->tarjetaSanitaria  ?></label>
          <label><span class="titulo">Nº S/S: </span><?php echo $x->nSeguridadSocial  ?></label>
          <label><span class="titulo">Dirección: </span><?php echo $x->direccion  ?></label>
          <label><span class="titulo">Telefono: </span><?php echo $x->telefono  ?></label>
          <label><span class="titulo">Comentarios: </span><?php echo $x->comentarios  ?></label>
        
          <div class="botones">
              <div class="btnModificar">
                <input type="submit" class="modBotonP" name="modBotonP" id="modBotonP" value="MODIFICAR"></input>     
              </div>
              <div class="btnEliminar">
                <input type="submit" class="delBotonP" name="delBotonP" id="delBotonP" value="ELIMINAR"></input>     
              </div>
          </div>
        </div>
        <div class="columna2">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQSplcPrFOJUTfYMXURYfSeUxr9rklYqL65Qg&usqp=CAU" alt="">
        </div>
        </div>
      </div>

      <?php endforeach; ?>                      <!-- ACABA EL BUCLE -->
      
      <? for($i=1; $i<=$numeroDePaginasPersonal; $i++){
        
        echo "<nav aria-label='Page navigation example'>
        <ul class='pagination'>
          <li class='page-item'><a class='page-link' href='index.php?paginaPersonal=" . $i-1 . "'>Previous</a></li>
          <li class='page-item'><a class='page-link' href='index.php?paginaPersonal=$i'>". $i ."</a></li>
          <li class='page-item'><a class='page-link' href='index.php?paginaPersonal=" . $i+1 . "'>Next</a></li>
        </ul>
      </nav>";
        
      }
      
      ?>

    </div>

    <!-- DIV DE REGISTRAR -->
    <form class="mb-3 formRegistrar registrar activo" action="index.php" method="post">
      <h2>REGISTRAR USUARIO</h2>
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

    
    <!-- DIV ELIMINAR  Y MODIFICAR VEHICULOS -->
    <div class="vehiculos d-none">
      <h2>Vehiculos</h2>
      <div class="container arriba">
            <div class="mb-3 row">
              <i class="bi bi-plus-square" data-div="anadirV"> Añadir Fichero</i><!-- sumar fichero-->
            </div>
      </div>

      <div class="container mb-5 modelo">
        <div class="columna1">
          <label><span class="titulo">Marca:</span name="marca" value=""> Mercedes</label>
          <label><span class="titulo">Modelo:</span name="modelo" value=""> Vito</label>
          <label><span class="titulo">Matrícula:</span name="matricula" value=""> 0000 RGF</label>
          <label><span class="titulo">Última Revisión:</span name="revision" value=""> 24-05-2022</label>
          <label><span class="titulo">Última ITV:</span name="itv" value=""> 26-06-2022</label>
          <label><span class="titulo">KMs:</span name="km" value=""> 234000</label>
          <label><span class="titulo">Fecha Seguro:</span name="seguro" value=""> 02-02-2022</label>      
          <label><span class="titulo">Observaciones:</span name="observaciones" value=""> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras viverra magna ultrices lorem laoreet, in rhoncus tellus rhoncus. Phasellus eget sem at ex bibendum tincidunt. Quisque in leo in nisi pretium ultricies quis quis nunc. Aliquam erat volutpat. Sed finibus et tortor ut pretium. </label>
          
          <div class="botones">
            <div class="btnModificar">
              <input type="submit" class="modBotonV" name="modBotonV" id="modBotonV" value="MODIFICAR"></input>     
            </div>
            <div class="btnEliminar">
              <input type="submit" class="delBotonV" name="delBotonV" id="delBotonV" value="ELIMINAR"></input>     
            </div>
          </div>
        </div>
        <div class="columna2">
          <img src="https://m.media-amazon.com/images/I/41g6jROgo0L.png">
          <img src="https://m.media-amazon.com/images/I/41g6jROgo0L.png">
          <img src="https://m.media-amazon.com/images/I/41g6jROgo0L.png">
        </div>
      </div>
    </div>

    
    <!-- DIV ELIMINAR Y MODIFCAR MATERIAL -->
    <div class="material d-none">
      <div class="container arriba">
            <div class="mb-3 row">
              <i class="bi bi-plus-square" data-div="anadirM"> Añadir Fichero</i><!-- sumar fichero-->
              <i class="bi bi-eraser-fill"> Eliminar Fichero</i><!-- borrar fichero-->
            </div>
      </div>

      <div class="input-group">
        <div class="form-outline">
          <button type="button" class="buscar">
            <i class="bi bi-search"></i>
          </button>
          <input type="search" id="form1" placeholder="Buscar..."/>
          <label class="form-label" for="form1"></label>
        </div>
      </div>
      <form class="container mb-5 modelo divCategorias">
        <h3>MATERIAL</h3>
        <button type="submit" name="estructuras" class="btn categoria">Estructuras</button>
        <button type="submit" name="cableado" class="btn categoria">Cableado</button>
        <button type="submit" name="sonido" class="btn categoria">Sonido</button>
        <button type="submit" name="iluminacion" class="btn categoria">Iluminación</button>
        <button type="submit" name="video" class="btn categoria">Video</button>
        <button type="submit" name="utiles" class="btn categoria">Útiles y Herramientas</button>
        <button type="submit" name="varios" class="btn categoria ulti">Varios</button>
      </form>
    </div>

    <div class="d-none fichaProducto" >
      <h2>Ficha Producto</h2>
      <div class="container mb-5 modelo">
        <label><span class="titulo">ID:</span>1234</label>
        <label><span class="titulo">Nombre:</span>Altavoz</label>
        <label><span class="titulo">Familia:</span>Perez</label>
        <label><span class="titulo">Marca:</span>Sony</label>
        <label><span class="titulo">Foto:</span><img src="https://m.media-amazon.com/images/I/41g6jROgo0L.png" width="60"></label>
        <label><span class="titulo">Datos:</span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores suscipit beatae similique in perspiciatis quaerat?</label>


        <div class="btnModificar">
          <input type="submit" class="modBoton" name="modBoton" id="modBoton" value="MODIFICAR"></input>
          
      </div>
    </div>
  </div>
    
    
    
    <!-- DIV MODIFICAR CARGA -->
    <div class="carga d-none">
    <h2>Carga</h2>
        <div class="container arriba">
              <div class="mb-3 row">
                <i class="bi bi-plus-square" data-div=""> Añadir Fichero</i><!-- sumar fichero-->
                <i class="bi bi-eraser-fill"> Eliminar Fichero</i><!-- borrar fichero-->
              </div>
        </div>
        <div class="container mb-5 modelo">
          <label><span class="titulo">ID:</span>1234</label>
          <label><span class="titulo">Nombre:</span>Altavoz</label>
          <label><span class="titulo">Localidad:</span>Madrid</label>
          <label><span class="titulo">Recinto:</span>Wizink Center</label>
          <label><span class="titulo">Dirección:</span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores suscipit beatae similique in perspiciatis quaerat?</label>
          <label><span class="titulo">Fecha:</span>02-01-2023</label>

          <div class="btnModificar">
            <input type="submit" class="modBoton" name="modBoton" id="modBoton" value="MODIFICAR"></input>  
          </div>
        </div>
    </div>


    
    <!-- DIV ELIMINAR UBICACIONES -->

    <div class="ubicaciones d-none">
      <h2>Ubicaciones</h2>
        <div class="container arriba">
              <div class="mb-3 row">
                <i class="bi bi-plus-square" data-div=""> Añadir Fichero</i><!-- sumar fichero-->
                <i class="bi bi-eraser-fill"> Eliminar Fichero</i><!-- borrar fichero-->
              </div>
        </div>
        <div class="container mb-5 modelo">
          <div class="columna1">
            <label><span class="titulo">ID:</span>1234</label>
            <label><span class="titulo">Localidad:</span>Granada</label>
            <label><span class="titulo">Recinto:</span>Sala Polla</label>
            <label><span class="titulo">Direccion:</span>direccion qwertyuio</label>
          </div>

          <div class="botones">
            <div class="btnModificar">
              <input type="submit" class="modBoton" name="modBoton" id="modBoton" value="MODIFICAR"></input>     
            </div>
            <div class="btnEliminar">
              <input type="submit" class="delBoton" name="delBoton" id="delBoton" value="ELIMINAR"></input>     
            </div>
          </div>
        </div>
    </div>


    
  </main>

  





  <!-- DIV AÑADIR PERSONAL-->

  <div class="pantallaOscura anadirP d-none">
      <form class="pantallaFrontal container mb-5" method="post" action="index.php">
        <i class="bi bi-x" data-div="anadirP"></i>
          <label><span class="titulo">Nombre:</span></label>
          <input type="text" name="addNombre">
          <label><span class="titulo">DNI:</span></label>
          <input type="text" name="addDNI">
          <label><span class="titulo">Tarjeta Sanitaria:</span></label>
          <input type="text" name="addTarjetasanitaria">
          <label><span class="titulo">Número SS:</span></label>
          <input type="text" name="addNumss">
          <label><span class="titulo">Foto:</span></label>
          <input type="file" name="addImagen">
          <label><span class="titulo">Direccion:</span></label>
          <input type="text" name="addDireccion">
          <label><span class="titulo">Teléfono:</span></label>
          <input type="text" name="addTelefono">      
          <label><span class="titulo">Comentarios:</span>
          <input type="text" name="addCom">
          <input type="submit" name="addBotonP" id="addBotonP" value="AÑADIR"></input> 
      </form>
  </div>




  <!-- DIV AÑADIR VEHICULOS -->


    <div class="pantallaOscura anadirV d-none">
      <div class="pantallaFrontal container mb-5"><i class="bi bi-x" data-div="anadirV"></i>
          <label><span class="titulo">Marca:</span></label>
          <input type="text" name="addMarca">
          <label><span class="titulo">Modelo:</span></label>
          <input type="text" name="addModelo">
          <label><span class="titulo">Matrícula:</span></label>
          <input type="text" name="addMatricula">
          <label><span class="titulo">Última Revisión:</span></label>
          <input type="text" name="addRevision">
          <label><span class="titulo">Última ITV:</span></label>
          <input type="file" name="addITV">
          <label><span class="titulo">KMs:</span></label>
          <input type="text" name="addKM">
          <label><span class="titulo">Fecha Seguro:</span></label>
          <input type="file" name="addSeguro">      
          <label><span class="titulo">Observaciones:</span>
          <input type="text" name="addObs">
          <input type="submit" name="addBotonV" id="addBotonV" value="addBotonV">AÑADIR</input> 
        </div>
    </div>



    <!-- DIV AÑADIR MATERIAL -->

    <div class="pantallaOscura anadirM d-none ">
      <div class="pantallaFrontal container mb-5"><i class="bi bi-x" data-div="anadirM"></i>
          <label><span class="titulo">Nombre:</span></label>
          <input type="text" name="addNom">
          <label><span class="titulo">Familia:</span></label>
          <input type="text" name="addFam">
          <label><span class="titulo">Marca:</span></label>
          <input type="text" name="addMarca">
          <label><span class="titulo">Fotografía:</span></label>
          <input type="file" name="addFoto">
          <label><span class="titulo">Datos:</span></label>
            <input type="submit" name="addBotonM" id="addBotonM">AÑADIR</input>
        </div>
    </div>


    <!--DIV AÑADIR UBICACIONES -->
    
    <div class="pantallaOscura anadirU d-none"><i class="bi bi-x" data-div="anadirU"></i>
      <div class="pantallaFrontal container mb-5">
          <label><span class="titulo">Localidad:</span></label>
          <input type="text" name="addLocalidad">
          <label><span class="titulo">Recinto:</span></label>
          <input type="text" name="addRe">
          <label><span class="titulo">Direccion:</span></label>
          <input type="text" name="addDir">
            <input type="submit" name="addBotonU" id="addBotonU">AÑADIR</input>
        </div>
    </div>
   
</body>