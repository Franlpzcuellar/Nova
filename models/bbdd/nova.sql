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
    imagen VARCHAR(255),
    direccion VARCHAR(255),
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