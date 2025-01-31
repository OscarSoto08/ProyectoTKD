-- -----------------------------------------------------
-- Schema proytkd
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema proytkd
-- -----------------------------------------------------
USE `proytkd` ;

-- -----------------------------------------------------
-- Table `proytkd`.`tipo_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proytkd`.`tipo_usuario` (
  `idTipo_usuario` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTipo_usuario`))
;


-- -----------------------------------------------------
-- Table `proytkd`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proytkd`.`usuario` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido` VARCHAR(45) NOT NULL,
  `correo` VARCHAR(45) NOT NULL,
  `clave` VARCHAR(255) NOT NULL,
  `estado_registro` ENUM('pendiente', 'denegado', 'permitido') NOT NULL,
  `fecha_nacimiento` DATE NOT NULL,
  `telefono` VARCHAR(15) NULL DEFAULT NULL,
  `imagen` VARCHAR(255) NULL,
  `idTipo_usuario` INT NOT NULL,
  PRIMARY KEY (`idUsuario`),
  CONSTRAINT `fk_usuario_tipo_usuario1`
    FOREIGN KEY (`idTipo_usuario`)
    REFERENCES `proytkd`.`tipo_usuario` (`idTipo_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)

AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb4
;


-- -----------------------------------------------------
-- Table `proytkd`.`administrador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proytkd`.`administrador` (
  `idAdministrador` INT NOT NULL AUTO_INCREMENT,
  `estado` ENUM('activo', 'inactivo') NOT NULL,
  PRIMARY KEY (`idAdministrador`),
  CONSTRAINT `fk_administrador_usuario_temporal1`
    FOREIGN KEY (`idAdministrador`)
    REFERENCES `proytkd`.`usuario` (`idUsuario`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)

AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8mb4
;


-- -----------------------------------------------------
-- Table `proytkd`.`pais`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proytkd`.`pais` (
  `idPais` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idPais`))

AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8mb4
;


-- -----------------------------------------------------
-- Table `proytkd`.`ciudad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proytkd`.`ciudad` (
  `idCiudad` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `Pais_idPais` INT NOT NULL,
  PRIMARY KEY (`idCiudad`),
  CONSTRAINT `fk_Ciudad_Pais1`
    FOREIGN KEY (`Pais_idPais`)
    REFERENCES `proytkd`.`pais` (`idPais`))

AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8mb4
;


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
  CONSTRAINT `fk_Evento_Ciudad1`
    FOREIGN KEY (`Ciudad_idCiudad`)
    REFERENCES `proytkd`.`ciudad` (`idCiudad`)
    ON DELETE CASCADE)

AUTO_INCREMENT = 1003
DEFAULT CHARACTER SET = utf8mb4
;


-- -----------------------------------------------------
-- Table `proytkd`.`auditoria_admin_evento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proytkd`.`auditoria_admin_evento` (
  `idAuditoriaAdminEvento` INT NOT NULL AUTO_INCREMENT,
  `administrador_idAdministrador` INT NOT NULL,
  `Evento_idEvento` INT NOT NULL,
  `accion` ENUM('crear', 'gestionar', 'eliminar') NOT NULL,
  `fechaHora` DATETIME NOT NULL,
  `detalleAnterior` TEXT NOT NULL,
  PRIMARY KEY (`idAuditoriaAdminEvento`),
  CONSTRAINT `fk_Evento_Evento1`
    FOREIGN KEY (`Evento_idEvento`)
    REFERENCES `proytkd`.`evento` (`idEvento`),
  CONSTRAINT `fk_auditoria_admin_evento_administrador1`
    FOREIGN KEY (`administrador_idAdministrador`)
    REFERENCES `proytkd`.`administrador` (`idAdministrador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)

DEFAULT CHARACTER SET = utf8mb4
;


-- -----------------------------------------------------
-- Table `proytkd`.`codigo_verificacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proytkd`.`codigo_verificacion` (
  `idCodigo_verificacion` INT NOT NULL AUTO_INCREMENT,
  `contenido_codigo` VARCHAR(45) NOT NULL,
  `estado` ENUM('valido', 'invalido') NOT NULL,
  `fecha_creado` DATETIME NOT NULL,
  `fecha_expirado` DATETIME NOT NULL,
  `idUsuario` INT NOT NULL,
  PRIMARY KEY (`idCodigo_verificacion`),
  CONSTRAINT `fk_codigo_verificacion_usuario_temporal1`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `proytkd`.`usuario` (`idUsuario`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)

DEFAULT CHARACTER SET = utf8mb4
;


-- -----------------------------------------------------
-- Table `proytkd`.`curso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proytkd`.`curso` (
  `idCurso` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idCurso`))

DEFAULT CHARACTER SET = utf8mb4
;


