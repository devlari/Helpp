-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Dez-2020 às 18:08
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

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `atividade`
--
ALTER TABLE `atividade`
  ADD PRIMARY KEY (`codAtividade`),
  ADD KEY `fk_disciplinaAtividade` (`PP_Disciplina_codDisciplina`),
  ADD KEY `fk_AlunoAtividade` (`PP_Aluno_rmAluno`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `atividade`
--
ALTER TABLE `atividade`
  MODIFY `codAtividade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `atividade`
--
ALTER TABLE `atividade`
  ADD CONSTRAINT `fk_AlunoAtividade` FOREIGN KEY (`PP_Aluno_rmAluno`) REFERENCES `pp` (`aluno_rmAluno`),
  ADD CONSTRAINT `fk_disciplinaAtividade` FOREIGN KEY (`PP_Disciplina_codDisciplina`) REFERENCES `pp` (`disciplina_codDisciplina`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
