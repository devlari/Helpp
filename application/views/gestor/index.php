<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../../system/css/navbar.css" />
    <link rel="stylesheet" type="text/css" href="../../../system/css/style.css">

    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet" />
    <title>Início</title>
    <script src="https://kit.fontawesome.com/43a2aaa0b4.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    require("../../../application/config/config.php");
    require("../../../application/config/Conn.class.php");
    require("../../../application/models/PP.class.php");
    require("../../../application/models/PPDAO.class.php");
    require("../../../application/models/TurmaDAO.class.php");
    require('../../models/Curso.class.php');
    require('../../models/CursoDAO.class.php');
    require('../../models/Disciplina.class.php');
    require('../../models/DisciplinaDAO.class.php');
    session_start();
    ?>
    <nav id="navbar-helpp">
        <div class="logo">
            <img src="../../../system/img/helpp.png" />
        </div>
        <ul class="nav-links">
            <li><a href="./" class="inicio"><i class="fas fa-home"></i><span class="spanInicio">Início</span></a></li>
            <li><a href="cadastroCurso.php" class="config"><i class="far fa-plus-square"></i><span class="spanConfig">Criar curso</span></a></li>
            <li><a href="cadastroTurma.php" class="config"><i class="far fa-plus-square"></i><span class="spanConfig">Criar turma</span></a></li>
            <li><a href="cadastroDisciplina.php" class="config"><i class="far fa-plus-square"></i><span class="spanConfig">Criar disciplina</span></a></li>
            <li><a href="../configUsuario.php" class="config"><i class="fas fa-cog"></i><span class="spanConfig">Configurações</span></a></li>
            <li><a href="../../" class="sair"><i class="fas fa-power-off"><span class="spanSair">Sair</span></i></a></li>
        </ul>
        <div class="burguer" id="burger">
            <div class="linha1"></div>
            <div class="linha2"></div>
            <div class="linha3"></div>
        </div>
    </nav>
<<<<<<< HEAD
   
=======
    <?php 
        if(isset($_SESSION['cadastrado'])){
            if($_SESSION['cadastrado']){
                ?>
                <script>
                    alert("Planilha importada com sucesso!")
                </script> <?php
                unset($_SESSION['cadastrado']);
            }else{
                ?>
                <script>
                    alert("Falha na importação da planilha!")
                </script> <?php
            }
        }
        if($_SESSION['cargo'] != "Gestor")
        {
            $_SESSION['erro'] = 3;
            header("location:../../");
        }
    ?>
