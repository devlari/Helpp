<?php
date_default_timezone_set('America/Sao_Paulo');

require("../config/Conn.class.php");
require("../config/config.php");
require("../models/Usuario.php");
require("../models/UsuarioDAO.class.php");

$usuario = new Usuario();
$usuarioDAO = new UsuarioDAO();
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="../../system/css/navbar.css" />
    <link rel="stylesheet" type="text/css" href="../../system/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../system/css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet" />
    <title>Início</title>
    <script src="https://kit.fontawesome.com/43a2aaa0b4.js" crossorigin="anonymous"></script>
</head>

<body>
    <a href="../views/<?php echo $_SESSION['cargo'];?>" style="text-decoration:none; color:black;"><i class="fa fa-arrow-left voltar-seta" aria-hidden="true"></i></a>
    <div class="wrapper-config">
        <h1 class="tituloForm3" style="padding-bottom:20px"><i class="fas fa-cog"></i> Configurações </i></h1>
        <form class="formAtiv" action="../controllers/editUsuario.php" method="POST">
            <?php
            $usuarioDados = $usuarioDAO->consultarUsuario($_SESSION['usuario']);
            foreach ($usuarioDados as $dados) {
                $nome = $dados['nomeUsuario'];
                $email = $dados['emailUsuario'];
                $senha = $dados['senhaUsuario'];
            }

            ?>


            <div class="configs">
                <div class="rmUsuario">
                    <label><span class="rmusuario">RM:</span> <?php echo $_SESSION['usuario']; ?></label>
                </div>
                <div class="inputNome">
                    <label>Nome:</label>
                    <input type="text" name='txtNome' value='<?php echo $nome ?>' disabled>
                </div>
                <div class="inputEmail">
                    <label>Email:</label>
                    <input type="text" name='txtEmail' value='<?php echo $email ?>'>
                </div>
                <a href="editarSenha.php" class="esqueceu-senha" style="padding-top:15px">Alterar senha</a>
                <button type="submit" class="btnEditar">Editar</button>
            </div>
        </form>
    </div>
    <script src="../../../system/js/app.js"></script>
</body>

</html>