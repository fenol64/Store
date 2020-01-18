-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Jan-2020 às 20:48
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `store`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `isopened`
--

CREATE TABLE `isopened` (
  `id_isopened` int(11) NOT NULL,
  `time_inicial` timestamp NOT NULL DEFAULT current_timestamp(),
  `time_final` timestamp NOT NULL DEFAULT '1970-01-01 03:00:01',
  `status` varchar(7) DEFAULT 'aberto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `isopened`
--

INSERT INTO `isopened` (`id_isopened`, `time_inicial`, `time_final`, `status`) VALUES
(1, '2020-01-04 01:11:46', '2020-01-04 01:12:00', 'fechado'),
(2, '2020-01-04 19:00:08', '1970-01-01 03:00:01', 'aberto');

-- --------------------------------------------------------

--
-- Estrutura da tabela `orderbody`
--

CREATE TABLE `orderbody` (
  `id` int(11) NOT NULL,
  `id_order` varchar(6) NOT NULL,
  `name_product` varchar(40) NOT NULL DEFAULT 'none',
  `value_product` float NOT NULL DEFAULT 0,
  `status_order` varchar(10) NOT NULL DEFAULT 'pendente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `orders`
--

CREATE TABLE `orders` (
  `id_order` varchar(6) NOT NULL,
  `id` int(11) NOT NULL,
  `total` float NOT NULL DEFAULT 0,
  `day_inserted` varchar(11) NOT NULL DEFAULT '',
  `status` varchar(10) NOT NULL DEFAULT 'pendente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `id_order` varchar(6) NOT NULL,
  `method` varchar(15) NOT NULL DEFAULT 'dinheiro',
  `value_paid` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `payment`
--

INSERT INTO `payment` (`id`, `id_order`, `method`, `value_paid`) VALUES
(1, '12591', 'dinheiro', 15.5),
(2, '12591', 'cartao', 5.1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `name_product` varchar(40) NOT NULL DEFAULT 'none',
  `value_product` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id_product`, `name_product`, `value_product`) VALUES
(1, 'batata', 10.3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` char(32) NOT NULL DEFAULT '123',
  `condicao` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `email`, `senha`, `condicao`) VALUES
(1, 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 0),
(2, 'employee@batatadocheffi.com', 'fa5473530e4d1a5a1e1eb53d2fedb10c', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `isopened`
--
ALTER TABLE `isopened`
  ADD PRIMARY KEY (`id_isopened`);

--
-- Índices para tabela `orderbody`
--
ALTER TABLE `orderbody`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `isopened`
--
ALTER TABLE `isopened`
  MODIFY `id_isopened` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `orderbody`
--
ALTER TABLE `orderbody`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de tabela `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de tabela `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
