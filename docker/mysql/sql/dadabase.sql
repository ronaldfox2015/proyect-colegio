-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `bd_iepmae` DEFAULT CHARACTER SET utf8 ;
USE `bd_iepmae` ;


-- --------------------;
-- / CREAR LAS TABLAS /;
-- --------------------;

CREATE TABLE tb_docente (
	idDocente			INT				NOT NULL AUTO_INCREMENT,
	dniDocente 			VARCHAR 		(8) 	NOT NULL,
			idUsuario				INT				NOT NULL,

	nomDocente			VARCHAR			(30)	NOT NULL,
	apePatDocente			VARCHAR			(30)	NOT NULL,
	apeMatDocente			VARCHAR			(30)	NOT NULL,
	idGenero			TINYINT				NOT NULL,
	fecNacDocente			DATE				NOT NULL,
	idDistrito			INT				NOT NULL,
	direcDocente			VARCHAR			(50)	NOT NULL,
	celDocente			VARCHAR			(30)	NOT NULL,
	telDocente			VARCHAR			(30)	NOT NULL,
	emailDocente			VARCHAR			(80)	NOT NULL,
	estadoDocente			TINYINT				NOT NULL,	
	CONSTRAINT pk_docente PRIMARY KEY (idDocente)
);
CREATE UNIQUE INDEX idx_docente_dni ON tb_docente (dniDocente ASC);

CREATE TABLE tb_apoderado (
	idApoderado			INT				NOT NULL AUTO_INCREMENT,
	dniApoderado 			VARCHAR 		(8) 	NOT NULL,
	nomApoderado			VARCHAR			(30)	NOT NULL,
	apePatApoderado			VARCHAR			(30)	NOT NULL,
	apeMatApoderado			VARCHAR			(30)	NOT NULL,
	idGenero			TINYINT				NOT NULL,
	fecNacApoderado			DATE				NOT NULL,
	idDistrito			INT				NOT NULL,
	direcApoderado			VARCHAR			(50)	NOT NULL,
	celApoderado			VARCHAR			(30)	NOT NULL,
	telApoderado			VARCHAR			(30)	NOT NULL,
	emailApoderado			VARCHAR			(80)	NOT NULL,
	estadoApoderado			TINYINT				NOT NULL,	
	CONSTRAINT pk_apoderado PRIMARY KEY (idApoderado)
);
CREATE UNIQUE INDEX idx_apoderado_dni ON tb_apoderado(dniApoderado ASC);

CREATE TABLE tb_estudiante(
	idEstudiante			INT				NOT NULL AUTO_INCREMENT,
	idApoderado			INT				NOT NULL,
	dniEstudiante			VARCHAR			(8)	NOT NULL,
		idUsuario				INT				NOT NULL,

	nomEstudiante			VARCHAR			(30)	NOT NULL,
	apePatEstudiante		VARCHAR			(30)	NOT NULL,
	apeMatEstudiante		VARCHAR			(30)	NOT NULL,
	idGenero			TINYINT				NOT NULL,
	fotoEstudiante			BLOB				NOT NULL,
	fechaNacEstudiante		DATE				NOT NULL,
	estadoEstudiante		TINYINT				NOT NULL,
	CONSTRAINT pk_estudiante PRIMARY KEY (idEstudiante)
);
CREATE UNIQUE INDEX idx_estudiante_dni ON tb_estudiante(dniEstudiante ASC);

CREATE TABLE tb_distrito(
	idDistrito			INT			NOT NULL AUTO_INCREMENT,
	descripcionDistrito		VARCHAR			(255)	NOT NULL,
    	estadoDistrito			TINYINT				NOT NULL,
	CONSTRAINT pk_distrito PRIMARY KEY (idDistrito)
);

CREATE TABLE tb_informe(
	idInforme			INT				NOT NULL AUTO_INCREMENT,
	idEstudiante			INT				NOT NULL,
	codInforme			VARCHAR			(10)	NOT NULL,
	observaciones			VARCHAR			(300)	NOT NULL,
	fecha				DATE				NOT NULL,
	estadoInforme			TINYINT 			NOT NULL,
	CONSTRAINT pk_informe PRIMARY KEY (idInforme)
);

