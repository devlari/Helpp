<?php
session_start();
require("../../config/config.php");
require("../../config/Conn.class.php");
require("../../models/TurmaDAO.class.php");
require("../../models/PPDAO.class.php");
require("../../models/AtividadeDAO.class.php");
require("../../models/UsuarioDAO.class.php");
require("../../models/AlunoDAO.class.php");
require("../../../application/models/DisciplinaDAO.class.php");

$disciplina = new DisciplinaDAO();
$turmas = new TurmaDAO();
$pps = new PPDAO();
$atividades = new AtividadeDAO();
$UsuarioDAO = new UsuarioDAO();
$aluno = new AlunoDAO();

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
            <li><a href="index.php" class="inicio"><i class="fas fa-home"></i><span class="spanInicio">Início</span></a></li>
            <li><a href="#tela2" class="ativid"><i class="fas fa-file-alt"></i><span class="spanAtiv">Atividades</span></a></li>
            <li><a href="../configUsuario.php" class="config"><i class="fas fa-cog"></i><span class="spanConfig">Configurações</span></a></li>
            <li><a href="../../index.php" class="sair"><i class="fas fa-power-off"><span class="spanSair">Sair</span></i></a></li>

        </ul>
        <div class="burguer" id="burger">
            <div class="linha1"></div>
            <div class="linha2"></div>
            <div class="linha3"></div>
        </div>
    </nav>

    <section class="conteudo" id="tela">
        <div class="dados-user" id="dadosAluno">
            <ul>
                <?php
                foreach ($UsuarioDAO->obterUsuario($_SESSION['usuario']) as $user) {
                    echo "<li class='Ola'>Olá, <span id='nomeUsuario'>" . $user["nomeUsuario"] . "</span>!" . "</li>";
                }
                foreach ($pps->buscarAlunoPP($_SESSION['usuario']) as $user) {
                    echo "<li>Curso: " . $user["cursoPP"] . "</li>";
                }
                foreach ($aluno->getTurmaAluno($_SESSION['usuario']) as $user) {
                    echo "<li>Série: " . $user["nome_turma"] . "</li>";
                }
                ?>
            </ul>
        </div>
        <div class="retangulo-pp" id='tabelaPPSALUNO'>
            <div class="tabela-pps" cellspacing="0">
                <table id="tabelaPPs">
                    <tr>
                        <th class="headerMateria">Matéria da PP</th>
                        <th class="headerProfessor">Professores</th>
                        <th class="headerConcluiu">Status</th>
                        <th class="headerMencao">Menção</th>
                    </tr>
                    <?php
                    foreach ($pps->buscarAlunoPP($_SESSION['usuario']) as $pp) {
                        echo "<tr>";
                        echo '<td class="celulaMateria">' . $pp["disciplinaPP"] . '</option>';
                        echo '<td class="celulaProfessor">' . $pp["nomeUsuario"] . '</option>';
                        echo '<td class="celulaConcluiu">' . $pp["statusPP"] . '</option>';
                        echo '<td class="celulaMencao">' . $pp["mencaoFinal"] . '</option>';
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </section>
    <div class="Atividade-titulo">
        <h1>Atividades</h1>
    </div>
    <section class="atividades" id="tela2">
        <form>
            <div class="filtro">
                <label for="filtro_disciplina">
                    <h1>Disciplina:</h1>
                </label>
                <select class="filtro_txt" name="filtro_disciplina" id="filtro_disciplina">
                    <?php
                    foreach ($disciplina->verificaAlunoDisciplina($_SESSION['usuario']) as $disc) {
                        echo '<option value="' . $disc{
                        "codDisciplina"} . '">' . $disc["nomeDisciplina"] . '</option>';
                    }
                    ?>
                </select>
                <div class="botao_search">
                    <input type="submit" value=" " class="botao2"><i class="fas fa-search"></i>
                </div>
            </div>
        </form>
        <div class="retangulo-ativ">
            <div class="quadro-ativ">
                <div class="atribuida">
                    <h3>Atribuída(<?php
                        $atividadesAtribuidas = $atividades->contarAtividadeAlunoAtribuida($_SESSION['usuario']);
                        foreach ($atividadesAtribuidas as $resultado){
                            $quantidadeAtribuido = $resultado['COUNT(codAtividade)'];
                            echo $resultado['COUNT(codAtividade)'];
                        }
                    ?>)</h3>
                    <?php
                    if ($quantidadeAtribuido == 0)
                    {
                        echo '<div class="vazio">
                        <span>Você não possuí atividades atribuídas!</span>
                        </div>';
                    }
                    else
                    {
                        foreach ($atividades->listarAtividadeAlunoAtribuida($_SESSION['usuario']) as $atividade) {
                            $dataArrumada = explode("-", $atividade["prazo_entrega"]);
                            $dataNova = $dataArrumada[2] . "/" . $dataArrumada[1] . "/" . $dataArrumada[0];
                            echo "<div class='ativ atribuidaa'>";
                            echo "<input type='hidden' id='codigoAtividade' value='" . $atividade['codAtividade'] . "'>";
                            echo "<span class='nome-ativ'>" . $atividade["titulo_atividade"] . "</span>";
                            echo "<span class='prazo'>Prazo de entrega: " . $dataNova . "</span><br>";
                            echo "</div>";
                        }
                    }
                    ?>

                </div>
                <div class="concluida">
                    <h3>Concluída(<?php
                        $atividadesConcluidas = $atividades->contarAtividadeAlunoConcluida($_SESSION['usuario']);
                        foreach ($atividadesConcluidas as $resultado){
                           echo $resultado['COUNT(codAtividade)'];
                           $quantidadeConcluida = $resultado['COUNT(codAtividade)'];
                        }
                    ?>)</h3>
                    
                    <?php
                    if ($quantidadeConcluida == 0)
                    {
                        echo '<div class="vazio">
                        <img src="../../../system/img/vazio.svg" alt="Vazio!" class="svg-vazio"/>
                        <span>Você não possui atividades concluidas!</span>
                        </div>';
                    }
                    else
                    {
                        foreach ($atividades->listarAtividadeAlunoConcluida($_SESSION['usuario']) as $atividade) {
                            $dataArrumada = explode("-", $atividade["data_conclusao"]);
                            $dataNova = $dataArrumada[2] . "/" . $dataArrumada[1] . "/" . $dataArrumada[0];
                            echo "<div class='ativ concluidaa'>";
                            echo "<span class='nome-ativ'>" . $atividade["titulo_atividade"] . "</span>";
                            echo "<span class='prazo'>Entregue em: " . $dataNova . "</span><br>";
                            echo "</div>";
                        }
                    }
                    ?>
                </div>
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
    <div class="modal-container" id="modal-atividade">
        <div class="modal" id="modal-ativ-aluno">

        </div>
    </div>
    <script src="../../../system/js/app.js"></script>
</body>

</html>