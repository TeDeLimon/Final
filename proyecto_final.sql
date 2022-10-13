-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-10-2022 a las 09:35:29
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_final`
--
DROP DATABASE IF EXISTS `proyecto_final`;
CREATE DATABASE IF NOT EXISTS `proyecto_final` DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci;
USE `proyecto_final`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int UNSIGNED NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `email` varchar(60) NOT NULL,
  `tipo` varchar(20) DEFAULT 'cliente',
  `password` varchar(60) NOT NULL,
  `recover` varchar(45) DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellidos`, `telefono`, `email`, `tipo`, `password`, `recover`, `imagen`) VALUES
(1, ' Luis', 'Villanueva García', '611178388', 'luis_villanueva_1@hotmail.com', 'admin', '199595', NULL, 'e643ba48c61da89e6b65d6b31cb4ce20.jpg '),
(3, ' Tereza', 'Franco', '611178380', 'tysonpopluis@gmail.com', 'cliente', '199595', NULL, 'e643ba48c61da89e6b65d6b31cb4ce20.jpg '),
(4, ' Michell', 'Gavidia', '611178381', 'michelle@gmail.com', 'cliente', '199595', NULL, 'e643ba48c61da89e6b65d6b31cb4ce20.jpg '),
(5, ' Caramelo', 'De Chocolate', '611178200', 'dan_retry_123@hotmail.com', 'cliente', '199595', NULL, ' ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comandas`
--

CREATE TABLE `comandas` (
  `platos_id` int UNSIGNED NOT NULL,
  `mesas_id` int UNSIGNED NOT NULL,
  `reservas_id` int NOT NULL,
  `cantidad` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesas`
--

CREATE TABLE `mesas` (
  `id` int UNSIGNED NOT NULL,
  `numero` varchar(3) NOT NULL,
  `capacidad` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `mesas`
--

INSERT INTO `mesas` (`id`, `numero`, `capacidad`) VALUES
(1, '1', 2),
(2, '2', 2),
(3, '3', 2),
(4, '4', 2),
(5, '5', 4),
(6, '6', 4),
(7, '7', 4),
(8, '8', 4),
(9, '9', 4),
(10, '10', 4),
(11, '11', 6),
(12, '12', 6),
(13, '13', 6),
(14, '14', 6),
(15, '15', 8),
(16, '16', 8),
(17, '17', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platos`
--

CREATE TABLE `platos` (
  `id` int UNSIGNED NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` blob,
  `tipo` varchar(45) NOT NULL,
  `precio` int UNSIGNED NOT NULL,
  `ruta` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `platos`
--

INSERT INTO `platos` (`id`, `nombre`, `descripcion`, `tipo`, `precio`, `ruta`) VALUES
(1, 'Cóctel Gambas', 0x43756174726f2047616d62617320476967616e74657320636f6e206e7565737472612073616c736120636173657261, 'entrante', 16, 'coctel-gambas.jpg'),
(2, 'Lubina Chilena', 0x4c7562696e6120636f6e20696e7363727573746163696f6e657320646520706563616e61732c20657370c3a1727261676f732073616c746561646f732c207061746174617320616c2063696c616e74726f20792073616c7361206465206372656d61206465207069c3b1612e, 'principal', 35, 'lubina-chilena.jpg'),
(3, 'Solomillo ahumado con roble rojo', 0x333230206772206465206c6f6d6f206465207265732c20706174617461732059756b6f6e2c2076657264757261732061736164617320792064656d692d676c617a65206465206c6120636173612e, 'principal', 55, 'solomillo-parrilla.jpg'),
(4, 'Lomo de Cerdo', 0x4c6f6d6f20646520436572646f20617361646f20616c20686f726e6f2c20636f7274652067727565736f2064652033343067722c20636f6e20687565736f2c20636f6e2064656d692d676c616365206465206c6120636173612c207061746174617320476f6c64656e2d59756b6f6e207920756e61207065726120657363616c6661646120636f6e2076696e6f206465204f706f72746f2e20, 'principal', 30, 'medallon-cerdo.jpg'),
(5, 'Escalopas', 0x56696572617320676967616e74657320636f6e20696e63727573746163696f6e6573206465206d61636164616d69612c2073616c7361206465206d616e676f207920616c626168616361207920656e73616c61646120646520706572617320657363616c666164617320636f6e2076696e6f206465204f706f72746f2e, 'entrante', 38, 'escalopas.jpg'),
(6, 'Enchiladas de camarones y cangrejo adobadas', 0x43616d61726f6e657320676967616e7465732061646f6261646f732061206c612070617272696c6c6120736f62726520656e6368696c616461732064652063616e6772656a6f2c20636f6e2073616c7361206465206d616e676f2079206672696a6f6c6573206e6567726f7320792073616c7361206465206d616e74657175696c6c61206465206c696dc3b36e2e, 'entrante', 36, 'gambas-adobadas-enchiladas.jpg'),
(7, 'Ensalada de guacamole fresco', 0x456e73616c61646120646520616775616361746520636f6e20616c69c3b16f206465206c696d61207920616365697465206f6c697661207375706572696f722c2061636f6d7061c3b161646f20646520756e612062617320646520626572726f73206465206e75657374726f2068756572746f2079206372756a69656e7465732064652070617374612e, 'entrante', 10, 'ensalada-guacamole.jpg'),
(8, 'Ceviche', 0x43616d61726f6e657320656e66726961646f732079207669656972617320636f6e206a75676f206465206c696d61207920746f6d6174652e, 'entrante', 15, 'ceviche.jpg'),
(9, 'Tacos de Salmón', 0x53616c6dc3b36e20656e6e656772656369646f20636f6e20657370696e6163617320667265736361732c206167756163617465207920636f6e64696d656e746f206465207069c3b1612079206d61c3ad7a2e, 'entrante', 20, 'tacos-salmon.jpg'),
(10, 'Enchiladas Mexicanas', 0x50756e746173206465206c6f6d6f206465207265732073616c74656164617320656e20746f7274696c6c6173206465206d61c3ad7a2063756269657274617320636f6e2073616c7361206465206368696c6520616e63686f2c20736572766964617320636f6e206172726f7a2065737061c3b16f6c2079206672696a6f6c6573206e6567726f732e, 'entrante', 17, 'enchiladas-mexicanas.jpg'),
(11, 'Chicken Monterey', 0x5065636875676120646520706f6c6c6f2061206c612070617272696c6c6120637562696572746120636f6e20717565736f206465206361627261206465205465786173207920657370696e616361732c207365727669646120636f6e206172726f7a20706f626c616e6f20792073616c73612064652070696d69656e746f20726f6a6f20617361646f2e, 'principal', 20, 'chicken-monterey.jpg'),
(12, 'Cabo San Lucas', 0x43616d61726f6e65732061206c612070617272696c6c612079207665676574616c65732061206c612070617272696c6c6120636f6e2073616c73612064652063696c616e74726f2d7065706974612079206172726f7a20706f626c616e6f2e, 'principal', 22, 'cabo-san-lucas.jpg'),
(13, 'Crème brûlée de chocolate blanco', 0x456c6567616e7465206372c3a86d65206272c3bb6cc3a9652064652063686f636f6c61746520626c616e636f2079204772616e64204d61726e69657220637562696572746f20636f6e20617ac3ba63617220636172616d656c697a6164612e, 'postre', 9, 'creme-brulee.jpg'),
(14, 'Flan de Vainilla', 0x4e6174696c6c617320696e667573696f6e6164617320636f6e207661696e696c6c61207920756e61206c69676572612073616c736120646520636172616d656c6f2e, 'postre', 9, 'flan-vainilla.jpg'),
(15, 'Pastel De Frambuesa Y Chocolate', 0x547265732063617061732064652063686f636f6c61746520636f6e206d65726d656c616461206465206672616d627565736120636f726f6e6164617320636f6e206d696e6920636869737061732064652063686f636f6c6174652e, 'postre', 9, 'pastel-chocolate-fresa.jpg'),
(16, 'Tarta de lima', 0x566572646164657261207461727461206465206c696d6120636f6e20756e612061636964657a20706572666563746120717565206c6c656e6120756e6120636f7274657a612064652067616c6c6574612047726168616d2e, 'postre', 9, 'pie-lima.jpg'),
(17, 'Margarita Premium', 0xc2a14e75657374726173206f7063696f6e6573206465206d61726761726974617320736f6e206162756e64616e74657320792064656c6963696f73617321204c6f20696e766974616d6f7320612063726561722073752072656365746120706572736f6e616c697a6164612e, 'bebida', 10, 'margarita.jpg'),
(18, 'Vino Fran Gran Reserva', 0x53656c656363696f6e61646f732061206d616e6f20706f72206e75657374726f20736f6d6d656c6965722c206573746f732076696e6f7320736f6e20756e20636f6d706c656d656e746f2066656e6f6d656e616c2070617261206c6120657863657063696f6e616c20636f63696e612064656c207375646f657374652e, 'bebida', 9, 'vino.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id` int NOT NULL,
  `clientes_id` int UNSIGNED NOT NULL,
  `mesas_id` int UNSIGNED NOT NULL,
  `hora` time NOT NULL,
  `comensales` int UNSIGNED NOT NULL,
  `estado` varchar(45) NOT NULL DEFAULT 'reservada',
  `comentarios` blob,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id`, `clientes_id`, `mesas_id`, `hora`, `comensales`, `estado`, `comentarios`, `fecha`) VALUES
(29, 1, 8, '14:00:00', 3, 'reservada', 0x4d6573612070617261203320706f72206661766f72, '2022-10-18'),
(30, 1, 13, '14:00:00', 6, 'reservada', 0x506f72206661766f7220736f6c69636974616d6f7320756e612073696c6c6120646520626562c3a92e, '2022-10-18'),
(31, 1, 9, '15:00:00', 4, 'reservada', 0x506f72206661766f722c20706f6472c3ad616d6f7320736572203520706572736f6e61732e, '2022-10-20');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `telefono_UNIQUE` (`telefono`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indices de la tabla `comandas`
--
ALTER TABLE `comandas`
  ADD PRIMARY KEY (`platos_id`,`mesas_id`,`reservas_id`),
  ADD KEY `fk_platos_has_mesas_mesas1_idx` (`mesas_id`),
  ADD KEY `fk_platos_has_mesas_platos1_idx` (`platos_id`),
  ADD KEY `reservas_id_idx` (`reservas_id`);

--
-- Indices de la tabla `mesas`
--
ALTER TABLE `mesas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numero_UNIQUE` (`numero`);

--
-- Indices de la tabla `platos`
--
ALTER TABLE `platos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`,`clientes_id`,`mesas_id`),
  ADD KEY `fk_clientes_has_mesas_mesas1_idx` (`mesas_id`),
  ADD KEY `fk_clientes_has_mesas_clientes_idx` (`clientes_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `mesas`
--
ALTER TABLE `mesas`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `platos`
--
ALTER TABLE `platos`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comandas`
--
ALTER TABLE `comandas`
  ADD CONSTRAINT `fk_platos_has_mesas_mesas1` FOREIGN KEY (`mesas_id`) REFERENCES `mesas` (`id`),
  ADD CONSTRAINT `fk_platos_has_mesas_platos1` FOREIGN KEY (`platos_id`) REFERENCES `platos` (`id`),
  ADD CONSTRAINT `reservas_id` FOREIGN KEY (`reservas_id`) REFERENCES `reservas` (`id`);

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `fk_clientes_has_mesas_clientes` FOREIGN KEY (`clientes_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `fk_clientes_has_mesas_mesas1` FOREIGN KEY (`mesas_id`) REFERENCES `mesas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
