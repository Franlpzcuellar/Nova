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
    matricula VARCHAR(200),
    modelo VARCHAR(200),
    imagen VARCHAR(255),
    imagenItv VARCHAR(255),
    imagenPermisoCirculacion VARCHAR(255),
    revision VARCHAR(30000),
    averias VARCHAR(5000),
    seguro VARCHAR(200),
    fechaVencimiento VARCHAR(200)
);

CREATE TABLE material(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255),
    familia VARCHAR(255),
    marca VARCHAR(255),
    foto VARCHAR(2000),
    datos VARCHAR(5000),
    fechaCarga DATETIME,
    lugarCarga VARCHAR(500)
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
("MadreMarco","98765240J","98167","123456789","https://pbs.twimg.com/media/D6uc2kBX4AAv3xV.jpg","Calle Coño 123 2Y","69696969","Marco gay");
INSERT INTO vehiculo(matricula,modelo,imagen,imagenItv,imagenPermisoCirculacion,revision,averias,seguro,fechaVencimiento)
VALUES
("2127JFK","modeloyoqse","https://images.coches.com/_vn_/kia/Sportage/c399cf1d98a95d24f8e8715dd0b13fb2.jpg?p=cc_vn_high","https://cdn.autobild.es/sites/navi.axelspringer.es/public/media/image/2022/09/pegatina-itv-2803459.jpg","https://www.dgt.es/export/sites/web-DGT/.galleries/Images/nuestros-servicios/tarjeta-itv-500.jpg","revisionidkqcojonesponer aqui","averia en el motor","29-08-27","29-08-30"),
("0984OYS","modelo2","https://images.coches.com/_vn_/kia/Sportage/c399cf1d98a95d24f8e8715dd0b13fb2.jpg?p=cc_vn_high","https://cdn.autobild.es/sites/navi.axelspringer.es/public/media/image/2022/09/pegatina-itv-2803459.jpg","https://www.dgt.es/export/sites/web-DGT/.galleries/Images/nuestros-servicios/tarjeta-itv-500.jpg","revisionidkqcojonesponer aquilorenipmsuasmamsaksadfgqwertyuf","averia en el motorasasadfd","29-08-27","29-08-30");
INSERT INTO material(nombre,familia,marca,foto,datos,fechaCarga,lugarCarga)
VALUES
("material1","familiamaterial1","marcapolla","https://pbs.twimg.com/media/D6uc2kBX4AAv3xV.jpg","datos qwerty loren ipsum blablablalbablamarcogay","09-feb-2023","lugarCarga1"),
("material2","familiamaterial2","marcapolla","https://pbs.twimg.com/media/D6uc2kBX4AAv3xV.jpg","datos qwerty loren ipsum blablablalbablamarcogay","09-feb-2023","lugarCarga1")