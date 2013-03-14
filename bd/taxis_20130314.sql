-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 14, 2013 at 07:55 AM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Taxis`
--

-- --------------------------------------------------------

--
-- Table structure for table `TBACT_SOLICITUD`
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
-- Dumping data for table `TBACT_SOLICITUD`
--


-- --------------------------------------------------------

--
-- Table structure for table `TBCHOFER`
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
-- Dumping data for table `TBCHOFER`
--

INSERT INTO `TBCHOFER` (`CH_RUT`, `CH_NOMBRE`, `CH_APPAT`, `CH_APMAT`, `CH_DIRECCION`, `CO_CODIGO`, `CH_TELEFONO`) VALUES
('15472646', 'LUIS', 'RAMIREZ', 'QUEUPUL', 'EJERCITO 243 DEPTO 2', 1, '63031479'),
('54', 'LUIS', 'kjkj', 'kjhjkh', 'dshkjdhs', 2, '456789'),
('7567', 'juan', 'martinez', 'ddd', 'av. sr', 3, '757657');

-- --------------------------------------------------------

--
-- Table structure for table `TBCLIENTES`
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
-- Dumping data for table `TBCLIENTES`
--

INSERT INTO `TBCLIENTES` (`CL_RUT`, `CL_TIPOC`, `CL_NOMBRE`, `CL_TELEFONO`, `CL_CORREO`, `CL_DIRECCION`, `CO_CODIGO`, `CL_CODSOLIC`) VALUES
('15472646-2', '1', 'LUIS RAMIREZ QUEUPUL', '5514580', 'ramirezqueupul@gmail.com', 'Ejercito 243 Depto 2', 1, 0),
('1-9', '1', 'Guisela Alarcon Llano', '5514580', 'guisela.alarcon.llano@gmail.com', 'ejericto 2344', 1, 0),
('16530293-1', '1', 'guise', '786768', 'l@l.cl', 'av. eje', 1, 0),
('1-8', '1', 'ahhh', '6575', 'lra@l.cl', 'esquina 1', 4, 0),
('65466', '1', 'jghjh', 'jkhjkh', 'jhk', 'hk', 0, 0),
('123', '1', 'juan', '551456', 'luis', 'ramir', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `TBCOMUNA`
--

CREATE TABLE IF NOT EXISTS `TBCOMUNA` (
  `CO_CODIGO` int(11) NOT NULL,
  `CO_DESCRIPCION` varchar(30) NOT NULL,
  PRIMARY KEY (`CO_CODIGO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TBCOMUNA`
--

INSERT INTO `TBCOMUNA` (`CO_CODIGO`, `CO_DESCRIPCION`) VALUES
(1, 'SANTIAGO'),
(2, 'PROVIDENCIA'),
(3, 'SAN JOAQUIN'),
(4, 'SAN MIGUEL');

-- --------------------------------------------------------

--
-- Table structure for table `TBDIA`
--

CREATE TABLE IF NOT EXISTS `TBDIA` (
  `DD_CODIGO` int(11) NOT NULL,
  `DD_NOMBRE` varchar(10) NOT NULL,
  PRIMARY KEY (`DD_CODIGO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TBDIA`
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
-- Table structure for table `TBHORARIOS`
--

CREATE TABLE IF NOT EXISTS `TBHORARIOS` (
  `HO_CODIGO` int(11) NOT NULL AUTO_INCREMENT,
  `HO_INICIO` varchar(5) NOT NULL,
  `HO_TERMINO` varchar(5) NOT NULL,
  `DD_CODIGO` int(11) NOT NULL,
  `CH_RUT` varchar(10) NOT NULL,
  PRIMARY KEY (`HO_CODIGO`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Tabla de Horarios' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `TBHORARIOS`
--

INSERT INTO `TBHORARIOS` (`HO_CODIGO`, `HO_INICIO`, `HO_TERMINO`, `DD_CODIGO`, `CH_RUT`) VALUES
(1, '15:30', '16:30', 1, '15472646'),
(2, '4:00', '5:00', 1, '7567');

-- --------------------------------------------------------

--
-- Table structure for table `TBSOLICITUDES`
--

CREATE TABLE IF NOT EXISTS `TBSOLICITUDES` (
  `SO_CODIGO` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `TBSOLICITUDES`
--

INSERT INTO `TBSOLICITUDES` (`SO_CODIGO`, `SO_HORA_SOL`, `CL_RUT`, `SO_HORA_INIC`, `SO_HORA_TERMINO`, `ES_CODIGO`, `SO_ORIGEN`, `SO_DESTINO`, `SO_VALOR`, `VE_PATENTE`) VALUES
(1, '06:55', '16530293-1', '', '', 'P', 'casa', 'destino', 0, ''),
(2, '06:58', '1-8', '', '', 'P', 'chile', 'argentina', 0, ''),
(3, 'hjh', '65466', '', '', 'P', 'jhhkhk', 'jhhkh', 0, ''),
(4, '', '', '', '', 'P', '', '', 0, ''),
(5, '', '', '', '', 'P', '', '', 0, ''),
(6, '', '', '', '', 'P', '', '', 0, ''),
(7, '', '', '', '', 'P', '', '', 0, ''),
(8, '07:05', '15472646-2', '', '', 'P', 'Aricca', 'Iquique', 0, ''),
(9, '07:06', '123', '', '', 'P', '123', '123', 0, ''),
(10, '', '', '', '', 'P', '', '', 0, ''),
(11, '', '', '', '', 'P', '', '', 0, ''),
(12, '', '', '', '', 'P', '', '', 0, ''),
(13, '', '', '', '', 'P', '', '', 0, ''),
(14, '', '', '', '', 'P', '', '', 0, ''),
(15, '', '', '', '', 'P', '', '', 0, ''),
(16, '', '', '', '', 'P', '', '', 0, ''),
(17, '', '', '', '', 'P', '', '', 0, ''),
(18, '', '', '', '', 'P', '', '', 0, ''),
(19, '', '', '', '', 'P', '', '', 0, ''),
(20, '', '', '', '', 'P', '', '', 0, ''),
(21, '07:11', '15472646-2', '', '', 'P', 'MAdrid', 'Paine', 0, ''),
(22, '07:11', '15472646-2', '', '', 'P', 'MAdrid', 'Paine', 0, ''),
(23, '07:12', '15472646-2', '', '', 'P', 'Argentina', 'FRancia', 0, ''),
(24, '07:12', '15472646-2', '', '', 'P', 'Argentina', 'FRancia', 0, ''),
(25, '07:12', '15472646-2', '', '', 'P', 'Argentina', 'FRancia', 0, ''),
(26, '07:12', '15472646-2', '', '', 'P', 'Argentina', 'FRancia', 0, ''),
(27, '07:12', '15472646-2', '', '', 'P', 'Argentina', 'FRancia', 0, ''),
(28, '07:12', '15472646-2', '', '', 'P', 'Argentina', 'FRancia', 0, ''),
(29, '07:21', '15472646-2', '', '', 'P', 'a', 'b', 0, ''),
(30, '07:21', '15472646-2', '', '', 'P', 'a', 'b', 0, ''),
(31, '07:21', '15472646-2', '', '', 'P', 'a', 'b', 0, ''),
(32, '07:23', '15472646-2', '', '', 'P', 'Brasil', 'Mendoza', 0, ''),
(33, '07:24', '15472646-2', '', '', 'P', 'A', 'B', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `TBTIPO_USUARIO`
--

CREATE TABLE IF NOT EXISTS `TBTIPO_USUARIO` (
  `TU_CODIGO` varchar(5) NOT NULL,
  `TU_DESCRIPCION` varchar(20) NOT NULL,
  PRIMARY KEY (`TU_CODIGO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TBTIPO_USUARIO`
--

INSERT INTO `TBTIPO_USUARIO` (`TU_CODIGO`, `TU_DESCRIPCION`) VALUES
('CLI', 'Cliente'),
('OPE', 'OPERADOR');

-- --------------------------------------------------------

--
-- Table structure for table `TBUSUARIO`
--

CREATE TABLE IF NOT EXISTS `TBUSUARIO` (
  `US_RUT` varchar(10) NOT NULL,
  `US_NOMBRE` varchar(40) NOT NULL,
  `US_CLAVE` varchar(100) NOT NULL,
  `TU_CODIGO` varchar(5) NOT NULL,
  PRIMARY KEY (`US_RUT`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Tabla de Usuarios';

--
-- Dumping data for table `TBUSUARIO`
--

INSERT INTO `TBUSUARIO` (`US_RUT`, `US_NOMBRE`, `US_CLAVE`, `TU_CODIGO`) VALUES
('1-9', 'Matias Ramirez', '4297f44b13955235245b2497399d7a93', 'CLI'),
('16530293-1', 'ANDREA ARAYA', '5aeff6b0739a58e1635df9f361fc4f8e', ''),
('15472646-2', 'Luis Ramirez', '4297f44b13955235245b2497399d7a93', 'OPE');

-- --------------------------------------------------------

--
-- Table structure for table `TBVEHICULO`
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
-- Dumping data for table `TBVEHICULO`
--

INSERT INTO `TBVEHICULO` (`VE_PATENTE`, `VE_MARCA`, `VE_ANNO`, `VE_COLOR`, `VE_CAPAC`, `CH_RUT`) VALUES
('CHDW78', 'NISSAN', 2010, 'BEIGE', 5, '15472646'),
('DELK89', 'SUUKI', 2008, 'PLATEADO', 4, '7567'),
('DFKIK', 'SS', 2003, 'negro', 10, '54'),
('DEL89', 'HIUNDAY', 2012, 'negro', 14, '15472646');

-- --------------------------------------------------------

--
-- Table structure for table `TB_ESTADO`
--

CREATE TABLE IF NOT EXISTS `TB_ESTADO` (
  `ES_CODIGO` char(1) NOT NULL,
  `ES_DESCRIP` varchar(20) NOT NULL,
  PRIMARY KEY (`ES_CODIGO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TB_ESTADO`
--

INSERT INTO `TB_ESTADO` (`ES_CODIGO`, `ES_DESCRIP`) VALUES
('A', 'ASIGNADO'),
('E', 'EN TRANSITO'),
('P', 'PENDIENTE'),
('T', 'TERMINADO');
