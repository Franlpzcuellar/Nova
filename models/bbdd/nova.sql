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
    id_fichaCarga INT DEFAULT NULL,
    ubicacionMaterial VARCHAR(200),
    observaciones VARCHAR(5000),
    numero_serie VARCHAR(250)
);

CREATE TABLE carga(
    id INT PRIMARY KEY AUTO_INCREMENT,
    idUbicacion INT,
    fecha VARCHAR(255),
    observaciones VARCHAR(255)
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
("Granada", "Sala a", "Ferrocarril Jorge 2"),
("Málaga", "Sala b", "Mz. Los Linares 26"),
("Madrid", "Sala c", "C/ Doctor Vaca de Castro 3"),
("Barcelona", "Sala d", "Corralon de Ganivet 5");
INSERT INTO personal(nombre,dni,tarjetaSanitaria,nSeguridadSocial,imagen,direccion,telefono,comentarios)
VALUES
("Jose Ignacio","01648246C","141241512312","09876543221","joseIgnacio.jpg","C/ San Pedro 13 1C","603135478","Dj Senior"),
("Cristina Rojas","98765240J","981671414674","123456789","cristinaRojas.jpg","C/ San Anton 11 3A","69696969","Profesional de Sonido");
INSERT INTO vehiculo(marca, matricula,modelo,imagen,imagenItv,imagenPermisoCirculacion,ultimaItv,averias, kms, seguro, fechaSeguro, observaciones)
VALUES
("Ford", "217-JFK","KGFORD","furgoneta1.jpg","itv.jpg","permisoCirculacion.jpg","27-04-2022","averia en el motor", 250000, "Mutua Madrileña","29-08-27","Solo lleva equipos de sonido"),
("Ford", "098-OYS","Kuga","furgoneta1.jpg","itv.jpg","permisoCirculacion.jpg","25-04-2020","averia en el motorasasadfd", 10000, "Mutua Madrileña","29-08-27","puede llevar 100k de peso");
INSERT INTO material(nombre,familia,marca,foto,datos,ubicacionMaterial,observaciones,numero_serie)
VALUES
("Torre Andamio", "ESTRUCTURAS", "Pro Safe", "andamio.jpg", "Facil y resistente uso", "ESTRU1", "Esta roto", "076534"),
("Panel de Luz","ILUMINACION","Prime Lux","luces.jpg","Para fotografías", "ILU2", "Esta roto", "076473"),
("Panel de Luz","ILUMINACION","Prime Lux","luces.jpg","Para fotografías", "ILU2", "Esta roto", "076545"),
("Panel de Luz","ILUMINACION","Prime Lux","luces.jpg","Para fotografías", "ILU2", "Esta roto", "076334"),
("Panel de Luz","ILUMINACION","Prime Lux","luces.jpg","Para fotografías", "ILU2", "Esta roto", "054534"),
("Cable Eléctrico", "CABLEADO", "Kopp", "cable.jpg", "Longitud de 3m", "CABLE3", "Esta roto", "075504"),
("Kit de Plataforma de Hombro para Cámara", "VIDEO", "Neewer", "kitplataforma.jpg", "altura de 10m", "VIDEO4", "Esta roto", "076589"),
("Caja de Conexión", "VARIOS", "IP55", "cajaConexion.jfif", "conexion eficaz", "VAR5", "Esta roto", "076835"),
("Apollo Twin MkII Duo Heritage", "SONIDO", "Universal Audio", "apolloTwin.jpg", "Sonidos precisos", "SON6", "Esta roto", "076871"),
("Taladro Percutor 18V", "UTILES", "ONE", "taladro.jpg", "Genial", "UTI7", "Esta roto", "076847");