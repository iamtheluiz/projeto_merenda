-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 14-Out-2018 às 05:06
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `db_merenda`
--
CREATE DATABASE IF NOT EXISTS `db_merenda` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_merenda`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_lista`
--

CREATE TABLE IF NOT EXISTS `tb_lista` (
  `cd_lista` int(11) NOT NULL AUTO_INCREMENT,
  `dt_lista` date NOT NULL,
  `id_turno` int(11) NOT NULL,
  PRIMARY KEY (`cd_lista`),
  KEY `cd_lista` (`cd_lista`),
  KEY `cd_lista_2` (`cd_lista`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_sala`
--

CREATE TABLE IF NOT EXISTS `tb_sala` (
  `cd_sala` int(11) NOT NULL AUTO_INCREMENT,
  `nm_sala` varchar(100) NOT NULL,
  `tx_cor` varchar(20) NOT NULL,
  `id_turno` int(11) NOT NULL,
  PRIMARY KEY (`cd_sala`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_sala_lista`
--

CREATE TABLE IF NOT EXISTS `tb_sala_lista` (
  `cd_sala_lista` int(11) NOT NULL AUTO_INCREMENT,
  `id_sala` int(11) NOT NULL,
  `id_lista` int(11) NOT NULL,
  `nr_posicao` int(11) NOT NULL,
  `st_sala` varchar(15) NOT NULL DEFAULT 'esperando',
  PRIMARY KEY (`cd_sala_lista`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_turno`
--

CREATE TABLE IF NOT EXISTS `tb_turno` (
  `cd_turno` int(11) NOT NULL AUTO_INCREMENT,
  `nm_turno` varchar(100) NOT NULL,
  PRIMARY KEY (`cd_turno`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
