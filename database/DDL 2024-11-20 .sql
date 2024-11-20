-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 20, 2024 at 01:57 PM
-- Server version: 8.0.40
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proytkd`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrador`
--

CREATE TABLE `administrador` (
  `idAdministrador` int NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `estado` enum('activo','inactivo') NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `fechaNac` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `administrador`
--

INSERT INTO `administrador` (`idAdministrador`, `nombre`, `apellido`, `correo`, `clave`, `estado`, `telefono`, `imagen`, `fechaNac`) VALUES
(1, 'Oscar Alejandro', 'Gonzalez Soto', 'oscaralejandrosoto9@gmail.com', '435d34a30118a32a16ff94be8a1e46e0', 'activo', '3135746229', NULL, '2005-08-14');

-- --------------------------------------------------------

--
-- Table structure for table `auditoria_admin_evento`
--

CREATE TABLE `auditoria_admin_evento` (
  `idAuditoriaAdminEvento` int NOT NULL,
  `Administrador_idAdministrador` int NOT NULL,
  `Evento_idEvento` int NOT NULL,
  `accion` enum('crear','gestionar','eliminar') NOT NULL,
  `fechaHora` datetime NOT NULL,
  `detalleAnterior` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ciudad`
--

CREATE TABLE `ciudad` (
  `idCiudad` int NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `Pais_idPais` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ciudad`
--

INSERT INTO `ciudad` (`idCiudad`, `nombre`, `Pais_idPais`) VALUES
(1, 'Bogotá', 1),
(2, 'Ciudad de México', 2),
(3, 'Seúl', 3),
(4, 'Ciudad de Panamá', 4);

-- --------------------------------------------------------

--
-- Table structure for table `codigo_verificacion`
--

CREATE TABLE `codigo_verificacion` (
  `idCodigo_verificacion` int NOT NULL,
  `codigo` varchar(45) NOT NULL,
  `estado` enum('valido','invalido') NOT NULL,
  `fecha_creado` datetime NOT NULL,
  `fecha_expirado` datetime NOT NULL,
  `idUser` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `codigo_verificacion`
--

INSERT INTO `codigo_verificacion` (`idCodigo_verificacion`, `codigo`, `estado`, `fecha_creado`, `fecha_expirado`, `idUser`) VALUES
(1, '1E37DB', 'invalido', '2024-11-12 23:14:44', '2024-11-12 23:24:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `curso`
--

CREATE TABLE `curso` (
  `idCurso` int NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `estudiante`
--

CREATE TABLE `estudiante` (
  `idEstudiante` int NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `Grado_idGrado` int NOT NULL,
  `estado` enum('activo','retirado','sancionado') NOT NULL,
  `fechaNac` date NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `estudiante`
--

INSERT INTO `estudiante` (`idEstudiante`, `nombre`, `apellido`, `correo`, `clave`, `Grado_idGrado`, `estado`, `fechaNac`, `imagen`, `telefono`) VALUES
(1, 'Sebastian', 'Soto Lozano', 'sebas@tkd.com', '202cb962ac59075b964b07152d234b70', 1, 'activo', '2017-11-16', NULL, '111');

-- --------------------------------------------------------

--
-- Table structure for table `evento`
--

CREATE TABLE `evento` (
  `idEvento` int NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` text,
  `Ciudad_idCiudad` int NOT NULL,
  `estado` enum('VENCIDO','DISPONIBLE') NOT NULL,
  `precio` decimal(15,3) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `evento`
--

INSERT INTO `evento` (`idEvento`, `nombre`, `descripcion`, `Ciudad_idCiudad`, `estado`, `precio`, `fecha_inicio`, `fecha_fin`) VALUES
(1001, 'Viaje grupal a Panamá', 'Evento dedicado a compartir e intercambiar conocimientos y profundizar nuestros lazos como artistas marciales a nivel internacional', 4, 'VENCIDO', 1200000.000, '2024-10-06 08:00:00', '2024-10-11 16:00:00'),
(1002, 'Viaje a Corea del Sur', 'Una experiencia única de crecimiento personal, donde se cultiva el respeto, la disciplina y la camaradería, todo mientras se vive la esencia de Corea en cada rincón.', 3, 'VENCIDO', 4000000.000, '2024-09-01 00:00:00', '2024-09-11 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `galeria_evento`
--

CREATE TABLE `galeria_evento` (
  `idGaleria_Evento` int NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `idEvento` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `galeria_evento`
--

INSERT INTO `galeria_evento` (`idGaleria_Evento`, `imagen`, `idEvento`) VALUES
(1, 'img/events/panama/one.jpg', 1001),
(2, 'img/events/panama/two.jpg', 1001),
(3, 'img/events/panama/tree.jpg', 1001),
(4, 'img/events/corea/img1.jpg', 1002),
(5, 'img/events/corea/img2.jpg', 1002),
(6, 'img/events/corea/img3.jpeg', 1002),
(7, 'img/events/corea/img4.jpg', 1002),
(8, 'img/events/corea/img5.jpg', 1002);

-- --------------------------------------------------------

--
-- Table structure for table `grado`
--

CREATE TABLE `grado` (
  `idGrado` int NOT NULL,
  `grado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `grado`
--

INSERT INTO `grado` (`idGrado`, `grado`) VALUES
(1, 'Blanco'),
(2, 'Blanco-amarillo'),
(3, 'Amarillo'),
(4, 'Amarillo-verde'),
(5, 'Verde'),
(6, 'Verde-azul'),
(7, 'Azul'),
(8, 'Azul-rojo'),
(9, 'Rojo'),
(10, 'Rojo-negro');

-- --------------------------------------------------------

--
-- Table structure for table `matriculacurso`
--

CREATE TABLE `matriculacurso` (
  `Curso_idCurso` int NOT NULL,
  `Estudiante_idEstudiante` int NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pais`
--

CREATE TABLE `pais` (
  `idPais` int NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pais`
--

INSERT INTO `pais` (`idPais`, `nombre`) VALUES
(1, 'Colombia'),
(2, 'México'),
(3, 'Corea del sur'),
(4, 'Panamá');

-- --------------------------------------------------------

--
-- Table structure for table `participacion_estudiante_evento`
--

CREATE TABLE `participacion_estudiante_evento` (
  `estudiante_idEstudiante` int NOT NULL,
  `evento_idEvento` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `participacion_profesor_curso`
--

CREATE TABLE `participacion_profesor_curso` (
  `Profesor_idProfesor` int NOT NULL,
  `Curso_idCurso` int NOT NULL,
  `rolProfesor` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `participacion_profesor_evento`
--

CREATE TABLE `participacion_profesor_evento` (
  `profesor_idProfesor` int NOT NULL,
  `evento_idEvento` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pregunta`
--

CREATE TABLE `pregunta` (
  `idPregunta` int NOT NULL,
  `pregunta` varchar(45) NOT NULL,
  `Subcurso_idSubcurso` int NOT NULL,
  `respuesta` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profesor`
--

CREATE TABLE `profesor` (
  `idProfesor` int NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `estado` enum('activo','inactivo') NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `fechaNac` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `profesor`
--

INSERT INTO `profesor` (`idProfesor`, `nombre`, `apellido`, `correo`, `clave`, `estado`, `telefono`, `imagen`, `fechaNac`) VALUES
(1, 'sadsad', 'sadasda', 'profe@tkd.com', '202cb962ac59075b964b07152d234b70', 'activo', '2321321', NULL, '2024-11-03');

-- --------------------------------------------------------

--
-- Table structure for table `progreso_subcurso`
--

CREATE TABLE `progreso_subcurso` (
  `idtomarSubcurso` int NOT NULL,
  `puntaje` varchar(45) NOT NULL,
  `Subcurso_idSubcurso` int NOT NULL,
  `MatriculaCurso_Curso_idCurso` int NOT NULL,
  `MatriculaCurso_Estudiante_idEstudiante` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subcurso`
--

CREATE TABLE `subcurso` (
  `idSubcurso` int NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `Curso_idCurso` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuario_temporal`
--

CREATE TABLE `usuario_temporal` (
  `idUsuario_temporal` int NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `rol` enum('profesor','estudiante') NOT NULL,
  `estado` enum('pendiente','denegado','permitido') DEFAULT NULL,
  `fechaNac` date NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `Grado_idGrado` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `usuario_temporal`
--

INSERT INTO `usuario_temporal` (`idUsuario_temporal`, `nombre`, `apellido`, `correo`, `clave`, `rol`, `estado`, `fechaNac`, `telefono`, `Grado_idGrado`) VALUES
(1, 'Deisy Yaneth', 'Soto Lozano', 'deisysoto888@yahoo.com', 'acf7ef943fdeb3cbfed8dd0d8f584731', 'estudiante', 'pendiente', '1974-09-02', '3135746292', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idAdministrador`),
  ADD UNIQUE KEY `idx_correo` (`correo`);

--
-- Indexes for table `auditoria_admin_evento`
--
ALTER TABLE `auditoria_admin_evento`
  ADD PRIMARY KEY (`idAuditoriaAdminEvento`),
  ADD KEY `fk_Administrador_Evento1` (`Administrador_idAdministrador`),
  ADD KEY `fk_Evento_Evento1` (`Evento_idEvento`);

--
-- Indexes for table `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`idCiudad`),
  ADD KEY `fk_Ciudad_Pais1` (`Pais_idPais`);

--
-- Indexes for table `codigo_verificacion`
--
ALTER TABLE `codigo_verificacion`
  ADD PRIMARY KEY (`idCodigo_verificacion`),
  ADD KEY `fk_codigo_verificacion_usuario_temporal1_idx` (`idUser`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`idCurso`);

--
-- Indexes for table `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`idEstudiante`),
  ADD UNIQUE KEY `idx_correo` (`correo`),
  ADD KEY `fk_Estudiante_Grado` (`Grado_idGrado`);

--
-- Indexes for table `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`idEvento`),
  ADD KEY `fk_Evento_Ciudad1` (`Ciudad_idCiudad`),
  ADD KEY `idx_estado` (`estado`),
  ADD KEY `idx_fecha` (`fecha_inicio`,`fecha_fin`);

--
-- Indexes for table `galeria_evento`
--
ALTER TABLE `galeria_evento`
  ADD PRIMARY KEY (`idGaleria_Evento`),
  ADD KEY `idEvento` (`idEvento`);

--
-- Indexes for table `grado`
--
ALTER TABLE `grado`
  ADD PRIMARY KEY (`idGrado`);

--
-- Indexes for table `matriculacurso`
--
ALTER TABLE `matriculacurso`
  ADD PRIMARY KEY (`Curso_idCurso`,`Estudiante_idEstudiante`),
  ADD KEY `fk_Curso_has_Estudiante_Estudiante1` (`Estudiante_idEstudiante`);

--
-- Indexes for table `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`idPais`);

--
-- Indexes for table `participacion_estudiante_evento`
--
ALTER TABLE `participacion_estudiante_evento`
  ADD PRIMARY KEY (`estudiante_idEstudiante`,`evento_idEvento`),
  ADD KEY `fk_estudiante_has_evento_evento1` (`evento_idEvento`);

--
-- Indexes for table `participacion_profesor_curso`
--
ALTER TABLE `participacion_profesor_curso`
  ADD PRIMARY KEY (`Profesor_idProfesor`,`Curso_idCurso`),
  ADD KEY `fk_Profesor_has_Curso_Curso1` (`Curso_idCurso`);

--
-- Indexes for table `participacion_profesor_evento`
--
ALTER TABLE `participacion_profesor_evento`
  ADD PRIMARY KEY (`profesor_idProfesor`,`evento_idEvento`),
  ADD KEY `fk_profesor_has_evento_evento1` (`evento_idEvento`);

--
-- Indexes for table `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`idPregunta`),
  ADD KEY `fk_Pregunta_Subcurso1` (`Subcurso_idSubcurso`);

--
-- Indexes for table `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`idProfesor`),
  ADD UNIQUE KEY `idx_correo` (`correo`);

--
-- Indexes for table `progreso_subcurso`
--
ALTER TABLE `progreso_subcurso`
  ADD PRIMARY KEY (`idtomarSubcurso`),
  ADD KEY `fk_tomarSubcurso_MatriculaCurso1` (`MatriculaCurso_Curso_idCurso`,`MatriculaCurso_Estudiante_idEstudiante`),
  ADD KEY `fk_tomarSubcurso_Subcurso1` (`Subcurso_idSubcurso`);

--
-- Indexes for table `subcurso`
--
ALTER TABLE `subcurso`
  ADD PRIMARY KEY (`idSubcurso`),
  ADD KEY `fk_Subcurso_Curso1` (`Curso_idCurso`);

--
-- Indexes for table `usuario_temporal`
--
ALTER TABLE `usuario_temporal`
  ADD PRIMARY KEY (`idUsuario_temporal`),
  ADD UNIQUE KEY `idx_correo` (`correo`),
  ADD KEY `fk_usuario_temporal_grado1_idx` (`Grado_idGrado`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrador`
--
ALTER TABLE `administrador`
  MODIFY `idAdministrador` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auditoria_admin_evento`
--
ALTER TABLE `auditoria_admin_evento`
  MODIFY `idAuditoriaAdminEvento` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `idCiudad` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `codigo_verificacion`
--
ALTER TABLE `codigo_verificacion`
  MODIFY `idCodigo_verificacion` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `idCurso` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `idEstudiante` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `evento`
--
ALTER TABLE `evento`
  MODIFY `idEvento` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;

--
-- AUTO_INCREMENT for table `galeria_evento`
--
ALTER TABLE `galeria_evento`
  MODIFY `idGaleria_Evento` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `grado`
--
ALTER TABLE `grado`
  MODIFY `idGrado` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pais`
--
ALTER TABLE `pais`
  MODIFY `idPais` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `idPregunta` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profesor`
--
ALTER TABLE `profesor`
  MODIFY `idProfesor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `progreso_subcurso`
--
ALTER TABLE `progreso_subcurso`
  MODIFY `idtomarSubcurso` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcurso`
--
ALTER TABLE `subcurso`
  MODIFY `idSubcurso` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario_temporal`
--
ALTER TABLE `usuario_temporal`
  MODIFY `idUsuario_temporal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auditoria_admin_evento`
--
ALTER TABLE `auditoria_admin_evento`
  ADD CONSTRAINT `fk_Administrador_Evento1` FOREIGN KEY (`Administrador_idAdministrador`) REFERENCES `administrador` (`idAdministrador`),
  ADD CONSTRAINT `fk_Evento_Evento1` FOREIGN KEY (`Evento_idEvento`) REFERENCES `evento` (`idEvento`);

--
-- Constraints for table `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `fk_Ciudad_Pais1` FOREIGN KEY (`Pais_idPais`) REFERENCES `pais` (`idPais`);

--
-- Constraints for table `codigo_verificacion`
--
ALTER TABLE `codigo_verificacion`
  ADD CONSTRAINT `fk_codigo_verificacion_usuario_temporal1` FOREIGN KEY (`idUser`) REFERENCES `usuario_temporal` (`idUsuario_temporal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `fk_Estudiante_Grado` FOREIGN KEY (`Grado_idGrado`) REFERENCES `grado` (`idGrado`);

--
-- Constraints for table `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `fk_Evento_Ciudad1` FOREIGN KEY (`Ciudad_idCiudad`) REFERENCES `ciudad` (`idCiudad`) ON DELETE CASCADE;

--
-- Constraints for table `galeria_evento`
--
ALTER TABLE `galeria_evento`
  ADD CONSTRAINT `galeria_evento_ibfk_1` FOREIGN KEY (`idEvento`) REFERENCES `evento` (`idEvento`);

--
-- Constraints for table `matriculacurso`
--
ALTER TABLE `matriculacurso`
  ADD CONSTRAINT `fk_Curso_has_Estudiante_Curso1` FOREIGN KEY (`Curso_idCurso`) REFERENCES `curso` (`idCurso`),
  ADD CONSTRAINT `fk_Curso_has_Estudiante_Estudiante1` FOREIGN KEY (`Estudiante_idEstudiante`) REFERENCES `estudiante` (`idEstudiante`);

--
-- Constraints for table `participacion_estudiante_evento`
--
ALTER TABLE `participacion_estudiante_evento`
  ADD CONSTRAINT `fk_estudiante_has_evento_estudiante1` FOREIGN KEY (`estudiante_idEstudiante`) REFERENCES `estudiante` (`idEstudiante`),
  ADD CONSTRAINT `fk_estudiante_has_evento_evento1` FOREIGN KEY (`evento_idEvento`) REFERENCES `evento` (`idEvento`);

--
-- Constraints for table `participacion_profesor_curso`
--
ALTER TABLE `participacion_profesor_curso`
  ADD CONSTRAINT `fk_Profesor_has_Curso_Curso1` FOREIGN KEY (`Curso_idCurso`) REFERENCES `curso` (`idCurso`),
  ADD CONSTRAINT `fk_Profesor_has_Curso_Profesor1` FOREIGN KEY (`Profesor_idProfesor`) REFERENCES `profesor` (`idProfesor`);

--
-- Constraints for table `participacion_profesor_evento`
--
ALTER TABLE `participacion_profesor_evento`
  ADD CONSTRAINT `fk_profesor_has_evento_evento1` FOREIGN KEY (`evento_idEvento`) REFERENCES `evento` (`idEvento`),
  ADD CONSTRAINT `fk_profesor_has_evento_profesor1` FOREIGN KEY (`profesor_idProfesor`) REFERENCES `profesor` (`idProfesor`);

--
-- Constraints for table `pregunta`
--
ALTER TABLE `pregunta`
  ADD CONSTRAINT `fk_Pregunta_Subcurso1` FOREIGN KEY (`Subcurso_idSubcurso`) REFERENCES `subcurso` (`idSubcurso`);

--
-- Constraints for table `progreso_subcurso`
--
ALTER TABLE `progreso_subcurso`
  ADD CONSTRAINT `fk_tomarSubcurso_MatriculaCurso1` FOREIGN KEY (`MatriculaCurso_Curso_idCurso`,`MatriculaCurso_Estudiante_idEstudiante`) REFERENCES `matriculacurso` (`Curso_idCurso`, `Estudiante_idEstudiante`),
  ADD CONSTRAINT `fk_tomarSubcurso_Subcurso1` FOREIGN KEY (`Subcurso_idSubcurso`) REFERENCES `subcurso` (`idSubcurso`);

--
-- Constraints for table `subcurso`
--
ALTER TABLE `subcurso`
  ADD CONSTRAINT `fk_Subcurso_Curso1` FOREIGN KEY (`Curso_idCurso`) REFERENCES `curso` (`idCurso`);

--
-- Constraints for table `usuario_temporal`
--
ALTER TABLE `usuario_temporal`
  ADD CONSTRAINT `fk_usuario_temporal_grado1` FOREIGN KEY (`Grado_idGrado`) REFERENCES `grado` (`idGrado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
