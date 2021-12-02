-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 02-12-2021 a las 21:57:44
-- Versión del servidor: 8.0.27
-- Versión de PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `camposystem`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer`
--

CREATE TABLE `customer` (
  `id_customer` int NOT NULL,
  `id_customer_category` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(30) NOT NULL,
  `phone` int NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `customer`
--

INSERT INTO `customer` (`id_customer`, `id_customer_category`, `name`, `email`, `address`, `city`, `phone`, `status`) VALUES
(1, 1, 'Gin SA', 'ginsa@gmail.com', 'Pinto 100', 'Tandil', 12313131, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer_account`
--

CREATE TABLE `customer_account` (
  `id_customer_account` int NOT NULL,
  `id_customer` int NOT NULL,
  `id_sale_bill` int NOT NULL,
  `comment` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='total_due se calcula a traves de consulta en sale_bill con items en status 0 (impago)';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer_category`
--

CREATE TABLE `customer_category` (
  `id_customer_category` int NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `customer_category`
--

INSERT INTO `customer_category` (`id_customer_category`, `category_name`, `status`) VALUES
(1, 'Alcohol', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer_payment`
--

CREATE TABLE `customer_payment` (
  `id_customer_payment` int NOT NULL,
  `id_payment_method` int NOT NULL,
  `id_customer` int NOT NULL,
  `date` date NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `cancel` tinyint(1) NOT NULL,
  `card_number` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inbox`
--

CREATE TABLE `inbox` (
  `id_message` int NOT NULL,
  `id_sender` int NOT NULL,
  `id_recipient` int NOT NULL,
  `message` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `seen` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `memo`
--

CREATE TABLE `memo` (
  `id_memo` int NOT NULL,
  `id_user` int NOT NULL,
  `memo` varchar(500) NOT NULL,
  `done` tinyint(1) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `message`
--

CREATE TABLE `message` (
  `id_message` int NOT NULL,
  `id_user` int NOT NULL,
  `message` varchar(500) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `onsale_category_product`
--

CREATE TABLE `onsale_category_product` (
  `id_onsale_category_product` int NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `onsale_product`
--

CREATE TABLE `onsale_product` (
  `id_onsale_product` int NOT NULL,
  `sale_category_product_id` int NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `stock` int NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment_method`
--

CREATE TABLE `payment_method` (
  `id_payment_method` int NOT NULL,
  `payment_method_name` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `comment` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provider`
--

CREATE TABLE `provider` (
  `id_provider` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` int NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `comment` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `provider`
--

INSERT INTO `provider` (`id_provider`, `name`, `email`, `phone`, `address`, `city`, `comment`) VALUES
(1, 'Supermercados Monarca', 'info@supermercado.com.ar', 1231313, 'Colon 1300', 'Tandil', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provider_bill`
--

CREATE TABLE `provider_bill` (
  `id_provider_bill` int NOT NULL,
  `id_user` int NOT NULL,
  `id_provider` int NOT NULL,
  `bill_number` int NOT NULL,
  `date` date NOT NULL,
  `payment_status` tinyint(1) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provider_category_product`
--

CREATE TABLE `provider_category_product` (
  `id_category_product` int NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provider_product`
--

CREATE TABLE `provider_product` (
  `id_provider_product` int NOT NULL,
  `id_provider_category_product` int NOT NULL,
  `id_provider` int NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `stock` int NOT NULL,
  `min_stock` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sale_bill`
--

CREATE TABLE `sale_bill` (
  `id_sale_bill` int NOT NULL,
  `id_customer` int NOT NULL,
  `id_user` int NOT NULL,
  `id_onsale_product` int NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `cancel` tinyint(1) NOT NULL,
  `comment` varchar(200) DEFAULT NULL,
  `discount` float(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='ID_ONSALE_BILL no tiene que ser autoincremental, ya que para llenar la factura vamos a tener que iterar la consulta e ir agregando, si generamos un nuevo id cada vez que hacemos insert no meteríamos todos los productos en una misma factura. ';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testing_product`
--

CREATE TABLE `testing_product` (
  `id_testing_product` int NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `lote` int NOT NULL,
  `date` date NOT NULL,
  `comment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_lastname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `role` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `user_name`, `user_lastname`, `email`, `password`, `status`, `role`) VALUES
(1, 'Juan', 'Perez', 'juanseca@campos.com', 'campo', 1, 'p'),
(2, 'Carlos', 'Rodriguez', 'carlos@campos.com', 'campos', 1, 's');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`),
  ADD KEY `customer_customer_category` (`id_customer_category`);

--
-- Indices de la tabla `customer_account`
--
ALTER TABLE `customer_account`
  ADD PRIMARY KEY (`id_customer_account`),
  ADD KEY `customer_account_customer` (`id_customer`),
  ADD KEY `customer_account_sale_bill` (`id_sale_bill`);

--
-- Indices de la tabla `customer_category`
--
ALTER TABLE `customer_category`
  ADD PRIMARY KEY (`id_customer_category`);

--
-- Indices de la tabla `customer_payment`
--
ALTER TABLE `customer_payment`
  ADD PRIMARY KEY (`id_customer_payment`),
  ADD KEY `payment_customer` (`id_customer`),
  ADD KEY `payment_payment_method` (`id_payment_method`);

--
-- Indices de la tabla `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`id_message`);

--
-- Indices de la tabla `memo`
--
ALTER TABLE `memo`
  ADD PRIMARY KEY (`id_memo`),
  ADD KEY `memo_user` (`id_user`);

--
-- Indices de la tabla `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_message`),
  ADD KEY `message_user` (`id_user`);

--
-- Indices de la tabla `onsale_category_product`
--
ALTER TABLE `onsale_category_product`
  ADD PRIMARY KEY (`id_onsale_category_product`);

--
-- Indices de la tabla `onsale_product`
--
ALTER TABLE `onsale_product`
  ADD PRIMARY KEY (`id_onsale_product`),
  ADD KEY `product_sale_category_product` (`sale_category_product_id`);

--
-- Indices de la tabla `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`id_payment_method`);

--
-- Indices de la tabla `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`id_provider`);

--
-- Indices de la tabla `provider_bill`
--
ALTER TABLE `provider_bill`
  ADD PRIMARY KEY (`id_provider_bill`),
  ADD KEY `provider_bill_user` (`id_user`),
  ADD KEY `provider_bills_provider` (`id_provider`);

--
-- Indices de la tabla `provider_category_product`
--
ALTER TABLE `provider_category_product`
  ADD PRIMARY KEY (`id_category_product`);

--
-- Indices de la tabla `provider_product`
--
ALTER TABLE `provider_product`
  ADD PRIMARY KEY (`id_provider_product`),
  ADD KEY `provider_product_category_product` (`id_provider_category_product`),
  ADD KEY `provider_product_provider` (`id_provider`);

--
-- Indices de la tabla `sale_bill`
--
ALTER TABLE `sale_bill`
  ADD PRIMARY KEY (`id_sale_bill`),
  ADD KEY `sale_bill_sale_product` (`id_onsale_product`),
  ADD KEY `sale_customer` (`id_customer`),
  ADD KEY `sale_user` (`id_user`);

--
-- Indices de la tabla `testing_product`
--
ALTER TABLE `testing_product`
  ADD PRIMARY KEY (`id_testing_product`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `customer_account`
--
ALTER TABLE `customer_account`
  MODIFY `id_customer_account` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `customer_category`
--
ALTER TABLE `customer_category`
  MODIFY `id_customer_category` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `customer_payment`
--
ALTER TABLE `customer_payment`
  MODIFY `id_customer_payment` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inbox`
--
ALTER TABLE `inbox`
  MODIFY `id_message` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `memo`
--
ALTER TABLE `memo`
  MODIFY `id_memo` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `message`
--
ALTER TABLE `message`
  MODIFY `id_message` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `onsale_category_product`
--
ALTER TABLE `onsale_category_product`
  MODIFY `id_onsale_category_product` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `onsale_product`
--
ALTER TABLE `onsale_product`
  MODIFY `id_onsale_product` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id_payment_method` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `provider`
--
ALTER TABLE `provider`
  MODIFY `id_provider` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `provider_bill`
--
ALTER TABLE `provider_bill`
  MODIFY `id_provider_bill` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `provider_category_product`
--
ALTER TABLE `provider_category_product`
  MODIFY `id_category_product` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `provider_product`
--
ALTER TABLE `provider_product`
  MODIFY `id_provider_product` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sale_bill`
--
ALTER TABLE `sale_bill`
  MODIFY `id_sale_bill` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `testing_product`
--
ALTER TABLE `testing_product`
  MODIFY `id_testing_product` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_customer_category` FOREIGN KEY (`id_customer_category`) REFERENCES `customer_category` (`id_customer_category`);

--
-- Filtros para la tabla `customer_account`
--
ALTER TABLE `customer_account`
  ADD CONSTRAINT `customer_account_customer` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`),
  ADD CONSTRAINT `customer_account_sale_bill` FOREIGN KEY (`id_sale_bill`) REFERENCES `sale_bill` (`id_sale_bill`);

--
-- Filtros para la tabla `customer_payment`
--
ALTER TABLE `customer_payment`
  ADD CONSTRAINT `payment_customer` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`),
  ADD CONSTRAINT `payment_payment_method` FOREIGN KEY (`id_payment_method`) REFERENCES `payment_method` (`id_payment_method`);

--
-- Filtros para la tabla `inbox`
--
ALTER TABLE `inbox`
  ADD CONSTRAINT `inbox_message` FOREIGN KEY (`id_message`) REFERENCES `message` (`id_message`);

--
-- Filtros para la tabla `memo`
--
ALTER TABLE `memo`
  ADD CONSTRAINT `memo_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Filtros para la tabla `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Filtros para la tabla `onsale_product`
--
ALTER TABLE `onsale_product`
  ADD CONSTRAINT `product_sale_category_product` FOREIGN KEY (`sale_category_product_id`) REFERENCES `onsale_category_product` (`id_onsale_category_product`);

--
-- Filtros para la tabla `provider_bill`
--
ALTER TABLE `provider_bill`
  ADD CONSTRAINT `provider_bill_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `provider_bills_provider` FOREIGN KEY (`id_provider`) REFERENCES `provider` (`id_provider`);

--
-- Filtros para la tabla `provider_product`
--
ALTER TABLE `provider_product`
  ADD CONSTRAINT `provider_product_category_product` FOREIGN KEY (`id_provider_category_product`) REFERENCES `provider_category_product` (`id_category_product`),
  ADD CONSTRAINT `provider_product_provider` FOREIGN KEY (`id_provider`) REFERENCES `provider` (`id_provider`);

--
-- Filtros para la tabla `sale_bill`
--
ALTER TABLE `sale_bill`
  ADD CONSTRAINT `sale_bill_sale_product` FOREIGN KEY (`id_onsale_product`) REFERENCES `onsale_product` (`id_onsale_product`),
  ADD CONSTRAINT `sale_customer` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`),
  ADD CONSTRAINT `sale_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
