<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../system/css/navbar.css" />
    <link rel="stylesheet" type="text/css" href="../system/css/style.css">

    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet" />
    <title>Início</title>
    <script src="https://kit.fontawesome.com/43a2aaa0b4.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
        require ("../application/config/config.php");
        require ("../application/config/Conn.class.php");
        require ("../application/models/PP.class.php");
        require ("../application/models/PPDAO.class.php");
        require ("../application/models/TurmaDAO.class.php")
        //session_start();
    ?>
    <nav id="navbar-helpp">
        <div class="logo">
            <img src="../system/img/helpp.png" />
        </div>
        <ul class="nav-links">
            <li><a href="#" class="inicio"><i class="fas fa-home"></i><span class="spanInicio">Início</span></a></li>
            <li><a href="#" class="config"><i class="fas fa-cog"></i><span class="spanConfig">Configurações</span></a></li>
            <li><a href="#" class="sair"><i class="fas fa-power-off"><span class="spanSair">Sair</span></i></a></li>
            
        </ul>
        <div class="burguer" id="burger">
            <div class="linha1"></div>
            <div class="linha2"></div>
            <div class="linha3"></div>
        </div>
    </nav>

    <section class="conteudo-gestor" id="tela">
        <div class="dados-user">
            <ul>
                <li>Olá, Flávia</li>
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
                    <th class="headerProfessor">Professores</th>
                    <th class="headerConcluiu">Concluiu em</th>
                    <th class="headerMencao">Menção</th>
                </tr>
                    <?php
                        $PPDAO = new PPDAO();
                        foreach($PPDAO->consultar() as $Pps){
                            echo "<tr>";
                            echo "<td class='celulaRM'>" . $Pps["aluno_rmAluno"] . "</td>";
                            echo "<td class='celulaAluno'>" . $Pps["nomeUsuario"] . "</td>";
                            echo "<td class= 'celulaSerie'>" . $Pps["seriePP"] . "</td>";
                            echo "<td class='celulaMateria'>" . $Pps{"disciplinaPP"} . "</td>";
                            echo "<td class= 'celulaSemestre'>" . $Pps["semestrePP"] . "/" . $Pps["anoPP"] . "</td>";
                            echo "<td class='celulaProfessor'>" . 'null' . "</td>";
                            echo "<td class='celulaConcluiu'></td>";
                            echo "<td class='celulaMencao'></td>";
                            echo "</tr>";
                        }
                    ?>
                <!--<tr>
                    <td class="celulaRM">177571</td>
                    <td class="celulaAluno">Artur Barbosa Gomes</td>
                    <td class="celulaSerie">2ª Série</td>
                    <td class="celulaMateria">Técnicas de programação para internet I e II</td>
                    <td class="celulaSemestre">2º Sem/2019</td>
                    <td class="celulaProfessor">Adriano Milanez e Marco Antonio</td>
                    <td class="celulaConcluiu"></td>
                    <td class="celulaMencao"></td>
                </tr>-->
            </table>
            <form method="POST" action="processamento.php" enctype="multipart/form-data">
                <div class="importarPPs">
                    <label for="uploadPPs" id="lblImportarPPs"><span class="lblImportar">Importar</span></label>
                    <input type="file" name="uploadPPs" id="uploadPPs" accept=".xls"/>
                </div>
                <div class="modal-container" id="modal-alert-import">
                    <div class="modal-alert">
                        <h3 class="tituloModalAlert">Atenção!</h3>
                        <div class="traco"></div><br/>
                        <span id="spnAviso">aaaaaaaaaaaaaaaaaaaaaaaaaaaa?</span><br />
                        <div class="botoes">
                            <input type="submit" class="btnImportar" value="Sim">
                            <div class="botao">Não</div>
                        </div>
                    </div>
            </form>

            <?php
            $turmaDAO = new TurmaDAO();        
            ?>
            <table border = '1'>
                <tr>
                    <td>Nome:</td>
                    <td>Ano:</td>
                    <td>Curso:</td>
                    <td>Ação:</td>
                    <td>Ação:</td>
                </tr>
                <?php
                //if ($turmaDAO->getRowCount() >= 1):
                    $query = "SELECT t.cod_turma, t.nome_turma, t.ano_turma, c.nome_curso FROM turma AS t INNER JOIN curso AS c ON t.cod_curso = c.cod_curso";
                    foreach ($turmaDAO->consultar($query) as $turma):
                        echo "<tr>";
                        echo "<td>{$turma["nome_turma"]}</td>";
                        echo "<td>{$turma["ano_turma"]}</td>";
                        echo "<td>{$turma["nome_curso"]}</td>";
                        echo "<td><a href='editarTurma.php?ID={$turma["cod_turma"]}'>Editar</a></td>";
                        echo "<td><a href='excluirTurma.php?ID={$turma["cod_turma"]}'>Excluir</a></td>";
                        echo "</tr>";
                    endforeach;
                //endif;
                ?>
            </table>
        </div>
    </section>

    <script src="../system/js/app.js"></script>
</body>

</html>