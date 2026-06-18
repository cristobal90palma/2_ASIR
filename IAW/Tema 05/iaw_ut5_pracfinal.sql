-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 08-02-2026 a las 10:47:17
-- Versión del servidor: 8.0.44-0ubuntu0.24.04.2
-- Versión de PHP: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `iaw_ut5_pracfinal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `npedido` int NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `telefono` int NOT NULL,
  `importe` float(5,2) NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`npedido`, `nombre`, `direccion`, `telefono`, `importe`, `username`) VALUES
(14, 'Pepe', 'Calle Cabo - La Palma del Condado', 616235786, 38.95, 'pepe'),
(16, 'asdfasf', 'dafasdf', 616235786, 23.95, 'pepe'),
(17, 'asas', 'casdc asdc', 123456789, 18.95, 'jacker'),
(18, 'Donato Soriano Conesa', 'Vial de Ignacio Oliver 6, Alicante, 27525', 123456789, 19.00, 'jacker'),
(19, 'Tito Lucena Cornejo', 'Calle Nayara Esteve 5 Piso 5 , Málaga, 20216', 123456789, 19.00, 'jacker'),
(20, 'Beatriz Gargallo Cortes', 'Vial Adelia Saez 73 Piso 5 , La Coruña, 09526', 123456789, 48.00, 'jacker'),
(21, 'Eufemia Rebollo Pujadas', 'Ronda Octavio Bartolomé 49, Madrid, 20328', 123456789, 8.00, 'jacker'),
(22, 'Perla Maricruz Tudela Aller', 'Ronda Carmelita Rivera 78 Apt. 43 , Córdoba, 46623', 123456789, 18.95, 'jacker'),
(23, 'Olimpia Pascual Casas', 'Ronda Rosario Vilanova 14 Puerta 4 , Zaragoza, 46453', 123456789, 18.00, 'jacker'),
(24, 'Odalys Arcos Escobar', 'Camino de Reyna Salmerón 21 Puerta 1 , Melilla, 34286', 123456789, 36.00, 'jacker'),
(25, 'Ricarda Bas', 'Glorieta de Fanny Mendez 21, Segovia, 21495', 123456789, 26.00, 'jacker'),
(26, 'Isaura Téllez Recio', 'Cuesta de Edgardo Villalonga 88 Puerta 6 , Cantabria, 03225', 123456789, 47.00, 'jacker'),
(27, 'Fabián Plaza Morillo', 'Rambla Baudelio Zabala 78 Puerta 9 , Valladolid, 22057', 123456789, 53.95, 'jacker'),
(28, 'Eliseo Villalba', 'Pasaje de Samu Barba 190 Apt. 46 , Baleares, 26101', 123456789, 22.00, 'jacker'),
(29, 'Isaura Melisa Quintero Escamilla', 'Avenida de Lucas Jimenez 8 Apt. 53 , León, 47052', 123456789, 45.95, 'jacker'),
(30, 'Eutropio Pinto Rosselló', 'Ronda Curro Pinedo 51, Tarragona, 51467', 123456789, 36.00, 'jacker'),
(31, 'Leonardo Castelló Pomares', 'Rambla Macario Quero 47, Lugo, 30275', 123456789, 34.95, 'jacker'),
(32, 'Baldomero Simó Caro', 'Paseo Tiburcio Prieto 28 Apt. 37 , Vizcaya, 40794', 123456789, 40.00, 'jacker'),
(33, 'Silvia Cuevas Chico', 'Paseo de Saturnina Escolano 34, Guipúzcoa, 46994', 123456789, 19.00, 'jacker'),
(34, 'Cristian de Lumbreras', 'C. de Herminia Feliu 13, Cáceres, 01021', 123456789, 4.00, 'jacker'),
(35, 'Alcides del Vendrell', 'Pasaje Susana Crespi 27 Puerta 1 , Melilla, 41974', 123456789, 48.00, 'jacker'),
(36, 'Nando Dalmau Pacheco', 'Callejón Carla Osuna 924, Badajoz, 30279', 123456789, 53.00, 'jacker'),
(37, 'Oriana del Romero', 'Calle Venceslás Saldaña 520 Apt. 94 , Cuenca, 45470', 123456789, 3.00, 'jacker'),
(38, 'Jessica de Ortuño', 'Acceso de Victorino Puente 20 Puerta 7 , Almería, 50700', 123456789, 8.95, 'jacker'),
(39, 'Ovidio Ayuso', 'Via Tecla Roselló 2 Apt. 41 , Soria, 08011', 123456789, 8.00, 'jacker'),
(40, 'Brunilda Moliner Lobato', 'Plaza de Lourdes Alonso 95, Cuenca, 41567', 123456789, 44.95, 'jacker'),
(41, 'Ximena Barragán Español', 'Cañada Seve Franco 204 Puerta 4 , Pontevedra, 21415', 123456789, 29.95, 'jacker'),
(42, 'Joaquina Múñiz Tejada', 'Glorieta de Ainoa Barrios 44 Piso 2 , Castellón, 28311', 123456789, 41.95, 'jacker'),
(43, 'Julie del Madrid', 'Pasaje de Florinda Frutos 649 Puerta 9 , Navarra, 38236', 123456789, 37.95, 'jacker'),
(44, 'Jose Antonio Garcés Cánovas', 'Vial Cesar Velázquez 9, Teruel, 48489', 123456789, 23.95, 'jacker'),
(45, 'Loreto Mascaró Azcona', 'Pasadizo de Zoraida Caro 495 Puerta 1 , Alicante, 28155', 123456789, 15.00, 'jacker'),
(46, 'Ascensión Anselma Murillo Zurita', 'Cuesta de Rodolfo Cañizares 88 Apt. 92 , Álava, 12977', 123456789, 27.95, 'jacker'),
(47, 'Toribio Arroyo Marí', 'Rambla de Gustavo Cámara 33, Badajoz, 37050', 123456789, 40.95, 'jacker'),
(48, 'Viviana Castillo Fabregat', 'Pasaje de Carmina Cortes 93, Sevilla, 21544', 123456789, 11.00, 'jacker'),
(49, 'Felix del Doménech', 'Acceso Anselmo Milla 3 Apt. 40 , León, 06904', 123456789, 26.00, 'jacker'),
(50, 'Hipólito Gallo Alcázar', 'Pasaje Georgina Pardo 4, Girona, 05813', 123456789, 45.00, 'jacker'),
(51, 'Cayetano Abril Uribe', 'Pasadizo Tito Oliva 2 Piso 6 , Palencia, 22343', 123456789, 12.00, 'jacker'),
(52, 'Paula Trujillo', 'Avenida Azahar Oller 60, Álava, 23984', 123456789, 4.00, 'jacker'),
(53, 'Melisa Clemente Plana', 'Pasaje Severo Vallés 96, Guadalajara, 38710', 123456789, 34.95, 'jacker'),
(54, 'Flora Jódar Angulo', 'Alameda de Julián Oliver 53, Melilla, 06288', 123456789, 10.00, 'jacker'),
(55, 'Jeremías José Manuel Alcolea Manzanares', 'Paseo de Flavio Bello 52 Puerta 5 , Baleares, 19868', 123456789, 29.00, 'jacker'),
(56, 'Lucas Morell Baena', 'Cañada Ruth Galvez 4, Palencia, 08746', 123456789, 27.00, 'jacker'),
(57, 'Zaida Gonzalo Expósito', 'Vial de Ignacio Uribe 83 Piso 8 , Guadalajara, 28724', 123456789, 3.00, 'jacker'),
(58, 'Elena Pastor', 'Ronda Crescencia Puente 1, Zaragoza, 44151', 123456789, 15.00, 'jacker'),
(59, 'Fidela Alcalá Villegas', 'Ronda Mariano Salcedo 86, Lugo, 36900', 123456789, 3.00, 'jacker'),
(60, 'Cirino Escobar Zorrilla', 'Callejón de Azucena Machado 25, Girona, 36392', 123456789, 33.00, 'jacker'),
(61, 'Reynaldo Amador Bayona', 'Via Mauricio Alberola 233 Piso 5 , Toledo, 03726', 123456789, 10.00, 'jacker'),
(62, 'Florencia Álvaro Nebot', 'Camino de Lilia Mas 45 Puerta 5 , Almería, 01827', 123456789, 18.00, 'jacker'),
(63, 'Emperatriz Morillo Bru', 'C. de Julián Clemente 4, Alicante, 40876', 123456789, 15.00, 'jacker'),
(64, 'Pascual Frías Alegre', 'Alameda Olimpia Bilbao 62 Piso 3 , Huelva, 32205', 123456789, 15.00, 'jacker'),
(65, 'Pío Cuesta Bravo', 'Camino Tamara Tirado 51, Cuenca, 19277', 123456789, 8.95, 'jacker'),
(66, 'Montserrat Pavón Tello', 'Paseo Amparo Pina 16, Cáceres, 49933', 123456789, 22.00, 'jacker'),
(67, 'Florentino Bermejo Ricart', 'C. de Javi Hernando 1, Las Palmas, 13274', 123456789, 15.00, 'jacker'),
(68, 'María Dolores Ayuso Azorin', 'Avenida Gerónimo Porta 58, Lleida, 28357', 123456789, 28.00, 'jacker'),
(69, 'Otilia Cabezas Asenjo', 'Avenida Luisa Clemente 77, Toledo, 10157', 123456789, 41.95, 'jacker'),
(70, 'Florina Velázquez Rodrigo', 'Vial de Celia Font 68 Puerta 4 , Ourense, 20270', 123456789, 44.95, 'jacker'),
(71, 'Beatriz Espejo', 'C. de Teresa Juárez 19 Apt. 44 , Valladolid, 24989', 123456789, 15.00, 'jacker'),
(72, 'Clarisa Soria Marí', 'Pasaje de Iker Cabanillas 3 Apt. 17 , La Rioja, 13876', 123456789, 33.00, 'jacker'),
(73, 'Filomena Clotilde Cifuentes Andres', 'Alameda Maite Plana 75 Puerta 0 , Melilla, 18341', 123456789, 15.00, 'jacker'),
(74, 'Saturnino Galván Mas', 'Glorieta de Itziar Peláez 56, Ourense, 40344', 123456789, 4.00, 'jacker'),
(75, 'Rebeca Toledo', 'Pasaje de Adora Sales 95, Jaén, 36798', 123456789, 38.00, 'jacker'),
(76, 'Aníbal de Tena', 'Pasadizo Rafael Manzano 42, Navarra, 01476', 123456789, 21.00, 'jacker'),
(77, 'Soledad Bru Aller', 'Plaza de Eustaquio Posada 61, Valencia, 34864', 123456789, 33.00, 'jacker'),
(78, 'Noelia Valls Anaya', 'Alameda Sarita Tejada 58 Puerta 9 , Palencia, 14644', 123456789, 23.95, 'jacker'),
(79, 'Samanta Leiva Bru', 'Paseo de Azahara Sáenz 55 Puerta 2 , Córdoba, 22568', 123456789, 38.00, 'jacker'),
(80, 'Eusebia Esteban', 'Via de Isidora Lara 80 Piso 1 , Toledo, 48907', 123456789, 59.00, 'jacker'),
(81, 'Hilda Bonilla', 'Pasaje de Juana Sáez 57 Piso 8 , Huelva, 30627', 123456789, 25.00, 'jacker'),
(82, 'Silvio Julián Pulido', 'Pasaje de Ariadna Ochoa 45, La Rioja, 03448', 123456789, 43.00, 'jacker'),
(83, 'Octavia Novoa Ocaña', 'Pasaje de Prudencio Cuéllar 98, Badajoz, 37179', 123456789, 14.00, 'jacker'),
(84, 'Pastor de Lobato', 'Calle de Encarnación Chaves 91, Ciudad, 27799', 123456789, 26.00, 'jacker'),
(85, 'Aurelia Duran Salamanca', 'C. Roque Borrego 2, Teruel, 12006', 123456789, 41.95, 'jacker'),
(86, 'Máximo Macario Lucena Abascal', 'Via Víctor Pinto 212 Puerta 2 , Almería, 27945', 123456789, 10.00, 'jacker'),
(87, 'Teófilo Edgardo Manjón Águila', 'Vial Adrián Valbuena 73 Puerta 0 , Cuenca, 39991', 123456789, 21.00, 'jacker'),
(88, 'Luisa Roberta Buendía Conde', 'Pasaje Antonio Caballero 665 Puerta 3 , Asturias, 14713', 123456789, 52.95, 'jacker'),
(89, 'Felix Lledó Peral', 'Alameda Úrsula Ayuso 41 Apt. 75 , Zamora, 27220', 123456789, 16.95, 'jacker'),
(90, 'Ricarda Llorens Orozco', 'Acceso de Ainara Bernal 2, Guipúzcoa, 11800', 123456789, 27.00, 'jacker'),
(91, 'Fortunato Vargas', 'Ronda Estrella Villalobos 75, Córdoba, 47791', 123456789, 22.00, 'jacker'),
(92, 'Sergio Nebot Calvet', 'Pasaje de Tecla Espada 6 Puerta 4 , Ourense, 34334', 123456789, 8.95, 'jacker'),
(93, 'Matías Miguel Iborra', 'Pasaje Gerardo Murillo 3 Puerta 8 , Toledo, 48050', 123456789, 23.95, 'jacker'),
(94, 'Eutropio Ojeda Bernat', 'Calle Anastasia Briones 17, Asturias, 06369', 123456789, 27.95, 'jacker'),
(95, 'Ana Sans Alcolea', 'Pasaje Jose Ramón Mora 9 Puerta 5 , Ourense, 10323', 123456789, 49.95, 'jacker'),
(96, 'Alberto Gómez Suarez', 'Pasadizo de Gerardo Feijoo 11, Albacete, 20498', 123456789, 28.00, 'jacker'),
(97, 'Isaac Abad', 'Plaza de Eric Pina 61, Burgos, 07943', 123456789, 8.00, 'jacker'),
(98, 'Fátima Tello Ugarte', 'Urbanización Bernardo Gimeno 21 Apt. 71 , Girona, 02829', 123456789, 40.00, 'jacker'),
(99, 'Nacio del Alfaro', 'Plaza Joel Bueno 94 Piso 1 , Ourense, 42611', 123456789, 19.95, 'jacker'),
(100, 'Nacho Calvet', 'Callejón Ramiro Esparza 90 Apt. 34 , Castellón, 46906', 123456789, 45.95, 'jacker'),
(101, 'Reyes Huertas Castilla', 'Cañada Guillermo Escudero 6 Apt. 65 , Almería, 31252', 123456789, 32.00, 'jacker'),
(102, 'Otilia del Peña', 'Cañada Eugenia Font 4 Apt. 34 , Málaga, 48757', 123456789, 8.95, 'jacker'),
(103, 'Reyes del Lobo', 'Cuesta Lino Aguiló 74, León, 38372', 123456789, 40.00, 'jacker'),
(104, 'Baudelio Sala Osuna', 'Acceso de Balduino Huerta 76, Huelva, 04369', 123456789, 37.00, 'jacker'),
(105, 'Amarilis Ramona Uriarte Chacón', 'Avenida Encarnación Alvarez 70, Alicante, 50130', 123456789, 54.00, 'jacker'),
(106, 'Mariano Albero Vilanova', 'C. Alfonso Carrasco 84, Huelva, 51737', 123456789, 15.95, 'jacker'),
(107, 'Irene Mosquera Cabrera', 'Calle Raimundo Duque 1 Apt. 44 , Lugo, 31849', 123456789, 51.00, 'jacker'),
(108, 'Cristóbal', 'Cabo 16', 654987321, 16.95, 'luis');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido-producto`
--

