
CREATE DATABASE IF NOT EXISTS `proytkd`;
USE `proytkd` ;

CREATE TABLE IF NOT EXISTS `administrador` (
  `idAdministrador` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido` VARCHAR(45) NOT NULL,
  `correo` VARCHAR(45) NOT NULL,
  `clave` VARCHAR(255) NOT NULL,
  `estado` ENUM('activo', 'retirado', 'sancionado') NOT NULL,
  `telefono` VARCHAR(15) NULL,
  `imagen` VARCHAR(255) NOT NULL,
  `fechaNac` DATE NOT NULL,
  PRIMARY KEY (`idAdministrador`));

CREATE TABLE IF NOT EXISTS `pais` (
  `idPais` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idPais`));
  
CREATE TABLE IF NOT EXISTS `ciudad` (
  `idCiudad` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `Pais_idPais` INT NOT NULL,
  PRIMARY KEY (`idCiudad`), 
  CONSTRAINT `fk_Ciudad_Pais1`
    FOREIGN KEY (`Pais_idPais`)
    REFERENCES `proytkd`.`pais` (`idPais`));

CREATE TABLE IF NOT EXISTS `curso` (
  `idCurso` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idCurso`));

CREATE TABLE IF NOT EXISTS `grado` (
  `idGrado` INT NOT NULL AUTO_INCREMENT,
  `grado` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idGrado`));

CREATE TABLE IF NOT EXISTS `estudiante` (
  `idEstudiante` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido` VARCHAR(45) NOT NULL,
  `correo` VARCHAR(45) NOT NULL,
  `clave` VARCHAR(255) NOT NULL,
  `Grado_idGrado` INT NOT NULL,
  `estado` ENUM('activo', 'retirado', 'sancionado') NOT NULL,
  `fechaNac` DATE NOT NULL,
  `imagen` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idEstudiante`),
  CONSTRAINT `fk_Estudiante_Grado`
    FOREIGN KEY (`Grado_idGrado`)
    REFERENCES `proytkd`.`grado` (`idGrado`));

CREATE TABLE IF NOT EXISTS `evento` (
  `idEvento` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `fecha` DATETIME NOT NULL,
  `descripcion` TEXT NULL DEFAULT NULL,
  `Ciudad_idCiudad` INT NOT NULL,
  PRIMARY KEY (`idEvento`),
  CONSTRAINT `fk_Evento_Ciudad1`
    FOREIGN KEY (`Ciudad_idCiudad`)
    REFERENCES `proytkd`.`ciudad` (`idCiudad`));

CREATE TABLE IF NOT EXISTS `auditoriaAdminCurso` (
  `idAuditoriaAdminCurso` INT NOT NULL AUTO_INCREMENT,
  `Administrador_idAdministrador` INT NOT NULL,
  `Curso_idCurso` INT NOT NULL,
  `accion` ENUM('crear', 'gestionar') NOT NULL,
  `fechaHora` DATETIME NOT NULL,
  `detalleAnterior` TEXT NOT NULL,
  PRIMARY KEY (`idAuditoriaAdminCurso`),
  CONSTRAINT `fk_Administrador_has_Curso_Administrador1`
    FOREIGN KEY (`Administrador_idAdministrador`)
    REFERENCES `proytkd`.`administrador` (`idAdministrador`),
  CONSTRAINT `fk_Administrador_has_Curso_Curso1`
    FOREIGN KEY (`Curso_idCurso`)
    REFERENCES `proytkd`.`curso` (`idCurso`));

CREATE TABLE IF NOT EXISTS `auditoriaAdminEvento` (
  `idAuditoriaAdminEvento` INT NOT NULL AUTO_INCREMENT,
  `Administrador_idAdministrador` INT NOT NULL,
  `Evento_idEvento` INT NOT NULL,
  `accion` ENUM('crear', 'gestionar', 'eliminar') NOT NULL,
  `fechaHora` DATETIME NOT NULL,
  `detalleAnterior` TEXT NOT NULL,
  PRIMARY KEY (`idAuditoriaAdminEvento`),
  CONSTRAINT `fk_Administrador_has_Evento_Administrador1`
    FOREIGN KEY (`Administrador_idAdministrador`)
    REFERENCES `proytkd`.`administrador` (`idAdministrador`),
  CONSTRAINT `fk_Administrador_has_Evento_Evento1`
    FOREIGN KEY (`Evento_idEvento`)
    REFERENCES `proytkd`.`evento` (`idEvento`));

CREATE TABLE IF NOT EXISTS `matriculacurso` (
  `Curso_idCurso` INT NOT NULL,
  `Estudiante_idEstudiante` INT NOT NULL,
  `fecha` DATETIME NOT NULL,
  PRIMARY KEY (`Curso_idCurso`, `Estudiante_idEstudiante`),
  CONSTRAINT `fk_Curso_has_Estudiante_Curso1`
    FOREIGN KEY (`Curso_idCurso`)
    REFERENCES `proytkd`.`curso` (`idCurso`),
  CONSTRAINT `fk_Curso_has_Estudiante_Estudiante1`
    FOREIGN KEY (`Estudiante_idEstudiante`)
    REFERENCES `proytkd`.`estudiante` (`idEstudiante`));

