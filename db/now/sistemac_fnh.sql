-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-09-2019 a las 19:13:15
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.8

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
(2, 71, 5, 13, 1, '204', '269', 'Material', 'Artículos y materiales para la reparación del sollado de marinería del estado mayor naval', 'O/C', '2019-04-29', '2990.00', '0.00', '2990.00', '0.00', '0.00', '0.00', '448.50', '15.00', '2990.00', '3438.50', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3438.50', 'Pendiente'),
(3, 3, 5, 13, 1, '205', '270', 'Material', 'Repuestos y accesorios para mantenimiento y reparación de los vehículos: Toyota Hilux RHFN-5517    Toyota Hilux RHFN-5518, Toyota Hilux RHFN-5520, Bus Civilian RHFN-5522, asignados al Departamento Logístico Fn-4 del Estado Mayor Naval', 'O/C', '2019-04-29', '11170.00', '630.00', '10540.00', '0.00', '0.00', '0.00', '1581.00', '15.00', '10540.00', '12121.00', '1581.00', '15.00', '10540.00', '0.00', '0.00', '0.00', '10540.00', 'Pagado'),
(4, 4, 1, 4, 12, '0001', '21312', 'Materiales', 'sada', 'O/C', '2019-06-06', '324.56', '0.00', '324.56', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '324.56', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '324.56', 'Pendiente'),
(5, 31, 5, 13, 1, '208', '273', 'Material', 'Combustible para ser utilizado en patrullajes marítimos y misiones operativas de la Base Naval de Guanaja y Primer Batallón de Infantería de Marina, según se detalla a continuación: BANAGUA-1,500 Galones de gasolina    Primer BIM--1,000 Galones de gasolina', 'O/C', '2019-05-01', '249900.00', '0.00', '249900.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '249900.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '249900.00', 'Pendiente'),
(6, 31, 5, 13, 1, '209', '274', 'Material', 'Combustible para ser utilizado en patrullajes marítimos y misiones operativas del Primer BIM,Academia Naval de Honduras, BANACAR Y BANAGUA según se detalla a continuación: Primer BIM-----1,000 GALONES/DIÉSEL, ANH----500 GALONES/DIÉSEL, BANACAR---500 GALONES/DIÉSEL, BANAGUA--1,000 GALONES/DIÉSEL', 'O/C', '2019-05-01', '247560.00', '0.00', '247560.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '247560.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '247560.00', 'Pendiente'),
(7, 177, 5, 13, 1, '210', '275', 'Material', 'Combustible para ser utilizado en patrullajes marítimos y misiones operativas de BANAMAP, 2DO BIM, CAN, FEN, BANACAST Y reserva EMN en BANACAST según se detalla a continuación: BANAMAP----1,000 Galones/Gasolina, 2DO BIM----1,000 Galones/Gasolina, CAN---500 Galones/Gasolina, FEN---300 Galones/Gasolin', 'O/C', '2019-05-04', '408100.00', '0.00', '408100.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '408100.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '408100.00', 'Pendiente'),
(8, 177, 5, 13, 1, '211', '276', 'Material', 'Combustible para ser utilizado en patrullajes maritimos y misiones operativas de BANAMAP, 2DO BIM, FEN,BANACAST y Reserva del EMN en BANACAST segun se detalla a continuacion: BANAMAP--1,000 G/diesel, 2DO BIM--1,000 G/diesel, FEN--300 G/diesel,BANACAST----1,000 G/diesel , reserva del EMN en BANACAST-', 'O/C', '2019-05-04', '338480.00', '0.00', '338480.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '338480.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '338480.00', 'Pendiente'),
(9, 1, 1, 1, 1, '15', '', '', 'SUELDOS DE OFICIALES DEL MES DE MAYO DEL 2019 DE LA FUERZA NAVAL DE HONDURAS', 'Planillas', '2019-06-06', '15000000.00', '0.00', '15000000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '15000000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '15000000.00', 'Pagado'),
(10, 97, 5, 11, 1, '212', '277', 'Material', 'Materiales necesario para realizar trabajos de reparación del casco  de la L.P. Choluteca FNH-6505', 'O/C', '2019-05-06', '5117.50', '0.00', '5117.50', '0.00', '0.00', '0.00', '767.63', '15.00', '5117.50', '5885.13', '767.63', '15.00', '5117.50', '0.00', '0.00', '0.00', '5117.50', 'Pendiente'),
(12, 72, 5, 4, 1, '213', '278', 'Material', 'Materiales para ser utilizados en el mantenimiento y reparaciones en diferentes areas de BANACAST', 'O/C', '2019-05-06', '23434.89', '0.00', '23434.89', '0.00', '0.00', '0.00', '3515.25', '15.00', '23434.97', '26950.14', '3515.25', '15.00', '23434.97', '0.00', '0.00', '0.00', '23434.89', 'Pendiente'),
(13, 201, 5, 13, 1, '214', '279', 'Material', 'Llantas para ser utilizadas en los vehículos Nissan Frontier RHFN-5519 Y RHFN-5520 Y Nissan Frontier RHFN-5552, asignados al departamento logistico FN-4 y Cuartel General Naval', 'O/C', '2019-06-07', '24750.00', '0.00', '24750.00', '0.00', '0.00', '0.00', '3712.50', '15.00', '24750.00', '28462.50', '3712.50', '15.00', '24750.00', '0.00', '0.00', '0.00', '24750.00', 'Pendiente'),
(14, 19, 5, 7, 1, '215', '280', 'Material', 'Repuestos para ser utilizados en la reparación y mantenimiento del vehículo mazda BT-50 RHFN-5714, asignado al primer batallón de infantería de marina', 'O/C', '2019-05-13', '1578.26', '0.00', '1578.26', '0.00', '0.00', '0.00', '236.74', '15.00', '1578.26', '1815.00', '236.89', '15.00', '1579.26', '0.00', '0.00', '0.00', '1578.11', 'Pendiente'),
(15, 1, 1, 13, 1, '598915', '', '', 'PAGO DE BECAS AL EXTERIOR DEL MES DE ENERO AL MES DE ABRIL DEL 2019', 'Becas', '2019-04-25', '374072.00', '0.00', '374072.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '374072.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '374072.00', 'Pendiente'),
(16, 1, 1, 13, 1, '598912-598963', '', '', 'PAGO DE BECAS NACIONALES DEL MES DE ENERO AL MES DE ABRIL DEL 2019', 'Becas', '2019-04-25', '420600.00', '0.00', '420600.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '420600.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '420600.00', 'Pendiente'),
(17, 176, 5, 4, 1, '216', '281', 'Material', 'PARA UTILIZARSE EN VEHÍCULO FORCE RHFN-5594 Y CAMIÓN RHFN-5599, ASIGNADOS A LA BANACAST', 'O/C', '2019-05-13', '6330.00', '0.00', '6330.00', '0.00', '0.00', '0.00', '949.50', '15.00', '6330.00', '7279.50', '949.50', '15.00', '6330.00', '0.00', '0.00', '0.00', '6330.00', 'Pendiente'),
(18, 26, 5, 7, 1, '217', '282', 'Material', 'MATERIAL ELÉCTRICO PARA ILUMINACIÓN DE SOLLADOS DE INFANTERÍA, CANCHA DE FÚTBOL, BOLSAS PLÁSTICAS PARA BRIGADA MEDICA EN EL MUNICIPIO DE EL PORVENIR, ATLANTIDA', 'O/C', '2019-05-13', '7312.69', '0.00', '7312.69', '0.00', '0.00', '0.00', '1096.90', '15.00', '7312.69', '8409.59', '1096.90', '15.00', '7312.69', '0.00', '0.00', '0.00', '7312.69', 'Pendiente'),
(19, 3, 5, 4, 1, '218', '283', 'Material', 'PARA UTILIZARSE EN CAMIÓN STALLION 450 RHFN-5599, ASIGNADO A LA BANACAST', 'O/C', '2019-05-14', '2580.00', '860.00', '1720.00', '0.00', '0.00', '0.00', '258.00', '15.00', '1720.00', '1978.00', '258.00', '15.00', '1720.00', '0.00', '0.00', '0.00', '1720.00', 'Pendiente'),
(20, 118, 5, 13, 1, '219', '284', 'Material', 'ARTÍCULOS Y MATERIALES PARA USO EN REPARACIÓN  Y MANTENIMIENTO DE OFICINAS DEL DEPARTAMENTO DE AUDITORIA JURÍDICA DEL ESTADO MAYOR NAVAL', 'O/C', '2019-05-14', '49713.00', '0.00', '49713.00', '0.00', '0.00', '0.00', '7456.95', '15.00', '49713.00', '57169.95', '7456.95', '15.00', '49713.00', '0.00', '0.00', '0.00', '49713.00', 'Pendiente'),
(21, 3, 5, 13, 1, '220', '285', 'Material', 'REPUESTOS Y ACCESORIOS PARA LA REPARACIÓN DEL VEHÍCULO TIPO AMBULANCIA RHFN-5523 DE LA FUERZA NAVAL', 'O/C', '2019-05-14', '3060.00', '444.00', '2616.00', '0.00', '0.00', '0.00', '392.40', '15.00', '2616.00', '3008.40', '392.40', '15.00', '2616.00', '0.00', '0.00', '0.00', '2616.00', 'Pendiente'),
(22, 126, 5, 13, 1, '221', '286', 'Material', 'ARTÍCULOS Y MATERIALES PARA USO EN LAS OFICINAS Y DEPARTAMENTOS DEL ESTADO MAYOR NAVAL', 'O/C', '2019-05-02', '20346.40', '0.00', '20346.40', '2555.99', '15.00', '17039.90', '0.00', '0.00', '0.00', '22902.39', '2555.99', '15.00', '17039.90', '0.00', '0.00', '0.00', '20346.40', 'Pendiente');

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
  `condicion` tinyint(4) DEFAULT NULL COMMENT '0 = pendientes sin retencion; 1: pendientes con retencion; 2: pagado sin retencion; 3: pagado con retencion'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `compromisos`
--

INSERT INTO `compromisos` (`idcompromisos`, `idprograma`, `idproveedores`, `fecha_hora`, `fecha_registro`, `tipo_registro`, `numfactura`, `total_compra`, `condicion`) VALUES
(1, 2, 2, '2019-06-15', '2019-06-15', 'F-G', '0005', '2086.65', 1),
(2, 2, 2, '2019-06-15', '2019-06-15', 'F-G', '0004', '2455.70', 1),
(3, 2, 2, '2019-06-15', '2019-06-15', 'F-G', '006', '3686.48', 1),
(4, 2, 2, '2019-06-15', '2019-06-15', 'F-G', '004', '5032.45', 3),
(5, 2, 2, '2019-06-15', '2019-06-15', 'F-G', '5435', '371333.31', 2),
(6, 2, 2, '2019-06-15', '2019-06-15', 'F-G', '32432', '34324.23', 0),
(7, 2, 2, '2019-06-15', '2019-06-15', 'F-G', '01555', '44455.80', 2);

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
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(2, 'Fuerzas Armadas de Honduras / Fuerza Naval / Haberes de Tropa', 'Banco Central de Honduras', 'Cheques', '11101-01-000989-8', '9150.84', 1),
(3, 'Fuerzas Armadas de Honduras / Fuerza Naval / Fondo de Inversión', 'Banco Central de Honduras', 'Cheques', '11101-01-000990-1', '0.00', 1),
(4, 'Fuerzas Armadas de Honduras / Fuerza Naval / Apoyo Institucional', 'Banco Central de Honduras', 'Cheques', '11101-01-000991-1', '0.00', 1),
(5, 'Fuerzas Armadas de Honduras / Fuerza Naval / Funcionamiento', 'Banco Central de Honduras', 'Cheques', '11101-01-000992-8', '14304413.95', 1);

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
(1, 1, 1, '150.00', 0),
(2, 1, 2, '125.50', 0),
(3, 1, 3, '155.35', 0),
(4, 1, 4, '155.80', 0),
(5, 1, 5, '1500.00', 0),
(6, 2, 6, '500.80', 0),
(7, 2, 7, '1500.45', 0),
(8, 2, 8, '454.45', 0),
(9, 3, 1, '3443.24', 0),
(10, 3, 1, '243.24', 0),
(11, 4, 22, '4444.45', 0),
(12, 4, 23, '588.00', 0),
(13, 5, 1, '342.34', 0),
(14, 5, 2, '324324.32', 0),
(15, 5, 23, '4242.42', 0),
(16, 5, 24, '42424.23', 0),
(17, 6, 5, '34324.23', 0),
(18, 7, 88, '44455.80', 0);

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
(3, 2, 74, 'C/U', 210, 'Ladrillos de rafon', '7.00'),
(4, 2, 74, 'C/U', 4, 'Bolsas de cemento gris', '200.00'),
(5, 2, 74, 'C/U', 1, 'Metro de arena', '720.00'),
(6, 3, 85, 'C/U', 1, 'Juego de pitos bosch', '650.00'),
(7, 3, 85, 'C/U', 2, 'Marcos para bateria', '290.00'),
(8, 3, 85, 'C/U', 2, 'Baterias 12v 115 amperios energizer', '3165.00'),
(9, 3, 85, 'C/U', 2, 'Juego de filtros  (Aceite, combustible y aire)', '1030.00'),
(10, 3, 85, 'C/U', 1, 'Filtro de aceite', '260.00'),
(11, 3, 85, 'C/U', 1, 'Filtro de combustible', '320.00'),
(12, 3, 85, 'C/U', 1, 'Filtro de aire', '450.00'),
(13, 3, 85, 'C/U', 1, 'juego de escobillas limpia-brisas bosch', '400.00'),
(14, 3, 85, 'Galon', 1, 'Coolant', '120.00'),
(17, 5, 63, 'GALON', 1500, 'Gasolina Super', '99.96'),
(18, 5, 63, 'GALON', 1000, 'Gasolina Super', '99.96'),
(19, 6, 64, 'GALON', 1000, 'Diésel', '82.52'),
(20, 6, 64, 'GALON', 500, 'Diésel', '82.52'),
(21, 6, 64, 'GALON', 500, 'Diésel', '82.52'),
(22, 6, 64, 'GALON', 1000, 'Diésel', '82.52'),
(23, 7, 63, 'GALON', 1000, 'Gasolina Super', '100.69'),
(24, 7, 63, 'GALON', 1000, 'Gasolina Super', '102.47'),
(25, 7, 63, 'GALON', 500, 'Gasolina Super', '102.47'),
(26, 7, 63, 'GALON', 300, 'Gasolina Super', '102.47'),
(27, 7, 63, 'GALON', 1000, 'Gasolina Super', '102.47'),
(28, 7, 63, 'GALON', 200, 'Gasolina Super', '102.47'),
(29, 8, 64, 'GALON', 1000, 'Diésel', '83.33'),
(30, 8, 64, 'GALON', 1000, 'Diésel', '85.05'),
(31, 8, 64, 'GALON', 300, 'Diésel', '85.05'),
(32, 8, 64, 'GALON', 1000, 'Diésel', '85.05'),
(33, 8, 64, 'GALON', 700, 'Diésel', '85.05'),
(34, 9, 1, '', 1, '', '15000000.00'),
(35, 10, 59, 'C/U', 1, 'Cilindro de argón puro 220 PC', '3100.00'),
(36, 10, 74, 'C/U', 20, 'Disco de Corte # 7', '79.00'),
(37, 10, 74, 'C/U', 5, 'Disco de pulir # 7', '87.50'),
(64, 12, 62, 'C/U', 2, 'Cubeta pintura aceite azul gris (SW6227)', '3900.00'),
(65, 12, 71, 'C/U', 1, 'Carreta trup anaranjada', '1315.20'),
(66, 12, 71, 'C/U', 2, 'Serrucho 22 stanley luctador 15472-22', '147.83'),
(67, 12, 71, 'C/U', 1, 'Juego de cubos 25/piezas stanley', '1055.04'),
(68, 12, 71, 'C/U', 2, 'Alicate no 9 vikingo', '60.87'),
(69, 12, 71, 'C/U', 2, 'Juego de tenazas pretul 3 PCS (22975)', '125.22'),
(70, 12, 71, 'C/U', 1, 'Marco c/segueta cromada (69805)', '66.54'),
(71, 12, 71, 'C/U', 6, 'Segueta sandcut 18 dientes', '32.20'),
(72, 12, 74, 'C/U', 4, 'Codo inyectado 6', '236.80'),
(73, 12, 74, 'C/U', 2, 'Tubo drenaje', '1104.00'),
(74, 12, 74, 'C/U', 1, 'Pegamento PVC galon', '1154.08'),
(75, 12, 74, 'C/U', 2, 'Codo inyectado 6', '236.80'),
(76, 12, 74, 'C/U', 5, 'Llave 1/2 chorro balin italy', '60.87'),
(77, 12, 74, 'C/U', 5, 'Val balin italy imit p/roja', '60.86'),
(78, 12, 74, 'C/U', 2, 'Llave lavamanos doble acrilica (3985)', '166.96'),
(79, 12, 74, 'C/U', 2, 'Teflon 3/4 truper (12521)', '10.43'),
(80, 12, 74, 'C/U', 4, 'Regadera cromada foset grande', '188.30'),
(81, 12, 74, 'C/U', 4, 'Llavin yale c/llave doble seguro (03140744)', '876.00'),
(82, 12, 74, 'C/U', 4, 'Felpa truper 1/4 (19223)', '36.52'),
(83, 12, 74, 'C/U', 1, 'Rodillo negro truper (19255)', '40.87'),
(84, 12, 74, 'C/U', 4, 'Silicon truper trans 280 ml (17559)', '112.85'),
(85, 12, 82, 'C/U', 25, 'Cable cordon', '33.69'),
(86, 12, 82, 'C/U', 6, 'Toma doble s/r plastico (29818)', '43.13'),
(87, 12, 82, 'C/U', 4, 'Enchufle trifasico 15 AMP. C/abrazadera', '17.15'),
(88, 12, 82, 'C/U', 2, 'Cinta aislante 3m grande', '47.79'),
(89, 12, 82, 'C/U', 2, 'Foco sodio de 150 A', '215.00'),
(90, 13, 58, 'C/U', 15, 'Dunlop LT5 8pr 104r', '1650.00'),
(91, 13, 58, 'C/U', 15, 'Valvula negra ', '0.00'),
(92, 14, 85, 'C/U', 1, 'Bomba de agua 2.5 mazda', '1326.09'),
(93, 14, 85, 'C/U', 1, 'Tapon para radiador', '130.43'),
(94, 14, 85, 'C/U', 1, 'Bujia HB 4 12V 9006', '121.74'),
(95, 15, 89, '', 1, '', '374072.00'),
(96, 16, 88, '', 1, '', '416100.00'),
(97, 16, 88, '', 1, '', '4500.00'),
(98, 17, 85, 'C/U', 1, 'Juego de fricciones para el vehiculo Force', '950.00'),
(99, 17, 85, 'C/U', 1, 'Disco de clutch para vehiculo Force', '1900.00'),
(100, 17, 85, 'C/U', 1, 'Cruz de cardan de Stallion', '1980.00'),
(101, 17, 85, 'C/U', 2, 'Retenedores pequeños para Stallion', '750.00'),
(102, 18, 80, 'C/U', 16, 'Bolsas de 22x33', '47.83'),
(103, 18, 80, 'C/U', 2, 'Rollos de bolsas barril', '55.08'),
(104, 18, 80, 'C/U', 25, 'Rollo de bolsa hercules 1/50', '91.30'),
(105, 18, 80, 'C/U', 8, 'Rollos de papel toalla', '40.95'),
(106, 18, 82, 'C/U', 10, 'Bombillos CFL SP 23W', '82.61'),
(107, 18, 82, 'C/U', 1, 'Switch', '11.02'),
(108, 18, 82, 'C/U', 1, 'Toma-corriente', '27.53'),
(109, 18, 82, 'C/U', 10, 'Gasas', '66.67'),
(110, 18, 82, 'C/U', 2, 'Bombillos metal 1000w', '1147.90'),
(111, 19, 85, 'C/U', 2, 'Mangueras hidraulica', '1290.00'),
(112, 20, 85, 'C/U', 1, 'Evaporador con control remoto 36,000 btu', '11645.00'),
(113, 20, 85, 'C/U', 1, 'Condensador con kit de tubería 36,000 btu', '20209.00'),
(114, 20, 85, 'C/U', 2, 'Disco duro de 3.5', '5624.00'),
(115, 20, 85, 'C/U', 3, 'Cable de monitor VGA', '645.00'),
(116, 20, 85, 'C/U', 2, 'Tarjeta madre MSIH 110LGA1151', '2338.00'),
(117, 21, 85, 'C/U', 1, 'Filtro de combustible', '420.00'),
(118, 21, 85, 'C/U', 1, 'Filtro de aceite', '350.00'),
(119, 21, 85, 'C/U', 1, 'Filtro de aire', '490.00'),
(120, 21, 85, 'C/U', 1, 'Juego de fricciones delanteras kashima', '1400.00'),
(121, 21, 85, 'C/U', 1, 'Juego de escobillas limpiabrisas bosch', '400.00'),
(122, 22, 49, 'C/U', 50, 'Cuadernos único grande plastificado de 400 paginas ', '66.13'),
(123, 22, 81, 'C/U', 50, 'Masking tape de 1\"x hasta 40 yardas de largo', '8.14'),
(124, 22, 81, 'C/U', 100, 'Carpeta archivadora de cartón color negro', '25.68'),
(125, 22, 81, 'C/U', 12, 'Perforadora de dos orificios metálica capacidad hasta 1000 hojas', '572.00'),
(126, 22, 81, 'C/U', 18, 'Perforadora de dos orificios metálica capacidad hasta 25 hojas ', '35.25'),
(127, 22, 81, 'C/U', 20, 'Quitagrapas metálico de uñas', '5.77'),
(128, 22, 81, 'C/U', 50, 'Masking tape de 3/4\" x hasta 40 yardas de largo', '6.02'),
(129, 22, 81, 'GALON', 30, 'Pegamento blanco', '205.00');

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
(1, 1, '0001', '2019-06-04', '4000.00'),
(2, 1, '0002', '2019-06-04', '550.00'),
(3, 2, '001-001-01-', '2019-04-29', '3438.50'),
(4, 3, '00004140', '2019-04-29', '1230.50'),
(5, 3, '00004141', '2019-04-29', '7279.50'),
(6, 3, '00004143', '2019-04-29', '2070.00'),
(7, 3, '00004145', '2019-04-29', '1541.00'),
(8, 4, '4324', '2019-06-06', '432432.00'),
(9, 5, '00182616', '2019-05-01', '149940.00'),
(10, 5, '00182612', '2019-05-01', '99960.00'),
(11, 6, '00182611', '2019-05-01', '82520.00'),
(12, 6, '00182613', '2019-05-01', '41260.00'),
(13, 6, '00182614', '2019-05-01', '41260.00'),
(14, 6, '00182615', '2019-05-01', '82520.00'),
(15, 7, '00015196', '2019-06-04', '100690.00'),
(16, 7, '00015263', '2019-05-04', '102470.00'),
(17, 7, '', '2019-06-06', '0.00'),
(18, 7, '', '2019-06-06', '0.00'),
(19, 7, '', '2019-06-06', '0.00'),
(20, 7, '', '2019-06-06', '0.00'),
(21, 8, '00015193', '2019-05-04', '83330.00'),
(22, 8, '00015264', '2019-05-04', '85050.00'),
(23, 8, '00015267', '2019-05-04', '25515.00'),
(24, 8, '00015269', '2019-05-04', '85050.00'),
(25, 8, '00015270', '2019-05-04', '59535.00'),
(26, 10, '00005880', '2019-05-06', '5885.13'),
(27, 0, '00044643', '2019-05-06', '26950.14'),
(28, 12, '00044643', '2019-05-06', '26950.14'),
(29, 13, '00008416', '2019-05-05', '28462.50'),
(30, 14, '00005313', '2019-05-10', '1815.00'),
(31, 17, '00001042', '2019-05-13', '7279.50'),
(32, 18, '00112724', '2019-05-13', '3406.88'),
(33, 18, '00112725', '2019-05-13', '4008.37'),
(34, 18, '00112698', '2019-06-07', '994.35'),
(35, 19, '004182', '2019-05-14', '1978.00'),
(36, 20, '00000326', '2019-05-14', '57169.95'),
(37, 21, '00004175', '2019-05-14', '3008.40'),
(38, 22, '00028376', '2019-05-02', '22902.39');

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
  `pres_vigente` decimal(11,2) NOT NULL,
  `pres_ejecutar` decimal(11,2) NOT NULL,
  `pres_ejecutado` decimal(11,2) NOT NULL,
  `condicion` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `presupuesto_disponible`
--

INSERT INTO `presupuesto_disponible` (`idpresupuesto_disponible`, `nombre_objeto`, `grupo`, `subgrupo`, `codigo`, `pres_vigente`, `pres_ejecutar`, `pres_ejecutado`, `condicion`) VALUES
(1, 'Sueldos Basicos', 11, 111, '11100', '0.00', '0.00', '0.00', 1),
(2, 'Adicionales', 11, 114, '11400', '0.00', '0.00', '0.00', 1),
(3, 'Decimotercer Mes', 11, 115, '11510', '0.00', '0.00', '0.00', 1),
(4, 'Decimocuarto Mes', 11, 115, '11520', '0.00', '0.00', '0.00', 1),
(5, 'Complementos', 11, 116, '11600', '0.00', '0.00', '0.00', 1),
(6, 'Contribuciones al Instituto de Previsión Militar - Cuota Patronal', 11, 117, '11731', '0.00', '0.00', '0.00', 1),
(7, 'Contribuciones al Instituto de Previsión Militar - Regimen de Riesgos Especiales', 11, 117, '11732', '0.00', '0.00', '0.00', 1),
(8, 'Contribuciones al Instituto de Previsión Militar - Reserva Laboral', 11, 117, '11733', '0.00', '0.00', '0.00', 1),
(9, 'Beneficios y Compensaciones', 16, 161, '16100', '0.00', '0.00', '0.00', 1),
(10, 'Energía Eléctrica', 21, 211, '21100', '0.00', '0.00', '0.00', 1),
(11, 'Agua', 21, 212, '21200', '0.00', '0.00', '0.00', 1),
(12, 'Correo Postal', 21, 214, '21410', '0.00', '0.00', '0.00', 1),
(13, 'Telefonía Fija', 21, 214, '21420', '0.00', '0.00', '0.00', 1),
(14, 'Alquiler de Equipos de Transporte, Tracción y Elevación', 22, 222, '22220', '0.00', '0.00', '0.00', 1),
(15, 'Alquiler de Tierras y Terrenos', 22, 223, '22300', '0.00', '0.00', '0.00', 1),
(16, 'Otros Alquileres', 22, 229, '22900', '0.00', '0.00', '0.00', 1),
(17, 'Mantenimiento y Reparación de Edificios y Locales', 23, 231, '23100', '0.00', '0.00', '0.00', 1),
(18, 'Mantenimiento y Reparacion de Equipos y Medios de Transporte', 23, 232, '23200', '0.00', '0.00', '0.00', 1),
(19, 'Mantenimiento y Reparacion de Equipos Sanitarios y de Laboratorio', 23, 233, '23330', '0.00', '0.00', '0.00', 1),
(20, 'Mantenimiento y Reparación de Equipo para Computación', 23, 233, '23350', '0.00', '0.00', '0.00', 1),
(21, 'Mantenimiento y Reparación de Equipo de Oficina y Muebles', 23, 233, '23360', '0.00', '0.00', '0.00', 1),
(22, 'Mantenimiento y Reparación de Otros Equipos', 23, 233, '23390', '0.00', '0.00', '0.00', 1),
(23, 'Mantenimiento y Reparación de Obras Civiles e Instalaciones Varias', 23, 234, '23400', '0.00', '0.00', '0.00', 1),
(24, 'Limpieza, Aseo y Fumigacion', 23, 235, '23500', '0.00', '0.00', '0.00', 1),
(25, 'Servicios de Capacitación', 24, 245, '24500', '0.00', '0.00', '0.00', 1),
(26, 'Servicios de Informatica y Sistemas Computarizados', 24, 246, '24600', '0.00', '0.00', '0.00', 1),
(27, 'Servicios de Consultoria de Gestión Administrativa, Financiera y Actividades Conexas', 24, 247, '24710', '0.00', '0.00', '0.00', 1),
(28, 'Servicio de Transporte', 25, 251, '25100', '0.00', '0.00', '0.00', 1),
(29, 'Servicio de Imprenta, Publicaciones y Reproducciones', 25, 253, '25300', '0.00', '0.00', '0.00', 1),
(30, 'Primas y Gastos de Seguro', 25, 254, '25400', '0.00', '0.00', '0.00', 1),
(31, 'Comisiones y Gastos Bancarios', 25, 255, '25500', '0.00', '0.00', '0.00', 1),
(32, 'Publicidad y Propaganda', 25, 256, '25600', '0.00', '0.00', '0.00', 1),
(33, 'Servicio de Internet', 25, 257, '25700', '0.00', '0.00', '0.00', 1),
(34, 'Otros Servicios Comerciales y Financieros', 25, 259, '25900', '0.00', '0.00', '0.00', 1),
(35, 'Pasajes Nacionales', 26, 261, '26110', '0.00', '0.00', '0.00', 1),
(36, 'Pasajes al Exterior', 26, 261, '26120', '0.00', '0.00', '0.00', 1),
(37, 'Viáticos Nacionales', 26, 262, '26210', '0.00', '0.00', '0.00', 1),
(38, 'Viáticos al Exterior', 26, 262, '26220', '0.00', '0.00', '0.00', 1),
(39, 'Gastos Juridicos ', 27, 275, '27500', '0.00', '0.00', '0.00', 1),
(40, 'Impuesto sobre Venta- 12%', 27, 271, '27114', '0.00', '0.00', '0.00', 1),
(41, 'Impuesto sobre Venta- 15%', 27, 271, '27115', '0.00', '0.00', '0.00', 1),
(42, 'Ceremonial y Protocolo', 29, 291, '29100', '0.00', '0.00', '0.00', 1),
(43, 'Alimentos y Bebidas para Personas', 31, 311, '31100', '0.00', '0.00', '0.00', 1),
(44, 'Madera, Corcho y sus Manufacturas', 31, 315, '31500', '0.00', '0.00', '0.00', 1),
(45, 'Hilados y Telas', 32, 321, '32100', '0.00', '0.00', '0.00', 1),
(46, 'Confecciones Textiles', 32, 322, '32200', '0.00', '0.00', '0.00', 1),
(47, 'Prendas de Vestir', 32, 323, '32310', '0.00', '0.00', '0.00', 1),
(48, 'Calzados', 32, 234, '32400', '0.00', '0.00', '0.00', 1),
(49, 'Papel de Escritorio', 33, 331, '33100', '0.00', '0.00', '0.00', 1),
(50, 'Papel para Computación', 33, 332, '33200', '0.00', '0.00', '0.00', 1),
(51, 'Productos de Artes Gráficas', 33, 333, '33300', '0.00', '0.00', '0.00', 1),
(52, 'Productos de Papel y Cartón', 33, 334, '33400', '0.00', '0.00', '0.00', 1),
(53, 'Libros, Revistas y Periódicos', 33, 335, '33500', '0.00', '0.00', '0.00', 1),
(54, 'Textos de Enseñanza', 33, 336, '33600', '0.00', '0.00', '0.00', 1),
(55, 'Cueros y Pieles', 34, 341, '34100', '0.00', '0.00', '0.00', 1),
(56, 'Artículos de Cuero', 34, 342, '34200', '0.00', '0.00', '0.00', 1),
(57, 'Articulos de Caucho', 34, 343, '34300', '0.00', '0.00', '0.00', 1),
(58, 'Llantas y Camaras de Aire', 34, 344, '34400', '0.00', '0.00', '0.00', 1),
(59, 'Productos Químicos', 35, 351, '35100', '0.00', '0.00', '0.00', 1),
(60, 'Productos Farmacéuticos y Medicinales Varios', 35, 352, '35210', '0.00', '0.00', '0.00', 1),
(61, 'Insecticidas, Fumigantes y Otros', 35, 354, '35400', '0.00', '0.00', '0.00', 1),
(62, 'Tintas, Pinturas y Colorantes', 35, 355, '35500', '0.00', '0.00', '0.00', 1),
(63, 'Gasolina', 35, 356, '35610', '0.00', '0.00', '0.00', 1),
(64, 'Diesel', 35, 356, '35620', '0.00', '0.00', '0.00', 1),
(65, 'Aceites y Grasas Lubricantes', 35, 356, '35650', '0.00', '0.00', '0.00', 1),
(66, 'Productos de Material Plástico', 35, 358, '35800', '0.00', '0.00', '0.00', 1),
(67, 'Productos Químicos de Uso Personal', 35, 359, '35930', '0.00', '0.00', '0.00', 1),
(68, 'Productos Ferrosos', 36, 361, '36100', '0.00', '0.00', '0.00', 1),
(69, 'Productos no Ferrosos', 36, 362, '36200', '0.00', '0.00', '0.00', 1),
(70, 'Estructuras Metálicas Acabadas', 36, 363, '36300', '0.00', '0.00', '0.00', 1),
(71, 'Herramientas Menores', 36, 364, '36400', '0.00', '0.00', '0.00', 1),
(72, 'Material de Guerra y Seguridad', 36, 365, '36500', '0.00', '0.00', '0.00', 1),
(73, 'Accesorios de Metal', 36, 369, '36920', '0.00', '0.00', '0.00', 1),
(74, 'Elementos de Ferretería', 36, 369, '36930', '0.00', '0.00', '0.00', 1),
(75, 'Productos de Vidrio', 37, 372, '37200', '0.00', '0.00', '0.00', 1),
(76, 'Productos de Loza y Porcelana', 37, 373, '37300', '0.00', '0.00', '0.00', 1),
(77, 'Productos de Cemento, Asbesto , Yeso y otros', 37, 371, '37100', '0.00', '0.00', '0.00', 1),
(78, 'Cemento, Cal y Yeso', 37, 375, '37500', '0.00', '0.00', '0.00', 1),
(79, 'Piedra, Arcilla y Arena', 38, 384, '38400', '0.00', '0.00', '0.00', 1),
(80, 'Elementos de Limpieza y Aseo Personal', 39, 391, '39100', '0.00', '0.00', '0.00', 1),
(81, 'Útiles de Escritorio, Oficina y Enseñanza', 39, 392, '39200', '0.00', '0.00', '0.00', 1),
(82, 'Útiles y Materiales Eléctricos', 39, 393, '39300', '0.00', '0.00', '0.00', 1),
(83, 'Utensilios de Cocina y Comedor', 39, 394, '39400', '0.00', '0.00', '0.00', 1),
(84, 'Instrumental Medico Quirúrgico Menor', 39, 395, '39510', '0.00', '0.00', '0.00', 1),
(85, 'Repuestos y Accesorios', 39, 396, '39600', '0.00', '0.00', '0.00', 1),
(86, 'Repuestos y Accesorios Fondos Propios', 39, 396, '39600', '0.00', '0.00', '0.00', 0),
(87, 'Embarcaciones Marítimas', 42, 423, '42330', '0.00', '0.00', '0.00', 1),
(88, 'Becas Nacionales', 51, 512, '51211', '0.00', '0.00', '0.00', 1),
(89, 'Becas Externas', 51, 512, '51212', '0.00', '0.00', '0.00', 1),
(90, 'Otras Transferencias', 51, 512, '51230', '0.00', '0.00', '0.00', 1),
(91, 'Mantenimiento y reparacion de equipos de traccion y elevacion', 11, 233, '23320', '0.00', '0.00', '0.00', 1),
(92, 'abanty', 0, 0, 'bghf', '0.00', '0.00', '0.00', 1);

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
(63, 'ESCUELA TECNICA DEL EJERCITO', '08019001211980', 'BANCO DEL PAIS', '21-599-001107-1', 'CHEQUES', '', 1),
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
(186, 'CMDTE GRAL. FNH CONTRALMIRANTE EFRAIN MANN HERNANDEZ', 'BANPAIS', '08019001211980', '21-602-000439-6', 'AHORROS', '', 1),
(187, 'CAPITAN DE CORBETA C.G. HEIDY SARAHI BAQUEDANO FLORES', 'BANPAIS', '08019001211980', '21-345-001275-6', 'AHORROS', '', 1),
(188, 'CMDTE 1ER BIM CAPITAN DE FRAGATA HENRY JEOVANY MATAMOROS', 'BANPAIS', '08019001211980', '01-600-000263-8', 'CHEQUES', '', 1),
(189, 'AUSTACIL HAGARIN TOME FLORES', 'BANCO DEL PAIS', '08019001211980', '21-300-000587-2', 'AHORROS', '', 1),
(190, 'JOSE JORGE FORTIN AGUILAR', 'BANCO DEL PAIS', '080190001211980', '21-300-005905-0', 'AHORROS', '', 1),
(191, 'ALEXANDER RAFAEL CARBAJAL BOCANEGRA', 'BANCO DEL PAIS', '08019001211980', '21-014-000181-6', 'AHORROS', '', 1),
(192, 'MANUEL DE JESUS IVAN PEREZ MADRID', 'BANCO DEL PAIS', '08019001211980', '21-380-000999-6', 'AHORROS', '', 1),
(193, 'EDDY GUSTAVO HERCULANO HERNANDEZ', 'BANCO DEL PAIS', '08019001211980', '21-600-001966-5', 'AHORROS', '', 1),
(194, 'FERNANDO LUIS BARAHONA ALVAREZ', 'BANCO DEL PAIS', '08019001211980', '21-600-002515-0', 'AHORROS', '', 1),
(195, 'EFRAIN MANN HERNANDEZ', 'BANCO DEL PAIS', '08019001211980', '21-602-000439-6', 'AHORROS', '', 1),
(196, 'JOSE LUIS GONZALEZ HERRERA', 'BANCO DEL PAIS', '08019001211980', '21-300-011301-2', 'AHORROS', '', 1),
(197, 'HEYDI SARAHI BAQUEDANO FLORES', 'BANCO DEL PAIS', '08019001211980', '21-345-001275-6', 'AHORROS', '', 1),
(198, 'BERNARDO BENJAMIN ANARIBA SALGADO/TAPICERIA', 'BANCO DEL PAIS', '08019001211980', '21-327-001898-5', 'AHORROS', '', 1),
(199, 'DECIMO SEXTO BATALLON', 'BANCO DEL PAIS', '08019001211980', '01-370-000075-7', 'CHEQUES', '', 1),
(200, 'SEDENA', '08019001212068', 'BANCO DEL PAIS', '01-599-000616-4', 'CHEQUES', '', 1),
(201, 'DISTRIBUIDORA DE LLANTAS Y RINES S.A.', 'BANCO DE OCCIDENTE', '08019001211980', '11101-01-000992-8', 'CHEQUES', '', 1),
(202, 'CORPORACION FLORES', 'BANPAIS', '08019002282617', '01-598-000195-2', 'CHEQUES', '', 1),
(203, 'DISTRIBUIDORA DE MATERIALES S.A. DE C.V.', 'BAC CREDOMATIC', '05119998390898', '100363531', 'AHORROS', '', 1);

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
(7, 142, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0047', '128640.00', 'CANCELACION DE FACT # 00019222 Y 00019223 COMBUSTIBLE PARA SER UTILIZADO EN PATRULLAJES MARITIMOS, TERRESTRES Y MISIONES OPERATIVAS DE BANACAST Y RESERVA DEL E.M.N. DE LA F.N.H.', 1),
(8, 124, 5, '2019-05-30', 'Transf/Terceros', '30MAY019F', '0242', '18739.54', 'POR CONCEPTO DE REEMBOLSO DE FONDO ROTATORIO No 6 DE LA COMANDANCIA GENERAL  F.N.H.', 1),
(9, 124, 5, '2019-05-30', 'Transf/Terceros', '30MAY019F', '0241', '18727.64', 'POR CONCEPTO DE REEMBOLSO DE FONDO ROTATORIO No 5 DE LA COMANDANCIA GENERAL  F.N.H.', 1),
(10, 124, 5, '2019-05-30', 'Transf/Terceros', '30MAY019F', '0240', '18716.03', 'POR CONCEPTO DE REEMBOLSO DE FONDO ROTATORIO No 4 DE LA COMANDANCIA GENERAL F.N.H.', 1),
(11, 124, 5, '2019-05-30', 'Transf/Terceros', '30MAY019F', '0239', '18744.90', 'POR CONCEPTO DE REEMBOLSO DE FONDO ROTATORIO No 3 DE LA COMANDANCIA GENERAL F.N.H.', 1),
(12, 123, 5, '2019-05-30', 'Transf/Terceros', '30MAY019F', '0238', '111804.24', 'COMPRA DE PASAJES AEREOS TEGUCIGALPA-TAIPEI-CHINA TAIWAN A FAVOR DEL CADETE GERARDO JAVIER MOLINA RUIZ Y LA CADETE KATLIN GIVELY DIAZ GUZMAN QUIENES REALIZARAN ESTUDIOS DE FORMACION PARA OFICIAL EN EL EJERCITO DE CHINA TAIWAN SEGUN ACUERDO J.E.M.C. N', 1),
(13, 123, 5, '2019-05-30', 'Transf/Terceros', '30MAY019F', '0237', '26911.98', 'VALOR UTILIZADO PARA COMPRA DE PASAJE AEREO TEGUCIGALPA-SAO PAULO BRASIL A FAVOR DEL CADETE ELVIN JAVIER LEIVA FLORES QUIEN REALIZA ESTUDIOS DE FORMACION PARA OFICIAL EN LA ESCUELA NAVAL DE BRASIL SEGUN ACUERDO J.E.M.C. No. 0376-2019.', 1),
(14, 8, 5, '2019-05-30', 'Transf/Terceros', '30MAY019F', '0236', '24392.00', 'VALOR UTILIZADO PARA COMPRA DE PASAJE AEREO TEGUCIGALPA-SAN SALVADOR-MEXICO D.F. A FAVOR DEL GUARDIAMARINA JUAT ALDAIR CORDON PERALTA SEGUN ACUERDO J.E.M.C. No. 0247-2019.', 1),
(15, 77, 5, '2019-05-30', 'Transf/Terceros', '30MAY019F', '0235', '62300.00', 'VALOR UTILIZADO PARA SUFRAGAR GASTOS QUE INCURRE LA GIRA ACADEMICA AL PARQUE ARQUEOLOGICO RUINAS DE COPAN PARA LOS CADETES DE I AÑO NAVAL COMO PARTE DE LA CLASE DE HISTORIA DE HONDURAS SEGUN SOLICITUD CON REG. A.N.H. No. 342/2019.', 1),
(16, 123, 5, '2019-05-30', 'Transf/Terceros', '30MAY019F', '0229', '28927.68', 'CANCELACION DE FACT. No. 00007397 PASAJE AEREO TEGUCIGALPA-CARTAGENA-TEGUCIGALPA TTE. NAVIO FERMIN ABRAHAM MORENO C. SEGUN ACUERDO J.E.M.C. No. 0379-2019.', 1),
(17, 123, 5, '2019-05-30', 'Transf/Terceros', '30MAY019F', '0228', '46795.00', 'CANCELACION DE FACT. No. 00007280 PASAJE AEREO TEGUCIGALPA-SANTO DOMINGO-TEGUCIGALPA CAP. CBTA JORGE INES ORELLANA Y CAP. CBTA. MARCO ANTONIO CARBAJAL  SEGUN ACUERDO J.E.M.C. No. 0377-2019.', 1),
(18, 123, 5, '2019-05-30', 'Transf/Terceros', '30MAY019F', '0227', '49030.92', 'CANCELACION DE FACT. No. 00007527 PASAJE AEREO TEGUCIGALPA-TAIPEI CHINA -TAIWAN CAP. CBTA ROLANDO CANALES CHIRINOS SEGUN ACUERDO J.E.M.C. No. 0384-2019.', 1),
(19, 123, 5, '2019-05-30', 'Transf/Terceros', '30MAY019F', '0226', '14510.00', 'CANCELACION DE FACT. No. 00007357 PASAJE AEREO TEGUCIGALPA-GUATEMALA-TEGUCIGALPA  TTE. NAVIO JOSE LUIS GONZALEZ H. SEGUN ACUERDO J.E.M.C. No. 0380-2019.', 1),
(20, 123, 5, '2019-05-30', 'Transf/Terceros', '30MAY019F', '0225', '14166.78', 'CANCELACION DE FACT. No. 00007445 PASAJE AEREO CARTAGENA-TEGUCIGALPA TTE. FGTA. MARLON ALEXANDER FLORES AVILA . SEGUN ACUERDO J.E.M.C. No. 0381-2019.', 1),
(21, 123, 5, '2019-05-30', 'Transf/Terceros', '30MAY019F', '0224', '3138.00', 'CANCELACION DE FACT. No. 00007445 PASAJE AEREO CARTAGENA-TEGUCIGALPA TTE. FGTA. MARLON ALEXANDER FLORES AVILA . SEGUN ACUERDO J.E.M.C. No. 0381-2019.', 1),
(22, 123, 5, '2019-05-30', 'Transf/Terceros', '30MAY019F', '0223', '9705.96', 'CANCELACION DE FACT. No. 00007488 PASAJE TERRESTRE S.P.S.-GUATEMALA-S.P.S.  TTE. NAVIO EDDY HERCULANO Y TTE. NAVIO FERNANDO LUIS BARAHONA SEGUN ACUERDO J.E.M.C. No. 0383-2019.', 1),
(23, 123, 5, '2019-05-30', 'Transf/Terceros', '30MAY019F', '0222', '24491.64', 'CANCELACION DE FACT. No. 00007606 PASAJE AEREO TEGUCIGALPA-GUATEMALA-TEGUCIGALPA CAP. FGTA. ALEXANDER CARBAJAL B. Y CAP. CBTA. OSCAR RIVERA U. PARTICIPACION EN XX ACTIVIDAD ESPECIALIZADA. ACUERDO J.E.M.C. No. 0385-2019', 1),
(24, 123, 5, '2019-05-30', 'Transf/Terceros', '30MAY019F', '0221', '17170.80', 'CANCELACION DE FACT. No. 00007642 PASAJE AEREO MEXICO-TEGUCIGALPA ALFEREZ DE FRAGATA CESAR ARMANDO MEJIA C. CURSO DE ESPECIALIZACION EN RADIOLOGIA EN CIUDAD MEXICO DE LOS ESTADOS UNIDOS MEXICANOS. ACUERDO J.E.M.C. No. 0386-2019', 1),
(29, 189, 5, '2019-05-30', 'Transf/Terceros', '30MAY019F', '0217', '6221.78', 'CORRESPONDIENTE AL PAGO 20 % DE GASTOS DE VIAJE A FAVOR DE L CAPITAN DE FRAGATA AUSTACIL HAGARIN TOME F. QUIEN PARTICIPO EN CONFERENCIA DE PLANEAMIENTO EJERCICIOS UNITAS LX EN VALPARAISO, REPUBLICA DE CHILE.', 1),
(30, 142, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0053', '302600.00', 'CANCELACION DE FACT # 00019230 COMBUSTIBLE UTILIZADO EN PATRULLAJE MARITIMOS Y MISIONES OPERATIVAS  DE LA L.C.U PUNTA CAXINAS  FNH -1491.', 1),
(31, 142, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0054', '474300.00', 'CANCELACION DE FACT # 00019213 COMBUSTIBLE UTILIZADO EN PATRULLAJE MARITIMOS Y MISIONES OPERATIVAS DIFERENTES UNIDADES NAVALES DE LA  FNH.', 1),
(32, 195, 5, '2019-05-30', 'Transf/Terceros', '30MAY019F', '0216', '19088.76', 'CORRESPONDIENTE AL PAGO 20 % DE GASTOS DE VIAJE A FAVOR DE CONTRALMIRANTE EFRAIN MANN H. ACOMPAÑADO DE DOS OFICIALES SUPERIORES A LA CIUDAD DE LIMA, PERU.', 1),
(33, 142, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0055', '179540.00', 'CANCELACION DE FACT # 00019214 COMBUSTIBLE UTILIZADO EN PATRULLAJE MARITIMOS Y MISIONES OPERATIVAS DIFERENTES UNIDADES NAVALES DE LA  FNH.', 1),
(34, 142, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0056', '603520.00', 'CANCELACION DE FACT # 00019215 COMBUSTIBLE UTILIZADO EN PATRULLAJE MARITIMOS Y MISIONES OPERATIVAS DIFERENTES UNIDADES NAVALES DE LA  FNH.', 1),
(35, 124, 5, '2019-05-30', 'Transf/Terceros', '30MAY019F', '0218', '21607.66', 'VALOR UTILIZADO PARA SUFRAGAR GASTOS ADMON. CELEBRACION DIA DE LA MUJER ACUERDO J.E.M.C. No. 0158-2019  .', 1),
(37, 124, 5, '2019-05-30', 'Transf/Terceros', '30MAY019F', '0219', '25715.00', 'VALOR UTILIZADO PARA SUFRAGAR GASTOS ADMON. EN EL CCLXXII ANIVERSARIO DE NUESTRA SEÑORA VIRGEN DE SUYAPA SEGUN DIRECTIVA EMC (C-5) No. 001-2019 Y ACUERDO J.E.M.C. No. 0157-2019.', 1),
(38, 31, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0058', '226850.00', 'CANCELACION DE FACT # 000179523, 000179525, 000179527  COMBUSTIBLE UTILIZADO EN PATRULLAJE MARITIMOS Y MISIONES OPERATIVAS DIFERENTES UNIDADES NAVALES DE LA  FNH.', 1),
(39, 31, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0057', '175996.00', 'CANCELACION DE FACT # 000179522, 000179524, 000179526  COMBUSTIBLE UTILIZADO EN PATRULLAJE MARITIMOS Y MISIONES OPERATIVAS DIFERENTES UNIDADES NAVALES DE LA  FNH.', 1),
(40, 190, 5, '2019-05-30', 'Transf/Terceros', '30MAY019F', '0215', '6637.88', 'CORRESPONDE AL PAGO 20% DE VIATICOS A FAVOR DEL CAP. NAVIO JOSE JORGE FORTIN A. QUIEN PARTICIPO EN EL VI CONGRESO INTERNACIONAL DISEÑO E INGENIERIA NVAL Y VII FERIA COLOMBIAMAR 2019.', 1),
(41, 98, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0059', '359080.00', 'CANCELACION DE FACT # 00023151 COMBUSTIBLE UTILIZADO EN PATRULLAJE MARITIMOS Y MISIONES OPERATIVAS  DE LOS  APOSTADEROS NAVALES DE BANACAST.', 1),
(42, 98, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0060', '261750.00', 'CANCELACION DE FACT # 00023152 COMBUSTIBLE UTILIZADO EN PATRULLAJE MARITIMOS Y MISIONES OPERATIVAS  DE LOS  APOSTADEROS NAVALES DE BANACART.', 1),
(43, 191, 5, '2019-05-30', 'Transf/Terceros', '30MAY019F', '0214', '36081.37', 'QUIENES PARTICIPARON EN LA XX ACTIVIDAD ESPECIALIZADA Y EJERCICIOS REAL / VIRTUAL DE LA FUERZA NAVAL EN LA CIUDAD DE GUATEMALA.', 1),
(44, 142, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0052', '226950.00', 'CANCELACION DE FACT # 00019229 COMBUSTIBLE UTILIZADO EN PATRULLAJE MARITIMOS DE LA L.P. HONDURAS  FNH -1053.', 1),
(45, 192, 5, '2019-05-30', 'Transf/Terceros', '30MAY019F', '0213', '12629.87', 'CORRESPONDIENTE AL 20% DE VIATICOS A FAVOR DEL TTE. NAVIO MANUEL DE JESUS PEREZ M. QUIEN PARTICIPO EN EL IX CURSO REGIONAL CONTRA EL CRIMEN TRANSNACIONAL EN LA REPUBLICA DE EL SALVADOR.', 1),
(46, 142, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0051', '37825.00', 'CANCELACION DE FACT # 00019225 COMBUSTIBLE UTILIZADO EN PATRULLAJE MARITIMOS DE LA L.P. TEGUCIGALPA FNH -1071.', 1),
(47, 142, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0050', '75650.00', 'CANCELACION DE FACT # 00019226 COMBUSTIBLE UTILIZADO EN PATRULLAJE MARITIMOS, TERRETRES  Y MISIONES OPERATIVAS DEL 2DO BIM DE LA FNH.', 1),
(48, 193, 5, '2019-05-30', 'Transf/Terceros', '30MAY019F', '0212', '25258.71', 'CORRESPONDIENTE AL 20% DE VIATICOS A FAVOR DEL TTE. NAVIO EDDY GUSTAVO HERCULANO HERNANDEZ QUIEN PARTICIPO EN XXVIII CURSO DE OBSERVADOR MILITAR DE LAS NACIONES UNIDAS.', 1),
(49, 142, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0049', '22695.00', 'CANCELACION DE FACT # 00019225 COMBUSTIBLE UTILIZADO EN PATRULLAJE MARITIMOS, TERRETRES  Y MISIONES OPERATIVAS DEL CENTRO ADIESTRAMIENTO NAVAL DE LA FNH.', 1),
(50, 142, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0048', '90780.00', 'CANCELACION DE FACT # 00019227, 00019231 COMBUSTIBLE PARA UTILIZADO EN PATRULLAJE MARITIMOS Y MISIONES OPERATIVAS DE BANACAST Y RESERVA DEL E.M.N. DE LA FNH.', 1),
(51, 194, 5, '2019-05-30', 'Transf/Terceros', '30MAY019F', '0211', '25258.71', 'CORRESPONDIENTE AL 20% DE VIATICOS A FAVOR DELTTE. NAVIO FERNANDO LUIS BARAHONA A. QUIEN PARTICIPO EN XXV CURSO DE OFICIAL DE ESTADO MAYOR DE NACIONES UNIDAS.', 1),
(52, 142, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0045', '143300.00', 'CANCELACION DE FACT # 00019218 COMBUSTIBLE PARA PATRULLAJE MARITIMOS DEL BUQUE LOGISTICO PUNTA SAL DE LA FNH.', 1),
(53, 195, 5, '2019-05-30', 'Transf/Terceros', '30MAY019F', '0210', '9725.77', 'CORRESPONDIENTE AL 20% DE VIATICOS A FAVOR DEL CONTRALMIRANTE EFRAIN MANN HERNANDEZ QUIEN FORMO PARTE DE LA DELEGACION OFICIAL QUE VISITO EL ESTADO DE ISRAEL PARA VER LOS AVANCES DE LOS PROYECTOS DE ELBIT SYSTEMS', 1),
(54, 142, 5, '2019-06-05', 'Transf/Terceros', '20MAY019F', '0046', '42880.00', 'CANCELACION DE FACT # 00019221 COMBUSTIBLE PARA PATRULLAJE REALIZADOS POR EL  2DO. INFAMAR  DE LA FNH.', 1),
(55, 196, 5, '2019-05-30', 'Transf/Terceros', '30MAY019F', '0209', '24354.03', 'CORRESPONDIENTE AL 20% DE VIATICOS A FAVOR TTE NAVIO JOSE LUIS GONZALEZ HERRERA QUIEN PARTICIPO EN CURSO ESTANDARIZADO PRE-DESPLIEGUE DE NACIONES UNIDAS EN CIUDAD DE COBAN REPUBLICA DE GUATEMALA.', 1),
(56, 124, 5, '2019-05-28', 'Transf/Terceros', '28MAY019F', '0207', '1138566.00', 'TRASLADO DE FONDOS PARA PAGO DE MODICAS PERSONAL DE CADETES DE LA A.N.H.(Marzo, Abril y Mayo) Y ESTUDIANTES A SUBOFICIALES DE LA E.S.O.N.(Febrero, Marzo, Abril y Mayo).', 1),
(57, 198, 5, '2019-05-22', 'Transf/Terceros', '22MAY019F', '0206', '9600.00', 'CANCELACION DE FACT. No 000464 ARTICULOS Y MATERIALES PARA LA L.P. CHAMELECON FNH-8501.', 1),
(58, 198, 5, '2019-05-22', 'Transf/Terceros', '22MAY019F', '0205', '0.00', 'CANCELACION DE FACT. No 000464 ARTICULOS PARA USO DEL BUQUE LOGISTICO AMY DE LA F.N.H..', 1),
(59, 198, 5, '2019-05-22', '', '22MAY019F', '0205', '0.00', '', 1),
(60, 104, 5, '2019-05-22', 'Transf/Terceros', '22MAY019F', '0204', '0.00', 'CANCELACION DE FACTURAS No. 00000264, ARTICULOS PARA SER UTILIZADOS EN LA BARBERIA DEL E.M.N.', 1),
(61, 153, 5, '2019-05-22', 'Transf/Terceros', '22MAY019F', '0203', '8060.00', 'CANCELACION DE FACTURAS No. 001146, 001147, 001145 Y 001148 REPUESTOS Y ACCESORIOS PARA MANTENIMIENTO Y REPARACION DE FOTOCOPIADORA E IMPRESORA DE LA COMANDANCIA GENERAL Y OFICINAS ESTADO MAYOR NAVAL', 1),
(62, 71, 5, '2019-05-22', 'Transf/Terceros', '22MAY019F', '0202', '0.00', 'CANCELACION DE FACTURA No. 006260, TUBERIAS Y MATERIALES ELECTRICOS PARA MANTENIMIENTO Y REPARACION DE INSTALACIONES DE BANAMAP', 1),
(63, 104, 5, '2019-05-22', 'Transf/Terceros', '22MAY019F', '0201', '143133.00', 'CANCELACION DE FACTURA No. 00000265, ARTICULOS PARA EL MUELLE DE LA BANACAR', 1),
(64, 104, 5, '2019-05-22', 'Transf/Terceros', '22MAY019F', '0200', '129284.00', 'CANCELACION DE FACTURA No. 00000266, ARTICULOS PARA EL MUELLE DE LA BANACAST', 1),
(65, 82, 5, '2019-05-22', 'Transf/Terceros', '22MAY019F', '0199', '4956.32', 'REEMBOLSO DE FONDO REINTEGRABLE # 2 CORRESPONDIENTE AL MES DE ABRIL DE 2019', 1),
(66, 131, 5, '2019-05-22', 'Transf/Terceros', '22MAY019F', '0198', '5231.66', 'REEMBOLSO DE FONDO ROTATORIO #4 CORRESPONDIENTE AL MES DE ABRIL DE 2019', 1),
(68, 83, 5, '2019-05-22', 'Transf/Terceros', '22MAY019F', '0197', '3175.37', 'REEMBOLSO DE FONDO REINTEGRABLE # 2 CORRESPONDIENTE AL MES DE ABRIL DE 2019', 1),
(70, 77, 5, '2019-05-22', 'Transf/Terceros', '22MAY019F', '0196', '0.00', 'REEMBOLSO DE FONDO REINTEGRABLE # 2 CORRESPONDIENTE AL MES DE ABRIL DE 2019', 1),
(72, 84, 5, '2019-05-22', 'Transf/Terceros', '22MAY019F', '0195', '4626.96', 'REEMBOLSO DE FONDO REINTEGRABLE CORRESPONDIENTE AL MES DE MARZO DE 2019', 1),
(73, 148, 5, '2019-05-22', 'Transf/Terceros', '22MAY019F', '0194', '17000.00', 'CANCELACION DE LA FACT. No. 00000849, PARA USO DEL PERSONAL DEL 2DO. B.I.M.', 1),
(74, 98, 5, '2019-05-22', 'Transf/Terceros', '22MAY019F', '0193', '165692.88', 'CANCELACION DE LA FACT. No. 00023847, ACEITE Y LUBRICANTES PARA MANTENIMIENTO DE LOS VEHICULOS ASIGNADOS A LA F.N.H.', 1),
(75, 135, 5, '2019-05-22', 'Transf/Terceros', '22MAY019F', '0192', '14994.00', 'CANCELACION DE LAS FACT. No. 00003340, LLANTAS PARA CAMION RHFN-5644 ASIGNADO A LA A.N.H.', 1),
(76, 19, 5, '2019-05-22', 'Transf/Terceros', '22MAY019F', '0191', '1848.78', 'CANCELACION DE LAS FACT. No. 00005213 Y 00005205, REPUESTOS PARA VEHICULOS TOYOTA RHFN-5647 ASIGNADO A LA A.N.H.', 1),
(77, 19, 5, '2019-05-22', 'Transf/Terceros', '22MAY019F', '0190', '2518.30', 'CANCELACION DE LAS FACT. No. 00005216 Y 00005215, REPUESTOS PARA VEHICULOS CAMION RHFN-5644 Y BUS RHFN-5653 ASIGNADO A LA A.N.H.', 1),
(78, 19, 5, '2019-05-22', 'Transf/Terceros', '22MAY019F', '0189', '3913.04', 'CANCELACION DE FACT. No. 00005202, REPUESTOS PARA VEHICULO CAMION RHFN-5649 ASIGNADO A LA A.N.H.', 1),
(79, 48, 5, '2019-05-22', 'Transf/Terceros', '22MAY019F', '0188', '14940.00', 'CANCELACION DE FACT. No. 00001482, PARA SER UTILIZADOS EN EL SOLLADO DE INFANTERIA DE BANACAST', 1),
(80, 104, 5, '2019-05-22', 'Transf/Terceros', '22MAY019F', '0187', '40675.00', 'CANCELACION DE FACT. No. 00000263, ARTICULOS PARA CEREMONIA Y PROTOCOLO DE VISITAS A LA COMANDANCIA GENERAL DE LA F.N.H.', 1),
(81, 61, 5, '2019-05-22', 'Transf/Terceros', '22MAY019F', '0185', '5400.00', 'FONDOS PARA PAGO ALIMENTACION MES DE MARZO 2019 DEL PERSONAL DE MARINERIA QUE REALIZA ESTUDIOS DE LICENCIATURA EN ENFERMERIA EN LA U.D.H.', 1),
(82, 24, 5, '2019-05-22', 'Transf/Terceros', '22MAY019F', '0184', '5265.00', 'FONDOS PARA PAGO ALIMENTACION MES DE MARZO 2019 DEL PERSONAL DE MARINERIA QUE REALIZA ESTUDIOS EN CEDACE.', 1),
(83, 170, 5, '2019-05-22', 'Transf/Terceros', '22MAY019F', '0182', '71550.00', 'FONDOS PARA PAGO ALIMENTACION MES DE MARZO 2019 DEL PERSONAL ASIGNADO AL XXI BATALLON DE POLICIA MILITAR.', 1),
(85, 23, 5, '2019-05-22', 'Transf/Terceros', '22MAY019F', '0181', '31320.00', 'FONDOS PARA PAGO ALIMENTACION MES DE MARZO 2019 DEL PERSONAL QUE ESTA EN ADIESTRAMIENTO EN EL C.A.M.E.', 1),
(86, 62, 5, '2019-05-22', 'Transf/Terceros', '22MAY019F', '0180', '175365.00', 'FONDOS PARA PAGO ALIMENTACION MES DE MARZO 2019 DEL PERSONAL DE ESTUDIANTES SUBOFICIALES Y MARINERIA DE LA ESON', 1),
(87, 69, 5, '2019-05-22', 'Transf/Terceros', '22MAY019F', '0179', '330750.00', 'FONDOS PARA PAGO ALIMENTACION MES DE MARZO 2019 DEL PERSONAL DE MARINERIA DEL 1ER BATALON F.E.N..', 1),
(88, 74, 5, '2019-06-06', 'Transf/Terceros', '22MAY019F', '0178', '221400.00', 'FONDOS PARA PAGO ALIMENTACION MES DE MARZO 2019 DEL PERSONAL DE MARINERIA DE BANACAR.', 1),
(89, 73, 5, '2019-06-06', 'Transf/Terceros', '22MAY019F', '0177', '255420.00', 'FONDOS PARA PAGO ALIMENTACION MES DE MARZO 2019 DEL PERSONAL DE MARINERIA DE BANAGUA.', 1),
(90, 84, 5, '2019-06-06', 'Transf/Terceros', '22MAY019F', '0176', '18500.00', 'FONDOS PARA PAGO ALIMENTACION MES DE MARZO 2019 DEL PERSONAL DE MARINERIA DE LA ESNA.', 1),
(91, 68, 5, '2019-05-22', 'Transf/Terceros', '22MAY019F', '0175', '183735.00', 'FONDOS PARA PAGO ALIMENTACION MES DE MARZO 2019 DEL PERSONAL DE MARINERIA DEL 2DO. BIM.', 1),
(92, 131, 5, '2019-05-22', 'Transf/Terceros', '22MAY019F', '0174', '329615.00', 'FONDOS PARA PAGO ALIMENTACION MES DE MARZO 2019 DEL PERSONAL DE MARINERIA DEL 1ER BIM.', 1),
(93, 14, 5, '2019-05-22', 'Transf/Terceros', '22MAY019F', '0173', '334150.00', 'FONDOS PARA PAGO ALIMENTACION MES DE MARZO 2019 DEL PERSONAL DE MARINERIA DE LA BANACAST.', 1),
(94, 83, 5, '2019-05-22', 'Transf/Terceros', '22MAY019F', '0172', '305060.00', 'FONDOS PARA PAGO ALIMENTACION MES DE MARZO 2019 DEL PERSONAL DE MARINERIA DE LA BANAMAP.', 1),
(95, 15, 5, '2019-05-22', 'Transf/Terceros', '22MAY019F', '0171', '349760.00', 'FONDOS PARA PAGO ALIMENTACION MES DE MARZO 2019 DEL PERSONAL DE MARINERIA DE LA BANACORT.', 1),
(96, 77, 5, '2019-05-22', 'Transf/Terceros', '22MAY019F', '0170', '367245.00', 'FONDOS PARA PAGO ALIMENTACION MES DE MARZO 2019 DEL PERSONAL DE CADETES Y MARINERIA DE LA ACADEMIA NAVAL DE HONDURAS.', 1),
(97, 75, 5, '2019-05-22', 'Transf/Terceros', '22MAY019F', '0169', '283770.00', 'FONDOS PARA PAGO ALIMENTACION MES DE MARZO 2019 DEL PERSONAL DE MARINERIA DEL CUARTEL GENERAL NAVAL.', 1),
(99, 31, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0168', '172592.00', 'CANCELACION DE FACT. No 00179539, 00179537, 00179535 COMBUSTIBLE PARA PATRULLAJE MARITIMOS Y MISIONES OPERATIVAS DEL 1ER BIM, ACADEMIA NAVAL Y BANAGUA.', 1),
(100, 31, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0167', '221910.00', 'CANCELACION DE FACT. No 00179536, 00179538, 00179540 COMBUSTIBLE PARA PATRULLAJE MARITIMOS Y MISIONES OPERATIVAS DEL 1ER BIM, ACADEMIA NAVAL Y BANAGUA.', 1),
(101, 142, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0166', '257160.00', 'CANCELACION DE FACT. No 00019247 COMBUSTIBLE PARA PATRULLAJE MARITIMOS Y MISIONES OPERATIVAS DE LOS APOSTADEROS NAVALES DE BANACART.', 1),
(102, 142, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0165', '383300.00', 'CANCELACION DE FACT. No 00019246 COMBUSTIBLE PARA PATRULLAJE MARITIMOS Y MISIONES OPERATIVAS DE B.L. BAL-C GRACIAS A DIOS FNH-1611.', 1),
(103, 142, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0164', '594880.00', 'CANCELACION DE FACT. No 00019240, 00019241, 00019242 COMBUSTIBLE PARA PATRULLAJE MARITIMOS Y MISIONES OPERATIVAS DE LAS UNIDADES DE SUPERFICIE P.O.MORAZAN FNH-1402, P.O. LEMPIRA FNH-1401, B.L. PUNTA SAL.', 1),
(104, 142, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0163', '82830.00', 'CANCELACION DE FACT. No 00019245 COMBUSTIBLE PARA PATRULLAJE MARITIMOS Y MISIONES OPERATIVAS DE LA BANACORT.', 1),
(105, 142, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0162', '74360.00', 'CANCELACION DE FACT. No 00019238, 00019239 COMBUSTIBLE PARA PATRULLAJE MARITIMOS, TERRESTRES DE BASE NAVAL DE BANACORT Y CEN.', 1),
(106, 98, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0161', '271350.00', 'CANCELACION DE FACT. No 00023561 COMBUSTIBLE PARA PATRULLAJE MARITIMOS Y MISIONES OPERATIVAS DE LOS APOSTADEROS NAVALES DE BANACAST.', 1),
(107, 98, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0160', '87650.00', 'CANCELACION DE FACT. No 00023560 COMBUSTIBLE PARA PATRULLAJE MARITIMOS Y MISIONES OPERATIVAS DE BANAMAP.', 1),
(108, 98, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0159', '78470.00', 'CANCELACION DE FACT. No 00023558 COMBUSTIBLE PARA PATRULLAJE  TERRESTRE, MARITIMOS MISIONES OPERATIVAS DE BANAMAP.', 1),
(109, 98, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0158', '164493.00', 'CANCELACION DE FACT. No 00023557 COMBUSTIBLE PARA PATRULLAJE TERRESTRE Y MISIONES OPERATIVAS DE VEHICULOS DEL ESTADO MAYOR NAVAL, CUARTEL GENERAL NAVAL Y ECAMAN.', 1),
(110, 98, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0157', '87920.00', 'CANCELACION DE FACT. No 00023555 COMBUSTIBLE PARA PATRULLAJE TERRESTRE Y MISIONES OPERATIVAS DE VEHICULOS DEL ESTADO MAYOR NAVAL, CUARTEL GENERAL NAVAL Y ECAMAN.', 1),
(111, 26, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0156', '13692.31', 'CANCELACION DE FACT. No 00109278, 00109277 MATERIAL UTILIZADO PARA MANTO DE ESTACIONAMIENTO DE VEHICULO Y TRIBUNA DE LA ACADEMIA NAVAL DE HONDURAS.', 1),
(112, 26, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0155', '2575.64', 'CANCELACION DE FACT. No 00109187, 00109186 MATERIAL UTILIZADO PARA MANTO DE ESTACIONAMIENTO DE VEHICULO Y TRIBUNA DE LA ACADEMIA NAVAL DE HONDURAS.', 1),
(113, 148, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0154', '24000.00', 'CANCELACION DE FACT. No 00000810 PARA SER UTILIZADO EN PERSONAL GRADUADO EN LOS CURSOS DE BUZO Y CAIMAN DE LA FNH.', 1),
(114, 40, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0153', '2031.00', 'CANCELACION DE FACT. No 00043855 MATERIAL DE FONTANERIA PARA EL TANQUE DE AGUA DE LA ACADEMIA NAVAL DE HONDURAS', 1),
(115, 118, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0152', '17306.00', 'CANCELACION DE FACT. No 00000309 ARTICULOS Y MATERIALES PARA MANTO DE INSTALACIONES DEL PERSONAL DE GRUMETE EN EL C.A.M.E.', 1),
(116, 118, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0151', '24142.00', 'CANCELACION DE FACT. No 00000308 ARTICULOS Y MATERIALES PARA USO DE LA COMANDANCIA GENERAL Y REPARACION DE COMPUTADORAS DEL DEPTO DE AUDITORIA DEL EMN.', 1),
(117, 19, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0150', '8382.60', 'CANCELACION DE FACT. No 00005144 REPUESTOS Y ACCESORIOS PARA REPARACION DE VEHICULOS RHFN-5657 RHFN-5660, RHFN-5715 ASIGANADO AL 1ER BIM.', 1),
(118, 19, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0149', '9588.97', 'CANCELACION DE FACT. No 00005142, 00005143 REPUESTOS Y ACCESORIOS PARA MOTORES FUERA DE BORDA Y DE VEHICULOS RHFN-5660, RHFN-5715, RHFN-5658 ASIGANDO AL 1ER BIM.', 1),
(119, 126, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0148', '35163.48', 'CANCELACION DE FACT. No 00027736, 00027737 MATERIALES UTILIZADOS EN OFICINA DE COMANDANCIA Y OFICINAS DE PLANA MAYOR DE LA BANAMAP.', 1),
(120, 71, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0147', '115001.00', 'CANCELACION DE FACT. No 00006160 ARTICULOS Y MATERIALES PARA MANTO DE INSTALACIONES DE BANAMAP.', 1),
(121, 71, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0146', '14300.00', 'CANCELACION DE FACT. No 00006159 REPUESTOS Y ACCESORIOS PARA REPARACION DE LA L.P. TEGUCIGALPA FNH-1071.', 1),
(122, 71, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0145', '9424.00', 'CANCELACION DE FACT. No 00006153 MATERIALES PARA REPARACION Y MANTO DEL POZO DE AGUA DEL ESTADO MAYOR NAVAL.', 1),
(123, 118, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0143', '13033.00', 'CANCELACION DE FACT. No 00000305 ARTICULO DE MATERIALES PARA REPARACION Y MANTO DEL SOLLADO DE MARINERIA DE LA FNH EN EL CAME.', 1),
(124, 126, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0142', '8261.09', 'CANCELACION DE FACT. No 00027571 MATERIAL UTILIZADO EN LAS OFICINAS DE LA ECAMAN.', 1),
(125, 71, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0141', '21739.00', 'CANCELACION DE FACT. No 006142 MATERIALES PARA MANTENIMIENTO DE INSTALACIONES DE LA ECAMAN.', 1),
(126, 126, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0140', '9381.64', 'CANCELACION DE FACT. No 00027499 PAPELERIA PARA SER UTILIZADA EN EL CUARTEL GENERAL NAVAL.', 1),
(127, 48, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0139', '19605.00', 'CANCELACION DE FACT. No 00001465 ESCALERA DE FIBRA DE VIDRIO PARA UTILIZARSE EN LAS INSTALACIONES DEL 2DO BIM Y SOPORTE DE BOMBA PARA CAMION RHFN-5630.', 1),
(128, 126, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0138', '5203.86', 'CANCELACION DE FACT. No 00020666 MATERIAL DE OFICINA PARA EL SEGUNDO  BATALLON DE INFANTERIA MARINA.', 1),
(129, 126, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0137', '2533.64', 'CANCELACION DE FACT. No 00021278 MATERIAL DE OFICINA PARA EL PRIMER BATALLON DE FUERZAS ESPECIAL NAVAL(FEN)', 1),
(130, 126, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0136', '2152.60', 'CANCELACION DE FACT. No 00027487 MATERIAL DE OFICINA PARA LA ACADEMIA NAVAL DE HONDURAS.', 1),
(131, 3, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0135', '7020.00', 'CANCELACION DE FACT. No 00003997, 00003996 RESPUESTOS PARA VEHICULO TOYOTA RHFN-5647 Y TOYOTA RHFN- 5642 ASIGNADO ACADEMIA NAVAL DE HONDURAS.', 1),
(132, 63, 5, '2019-05-22', 'Transf/Terceros', '22MAY019F', '0183', '54045.00', 'FONDOS PARA PAGO ALIMENTACION MES DE MARZO 2019 DEL PERSONAL DE MARINERIA QUE REALIZA ESTUDIOS EN LA E.T.E.', 1),
(133, 199, 5, '2019-06-22', 'Transf/Terceros', '22MAY019F', '0186', '20250.00', 'FONDOS PARA PAGO ALIMENTACION MES DE MARZO 2019 DEL PERSONAL DE MARINERIA EN ADIESTRAMIENTO EN EL DECIMO SEXTO BTN.', 1),
(135, 200, 2, '2019-06-06', 'Transf/Terceros', '06JUN019HT', '001', '54833.37', 'REINTEGRO DE BAJAS DE PERSONAL DE JULIO A NOVIEMBRE DEL 2017', 1),
(136, 200, 2, '2019-06-06', 'Transf/Terceros', '06JUN019HT', '002', '223954.42', 'REINTEGRO DE BAJAS DICIEMBRE 2017 A MAYO 2018', 1),
(137, 200, 2, '2019-06-06', 'Transf/Terceros', '06JUN019HT', '003', '334506.48', 'REINTEGRO DÉCIMO TERCER MES PROPORCIONAL BAJAS JULIO A NOVIEMBRE 2018', 1),
(138, 3, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0133', '4004.00', 'CANCELACION DE FACT. No 00003990 RESPUESTOS PARA MOTOR 40HP SERIE 66TKS1144260 Y MOTOR 75HP SERIE GM2L1037147G MARCA YAMAHA ASIGNADO A BANACAST.', 1),
(139, 201, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0134', '6750.00', 'CANCELACION DE FACT. No 00024484 RESPUESTOS PARA VEHICULO TOYOTA RHFN-5591 ASIGNADO A BANACAST.', 1),
(140, 3, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0132', '4120.00', 'CANCELACION DE FACT. No 00003995 RESPUESTOS PARA VEHICULOS NISSAN RHFN - 5592 TOYOTA RHFN - 5591 Y BUS BLANCO RHFN - 5613 ASIGNADO A BANACAST.', 1),
(141, 48, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0131', '16180.00', 'CANCELACION DE FACT. No 00001459 MATERIALES PARA UTILIZARCE EN SOLLADO DE MARINERIA DE BANACAST.', 1),
(142, 20, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0127', '8514.56', 'CANCELACION DE FACT. No 00025777, 00025815 MATERIALES PARA BOMBAS Y MANGUERA HIDRAULICAS DE LA L.P. HONDURAS FNH-1071 .', 1),
(143, 20, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0126', '31812.00', 'CANCELACION DE FACT. No 00001454 ARTICULO Y MATERIALES PARA EL PRIMER BATALLON DE FUERZA ESPECIAL NAVAL.', 1),
(144, 48, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0125', '14200.00', 'CANCELACION DE FACT. No 00001455 PRUEBAS TOXICOLOGICAS PARA EL PERSONAL DEL PRIMER BATALLON DE FUERZA ESPECIAL NAVAL.', 1),
(145, 3, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0124', '15815.00', 'CANCELACION DE FACT. No 00004009, 00004017, 00004019, 00004025 REPUESTOS Y ACCESORIOS PARA REPACION DE DIFERENTES VEHICULOS DE LA FNH (RHFN-5508, RHFN-5515, RHFN- 5512)', 1),
(146, 3, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0123', '16023.00', 'CANCELACION DE FACT. No 00004011, 00004015 REPUESTOS Y ACCESORIOS PARA REPACION DE DIFERENTES VEHICULOS DE LA FNH (RHFN-5507, RHFN-5526)', 1),
(147, 3, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0122', '7880.00', 'CANCELACION DE FACT. No 00004016, 00004018, 00004022, 00004027,00004028 REPUESTOS Y ACCESORIOS PARA REPACION DE DIFERENTES VEHICULOS DE LA FNH (RHFN-5520, RHFN-5522)', 1),
(148, 3, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0121', '5610.00', 'CANCELACION DE FACT. No 00004020, 00004021, 00004023, 00004026 REPUESTOS Y ACCESORIOS PARA REPACION DE DIFERENTES VEHICULOS DE LA FNH (RHFN-5501, RHFN-5505, RHFN-5504)', 1),
(149, 3, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0120', '9300.00', 'CANCELACION DE FACT. No 00004024 REPUESTOS Y ACCESORIOS PARA REPACION L.C.U PUNTA CAXINAS FNH-1491.', 1),
(150, 3, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0119', '16170.00', 'CANCELACION DE FACT. No 00004014 REPUESTOS PARA REPACION L.P. CHOLUTECA FNH-6505 DE LA FNH.', 1),
(151, 3, 5, '2019-05-20', 'Transf/Terceros', '20MAY019F', '0118', '44101.00', 'CANCELACION DE FACT. No 00004012, 00004013  REPUESTOS PARA REPACION Y MANTENIMIENTO DEL VEHICULO FORD RANGER RHFN-5503 AUDITORIA JURIDICA FNH.', 1);

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
  `condicion` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `tipo_documento`, `num_documento`, `direccion`, `telefono`, `email`, `cargo`, `login`, `clave`, `imagen`, `condicion`) VALUES
(1, 'Hector Mercadal', 'ID', '1503198501083', '1555 nw 82nd ave', '31860490', 'hmercadal1@gmail.com', 'Asistente de Pagaduria', 'hmercadal1', '5dde6efd05cdcaa68502b02ea4a8b0dec6d88b8d639b81ff65a320a124dab9b1', '1547963176.jpg', 1),
(4, 'Alejandra Maria Herrera Velasquez', 'ID', '0801198610471', '', '99961965', 'amhv73@outlook.es', 'Administrador Contable', 'Alejandra1986', 'a15d52e6de469e5937f970601c270426f33d7dd3191df39679f9026c1a07d0da', '', 1),
(5, 'Diego Martinez', 'ID', '0801198503278', 'las casitas', '22346288', 'diego85mando@gmail.com', 'Contador I', 'Diego3278', '6d499a08c29964750eb7cb5da510e9fea2ed3e8c4357511d9230b3658ce25c00', '', 1),
(6, 'Magaly Garcia', 'ID', '0502199501984', 'Choloma', '98166743', 'magalygarcia971@gmail.com', 'Asistente de Pagaduria', 'Magaly01984', '79717ff6c3e5ec4fb700f95fdcb2afd602891ce73b71efb7368270c5d17759ff', '', 1),
(7, 'Ernesto Antonio Avila Kattan', 'ID', '0501196406714', 'Col. la Gran Villa Baracoa Cortes', '98630157', 'avilak64@hotmail.com', 'Pagador General FNH', 'avila6714', '5b4558e2354766a29d9fade7060e72aa9d3e966b11adfabf9abee5f80ca59a2f', '', 1),
(8, 'Emis Yonahel Martinez Duarte', 'ID', '0710199700056', 'Tegucigalpa', '88034955', 'duarte16@gmail.com', 'Ayudante', 'Duarte00056', 'cc342045c8507c2e71497de96ed88fe1a0fdd90787041a51c60ff7751aa61f9a', '', 1),
(9, 'Yeny Carolina Lopez Puerto', 'ID', '0801198121374', 'Fuerza Naval', '22346288', 'jenlo_04@outlook.com', 'Analista de Presupuesto', 'jenlo1374', '338e175d75090402bbe2fdb5353156456a4ab5eb0f495e6a9077569e20b95333', '', 1);

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
(62, 1, 10),
(63, 5, 1),
(64, 5, 2),
(65, 5, 3),
(68, 8, 1),
(69, 8, 2),
(70, 8, 4),
(71, 9, 1),
(72, 9, 2),
(73, 9, 5),
(74, 9, 6);

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
  MODIFY `idadministrar_ordenes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `bancos`
--
ALTER TABLE `bancos`
  MODIFY `idbancos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT de la tabla `compromisos`
--
ALTER TABLE `compromisos`
  MODIFY `idcompromisos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `idconfiguracion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `contabilidad`
--
ALTER TABLE `contabilidad`
  MODIFY `idcontabilidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `crear_acuerdo`
--
ALTER TABLE `crear_acuerdo`
  MODIFY `idcrear_acuerdo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_compromisos`
--
ALTER TABLE `detalle_compromisos`
  MODIFY `iddetalle_compromisos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  MODIFY `iddetalle_orden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

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
  MODIFY `idfactura_orden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

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
  MODIFY `idpresupuesto_disponible` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `idproveedores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT de la tabla `retenciones`
--
ALTER TABLE `retenciones`
  MODIFY `idretenciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `transferenciabch`
--
ALTER TABLE `transferenciabch`
  MODIFY `idtransferenciabch` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT de la tabla `transferidoctaspg`
--
ALTER TABLE `transferidoctaspg`
  MODIFY `idtransferidoctaspg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  MODIFY `idusuario_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

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
-- Filtros para la tabla `crear_acuerdo`
--
ALTER TABLE `crear_acuerdo`
  ADD CONSTRAINT `fk_crear_acuerdo_programa` FOREIGN KEY (`idprograma`) REFERENCES `programa` (`idprograma`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_crear_acuerdo_proveedores` FOREIGN KEY (`idproveedores`) REFERENCES `proveedores` (`idproveedores`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_crear_acuerdo_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_compromisos`
--
ALTER TABLE `detalle_compromisos`
  ADD CONSTRAINT `fk_dc_idcompromisos` FOREIGN KEY (`idcompromisos`) REFERENCES `compromisos` (`idcompromisos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dc_idpresupuesto_disponible` FOREIGN KEY (`idpresupuesto_disponible`) REFERENCES `presupuesto_disponible` (`idpresupuesto_disponible`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  ADD CONSTRAINT `admin_ord` FOREIGN KEY (`idadministrar_ordenes`) REFERENCES `administrar_ordenes` (`idadministrar_ordenes`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pred_disp` FOREIGN KEY (`idpresupuesto_disponible`) REFERENCES `presupuesto_disponible` (`idpresupuesto_disponible`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
