-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Fev-2020 às 03:07
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
(14, '2020-02-23 01:37:05', '1970-01-01 03:00:01', 'aberto');

-- --------------------------------------------------------

--
-- Estrutura da tabela `orderbody`
--

CREATE TABLE `orderbody` (
  `id` int(11) NOT NULL,
  `id_order` varchar(6) NOT NULL,
  `name_product` varchar(40) NOT NULL DEFAULT 'none',
  `value_product` float NOT NULL DEFAULT 0,
  `status_order` varchar(10) NOT NULL DEFAULT 'pendente',
  `created_At` date NOT NULL DEFAULT current_timestamp()
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
  `status` varchar(10) NOT NULL DEFAULT 'pendente',
  `created_At` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `orders`
--

INSERT INTO `orders` (`id_order`, `id`, `total`, `day_inserted`, `status`, `created_At`) VALUES
('68866', 152, 0, '14', 'pendente', '2020-02-22');

-- --------------------------------------------------------

--
-- Estrutura da tabela `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `id_order` varchar(6) NOT NULL,
  `method` varchar(15) NOT NULL DEFAULT 'dinheiro',
  `value_paid` float NOT NULL DEFAULT 0,
  `created_At` date NOT NULL DEFAULT current_timestamp(),
  `status_order` varchar(12) NOT NULL DEFAULT 'pendente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'Batata comum P.P', 5),
(2, 'Batata comum Pequena', 10),
(3, 'Batata comum Média', 15),
(4, 'Batata comum Grande', 20),
(5, 'Batata comum Gigante', 25),
(6, 'Batata Americana Pequena', 20),
(7, 'Batata Americana Média', 25),
(8, 'Batata Americana Grande', 30),
(9, 'Batata Americana Gigante', 40),
(10, ' 1 - Latão', 5),
(11, '3 - Latões', 14),
(12, 'Refrigerante', 5),
(13, 'Guaracamp', 2),
(14, 'Água c/ gás', 3),
(15, 'Água s/ gás', 2);

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
  MODIFY `id_isopened` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `orderbody`
--
ALTER TABLE `orderbody`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
