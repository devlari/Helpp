<?php
    require('../config/config.php');
    require('../config/Conn.class.php');
    require('../models/Atividade.class.php');
    require('../models/AtividadeDAO.class.php');
    session_start();

    $turma = $_GET['filtro-turma2'];
    $materia = $_GET['filtro-materia'];
    $atividade2 = $_GET['filtro-atividade'];

    $_SESSION['turma'] = $turma;
    $_SESSION['materia'] = $materia;
    $_SESSION['atividade'] = $atividade2;
    
    $professor = $_SESSION['usuario'];

    $atividade = new Atividade();
    $atividadeDAO = new AtividadeDAO();

    $atividadeDAO->listarAtividadeConcluidaAlunosFiltrado($professor, $turma, $materia, $atividade2);
    
    header('location:../views/professor/index.php#tela2');
?>