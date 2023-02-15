CREATE DATABASE nova;
USE nova;

CREATE TABLE usuarios(
    id INT PRIMARY KEY AUTO_INCREMENT,
    usuario VARCHAR(255),
    pass VARCHAR(255),
    rol VARCHAR(255)
);

CREATE TABLE personal(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255),
    dni VARCHAR(255),
    tarjetaSanitaria VARCHAR(255),
    nSeguridadSocial VARCHAR(255),
    imagen VARCHAR(255),
    direccion VARCHAR(255),
    telefono VARCHAR(255),
    comentarios TEXT
);

CREATE TABLE vehiculo(
    id INT PRIMARY KEY AUTO_INCREMENT,
    marca VARCHAR(255),
    matricula VARCHAR(200),
    modelo VARCHAR(200),
    imagen VARCHAR(255),
    imagenItv VARCHAR(255),
    imagenPermisoCirculacion VARCHAR(255),
    ultimaItv VARCHAR(30000),
    averias VARCHAR(5000),
    kms INT,
    seguro VARCHAR(200),
    fechaSeguro VARCHAR(200),
    observaciones TEXT
);

CREATE TABLE material(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255),
    familia VARCHAR(255),
    marca VARCHAR(255),
    foto VARCHAR(2000),
    datos VARCHAR(5000),
    fechaCarga DATETIME,
    lugarCarga VARCHAR(500),
    ubicacionMaterial VARCHAR(200)
);

CREATE TABLE lugar(
    id INT PRIMARY KEY AUTO_INCREMENT,
    localidad VARCHAR(255),
    recinto VARCHAR(255),
    direccion VARCHAR(500)
);

INSERT INTO usuarios(usuario,pass,rol) 
VALUES
("admin", "$2a$12$r./u0nOrrhjZO1seOCaM6.xKTOKyUpQPaOA6rPkiGFr1wZkdQimCK","admin"),
("trabajador1", "$2a$12$r./u0nOrrhjZO1seOCaM6.xKTOKyUpQPaOA6rPkiGFr1wZkdQimCK","lectura");
INSERT INTO lugar(localidad, recinto, direccion) 
VALUES
("Granada", "Sala a", "Manzana 2"),
("Málaga", "Sala b", "Pera 26"),
("Madrid", "Sala c", "Sandia 3"),
("Barcelona", "Sala d", "Coco 5");
INSERT INTO personal(nombre,dni,tarjetaSanitaria,nSeguridadSocial,imagen,direccion,telefono,comentarios)
VALUES
("Pedro","01648246C","9176YJ","098765432","https://dibujosycolores.com/numeros/numero-2/numero-2-1.jpg","Calle Polla 123 1C","603135478","Perro sanxe"),
("MadreMarco","98765240J","98167","123456789","https://pbs.twimg.com/media/D6uc2kBX4AAv3xV.jpg","Calle Coño 123 2Y","69696969","Marco gay. Su vieja");
INSERT INTO vehiculo(marca, matricula,modelo,imagen,imagenItv,imagenPermisoCirculacion,ultimaItv,averias, kms, seguro, fechaSeguro, observaciones)
VALUES
("Perú", "2127JFK","Palomero","https://images.coches.com/_vn_/kia/Sportage/c399cf1d98a95d24f8e8715dd0b13fb2.jpg?p=cc_vn_high","https://cdn.autobild.es/sites/navi.axelspringer.es/public/media/image/2022/09/pegatina-itv-2803459.jpg","https://www.dgt.es/export/sites/web-DGT/.galleries/Images/nuestros-servicios/tarjeta-itv-500.jpg","revisionidkqcojonesponer aqui","averia en el motor", 250000, "Mutua Madrileña","29-08-27","Está pa morirse"),
("Ford", "0984OYS","Kuga","https://images.coches.com/_vn_/kia/Sportage/c399cf1d98a95d24f8e8715dd0b13fb2.jpg?p=cc_vn_high","https://cdn.autobild.es/sites/navi.axelspringer.es/public/media/image/2022/09/pegatina-itv-2803459.jpg","https://www.dgt.es/export/sites/web-DGT/.galleries/Images/nuestros-servicios/tarjeta-itv-500.jpg","revisionidkqcojonesponer aquilorenipmsuasmamsaksadfgqwertyuf","averia en el motorasasadfd", 10000, "Mutua Madrileña","29-08-27","Huele a pedo");
INSERT INTO material(nombre,familia,marca,foto,datos,ubicacionMaterial)
VALUES
("Torre Andamio", "ESTRUCTURAS", "Pro Safe", "https://www.iberandamios.com/540-large_default/andamio-plegable-75x190-750-m-altura-de-trabajo-con-estabilizadores.jpg", "Súbete a esta", "ESTRU1"),
("Panel de Luz","ILUMINACION","Prime Lux","https://365enfoques.com/wp-content/uploads/2018/01/luces-para-estudio-fotografico.jpg","Para fotografías", "ILU2"),
("Panel de Luz","ILUMINACION","Prime Lux","https://365enfoques.com/wp-content/uploads/2018/01/luces-para-estudio-fotografico.jpg","Para fotografías", "ILU2"),
("Panel de Luz","ILUMINACION","Prime Lux","https://365enfoques.com/wp-content/uploads/2018/01/luces-para-estudio-fotografico.jpg","Para fotografías", "ILU2"),
("Panel de Luz","ILUMINACION","Prime Lux","https://365enfoques.com/wp-content/uploads/2018/01/luces-para-estudio-fotografico.jpg","Para fotografías", "ILU2"),
("Cable Eléctrico", "CABLEADO", "Kopp", "https://m.media-amazon.com/images/I/41Vs-rJJCgL.__AC_SX300_SY300_QL70_ML2_.jpg", "Tiene la longitud de mi p****", "CABLE3"),
("Kit de Plataforma de Hombro para Cámara", "VIDEO", "Neewer", "https://m.media-amazon.com/images/I/712aWFKVLpL._AC_SX679_.jpg", "Con esto haces más hombro que en el gym", "VIDEO4"),
("Caja de Conexión", "VARIOS", "IP55", "https://media.adeo.com/marketplace/LMES/82049184/1882493.png?width=650&height=650&format=jpg&quality=80&fit=bounds", "A tu madre si que se la conecto", "VAR5"),
("Apollo Twin MkII Duo Heritage", "SONIDO", "Universal Audio", "https://thumbs.static-thomann.de/thumb/padthumb600x600/pics/bdb/508036/15742746_800.jpg", "Sonidos precisos", "SON6"),
("Taladro Percutor 18V", "UTILES", "ONE", "https://static.ryobitools.eu/remote.axd/ryobi-media-images.s3.amazonaws.com/hi/RPD18-0--Hero_1.jpg?v=FAF4F0D7C5F9F8A190BF25FFB66B0BA6&width=500", "Genial", "UTI7");



