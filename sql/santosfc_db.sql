-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Nov-2023 às 16:51
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `santosfc_db`
--
CREATE DATABASE IF NOT EXISTS `santosfc_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `santosfc_db`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `conquistas`
--

CREATE TABLE `conquistas` (
  `id` int(11) NOT NULL,
  `imagem_trofeu` varchar(255) NOT NULL,
  `nome_campeonato` varchar(255) NOT NULL,
  `data` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `conquistas`
--

INSERT INTO `conquistas` (`id`, `imagem_trofeu`, `nome_campeonato`, `data`) VALUES
(1, 'uploaded-images/conquistas/638ee3fb8879e.png', 'Copa Libertadores', '1962 - 1963 - 2011'),
(2, 'uploaded-images/conquistas/638ee42eb55e3.png', 'Mundial Interclubes', '1962 - 1963'),
(3, 'uploaded-images/conquistas/638ee47290372.png', 'Campeonato Brasileiro', '1961 - 1962 - 1963 - 1964 - 1965 - 1968 - 2002 - 2004'),
(4, 'uploaded-images/conquistas/638ee603c393e.png', 'Copa do Brasil', '2010'),
(5, 'uploaded-images/conquistas/638fff9be6ce8.png', 'Campeonato Paulista', '1935 - 1955 - 1956 - 1958...2006 - 2007 - 2010 - 2011 - 2012 - 2015 - 2016');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados`
--

CREATE TABLE `dados` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `sobrenome` varchar(255) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `cpf` bigint(20) DEFAULT NULL,
  `telefone` bigint(20) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `cep` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `dados`
--

INSERT INTO `dados` (`id`, `id_usuario`, `nome`, `sobrenome`, `imagem`, `data_nascimento`, `cpf`, `telefone`, `endereco`, `numero`, `bairro`, `cidade`, `estado`, `cep`) VALUES
(1, 1, 'Joao Pedro', 'Alves', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 2, 'João Pedro', 'Alves', './uploaded-images/usuarios/637c0fc07dbb0.png', '2005-03-28', 15572176614, 35998724512, 'Rua Doze de Outubro', 483, 'Centro', 'Cabo Verde', 'MG', 37880000),
(3, 3, 'Vantuil', 'de Paula Netto', './uploaded-images/usuarios/6380f1a2585e1.jpeg', '2005-03-25', 19039118680, 0, '', 0, '', '', 'MG', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogadores`
--

CREATE TABLE `jogadores` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `data_nascimento` date NOT NULL,
  `naturalidade` varchar(255) NOT NULL,
  `numero` int(11) NOT NULL,
  `posicao` varchar(255) NOT NULL,
  `jogos` int(11) NOT NULL,
  `gols` int(11) NOT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `jogadores`
--

INSERT INTO `jogadores` (`id`, `nome`, `data_nascimento`, `naturalidade`, `numero`, `posicao`, `jogos`, `gols`, `imagem`) VALUES
(1, 'João Paulo', '1995-06-29', 'Dourados (MS)', 34, 'Goleiro', 152, -177, 'uploaded-images/jogadores/638fdbc734f12.png'),
(2, 'Maicon', '1988-09-14', 'Barretos (SP)', 33, 'Zagueiro', 28, 0, 'uploaded-images/jogadores/639000359ef0b.png'),
(3, 'Madson', '1992-01-19', 'Salvador (BA)', 13, 'Lateral', 127, 13, 'uploaded-images/jogadores/6390008677ad8.png'),
(4, 'Sandry', '2002-08-30', 'Itabuna (BA)', 6, 'Volante', 79, 0, 'uploaded-images/jogadores/639000cc1582c.png'),
(5, 'Carlos Sánchez', '1984-12-02', 'Montevidéu (URU)', 7, 'Meio-campo', 161, 32, 'uploaded-images/jogadores/639001638fb57.png'),
(6, 'Ângelo', '2004-12-21', 'Brasília (DF)', 11, 'Atacante', 97, 3, 'uploaded-images/jogadores/639001c035d5f.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_atualizacao` datetime DEFAULT NULL,
  `data_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `log`
--

INSERT INTO `log` (`id`, `id_usuario`, `data_criacao`, `data_atualizacao`, `data_login`) VALUES
(1, 1, '2022-11-21 22:55:04', '0000-00-00 00:00:00', NULL),
(2, 2, '2022-11-21 22:59:04', '2022-12-03 14:24:36', NULL),
(3, 3, '2022-11-25 16:45:42', '2022-12-03 14:29:27', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagens`
--

CREATE TABLE `mensagens` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `sobrenome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` bigint(20) NOT NULL,
  `mensagem` longtext NOT NULL,
  `data_envio` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `mensagens`
--

INSERT INTO `mensagens` (`id`, `nome`, `sobrenome`, `email`, `telefone`, `mensagem`, `data_envio`) VALUES
(1, 'User', 'Test', 'user@gmail.com', 5535998724512, 'test 1', '2022-10-28 13:08:57');

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `texto` longtext NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `url_post` varchar(255) DEFAULT NULL,
  `data_post` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_atualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `categoria`, `texto`, `imagem`, `url_post`, `data_post`, `data_atualizacao`) VALUES