>>>>>>> 04c97937ac40782cef6a1f1120a7a3d998289b5e
    <section class="conteudo-gestor" id="tela">
        <div class="dados-user">
            <ul>
                <li class="Ola">Olá, Administrador</li>
                <li>Cargo: Gestor(a)</li>
            </ul>
        </div>
        <div class="tabela-pps" cellspacing="0">
            <table id="tabelaPPs">
                <tr>
                    <th class="headerRM">RM</th>
                    <th class="headerNomeAluno">Aluno</th>
                    <th class="headerSerieMod">Série/Módulo</th>
                    <th class="headerMateria">Matéria da PP</th>
                    <th class="headerSemestre">Semestre</th>
                    <th class="headerPeriodo">Periodo</th>
                    <th class="headerProfessor1">Professor 1</th>
                    <th class="headerProfessor2">Professor 2</th>
                    <th class="headerTurmaAtual">Turma atual</th>
                    <th class="headerConcluiu">Concluiu em</th>
                    <th class="headerMencao">Menção</th>
                </tr>
                <?php
                $PPDAO = new PPDAO();
                if ($PPDAO->consultar() == false) {
                    //echo "Não há alunos cadastrados";
                } else {
                    
                    foreach ($PPDAO->consultar() as $Pps) {
                        $rmAluno = $Pps["aluno_rmAluno"];
                        foreach ($PPDAO->buscarDisciplina($Pps["disciplinaPP"]) as $disc) {
                            $codDisc = $disc["codDisciplina"];
                        }
                        echo "<tr id='linhaPPGestor'>";
                        echo "<td class='celulaRM'>" . $Pps["aluno_rmAluno"] . "</td>";
                        echo "<td class='celulaAluno'>" . $Pps["nomeUsuario"] . "</td>";
                        echo "<td class= 'celulaSerie'>" . $Pps["seriePP"] . "</td>";
                        echo "<td class='celulaMateria'>" . $Pps["disciplinaPP"] . "</td>";
                        echo "<td class= 'celulaSemestre'>" .  $Pps["semestrePP"] . "/" . $Pps["anoPP"] . "</td>";
                        echo "<td class= 'celulaPeriodo'>" . $Pps["periodoPP"] . "</td>";

                        $PPDAO->consultarProfPP($rmAluno, $codDisc);
                        $profs = $PPDAO->getResultado();

                        if (sizeof($PPDAO->getResultado()) == 2) {
                            foreach ($PPDAO->getResultado() as $prof) {
                                echo "<td class= 'celulaProfessor1'>" . $prof["nomeUsuario"] . "</td>";
                            }
                        } else {
                            foreach ($PPDAO->getResultado() as $prof) {
                                echo "<td class= 'celulaProfessor1'>" . $prof["nomeUsuario"] . "</td>";
                                echo "<td class='celulaProfessor2'>" .  '' . "</td>";
                            }
                        }

                        echo "<td class= 'celulaTurmaAtual'>" . $Pps["turmaAtualPP"] . "</td>";
                        echo "<td class='celulaConcluiu'></td>";
                        echo "<td class='celulaMencao'></td>";
                        echo "</tr>";
                    }
                }
                ?>
            </table>
            <?php 
        if(isset($_SESSION['cadastrado'])){
            if($_SESSION['cadastrado']){
                ?>
                <script>
                    alert("Planilha importada com sucesso!")
                </script> <?php
                echo "<a href='gerarPdf.php'>Gerar PDF</a>";
                unset($_SESSION['cadastrado']);
            }else{
                ?>
                <script>
                    alert("Falha na importação da planilha!")
                </script> <?php
            }
        }
    ?>
            
            <form method="POST" action="processamento.php" enctype="multipart/form-data">
                <div class="importarPPs">
                    <label for="uploadPPs" id="lblImportarPPs"><span class="lblImportar">Importar</span></label>
                    <input type="file" name="uploadPPs" id="uploadPPs" accept=".xls" />
                </div>
                <div class="modal-container" id="modal-alert-import">
                    <div class="modal-alert">
                        <h3 class="tituloModalAlert">Atenção!</h3>
                        <div class="traco"></div><br />
                        <span id="spnAviso"></span><br />
                        <div class="botoes">
                            <input type="submit" class="btnImportar" value="Sim">
                            <div class="botao">Não</div>
                        </div>
                    </div>
            </form>
        </div>
        </div>
        <?php
        $turmaDAO = new TurmaDAO();
        ?>
    </section>


    <?php
    //if ($turmaDAO->getRowCount() >= 1):
    $query = "SELECT t.cod_turma, t.nome_turma, t.ano_turma, c.nome_curso FROM turma AS t INNER JOIN curso AS c ON t.cod_curso = c.cod_curso";
    $turmaDAO->consultar($query);

    if ($turmaDAO->consultar($query) == false) {
    } else { ?>
        <section class="management-class-section">
            <h1>Gerenciamento de turmas</h1>
            <div class="management-class">
                <table class="management-table" cellspacing="0">
                    <tr>
                        <th class="thNomeTurma">Nome</th>
                        <th class="thAnoTurma">Ano</th>
                        <th class="thCursoTurma">Curso</th>
                        <th class="thAcaoTurma">Ação</th>
                    </tr> <?php
                            foreach ($turmaDAO->consultar($query) as $turma) :
                                echo "<tr>";
                                echo "<td class='tdNomeTurma'>{$turma["nome_turma"]}</td>";
                                echo "<td class='tdAnoTurma'>{$turma["ano_turma"]}</td>";
                                echo "<td class='tdNomeCurso'>{$turma["nome_curso"]}</td>";
                                echo "<td class='tdAcao'><a class='link-acao' href='editarTurma.php?ID={$turma["cod_turma"]}'>Editar</a> <a href='../../controllers/excluirTurma.php?ID={$turma["cod_turma"]}'>Excluir</a></td>";
                                echo "</tr>";
                            endforeach; ?>
                </table>
            </div> <?php
                }
                //endif;
                    ?>

        <?php
        $cursoDAO = new CursoDAO();
        $query = "SELECT * FROM curso";

        if ($turmaDAO->consultar($query) == false) {
        } else { ?>
            <h1>Gerenciar cursos</h1>
            <div class="management-class">
                <table class="management-table">
                    <tr>
                        <th class="thCursoTurma">Nome</th>
                        <th class="thEixoCurso">Eixo</th>
                        <th class="thAcaoTurma" style="border-right:none;">Ação</th>
                    </tr> <?php
                            foreach ($cursoDAO->consultar($query) as $curso) :
                                echo "<tr>";
                                echo "<td>" . $curso["nome_curso"] . "</td>";
                                echo "<td class='tdAnoTurma'>" . $curso["eixo_curso"] . "</td>";
                                echo "<td class='tdAcao'><a class='link-acao'href=editarCurso.php?ID={$curso["cod_curso"]}>Editar</a> <a href=../../controllers/excluirCurso.php?ID={$curso["cod_curso"]}>Excluir</a></td>";
                                echo "</tr>";
                            endforeach; ?>
                </table>
            </div> <?php
                }
                    ?>


        <?php
        //if ($turmaDAO->getRowCount() >= 1):
        $disciplinaDAO = new DisciplinaDAO();
        $query = "SELECT * FROM disciplina";

        $disciplinaDAO->consultar($query);

        if ($disciplinaDAO->consultar($query) == false) {
        } else { ?>
            <h1>Gerenciar disciplinas</h1>
            <div class="management-class">
                <table class="management-table disciplina">
                    <tr>
                        <th class="thDisciplinaTurma">Nome</th>
                        <th class="thAnoTurma">Sigla</th>
                        <th class="thEixoCurso">Turma</th>
                        <th class="thAcaoDisciplina">Ação</th>
                    </tr> <?php
                            foreach ($disciplinaDAO->consultar($query) as $disciplina) :
                                echo "<td>" . $disciplina["nomeDisciplina"] . "</td>";
                                echo "<td>" . $disciplina["siglaDisciplina"] . "</td>";
                                $query2 = "SELECT t.nome_turma FROM turma AS t INNER JOIN disciplina d ON t.cod_turma = d.codTurma WHERE d.codDisciplina = {$disciplina["codDisciplina"]}";
                                if ($disciplinaDAO->consultar($query2) > 1) :
                                    foreach ($disciplinaDAO->consultar($query2) as $turma) :
                                        echo "<td>" . $turma["nome_turma"] . "</td>";
                                    endforeach;
                                    echo " <td class='tdAcao'><a href=editarDisciplina.php?ID={$disciplina["codDisciplina"]} class='link-acao'>Editar</a> <a href=# class='link-acao'>Excluir</a></td>";
                                endif;
                                echo "</tr>";
                            endforeach; ?>
                </table>
            </div> <?php
                }

                //endif;
                    ?>

        </section>
        <div class="modal-container" id="modal-gestor">
            <div class="modal-doc30" id="modal-doc-gestor">

            </div>
        </div>
        <script src="../../../system/js/app.js"></script>
</body>

</html>