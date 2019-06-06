-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-06-2019 a las 06:53:11
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
-- Base de datos: `sistemac_fnh`
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
  `descripcion_orden` varchar(300) NOT NULL,
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
(4, 142, 1, 13, 1, '4', '4', 'Material', 'COMBUSTIBLE PARA SER UTILIZADO EN PATRULLAJES MARITIMOS, TERRESTRES Y MISIONES OPERATIVAS DE LA BASE NAVAL DE PUERTO CASTILLA Y RESERVA DEL ESTADO MAYOR NAVAL EN LA BANACAST.', 'O/C', '2019-01-25', '128640.00', '0.00', '128640.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '128640.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '128640.00', 'Pendiente'),
(6, 142, 1, 13, 1, '2', '2', 'Material', 'COMBUSTIBLE PARA SER UTILIZADO EN PATRULLAJES MARÍTIMOS ,DEL BUQUE DE APOYO LOGÍSTICO PUNTA SAL DE LA FUERZA NAVAL.', 'O/C', '2019-01-22', '143300.00', '0.00', '143300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '143300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '143300.00', 'Pendiente'),
(7, 142, 1, 13, 1, '5', '5', 'Material', 'COMBUSTIBLE PARA SER UTILIZADO EN PATRULLAJES MARITIMOS, TERRESTRES Y MISIONES OPERATIVAS DE LA BASE NAVAL DE PUERTO CASTILLA Y RESERVA DEL ESTADO MAYOR NAVAL EN LA BANACAST.', 'O/C', '2019-01-25', '90780.00', '0.00', '90780.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '90780.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '90780.00', 'Pendiente'),
(8, 142, 1, 13, 1, '6', '6', 'Material', 'COMBUSTIBLE PARA SER UTILIZADO EN PATRULLAJES MARITIMOS, TERRESTRES Y MISIONES OPERATIVAS DEL CENTRO DE ADIESTRAMIENTO NAVAL (CAN)', 'O/C', '2019-01-25', '22695.00', '0.00', '22695.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '22695.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '22695.00', 'Pendiente'),
(9, 142, 1, 13, 1, '7', '7', 'Material', 'COMBUSTIBLE PARA SER UTILIZADO EN PATRULLAJES MARITIMOS, TERRESTRES Y MISIONES OPERATIVAS DEL SEGUNDO BATALLON DE INFANTERIA DE MARINA.', 'O/C', '2019-01-25', '75650.00', '0.00', '75650.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '75650.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '75650.00', 'Pendiente'),
(10, 142, 1, 13, 1, '8', '8', 'Material', 'COMBUSTIBLE PARA SER UTILIZADO EN PATRULLAJES MARITIMOS DE LA L.P. TEGUCIGALPA FNH-1071 DE LA FUERZA NAVAL.', 'O/C', '2019-01-25', '37825.00', '0.00', '37825.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '37825.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '37825.00', 'Pendiente'),
(11, 142, 1, 13, 1, '9', '9', 'Material', 'COMBUSTIBLE PARA SER UTILIZADO EN PATRULLAJES MARITIMOS DE LA L.P. HONDURAS FNH-1053 DE LA FUERZA NAVAL.', 'O/C', '2019-01-25', '226950.00', '0.00', '226950.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '226950.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '226950.00', 'Pendiente'),
(12, 142, 1, 13, 1, '10', '10', 'Material', 'COMBUSTIBLE PARA SER UTILIZADO EN PATRULLAJES MARITIMOS DE LA L.C.U. PUNTA CAXINAS FNH-1491 DE LA FUERZA NAVAL.', 'O/C', '2019-01-25', '302600.00', '0.00', '302600.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '302600.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '302600.00', 'Pendiente'),
(13, 3, 1, 4, 13, '34123', '312321', 'Materiales', 'SDADSA', 'O/C', '2019-06-04', '349952.41', '0.00', '349952.41', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '349952.41', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '349952.41', 'Pagado');

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
  `fecha_registro` date NOT NULL,
  `tipo_registro` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `numfactura` varchar(20) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `total_compra` decimal(11,2) DEFAULT NULL,
  `condicion` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `compromisos`
--

