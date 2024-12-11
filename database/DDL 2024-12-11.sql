-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2024 a las 14:35:31
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proytkd`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `CrearUsuario` (IN `idUsuario` INT, IN `nombre` VARCHAR(45), IN `apellido` VARCHAR(45), IN `correo` VARCHAR(100), IN `clave` VARCHAR(255), IN `estado_registro` VARCHAR(30), IN `fecha_nacimiento` DATE, IN `telefono` VARCHAR(15), IN `imagen` VARCHAR(255), IN `idTipo_usuario` INT, IN `estado` VARCHAR(45), IN `idGrado` INT)   BEGIN
    -- Insertar en la tabla Usuario
    INSERT INTO Usuario (idUsuario, nombre, apellido, correo, clave, estado_registro, fecha_nacimiento, telefono, imagen, idTipo_usuario)
    VALUES (idUsuario, nombre, apellido, correo, clave, estado_registro, fecha_nacimiento, telefono, imagen, idTipo_usuario);

    -- Obtener el ID del usuario insertado
    -- SET @idUsuario = LAST_INSERT_ID();

    -- Dependiendo del tipo de usuario, insertar en la tabla correspondiente
    IF idTipo_usuario = 1 THEN
        -- Insertar en la tabla administrador
        INSERT INTO administrador(idAdministrador, estado) 
        VALUES (idUsuario, estado);
    ELSEIF idTipo_usuario = 2 THEN
        -- Insertar en la tabla profesor
        INSERT INTO profesor(idProfesor, estado) 
        VALUES (idUsuario, estado);
    ELSEIF idTipo_usuario = 3 THEN
        -- Insertar en la tabla estudiante
        INSERT INTO estudiante(idEstudiante, estado, Grado_idGrado) 
        VALUES (idUsuario, estado, idGrado);
    END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `idAdministrador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`idAdministrador`) VALUES
(1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria_admin_evento`
--

CREATE TABLE `auditoria_admin_evento` (
  `idAuditoriaAdminEvento` int(11) NOT NULL,
  `administrador_idAdministrador` int(11) NOT NULL,
  `Evento_idEvento` int(11) NOT NULL,
  `accion` enum('crear','gestionar','eliminar') NOT NULL,
  `fechaHora` datetime NOT NULL,
  `detalleAnterior` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `idCiudad` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `Pais_idPais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`idCiudad`, `nombre`, `Pais_idPais`) VALUES
(1, 'Bogotá', 1),
(2, 'Ciudad de México', 2),
(3, 'Seúl', 3),
(4, 'Ciudad de Panamá', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigo_verificacion`
--

CREATE TABLE `codigo_verificacion` (
  `idCodigo_verificacion` int(11) NOT NULL,
  `contenido_codigo` varchar(45) NOT NULL,
  `estado` enum('valido','invalido') NOT NULL,
  `fecha_creado` datetime NOT NULL,
  `fecha_expirado` datetime NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `idCurso` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`idCurso`, `nombre`) VALUES
(1, 'Combate'),
(2, 'Poomsae'),
(3, 'Terminologia'),
(4, 'Defensa Personal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `idEstudiante` int(11) NOT NULL,
  `Grado_idGrado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`idEstudiante`, `Grado_idGrado`) VALUES
(2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `idEvento` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `Ciudad_idCiudad` int(11) NOT NULL,
  `estado` enum('VENCIDO','DISPONIBLE') NOT NULL,
  `precio` decimal(15,3) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`idEvento`, `nombre`, `descripcion`, `Ciudad_idCiudad`, `estado`, `precio`, `fecha_inicio`, `fecha_fin`) VALUES
