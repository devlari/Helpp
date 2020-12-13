<?php
    require('../config/config.php');
    require('../config/Conn.class.php');
    require('../models/Atividade.class.php');
    require('../models/AtividadeDAO.class.php');
    session_start();

    $filtro = $_GET['filtro_disciplina'];
    $aluno = $_SESSION['usuario'];

    $atividade = new Atividade();
    $atividadeDAO = new AtividadeDAO();
    
    $_SESSION['filtro'] = $filtro;
    if ($filtro != "padrao")
    {
        $_SESSION['pesquisa'] = 'true';
        $atividadeDAO->listarAtividadeAlunoAtribuidaFiltrado($aluno, $filtro);
    } 
    else
    {
        $_SESSION['pesquisa'] = 'false';
        $atividadeDAO->listarAtividadeAlunoAtribuida($aluno);
    }


    header('location:../views/aluno/index.php#tela2');
?>