INSERT INTO `compromisos` (`idcompromisos`, `idprograma`, `idproveedores`, `fecha_hora`, `fecha_registro`, `tipo_registro`, `numfactura`, `total_compra`, `condicion`) VALUES
(2, 15, 125, '2019-03-21', '2019-05-30', 'Funcionamiento/General', '010-001-01-00020817', '4054.49', 0),
(3, 15, 125, '2019-04-22', '2019-05-30', 'Funcionamiento/General', '010-001-01-00023005', '190.92', 0),
(4, 15, 50, '2019-05-13', '2019-05-30', 'Funcionamiento/General', '000-002-01-00000793', '45850.00', 0),
(5, 13, 126, '2019-05-02', '2019-05-30', 'Funcionamiento/General', '000-001-01-00028376', '22902.39', 0),
(7, 13, 51, '2019-05-17', '2019-05-30', 'Funcionamiento/General', '000-001-01-00051281', '42638.10', 0),
(8, 13, 175, '2019-05-07', '2019-05-30', 'Funcionamiento/General', '000-001-01-00002696', '58597.00', 0),
(9, 13, 137, '2019-05-08', '2019-05-30', 'Funcionamiento/General', '000-001-01-00006288', '66220.20', 0),
(11, 13, 175, '2019-05-07', '2019-05-30', 'Funcionamiento/General', '000-001-01-00002696', '131258.00', 0),
(12, 3, 174, '2019-05-06', '2019-05-30', 'Funcionamiento/General', '000-001-01-00004505', '23040.02', 0),
(13, 13, 2, '2019-05-07', '2019-05-30', 'Funcionamiento/General', '016-001-01-00101785', '96219.11', 0),
(14, 13, 163, '2019-05-28', '2019-05-30', 'Funcionamiento/General', '000-001-01-00001403', '216818.05', 0),
(15, 13, 17, '2019-04-30', '2019-05-30', 'Funcionamiento/General', '008-001-01-00003410', '23423.09', 0),
(16, 13, 17, '2019-04-30', '2019-05-30', 'Funcionamiento/General', '008-001-01-00003409', '32586.29', 0),
(17, 13, 171, '2019-05-23', '2019-05-30', 'Funcionamiento/General', '000-003-01-00026283', '1472.00', 0),
(18, 13, 171, '2019-05-23', '2019-05-30', 'Funcionamiento/General', '000-003-01-00026284', '20700.00', 0),
(19, 13, 171, '2019-05-23', '2019-05-30', 'Funcionamiento/General', '000-003-01-00026285', '4416.00', 0),
(20, 13, 171, '2019-05-23', '2019-05-30', 'Funcionamiento/General', '000-003-01-00026286', '4416.00', 0),
(21, 13, 171, '2019-05-23', '2019-05-30', 'Funcionamiento/General', '000-003-01-00026287', '9212.50', 0),
(22, 13, 171, '2019-05-23', '2019-05-30', 'Funcionamiento/General', '000-003-01-00026288', '5635.00', 0),
(23, 13, 171, '2019-05-23', '2019-05-30', 'Funcionamiento/General', '000-003-01-00026289', '3864.00', 0),
(24, 13, 171, '2019-05-23', '2019-05-30', 'Funcionamiento/General', '000-003-01-00026290', '5071.50', 0),
(25, 13, 171, '2019-05-23', '2019-05-30', 'Funcionamiento/General', '000-003-01-00026291', '10028.00', 0),
(26, 13, 171, '2019-05-23', '2019-05-30', 'Funcionamiento/General', '000-003-01-00026292', '3864.00', 0),
(27, 13, 171, '2019-05-23', '2019-05-30', 'Funcionamiento/General', '000-003-01-00026293', '9809.50', 0),
(28, 13, 171, '2019-05-23', '2019-05-30', 'Funcionamiento/General', '000-003-01-00026294', '6210.00', 0),
(29, 13, 171, '2019-05-23', '2019-05-30', 'Funcionamiento/General', '000-003-01-00026295', '3312.00', 0),
(30, 13, 171, '2019-05-23', '2019-05-30', 'Funcionamiento/General', '000-003-01-00026296', '3864.00', 0),
(31, 13, 171, '2019-05-23', '2019-05-30', 'Funcionamiento/General', '000-003-01-00026297', '8372.00', 0),
(32, 13, 171, '2019-05-23', '2019-05-30', 'Funcionamiento/General', '000-003-01-00026299', '2392.00', 0),
(33, 13, 171, '2019-05-23', '2019-05-30', 'Funcionamiento/General', '000-003-01-00026300', '10028.00', 0),
(34, 13, 171, '2019-05-23', '2019-05-30', 'Funcionamiento/General', '000-003-01-00026301', '3864.00', 0),
(35, 13, 171, '2019-05-23', '2019-05-30', 'Funcionamiento/General', '000-003-01-00026302', '5175.00', 0),
(36, 13, 171, '2019-05-23', '2019-05-30', 'Funcionamiento/General', '000-003-01-00026303', '3864.00', 0),
(37, 13, 171, '2019-05-23', '2019-05-30', 'Funcionamiento/General', '000-003-01-00026304', '2576.00', 0),
(38, 13, 171, '2019-05-23', '2019-05-30', 'Funcionamiento/General', '000-003-01-00026305', '2576.00', 0),
(39, 13, 171, '2019-05-23', '2019-05-30', 'Funcionamiento/General', '000-003-01-00026306', '10028.00', 0),
(40, 13, 171, '2019-05-23', '2019-05-30', 'Funcionamiento/General', '000-003-01-00026307', '2576.00', 0),
(41, 13, 171, '2019-05-23', '2019-05-30', 'Funcionamiento/General', '000-003-01-00026308', '10028.00', 0),
(42, 13, 171, '2019-05-23', '2019-05-30', 'Funcionamiento/General', '000-003-01-00026309', '3864.00', 0),
(43, 13, 171, '2019-05-23', '2019-05-30', 'Funcionamiento/General', '000-003-01-00026310', '5175.00', 0),
(44, 13, 171, '2019-05-23', '2019-05-30', 'Funcionamiento/General', '000-003-01-00026311', '2576.00', 0),
(45, 13, 171, '2019-05-23', '2019-05-30', 'Funcionamiento/General', '000-003-01-00026312', '3450.00', 0),
(46, 13, 171, '2019-05-23', '2019-05-30', 'Funcionamiento/General', '000-003-01-00026313', '10028.00', 0),
(47, 13, 171, '2019-05-23', '2019-05-30', 'Funcionamiento/General', '000-003-01-00026314', '7360.00', 0),
(48, 13, 171, '2019-05-23', '2019-05-30', 'Funcionamiento/General', '000-003-01-00026315', '3312.00', 0),
(49, 13, 171, '2019-05-23', '2019-05-30', 'Funcionamiento/General', '000-003-01-00026316', '2208.00', 0),
(50, 13, 171, '2019-05-23', '2019-05-30', 'Funcionamiento/General', '000-003-01-00026317', '6210.00', 0),
(51, 13, 171, '2019-05-23', '2019-05-30', 'Funcionamiento/General', '000-003-01-00026318', '10028.00', 0),
(52, 13, 18, '2019-04-26', '2019-05-30', 'Funcionamiento/General', '000-001-01-00000841', '8395.00', 0),
(53, 13, 18, '2019-05-23', '2019-05-30', 'Funcionamiento/General', '000-001-01-00000843', '9599.65', 0),
(54, 13, 98, '2019-05-04', '2019-05-30', 'Funcionamiento/General', '000-001-01-00024051', '98890.00', 0),
(56, 13, 98, '2019-05-04', '2019-05-30', 'Funcionamiento/General', '000-001-01-00024054', '16290.00', 0),
(57, 7, 125, '2019-03-14', '2019-05-30', 'Funcionamiento/General', '010-001-01-00020073', '11641.19', 0),
(58, 13, 98, '2019-05-04', '2019-05-30', 'Funcionamiento/General', '000-001-01-00024055', '122175.00', 0),
(59, 13, 98, '2019-05-04', '2019-05-30', 'Funcionamiento/General', '000-001-01-00024056', '340200.00', 0),
(60, 13, 98, '2019-05-04', '2019-05-30', 'Funcionamiento/General', '000-001-01-00024058', '176694.00', 0),
(61, 13, 98, '2019-05-04', '2019-05-30', 'Funcionamiento/General', '000-001-01-00024059', '101490.00', 0),
(62, 13, 98, '2019-05-04', '2019-05-30', 'Funcionamiento/General', '000-001-01-00024060', '651600.00', 0),
(63, 13, 98, '2019-05-04', '2019-05-30', 'Funcionamiento/General', '000-001-01-00024061', '325800.00', 0),
(64, 13, 98, '2019-05-04', '2019-05-30', 'Funcionamiento/General', '000-001-01-00024062', '81450.00', 0),
(65, 7, 125, '2019-03-15', '2019-05-30', 'Funcionamiento/General', '010-001-01-00020313', '726.16', 0),
(66, 13, 98, '2019-05-04', '2019-05-30', 'Funcionamiento/General', '000-001-01-00024066', '165000.00', 0),
(67, 13, 98, '2019-05-04', '2019-05-30', 'Funcionamiento/General', '000-001-01-00024067', '330000.00', 0),
(68, 7, 125, '2019-03-23', '2019-05-30', 'Funcionamiento/General', '010-001-01-00021081', '943.35', 0),
(69, 13, 98, '2019-05-04', '2019-05-30', 'Funcionamiento/General', '000-001-01-00024099', '415950.00', 0),
(70, 13, 98, '2019-05-04', '2019-05-30', 'Funcionamiento/General', '000-001-01-00024100', '299790.00', 0),
(71, 13, 53, '2019-04-22', '2019-05-30', 'Funcionamiento/General', '000-001-01-00001832', '18236.12', 0),
(72, 7, 26, '2019-03-28', '2019-05-30', 'Funcionamiento/General', '000-001-01-00110257', '13435.01', 0),
(73, 8, 126, '2019-04-11', '2019-05-30', 'Funcionamiento/General', '000-001-01-00028072', '2077.18', 0),
(74, 7, 26, '2019-03-28', '2019-05-30', 'Funcionamiento/General', '000-001-01-00110259', '7191.49', 0),
(75, 8, 43, '2019-04-26', '2019-05-30', 'Funcionamiento/General', '000-001-01-00010705', '3038.42', 0),
(76, 7, 19, '2019-04-15', '2019-05-30', 'Funcionamiento/General', '000-002-01-00005243', '6474.97', 0),
(77, 7, 19, '2019-04-15', '2019-05-30', 'Funcionamiento/General', '000-002-01-00005257', '10560.04', 0),
(78, 13, 107, '2019-05-29', '2019-05-30', 'Funcionamiento/General', '000-001-01-00019442', '3450.00', 0),
(79, 13, 98, '2019-05-04', '2019-05-30', 'Funcionamiento/General', '000-001-01-00024053', '65160.00', 0),
(80, 5, 92, '2019-05-06', '2019-05-30', 'Fondos_ESON', '', '60000.00', 0),
(82, 6, 43, '2019-04-23', '2019-05-30', 'Funcionamiento/General', '000-001-01-00010675', '5296.14', 0),
(83, 4, 3, '2019-04-26', '2019-05-30', 'Funcionamiento/General', '000-001-01-00004138', '5004.80', 0),
(84, 9, 3, '2019-04-26', '2019-05-30', 'Funcionamiento/General', '000-001-01-00004130', '10652.45', 0),
(85, 9, 3, '2019-04-26', '2019-05-30', 'Funcionamiento/General', '000-001-01-00004131', '24094.80', 0),
(86, 6, 3, '2019-04-26', '2019-05-30', 'Funcionamiento/General', '000-001-01-00004135', '276.00', 0),
(87, 6, 3, '2019-04-26', '2019-05-30', 'Funcionamiento/General', '000-001-01-00004134', '1000.50', 0),
(88, 6, 3, '2019-04-26', '2019-05-30', 'Funcionamiento/General', '000-001-01-00004133', '1362.75', 0),
(89, 6, 3, '2019-04-26', '2019-05-30', 'Funcionamiento/General', '000-001-01-00004132', '931.50', 0),
(90, 6, 3, '2019-04-26', '2019-05-30', 'Funcionamiento/General', '000-001-01-00004136', '3088.90', 0),
(91, 13, 97, '2019-04-29', '2019-05-30', 'Funcionamiento/General', '000-001-01-00005859', '66107.35', 0),
(92, 13, 97, '2019-04-29', '2019-05-30', 'Funcionamiento/General', '000-001-01-00005860', '5292.88', 0),
(93, 13, 71, '2019-04-29', '2019-05-30', 'Funcionamiento/General', '001-001-01-00006222', '3438.50', 0),
(94, 13, 3, '2019-04-29', '2019-05-30', 'Funcionamiento/General', '000-001-01-00004140', '1230.50', 0),
(95, 13, 3, '2019-04-29', '2019-05-30', 'Funcionamiento/General', '000-001-01-00004141', '7279.50', 0),
(96, 13, 3, '2019-04-29', '2019-05-30', 'Funcionamiento/General', '000-001-01-00004143', '2070.00', 0),
(97, 13, 3, '2019-04-29', '2019-05-30', 'Funcionamiento/General', '000-001-01-00004145', '1541.00', 0),
(98, 13, 3, '2019-04-29', '2019-05-30', 'Funcionamiento/General', '000-001-01-00004144', '5491.25', 0),
(99, 13, 3, '2019-04-29', '2019-05-30', 'Funcionamiento/General', '000-001-01-00004146', '1403.00', 0),
(100, 13, 3, '2019-04-29', '2019-05-30', 'Funcionamiento/General', '000-001-01-00004148', '1759.50', 0),
(101, 13, 135, '2019-04-30', '2019-05-30', 'Funcionamiento/General', '006-001-01-00003747', '122389.90', 0),
(102, 13, 118, '2019-05-14', '2019-05-30', 'Funcionamiento/General', '000-001-01-00000326', '57169.95', 0),
(103, 13, 3, '2019-05-14', '2019-05-30', 'Funcionamiento/General', '000-001-01-00004175', '3008.40', 0),
(104, 13, 71, '2019-05-22', '2019-05-30', 'Funcionamiento/General', '001-001-01-00006264', '150188.85', 0),
(105, 13, 48, '2019-05-21', '2019-05-30', 'Funcionamiento/General', '000-001-01-00001496', '152317.50', 0),
(106, 13, 118, '2019-05-27', '2019-05-30', 'Funcionamiento/General', '000-001-01-00000328', '12522.35', 0),
(107, 10, 53, '2019-04-24', '2019-05-30', 'Funcionamiento/General', '000-001-01-00001836', '10544.35', 0),
(108, 4, 72, '2019-05-06', '2019-05-30', 'Funcionamiento/General', '000-002-01-00044643', '26950.14', 0),
(109, 13, 97, '2019-05-06', '2019-05-30', 'Funcionamiento/General', '000-001-01-00005880', '5885.13', 0),
(110, 7, 19, '2019-05-10', '2019-05-30', 'Funcionamiento/General', '000-002-01-00005313', '1815.00', 0),
(111, 4, 176, '2019-05-13', '2019-05-30', 'Funcionamiento/General', '000-001-01-00001042', '7279.50', 0),
(113, 7, 26, '2019-05-13', '2019-05-30', 'Funcionamiento/General', '000-001-01-00112725', '4008.37', 0),
(114, 7, 26, '2019-05-13', '2019-05-30', 'Funcionamiento/General', '000-001-01-00112724', '3406.88', 0),
(115, 7, 26, '2019-05-11', '2019-05-30', 'Funcionamiento/General', '000-001-01-00112698', '994.35', 0),
(116, 4, 3, '2019-05-14', '2019-05-30', 'Funcionamiento/General', '000-001-01-00004182', '1978.00', 0),
(117, 7, 126, '2019-05-16', '2019-05-30', 'Funcionamiento/General', '000-001-01-00028617', '6045.83', 0),
(118, 4, 3, '2019-05-20', '2019-05-30', 'Funcionamiento/General', '000-001-01-00004199', '3680.00', 0),
(119, 13, 90, '2019-05-20', '2019-05-30', 'Funcionamiento/General', '000-001-01-00000975', '16995.39', 0),
(120, 7, 19, '2019-05-17', '2019-05-30', 'Funcionamiento/General', '000-002-01-00005342', '14275.00', 0),
(121, 7, 19, '2019-05-20', '2019-05-30', 'Funcionamiento/General', '000-002-01-00005354', '7075.01', 0),
(122, 13, 3, '2019-05-23', '2019-05-30', 'Funcionamiento/General', '000-001-01-00004206', '5660.30', 0),
(123, 13, 3, '2019-05-23', '2019-05-30', 'Funcionamiento/General', '000-001-01-00004208', '2817.50', 0),
(124, 13, 3, '2019-05-23', '2019-05-30', 'Funcionamiento/General', '000-001-01-00004209', '1598.50', 0),
(125, 13, 3, '2019-05-23', '2019-05-30', 'Funcionamiento/General', '000-001-01-00004207', '38203.00', 0),
(126, 13, 31, '2019-05-01', '2019-05-30', 'Funcionamiento/General', '000-003-01-00182616', '149940.00', 0),
(127, 13, 31, '2019-05-01', '2019-05-30', 'Funcionamiento/General', '000-003-01-00182612', '99960.00', 0),
(128, 13, 31, '2019-05-01', '2019-05-30', 'Funcionamiento/General', '000-003-01-00182611', '82520.00', 0),
(129, 13, 31, '2019-05-01', '2019-05-30', 'Funcionamiento/General', '000-003-01-00182613', '41260.00', 0),
(130, 13, 31, '2019-05-01', '2019-05-30', 'Funcionamiento/General', '000-003-01-00182614', '41260.00', 0),
(131, 13, 31, '2019-05-01', '2019-05-30', 'Funcionamiento/General', '000-003-01-00182615', '82520.00', 0),
(132, 13, 177, '2019-05-04', '2019-05-30', 'Funcionamiento/General', '000-001-01-00015196', '100690.00', 0),
(133, 13, 177, '2019-05-04', '2019-05-30', 'Funcionamiento/General', '000-001-01-00015263', '102470.00', 0),
(134, 13, 177, '2019-05-04', '2019-05-30', 'Funcionamiento/General', '000-001-01-00015265', '51235.00', 0),
(135, 13, 177, '2019-05-04', '2019-05-30', 'Funcionamiento/General', '000-001-01-00015266', '30741.00', 0),
(136, 13, 177, '2019-05-04', '2019-05-30', 'Funcionamiento/General', '000-001-01-00015268', '102470.00', 0),
(137, 13, 177, '2019-05-04', '2019-05-30', 'Funcionamiento/General', '000-001-01-00015271', '20494.00', 0),
(138, 13, 177, '2019-05-04', '2019-05-30', 'Funcionamiento/General', '000-001-01-00015193', '83330.00', 0),
(139, 13, 177, '2019-05-04', '2019-05-30', 'Funcionamiento/General', '000-001-01-00015264', '85050.00', 0),
(140, 13, 177, '2019-05-04', '2019-05-30', 'Funcionamiento/General', '000-001-01-00015267', '25515.00', 0),
(141, 12, 178, '2019-04-01', '2019-05-30', 'Funcionamiento/General', '', '4871.87', 0),
(142, 13, 177, '2019-05-04', '2019-05-30', 'Funcionamiento/General', '000-001-01-00015269', '85050.00', 0),
(143, 13, 177, '2019-05-04', '2019-05-30', 'Funcionamiento/General', '000-001-01-00015270', '59535.00', 0),
(144, 6, 173, '2019-05-30', '2019-05-30', 'Fondos_ANH', '', '62300.00', 0),
(145, 6, 144, '2019-05-20', '2019-05-30', 'Fondos_ANH', '', '62300.00', 0),
(146, 9, 3, '2019-04-08', '2019-05-31', 'Funcionamiento/General', '000-001-01-00004094', '32320.75', 0),
(147, 13, 3, '2019-04-08', '2019-05-31', 'Funcionamiento/General', '000-001-01-00004093', '42780.00', 0),
(148, 13, 3, '2019-04-22', '2019-05-31', 'Funcionamiento/General', '000-001-01-00004092', '22871.20', 0),
(149, 13, 3, '2019-04-08', '2019-05-31', 'Funcionamiento/General', '000-001-01-00004090', '25686.40', 0),
(150, 11, 3, '2019-04-08', '2019-05-31', 'Funcionamiento/General', '000-001-01-00004096', '12238.30', 0),
(151, 9, 3, '2019-04-08', '2019-05-31', 'Funcionamiento/General', '000-001-01-00004073', '7682.00', 0),
(152, 9, 3, '2019-04-08', '2019-05-31', 'Funcionamiento/General', '000-001-01-00004074', '2070.00', 0),
(153, 9, 3, '2019-04-08', '2019-05-31', 'Funcionamiento/General', '000-001-01-00004075', '6394.00', 0),
(154, 9, 3, '2019-04-08', '2019-05-31', 'Funcionamiento/General', '000-001-01-00004076', '13225.00', 0),
(155, 9, 3, '2019-04-08', '2019-05-31', 'Funcionamiento/General', '000-001-01-00004072', '4625.30', 0),
(156, 17, 72, '2019-04-09', '2019-05-31', 'Funcionamiento/General', '000-002-01-00044040', '22847.77', 0),
(157, 12, 72, '2019-04-09', '2019-05-31', 'Funcionamiento/General', '000-002-01-00044045', '26010.92', 0),
(158, 13, 135, '2019-04-11', '2019-05-31', 'Funcionamiento/General', '005-006-01-00003396', '121457.25', 0),
(159, 13, 122, '2019-04-10', '2019-05-31', 'Funcionamiento/General', '000-001-01-00000212', '84605.50', 0),
(160, 13, 143, '2019-04-10', '2019-05-31', 'Funcionamiento/General', '000-002-01-00001032', '9729.00', 0),
(161, 6, 173, '2019-03-29', '2019-05-31', 'Fondos_CE', 'AC. 0200-2019', '92001.38', 0),
(162, 6, 173, '2019-03-29', '2019-05-31', 'Fondos_CE', 'AC. 0197-2019', '9740.00', 0),
(164, 13, 179, '2019-03-22', '2019-05-31', 'Funcionamiento/General', 'AC. 0155-2019', '24354.03', 0),
(165, 13, 180, '2019-03-22', '2019-05-31', 'Funcionamiento/General', 'AC. 0153-2019', '25258.71', 0),
(166, 13, 181, '2019-03-22', '2019-05-31', 'Funcionamiento/General', 'AC. 0152-2019', '25258.71', 0),
(167, 13, 182, '2019-03-22', '2019-05-31', 'Funcionamiento/General', 'AC. 0151-2019', '12629.87', 0),
(168, 13, 183, '2019-03-22', '2019-05-31', 'Funcionamiento/General', 'AC. 0150-2019', '36081.37', 0),
(169, 13, 184, '2019-03-22', '2019-05-31', 'Funcionamiento/General', 'AC. 0149-2019', '6617.88', 0),
(170, 13, 185, '2019-04-10', '2019-05-31', 'Funcionamiento/General', 'AC. 0261-2019', '6221.78', 0),
(171, 13, 58, '2019-05-03', '2019-05-31', 'Funcionamiento/General', '000-001-01-00002616', '160000.25', 0),
(172, 13, 123, '2019-03-06', '2019-05-31', 'Funcionamiento/General', '000-001-01-00007642', '17170.80', 0),
(173, 13, 123, '2019-02-27', '2019-05-31', 'Funcionamiento/General', '000-001-01-00007606', '24491.64', 0),
(174, 13, 123, '2019-02-07', '2019-05-31', 'Funcionamiento/General', '000-001-01-00007488', '9705.96', 0),
(175, 13, 123, '2019-02-05', '2019-05-31', 'Funcionamiento/General', '000-001-01-00007473', '3138.00', 0),
(176, 13, 123, '2019-02-01', '2019-05-31', 'Funcionamiento/General', '000-001-01-00007445', '14166.78', 0),
(177, 13, 186, '2019-03-22', '2019-05-31', 'Funcionamiento/General', 'AC. 0158-2019', '21607.66', 0),
(178, 6, 173, '2019-03-29', '2019-05-31', 'Fondos_CE', 'AC. 0198-2019', '17240.60', 0),
(179, 13, 186, '2019-04-23', '2019-05-31', 'Funcionamiento/General', 'FONDO ROTARIO', '18744.90', 0),
(180, 13, 186, '2019-03-19', '2019-05-31', 'Funcionamiento/General', 'FONDO ROTARIO', '18739.54', 0),
(181, 13, 186, '2019-03-10', '2019-05-31', 'Funcionamiento/General', 'FONDO ROTARIO', '18727.64', 0),
(182, 13, 186, '2019-04-09', '2019-05-31', 'Funcionamiento/General', 'FONDO ROTARIO', '18716.03', 0),
(183, 13, 123, '2019-01-22', '2019-05-31', 'Funcionamiento/General', '000-001-01-00007397', '28927.68', 0),
(184, 13, 123, '2019-01-02', '2019-05-31', 'Funcionamiento/General', '000-001-01-00007280', '46795.00', 0),
(185, 13, 123, '2019-02-13', '2019-05-31', 'Funcionamiento/General', '000-001-01-00007527', '49030.92', 0),
(186, 13, 123, '2019-01-17', '2019-05-31', 'Funcionamiento/General', '000-001-01-00007357', '14510.00', 0),
(188, 6, 173, '2019-03-29', '2019-05-31', 'Fondos_CE', 'AC. 0201-2019', '13964.50', 0),
(189, 6, 8, '2019-02-20', '2019-05-31', 'Fondos_CE', '000-001-01-00016484', '24392.00', 0),
(190, 6, 123, '2019-02-13', '2019-05-31', 'Fondos_CE', '000-001-01-00007526', '55902.12', 0),
(191, 6, 123, '2019-02-12', '2019-05-31', 'Fondos_CE', '000-001-01-00007525', '55902.12', 0),
(192, 6, 123, '2019-01-28', '2019-05-31', 'Fondos_CE', '000-001-01-00007418', '26911.98', 0),
(193, 13, 186, '2019-04-02', '2019-05-31', 'Funcionamiento/General', 'AC. 0226-2019', '103405.37', 0),
(194, 13, 186, '2019-03-22', '2019-05-31', 'Funcionamiento/General', 'AC. 0157-2019', '25715.00', 0),
(195, 13, 186, '2019-04-02', '2019-05-31', 'Funcionamiento/General', 'AC. 0225-2019', '19088.76', 0),
(196, 13, 186, '2019-03-22', '2019-06-03', 'Funcionamiento/General', 'AC. 0156-2019', '9725.77', 0),
(197, 13, 187, '2019-03-22', '2019-06-03', 'Funcionamiento/General', 'AC. 0154-2019', '18606.05', 0),
(198, 6, 124, '2019-05-28', '2019-06-03', 'Fondos_CE', 'MODICAS', '1138566.00', 0),
(199, 13, 98, '2019-02-02', '2019-06-03', 'Funcionamiento/General', '000-001-01-00023555', '87920.00', 0),
(200, 13, 98, '2019-02-02', '2019-06-03', 'Funcionamiento/General', '000-001-01-00023557', '164493.00', 0),
(201, 13, 98, '2019-02-11', '2019-06-03', 'Funcionamiento/General', '000-001-01-00023558', '78470.00', 0),
(202, 13, 98, '2019-02-11', '2019-06-03', 'Funcionamiento/General', '000-001-01-00023560', '87650.00', 0),
(203, 13, 98, '2019-02-21', '2019-06-03', 'Funcionamiento/General', '000-001-01-00023561', '271350.00', 0),
(204, 13, 142, '2019-02-09', '2019-06-03', 'Funcionamiento/General', '000-001-01-00019238', '59488.00', 0),
(205, 13, 142, '2019-02-09', '2019-06-03', 'Funcionamiento/General', '000-001-01-00019239', '14872.00', 0),
(206, 13, 142, '2019-02-09', '2019-06-03', 'Funcionamiento/General', '000-001-01-00019245', '82830.00', 0),
(207, 13, 142, '2019-01-09', '2019-06-03', 'Funcionamiento/General', '000-001-01-00019240', '297440.00', 0),
(208, 13, 142, '2019-02-09', '2019-06-03', 'Funcionamiento/General', '000-001-01-00019241', '223080.00', 0),
(209, 13, 142, '2019-02-09', '2019-06-03', 'Funcionamiento/General', '000-001-01-00019246', '383300.00', 0),
(210, 13, 142, '2019-02-09', '2019-06-03', 'Funcionamiento/General', '000-001-01-00019247', '257160.00', 0),
(211, 13, 31, '2019-02-01', '2019-06-03', 'Funcionamiento/General', '000-003-01-00179536', '85350.00', 0),
(212, 13, 31, '2019-02-01', '2019-06-03', 'Funcionamiento/General', '000-003-01-00179538', '8535.00', 0),
(213, 13, 31, '2019-02-01', '2019-06-03', 'Funcionamiento/General', '000-003-01-00179540', '128025.00', 0),
(214, 13, 31, '2019-02-01', '2019-06-03', 'Funcionamiento/General', '000-003-01-00179539', '75040.00', 0),
(215, 13, 31, '2019-02-01', '2019-06-03', 'Funcionamiento/General', '000-003-01-00179537', '22512.00', 0),
(216, 13, 31, '2019-02-01', '2019-06-03', 'Funcionamiento/General', '000-003-01-00179535', '75040.00', 0),
(217, 13, 124, '2019-01-10', '2019-06-03', 'Funcionamiento/General', 'QUEDAN', '25000.00', 0),
(218, 7, 131, '2019-01-30', '2019-06-03', 'Funcionamiento/General', 'QUEDAN', '7000.00', 0),
(219, 17, 69, '2019-01-30', '2019-06-03', 'Funcionamiento/General', 'QUEDAN', '6000.00', 0),
(220, 15, 75, '2019-02-01', '2019-06-03', 'Funcionamiento/General', 'QUEDAN', '7000.00', 0),
(221, 2, 15, '2019-03-08', '2019-06-03', 'Funcionamiento/General', 'QUEDAN', '7000.00', 0),
(222, 5, 62, '2019-03-14', '2019-06-03', 'Funcionamiento/General', 'QUEDAN', '6500.00', 0),
(223, 4, 14, '2019-03-20', '2019-06-03', 'Funcionamiento/General', 'QUEDAN', '7000.00', 0),
(224, 6, 77, '2019-03-20', '2019-06-03', 'Funcionamiento/General', 'QUEDAN', '7000.00', 0),
(225, 9, 73, '2019-03-20', '2019-06-03', 'Funcionamiento/General', 'QUEDAN', '7000.00', 0),
(226, 8, 74, '2019-03-20', '2019-06-03', 'Funcionamiento/General', 'QUEDAN', '7000.00', 0),
(227, 11, 84, '2019-03-20', '2019-06-03', 'Funcionamiento/General', 'QUEDAN', '10000.00', 0),
(228, 10, 82, '2019-03-02', '2019-06-03', 'Funcionamiento/General', 'QUEDAN', '6000.00', 0),
(229, 3, 83, '2019-03-01', '2019-06-03', 'Funcionamiento/General', 'QUEDAN', '7000.00', 0),
(230, 12, 178, '2019-04-04', '2019-06-03', 'Funcionamiento/General', 'QUEDAN', '6500.00', 0),
(231, 14, 67, '2019-03-20', '2019-06-03', 'Funcionamiento/General', 'QUEDAN', '6000.00', 0),
(232, 13, 124, '2019-01-24', '2019-06-03', 'Funcionamiento/General', 'FONDO ROTARIO', '18734.08', 0),
(234, 13, 124, '2019-02-08', '2019-06-03', 'Funcionamiento/General', 'FONDO ROTARIO', '18734.32', 0),
(235, 7, 131, '2019-01-30', '2019-06-03', 'Funcionamiento/General', 'FONDO ROTARIO', '5222.54', 0),
(236, 7, 131, '2019-02-28', '2019-06-03', 'Funcionamiento/General', 'FONDO ROTARIO', '5219.73', 0),
(237, 7, 131, '2019-03-30', '2019-06-03', 'Funcionamiento/General', 'FONDO ROTARIO', '5232.29', 0),
(238, 10, 82, '2019-03-30', '2019-06-03', 'Funcionamiento/General', 'FONDO ROTARIO', '4463.20', 0),
(239, 3, 83, '2019-03-31', '2019-06-03', 'Funcionamiento/General', 'FONDO ROTARIO', '4723.47', 0),
(240, 6, 77, '2019-03-30', '2019-06-03', 'Funcionamiento/General', 'FONDO ROTARIO', '5246.00', 0),
(241, 5, 96, '2019-03-05', '2019-06-03', 'Fondos_CE', '32721', '102600.00', 0),
(242, 5, 96, '2019-03-05', '2019-06-03', 'Fondos_CE', '32722', '97200.00', 2),
(243, 5, 96, '2019-03-05', '2019-06-03', 'Funcionamiento/General', '32720', '91200.00', 1),
(244, 2, 2, '2019-06-04', '2019-06-04', 'Funcionamiento/General', '342432', '343.24', 0),
(245, 2, 2, '2019-06-04', '2019-06-04', 'Funcionamiento/General', '32432222', '543.53', 0),
(246, 2, 2, '2019-06-04', '2019-06-04', 'Funcionamiento/General', '353322211', '4758.55', 1),
(247, 2, 2, '2019-06-04', '2019-06-04', 'Funcionamiento/General', '534534', '34.32', 0);

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
  `numero_transferencia` varchar(25) DEFAULT NULL,
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
(1, 13, NULL, '23', 'sf', NULL, NULL, NULL, NULL, NULL);

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
(5, 'Fuerzas Armadas de Honduras / Fuerza Naval / Funcionamiento', 'Banco Central de Honduras', 'Cheques', '11101-01-000992-8', '26341729.30', 1);

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
(3, 2, 49, '1.00', 0),
(4, 2, 49, '1.00', 0),
(5, 2, 49, '368.40', 0),
(6, 2, 49, '425.25', 0),
(7, 2, 81, '52.08', 0),
(8, 2, 81, '11.70', 0),
(9, 2, 81, '10.38', 0),
(10, 2, 81, '74.35', 0),
(11, 2, 81, '19.20', 0),
(12, 2, 81, '83.78', 0),
(13, 2, 81, '0.20', 0),
(14, 2, 41, '528.85', 0),
(15, 3, 49, '54.91', 0),
(16, 3, 49, '45.15', 0),
(17, 3, 81, '22.20', 0),
(18, 3, 81, '43.76', 0),
(19, 3, 41, '24.90', 0),
(20, 4, 66, '10.00', 0),
(21, 4, 45, '13.00', 0),
(22, 4, 59, '12.00', 0),
(23, 4, 46, '4.00', 0),
(24, 4, 41, '5.00', 0),
(25, 5, 81, '17.00', 0),
(26, 5, 49, '3.00', 0),
(27, 5, 41, '2.00', 0),
(30, 7, 60, '35.00', 0),
(31, 7, 84, '6.00', 0),
(32, 8, 60, '13.00', 0),
(33, 8, 84, '44.00', 0),
(34, 9, 81, '4.00', 0),
(35, 9, 80, '52.00', 0),
(36, 9, 49, '920.00', 0),
(37, 9, 41, '7.00', 0),
(42, 11, 60, '131.00', 0),
(43, 12, 58, '20.00', 0),
(44, 12, 41, '3.00', 0),
(45, 13, 81, '2.00', 0),
(46, 13, 49, '146.09', 0),
(47, 13, 85, '81.00', 0),
(48, 13, 41, '12.00', 0),
(49, 14, 46, '188.00', 0),
(50, 14, 41, '28.00', 0),
(51, 15, 85, '20.00', 0),
(52, 15, 41, '3.00', 0),
(53, 16, 85, '28.00', 0),
(54, 16, 41, '4.00', 0),
(55, 17, 42, '1.00', 0),
(56, 17, 41, '192.00', 0),
(57, 18, 42, '18.00', 0),
(58, 18, 41, '2.00', 0),
(59, 19, 42, '3.00', 0),
(60, 19, 41, '576.00', 0),
(61, 20, 42, '3.00', 0),
(62, 20, 41, '576.00', 0),
(63, 21, 42, '8.00', 0),
(64, 21, 41, '1.00', 0),
(65, 22, 42, '4.00', 0),
(66, 22, 41, '735.00', 0),
(67, 23, 42, '3.00', 0),
(68, 23, 41, '504.00', 0),
(69, 24, 42, '4.00', 0),
(70, 24, 41, '661.50', 0),
(71, 25, 42, '8.00', 0),
(72, 25, 41, '1.00', 0),
(73, 26, 42, '3.00', 0),
(74, 26, 41, '504.00', 0),
(75, 27, 42, '8.00', 0),
(76, 27, 41, '1.00', 0),
(77, 28, 42, '5.00', 0),
(78, 28, 41, '810.00', 0),
(79, 29, 42, '2.00', 0),
(80, 29, 41, '432.00', 0),
(81, 30, 42, '3.00', 0),
(82, 30, 41, '504.00', 0),
(83, 31, 42, '7.00', 0),
(84, 31, 41, '1.00', 0),
(85, 32, 42, '2.00', 0),
(86, 32, 41, '312.00', 0),
(87, 33, 42, '8.00', 0),
(88, 33, 41, '1.00', 0),
(89, 34, 42, '3.00', 0),
(90, 34, 41, '504.00', 0),
(91, 35, 42, '4.00', 0),
(92, 35, 41, '675.00', 0),
(93, 36, 42, '3.00', 0),
(94, 36, 41, '504.00', 0),
(95, 37, 42, '2.00', 0),
(96, 37, 41, '336.00', 0),
(97, 38, 42, '2.00', 0),
(98, 38, 41, '336.00', 0),
(99, 39, 42, '8.00', 0),
(100, 39, 41, '1.00', 0),
(101, 40, 42, '2.00', 0),
(102, 40, 41, '336.00', 0),
(103, 41, 42, '8.00', 0),
(104, 41, 41, '1.00', 0),
(105, 42, 42, '3.00', 0),
(106, 42, 41, '504.00', 0),
(107, 43, 42, '4.00', 0),
(108, 43, 41, '675.00', 0),
(109, 44, 42, '2.00', 0),
(110, 44, 41, '336.00', 0),
(111, 45, 42, '3.00', 0),
(112, 45, 41, '450.00', 0),
(113, 46, 42, '8.00', 0),
(114, 46, 41, '1.00', 0),
(115, 47, 42, '6.00', 0),
(116, 47, 41, '960.00', 0),
(117, 48, 42, '2.00', 0),
(118, 48, 41, '432.00', 0),
(119, 49, 42, '1.00', 0),
(120, 49, 41, '288.00', 0),
(121, 50, 42, '5.00', 0),
(122, 50, 41, '810.00', 0),
(123, 51, 42, '8.00', 0),
(124, 51, 41, '1.00', 0),
(125, 52, 42, '7.00', 0),
(126, 52, 41, '1.00', 0),
(127, 53, 16, '8.00', 0),
(128, 53, 41, '1.00', 0),
(129, 54, 63, '98.00', 0),
(131, 56, 64, '16.00', 0),
(132, 57, 49, '1.00', 0),
(133, 57, 81, '27.30', 0),
(134, 57, 41, '1.00', 0),
(135, 57, 49, '2.00', 0),
(136, 57, 49, '2.00', 0),
(137, 57, 49, '2.00', 0),
(138, 57, 49, '992.10', 0),
(139, 57, 81, '286.56', 0),
(140, 57, 81, '535.68', 0),
(141, 58, 64, '122.00', 0),
(142, 59, 64, '340.00', 0),
(143, 60, 64, '176.00', 0),
(144, 61, 63, '101.00', 0),
(145, 62, 64, '651.00', 0),
(146, 63, 64, '325.00', 0),
(147, 64, 64, '81.00', 0),
(148, 65, 81, '631.44', 0),
(149, 65, 41, '94.72', 0),
(150, 66, 63, '165.00', 0),
(151, 67, 64, '330.00', 0),
(152, 68, 49, '820.30', 0),
(153, 68, 41, '123.05', 0),
(154, 69, 64, '415.00', 0),
(155, 70, 63, '299.00', 0),
(156, 71, 49, '15.00', 0),
(157, 71, 41, '2.00', 0),
(158, 72, 62, '11.00', 0),
(159, 72, 41, '1.00', 0),
(160, 73, 81, '696.90', 0),
(161, 73, 49, '1.00', 0),
(162, 73, 41, '57.68', 0),
(163, 74, 62, '1.00', 0),
(164, 74, 62, '363.48', 0),
(165, 74, 45, '1.00', 0),
(166, 74, 74, '117.45', 0),
(167, 74, 59, '2.00', 0),
(168, 74, 74, '276.90', 0),
(169, 74, 74, '657.40', 0),
(170, 74, 41, '938.02', 0),
(171, 75, 81, '896.92', 0),
(172, 75, 49, '1.00', 0),
(173, 75, 41, '390.94', 0),
(174, 76, 85, '5.00', 0),
(175, 76, 41, '844.56', 0),
(176, 77, 58, '7.00', 0),
(177, 77, 85, '1.00', 0),
(178, 77, 41, '1.00', 0),
(179, 78, 49, '3.00', 0),
(180, 78, 41, '450.00', 0),
(181, 79, 64, '65.00', 0),
(182, 80, 30, '60.00', 0),
(184, 82, 49, '2.00', 0),
(185, 82, 81, '114.84', 0),
(186, 82, 81, '125.46', 0),
(187, 82, 81, '164.96', 0),
(188, 82, 81, '3.54', 0),
(189, 82, 49, '2.00', 0),
(190, 82, 41, '668.82', 0),
(191, 83, 85, '4.00', 0),
(192, 83, 41, '652.80', 0),
(193, 84, 85, '3.00', 0),
(194, 84, 85, '1.00', 0),
(195, 84, 85, '3.00', 0),
(196, 84, 85, '65.00', 0),
(197, 84, 65, '780.00', 0),
(198, 84, 41, '1.00', 0),
(199, 85, 85, '4.00', 0),
(200, 85, 85, '2.00', 0),
(201, 85, 85, '11.00', 0),
(202, 85, 85, '65.00', 0),
(203, 85, 65, '1.00', 0),
(204, 85, 41, '3.00', 0),
(205, 86, 85, '240.00', 0),
(206, 86, 41, '36.00', 0),
(207, 87, 85, '870.00', 0),
(208, 87, 41, '130.50', 0),
(209, 88, 85, '1.00', 0),
(210, 88, 41, '177.75', 0),
(211, 89, 85, '810.00', 0),
(212, 89, 41, '121.50', 0),
(213, 90, 85, '2.00', 0),
(214, 90, 41, '402.90', 0),
(215, 91, 74, '1.00', 0),
(216, 91, 59, '2.00', 0),
(217, 91, 59, '3.00', 0),
(218, 91, 74, '375.87', 0),
(219, 91, 74, '402.60', 0),
(220, 91, 59, '24.00', 0),
(221, 91, 85, '3.00', 0),
(222, 91, 85, '1.00', 0),
(223, 91, 85, '19.00', 0),
(224, 91, 41, '8.00', 0),
(225, 92, 85, '4.00', 0),
(226, 92, 41, '690.38', 0),
(227, 93, 74, '2.00', 0),
(228, 93, 41, '448.50', 0),
(229, 94, 85, '1.00', 0),
(230, 94, 41, '160.50', 0),
(231, 95, 85, '6.00', 0),
(232, 95, 41, '949.50', 0),
(233, 96, 85, '1.00', 0),
(234, 96, 41, '270.00', 0),
(235, 97, 85, '1.00', 0),
(236, 97, 41, '201.00', 0),
(237, 98, 85, '4.00', 0),
(238, 98, 41, '716.25', 0),
(239, 99, 85, '1.00', 0),
(240, 99, 41, '183.00', 0),
(241, 100, 85, '230.00', 0),
(242, 100, 65, '1.00', 0),
(243, 100, 41, '229.50', 0),
(244, 101, 58, '106.00', 0),
(245, 101, 41, '15.00', 0),
(246, 102, 85, '49.00', 0),
(247, 102, 41, '7.00', 0),
(248, 103, 85, '2.00', 0),
(249, 103, 41, '392.40', 0),
(250, 104, 62, '54.00', 0),
(251, 104, 62, '5.00', 0),
(252, 104, 62, '9.00', 0),
(253, 104, 74, '31.00', 0),
(254, 104, 74, '21.00', 0),
(255, 104, 74, '2.00', 0),
(256, 104, 62, '6.00', 0),
(257, 104, 41, '19.00', 0),
(258, 105, 45, '132.00', 0),
(259, 105, 41, '19.00', 0),
(260, 106, 85, '10.00', 0),
(261, 106, 41, '1.00', 0),
(262, 107, 49, '9.00', 0),
(263, 107, 41, '1.00', 0),
(264, 108, 82, '842.25', 0),
(265, 108, 82, '258.78', 0),
(266, 108, 82, '68.60', 0),
(267, 108, 82, '95.58', 0),
(268, 108, 82, '430.00', 0),
(269, 108, 71, '1.00', 0),
(270, 108, 71, '295.65', 0),
(271, 108, 74, '947.20', 0),
(272, 108, 74, '2.00', 0),
(273, 108, 71, '1.00', 0),
(274, 108, 74, '1.00', 0),
(275, 108, 74, '473.60', 0),
(276, 108, 74, '304.35', 0),
(277, 108, 74, '304.30', 0),
(278, 108, 74, '333.92', 0),
(279, 108, 74, '20.87', 0),
(280, 108, 74, '753.20', 0),
(281, 108, 71, '121.74', 0),
(282, 108, 71, '250.43', 0),
(283, 108, 71, '66.54', 0),
(284, 108, 71, '193.20', 0),
(285, 108, 74, '3.00', 0),
(286, 108, 62, '7.00', 0),
(287, 108, 74, '146.08', 0),
(288, 108, 74, '40.87', 0),
(289, 108, 74, '451.40', 0),
(290, 108, 41, '3.00', 0),
(291, 109, 74, '1.00', 0),
(292, 109, 74, '437.50', 0),
(293, 109, 59, '3.00', 0),
(294, 109, 41, '767.63', 0),
(295, 110, 85, '1.00', 0),
(296, 110, 41, '236.74', 0),
(297, 111, 85, '6.00', 0),
(298, 111, 41, '949.50', 0),
(301, 113, 80, '3.00', 0),
(302, 113, 41, '522.83', 0),
(303, 114, 82, '2.00', 0),
(304, 114, 41, '444.38', 0),
(305, 115, 82, '864.65', 0),
(306, 115, 41, '129.70', 0),
(307, 116, 85, '1.00', 0),
(308, 116, 41, '258.00', 0),
(309, 117, 49, '5.00', 0),
(310, 117, 41, '584.33', 0),
(311, 118, 85, '3.00', 0),
(312, 118, 41, '480.00', 0),
(313, 119, 33, '14.00', 0),
(314, 119, 41, '2.00', 0),
(315, 120, 85, '2.00', 0),
(316, 120, 58, '9.00', 0),
(317, 120, 41, '1.00', 0),
(318, 120, 85, '434.78', 0),
(319, 121, 85, '6.00', 0),
(320, 121, 41, '922.83', 0),
(321, 122, 85, '4.00', 0),
(322, 122, 41, '738.30', 0),
(323, 123, 85, '2.00', 0),
(324, 123, 41, '367.50', 0),
(325, 124, 65, '650.00', 0),
(326, 124, 85, '230.00', 0),
(327, 124, 65, '510.00', 0),
(328, 124, 41, '208.50', 0),
(329, 125, 85, '33.00', 0),
(330, 125, 41, '4.00', 0),
(331, 126, 63, '149.00', 0),
(332, 127, 63, '99.00', 0),
(333, 128, 64, '82.00', 0),
(334, 129, 64, '41.00', 0),
(335, 130, 64, '41.00', 0),
(336, 131, 64, '82.00', 0),
(337, 132, 63, '100.00', 0),
(338, 133, 63, '102.00', 0),
(339, 134, 63, '51.00', 0),
(340, 135, 63, '30.00', 0),
(341, 136, 63, '102.00', 0),
(342, 137, 63, '20.00', 0),
(343, 138, 64, '83.00', 0),
(344, 139, 64, '85.00', 0),
(345, 140, 64, '25.00', 0),
(346, 141, 82, '1.00', 0),
(347, 141, 86, '2.00', 0),
(348, 141, 41, '635.47', 0),
(349, 142, 64, '85.00', 0),
(350, 143, 64, '59.00', 0),
(351, 144, 81, '62.00', 0),
(352, 145, 81, '62.00', 0),
(353, 146, 85, '28105.00', 0),
(354, 146, 41, '4215.75', 0),
(355, 147, 85, '37200.00', 0),
(356, 147, 41, '5580.00', 0),
(357, 148, 85, '19888.00', 0),
(358, 148, 41, '2983.20', 0),
(359, 149, 85, '22336.00', 0),
(360, 149, 41, '3350.40', 0),
(361, 150, 85, '10642.00', 0),
(362, 150, 41, '1596.30', 0),
(363, 151, 85, '6680.00', 0),
(364, 151, 41, '1002.00', 0),
(365, 152, 85, '1800.00', 0),
(366, 152, 41, '270.00', 0),
(367, 153, 85, '5560.00', 0),
(368, 153, 41, '834.00', 0),
(369, 154, 85, '11500.00', 0),
(370, 154, 41, '1725.00', 0),
(371, 155, 85, '4022.00', 0),
(372, 155, 41, '603.30', 0),
(373, 156, 74, '616.00', 0),
(374, 156, 74, '83.48', 0),
(375, 156, 74, '21.00', 0),
(376, 156, 74, '321.74', 0),
(377, 156, 74, '84.56', 0),
(378, 156, 74, '17.39', 0),
(379, 156, 74, '126.00', 0),
(380, 156, 68, '5871.60', 0),
(381, 156, 68, '4547.20', 0),
(382, 156, 68, '4813.20', 0),
(383, 156, 82, '2340.00', 0),
(384, 156, 62, '319.13', 0),
(385, 156, 62, '116.80', 0),
(386, 156, 62, '116.80', 0),
(387, 156, 62, '116.80', 0),
(388, 156, 62, '116.80', 0),
(389, 156, 62, '239.13', 0),
(390, 156, 41, '2980.14', 0),
(391, 157, 82, '1204.50', 0),
(392, 157, 82, '650.00', 0),
(393, 157, 62, '3401.76', 0),
(394, 157, 62, '605.46', 0),
(395, 157, 74, '182.60', 0),
(396, 157, 74, '522.00', 0),
(397, 157, 74, '608.72', 0),
(398, 157, 62, '400.00', 0),
(399, 157, 74, '173.95', 0),
(400, 157, 59, '4011.20', 0),
(401, 157, 74, '400.00', 0),
(402, 157, 74, '304.35', 0),
(403, 157, 82, '63.00', 0),
(404, 157, 82, '150.00', 0),
(405, 157, 74, '100.00', 0),
(406, 157, 74, '1695.65', 0),
(407, 157, 82, '960.00', 0),
(408, 157, 59, '2935.00', 0),
(409, 157, 82, '2000.00', 0),
(410, 157, 82, '2250.00', 0),
(411, 157, 41, '3392.73', 0),
(412, 158, 58, '105615.00', 0),
(413, 158, 41, '15842.25', 0),
(414, 159, 42, '73570.00', 0),
(415, 159, 41, '11035.50', 0),
(416, 160, 85, '8460.00', 0),
(417, 160, 41, '1269.00', 0),
(418, 161, 81, '92001.38', 0),
(419, 162, 81, '9740.00', 0),
(421, 164, 38, '24354.03', 0),
(422, 165, 38, '25258.71', 0),
(423, 166, 38, '25258.71', 0),
(424, 167, 38, '12629.87', 0),
(425, 168, 38, '36081.37', 0),
(426, 169, 38, '6617.88', 0),
(427, 170, 38, '6221.78', 0),
(428, 171, 42, '140435.00', 0),
(429, 171, 41, '19565.25', 0),
(430, 172, 36, '17170.80', 0),
(431, 173, 36, '24491.64', 0),
(432, 174, 36, '9705.96', 0),
(433, 175, 36, '3138.00', 0),
(434, 176, 36, '14166.78', 0),
(435, 177, 42, '21607.66', 0),
(436, 178, 81, '17240.60', 0),
(437, 179, 18, '104.35', 0),
(438, 179, 28, '2630.94', 0),
(439, 179, 29, '573.91', 0),
(440, 179, 33, '2700.00', 0),
(441, 179, 37, '5900.00', 0),
(442, 179, 42, '1192.09', 0),
(443, 179, 49, '372.26', 0),
(444, 179, 59, '280.00', 0),
(445, 179, 74, '853.05', 0),
(446, 179, 81, '2171.58', 0),
(447, 179, 82, '489.83', 0),
(448, 179, 85, '790.00', 0),
(449, 179, 41, '686.89', 0),
(450, 180, 18, '100.00', 0),
(451, 180, 25, '1000.00', 0),
(452, 180, 37, '5462.50', 0),
(453, 180, 49, '1952.05', 0),
(454, 180, 59, '1736.15', 0),
(455, 180, 62, '242.61', 0),
(456, 180, 74, '6182.81', 0),
(457, 180, 81, '145.30', 0),
(458, 180, 85, '364.39', 0),
(459, 180, 41, '1553.73', 0),
(460, 181, 18, '200.00', 0),
(461, 181, 29, '269.57', 0),
(462, 181, 37, '6450.00', 0),
(463, 181, 58, '1700.00', 0),
(464, 181, 59, '292.06', 0),
(465, 181, 74, '4481.55', 0),
(466, 181, 81, '226.60', 0),
(467, 181, 82, '2145.00', 0),
(468, 181, 85, '2228.76', 0),
(469, 181, 41, '734.10', 0),
(470, 182, 37, '5362.50', 0),
(471, 182, 42, '3527.21', 0),
(472, 182, 49, '106.08', 0),
(473, 182, 59, '473.30', 0),
(474, 182, 62, '1418.26', 0),
(475, 182, 74, '1254.79', 0),
(476, 182, 81, '705.92', 0),
(477, 182, 82, '4601.93', 0),
(478, 182, 41, '1266.04', 0),
(479, 183, 36, '28927.68', 0),
(480, 184, 36, '46795.00', 0),
(481, 185, 36, '49030.92', 0),
(482, 186, 36, '14510.00', 0),
(484, 188, 81, '13964.50', 0),
(485, 189, 36, '24392.00', 0),
(486, 190, 36, '55902.12', 0),
(487, 191, 36, '55902.12', 0),
(488, 192, 36, '26911.98', 0),
(489, 193, 42, '103405.37', 0),
(490, 194, 42, '1840.00', 0),
(491, 194, 16, '23875.00', 0),
(492, 195, 38, '19088.76', 0),
(493, 196, 38, '9725.77', 0),
(494, 197, 38, '18606.05', 0),
(495, 198, 90, '1138566.00', 0),
(496, 199, 63, '87920.00', 0),
(497, 200, 64, '164493.00', 0),
(498, 201, 64, '78470.00', 0),
(499, 202, 63, '87650.00', 0),
(500, 203, 63, '271350.00', 0),
(501, 204, 64, '59488.00', 0),
(502, 205, 64, '14872.00', 0),
(503, 206, 63, '82830.00', 0),
(504, 207, 64, '297440.00', 0),
(505, 208, 64, '223080.00', 0),
(506, 209, 64, '383300.00', 0),
(507, 210, 63, '257160.00', 0),
(508, 211, 63, '85350.00', 0),
(509, 212, 63, '8535.00', 0),
(510, 213, 63, '128025.00', 0),
(511, 214, 64, '75040.00', 0),
(512, 215, 64, '22512.00', 0),
(513, 216, 64, '75040.00', 0),
(514, 217, 85, '25000.00', 0),
(515, 218, 85, '7000.00', 0),
(516, 219, 85, '6000.00', 0),
(517, 220, 85, '7000.00', 0),
(518, 221, 85, '7000.00', 0),
(519, 222, 85, '6500.00', 0),
(520, 223, 85, '7000.00', 0),
(521, 224, 85, '7000.00', 0),
(522, 225, 85, '7000.00', 0),
(523, 226, 85, '7000.00', 0),
(524, 227, 85, '10000.00', 0),
(525, 228, 85, '6000.00', 0),
(526, 229, 85, '7000.00', 0),
(527, 230, 85, '6500.00', 0),
(528, 231, 85, '6000.00', 0),
(529, 232, 18, '50.00', 0),
(530, 232, 29, '480.00', 0),
(531, 232, 34, '5462.50', 0),
(532, 232, 42, '3620.00', 0),
(533, 232, 44, '452.05', 0),
(534, 232, 62, '348.00', 0),
(535, 232, 74, '5462.87', 0),
(536, 232, 81, '114.13', 0),
(537, 232, 83, '691.30', 0),
(538, 232, 85, '919.67', 0),
(539, 232, 41, '1133.56', 0),
(550, 234, 18, '510.00', 0),
(551, 234, 28, '5936.00', 0),
(552, 234, 34, '4025.00', 0),
(553, 234, 62, '507.99', 0),
(554, 234, 74, '3195.96', 0),
(555, 234, 78, '388.00', 0),
(556, 234, 80, '2350.00', 0),
(557, 234, 81, '330.00', 0),
(558, 234, 85, '771.20', 0),
(559, 234, 41, '720.17', 0),
(560, 235, 28, '226.08', 0),
(561, 235, 42, '1878.00', 0),
(562, 235, 43, '286.95', 0),
(563, 235, 66, '234.79', 0),
(564, 235, 74, '315.33', 0),
(565, 235, 81, '586.08', 0),
(566, 235, 81, '1259.05', 0),
(567, 235, 41, '436.26', 0),
(568, 236, 18, '852.17', 0),
(569, 236, 28, '379.04', 0),
(570, 236, 43, '79.13', 0),
(571, 236, 62, '400.00', 0),
(572, 236, 66, '462.61', 0),
(573, 236, 74, '100.70', 0),
(574, 236, 80, '261.96', 0),
(575, 236, 81, '969.70', 0),
(576, 236, 82, '104.38', 0),
(577, 236, 85, '1167.40', 0),
(578, 236, 41, '442.64', 0),
(579, 237, 62, '695.65', 0),
(580, 237, 74, '3594.35', 0),
(581, 237, 82, '86.00', 0),
(582, 237, 85, '282.61', 0),
(583, 237, 41, '573.68', 0),
(584, 238, 42, '2818.87', 0),
(585, 238, 74, '87.13', 0),
(586, 238, 85, '1086.96', 0),
(587, 238, 41, '470.24', 0),
(588, 239, 46, '423.00', 0),
(589, 239, 59, '750.00', 0),
(590, 239, 62, '565.65', 0),
(591, 239, 78, '255.00', 0),
(592, 239, 85, '2301.28', 0),
(593, 239, 41, '428.54', 0),
(594, 240, 28, '323.04', 0),
(595, 240, 33, '665.22', 0),
(596, 240, 37, '575.00', 0),
(597, 240, 46, '850.00', 0),
(598, 240, 49, '400.00', 0),
(599, 240, 62, '54.78', 0),
(600, 240, 71, '834.79', 0),
(601, 240, 85, '1069.57', 0),
(602, 240, 41, '473.60', 0),
(603, 241, 81, '102600.00', 0),
(604, 242, 81, '97200.00', 0),
(605, 243, 81, '91200.00', 0),
(606, 244, 1, '343.24', 0),
(607, 245, 1, '543.53', 0),
(608, 246, 1, '434.32', 0),
(609, 246, 2, '4324.23', 0),
(610, 247, 1, '34.32', 0);

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
-- Volcado de datos para la tabla `detalle_ingreso`
--

