-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-04-2019 a las 23:57:19
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbsistemamejorado`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrar_ordenes`
--

CREATE TABLE `administrar_ordenes` (
  `idadministrar_ordenes` int(11) NOT NULL,
  `idproveedores` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idprograma` int(11) NOT NULL,
  `num_orden` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `num_comprobante` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `titulo_orden` varchar(80) NOT NULL,
  `descripcion_orden` varchar(100) NOT NULL,
  `tipo_impuesto` varchar(20) NOT NULL,
  `fecha_hora` date NOT NULL,
  `impuesto` decimal(11,2) NOT NULL,
  `subtotal` decimal(11,2) NOT NULL,
  `descuento_total` decimal(11,2) NOT NULL,
  `monto_total` decimal(11,2) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancos`
--

CREATE TABLE `bancos` (
  `idbancos` int(11) NOT NULL,
  `clasificacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_banco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `referencia` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `condicion` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `bancos`
--

INSERT INTO `bancos` (`idbancos`, `clasificacion`, `nombre_banco`, `referencia`, `condicion`) VALUES
(1, 'Bancos Comerciales  ', 'Banco de Honduras,  S.A. ', 'Honduras', 1),
(2, 'Instituciones de Seguros ', ' Banrural  Honduras,  Sociedad  Anonima ', 'Seguros Banrural', 1),
(3, 'Organizaciones Privadas de Desarrollo Financieras', ' Proyectos  e Iniciativas  Locales para el Autodes', 'PILARH, OPDF', 1),
(4, 'Fondos Privados de Pensiones', 'Administradora de Fondos de Pensiones  Atlantida,', 'AFP Atlantida', 1),
(5, 'Fondos Privados de Pensiones', 'Administradora de Fondos de Pensiones  Ficohsa,  S', 'Ficohsa Pensiones  y Censantias', 1),
(6, 'Fondos Privados de Pensiones ', 'Administradora de Fondos de Pensiones  y Cesantias', 'BAC|Pensiones', 1),
(7, 'Instituciones de Seguros ', 'AIG Seguros Guatemala, S.A. Sucursal  Honduras Seg', 'AIG SEGUROS ', 1),
(8, 'Procesadoras de Tarjetas de Credito', 'ALCANCE,  S.A. de C.V. ', 'Alcance', 1),
(9, 'Almacenes de Deposito', 'Almacenadora Hondureña, S.A.', 'Almahsa', 1),
(10, 'Almacenes de Deposito', 'Almacenes  de Deposito Continental, S.A.', 'Aldeconsa ', 1),
(11, 'Almacenes de Deposito', 'Almacenes  de Deposito,  S.A. ', 'Aldesa ', 1),
(12, 'Almacenes de Deposito', 'Almacenes  Generales  de Depósitos  de Cafe, S.A.', 'Almacaf', 1),
(13, 'Sociedades Financieras', 'Arrendamientos y Creditos Atlantida,  S.A. ', 'Acresa ', 1),
(14, 'Organizaciones Privadas de Desarrollo Financieras', 'Asociacion  Familia y Medio Ambiente, OPDF ', 'FAMA', 1),
(15, 'Bancos Comerciales  ', 'Banco Atlantida,  S.A. ', 'Bancatlan ', 1),
(16, 'Bancos Comerciales  ', 'Banco Azteca de Honduras,  S.A.', 'Banco Azteca', 1),
(17, 'Bancos Estatales', 'Banco Central de Honduras', 'BCH', 1),
(18, 'Bancos Comerciales  ', 'Banco de America Central Honduras,  S. A. ', 'Bac|Honduras', 1),
(19, 'Bancos Comerciales  ', 'Banco de Desarrollo  Rural Honduras,  S.A. ', 'Banrural', 1),
(20, 'Bancos Comerciales  ', 'Banco de los Trabajadores, S.A.', 'Bancotrab ', 1),
(21, 'Bancos Comerciales  ', 'Banco de Occidente, S.A.', 'Bancocci ', 1),
(22, 'Bancos Comerciales  ', 'Banco del Pais, S.A.', 'Banpais ', 1),
(23, 'Bancos Comerciales  ', 'Banco Financiera  Centroamericana, S.A. ', 'Ficensa ', 1),
(24, 'Bancos Comerciales', 'Banco Financiera  Comercial  Hondureña, S.A.', 'Ficohsa', 1),
(25, 'Bancos Comerciales', 'Banco Hondureño  del Cafe, S.A.', 'Banhcafe', 1),
(26, 'Banca de Segundo Piso', 'Banco Hondureño  para la Produccion y la Vivienda', 'Banhprovi', 1),
(27, 'Bancos Comerciales  ', 'Banco Lafise Honduras,  ', 'Lafise ', 1),
(28, 'Bancos Estatales', 'Banco Nacional  de Desarrollo  Agricola ', 'Banadesa', 1),
(29, 'Bancos Comerciales  ', 'Banco Popular, S.A.', 'Banco Popular', 1),
(30, 'Bolsa de Valores', 'Bolsa Centroamericana de Valores, S.A. ', 'BCV', 1),
(31, 'Casas de Bolsas', 'Casa de Bolsa de Valores, S.A. ', 'Cabval', 1),
(32, 'Sociedades Financieras', 'Compañia  Financiera,  S.A.', 'Cofisa', 1),
(33, 'Almacenes de Deposito', 'Compañía Almacenadora, S.A.', 'Coalsa', 1),
(34, 'Administradora de Fondos de Garantia', 'Confianza  Sociedad  Administradora de Fondos de G', 'Confianza  SA-FGR', 1),
(35, 'Casas de Bolsas', 'Continental Casa de Bolsa, S.A.', 'Continental', 1),
(36, 'Procesadoras de Tarjetas de Credito', 'Corporacion de Creditos Atlantida,  S.A. de C.V.', 'Creditlan', 1),
(37, 'Casas de Cambio', 'Corporacion de Inversiones  Nacionales, S.A. ', 'Coinsa', 1),
(38, 'Sociedades Financieras', 'Corporacion Financiera  Internacional, S.A. ', 'Cofinter ', 1),
(39, 'Sociedades Remesadoras de Dinero', 'Correo y Remesas  Electronicas, S.A. ', 'Corelsa ', 1),
(40, 'Procesadoras de Tarjetas de Credito', 'Credomatic de Honduras,  S.A. ', 'Credomatic ', 1),
(41, 'Casas de Cambio', 'Divisas Corporativas-Casa de Cambio, S.A. ', 'Ficohsa Casa de Cambio', 1),
(42, 'Centrales de Riesgo Privadas', 'Equifax Honduras  - Central de Riesgo Privada, S.A', 'Equifax Honduras', 1),
(43, 'Sociedades Remesadoras de Dinero', 'Expressnet  Remesadora Honduras,  S.A. ', 'Expressnet,  S.A.', 1),
(44, 'Sociedades Remesadoras de Dinero', 'Ficohsa Remesas,  S.A.', 'Ficohsa Remesas', 1),
(45, 'Sociedades Financieras', 'Financiera  Codimersa, S.A. ', 'Codimersa ', 1),
(46, 'Sociedades Financieras', 'Financiera  Credi Q, S.A.', 'Credi Q ', 1),
(47, 'Sociedades Financieras', 'Financiera  Finca Honduras,  S.A.', 'Finca', 1),
(48, 'Sociedades Financieras', 'Financiera  Insular, S.A. ', 'Finisa ', 1),
(49, 'Sociedades Financieras', 'Financiera  Popular Ceibeña,  S.A.', 'FPC', 1),
(50, 'Sociedades Financieras', 'Financiera  Solidaria, S.A.', 'Finsol ', 1),
(51, 'Sociedades Calificadoras de Riesgo', 'Fitch Centroamerica, S.A.', 'Fitch Centroamerica ', 1),
(52, 'Casas de Bolsas', 'Fomento Financiero,  S.A.', 'Fomento Financiero', 1),
(53, 'Organizaciones Privadas de Desarrollo Financieras', 'Fondo para el Desarrollo  Local de Honduras,  OPDF', 'CREDISOL,  OPDF', 1),
(54, 'Organizaciones Privadas de Desarrollo Financieras', 'Fundacion  Microfinanciera Hermandad de Honduras, ', 'HDH ? OPDF', 1),
(55, 'Organizaciones Privadas de Desarrollo Financieras', 'Fundacion  para el Desarrollo  de Honduras  Vision', 'FUNED', 1),
(56, 'Fondos Privados de Pensiones ', 'Instituto de Prevision Militar', 'IPM ', 1),
(57, 'Fondos Privados de Pensiones ', 'Instituto de Prevision Social de los Empleados  de', 'INPREUNAH', 1),
(58, 'Fondos Privados de Pensiones', 'Instituto Hondureño  de Seguridad  Social', 'IHSS', 1),
(59, 'Fondos Privados de Pensiones ', 'Instituto Nacional  de Jubilaciones y Pensiones  d', 'INJUPEMP ', 1),
(60, 'Fondos Privados de Pensiones ', 'Instituto Nacional  de Prevision del Magisterio', 'INPREMA', 1),
(61, 'Instituciones de Seguros ', 'Interamericana de Seguros, S.A. ', 'Ficohsa Seguros ', 1),
(62, 'Oficinas de Representacion', 'Laad Americas, N.V.', 'Laad', 1),
(63, 'Casas de Bolsas', 'Lafise, Valores de Honduras,  S.A. ', 'Lafise', 1),
(64, 'Instituciones de Seguros ', 'MAPFRE|SEGUROS HONDURAS, S.A. ', 'MAPFRE|SEGUROS ', 1),
(65, 'Sociedades Financieras', 'Organizacion de Desarrollo  Empresarial Femenino  ', 'ODEF Financiera', 1),
(66, 'Sociedades Calificadoras de Riesgo', 'Pacific Credit Rating, S.A. de C.V.', 'Pacific Credit Rating ', 1),
(67, 'Instituciones de Seguros ', 'Pan American  Life Insurance  Company', 'Palic ', 1),
(68, 'Casas de Bolsas', 'Promociones e Inversiones  en Bolsa, S.A. ', 'Probolsa ', 1),
(69, 'Casas de Bolsas', 'Promotora  Bursatil, S.A.', 'Probursa', 1),
(70, 'Fondos Privados de Pensiones ', 'Regimen de Aportaciones Privadas', 'RAP', 1),
(71, 'Sociedades Remesadoras de Dinero', 'Remesadora El Hermano  Lejano Express, S.A. ', 'Remesadora EHLEXSA', 1),
(72, 'Casas de Cambio', 'Roble Viejo, S.A.', 'Roviesa', 1),
(73, 'Instituciones de Seguros ', 'Seguros Atlantida,  S.A.', 'Atlantida', 1),
(74, 'Instituciones de Seguros ', 'Seguros Bolivar Honduras,  S.A.', 'Seguros Davivienda ', 1),
(75, 'Instituciones de Seguros ', 'Seguros Continental, S.A.', 'Continental ', 1),
(76, 'Instituciones de Seguros ', 'Seguros Crefisa, S.A. ', 'Crefisa ', 1),
(77, 'Instituciones de Seguros ', 'Seguros del Pais, S.A', 'Del Pais', 1),
(78, 'Instituciones de Seguros ', 'Seguros Equidad, S.A. ', 'Seguros Equidad ', 1),
(79, 'Instituciones de Seguros ', 'Seguros Lafise (Honduras), Sociedad  Anonima ', 'Seguros Lafise', 1),
(80, 'Sociedades Remesadoras de Dinero', 'Servigiros  Remesadora, S.A.', 'Servigiros ', 1),
(81, 'Bancos Comerciales  ', 'Sociedad  Anonima Banco Promerica,  S.A.', 'Promerica ', 1),
(82, 'Bancos Comerciales  ', 'Sociedad  Anonima Banco Davivienda Honduras,  ', 'Davivienda ', 1),
(83, 'Sociedades Calificadoras de Riesgo', 'Sociedad  Clasificadora de Riesgo Honduras,   S.A.', 'SC Riesgo Honduras ', 1),
(84, 'Casas de Bolsas', 'Sonival, Casa de Bolsa, S.A. ', 'Sonival', 1),
(85, 'Centrales de Riesgo Privadas', 'TransUnion  Honduras  - Buro de Credito, S.A.', 'TransUnion', 1),
(86, 'Procesadoras de Tarjetas de Credito', 'Ventas Internacionales, S.A.', 'Visa ', 1),
(87, 'Sociedades Calificadoras de Riesgo', 'Zumma Rating S.A. de C.V. Clasificadora de Riesgo ', 'Zumma Ratings', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compromisos`
--

CREATE TABLE `compromisos` (
  `idcompromisos` int(11) NOT NULL,
  `idprograma` int(11) DEFAULT NULL,
  `idproveedores` int(11) DEFAULT NULL,
  `fecha_hora` date DEFAULT NULL,
  `numfactura` varchar(20) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `total_compra` decimal(11,2) DEFAULT NULL,
  `condicion` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `compromisos`
--

INSERT INTO `compromisos` (`idcompromisos`, `idprograma`, `idproveedores`, `fecha_hora`, `numfactura`, `total_compra`, `condicion`) VALUES
(32, 6, 11, '2019-02-12', '1000-01-1457888', '31357.17', 0),
(33, 3, 13, '2019-02-12', '01457845781258', '500.00', 0),
(34, 12, 138, '2019-02-13', '000-001-01-00019218', '1143300.00', 0),
(35, 5, 21, '2019-02-13', '0001555443212', '688.50', 1),
(36, 1, 9, '2019-02-20', '1015-1025-1000000', '20001545.52', 1),
(37, 1, 9, '2019-02-24', '778', '0.00', 1),
(38, 1, 9, '2019-02-24', '1111', '150.00', 1),
(39, 2, 10, '2019-02-27', '45454545454', '162362.45', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `idconfiguracion` int(11) NOT NULL,
  `rango` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Nombre` varchar(80) CHARACTER SET utf8 NOT NULL,
  `Cargo` varchar(80) CHARACTER SET utf8 NOT NULL,
  `condicion` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`idconfiguracion`, `rango`, `Nombre`, `Cargo`, `condicion`) VALUES
(1, 'Contralmirante', 'EFRAIN MANN HERNÁNDEZ', 'Comandante General', 1),
(2, 'Capitan de Fragata C.G.', 'ERNESTO ANTONIO AVILA KATTAN', 'Pagador General ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contabilidad`
--

CREATE TABLE `contabilidad` (
  `idcontabilidad` int(11) NOT NULL,
  `idadministrar_ordenes` int(11) DEFAULT NULL,
  `idctasbancarias` int(11) DEFAULT NULL,
  `tipo_pago` varchar(25) DEFAULT NULL,
  `numero_transferencia` int(11) DEFAULT NULL,
  `debitos` varchar(75) DEFAULT NULL,
  `creditos` varchar(75) DEFAULT NULL,
  `contabilidad` varchar(25) DEFAULT NULL,
  `fechacreacion` datetime DEFAULT NULL,
  `fecha_actualizacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crear_acuerdo`
--

CREATE TABLE `crear_acuerdo` (
  `idcrear_acuerdo` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idproveedores` int(11) NOT NULL,
  `idprograma` int(11) NOT NULL,
  `fecha_hora` date NOT NULL,
  `tipo_documento` varchar(15) COLLATE utf8mb4_spanish_ci NOT NULL,
  `numdocumento` varchar(15) COLLATE utf8mb4_spanish_ci NOT NULL,
  `numcomprobante` varchar(15) COLLATE utf8mb4_spanish_ci NOT NULL,
  `total_importe` decimal(12,2) NOT NULL,
  `estado` varchar(12) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ctasbancarias`
--

CREATE TABLE `ctasbancarias` (
  `idctasbancarias` int(11) NOT NULL,
  `cuentapg` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `bancopg` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `tipoctapg` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `numctapg` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fondos_disponibles` decimal(12,2) DEFAULT NULL,
  `condicion` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ctasbancarias`
--

INSERT INTO `ctasbancarias` (`idctasbancarias`, `cuentapg`, `bancopg`, `tipoctapg`, `numctapg`, `fondos_disponibles`, `condicion`) VALUES
(1, 'Pagaduria Fuerza Naval', 'Banco del Pais', 'Ahorro', '215-990-007-350', '0.00', 1),
(2, 'Fuerzas Armadas de Honduras / Fuerza Naval / Haberes de Tropa', 'Banco Central de Honduras', 'Cheques', '11101-01-000989-8', '0.00', 1),
(3, 'Fuerzas Armadas de Honduras / Fuerza Naval / Fondo de Inversión', 'Banco Central de Honduras', 'Cheques', '11101-01-000990-1', '0.00', 1),
(4, 'Fuerzas Armadas de Honduras / Fuerza Naval / Apoyo Institucional', 'Banco Central de Honduras', 'Cheques', '11101-01-000991-1', '0.00', 1),
(5, 'Fuerzas Armadas de Honduras / Fuerza Naval / Funcionamiento', 'Banco Central de Honduras', 'Cheques', '11101-01-000992-8', '0.00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compromisos`
--

CREATE TABLE `detalle_compromisos` (
  `iddetalle_compromisos` int(11) NOT NULL,
  `idcompromisos` int(11) NOT NULL,
  `idpresupuesto_disponible` int(11) NOT NULL,
  `valor` decimal(11,2) NOT NULL,
  `condicion` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_compromisos`
--

INSERT INTO `detalle_compromisos` (`iddetalle_compromisos`, `idcompromisos`, `idpresupuesto_disponible`, `valor`, `condicion`) VALUES
(30, 32, 1, '1000.52', 0),
(31, 32, 2, '144.58', 0),
(32, 32, 3, '14478.70', 0),
(33, 32, 4, '14478.50', 0),
(34, 32, 5, '1254.87', 0),
(35, 33, 21, '100.00', 0),
(36, 33, 22, '100.00', 0),
(37, 33, 23, '100.00', 0),
(38, 33, 24, '100.00', 0),
(39, 33, 25, '100.00', 0),
(40, 34, 64, '1143300.00', 0),
(41, 35, 1, '110.00', 1),
(42, 35, 2, '145.00', 1),
(43, 35, 3, '145.00', 1),
(44, 35, 4, '111.50', 1),
(45, 35, 5, '177.00', 1),
(46, 36, 1, '10000000.00', 1),
(47, 36, 2, '1545.52', 1),
(48, 36, 3, '10000000.00', 1),
(49, 37, 2, '15.00', 0),
(50, 38, 1, '150.00', 1),
(51, 39, 1, '15454.00', 1),
(52, 39, 2, '145454.00', 1),
(53, 39, 3, '1454.45', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_crear_acuerdo`
--

CREATE TABLE `detalle_crear_acuerdo` (
  `iddetalle_crear_orden` int(11) NOT NULL,
  `idcrear_acuerdo` int(11) NOT NULL,
  `idpresupuesto_disponible` int(11) NOT NULL,
  `monto` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ingreso`
--

CREATE TABLE `detalle_ingreso` (
  `iddetalle_ingreso` int(11) NOT NULL,
  `idingreso` int(11) DEFAULT NULL,
  `idpresupuesto_disponible` int(11) DEFAULT NULL,
  `monto` decimal(12,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Disparadores `detalle_ingreso`
--
DELIMITER $$
CREATE TRIGGER `tr_actualizar_disponible` AFTER INSERT ON `detalle_ingreso` FOR EACH ROW BEGIN
    UPDATE presupuesto_disponible SET fondos_disponibles = fondos_disponibles + NEW.monto
    WHERE presupuesto_disponible.idpresupuesto_disponible = NEW.idpresupuesto_disponible;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_orden`
--

CREATE TABLE `detalle_orden` (
  `iddetalle_orden` int(11) NOT NULL,
  `idadministrar_ordenes` int(11) DEFAULT NULL,
  `idpresupuesto_disponible` int(11) DEFAULT NULL,
  `unidad` varchar(20) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `precio_unitario` decimal(11,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Disparadores `detalle_orden`
--
DELIMITER $$
CREATE TRIGGER `tr_actualizar_presupuesto_anual` AFTER INSERT ON `detalle_orden` FOR EACH ROW BEGIN
    UPDATE presupuesto_disponible SET presupuesto_anual = presupuesto_anual - NEW.cantidad * NEW.precio_unitario
    WHERE presupuesto_disponible.idpresupuesto_disponible = NEW.idpresupuesto_disponible;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dtransf_ctaspg`
--

CREATE TABLE `dtransf_ctaspg` (
  `dtransf_ctaspg` int(11) NOT NULL,
  `idtransferidoctaspg` int(11) NOT NULL,
  `idctasbancarias` int(11) NOT NULL,
  `num_precompromiso` int(11) NOT NULL,
  `valor` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_orden`
--

CREATE TABLE `factura_orden` (
  `idfactura_orden` int(11) NOT NULL,
  `idadministrar_ordenes` int(11) NOT NULL,
  `num_factura` varchar(11) NOT NULL,
  `fecha_factura` date NOT NULL,
  `valor_factura` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso`
--

CREATE TABLE `ingreso` (
  `idingreso` int(11) NOT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  `numf01` int(11) DEFAULT NULL,
  `total_importe` decimal(11,2) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ingreso`
--

INSERT INTO `ingreso` (`idingreso`, `idusuario`, `fecha_hora`, `numf01`, `total_importe`, `estado`) VALUES
(1, 1, '2019-01-09 00:00:00', 777, '12000000.00', 'Aceptado'),
(2, 1, '2019-02-12 00:00:00', 770, '12000000.00', 'Aceptado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `idpermiso` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`idpermiso`, `nombre`) VALUES
(1, 'Escritorio'),
(2, 'Compromisos Pendientes'),
(3, 'ADMON O/C'),
(4, 'Transferencia BCH'),
(5, 'Contabilidad'),
(6, 'SIAFI'),
(7, 'Documentos Respaldos'),
(8, 'Reportes Compromisos'),
(9, 'Configuraciones '),
(10, 'Acceso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presupuesto_disponible`
--

CREATE TABLE `presupuesto_disponible` (
  `idpresupuesto_disponible` int(11) NOT NULL,
  `nombre_objeto` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `grupo` int(11) NOT NULL,
  `subgrupo` int(11) NOT NULL,
  `codigo` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `presupuesto_anual` decimal(12,2) NOT NULL,
  `fondos_disponibles` decimal(15,2) DEFAULT NULL,
  `condicion` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `presupuesto_disponible`
--

INSERT INTO `presupuesto_disponible` (`idpresupuesto_disponible`, `nombre_objeto`, `grupo`, `subgrupo`, `codigo`, `presupuesto_anual`, `fondos_disponibles`, `condicion`) VALUES
(1, 'Sueldos Básicos', 11, 1112, '11100', '1000.00', '0.00', 1),
(2, 'Adicionales', 11, 400, '11400', '2000.00', '0.00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE `programa` (
  `idprograma` int(11) NOT NULL,
  `codigop` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombrep` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `cargar` varchar(70) COLLATE utf8mb4_spanish_ci NOT NULL,
  `condicion` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `programa`
--

INSERT INTO `programa` (`idprograma`, `codigop`, `nombrep`, `cargar`, `condicion`) VALUES
(1, '90-11-03-02', 'BANACORT', 'CARGADO A LA BASE NAVAL DE PUERTO CORTES', 1),
(2, '90-11-03-03', 'BANAMAP', 'CARGADO A LA BASE NAVAL DE AMAPALA', 1),
(3, '90-11-03-04', 'BANACAST', 'CARGADO A LA BASE NAVAL DE PUERTO CASTILLA', 1),
(4, '90-11-03-05', 'CEN', 'CARGADO AL CENTRO DE ESTUDIOS NAVALES', 1),
(5, '90-11-03-06', 'ANH', 'CARGADO A LA ACADEMIA NAVAL DE HONDURAS', 1),
(6, '90-11-03-07', '1ER BIM', 'CARGADO AL 1ER BATALLON DE INFANTERIA DE MARINA', 1),
(7, '90-11-03-08', 'BANACAR', 'CARGADO A LA BASE NAVAL DE CARATASCA', 1),
(8, '90-11-03-09', 'BANAGUA', 'CARGADO A LA BASE NAVAL DE GUANAJA', 1),
(9, '90-11-03-10', 'ECAMAN', 'CARGADO A LA ESCUELA DE CAPACITACION DE MANDOS NAVALES', 1),
(10, '90-11-03-11', 'ESNA', 'CARGADO A LA ESCUADRA NAVAL', 1),
(11, '90-11-03-12', '2DO BIM', 'CARGADO AL 2DO BATALLON DE INFANTERIA DE MARINA', 1),
(12, '90-11-03-01', 'CMD GENERAL', 'CARGADO A LA COMANDANCIA GENERAL DE LA FUERZA NAVAL ', 1),
(13, '90-11-03-14', 'CAN', 'CARGADO AL CENTRO DE ADIESTRAMIENTO NAVAL', 1),
(14, '90-11-03-15', 'C.G.N', 'CARGADO AL CUARTEL GENERAL NAVAL', 1),
(15, '90-11-03-13', 'ESCUELA DE BUCEO', 'CARGADO A LA ESCUELA DE BUCEO', 1),
(16, '90-11-03-16', 'FEN', 'CARGADO AL 1ER BATALLON DE FUERZAS ESPECIALES NAVALES', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `idproveedores` int(11) NOT NULL,
  `casa_comercial` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_banco` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `num_cuenta` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_cuenta` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `condicion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`idproveedores`, `casa_comercial`, `nombre_banco`, `num_cuenta`, `tipo_cuenta`, `imagen`, `condicion`) VALUES
(9, 'Auto Partes Reaya S.A. de  C.V.', 'Banco de Occidente, S.A.', '11-201-003553-2', 'Cheques', '1548792537.jpg', 1),
(10, 'Autosuspension / Rafael Rodas Corrales', 'Banco de America Central Honduras,  S. A.', '730078331', 'Cheques', '1550502488.jpg', 1),
(11, 'Az Comercial S. de R.L.', 'Banco de Occidente, S.A.', '11402013075-5', 'Cheques', '1550502503.jpg', 1),
(13, 'Base Naval De Puerto Castilla', 'Banco del Pais, S.A.', '01-635-000079-0', 'Cheques', '', 1),
(14, 'Base Naval De Puerto Cortes', 'Banco del Pais, S.A.', '01-070-000126-0', 'Cheques', '', 1),
(15, 'Cam International Honduras', 'Banco Financiera  Comercial  Hondure?a, S.A. ', '200002689404-', 'Ahorros', '', 1),
(16, 'Casa Comercial Mathews, S.A de C.V. (CEMCOL)', 'Banco del Pais, S.A.', '01299000003-0', 'Cheques', '', 1),
(17, 'Casa Eventos S. de R.L. de C.V.', 'Banco de America Central Honduras,  S. A. ', '730323501', 'Ahorros', '', 1),
(18, 'Casa Rafael ', 'Banco Atlantida,  S.A. ', '3100036759', 'Cheques', '1', 1),
(19, 'Central De Mangueras S.A (Pto Cortes)', 'Banco de America Central Honduras,  S. A. ', '90173850-1', 'Cheques', '', 1),
(20, 'Central De Mangueras S.A (Tocoa)', 'Banco Atlantida,  S.A. ', '110013295-8', 'Cheques', '', 1),
(21, 'Central De Turbos E Inversiones De Honduras', 'Banco de America Central Honduras,  S. A. ', '72908848-1', 'Cheques', '', 1),
(22, 'Centro De Adiestramiento Militar Del Ejercito', 'Banco del Pais, S.A.', '01-370-000078-1', 'Cheques', '', 1),
(23, 'Centro Experimental de Desarrollo Agropecuario Y Conservaci?n Ecol?gica', 'Banco del Pais, S.A.', '01-345-000087-9', 'Cheques', '', 1),
(24, 'Centro Ferretero Tornifesa S. de R.L. De C.V.', 'Sociedad  Anonima Banco Davivienda Honduras', '601-014893-4', 'Cheques', '', 1),
(25, 'Centro Industrial y Tecnico del Color S. De R.L.', 'Banco de Occidente, S.A.', '11907000901-2', 'Cheques', '', 1),
(26, 'Comcel', 'Banco del Pais, S.A.', '21-300-0224124', 'Cheques', '', 1),
(27, 'Comercial Genesis y Asociados S. de R.L.  Comercial Genesa', 'Banco de America Central Honduras,  S. A. ', '730216691', 'Cheques', '', 1),
(28, 'Comercial Ultramotor', 'Banco Atlantida,  S.A. ', '1100231487', 'Cheques', '', 1),
(29, 'Comercial Yoly S.de R.L.', 'Banco de Desarrollo  Rural Honduras,  S.A. ', '0590101001770-0', 'Cheques', '', 1),
(30, 'Comercializaciones Q S De R. L. de C.V.', 'Banco del Pais, S.A.', '01600000815-6', 'Cheques', '', 1),
(31, 'Comercializadora El Mueble S de R.L. (Coelmu S. de R.L.)', 'Banco de America Central Honduras,  S. A. ', '10535003-1', 'Cheques', '', 1),
(32, 'Comisariato IPM', 'Banco del Pais, S.A.', '01-599-001037-4', 'Cheques', '', 1),
(33, 'Constructora Rivera ', 'Banco de los Trabajadores, S.A.', '21705000009-1', 'Cheques', '', 1),
(34, 'Consultoria, Supervision Y Construccion De Obras S. de R.L.', 'Banco de America Central Honduras,  S. A. ', '90199010-1', 'Ahorros', '', 1),
(35, 'Corporacion Industrial Farmaceutica S.A. de C.V', 'Banco Lafise Honduras', '11150300007-6', 'Cheques', '', 1),
(36, 'Darwin Antonio Velasquez Arias ', 'Banco del Pais, S.A.', '21-304-000874-0', 'Ahorros', '', 1),
(37, 'David Humberto Owen Garcia/Norit', 'Banco Hondure?o  del Cafe, S.A.', '160400000-2', 'Cheques', '', 1),
(38, 'Dental Pro', 'Banco de America Central Honduras,  S. A. ', '730134521', 'Cheques', '', 1),
(39, 'Dimafer y Electricos, S. de. R.L.', 'Banco Financiera  Comercial  Hondure?a, S.A. ', '20000271888-9', 'Cheques', '', 1),
(40, 'DISPROA', 'Banco Financiera  Comercial  Hondure?a, S.A. ', '0030010007023-2', 'Cheques', '', 1),
(41, 'Distribuciones Diversas de Centro America S. De R.L.', 'Banco Lafise Honduras', '11450300076-7', 'Cheques', '', 1),
(42, 'Distribuciones Valencia', 'Banco de Occidente, S.A.', '21401142153-6', 'Ahorros', '', 1),
(43, 'Distribuidora Chorotega ', 'Banco de America Central Honduras,  S. A. ', '900193401', 'Ahorros', '', 1),
(44, 'Distribuidora Comercial S.A DICOSA', 'Banco Financiera  Comercial  Hondure?a, S.A. ', '0011027042-9', 'Cheques', '', 1),
(45, 'Distribuidora de Materiales de Sula S.A. de C.V. (DIDEMA).', 'Banco del Pais, S.A.', '01001002411-2', 'Cheques', '', 1),
(46, 'Distribuidora De Productos y Servicios Pizzati', 'Sociedad  Anonima Banco Davivienda Honduras', '301131991-4', 'Cheques', '', 1),
(47, 'Distribuidora Dilops/ Glenda Xiomara Lopez Romero', 'Banco Hondure?o  del Cafe, S.A.', '1606000215', 'Cheques', '', 1),
(48, 'Distribuidora Soal', 'Banco de Occidente, S.A.', '11401015008-7', 'Cheques', '', 1),
(49, 'Distribuidores Tecnologicos S. de R.L. de C.V. (Distech)', 'Banco de America Central Honduras,  S. A. ', '72734531-1', 'Ahorros', '', 1),
(50, 'Droguer?a Pharma Internacional S. de R.L.', 'Sociedad  Anonima Banco Davivienda Honduras', '101016507-9', 'Cheques', '', 1),
(51, 'Drogueria Y Distribuciones Diversas de Centroamerica S. de R.L.  ', 'Banco de America Central Honduras,  S. A. ', '730277261', 'Cheques', '', 1),
(52, 'Editorial Luna Color S. de R.L.', 'Banco del Pais, S.A.', '01300001000-8', 'Cheques', '', 1),
(53, 'El Heraldo', 'Banco de America Central Honduras,  S. A. ', '100350938', 'Cheques', '', 1),
(54, 'El Libano Industrial S. de R.L. de C.V.', 'Banco del Pais, S.A.', '01014000118-0', 'Cheques', '', 1),
(55, 'Electro Llantas S. de R.L.', 'Banco Financiera  Comercial  Hondure?a, S.A. ', '021026705-8', 'Cheques', '', 1),
(56, 'Empresa De Mantenimiento y Servicios Maritimos (Eagle Marine S.A.)', 'Banco Atlantida,  S.A. ', '31000-71053', 'Cheques', '', 1),
(57, 'Empresa Para El Desarrollo Social De Honduras, S.A. de C.V. (Empadesh),', 'Banco Financiera  Comercial  Hondure?a, S.A. ', '0021390000016-7', 'Cheques', '', 1),
(58, 'Equipos y Agroindustrias Torres/ Blanca Sabina Flores M', 'Banco Atlantida,  S.A. ', '2203029901', 'Ahorros', '', 1),
(59, 'Escuela de Comando y Estado Mayor', 'Banco del Pais, S.A.', '01-599-001536-8', 'Cheques', '', 1),
(60, 'Escuela de Suboficiales Navales', 'Banco del Pais, S.A.', '01-599-001655-0', 'Cheques', '', 1),
(61, 'Escuela Tecnica del Ejercito', 'Banco del Pais, S.A.', '21-599-001107-1', 'Cheques', '', 1),
(62, 'Ess-Electronics And Systems Solutions S. DE R.L. DE C.V.', 'Banco del Pais, S.A.', '21-001-044171-9', 'Cheques', '', 1),
(63, 'Extintores De Honduras/William Nahum Martinez Canales', 'Banco de Occidente, S.A.', '21406117976-3', 'Ahorros', '', 1),
(64, 'Fabrica De Extractores Fuentes ', 'Banco de America Central Honduras,  S. A. ', '73-000-8441', 'Cheques', '', 1),
(65, 'FAH/FNH/ Centro De Adiestramiento Naval', 'Banco del Pais, S.A.', '01-599-001673-9', 'Cheques', '', 1),
(66, 'FAH/FNH/2do Batallon De Infanteria De Marina', 'Banco del Pais, S.A.', '01-599-001283-0', 'Cheques', '', 1),
(67, 'FAH/FNH/Primer Batall?n De Fuerzas Especiales', 'Banco del Pais, S.A.', '01-599-001802-2', 'Cheques', '', 1),
(68, 'Ferreteria La Economica S. De R.L. Ferreco', 'Banco Hondure?o  del Cafe, S.A.', '561400000-9', 'Cheques', '', 1),
(69, 'Ferreteria Pineda', 'Banco Financiera  Comercial  Hondure?a, S.A. ', '20000501354-1', 'Ahorros', '', 1),
(70, 'Ferreteria y Maderera Grufer ', 'Banco de America Central Honduras,  S. A. ', '73013774-1', 'Cheques', '', 1),
(71, 'FFAA/FNH/BANAGUA', 'Banco del Pais, S.A.', '01-599-001650-0', 'Cheques', '', 1),
(72, 'FFAA/FNH/Base Naval De Caratasca', 'Banco del Pais, S.A.', '01-599-001676-3', 'Cheques', '', 1),
(73, 'FFAA/FNH/Cuartel General Naval', 'Banco del Pais, S.A.', '01-599-001654-2', 'Cheques', '', 1),
(74, 'Formulas Quimicas S. De R.L.', 'Banco de America Central Honduras,  S. A. ', '90366000-1', 'Cheques', '', 1),
(75, 'Fuerzas Armadas de Honduras /Academia Naval De Honduras', 'Banco del Pais, S.A.', '01-602-000012-6', 'Cheques', '', 1),
(76, 'Fuerzas Armadas de Honduras /Fuerza Naval /Apoyo Institucional', 'Banco Central de Honduras', '11101-01-000991-1', 'Cheques', '', 1),
(77, 'Fuerzas Armadas de Honduras /Fuerza Naval /Fondo de Inversi?n', 'Banco Central de Honduras', '11101-01-000990-1', 'Cheques', '', 1),
(78, 'Fuerzas Armadas de Honduras /Fuerza Naval /Funcionamiento', 'Banco Central de Honduras', '11101-01-000992-8', 'Cheques', '', 1),
(79, 'Fuerzas Armadas de Honduras /Fuerza Naval /Haberes de Tropa', 'Banco Central de Honduras', '11101-01-000989-8', 'Cheques', '', 1),
(80, 'Fuerzas Armadas de Honduras/ Fuerza Naval /BANAMAP', 'Banco del Pais, S.A.', '01-599-001256-3', 'Cheques', '', 1),
(81, 'Fuerzas Armadas de Honduras/Escuadra Naval', 'Banco del Pais, S.A.', '01-599-001609-7', 'Cheques', '', 1),
(82, 'Fuerzas Armadas/Industria Militar/Fondos Propios', 'Banco Central de Honduras', '11101-01-000973-1', 'Cheques', '', 1),
(83, 'Fundaempresa', 'Banco de America Central Honduras,  S. A. ', '100370671', 'Cheques', '', 1),
(84, 'Grupo Biomed S. de. .R.L. de C.V.', 'Banco Lafise Honduras', '11450300021-0', 'Cheques', '', 1),
(85, 'Grupo Multicables de Cortes, S. de R.L. ', 'Banco de America Central Honduras,  S. A. ', '730294321', 'Ahorros', '', 1),
(86, 'Healthcare Products Centroam?rica S. de R.L.', 'Banco Lafise Honduras', '10110100525-6', 'Cheques', '', 1),
(87, 'Hondurasnet S. de R.L.', 'Banco de America Central Honduras,  S. A. ', '913436901', 'Cheques', '', 1),
(88, 'Hondurasnet S. de R.L.', 'Banco de America Central Honduras,  S. A. ', '913436901', 'Cheques', '', 1),
(89, 'Hospital Militar', 'Banco del Pais, S.A.', '01-599-000613-0', 'Cheques', '', 1),
(90, 'Humberto Jossue Castillo Ortega/ Inversiones Castillo', 'Banco Financiera  Comercial  Hondure?a, S.A. ', '4124066096', 'Cheques', '', 1),
(91, 'IMS Consulting de Honduras S de R.L.', 'Banco de America Central Honduras,  S. A. ', '727277291', 'Ahorros', '', 1),
(92, 'Ingenieria, Importaciones Y Soluciones Energeticas', 'Sociedad  Anonima Banco Davivienda Honduras', '216006141-3', 'Cheques', '', 1),
(93, 'Instituto Fuerza Naval', 'Banco Lafise Honduras', '24050300002-6', 'Cheques', '', 1),
(94, 'INVERDUCOR (Inversiones Duron de Cortes)', 'Banco de Occidente, S.A.', '11-205-002319-5', 'Cheques', '', 1),
(95, 'Inversiones Amor S de R.L', 'Banco de America Central Honduras,  S. A. ', '73023524-1', 'Cheques', '', 1),
(96, 'Inversiones de Combustible S. de R.L.  ', 'Banco Atlantida,  S.A. ', '10120081269', 'Cheques', '', 1),
(97, 'Inversiones Energy S. de R.L. de C.V.', 'Banco de America Central Honduras,  S. A. ', '20012421-3', 'Cheques', '', 1),
(98, 'Inversiones Florales Ar Flowers, S. de R.L.', 'Banco de Occidente, S.A.', '21417114198-1', 'Ahorros', '', 1),
(99, 'Inversiones Kalter ', 'Banco Financiera  Comercial  Hondure?a, S.A. ', '20000503600-2', 'Ahorros', '', 1),
(100, 'Inversiones Logisticas H&M S. de R.L.', 'Banco Financiera  Comercial  Hondure?a, S.A. ', '20000509144-5', 'Cheques', '', 1),
(101, 'Inversiones R y R', 'Banco de America Central Honduras,  S. A. ', '729770951', 'Ahorros', '', 1),
(102, 'Inversiones y Equipos S. de R.L. de C.V.', 'Banco Financiera  Comercial  Hondure?a, S.A. ', '11390000398-7', 'Cheques', '', 1),
(103, 'La Armeria ', 'Banco del Pais, S.A.', '21-599-001222-1', 'Ahorros', '', 1),
(104, 'Lapidas y Placas de Honduras', 'Banco Atlantida,  S.A. ', '1332010824-7', 'Ahorros', '', 1),
(105, 'Leoplast S. de R.L.', 'Banco de Occidente, S.A.', '11401012673-9', 'Cheques', '', 1),
(106, 'Madison Dry Cleaners', 'Banco Atlantida,  S.A. ', '120347652-6', 'Cheques', '', 1),
(107, 'Magnum Base S. de R.L. de C. V.', 'Banco Financiera  Comercial  Hondure?a, S.A. ', '0211010058986-9', 'Cheques', '', 1),
(108, 'Maritima y Transportes Honduras  S.A de C.V.', 'Banco de Occidente, S.A.', '11201003603-2', 'Cheques', '', 1),
(109, 'Maritimos y Transporte de Honduras', 'Banco de Occidente, S.A.', '112000000000-0', 'Cheques', '', 1),
(110, 'Medica Dental Nacional S. de R.L. Medident', 'Banco de Occidente, S.A.', '11230000017-0', 'Cheques', '', 1),
(111, 'Meditec', 'Sociedad  Anonima Banco Davivienda Honduras', '2011056248', 'Cheques', '', 1),
(112, 'Metales y Mas S. de R.L.', 'Banco de Occidente, S.A.', '11-403-013193-2', 'Cheques', '', 1),
(113, 'Motores Kawas ', 'Banco Atlantida,  S.A. ', '310-00-21595', 'Cheques', '', 1),
(114, 'Multiservicios Lagos Sm, S. de R.L.', 'Banco de America Central Honduras,  S. A. ', '729205731', 'Cheques', '', 1),
(115, 'Muros y Mas S. de R.L. de C.V.', 'Banco Atlantida,  S.A. ', '1011101642-3', 'Cheques', '', 1),
(116, 'Nohelia Sport', 'Banco de Occidente, S.A.', '11-205-002410-8', 'Cheques', '', 1),
(117, 'Norit/ David Humberto Owen Garcia', 'Banco Hondure?o  del Cafe, S.A.', '1604000002', 'Cheques', '', 1),
(118, 'Novedades Steffys', 'Sociedad  Anonima Banco Promerica,  S.A.', '176476-7', 'Ahorros', '', 1),
(119, 'Operadores Turisticos de Honduras S.A.', 'Banco de Occidente, S.A.', '11401017470-9', 'Cheques', '', 1),
(120, 'Pagaduria Fuerza Naval', 'Banco del Pais, S.A.', '215-990-007-350', 'Ahorros', '', 1),
(121, 'Papelera Calpules S.A. de C.V. (Pacasa)', 'Banco Financiera  Comercial  Hondure?a, S.A. ', '021-102-10-100-7', 'Cheques', '', 1),
(122, 'Papeleria Honduras S. de R.L.', 'Banco de America Central Honduras,  S. A. ', '90977720-1', 'Cheques', '', 1),
(123, 'Pat Joyeria y Relojeria S. de R.L.', 'Banco Atlantida,  S.A. ', '110015032-3', 'Cheques', '', 1),
(124, 'Periodicos y Revistas S.A de C.V.', 'Banco de Occidente, S.A.', '11424000209-8', 'Cheques', '', 1),
(125, 'Pinturas Sur De Honduras ', 'Banco de America Central Honduras,  S. A. ', '90990930-1', 'Cheques', '', 1),
(126, 'Pool Supplies S. De R.L.', 'Banco de America Central Honduras,  S. A. ', '730159491', 'Cheques', '', 1),
(127, 'Primer Batallon de Infanteria De Marina', 'Banco del Pais, S.A.', '01-600-000263-8', 'Cheques', '', 1),
(128, 'Pronto Servicios de Honduras', 'Banco Financiera  Centroamericana, S.A. ', '320022932', 'Ahorros', '', 1),
(129, 'Proveedora de Materiales De La Construccion(Promaco)', 'Banco Atlantida,  S.A. ', '720066996-3', 'Cheques', '', 1),
(130, 'Proyecto de Ingenier?a Centroamericana S. de R.L (Proinca S. de R.L.)', 'Banco Financiera  Comercial  Hondure?a, S.A. ', '0012401983-1', 'Ahorros', '', 1),
(131, 'Reencauche y Distribucion de Llantas S.A de C.V', 'Banco de America Central Honduras,  S. A. ', '73003546-1', 'Cheques', '', 1),
(132, 'Representaciones Quimicas de Centro America S. de R.L.', 'Banco de Occidente, S.A.', '11408013088-3', 'Cheques', '', 1),
(133, 'Representaciones y Distribuciones Ponce (REDIPO)', 'Banco Atlantida,  S.A. ', '110026205-2', 'Cheques', '', 1),
(134, 'Repuestos y Accesorios Pizzati', 'Sociedad  Anonima Banco Davivienda Honduras', '301131991-4', 'Cheques', '', 1),
(135, 'Restaurante y Terraza Bella Vista S. de R.L.', 'Banco de America Central Honduras,  S. A. ', '727832231', 'Cheques', '', 1),
(136, 'RILMAC Impresores', 'Banco de America Central Honduras,  S. A. ', '730013641', 'Cheques', '', 1),
(137, 'Rocas Comercial / Renen Orlando Casco', 'Banco de Occidente, S.A.', '21-401-165868-8', 'Ahorros', '', 1),
(138, 'Roymart S. de R.L. De C.V.', 'Banco de America Central Honduras,  S. A. ', '71000651-1', 'Cheques', '', 1),
(139, 'RZV Soluciones Y Distribuciones Inform?ticas ', 'Banco de America Central Honduras,  S. A. ', '102350141', 'Cheques', '', 1),
(140, 'Secretaria De Defensa Nacional / Universidad de Defensa de Honduras', 'Banco del Pais, S.A.', '01-599-000886-8', 'Cheques', '', 1),
(141, 'SEDENA-Hospital Militar', 'Banco del Pais, S.A.', '01599000613-0', 'Cheques', '', 1),
(142, 'Seguros Atlantida, S.A.', 'Banco Atlantida,  S.A. ', '110002248-0', 'Cheques', '', 1),
(143, 'Seribotex S. de R.L.', 'Banco Atlantida,  S.A. ', '1152006553-0', 'Ahorros', '', 1),
(144, 'Servi Meches', 'Banco del Pais, S.A.', '21-302-0092266', 'Ahorros', '', 1),
(145, 'Servicio Electrico Mecanico Industrial S.E.M.I', 'Banco de Occidente, S.A.', '112000000000.00', 'Cheques', '', 1),
(146, 'Servicios Aire, Tierra y Mar S.de.R.L.', 'Banco Atlantida,  S.A. ', '01011101372-7', 'Cheques', '', 1),
(147, 'Servicios Maritimos De Honduras, S. de R.L. ', 'Banco de America Central Honduras,  S. A. ', '727392311', 'Ahorros', '', 1),
(148, 'Servicios Tecnicos y Suministros (STS)', 'Banco Atlantida,  S.A. ', '001-201-71145-2', 'Ahorros', '', 1),
(149, 'Servitodo S. de R.L.', 'Banco de America Central Honduras,  S. A. ', '91120770-1', 'Cheques', '', 1),
(150, 'Sistemas Graficos Mendez / Sigmen', 'Banco Financiera  Comercial  Hondure?a, S.A. ', '011-101-344071', 'Cheques', '', 1),
(151, 'Souvenirs Artesanias Candu', 'Banco de America Central Honduras,  S. A. ', '100200488', 'Ahorros', '', 1),
(152, 'Stephanie Williams Caceres', 'Banco del Pais, S.A.', '21-326-002884-8', 'Ahorros', '', 1),
(153, 'Supermercados Yip S. A de C.V', 'Banco Atlantida,  S.A. ', '110003439-4', 'Cheques', '', 1),
(154, 'Taller Velassquez', 'Banco del Pais, S.A.', '21304000874-0', 'Ahorros', '', 1),
(155, 'Tecnicom y Suministros S de R.L.', 'Banco Atlantida,  S.A. ', '1381100092-9', 'Cheques', '', 1),
(156, 'Tecnologias y Servicios Internacionales de Honduras S.A de C.V.', 'Banco de America Central Honduras,  S. A. ', '73020157-1', 'Cheques', '', 1),
(157, 'Tienda Militar I.P.M.', 'Banco del Pais, S.A.', '01-599-000608-3', 'Cheques', '', 1),
(158, 'Tienda Naval', 'Banco del Pais, S.A.', '21302009511-7', 'Ahorros', '', 1),
(159, 'Tienda Naval', 'Banco del Pais, S.A.', '01302000225-6', 'Cheques', '', 1),
(160, 'Tornillos y Partes Industriales S. de R.L. De C.V.', 'Sociedad  Anonima Banco Davivienda Honduras', '6010109980', 'Cheques', '', 1),
(161, 'Toyoservicio, S.A.', 'Banco de America Central Honduras,  S. A. ', '91151860-1', 'Cheques', '', 1),
(162, 'Tulio Roberto Lagos Arnold', 'Banco del Pais, S.A.', '21-318-006260-8', 'Ahorros', '', 1),
(163, 'Tulipanes Alimentos y Servicios S. de R.L.', 'Banco de America Central Honduras,  S. A. ', '91153810-1', 'Cheques', '', 1),
(164, 'Xmedia S. de R.L.', 'Banco de America Central Honduras,  S. A. ', '100603860', 'Cheques', '', 1),
(165, 'XXI Batallon de Policia Militar (Haberes)', 'Banco del Pais, S.A.', '01-599-000785-3', 'Cheques', '', 1),
(166, 'Yam Industrial S. de R.L. de C.V', 'Banco Financiera  Comercial  Hondure?a, S.A. ', '07101301-836', 'Cheques', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transferenciabch`
--

CREATE TABLE `transferenciabch` (
  `idtransferenciabch` int(11) NOT NULL,
  `idproveedores` int(11) NOT NULL,
  `idctasbancarias` int(11) NOT NULL,
  `fecha_hora` date DEFAULT NULL,
  `serie_transf` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `num_transf` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `monto_acreditar` decimal(11,2) DEFAULT NULL,
  `descripcion` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `condicion` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transferidoctaspg`
--

CREATE TABLE `transferidoctaspg` (
  `idtransferidoctaspg` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `fecha_hora` date NOT NULL,
  `numexpediente` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `numtransferencia` varchar(11) COLLATE utf8mb4_spanish_ci NOT NULL,
  `valor_transferido` decimal(12,2) NOT NULL,
  `estado` varchar(15) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tipo_documento` varchar(20) NOT NULL,
  `num_documento` varchar(20) NOT NULL,
  `direccion` varchar(70) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `cargo` varchar(35) DEFAULT NULL,
  `login` varchar(20) NOT NULL,
  `clave` varchar(64) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `tipo_documento`, `num_documento`, `direccion`, `telefono`, `email`, `cargo`, `login`, `clave`, `imagen`, `condicion`) VALUES
(1, 'Hector Mercadal', 'ID', '1503198501083', '1555 nw 82nd ave', '', '', '', 'hmercadal1', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '1547963176.jpg', 1),
(2, 'Jenny Carolina Lopez Castro', 'ID', '150201547896', '', '', '', 'Analista de Presupuesto', 'jenny', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '1549778685.jpg', 1),
(3, 'Alejandra Maria Herrera Velasquez', 'ID', '1503198501083', '', '', '', '', 'Alejandra', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_permiso`
--

CREATE TABLE `usuario_permiso` (
  `idusuario_permiso` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idpermiso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario_permiso`
--

INSERT INTO `usuario_permiso` (`idusuario_permiso`, `idusuario`, `idpermiso`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(13, 2, 6),
(14, 3, 1),
(15, 3, 4),
(16, 3, 6);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrar_ordenes`
--
ALTER TABLE `administrar_ordenes`
  ADD PRIMARY KEY (`idadministrar_ordenes`),
  ADD KEY `adm_or_usuarios` (`idusuario`),
  ADD KEY `adm_or_proveedores` (`idproveedores`),
  ADD KEY `adm_or_programa` (`idprograma`);

--
-- Indices de la tabla `bancos`
--
ALTER TABLE `bancos`
  ADD PRIMARY KEY (`idbancos`);

--
-- Indices de la tabla `compromisos`
--
ALTER TABLE `compromisos`
  ADD PRIMARY KEY (`idcompromisos`),
  ADD KEY `idprograma` (`idprograma`),
  ADD KEY `idproveedores` (`idproveedores`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`idconfiguracion`);

--
-- Indices de la tabla `contabilidad`
--
ALTER TABLE `contabilidad`
  ADD PRIMARY KEY (`idcontabilidad`),
  ADD KEY `orden_contabilidad` (`idadministrar_ordenes`),
  ADD KEY `cta_bancaria_orden` (`idctasbancarias`);

--
-- Indices de la tabla `crear_acuerdo`
--
ALTER TABLE `crear_acuerdo`
  ADD PRIMARY KEY (`idcrear_acuerdo`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `idproveedores` (`idproveedores`),
  ADD KEY `idprograma` (`idprograma`);

--
-- Indices de la tabla `ctasbancarias`
--
ALTER TABLE `ctasbancarias`
  ADD PRIMARY KEY (`idctasbancarias`);

--
-- Indices de la tabla `detalle_compromisos`
--
ALTER TABLE `detalle_compromisos`
  ADD PRIMARY KEY (`iddetalle_compromisos`),
  ADD KEY `idcompromisos` (`idcompromisos`),
  ADD KEY `idpresupuesto_disponible` (`idpresupuesto_disponible`);

--
-- Indices de la tabla `detalle_crear_acuerdo`
--
ALTER TABLE `detalle_crear_acuerdo`
  ADD PRIMARY KEY (`iddetalle_crear_orden`),
  ADD KEY `iddetalle_orden` (`idcrear_acuerdo`),
  ADD KEY `idpresupuesto_disponible` (`idpresupuesto_disponible`);

--
-- Indices de la tabla `detalle_ingreso`
--
ALTER TABLE `detalle_ingreso`
  ADD PRIMARY KEY (`iddetalle_ingreso`),
  ADD KEY `idingreso_detalle` (`idingreso`),
  ADD KEY `idpredis_detalle` (`idpresupuesto_disponible`);

--
-- Indices de la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  ADD PRIMARY KEY (`iddetalle_orden`),
  ADD KEY `admin_ord` (`idadministrar_ordenes`),
  ADD KEY `pred_disp` (`idpresupuesto_disponible`);

--
-- Indices de la tabla `dtransf_ctaspg`
--
ALTER TABLE `dtransf_ctaspg`
  ADD PRIMARY KEY (`dtransf_ctaspg`),
  ADD KEY `idtransferidoctaspg` (`idtransferidoctaspg`),
  ADD KEY `idctasbancarias` (`idctasbancarias`);

--
-- Indices de la tabla `factura_orden`
--
ALTER TABLE `factura_orden`
  ADD PRIMARY KEY (`idfactura_orden`),
  ADD KEY `orden_factura` (`idadministrar_ordenes`);

--
-- Indices de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  ADD PRIMARY KEY (`idingreso`),
  ADD KEY `idusuario_ingreso` (`idusuario`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`idpermiso`);

--
-- Indices de la tabla `presupuesto_disponible`
--
ALTER TABLE `presupuesto_disponible`
  ADD PRIMARY KEY (`idpresupuesto_disponible`);

--
-- Indices de la tabla `programa`
--
ALTER TABLE `programa`
  ADD PRIMARY KEY (`idprograma`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`idproveedores`);

--
-- Indices de la tabla `transferenciabch`
--
ALTER TABLE `transferenciabch`
  ADD PRIMARY KEY (`idtransferenciabch`),
  ADD KEY `idproveedores` (`idproveedores`),
  ADD KEY `idctasbancarias` (`idctasbancarias`);

--
-- Indices de la tabla `transferidoctaspg`
--
ALTER TABLE `transferidoctaspg`
  ADD PRIMARY KEY (`idtransferidoctaspg`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `login` (`login`);

--
-- Indices de la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  ADD PRIMARY KEY (`idusuario_permiso`),
  ADD KEY `fk_usuario_permiso_permiso_idx` (`idpermiso`),
  ADD KEY `idusuario` (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrar_ordenes`
--
ALTER TABLE `administrar_ordenes`
  MODIFY `idadministrar_ordenes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bancos`
--
ALTER TABLE `bancos`
  MODIFY `idbancos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT de la tabla `compromisos`
--
ALTER TABLE `compromisos`
  MODIFY `idcompromisos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `idconfiguracion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `contabilidad`
--
ALTER TABLE `contabilidad`
  MODIFY `idcontabilidad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `crear_acuerdo`
--
ALTER TABLE `crear_acuerdo`
  MODIFY `idcrear_acuerdo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_compromisos`
--
ALTER TABLE `detalle_compromisos`
  MODIFY `iddetalle_compromisos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `detalle_crear_acuerdo`
--
ALTER TABLE `detalle_crear_acuerdo`
  MODIFY `iddetalle_crear_orden` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_ingreso`
--
ALTER TABLE `detalle_ingreso`
  MODIFY `iddetalle_ingreso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  MODIFY `iddetalle_orden` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dtransf_ctaspg`
--
ALTER TABLE `dtransf_ctaspg`
  MODIFY `dtransf_ctaspg` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `factura_orden`
--
ALTER TABLE `factura_orden`
  MODIFY `idfactura_orden` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  MODIFY `idingreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `idpermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `presupuesto_disponible`
--
ALTER TABLE `presupuesto_disponible`
  MODIFY `idpresupuesto_disponible` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `idproveedores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT de la tabla `transferenciabch`
--
ALTER TABLE `transferenciabch`
  MODIFY `idtransferenciabch` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `transferidoctaspg`
--
ALTER TABLE `transferidoctaspg`
  MODIFY `idtransferidoctaspg` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  MODIFY `idusuario_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrar_ordenes`
--
ALTER TABLE `administrar_ordenes`
  ADD CONSTRAINT `adm_or_programa` FOREIGN KEY (`idprograma`) REFERENCES `programa` (`idprograma`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `adm_or_proveedores` FOREIGN KEY (`idproveedores`) REFERENCES `proveedores` (`idproveedores`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `adm_or_usuarios` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `compromisos`
--
ALTER TABLE `compromisos`
  ADD CONSTRAINT `fk_compromisos_programas` FOREIGN KEY (`idprograma`) REFERENCES `programa` (`idprograma`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_compromisos_proveedores` FOREIGN KEY (`idproveedores`) REFERENCES `proveedores` (`idproveedores`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `contabilidad`
--
ALTER TABLE `contabilidad`
  ADD CONSTRAINT `cta_bancaria_orden` FOREIGN KEY (`idctasbancarias`) REFERENCES `ctasbancarias` (`idctasbancarias`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `orden_contabilidad` FOREIGN KEY (`idadministrar_ordenes`) REFERENCES `administrar_ordenes` (`idadministrar_ordenes`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `crear_acuerdo`
--
ALTER TABLE `crear_acuerdo`
  ADD CONSTRAINT `fk_crear_acuerdo_programa` FOREIGN KEY (`idprograma`) REFERENCES `programa` (`idprograma`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_crear_acuerdo_proveedores` FOREIGN KEY (`idproveedores`) REFERENCES `proveedores` (`idproveedores`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_crear_acuerdo_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_crear_acuerdo`
--
ALTER TABLE `detalle_crear_acuerdo`
  ADD CONSTRAINT `fk_detalle_crear_acuerdo_presupuesto_disponible` FOREIGN KEY (`idpresupuesto_disponible`) REFERENCES `presupuesto_disponible` (`idpresupuesto_disponible`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalle_crear_orden_crear_acuerdo` FOREIGN KEY (`idcrear_acuerdo`) REFERENCES `crear_acuerdo` (`idcrear_acuerdo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  ADD CONSTRAINT `admin_ord` FOREIGN KEY (`idadministrar_ordenes`) REFERENCES `administrar_ordenes` (`idadministrar_ordenes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pred_disp` FOREIGN KEY (`idpresupuesto_disponible`) REFERENCES `presupuesto_disponible` (`idpresupuesto_disponible`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `factura_orden`
--
ALTER TABLE `factura_orden`
  ADD CONSTRAINT `factura_idorden` FOREIGN KEY (`idadministrar_ordenes`) REFERENCES `administrar_ordenes` (`idadministrar_ordenes`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
