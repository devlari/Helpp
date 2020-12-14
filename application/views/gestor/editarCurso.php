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
    require('../../models/Curso.class.php');
    require('../../models/CursoDAO.class.php');

    if (isset($_GET['ID'])) :
        $idCurso = $_GET['ID'];
        $lerCurso = new CursoDAO();
        $query = "SELECT * FROM curso WHERE cod_curso = {$idCurso}";
        $lerCurso->consultar($query);
    else :
        $idCurso = null;
    endif;
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
            <h1 class="tituloForm3">Editar curso</h1>
            <form class="formAtiv" method="POST" action="../../controllers/editCurso.php">
                <?php foreach ($lerCurso->consultar($query) as $curso); ?>
                <input type="hidden" name="txtIdCurso" id="txtIdCurso" value="<?php echo $idCurso ?>"><br>
                <label for="nomeCurso" id="nomeCurso">Nome do Curso:</label>
                <input type="text" name="txtNomeCurso" id="txtNomeTurma" class="txtNomeTurma" value="<?php echo $curso["nome_curso"]; ?>"><br>
                <label for="eixoCurso" id="eixoCurso">Eixo:</label>
                <input type="text" name="txtEixoCurso" id="txtEixoCurso" value="<?php echo $curso["eixo_curso"]; ?>"><br>
                <button type="submit" class="btnAlterar">Alterar</button>
            </form>
        </div>
    </div>
    <script src="../../../system/js/app.js"></script>
</body>

</html>