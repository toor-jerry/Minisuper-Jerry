-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 07-11-2020 a las 19:18:24
-- Versión del servidor: 8.0.22-0ubuntu0.20.04.2
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `MiniSuper`
--
CREATE DATABASE IF NOT EXISTS `MiniSuper` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `MiniSuper`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_880E0D76F85E0677` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `username`, `roles`, `password`) VALUES
(1, 'super', '[\"ROLE_SUPER_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$qjER9RZCpAJppqlZqYU9Zg$TiNFmOazewEf1iQYb25/hz3N5OcK0I+swahJ6wMUsFM'),
(9, 'administrador', '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$qeRAuZKfWa7FBsse5YYAQw$Ou81VzTdbED4hXdOUWSaIWk+m9eMcpBCtsG/7qsYZkc');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

DROP TABLE IF EXISTS `almacen`;
CREATE TABLE IF NOT EXISTS `almacen` (
  `id` int NOT NULL AUTO_INCREMENT,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`id`, `codigo`, `descripcion`) VALUES
(1, 'A1', 'Almacén del Norte'),
(2, 'A2', 'Almacén del Sur\r\n'),
(4, 'A3', 'Almacén del Este'),
(5, 'A4', 'Almacén del Oeste');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20201102202707', '2020-11-02 14:27:59', 666),
('DoctrineMigrations\\Version20201102205644', '2020-11-02 14:57:19', 3841),
('DoctrineMigrations\\Version20201103174405', '2020-11-03 11:45:23', 726),
('DoctrineMigrations\\Version20201103214247', '2020-11-03 15:42:57', 582),
('DoctrineMigrations\\Version20201104235304', '2020-11-04 17:53:10', 1879);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` double NOT NULL,
  `stack` int NOT NULL,
  `almacen_id` int DEFAULT NULL,
  `codigo` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A7BB06159C9C9E68` (`almacen_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `descripcion`, `precio`, `stack`, `almacen_id`, `codigo`, `image`, `updated_at`) VALUES
(1, 'Verduras', 'Verduras', 25, 50, 1, 'V1', '5fa7367b9845d147121271.jpeg', '2020-11-07 18:06:19'),
(2, 'Colgate', 'Pasta dental - Colgate', 18, 50, 2, 'Colgate', '5fa736ab7de0f367164418.jpeg', '2020-11-07 18:07:07'),
(3, 'Papas', 'Papas en bolsa', 8, 60, 4, 'Papas', '5fa736f782ea2641101465.jpeg', '2020-11-07 18:08:23'),
(22, 'Mermelada', 'Mermelada de fresa', 15, 55, 1, 'Mermelada', '5fa73717f038c526284055.jpg', '2020-11-07 18:08:55'),
(23, 'Juguetes', 'Jujguetes para niñas', 50, 60, 2, 'Jug-Comida', '5fa7373da297b774352236.jpeg', '2020-11-07 18:09:33'),
(24, 'Jamón Fud', 'Jamón Fud', 40, 50, 4, 'Jamón-Fud', '5fa7376005e72000818086.jpeg', '2020-11-07 18:10:08'),
(25, 'Kownflakes', 'Kownflakes', 20, 40, 5, 'Kownflakes', '5fa7378c76165212978120.jpeg', '2020-11-07 18:10:52'),
(26, 'Chetos', 'Chetos Takis', 12, 20, 4, 'Chetos-Takis', '5fa737ab9bcc2497977323.jpeg', '2020-11-07 18:11:23'),
(27, 'Chile abanero', 'Chile seco abanero', 40, 20, 4, 'ChileSeco-abanero', '5fa737d07901c180244846.jpg', '2020-11-07 18:12:00'),
(28, 'Cervezas', 'Cervezas', 35, 100, 1, 'Cervezas', '5fa737e477575037073219.jpeg', '2020-11-07 18:12:20');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `FK_A7BB06159C9C9E68` FOREIGN KEY (`almacen_id`) REFERENCES `almacen` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
