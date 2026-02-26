-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-02-2026 a las 12:21:40
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
-- Base de datos: `banco`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `DNI` varchar(100) NOT NULL,
  `telefono` int(11) NOT NULL,
  `direccion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `apellido`, `DNI`, `telefono`, `direccion`) VALUES
(1, 'Juan', 'Pérez', '12345678A', 600112233, 'Calle Mayor 1, Madrid'),
(2, 'María', 'García', '23456789B', 611223344, 'Av. de la Constitución 5, Sevilla'),
(3, 'Carlos', 'Rodríguez', '34567890C', 622334455, 'Paseo de Gracia 12, Barcelona'),
(4, 'Ana', 'Martínez', '45678901D', 633445566, 'Calle Almagro 20, Madrid'),
(5, 'Luis', 'Sánchez', '56789012E', 644556677, 'Calle Uría 8, Oviedo'),
(6, 'Elena', 'López', '67890123F', 655667788, 'Plaza del Castillo 3, Pamplona'),
(7, 'Diego', 'Gómez', '78901234G', 666778899, 'Gran Vía 45, Bilbao'),
(8, 'Lucía', 'Díaz', '89012345H', 677889900, 'Calle Colón 15, Valencia'),
(9, 'Javier', 'Hernández', '90123456I', 688990011, 'Calle Real 2, Coruña'),
(10, 'Sofía', 'Ruiz', '01234567J', 699001122, 'Calle Recogidas 10, Granada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE `cuenta` (
  `id_cuenta` int(11) NOT NULL,
  `tipo_cuenta` varchar(20) DEFAULT NULL,
  `saldo` float DEFAULT NULL,
  `fecha_apertura` date DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `cargo` varchar(100) DEFAULT NULL,
  `sucursal` varchar(100) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `nombre`, `cargo`, `sucursal`, `telefono`) VALUES
(1, 'Roberto Gómez', 'Gerente', 'Sucursal Centro', 912345678),
(2, 'Laura Vizcaíno', 'Cajera Principal', 'Sucursal Norte', 915556677),
(3, 'Ricardo Darín', 'Asesor Comercial', 'Sucursal Sur', 923445566),
(4, 'Mónica Ayos', 'Atención al Cliente', 'Sucursal Este', 934556677),
(5, 'Fernando Gago', 'Analista de Riesgos', 'Sede Principal', 945667788),
(6, 'Patricia Sosa', 'Cajera', 'Sucursal Oeste', 956778899),
(7, 'Esteban Quito', 'Seguridad Informatica', 'Sede Principal', 967889900),
(8, 'Rosa Melano', 'Recursos Humanos', 'Sede Principal', 978990011),
(9, 'Armando Casas', 'Mantenimiento', 'Sucursal Centro', 989001122),
(10, 'Aquiles Bailo', 'Auditor Interno', 'Sede Principal', 990112233),
(11, 'Roberto Gómez', 'Gerente', 'Sucursal Centro', 912345678),
(12, 'Laura Vizcaíno', 'Cajera Principal', 'Sucursal Norte', 915556677),
(13, 'Ricardo Darín', 'Asesor Comercial', 'Sucursal Sur', 923445566),
(14, 'Mónica Ayos', 'Atención al Cliente', 'Sucursal Este', 934556677),
(15, 'Fernando Gago', 'Analista de Riesgos', 'Sede Principal', 945667788),
(16, 'Patricia Sosa', 'Cajera', 'Sucursal Oeste', 956778899),
(17, 'Esteban Quito', 'Seguridad Informatica', 'Sede Principal', 967889900),
(18, 'Rosa Melano', 'Recursos Humanos', 'Sede Principal', 978990011),
(19, 'Armando Casas', 'Mantenimiento', 'Sucursal Centro', 989001122),
(20, 'Aquiles Bailo', 'Auditor Interno', 'Sede Principal', 990112233),
(21, 'Roberto Gómez', 'Gerente', 'Sucursal Centro', 912345678),
(22, 'Laura Vizcaíno', 'Cajera Principal', 'Sucursal Norte', 915556677),
(23, 'Ricardo Darín', 'Asesor Comercial', 'Sucursal Sur', 923445566),
(24, 'Mónica Ayos', 'Atención al Cliente', 'Sucursal Este', 934556677),
(25, 'Fernando Gago', 'Analista de Riesgos', 'Sede Principal', 945667788),
(26, 'Patricia Sosa', 'Cajera', 'Sucursal Oeste', 956778899),
(27, 'Esteban Quito', 'Seguridad Informatica', 'Sede Principal', 967889900),
(28, 'Rosa Melano', 'Recursos Humanos', 'Sede Principal', 978990011),
(29, 'Armando Casas', 'Mantenimiento', 'Sucursal Centro', 989001122),
(30, 'Aquiles Bailo', 'Auditor Interno', 'Sede Principal', 990112233);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaccion`
--

CREATE TABLE `transaccion` (
  `id_transaccion` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `tipo` varchar(20) NOT NULL,
  `monto` decimal(12,2) NOT NULL,
  `id_cuenta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`id_cuenta`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `transaccion`
--
ALTER TABLE `transaccion`
  ADD PRIMARY KEY (`id_transaccion`),
  ADD KEY `id_cuenta` (`id_cuenta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD CONSTRAINT `cuenta_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Filtros para la tabla `transaccion`
--
ALTER TABLE `transaccion`
  ADD CONSTRAINT `transaccion_ibfk_1` FOREIGN KEY (`id_cuenta`) REFERENCES `cuenta` (`id_cuenta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