INSERT INTO `detalle_ingreso` (`iddetalle_ingreso`, `idingreso`, `idpresupuesto_disponible`, `monto`) VALUES
(1, 1, 25, '30000.00'),
(2, 1, 27, '73559.42'),
(3, 1, 26, '50000.00'),
(4, 2, 29, '17.09'),
(5, 2, 31, '341.54'),
(6, 2, 33, '273.24'),
(7, 2, 34, '204.93'),
(8, 2, 40, '768.46'),
(9, 2, 39, '17.09'),
(10, 2, 42, '341.54'),
(11, 2, 46, '341.54'),
(12, 2, 49, '273.24'),
(13, 2, 53, '89.09'),
(14, 2, 59, '102.47'),
(15, 2, 68, '170.78'),
(16, 2, 71, '61.49'),
(17, 2, 80, '170.44'),
(18, 2, 81, '136.69'),
(19, 2, 82, '170.80'),
(20, 2, 83, '239.08'),
(21, 2, 84, '204.94'),
(22, 2, 85, '1075.55'),
(23, 3, 35, '18000.00'),
(24, 3, 36, '18000.00'),
(25, 3, 37, '17707.11'),
(26, 3, 38, '8182.07'),
(27, 4, 63, '1500000.00'),
(28, 4, 64, '2500000.00'),
(29, 4, 65, '1171195.03'),
(31, 6, 29, '304.42'),
(32, 6, 31, '6088.33'),
(33, 6, 33, '4870.66'),
(34, 6, 34, '3653.00'),
(35, 6, 40, '13698.74'),
(36, 6, 39, '304.42'),
(37, 6, 42, '6088.33'),
(38, 6, 46, '6088.33'),
(39, 6, 49, '4870.66'),
(40, 6, 53, '1587.96'),
(41, 6, 59, '1826.50'),
(42, 6, 68, '3044.17'),
(43, 6, 71, '1095.90'),
(44, 6, 80, '3037.96'),
(45, 6, 81, '2435.33'),
(46, 6, 82, '3044.16'),
(47, 6, 83, '4261.83'),
(48, 6, 84, '3653.00'),
(49, 6, 85, '19178.24'),
(50, 7, 47, '300000.00'),
(51, 7, 48, '218092.81'),
(52, 8, 91, '250000.00'),
(53, 8, 49, '15000.00'),
(54, 8, 45, '245000.00'),
(55, 8, 57, '100000.00'),
(56, 8, 62, '150000.00'),
(57, 8, 74, '150000.00'),
(58, 9, 81, '3500000.00'),
(59, 10, 81, '1500000.00'),
(60, 11, 43, '722000.00'),
(61, 11, 43, '600000.00'),
(62, 11, 43, '1128000.00'),
(63, 11, 43, '1700000.00'),
(64, 12, 60, '749052.59'),
(65, 13, 88, '350000.00'),
(66, 13, 88, '450000.00'),
(67, 14, 90, '663000.00'),
(68, 15, 35, '1000.00'),
(69, 15, 36, '1000.00'),
(70, 15, 37, '1000.00'),
(71, 15, 38, '817.93'),
(72, 16, 25, '30000.00'),
(73, 16, 27, '32751.40'),
(74, 17, 35, '1000.00'),
(75, 17, 36, '1000.00'),
(76, 17, 37, '1292.89'),
(77, 17, 38, '1000.00'),
(78, 18, 60, '50000.00'),
(79, 18, 60, '50000.00'),
(80, 18, 60, '45588.48'),
(81, 19, 29, '15.92'),
(82, 19, 31, '318.48'),
(83, 19, 33, '254.79'),
(84, 19, 34, '191.09'),
(85, 19, 40, '716.59'),
(86, 19, 39, '15.92'),
(87, 19, 42, '318.48'),
(88, 19, 46, '318.48'),
(89, 19, 49, '254.79'),
(90, 19, 53, '83.07'),
(91, 19, 59, '95.54'),
(92, 19, 68, '159.24'),
(93, 19, 71, '57.33'),
(94, 19, 80, '158.92'),
(95, 19, 81, '127.39'),
(96, 19, 82, '159.24'),
(97, 19, 83, '222.95'),
(98, 19, 84, '191.09'),
(99, 19, 85, '1003.22'),
(100, 20, 43, '2919589.95'),
(101, 21, 90, '434021.00'),
(102, 22, 88, '150000.00'),
(103, 22, 88, '250000.00'),
(104, 23, 90, '284021.00'),
(105, 24, 90, '119154.00'),
(106, 25, 88, '40193.51'),
(107, 25, 89, '300000.00'),
(108, 26, 25, '4631.34'),
(109, 26, 27, '80000.00'),
(110, 26, 26, '5000.00'),
(111, 27, 36, '353471.81'),
(112, 28, 63, '1000000.00'),
(113, 28, 64, '2034604.59'),
(114, 28, 65, '400000.00');

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
-- Volcado de datos para la tabla `detalle_orden`
--

