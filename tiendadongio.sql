-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-05-2024 a las 07:29:30
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tiendadongio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `imagen` text NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `id_cliente`, `nombre`, `descripcion`, `cantidad`, `precio`, `imagen`, `created_at`, `updated_at`) VALUES
(1, 1, 'Balon de voleyball', 'balon de voleyball marca golty', 85, 25000, 'https://golty.com.co/wp-content/uploads/2021/06/T782373-PELOTA-VOLEIBOL-FUNDAMENTACION-GOLTY.jpg', '2024-05-18', '2024-05-19'),
(2, 1, 'Raqueta de tenis', 'raqueta de tenis wilson pro staff', 45, 350000, 'https://ss201.liverpool.com.mx/xl/1121291700.jpg', '2024-05-18', NULL),
(3, 6, 'Balon de futbol', 'balon de futbol adidas tango glider', 78, 120000, 'https://m.media-amazon.com/images/I/71Q55gKum4L._AC_UF1000,1000_QL80_.jpg', '2024-05-18', NULL),
(4, 6, 'Bicicleta de montaña', 'bicicleta de montaña trek marlin 5', 12, 2500000, 'https://bikehouse.co/cdn/shop/products/MARLIN5GRIS.jpg?v=1694448915', '2024-05-18', NULL),
(5, 6, 'Balon de baloncesto', 'balon de baloncesto spalding nba official', 55, 180000, 'https://m.media-amazon.com/images/I/9113LZOH8YL.jpg', '2024-05-18', NULL),
(6, 1, 'Raqueta de badminton', 'raqueta de badminton yonex astrox 88d', 32, 450000, 'https://www.tradeinn.com/f/13764/137646588/yonex-raqueta-badminton-astrox-88-d.jpg', '2024-05-18', NULL),
(7, 6, 'Patines en línea', 'patines en línea rollerblade macroblade 80', 22, 650000, 'https://m.media-amazon.com/images/I/71nw4bWZnBS._AC_UF1000,1000_QL80_.jpg', '2024-05-18', NULL),
(8, 1, 'Balon de rugby', 'balon de rugby gilbert replica', 18, 120000, 'https://http2.mlstatic.com/D_NQ_NP_851577-MLU75322184063_032024-O.webp', '2024-05-18', NULL),
(9, 1, 'Raqueta de squash', 'raqueta de squash dunlop biomimetic pro gt', 28, 280000, 'https://dunlopsports.com/wp-content/uploads/2023/07/Dunlop_Revelation_ProLite_Angle1-500x500.jpg', '2024-05-18', NULL),
(10, 6, 'Balon de handball', 'balon de handball mikasa hb-6600', 15, 90000, 'https://exitocol.vtexassets.com/arquivos/ids/18224162/balon-de-voleibol-mikasa-v330w-original.jpg?v=638187304153600000', '2024-05-18', NULL),
(11, 1, 'Raqueta de ping pong', 'raqueta de ping pong stiga pro carbon', 41, 180000, 'https://http2.mlstatic.com/D_NQ_NP_905682-MCO70609981643_072023-O.webp', '2024-05-18', NULL),
(12, 1, 'Balon de futbol americano', 'balon de futbol americano wilson nfl official', 9, 150000, 'https://m.media-amazon.com/images/I/91OgLBK5uIL.jpg', '2024-05-18', NULL),
(13, 6, 'Raqueta de tenis de mesa', 'raqueta de tenis de mesa donic appelgren allplay', 35, 120000, 'https://pingsunday.com/wp-content/uploads/DONIC-APPELGREN-ALLPLAY-COPPA-X3-BAT.jpg', '2024-05-18', NULL),
(14, 1, 'Balon de futbol sala', 'balon de futbol sala mikasa fsc-62', 21, 80000, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS4bv6LPS9CpaBN1bhber_u5iJiFBpVMDSkZpwwNjAc6A&s', '2024-05-18', NULL),
(15, 6, 'Raqueta de badminton', 'raqueta de badminton yonex voltric z-force ii', 27, 550000, 'https://m.media-amazon.com/images/I/71Ry+rXWqUL._AC_SL1500_.jpg', '2024-05-18', NULL),
(16, 6, 'Balon de basquetbol', 'balon de basquetbol spalding nba street', 19, 100000, 'https://m.media-amazon.com/images/I/91nX3pTUsJL._AC_UF1000,1000_QL80_.jpg', '2024-05-18', NULL),
(17, 6, 'Raqueta de squash', 'raqueta de squash dunlop hyperfibre xt revelation pro', 31, 380000, 'https://www.directsquash.co.uk/Images/Large/Dun_773301.jpg', '2024-05-18', NULL),
(18, 1, 'Balon de voleibol de playa', 'balon de voleibol de playa mikasa vls300', 14, 120000, 'https://tienda.fmvoley.com/wp-content/uploads/2021/06/mikasa-vls300-2.jpg', '2024-05-18', NULL),
(19, 1, 'Raqueta de tenis de mesa', 'raqueta de tenis de mesa donic appelgren senso v1', 38, 220000, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRjuWEKm9dmveWfV2yj92nzlODFgAKgBqZupSIpcDkSTg&s', '2024-05-18', NULL),
(20, 1, 'Balon de futbol gaélico', 'balon de futbol gaélico Neills official', 6, 90000, 'https://m.media-amazon.com/images/I/810McNHyA4L._AC_UF350,350_QL80_.jpg', '2024-05-18', NULL),
(21, 1, 'Raqueta de tenis', 'raqueta de tenis wilson pro staff rf97 autograph', 24, 550000, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT0s42gxb-kYyM5QFb1ZKNsT2XahLEhxKHnIVY9Y3VSrA&s', '2024-05-18', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `correo` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `rol` varchar(30) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `password`, `rol`, `telefono`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'admin@gmail.com', '123456', 'admin', '3178375317', '2024-05-01', NULL, NULL),
(6, 'geovanny rojas', 'geovanny43@gmail.com', '14785', 'usuario', '6016808592', '2024-05-14', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `estado_compra` varchar(20) NOT NULL,
  `cantidad` int(50) NOT NULL,
  `total` int(30) NOT NULL,
  `createdAt` date DEFAULT NULL,
  `updatedAt` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `id_cliente`, `id_producto`, `estado_compra`, `cantidad`, `total`, `createdAt`, `updatedAt`) VALUES
(2, 6, 2, 'pendiente', 45, 0, '2024-05-18', NULL),
(3, 6, 4, 'pendiente', 12, 0, '0000-00-00', NULL),
(4, 1, 6, 'pendiente', 32, 0, '0000-00-00', NULL),
(5, 1, 8, 'pendiente', 18, 0, '0000-00-00', NULL),
(6, 1, 6, 'pendiente', 32, 0, '0000-00-00', NULL),
(7, 1, 6, 'pendiente', 18, 0, '0000-00-00', NULL),
(8, 6, 2, 'pendiente', 45, 0, '0000-00-00', NULL),
(9, 6, 5, 'pendiente', 55, 0, '0000-00-00', NULL),
(10, 1, 3, 'pendiente', 78, 0, '0000-00-00', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `ventas_ibfk_3` FOREIGN KEY (`id_cliente`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
