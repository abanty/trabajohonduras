-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-05-2019 a las 08:24:31
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

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
  `iduuss` int(11) NOT NULL,
  `num_orden` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `num_comprobante` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `titulo_orden` varchar(80) NOT NULL,
  `descripcion_orden` varchar(100) NOT NULL,
  `tipo_documento` varchar(30) NOT NULL,
  `fecha_hora` date NOT NULL,
  `subtotal_inicial` decimal(11,2) NOT NULL,
  `descuento_total` decimal(11,2) NOT NULL,
  `subtotal` decimal(11,2) NOT NULL,
  `impuesto_sv` decimal(11,2) NOT NULL,
  `tasa_sv` decimal(11,2) NOT NULL,
  `valor_sv` decimal(11,2) DEFAULT NULL,
  `impuesto` decimal(11,2) NOT NULL,
  `tasa_imp` decimal(11,2) NOT NULL,
  `valor_impuesto` decimal(11,2) DEFAULT NULL,
  `monto_total` decimal(11,2) NOT NULL,
  `retencion_isv` decimal(11,2) NOT NULL,
  `tasa_retencion_isv` decimal(11,2) NOT NULL,
  `valor_isv` decimal(11,2) DEFAULT NULL,
  `retencion_isr` decimal(11,2) NOT NULL,
  `tasa_retencion_isr` decimal(11,2) NOT NULL,
  `valor_isr` decimal(11,2) DEFAULT NULL,
  `total_neto` decimal(11,2) NOT NULL,
  `estado` varchar(20) NOT NULL DEFAULT 'Pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `administrar_ordenes`
--

INSERT INTO `administrar_ordenes` (`idadministrar_ordenes`, `idproveedores`, `idusuario`, `idprograma`, `iduuss`, `num_orden`, `num_comprobante`, `titulo_orden`, `descripcion_orden`, `tipo_documento`, `fecha_hora`, `subtotal_inicial`, `descuento_total`, `subtotal`, `impuesto_sv`, `tasa_sv`, `valor_sv`, `impuesto`, `tasa_imp`, `valor_impuesto`, `monto_total`, `retencion_isv`, `tasa_retencion_isv`, `valor_isv`, `retencion_isr`, `tasa_retencion_isr`, `valor_isr`, `total_neto`, `estado`) VALUES
(1, 9, 1, 12, 5, '001', '0001', 'Materiales', 'MaterialesMaterialesMaterialesMaterialesMaterialesMaterialesMaterialesMaterialesMaterialesMateriales', 'O/C', '2019-05-17', '63367615.65', '1000.00', '63366615.65', '9504992.35', '15.00', '63366615.65', '7920826.96', '12.50', '63366615.65', '80792434.96', '9504992.35', '15.00', '63366615.65', '7920826.96', '12.50', '63366615.65', '63366615.65', 'Pendiente'),
(2, 1, 1, 5, 1, '87894', '', '', 'hgghjghjghj', 'Becas', '2019-05-23', '48333.25', '0.00', '48333.25', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '48333.25', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '48333.25', 'Pendiente'),
(3, 1, 1, 3, 1, '4234', '', '', 'fdsfds', 'Alimentacion', '2019-05-23', '2684.68', '0.00', '2684.68', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2684.68', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2684.68', 'Pendiente'),
(4, 3, 1, 4, 1, '24324', '5443', '', 'dfsdfds', 'F.R.', '2019-05-23', '4328648.64', '3424.32', '4325224.32', '648783.65', '15.00', '4325224.32', '540653.04', '12.50', '4325224.32', '5514661.01', '648783.65', '15.00', '4325224.32', '540653.04', '12.50', '4325224.32', '4325224.32', 'Pendiente'),
(5, 1, 1, 7, 1, '343234', '', '', 'dsfds', 'Planillas', '2019-05-23', '5439970.77', '0.00', '5439970.77', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '5439970.77', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '5439970.77', 'Pendiente'),
(6, 1, 1, 2, 1, '645645654', '', '', 'gfdgdfg', 'Otros', '2019-05-23', '35435888.97', '0.00', '35435888.97', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '35435888.97', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '35435888.97', 'Pendiente'),
(7, 1, 1, 1, 1, '453543', '', '', 'sadsadsa', 'Planillas', '2019-05-23', '4277.75', '0.00', '4277.75', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '4277.75', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '4277.75', 'Pendiente');

--
-- Disparadores `administrar_ordenes`
--
DELIMITER $$
CREATE TRIGGER `tr_actualizar_presupuesto_anual` AFTER UPDATE ON `administrar_ordenes` FOR EACH ROW BEGIN
    UPDATE presupuesto_disponible p, detalle_orden d SET p.presupuesto_anual = p.presupuesto_anual - (d.cantidad * d.precio_unitario)
WHERE p.idpresupuesto_disponible = d.idpresupuesto_disponible AND New.estado = 'Pagado';
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_subsanar_presupuesto_anual` BEFORE UPDATE ON `administrar_ordenes` FOR EACH ROW BEGIN
    UPDATE presupuesto_disponible p, detalle_orden d SET p.presupuesto_anual = p.presupuesto_anual + (d.cantidad * d.precio_unitario)
WHERE p.idpresupuesto_disponible = d.idpresupuesto_disponible AND New.estado = 'Anulado';
END
$$
DELIMITER ;

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
(1, 2, 2, '2019-05-17', '1254', '450.00', 1),
(2, 2, 3, '2019-05-17', '587', '55.55', 0),
(3, 2, 5, '2019-05-17', '8888', '10300.20', 0),
(4, 2, 2, '2019-05-17', '34', '327.56', 0),
(5, 2, 8, '2019-05-17', '3432', '367.47', 0),
(6, 12, 7, '2019-05-17', '3444', '324567.56', 0),
(7, 2, 4, '2019-05-17', '324', '43243.24', 0),
(8, 1, 5, '2019-05-17', '432', '43.24', 0),
(9, 1, 14, '2019-05-17', '434', '43243.24', 0),
(10, 1, 144, '2019-05-17', '4344', '4324.44', 0),
(11, 1, 12, '2019-05-17', '2234', '46.48', 1),
(12, 1, 10, '2019-05-17', '1254', '155222222.22', 1);

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

--
-- Volcado de datos para la tabla `contabilidad`
--

INSERT INTO `contabilidad` (`idcontabilidad`, `idadministrar_ordenes`, `idctasbancarias`, `tipo_pago`, `numero_transferencia`, `debitos`, `creditos`, `contabilidad`, `fechacreacion`, `fecha_actualizacion`) VALUES
(1, 1, 1, 'Deposito', 2147483647, 'gastos de administracion', 'caja y bancos', 'ok', NULL, NULL);

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
(1, 'Pagaduria Fuerza Naval', 'Banco del Pais', 'Ahorro', '215-990-007-350', '6662572.46', 1),
(2, 'Fuerzas Armadas de Honduras / Fuerza Naval / Haberes de Tropa', 'Banco Central de Honduras', 'Cheques', '11101-01-000989-8', '221111.53', 1),
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
(1, 1, 11, '150.00', 1),
(2, 1, 12, '150.00', 1),
(3, 1, 13, '150.00', 1),
(4, 2, 11, '55.55', 0),
(5, 3, 15, '5.00', 0),
(6, 3, 14, '4.00', 0),
(7, 4, 12, '3.24', 0),
(8, 4, 13, '324.32', 0),
(9, 5, 13, '43.24', 0),
(10, 5, 12, '324.23', 0),
(11, 6, 12, '243.24', 0),
(12, 6, 12, '324.00', 0),
(13, 7, 13, '43.00', 0),
(14, 8, 12, '43.24', 0),
(15, 9, 11, '43.00', 0),
(16, 10, 11, '4.00', 0),
(17, 11, 12, '43.24', 1),
(18, 11, 12, '3.24', 1),
(19, 12, 11, '155.00', 1),
(20, 12, 11, '222.00', 1);

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
  `descripcion` varchar(550) DEFAULT NULL,
  `precio_unitario` decimal(11,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_orden`
