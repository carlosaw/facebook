-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Out-2021 às 00:39
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `facebook`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupos`
--

CREATE TABLE `grupos` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `titulo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `grupos`
--

INSERT INTO `grupos` (`id`, `id_usuario`, `titulo`) VALUES
(2, 1, 'Grupo de Teste'),
(10, 1, 'Grupo 2'),
(45, 1, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupos_membros`
--

CREATE TABLE `grupos_membros` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_grupo` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `grupos_membros`
--

INSERT INTO `grupos_membros` (`id`, `id_grupo`, `id_usuario`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 2, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `data_criacao` datetime DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `texto` text DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL,
  `id_grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `id_usuario`, `data_criacao`, `tipo`, `texto`, `url`, `id_grupo`) VALUES
(2, 1, '2016-08-27 05:57:58', 'foto', 'Teste de envio de imagem com texto...', '91b1addbcc2f6b6e25e8742e096c971c.png', 0),
(3, 1, '2016-08-27 05:59:29', 'texto', 'Mais algumas', '', 0),
(4, 1, '2016-08-27 05:59:32', 'texto', 'De texto', '', 0),
(5, 1, '2016-08-27 06:16:04', 'texto', 'Algum texto de exemplo', '', 0),
(6, 2, '2016-08-27 06:17:03', 'texto', 'Minha postagem de fulano...', '', 0),
(7, 1, '2016-08-27 06:17:25', 'texto', 'Algum outro', '', 0),
(8, 2, '2016-08-27 07:43:41', 'texto', 'Teste de postagem no grupo de Bonieky...', '', 2),
(9, 1, '2016-08-27 07:44:57', 'texto', 'Que legal Fulano...', '', 2),
(22, 1, '2021-10-12 20:38:29', 'foto', 'Até que enfim...', '91b1addbcc2f6b6e25e8742e096c971c.png', 0),
(23, 2, '2021-10-13 09:53:21', 'texto', 'Postagens de fulano', '', 0),
(24, 6, '2021-10-15 14:02:05', 'foto', 'Pensando que sou Geltrânio', '086c764c3106a9cdeadf322a67854008.jpg', 0),
(25, 5, '2021-10-17 15:11:41', 'foto', 'Aqui eu falei por ser zibrano', '335caeff63e5666685d5bcb73c87bf32.jpg', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts_comentarios`
--

CREATE TABLE `posts_comentarios` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_post` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `data_criacao` datetime DEFAULT NULL,
  `texto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `posts_comentarios`
--

INSERT INTO `posts_comentarios` (`id`, `id_post`, `id_usuario`, `data_criacao`, `texto`) VALUES
(1, 7, 1, '2016-08-27 06:56:24', 'Teste legal'),
(3, 22, 3, '2021-10-15 10:21:06', 'Comentario de cicrano no post de Carlos Alberto'),
(7, 24, 2, '2021-10-15 14:34:59', 'Palavras ao vento para gertrânio'),
(9, 9, 2, '2021-10-15 14:55:46', 'Fecha logo esta div...'),
(17, 24, 6, '2021-10-17 11:08:26', 'Comentário de Geltrânio no post dele mesmo'),
(18, 23, 2, '2021-10-17 15:03:50', 'Fulano dele mesmo'),
(19, 25, 5, '2021-10-17 15:15:49', 'Eu mesmo zibrano que comentei'),
(20, 25, 2, '2021-10-17 15:20:09', 'Aqui é fulano comentando post de zibrano'),
(22, 9, 1, '2021-10-17 15:22:31', 'Carlos para Carlos Alberto post próprio'),
(24, 22, 4, '2021-10-17 15:27:14', 'Alo rapaziada aqui é Beltrano'),
(27, 22, 5, '2021-10-17 15:39:18', 'Faaala Beltrano blz?'),
(28, 9, 5, '2021-10-17 15:40:48', 'Pra aparecer o texo n ahora'),
(29, 8, 5, '2021-10-17 15:42:11', 'Será que agora vai???'),
(33, 5, 5, '2021-10-17 15:57:19', 'Precisa autalizar o html do posts_comentarios'),
(34, 6, 5, '2021-10-17 15:59:45', 'agora!'),
(36, 7, 5, '2021-10-17 16:09:16', 'affffffffffff'),
(37, 25, 1, '2021-10-17 16:10:23', 'Boa. Apareceu o texto ao clicar em Eniviar.'),
(38, 5, 4, '2021-10-17 16:33:38', 'Conseguimos amiguinho!');

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts_likes`
--

CREATE TABLE `posts_likes` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_post` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `posts_likes`
--

INSERT INTO `posts_likes` (`id`, `id_post`, `id_usuario`) VALUES
(2, 7, 2),
(11, 23, 1),
(12, 23, 2),
(13, 22, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `relacionamentos`
--

CREATE TABLE `relacionamentos` (
  `id` int(11) UNSIGNED NOT NULL,
  `usuario_de` int(11) DEFAULT NULL,
  `usuario_para` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `relacionamentos`
--

INSERT INTO `relacionamentos` (`id`, `usuario_de`, `usuario_para`, `status`) VALUES
(1, 1, 4, 1),
(2, 4, 3, 1),
(3, 1, 5, 1),
(4, 1, 3, 1),
(5, 1, 2, 1),
(6, 3, 4, 1),
(12, 5, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `sexo` tinyint(1) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `senha` varchar(32) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `nome`, `sexo`, `bio`, `senha`) VALUES
(1, 'carlos@gmail.com', 'Carlos Alberto', 1, 'Esta Ã© minha biografia... Esse sou quem eu sou.', '698dc19d489c4e4db73e28a713eab07b'),
(2, 'fulano@hotmail.com', 'Fulano', 1, NULL, '202cb962ac59075b964b07152d234b70'),
(3, 'cicrano@hotmail.com', 'Cicrano', 0, NULL, '202cb962ac59075b964b07152d234b70'),
(4, 'beltrano@hotmail.com', 'Beltrano', 1, NULL, '202cb962ac59075b964b07152d234b70'),
(5, 'zibrano@hotmail.com', 'Zibrano', 1, NULL, '202cb962ac59075b964b07152d234b70'),
(6, 'greltranio@hotmail.com', 'Greltranio', 1, NULL, '202cb962ac59075b964b07152d234b70');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `grupos_membros`
--
ALTER TABLE `grupos_membros`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `posts_comentarios`
--
ALTER TABLE `posts_comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `posts_likes`
--
ALTER TABLE `posts_likes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `relacionamentos`
--
ALTER TABLE `relacionamentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de tabela `grupos_membros`
--
ALTER TABLE `grupos_membros`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `posts_comentarios`
--
ALTER TABLE `posts_comentarios`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de tabela `posts_likes`
--
ALTER TABLE `posts_likes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `relacionamentos`
--
ALTER TABLE `relacionamentos`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
