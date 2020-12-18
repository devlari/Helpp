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

    require('../../config/config.php');
    require('../../config/Conn.class.php');
    require('../../models/Read.class.php');
    require('../../models/Turma.class.php');
    require('../../models/TurmaDAO.class.php');

    if (isset($_GET['ID'])) :
        $idTurma = $_GET['ID'];

        $lerTurma = new TurmaDAO();
        $query = "SELECT t.cod_turma, t.nome_turma, t.ano_turma, c.nome_curso FROM turma AS t INNER JOIN curso AS c ON t.cod_curso = c.cod_curso WHERE cod_turma = {$idTurma}";
        $lerTurma->consultar($query);

        /*$lerTurma = new Read();
            $lerTurma->FullRead("SELECT t.cod_turma, t.nome_turma, t.semestre_turma, t.ano_turma, c.nome_curso FROM turma AS t INNER JOIN curso AS c ON t.cod_curso = c.cod_curso WHERE cod_turma = {$idTurma}");*/

        //Deixei do jeito antigo porque não sei se vai dar tempo de fazer o Curso agora 
        $lerCurso = new Read();
        $lerCurso->ExeRead('curso');
    else :
        $idTurma = null;
    endif;

    if($_SESSION['cargo'] != "Gestor")
    {
        $_SESSION['erro'] = 3;
        header("location:../../");
    }
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
    <div class="wrapper" id="tela">
        <div class="editarTurma">
            <h1 class="tituloForm3">Editar turma</h1>
            <form class="formAtiv" method="POST" action="../../controllers/editTurma.php">
                <?php foreach ($lerTurma->consultar($query) as $turma) : ?>
                    <input type="hidden" name="txtIdTurma" id="txtIdTurma" value="<?php echo $idTurma ?>"><br>
                    <label for="lblNomeTurma" id="lblNomeTurma">Nome da Turma:</label>
                    <input type="text" class="txtNomeTurma" name="txtNomeTurma" id="txtNomeTurma" value="<?php echo $turma['nome_turma'] ?>"><br>
                    <label for="lblAnoTurma" id="lblAnoTurma">Ano da Turma:</label>
                    <input type="text" class="txtAnoTurma" name="txtAnoTurma" id="txtAnoTurma" value="<?php echo $turma['ano_turma'] ?>"><br>
                    <label for="txtCursoTurma" id="lblCursoTurma">Curso da Turma:</label>
                    <select name="curso" class="selectEditarTurma" id="cmbCurso" name="cmbCurso">
                        <?php
                        if ($lerCurso->getRowCount() >= 1) :
                            for ($i = 0; $i < $lerCurso->getRowCount(); $i++) :
                                if ($turma['nome_curso'] == $lerCurso->getResult()[$i]["nome_curso"]) :
                                    echo "<option value='{$lerCurso->getResult()[$i]["cod_curso"]}' selected>{$lerCurso->getResult()[$i]["nome_curso"]}</option>";
                                else :
                                    echo "<option value='{$lerCurso->getResult()[$i]["cod_curso"]}'>{$lerCurso->getResult()[$i]["nome_curso"]}</option>";
                                endif;
                            endfor;
                        endif;
                        ?>
                    </select><br>
                <?php endforeach; ?>
                <input type="submit" class="btnAlterar" value="Alterar">
            </form>
        </div>
    </div>
    <script src="../../../system/js/app.js"></script>
</body>

</html>