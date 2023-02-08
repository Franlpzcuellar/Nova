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
        <a href="#" class="nav-link text-white" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
          Personal
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
          Registrar
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
          Vehículos
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
          Material
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
          Fichas de Carga
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white">
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
        <li><a class="dropdown-item" href="index.php">Ajustes</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="index.php?cerrarSesion=true">Desconectar</a></li>
      </ul>
    </div>
  </div>
  
  <main class="fondo">
    
    <!-- DIV DE PERSONAL -->

    <!-- DIV DE REGISTRAR -->
    <form class=" d-none mb-3 formRegistrar" action="index.php" method="post">
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

    
    <!-- DIV DE VEHICULOS -->
    <div class="vehiculos">
      <div class="container arriba">
            <div class="mb-3 row">
            <i class="bi bi-plus-square"> Añadir Fichero</i><!-- sumar fichero-->
            <i class="bi bi-eraser-fill"> Eliminar Fichero</i><!-- borrar fichero-->
            </div>
      </div>

      <div class="container mb-5 modeloVehiculos">
        <div class="columna1">
          <label><span class="titulo">Marca:</span> Mercedes</label>
          <label><span class="titulo">Modelo:</span> Vito</label>
          <label><span class="titulo">Matrícula:</span> 0000 RGF</label>
          <label><span class="titulo">Última Revisión:</span> 24-05-2022</label>
          <label><span class="titulo">Última ITV:</span> 26-06-2022</label>
          <label><span class="titulo">KMs:</span> 234000</label>
          <label><span class="titulo">Fecha Seguro:</span> 02-02-2022</label>      
          <label><span class="titulo">Observaciones:</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras viverra magna ultrices lorem laoreet, in rhoncus tellus rhoncus. Phasellus eget sem at ex bibendum tincidunt. Quisque in leo in nisi pretium ultricies quis quis nunc. Aliquam erat volutpat. Sed finibus et tortor ut pretium. </label>
          
          <div class="btnModificar"><!--esta sin terminar en el css hacerlo como boton-->
            <i class="bi bi-pencil-square"> MODIFICAR</i>    
          </div>

        </div>
        <div class="columna2">
          <img src="https://m.media-amazon.com/images/I/41g6jROgo0L.png">
          <img src="https://m.media-amazon.com/images/I/41g6jROgo0L.png">
          <img src="https://m.media-amazon.com/images/I/41g6jROgo0L.png">
        </div>
      </div>
    </div>

    
    <!-- DIV DE MATERIAL -->

    
    


    
    <!-- DIV DE CARGA -->



    
    <!-- DIV DE UBICACIONES -->

  


    
  </main>
</body>