(1, 'SANTOS FC REALIZARÁ ASSEMBLEIA GERAL EXTRAORDINÁRIA NO DIA 17 DE DEZEMBRO', 'Organização', '<p>De acordo com os artigos 26, alínea II, inciso “e”, 23, 24, alínea VI, 26, inciso “b” parágrafo primeiro, 27, 28, inciso III, 29 e 30 do Estatuto Social combinados com o Regimento Interno através dos artigos 3, alínea “f”, 4, alínea “b”, inciso “iv”, 6, inciso “ii”, 7 ,8 inciso “iii” e 9, ficam as senhoras associadas e os senhores associados convocados para a Assembleia Geral Extraordinária, que se realizará no próximo dia 17 de dezembro de 2022, Sábado, em 1ª convocação presencial, às 10:00 horas com a presença mínima de 100 (cem) associados e, em 2ª convocação, meia hora após, com qualquer número dos presentes, à Rua Princesa Isabel s/nº – Vila Belmiro – Santos/SP.</p>', 'uploaded-images/noticias/638ed1d070ca0.png', NULL, '2022-12-06 05:23:28', NULL),
(2, 'SANTOS FC VENCE SÃO PAULO NO JOGO DE VOLTA E AVANÇA À FINAL DO CAMPEONATO PAULISTA SUB-13', 'Categorias de base', '<p>As categorias Sub-13 e Sub-11 do Santos FC jogaram rodada dupla na manhã deste domingo (4), pelas partidas de volta das semifinais de seus estaduais. No CT Rei Pelé, em Santos (SP), os mais velhos eliminaram o São Paulo com goleada de 5 a 2 e avançam à grande final, enquanto os mais novos venceram o Corinthians e igualaram o placar da ida, mas foram superados nos pênaltis.</p>\r\n\r\n<p>Nas finais do Paulista Sub-13, os Meninos da Vila enfrentam o Palmeiras em partidas de ida e volta. A primeira terá mando da equipe da capital e a decisão, mando do Santos FC.</p>\r\n\r\n<p>O Peixe se classificou à grande final do Campeonato Paulista Sub-13 com vitória por 5 a 2 sobre o São Paulo no CT Rei Pelé, após empate em 1 a 1 no jogo de ida, em Cotia (SP). Os gols santistas foram marcados por Nadson (duas vezes), David Nogueira (duas vezes) e Davi Carvalho.</p>\r\n\r\n<p>O camisa 7 do Peixe, Nadson, marcou dois golaços (um deles olímpico) e deu assistência para um dos dois gols de David Nogueira, artilheiro geral da competição, agora com 20 tentos anotados.</p>\r\n\r\n<p>“No primeiro jogo não entramos muito focados, mas querendo ou não, nosso time é muito bom. Hoje entramos mil vezes mais focados, conseguimos essa vitória e graças a Deus estamos na final. Nosso time não é individualista, estamos sempre pensando no todo. Não tem vaidade, somos muito coletivos”, disse Nadson, sobre a partida que garantiu classificação à final.</p>\r\n\r\n<p>“Fico muito feliz porque pude ajudar meu time com dois gols e uma assistência. Ainda mais com esse gol olímpico que, eu acho, foi bem bonito”, completou o camisa 7 santista.</p>\r\n\r\n<p>A equipe comandada pelo treinador Fabrício Monte jogou a volta da semifinal com Arthur do Vale; Lucas Silva, João Sá (Gabriel Neves), Pablo Santana e Vinícius Rabelo; Mateus Mendes (Vinícius Rocha), Davi Carvalho e Vitinho (Pedro Takao); Nadson, Hudson (Rilkiffer) e David Nogueira (João Avelino).</p>\r\n\r\n<p>No Sub-11, o Peixe venceu o Corinthians por 1 a 0 no tempo normal, com belo gol de Felipe Sgarbi, e igualou o placar do jogo de ida. Na disputa por pênaltis, os visitantes venceram por 3 a 0 e avançaram à decisão.</p>', 'uploaded-images/noticias/638ed5b6b5520.jpeg', NULL, '2022-12-06 05:40:06', '2022-12-06 22:32:18'),
(3, 'SANTOS CONQUISTA O TRICAMPEONATO PAULISTA PELA PRIMEIRA VEZ', 'História', '<p>Ainda faltavam três rodadas para o encerramento da 61ª edição do Campeonato Paulista quando o Santos foi confirmado campeão paulista pela sétima vez ao golear a equipe do São Paulo por 5 a 2, na chuvosa noite de quarta-feira, dia 5 de dezembro de 1962, no Pacaembu.</p>\r\n\r\n<p>O empate naquele clássico decisivo dava o título ao Santos, mas o time da capital vendeu caro a derrota, pois foi determinado ao ataque e surpreendeu no início da partida. O médio volante Roberto Dias, um dos melhores marcadores de Pelé, avançou e abriu o placar aos 14 minutos. Logo na sequência, o meio campista Benê passou entre Mauro e Calvet e bateu na saída do goleiro Laércio, marcando o segundo tento da partida.</p>\r\n\r\n<p>Mesmo tendo um placar adverso, o Santos não se intimidou. Coutinho, aos 38 minutos, deslocou o zagueiro Bellini e marcou o primeiro gol do Alvinegro. Cinco minutos depois, o ponta direita Dorval recebeu um excelente passe de Pelé e chutou forte. O goleiro do Tricolor José Poy rebateu e o mesmo Dorval assinalou o gol de empate.</p>', 'uploaded-images/noticias/638ed6e778816.jpg', NULL, '2022-12-06 05:45:11', NULL),
(4, 'CONSELHO DELIBERATIVO APROVA PARCERIA PARA A CONSTRUÇÃO DA ARENA VILA BELMIRO', 'Conselho deliberativo', '<p>Um dia histórico para o Santos FC! Assim foi a quinta-feira (01), na Sessão Extraordinária, quando os conselheiros do Clube aprovaram, praticamente por unanimidade, o projeto para a construção da Arena Vila Belmiro, em parceria com a WTorre. O CEO da construtora, Claudio Macedo, participou presencialmente do encontro para explicar os detalhes do projeto, junto com o arquiteto responsável, Luiz Volpato.</p>\r\n\r\n<p>O próximo passo será a Assembleia Geral para os sócios, marcada para o dia 17 de dezembro, para a votação do sim ou do não da parceria para construção da nova casa do Santos FC, que terá capacidade para 30 mil torcedores, no mesmo local onde fica hoje o Estádio Urbano Caldeira.</p>\r\n\r\n<p>“Estamos caminhando para a modernidade, garantindo que o Santos FC se adapte ao futuro e gere uma estrutura melhor aos seus torcedores. Seguimos adiante buscando sempre o melhor para o Santos”, disse o presidente Andres Rueda.</p>', 'uploaded-images/noticias/638edc558aab1.jpeg', NULL, '2022-12-06 06:08:21', NULL),
(5, 'UMA CONQUISTA COM GOL DO ARTILHEIRO SERGINHO CHULAPA', 'História', '<p>Um ano abençoado para o Santos foi sem dúvida o ano de 1984, pois nesse ano o time peixeiro voltou a vencer o Campeonato Paulista pela décima quinta vez em sua centenária história, tendo conquistado também o Torneio Início nesse mesmo ano. </p>\r\n\r\n<p>O certame estadual que voltava a ter pontos corridos em sua disputa teve seu encerramento no dia 2 de dezembro de 1984,no Estádio do Morumbi contra a equipe do Corinthians, vencido pelo Santos pelo placar de 1 a 0, com Serginho Chulapa marcando o gol da vitória, perante um público de 111 345 pagantes que assistiram naquele domingo a conquista incontestável do onze praiano na capital paulista.</p>\r\n\r\n<p>O alvinegro da capital paulista tinha um ambiente peculiar, pois jogava em sua cidade, considerado favorito pela maior parte dos jornalistas esportivos. O Santos nas rodadas finais vinha perdendo folego e nos últimos oito jogos tinha empatado cinco coincidentemente todos pelo placar de 0 a 0. </p>\r\n\r\n<p>O público presente no estádio do time do São Paulo naquele distante domingo viu o time peixeiro levar para a Vila Belmiro a pesada taça semelhante a conquistada pela última vez em 1978, com o time dos Meninos da Vila. </p>\r\n\r\n<p>O time campeão formou com Rodolfo Rodriguez, Chiquinho, Márcio Rossini, Toninho Carlos e Toninho Oliveira (Gilberto Sorriso); Dema, Paulo Isidoro e Humberto; Lino, Serginho Chulapa e Zé Sérgio (Mario Sérgio). </p>\r\n\r\n<p>O técnico era o saudoso Carlos José Castilho, que foi um dos melhores goleiros que atuou no futebol carioca, segundo declarou o ex-jogador santista, o meia Humberto, que foi campeão paulista com ele em 1984: “Castilho foi o melhor técnico que eu conheci e trabalhei, foi uma pena o futebol ter ficado se ele”. </p>', 'uploaded-images/noticias/638edd0c63a4b.jpg', NULL, '2022-12-06 06:11:24', '2022-12-06 22:28:03'),
(6, 'COM ENTRADA GRATUITA, SANTOS FC RECEBE SÃO PAULO NA VILA BELMIRO PELA IDA DAS SEMIFINAIS DO PAULISTÃO FEMININO', 'Futebol Feminino', '<p>A equipe de futebol feminino do Santos FC recebe a do São Paulo na Vila Belmiro às 21h30 desta quarta-feira (8), pela partida de ida das semifinais do Campeonato Paulista. Com torcida única do Peixe, o duelo contará com entrada gratuita, além de transmissões ao vivo de FPF TV (YouTube, Eleven e Paulistão Play), Centauro (Facebook), Sportv e Estádio TNT Sports.</p>\r\n\r\n<p>Com duas semanas de treinamentos desde a goleada sobre o Realidade Jovem, pela última rodada da primeira fase, as comandadas de Kleiton Lima se prepararam para a primeira de duas partidas que decidem vaga na final. O jogo de volta está marcado para o domingo (11), no estádio do Morumbi, em São Paulo (SP).</p>\r\n\r\n<p>“A gente vem trabalhando forte já há algum tempo. Desde a parada do Paulista, tivemos a Ladies Cup, para nos preparar mais ainda, onde fizemos uma boa campanha. Acho que nossa expectativa está muito boa, estamos nos sentindo bem preparadas e esperamos suprir essas expectativas”, disse a zagueira Kaká.</p>', 'uploaded-images/noticias/638fe5bf761aa.jpg', NULL, '2022-12-07 01:00:47', '2022-12-06 22:23:45'),
(7, 'TAÇA DA CONQUISTA DO CAMPEONATO PAULISTA SUB-20 FICARÁ EXPOSTA NO MEMORIAL DAS CONQUISTAS', 'Exposição', '<p>Os Meninos da Vila conquistaram o último campeonato paulista sub-20 no dia 12 de novembro, na Vila Belmiro, diante do Corinthians. E o troféu erguido no Estádio Urbano Caldeira pelo elenco campeão, ficará em exposição até o dia 15 de dezembro.</p>\r\n<p>Localizado na Vila Belmiro, com acesso pelo portão 16, o Memorial das Conquistas funciona de Terça a Domingo, das 09:00h às 18:00h, com diferentes tipos de passeio. Na visita simples, no valor de R$ 25,00, o visitante conhece todo o acervo do museu e uma visão panorâmica do campo por uma porta de vidro.</p>\r\n\r\n<p>Já o Tour da Vila, no valor de R$50,00, funciona de hora em hora das 10h às 17h. O visitante conhece os bastidores do Templo Sagrado em um tour guiado pelo centro de imprensa, vestiário, área de aquecimento, túnel de acesso e laterais do gramado até o banco de reservas.</p>', 'uploaded-images/noticias/639005fc88cbd.jpeg', NULL, '2022-12-07 03:18:20', NULL),
(8, 'VOLANTE DODI REFORÇA O MEIO-DE-CAMPO SANTISTA PARA A TEMPORADA', 'Elenco', '<p>O Santos FC acertou mais um reforço para a temporada. O volante Dodi, de 26 anos, que estava no Kashiwa Reysol, do Japão. O contrato é de três anos.</p>\r\n\r\n<p>Douglas Moreira Fagundes começou a carreira profissional no Criciúma, em 2014. Se transferiu para o Fluminense em 2018, onde trabalhou com o técnico Odair Hellmann e se destacou. Em 2021 foi jogar no time japonês.</p>\r\n\r\n<p>O Peixe já anunciou as contratações do lateral-direito João Lucas, do atacante Mendonza e do zagueiro Messias. Além deles, acertou as contratações definitivas dos meio-campistas Rodrigo Fernández e Vinícius Zanocelo.</p>', 'uploaded-images/noticias/639b121914971.png', NULL, '2022-12-15 12:24:57', NULL),
(9, 'A CONQUISTA DO PAULISTA PELA QUARTA VEZ', 'História', '<p>No domingo, 14 de dezembro de 1958, justamente o ano em que a Seleção Brasileira conquistava o seu primeiro título de Campeã Mundial, na Suécia, com três craques santistas na equipe: Zito, Pelé e Pepe, o Santos conquistava o seu quarto título de campeão paulista.</p>\r\n\r\n<p>A goleada imposta ao time do Guarani nesse dia, em Campinas, pelo placar de 7 a 1, não deixava dúvidas de que o time praiano vinha encantando os torcedores e a imprensa esportiva e daria ainda muitas alegrias nos anos seguintes.</p>\r\n\r\n<p>Pepe e Dorval, com um gol cada, Bidon que marcou contra suas próprias redes, e Pelé com quatro gols, foram os autores dos gols santistas na goleada diante do Bugre Campineiro dentro de seu próprio estádio, o conhecido Brinco de Ouro.</p>', 'uploaded-images/noticias/639b13932e689.jpg', NULL, '2022-12-15 12:31:15', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `redes_sociais`
--

CREATE TABLE `redes_sociais` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `github_link` varchar(255) DEFAULT NULL,
  `twitter_link` varchar(255) DEFAULT NULL,
  `instagram_link` varchar(255) DEFAULT NULL,
  `facebook_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `redes_sociais`
--

INSERT INTO `redes_sociais` (`id`, `id_usuario`, `github_link`, `twitter_link`, `instagram_link`, `facebook_link`) VALUES
(1, 1, NULL, NULL, NULL, NULL),
(2, 2, '', '', '', ''),
(3, 3, '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo_usuario` varchar(255) NOT NULL DEFAULT 'visitante'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `senha`, `tipo_usuario`) VALUES
(1, 'admin@gmail.com', '$2y$10$FvMR5Eu8Xus4PYkkFZZSl.5IZ4HzyIkiQL8gSSG8CU6/4SE3UfaKu', 'administrador'),
(2, 'joao@gmail.com', '$2y$10$ZvRqjVSb5nkg2IxaQtUrsunFmcgey9CYnp2giXgL1dEs/p9zUAxuy', 'visitante'),
(3, 'vantuil@gmail.com', '$2y$10$rgLWwBC8PA9UyW7GP5RzVOymm3wGxQuqtRAYilasYT2L3t7NCm6/K', 'visitante');