CREATE TABLE tb_usuario(
	idUsuario			INT				NOT NULL AUTO_INCREMENT,
	nombreUsuario			VARCHAR			(20)	NOT NULL,
	passwordUsuario			VARCHAR			(20)	NOT NULL,
	estadoUsuario			TINYINT				NOT NULL,
	CONSTRAINT pk_usuario PRIMARY KEY (idUsuario)
);
CREATE UNIQUE INDEX idx_usuario_nombre ON tb_usuario(nombreUsuario ASC);

CREATE TABLE tb_rol(
	idRol				INT				NOT NULL AUTO_INCREMENT,
	nombreRol			VARCHAR			(20)	NOT NULL,
	estadoRol			TINYINT				NOT NULL,
	CONSTRAINT pk_rol PRIMARY KEY (idRol)
);
CREATE UNIQUE INDEX idx_rol_nombre ON tb_rol(nombreRol ASC);

CREATE TABLE tb_taller(
	idTaller			INT				NOT NULL AUTO_INCREMENT,
	idEstudiante			INT				NOT NULL,
	idCurso				INT				NOT NULL,
	observaciones			VARCHAR			(300)	NOT NULL,
	fechaTaller			DATE				NOT NULL,
	horaInicio			DATE				NOT NULL,
	horaFinal			DATE				NOT NULL,
	estadoInforme			TINYINT 			NOT NULL,
	CONSTRAINT pk_taller PRIMARY KEY (idTaller)
);


CREATE TABLE tb_genero(
	idGenero	  		TINYINT				NOT NULL AUTO_INCREMENT,
	descripcion		 	VARCHAR			(20)	NOT NULL,
	PRIMARY KEY (`idGenero`)
);

-- CREATE TABLE tb_detalle_taller(
--	idTaller			int				NOT NULL AUTO_INCREMENT,
--	idEstudiante			int				NOT NULL,
--	idCurso				int				NOT NULL,
--	observaciones			VARCHAR			(300)	NOT NULL,
--	fechaTaller			DATE				NOT NULL,
--	horaInicio			DATE				NOT NULL,
--	horaFinal			DATE				NOT NULL,
--	estadoInforme			tinyInt 			NOT NULL,
--	CONSTRAINT pk_taller PRIMARY KEY (idTaller)
-- );


CREATE TABLE tb_tema(
	idTema				INT				NOT NULL AUTO_INCREMENT,
	idCurso				INT				NOT NULL,
    	observacion			VARCHAR			(255)	NOT NULL,
    	estado				TINYINT				NOT NULL,
	CONSTRAINT pk_tema PRIMARY KEY (idTema)
);


CREATE TABLE tb_curso(
	idCurso 			INT				NOT NULL AUTO_INCREMENT,
	idDocente 			INT				NOT NULL,
	descripcionCurso  		VARCHAR			(50)	NOT NULL,
	CONSTRAINT pk_curso PRIMARY KEY (idCurso)
);


-- ------------------------CREAR RESTRICCIONES (FK);
-- 01 Apoderado;
ALTER TABLE tb_apoderado
ADD CONSTRAINT fk_apoderado_distrito
FOREIGN KEY	(idDistrito)
REFERENCES tb_distrito(idDistrito);

ALTER TABLE tb_apoderado
ADD CONSTRAINT fk_apoderado_genero
FOREIGN KEY	(idGenero)
REFERENCES tb_genero(idGenero);

-- 02 Estudiante;
ALTER TABLE tb_estudiante
ADD CONSTRAINT fk_estudiante_apoderado
FOREIGN KEY	(idApoderado)
REFERENCES tb_apoderado(idApoderado);

ALTER TABLE tb_estudiante
ADD CONSTRAINT fk_estudiante_usuario
FOREIGN KEY	(idUsuario)
REFERENCES tb_usuario(idUsuario);

-- 03 Docente
ALTER TABLE tb_docente
ADD CONSTRAINT fk_docente_usuario
FOREIGN KEY	(idUsuario)
REFERENCES tb_usuario(idUsuario);

