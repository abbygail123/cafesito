-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-09-2021 a las 07:14:56
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cafe`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL,
  `categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `categoria`) VALUES
(63, 'cate'),
(65, 'cero para todos'),
(67, 'Prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_compra`
--

CREATE TABLE `historial_compra` (
  `idhistorial` int(11) NOT NULL,
  `idproducto` varchar(20) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL,
  `nombre_producto` varchar(50) NOT NULL,
  `precio_producto` decimal(10,2) NOT NULL,
  `cantidad_comprada` int(11) NOT NULL,
  `total_pagar` decimal(10,2) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen_producto`
--

CREATE TABLE `imagen_producto` (
  `idimagen` varchar(150) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `url_imagen` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `imagen_producto`
--

INSERT INTO `imagen_producto` (`idimagen`, `idproducto`, `url_imagen`) VALUES
('as8b4vreza29kabtdm1p', 58796, 'http://res.cloudinary.com/dauz6sio9/image/upload/v1631399342/as8b4vreza29kabtdm1p.jpg'),
('enjiiordkryqbevz5hzb', 5723, 'http://res.cloudinary.com/dauz6sio9/image/upload/v1631482006/enjiiordkryqbevz5hzb.jpg'),
('zro1j7xn9qxopzrnvxxi', 12069, 'http://res.cloudinary.com/dauz6sio9/image/upload/v1631489341/zro1j7xn9qxopzrnvxxi.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen_usuario`
--

CREATE TABLE `imagen_usuario` (
  `idimagen` varchar(150) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `url_imagen` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `imagen_usuario`
--

INSERT INTO `imagen_usuario` (`idimagen`, `idusuario`, `url_imagen`) VALUES
('ofsxx8np0qvieibjf5qe', 58116, 'http://res.cloudinary.com/dauz6sio9/image/upload/v1631387422/ofsxx8np0qvieibjf5qe.jpg'),
('pfsx35ycfxqbow6xlpow', 9769, 'http://res.cloudinary.com/dauz6sio9/image/upload/v1631387397/pfsx35ycfxqbow6xlpow.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idproducto` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL,
  `precio_compra` decimal(10,2) NOT NULL,
  `precio_venta` decimal(10,2) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `idcategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idproducto`, `idusuario`, `nombre`, `stock`, `precio_compra`, `precio_venta`, `descripcion`, `idcategoria`) VALUES
(5723, 9769, 'ga', 4, '1.00', '2.00', 'ga', 67),
(12069, 9769, 'hi', 2, '99.10', '414.00', 'hola man', 63),
(58796, 58116, 'aa', 4, '2.00', '3.00', 'gaa', 65);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_categoria`
--

CREATE TABLE `sub_categoria` (
  `id_subcategoria` int(11) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `nombre_sub` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sub_categoria`
--

INSERT INTO `sub_categoria` (`id_subcategoria`, `idcategoria`, `nombre_sub`) VALUES
(40, 63, 'sub categoria1'),
(43, 65, 'gaeaa'),
(45, 67, 'siguiente- 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `dni` varchar(8) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `tipo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `apellido`, `dni`, `telefono`, `usuario`, `clave`, `tipo`) VALUES
(9769, 'jhon', 'rodriguez', '13123123', '131231231', 'araujo0003', '1234', 'Cliente'),
(58116, 'dadaddsdad', 'asdasdsdasad', '13123123', '123132312', 'alex', '1234', 'Cliente');

--
-- Disparadores `usuario`
--
DELIMITER $$
CREATE TRIGGER `admin` AFTER UPDATE ON `usuario` FOR EACH ROW BEGIN
    IF new.tipo="Admin" THEN BEGIN
        insert into  vendedor(idusuario,tipo_usuario) values(new.idusuario,new.tipo);
    END; END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `destroy_admin` AFTER UPDATE ON `usuario` FOR EACH ROW BEGIN
    IF new.tipo="Cliente" THEN BEGIN
        DELETE FROM  vendedor WHERE idusuario=new.idusuario;
    END; END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedor`
--

CREATE TABLE `vendedor` (
  `id_vendedor` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `tipo_usuario` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `idventa` int(11) NOT NULL,
  `fecha_venta` date NOT NULL,
  `cantidad_venta` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indices de la tabla `historial_compra`
--
ALTER TABLE `historial_compra`
  ADD PRIMARY KEY (`idhistorial`),
  ADD KEY `historial_usuario` (`idusuario`);

--
-- Indices de la tabla `imagen_producto`
--
ALTER TABLE `imagen_producto`
  ADD PRIMARY KEY (`idimagen`),
  ADD KEY `producto_imagen` (`idproducto`);

--
-- Indices de la tabla `imagen_usuario`
--
ALTER TABLE `imagen_usuario`
  ADD PRIMARY KEY (`idimagen`),
  ADD KEY `imagen_usuario` (`idusuario`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idproducto`),
  ADD KEY `producto_categoria` (`idcategoria`),
  ADD KEY `producto_usuario` (`idusuario`);

--
-- Indices de la tabla `sub_categoria`
--
ALTER TABLE `sub_categoria`
  ADD PRIMARY KEY (`id_subcategoria`),
  ADD KEY `categoria_sub` (`idcategoria`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- Indices de la tabla `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`id_vendedor`),
  ADD KEY `usuario_admin` (`idusuario`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idventa`),
  ADD KEY `venta_producto` (`idproducto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `historial_compra`
--
ALTER TABLE `historial_compra`
  MODIFY `idhistorial` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sub_categoria`
--
ALTER TABLE `sub_categoria`
  MODIFY `id_subcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `vendedor`
--
ALTER TABLE `vendedor`
  MODIFY `id_vendedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `idventa` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `imagen_producto`
--
ALTER TABLE `imagen_producto`
  ADD CONSTRAINT `producto_imagen` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `imagen_usuario`
--
ALTER TABLE `imagen_usuario`
  ADD CONSTRAINT `imagen_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_categoria` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sub_categoria`
--
ALTER TABLE `sub_categoria`
  ADD CONSTRAINT `categoria_sub` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vendedor`
--
ALTER TABLE `vendedor`
  ADD CONSTRAINT `usuario_admin` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
