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
    <form action="../controllers/editUsuario.php" method="POST">
        <?php
            $usuarioDados = $usuarioDAO->consultarUsuario($_SESSION['usuario']);
            foreach($usuarioDados as $dados)
            {
                $nome = $dados['nomeUsuario'];
                $email = $dados['emailUsuario'];
                $senha = $dados['senhaUsuario'];
            }
        
        ?>
        <h1>Configurações</h1>
        <label>RM: <?php echo $_SESSION['usuario']; ?></label>
        <br/>      
        <label>Nome:</label>
        <input name='txtNome'value='<?php echo $nome ?>'>
        <br/>
        <label>Email:</label>
        <input name='txtEmail' value='<?php echo $email ?>'>
        <br/>
        <button type="submit">editar</button>
        <br/>
        <br/>
    </form>
    <form action='../controllers/editSenhaUsuario.php' method="POST">
        <label>Senha Atual:</label>
        <input name='senhaAtual' type='password' value=''>
        <br/>
        <label>Nova Senha:</label>
        <input name='senha1' type='password' value=''>
        <br/>        
        <label>Confirmar Senha:</label>
        <input name='senha2' type='password' value=''>
        <br/>   
        <button type='submit'>Alterar Senha</button>
    
    </form>

</body>

</html>