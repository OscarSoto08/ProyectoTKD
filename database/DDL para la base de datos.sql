-- -----------------------------------------------------
-- Configuraciones iniciales
-- -----------------------------------------------------
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Crear Esquema proyTKD
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS proyTKD ;
USE proyTKD ;

-- -----------------------------------------------------
-- Tabla Grado
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Grado (
  idGrado INT NOT NULL AUTO_INCREMENT,
  grado VARCHAR(45) NOT NULL,
  PRIMARY KEY (idGrado))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Tabla Estudiante
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Estudiante (
  idEstudiante INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(50) NOT NULL,
  apellido VARCHAR(50) NOT NULL,
  correo VARCHAR(100) NOT NULL,
  clave VARCHAR(255) NOT NULL,
  Grado_idGrado INT NOT NULL,
  estado ENUM('activo', 'retirado', 'sancionado') NOT NULL,
  imagen VARCHAR(100) NULL DEFAULT 'https://i.ibb.co/1TLZ2Tg/rhino-Adult.png',
  fechaNac DATE NOT NULL,

  PRIMARY KEY (idEstudiante),
  UNIQUE (correo),
  INDEX fk_Estudiante_Grado_idx (Grado_idGrado ASC),
  CONSTRAINT fk_Estudiante_Grado
    FOREIGN KEY (Grado_idGrado)
    REFERENCES Grado (idGrado)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Tabla Profesor
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Profesor (
  idProfesor INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(50) NOT NULL,
  apellido VARCHAR(50) NOT NULL,
  correo VARCHAR(100) NOT NULL,
  clave VARCHAR(255) NOT NULL,
  estado ENUM('activo', 'retirado') NOT NULL,
  imagen VARCHAR(100) NULL DEFAULT 'https://i.ibb.co/1TLZ2Tg/rhino-Adult.png',
  fechaNac DATE NOT NULL,

  PRIMARY KEY (idProfesor),
  UNIQUE (correo))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Tabla Administrador
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Administrador (
  idAdministrador INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(50) NOT NULL,
  apellido VARCHAR(50) NOT NULL,
  correo VARCHAR(100) NOT NULL,
  clave VARCHAR(255) NOT NULL,
  estado ENUM('activo', 'retirado', 'sancionado') NOT NULL,
  imagen VARCHAR(100) NULL DEFAULT 'https://i.ibb.co/1TLZ2Tg/rhino-Adult.png', 
  fechaNac DATE NOT NULL,

  PRIMARY KEY (idAdministrador),
  UNIQUE (correo))
ENGINE = InnoDB;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TemporalUser`
--

CREATE TABLE `TemporalUser` (
  `idUser` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `fechaNac` date NOT NULL,
  `rol` enum('estudiante','profesor') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `TemporalUser`
--
ALTER TABLE `TemporalUser`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `TemporalUser`
--
ALTER TABLE `TemporalUser`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

-- -----------------------------------------------------
-- Tabla Curso
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Curso (
  idCurso INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(50) NOT NULL,
  PRIMARY KEY (idCurso))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Tabla Pais
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Pais (
  idPais INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(100) NOT NULL,
  PRIMARY KEY (idPais))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Tabla Ciudad
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Ciudad (
  idCiudad INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(100) NOT NULL,
  Pais_idPais INT NOT NULL,
  PRIMARY KEY (idCiudad),
  INDEX fk_Ciudad_Pais_idx (Pais_idPais ASC),
  CONSTRAINT fk_Ciudad_Pais
    FOREIGN KEY (Pais_idPais)
    REFERENCES Pais (idPais)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Tabla Evento
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Evento (
  idEvento INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(100) NOT NULL,
  fecha DATETIME NOT NULL,
  descripcion TEXT NULL,
  Ciudad_idCiudad INT NOT NULL,
  PRIMARY KEY (idEvento),
  INDEX fk_Evento_Ciudad_idx (Ciudad_idCiudad ASC),
  CONSTRAINT fk_Evento_Ciudad
    FOREIGN KEY (Ciudad_idCiudad)
    REFERENCES Ciudad (idCiudad)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Tabla Subcurso
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Subcurso (
  idSubcurso INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(100) NOT NULL,
  Curso_idCurso INT NOT NULL,
  PRIMARY KEY (idSubcurso),
  INDEX fk_Subcurso_Curso_idx (Curso_idCurso ASC),
  CONSTRAINT fk_Subcurso_Curso
    FOREIGN KEY (Curso_idCurso)
    REFERENCES Curso (idCurso)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Tabla Pregunta
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Pregunta (
  idPregunta INT NOT NULL AUTO_INCREMENT,
  pregunta TEXT NOT NULL,
  Subcurso_idSubcurso INT NOT NULL,
  respuesta VARCHAR(100) NOT NULL,
  PRIMARY KEY (idPregunta),
  INDEX fk_Pregunta_Subcurso_idx (Subcurso_idSubcurso ASC),
  CONSTRAINT fk_Pregunta_Subcurso
    FOREIGN KEY (Subcurso_idSubcurso)
    REFERENCES Subcurso (idSubcurso)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Tabla Participacion (Profesor en Curso)
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Participacion (
  Profesor_idProfesor INT NOT NULL,
  Curso_idCurso INT NOT NULL,
  rolProfesor VARCHAR(45) NOT NULL,
  PRIMARY KEY (Profesor_idProfesor, Curso_idCurso),
  INDEX fk_Profesor_Curso_idx (Curso_idCurso ASC),
  CONSTRAINT fk_Profesor_Curso
    FOREIGN KEY (Profesor_idProfesor)
    REFERENCES Profesor (idProfesor)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_Curso_Profesor
    FOREIGN KEY (Curso_idCurso)
    REFERENCES Curso (idCurso)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Tabla GestionarCurso (Administrador gestiona Curso)
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS GestionarCurso (
  Administrador_idAdministrador INT NOT NULL,
  Curso_idCurso INT NOT NULL,
  rolAdmin VARCHAR(45) NOT NULL,
  PRIMARY KEY (Administrador_idAdministrador, Curso_idCurso),
  INDEX fk_Administrador_Curso_idx (Curso_idCurso ASC),
  CONSTRAINT fk_Administrador_Curso
    FOREIGN KEY (Administrador_idAdministrador)
    REFERENCES Administrador (idAdministrador)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_Curso_Administrador
    FOREIGN KEY (Curso_idCurso)
    REFERENCES Curso (idCurso)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Tabla GestionarEvento (Administrador gestiona Evento)
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS GestionarEvento (
  Administrador_idAdministrador INT NOT NULL,
  Evento_idEvento INT NOT NULL,
  rolAdmin ENUM('creador', 'gestionador') NOT NULL,
  PRIMARY KEY (Administrador_idAdministrador, Evento_idEvento),
  INDEX fk_Administrador_Evento_idx (Evento_idEvento ASC),
  CONSTRAINT fk_Administrador_Evento
    FOREIGN KEY (Administrador_idAdministrador)
    REFERENCES Administrador (idAdministrador)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_Evento_Administrador
    FOREIGN KEY (Evento_idEvento)
    REFERENCES Evento (idEvento)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Tabla MatriculaCurso (Estudiante se matricula en Curso)
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS MatriculaCurso (
  Curso_idCurso INT NOT NULL,
  Estudiante_idEstudiante INT NOT NULL,
  fecha DATETIME NOT NULL,
  PRIMARY KEY (Curso_idCurso, Estudiante_idEstudiante),
  INDEX fk_MatriculaCurso_Estudiante_idx (Estudiante_idEstudiante ASC),
  CONSTRAINT fk_MatriculaCurso_Curso
    FOREIGN KEY (Curso_idCurso)
    REFERENCES Curso (idCurso)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_MatriculaCurso_Estudiante
    FOREIGN KEY (Estudiante_idEstudiante)
    REFERENCES Estudiante (idEstudiante)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Tabla tomarSubcurso (Estudiante toma Subcurso del Curso matriculado)
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS tomarSubcurso (
  idtomarSubcurso INT NOT NULL AUTO_INCREMENT,
  puntaje DECIMAL(5,2) NOT NULL,
  Subcurso_idSubcurso INT NOT NULL,
  MatriculaCurso_Curso_idCurso INT NOT NULL,
  MatriculaCurso_Estudiante_idEstudiante INT NOT NULL,
  PRIMARY KEY (idtomarSubcurso),
  INDEX fk_tomarSubcurso_Subcurso_idx (Subcurso_idSubcurso ASC),
  INDEX fk_tomarSubcurso_MatriculaCurso_idx (MatriculaCurso_Curso_idCurso ASC, MatriculaCurso_Estudiante_idEstudiante ASC),
  
  -- Clave foránea para Subcurso
  CONSTRAINT fk_tomarSubcurso_Subcurso
    FOREIGN KEY (Subcurso_idSubcurso)
    REFERENCES Subcurso (idSubcurso)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,

  -- Relación con la matrícula del curso
  CONSTRAINT fk_tomarSubcurso_MatriculaCurso
    FOREIGN KEY (MatriculaCurso_Curso_idCurso, MatriculaCurso_Estudiante_idEstudiante)
    REFERENCES MatriculaCurso (Curso_idCurso, Estudiante_idEstudiante)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Restaurar configuraciones iniciales
-- -----------------------------------------------------
SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
