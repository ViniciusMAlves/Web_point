-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Jun-2021 às 22:33
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `web_ponto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `ID` int(11) NOT NULL,
  `NOME_EMP` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`ID`, `NOME_EMP`) VALUES
(1, 'Emp. Genérica');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(200) NOT NULL,
  `EMAIL` varchar(200) NOT NULL,
  `CPF` varchar(11) NOT NULL,
  `CARGO` varchar(300) NOT NULL,
  `ID_GERENTE` int(11) DEFAULT NULL,
  `ID_EMPRESA` int(11) NOT NULL,
  `USER_LOGIN` varchar(25) NOT NULL,
  `HIERARQ` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`ID`, `NOME`, `EMAIL`, `CPF`, `CARGO`, `ID_GERENTE`, `ID_EMPRESA`, `USER_LOGIN`, `HIERARQ`) VALUES
(1, 'Jorge', 'jorge@email.com', '444.666.998', 'Gerente de Produtos', 0, 1, 'jorge1', 1),
(2, 'Jao', 'jao@email.com', '555.666.998', 'Funcionário genérico', 1, 1, 'jao49', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `ID` int(11) NOT NULL,
  `USER` varchar(200) NOT NULL,
  `SENHA` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`ID`, `USER`, `SENHA`) VALUES
(1, 'jorge1', 'jorgebolado'),
(2, 'jao49', '49jao');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ponto`
--

CREATE TABLE `ponto` (
  `ID` int(11) NOT NULL,
  `ID_FUNC` int(11) NOT NULL,
  `ENTRADA` datetime NOT NULL,
  `SAIDA` datetime NOT NULL,
  `LOCAL` varchar(25) NOT NULL,
  `ATIVIDADE` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `ponto`
--

INSERT INTO `ponto` (`ID`, `ID_FUNC`, `ENTRADA`, `SAIDA`, `LOCAL`, `ATIVIDADE`) VALUES
(1, 2, '2021-06-27 17:20:50', '0000-00-00 00:00:00', '', ''),
(2, 1, '2021-06-27 17:21:25', '0000-00-00 00:00:00', '', ''),
(3, 1, '2021-06-27 17:27:07', '0000-00-00 00:00:00', '', 'nada'),
(4, 2, '2021-06-27 17:32:39', '0000-00-00 00:00:00', '', 'Muitos nada');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `ponto`
--
ALTER TABLE `ponto`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `ponto`
--
ALTER TABLE `ponto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
