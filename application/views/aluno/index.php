<?php
session_start();
require ("../../config/config.php");
require ("../../config/Conn.class.php");
require ("../../models/TurmaDAO.class.php");
require ("../../models/PPDAO.class.php");
require ("../../models/AtividadeDAO.class.php");
require ("../../models/UsuarioDAO.class.php");

$turmas = new TurmaDAO();
$pps = new PPDAO();
$atividades = new AtividadeDAO();
$UsuarioDAO = new UsuarioDAO();
 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="../../../system/css/navbar.css" />
    <link rel="stylesheet" type="text/css" href="../../../system/css/style.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet" />
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
            <li><a href="#" class="config"><i class="fas fa-cog"></i><span class="spanConfig">Configurações</span></a></li>
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
                foreach ($UsuarioDAO->obterUsuario($_SESSION['usuario']) as $user){
                    echo "<li>Olá, " . $user["nomeUsuario"] . "!" . "</li>";
                }
                ?>
                <li class="rmUser"><?php echo "RM: ".  $_SESSION['usuario']; ?></li>
                <li class="cursoUser">Curso: Informática</li>
                <li class="serieUser">Série: 3ºAi</li>
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
                        foreach ($pps->buscarAlunoPP($_SESSION['usuario']) as $pp){
                            echo "<tr>";
                            echo '<td class="celulaMateria">'. $pp["disciplinaPP"] .'</option>';
                            echo '<td class="celulaProfessor">'. $pp["nomeUsuario"] .'</option>';
                            echo '<td class="celulaConcluiu">'. $pp["statusPP"] .'</option>';
                            echo '<td class="celulaMencao">'. $pp["mencaoFinal"] .'</option>';
                            echo "</tr>";
                        }
                    ?>
                </table>
            </div>
            <button class="consultarpp">Consultar PP's</button>
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
                        foreach ($turmas->buscarTurmaAluno($_SESSION['usuario']) as $turma){
                            echo '<option value="'. $turma{"codDisciplina"} . '">' . $turma["nomeDisciplina"] .'</option>';
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
                    <h3>Atribuída(1)</h3>
                        <?php
                            foreach ($atividades->listarAtividadeAluno($_SESSION['usuario']) as $atividade){
                                echo "<div class='ativ' id='atividade'>";
                                echo "<span class='nome-ativ'>" . $atividade["titulo_atividade"] . "</span>";
                                echo "<span class='prazo'>" . $atividade["prazo_entrega"] . "</span><br>";
                                echo "</div>";
                            }
                            
                        ?>
                    
                </div>
                <div class="concluida">
                    <h3>Concluída(0)</h3>
                    <!--<div class="ativ">Ativar isso aqui caso tenham atividades concluidas
                        <span class="nome-ativ"></span>
                        <span class="prazo"></span>
                    </div>-->
                    <div class="vazio">
                        <span>Você não possuí atividades concluídas!</span>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <footer id="rodape">
        <div class="rodape">
            <div class="rodape2">
                <a href="https://www.crowntech.rf.gd" target="_blank"><img src="../../../system/img/crowntech.png"
                        class="logo-rodape" /></a>
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
        <div class="modal">
            <h3 class="tituloModal">Criação de listas ordenadas e não ordenadas.</h3>
            <div class="conteudo-modal">
                <div class="descricao">
                    <span>Crie um contexto e uma página com listas ordenadas e não ordenadas.</span>
                </div>
                <div class="material">
                        <div class="materiais">
                            <a href="#" download="NomeAtividade.txt" class="label">Atividade</a>
                            <i class="fas fa-download"></i>
                        </div>
                    <span class="prazo-entrega">Prazo de entrega: 27/05/2020 até 23:59.</span>
                </div>
                <div class="upload">
                    <span class="tituloUpload">Fazer upload de arquivo</span>
                    <form action="" method="POST">
                        <div class="materiais">
                            <label for="upload" class="label" id="label">Selecionar arquivo...</label>
                            <input type="file" name="upload" id="upload">
                            <i class="fas fa-upload"></i>
                        </div>
                        <input type="submit" value="Enviar" class="btnEnviar">
                        <div class="botao">Fechar</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../../../system/js/app.js"></script>
</body>

</html>