-- --------------------------------------------------------

--
-- Estrutura da tabela `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `data_upload` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `videos`
--

INSERT INTO `videos` (`id`, `link`, `data_upload`) VALUES
(1, 'https://www.youtube.com/embed/Nx56QKl1gKs', '2022-12-04 23:54:17'),
(2, 'https://www.youtube.com/embed/CEMbcH4_EeU', '2022-12-04 23:54:52'),
(3, 'https://www.youtube.com/embed/yjFRWNV4CZQ', '2022-12-04 23:55:37'),
(4, 'https://www.youtube.com/embed/fOt49zdEe2M', '2022-12-04 23:57:15'),
(5, 'https://www.youtube.com/embed/CoSBmAulQpo', '2022-12-06 23:03:22');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `conquistas`
--
ALTER TABLE `conquistas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `dados`
--
ALTER TABLE `dados`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `jogadores`
--
ALTER TABLE `jogadores`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `mensagens`
--
ALTER TABLE `mensagens`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `redes_sociais`
--
ALTER TABLE `redes_sociais`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `conquistas`
--
ALTER TABLE `conquistas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `dados`
--
ALTER TABLE `dados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `jogadores`
--
ALTER TABLE `jogadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `redes_sociais`
--
ALTER TABLE `redes_sociais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