-- -----------------------------------------------------
-- Table `proytkd`.`grado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proytkd`.`grado` (
  `idGrado` INT NOT NULL AUTO_INCREMENT,
  `grado` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idGrado`))

AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = utf8mb4
;


-- -----------------------------------------------------
-- Table `proytkd`.`estudiante`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proytkd`.`estudiante` (
  `idEstudiante` INT NOT NULL AUTO_INCREMENT,
  `Grado_idGrado` INT NOT NULL,
  `estado` ENUM('activo', 'retirado', 'sancionado') NOT NULL,
  PRIMARY KEY (`idEstudiante`),
  CONSTRAINT `fk_Estudiante_Grado`
    FOREIGN KEY (`Grado_idGrado`)
    REFERENCES `proytkd`.`grado` (`idGrado`),
  CONSTRAINT `fk_estudiante_usuario_temporal1`
    FOREIGN KEY (`idEstudiante`)
    REFERENCES `proytkd`.`usuario` (`idUsuario`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)

AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8mb4
;


-- -----------------------------------------------------
-- Table `proytkd`.`galeria_evento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proytkd`.`galeria_evento` (
  `idGaleria_Evento` INT NOT NULL AUTO_INCREMENT,
  `imagen` VARCHAR(255) NOT NULL,
  `idEvento` INT NOT NULL,
  PRIMARY KEY (`idGaleria_Evento`),
  CONSTRAINT `galeria_evento_ibfk_1`
    FOREIGN KEY (`idEvento`)
    REFERENCES `proytkd`.`evento` (`idEvento`))

AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = utf8mb4
;


-- -----------------------------------------------------
-- Table `proytkd`.`participacion_estudiante_evento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proytkd`.`participacion_estudiante_evento` (
  `evento_idEvento` INT NOT NULL,
  `estudiante_idEstudiante1` INT NOT NULL,
  PRIMARY KEY (`evento_idEvento`, `estudiante_idEstudiante1`),
  CONSTRAINT `fk_estudiante_has_evento_evento1`
    FOREIGN KEY (`evento_idEvento`)
    REFERENCES `proytkd`.`evento` (`idEvento`),
  CONSTRAINT `fk_participacion_estudiante_evento_estudiante1`
    FOREIGN KEY (`estudiante_idEstudiante1`)
    REFERENCES `proytkd`.`estudiante` (`idEstudiante`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)

DEFAULT CHARACTER SET = utf8mb4
;


-- -----------------------------------------------------
-- Table `proytkd`.`participacion_profesor_curso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proytkd`.`participacion_profesor_curso` (
  `Profesor_idProfesor` INT NOT NULL,
  `Curso_idCurso` INT NOT NULL,
  `rolProfesor` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Profesor_idProfesor`, `Curso_idCurso`),
  CONSTRAINT `fk_Profesor_has_Curso_Curso1`
    FOREIGN KEY (`Curso_idCurso`)
    REFERENCES `proytkd`.`curso` (`idCurso`))

DEFAULT CHARACTER SET = utf8mb4
;


-- -----------------------------------------------------
-- Table `proytkd`.`profesor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proytkd`.`profesor` (
  `idProfesor` INT NOT NULL AUTO_INCREMENT,
  `estado` ENUM('activo', 'retirado', 'sancionado') NOT NULL,
  PRIMARY KEY (`idProfesor`),
  CONSTRAINT `fk_profesor_usuario1`
    FOREIGN KEY (`idProfesor`)
    REFERENCES `proytkd`.`usuario` (`idUsuario`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)

AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb4
;


-- -----------------------------------------------------
-- Table `proytkd`.`participacion_profesor_evento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proytkd`.`participacion_profesor_evento` (
  `evento_idEvento` INT NOT NULL,
  `profesor_idProfesor` INT NOT NULL,
  PRIMARY KEY (`evento_idEvento`, `profesor_idProfesor`),
  CONSTRAINT `fk_profesor_has_evento_evento1`
    FOREIGN KEY (`evento_idEvento`)
    REFERENCES `proytkd`.`evento` (`idEvento`),
  CONSTRAINT `fk_participacion_profesor_evento_profesor1`
    FOREIGN KEY (`profesor_idProfesor`)
    REFERENCES `proytkd`.`profesor` (`idProfesor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)

DEFAULT CHARACTER SET = utf8mb4
;


-- -----------------------------------------------------
-- Table `proytkd`.`nivel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proytkd`.`nivel` (
  `idNivel` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `Curso_idCurso` INT NOT NULL,
  PRIMARY KEY (`idNivel`),
  CONSTRAINT `fk_Subcurso_Curso1`
    FOREIGN KEY (`Curso_idCurso`)
    REFERENCES `proytkd`.`curso` (`idCurso`))

DEFAULT CHARACTER SET = utf8mb4
;


-- -----------------------------------------------------
-- Table `proytkd`.`pregunta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proytkd`.`pregunta` (
  `idPregunta` INT NOT NULL AUTO_INCREMENT,
  `texto_pregunta` TEXT NOT NULL,
  `Subcurso_idSubcurso` INT NOT NULL,
  `puntos` INT NOT NULL,
  PRIMARY KEY (`idPregunta`),
  CONSTRAINT `fk_Pregunta_Subcurso1`
    FOREIGN KEY (`Subcurso_idSubcurso`)
    REFERENCES `proytkd`.`nivel` (`idNivel`))

DEFAULT CHARACTER SET = utf8mb4
;


-- -----------------------------------------------------
-- Table `proytkd`.`respuesta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proytkd`.`respuesta` (
  `idRespuesta` INT NOT NULL AUTO_INCREMENT,
  `es_correcta` TINYINT NOT NULL,
  `texto_respuesta` TEXT NOT NULL,
  `pregunta_idPregunta` INT NOT NULL,
  PRIMARY KEY (`idRespuesta`),
  CONSTRAINT `fk_respuesta_pregunta1`
    FOREIGN KEY (`pregunta_idPregunta`)
    REFERENCES `proytkd`.`pregunta` (`idPregunta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
;


-- -----------------------------------------------------
-- Table `proytkd`.`historial`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proytkd`.`historial` (
  `idHistorial` INT NOT NULL AUTO_INCREMENT,
  `puntaje_obtenido` INT NOT NULL,
  `pregunta_idPregunta` INT NOT NULL,
  `es_correcta` TINYINT NOT NULL,
  `idRespuesta_marcada` INT NOT NULL,
  `nivel_idSubcurso` INT NOT NULL,
  `estudiante_idEstudiante` INT NOT NULL,
  PRIMARY KEY (`idHistorial`),
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

DEFAULT CHARACTER SET = utf8mb4;