INSERT INTO `detalle_orden` (`iddetalle_orden`, `idadministrar_ordenes`, `idpresupuesto_disponible`, `unidad`, `cantidad`, `descripcion`, `precio_unitario`) VALUES
(12, 4, 63, 'Galon', 1200, 'Gasolina Super', '85.76'),
(13, 4, 63, 'Galon', 300, 'Gasolina Super', '85.76'),
(16, 6, 64, 'Galon', 2000, 'Diesel', '71.65'),
(17, 7, 64, 'Galon', 1000, 'Diesel', '75.65'),
(18, 7, 64, 'Galon', 200, 'Diesel', '75.65'),
(19, 8, 64, 'Galon', 300, 'Diesel', '75.65'),
(20, 9, 64, 'Galon', 1000, 'Diesel', '75.65'),
(21, 10, 64, 'Galon', 500, 'Diesel', '75.65'),
(22, 11, 64, 'Galon', 3000, 'Diésel', '75.65'),
(23, 12, 64, 'Galon', 4000, 'Diesel', '75.65'),
(24, 13, 1, 'C/U', 1, 'SDADSA', '343242.43'),
(25, 13, 2, 'C/U', 1, 'SDADSA', '4324.32'),
(26, 13, 3, 'C/U', 1, 'SDADSA', '43.24'),
(27, 13, 4, 'C/U', 1, 'SDADSA', '2342.42');

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
(1, 1, 140, '122.00');

