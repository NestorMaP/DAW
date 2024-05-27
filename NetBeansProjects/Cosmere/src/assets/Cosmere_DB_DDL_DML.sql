DROP DATABASE IF EXISTS cosmere;
CREATE DATABASE cosmere;
USE cosmere;

DROP TABLE IF EXISTS libros;
CREATE TABLE libros(  
	isbn VARCHAR(13) PRIMARY KEY,
    titulo VARCHAR(50),
    anio_pub INT,
    paginas INT,
    saga VARCHAR(50),
    leido VARCHAR(2),
    CONSTRAINT chk_leido CHECK (leido IN ("si","no"))
);

DROP TABLE IF EXISTS personajes;
CREATE TABLE personajes(
	id INT AUTO_INCREMENT PRIMARY KEY,
	nombre VARCHAR(30) NOT NULL,
	libro_isbn VARCHAR(13),
	rol VARCHAR(30),
	CONSTRAINT fk_libro_isbn FOREIGN KEY(libro_isbn) REFERENCES libros(isbn)
		ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT chk_rol CHECK (rol IN ("protagonista","secundario","antagonista","otros"))
);

INSERT INTO libros (isbn,titulo,anio_pub,paginas,saga,leido)
VALUES
("9788490705836","Elantris",2005,800,"Trilogía Elantris","si"),
("9788498726138","El imperio final",2006,688,"Mistborn","si"),
("9788466658904","El pozo de la ascensión",2007,784,"Mistborn","si"),
("9788418037290","El héroe de las eras",2007,760,"Mistborn","si"),
("9788466658874","El aliento de los Dioses",2009,720,"Standalone","no"),
("9788466657662","El camino de los reyes",2010,1200,"El archivo de las Tromentas","si"),
("9788413143958","Palabras radiantes",2014,1248,"El archivo de las Tromentas","no")
;

INSERT INTO personajes (nombre,libro_isbn,rol)
VALUES
("Vin",9788498726138,"protagonista"),
("Elend",9788498726138,"protagonista"),
("Kelsier",9788498726138,"protagonista"),
("Lord Legislador",9788498726138,"antagonista"),
("Raoden",9788490705836,"protagonista"),
("Sarene",9788490705836,"protagonista"),
("Galladon",9788490705836,"secundario")
;