(1001, 'Viaje grupal a Panamá', 'Evento dedicado a compartir e intercambiar conocimientos y profundizar nuestros lazos como artistas marciales a nivel internacional', 4, 'VENCIDO', 1200000.000, '2024-10-06 08:00:00', '2024-10-11 16:00:00'),
(1002, 'Viaje a Corea del Sur', 'Una experiencia única de crecimiento personal, donde se cultiva el respeto, la disciplina y la camaradería, todo mientras se vive la esencia de Corea en cada rincón.', 3, 'VENCIDO', 4000000.000, '2024-09-01 00:00:00', '2024-09-11 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria_evento`
--

CREATE TABLE `galeria_evento` (
  `idGaleria_Evento` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `idEvento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `galeria_evento`
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
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE `grado` (
  `idGrado` int(11) NOT NULL,
  `grado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grado`
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
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `idHistorial` int(11) NOT NULL,
  `puntaje_obtenido` int(11) NOT NULL,
  `pregunta_idPregunta` int(11) NOT NULL,
  `es_correcta` tinyint(4) NOT NULL,
  `idRespuesta_marcada` int(11) NOT NULL,
  `nivel_idSubcurso` int(11) NOT NULL,
  `estudiante_idEstudiante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

CREATE TABLE `nivel` (
  `idNivel` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `Curso_idCurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nivel`
--

INSERT INTO `nivel` (`idNivel`, `nombre`, `Curso_idCurso`) VALUES
(1, 'Nivel 1: Introducción al combate', 1),
(2, 'Nivel 1: Introducción al Poomsae', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `idPais` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`idPais`, `nombre`) VALUES
(1, 'Colombia'),
(2, 'México'),
(3, 'Corea del sur'),
(4, 'Panamá');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participacion_estudiante_evento`
--

CREATE TABLE `participacion_estudiante_evento` (
  `evento_idEvento` int(11) NOT NULL,
  `estudiante_idEstudiante1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participacion_profesor_curso`
--

CREATE TABLE `participacion_profesor_curso` (
  `Profesor_idProfesor` int(11) NOT NULL,
  `Curso_idCurso` int(11) NOT NULL,
  `rolProfesor` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participacion_profesor_evento`
--

CREATE TABLE `participacion_profesor_evento` (
  `evento_idEvento` int(11) NOT NULL,
  `profesor_idProfesor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE `pregunta` (
  `idPregunta` int(11) NOT NULL,
  `texto_pregunta` text NOT NULL,
  `Subcurso_idSubcurso` int(11) NOT NULL,
  `puntos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pregunta`
--

INSERT INTO `pregunta` (`idPregunta`, `texto_pregunta`, `Subcurso_idSubcurso`, `puntos`) VALUES
(1, '¿Cuál es el uniforme oficial utilizado en Taekwondo?', 1, 100),
(2, '¿Con qué parte del pie se realiza la técnica de ap chagi (patada frontal)?', 1, 200),
(3, '¿Cuántos puntos se obtienen al golpear con una patada válida en el peto?', 1, 300),
(4, '¿Cómo se llama el área donde se realiza un combate de Taekwondo?', 1, 500),
(5, '¿Cuánto dura cada asalto en un combate de Taekwondo estándar?', 1, 1000),
(6, '¿Qué color de cinturón representa un nivel intermedio en Taekwondo?', 1, 2000),
(7, '¿Cuál es la principal diferencia entre un golpe válido y uno inválido en un combate de Taekwondo?', 1, 4000),
(8, '¿Cuál de las siguientes técnicas NO está permitida en un combate oficial de Taekwondo?', 1, 8000),
(9, '¿Qué significa la palabra Kyeorugi en Taekwondo?', 1, 16000),
(10, '¿Cuál es el propósito principal de los protectores electrónicos en el Taekwondo moderno?', 1, 32000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `idProfesor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE `respuesta` (
  `idRespuesta` int(11) NOT NULL,
  `es_correcta` tinyint(4) NOT NULL,
  `texto_respuesta` text NOT NULL,
  `pregunta_idPregunta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `respuesta`
--

INSERT INTO `respuesta` (`idRespuesta`, `es_correcta`, `texto_respuesta`, `pregunta_idPregunta`) VALUES
(1, 0, 'A) Kimono', 1),
(2, 0, 'C) Hakama', 1),
(3, 0, 'D) Gi', 1),
(4, 1, 'B) Dobok', 1),
(5, 0, 'A) El talón', 2),
(6, 0, 'B) El empeine', 2),
(7, 0, 'D) El borde externo del pie', 2),
(8, 1, 'C) La bola del pie', 2),
(9, 0, 'A) 1 punto', 3),
(10, 0, 'C) 3 puntos', 3),
(11, 0, 'D) 5 puntos', 3),
(12, 1, 'B) 2 puntos', 3),
(13, 0, 'A) Tatami', 4),
(14, 0, 'B) Ring', 4),
(15, 0, 'D) Kyeorugi', 4),
(16, 1, 'C) Dojang', 4),
(17, 0, 'A) 1 minuto', 5),
(18, 0, 'B) 1.5 minutos', 5),
(19, 0, 'D) 3 minutos', 5),
(20, 1, 'C) 2 minutos', 5),
(21, 0, 'A) Blanco', 6),
(22, 0, 'B) Amarillo', 6),
(23, 0, 'D) Rojo', 6),
(24, 1, 'C) Verde', 6),
(25, 0, 'A) La fuerza del golpe', 7),
(26, 0, 'C) El tipo de técnica utilizada', 7),
(27, 0, 'D) El sonido que produce', 7),
(28, 1, 'B) La precisión y área de impacto', 7),
(29, 0, 'A) Patada giratoria al peto', 8),
(30, 0, 'B) Patada descendente a la cabeza', 8),
(31, 0, 'C) Golpe con el puño al peto', 8),
(32, 1, 'D) Patada a la pierna', 8),
(33, 1, 'A) Combate', 9),
(34, 0, 'B) Forma', 9),
(35, 0, 'C) Saludo', 9),
(36, 0, 'D) Defensa', 9),
(37, 0, 'A) Reducir lesiones graves', 10),
(38, 0, 'B) Mejorar el rendimiento del atleta', 10),
(39, 1, 'C) Registrar los puntos automáticamente', 10),
(40, 0, 'D) Permitir mayor movilidad', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `idTipo_usuario` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`idTipo_usuario`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Estudiante'),
(3, 'Profesor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `estado` enum('pendiente','denegado','permitido') NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `idTipo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `apellido`, `correo`, `clave`, `estado`, `fecha_nacimiento`, `telefono`, `imagen`, `idTipo_usuario`) VALUES
(1, 'Oscar', 'Gonzalez', 'og@tkd.com', '202cb962ac59075b964b07152d234b70', 'permitido', '2005-08-14', '3135746229', NULL, 1),
(2, 'Sebastian', 'Soto', 'sebas@tkd.com', '202cb962ac59075b964b07152d234b70', 'permitido', '2021-02-25', '3131313', NULL, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idAdministrador`);

--
-- Indices de la tabla `auditoria_admin_evento`
--
ALTER TABLE `auditoria_admin_evento`
  ADD PRIMARY KEY (`idAuditoriaAdminEvento`),
  ADD KEY `fk_Evento_Evento1` (`Evento_idEvento`),
  ADD KEY `fk_auditoria_admin_evento_administrador1` (`administrador_idAdministrador`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`idCiudad`),
  ADD KEY `fk_Ciudad_Pais1` (`Pais_idPais`);

--
-- Indices de la tabla `codigo_verificacion`
--
ALTER TABLE `codigo_verificacion`
  ADD PRIMARY KEY (`idCodigo_verificacion`),
  ADD KEY `fk_codigo_verificacion_usuario_temporal1` (`idUsuario`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`idCurso`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`idEstudiante`),
  ADD KEY `fk_Estudiante_Grado` (`Grado_idGrado`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`idEvento`),
  ADD KEY `fk_Evento_Ciudad1` (`Ciudad_idCiudad`);

--
-- Indices de la tabla `galeria_evento`
--
ALTER TABLE `galeria_evento`
  ADD PRIMARY KEY (`idGaleria_Evento`),
  ADD KEY `galeria_evento_ibfk_1` (`idEvento`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
  ADD PRIMARY KEY (`idGrado`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`idHistorial`),
  ADD KEY `fk_historial_pregunta1` (`pregunta_idPregunta`),
  ADD KEY `fk_historial_respuesta1` (`idRespuesta_marcada`),
  ADD KEY `fk_historial_nivel1` (`nivel_idSubcurso`),
  ADD KEY `fk_historial_estudiante1` (`estudiante_idEstudiante`);

--
-- Indices de la tabla `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`idNivel`),
  ADD KEY `fk_Subcurso_Curso1` (`Curso_idCurso`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`idPais`);

--
-- Indices de la tabla `participacion_estudiante_evento`
--
ALTER TABLE `participacion_estudiante_evento`
  ADD PRIMARY KEY (`evento_idEvento`,`estudiante_idEstudiante1`),
  ADD KEY `fk_participacion_estudiante_evento_estudiante1` (`estudiante_idEstudiante1`);

--
-- Indices de la tabla `participacion_profesor_curso`
--
ALTER TABLE `participacion_profesor_curso`
  ADD PRIMARY KEY (`Profesor_idProfesor`,`Curso_idCurso`),
  ADD KEY `fk_Profesor_has_Curso_Curso1` (`Curso_idCurso`);

--
-- Indices de la tabla `participacion_profesor_evento`
--
ALTER TABLE `participacion_profesor_evento`
  ADD PRIMARY KEY (`evento_idEvento`,`profesor_idProfesor`),
  ADD KEY `fk_participacion_profesor_evento_profesor1` (`profesor_idProfesor`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`idPregunta`),
  ADD KEY `fk_Pregunta_Subcurso1` (`Subcurso_idSubcurso`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`idProfesor`);

--
-- Indices de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`idRespuesta`),
  ADD KEY `fk_respuesta_pregunta1` (`pregunta_idPregunta`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`idTipo_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk_usuario_tipo_usuario1` (`idTipo_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `idAdministrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `auditoria_admin_evento`
--
ALTER TABLE `auditoria_admin_evento`
  MODIFY `idAuditoriaAdminEvento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `idCiudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `codigo_verificacion`
--
ALTER TABLE `codigo_verificacion`
  MODIFY `idCodigo_verificacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `idCurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `idEstudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `idEvento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;

--
-- AUTO_INCREMENT de la tabla `galeria_evento`
--
ALTER TABLE `galeria_evento`
  MODIFY `idGaleria_Evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `grado`
--
ALTER TABLE `grado`
  MODIFY `idGrado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `idHistorial` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `nivel`
--
ALTER TABLE `nivel`
  MODIFY `idNivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `idPais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `idPregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `idProfesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `idRespuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `fk_administrador_usuario_temporal1` FOREIGN KEY (`idAdministrador`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `auditoria_admin_evento`
--
ALTER TABLE `auditoria_admin_evento`
  ADD CONSTRAINT `fk_Evento_Evento1` FOREIGN KEY (`Evento_idEvento`) REFERENCES `evento` (`idEvento`),
  ADD CONSTRAINT `fk_auditoria_admin_evento_administrador1` FOREIGN KEY (`administrador_idAdministrador`) REFERENCES `administrador` (`idAdministrador`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `fk_Ciudad_Pais1` FOREIGN KEY (`Pais_idPais`) REFERENCES `pais` (`idPais`);

--
-- Filtros para la tabla `codigo_verificacion`
--
ALTER TABLE `codigo_verificacion`
  ADD CONSTRAINT `fk_codigo_verificacion_usuario_temporal1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `fk_Estudiante_Grado` FOREIGN KEY (`Grado_idGrado`) REFERENCES `grado` (`idGrado`),
  ADD CONSTRAINT `fk_estudiante_usuario_temporal1` FOREIGN KEY (`idEstudiante`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `fk_Evento_Ciudad1` FOREIGN KEY (`Ciudad_idCiudad`) REFERENCES `ciudad` (`idCiudad`) ON DELETE CASCADE;

--
-- Filtros para la tabla `galeria_evento`
--
ALTER TABLE `galeria_evento`
  ADD CONSTRAINT `galeria_evento_ibfk_1` FOREIGN KEY (`idEvento`) REFERENCES `evento` (`idEvento`);

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `fk_historial_estudiante1` FOREIGN KEY (`estudiante_idEstudiante`) REFERENCES `estudiante` (`idEstudiante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_historial_nivel1` FOREIGN KEY (`nivel_idSubcurso`) REFERENCES `nivel` (`idNivel`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_historial_pregunta1` FOREIGN KEY (`pregunta_idPregunta`) REFERENCES `pregunta` (`idPregunta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_historial_respuesta1` FOREIGN KEY (`idRespuesta_marcada`) REFERENCES `respuesta` (`idRespuesta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `nivel`
--
ALTER TABLE `nivel`
  ADD CONSTRAINT `fk_Subcurso_Curso1` FOREIGN KEY (`Curso_idCurso`) REFERENCES `curso` (`idCurso`);

--
-- Filtros para la tabla `participacion_estudiante_evento`
--
ALTER TABLE `participacion_estudiante_evento`
  ADD CONSTRAINT `fk_estudiante_has_evento_evento1` FOREIGN KEY (`evento_idEvento`) REFERENCES `evento` (`idEvento`),
  ADD CONSTRAINT `fk_participacion_estudiante_evento_estudiante1` FOREIGN KEY (`estudiante_idEstudiante1`) REFERENCES `estudiante` (`idEstudiante`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `participacion_profesor_curso`
--
ALTER TABLE `participacion_profesor_curso`
  ADD CONSTRAINT `fk_Profesor_has_Curso_Curso1` FOREIGN KEY (`Curso_idCurso`) REFERENCES `curso` (`idCurso`);

--
-- Filtros para la tabla `participacion_profesor_evento`
--
ALTER TABLE `participacion_profesor_evento`
  ADD CONSTRAINT `fk_participacion_profesor_evento_profesor1` FOREIGN KEY (`profesor_idProfesor`) REFERENCES `profesor` (`idProfesor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_profesor_has_evento_evento1` FOREIGN KEY (`evento_idEvento`) REFERENCES `evento` (`idEvento`);

--
-- Filtros para la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD CONSTRAINT `fk_Pregunta_Subcurso1` FOREIGN KEY (`Subcurso_idSubcurso`) REFERENCES `nivel` (`idNivel`);

--
-- Filtros para la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD CONSTRAINT `fk_profesor_usuario1` FOREIGN KEY (`idProfesor`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD CONSTRAINT `fk_respuesta_pregunta1` FOREIGN KEY (`pregunta_idPregunta`) REFERENCES `pregunta` (`idPregunta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_tipo_usuario1` FOREIGN KEY (`idTipo_usuario`) REFERENCES `tipo_usuario` (`idTipo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
