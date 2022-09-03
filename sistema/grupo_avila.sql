-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-08-2022 a las 20:25:06
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `grupo_avila`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acceso`
--

CREATE TABLE `acceso` (
  `coda` int(11) NOT NULL,
  `idop` int(11) NOT NULL DEFAULT '0',
  `fecha_i` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `fecha_s` datetime NOT NULL,
  `estado` varchar(20) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `acceso`
--

INSERT INTO `acceso` (`coda`, `idop`, `fecha_i`, `fecha_s`, `estado`) VALUES
(1466, 1, '2016-12-07 13:47:06', '0000-00-00 00:00:00', 'a'),
(1467, 1, '2016-12-07 14:28:18', '0000-00-00 00:00:00', 'a'),
(1468, 1, '2016-12-07 15:11:02', '0000-00-00 00:00:00', 'a'),
(1469, 1, '2016-12-07 15:23:46', '0000-00-00 00:00:00', 'a'),
(1470, 1, '2016-12-07 15:24:18', '0000-00-00 00:00:00', 'a'),
(1471, 1, '2016-12-07 15:31:29', '0000-00-00 00:00:00', 'a'),
(1472, 1, '2016-12-07 15:54:07', '0000-00-00 00:00:00', 'a'),
(1473, 1, '2016-12-07 15:57:33', '0000-00-00 00:00:00', 'a'),
(1474, 1, '2016-12-07 15:58:02', '0000-00-00 00:00:00', 'a'),
(1475, 1, '2016-12-07 17:49:35', '0000-00-00 00:00:00', 'a'),
(1476, 1, '2016-12-08 09:41:17', '0000-00-00 00:00:00', 'a'),
(1477, 1, '2016-12-08 09:43:21', '0000-00-00 00:00:00', 'a'),
(1478, 1, '2016-12-08 12:36:17', '0000-00-00 00:00:00', 'a'),
(1479, 1, '2016-12-08 12:37:44', '0000-00-00 00:00:00', 'a'),
(1480, 1, '2016-12-09 09:12:37', '0000-00-00 00:00:00', 'a'),
(1481, 1, '2016-12-09 11:20:29', '0000-00-00 00:00:00', 'a'),
(1482, 1, '2016-12-09 11:21:33', '0000-00-00 00:00:00', 'a'),
(1483, 1, '2016-12-09 11:22:26', '0000-00-00 00:00:00', 'a'),
(1484, 1, '2016-12-09 11:49:51', '0000-00-00 00:00:00', 'a'),
(1485, 1, '2016-12-09 13:49:52', '0000-00-00 00:00:00', 'a'),
(1486, 1, '2016-12-09 13:51:25', '0000-00-00 00:00:00', 'a'),
(1487, 1, '2016-12-12 09:20:51', '0000-00-00 00:00:00', 'a'),
(1488, 5, '2016-12-12 11:26:06', '0000-00-00 00:00:00', 'u'),
(1489, 5, '2016-12-12 11:26:49', '0000-00-00 00:00:00', 'u'),
(1490, 5, '2016-12-12 11:27:43', '0000-00-00 00:00:00', 'u'),
(1491, 5, '2016-12-12 11:29:28', '0000-00-00 00:00:00', 'u'),
(1492, 5, '2016-12-12 11:44:14', '0000-00-00 00:00:00', 'u'),
(1493, 6, '2016-12-12 16:13:01', '0000-00-00 00:00:00', 'u'),
(1494, 6, '2016-12-12 16:29:52', '0000-00-00 00:00:00', 'u'),
(1495, 1, '2016-12-12 17:21:14', '0000-00-00 00:00:00', 'a'),
(1496, 1, '2016-12-13 09:10:58', '0000-00-00 00:00:00', 'a'),
(1497, 1, '2016-12-13 09:11:37', '0000-00-00 00:00:00', 'a'),
(1498, 1, '2016-12-13 09:26:11', '0000-00-00 00:00:00', 'a'),
(1499, 1, '2016-12-13 09:28:33', '0000-00-00 00:00:00', 'a'),
(1500, 5, '2016-12-13 09:28:52', '0000-00-00 00:00:00', 'u'),
(1501, 1, '2016-12-13 09:29:49', '0000-00-00 00:00:00', 'a'),
(1502, 1, '2016-12-13 09:38:59', '0000-00-00 00:00:00', 'a'),
(1503, 5, '2016-12-13 09:46:16', '0000-00-00 00:00:00', 'u'),
(1504, 1, '2016-12-13 09:46:29', '0000-00-00 00:00:00', 'a'),
(1505, 1, '2016-12-13 10:09:18', '0000-00-00 00:00:00', 'a'),
(1506, 5, '2016-12-13 10:14:11', '0000-00-00 00:00:00', 'u'),
(1507, 5, '2016-12-13 10:18:03', '0000-00-00 00:00:00', 'u'),
(1508, 5, '2016-12-13 10:18:25', '0000-00-00 00:00:00', 'u'),
(1509, 5, '2016-12-13 10:26:04', '0000-00-00 00:00:00', 'u'),
(1510, 1, '2016-12-13 10:26:36', '0000-00-00 00:00:00', 'a'),
(1511, 1, '2016-12-13 10:31:32', '0000-00-00 00:00:00', 'a'),
(1512, 5, '2016-12-13 10:40:37', '0000-00-00 00:00:00', 'u'),
(1513, 1, '2016-12-13 10:42:48', '0000-00-00 00:00:00', 'a'),
(1514, 5, '2016-12-13 10:46:40', '0000-00-00 00:00:00', 'u'),
(1515, 1, '2016-12-13 11:46:07', '0000-00-00 00:00:00', 'a'),
(1516, 1, '2016-12-13 11:48:00', '0000-00-00 00:00:00', 'a'),
(1517, 5, '2016-12-13 11:52:05', '0000-00-00 00:00:00', 'u'),
(1518, 1, '2016-12-13 12:21:41', '0000-00-00 00:00:00', 'a'),
(1519, 1, '2016-12-13 13:27:13', '0000-00-00 00:00:00', 'a'),
(1520, 1, '2016-12-13 13:51:11', '0000-00-00 00:00:00', 'a'),
(1521, 5, '2016-12-13 14:01:51', '0000-00-00 00:00:00', 'u'),
(1522, 5, '2016-12-13 14:08:16', '0000-00-00 00:00:00', 'u'),
(1523, 22, '2016-12-13 14:09:10', '0000-00-00 00:00:00', 'u'),
(1524, 1, '2016-12-13 14:10:08', '0000-00-00 00:00:00', 'a'),
(1525, 1, '2016-12-13 14:21:42', '0000-00-00 00:00:00', 'a'),
(1526, 1, '2016-12-13 15:37:18', '0000-00-00 00:00:00', 'a'),
(1527, 1, '2016-12-13 16:45:55', '0000-00-00 00:00:00', 'a'),
(1528, 1, '2016-12-13 16:49:12', '0000-00-00 00:00:00', 'a'),
(1529, 1, '2016-12-13 16:49:44', '0000-00-00 00:00:00', 'a'),
(1530, 1, '2016-12-13 17:00:40', '0000-00-00 00:00:00', 'a'),
(1531, 1, '2016-12-14 10:43:21', '0000-00-00 00:00:00', 'a'),
(1532, 1, '2016-12-14 10:43:39', '0000-00-00 00:00:00', 'a'),
(1533, 1, '2016-12-15 10:04:18', '0000-00-00 00:00:00', 'a'),
(1534, 1, '2016-12-15 10:04:57', '0000-00-00 00:00:00', 'a'),
(1535, 1, '2016-12-15 10:08:38', '0000-00-00 00:00:00', 'a'),
(1536, 1, '2016-12-15 11:21:49', '0000-00-00 00:00:00', 'a'),
(1537, 1, '2016-12-20 09:51:49', '0000-00-00 00:00:00', 'a'),
(1538, 5, '2016-12-20 09:52:09', '0000-00-00 00:00:00', 'u'),
(1539, 5, '2016-12-20 09:56:43', '0000-00-00 00:00:00', 'u'),
(1540, 1, '2016-12-20 10:22:22', '0000-00-00 00:00:00', 'a'),
(1541, 22, '2016-12-20 10:24:11', '0000-00-00 00:00:00', 'u'),
(1542, 1, '2016-12-20 10:27:48', '0000-00-00 00:00:00', 'a'),
(1543, 22, '2016-12-20 10:31:08', '0000-00-00 00:00:00', 'u'),
(1544, 1, '2016-12-20 10:44:10', '0000-00-00 00:00:00', 'a'),
(1545, 1, '2016-12-20 11:37:26', '0000-00-00 00:00:00', 'a'),
(1546, 1, '2016-12-20 16:45:10', '0000-00-00 00:00:00', 'a'),
(1547, 1, '2017-01-06 10:56:10', '0000-00-00 00:00:00', 'a'),
(1548, 1, '2017-01-10 11:14:26', '0000-00-00 00:00:00', 'a'),
(1549, 1, '2017-01-11 14:18:54', '0000-00-00 00:00:00', 'a'),
(1550, 1, '2017-01-12 17:26:05', '0000-00-00 00:00:00', 'a'),
(1551, 5, '2017-01-16 10:12:15', '0000-00-00 00:00:00', 'u'),
(1552, 1, '2017-01-16 10:12:35', '0000-00-00 00:00:00', 'a'),
(1553, 1, '2017-01-17 09:31:47', '0000-00-00 00:00:00', 'a'),
(1554, 1, '2017-01-23 15:36:38', '0000-00-00 00:00:00', 'a'),
(1555, 1, '2017-01-24 17:00:22', '0000-00-00 00:00:00', 'a'),
(1556, 1, '2017-02-09 11:08:15', '0000-00-00 00:00:00', 'a'),
(1557, 1, '2017-03-15 15:49:34', '0000-00-00 00:00:00', 'a'),
(1558, 1, '2017-03-15 16:00:56', '0000-00-00 00:00:00', 'a'),
(1559, 5, '2017-03-15 17:20:02', '0000-00-00 00:00:00', 'u'),
(1560, 1, '2017-08-09 16:09:44', '0000-00-00 00:00:00', 'a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedidos`
--