--

INSERT INTO `detalle_orden` (`iddetalle_orden`, `idadministrar_ordenes`, `idpresupuesto_disponible`, `unidad`, `cantidad`, `descripcion`, `precio_unitario`) VALUES
(1, 1, 11, 'GALONES', 1, 'MaterialesMaterialesMaterialesMaterialesMaterialesMaterialesMaterialesMaterialesMaterialesMaterialesMaterialesMaterialesMaterialesMaterialesMateriales', '454654.56'),
(2, 1, 12, 'GALONES', 1, 'Materiales', '6456414.65'),
(4, 1, 2, 'galoneras', 3, 'loquecxuxa esea', '1500.00'),
(10, 1, 65, 'fds', 3, 'sfds', '32.00'),
(11, 1, 48, 'fsdf', 344, 'fdsds', '34.00'),
(12, 1, 14, 'fds', 3, 'rrdesr', '34324.00'),
(13, 1, 42, 'fdsf', 343, 'fdfdsf', '3434.00'),
(14, 1, 43, 'frwerew', 343, 'dfef', '3422.00'),
(15, 1, 78, 'fdesfsd', 34, 'MaterialesMaterialesMaterialesMaterialesMaterialesMaterialialesMaterialesMaterialesMaterialesMateriales', '32.00'),
(16, 2, 2, '', 10, '', '4555.55'),
(17, 2, 3, '', 5, '', '555.55'),
(18, 3, 2, '', 1, '', '342.34'),
(19, 3, 1, '', 1, '', '2342.34'),
(20, 4, 2, '', 1, '', '4324.32'),
(21, 4, 1, '', 1, '', '4324324.32'),
(22, 5, 1, '', 1, '', '4535.34'),
(23, 5, 2, '', 1, '', '5435435.43'),
(24, 6, 2, '', 1, '', '543.54'),
(25, 6, 3, '', 1, '', '35435345.43'),
(26, 7, 1, '', 1, '', '43.43'),
(27, 7, 2, '', 1, '', '4234.32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_retenciones`
--

CREATE TABLE `detalle_retenciones` (
  `iddetalle_retenciones` int(11) NOT NULL,
  `idretenciones` int(11) NOT NULL,
  `idcompromisos` int(11) NOT NULL,
  `valorbase` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_retenciones`
--

INSERT INTO `detalle_retenciones` (`iddetalle_retenciones`, `idretenciones`, `idcompromisos`, `valorbase`) VALUES
(1, 1, 1, '1.00'),
(5, 1, 7, '0.00'),
(6, 1, 7, '0.00'),
(7, 2, 1, '546.45'),
(8, 2, 11, '6.00'),
(9, 2, 12, '6.00');

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

--
-- Volcado de datos para la tabla `factura_orden`
--

INSERT INTO `factura_orden` (`idfactura_orden`, `idadministrar_ordenes`, `num_factura`, `fecha_factura`, `valor_factura`) VALUES
(1, 1, '1', '2019-05-17', '0.00'),
(2, 1, '2', '2019-05-17', '0.00'),
(3, 1, '3', '2019-05-17', '0.00'),
(4, 1, '4', '2019-05-17', '0.00');

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
(1, 'Sueldos Básicos', 11, 100, '11100', '389111116.75', '0.00', 1),
(2, 'Adicionales', 11, 400, '11400', '4478115.20', '0.00', 1),
(3, 'Decimotercer Mes', 11, 510, '11510', '11437318.35', '0.00', 1),
(4, 'Decimocuarto Mes', 11, 520, '11520', '16156840.78', '0.00', 1),
(5, 'Complementos', 11, 600, '11600', '14948586.55', '0.00', 1),
(6, 'Contribuciones al Instituto de Previsión Militar - Cuota Patronal', 11, 731, '11731', '42614215.55', '0.00', 1),
(7, 'Contribuciones al Instituto de Previsión Militar - Régimen de Riesgos Especiales', 11, 732, '11732', '27010663.96', '0.00', 1),
(8, 'Contribuciones al Instituto de Previsión Militar - Reserva Laboral', 11, 733, '11733', '31406525.95', '0.00', 1),
(9, 'Beneficios y Compensaciones', 16, 100, '16100', '8206475.80', '0.00', 1),
(10, 'Energía Eléctrica', 21, 100, '21100', '-314299996.85', '0.00', 1),
(11, 'Agua', 21, 200, '21200', '480000.00', '0.00', 1),
(12, 'Correo Postal', 21, 410, '21410', '30000.00', '0.00', 1),
(13, 'Telefonía Fija', 21, 420, '21420', '400000.00', '0.00', 1),
(14, 'Alquiler de Equipos de Transporte, Tracción y Elevación', 22, 220, '22220', '110610388.00', '0.00', 1),
(15, 'Alquiler de Tierras y Terrenos', 22, 300, '22300', '40000.00', '0.00', 1),
(16, 'Otros Alquileres', 22, 900, '22900', '5000.00', '0.00', 1),
(17, 'Mantenimiento y Reparación de Edificios y Locales', 23, 100, '23100', '560000.00', '0.00', 1),
(18, 'Mantenimiento y Reparación de Equipos y Medios de Transporte', 23, 200, '23200', '1038319.00', '0.00', 1),
(19, 'Mantenimiento y Reparación de Equipos Sanitarios y de Laboratorio', 23, 330, '23330', '196000.00', '0.00', 1),
(20, 'Mantenimiento y Reparación de Equipo para Computación', 23, 350, '23350', '125000.00', '0.00', 1),
(21, 'Mantenimiento y Reparación de Equipo de Oficina y Muebles', 23, 360, '23360', '150000.00', '0.00', 1),
(22, 'Mantenimiento y Reparación de Otros Equipos', 23, 390, '23390', '200000.00', '0.00', 1),
(23, 'Mantenimiento y Reparación de Obras Civiles e Instalaciones Varias', 23, 400, '23400', '626613.00', '0.00', 1),
(24, 'Limpieza, Aseo y Fumigación', 23, 500, '23500', '150000.00', '0.00', 1),
(25, 'Servicios de Capacitación', 24, 500, '24500', '150000.00', '0.00', 1),
(26, 'Servicios de Informática y Sistemas Computarizados', 24, 600, '24600', '306000.00', '0.00', 1),
(27, 'Servicios de Consultoría de Gestión Administrativa, Financiera y Actividades Conexas', 24, 710, '24710', '330000.00', '0.00', 1),
(28, 'Servicio de Transporte', 25, 100, '25100', '120000.00', '0.00', 1),
(29, 'Servicio de Imprenta, Publicaciones y Reproducciones', 25, 300, '25300', '18000.00', '0.00', 1),
(30, 'Primas y Gastos de Seguro', 25, 400, '25400', '15650407.00', '0.00', 1),
(31, 'Comisiones y Gastos Bancarios', 25, 500, '25500', '125000.00', '0.00', 1),
(32, 'Publicidad y Propaganda', 25, 600, '25600', '5000.00', '0.00', 1),
(33, 'Servicio de Internet', 25, 700, '25700', '110000.00', '0.00', 1),
(34, 'Otros Servicios Comerciales y Financieros', 25, 900, '25900', '175000.00', '0.00', 1),
(35, 'Pasajes Nacionales', 26, 110, '26110', '20000.00', '0.00', 1),
(36, 'Pasajes al Exterior', 26, 120, '26120', '20000.00', '0.00', 1),
(37, 'Viáticos Nacionales', 26, 210, '26210', '20000.00', '0.00', 1),
(38, 'Viáticos al Exterior', 26, 220, '26220', '10000.00', '0.00', 1),
(39, 'Gastos Juridicos ', 27, 500, '27500', '5000.00', '0.00', 1),
(40, 'Impuesto sobre Venta- 12%', 27, 114, '27114', '334375.00', '0.00', 1),
(41, 'Impuesto sobre Venta- 15%', 27, 115, '27115', '5000.00', '0.00', 1),
(42, 'Ceremonial y Protocolo', 29, 100, '29100', '157500.00', '0.00', 1),
(43, 'Alimentos y Bebidas para Personas', 31, 100, '31100', '44364065.00', '0.00', 1),
(44, 'Madera, Corcho y sus Manufacturas', 31, 500, '31500', '292247.00', '0.00', 1),
(45, 'Hilados y Telas', 32, 100, '32100', '503922.00', '0.00', 1),
(46, 'Confecciones Textiles', 32, 200, '32200', '600000.00', '0.00', 1),
(47, 'Prendas de Vestir', 32, 310, '32310', '539367.00', '0.00', 1),
(48, 'Calzados', 32, 400, '32400', '1701522.00', '0.00', 1),
(49, 'Papel de Escritorio', 33, 100, '33100', '385659.00', '0.00', 1),
(50, 'Papel para Computación', 33, 200, '33200', '5250.00', '0.00', 1),
(51, 'Productos de Artes Gráficas', 33, 300, '33300', '105000.00', '0.00', 1),
(52, 'Productos de Papel y Cartón', 33, 400, '33400', '50000.00', '0.00', 1),
(53, 'Libros, Revistas y Periódicos', 33, 500, '33500', '28980.00', '0.00', 1),
(54, 'Textos de Enseñanza', 33, 600, '33600', '10000.00', '0.00', 1),
(55, 'Cueros y Pieles', 34, 100, '34100', '250000.00', '0.00', 1),
(56, 'Artículos de Cuero', 34, 200, '34200', '300000.00', '0.00', 1),
(57, 'Artículos de Caucho', 34, 300, '34300', '550000.00', '0.00', 1),
(58, 'Llantas y Cámaras de Aire', 34, 400, '34400', '1103050.00', '0.00', 1),
(59, 'Productos Químicos', 35, 100, '35100', '250000.00', '0.00', 1),
(60, 'Productos Farmacéuticos y Medicinales Varios', 35, 210, '35210', '3726000.00', '0.00', 1),
(61, 'Insecticidas, Fumigantes y Otros', 35, 400, '35400', '100000.00', '0.00', 1),
(62, 'Tintas, Pinturas y Colorantes', 35, 500, '35500', '1018140.00', '0.00', 1),
(63, 'Gasolina', 35, 610, '35610', '13172306.00', '0.00', 1),
(64, 'Diesel', 35, 620, '35620', '16504424.00', '0.00', 1),
(65, 'Aceites y Grasas Lubricantes', 35, 650, '35650', '1749517.00', '0.00', 1),
(66, 'Productos de Material Plástico', 35, 800, '35800', '723000.00', '0.00', 1),
(67, 'Productos Químicos de Uso Personal', 35, 930, '35930', '220000.00', '0.00', 1),
(68, 'Productos Ferrosos', 36, 100, '36100', '271000.00', '0.00', 1),
(69, 'Productos no Ferrosos', 36, 200, '36200', '175801.00', '0.00', 1),
(70, 'Estructuras Metálicas Acabadas', 36, 300, '36300', '225000.00', '0.00', 1),
(71, 'Herramientas Menores', 36, 400, '36400', '121000.00', '0.00', 1),
(72, 'Material de Guerra y Seguridad', 36, 500, '36500', '1040000.00', '0.00', 1),
(73, 'Accesorios de Metal', 36, 920, '36920', '120000.00', '0.00', 1),
(74, 'Elementos de Ferretería', 36, 930, '36930', '900000.00', '0.00', 1),
(75, 'Productos de Vidrio', 37, 200, '37200', '248300.00', '0.00', 1),
(76, 'Productos de Loza y Porcelana', 37, 300, '37300', '288775.00', '0.00', 1),
(77, 'Productos de Cemento, Asbesto y Yeso', 37, 400, '37400', '370000.00', '0.00', 1),
(78, 'Cemento, Cal y Yeso', 37, 500, '37500', '242500.00', '0.00', 1),
(79, 'Piedra, Arcilla y Arena', 38, 400, '38400', '320000.00', '0.00', 1),
(80, 'Elementos de Limpieza y Aseo Personal', 39, 100, '39100', '538843.00', '0.00', 1),
(81, 'Utiles de Escritorio, Oficina y Enseñanza', 39, 200, '39200', '9848834.00', '0.00', 1),
(82, 'Utiles y Materiales Eléctricos', 39, 300, '39300', '405632.00', '0.00', 1),
(83, 'Utensilios de Cocina y Comedor', 39, 400, '39400', '280000.00', '0.00', 1),
(84, 'Instrumental Médico Quirúrgico Menor', 39, 510, '39510', '355000.00', '0.00', 1),
(85, 'Repuestos y Accesorios', 39, 600, '39600', '36253332.00', '0.00', 1),
(86, 'Repuestos y Accesorios Fondos Propios', 39, 600, '39600', '364350.00', '0.00', 1),
(87, 'Embarcaciones Marítimas', 42, 330, '42330', '102634290.00', '0.00', 1),
(88, 'Becas Nacionales', 51, 211, '51211', '1091400.00', '0.00', 1),
(89, 'Becas Externas', 51, 212, '51212', '1989680.00', '0.00', 1),
(90, 'Otros Gastos', 51, 230, '51230', '3978000.00', '0.00', 1);

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
(1, '-', '-', '-', 0),
(2, '90-11-03-02', 'BANACORT', 'CARGADO A LA BASE NAVAL DE PUERTO CORTES', 1),
(3, '90-11-03-03', 'BANAMAP', 'CARGADO A LA BASE NAVAL DE AMAPALA', 1),
(4, '90-11-03-04', 'BANACAST', 'CARGADO A LA BASE NAVAL DE PUERTO CASTILLA', 1),
(5, '90-11-03-05', 'CEN', 'CARGADO AL CENTRO DE ESTUDIOS NAVALES', 1),
(6, '90-11-03-06', 'ANH', 'CARGADO A LA ACADEMIA NAVAL DE HONDURAS', 1),
(7, '90-11-03-07', '1ER BIM', 'CARGADO AL 1ER BATALLON DE INFANTERIA DE MARINA', 1),
(8, '90-11-03-08', 'BANACAR', 'CARGADO A LA BASE NAVAL DE CARATASCA', 1),
(9, '90-11-03-09', 'BANAGUA', 'CARGADO A LA BASE NAVAL DE GUANAJA', 1),
(10, '90-11-03-10', 'ECAMAN', 'CARGADO A LA ESCUELA DE CAPACITACION DE MANDOS NAVALES', 1),
(11, '90-11-03-11', 'ESNA', 'CARGADO A LA ESCUADRA NAVAL', 1),
(12, '90-11-03-12', '2DO BIM', 'CARGADO AL 2DO BATALLON DE INFANTERIA DE MARINA', 1),
(13, '90-11-03-01', 'CMD GENERAL', 'CARGADO A LA COMANDANCIA GENERAL DE LA FUERZA NAVAL ', 1),
(14, '90-11-03-14', 'CAN', 'CARGADO AL CENTRO DE ADIESTRAMIENTO NAVAL', 1),
(15, '90-11-03-15', 'C.G.N', 'CARGADO AL CUARTEL GENERAL NAVAL', 1),
(16, '90-11-03-13', 'ESCUELA DE BUCEO', 'CARGADO A LA ESCUELA DE BUCEO', 1),
(17, '90-11-03-16', 'FEN', 'CARGADO AL 1ER BATALLON DE FUERZAS ESPECIALES NAVALES', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `idproveedores` int(11) NOT NULL,
  `casa_comercial` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `rtn` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_banco` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `num_cuenta` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_cuenta` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `condicion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`idproveedores`, `casa_comercial`, `rtn`, `nombre_banco`, `num_cuenta`, `tipo_cuenta`, `imagen`, `condicion`) VALUES
(1, '-', '-', '-', '-', '-', '-', 1),
(2, 'ACCESORIOS PARA COMPUTADORA Y OFICINAS S. A DE C.V.', 'N.A', 'BANCO DEL PAIS', '01-010-000331-9', 'CHEQUES', '1558141700.jpg', 1),
(3, 'ALEJANDROS AUTO PARTS', '1588', 'BANCO FICOHSA', '0111390000032-6', 'CHEQUES', '', 1),
(4, 'ALMACEN INDUSTRIAL / KUESTERMANN Y BIENST S.DE R.L.', '', 'DAVIVIENDA HONDURAS, S.A.', '6010089497', 'CHEQUES', '', 1),
(5, 'AMERICAN DRY CLEANING S. DE R.L.', '', 'BANCO DE OCCIDENTE S.A', '11412130636-0', 'CHEQUES', '', 1),
(6, 'ANPHAR S.A. DE C.V.', '', 'BANCO DE OCCIDENTE S.A', '11201013472-7', 'CHEQUES', '', 1),
(7, 'ARRENDADORA DE VEHICULOS, S.A.,', '', 'BAC HONDURAS', '72377563-1', 'CHEQUES', '', 1),
(8, 'ASTRO TOUR S DE R.L', '', 'BANCO DE OCCIDENTE S.A', '11201008282-4', 'CHEQUES', '', 1),
(9, 'AUTO PARTES REAYA S.A. DE  C.V. ', '', 'BAC HONDURAS', '730129391', 'CHEQUES', '', 1),
(10, 'AUTO PARTES REAYA S.A. DE  C.V. ', '', 'BANCO DE OCCIDENTE S.A.', '11-201-003553-2', 'CHEQUES', '', 1),
(11, 'AUTOSUSPENSION / RAFAEL RODAS CORRALES ', '', 'BAC HONDURAS', '730078331', 'CHEQUES', '', 1),
(12, 'AZ COMERCIAL S. DE R.L.', '', 'BANCO DE OCCIDENTE S.A', '11402013075-5', 'CHEQUES', '', 1),
(13, 'BAR Y RESTAURANTE EL PELICANO', '', 'DAVIVIENDA HONDURAS, S.A.', '207132071-5', 'AHORRO', '', 1),
(14, 'BASE NAVAL DE PUERTO CASTILLA', '', 'BANCO DEL PAIS', '01-635-000079-0', 'CHEQUES', '', 1),
(15, 'BASE NAVAL DE PUERTO CORTES', '', 'BANCO DEL PAIS', '01-070-000126-0', 'CHEQUES', '', 1),
(16, 'CAM INTERNATIONAL HONDURAS', '', 'BANCO FICOHSA', '200002689404-', 'AHORROS ', '', 1),
(17, 'CASA COMERCIAL MATHEWS, S.A DE C.V. (CEMCOL)', '', 'BANCO DEL PAIS', '01299000003-0', 'CHEQUES', '', 1),
(18, 'CASA EVENTOS S. DE R.L. DE C.V.', '', 'BAC HONDURAS', '730323501', 'AHORROS ', '', 1),
(19, 'CASA RAFAEL ', '', 'BANCO ATLANTIDA', '3100036759', 'CHEQUES', '', 1),
(20, 'CENTRAL DE MANGUERAS S.A (PTO CORTES)', '', 'BAC HONDURAS', '90173850-1', 'CHEQUES', '', 1),
(21, 'CENTRAL DE MANGUERAS S.A (TOCOA)', '', 'BANCO ATLANTIDA', '110013295-8', 'CHEQUES', '', 1),
(22, 'CENTRAL DE TURBOS E INVERSIONES DE HONDURAS', '', 'BAC HONDURAS', '72908848-1', 'CHEQUES', '', 1),
(23, 'CENTRO DE ADIESTRAMIENTO MILITAR DEL EJERCITO', '', 'BANCO DEL PAIS', '01-370-000078-1', 'CHEQUES', '', 1),
(24, 'CENTRO EXPERIMENTAL DE DESARROLLO AGROPECUARIO Y CONSERVACION ECOLOGICA', '', 'BANCO DEL PAIS', '01-345-000087-9', 'CHEQUES', '', 1),
(25, 'CENTRO FERRETERO TORNIFESA S. DE R.L. DE C.V.', '', 'DAVIVIENDA HONDURAS, S.A.', '601-014893-4', 'CHEQUES', '', 1),
(26, 'CENTRO INDUSTRIAL Y TECNICO DEL COLOR S. DE R.L.', '', 'BANCO DE OCCIDENTE S.A', '11907000901-2', 'CHEQUES', '', 1),
(27, 'COMCEL', '', 'BANCO DEL PAIS', '21-300-0224124', 'CHEQUES', '', 1),
(28, 'COMERCIAL GENESIS Y ASOCIADOS S. DE R.L.  COMERCIAL GENESA', '', 'BAC HONDURAS', '730216691', 'CHEQUES', '', 1),
(29, 'COMERCIAL ULTRAMOTOR', '', 'BANCO ATLANTIDA, S.A.', '1100231487', 'CHEQUES', '', 1),
(30, 'COMERCIAL YOLY S.DE R.L.', '', 'BANRURAL', '0590101001770-0', 'CHEQUES', '', 1),
(31, 'COMERCIALIZACIONES Q S DE R. L. DE C.V.', '', 'BANCO DEL PAIS', '01600000815-6', 'CHEQUES', '', 1),
(32, 'COMERCIALIZADORA EL MUEBLE S DE R.L. (COELMU S DE R.L.)', '', 'BAC HONDURAS', '10535003-1', 'CHEQUES', '', 1),
(33, 'COMISARIATO IPM', '', 'BANCO DEL PAIS', '01-599-001037-4', 'CHEQUES', '', 1),
(34, 'CONSTRUCTORA RIVERA ', '', 'BANCO DE LOS TRABAJADORES', '21705000009-1', 'CHEQUES', '', 1),
(35, 'CONSULTORIA, SUPERVISION Y CONSTRUCCION DE OBRAS S. DE R.L.', '', 'BAC HONDURAS', '90199010-1', 'AHORRO', '', 1),
(36, 'CORPORACION INDUSTRIAL FARMACEUTICA S.A. DE C.V', '', 'BANCO LAFISE S.A.', '11150300007-6', 'CHEQUES', '', 1),
(37, 'DARWYN ANTONIO VELASQUEZ ARIAS ', '', 'BANCO DEL PAIS', '21-304-000874-0', 'AHORRO', '', 1),
(38, 'DAVID HUMBERTO OWEN GARCIA/NORIT', '', 'BANHCAFE', '160400000-2', 'CHEQUES', '', 1),
(39, 'DENTAL PRO', '', 'BAC HONDURAS', '730134521', 'CHEQUES', '', 1),
(40, 'DIMAFER Y ELECTRICOS, S. DE. R.L.', '', 'BANCO FICOHSA', '20000271888-9', 'CHEQUES', '', 1),
(41, 'DISPROA', '', ' BANCO FICOHSA', '0030010007023-2', 'CHEQUES', '', 1),
(42, 'DISTRIBUCIONES DIVERSAS DE CENTRO AMERICA S DE RL', '', 'BANCO LAFISE S.A.', '11450300076-7', 'CHEQUES', '', 1),
(43, 'DISTRIBUCIONES VALENCIA', '', 'BANCO DE OCCIDENTE', '21401142153-6', 'AHORRO', '', 1),
(44, 'DISTRIBUIDORA CHOROTEGA ', '', 'BAC HONDURAS', '900193401', 'AHORRO', '', 1),
(45, 'DISTRIBUIDORA COMERCIAL S.A \"DICOSA\"', '', 'BANCO FICOHSA', '0011027042-9', 'CHEQUES', '', 1),
(46, 'DISTRIBUIDORA DE MATERIALES DE SULA S.A. DE C.V. DIDEMA.', '', 'BANCO DEL PAIS', '01001002411-2', 'CHEQUES', '', 1),
(47, 'DISTRIBUIDORA DE PRODUCTOS Y SERVICIOS PIZZATI', '', 'DAVIVIENDA HONDURAS, S.A.', '301131991-4', 'CHEQUES', '', 1),
(48, 'DISTRIBUIDORA DILOPS/ GLENDA SIOMARA LOPEZ ROMERO', '', 'BANCO BANHCAFE', '1606000215', 'CHEQUES', '', 1),
(49, 'DISTRIBUIDORA SOAL', '', 'BANCO DE OCCIDENTE', '11401015008-7', 'CHEQUES', '', 1),
(50, 'DISTRIBUIDORES TECNOLOGICOS S. DE R.L. DE C.V. (DISTECH)', '', 'BAC HONDURAS', '72734531-1', 'AHORRO', '', 1),
(51, 'DROGUERIA PHARMA INTERNACIONAL S. DE R.L.', '', 'DAVIVIENDA HONDURAS, S.A.', '101016507-9', 'CHEQUES', '', 1),
(52, 'DROGUERIA Y DISTRIBUCIONES DIVERSAS DE CENTROAMERICA S. DE R.L.  ', '', 'BAC HONDURAS', '730277261', 'CHEQUES', '', 1),
(53, 'EDITORIAL LUNA COLOR S. de R.L.', '', 'BANCO DEL PAIS', '01300001000-8', 'CHEQUES', '', 1),
(54, 'EL HERALDO', '', 'BAC HONDURAS', '100350938', 'CHEQUES', '', 1),
(55, 'EL LIBANO INDUSTRIAL S. DE R.L. DE C.V.', '', 'BANCO DEL PAIS', '01014000118-0', 'CHEQUES', '', 1),
(56, 'ELECTRO LLANTAS S.DE R.L.', '', 'BANCO FICOHSA', '021026705-8', 'CHEQUES', '', 1),
(57, 'EMPRESA DE MANTENIMIENTO Y SERVICIOS MARITIMOS (EAGLE MARINE S.A.)', '', 'BANCO ATLANTIDA', '31000-71053', 'CHEQUES', '', 1),
(58, 'EMPRESA PARA EL DESARROLLO SOCIAL DE HONDURAS, S.A. DE C.V. (EMPADESH),', '', 'BANCO FICOHSA', '0021390000016-7', 'CHEQUES', '', 1),
(59, 'ENSE?ANZAS DE LA TECNOLOGIA DE INFORMACION Y COMUNICACION S DE R.L.', '', 'BANCO FICOHSA', '0-152401326', 'AHORROS ', '', 1),
(60, 'EQUIPOS Y AGROINDUSTRIAS TORRES/ BLANCA SABINA FLORES M', '', 'BANCO ATLANTIDA, S.A.', '2203029901', 'AHORROS', '', 1),
(61, 'ESCUELA DE COMANDO Y ESTADO MAYOR', '', 'BANCO DEL PAIS', '01-599-001536-8', 'CHEQUES', '', 1),
(62, 'ESCUELA DE SUBOFICIALES NAVALES', '', 'BANCO DEL PAIS', '01-599-001655-0', 'CHEQUES', '', 1),
(63, 'ESCUELA TECNICA DE LEJERCITO', '', 'BANCO DEL PAIS', '21-599-001107-1', 'CHEQUES', '', 1),
(64, 'ESS-ELECTRONICS AND SYSTEMS SOLUTIONS S de RL de CV ', '', 'BANCO DEL PAIS', '21-001-044171-9', 'CHEQUES', '', 1),
(65, 'EXTINTORES DE HONDURAS/WILLIAM NAHUN MARTINEZ CANALES', '', 'BANCO DE OCCIDENTE S.A', '21406117976-3', 'AHORROS', '', 1),
(66, 'FABRICA DE EXTRACTORES FUENTES ', '', 'BAC HONDURAS', '73-000-8441', 'CHEQUES', '', 1),
(67, 'FAH/FNH/ CENTRO DE ADIESTRAMIENTO NAVAL', '', 'BANCO DEL PAIS', '01-599-001673-9', 'CHEQUES', '', 1),
(68, 'FAH/FNH/2DO BATALLON DE INFANTERIA DE MARINA', '', 'BANCO DEL PAIS', '01-599-001283-0', 'CHEQUES', '', 1),
(69, 'FAH/FNH/PRIMER BATALLON DE FUERZAS ESPECIALES', '', 'BANCO DEL PAIS', '01-599-001802-2', 'CHEQUES', '', 1),
(70, 'FERRETERIA LA ECONOMICA S. DE R.L. FERRECO', '', 'BANCO BANHCAFE', '561400000-9', 'CHEQUES', '', 1),
(71, 'FERRETERIA PINEDA', '', 'BANCO FICOHSA', '20000501354-1', 'AHORRO', '', 1),
(72, 'FERRETERIA Y MADERERA GRUFER ', '', 'BAC HONDURAS', '73013774-1', 'CHEQUES', '', 1),
(73, 'FFAA/FNH/BANAGUA', '', 'BANCO DEL PAIS', '01-599-001650-0', 'CHEQUES', '', 1),
(74, 'FFAA/FNH/BASE NAVAL DE CARATASCA', '', 'BANCO DEL PAIS', '01-599-001676-3', 'CHEQUES', '', 1),
(75, 'FFAA/FNH/CUARTEL GENERAL NAVAL', '', 'BANCO DEL PAIS', '01-599-001654-2', 'CHEQUES', '', 1),
(76, 'FORMULAS QUIMICAS S. DE R.L.', '', 'BAC HONDURAS', '90366000-1', 'CHEQUES', '', 1),
(77, 'FUERZAS ARMADAS DE HONDURAS /ACADEMIA NAVAL DE HONDURAS', '', 'BANCO DEL PAIS', '01-602-000012-6', 'CHEQUES', '', 1),
(78, 'FUERZAS ARMADAS DE HONDURAS /FUERZA NAVAL /APOYO INSTITUCIONAL', '', 'BANCO CENTRAL DE HONDURAS', '11101-01-000991-1', 'CHEQUES', '', 1),
(79, 'FUERZAS ARMADAS DE HONDURAS /FUERZA NAVAL /FONDO DE INVERSION', '', 'BANCO CENTRAL DE HONDURAS', '11101-01-000990-1', 'CHEQUES', '', 1),
(80, 'FUERZAS ARMADAS DE HONDURAS /FUERZA NAVAL /FUNCIONAMIENTO', '', 'BANCO CENTRAL DE HONDURAS', '11101-01-000992-8', 'CHEQUES', '', 1),
(81, 'FUERZAS ARMADAS DE HONDURAS /FUERZA NAVAL /HABERES DE TROPA', '', 'BANCO CENTRAL DE HONDURAS', '11101-01-000989-8', 'CHEQUES', '', 1),
(82, 'FUERZAS ARMADAS DE HONDURAS(ECAMAN)', '', 'BANCO DEL PAIS', '21-599-001977-3', 'AHORROS ', '11', 1),
(83, 'FUERZAS ARMADAS DE HONDURAS/ FUERZA NAVAL /BANAMAP', '', 'BANCO DEL PAIS', '01-599-001256-3', 'CHEQUES', '', 1),
(84, 'FUERZAS ARMADAS DE HONDURAS/ESCUADRA NAVAL', '', 'BANCO DEL PAIS', '01-599-001609-7', 'CHEQUES', '', 1),
(85, 'FUERZAS ARMADAS/INDUSTRIA MILITAR/FONDOS PROPIOS', '', 'BANCO CENTRAL DE HONDURAS', '11101-01-000973-1', 'CHEQUES', '', 1),
(86, 'FUNDAEMPRESA', '', 'BAC HONDURAS', '100370671', 'CHEQUES', '', 1),
(87, 'GRUPO BIOMED S. DE. .R.L. DE C.V.', '', 'BANCO LAFISE S.A.', '11450300021-0', 'CHEQUES', '', 1),
(88, 'GRUPO MULTICABLES DE CORTES, S DE R.L. ', '', 'BAC HONDURAS', '730294321', 'AHORRO', '', 1),
(89, 'HEALTHCARE PRODUCTS CENTROAMERICA S. DE R.L.', '', 'BANCO LAFISE S.A.', '10110100525-6', 'CHEQUES', '', 1),
(90, 'HONDURASNET S. DE R.L.', '', 'BAC HONDURAS', '913436901', 'CHEQUES', '', 1),
(91, 'HONDURASNET S. DE R.L.', '', 'BAC HONDURAS', '913436901', 'CHEQUES', '', 1),
(92, 'HOSPITAL MILITAR', '', 'BANCO DEL PAIS', '01-599-000613-0', 'CHEQUES', '', 1),
(93, 'HUMBERTO JOSSUE CASTILLO ORTEGA/ INVERSIONES CASTILLO', '', 'BANCO FICOHSA', '4124066096', 'CHEQUES', '', 1),
(94, 'IMS CONSULTING DE HONDURAS S DE RL', '', 'BAC HONDURAS ', '727277291', 'AHORROS', '', 1),
(95, 'INGENIERIA, IMPORTACIONES Y SOLUCIONES ENERGETICAS', '', 'DAVIVIENDA HONDURAS, S.A.', '216006141-3', 'CHEQUES', '', 1),
(96, 'INSTITUTO FUERZA NAVAL', '', 'BANCO LAFISE S.A.', '24050300002-6', 'CHEQUES', '', 1),
(97, 'INVERDUCOR (INVERSIONES DURON DE CORTES)', '', 'BANCO DE OCCIDENTE S.A.', '11-205-002319-5', 'CHEQUES', '', 1),
(98, 'INVERSIONES AMOR S DE R.L', '', 'BAC HONDURAS', '73023524-1', 'CHEQUES', '', 1),
(99, 'INVERSIONES DE COMBUSTIBLE S. DE R.L. (INVERCO)', '', 'BANCO ATLANTIDA, S.A.', '10120081269', 'AHORROS', '', 1),
(100, 'INVERSIONES DEL CENTRO S. DE R.L. DE C.V.', '', 'BAC HONDURAS', '73024779-1', 'CHEQUES', '', 1),
(101, 'INVERSIONES ENERGY S. DE R.L. DE C.V.', '', 'BAC HONDURAS', '20012421-3', 'CHEQUES', '', 1),
(102, 'INVERSIONES FLORALES AR FLOWER?S, S. DE R.L.', '', 'BANCO DE OCCIDENTE S.A.', '21417114198-1', 'AHORRO', '', 1),
(103, 'INVERSIONES KALTER ', '', 'BANCO FICOHSA', '20000503600-2', 'AHORRO', '', 1),
(104, 'INVERSIONES LOGISTICAS H&M S.DE R.L.', '8019017912731', 'BANCO FICOHSA', '20000509144-5', 'CHEQUES', '', 1),
(105, 'INVERSIONES R Y R', '', 'BAC HONDURAS', '729770951', 'AHORRO', '', 1),
(106, 'INVERSIONES Y EQUIPOS S. DE R.L. DE C.V.', '', 'BANCO FICOHSA', '11390000398-7', 'CHEQUES', '', 1),
(107, 'LA ARMERIA ', '', 'BANCO DEL PAIS', '21-599-001222-1', 'AHORRO', '', 1),
(108, 'LAPIDAS Y PLACAS DE HONDURAS', '', 'BANCO ATLANTIDA', '1332010824-7', 'AHORRO', '', 1),
(109, 'LEOPLAST S. DE R.L.', '', 'BANCO DE OCCIDENTE S.A', '11401012673-9', 'CHEQUES', '', 1),
(110, 'MADISON DRY CLEANERS', '', 'BANCO ATLANTIDA', '120347652-6', 'CHEQUES', '', 1),
(111, 'MAGNUM BASE S. DE R.L. DE C. V.', '', 'BANCO FICOHSA', '0211010058986-9', 'CHEQUES', '', 1),
(112, 'MARITIMA Y TRANSPORTES HONDURAS  S.A DE C.V.', '', 'BANCO DE OCCIDENTE S.A', '11201003603-2', 'CHEQUES', '', 1),
(113, 'MARITIMOS Y TRANSPORTE DE HONDURAS', '', 'BANCO DE OCCIDENTE S.A', '1120100360302', 'CHEQUES', '', 1),
(114, 'MEDICA DENTAL NACIONAL S. DE R.L. MEDIDENT', '', 'BANCO DE OCCIDENTE S.A', '11230000017-0', 'CHEQUES', '', 1),
(115, 'MEDITEC', '', 'DAVIVIENDA HONDURAS, S.A.', '2011056248', 'AHORRO', '', 1),
(116, 'METALES Y MAS S. DE R.L.', '', 'BANCO DE OCCIDENTE S.A', '11-403-013193-2', 'CHEQUES', '', 1),
(117, 'MOTORES KAWAS ', '', 'BANCO ATLANTIDA, S.A.', '310-00-21595', 'CHEQUES', '', 1),
(118, 'MULTISERVICIOS LAGOS SM, S. DE R.L.', '', 'BAC HONDURAS', '729205731', 'CHEQUES', '', 1),
(119, 'MUROS Y MAS S. DE R.L. DE C.V.', '', 'BANCO ATLANTIDA', '1011101642-3', 'CHEQUES', '', 1),
(120, 'NOHELIA SPORT', '', 'BANCO DE OCCIDENTE S.A', '11-205-002410-8', 'CHEQUES', '', 1),
(121, 'NORIT/ DAVID HUMBERTO OWEN GARCIA', '', 'BANCO BANHCAFE', '1604000002', 'CHEQUES', '', 1),
(122, 'NOVEDADES STEFFY?S', '', 'BANCO PROMERICA', '176476-7', 'AHORRO', '', 1),
(123, 'OPERADORES TURISTICOS DE HONDURAS S.A.', '', 'BANCO DE OCCIDENTE S.A', '11401017470-9', 'CHEQUES', '', 1),
(124, 'PAGADURIA FUERZA NAVAL', '', 'BANCO DEL PAIS', '215-990-007-350', 'AHORRO', '', 1),
(125, 'PAPELERA CALPULES S.A. DE C.V. (PACASA)', '', 'BANCO FICOHSA', '021-102-10-100-7', 'CHEQUES', '', 1),
(126, 'PAPELERIA HONDURAS S. DE R.L.', '', 'BAC HONDURAS', '90977720-1', 'CHEQUES', '', 1),
(127, 'PAT JOYERIA Y RELOJERIA S. DE R.L.', '', 'BANCO ATLANTIDA', '110015032-3', 'CHEQUES', '', 1),
(128, 'PERIODICOS Y REVISTAS S.A DE C.V.', '', 'BANCO DE OCCIDENTE S.A', '11424000209-8', 'CHEQUES', '', 1),
(129, 'PINTURAS SUR DE HONDURAS ', '', 'BAC HONDURAS', '90990930-1', 'CHEQUES', '', 1),
(130, 'POOL SUPPLIES S. DE R.L.', '', 'BAC HONDURAS', '730159491', 'CHEQUES', '', 1),
(131, 'PRIMER BATALLON DE INFANTERIA DE MARINA', '', 'BANCO DEL PAIS', '01-600-000263-8', 'CHEQUES', '', 1),
(132, 'PRONTO SERVICIOS DE HONDURAS', '', 'FICENSA', '320022932', 'AHORROS ', '', 1),
(133, 'PROVEEDORA DE MATERIALES DE LA CONSTRUCCION(PROMACO)', '', 'BANCO ATLANTIDA', '720066996-3', 'CHEQUES', '', 1),
(134, 'PROYECTO DE INGENIERIA CENTROAMERICANA S. DE R.L (PROINCA S. DE R.L.)', '', 'BANCO FICOHSA', '0012401983-1', 'AHORRO', '', 1),
(135, 'REENCAUCHE Y DISTRIBUCION DE LLANTAS S.A DE C.V', '', 'BAC HONDURAS', '73003546-1', 'CHEQUES', '', 1),
(136, 'REPRESENTACIONES QUIMICAS DE CENTRO AMERICA S DE R.L.', '', 'BANCO DE OCCIDENTE S.A', '11408013088-3', 'CHEQUES', '', 1),
(137, 'REPRESENTACIONES Y DISTRIBUCIONES PONCE (REDIPO)', '', 'BANCO ATLANTIDA', '110026205-2', 'CHEQUES', '', 1),
(138, 'REPUESTOS Y ACCESORIOS PIZZATI', '', 'DAVIVIENDA HONDURAS, S.A.', '301131991-4', 'CHEQUES', '', 1),
(139, 'RESTAURANTE Y TERRAZA BELLA VISTA S. DE R.L.', '', 'BAC HONDURAS', '727832231', 'CHEQUES', '', 1),
(140, 'RILMAC IMPRESORES', '', 'BAC HONDURAS', '730013641', 'CHEQUES', '', 1),
(141, 'ROCAS COMERCIAL / RENAN ORLANDO CASCO', '', 'BANCO DE OCCIDENTE S.A', '21-401-165866-8', 'AHORROS ', '', 1),
(142, 'ROYMART S. DE R.L. DE C.V.', '', 'BAC HONDURAS', '71000651-1', 'CHEQUES', '', 1),
(143, 'RZV SOLUCIONES Y DISTRIBUCIONES INFORMATICAS ', '', 'BAC HONDURAS', '102350141', 'CHEQUES', '', 1),
(144, 'SECRETARIA DE DEFENSA NACIONAL / UNIVERSIDAD DE DEFENSA DE HONDURAS', '', 'BANCO DEL PAIS', '01-599-000886-8', 'CHEQUES', '', 1),
(145, 'SEDENA/FFAA/EJERCITO/GASTOS DE FUNCIONAMIENTO', '', 'BANCO CENTRAL DE HONDURAS', '11101-01-000987-1', 'CHEQUES', '', 1),
(146, 'SEDENA-HOSPITAL MILITAR', '', 'BANCO DEL PAIS', '01599000613-0', 'CHEQUES', '', 1),
(147, 'SEGUROS ATLANTIDA, S.A.', '', 'BANCO ATLANTIDA, S.A.', '110002248-0', 'CHEQUES', '', 1),
(148, 'SERIBOTEX S. DE R.L.', '', 'BANCO ATLANTIDA', '1152006553-0', 'AHORRO', '', 1),
(149, 'SERVI MECHES', '', 'BANCO DEL PAIS', '21-302-0092266', 'AHORRO', '', 1),
(150, 'SERVICIO ELECTRICO MECANICO INDUSTRIAL S.E.M.I', '', 'BANCO DE OCCIDENTE S.A', '112110072189', 'CHEQUES', '', 1),
(151, 'SERVICIOS AIRE, TIERRA Y MAR S.DE.R.L.', '', 'BANCO ATLANTIDA, S.A.', '01011101372-7', 'CHEQUES', '', 1),
(152, 'SERVICIOS MARITIMOS DE HONDURAS, S. DE R.L. ', '', 'BAC HONDURAS', '727392311', 'AHORRO', '', 1),
(153, 'SERVICIOS TECNICOS Y SUMINISTROS (STS)', '', 'BANCO ATLANTIDA, S.A.', '001-201-71145-2', 'AHORROS ', '', 1),
(154, 'SERVITODO S. DE R.L.', '', 'BAC HONDURAS', '91120770-1', 'CHEQUES', '', 1),
(155, 'SISTEMAS GRAFICOS MENDEZ / SIGMEN', '', 'BANCO FICOHSA', '011-101-344071', 'CHEQUES', '', 1),
(156, 'SOUVENIRS ARTESANIAS CANDU', '', 'BAC HONDURAS', '100200488', 'AHORRO', '', 1),
(157, 'STEPHANIE WILLIAMS CACERES', '', 'BANCO DEL PAIS', '21-326-002884-8', 'AHORROS ', '', 1),
(158, 'SUPERMERCADOS YIP S. A DE C.V', '', 'BANCO ATLANTIDA', '110003439-4', 'CHEQUES', '', 1),
(159, 'TALLER \"VELASQUEZ\"', '', 'BANCO DEL PAIS', '21304000874-0', 'AHORRO', '', 1),
(160, 'TECNICOM Y SUMINISTROS S DE R.L.', '', 'BANCO ATLANTIDA', '1381100092-9', 'CHEQUES', '', 1),
(161, 'TECNOLOGIAS Y SERVICIOS INTERNACIONALES DE HONDURAS S.A DE C.V.', '', 'BAC HONDURAS', '73020157-1', 'CHEQUES', '', 1),
(162, 'TIENDA MILITAR I.P.M.', '', 'BANCO DEL PAIS', '01-599-000608-3', 'CHEQUES', '', 1),
(163, 'TIENDA NAVAL', '', 'BANCO DEL PAIS', '01302000225-6', 'CHEQUES', '', 1),
(164, 'TIENDA NAVAL', '', 'BANCO DEL PAIS', '21302009511-7', 'AHORRO', '', 1),
(165, 'TORNILLOS Y PARTES INDUSTRIALES S. DE R.L. DE C.V.', '', 'DAVIVIENDA HONDURAS, S.A.', '6010109980', 'CHEQUES', '', 1),
(166, 'TOYOSERVICIO, S.A.', '', 'BAC HONDURAS', '91151860-1', 'CHEQUES', '', 1),
(167, 'TULIO ROBERTO LAGOS ARNOLD', '', 'BANCO DEL PAIS', '21-318-006260-8', 'AHORRO', '', 1),
(168, 'TULIPANES ALIMENTOS Y SERVICIOS S. DE R.L.', '', 'BAC HONDURAS', '91153810-1', 'CHEQUES', '', 1),
(169, 'XMEDIA S. DE R.L.', '', 'BAC HONDURAS', '100603860', 'CHEQUES', '', 1),
(170, 'XXI BATALLON DE POLICIA MILITAR (HABERES)', '', 'BANCO DEL PAIS', '01-599-000785-3', 'CHEQUES', '', 1),
(171, 'YAM INDUSTRIAL S. DE R.L. DE C.V', '', 'FICOHSA', '07101301-836', 'CHEQUES', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `retenciones`
--

CREATE TABLE `retenciones` (
  `idretenciones` int(11) NOT NULL,
  `idproveedores` int(11) NOT NULL,
  `rtn` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `numdocumento` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_hora` date NOT NULL,
  `tipo_impuesto` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` varchar(250) COLLATE utf8mb4_spanish_ci NOT NULL,
  `base_imponible` decimal(11,2) NOT NULL,
  `imp_retenido` decimal(11,2) NOT NULL,
  `total_oc` decimal(11,2) NOT NULL,
  `estado` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `retenciones`
--

INSERT INTO `retenciones` (`idretenciones`, `idproveedores`, `rtn`, `numdocumento`, `fecha_hora`, `tipo_impuesto`, `descripcion`, `base_imponible`, `imp_retenido`, `total_oc`, `estado`) VALUES
(1, 2, '1588', '0012', '2019-05-21', '0.15', 'f', '3560.00', '534.00', '4094.00', 'Aceptado'),
(2, 3, '1588', '58654', '2019-05-24', '0.15', 'gfdgfd', '13639.53', '2045.93', '15685.46', 'Aceptado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transferenciabch`
--

CREATE TABLE `transferenciabch` (
  `idtransferenciabch` int(11) NOT NULL,
  `idproveedores` int(11) NOT NULL,
  `idctasbancarias` int(11) NOT NULL,
  `fecha_hora` date DEFAULT NULL,
  `tipo_transfbch` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `serie_transf` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `num_transf` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `monto_acreditar` decimal(11,2) DEFAULT NULL,
  `descripcion` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `condicion` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `transferenciabch`
--

INSERT INTO `transferenciabch` (`idtransferenciabch`, `idproveedores`, `idctasbancarias`, `fecha_hora`, `tipo_transfbch`, `serie_transf`, `num_transf`, `monto_acreditar`, `descripcion`, `condicion`) VALUES
(1, 10, 1, '2019-05-17', 'Transf/Terceros', '05MAY2019', '0001', '1550.00', 'Para algo', 1),
(2, 10, 2, '2019-05-17', 'Transf/Cuentas', '06MAY2019', '0002', '1111.11', 'nada', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transferidoctaspg`
--

CREATE TABLE `transferidoctaspg` (
  `idtransferidoctaspg` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `fecha_hora` date NOT NULL,
  `tipo_transf` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `numexpediente` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `numtransferencia` varchar(11) COLLATE utf8mb4_spanish_ci NOT NULL,
  `valor_transferido` decimal(12,2) NOT NULL,
  `estado` varchar(15) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `transferidoctaspg`
--

INSERT INTO `transferidoctaspg` (`idtransferidoctaspg`, `idusuario`, `fecha_hora`, `tipo_transf`, `numexpediente`, `numtransferencia`, `valor_transferido`, `estado`) VALUES
(1, 1, '2019-05-13', 'Transf/Sedena', '456', '45654', '999999.00', 'Aceptado'),
(2, 1, '2019-05-15', 'Transf/Cuentas', '564', '345', '6320120.10', 'Aceptado');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uuss`
--

CREATE TABLE `uuss` (
  `iduuss` int(11) NOT NULL,
  `nombreuuss` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `rhfn` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `uuss`
--

INSERT INTO `uuss` (`iduuss`, `nombreuuss`, `rhfn`) VALUES
(1, '-', '-'),
(2, 'UU.RR', ''),
(3, 'L.P. CHAMELECOM', 'FNH-8501'),
(4, 'LCM-WURUNTA', 'FNH-7303'),
(5, 'L.P. TEGUCIGALPA', 'FNH-1071'),
(6, 'L.P. HONDURAS', 'FNH-1053'),
(7, 'L.P. GUAYMURAS', 'FNH-1051'),
(8, 'B.L. PUNTA SAL', ''),
(9, 'LCW-CAXINAS', 'FNH-1491'),
(10, 'MOTORES FUERA DE BORDA', ''),
(11, 'P.O. MORAZAN', 'FNH-1402'),
(12, 'P.O. LEMPIRA', 'FNH-1401'),
(13, 'L.P. CHOLUTECA', 'FNH-6505'),
(14, 'BAL-C ', 'FNH-1611'),
(15, 'O.P.V. GRAL CABAÑAS', ''),
(16, 'L.P. GUASCORAN', ''),
(17, 'B.L. YOJOA II', ''),
(18, 'B.L. BRUS LAGUNA', '');

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
  ADD KEY `adm_or_programa` (`idprograma`),
  ADD KEY `adm_or_uuss` (`iduuss`);

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
-- Indices de la tabla `detalle_retenciones`
--
ALTER TABLE `detalle_retenciones`
  ADD PRIMARY KEY (`iddetalle_retenciones`),
  ADD KEY `detalle_retenciones` (`idretenciones`),
  ADD KEY `detalle_compromisos` (`idcompromisos`);

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
-- Indices de la tabla `retenciones`
--
ALTER TABLE `retenciones`
  ADD PRIMARY KEY (`idretenciones`),
  ADD KEY `idproveedor` (`idproveedores`);

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
-- Indices de la tabla `uuss`
--
ALTER TABLE `uuss`
  ADD PRIMARY KEY (`iduuss`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrar_ordenes`
--
ALTER TABLE `administrar_ordenes`
  MODIFY `idadministrar_ordenes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `bancos`
--
ALTER TABLE `bancos`
  MODIFY `idbancos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT de la tabla `compromisos`
--
ALTER TABLE `compromisos`
  MODIFY `idcompromisos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `idconfiguracion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `contabilidad`
--
ALTER TABLE `contabilidad`
  MODIFY `idcontabilidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `crear_acuerdo`
--
ALTER TABLE `crear_acuerdo`
  MODIFY `idcrear_acuerdo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_compromisos`
--
ALTER TABLE `detalle_compromisos`
  MODIFY `iddetalle_compromisos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  MODIFY `iddetalle_orden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `detalle_retenciones`
--
ALTER TABLE `detalle_retenciones`
  MODIFY `iddetalle_retenciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `dtransf_ctaspg`
--
ALTER TABLE `dtransf_ctaspg`
  MODIFY `dtransf_ctaspg` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `factura_orden`
--
ALTER TABLE `factura_orden`
  MODIFY `idfactura_orden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  MODIFY `idingreso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `idpermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `presupuesto_disponible`
--
ALTER TABLE `presupuesto_disponible`
  MODIFY `idpresupuesto_disponible` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `idproveedores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT de la tabla `retenciones`
--
ALTER TABLE `retenciones`
  MODIFY `idretenciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `transferenciabch`
--
ALTER TABLE `transferenciabch`
  MODIFY `idtransferenciabch` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `transferidoctaspg`
--
ALTER TABLE `transferidoctaspg`
  MODIFY `idtransferidoctaspg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT de la tabla `uuss`
--
ALTER TABLE `uuss`
  MODIFY `iduuss` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrar_ordenes`
--
ALTER TABLE `administrar_ordenes`
  ADD CONSTRAINT `adm_or_programa` FOREIGN KEY (`idprograma`) REFERENCES `programa` (`idprograma`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `adm_or_proveedores` FOREIGN KEY (`idproveedores`) REFERENCES `proveedores` (`idproveedores`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `adm_or_usuarios` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `adm_or_uuss` FOREIGN KEY (`iduuss`) REFERENCES `uuss` (`iduuss`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Filtros para la tabla `detalle_retenciones`
--
ALTER TABLE `detalle_retenciones`
  ADD CONSTRAINT `detalle_compromisos` FOREIGN KEY (`idcompromisos`) REFERENCES `compromisos` (`idcompromisos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `detalle_retenciones` FOREIGN KEY (`idretenciones`) REFERENCES `retenciones` (`idretenciones`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `factura_orden`
--
ALTER TABLE `factura_orden`
  ADD CONSTRAINT `factura_idorden` FOREIGN KEY (`idadministrar_ordenes`) REFERENCES `administrar_ordenes` (`idadministrar_ordenes`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `retenciones`
--
ALTER TABLE `retenciones`
  ADD CONSTRAINT `retenciones_proveedores` FOREIGN KEY (`idproveedores`) REFERENCES `proveedores` (`idproveedores`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
