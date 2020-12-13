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
    <?php
    require('../../../application/config/config.php');
    require('../../../application/config/Conn.class.php');
    require('../../../application/models/Read.class.php');

    $lerTurma = new Read();
    $lerTurma->ExeRead('turma');
    ?>
    <section class="cadTurma cadCurso">
    <h1 style="text-align:center;margin-bottom:15px;">CRIAR DISCIPLINA</h1>
        <form class="formAtiv" method="POST" action="../../controllers/cadastrarDisciplina.php">
            <div class="form">
                <div class="inputTurma">
                    <input type="text" name="txtNomeDisciplina" id="txtNomeDisciplina" required autocomplete="off">
                    <label for="txtNomeTurma" id="lblNomeTurma" class="label-name"><span class="content-name">Nome da disciplina:</span></label>
                </div>
                <div class="inputTurma">
                    <input type="text" name="txtSiglaDisciplina" id="txtSiglaDisciplina" required autocomplete="off">
                    <label for="txtNomeTurma" id="lblNomeTurma" class="label-name"><span class="content-name">Sigla da disciplina:</span></label>
                </div>
                <h2>Turmas para inserir a disciplina:</h2>
                <table>
                    <tr>
                        <?php
                        if ($lerTurma->getRowCount() >= 1) :
                            //foreach
                            //                        foreach ($lerTurma->getResult() as $resultado):
                            //                            echo "<tr>";
                            //                            echo "<td><input type='checkbox' value='{$lerTurma->getResult()[$resultado]["cod_turma"]}' name='elementos[]'></td>";
                            //                            echo "<td>{$lerTurma->getResult()[$resultado]["nome_turma"]}</td>";
                            //                            echo "</tr>";                        
                            //                        endforeach;
                            for ($i = 0; $i < $lerTurma->getRowCount(); $i++) :
                                echo "<tr>";
                                echo "<td><input type='checkbox' value='{$lerTurma->getResult()[$i]["cod_turma"]}' name='elementos[]'></td>";
                                echo "<td>{$lerTurma->getResult()[$i]["nome_turma"]}</td>";
                                echo "</tr>";
                            endfor;
                        endif;
                        ?>
                    </tr>
                </table>
                <button type="submit" class="btnCadastro">Cadastrar</button>
            </div>
        </form>
    </section>
</body>

</html>