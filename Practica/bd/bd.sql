DROP DATABASE IF EXISTS practica;
CREATE DATABASE practica;
USE practica;

---TABLAS

CREATE TABLE usuario(
    id INT AUTO_INCREMENT,
    nombre VARCHAR(25),
    apellido VARCHAR(25),
    rut VARCHAR(25),
    pass VARCHAR(25),
    cargo VARCHAR(25),
    email VARCHAR(25),
    estado BOOLEAN,

    PRIMARY KEY(id),
    UNIQUE(rut)
);

CREATE TABLE ups(
    id INT AUTO_INCREMENT,
    marca VARCHAR(25),
    n_de_serie VARCHAR(25),
    modelo VARCHAR(25),
    estado BOOLEAN,

    PRIMARY KEY(id)
);

CREATE TABLE telefono(
    id INT AUTO_INCREMENT,
    marca VARCHAR(25),
    n_serie VARCHAR(25),
    modelo VARCHAR(25),
    tipo_tecno VARCHAR(25),
    estado BOOLEAN,

    PRIMARY KEY(id)
);

CREATE TABLE modelo(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(25)
);

CREATE TABLE marca(
    id INT AUTO_INCREMENT PRIMARY KEY,
    verificador INT,
    nombre_marca VARCHAR(25),
    modelo_id_fk INT,
    FOREIGN KEY(modelo_id_fk) REFERENCES modelo(id)
);


/* INSERT INTO marca_modelo VALUES(NULL,1,'HP','HP 202',
                                NULL,1,'HP','HP 5000',
                                NULL,2,'Lenovo','Lenovo 1000'.
                                NULL,2,'Lenovo','Lenovo G4'); */
CREATE TABLE equipo(
    id INT AUTO_INCREMENT,
    tipo_pc VARCHAR(25),
    centro_de_costo VARCHAR(25),
    n_serie VARCHAR(25),
    licencia VARCHAR(25),
    estado VARCHAR(25),
    responsable VARCHAR(25),
    fecha_de_ingreso DATE,
    marca_id_fk INT,

    PRIMARY KEY(id),
    FOREIGN KEY(marca_id_fk) REFERENCES marca(id)
);

CREATE TABLE sector(
    id INT AUTO_INCREMENT,
    nombre VARCHAR(25),

    PRIMARY KEY(id)
);

CREATE TABLE cesfam(
    id INT AUTO_INCREMENT,
    nombre VARCHAR(25),
    direccion VARCHAR(25),
    telefono VARCHAR(10),
    sector_id_fk INT,

    PRIMARY KEY (id),
    FOREIGN KEY (sector_id_fk) REFERENCES sector(id)
);

CREATE TABLE boxx(
    id INT AUTO_INCREMENT,
    numero INT(20),
    nombre VARCHAR(25),
    telefono_id_fk INT,
    equipo_id_fk INT,
    ups_id_fk INT,
    sector_id_fk INT,
    cesfam_id_fk INT,

    PRIMARY KEY(id),
    FOREIGN KEY(telefono_id_fk) REFERENCES telefono(id),
    FOREIGN KEY(equipo_id_fk) REFERENCES equipo(id),
    FOREIGN KEY(ups_id_fk) REFERENCES ups(id),
    FOREIGN KEY(sector_id_fk) REFERENCES sector(id),
    FOREIGN KEY(cesfam_id_fk) REFERENCES cesfam(id)
);
  
--- INSERTS
INSERT INTO usuario VALUES(NULL,'Sebastian','Zuñiga','111-1','123','Cargo 1','sebita490@gmail.com',1);
INSERT INTO modelo VALUES(NULL,'HP 205'),(NULL,'Lenovo 4000');
INSERT INTO marca VALUES(NULL,'1','HP',1),(NULL,'2','Lenovo',2);

INSERT INTO ups(marca,n_de_serie,modelo,estado) VALUES('Powerware','45168135','P301',1),
                                               ('Liebert','42217247','L400',1),
                                               ('Vogar','58919479','V488',1);

INSERT INTO telefono(marca,n_serie,modelo,tipo_tecno,estado) VALUES ('Samsung','75364378','S4','Analogo',1),
                                                                ('Huaweii','42822972','P40','Analogo',1),
                                                                ('LG','35754727','K52','IP',1);



INSERT INTO equipo(tipo_pc,centro_de_costo,n_serie,licencia,estado,responsable,fecha_de_ingreso,marca_id_fk) 
VALUES ('Notebook','CC1','1111','Tiene','Nuevo','Carlos Paredes',NOW(),1),
       ('Escritorio','CC2','2222','Tiene','Nuevo','Sebastian Zuñiga Azocar',NOW(),2),
       ('Notebook','CC3','3333','Tiene','Nuevo','Pedrito',NOW(),2);

INSERT INTO sector(nombre) VALUES('Sector 1'),
                                 ('Sector 2'),
                                 ('Sector 3');


INSERT INTO cesfam(nombre,direccion,telefono,sector_id_fk) VALUES('Cesfam 1','Direccion 1','111',1),
                                                                 ('Cesfam 2','Direccion 2','222',2),
                                                                 ('Cesfam 3','Direccion 3','333',3);



INSERT INTO boxx(numero,nombre,telefono_id_fk,equipo_id_fk,ups_id_fk,sector_id_fk, cesfam_id_fk) VALUES('1','Box 1',1,1,1,1,1),
                                                                                                       ('2','Box 2',2,2,2,2,2),
                                                                                                       ('3','Box 3',3,3,3,3,3);


--SELECT equipo.id, equipo.tipo_pc , equipo.centro_de_costo , equipo.n_serie, equipo.licencia , equipo.estado, equipo.responsable, equipo.fecha_de_ingreso, marca.nombre FROM equipo
--INNER JOIN marca 
--ON equipo.marca_id_fk = marca.id; 


--SELECT marca.id, marca.nombre, modelo.nombre FROM marca 
--INNER JOIN modelo 
--ON marca.modelo_id_fk = modelo.id;


select tipo_pc from equipo where id = 1;

/* SELECT equipo.id, equipo.tipo_pc,equipo.centro_de_costo,equipo.n_serie,equipo.licencia,equipo.estado,equipo.responsable,equipo.fecha_de_ingreso,
marca.nombre_marca, modelo.nombre_modelo FROM modelo 
INNER JOIN equipo 
ON equipo.marca_id_fk = modelo.id
INNER JOIN marca
ON marca.id = modelo.marca_id_fk;
*/
/* 
SELECT equipo.id, equipo.tipo_pc, equipo.responsable, modelo.nombre_modelo, cesfam.nombre AS 'Cesfam'
, boxx.nombre AS 'Box'
, sector.nombre AS 'Sector'
FROM equipo
INNER JOIN modelo
ON modelo.id = equipo.modelo_id_fk
INNER JOIN cesfam
ON cesfam.id = equipo.cesfam_id_fk
INNER JOIN boxx
ON boxx.id = equipo.box_id_fk
INNER JOIN sector
ON sector.id = equipo.sector_id_fk;
*/