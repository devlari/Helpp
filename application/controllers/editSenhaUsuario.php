<?php
        require('../config/config.php');
        require('../config/Conn.class.php');
        require('../models/Update.class.php');
        require('../models/Usuario.php');
        require('../models/UsuarioDAO.class.php');
        session_start();

        $rmUsuario = $_SESSION['usuario'];
        $senhaAtual = $_POST['senhaAtual'];
        $novaSenha = $_POST['senha1'];
        $confirmarSenha = $_POST['senha2'];
       
        $usuario = new Usuario();
        $usuarioDAO = new UsuarioDAO();

        if($usuarioDAO->VerificaSenha($rmUsuario,$senhaAtual) == true)
        {
            if($novaSenha == $confirmarSenha)
            {
                $usuario->setID($rmUsuario);
                $usuario->setSenha($novaSenha);
                $usuarioDAO->atualizaSenha($usuario);

                if($_SESSION['cargo'] == "Aluno")
                {
                    header("location:../views/aluno");
                }
                
                if($_SESSION['cargo'] == "Professor")
                {
                    header("location:../views/aluno");
                }
                
                if($_SESSION['cargo'] == "Gestor")
                {
                    header("location:../views/aluno");
                }
            }
            else
            {
                echo "Senhas novas não coincidem!";
            }
        }
        else
        {
            echo "senha inválida!";
        }
?>