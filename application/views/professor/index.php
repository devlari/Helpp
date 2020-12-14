<?php
session_start();
require("../../config/config.php");
require("../../config/Conn.class.php");
require("../../models/AlunoDAO.class.php");
require("../../models/TurmaDAO.class.php");
require("../../models/PPDAO.class.php");
require("../../models/Atividade.class.php");
require("../../models/AtividadeDAO.class.php");
require("../../models/UsuarioDAO.class.php");

$turmas = new TurmaDAO();
$pps = new PPDAO();
$atividades = new AtividadeDAO();
$UsuarioDAO = new UsuarioDAO();
$aluno = new AlunoDAO();
$atividade = new Atividade();
$atividadeDAO = new AtividadeDAO();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="../../../system/css/navbar.css" />
    <link rel="stylesheet" type="text/css" href="../../../system/css/style.css">

    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet" />
    <title>Início</title>
    <script src="https://kit.fontawesome.com/43a2aaa0b4.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav id="navbar-helpp">
        <div class="logo">
            <img src="../../../system/img/helpp.png" />
        </div>
        <ul class="nav-links">
            <li><a href="inicioProfessor.php" class="inicio"><i class="fas fa-home"></i><span class="spanInicio">Início</span></a></li>
            <li><a href="#tela2" class="ativid"><i class="fas fa-file-alt"></i><span class="spanAtiv">Atividades</a></span></li>
            <li><a href="cadastroAtividade.php" class="ativid"><i class="far fa-plus-square"></i><span class="spanCriarAtiv">Criar atividade</a></span></li>
            <li><a href="../configUsuario.php" class="config"><i class="fas fa-cog"></i><span class="spanConfig">Configurações</a></span></li>
            <li><a href="../../controllers/logout.php" class="sair"><i class="fas fa-power-off"><span class="spanSair">Sair</i></a></span></li>
        </ul>
        <div class="burguer" id="burger">
            <div class="linha1"></div>
            <div class="linha2"></div>
            <div class="linha3"></div>
        </div>
    </nav>

    <section class="conteudo-prof" id="tela">
        <div class="dados-user">
            <ul>
                <?php
                foreach ($UsuarioDAO->obterUsuario($_SESSION['usuario']) as $user) {
                    echo "<li>Olá, <span id='nomeUsuario'>" . $user["nomeUsuario"] . "</span>!" . "</li>";
                }
                ?>
                <li>Cargo: Professor(a)</li>
            </ul>
        </div>
        <div class="retangulo-pp">
            <div class="div-filtro">
                <form class="filtro-pp">
                    <div class="div-turma">
                        <label for="filtro_turma1" class="lbl_filtro_turma1">
                            <h1>Turma PP:</h1>
                        </label>
                        <select class="filtro-turma1" name="filtro_turma1" id="filtro_turma1">
                            <?php
                            foreach ($turmas->buscarTurmaProfessor($_SESSION['usuario']) as $turma) {
                                echo '<option value="' . $turma["cod_turma"] . '">' . $turma["nome_turma"] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="div-disciplina">
                        <label for="filtro_disciplina">
                            <h1>Disciplina:</h1>
                        </label>
                        <select class="filtro_disciplina1" name="filtro_disciplina" id="filtro_disciplina1">
                            <?php
                            foreach ($turmas->buscarTurmaProfessor($_SESSION['usuario']) as $turma) {
                                echo '<option value="' . $turma{
                                    "codDisciplina"} . '">' . $turma["nomeDisciplina"] . '</option>';
                            }
                            ?>
                        </select>
                    </div>

            </div>
            <div class="tabelaPpProf">
                <table class="tabela-pps-prof" id="tabelaProfsPP">
                    <tr>
                        <th>RM</th>
                        <th class="headerTurmaPP">Turma PP</th>
                        <th class="headerAluno">Aluno</th>
                        <th class="headerDisciplina">Disciplina</th>
                        <th class="headerTurmaAtual">Turma Atual</th>
                        <th class="headerEstado">Status</th>
                    </tr>
                    <?php
                    foreach ($pps->buscarProfPP($_SESSION['usuario']) as $pp) {
                        echo "<tr id='linhaPP'>";
                        echo "<td>" . $pp["rmUsuario"] . "</td>";
                        echo '<td class="celulaTurmaPP">' . $pp["seriePP"] . '</td>';
                        echo '<td class="celulaNomeAluno">' . $pp["nomeUsuario"] . '</td>';
                        echo '<td class="celulaDisciplina">' . $pp["disciplinaPP"] . '</td>';
                        echo '<td class="celulaTurmaAtual">' . $pp["turmaAtualPP"] . '</td>';
                        echo '<td class="celulaEstado">' . $pp["statusPP"] . '</td>';
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
            <input type="submit" class="consultarpp" value="Consultar PP's">
            </form>
        </div>
    </section>
    <section class="atividades_prof" id="tela2">
        <div class="Atividade-titulo">
            <h1>Atividades requisitadas</h1>
        </div>
        <div class="retangulo-ativ">
            <div class="quadro-ativ">
                <div class="atribuida">
                    <?php

                    foreach ($atividades->listarAtividadeProf($_SESSION['usuario']) as $atividade) {
                        $dataArrumada = explode("-", $atividade["prazo_entrega"]);
                        $dataNova = $dataArrumada[2] . "/" . $dataArrumada[1] . "/" . $dataArrumada[0];

                        echo "<div class='ativ ativ-requisitada'>";
                        echo "<input type='hidden' id='codAtiv' value=" . $atividade['codAtividade'] . ">";
                        echo "<span class='nome-ativ'>" . $atividade["titulo_atividade"] . "</span>";
                        echo "<span class='prazo'>Prazo de entrega: " . $dataNova . "</span><br>";
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="Atividade-titulo">
            <h1>Atividades recebidas</h1>
        </div>
        <div class="filtro-atividades">
            <form action="../../controllers/filtroProfessor.php" method="GET">
                <div class="div-turma1">
                    <label for="filtro-turma2">
                        <h1>Turma:</h1>
                    </label>
                    <select name="filtro-turma2" class="filtro-turma2" id="filtro-turma2">
                        <option value="padrao">Todas as turmas</option>
                        <?php
                        if (isset($_SESSION['pesquisa']) && $_SESSION['pesquisa'] == true) {
                            foreach ($turmas->buscarTurmaProfessor($_SESSION['usuario']) as $turma) {
                                if ($_SESSION['turma'] == $turma['cod_turma']) {
                                    echo '<option value="' . $turma["cod_turma"] . '" selected>' . $turma["nome_turma"] . '</option>';
                                } else {
                                    echo '<option value="' . $turma["cod_turma"] . '">' . $turma["nome_turma"]  . '</option>';
                                }
                            }
                        } else {
                            foreach ($turmas->buscarTurmaProfessor($_SESSION['usuario']) as $turma) {
                                echo '<option value="' . $turma["cod_turma"] . '">' . $turma["nome_turma"] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="div-materia">
                    <label for="filtro-materia">
                        <h1>Matéria:</h1>
                    </label>
                    <select name="filtro-materia" class="filtro-materia" id="filtro-materia">
                        <option value="padrao">Todas as matérias</option>
                        <?php
                        if (isset($_SESSION['pesquisa']) && $_SESSION['pesquisa'] == true) {
                            foreach ($turmas->buscarTurmaProfessor($_SESSION['usuario']) as $turma) {
                                if ($_SESSION['materia'] == $turma['codDisciplina']) {
                                    echo '<option value="' . $turma["codDisciplina"] . '" selected>' . $turma["nomeDisciplina"] . '</option>';
                                } else {
                                    echo '<option value="' . $turma["codDisciplina"] . '">' . $turma["nomeDisciplina"]  . '</option>';
                                }
                            }
                        } else {
                            foreach ($turmas->buscarTurmaProfessor($_SESSION['usuario']) as $disciplina) {
                                echo '<option value="' . $turma["codDisciplina"] . '">' . $turma["nomeDisciplina"] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="div-atividade">
                    <label for="filtro-atividade">
                        <h1>Atividade:</h1>
                    </label>
                    <select name="filtro-atividade" class="filtro-atividade" id="filtro-atividade">
                        <option value="padrao">Todas as atividades</option>
                        <?php
                        foreach ($atividades->listarAtividadeProf($_SESSION['usuario']) as $atividade) {
                            echo '<option value="' . $atividade["cod_atividade"] . '">' . $atividade["titulo_atividade"] . '</option>';
                        }
                        if (isset($_SESSION['atividade']) && $_SESSION['pesquisa'] == true) {
                            foreach ($atividades->listarAtividadeProf($_SESSION['usuario']) as $atividade) {
                                if ($_SESSION['atividade'] == $atividade['codAtividade']) {
                                    echo '<option value="' . $atividade["codAtividade"] . '" selected>' . $atividade["titulo_atividade"] . '</option>';
                                } else {
                                    echo '<option value="' . $atividade["codAtividade"] . '">' . $atividade["titulo_atividade"] . '</option>';
                                }
                            }
                        } else {
                            foreach ($atividades->listarAtividadeProf($_SESSION['usuario']) as $atividade) {
                                echo '<option value="' . $atividade["codAtividade"] . '">' . $atividade["titulo_atividade"] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <input type="submit" class="btnConsultar" value="Consultar">
            </form>
            <div class="tabela-atividades" cellspacing="0">

                <?php
                if (isset($_SESSION['pesquisa']) && $_SESSION['pesquisa'] == true) {
                    $alunos = $atividadeDAO->listarAtividadeConcluidaAlunosFiltrado($_SESSION['usuario'], $_SESSION['turma'], $_SESSION['materia'], $_SESSION['atividade']);
                } else {
                    $alunos = $atividadeDAO->listarAtividadeConcluidaAlunos($_SESSION['usuario']);
                }
                if ($atividadeDAO->listarAtividadeConcluidaAlunos($_SESSION['usuario']) == false) {
                    echo "<h1 style='text-align:center;'>Você não atribuiu atividades a nenhum dos alunos!</h1>";
                } else { ?>
                    <table id="tabelaAtividade">
                        <tr>
                            <th class="headerRm">Rm</th>
                            <th class="headerNome">Nome</th>
                            <th class="headerTurma">Turma</th>
                            <th class="headerTurma">Título</th>
                            <th class="headerStatus">Status</th>
                        </tr>
                        <?php
                        foreach ($alunos as $dados) {
                        ?>
                            <tr id="linhaAtiv">
                                <td class="celulaRm"><span class="rmAluno"><?php echo $dados['rmUsuario'] ?></span></td>
                                <td class="celulaNome"><span class="nomeAluno"><?php echo $dados['nomeUsuario'] ?></span></td>
                                <td class="celulaTurma"><span class="turmaPP"><?php echo $dados['nome_turma'] ?></span></td>
                                <td class="celulaTurma"><span class="turmaPP"><?php echo $dados['titulo_atividade'] ?></span></td>
                                <td class="celulaStatus"><?php echo $dados['status'] ?></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                    </table>
            </div>
        </div>

    </section>
    <footer id="rodape">
        <div class="rodape">
            <div class="rodape2">
                <a href="https://www.crowntech.rf.gd" target="_blank"><img src="../../../system/img/crowntech.png" class="logo-rodape" /></a>
                <div class="endereco">
                    <i class="fas fa-map-marker-alt"></i><br />
                    <span class="endereco">R. Alcântara, 113 - Vila Guilherme, São Paulo - SP, 02110-010</span>
                </div>
                <div class="fone">
                    <i class="fas fa-phone-alt"></i><br />
                    <span class="telefone"> (11) 2905-1128<br />
                        (11) 2905-1125</span>
                </div>
                <div class="redes-sociais">
                    <a href="https://www.linkedin.com/crowntech" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    <a href="https://www.twitter.com/crowntech" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.instagram.com/crowntech_" target="_blank"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <div class="modal-container" id="modal-doc-aluno">
        <div class="modal-doc30" id="basesTec">

        </div>
    </div>
    <div class="modal-container" id="modal-atividade-aluno">
        <div class="modal-atividade" id="modal-atividade-recebida">



        </div>
    </div>
    <div class="modal-container" id="modal-atividade-requisitada">
        <div class="modal" id="modal-ativ-requisitada">
        </div>
    </div>
    <script src="../../../system/js/app.js"></script>
</body>

</html>