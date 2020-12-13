<?php
require('../../config/config.php');
require('../../config/Conn.class.php');
require('../../models/Read.class.php');
require('../../models/Atividade.class.php');
require('../../models/AtividadeDAO.class.php');

if (isset($_GET['codAtiv'])) :
    $idAtiv = $_GET['codAtiv'];
    $lerAtividade = new AtividadeDAO();
    $query = "SELECT * FROM atividade WHERE codAtividade = {echo $idAtiv}";
    $consulta = $lerAtividade->consultarAtividade($query);
else :
    $idAtiv = null;
endif;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../../system/css/navbar.css" />
    <link rel="stylesheet" type="text/css" href="../../../system/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet" />
    <title>Criando atividade</title>
    <script src="https://kit.fontawesome.com/43a2aaa0b4.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav id="navbar-helpp">
        <div class="logo">
            <img src="../../../system/img/helpp.png" />
        </div>
        <ul class="nav-links">
            <li><a href="#" class="inicio"><i class="fas fa-home"></i><span class="spanInicio">Início</span></a></li>
            <li><a href="#" class="ativid"><i class="fas fa-file-alt"></i><span class="spanAtiv">Atividades</span></a></li>
            <li><a href="#" class="config"><i class="fas fa-cog"></i><span class="spanConfig">Configurações</span></a></li>
            <li><a href="#" class="sair"><i class="fas fa-power-off"><span class="spanSair">Sair</span></i></a></li>

        </ul>
        <div class="burguer" id="burger">
            <div class="linha1"></div>
            <div class="linha2"></div>
            <div class="linha3"></div>
        </div>
    </nav>
    <div class="wrapper" id="tela">
        <div class="formAtividade">
            <h1 class="tituloForm3">EDITAR ATIVIDADE</h1>
            <form class="formAtiv" action="../../controllers/editAtividade.php" method="POST" enctype="multipart/form-data">
                <?php foreach ($consulta as $dados) : ?>
                    <input name="id" type="hidden" value="<?php echo $dados['codAtividade']; ?>"><br />
                    <div class="inputAtividade">
                        <label for="titulo">Titulo:</label>
                        <input type="text" name="titulo" id="titulo" value="<?php echo $dados['titulo_atividade']; ?>">
                    </div>
                    <div class="inputAtividade">
                        <label for="instrucao">Instrução:</label>
                        <input type="text" name="instrucao" id="instrucao" value="<?php echo $dados['instrucao_atividade']; ?>">
                    </div>
                    <div class="inputAtividade">
                        <label for="prazoEntrega">Prazo de entrega</label>
                        <input type="date" name="prazoEntrega" id="prazoEntrega" value="<?php echo $dados['prazo_entrega']; ?>"></input>
                    </div>
                    <div class="inputAtividade">
                        <label for="formaEntrega">Forma de entrega:</label>
                        <input type="text" name="formaEntrega" id="formaEntrega" value="<?php echo $dados['forma_entrega']; ?>">
                    </div>
                    <div class="upload-arquivo">
                        <label for="upload" class="label" id="label">Selecionar arquivo...</label>
                        <input type="file" name="upload" id="upload" required>
                        <i class="fas fa-upload"></i>
                    </div>
                <?php endforeach ?>
                <button type="submit" value="enviar" class="btnAlterar">Editar</button>
            </form>
        </div>
    </div>
    <script src="../../../system/js/app.js"></script>
</body>

</html>