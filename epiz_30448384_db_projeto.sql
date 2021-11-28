-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql202.epizy.com
-- Tempo de geração: 28/11/2021 às 12:28
-- Versão do servidor: 5.7.35-38
-- Versão do PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `epiz_30448384_db_projeto`
--
CREATE DATABASE IF NOT EXISTS `epiz_30448384_db_projeto` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `epiz_30448384_db_projeto`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `administrador`
--

CREATE TABLE `administrador` (
  `id_admin` int(11) DEFAULT NULL,
  `reg_admin` int(11) NOT NULL,
  `nome_admin` varchar(255) NOT NULL,
  `email_admin` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `administrador`
--

INSERT INTO `administrador` (`id_admin`, `reg_admin`, `nome_admin`, `email_admin`, `senha`) VALUES
(NULL, 852, 'Beltrano', 'beltrano@beltrano.com', 'e9910cf6ea24255eff7066643c6cb145'),
(NULL, 963, 'Fulano', 'fulano@fulano.com', '3342949e2e99fc2f304de6fdd626a188');

-- --------------------------------------------------------

--
-- Estrutura para tabela `solicitacao`
--

CREATE TABLE `solicitacao` (
  `id_solicitacao` int(11) DEFAULT NULL,
  `nome_solicitante` varchar(255) NOT NULL,
  `recurso_solicitacao` varchar(255) NOT NULL,
  `qtd_recurso` int(11) NOT NULL,
  `data_solicitacao` varchar(20) NOT NULL,
  `cpf_solicitante` varchar(13) NOT NULL,
  `bairro_solicitante` varchar(255) NOT NULL,
  `cidade_solicitante` varchar(255) NOT NULL,
  `status_solicitacao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `solicitacao`
--

INSERT INTO `solicitacao` (`id_solicitacao`, `nome_solicitante`, `recurso_solicitacao`, `qtd_recurso`, `data_solicitacao`, `cpf_solicitante`, `bairro_solicitante`, `cidade_solicitante`, `status_solicitacao`) VALUES
(6, 'Nome 1', 'Recurso 1', 1, '2021-11-25', '1', '', '', ''),
(NULL, 'Anderson Silva ', 'Cesta BÃ¡sica', 2, '2021-11-27', '12345625809 ', 'Bairro dos Perdoes ', 'Cidade dos Perdoes ', ''),
(NULL, 'Luis ', 'Cesta BÃ¡sica', 2, '2021-11-30', '1234567890 ', 'Bairro Luis ', 'Cidade Luis ', ''),
(7, 'Nome 2', 'Recurso 2', 2, '2021-11-26', '2', '', '', ''),
(8, 'Nome 3', 'Recurso 3', 3, '2021-11-27', '3', '', '', ''),
(NULL, 'Amanda ', 'Cesta BÃ¡sica', 2, '2021-11-18', '456 ', 'Lugar ', 'Nenhum ', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `solicitante`
--

CREATE TABLE `solicitante` (
  `nome_solic` varchar(255) NOT NULL,
  `rg_solic` varchar(11) NOT NULL,
  `cpf_solic` varchar(11) NOT NULL,
  `obs_solic` varchar(300) NOT NULL,
  `tel_solic` varchar(15) NOT NULL,
  `end_solic` varchar(255) NOT NULL,
  `bairro_solic` varchar(50) NOT NULL,
  `cidade_solic` varchar(100) NOT NULL,
  `cep_solic` varchar(20) NOT NULL,
  `id_solic` int(20) DEFAULT NULL,
  `email_solic` varchar(255) NOT NULL,
  `uf_solic` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `solicitante`
--

INSERT INTO `solicitante` (`nome_solic`, `rg_solic`, `cpf_solic`, `obs_solic`, `tel_solic`, `end_solic`, `bairro_solic`, `cidade_solic`, `cep_solic`, `id_solic`, `email_solic`, `uf_solic`) VALUES
('Matheus', '789', '1011', 'Nninugem', '1122112231', 'Endereco aqui', 'Bairro', 'City', '05558464', 3, 'matheus@matheus.com', 'SP'),
('Anderson Silva', '23356779', '12345625809', 'Gustavo', '11296588632', 'Rua azul,23', 'Bairro dos Perdoes', 'Cidade dos Perdoes', '01235610', NULL, 'anderson@anderson.com', 'SÃ£o Paulo'),
('Luis', '123456789', '1234567890', 'Filho Luis', '1122334455', 'Rua do Luis, 20', 'Bairro Luis', 'Cidade Luis', '123456789', NULL, 'luis@luis.com', 'SÃ£o Luis'),
('Amanda', '123', '456', 'Nada', '1112345678', 'Rua dos Bobos, nº 0', 'Lugar', 'Nenhum', '012345678', 2, 'la@la.com', 'SP'),
('amanda.regina.2007@hotmail.com', '11969980108', 'Rua José de', 's', 's', 's', 's', 's', 's', 1, 'amanda.regina.2007@hotmail.com', 's');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`email_admin`);

--
-- Índices de tabela `solicitacao`
--
ALTER TABLE `solicitacao`
  ADD UNIQUE KEY `cpf_solicitante` (`cpf_solicitante`);

--
-- Índices de tabela `solicitante`
--
ALTER TABLE `solicitante`
  ADD PRIMARY KEY (`cpf_solic`),
  ADD UNIQUE KEY `email_solic` (`email_solic`),
  ADD UNIQUE KEY `rg_solic` (`rg_solic`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
