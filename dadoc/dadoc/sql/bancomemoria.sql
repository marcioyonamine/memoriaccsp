-- phpMyAdmin SQL Dump
-- version 3.3.7deb7
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Ago 17, 2015 as 03:02 PM
-- Versão do Servidor: 5.1.73
-- Versão do PHP: 5.3.3-7+squeeze19

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `memoria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `mem_abordagem`
--

CREATE TABLE IF NOT EXISTS `mem_abordagem` (
  `idAbordagem` int(2) NOT NULL AUTO_INCREMENT,
  `abordagem` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idAbordagem`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `mem_abordagem`
--

INSERT INTO `mem_abordagem` (`idAbordagem`, `abordagem`) VALUES
(1, 'Dossiê'),
(2, 'Unidade'),
(3, 'Série ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mem_area`
--

CREATE TABLE IF NOT EXISTS `mem_area` (
  `idArea` int(2) NOT NULL AUTO_INCREMENT,
  `area` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idArea`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=71 ;

--
-- Extraindo dados da tabela `mem_area`
--

INSERT INTO `mem_area` (`idArea`, `area`) VALUES
(27, 'Divisão de Pesquisas'),
(26, 'Institucional'),
(25, 'Acessibilidade'),
(24, 'Gráfica'),
(23, 'Comunicação'),
(22, 'Laboratório de Conservação e R'),
(21, 'Documentação e Catalogação'),
(20, 'Núcleo Memória'),
(19, 'Arquivo Multimeio'),
(18, 'Discoteca Oneyda Alvarenga'),
(17, 'Coleção de Arte da Cidade'),
(16, 'Biblioteca Louis Braille'),
(15, 'Gibiteca Henfil'),
(14, 'Biblioteca Sérgio Milliet e Al'),
(13, 'Produção de Apoio a Eventos'),
(12, 'Ação Cultural e Educativa'),
(11, 'Literatura'),
(10, 'Audiovisual'),
(9, 'Dança'),
(8, 'Teatro'),
(7, 'Música'),
(6, 'Artes Visuais '),
(5, 'Arquitetura'),
(4, 'Administração'),
(3, 'Gabinete do Diretor'),
(2, 'Comissão Curatorial'),
(1, 'Conselho Consultivo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mem_contexto`
--

CREATE TABLE IF NOT EXISTS `mem_contexto` (
  `idRegistro` int(5) NOT NULL AUTO_INCREMENT,
  `idArea` int(2) DEFAULT NULL,
  `idAbordagem` int(2) DEFAULT NULL,
  `atividade` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dataInicio` date DEFAULT NULL,
  `dataFinal` date DEFAULT NULL,
  `idLocal` int(2) DEFAULT NULL,
  `idResponsavel` int(2) DEFAULT NULL,
  `idResponsabilidade` int(4) DEFAULT NULL,
  `descricao` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `acesso` tinyint(1) DEFAULT NULL,
  `conservacao` longtext COLLATE utf8_unicode_ci,
  `historico` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`idRegistro`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `mem_contexto`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `mem_formato`
--

CREATE TABLE IF NOT EXISTS `mem_formato` (
  `idFormato` int(2) NOT NULL AUTO_INCREMENT,
  `formato` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`idFormato`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `mem_formato`
--

INSERT INTO `mem_formato` (`idFormato`, `formato`) VALUES
(1, 'Ampliação Fotográfica'),
(2, 'Cartaz'),
(3, 'Diapositivo '),
(4, 'Folha'),
(5, 'Folheto'),
(6, 'Livro'),
(7, 'Negativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mem_identificacao`
--

CREATE TABLE IF NOT EXISTS `mem_identificacao` (
  `idIdentificacao` int(5) NOT NULL AUTO_INCREMENT,
  `idNotacao` int(2) NOT NULL,
  `idTipo` int(2) NOT NULL,
  `idTecnica` int(2) NOT NULL,
  `idSuporte` int(2) NOT NULL,
  `idFormato` int(2) NOT NULL,
  `dataInicio` date NOT NULL,
  `dataFinal` date NOT NULL,
  `idMedicao` int(2) NOT NULL,
  `idUrl` int(4) NOT NULL,
  `descritor` varchar(500) NOT NULL,
  PRIMARY KEY (`idIdentificacao`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `mem_identificacao`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `mem_local`
--

CREATE TABLE IF NOT EXISTS `mem_local` (
  `idLocal` int(2) NOT NULL AUTO_INCREMENT,
  `nomeLocal` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idLocal`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Extraindo dados da tabela `mem_local`
--

INSERT INTO `mem_local` (`idLocal`, `nomeLocal`) VALUES
(1, 'Anexo Adoniram Barbosa'),
(2, 'Espaço Cênico Ademar Guerra'),
(3, 'Foyer / Espaço Flávio Império'),
(4, 'Jardim - Lado Vergueiro'),
(5, 'Jardim - Lado 23 de Maio'),
(6, 'Jardim Luiz Telles'),
(7, 'Não Identificado'),
(8, 'Piso 23 de Maio'),
(9, 'Piso 796'),
(10, 'Piso Caio Graco'),
(11, 'Piso Flávio de Carvalho'),
(12, 'Praça das Bibliotecas / Espaço Mario Chamie'),
(13, 'Sala Adoniram Barbosa'),
(14, 'Sala de Debates'),
(15, 'Sala Jardel Filho'),
(16, 'Sala Lima Barreto'),
(17, 'Sala Paulo Emílio Salles Gomes'),
(18, 'Sala Tarsila do Amaral'),
(19, 'Sala Zero');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mem_log`
--

CREATE TABLE IF NOT EXISTS `mem_log` (
  `idLog` int(2) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(2) DEFAULT NULL,
  `dataLog` datetime NOT NULL,
  `descricao` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idLog`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `mem_log`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `mem_medicao`
--

CREATE TABLE IF NOT EXISTS `mem_medicao` (
  `idMedicao` int(2) NOT NULL AUTO_INCREMENT,
  `exemplar` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `paginas` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `altura` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `larguraComprimento` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `profundidade` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `duracao` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `tamanhoDigital` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dimensaoDigital` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idMedicao`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `mem_medicao`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `mem_notacao`
--

CREATE TABLE IF NOT EXISTS `mem_notacao` (
  `idNotacao` int(2) NOT NULL AUTO_INCREMENT,
  `primeiroSegmento` longtext COLLATE utf8_unicode_ci NOT NULL,
  `segundoSegmento` longtext COLLATE utf8_unicode_ci NOT NULL,
  `terceiroSegmento` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idNotacao`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `mem_notacao`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `mem_papelusuario`
--

CREATE TABLE IF NOT EXISTS `mem_papelusuario` (
  `idPapelUsuario` int(3) NOT NULL AUTO_INCREMENT,
  `nomePapelUsuario` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `acesso` longtext COLLATE utf8_unicode_ci NOT NULL,
  `usuario` int(1) NOT NULL,
  `admin` int(1) NOT NULL,
  `memoria` int(1) NOT NULL,
  PRIMARY KEY (`idPapelUsuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `mem_papelusuario`
--

INSERT INTO `mem_papelusuario` (`idPapelUsuario`, `nomePapelUsuario`, `acesso`, `usuario`, `admin`, `memoria`) VALUES
(1, 'Administrador ', '', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mem_responsabilidade`
--

CREATE TABLE IF NOT EXISTS `mem_responsabilidade` (
  `idResponsabilidade` int(4) NOT NULL AUTO_INCREMENT,
  `responsabilidade` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idResponsabilidade`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Extraindo dados da tabela `mem_responsabilidade`
--

INSERT INTO `mem_responsabilidade` (`idResponsabilidade`, `responsabilidade`) VALUES
(1, 'Artista'),
(2, 'Curador'),
(3, 'Coordenador'),
(4, 'Coreógrafo'),
(5, 'Desenhista'),
(6, 'Diretor'),
(7, 'Fotógrafo'),
(8, 'Grupo'),
(9, 'Não Identificado'),
(10, 'Palestrante'),
(11, 'Pesquisador'),
(12, 'Produtor'),
(13, 'Proprietário');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mem_responsavel`
--

CREATE TABLE IF NOT EXISTS `mem_responsavel` (
  `idResponsavel` int(2) NOT NULL AUTO_INCREMENT,
  `idResponsabilidade` int(4) DEFAULT NULL,
  `nome` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefoneContato` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instituicao` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idResponsavel`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `mem_responsavel`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `mem_suporte`
--

CREATE TABLE IF NOT EXISTS `mem_suporte` (
  `idSuporte` int(2) NOT NULL AUTO_INCREMENT,
  `suporte` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idSuporte`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `mem_suporte`
--

INSERT INTO `mem_suporte` (`idSuporte`, `suporte`) VALUES
(1, 'Disco Ótico / Policarbonato'),
(2, 'Filme '),
(3, 'Metal'),
(4, 'Papel'),
(5, 'Papel Emulsionado'),
(6, 'Tecido');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mem_tecnica`
--

CREATE TABLE IF NOT EXISTS `mem_tecnica` (
  `idTecnica` int(2) NOT NULL AUTO_INCREMENT,
  `tecnica` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idTecnica`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `mem_tecnica`
--

INSERT INTO `mem_tecnica` (`idTecnica`, `tecnica`) VALUES
(1, 'Datilografia'),
(2, 'Filmagem Analógica'),
(3, 'Filmagem Digital'),
(4, 'Fotografia Analógica'),
(5, 'Fotografia Digital'),
(6, 'Gravação Analógica'),
(7, 'Gravação Digital'),
(8, 'Impressão');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mem_tipo`
--

CREATE TABLE IF NOT EXISTS `mem_tipo` (
  `idTipo` int(2) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idTipo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=35 ;

--
-- Extraindo dados da tabela `mem_tipo`
--

INSERT INTO `mem_tipo` (`idTipo`, `tipo`) VALUES
(1, 'Anuário'),
(2, 'Ata'),
(3, 'Áudio'),
(4, 'Cartão de Visitas'),
(5, 'Cartão Comemorativo'),
(6, 'Cartão Postal'),
(7, 'Cartaz'),
(8, 'Catálogo'),
(9, 'Certificado'),
(10, 'Convite'),
(11, 'Crachá'),
(12, 'Decreto'),
(13, 'Edital'),
(14, 'Ficha'),
(15, 'Filipeta'),
(16, 'Folheto'),
(17, 'Fotografia'),
(18, 'Jornal'),
(19, 'Legislação'),
(20, 'Livro'),
(21, 'Marcador de Páginas'),
(22, 'Matéria Jornalística'),
(23, 'Objeto de Homenagem'),
(24, 'Objeto de Premiação'),
(25, 'Objeto Histórico'),
(26, 'Planta'),
(27, 'Programa'),
(28, 'Projeto Executado'),
(29, 'Projeto Não Executad'),
(30, 'Proposta'),
(31, 'Relatório'),
(32, 'Tese'),
(33, 'Transcrição'),
(34, 'Vídeo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mem_url`
--

CREATE TABLE IF NOT EXISTS `mem_url` (
  `idUrl` int(4) NOT NULL AUTO_INCREMENT,
  `url` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUrl`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `mem_url`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `mem_usuario`
--

CREATE TABLE IF NOT EXISTS `mem_usuario` (
  `idUsuario` int(2) NOT NULL AUTO_INCREMENT,
  `idPapelUsuario` int(2) NOT NULL,
  `senha` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `receberNotificacao` tinyint(1) NOT NULL,
  `nomeUsuario` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `nomeCompleto` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` int(20) NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `mem_usuario`
--

INSERT INTO `mem_usuario` (`idUsuario`, `idPapelUsuario`, `senha`, `receberNotificacao`, `nomeUsuario`, `email`, `nomeCompleto`, `telefone`) VALUES
(1, 1, '4f8ed3947c', 0, 'ccsplab', 'ccsplab@gmail.com', 'ccslpab dic', 11223344);
