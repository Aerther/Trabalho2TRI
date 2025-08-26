-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21/08/2025 às 21:28
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `livros`
--

CREATE TABLE `livros` (
  `idLivro` int(11) NOT NULL,
  `Link_Capa` varchar(255) DEFAULT NULL,
  `Titulo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `livros`
--

INSERT INTO `livros` (`idLivro`, `Link_Capa`, `Titulo`) VALUES
(1, 'https://m.media-amazon.com/images/I/71AeB1+8dZL.jpg', 'Jantar Secreto'),
(2, 'https://m.media-amazon.com/images/I/9172oCPyyvL._UF894,1000_QL80_.jpg', 'Água Viva'),
(3, 'https://m.media-amazon.com/images/I/81QnqHwRiUL._UF1000,1000_QL80_.jpg', 'Harry Potter e o Prisioneiro de Azkaban'),
(4, 'https://m.media-amazon.com/images/I/71VF85AmZJL._UF1000,1000_QL80_.jpg', 'O Misterio do 5 Estrelas'),
(5, 'https://m.media-amazon.com/images/I/81XqiNjr5OL.jpg', 'Suicidas'),
(6, 'https://www.antofagica.com.br/wp-content/uploads/2021/05/ATF_3MorroVentosUivantes_2CadastroSite.png', 'O Morro dos Ventos Uivantes'),
(7, 'https://m.media-amazon.com/images/I/812RDxFDd8L._UF1000,1000_QL80_.jpg', 'A Noiva'),
(8, 'https://m.media-amazon.com/images/I/81BdpMhm3iL._UF1000,1000_QL80_.jpg', 'A Empregada'),
(9, 'https://m.media-amazon.com/images/I/81+AcvclARL._UF894,1000_QL80_.jpg', 'A Cinco Passos de Voce'),
(10, 'https://m.media-amazon.com/images/I/6132ndvQdiL._UF1000,1000_QL80_.jpg', 'O Extraordinario'),
(11, 'https://m.media-amazon.com/images/I/81iqH8dpjuL.jpg', 'A Biblioteca da Meia-Noite'),
(12, 'https://bibliotecaucs.wordpress.com/wp-content/uploads/2015/06/64a76-o2bmenino2bde2bpijama2blistrado.jpg', 'O Menino do Pijama Listrado'),
(13, 'https://m.media-amazon.com/images/I/81LTEfXYgcL.jpg', 'A Hipotese do Amor'),
(14, 'https://m.media-amazon.com/images/I/71WOkspHbOL._UF894,1000_QL80_.jpg', 'Jogos Vorazes'),
(15, 'https://m.media-amazon.com/images/I/81DSQgaSdoL.jpg', 'Dungeons and Drama'),
(16, 'https://m.media-amazon.com/images/I/71fWaI5myqL._UF1000,1000_QL80_.jpg', 'Diario de Um Banana'),
(17, 'https://m.media-amazon.com/images/I/91y8WC8ACTL._UF894,1000_QL80_.jpg', 'Authentic Games: A Batalha Contra Herobrine'),
(18, 'https://m.media-amazon.com/images/I/81jE8GZYexL._UF1000,1000_QL80_.jpg', 'Lino'),
(19, 'https://m.media-amazon.com/images/I/81pdXbEIZhL._UF894,1000_QL80_.jpg', 'Dom Quixote de La Mancha'),
(20, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTYXylwQbXLNz67Ya9TA4JMOh5TxavETmDsHg&s', 'Era uma Vez um Coração Partido');

-- --------------------------------------------------------

--
-- Estrutura para tabela `livros_favoritos`
--

CREATE TABLE `livros_favoritos` (
  `idUsuario` int(11) NOT NULL,
  `idLivro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `Nome` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Senha` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`idLivro`);

--
-- Índices de tabela `livros_favoritos`
--
ALTER TABLE `livros_favoritos`
  ADD PRIMARY KEY (`idUsuario`,`idLivro`),
  ADD KEY `idLivro` (`idLivro`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `idLivro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `livros_favoritos`
--
ALTER TABLE `livros_favoritos`
  ADD CONSTRAINT `livros_favoritos_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `livros_favoritos_ibfk_2` FOREIGN KEY (`idLivro`) REFERENCES `livros` (`idLivro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
