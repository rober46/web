-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-12-2024 a las 08:56:55
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `representaciones_guess_eirl`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `ClienteID` int(11) NOT NULL,
  `razónsocial` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ruc` varchar(100) DEFAULT NULL,
  `teléfonoempresa` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contacto` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cargo` varchar(200) DEFAULT NULL,
  `Correo` varchar(100) NOT NULL,
  `numerocelular` varchar(15) DEFAULT NULL,
  `Direccion` varchar(200) DEFAULT NULL,
  `FechaRegistro` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`ClienteID`, `razónsocial`, `ruc`, `teléfonoempresa`, `contacto`, `cargo`, `Correo`, `numerocelular`, `Direccion`, `FechaRegistro`) VALUES
(32, 'colegio', '987456321', '987456', 'lopez rodrigues', 'administracion', 'lopez@gmail.com', '98745665', 'piura/piura/catacaos/av.junin', '01/12/2024'),
(33, 'municipalidad de piura', '98798', '658556', 'juan', 'administador', 'juan@gmail.com', '987456', 'piura/piura/catacaos/av.junin', '01/12/2024'),
(36, 'Municipalidad de Talara', '98745632', '303.4785', 'Piero', 'Administrador ', 'piero@gmail.com', '789654123', 'Piura/Talara/av.loreto', '05/12/2024'),
(42, 'Municipalidad de Chiclayo', '98547621', '12345', 'pepito', 'Soporte Técnico ', 'pepito@gmail.com', '1245236', 'Chiclayo/chiclayo/jr.lurin', '05/12/2024');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `ConfiguracionID` int(11) NOT NULL,
  `Clave` varchar(100) NOT NULL,
  `Valor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratos`
--

CREATE TABLE `contratos` (
  `contratosid` int(11) NOT NULL,
  `fecha` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `proveedor` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `cliente` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `importe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contratos`
--

INSERT INTO `contratos` (`contratosid`, `fecha`, `proveedor`, `cliente`, `descripcion`, `importe`) VALUES
(22, '2024-12-17', 'hp', 'juan', 'impresoras', 8520);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizaciones`
--

CREATE TABLE `cotizaciones` (
  `cotizacionid` int(11) NOT NULL,
  `fecha` varchar(100) DEFAULT NULL,
  `nombrecliente` varchar(100) DEFAULT NULL,
  `cotizacion` text NOT NULL,
  `referencia` text NOT NULL,
  `nota` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `cotizaciones`
--

INSERT INTO `cotizaciones` (`cotizacionid`, `fecha`, `nombrecliente`, `cotizacion`, `referencia`, `nota`) VALUES
(12, '05/12/2024', 'colegio fatima', 'impresoras hp', 'con sus respectiva garantía ', 'que sean todas originales'),
(13, '05/12/2024', 'municipalidad de piura', 'toners', 'con sus respectiva garantía ', 'que sean todas originales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kardex`
--

CREATE TABLE `kardex` (
  `id` int(11) NOT NULL,
  `articulo` varchar(100) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `cant_maxima` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `cant_minima` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `fecha` varchar(100) DEFAULT NULL,
  `detalle` varchar(100) NOT NULL,
  `cantidad` varchar(50) DEFAULT NULL,
  `preciounitario` varchar(50) DEFAULT NULL,
  `preciototal` int(11) DEFAULT 0,
  `cantidadsalida` decimal(10,2) DEFAULT 0.00,
  `preciounitariosalida` decimal(10,2) DEFAULT 0.00,
  `preciototalsalida` int(11) DEFAULT 0,
  `cantidadsaldo` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `preciounitariosaldo` varchar(50) DEFAULT NULL,
  `totalsaldo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `kardex`
--

INSERT INTO `kardex` (`id`, `articulo`, `codigo`, `cant_maxima`, `cant_minima`, `fecha`, `detalle`, `cantidad`, `preciounitario`, `preciototal`, `cantidadsalida`, `preciounitariosalida`, `preciototalsalida`, `cantidadsaldo`, `preciounitariosaldo`, `totalsaldo`) VALUES
(1, 'toners', 'FC4578A', '20', NULL, '17/12/2024', 'hp', '12', '002', 56, 50.00, 150.00, 10, '022', '586', '123'),
(2, 'toners', 'FC4578A', '20', NULL, '17/12/2024', 'hp', '12', '002', 56, 50.00, 150.00, 10, '022', '586', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `NotaID` int(11) NOT NULL,
  `UsuarioID` int(11) NOT NULL,
  `NotaTexto` text DEFAULT NULL,
  `FechaCreacion` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `ProveedorID` int(11) NOT NULL,
  `razonsocial` varchar(100) NOT NULL,
  `ruc` varchar(100) DEFAULT NULL,
  `telefonoempresa` varchar(15) DEFAULT NULL,
  `contacto` varchar(100) DEFAULT NULL,
  `cargo` varchar(200) DEFAULT NULL,
  `correo` varchar(100) NOT NULL,
  `numerocelular` varchar(15) DEFAULT NULL,
  `Direccion` varchar(200) DEFAULT NULL,
  `FechaRegistro` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`ProveedorID`, `razonsocial`, `ruc`, `telefonoempresa`, `contacto`, `cargo`, `correo`, `numerocelular`, `Direccion`, `FechaRegistro`) VALUES
(29, 'hp', '12345', '12345', 'piero', 'administrador', 'piero@gmail.com', '12345', 'piura/piura/la arena/13 de abril', '02/12/2024'),
(32, 'municipalidad lima', '5896433', '685765546', 'pepe', 'adminitrador', 'pepe@gmail.com', '98745632', 'pi', '17/12/2024');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `UsuarioID` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Apellido` varchar(100) DEFAULT NULL,
  `usuarios` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`UsuarioID`, `Nombre`, `Apellido`, `usuarios`, `password`) VALUES
(1, 'roberto', 'sullon', 'roberto', 'roberto'),
(3, 'admin', 'admin', 'admin', 'admin'),
(11, 'lopez', 'juarez', 'lopez', 'lopez'),
(12, 'roberto junior', 'sullon yamunaque', 'roberto@gmail.com', 'roberto');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ClienteID`),
  ADD UNIQUE KEY `Correo` (`Correo`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`ConfiguracionID`),
  ADD UNIQUE KEY `Clave` (`Clave`);

--
-- Indices de la tabla `contratos`
--
ALTER TABLE `contratos`
  ADD PRIMARY KEY (`contratosid`);

--
-- Indices de la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  ADD PRIMARY KEY (`cotizacionid`),
  ADD KEY `ClienteID` (`nombrecliente`),
  ADD KEY `nota` (`nota`);

--
-- Indices de la tabla `kardex`
--
ALTER TABLE `kardex`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`NotaID`),
  ADD KEY `UsuarioID` (`UsuarioID`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`ProveedorID`),
  ADD UNIQUE KEY `Correo` (`correo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`UsuarioID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `ClienteID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `ConfiguracionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contratos`
--
ALTER TABLE `contratos`
  MODIFY `contratosid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  MODIFY `cotizacionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `kardex`
--
ALTER TABLE `kardex`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `NotaID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `ProveedorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `UsuarioID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`UsuarioID`) REFERENCES `usuarios` (`UsuarioID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
