-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Jul-2021 às 03:01
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `amanda_site`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `language` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `role` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `class`
--

INSERT INTO `class` (`id`, `name`, `username`, `pass`, `language`, `level`, `status`, `role`) VALUES
(1, 'Adults 01', 'adults01', '123456', 'en', '4', 1, 0),
(2, 'Amanda', 'teacher', '123456', 'en', '6', 1, 1),
(3, 'Kids 01', 'kids01', '654321', 'ek', '1', 1, 0),
(4, 'Classe teen', 'teens', '123456', 'ek', '2', 1, 0),
(5, 'Chines 01', 'chines01', '123456', 'cn', '3', 1, 0),
(6, 'Chines Mega2', 'chinesmega2', '222222', 'ek', '2', 0, 0),
(7, 'Chines iniciantes', 'chinese01', '123456', 'cn', '2', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `language` varchar(10) NOT NULL,
  `range_lg` int(11) NOT NULL,
  `file` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `files`
--

INSERT INTO `files` (`id`, `name`, `language`, `range_lg`, `file`) VALUES
(8, 'Teste', 'en', 1, 'files/ingles/file (12).pdf'),
(10, 'nome do arquivo', 'cn', 2, 'files/ingles/WhatsApp Image 2021-07-04 at 16.32.3620210712121434.jpeg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `keys_lg`
--

CREATE TABLE `keys_lg` (
  `id` int(11) NOT NULL,
  `language` varchar(2) NOT NULL,
  `level` varchar(10) NOT NULL,
  `key_lg` varchar(30) NOT NULL,
  `reference` varchar(10) NOT NULL,
  `range_lg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `keys_lg`
--

INSERT INTO `keys_lg` (`id`, `language`, `level`, `key_lg`, `reference`, `range_lg`) VALUES
(1, 'en', 'a1', '12345', 'ena1', 1),
(2, 'en', 'a2', 'j7u6hy', 'ena2', 2),
(3, 'en', 'c2', '5h5hh', 'enc2', 6),
(4, 'en', 'c2', '123456', 'teacher', 6),
(6, 'en', 'b2', '111111', 'enb2', 4),
(7, 'en', 'c1', '4hgt4h', 'enc1', 5),
(8, 'cn', 'a1', '6yjuh6', 'cna1', 1),
(9, 'cn', 'a2', '7jr654', 'cna2', 2),
(10, 'cn', 'b1', 'f4ed5t', 'cnb1', 3),
(11, 'cn', 'b2', '6rh54', 'cnb2', 4),
(12, 'cn', 'c1', '4546v', 'cnc1', 5),
(13, 'cn', 'c2', '564vv', 'cnc2', 6),
(14, 'ek', '1', '1111', 'ek1', 1),
(15, 'ek', '2', '2222', 'ek2', 2),
(17, 'en', 'b1', '343rdff', 'enb1', 3),
(18, 'ek', 'kids', '1234', 'ek1', 1),
(19, 'ek', 'teens', '4321', 'ek2', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mural`
--

CREATE TABLE `mural` (
  `id` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  `text` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `audio` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `mural`
--

INSERT INTO `mural` (`id`, `class`, `text`, `link`, `file_name`, `file`, `image`, `audio`, `date`) VALUES
(23, 1, 'sdsd', '', 'sdsd', 'files/posts/Fantasia de Bolso20210712015658.pdf', 'files/posts/WhatsApp Image 2021-07-04 at 16.32.3620210712015658.jpeg', '', '2021-07-12');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `keys_lg`
--
ALTER TABLE `keys_lg`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `mural`
--
ALTER TABLE `mural`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `keys_lg`
--
ALTER TABLE `keys_lg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `mural`
--
ALTER TABLE `mural`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
