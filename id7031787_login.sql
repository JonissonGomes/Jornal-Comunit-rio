-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 21-Nov-2018 às 16:12
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id7031787_login`
--
DROP Database if exist jc;
CREATE Database if not exist jc;
use jc ;
-- --------------------------------------------------------

--
-- Estrutura da tabela `coments`
--

CREATE TABLE `coments` (
  `id` int(11) NOT NULL,
  `coment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `posts_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `coments`
--

INSERT INTO `coments` (`id`, `coment`, `posts_id`, `users_id`, `created_at`) VALUES
(8, '.', 40, 18, '2018-11-20 15:37:47');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comunidades`
--

CREATE TABLE `comunidades` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `comunidades`
--

INSERT INTO `comunidades` (`id`, `nome`) VALUES
(1, 'joão de barro'),
(2, 'Agamenon Magalhães'),
(3, 'Alto do Céu'),
(4, 'Ana de Albuquerque'),
(5, 'Área Rural de Igarassu'),
(6, 'Bela Vista'),
(7, 'Bonfim'),
(8, 'Campina de Feira'),
(9, 'Centro'),
(10, 'Cruz de Rebouças'),
(11, 'Encanto Igarassu'),
(12, 'Inhamã'),
(13, 'Jabacó'),
(14, 'Jardim Boa Sorte'),
(15, 'Monjope'),
(16, 'Pancó'),
(17, 'Posto de Monta'),
(18, 'Rubina'),
(19, 'Santa Luzia'),
(20, 'Santa Rita'),
(21, 'Santo Antônio'),
(22, 'Saramandaia'),
(23, 'Sítio dos Marcos'),
(24, 'Tabatinga'),
(25, 'Triunfo'),
(26, 'Vila Rural'),
(27, 'Umbura');

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imagem` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `comunidades_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `title`, `descricao`, `post`, `imagem`, `users_id`, `comunidades_id`, `created_at`) VALUES
(39, 'Estrada', 'Buracos na estrada', 'muitos buracos na estradas', '../img/16-11-2018_04:11:05', 7, 11, '2018-11-16 16:52:06'),
(40, 'Buraco na rua', 'buracao imenso', 'bla bla bla quebrou o meu carro', '../img/16-11-2018_06:11:39', 15, 1, '2018-11-16 18:16:40');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `validate` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `validate`) VALUES
(1, 'opa', '123', '', 0),
(2, 'silvio', '123', '', 0),
(3, 'gui', 'gui', '', 0),
(4, 'Filipe', 'lipeh777', '', 0),
(5, 'naadabe', '123', 'jornalcomunitarioprojeto@gmail.com', 0),
(6, '123', '123', 'jonissonsportsempre@gmail.com', 1),
(7, 'adriene', '123', 'adrienebarbosa22@gmail.com', 1),
(8, 'teste', '123', 'silvioej@gmail.com', 0),
(9, 'Eu', '123', 'jonissonsportsempre@gmail.com', 1),
(10, 'lien', '123', 'silvioej@gmail.com', 1),
(11, 'juen', '123', 'silvioej@gmail.com', 1),
(12, 'Kkk', 'kkk', 'jonissonsportsempre@gmail.com', 0),
(13, 'hiei', '123', 'silvio.cursoejpg@GMAIL.COM', 0),
(14, 'alexandre', '123', 'strapacao@gmail.com', 1),
(15, 'jonisson', '123', 'jonisson@hotmail.com', 1),
(16, '000', '000', 'lucascrieumaconta1@gmail.com', 0),
(17, 'lucas123', 'lucas', 'lucascrieumaconta@gmail.com', 0),
(18, 'raquel', 'raquel', 'lucascrieumaconta@gmail.com', 1),
(19, 'kaka', '123', 'silvioej@gmail.com', 0),
(20, 'lola', '123', 'silvioej@hotmail.com', 1),
(21, 'aline ', '123', 'alineepecris79@gmail.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coments`
--
ALTER TABLE `coments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_coments_posts1_idx` (`posts_id`),
  ADD KEY `fk_coments_users1_idx` (`users_id`);

--
-- Indexes for table `comunidades`
--
ALTER TABLE `comunidades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_posts_users_idx` (`users_id`),
  ADD KEY `fk_posts_comunidades1_idx` (`comunidades_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coments`
--
ALTER TABLE `coments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comunidades`
--
ALTER TABLE `comunidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `coments`
--
ALTER TABLE `coments`
  ADD CONSTRAINT `fk_coments_posts1` FOREIGN KEY (`posts_id`) REFERENCES `posts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_coments_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_posts_comunidades1` FOREIGN KEY (`comunidades_id`) REFERENCES `comunidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_posts_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
