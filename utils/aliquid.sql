-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22-Jun-2015 às 03:58
-- Versão do servidor: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aliquid`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `regiao` varchar(20) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=ascii;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `telefone`, `regiao`) VALUES
(2, 'Clinica dos Olhos S??o Paulo', '11 3349-2334', 'Sudeste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lote`
--

CREATE TABLE IF NOT EXISTS `lote` (
  `id` int(11) NOT NULL,
  `codigo` varchar(8) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=ascii;

--
-- Extraindo dados da tabela `lote`
--

INSERT INTO `lote` (`id`, `codigo`, `descricao`) VALUES
(1, '15/02652', 'LOTE 01/2015 - PRODUCAO TELA'),
(2, '15/02987', 'LOTE 03/2015 - PRODUCAO TOPOGRAFO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `id` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `custo` double DEFAULT NULL,
  `tipo` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=ascii;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `codigo`, `descricao`, `custo`, `tipo`) VALUES
(1, '21.001.001.00001', 'SUPORTE AJUSTE ESPELHO', 0.17, 0),
(2, '90.03.021', 'EIXO', 17, 0),
(3, '30.02.001', 'TRAVA DE AJUSTE', 4.5, 0),
(4, '14.005.002.00002', 'TELA DE ACUIDADE', 3000, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `rnc`
--

CREATE TABLE IF NOT EXISTS `rnc` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_peca` int(11) NOT NULL,
  `id_lote` int(11) NOT NULL,
  `quantidade` double NOT NULL DEFAULT '1',
  `ocorrido` varchar(500) NOT NULL,
  `acao_imediata` varchar(500) DEFAULT NULL,
  `responsavel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

-- --------------------------------------------------------

--
-- Estrutura da tabela `rrc`
--

CREATE TABLE IF NOT EXISTS `rrc` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `serial` varchar(20) DEFAULT NULL,
  `ocorrido` varchar(500) NOT NULL,
  `acao` varchar(500) DEFAULT NULL,
  `responsavel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `responsavel` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=ascii;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `login`, `nome`, `sobrenome`, `senha`, `responsavel`) VALUES
(1, 'admin', 'admin', 'master', '123456', 0),
(5, 'klausner', 'Klausner', 'Augusto', 'barata', 1),
(6, 'douglas', 'Douglas', 'Batista', '123', 0),
(7, 'vanessa', 'Vanessa', 'Viale', '123456', 1),
(8, 'daniel', 'Daniel', 'Jubadouro', '123', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lote`
--
ALTER TABLE `lote`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indexes for table `rnc`
--
ALTER TABLE `rnc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rrc`
--
ALTER TABLE `rrc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `nome` (`nome`,`sobrenome`), ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lote`
--
ALTER TABLE `lote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `rnc`
--
ALTER TABLE `rnc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rrc`
--
ALTER TABLE `rrc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
