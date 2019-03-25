-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 25-Mar-2019 às 18:00
-- Versão do servidor: 5.7.25-0ubuntu0.18.04.2
-- PHP Version: 7.2.15-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `netcar_sla`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendamento`
--

CREATE TABLE `agendamento` (
  `cd_agendamento` int(11) NOT NULL,
  `cd_usuario` int(11) NOT NULL,
  `cd_tpveiculo` int(11) NOT NULL,
  `cd_servico` int(11) NOT NULL,
  `placa` varchar(8) DEFAULT NULL,
  `data` date NOT NULL,
  `horario` time NOT NULL,
  `status` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `agendamento`
--

INSERT INTO `agendamento` (`cd_agendamento`, `cd_usuario`, `cd_tpveiculo`, `cd_servico`, `placa`, `data`, `horario`, `status`) VALUES
(1, 2, 2, 2, 'pai-4085', '2019-01-18', '19:00:00', 1),
(2, 2, 2, 2, 'PAI-4085', '0023-07-12', '18:00:00', 1),
(5, 6, 7, 2, 'knu-2424', '2019-01-18', '18:20:00', 1),
(6, 2, 2, 2, 'pbc-0909', '2019-01-22', '12:00:00', 1),
(8, 2, 2, 3, NULL, '2019-03-22', '17:19:00', 0),
(9, 3, 3, 3, NULL, '2019-03-25', '08:00:00', 1),
(10, 112, 4, 3, NULL, '2019-03-25', '10:00:00', 1),
(11, 6, 3, 4, NULL, '2019-03-25', '10:08:00', 1),
(12, 6, 3, 4, NULL, '2019-03-25', '10:08:00', 0),
(13, 6, 3, 4, NULL, '2019-03-25', '10:08:00', 0),
(14, 6, 3, 4, NULL, '2019-03-25', '10:08:00', 1),
(15, 6, 3, 4, NULL, '2019-03-25', '10:08:00', 0),
(16, 6, 3, 4, NULL, '2019-03-25', '10:08:00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `faturamento`
--

CREATE TABLE `faturamento` (
  `cd_fatura` int(11) NOT NULL,
  `cd_tpveiculo` int(5) NOT NULL,
  `cd_servico` int(5) NOT NULL,
  `data` date NOT NULL,
  `horario` time NOT NULL,
  `valor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `faturamento`
--

