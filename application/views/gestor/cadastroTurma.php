<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="../system/css/navbar.css" />
    <link rel="stylesheet" type="text/css" href="../system/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet" />
    <title>Início</title>
    <script src="https://kit.fontawesome.com/43a2aaa0b4.js" crossorigin="anonymous"></script>
    <script language="JavaScript" type="text/javascript">
        function mascaraData(campoData) {
            var data = campoData.value;
            if (data.length == 2) {
                data = data + '/';
                document.forms[0].data.value = data;
                return true;
            }
            if (data.length == 5) {
                data = data + '/';
                document.forms[0].data.value = data;
                return true;
            }
        }
    </script>
</head>

<body>
    <?php
    require('../application/config/config.php');
    require('../application/config/Conn.class.php');
    require('../application/models/Read.class.php');

    $lerCurso = new Read();
    $lerCurso->ExeRead('curso');

    ?>
    <nav id="navbar-helpp">
        <div class="logo">
            <img src="../system/img/helpp.png" />
        </div>
        <ul class="nav-links">
            <li><a href="#" class="inicio"><i class="fas fa-home"></i><span class="spanInicio">Início</span></a></li>
            <li><a href="../configUsuario.php" class="config"><i class="fas fa-cog"></i><span class="spanConfig">Configurações</span></a></li>
            <li><a href="#" class="sair"><i class="fas fa-power-off"><span class="spanSair">Sair</span></i></a></li>

        </ul>
        <div class="burguer" id="burger">
            <div class="linha1"></div>
            <div class="linha2"></div>
            <div class="linha3"></div>
        </div>
    </nav>
    <section class="cadTurma" id="tela">
        <h1 style="text-align:center">CADASTRAR TURMAS</H1>
        <form class="cadastroTurma" method="POST" action="cadastrarTurma.php">
            <div class="form">
                <div class="inputTurma">
                    <input type="text" name="txtNomeTurma" id="txtNomeTurma" required>
                    <label for="txtNomeTurma" id="lblNomeTurma" class="label-name"><span class="content-name">Nome da Turma:</span></label>
                </div>
                <div class="inputTurma">
                    <input type="text" name="txtAnoTurma" id="txtAnoTurma" required>
                    <label for="txtAnoTurma" id="lblAnoTurma" class="label-name"><span class="content-name">Ano da Turma:</span></label>
                </div>
                <div class="selectTurma">
                    <select name="curso" id="cmbCurso" name="cmbCurso" style="margin-left:0px; width:100%; height:35px;">
                        <option value="0">Curso</option>
                        <?php
                        if ($lerCurso->getRowCount() >= 1) :
                            for ($i = 0; $i < $lerCurso->getRowCount(); $i++) :
                                echo "<option value='{$lerCurso->getResult()[$i]["cod_curso"]}'>{$lerCurso->getResult()[$i]["nome_curso"]}</option>";
                            endfor;
                        endif;
                        ?>
                    </select>
                </div>
                <input type="submit" class="btnCadastro" value="Cadastrar">
        </form>
    </section>
    <script src="../system/js/app.js"></script>
</body>

</html>