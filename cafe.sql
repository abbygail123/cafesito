-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2021 a las 03:37:12
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
(77, 'Lacteos'),
(78, 'Dulces'),
(79, 'Bebidas'),
(80, 'Menestra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_venta`
--

CREATE TABLE `historial_venta` (
  `idproducto` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double(10,2) NOT NULL,
  `total` double(10,2) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `historial_venta`
--

INSERT INTO `historial_venta` (`idproducto`, `idusuario`, `cantidad`, `precio`, `total`, `fecha`) VALUES
(34339, 1, 36, 3.00, 108.00, '2021-11-02 08:11:58'),
(9791, 1, 59, 4.00, 236.00, '2021-11-02 08:11:58'),
(5739, 1, 16, 2.00, 32.00, '2021-11-02 08:11:58'),
(9791, 1, 2, 4.00, 8.00, '2021-11-02 08:11:56'),
(34339, 1, 8, 3.00, 24.00, '2021-11-02 11:11:11'),
(34339, 1, 7, 3.00, 21.00, '2021-11-11 07:11:27'),
(5739, 1, 1, 2.00, 2.00, '2021-11-11 14:11:15'),
(3790, 1, 4, 33.00, 132.00, '2021-11-12 17:11:11');

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
('e9soailuuoybysmjmttw', 34339, 'http://res.cloudinary.com/dauz6sio9/image/upload/v1635624339/e9soailuuoybysmjmttw.jpg'),
('fdw1qrv5lxi66epghnyy', 3790, 'http://res.cloudinary.com/dauz6sio9/image/upload/v1636674780/fdw1qrv5lxi66epghnyy.jpg'),
('srifq6kobemsibw6xlzs', 9791, 'http://res.cloudinary.com/dauz6sio9/image/upload/v1635624129/srifq6kobemsibw6xlzs.jpg');

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
('lxo9y6wltxzbwjhg8a4j', 74923, 'http://res.cloudinary.com/dauz6sio9/image/upload/v1636667954/lxo9y6wltxzbwjhg8a4j.jpg'),
('uaxdab4fyjkc3h6xy7cj', 36802, 'http://res.cloudinary.com/dauz6sio9/image/upload/v1635623950/uaxdab4fyjkc3h6xy7cj.jpg'),
('ylnj48miyc5bwmvtxous', 53867, 'http://res.cloudinary.com/dauz6sio9/image/upload/v1635724759/ylnj48miyc5bwmvtxous.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta`
--

CREATE TABLE `oferta` (
  `idOferta` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `fechaOferta` timestamp NOT NULL DEFAULT current_timestamp(),
  `fechaDuracionOferta` datetime NOT NULL DEFAULT current_timestamp(),
  `precioInicial` double(10,2) NOT NULL,
  `totalDescuento` int(11) NOT NULL,
  `precioFinal` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `oferta`
--

INSERT INTO `oferta` (`idOferta`, `idProducto`, `fechaOferta`, `fechaDuracionOferta`, `precioInicial`, `totalDescuento`, `precioFinal`) VALUES
(8313028, 34339, '2021-10-31 12:50:57', '2021-11-02 07:50:00', 3.00, 15, 2.50);

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
(3790, 36802, 'gaaaaa', 223, '12.00', '33.00', 'asdasd', 80),
(9791, 36802, 'Lo que sea macaco', 28, '3.00', '4.00', 'este producto se encuentra con fiebre', 78),
(34339, 36802, 'asdasdasdasdasd', 12, '2.00', '3.00', 'hola', 79);

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
(57, 77, 'a'),
(58, 78, 'a'),
(59, 79, 'c'),
(60, 80, 'Lsfgg');

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
(36802, 'jhon alexander', 'araujo rodriguez', '75656443', '922493377', 'araujo0003', '1234', 'Admin'),
(53867, 'gaaa', 'gaaa', '31312121', '123123123', 'gaaa', 'gaaa', 'Cliente'),
(74923, 'adasddasdas', 'asdasddas', '12312331', '123123213', 'aaaa', 'asdf', 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedor`
--

CREATE TABLE `vendedor` (
  `id_vendedor` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `idventa` int(11) NOT NULL,
  `cantidad_venta` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`idventa`, `cantidad_venta`, `idproducto`) VALUES
(28, 11, 34339);

--
-- Disparadores `venta`
--
DELIMITER $$
CREATE TRIGGER `actualizarStockProducto` AFTER INSERT ON `venta` FOR EACH ROW UPDATE producto set stock = stock - new.cantidad_venta
where producto.idproducto=new.idproducto
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `devolverStockProducto` AFTER DELETE ON `venta` FOR EACH ROW UPDATE producto set stock = stock + old.cantidad_venta
where producto.idproducto=old.idproducto
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`);

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
-- Indices de la tabla `oferta`
--
ALTER TABLE `oferta`
  ADD PRIMARY KEY (`idOferta`),
  ADD KEY `idProducto` (`idProducto`);

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
  ADD KEY `idproducto` (`idproducto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT de la tabla `oferta`
--
ALTER TABLE `oferta`
  MODIFY `idOferta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8313029;

--
-- AUTO_INCREMENT de la tabla `sub_categoria`
--
ALTER TABLE `sub_categoria`
  MODIFY `id_subcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `vendedor`
--
ALTER TABLE `vendedor`
  MODIFY `id_vendedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `idventa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
-- Filtros para la tabla `oferta`
--
ALTER TABLE `oferta`
  ADD CONSTRAINT `oferta_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `venta` (`idproducto`) ON DELETE CASCADE ON UPDATE CASCADE;

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

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
