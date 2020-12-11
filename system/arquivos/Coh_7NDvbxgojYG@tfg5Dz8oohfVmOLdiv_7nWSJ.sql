-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Dez-2020 às 18:09
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `helpp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `rmAluno` decimal(6,0) NOT NULL,
  `rmUsuario` decimal(6,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`rmAluno`, `rmUsuario`) VALUES
('170031', '170031'),
('170381', '170381'),
('180057', '180057'),
('180114', '180114'),
('180242', '180242'),
('180245', '180245'),
('180375', '180375'),
('180649', '180649');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_turma`
--

CREATE TABLE `aluno_turma` (
  `aluno_rmUsuario` decimal(6,0) NOT NULL,
  `rmAluno` decimal(6,0) NOT NULL,
  `codTurma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aluno_turma`
--

INSERT INTO `aluno_turma` (`aluno_rmUsuario`, `rmAluno`, `codTurma`) VALUES
('180114', '180114', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividade`
--

CREATE TABLE `atividade` (
  `codAtividade` int(11) NOT NULL,
  `PP_Disciplina_codDisciplina` int(11) NOT NULL,
  `PP_Aluno_rmAluno` decimal(6,0) NOT NULL,
  `titulo_atividade` varchar(50) NOT NULL,
  `instrucao_atividade` varchar(100) NOT NULL,
  `data_conclusao` date NOT NULL,
  `prazo_entrega` date NOT NULL,
  `forma_entrega` varchar(50) NOT NULL,
  `mencao_atividade` varchar(10) DEFAULT NULL,
  `status` varchar(30) NOT NULL,
  `arquivo` varbinary(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `atividade`
--

INSERT INTO `atividade` (`codAtividade`, `PP_Disciplina_codDisciplina`, `PP_Aluno_rmAluno`, `titulo_atividade`, `instrucao_atividade`, `data_conclusao`, `prazo_entrega`, `forma_entrega`, `mencao_atividade`, `status`, `arquivo`) VALUES
(1, 1, '180114', 'Exemplo Atividade', 'Fazer a atividade exemplo como estiver escrito', '2020-06-10', '2020-06-01', 'Pessoalmente', 'I', 'Não entregue', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `cod_curso` int(11) NOT NULL,
  `eixo_curso` varchar(30) NOT NULL,
  `nome_curso` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`cod_curso`, `eixo_curso`, `nome_curso`) VALUES
(1, 'Tecnologia', 'Desenvolvimento de Sistemas'),
(2, 'Tecnologia', 'Técnico em Eletrônica'),
(3, 'Logística', 'Técnico em Logística');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `codDisciplina` int(11) NOT NULL,
  `nomeDisciplina` varchar(100) NOT NULL,
  `siglaDisciplina` varchar(10) NOT NULL,
  `codTurma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`codDisciplina`, `nomeDisciplina`, `siglaDisciplina`, `codTurma`) VALUES
(1, 'Lógica de Programação', 'LP', 1),
(2, 'Aplicativos informatizados', 'AI', 2),
(3, 'Técnicas em arduino', 'TA', 2),
(56, 'Português', 'LPL', 1),
(63, 'Opa', '', 1),
(64, 'TECNOLOGIAS E LINGUAGENS PARA BANCO DE DADOS I E II', '', 4),
(65, 'MATEMÁTICA', '', 4),
(66, 'QUÍMICA', '', 52),
(67, 'LÓGICA DE PROGRAMAÇÃO', '', 52),
(68, 'LÍNGUA ESTRANGEIRA MODERNA - INGLÊS E COMUNICAÇÃO PROFISSIONAL', '', 4),
(69, 'SOCIOLOGIA', '', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `gestor`
--

CREATE TABLE `gestor` (
  `rmGestor` decimal(6,0) NOT NULL,
  `rmUsuario` decimal(6,0) NOT NULL,
  `cargoGestor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `gestor`
--

INSERT INTO `gestor` (`rmGestor`, `rmUsuario`, `cargoGestor`) VALUES
('180115', '180115', 'Orientadora Educacional');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pp`
--

CREATE TABLE `pp` (
  `aluno_rmAluno` decimal(6,0) NOT NULL,
  `disciplina_codDisciplina` int(11) NOT NULL,
  `gestor_rmGestor` decimal(6,0) NOT NULL,
  `cursoPP` varchar(30) NOT NULL,
  `semestrePP` varchar(20) NOT NULL,
  `anoPP` decimal(4,0) NOT NULL,
  `mencaoFinal` char(2) DEFAULT NULL,
  `seriePP` varchar(10) NOT NULL,
  `statusPP` varchar(50) NOT NULL,
  `disciplinaPP` varchar(50) NOT NULL,
  `habilidadePP` varchar(80) NOT NULL,
  `conhecimentoPP` varchar(80) NOT NULL,
  `tecnologiaPP` varchar(80) NOT NULL,
  `dataTermino` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pp`
--

INSERT INTO `pp` (`aluno_rmAluno`, `disciplina_codDisciplina`, `gestor_rmGestor`, `cursoPP`, `semestrePP`, `anoPP`, `mencaoFinal`, `seriePP`, `statusPP`, `disciplinaPP`, `habilidadePP`, `conhecimentoPP`, `tecnologiaPP`, `dataTermino`) VALUES
('170031', 64, '180115', 'Informática', '2º SEM', '2019', NULL, '2ª SÉRIE', 'Em aberto', 'TECNOLOGIAS E LINGUAGENS PARA BANCO DE DADOS I E I', '', '', '', NULL),
('170031', 68, '180115', 'Informática', '2º SEM', '2019', NULL, '2ª SÉRIE', 'Em aberto', 'LÍNGUA ESTRANGEIRA MODERNA - INGLÊS E COMUNICAÇÃO ', '', '', '', NULL),
('170381', 65, '180115', 'Informática', '2º SEM', '2019', NULL, '2ª SÉRIE', 'Em aberto', 'MATEMÁTICA', '', '', '', NULL),
('170381', 66, '180115', 'Informática', '1º SEM', '2017', NULL, '1ª SÉRIE', 'Em aberto', 'QUÍMICA', '', '', '', NULL),
('170381', 67, '180115', 'Informática', '1º SEM', '2017', NULL, '1ª SÉRIE', 'Em aberto', 'LÓGICA DE PROGRAMAÇÃO', '', '', '', NULL),
('180057', 64, '180115', 'Informática', '2º SEM', '2019', NULL, '2ª SÉRIE', 'Em aberto', 'TECNOLOGIAS E LINGUAGENS PARA BANCO DE DADOS I E I', '', '', '', NULL),
('180114', 1, '180115', 'Informática', '2 semestre', '2019', '', '2 ano', 'Em aberto', 'Lógica de Programação', 'Exemplo habilidade Exemplo habilidade', 'Exemplo conhecimento Exemplo conhecimento', 'Exemplo tecnologia Exemplo tecnologia', '0000-00-00'),
('180242', 64, '180115', 'Informática', '2º SEM', '2019', NULL, '2ª SÉRIE', 'Em aberto', 'TECNOLOGIAS E LINGUAGENS PARA BANCO DE DADOS I E I', '', '', '', NULL),
('180245', 64, '180115', 'Informática', '2º SEM', '2019', NULL, '2ª SÉRIE', 'Em aberto', 'TECNOLOGIAS E LINGUAGENS PARA BANCO DE DADOS I E I', '', '', '', NULL),
('180375', 64, '180115', 'Informática', '2º SEM', '2019', NULL, '2ª SÉRIE', 'Em aberto', 'TECNOLOGIAS E LINGUAGENS PARA BANCO DE DADOS I E I', '', '', '', NULL),
('180649', 69, '180115', 'Informática', '2º SEM', '2019', NULL, '2ª SÉRIE', 'Em aberto', 'SOCIOLOGIA', '', '', '', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `rmProfessor` decimal(6,0) NOT NULL,
  `rmUsuario` decimal(6,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`rmProfessor`, `rmUsuario`) VALUES
('180113', '180113'),
('180120', '180120');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor_disciplina`
--

CREATE TABLE `professor_disciplina` (
  `professor_rmUsuario` decimal(6,0) NOT NULL,
  `professor_rmProfessor` decimal(6,0) NOT NULL,
  `codDisciplina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `professor_disciplina`
--

INSERT INTO `professor_disciplina` (`professor_rmUsuario`, `professor_rmProfessor`, `codDisciplina`) VALUES
('180113', '180113', 1),
('180113', '180113', 2),
('180120', '180120', 66);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor_pp`
--

CREATE TABLE `professor_pp` (
  `rm_professor` decimal(6,0) NOT NULL,
  `cod_pp_rmAluno` decimal(6,0) NOT NULL,
  `cod_pp_codDisciplina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `professor_pp`
--

INSERT INTO `professor_pp` (`rm_professor`, `cod_pp_rmAluno`, `cod_pp_codDisciplina`) VALUES
('180113', '180114', 1),
('180113', '170031', 1),
('180113', '180649', 1),
('180113', '180649', 1),
('180113', '180057', 1),
('180113', '170381', 1),
('180113', '180242', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `cod_turma` int(11) NOT NULL,
  `cod_curso` int(11) DEFAULT NULL,
  `nome_turma` varchar(50) NOT NULL,
  `ano_turma` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`cod_turma`, `cod_curso`, `nome_turma`, `ano_turma`) VALUES
(1, 3, '3AI', '2020'),
(2, 2, '3AE', '2020'),
(3, 3, '1AL', '2019'),
(4, 1, '2ª SÉRIE', '2019'),
(6, 1, '3BL', '2020'),
(46, 2, '3BE', '2020'),
(52, 1, '1ª SÉRIE', '2017');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `rmUsuario` decimal(6,0) NOT NULL,
  `nomeUsuario` varchar(55) NOT NULL,
  `emailUsuario` varchar(55) NOT NULL,
  `senhaUsuario` varchar(55) NOT NULL,
  `perfilUsuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`rmUsuario`, `nomeUsuario`, `emailUsuario`, `senhaUsuario`, `perfilUsuario`) VALUES
('170031', 'LUCAS AMORIM DE OLIVEIRA', '', '', 'Aluno'),
('170381', 'KAROL OLIVEIRA CIRQUEIRA', '', 'senha', 'Aluno'),
('180057', 'JOÃO VITOR CARDOSO GOLIN', '', '', 'Aluno'),
('180113', 'João Silva', 'joão.silva01@etec.sp.gov.br', '123456', 'Professor'),
('180114', 'Janaina Souza', 'janaina.souza02@etec.sp.gov.br', '101010', 'Aluno'),
('180115', 'Flávia Nascimento', 'flavia.nascimento03@etec.sp.gov.br', '545454', 'Gestor'),
('180120', 'Márcia Zanzarini', '', '666666', 'professor'),
('180242', 'MATHEUS SILVA', '', '', 'Aluno'),
('180245', 'KAWAN FRITOLI GOMES', '', '', 'Aluno'),
('180375', 'LUIZ FELIPE DE MELO AZEVEDO', '', '', 'Aluno'),
('180649', 'PEDRO HENRIQUE DAMBROSIO DA CRUZ', '', '', 'Aluno');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`rmAluno`,`rmUsuario`),
  ADD KEY `rmUsuario` (`rmUsuario`);

--
-- Índices para tabela `aluno_turma`
--
ALTER TABLE `aluno_turma`
  ADD KEY `rmAluno` (`rmAluno`),
  ADD KEY `aluno_rmUsuario` (`aluno_rmUsuario`),
  ADD KEY `codTurma` (`codTurma`);

--
-- Índices para tabela `atividade`
--
ALTER TABLE `atividade`
  ADD PRIMARY KEY (`codAtividade`),
  ADD KEY `fk_disciplinaAtividade` (`PP_Disciplina_codDisciplina`),
  ADD KEY `fk_AlunoAtividade` (`PP_Aluno_rmAluno`);

--
-- Índices para tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`cod_curso`);

--
-- Índices para tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`codDisciplina`),
  ADD KEY `codTurma` (`codTurma`);

--
-- Índices para tabela `gestor`
--
ALTER TABLE `gestor`
  ADD PRIMARY KEY (`rmGestor`,`rmUsuario`),
  ADD KEY `rmUsuario` (`rmUsuario`);

--
-- Índices para tabela `pp`
--
ALTER TABLE `pp`
  ADD PRIMARY KEY (`aluno_rmAluno`,`disciplina_codDisciplina`),
  ADD KEY `fk_rmGestor` (`gestor_rmGestor`),
  ADD KEY `fk_discPP` (`disciplina_codDisciplina`);

--
-- Índices para tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`rmProfessor`,`rmUsuario`),
  ADD KEY `rmUsuario` (`rmUsuario`) USING BTREE;

--
-- Índices para tabela `professor_disciplina`
--
ALTER TABLE `professor_disciplina`
  ADD KEY `professor_rmProfessor` (`professor_rmProfessor`),
  ADD KEY `professor_rmUsuario` (`professor_rmUsuario`),
  ADD KEY `codDisciplina` (`codDisciplina`);

--
-- Índices para tabela `professor_pp`
--
ALTER TABLE `professor_pp`
  ADD KEY `rm_professor` (`rm_professor`),
  ADD KEY `cod_pp_rmAluno` (`cod_pp_rmAluno`),
  ADD KEY `cod_pp_codDisciplina` (`cod_pp_codDisciplina`);

--
-- Índices para tabela `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`cod_turma`),
  ADD KEY `cod_curso` (`cod_curso`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`rmUsuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `atividade`
--
ALTER TABLE `atividade`
  MODIFY `codAtividade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `curso`
--
ALTER TABLE `curso`
  MODIFY `cod_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `codDisciplina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de tabela `turma`
--
ALTER TABLE `turma`
  MODIFY `cod_turma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `aluno_ibfk_1` FOREIGN KEY (`rmUsuario`) REFERENCES `usuario` (`rmUsuario`);

--
-- Limitadores para a tabela `aluno_turma`
--
ALTER TABLE `aluno_turma`
  ADD CONSTRAINT `aluno_turma_ibfk_1` FOREIGN KEY (`rmAluno`) REFERENCES `aluno` (`rmAluno`),
  ADD CONSTRAINT `aluno_turma_ibfk_2` FOREIGN KEY (`aluno_rmUsuario`) REFERENCES `aluno` (`rmUsuario`),
  ADD CONSTRAINT `aluno_turma_ibfk_3` FOREIGN KEY (`codTurma`) REFERENCES `turma` (`cod_turma`);

--
-- Limitadores para a tabela `atividade`
--
ALTER TABLE `atividade`
  ADD CONSTRAINT `fk_AlunoAtividade` FOREIGN KEY (`PP_Aluno_rmAluno`) REFERENCES `pp` (`aluno_rmAluno`),
  ADD CONSTRAINT `fk_disciplinaAtividade` FOREIGN KEY (`PP_Disciplina_codDisciplina`) REFERENCES `pp` (`disciplina_codDisciplina`);

--
-- Limitadores para a tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD CONSTRAINT `disciplina_ibfk_1` FOREIGN KEY (`codTurma`) REFERENCES `turma` (`cod_turma`);

--
-- Limitadores para a tabela `gestor`
--
ALTER TABLE `gestor`
  ADD CONSTRAINT `gestor_ibfk_1` FOREIGN KEY (`rmUsuario`) REFERENCES `usuario` (`rmUsuario`);

--
-- Limitadores para a tabela `pp`
--
ALTER TABLE `pp`
  ADD CONSTRAINT `fk_alunoPP` FOREIGN KEY (`aluno_rmAluno`) REFERENCES `aluno` (`rmAluno`),
  ADD CONSTRAINT `fk_discPP` FOREIGN KEY (`disciplina_codDisciplina`) REFERENCES `disciplina` (`codDisciplina`),
  ADD CONSTRAINT `fk_rmGestor` FOREIGN KEY (`gestor_rmGestor`) REFERENCES `gestor` (`rmGestor`);

--
-- Limitadores para a tabela `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `professor_ibfk_1` FOREIGN KEY (`rmUsuario`) REFERENCES `usuario` (`rmUsuario`);

--
-- Limitadores para a tabela `professor_disciplina`
--
ALTER TABLE `professor_disciplina`
  ADD CONSTRAINT `professor_disciplina_ibfk_1` FOREIGN KEY (`professor_rmProfessor`) REFERENCES `professor` (`rmProfessor`),
  ADD CONSTRAINT `professor_disciplina_ibfk_2` FOREIGN KEY (`professor_rmUsuario`) REFERENCES `professor` (`rmUsuario`),
  ADD CONSTRAINT `professor_disciplina_ibfk_3` FOREIGN KEY (`codDisciplina`) REFERENCES `disciplina` (`codDisciplina`);

--
-- Limitadores para a tabela `professor_pp`
--
ALTER TABLE `professor_pp`
  ADD CONSTRAINT `professor_pp_ibfk_1` FOREIGN KEY (`rm_professor`) REFERENCES `professor` (`rmProfessor`),
  ADD CONSTRAINT `professor_pp_ibfk_2` FOREIGN KEY (`cod_pp_rmAluno`) REFERENCES `pp` (`aluno_rmAluno`),
  ADD CONSTRAINT `professor_pp_ibfk_3` FOREIGN KEY (`cod_pp_codDisciplina`) REFERENCES `pp` (`disciplina_codDisciplina`);

--
-- Limitadores para a tabela `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `turma_ibfk_1` FOREIGN KEY (`cod_curso`) REFERENCES `curso` (`cod_curso`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
