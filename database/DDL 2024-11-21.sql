-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema proytkd
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema proytkd
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `proytkd` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `proytkd` ;

-- -----------------------------------------------------
-- Table `proytkd`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proytkd`.`usuario` (
  `idUsuario_temporal` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido` VARCHAR(45) NOT NULL,
  `correo` VARCHAR(45) NOT NULL,
  `clave` VARCHAR(255) NOT NULL,
  `estado_registro` ENUM('pendiente', 'denegado', 'permitido') NOT NULL,
  `fechaNac` DATE NOT NULL,
  `telefono` VARCHAR(15) NULL DEFAULT NULL,
  PRIMARY KEY (`idUsuario_temporal`),
  UNIQUE INDEX `idx_correo` (`correo` ASC) VISIBLE)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `proytkd`.`administrador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proytkd`.`administrador` (
  `idAdministrador` INT NOT NULL AUTO_INCREMENT,
  `estado` ENUM('activo', 'inactivo') NOT NULL,
  `imagen` VARCHAR(255) NULL DEFAULT NULL,
  `usuario_temporal_idUsuario_temporal` INT NOT NULL,
  PRIMARY KEY (`idAdministrador`, `usuario_temporal_idUsuario_temporal`),
  INDEX `fk_administrador_usuario_temporal1_idx` (`usuario_temporal_idUsuario_temporal` ASC) VISIBLE,
  CONSTRAINT `fk_administrador_usuario_temporal1`
    FOREIGN KEY (`usuario_temporal_idUsuario_temporal`)
    REFERENCES `proytkd`.`usuario` (`idUsuario_temporal`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `proytkd`.`pais`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proytkd`.`pais` (
  `idPais` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idPais`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `proytkd`.`ciudad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proytkd`.`ciudad` (
  `idCiudad` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `Pais_idPais` INT NOT NULL,
  PRIMARY KEY (`idCiudad`),
  INDEX `fk_Ciudad_Pais1` (`Pais_idPais` ASC) VISIBLE,
  CONSTRAINT `fk_Ciudad_Pais1`
    FOREIGN KEY (`Pais_idPais`)
    REFERENCES `proytkd`.`pais` (`idPais`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `proytkd`.`evento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proytkd`.`evento` (
  `idEvento` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `descripcion` TEXT NULL DEFAULT NULL,
  `Ciudad_idCiudad` INT NOT NULL,
  `estado` ENUM('VENCIDO', 'DISPONIBLE') NOT NULL,
  `precio` DECIMAL(15,3) NOT NULL,
  `fecha_inicio` DATETIME NOT NULL,
  `fecha_fin` DATETIME NOT NULL,
  PRIMARY KEY (`idEvento`),
  INDEX `fk_Evento_Ciudad1` (`Ciudad_idCiudad` ASC) VISIBLE,
  INDEX `idx_estado` (`estado` ASC) VISIBLE,
  INDEX `idx_fecha` (`fecha_inicio` ASC, `fecha_fin` ASC) VISIBLE,
  CONSTRAINT `fk_Evento_Ciudad1`
    FOREIGN KEY (`Ciudad_idCiudad`)
    REFERENCES `proytkd`.`ciudad` (`idCiudad`)
    ON DELETE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 1003
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `proytkd`.`auditoria_admin_evento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proytkd`.`auditoria_admin_evento` (
  `idAuditoriaAdminEvento` INT NOT NULL AUTO_INCREMENT,
  `Administrador_idAdministrador` INT NOT NULL,
  `Evento_idEvento` INT NOT NULL,
  `accion` ENUM('crear', 'gestionar', 'eliminar') NOT NULL,
  `fechaHora` DATETIME NOT NULL,
  `detalleAnterior` TEXT NOT NULL,
  PRIMARY KEY (`idAuditoriaAdminEvento`),
  INDEX `fk_Administrador_Evento1` (`Administrador_idAdministrador` ASC) VISIBLE,
  INDEX `fk_Evento_Evento1` (`Evento_idEvento` ASC) VISIBLE,
  CONSTRAINT `fk_Administrador_Evento1`
    FOREIGN KEY (`Administrador_idAdministrador`)
    REFERENCES `proytkd`.`administrador` (`idAdministrador`),
  CONSTRAINT `fk_Evento_Evento1`
    FOREIGN KEY (`Evento_idEvento`)
    REFERENCES `proytkd`.`evento` (`idEvento`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `proytkd`.`codigo_verificacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proytkd`.`codigo_verificacion` (
  `idCodigo_verificacion` INT NOT NULL AUTO_INCREMENT,
  `codigo` VARCHAR(45) NOT NULL,
  `estado` ENUM('valido', 'invalido') NOT NULL,
  `fecha_creado` DATETIME NOT NULL,
  `fecha_expirado` DATETIME NOT NULL,
  `idUser` INT NOT NULL,
  PRIMARY KEY (`idCodigo_verificacion`),
  INDEX `fk_codigo_verificacion_usuario_temporal1_idx` (`idUser` ASC) VISIBLE,
  CONSTRAINT `fk_codigo_verificacion_usuario_temporal1`
    FOREIGN KEY (`idUser`)
    REFERENCES `proytkd`.`usuario` (`idUsuario_temporal`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `proytkd`.`curso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proytkd`.`curso` (
  `idCurso` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idCurso`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `proytkd`.`grado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proytkd`.`grado` (
  `idGrado` INT NOT NULL AUTO_INCREMENT,
  `grado` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idGrado`))
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `proytkd`.`estudiante`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proytkd`.`estudiante` (
  `idEstudiante` INT NOT NULL AUTO_INCREMENT,
  `Grado_idGrado` INT NOT NULL,
  `estado` ENUM('activo', 'retirado', 'sancionado') NOT NULL,
  `imagen` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`idEstudiante`),
  INDEX `fk_Estudiante_Grado` (`Grado_idGrado` ASC) VISIBLE,
  INDEX `fk_estudiante_usuario_temporal1_idx` (`idEstudiante` ASC) VISIBLE,
  CONSTRAINT `fk_Estudiante_Grado`
    FOREIGN KEY (`Grado_idGrado`)
    REFERENCES `proytkd`.`grado` (`idGrado`),
  CONSTRAINT `fk_estudiante_usuario_temporal1`
    FOREIGN KEY (`idEstudiante`)
    REFERENCES `proytkd`.`usuario` (`idUsuario_temporal`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `proytkd`.`galeria_evento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proytkd`.`galeria_evento` (
  `idGaleria_Evento` INT NOT NULL AUTO_INCREMENT,
  `imagen` VARCHAR(255) NOT NULL,
  `idEvento` INT NOT NULL,
  PRIMARY KEY (`idGaleria_Evento`),
  INDEX `idEvento` (`idEvento` ASC) VISIBLE,
  CONSTRAINT `galeria_evento_ibfk_1`
    FOREIGN KEY (`idEvento`)
    REFERENCES `proytkd`.`evento` (`idEvento`))
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `proytkd`.`participacion_estudiante_evento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proytkd`.`participacion_estudiante_evento` (
  `evento_idEvento` INT NOT NULL,
  `estudiante_idEstudiante1` INT NOT NULL,
  PRIMARY KEY (`evento_idEvento`, `estudiante_idEstudiante1`),
  INDEX `fk_estudiante_has_evento_evento1` (`evento_idEvento` ASC) VISIBLE,
  INDEX `fk_participacion_estudiante_evento_estudiante1_idx` (`estudiante_idEstudiante1` ASC) VISIBLE,
  CONSTRAINT `fk_estudiante_has_evento_evento1`
    FOREIGN KEY (`evento_idEvento`)
    REFERENCES `proytkd`.`evento` (`idEvento`),
  CONSTRAINT `fk_participacion_estudiante_evento_estudiante1`
    FOREIGN KEY (`estudiante_idEstudiante1`)
    REFERENCES `proytkd`.`estudiante` (`idEstudiante`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `proytkd`.`participacion_profesor_curso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proytkd`.`participacion_profesor_curso` (
  `Profesor_idProfesor` INT NOT NULL,
  `Curso_idCurso` INT NOT NULL,
  `rolProfesor` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Profesor_idProfesor`, `Curso_idCurso`),
  INDEX `fk_Profesor_has_Curso_Curso1` (`Curso_idCurso` ASC) VISIBLE,
  CONSTRAINT `fk_Profesor_has_Curso_Curso1`
    FOREIGN KEY (`Curso_idCurso`)
    REFERENCES `proytkd`.`curso` (`idCurso`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `proytkd`.`profesor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proytkd`.`profesor` (
  `idProfesor` INT NOT NULL AUTO_INCREMENT,
  `estado` ENUM('activo', 'inactivo') NOT NULL,
  `imagen` VARCHAR(255) NULL DEFAULT NULL,
  `usuario_temporal_idUsuario_temporal` INT NOT NULL,
  PRIMARY KEY (`idProfesor`, `usuario_temporal_idUsuario_temporal`),
  INDEX `fk_profesor_usuario_temporal1_idx` (`usuario_temporal_idUsuario_temporal` ASC) VISIBLE,
  CONSTRAINT `fk_profesor_usuario_temporal1`
    FOREIGN KEY (`usuario_temporal_idUsuario_temporal`)
    REFERENCES `proytkd`.`usuario` (`idUsuario_temporal`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `proytkd`.`participacion_profesor_evento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proytkd`.`participacion_profesor_evento` (
  `evento_idEvento` INT NOT NULL,
  `profesor_idProfesor` INT NOT NULL,
  PRIMARY KEY (`evento_idEvento`, `profesor_idProfesor`),
  INDEX `fk_profesor_has_evento_evento1` (`evento_idEvento` ASC) VISIBLE,
  INDEX `fk_participacion_profesor_evento_profesor1_idx` (`profesor_idProfesor` ASC) VISIBLE,
  CONSTRAINT `fk_profesor_has_evento_evento1`
    FOREIGN KEY (`evento_idEvento`)
    REFERENCES `proytkd`.`evento` (`idEvento`),
  CONSTRAINT `fk_participacion_profesor_evento_profesor1`
    FOREIGN KEY (`profesor_idProfesor`)
    REFERENCES `proytkd`.`profesor` (`idProfesor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `proytkd`.`nivel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proytkd`.`nivel` (
  `idNivel` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `Curso_idCurso` INT NOT NULL,
  PRIMARY KEY (`idNivel`),
  INDEX `fk_Subcurso_Curso1` (`Curso_idCurso` ASC) VISIBLE,
  CONSTRAINT `fk_Subcurso_Curso1`
    FOREIGN KEY (`Curso_idCurso`)
    REFERENCES `proytkd`.`curso` (`idCurso`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `proytkd`.`pregunta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proytkd`.`pregunta` (
  `idPregunta` INT NOT NULL AUTO_INCREMENT,
  `pregunta` VARCHAR(45) NOT NULL,
  `Subcurso_idSubcurso` INT NOT NULL,
  `respuesta` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idPregunta`),
  INDEX `fk_Pregunta_Subcurso1` (`Subcurso_idSubcurso` ASC) VISIBLE,
  CONSTRAINT `fk_Pregunta_Subcurso1`
    FOREIGN KEY (`Subcurso_idSubcurso`)
    REFERENCES `proytkd`.`nivel` (`idNivel`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `proytkd`.`respuesta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proytkd`.`respuesta` (
  `idRespuesta` INT NOT NULL AUTO_INCREMENT,
  `es_correcta` TINYINT NOT NULL,
  `texto_respuesta` TEXT NOT NULL,
  `pregunta_idPregunta` INT NOT NULL,
  PRIMARY KEY (`idRespuesta`),
  INDEX `fk_respuesta_pregunta1_idx` (`pregunta_idPregunta` ASC) VISIBLE,
  CONSTRAINT `fk_respuesta_pregunta1`
    FOREIGN KEY (`pregunta_idPregunta`)
    REFERENCES `proytkd`.`pregunta` (`idPregunta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proytkd`.`historial`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proytkd`.`historial` (
  `idHistorial` INT NOT NULL AUTO_INCREMENT,
  `puntaje` INT NOT NULL,
  `pregunta_idPregunta` INT NOT NULL,
  `es_correcta` TINYINT NOT NULL,
  `idRespuesta_marcada` INT NOT NULL,
  `nivel_idSubcurso` INT NOT NULL,
  `estudiante_idEstudiante` INT NOT NULL,
  PRIMARY KEY (`idHistorial`),
  INDEX `fk_historial_pregunta1_idx` (`pregunta_idPregunta` ASC) VISIBLE,
  INDEX `fk_historial_respuesta1_idx` (`idRespuesta_marcada` ASC) VISIBLE,
  INDEX `fk_historial_nivel1_idx` (`nivel_idSubcurso` ASC) VISIBLE,
  INDEX `fk_historial_estudiante1_idx` (`estudiante_idEstudiante` ASC) VISIBLE,
  CONSTRAINT `fk_historial_pregunta1`
    FOREIGN KEY (`pregunta_idPregunta`)
    REFERENCES `proytkd`.`pregunta` (`idPregunta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_historial_respuesta1`
    FOREIGN KEY (`idRespuesta_marcada`)
    REFERENCES `proytkd`.`respuesta` (`idRespuesta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_historial_nivel1`
    FOREIGN KEY (`nivel_idSubcurso`)
    REFERENCES `proytkd`.`nivel` (`idNivel`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_historial_estudiante1`
    FOREIGN KEY (`estudiante_idEstudiante`)
    REFERENCES `proytkd`.`estudiante` (`idEstudiante`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
