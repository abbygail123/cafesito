-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 27-08-2021 a las 21:13:40
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

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
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `idcategorias` int(11) NOT NULL AUTO_INCREMENT,
  `categorias` varchar(45) NOT NULL,
  PRIMARY KEY (`idcategorias`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_compra`
--

DROP TABLE IF EXISTS `historial_compra`;
CREATE TABLE IF NOT EXISTS `historial_compra` (
  `idhistorial_compra` int(11) NOT NULL AUTO_INCREMENT,
  `nomre_producto` varchar(45) NOT NULL,
  `precio_produ_uni` decimal(10,2) NOT NULL,
  `cantidad_comprada` int(11) NOT NULL,
  `total_pagar` decimal(10,2) NOT NULL,
  `fecha_compra` date NOT NULL,
  `fk_idproductos` int(11) NOT NULL,
  `fk_idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idhistorial_compra`),
  KEY `fk_historial_compra_productos1_idx` (`fk_idproductos`),
  KEY `fk_historial_compra_usuario1_idx` (`fk_idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_pro`
--

DROP TABLE IF EXISTS `imagenes_pro`;
CREATE TABLE IF NOT EXISTS `imagenes_pro` (
  `idimagenes_pro` int(11) NOT NULL AUTO_INCREMENT,
  `imagenes_procol` varchar(45) DEFAULT NULL,
  `fk_idproductos` int(11) NOT NULL,
  PRIMARY KEY (`idimagenes_pro`),
  KEY `fk_imagenes_pro_productos1_idx` (`fk_idproductos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `idproductos` int(11) NOT NULL AUTO_INCREMENT,
  `nombres_pro` varchar(45) NOT NULL,
  `stock` int(11) NOT NULL,
  `precio_compra` decimal(10,2) NOT NULL,
  `precio_venta` decimal(10,2) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `fk_idcategorias` int(11) NOT NULL,
  PRIMARY KEY (`idproductos`),
  KEY `fk_productos_categorias1_idx` (`fk_idcategorias`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) NOT NULL,
  `nombre_u` varchar(50) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `dni` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `foto` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedor`
--

DROP TABLE IF EXISTS `vendedor`;
CREATE TABLE IF NOT EXISTS `vendedor` (
  `idvendedor` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_vended` varchar(45) NOT NULL,
  `nombre_vended` varchar(45) NOT NULL,
  `apellido_vended` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `dni` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `foto` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idvendedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

DROP TABLE IF EXISTS `venta`;
CREATE TABLE IF NOT EXISTS `venta` (
  `idventa` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `total_compra` decimal(10,2) NOT NULL,
  `cantidad_vender` int(11) NOT NULL,
  `fk_idvendedor` int(11) NOT NULL,
  `fk_idproductos` int(11) NOT NULL,
  PRIMARY KEY (`idventa`),
  KEY `fk_venta_vendedor_idx` (`fk_idvendedor`),
  KEY `fk_venta_productos1_idx` (`fk_idproductos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historial_compra`
--
ALTER TABLE `historial_compra`
  ADD CONSTRAINT `fk_historial_compra_productos1` FOREIGN KEY (`fk_idproductos`) REFERENCES `productos` (`idproductos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_historial_compra_usuario1` FOREIGN KEY (`fk_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `imagenes_pro`
--
ALTER TABLE `imagenes_pro`
  ADD CONSTRAINT `fk_imagenes_pro_productos1` FOREIGN KEY (`fk_idproductos`) REFERENCES `productos` (`idproductos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_productos_categorias1` FOREIGN KEY (`fk_idcategorias`) REFERENCES `categorias` (`idcategorias`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `fk_venta_productos1` FOREIGN KEY (`fk_idproductos`) REFERENCES `productos` (`idproductos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_venta_vendedor` FOREIGN KEY (`fk_idvendedor`) REFERENCES `vendedor` (`idvendedor`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
