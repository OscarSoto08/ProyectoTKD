-- Procedimientos almacenados:
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `CrearUsuario`(
	IN idUsuario INT,
    IN nombre VARCHAR(45),
    IN apellido VARCHAR(45),
    IN correo VARCHAR(100),
    IN clave VARCHAR(255),
    IN estado VARCHAR(45),
    IN fecha_nacimiento DATE,
    IN telefono VARCHAR(15),
    IN idTipo_usuario INT,
    IN imagen VARCHAR(255),
    IN idGrado INT
)
BEGIN
    -- Insertar en la tabla Usuario
    INSERT INTO Usuario (idUsuario, nombre, apellido, correo, clave, estado, fecha_nacimiento, telefono, imagen, idTipo_usuario)
    VALUES (idUsuario, nombre, apellido, correo, clave, estado, fecha_nacimiento, telefono, imagen, idTipo_usuario);

    -- Obtener el ID del usuario insertado
    -- SET @idUsuario = LAST_INSERT_ID();

    -- Dependiendo del tipo de usuario, insertar en la tabla correspondiente
    IF idTipo_usuario = 1 THEN
        -- Insertar en la tabla administrador
        INSERT INTO administrador(idAdministrador) 
        VALUES (idUsuario);
    ELSEIF idTipo_usuario = 2 THEN
        -- Insertar en la tabla profesor
        INSERT INTO profesor(idProfesor) 
        VALUES (idUsuario);
    ELSEIF idTipo_usuario = 3 THEN
        -- Insertar en la tabla estudiante
        INSERT INTO estudiante(idEstudiante, Grado_idGrado) 
        VALUES (idUsuario, idGrado);
    END IF;
END //
DELIMITER ;
--


SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

INSERT INTO `pais` (`idPais`, `nombre`) VALUES
(1, 'Colombia'),
(2, 'México'),
(3, 'Corea del sur'),
(4, 'Panamá');


INSERT INTO `ciudad` (`idCiudad`, `nombre`, `Pais_idPais`) VALUES
(1, 'Bogotá', 1),
(2, 'Ciudad de México', 2),
(3, 'Seúl', 3),
(4, 'Ciudad de Panamá', 4);

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


INSERT INTO `evento` (`idEvento`, `nombre`, `descripcion`, `Ciudad_idCiudad`, `estado`, `precio`, `fecha_inicio`, `fecha_fin`) VALUES
(1001, 'Viaje grupal a Panamá', 'Evento dedicado a compartir e intercambiar conocimientos y profundizar nuestros lazos como artistas marciales a nivel internacional', 4, 'VENCIDO', 1200000.000, '2024-10-06 08:00:00', '2024-10-11 16:00:00'),
(1002, 'Viaje a Corea del Sur', 'Una experiencia única de crecimiento personal, donde se cultiva el respeto, la disciplina y la camaradería, todo mientras se vive la esencia de Corea en cada rincón.', 3, 'VENCIDO', 4000000.000, '2024-09-01 00:00:00', '2024-09-11 00:00:00');


INSERT INTO `galeria_evento` (`idGaleria_Evento`, `imagen`, `idEvento`) VALUES
(1, 'img/events/panama/one.jpg', 1001),
(2, 'img/events/panama/two.jpg', 1001),
(3, 'img/events/panama/tree.jpg', 1001),
(4, 'img/events/corea/img1.jpg', 1002),
(5, 'img/events/corea/img2.jpg', 1002),
(6, 'img/events/corea/img3.jpeg', 1002),
(7, 'img/events/corea/img4.jpg', 1002),
(8, 'img/events/corea/img5.jpg', 1002);

INSERT INTO `curso` (`idCurso`, `nombre`) VALUES
(1, 'Combate'),
(2, 'Poomsae'),
(3, 'Terminologia'),
(4, 'Defensa Personal');
 

INSERT INTO `nivel` (`idNivel`, `nombre`, `Curso_idCurso`) VALUES
(1, 'Nivel 1: Introducción al combate', 1),
(2, 'Nivel 1: Introducción al Poomsae', 2);


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


INSERT INTO `tipo_usuario` (`idTipo_usuario`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Estudiante'),
(3, 'Profesor');


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