INSERT INTO `faturamento` (`cd_fatura`, `cd_tpveiculo`, `cd_servico`, `data`, `horario`, `valor`) VALUES
(9, 3, 4, '2019-03-25', '10:08:00', 20),
(10, 3, 4, '2019-03-25', '10:08:00', 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `horario`
--

CREATE TABLE `horario` (
  `cd_horario` int(11) NOT NULL,
  `horario` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `cd_servico` int(11) NOT NULL,
  `servico` varchar(45) NOT NULL,
  `ativo` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`cd_servico`, `servico`, `ativo`) VALUES
(1, 'lavagem simples', 1),
(2, 'lavagem americana', 1),
(3, 'aspiração', 1),
(4, 'lavagem geral', 1),
(7, 'Lavagem + secagem', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tarifa`
--

CREATE TABLE `tarifa` (
  `cd_tpveiculo` int(11) NOT NULL,
  `cd_servico` int(11) NOT NULL,
  `preco` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tarifa`
--

INSERT INTO `tarifa` (`cd_tpveiculo`, `cd_servico`, `preco`) VALUES
(2, 1, 15),
(2, 2, 30),
(2, 3, 10),
(2, 4, 20),
(3, 1, 15),
(3, 2, 35),
(3, 3, 10),
(3, 4, 20),
(4, 1, 25),
(4, 2, 50),
(4, 3, 10),
(5, 1, 20),
(5, 2, 50),
(5, 3, 20),
(5, 4, 40),
(2, 5, NULL),
(3, 5, NULL),
(2, 6, NULL),
(3, 6, NULL),
(4, 6, NULL),
(5, 6, NULL),
(7, 3, NULL),
(1, 1, 10),
(6, 1, 25),
(7, 1, 12),
(1, 7, NULL),
(2, 7, NULL),
(3, 7, NULL),
(6, 6, NULL),
(7, 6, NULL),
(6, 5, NULL),
(7, 5, NULL),
(7, 4, NULL),
(7, 2, NULL),
(2, 8, 40),
(3, 8, 50);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_veiculo`
--

CREATE TABLE `tipo_veiculo` (
  `cd_tpveiculo` int(11) NOT NULL,
  `tipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo_veiculo`
--

INSERT INTO `tipo_veiculo` (`cd_tpveiculo`, `tipo`) VALUES
(1, 'moto'),
(2, 'passeio'),
(3, 'suv'),
(4, 'caminhão 2 eixos'),
(5, 'van'),
(6, 'micro-ônibus'),
(7, 'pick-up');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `cd_usuario` int(11) NOT NULL,
  `nome` varchar(245) NOT NULL,
  `endereco` varchar(245) DEFAULT NULL,
  `celular` varchar(45) DEFAULT NULL,
  `fixo` varchar(45) DEFAULT NULL,
  `senha` varchar(8) DEFAULT NULL,
  `nivel` int(4) DEFAULT '0',
  `idt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`cd_usuario`, `nome`, `endereco`, `celular`, `fixo`, `senha`, `nivel`, `idt`) VALUES
(1, 'Manoel', 'Rua da laguna', '99988-7766', '3312-4567', '456', 0, 123),
(2, 'Joaquim', 'Travessa Arlequim', '98765-4321', '3344-5566', '456', 0, 234),
(3, 'Lorena Rocco', 'Rua Feitosa Bruna', '99856-9090', '3107-7788', '456', 3, 345),
(5, 'Jose Pereira', 'tv barcelos', '99856-0000', '5390-6723', '456', 0, 456),
(6, 'Thiago Bruno', 'Rua da Pátria', '99856-9090', '3107-7788', '456', 0, 567),
(7, 'Jose Alfredo', 'Rua Ibirapora', '2345-6789', '9900-8875', '456', 0, 678),
(8, 'Suzane', 'Rua da Pedreira', '99999-3333', '2233-8899', '456', 0, 789),
(103, 'Pelicarpo', 'rua fetio', '77894456', '3333-6699', NULL, 1, 456),
(104, 'Pelicarpo', 'rua fetio', '77894456', '3333-6699', NULL, 1, 456),
(106, 'josue', 'rua barão', '9900-9932', '9900-9932', NULL, 3, 98),
(107, 'pedro', 'Rua tabuna', '88990-4455', '88990-4455', NULL, 1, 123),
(108, 'Fortunato', 'rua pedreira', '8899-5564', '3366-8989', NULL, 0, 123),
(112, 'Iananda', 'rua tao tao distante', '9988-5566', '9988-5566', NULL, 3, 123),
(113, 'Piap', '4546', '4564', '123', NULL, 1, 0),
(116, 'Iananda', 'rua tao tao distante', '89456-8945', '', NULL, 2, 45613),
(118, 'Juscelino', '456', '55666-9663', '', NULL, 3, 123),
(119, 'Clente balcão', '0', '0', '0', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_perfil`
--

CREATE TABLE `usuario_perfil` (
  `id_perfil` int(11) NOT NULL,
  `perfil` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario_perfil`
--

INSERT INTO `usuario_perfil` (`id_perfil`, `perfil`) VALUES
(0, 'Cliente'),
(1, 'Operador'),
(2, 'Financeiro'),
(3, 'Gerente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculo`
--

CREATE TABLE `veiculo` (
  `cd_veiculo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agendamento`
--
ALTER TABLE `agendamento`
  ADD PRIMARY KEY (`cd_agendamento`),
  ADD KEY `fk_table1_usuario1` (`cd_usuario`),
  ADD KEY `fk_agendamento_tipo_veiculo1` (`cd_tpveiculo`),
  ADD KEY `fk_agendamento_servico1` (`cd_servico`);

--
-- Indexes for table `faturamento`
--
ALTER TABLE `faturamento`
  ADD PRIMARY KEY (`cd_fatura`);

--
-- Indexes for table `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`cd_horario`);

--
-- Indexes for table `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`cd_servico`);

--
-- Indexes for table `tipo_veiculo`
--
ALTER TABLE `tipo_veiculo`
  ADD PRIMARY KEY (`cd_tpveiculo`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cd_usuario`);

--
-- Indexes for table `usuario_perfil`
--
ALTER TABLE `usuario_perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indexes for table `veiculo`
--
ALTER TABLE `veiculo`
  ADD PRIMARY KEY (`cd_veiculo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agendamento`
--
ALTER TABLE `agendamento`
  MODIFY `cd_agendamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `faturamento`
--
ALTER TABLE `faturamento`
  MODIFY `cd_fatura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `horario`
--
ALTER TABLE `horario`
  MODIFY `cd_horario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `servico`
--
ALTER TABLE `servico`
  MODIFY `cd_servico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tipo_veiculo`
--
ALTER TABLE `tipo_veiculo`
  MODIFY `cd_tpveiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cd_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT for table `usuario_perfil`
--
ALTER TABLE `usuario_perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `veiculo`
--
ALTER TABLE `veiculo`
  MODIFY `cd_veiculo` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `agendamento`
--
ALTER TABLE `agendamento`
  ADD CONSTRAINT `fk_agendamento_servico1` FOREIGN KEY (`cd_servico`) REFERENCES `servico` (`cd_servico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_agendamento_tipo_veiculo1` FOREIGN KEY (`cd_tpveiculo`) REFERENCES `tipo_veiculo` (`cd_tpveiculo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_table1_usuario1` FOREIGN KEY (`cd_usuario`) REFERENCES `usuario` (`cd_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
