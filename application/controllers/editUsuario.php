<?php
        require('../config/config.php');
        require('../config/Conn.class.php');
        require('../models/Update.class.php');
        require('../models/Usuario.php');
        require('../models/UsuarioDAO.class.php');
        session_start();

        $idUsuario = $_SESSION['usuario'];
        $nomeUsuario = $_POST['txtNome'];
        $emailUsuario = $_POST['txtEmail'];
       
        $usuario = new Usuario();
        $usuarioDAO = new UsuarioDAO();
        
        $usuario->setId($idUsuario);
        $usuario->setNome($nomeUsuario);
        $usuario->setEmail($emailUsuario);
        
        $usuarioDAO->editarUsuario($usuario);
        
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




?>