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
    <link rel="stylesheet" type="text/css" href="../../../system/css/navbar.css"/>
    <link rel="stylesheet" type="text/css" href="../../../system/css/style.css">
</head>
<body>
    <form action="#" method="POST">
        <?php
            $usuarioDados = $usuarioDAO->consultarUsuario($_SESSION['usuario']);
            /*foreach($usuario as $dados)
            {
                $nome = $dados['nomeUsuario'];
                $email = $dados['emailUsuario'];
                $senha = $dados['senhaUsuario'];
            }*/
        
        ?>
        <h1>Configurações</h1>
        <label>RM: <?php echo $_SESSION['usuario']; ?></label>
        <br/>      
        <label>Nome:</label>
        <input value='<?php echo $nome ?>'>
        <br/>
        <label>Email:</label>
        <input value='<?php echo $email ?>'>
        <br/>
        <label>Senha:</label>
        <input<input value='<?php echo $senha?>'>
        <br/>
        <button type="submit">editar</button>
    </form>
</body>

</html>