CREATE DATABASE ejemplo;

USE ejemplo;
SELECT * FROM usuario WHERE nomemp = 'dsdsddsds';
DESC registro;
INSERT  INTO `usuario`(`idusuario`,`nomemp`,`apeemp`,`tipdoc`,`documento`,`direccion`,`telefono`,`ciudad`,`barrio`,`tipologia`,`observacion`,`coremp`,`conemp`,`rol`,`estado`) VALUES 
(0,'NA','NA','T',2147483647,'CA',2147483647,73449,2103,'MM','NA','carlos@gm2ail.com','123452',1,'ACT');
SHOW TRIGGERS;
INSERT INTO `usuario`(`nomemp`,`apeemp`,`tipdoc`,`documento`,`direccion`,`telefono`,`ciudad`,`barrio`,`tipologia`,`observacion`,`coremp`,`conemp`,`rol`,`estado`) VALUES 
('dsdsddsds','Moreno Gomez','T',2147483647,'CA',2147483647,73449,2103,'MM','NA','carlos@gm2ail.com','827ccb0eea8a706c4c34a16891f84e7b',2,'ACT');
SELECT * FROM registro;
DELETE FROM usuario;
SELECT * FROM usuario;

INSERT INTO registro(fecha_creacion, fecha_modificacion, usuario_creacion, usuario_modificacion) VALUES('2024-02-09', '2024-02-09', 'dsdsd', 'dsdsd');
CREATE TABLE `usuario` (
  `idusuario` INT(11) NOT NULL AUTO_INCREMENT,
  `nomemp` VARCHAR(40) NOT NULL,
  `apeemp` varchar(50) NOT NULL,
  `tipdoc` char(1) NOT NULL,
  `documento` int(11) NOT NULL,
  `direccion` varchar(70) NOT NULL,
  `telefono` int(11) NOT NULL,
  `ciudad` int(11) NOT NULL,
  `barrio` int(11) NOT NULL,
  `tipologia` varchar(20) NOT NULL,
  `observacion` varchar(8) NOT NULL,
  `coremp` varchar(30) NOT NULL,
  `conemp` varchar(50) NOT NULL,
  `rol` int(11) NOT NULL,
  `estado` enum('ACT','INA') NOT NULL,
  PRIMARY KEY (`idusuario`),
  KEY `rol` (`rol`),
  KEY `ciudad` (`ciudad`),
  KEY `barrio` (`barrio`),
  KEY `tipologia` (`tipologia`),
  KEY `tipdoc` (`tipdoc`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `rol` (`idrol`),
  CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`ciudad`) REFERENCES `ciudad` (`idciudad`),
  CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`barrio`) REFERENCES `barrio` (`idbarrio`),
  CONSTRAINT `usuario_ibfk_4` FOREIGN KEY (`tipologia`) REFERENCES `tipologia` (`abreviatura`),
  CONSTRAINT `usuario_ibfk_5` FOREIGN KEY (`tipdoc`) REFERENCES `tipodoc` (`nomtip`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

select * from rol;
SELECT idusuario FROM usuario WHERE documento = 2147483647;
select * from usuario where documento = '';

insert into rol(descripcion, estado) values ('admin', 'ACT');

select * from registro;
create TABLE `registro` (
  `idregistro` int(11) primary key AUTO_INCREMENT,
  `fecha_creacion` date,
  `fecha_modificacion` date,
  usuario_creacion int,
  usuario_modificacion int,
  usuario_modificado int,
  estado ENUM('ACT','INA'),
  foreign key (usuario_creacion) references usuario(idusuario),
  FOREIGN KEY (usuario_modificacion) REFERENCES usuario(idusuario),
  FOREIGN KEY (usuario_modificado) REFERENCES usuario(idusuario)
);
select * from usuario where documento = 12345;
DELIMITER $$
CREATE
    /*[DEFINER = { user | CURRENT_USER }]*/
    drop TRIGGER`registro` AFTER INSERT
    ON usuario
    FOR EACH ROW BEGIN
	INSERT INTO registro(fecha_creacion, fecha_modificacion, usuario_creacion, usuario_modificacion,estado) 
	VALUES (CURDATE(), CURDATE(), concat(NEW.nomemp," ",NEW.apeemp), NEW.nomemp, NEW.estado);
    END$$
DELIMITER;
INSERT INTO registro(usuario_creacion, usuario_modificacion, usuario_modificado) VALUES(88,88,91);
select * from registro;
SELECT idusuario FROM usuario ORDER BY idusuario DESC LIMIT 1
           INSERT INTO registro(fecha_creacion, fecha_modificacion, usuario_creacion, usuario_modificacion, usuario_modificado, estado) 
           VALUES (curdate(),curdate(), 73,73,74, "ACT");
select * from usuario;
UPDATE registro SET fecha_modificacion = curdate(), usuario_modificacion = 100 WHERE usuario_modificado = 114;
select * from registro where usuario_modificado = 111;
select fecha_modificacion, usuario_modificacion from registro where usuario_modificado = 111;
update registro set fecha_modificacion = ?, usuario_modificacion = ? where 111;