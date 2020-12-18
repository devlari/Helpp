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
                $usuario->setSenha(sha1($novaSenha));
                $usuarioDAO->atualizaSenha($usuario);

                if($_SESSION['cargo'] == "Aluno")
                {
                    header("location:../views/Aluno");
                }
                
                if($_SESSION['cargo'] == "Professor")
                {
                    header("location:../views/Professor");
                }
                
                if($_SESSION['cargo'] == "Gestor")
                {
                    header("location:../views/Gestor");
                }
            }
            else
            {
                $_SESSION['erro'] = 2;
                header("location:../views/editarSenha.php");
            }
        }
        else
        {
            $_SESSION['erro'] = 1;
            header("location:../views/editarSenha.php");
        }
?>