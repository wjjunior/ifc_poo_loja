-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 19-Out-2018 às 23:00
-- Versão do servidor: 5.7.23
-- versão do PHP: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`, `descricao`) VALUES
(1, 'Telefonia', 'Produtos de Telefonia'),
(2, 'Informática', 'Produtos de Informática'),
(3, 'Eletrodomésticos', 'Produtos de Eletrodomésticos'),
(4, 'Móveis', 'Produtos de Móveis'),
(5, 'Limpeza', ''),
(6, 'Esportes', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `preco` float NOT NULL,
  `id_categoria` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_categoria` (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `descricao`, `foto`, `preco`, `id_categoria`) VALUES
(1, 'Smartphone Samsung Galaxy J5 Duos Dourado com Dual Chip', 'Detalhes do produto: Samsung: Smartphone Samsung Galaxy J5 Duos Dourado com Dual chip, Tela 5.0\", 4G, Câmera 13MP, Android 5.1 e Processador Quad Core de 1.2 Ghz', 'imagens/produtos/j5-dourado.jpg', 759, 1),
(2, 'Smartphone LG K10 TV Índigo', 'Smartphone LG K10 TV Índigo com 16GB, Dual Chip, Tela de 5.3\" HD, 4G, Android 6.0, Câmera 13MP e Processador Octa Core de 1.14 GHz', 'imagens/produtos/k10-indigo.jpg', 699, 1),
(3, 'iPhone 7 Apple 32GB', '\r\niPhone 7 Apple 32GB, Tela Retina HD de 4,7”, 3D Touch, iOS 10, Touch ID, Câm.12MP, Resistente à Água e Sistema de Alto-falantes Estéreo - Prateado', 'imagens/produtos/iphon7-32.jpg', 3199, 1),
(4, 'Notebook Positivo Q232A', 'Notebook Positivo Quad Core 2GB 32GB SSD Tela 14” Windows 10 Motion Q232A', 'imagens/produtos/positivo-q232a', 949, 2),
(5, 'Notebook Lenovo Ideapad 320', 'Notebook Lenovo Core i3-6006U 4GB 1TB Tela Full HD 15.6” Windows 10 Ideapad 320', 'imagens/produtos/lenovo-320.jpg', 1799, 2),
(6, 'Sofá 3 Lugares American Comfort', '\r\nSofá 3 Lugares American Comfort América com Chaise Lado Direito + Puff\r\nEle conta com almofadas fixas com percinta elástica de densidade D-26, encosto com almofadas soltas em flocos de espuma e revestimento em suede pena. ', 'imagens/produtos/sofa-american.jpg', 1799, 4),
(7, ' Cadeira Office Peter', '\r\nCadeira Office Peter c/ Encosto em Nylon e Função Relax – Preta - Importado', 'imagens/produtos/cadeira-peter.jpg', 229, 4),
(8, 'Ajax', 'desinfetante para limpeza pesada', '', 7, 5);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
