-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 22/04/2019 às 17:23
-- Versão do servidor: 5.7.25-0ubuntu0.16.04.2
-- Versão do PHP: 7.0.33-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `netcar_sla`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `agendamento`
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
-- Fazendo dump de dados para tabela `agendamento`
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
(13, 1, 3, 4, NULL, '2019-04-19', '10:08:00', 1),
(14, 6, 3, 4, NULL, '2019-03-25', '10:08:00', 1),
(15, 6, 3, 4, NULL, '2019-04-02', '10:08:00', 0),
(16, 6, 3, 4, NULL, '2019-04-02', '10:08:00', 1),
(17, 1, 2, 2, 'ppp-5566', '2019-04-19', '23:00:00', 1),
(19, 108, 2, 1, 'pai-4085', '2019-04-19', '12:00:00', 0),
(20, 108, 1, 1, 'lpk-1010', '2019-04-19', '12:05:00', 0),
(21, 108, 1, 1, 'lpk-1010', '2019-04-19', '12:05:00', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `faturamento`
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
-- Fazendo dump de dados para tabela `faturamento`
--

INSERT INTO `faturamento` (`cd_fatura`, `cd_tpveiculo`, `cd_servico`, `data`, `horario`, `valor`) VALUES
(9, 3, 4, '2019-03-25', '10:08:00', 20),
(10, 3, 4, '2019-03-25', '09:08:00', 20),
(11, 2, 2, '2019-03-26', '23:00:00', 30),
(12, 3, 4, '2019-04-19', '10:08:00', 20);

-- --------------------------------------------------------

--
-- Estrutura para tabela `horario`
--

CREATE TABLE `horario` (
  `cd_horario` int(11) NOT NULL,
  `horario` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `servico`
--

CREATE TABLE `servico` (
  `cd_servico` int(11) NOT NULL,
  `servico` varchar(45) NOT NULL,
  `ativo` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `servico`
--

INSERT INTO `servico` (`cd_servico`, `servico`, `ativo`) VALUES
(1, 'lavagem simples', 1),
(2, 'lavagem americana', 1),
(3, 'aspiração', 1),
(4, 'lavagem geral', 1),
(7, 'Lavagem + secagem', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tarifa`
--

CREATE TABLE `tarifa` (
  `cd_tpveiculo` int(11) NOT NULL,
  `cd_servico` int(11) NOT NULL,
  `preco` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `tarifa`
--

INSERT INTO `tarifa` (`cd_tpveiculo`, `cd_servico`, `preco`) VALUES
(2, 1, 15),
(2, 2, 30),
(2, 3, 10),
(2, 4, 20),
(3, 2, 35),
(3, 3, 10),
(3, 4, 20),
(4, 2, 50),
(4, 3, 10),
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
(1, 7, NULL),
(2, 7, NULL),
(3, 7, NULL),
(6, 6, NULL),
(7, 6, NULL),
(6, 5, NULL),
(7, 5, NULL),
(7, 4, 50),
(7, 2, NULL),
(2, 8, 40),
(3, 8, 50),
(1, 1, 12),
(3, 1, NULL),
(4, 1, NULL),
(5, 1, NULL),
(6, 1, NULL),
(7, 1, 25),
(1, 8, NULL),
(2, 8, NULL),
(2, 8, NULL),
(3, 8, NULL),
(2, 8, NULL),
(3, 8, NULL),
(4, 8, NULL),
(4, 8, NULL),
(5, 8, NULL),
(3, 9, NULL),
(4, 9, NULL),
(1, 8, NULL),
(2, 8, NULL),
(1, 8, NULL),
(2, 8, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_veiculo`
--

CREATE TABLE `tipo_veiculo` (
  `cd_tpveiculo` int(11) NOT NULL,
  `tipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `tipo_veiculo`
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
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `cd_usuario` int(11) NOT NULL,
  `nome` varchar(245) NOT NULL,
  `endereco` varchar(245) DEFAULT NULL,
  `celular` varchar(45) DEFAULT NULL,
  `fixo` varchar(45) DEFAULT NULL,
  `senha` varchar(8) DEFAULT NULL,
  `nivel` int(4) DEFAULT '0',
  `idt` int(11) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `usuario`
--

INSERT INTO `usuario` (`cd_usuario`, `nome`, `endereco`, `celular`, `fixo`, `senha`, `nivel`, `idt`, `ativo`) VALUES
(1, 'Manoel Souza', 'Rua da laguna', '99988-7766', '3312-4567', '456', 0, 123, 0),
(2, 'Joaquim', 'Travessa Arlequim', '98765-4321', '3344-5566', '456', 1, 1234, 1),
(3, 'Lorena Rocco', 'Rua Feitosa Bruna', '99856-9090', '3107-7788', '456', 2, 12345, 1),
(5, 'Jose Pereira', 'tv barcelos 563', '99856-0000', '5390-6723', '456', 3, 123456, 1),
(6, 'Thiago Bruno', 'Rua da Pátria', '99856-9090', '3107-7788', '456', 0, 567, 0),
(7, 'Jose Alfredo', 'Rua Ibirapora', '2345-6789', '9900-8875', '456', 0, 678, 1),
(8, 'Suzane', 'Rua da Pedreira', '88888-8888', '2233-8899', '456', 0, 789, 0),
(108, 'Fortunato', 'rua pedreira', '8899-5564', '3366-8989', NULL, 0, 123, 1),
(112, 'Iananda', 'rua tao tao distante', '9988-5566', '9988-5566', NULL, 3, 123, 1),
(129, 're', 'ad', 'asd', 'asd', NULL, 0, 456456456, 0),
(130, 'teste', 'asda', 'adas', '35', NULL, 0, 789789, 0),
(131, 'we', 'as', 'as', 'as', NULL, 0, 400345898, 0),
(132, 'qw', '121', '12', '12', NULL, 3, 1, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario_perfil`
--

CREATE TABLE `usuario_perfil` (
  `id_perfil` int(11) NOT NULL,
  `perfil` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `usuario_perfil`
--

INSERT INTO `usuario_perfil` (`id_perfil`, `perfil`) VALUES
(0, 'Cliente'),
(1, 'Operador'),
(2, 'Financeiro'),
(3, 'Gerente');

-- --------------------------------------------------------

--
-- Estrutura para tabela `veiculo`
--

CREATE TABLE `veiculo` (
  `cd_veiculo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `agendamento`
--
ALTER TABLE `agendamento`
  ADD PRIMARY KEY (`cd_agendamento`),
  ADD KEY `fk_table1_usuario1` (`cd_usuario`),
  ADD KEY `fk_agendamento_tipo_veiculo1` (`cd_tpveiculo`),
  ADD KEY `fk_agendamento_servico1` (`cd_servico`);

--
-- Índices de tabela `faturamento`
--
ALTER TABLE `faturamento`
  ADD PRIMARY KEY (`cd_fatura`);

--
-- Índices de tabela `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`cd_horario`);

--
-- Índices de tabela `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`cd_servico`);

--
-- Índices de tabela `tipo_veiculo`
--
ALTER TABLE `tipo_veiculo`
  ADD PRIMARY KEY (`cd_tpveiculo`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cd_usuario`);

--
-- Índices de tabela `usuario_perfil`
--
ALTER TABLE `usuario_perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Índices de tabela `veiculo`
--
ALTER TABLE `veiculo`
  ADD PRIMARY KEY (`cd_veiculo`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `agendamento`
--
ALTER TABLE `agendamento`
  MODIFY `cd_agendamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de tabela `faturamento`
--
ALTER TABLE `faturamento`
  MODIFY `cd_fatura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de tabela `horario`
--
ALTER TABLE `horario`
  MODIFY `cd_horario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
  MODIFY `cd_servico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de tabela `tipo_veiculo`
--
ALTER TABLE `tipo_veiculo`
  MODIFY `cd_tpveiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cd_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;
--
-- AUTO_INCREMENT de tabela `usuario_perfil`
--
ALTER TABLE `usuario_perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `veiculo`
--
ALTER TABLE `veiculo`
  MODIFY `cd_veiculo` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `agendamento`
--
ALTER TABLE `agendamento`
  ADD CONSTRAINT `fk_agendamento_servico1` FOREIGN KEY (`cd_servico`) REFERENCES `servico` (`cd_servico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_agendamento_tipo_veiculo1` FOREIGN KEY (`cd_tpveiculo`) REFERENCES `tipo_veiculo` (`cd_tpveiculo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_table1_usuario1` FOREIGN KEY (`cd_usuario`) REFERENCES `usuario` (`cd_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
