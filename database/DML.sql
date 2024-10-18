/*Primero tablas independientes luego datos de prueba*/

/*Grados o cinturones*/

INSERT INTO Grado (`idGrado`, `grado`)
VALUES 
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

/*Pais y ciudad*/
INSERT INTO Pais (`idPais`, `nombre`)
VALUES
(1, 'Colombia'),
(2, 'México'),
(3, 'Corea del sur'),
(4, 'Panamá');

INSERT INTO Ciudad (`idCiudad`, `nombre`, `Pais_idPais`)
VALUES 
(1, 'Bogotá', 1),
(2, 'Ciudad de México', 2),
(3, 'Seúl', 3),
(4, 'Ciudad de Panamá', 4);

/*Aquí van los cursos*/

/*Ahora las preguntas*/


/*Datos persona*/
/*Administradores*/

INSERT INTO Administrador (`idAdministrador`, `nombre`, `apellido`, `correo`, `clave`, `estado`)
VALUES (1, 'Oscar', 'Gonzalez', 'og@tkd.com', md5('123'), 'activo');


INSERT INTO `Estudiante`(`idEstudiante`, `nombre`, `apellido`, `correo`, `clave`, `Grado_idGrado`, `estado`) VALUES ('1', 'Deisy', 'Soto', 'deisysoto@kopulso.com', md5('R0j02024!'), 9, 'activo');