--
-- Disparadores `detalle_retenciones`
--
DELIMITER $$
CREATE TRIGGER `change_estate_payed` BEFORE INSERT ON `detalle_retenciones` FOR EACH ROW BEGIN
    UPDATE compromisos SET condicion = 2
    WHERE compromisos.idcompromisos = NEW.idcompromisos;
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

--
-- Volcado de datos para la tabla `dtransf_ctaspg`
--

INSERT INTO `dtransf_ctaspg` (`dtransf_ctaspg`, `idtransferidoctaspg`, `idctasbancarias`, `num_precompromiso`, `valor`) VALUES
(1, 1, 5, 363, '153559.42'),
(2, 1, 5, 364, '5000.00'),
(3, 1, 5, 385, '61889.18'),
(4, 2, 5, 195, '5171195.03'),
(5, 2, 5, 364, '89131.94'),
(6, 3, 5, 190, '518092.81'),
(7, 3, 5, 187, '910000.00'),
(8, 3, 5, 184, '3500000.00'),
(9, 3, 5, 186, '1500000.00'),
(10, 3, 5, 193, '4150000.00'),
(11, 3, 5, 389, '749052.59'),
(12, 4, 5, 126, '800000.00'),
(13, 4, 5, 128, '663000.00'),
(14, 4, 5, 131, '3817.93'),
(15, 4, 5, 179, '62751.40'),
(16, 4, 5, 191, '4292.89'),
(17, 4, 5, 192, '145588.48'),
(18, 5, 5, 364, '4662.53'),
(19, 5, 5, 392, '3434604.59'),
(20, 6, 5, 194, '2919589.95'),
(21, 7, 5, 130, '434021.00'),
(22, 7, 5, 396, '400000.00'),
(23, 7, 5, 398, '284021.00'),
(24, 7, 5, 794, '119154.00'),
(25, 7, 5, 842, '340193.51'),
(26, 7, 5, 870, '89631.34'),
(27, 7, 5, 877, '353471.81');

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
(1, 1, '0001', '2019-06-03', '2000.00'),
(2, 1, '0002', '2019-06-03', '2000.00'),
(3, 1, '0003', '2019-06-03', '2000.00'),
(4, 2, '242424', '2019-06-03', '250000.00'),
(5, 3, '5454', '2019-06-03', '4521212.00'),
(6, 4, '00019222', '2019-01-25', '102912.00'),
(7, 4, '00019223', '2019-01-25', '25728.00'),
(8, 5, '45454', '2019-06-03', '554545.00'),
(9, 6, '00019218', '2019-01-22', '143300.00'),
(10, 7, '00019227', '2019-01-25', '75650.00'),
(11, 7, '00019231', '2019-02-01', '15130.00'),
(12, 8, '00019225', '2019-01-25', '22695.00'),
(13, 9, '00019226', '2019-01-25', '75650.00'),
(14, 10, '00019228', '2019-01-25', '37825.00'),
(15, 11, '00019229', '2019-01-25', '226950.00'),
(16, 12, '00019230', '2019-01-25', '302600.00'),
(17, 13, '54654', '2019-06-04', '546546.00'),
(18, 13, '6546', '2019-06-04', '546456.00'),
(19, 13, '4646', '2019-06-04', '54654645.00');

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
(1, 1, '2019-03-07 00:00:00', 363, '153559.42', 'Aceptado'),
(2, 1, '2019-05-07 00:00:00', 364, '5000.00', 'Aceptado'),
(3, 1, '2019-03-07 00:00:00', 385, '61889.18', 'Aceptado'),
(4, 1, '2019-05-15 00:00:00', 195, '5171195.03', 'Aceptado'),
(6, 1, '2019-03-07 00:00:00', 364, '89131.94', 'Aceptado'),
(7, 1, '2019-02-14 00:00:00', 190, '518092.81', 'Aceptado'),
(8, 1, '2019-02-14 00:00:00', 187, '910000.00', 'Aceptado'),
(9, 1, '2019-03-14 00:00:00', 184, '3500000.00', 'Aceptado'),
(10, 1, '2019-02-14 00:00:00', 186, '1500000.00', 'Aceptado'),
(11, 1, '2019-02-14 00:00:00', 193, '4150000.00', 'Aceptado'),
(12, 1, '2019-03-07 00:00:00', 389, '749052.59', 'Aceptado'),
(13, 1, '2019-02-12 00:00:00', 126, '800000.00', 'Aceptado'),
(14, 1, '2019-02-12 00:00:00', 128, '663000.00', 'Aceptado'),
(15, 1, '2019-02-12 00:00:00', 131, '3817.93', 'Aceptado'),
(16, 1, '2019-02-14 00:00:00', 179, '62751.40', 'Aceptado'),
(17, 1, '2019-02-14 00:00:00', 191, '4292.89', 'Aceptado'),
(18, 1, '2019-02-14 00:00:00', 192, '145588.48', 'Aceptado'),
(19, 1, '2019-03-07 00:00:00', 364, '4662.53', 'Aceptado'),
(20, 1, '2019-02-15 00:00:00', 194, '2919589.95', 'Aceptado'),
(21, 1, '2019-02-12 00:00:00', 130, '434021.00', 'Aceptado'),
(22, 1, '2019-03-07 00:00:00', 396, '400000.00', 'Aceptado'),
(23, 1, '2019-03-07 00:00:00', 398, '284021.00', 'Aceptado'),
(24, 1, '2019-05-05 00:00:00', 794, '119154.00', 'Aceptado'),
(25, 1, '2019-04-05 00:00:00', 842, '340193.51', 'Aceptado'),
(26, 1, '2019-04-08 00:00:00', 870, '89631.34', 'Aceptado'),
(27, 1, '2019-04-09 00:00:00', 877, '353471.81', 'Aceptado'),
(28, 1, '2019-03-07 00:00:00', 392, '3434604.59', 'Aceptado');

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
  `pres_aprobado` decimal(12,2) NOT NULL,
  `pres_modificado` decimal(12,2) NOT NULL,
  `presupuesto_anual` decimal(12,2) NOT NULL,
  `fondos_disponibles` decimal(15,2) DEFAULT NULL,
  `condicion` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `presupuesto_disponible`
--