CREATE TABLE `detalle_pedidos` (
  `id_detalle_pedido` int(11) NOT NULL COMMENT 'identificador unico del detalle del pedido',
  `id_pedido` int(11) NOT NULL COMMENT 'identificador del pedido al cual pertenece el detalle',
  `id_producto` int(11) NOT NULL COMMENT 'identificador del producto incluido en el detalle del pedido',
  `item` varchar(50) NOT NULL,
  `precio` double NOT NULL COMMENT 'precio del producto incluido en el detalle del pedido',
  `cantidad` int(11) NOT NULL COMMENT 'cantidad de productos incluidos en el pedido',
  `subtotal` double NOT NULL COMMENT 'valor subtotal del detalle del pedido'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='tabla con informacion de los detalles de un pedido realizado por los usuarios';

--
-- Volcado de datos para la tabla `detalle_pedidos`
--

INSERT INTO `detalle_pedidos` (`id_detalle_pedido`, `id_pedido`, `id_producto`, `item`, `precio`, `cantidad`, `subtotal`) VALUES
(2, 1, 6, 'Producto Nuevo', 10, 1, 10),
(3, 2, 5, 'Nuevo Producto 4A', 28, 1, 28),
(4, 2, 6, 'Producto Nuevo', 10, 2, 20),
(5, 2, 2, 'Nuevo producto 1', 55.22, 1, 55.22),
(6, 3, 5, 'Nuevo Producto 4A', 28, 2, 56),
(7, 3, 1, 'Producto Nuevo', 12.25, 1, 12.25),
(8, 4, 2, 'Nuevo producto 1', 55.22, 1, 55.22),
(9, 4, 1, 'Producto Nuevo', 12.25, 2, 24.5),
(10, 5, 5, 'Nuevo Producto 4A', 28, 1, 28),
(11, 5, 4, 'Nuevo Producto 3B', 87, 1, 87),
(12, 5, 3, 'Nuevo Producto 2', 45.36, 1, 45.36),
(13, 5, 2, 'Nuevo producto 1', 55.22, 1, 55.22),
(14, 5, 1, 'Producto Nuevo', 12.25, 1, 12.25),
(15, 5, 6, 'Producto Nuevo', 10, 2, 20),
(16, 6, 4, 'Nuevo Producto 3B', 87, 1, 87),
(17, 6, 3, 'Nuevo Producto 2', 45.36, 1, 45.36),
(18, 7, 1, 'Producto Nuevo', 12.25, 1, 12.25),
(19, 8, 5, 'Nuevo Producto 4A', 28, 2, 56),
(20, 8, 3, 'Nuevo Producto 2', 45.36, 2, 90.72),
(21, 8, 6, 'Producto Nuevo', 10, 1, 10),
(22, 9, 2, 'Nuevo producto 1', 55.22, 1, 55.22),
(23, 9, 3, 'Nuevo Producto 2', 45.36, 1, 45.36),
(24, 10, 5, 'Nuevo Producto 4A', 28, 1, 28),
(25, 10, 2, 'Nuevo producto 1', 55.22, 2, 110.44),
(26, 11, 1, 'Producto Nuevo', 12.25, 1, 12.25),
(27, 11, 6, 'Producto Nuevo', 10, 2, 20),
(28, 11, 5, 'Nuevo Producto 4A', 28, 2, 56),
(29, 12, 5, 'Nuevo Producto 4A', 28, 1, 28),
(30, 12, 6, 'Producto Nuevo', 10, 2, 20),
(31, 12, 3, 'Nuevo Producto 2', 45.36, 1, 45.36),
(32, 13, 4, 'Nuevo Producto 3B', 87, 1, 87),
(33, 14, 6, 'Producto Nuevo', 10, 2, 20),
(34, 14, 8, 'Camiseta Blanco Nike', 100, 1, 100),
(35, 15, 6, 'Producto Nuevo', 10, 1, 10),
(36, 15, 5, 'Nuevo Producto 4A', 28, 1, 28),
(37, 15, 3, 'Nuevo Producto 2', 45.36, 1, 45.36),
(38, 15, 4, 'Nuevo Producto 3B', 87, 1, 87),
(39, 16, 9, 'NUevo rueba1', 10, 2, 20),
(40, 16, 3, 'Nuevo Producto 2', 45.36, 2, 90.72),
(41, 17, 3, 'Nuevo Producto 2', 45.36, 1, 45.36),
(42, 17, 1, 'Producto Nuevo', 12.25, 1, 12.25),
(43, 17, 8, 'Camiseta Blanco Nike', 100, 1, 100),
(44, 17, 9, 'NUevo rueba1', 10, 1, 10),
(45, 18, 9, 'Nuevo prueba1', 10, 1, 10),
(46, 18, 4, 'Nuevo Producto 3B', 87, 1, 87),
(47, 18, 1, 'Producto Nuevo', 12.25, 1, 12.25),
(48, 19, 9, 'Nuevo prueba1', 10, 2, 20),
(49, 19, 4, 'Nuevo Producto 3B', 87, 1, 87),
(50, 19, 2, 'Nuevo producto 1', 55.22, 1, 55.22),
(51, 20, 8, 'Camiseta Blanco Nike', 100, 2, 200),
(52, 20, 5, 'Nuevo Producto 4A', 28, 1, 28),
(53, 21, 6, 'Producto Nuevo', 10, 10, 100),
(54, 22, 8, 'Camiseta Blanco Nike', 100, 1, 100),
(55, 23, 8, 'Camiseta Blanco Nike', 100, 2, 200),
(56, 24, 8, 'Camiseta Blanco Nike', 100, 1, 100),
(57, 25, 3, 'Nuevo Producto 2', 45.36, 11, 498.96),
(58, 26, 3, 'Nuevo Producto 2', 45.36, 2, 90.72),
(59, 26, 8, 'Camiseta Blanco Nike', 100, 1, 100),
(60, 26, 6, 'Producto Nuevo', 10, 1, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `Id_estado` int(11) NOT NULL,
  `nombre_estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`Id_estado`, `nombre_estado`) VALUES
(0, 'Activo'),
(1, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL COMMENT 'identificador unico de pedido',
  `id_usuario` int(11) NOT NULL COMMENT 'identificador de usuario quien realizo el pedido',
  `precio_total` double NOT NULL COMMENT 'precio total del pedido',
  `num_items` int(11) NOT NULL COMMENT 'cantidad de items incluidos en el pedido',
  `fecha_creacion` datetime NOT NULL COMMENT 'fecha de creacion del pedido'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='tabla de informacion de pedidos realizados por los usuarios clientes';

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `id_usuario`, `precio_total`, `num_items`, `fecha_creacion`) VALUES
(1, 5, 10, 1, '2016-12-12 15:30:19'),
(2, 5, 103.22, 4, '2016-12-12 15:34:20'),
(3, 5, 68.25, 3, '2016-12-12 15:36:54'),
(4, 5, 79.72, 3, '2016-12-12 15:37:47'),
(5, 5, 247.83, 7, '2016-12-12 15:38:36'),
(6, 5, 132.36, 2, '2016-12-12 16:03:16'),
(7, 5, 12.25, 1, '2016-12-12 16:03:21'),
(8, 5, 156.72, 5, '2016-12-12 16:03:44'),
(9, 6, 100.58, 2, '2016-12-12 16:13:17'),
(10, 6, 138.44, 3, '2016-12-12 16:13:39'),
(11, 6, 88.25, 5, '2016-12-12 16:31:35'),
(12, 6, 93.36, 4, '2016-12-12 17:18:27'),
(13, 6, 87, 1, '2016-12-12 17:22:23'),
(14, 5, 120, 3, '2016-12-13 10:19:15'),
(15, 5, 170.36, 4, '2016-12-13 10:48:03'),
(16, 5, 110.72, 4, '2016-12-13 11:52:58'),
(17, 22, 167.61, 4, '2016-12-13 14:09:30'),
(18, 5, 109.25, 3, '2016-12-20 09:57:20'),
(19, 5, 162.22, 4, '2016-12-20 10:19:19'),
(20, 22, 228, 3, '2016-12-20 10:24:28'),
(21, 22, 100, 10, '2016-12-20 10:44:40'),
(22, 22, 100, 1, '2016-12-20 10:52:18'),
(23, 22, 200, 2, '2016-12-20 11:02:34'),
(24, 22, 100, 1, '2016-12-20 11:09:00'),
(25, 22, 498.96, 11, '2016-12-20 11:10:30'),
(26, 22, 200.72, 4, '2016-12-20 11:11:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id_perfil` int(11) NOT NULL COMMENT 'id perfil del usuario',
  `nombre_perfil` varchar(30) NOT NULL COMMENT 'nombre peril'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla informacion perfiles del sistema';

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id_perfil`, `nombre_perfil`) VALUES
(1, 'Administrador'),
(2, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL COMMENT 'identificar unico de producto',
  `id_categoria` int(11) NOT NULL,
  `item` varchar(50) NOT NULL COMMENT 'nombre del producto',
  `descripcion` text NOT NULL COMMENT 'descripcion del producto',
  `unidades` int(11) NOT NULL COMMENT 'unidades disponibles del producto',
  `costo` double NOT NULL,
  `precio` double NOT NULL COMMENT 'precio del producto',
  `imagen` varchar(50) NOT NULL COMMENT 'imagen del producto',
  `fecha_creacion` datetime NOT NULL COMMENT 'fecha creacion del producto',
  `fecha_modificacion` datetime NOT NULL COMMENT 'fecha ultima modificacion de datos en el sistema del producto',
  `estado` int(11) NOT NULL COMMENT 'identificador estado del producto'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='table de datos de productos en el sistema';

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `id_categoria`, `item`, `descripcion`, `unidades`, `costo`, `precio`, `imagen`, `fecha_creacion`, `fecha_modificacion`, `estado`) VALUES
(1, 1, 'Producto Nuevo', 'Descripcion de producto', 50, 10, 12.25, '1484064937.png', '2016-12-09 17:04:30', '2017-01-10 11:15:37', 0),
(2, 3, 'Nuevo producto 1', 'Descripcion nuevo producto 2', 21, 50, 55.22, '1481555355.jpeg', '2016-12-09 17:08:25', '2016-12-20 11:52:15', 0),
(3, 0, 'Nuevo Producto 2', 'Descripcion nuevo producto 2', -3, 0, 45.36, '1481321511.jpeg', '2016-12-09 17:11:51', '0000-00-00 00:00:00', 1),
(4, 8, 'Nuevo Producto 3B', 'Descripcion Nuevo Producto 3', 15, 20, 87, '1481321570.jpeg', '2016-12-09 17:12:50', '2016-12-20 11:52:00', 0),
(5, 8, 'Nuevo Producto 4A', 'Descripcion nuevo producto 4A', 35, 0, 28, '1481321627.jpeg', '2016-12-09 17:13:47', '2016-12-20 13:06:47', 0),
(6, 8, 'Producto Nuevo', 'Productgo nuevo', 99, 0, 10, '1482252988.jpeg', '2016-12-12 10:10:05', '2016-12-20 11:56:28', 1),
(7, 0, 'Producto a borrar', 'proeucto a borrar', 21, 0, 20, '1481555824.jpeg', '2016-12-12 10:17:04', '0000-00-00 00:00:00', 1),
(8, 8, 'Camiseta Blanco Nike', 'Dentro de nuestra misiÃ³n y principios empresariales priman los mÃ¡s altos estandares de eficiencia y calidad en nuestras actividades, la satisfacciÃ³n de nuestros clientes tanto en el Ã¡mbito de la publicidad, como en la venta y distribuciÃ³n de materiales para rotulaciÃ³n, es nuestro objetivo primordial. \r\n\r\nNuestro Ã©xito lo apalancamos en una amplia trayectoria en el mercado nacional, somos la segunda generaciÃ³n de expertos en la ejecuciÃ³n de proyectos de rotulaciÃ³n para todo tipo de clientes, somos la empresa con mÃ¡s experiencia y nos preciamos de tener 40 aÃ±os de vigencia al servicio de la sociedad.', 27, 0, 100, '1481641926.jpeg', '2016-12-13 10:12:07', '2016-12-20 13:55:46', 0),
(9, 3, 'Nuevo prueba1', 'pruebasssss', 20, 0, 10, '1483718485.jpeg', '2016-12-13 11:50:59', '2017-01-06 11:01:25', 1),
(10, 8, 'Camara Led nocturno', 'HTML5, como la mayorÃ­a sabemos, aglutina un montÃ³n de tecnologÃ­as al desarrollo web. El incremento se nota sobre todo en el nÃºmero de APIs de JavaScript, en la incorporaciÃ³n de nuevos recursos en el CSS que nos evitan usar JavaScript para temas de diseÃ±o, y por Ãºltimo tenemos los cambios del propio lenguaje HTML, que destacan por ser pocos: nuevos nombres mÃ¡s descriptivos en las etiquetas, microdatos y los atributos personalizados, el tema que nos concierne.\r\n\r\nEstos atributos personalizados nos permiten aÃ±adir datos en el HTML sin afectar a su visualizaciÃ³n y sin salirnos del propio lenguaje HTML. Posteriormente podemos usar esta informaciÃ³n para aplicar estilos CSS (o mostrar esta informaciÃ³n con CSS) y podemos tratarla con JavaScript.\r\n\r\nCÃ³mo usarlo\r\n\r\nEn principio el uso mÃ¡s lÃ³gico que podemos darle a estos atributos personalizados consiste en generar desde una base de datos un cÃ³digo HTML con datos adicionales sin necesidad de recurrir a elementos ocultos o notaciÃ³n legible para JavaScript.\r\n\r\nEl funcionamiento es muy simple, al igual que cualquier atributo, dentro de la apertura de la etiqueta HTML aÃ±adimos un atributo que comience por data- (por ejemplo: data-cantidad, data-fecha-hora...). En el siguiente ejemplo podemos ver como complementamos la informaciÃ³n de unos personajes de Marvel con atributos personalizados.', 100, 10, 12, '1482252208.jpeg', '2016-12-20 11:43:29', '2016-12-20 14:24:53', 0),
(11, 9, 'Prueba Imagen Grande', 'Prueba Imagen Grande', 50, 100, 85, '1484580009.jpeg', '2017-01-16 10:17:12', '2017-01-16 10:20:09', 0),
(12, 9, 'Prueba ingreso imagen', 'Prueba ingreso imagen', 40, 110, 58, '1484579951.jpeg', '2017-01-16 10:19:11', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_categorias`
--

CREATE TABLE `tab_categorias` (
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tab_categorias`
--

INSERT INTO `tab_categorias` (`id_categoria`, `categoria`) VALUES
(1, 'Soporte de Cristal'),
(2, 'Electrodos Neón'),
(3, 'Controladores de movimiento Neón'),
(4, 'Tubos de Cristal'),
(5, 'Transformadores de Neón'),
(6, 'Transformadores de Led'),
(7, 'Módulos Led'),
(8, 'Controladores de movimiento Led'),
(9, 'Otros Productos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_ciudades`
--

CREATE TABLE `tab_ciudades` (
  `id_ciudad` int(11) NOT NULL,
  `id_provincia` int(11) DEFAULT NULL,
  `ciudad` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tab_ciudades`
--

INSERT INTO `tab_ciudades` (`id_ciudad`, `id_provincia`, `ciudad`) VALUES
(1, 1, 'CAMILO PONCE ENRIQUEZ'),
(2, 1, 'CHORDELEG'),
(3, 1, 'CUENCA'),
(4, 1, 'EL PAN'),
(5, 1, 'GIRON'),
(6, 1, 'GUACHAPALA'),
(7, 1, 'GUALACEO'),
(8, 1, 'NABON'),
(9, 1, 'OÑA'),
(10, 1, 'PAUTE'),
(11, 1, 'PUCARA'),
(12, 1, 'SAN FERNANDO'),
(13, 1, 'SANTA ISABEL'),
(14, 1, 'SEVILLA DE ORO'),
(15, 1, 'SIGSIG'),
(16, 2, 'CALUMA'),
(17, 2, 'CHILLANES'),
(18, 2, 'CHIMBO'),
(19, 2, 'ECHEANDIA'),
(20, 2, 'GUARANDA'),
(21, 2, 'LAS NAVES'),
(22, 2, 'SAN MIGUEL'),
(23, 3, 'AZOGUES'),
(24, 3, 'BIBLIAN'),
(25, 3, 'CAÑAR'),
(26, 3, 'DELEG'),
(27, 3, 'EL TAMBO'),
(28, 3, 'LA TRONCAL'),
(29, 3, 'SUSCAL'),
(30, 4, 'BOLIVAR'),
(31, 4, 'ESPEJO'),
(32, 4, 'MIRA'),
(33, 4, 'MONTUFAR'),
(34, 4, 'SAN PEDRO DE HUACA'),
(35, 4, 'TULCAN'),
(36, 5, 'ALAUSI'),
(37, 5, 'CHAMBO'),
(38, 5, 'CHUNCHI'),
(39, 5, 'COLTA'),
(40, 5, 'CUMANDA'),
(41, 5, 'GUAMOTE'),
(42, 5, 'GUANO'),
(43, 5, 'PALLATANGA'),
(44, 5, 'PENIPE'),
(45, 5, 'RIOBAMBA'),
(46, 6, 'LA MANA'),
(47, 6, 'LATACUNGA'),
(48, 6, 'PANGUA'),
(49, 6, 'PUJILI'),
(50, 6, 'SALCEDO'),
(51, 6, 'SAQUISILI'),
(52, 6, 'SIGCHOS'),
(53, 7, 'ARENILLAS'),
(54, 7, 'ATAHUALPA'),
(55, 7, 'BALSAS'),
(56, 7, 'CHILLA'),
(57, 7, 'EL GUABO'),
(58, 7, 'HUAQUILLAS'),
(59, 7, 'LAS LAJAS'),
(60, 7, 'MACHALA'),
(61, 7, 'MARCABELI'),
(62, 7, 'PASAJE'),
(63, 7, 'PIÑAS'),
(64, 7, 'PORTOVELO'),
(65, 7, 'SANTA ROSA'),
(66, 7, 'ZARUMA'),
(67, 8, 'ATACAMES'),
(68, 8, 'ELOY ALFARO'),
(69, 8, 'ESMERALDAS'),
(70, 8, 'LA CONCORDIA'),
(71, 8, 'MUISNE'),
(72, 8, 'QUININDE'),
(73, 8, 'RIOVERDE'),
(74, 8, 'SAN LORENZO'),
(75, 9, 'ISABELA'),
(76, 9, 'SAN CRISTOBAL'),
(77, 9, 'SANTA CRUZ'),
(78, 10, 'ALFREDO BAQUERIZO MORENO (JUJAN)'),
(79, 10, 'BALAO'),
(80, 10, 'BALZAR'),
(81, 10, 'COLIMES'),
(82, 10, 'CORONEL MARCELINO MARIDUEÑA'),
(83, 10, 'DAULE'),
(84, 10, 'DURAN'),
(85, 10, 'EL EMPALME'),
(86, 10, 'EL TRIUNFO'),
(87, 10, 'GENERAL ANTONIO ELIZALDE (BUCAY)'),
(88, 10, 'GUAYAQUIL'),
(89, 10, 'ISIDRO AYORA'),
(90, 10, 'LOMAS DE SARGENTILLO'),
(91, 10, 'MILAGRO'),
(92, 10, 'NARANJAL'),
(93, 10, 'NARANJITO'),
(94, 10, 'NOBOL'),
(95, 10, 'PALESTINA'),
(96, 10, 'PEDRO CARBO'),
(97, 10, 'PLAYAS'),
(98, 10, 'SALITRE (URBINA JADO)'),
(99, 10, 'SAMBORONDON'),
(100, 10, 'SAN JACINTO DE YAGUACHI'),
(101, 10, 'SANTA LUCIA'),
(102, 10, 'SIMON BOLIVAR'),
(103, 11, 'ANTONIO ANTE'),
(104, 11, 'COTACACHI'),
(105, 11, 'IBARRA'),
(106, 11, 'OTAVALO'),
(107, 11, 'PIMAMPIRO'),
(108, 11, 'SAN MIGUEL DE URCUQUI'),
(109, 12, 'CALVAS'),
(110, 12, 'CATAMAYO'),
(111, 12, 'CELICA'),
(112, 12, 'CHAGUARPAMBA'),
(113, 12, 'ESPINDOLA'),
(114, 12, 'GONZANAMA'),
(115, 12, 'LOJA'),
(116, 12, 'MACARA'),
(117, 12, 'OLMEDO'),
(118, 12, 'PALTAS'),
(119, 12, 'PINDAL'),
(120, 12, 'PUYANGO'),
(121, 12, 'QUILANGA'),
(122, 12, 'SARAGURO'),
(123, 12, 'SOZORANGA'),
(124, 12, 'ZAPOTILLO'),
(125, 13, 'BABA'),
(126, 13, 'BABAHOYO'),
(127, 13, 'BUENA FE'),
(128, 13, 'MOCACHE'),
(129, 13, 'MONTALVO'),
(130, 13, 'PALENQUE'),
(131, 13, 'PUEBLOVIEJO'),
(132, 13, 'QUEVEDO'),
(133, 13, 'QUINSALOMA'),
(134, 13, 'URDANETA'),
(135, 13, 'VALENCIA'),
(136, 13, 'VENTANAS'),
(137, 13, 'VINCES'),
(138, 14, '24 DE MAYO'),
(139, 14, 'BOLIVAR'),
(140, 14, 'CHONE'),
(141, 14, 'EL CARMEN'),
(142, 14, 'FLAVIO ALFARO'),
(143, 14, 'JAMA'),
(144, 14, 'JARAMIJO'),
(145, 14, 'JIPIJAPA'),
(146, 14, 'JUNIN'),
(147, 14, 'MANTA'),
(148, 14, 'MONTECRISTI'),
(149, 14, 'OLMEDO'),
(150, 14, 'PAJAN'),
(151, 14, 'PEDERNALES'),
(152, 14, 'PICHINCHA'),
(153, 14, 'PORTOVIEJO'),
(154, 14, 'PUERTO LOPEZ'),
(155, 14, 'ROCAFUERTE'),
(156, 14, 'SAN VICENTE'),
(157, 14, 'SANTA ANA'),
(158, 14, 'SUCRE'),
(159, 14, 'TOSAGUA'),
(160, 15, 'GUALAQUIZA'),
(161, 15, 'HUAMBOYA'),
(162, 15, 'LIMON INDANZA'),
(163, 15, 'LOGROÑO'),
(164, 15, 'MORONA'),
(165, 15, 'PABLO SEXTO'),
(166, 15, 'PALORA'),
(167, 15, 'SAN JUAN BOSCO'),
(168, 15, 'SANTIAGO'),
(169, 15, 'SUCUA'),
(170, 15, 'TAISHA'),
(171, 15, 'TIWINTZA'),
(172, 16, 'ARCHIDONA'),
(173, 16, 'CARLOS JULIO AROSEMENA TOLA'),
(174, 16, 'EL CHACO'),
(175, 16, 'QUIJOS'),
(176, 16, 'TENA'),
(177, 17, 'AGUARICO'),
(178, 17, 'LA JOYA DE LOS SACHAS'),
(179, 17, 'LORETO'),
(180, 17, 'ORELLANA'),
(181, 18, 'ARAJUNO'),
(182, 18, 'MERA'),
(183, 18, 'PASTAZA'),
(184, 18, 'SANTA CLARA'),
(185, 19, 'CAYAMBE'),
(186, 19, 'MEJIA'),
(187, 19, 'PEDRO MONCAYO'),
(188, 19, 'PEDRO VICENTE MALDONADO'),
(189, 19, 'PUERTO QUITO'),
(190, 19, 'QUITO'),
(191, 19, 'RUMIÑAHUI'),
(192, 19, 'SAN MIGUEL DE LOS BANCOS'),
(193, 20, 'LA LIBERTAD'),
(194, 20, 'SALINAS'),
(195, 20, 'SANTA ELENA'),
(196, 21, 'SANTO DOMINGO'),
(197, 22, 'CASCALES'),
(198, 22, 'CUYABENO'),
(199, 22, 'GONZALO PIZARRO'),
(200, 22, 'LAGO AGRIO'),
(201, 22, 'PUTUMAYO'),
(202, 22, 'SHUSHUFINDI'),
(203, 22, 'SUCUMBIOS'),
(204, 23, 'AMBATO'),
(205, 23, 'BAÑOS DE AGUA SANTA'),
(206, 23, 'CEVALLOS'),
(207, 23, 'MOCHA'),
(208, 23, 'PATATE'),
(209, 23, 'QUERO'),
(210, 23, 'SAN PEDRO DE PELILEO'),
(211, 23, 'SANTIAGO DE PILLARO'),
(212, 23, 'TISALEO'),
(213, 24, 'CENTINELA DEL CONDOR'),
(214, 24, 'CHINCHIPE'),
(215, 24, 'EL PANGUI'),
(216, 24, 'NANGARITZA'),
(217, 24, 'PALANDA'),
(218, 24, 'PAQUISHA'),
(219, 24, 'YACUAMBI'),
(220, 24, 'YANTZAZA'),
(221, 24, 'ZAMORA'),
(222, 25, 'SAN JUAN DE PASTO'),
(224, 25, 'IPIALES'),
(225, 26, 'NEIVA'),
(229, 35, 'PALMIRA VALLE'),
(230, 36, 'BOGOTÁ'),
(231, 19, 'STO DGO DE LOS CLDS'),
(232, 19, 'STO DGO DE LOS CLDS'),
(233, 19, 'CAYAMBE JUAN MONTALVO'),
(234, 19, 'GONZALES SUAREZ'),
(235, 19, 'GONZALEZ SUAREZ'),
(236, 8, 'SAN FRANCISCO'),
(237, 8, 'SAN FRANCISCO'),
(238, 35, 'VALLE'),
(239, 37, 'TARMA'),
(240, 25, 'CORDOBA'),
(241, NULL, 'TABACUNDO'),
(242, 4, 'CARPUELA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_paises`
--

CREATE TABLE `tab_paises` (
  `id_pais` int(11) NOT NULL,
  `pais` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tab_paises`
--

INSERT INTO `tab_paises` (`id_pais`, `pais`) VALUES
(1, 'ECUADOR'),
(2, 'ESPAÑA'),
(3, 'COLOMBIA'),
(4, 'CANADA'),
(5, 'PERU'),
(6, 'ESTADOS UNIDOS'),
(7, 'ITALIA'),
(8, 'VENEZUELA'),
(9, 'EUROPA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_provincias`
--

CREATE TABLE `tab_provincias` (
  `id_provincia` int(11) NOT NULL,
  `id_pais` int(11) DEFAULT NULL,
  `provincia` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tab_provincias`
--

INSERT INTO `tab_provincias` (`id_provincia`, `id_pais`, `provincia`) VALUES
(1, 1, 'AZUAY'),
(2, 1, 'BOLIVAR'),
(3, 1, 'CAÑAR'),
(4, 1, 'CARCHI'),
(5, 1, 'CHIMBORAZO'),
(6, 1, 'COTOPAXI'),
(7, 1, 'EL ORO'),
(8, 1, 'ESMERALDAS'),
(9, 1, 'GALAPAGOS'),
(10, 1, 'GUAYAS'),
(11, 1, 'IMBABURA'),
(12, 1, 'LOJA'),
(13, 1, 'LOS RIOS'),
(14, 1, 'MANABI'),
(15, 1, 'MORONA SANTIAGO'),
(16, 1, 'NAPO'),
(17, 1, 'ORELLANA'),
(18, 1, 'PASTAZA'),
(19, 1, 'PICHINCHA'),
(20, 1, 'SANTA ELENA'),
(21, 1, 'STO .DOMINGO DE LOS TSACHILAS'),
(22, 1, 'SUCUMBIOS'),
(23, 1, 'TUNGURAHUA'),
(24, 1, 'ZAMORA CHINCHIPE'),
(25, 3, 'NARIÑO'),
(26, 3, 'HUILA'),
(28, 2, 'VALENCIA'),
(30, 2, 'ALMERIA'),
(31, 4, 'TORONTO'),
(32, 2, 'BARCELONA'),
(33, 5, 'ZAPOTILLO'),
(34, 2, 'MADRID'),
(35, 3, 'VALLE DEL CAUCA'),
(36, 3, 'BOGOTÁ'),
(37, 5, 'JUNIN'),
(38, 3, 'CALI'),
(39, 3, 'CALI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL COMMENT 'id usuario',
  `id_perfil` int(11) NOT NULL COMMENT 'perfil de usuario',
  `nombre` varchar(50) NOT NULL COMMENT 'nombres del usuario',
  `apellido` varchar(50) NOT NULL COMMENT 'apellidos del usuario',
  `cedula` varchar(15) NOT NULL COMMENT 'numero de cedula del usuario',
  `genero` varchar(1) NOT NULL COMMENT 'genero del usuario',
  `celular` varchar(15) NOT NULL COMMENT 'numero celular del usuario',
  `telefono` varchar(20) NOT NULL COMMENT 'numero telefonico del usuario',
  `correo` varchar(50) NOT NULL COMMENT 'correo electronico del usuario',
  `id_pais` int(11) NOT NULL COMMENT 'identificador pais de residencia del usuario',
  `id_provincia` int(11) NOT NULL COMMENT 'identificador provincia residencia del usuario',
  `id_ciudad` int(11) NOT NULL COMMENT 'identificador ciudad residencia del usuario',
  `direccion` varchar(50) NOT NULL COMMENT 'nombre calle principal de residencia del usuario',
  `clave` varchar(50) NOT NULL COMMENT 'clave de acceso al sistema del usuario',
  `fecha_creacion` datetime NOT NULL COMMENT 'fecha de creacion del usuario',
  `fecha_modificacion` datetime NOT NULL COMMENT 'fecha de ultima modificacion de datos en el sistema del usuario',
  `estado` int(11) NOT NULL COMMENT 'Estado activo o inactivo del usuario dentro del sistema'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `id_perfil`, `nombre`, `apellido`, `cedula`, `genero`, `celular`, `telefono`, `correo`, `id_pais`, `id_provincia`, `id_ciudad`, `direccion`, `clave`, `fecha_creacion`, `fecha_modificacion`, `estado`) VALUES
(1, 1, 'Admin', '', '100', '', '', '', '', 0, 0, 0, '', '74a9a9960c1c45602edaeef45d212a61', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(5, 2, 'galo', 'males', '1003070446', '', '454655', '4645', 'gmales2007@gmail.com', 1, 2, 16, 'prueba', '46341be6694680f015c048e99f9bda59', '2017-03-15 17:10:57', '0000-00-00 00:00:00', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD PRIMARY KEY (`coda`);

--
-- Indices de la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  ADD PRIMARY KEY (`id_detalle_pedido`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`Id_estado`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `tab_categorias`
--
ALTER TABLE `tab_categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `tab_ciudades`
--
ALTER TABLE `tab_ciudades`
  ADD PRIMARY KEY (`id_ciudad`),
  ADD KEY `ID_PROVINCIA` (`id_provincia`);

--
-- Indices de la tabla `tab_paises`
--
ALTER TABLE `tab_paises`
  ADD PRIMARY KEY (`id_pais`);

--
-- Indices de la tabla `tab_provincias`
--
ALTER TABLE `tab_provincias`
  ADD PRIMARY KEY (`id_provincia`),
  ADD KEY `ID_PAIS` (`id_pais`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acceso`
--
ALTER TABLE `acceso`
  MODIFY `coda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1561;
--
-- AUTO_INCREMENT de la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  MODIFY `id_detalle_pedido` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador unico del detalle del pedido', AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador unico de pedido', AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id perfil del usuario', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificar unico de producto', AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `tab_categorias`
--
ALTER TABLE `tab_categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `tab_ciudades`
--
ALTER TABLE `tab_ciudades`
  MODIFY `id_ciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;
--
-- AUTO_INCREMENT de la tabla `tab_paises`
--
ALTER TABLE `tab_paises`
  MODIFY `id_pais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `tab_provincias`
--
ALTER TABLE `tab_provincias`
  MODIFY `id_provincia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id usuario', AUTO_INCREMENT=6;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tab_ciudades`
--
ALTER TABLE `tab_ciudades`
  ADD CONSTRAINT `tab_ciudades_ibfk_1` FOREIGN KEY (`id_provincia`) REFERENCES `tab_provincias` (`id_provincia`) ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tab_provincias`
--
ALTER TABLE `tab_provincias`
  ADD CONSTRAINT `tab_provincias_ibfk_1` FOREIGN KEY (`id_pais`) REFERENCES `tab_paises` (`id_pais`) ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
