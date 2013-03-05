-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 05-03-2013 a las 07:36:57
-- Versión del servidor: 5.1.44
-- Versión de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `Taxis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TBACT_SOLICITUD`
--

CREATE TABLE IF NOT EXISTS `TBACT_SOLICITUD` (
  `AC_CODIGO` int(11) NOT NULL,
  `SO_CODIGO` int(11) NOT NULL,
  `US_RUT` varchar(10) NOT NULL,
  `ES_CODIGO` char(1) NOT NULL,
  `COMENTARIO` varchar(100) NOT NULL,
  `AC_HORA` varchar(5) NOT NULL,
  PRIMARY KEY (`AC_CODIGO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `TBACT_SOLICITUD`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TBCHOFER`
--

CREATE TABLE IF NOT EXISTS `TBCHOFER` (
  `CH_RUT` varchar(10) NOT NULL,
  `CH_NOMBRE` varchar(15) NOT NULL,
  `CH_APPAT` varchar(15) NOT NULL,
  `CH_APMAT` varchar(15) NOT NULL,
  `CH_DIRECCION` varchar(40) NOT NULL,
  `CO_CODIGO` int(11) NOT NULL,
  `CH_TELEFONO` varchar(15) NOT NULL,
  PRIMARY KEY (`CH_RUT`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Tabla de Datos de Choferes';

--
-- Volcar la base de datos para la tabla `TBCHOFER`
--

INSERT INTO `TBCHOFER` (`CH_RUT`, `CH_NOMBRE`, `CH_APPAT`, `CH_APMAT`, `CH_DIRECCION`, `CO_CODIGO`, `CH_TELEFONO`) VALUES
('15472646', 'LUIS', 'RAMIREZ', 'QUEUPUL', 'EJERCITO 243 DEPTO 2', 1, '63031479'),
('54', 'LUIS', 'kjkj', 'kjhjkh', 'dshkjdhs', 2, '456789'),
('7567', 'juan', 'martinez', 'ddd', 'av. sr', 3, '757657');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TBCLIENTES`
--

CREATE TABLE IF NOT EXISTS `TBCLIENTES` (
  `CL_RUT` varchar(10) NOT NULL,
  `CL_TIPOC` char(1) NOT NULL,
  `CL_NOMBRE` varchar(60) NOT NULL,
  `CL_TELEFONO` varchar(15) NOT NULL,
  `CL_CORREO` varchar(35) NOT NULL,
  `CL_DIRECCION` varchar(40) NOT NULL,
  `CO_CODIGO` int(11) NOT NULL,
  `CL_CODSOLIC` int(11) NOT NULL,
  PRIMARY KEY (`CL_RUT`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Tabla para almacenar datos del cliente';

--
-- Volcar la base de datos para la tabla `TBCLIENTES`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TBCOMUNA`
--

CREATE TABLE IF NOT EXISTS `TBCOMUNA` (
  `CO_CODIGO` int(11) NOT NULL,
  `CO_DESCRIPCION` varchar(30) NOT NULL,
  PRIMARY KEY (`CO_CODIGO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `TBCOMUNA`
--

INSERT INTO `TBCOMUNA` (`CO_CODIGO`, `CO_DESCRIPCION`) VALUES
(1, 'SANTIAGO'),
(2, 'PROVIDENCIA'),
(3, 'SAN JOAQUIN'),
(4, 'SAN MIGUEL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TBDIA`
--

CREATE TABLE IF NOT EXISTS `TBDIA` (
  `DD_CODIGO` int(11) NOT NULL,
  `DD_NOMBRE` varchar(10) NOT NULL,
  PRIMARY KEY (`DD_CODIGO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `TBDIA`
--

INSERT INTO `TBDIA` (`DD_CODIGO`, `DD_NOMBRE`) VALUES
(1, 'LUNES'),
(2, 'MARTES'),
(3, 'MIERCOLES'),
(4, 'JUEVES'),
(5, 'VIERNES'),
(6, 'SABADO'),
(7, 'DOMINGO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TBHORARIOS`
--

CREATE TABLE IF NOT EXISTS `TBHORARIOS` (
  `HO_CODIGO` int(11) NOT NULL,
  `HO_INICIO` varchar(5) NOT NULL,
  `HO_TERMINO` varchar(5) NOT NULL,
  `DD_CODIGO` int(11) NOT NULL,
  `CH_RUT` varchar(10) NOT NULL,
  PRIMARY KEY (`HO_CODIGO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Tabla de Horarios';

--
-- Volcar la base de datos para la tabla `TBHORARIOS`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TBSOLICITUDES`
--

CREATE TABLE IF NOT EXISTS `TBSOLICITUDES` (
  `SO_CODIGO` int(11) NOT NULL,
  `SO_HORA_SOL` varchar(5) NOT NULL,
  `CL_RUT` varchar(10) NOT NULL,
  `SO_HORA_INIC` varchar(5) NOT NULL,
  `SO_HORA_TERMINO` varchar(5) NOT NULL,
  `ES_CODIGO` char(1) NOT NULL,
  `SO_ORIGEN` varchar(40) NOT NULL,
  `SO_DESTINO` varchar(40) NOT NULL,
  `SO_VALOR` int(11) NOT NULL,
  `VE_PATENTE` varchar(10) NOT NULL,
  PRIMARY KEY (`SO_CODIGO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `TBSOLICITUDES`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TBTIPO_USUARIO`
--

CREATE TABLE IF NOT EXISTS `TBTIPO_USUARIO` (
  `TU_CODIGO` varchar(5) NOT NULL,
  `TU_DESCRIPCION` varchar(20) NOT NULL,
  PRIMARY KEY (`TU_CODIGO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `TBTIPO_USUARIO`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TBUSUARIO`
--

CREATE TABLE IF NOT EXISTS `TBUSUARIO` (
  `US_RUT` varchar(10) NOT NULL,
  `US_NOMBRE` varchar(40) NOT NULL,
  `US_CLAVE` varchar(10) NOT NULL,
  `TU_CODIGO` varchar(5) NOT NULL,
  PRIMARY KEY (`US_RUT`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Tabla de Usuarios';

--
-- Volcar la base de datos para la tabla `TBUSUARIO`
--

INSERT INTO `TBUSUARIO` (`US_RUT`, `US_NOMBRE`, `US_CLAVE`, `TU_CODIGO`) VALUES
('15472646', 'LUIS RAMIREZ', '123123', '12312'),
('16530293', 'Guisela', '123123', ''),
('15472642', 'LUIS', '124', ''),
('67678', 'JUAN', '123123', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TBVEHICULO`
--

CREATE TABLE IF NOT EXISTS `TBVEHICULO` (
  `VE_PATENTE` varchar(10) NOT NULL,
  `VE_MARCA` varchar(20) NOT NULL,
  `VE_ANNO` int(11) NOT NULL,
  `VE_COLOR` varchar(20) NOT NULL,
  `VE_CAPAC` int(11) NOT NULL,
  `CH_RUT` varchar(10) NOT NULL,
  PRIMARY KEY (`VE_PATENTE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `TBVEHICULO`
--

INSERT INTO `TBVEHICULO` (`VE_PATENTE`, `VE_MARCA`, `VE_ANNO`, `VE_COLOR`, `VE_CAPAC`, `CH_RUT`) VALUES
('CHDW78', 'NISSAN', 2010, 'BEIGE', 5, '15472646'),
('DELK89', 'SUUKI', 2008, 'PLATEADO', 4, '7567'),
('DFKIK', 'SS', 2003, 'negro', 10, '54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TB_ESTADO`
--

CREATE TABLE IF NOT EXISTS `TB_ESTADO` (
  `ES_CODIGO` char(1) NOT NULL,
  `ES_DESCRIP` varchar(20) NOT NULL,
  PRIMARY KEY (`ES_CODIGO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `TB_ESTADO`
--

INSERT INTO `TB_ESTADO` (`ES_CODIGO`, `ES_DESCRIP`) VALUES
('A', 'ASIGNADO'),
('E', 'EN TRANSITO'),
('P', 'PENDIENTE'),
('T', 'TERMINADO');