CREATE TABLE `pedido-producto` (
  `npedido` int NOT NULL,
  `nproducto` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedido-producto`
--

INSERT INTO `pedido-producto` (`npedido`, `nproducto`) VALUES
(14, 1),
(16, 1),
(17, 1),
(22, 1),
(27, 1),
(29, 1),
(31, 1),
(38, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(46, 1),
(47, 1),
(53, 1),
(65, 1),
(69, 1),
(70, 1),
(78, 1),
(85, 1),
(88, 1),
(89, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1),
(99, 1),
(100, 1),
(102, 1),
(106, 1),
(108, 1),
(17, 2),
(20, 2),
(22, 2),
(24, 2),
(26, 2),
(28, 2),
(30, 2),
(32, 2),
(40, 2),
(41, 2),
(47, 2),
(54, 2),
(60, 2),
(61, 2),
(68, 2),
(69, 2),
(70, 2),
(76, 2),
(77, 2),
(80, 2),
(81, 2),
(82, 2),
(85, 2),
(86, 2),
(87, 2),
(88, 2),
(96, 2),
(98, 2),
(100, 2),
(101, 2),
(103, 2),
(105, 2),
(107, 2),
(18, 3),
(20, 3),
(24, 3),
(26, 3),
(27, 3),
(29, 3),
(35, 3),
(36, 3),
(42, 3),
(47, 3),
(49, 3),
(50, 3),
(55, 3),
(60, 3),
(64, 3),
(67, 3),
(70, 3),
(72, 3),
(73, 3),
(80, 3),
(81, 3),
(82, 3),
(88, 3),
(91, 3),
(95, 3),
(96, 3),
(105, 3),
(107, 3),
(14, 4),
(16, 4),
(19, 4),
(20, 4),
(25, 4),
(26, 4),
(27, 4),
(30, 4),
(31, 4),
(32, 4),
(33, 4),
(35, 4),
(36, 4),
(40, 4),
(42, 4),
(43, 4),
(45, 4),
(49, 4),
(53, 4),
(55, 4),
(58, 4),
(62, 4),
(70, 4),
(72, 4),
(75, 4),
(79, 4),
(80, 4),
(83, 4),
(84, 4),
(87, 4),
(93, 4),
(95, 4),
(99, 4),
(101, 4),
(103, 4),
(104, 4),
(105, 4),
(107, 4),
(19, 5),
(20, 5),
(21, 5),
(24, 5),
(25, 5),
(26, 5),
(28, 5),
(30, 5),
(31, 5),
(33, 5),
(36, 5),
(39, 5),
(41, 5),
(48, 5),
(50, 5),
(51, 5),
(56, 5),
(60, 5),
(69, 5),
(71, 5),
(75, 5),
(76, 5),
(77, 5),
(79, 5),
(80, 5),
(85, 5),
(89, 5),
(90, 5),
(97, 5),
(98, 5),
(100, 5),
(101, 5),
(104, 5),
(108, 5),
(14, 6),
(23, 6),
(27, 6),
(29, 6),
(32, 6),
(35, 6),
(36, 6),
(40, 6),
(43, 6),
(44, 6),
(46, 6),
(50, 6),
(53, 6),
(56, 6),
(63, 6),
(66, 6),
(68, 6),
(69, 6),
(75, 6),
(77, 6),
(78, 6),
(79, 6),
(80, 6),
(82, 6),
(84, 6),
(85, 6),
(88, 6),
(90, 6),
(94, 6),
(95, 6),
(98, 6),
(100, 6),
(103, 6),
(104, 6),
(105, 6),
(107, 6),
(14, 7),
(16, 7),
(18, 7),
(20, 7),
(25, 7),
(27, 7),
(28, 7),
(29, 7),
(30, 7),
(31, 7),
(32, 7),
(34, 7),
(35, 7),
(36, 7),
(42, 7),
(45, 7),
(46, 7),
(47, 7),
(50, 7),
(51, 7),
(52, 7),
(56, 7),
(58, 7),
(62, 7),
(66, 7),
(71, 7),
(72, 7),
(74, 7),
(75, 7),
(79, 7),
(88, 7),
(90, 7),
(91, 7),
(93, 7),
(94, 7),
(98, 7),
(100, 7),
(103, 7),
(106, 7),
(23, 8),
(24, 8),
(25, 8),
(26, 8),
(29, 8),
(30, 8),
(31, 8),
(35, 8),
(37, 8),
(41, 8),
(42, 8),
(43, 8),
(47, 8),
(48, 8),
(50, 8),
(55, 8),
(57, 8),
(59, 8),
(62, 8),
(66, 8),
(68, 8),
(71, 8),
(72, 8),
(76, 8),
(82, 8),
(83, 8),
(91, 8),
(96, 8),
(98, 8),
(101, 8),
(104, 8),
(105, 8),
(106, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `nproducto` int NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `precio` float(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`nproducto`, `nombre`, `precio`) VALUES
(1, 'Nachos clásicos', 8.95),
(2, 'Ensalada Cesar', 10.00),
(3, 'Combo de alitas', 15.00),
(4, 'Pizza carbonara', 11.00),
(5, 'Pizza ranchera', 8.00),
(6, 'Pizza taco', 15.00),
(7, 'Tarta trufa', 4.00),
(8, 'Helados variados', 3.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`username`, `password`) VALUES
('Cristóbal', '$2y$10$QVmlTQALIy0ZHIhB7NiiR.jFy4SH6SeLrFRkp8cOlpnvOKPKiTfiS'),
('jacker', '$2y$10$.WTeWPv3yDo95J0jcOeObu2QieRX6/NgZd.mXFLddM238cjwVaJVm'),
('kike', '$2y$10$ne8w6Rr11NVJrXOiDmeG3.ClyNtSqwCnoxox52YAiAcf.1yuqWqJm'),
('kiko', '$2y$10$/tB0Wp5KYNJxNEMs8cF9Gu/TIePlOQTG1G3e6TIhvcNGXKB5ZITVi'),
('luis', '$2y$10$bYeqkq7azDN/OL2vJCwWfufsQKnd2YU9sts4Osdyw7LrbbmiHqnUu'),
('Miguel', '$2y$10$SZUj.covI5KJl3cljkya/.UyO1VX1.yEVdEklRo2fmSG9wR18s79i'),
('miguelon', '$2y$10$USpX2MZBCNRyv5/BKslGkuw3edOHrhPZD5kZdO2W9xYZ1eNobo4.m'),
('pepe', '$2y$10$76WQy0VANaxfaFIfUcbmbuYoAbCP2ukDJHns0gXnPAY7pXwBdUdBm');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`npedido`),
  ADD KEY `username` (`username`);

--
-- Indices de la tabla `pedido-producto`
--
ALTER TABLE `pedido-producto`
  ADD PRIMARY KEY (`npedido`,`nproducto`),
  ADD KEY `nproducto` (`nproducto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`nproducto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `npedido` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `nproducto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`username`) REFERENCES `usuario` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido-producto`
--
ALTER TABLE `pedido-producto`
  ADD CONSTRAINT `pedido-producto_ibfk_1` FOREIGN KEY (`npedido`) REFERENCES `pedido` (`npedido`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedido-producto_ibfk_2` FOREIGN KEY (`nproducto`) REFERENCES `producto` (`nproducto`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