INSERT INTO `presupuesto_disponible` (`idpresupuesto_disponible`, `nombre_objeto`, `grupo`, `subgrupo`, `codigo`, `pres_aprobado`, `pres_modificado`, `presupuesto_anual`, `fondos_disponibles`, `condicion`) VALUES
(1, 'Sueldos Basicos', 11, 100, '11100', '389725559.00', '0.00', '389382316.57', '0.00', 1),
(2, 'Adicionales', 11, 400, '11400', '6276000.00', '0.00', '5923726.73', '0.00', 1),
(3, 'Decimotercer Mes', 11, 510, '11510', '32477130.00', '0.00', '31880642.36', '0.00', 1),
(4, 'Decimocuarto Mes', 11, 520, '11520', '32462130.00', '0.00', '32179787.58', '0.00', 1),
(5, 'Complementos', 11, 600, '11600', '24671710.00', '0.00', '24665487.84', '0.00', 1),
(6, 'Contribuciones al Instituto de Previsión Militar - Cuota Patronal', 11, 731, '11731', '42869812.00', '0.00', '42869812.00', '0.00', 1),
(7, 'Contribuciones al Instituto de Previsión Militar - Regimen de Riesgos Especiales', 11, 732, '11732', '0.00', '0.00', '28255103.00', '0.00', 1),
(8, 'Contribuciones al Instituto de Previsión Militar - Reserva Laboral', 11, 733, '11733', '0.00', '0.00', '31826537.00', '0.00', 1),
(9, 'Beneficios y Compensaciones', 16, 100, '16100', '0.00', '0.00', '8486473.00', '0.00', 1),
(10, 'Energía Eléctrica', 21, 100, '21100', '0.00', '0.00', '650000.00', '0.00', 1),
(11, 'Agua', 21, 200, '21200', '0.00', '0.00', '480000.00', '0.00', 1),
(12, 'Correo Postal', 21, 410, '21410', '0.00', '0.00', '30000.00', '0.00', 1),
(13, 'Telefonía Fija', 21, 420, '21420', '0.00', '0.00', '400000.00', '0.00', 1),
(14, 'Alquiler de Equipos de Transporte, Tracción y Elevación', 22, 220, '22220', '0.00', '0.00', '110610388.00', '0.00', 1),
(15, 'Alquiler de Tierras y Terrenos', 22, 300, '22300', '0.00', '0.00', '40000.00', '0.00', 1),
(16, 'Otros Alquileres', 22, 900, '22900', '0.00', '0.00', '5000.00', '0.00', 1),
(17, 'Mantenimiento y Reparación de Edificios y Locales', 23, 100, '23100', '0.00', '0.00', '310000.00', '0.00', 1),
(18, 'Mantenimiento y Reparacion de Equipos y Medios de Transporte', 23, 200, '23200', '0.00', '0.00', '1038319.00', '0.00', 1),
(19, 'Mantenimiento y Reparacion de Equipos Sanitarios y de Laboratorio', 23, 330, '23330', '0.00', '0.00', '196000.00', '0.00', 1),
(20, 'Mantenimiento y Reparación de Equipo para Computación', 23, 350, '23350', '0.00', '0.00', '125000.00', '0.00', 1),
(21, 'Mantenimiento y Reparación de Equipo de Oficina y Muebles', 23, 360, '23360', '0.00', '0.00', '150000.00', '0.00', 1),
(22, 'Mantenimiento y Reparación de Otros Equipos', 23, 390, '23390', '0.00', '0.00', '200000.00', '0.00', 1),
(23, 'Mantenimiento y Reparación de Obras Civiles e Instalaciones Varias', 23, 400, '23400', '0.00', '0.00', '626613.00', '0.00', 1),
(24, 'Limpieza, Aseo y Fumigacion', 23, 500, '23500', '0.00', '0.00', '150000.00', '0.00', 1),
(25, 'Servicios de Capacitación', 24, 500, '24500', '0.00', '0.00', '150000.00', '64631.34', 1),
(26, 'Servicios de Informatica y Sistemas Computarizados', 24, 600, '24600', '0.00', '0.00', '306000.00', '55000.00', 1),
(27, 'Servicios de Consultoria de Gestión Administrativa, Financiera y Actividades Conexas', 24, 710, '24710', '0.00', '0.00', '330000.00', '186310.82', 1),
(28, 'Servicio de Transporte', 25, 100, '25100', '0.00', '0.00', '120000.00', '0.00', 1),
(29, 'Servicio de Imprenta, Publicaciones y Reproducciones', 25, 300, '25300', '0.00', '0.00', '18000.00', '337.43', 1),
(30, 'Primas y Gastos de Seguro', 25, 400, '25400', '0.00', '0.00', '15650407.00', '0.00', 1),
(31, 'Comisiones y Gastos Bancarios', 25, 500, '25500', '0.00', '0.00', '125000.00', '6748.35', 1),
(32, 'Publicidad y Propaganda', 25, 600, '25600', '0.00', '0.00', '5000.00', '0.00', 1),
(33, 'Servicio de Internet', 25, 700, '25700', '0.00', '0.00', '110000.00', '5398.69', 1),
(34, 'Otros Servicios Comerciales y Financieros', 25, 900, '25900', '0.00', '0.00', '175000.00', '4049.02', 1),
(35, 'Pasajes Nacionales', 26, 110, '26110', '0.00', '0.00', '20000.00', '20000.00', 1),
(36, 'Pasajes al Exterior', 26, 120, '26120', '0.00', '0.00', '20000.00', '373471.81', 1),
(37, 'Viáticos Nacionales', 26, 210, '26210', '0.00', '0.00', '20000.00', '20000.00', 1),
(38, 'Viáticos al Exterior', 26, 220, '26220', '0.00', '0.00', '10000.00', '10000.00', 1),
(39, 'Gastos Juridicos ', 27, 500, '27500', '0.00', '0.00', '5000.00', '337.43', 1),
(40, 'Impuesto sobre Venta- 12%', 27, 114, '27114', '0.00', '0.00', '334375.00', '15183.79', 1),
(41, 'Impuesto sobre Venta- 15%', 27, 115, '27115', '0.00', '0.00', '-207102.10', '0.00', 1),
(42, 'Ceremonial y Protocolo', 29, 100, '29100', '0.00', '0.00', '157500.00', '6748.35', 1),
(43, 'Alimentos y Bebidas para Personas', 31, 100, '31100', '0.00', '0.00', '44371800.00', '7069589.95', 1),
(44, 'Madera, Corcho y sus Manufacturas', 31, 500, '31500', '0.00', '0.00', '292247.00', '0.00', 1),
(45, 'Hilados y Telas', 32, 100, '32100', '0.00', '0.00', '503922.00', '245000.00', 1),
(46, 'Confecciones Textiles', 32, 200, '32200', '0.00', '0.00', '600000.00', '6748.35', 1),
(47, 'Prendas de Vestir', 32, 310, '32310', '0.00', '0.00', '539367.00', '300000.00', 1),
(48, 'Calzados', 32, 400, '32400', '0.00', '0.00', '1701522.00', '218092.81', 1),
(49, 'Papel de Escritorio', 33, 100, '33100', '0.00', '0.00', '385659.00', '20398.69', 1),
(50, 'Papel para Computación', 33, 200, '33200', '0.00', '0.00', '5250.00', '0.00', 1),
(51, 'Productos de Artes Gráficas', 33, 300, '33300', '0.00', '0.00', '105000.00', '0.00', 1),
(52, 'Productos de Papel y Cartón', 33, 400, '33400', '0.00', '0.00', '50000.00', '0.00', 1),
(53, 'Libros, Revistas y Periódicos', 33, 500, '33500', '0.00', '0.00', '28980.00', '1760.12', 1),
(54, 'Textos de Enseñanza', 33, 600, '33600', '0.00', '0.00', '10000.00', '0.00', 1),
(55, 'Cueros y Pieles', 34, 100, '34100', '0.00', '0.00', '250000.00', '0.00', 1),
(56, 'Artículos de Cuero', 34, 200, '34200', '0.00', '0.00', '300000.00', '0.00', 1),
(57, 'Articulos de Caucho', 34, 300, '34300', '0.00', '0.00', '550000.00', '100000.00', 1),
(58, 'Llantas y Camaras de Aire', 34, 400, '34400', '0.00', '0.00', '333050.00', '0.00', 1),
(59, 'Productos Químicos', 35, 100, '35100', '0.00', '0.00', '244000.00', '2024.51', 1),
(60, 'Productos Farmacéuticos y Medicinales Varios', 35, 210, '35210', '0.00', '0.00', '3726000.00', '894641.07', 1),
(61, 'Insecticidas, Fumigantes y Otros', 35, 400, '35400', '0.00', '0.00', '100000.00', '0.00', 1),
(62, 'Tintas, Pinturas y Colorantes', 35, 500, '35500', '0.00', '0.00', '1018140.00', '150000.00', 1),
(63, 'Gasolina', 35, 610, '35610', '0.00', '0.00', '11937362.00', '2500000.00', 1),
(64, 'Diesel', 35, 620, '35620', '0.00', '0.00', '14928124.00', '4534604.59', 1),
(65, 'Aceites y Grasas Lubricantes', 35, 650, '35650', '0.00', '0.00', '1749517.00', '1571195.03', 1),
(66, 'Productos de Material Plástico', 35, 800, '35800', '0.00', '0.00', '723000.00', '0.00', 1),
(67, 'Productos Químicos de Uso Personal', 35, 930, '35930', '0.00', '0.00', '220000.00', '0.00', 1),
(68, 'Productos Ferrosos', 36, 100, '36100', '0.00', '0.00', '271000.00', '3374.19', 1),
(69, 'Productos no Ferrosos', 36, 200, '36200', '0.00', '0.00', '175801.00', '0.00', 1),
(70, 'Estructuras Metálicas Acabadas', 36, 300, '36300', '0.00', '0.00', '225000.00', '0.00', 1),
(71, 'Herramientas Menores', 36, 400, '36400', '0.00', '0.00', '121000.00', '1214.72', 1),
(72, 'Material de Guerra y Seguridad', 36, 500, '36500', '0.00', '0.00', '1040000.00', '0.00', 1),
(73, 'Accesorios de Metal', 36, 920, '36920', '0.00', '0.00', '120000.00', '0.00', 1),
(74, 'Elementos de Ferretería', 36, 930, '36930', '0.00', '0.00', '900000.00', '150000.00', 1),
(75, 'Productos de Vidrio', 37, 200, '37200', '0.00', '0.00', '248300.00', '0.00', 1),
(76, 'Productos de Loza y Porcelana', 37, 300, '37300', '0.00', '0.00', '288775.00', '0.00', 1),
(77, 'Productos de Cemento, Asbesto y Yeso', 37, 400, '37400', '0.00', '0.00', '370000.00', '0.00', 1),
(78, 'Cemento, Cal y Yeso', 37, 500, '37500', '0.00', '0.00', '242500.00', '0.00', 1),
(79, 'Piedra, Arcilla y Arena', 38, 400, '38400', '0.00', '0.00', '315444.45', '0.00', 1),
(80, 'Elementos de Limpieza y Aseo Personal', 39, 100, '39100', '0.00', '0.00', '538843.00', '3367.32', 1),
(81, 'Útiles de Escritorio, Oficina y Enseñanza', 39, 200, '39200', '0.00', '0.00', '9848834.00', '5002699.41', 1),
(82, 'Útiles y Materiales Eléctricos', 39, 300, '39300', '0.00', '0.00', '405632.00', '3374.20', 1),
(83, 'Utensilios de Cocina y Comedor', 39, 400, '39400', '0.00', '0.00', '280000.00', '4723.86', 1),
(84, 'Instrumental Medico Quirúrgico Menor', 39, 510, '39510', '0.00', '0.00', '355000.00', '4049.03', 1),
(85, 'Repuestos y Accesorios', 39, 600, '39600', '0.00', '0.00', '36206026.40', '21257.01', 1),
(86, 'Repuestos y Accesorios Fondos Propios', 39, 600, '39600', '0.00', '0.00', '364350.00', '0.00', 1),
(87, 'Embarcaciones Marítimas', 42, 330, '42330', '0.00', '0.00', '102634290.00', '0.00', 1),
(88, 'Becas Nacionales', 51, 211, '51211', '0.00', '0.00', '1091400.00', '1240193.51', 1),
(89, 'Becas Externas', 51, 212, '51212', '0.00', '0.00', '1989680.00', '300000.00', 1),
(90, 'Otras Transferencias', 51, 230, '51230', '0.00', '0.00', '3978000.00', '1500196.00', 1),
(91, 'Mantenimiento y reparacion de equipos de traccion y elevacion', 11, 3, '23320', '0.00', '0.00', '10000000.00', '250000.00', 1);

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
(1, '-', '-', '-', '-', '-', '-', 0),
(2, 'ACCESORIOS PARA COMPUTADORA Y OFICINAS S. A DE C.V. (ACOSA)', '05019995108892', 'BANCO DEL PAIS', '01-010-000331-9', 'CHEQUES', '1558141700.jpg', 1),
(3, 'ALEJANDROS AUTO PARTS', '06131975001499', 'BANCO FICOHSA', '0111390000032-6', 'CHEQUES', '', 1),
(4, 'ALMACEN INDUSTRIAL / KUESTERMANN Y BIENST S.DE R.L.', '', 'DAVIVIENDA HONDURAS, S.A.', '6010089497', 'CHEQUES', '', 1),
(5, 'AMERICAN DRY CLEANING S. DE R.L.', '', 'BANCO DE OCCIDENTE S.A', '11412130636-0', 'CHEQUES', '', 1),
(6, 'ANPHAR S.A. DE C.V.', '', 'BANCO DE OCCIDENTE S.A', '11201013472-7', 'CHEQUES', '', 1),
(7, 'ARRENDADORA DE VEHICULOS, S.A.,', '', 'BAC HONDURAS', '72377563-1', 'CHEQUES', '', 1),
(8, 'ASTRO TOUR S DE R.L', '', 'BANCO DE OCCIDENTE S.A', '11201008282-4', 'CHEQUES', '', 1),
(9, 'AUTO PARTES REAYA S.A. DE  C.V. ', '', 'BAC HONDURAS', '730129391', 'CHEQUES', '', 1),
(10, 'AUTO PARTES REAYA S.A. DE  C.V. ', '', 'BANCO DE OCCIDENTE S.A.', '11-201-003553-2', 'CHEQUES', '', 1),
(11, 'AUTOSUSPENSION / RAFAEL RODAS CORRALES', '08019999399830', 'BAC HONDURAS', '730078331', 'CHEQUES', '', 1),
(12, 'AZ COMERCIAL S. DE R.L.', '08019001228290', 'BANCO DE OCCIDENTE S.A', '11402013075-5', 'CHEQUES', '', 1),
(13, 'BAR Y RESTAURANTE EL PELICANO', '', 'DAVIVIENDA HONDURAS, S.A.', '207132071-5', 'AHORRO', '', 1),
(14, 'BASE NAVAL DE PUERTO CASTILLA', '', 'BANCO DEL PAIS', '01-635-000079-0', 'CHEQUES', '', 1),
(15, 'BASE NAVAL DE PUERTO CORTES', '', 'BANCO DEL PAIS', '01-070-000126-0', 'CHEQUES', '', 1),
(16, 'CAM INTERNATIONAL HONDURAS', '', 'BANCO FICOHSA', '200002689404-', 'AHORROS ', '', 1),
(17, 'CASA COMERCIAL MATHEWS, S.A DE C.V. (CEMCOL)', '', 'BANCO DEL PAIS', '01299000003-0', 'CHEQUES', '', 1),
(18, 'CASA EVENTOS S. DE R.L. DE C.V.', '08019011349833', 'BAC HONDURAS', '730323501', 'CHEQUES', '', 1),
(19, 'CASA RAFAEL', '05051962004369', 'BANCO ATLANTIDA', '3100036759', 'CHEQUES', '', 1),
(20, 'CENTRAL DE MANGUERAS S.A (PTO CORTES)', '', 'BAC HONDURAS', '90173850-1', 'CHEQUES', '', 1),
(21, 'CENTRAL DE MANGUERAS S.A (TOCOA)', '', 'BANCO ATLANTIDA', '110013295-8', 'CHEQUES', '', 1),
(22, 'CENTRAL DE TURBOS E INVERSIONES DE HONDURAS', '05061990002533', 'BAC HONDURAS', '72908848-1', 'CHEQUES', '', 1),
(23, 'CENTRO DE ADIESTRAMIENTO MILITAR DEL EJERCITO', '', 'BANCO DEL PAIS', '01-370-000078-1', 'CHEQUES', '', 1),
(24, 'CENTRO EXPERIMENTAL DE DESARROLLO AGROPECUARIO Y CONSERVACION ECOLOGICA', '', 'BANCO DEL PAIS', '01-345-000087-9', 'CHEQUES', '', 1),
(25, 'CENTRO FERRETERO TORNIFESA S. DE R.L. DE C.V.', '05019999179219', 'DAVIVIENDA HONDURAS, S.A.', '601-014893-4', 'CHEQUES', '', 1),
(26, 'CENTRO INDUSTRIAL Y TECNICO DEL COLOR S. DE R.L. (CENIT COLOR)', '08019995222085', 'BANCO DE OCCIDENTE S.A', '11907000901-2', 'CHEQUES', '', 1),
(27, 'COMCEL', '', 'BANCO DEL PAIS', '21-300-0224124', 'CHEQUES', '', 1),
(28, 'COMERCIAL GENESIS Y ASOCIADOS S. DE R.L.  COMERCIAL GENESA', '08019013603298', 'BAC HONDURAS', '730216691', 'CHEQUES', '', 1),
(29, 'COMERCIAL ULTRAMOTOR', '', 'BANCO ATLANTIDA, S.A.', '1100231487', 'CHEQUES', '', 1),
(30, 'COMERCIAL YOLY S.DE R.L.', '', 'BANRURAL', '0590101001770-0', 'CHEQUES', '', 1),
(31, 'COMERCIALIZACIONES Q S DE R. L. DE C.V.', '', 'BANCO DEL PAIS', '01600000815-6', 'CHEQUES', '', 1),
(32, 'COMERCIALIZADORA EL MUEBLE S DE R.L. (COELMU S DE R.L.)', '', 'BAC HONDURAS', '10535003-1', 'CHEQUES', '', 1),
(33, 'COMISARIATO IPM', '08019003238214', 'BANCO DEL PAIS', '01-599-001037-4', 'CHEQUES', '', 1),
(34, 'CONSTRUCTORA RIVERA ', '', 'BANCO DE LOS TRABAJADORES', '21705000009-1', 'CHEQUES', '', 1),
(35, 'CONSULTORIA, SUPERVISION Y CONSTRUCCION DE OBRAS S. DE R.L.', '', 'BAC HONDURAS', '90199010-1', 'AHORRO', '', 1),
(36, 'CORPORACION INDUSTRIAL FARMACEUTICA S.A. DE C.V', '', 'BANCO LAFISE S.A.', '11150300007-6', 'CHEQUES', '', 1),
(37, 'DARWYN ANTONIO VELASQUEZ ARIAS ', '', 'BANCO DEL PAIS', '21-304-000874-0', 'AHORRO', '', 1),
(38, 'DAVID HUMBERTO OWEN GARCIA/NORIT', '15011957002726', 'BANHCAFE', '160400000-2', 'CHEQUES', '', 1),
(39, 'DENTAL PRO', '', 'BAC HONDURAS', '730134521', 'CHEQUES', '', 1),
(40, 'DIMAFER Y ELECTRICOS, S. DE. R.L.', '08019015720271', 'BANCO FICOHSA', '20000271888-9', 'CHEQUES', '', 1),
(41, 'DISPROA', '', ' BANCO FICOHSA', '0030010007023-2', 'CHEQUES', '', 1),
(42, 'DISTRIBUCIONES DIVERSAS DE CENTRO AMERICA S DE RL', '', 'BANCO LAFISE S.A.', '11450300076-7', 'CHEQUES', '', 1),
(43, 'DISTRIBUCIONES VALENCIA', '08011986138652', 'BANCO DE OCCIDENTE', '21401142153-6', 'CHEQUES', '', 1),
(44, 'DISTRIBUIDORA CHOROTEGA', '17071984005643', 'BAC HONDURAS', '900193401', 'CHEQUES', '', 1),
(45, 'DISTRIBUIDORA COMERCIAL S.A \"DICOSA\"', '', 'BANCO FICOHSA', '0011027042-9', 'CHEQUES', '', 1),
(46, 'DISTRIBUIDORA DE MATERIALES DE SULA S.A. DE C.V. DIDEMA.', '', 'BANCO DEL PAIS', '01001002411-2', 'CHEQUES', '', 1),
(47, 'DISTRIBUIDORA DE PRODUCTOS Y SERVICIOS PIZZATI', '01011969012943', 'DAVIVIENDA HONDURAS, S.A.', '301131991-4', 'CHEQUES', '', 1),
(48, 'DISTRIBUIDORA DILOPS/ GLENDA SIOMARA LOPEZ ROMERO', '17071964006395', 'BANCO BANHCAFE', '1606000215', 'CHEQUES', '', 1),
(49, 'DISTRIBUIDORA SOAL', '', 'BANCO DE OCCIDENTE', '11401015008-7', 'CHEQUES', '', 1),
(50, 'DISTRIBUIDORES TECNOLOGICOS S. DE R.L. DE C.V. (DISTECH)', '08019009217967', 'BAC HONDURAS', '72734531-1', 'CHEQUES', '', 1),
(51, 'DROGUERIA PHARMA INTERNACIONAL S. DE R.L.', '', 'DAVIVIENDA HONDURAS, S.A.', '101016507-9', 'CHEQUES', '', 1),
(52, 'DROGUERIA Y DISTRIBUCIONES DIVERSAS DE CENTROAMERICA S. DE R.L.  ', '', 'BAC HONDURAS', '730277261', 'CHEQUES', '', 1),
(53, 'EDITORIAL LUNA COLOR S. de R.L.', '08011983114631', 'BANCO DEL PAIS', '01300001000-8', 'CHEQUES', '', 1),
(54, 'EL HERALDO', '', 'BAC HONDURAS', '100350938', 'CHEQUES', '', 1),
(55, 'EL LIBANO INDUSTRIAL S. DE R.L. DE C.V.', '05019995096753', 'BANCO DEL PAIS', '01014000118-0', 'CHEQUES', '', 1),
(56, 'ELECTRO LLANTAS S.DE R.L.', '08019003251010', 'BANCO FICOHSA', '021026705-8', 'CHEQUES', '', 1),
(57, 'EMPRESA DE MANTENIMIENTO Y SERVICIOS MARITIMOS (EAGLE MARINE S.A.)', '01019002004262', 'BANCO ATLANTIDA', '31000-71053', 'CHEQUES', '', 1),
(58, 'EMPRESA PARA EL DESARROLLO SOCIAL DE HONDURAS, S.A. DE C.V. (EMPADESH),', '08019010280617', 'BANCO FICOHSA', '002139167', 'CHEQUES', '', 1),
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
(71, 'FERRETERIA PINEDA', '06011968007927', 'BANCO FICOHSA', '20000501354-1', 'AHORROS', '', 1),
(72, 'FERRETERIA Y MADERERA GRUFER', '08019010294357', 'BAC HONDURAS', '73013774-1', 'CHEQUES', '', 1),
(73, 'FFAA/FNH/BANAGUA', '', 'BANCO DEL PAIS', '01-599-001650-0', 'CHEQUES', '', 1),
(74, 'FFAA/FNH/BASE NAVAL DE CARATASCA', '', 'BANCO DEL PAIS', '01-599-001676-3', 'CHEQUES', '', 1),
(75, 'FFAA/FNH/CUARTEL GENERAL NAVAL', '', 'BANCO DEL PAIS', '01-599-001654-2', 'CHEQUES', '', 1),
(76, 'FORMULAS QUIMICAS S. DE R.L.', '08019995304450', 'BAC HONDURAS', '90366000-1', 'CHEQUES', '', 1),
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
(88, 'GRUPO MULTICABLES DE CORTES, S DE R.L.', '05019016820118', 'BAC HONDURAS', '730294321', 'CHEQUES', '', 1),
(89, 'HEALTHCARE PRODUCTS CENTROAMERICA S. DE R.L.', '08019002272161', 'BANCO LAFISE S.A.', '10110100525-6', 'CHEQUES', '', 1),
(90, 'HONDURASNET S. DE R.L. (HNET)', '08019999399510', 'BAC HONDURAS', '913436901', 'CHEQUES', '', 1),
(91, 'HONDURASNET S. DE R.L.', '08019999399510', 'BAC HONDURAS', '913436901', 'CHEQUES', '', 1),
(92, 'HOSPITAL MILITAR', '', 'BANCO DEL PAIS', '01-599-000613-0', 'CHEQUES', '', 1),
(93, 'HUMBERTO JOSSUE CASTILLO ORTEGA/ INVERSIONES CASTILLO', '01011989033310', 'BANCO FICOHSA', '4124066096', 'CHEQUES', '', 1),
(94, 'IMS CONSULTING DE HONDURAS S DE RL', '', 'BAC HONDURAS ', '727277291', 'AHORROS', '', 1),
(95, 'INGENIERIA, IMPORTACIONES Y SOLUCIONES ENERGETICAS', '', 'DAVIVIENDA HONDURAS, S.A.', '216006141-3', 'CHEQUES', '', 1),
(96, 'INSTITUTO FUERZA NAVAL', '', 'BANCO LAFISE S.A.', '24050300002-6', 'CHEQUES', '', 1),
(97, 'INVERDUCOR (INVERSIONES DURON DE CORTES)', '05011956024941', 'BANCO DE OCCIDENTE S.A.', '11-205-002319-5', 'CHEQUES', '', 1),
(98, 'INVERSIONES AMOR S DE R.L', '', 'BAC HONDURAS', '73023524-1', 'CHEQUES', '', 1),
(99, 'INVERSIONES DE COMBUSTIBLE S. DE R.L. (INVERCO)', '', 'BANCO ATLANTIDA, S.A.', '10120081269', 'AHORROS', '', 1),
(100, 'INVERSIONES DEL CENTRO S. DE R.L. DE C.V.', '', 'BAC HONDURAS', '73024779-1', 'CHEQUES', '', 1),
(101, 'INVERSIONES ENERGY S. DE R.L. DE C.V.', '05019006482996', 'BAC HONDURAS', '20012421-3', 'CHEQUES', '', 1),
(102, 'INVERSIONES FLORALES AR FLOWER?S, S. DE R.L.', '', 'BANCO DE OCCIDENTE S.A.', '21417114198-1', 'AHORRO', '', 1),
(103, 'INVERSIONES KALTER ', '', 'BANCO FICOHSA', '20000503600-2', 'AHORRO', '', 1),
(104, 'INVERSIONES LOGISTICAS H&amp;M S.DE R.L.', '08019017912731', 'BANCO FICOHSA', '20000509144-5', 'CHEQUES', '', 1),
(105, 'INVERSIONES R Y R', '', 'BAC HONDURAS', '729770951', 'AHORRO', '', 1),
(106, 'INVERSIONES Y EQUIPOS S. DE R.L. DE C.V.', '', 'BANCO FICOHSA', '11390000398-7', 'CHEQUES', '', 1),
(107, 'LA ARMERIA', '08019003245353', 'BANCO DEL PAIS', '21-599-001222-1', 'CHEQUES', '', 1),
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
(118, 'MULTISERVICIOS LAGOS SM, S. DE R.L.', '08229017921882', 'BAC HONDURAS', '729205731', 'CHEQUES', '', 1),
(119, 'MUROS Y MAS S. DE R.L. DE C.V.', '08019011392384', 'BANCO ATLANTIDA', '1011101642-3', 'CHEQUES', '', 1),
(120, 'NOHELIA SPORT', '13121969000077', 'BANCO DE OCCIDENTE S.A', '11-205-002410-8', 'CHEQUES', '', 1),
(121, 'NORIT/ DAVID HUMBERTO OWEN GARCIA', '15011957002726', 'BANCO BANHCAFE', '1604000002', 'CHEQUES', '', 1),
(122, 'NOVEDADES STEFFY?S', '07131969000935', 'BANCO PROMERICA', '176476-7', 'CHEQUES', '', 1),
(123, 'OPERADORES TURISTICOS DE HONDURAS S.A. (OTHSA)', '08019016886671', 'BANCO DE OCCIDENTE S.A', '11401017470-9', 'CHEQUES', '', 1),
(124, 'PAGADURIA FUERZA NAVAL', '', 'BANCO DEL PAIS', '215-990-007-350', 'AHORRO', '', 0),
(125, 'PAPELERA CALPULES S.A. DE C.V. (PACASA)', '', 'BANCO FICOHSA', '021-102-10-100-7', 'CHEQUES', '', 1),
(126, 'PAPELERIA HONDURAS S. DE R.L.', '08019998391040', 'BAC HONDURAS', '90977720-1', 'CHEQUES', '', 1),
(127, 'PAT JOYERIA Y RELOJERIA S. DE R.L.', '', 'BANCO ATLANTIDA', '110015032-3', 'CHEQUES', '', 1),
(128, 'PERIODICOS Y REVISTAS S.A DE C.V.', '08019995286070', 'BANCO DE OCCIDENTE S.A', '11424000209-8', 'CHEQUES', '', 1),
(129, 'PINTURAS SUR DE HONDURAS', '08019002279851', 'BAC HONDURAS', '90990930-1', 'CHEQUES', '', 1),
(130, 'POOL SUPPLIES S. DE R.L.', '01019010322912', 'BAC HONDURAS', '730159491', 'CHEQUES', '', 1),
(131, 'PRIMER BATALLON DE INFANTERIA DE MARINA', '', 'BANCO DEL PAIS', '01-600-000263-8', 'CHEQUES', '', 1),
(132, 'PRONTO SERVICIOS DE HONDURAS', '', 'FICENSA', '320022932', 'AHORROS ', '', 1),
(133, 'PROVEEDORA DE MATERIALES DE LA CONSTRUCCION(PROMACO)', '06051949000676', 'BANCO ATLANTIDA', '720066996-3', 'CHEQUES', '', 1),
(134, 'PROYECTO DE INGENIERIA CENTROAMERICANA S. DE R.L (PROINCA S. DE R.L.)', '', 'BANCO FICOHSA', '0012401983-1', 'AHORRO', '', 1),
(135, 'REENCAUCHE Y DISTRIBUCION DE LLANTAS S.A DE C.V (RENDILLANTAS)', '08019008165911', 'BAC HONDURAS', '73003546-1', 'CHEQUES', '', 1),
(136, 'REPRESENTACIONES QUIMICAS DE CENTRO AMERICA S DE R.L.', '08019002261399', 'BANCO DE OCCIDENTE S.A', '11408013088-3', 'CHEQUES', '', 1),
(137, 'REPRESENTACIONES Y DISTRIBUCIONES PONCE (REDIPO)', '08019012466571', 'BANCO ATLANTIDA', '110026205-2', 'CHEQUES', '', 1),
(138, 'REPUESTOS Y ACCESORIOS PIZZATI', '01011969012943', 'DAVIVIENDA HONDURAS, S.A.', '301131991-4', 'CHEQUES', '', 1),
(139, 'RESTAURANTE Y TERRAZA BELLA VISTA S. DE R.L.', '08019013595205', 'BAC HONDURAS', '727832231', 'CHEQUES', '', 1),
(140, 'RILMAC IMPRESORES', '', 'BAC HONDURAS', '730013641', 'CHEQUES', '', 1),
(141, 'ROCAS COMERCIAL / RENAN ORLANDO CASCO', '07141957002499', 'BANCO DE OCCIDENTE S.A', '21-401-165866-8', 'AHORROS', '', 1),
(142, 'ROYMART S. DE R.L. DE C.V.', '', 'BAC HONDURAS', '71000651-1', 'CHEQUES', '', 1),
(143, 'RZV SOLUCIONES Y DISTRIBUCIONES INFORMATICAS ', '', 'BAC HONDURAS', '102350141', 'CHEQUES', '', 1),
(144, 'SECRETARIA DE DEFENSA NACIONAL / UNIVERSIDAD DE DEFENSA DE HONDURAS (UDH)', '08011993157131', 'BANCO DEL PAIS', '01-599-000886-8', 'CHEQUES', '', 1),
(145, 'SEDENA/FFAA/EJERCITO/GASTOS DE FUNCIONAMIENTO', '', 'BANCO CENTRAL DE HONDURAS', '11101-01-000987-1', 'CHEQUES', '', 1),
(146, 'SEDENA-HOSPITAL MILITAR', '', 'BANCO DEL PAIS', '01599000613-0', 'CHEQUES', '', 1),
(147, 'SEGUROS ATLANTIDA, S.A.', '', 'BANCO ATLANTIDA, S.A.', '110002248-0', 'CHEQUES', '', 1),
(148, 'SERIBOTEX S. DE R.L.', '08019014636363', 'BANCO ATLANTIDA', '1152006553-0', 'AHORROS', '', 1),
(149, 'SERVI MECHES', '', 'BANCO DEL PAIS', '21-302-0092266', 'AHORRO', '', 1),
(150, 'SERVICIO ELECTRICO MECANICO INDUSTRIAL S.E.M.I', '', 'BANCO DE OCCIDENTE S.A', '112110072189', 'CHEQUES', '', 1),
(151, 'SERVICIOS AIRE, TIERRA Y MAR S.DE.R.L.', '', 'BANCO ATLANTIDA, S.A.', '01011101372-7', 'CHEQUES', '', 1),
(152, 'SERVICIOS MARITIMOS DE HONDURAS, S. DE R.L.', '08019007097710', 'BAC HONDURAS', '727392311', 'CHEQUES', '', 1),
(153, 'SERVICIOS TECNICOS Y SUMINISTROS (STS)', '', 'BANCO ATLANTIDA, S.A.', '001-201-71145-2', 'AHORROS ', '', 1),
(154, 'SERVITODO S. DE R.L.', '08019995324372', 'BAC HONDURAS', '91120770-1', 'CHEQUES', '', 1),
(155, 'SISTEMAS GRAFICOS MENDEZ / SIGMEN', '06051984007065', 'BANCO FICOHSA', '011-101-344071', 'CHEQUES', '', 1),
(156, 'SOUVENIRS ARTESANIAS CANDU', '05021935001497', 'BAC HONDURAS', '100200488', 'AHORROS', '', 1),
(157, 'STEPHANIE WILLIAMS CACERES', '', 'BANCO DEL PAIS', '21-326-002884-8', 'AHORROS ', '', 1),
(158, 'SUPERMERCADOS YIP S. A DE C.V', '05029995001355', 'BANCO ATLANTIDA', '110003439-4', 'CHEQUES', '', 1),
(159, 'TALLER \"VELASQUEZ\"', '', 'BANCO DEL PAIS', '21304000874-0', 'AHORRO', '', 1),
(160, 'TECNICOM Y SUMINISTROS S DE R.L.', '08019015720250', 'BANCO ATLANTIDA', '1381100092-9', 'CHEQUES', '', 1),
(161, 'TECNOLOGIAS Y SERVICIOS INTERNACIONALES DE HONDURAS S.A DE C.V.', '', 'BAC HONDURAS', '73020157-1', 'CHEQUES', '', 1),
(162, 'TIENDA MILITAR I.P.M.', '08019003238214', 'BANCO DEL PAIS', '01-599-000608-3', 'CHEQUES', '', 1),
(163, 'TIENDA NAVAL', '18071962010351', 'BANCO DEL PAIS', '01302000225-6', 'CHEQUES', '', 1),
(164, 'TIENDA NAVAL', '18071962010351', 'BANCO DEL PAIS', '21302009511-7', 'AHORROS', '', 1),
(165, 'TORNILLOS Y PARTES INDUSTRIALES S. DE R.L. DE C.V.', '', 'DAVIVIENDA HONDURAS, S.A.', '6010109980', 'CHEQUES', '', 1),
(166, 'TOYOSERVICIO, S.A.', '', 'BAC HONDURAS', '91151860-1', 'CHEQUES', '', 1),
(167, 'TULIO ROBERTO LAGOS ARNOLD', '', 'BANCO DEL PAIS', '21-318-006260-8', 'AHORRO', '', 1),
(168, 'TULIPANES ALIMENTOS Y SERVICIOS S. DE R.L.', '', 'BAC HONDURAS', '91153810-1', 'CHEQUES', '', 1),
(169, 'XMEDIA S. DE R.L.', '', 'BAC HONDURAS', '100603860', 'CHEQUES', '', 1),
(170, 'XXI BATALLON DE POLICIA MILITAR (HABERES)', '', 'BANCO DEL PAIS', '01-599-000785-3', 'CHEQUES', '', 1),
(171, 'YAM INDUSTRIAL S. DE R.L. DE C.V', '', 'FICOHSA', '07101301-836', 'CHEQUES', '', 1),
(173, 'DIRECTOR A.N.H. CAP. FRAGATA GILBERTO MORALES RAMOS', 'BANPAIS', '08019001211980', '01-602-000012-6', 'CHEQUES', '', 1),
(174, 'LLANTA DEL PACIFICO', 'BAC HONDURAS', '08019015724166', '730267901', 'AHORROS', '', 1),
(175, 'DROGUERIA MEDITEKSA PHARMA', 'BANCO DE OCCIDENTE', '08011993157131', '11-401-017354-0', 'CHEQUES', '', 1),
(176, 'AUTO REPUESTOS ASDRUBAL', 'BANCO DE OCCIDENTE', '08081938001262', '11-415-013194-8', 'CHEQUES', '', 1),
(177, 'VEDDEPESSA (VENTA Y DISTRIBUIDORA DE PETROLEO Y LUBRICANTES DE HONDURAS, S. DE R.L.', 'BANRURAL', '08019014635196', '01503010148282', 'CHEQUES', '', 1),
(178, 'CMDTE. 2DO BIM TTE NAVIO OSMAN EDUARDO HERNANDEZ AMAYA', 'BANCO DEL PAIS', '08019001211980', '01-600-000263-8', 'CHEQUES', '', 1),
(179, 'TENIENTE DE NAVIO C.I.M. JOSE LUIS GONZALES HERRERA', 'BANPAIS', '08019001211980', '213000113012', 'AHORROS', '', 1),
(180, 'TENIENTE DE NAVIO C.G. FERNANDO LUIS BARAHONA ALVAREZ', 'BANPAIS', '08019001211980', '21-600-0025150', 'AHORROS', '', 1),
(181, 'TENIENTE DE NAVIO C.G. EDDY GUSTAVO HERCULANO HERNANDEZ', 'BANPAIS', '08019001211980', '21-600-001966-5', 'AHORROS', '', 1),
(182, 'TENIENTE DE NAVIO C.G. MANUEL DE JESUS IVAN PEREZ MADRIR', 'BANPAIS', '08019001211980', '21-380-000999-6', 'AHORROS', '', 1),
(183, 'CAPITAN DE FRAGATA ALEXANDER RAFAEL CARBAJAR BOCANEGRA', 'BANPAIS', '08019001211980', '21-014-000181-6', 'AHORROS', '', 1),
(184, 'CAPITAN DE NAVIO C.G. JOSE JORGE FORTIN AGUILAR', 'BANPAIS', '08019001211980', '21-300-005905-0', 'AHORROS', '', 1),
(185, 'CAPITAN DE FRAGATA AUSTACIL HAGARIN TOME FLORES', 'BANPAIS', '08019001211980', '21-300-000587-2', 'AHORROS', '', 1),
(186, 'CMDTE GRAL. FNH CONTRALMIRANTE EFRAIN MANN HERNANDEZ', 'BANPAIS', '08019001211980', '21-070-000795-4', 'AHORROS', '', 1),
(187, 'CAPITAN DE CORBETA C.G. HEIDY SARAHI BAQUEDANO FLORES', 'BANPAIS', '08019001211980', '21-345-001275-6', 'AHORROS', '', 1),
(188, 'CMDTE 1ER BIM CAPITAN DE FRAGATA HENRY JEOVANY MATAMOROS', 'BANPAIS', '08019001211980', '01-600-000263-8', 'CHEQUES', '', 1);

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
(1, 2, '05019995108892', '3300', '2019-05-30', '0.15', 'Aceites y grasas lubricantes', '122854.60', '18428.19', '141282.79', 'Aceptado');

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
(1, 58, 5, '2019-05-30', 'Transf/Terceros', '30MAY019F', '0220', '160000.25', 'VALOR UTILIZADO PARA SUFRAGAR GASTOS ADMINISTRATIVOS EN LAS ATENCIONES, CEREMONIA DE ASCENSO DE OFICIALES AL GRADO DE GENERAL DE BRIGADA O SU EQUIVALENTE SEGÚN DIRECTIVA AMC(03) NUMERO 007-2019 Y ACUERDO J.E.M.C.  No. 0310-2019.', 1),
(2, 124, 5, '2019-05-30', 'Transf/Terceros', '30MAY019F', '0230', '103405.37', 'VALOR UTILIZADO PARA SUFRAGAR GASTOS ADMINISTRATIVOS DE MEGA BRIGADA MEDICA CONJUNTA, BASILICA DE SUYAPA TEGUCIGALPA SEGUN DIRECTIVA EMC(C-5) No. 002-2019 Y ACUERDO JEMC No. 0226-219', 1),
(3, 77, 5, '2019-05-30', 'Transf/Terceros', '30MAY019F', '0231', '9740.00', 'VALOR UTILIZADO PARA SUFRAGAR GASTOS DE GIRA ACADÉMICA A CAYOS COCHINOS PARA LOS CADETES DE TERCER AÑO NAVAL SEGUN ACUERDO J.E.M.C. No. 0197-2019.', 1),
(4, 77, 5, '2019-05-30', 'Transf/Terceros', '30MAY019F', '0232', '17240.60', 'VALOR UTILIZADO PARA SUFRAGAR GASTOS DE COMPRA DE LIBROS Y TEXTOS DE ENSEÑANZA NAVAL, PARA EL CADETE JOSE ELIAS RODAS ESPINOZA, SEGUN ACUERDO No. J.E.M.C. No. 0198-2019', 1),
(5, 77, 5, '2019-05-31', 'Transf/Terceros', '31MAY019F', '0233', '92001.38', 'VALOR PARA SUFRAGAR GASTOS DE MATRÍCULA Y LAVANDERÍA DE LOS CADETES NAVALES VICTOR ALEJANDRO CASTELLANOS O. Y JERIN DAVID PEREZ FLORES EN COLOMBIA SEGÚN ACUERDO J.E.M.C. No. 0200-2019.', 1),
(6, 77, 5, '2019-05-31', 'Transf/Terceros', '31MAY019F', '0234', '13964.50', 'VALOR UTILIZADO PARA SUFRAGAR GASTOS DE VIAJE DEL GUARDIAMARINA JUAT ALDAIR CORDON PERALTA, QUIEN REPRESENTÓ A FF.AA. EN COMPETENCIAS DE ADIESTRAMIENTO CHIMALTLALLI EN MÉXICO.', 1),
(7, 142, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0047', '128640.00', 'CANCELACION DE FACT # 00019222 Y 00019223 COMBUSTIBLE PARA SER UTILIZADO EN PATRULLAJES MARITIMOS, TERRESTRES Y MISIONES OPERATIVAS DE BANACAST Y RESERVA DEL E.M.N. DE LA F.N.H.', 1);

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
(1, 1, '2019-04-12', 'Transf/Sedena', '0697/2019', '12042019-16', '220448.60', 'Aceptado'),
(2, 1, '2019-05-10', 'Transf/Sedena', '0871/2019', '10052019-22', '5260326.97', 'Aceptado'),
(3, 1, '2019-05-10', 'Transf/Sedena', '0965/2019', '10052019-19', '11327145.40', 'Aceptado'),
(4, 1, '2019-04-12', 'Transf/Sedena', '0557/2019', '12042019-22', '1679450.70', 'Aceptado'),
(5, 1, '2019-05-10', 'Transf/Sedena', '01134/2019', '10052019-36', '3439267.12', 'Aceptado'),
(6, 1, '2019-05-10', 'Transf/Sedena', '0970/2019', '10052019-32', '2919589.95', 'Aceptado'),
(7, 1, '2019-05-10', 'Transf/Sedena', '0968/2019', '10052019-33', '2020492.66', 'Aceptado');

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
(1, 'Hector Mercadal', 'ID', '1503198501083', '1555 nw 82nd ave', '31860490', 'hmercadal1@gmail.com', 'Asistente de Pagaduria', 'hmercadal1', '5dde6efd05cdcaa68502b02ea4a8b0dec6d88b8d639b81ff65a320a124dab9b1', '1547963176.jpg', 1),
(4, 'Alejandra Maria Herrera Velasquez', 'ID', '0801198610471', '', '99961965', 'amhv73@outlook.es', 'Administrador Contable', 'Alejandra1986', 'a15d52e6de469e5937f970601c270426f33d7dd3191df39679f9026c1a07d0da', '', 1),
(5, 'Diego Martinez', 'ID', '0801198503278', 'las casitas', '22346288', 'diego85mando@gmail.com', 'Contador I', 'Diego3278', '4e3d2ff3ce5293dd81b161e13868d9b27d6b7b05a3b46fffdb1523c451f4ad94', '', 1),
(6, 'Magaly Garcia', 'ID', '0502199501984', 'Choloma', '98166743', 'magalygarcia971@gmail.com', 'Asistente de Pagaduria', 'Magaly01984', '79717ff6c3e5ec4fb700f95fdcb2afd602891ce73b71efb7368270c5d17759ff', '', 1),
(7, 'Ernesto Antonio Avila Kattan', 'ID', '0501196406714', 'Col. la Gran Villa Baracoa Cortes', '98630157', 'avilak64@hotmail.com', 'Pagador General FNH', 'avila6714', '5b4558e2354766a29d9fade7060e72aa9d3e966b11adfabf9abee5f80ca59a2f', '', 1);

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
(31, 4, 1),
(32, 4, 3),
(33, 4, 4),
(34, 4, 5),
(37, 5, 1),
(38, 5, 2),
(39, 5, 3),
(40, 6, 1),
(41, 6, 2),
(42, 6, 5),
(43, 7, 1),
(44, 7, 2),
(45, 7, 3),
(46, 7, 4),
(47, 7, 5),
(48, 7, 6),
(49, 7, 7),
(50, 7, 8),
(51, 7, 9),
(52, 7, 10),
(53, 1, 1),
(54, 1, 2),
(55, 1, 3),
(56, 1, 4),
(57, 1, 5),
(58, 1, 6),
(59, 1, 7),
(60, 1, 8),
(61, 1, 9),
(62, 1, 10);

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
  MODIFY `idadministrar_ordenes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `bancos`
--
ALTER TABLE `bancos`
  MODIFY `idbancos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT de la tabla `compromisos`
--
ALTER TABLE `compromisos`
  MODIFY `idcompromisos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

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
  MODIFY `iddetalle_compromisos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=611;

--
-- AUTO_INCREMENT de la tabla `detalle_crear_acuerdo`
--
ALTER TABLE `detalle_crear_acuerdo`
  MODIFY `iddetalle_crear_orden` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_ingreso`
--
ALTER TABLE `detalle_ingreso`
  MODIFY `iddetalle_ingreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT de la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  MODIFY `iddetalle_orden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `detalle_retenciones`
--
ALTER TABLE `detalle_retenciones`
  MODIFY `iddetalle_retenciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `dtransf_ctaspg`
--
ALTER TABLE `dtransf_ctaspg`
  MODIFY `dtransf_ctaspg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `factura_orden`
--
ALTER TABLE `factura_orden`
  MODIFY `idfactura_orden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  MODIFY `idingreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `idpermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `presupuesto_disponible`
--
ALTER TABLE `presupuesto_disponible`
  MODIFY `idpresupuesto_disponible` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `idproveedores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT de la tabla `retenciones`
--
ALTER TABLE `retenciones`
  MODIFY `idretenciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `transferenciabch`
--
ALTER TABLE `transferenciabch`
  MODIFY `idtransferenciabch` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `transferidoctaspg`
--
ALTER TABLE `transferidoctaspg`
  MODIFY `idtransferidoctaspg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  MODIFY `idusuario_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

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
-- Filtros para la tabla `retenciones`
--
ALTER TABLE `retenciones`
  ADD CONSTRAINT `retenciones_proveedores` FOREIGN KEY (`idproveedores`) REFERENCES `proveedores` (`idproveedores`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
