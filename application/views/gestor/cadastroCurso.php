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

    $lerCurso = new Read();
    $lerCurso->ExeRead('curso');

    ?>
    <nav id="navbar-helpp">
        <div class="logo">
            <img src="../../../system/img/helpp.png" />
        </div>
        <ul class="nav-links">
        <li><a href="./" class="inicio"><i class="fas fa-home"></i><span class="spanInicio">Início</span></a></li>
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
    <section class="cadTurma cadCurso" style="margin-top:5vh;" id="tela">
        <h1 style="text-align:center;margin-bottom:15px;">CADASTRAR CURSO</h1>
        <form class="formAtiv" method="POST" action="../../controllers/cadastrarCurso.php">
            <div class="form">
                <div class="inputTurma">
                    <input type="text" name="txtNomeCurso" id="txtNomeCurso" required>
                    <label for="txtNomeTurma" id="lblNomeTurma" class="label-name"><span class="content-name">Nome do curso:</span></label>
                </div>
                <div class="inputTurma">
                    <input type="text" name="txtEixoCurso" id="txtEixoCurso" required>
                    <label for="txtNomeTurma" id="lblNomeTurma" class="label-name"><span class="content-name">Eixo do curso:</span></label>
                </div>
                <button type="submit" class="btnCadastro">Cadastrar</button>
            </div>
        </form>
    </section>
    <script src="../../../system/js/app.js"></script>
</body>

</html>