CREATE TABLE IF NOT EXISTS `profesor` (
  `idProfesor` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido` VARCHAR(45) NOT NULL,
  `correo` VARCHAR(45) NOT NULL,
  `clave` VARCHAR(255) NOT NULL,
  `estado` ENUM('activo', 'inactivo') NOT NULL,
  `telefono` VARCHAR(15) NULL,
  `imagen` VARCHAR(255) NOT NULL,
  `fechaNac` DATE NOT NULL,
  PRIMARY KEY (`idProfesor`));

CREATE TABLE IF NOT EXISTS `participacion` (
  `Profesor_idProfesor` INT NOT NULL,
  `Curso_idCurso` INT NOT NULL,
  `rolProfesor` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Profesor_idProfesor`, `Curso_idCurso`),
  CONSTRAINT `fk_Profesor_has_Curso_Curso1`
    FOREIGN KEY (`Curso_idCurso`)
    REFERENCES `proytkd`.`curso` (`idCurso`),
  CONSTRAINT `fk_Profesor_has_Curso_Profesor1`
    FOREIGN KEY (`Profesor_idProfesor`)
    REFERENCES `proytkd`.`profesor` (`idProfesor`));

CREATE TABLE IF NOT EXISTS `subcurso` (
  `idSubcurso` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `Curso_idCurso` INT NOT NULL,
  PRIMARY KEY (`idSubcurso`),
  CONSTRAINT `fk_Subcurso_Curso1`
    FOREIGN KEY (`Curso_idCurso`)
    REFERENCES `proytkd`.`curso` (`idCurso`));

CREATE TABLE IF NOT EXISTS `pregunta` (
  `idPregunta` INT NOT NULL AUTO_INCREMENT,
  `pregunta` VARCHAR(45) NOT NULL,
  `Subcurso_idSubcurso` INT NOT NULL,
  `respuesta` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idPregunta`),
  CONSTRAINT `fk_Pregunta_Subcurso1`
    FOREIGN KEY (`Subcurso_idSubcurso`)
    REFERENCES `proytkd`.`subcurso` (`idSubcurso`));

CREATE TABLE IF NOT EXISTS `progreso_subcurso` (
  `idtomarSubcurso` INT NOT NULL AUTO_INCREMENT,
  `puntaje` VARCHAR(45) NOT NULL,
  `Subcurso_idSubcurso` INT NOT NULL,
  `MatriculaCurso_Curso_idCurso` INT NOT NULL,
  `MatriculaCurso_Estudiante_idEstudiante` INT NOT NULL,
  PRIMARY KEY (`idtomarSubcurso`),
  CONSTRAINT `fk_tomarSubcurso_MatriculaCurso1`
    FOREIGN KEY (`MatriculaCurso_Curso_idCurso` , `MatriculaCurso_Estudiante_idEstudiante`)
    REFERENCES `proytkd`.`matriculacurso` (`Curso_idCurso` , `Estudiante_idEstudiante`),
  CONSTRAINT `fk_tomarSubcurso_Subcurso1`
    FOREIGN KEY (`Subcurso_idSubcurso`)
    REFERENCES `proytkd`.`subcurso` (`idSubcurso`));

CREATE TABLE IF NOT EXISTS `participacion_profesor` (
  `profesor_idProfesor` INT NOT NULL,
  `evento_idEvento` INT NOT NULL,
  PRIMARY KEY (`profesor_idProfesor`, `evento_idEvento`),
  CONSTRAINT `fk_profesor_has_evento_profesor1`
    FOREIGN KEY (`profesor_idProfesor`)
    REFERENCES `proytkd`.`profesor` (`idProfesor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_profesor_has_evento_evento1`
    FOREIGN KEY (`evento_idEvento`)
    REFERENCES `proytkd`.`evento` (`idEvento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE IF NOT EXISTS `participacion_estudiante` (
  `estudiante_idEstudiante` INT NOT NULL,
  `evento_idEvento` INT NOT NULL,
  PRIMARY KEY (`estudiante_idEstudiante`, `evento_idEvento`),
  CONSTRAINT `fk_estudiante_has_evento_estudiante1`
    FOREIGN KEY (`estudiante_idEstudiante`)
    REFERENCES `proytkd`.`estudiante` (`idEstudiante`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_estudiante_has_evento_evento1`
    FOREIGN KEY (`evento_idEvento`)
    REFERENCES `proytkd`.`evento` (`idEvento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE IF NOT EXISTS `usuario_temporal` (
  `idUsuario_temporal` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido` VARCHAR(45) NOT NULL,
  `correo` VARCHAR(45) NOT NULL,
  `clave` VARCHAR(255) NOT NULL,
  `rol` ENUM('profesor', 'estudiante') NOT NULL,
  `Grado_idGrado` INT NULL,
  `estado` ENUM('pendiente', 'denegado', 'permitido') NOT NULL,
  `fechaNac` DATE NOT NULL,
  PRIMARY KEY (`idUsuario_temporal`),
  CONSTRAINT `fk_Estudiante_Grado0`
    FOREIGN KEY (`Grado_idGrado`)
    REFERENCES `proytkd`.`grado` (`idGrado`));

CREATE TABLE IF NOT EXISTS `codigo_verificacion` (
  `idCodigo_verificacion` INT NOT NULL AUTO_INCREMENT,
  `codigo` VARCHAR(45) NOT NULL,
  `idUser` INT NOT NULL,
  `estado` ENUM('activo', 'inactivo') NOT NULL,
  `fecha_creado` DATETIME NOT NULL,
  `fecha_expirado` DATETIME NOT NULL,
  PRIMARY KEY (`idCodigo_verificacion`),
  CONSTRAINT `fk_codigo_verificacion_usuario_temporal1`
    FOREIGN KEY (`idUser`)
    REFERENCES `proytkd`.`usuario_temporal` (`idUsuario_temporal`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);