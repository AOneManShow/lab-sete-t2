-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Jun-2023 às 18:58
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `gestor_tarefas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tarefa`
--

CREATE TABLE `tarefa` (
  `idTarefa` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `idCriador` int(11) NOT NULL,
  `categoria` varchar(25) NOT NULL,
  `dataInicio` date NOT NULL,
  `dataConclusao` date NOT NULL,
  `concluida` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

CREATE TABLE `utilizador` (
  `idUtilizador` int(11) NOT NULL,
  `nomeCompleto` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `senha` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `utilizador`
--

INSERT INTO `utilizador` (`idUtilizador`, `nomeCompleto`, `email`, `username`, `senha`) VALUES
(1, 'Édner Mateus', 'a@gmail.com', 'username', '123'),
(2, 'Edvino Marvin', 'edmarvino@hotmail.com', 'marvinoofficial', '1234'),
(9, 'OMS Man', 'aoms@gmail.com', 'AOneManShow', '1234567'),
(15, 'Adão Jorge', 'adam12@gmail.com', 'adao', 'abacate'),
(16, 'Test User', 'testuser@gmail.com', 'Teste', 'teste'),
(17, 'Milton Dantas', 'milton@gmail.co.ao', 'miltonD', '12345'),
(18, 'Alberto Mulonde', 'albpedro@gmail.com', 'Xteezy Pvpi', '7654321');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tarefa`
--
ALTER TABLE `tarefa`
  ADD PRIMARY KEY (`idTarefa`);

--
-- Índices para tabela `utilizador`
--
ALTER TABLE `utilizador`
  ADD PRIMARY KEY (`idUtilizador`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `username_2` (`username`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tarefa`
--
ALTER TABLE `tarefa`
  MODIFY `idTarefa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `utilizador`
--
ALTER TABLE `utilizador`
  MODIFY `idUtilizador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
