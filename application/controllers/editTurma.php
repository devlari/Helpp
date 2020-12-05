<?php
        require('../config/config.php');
        require('../config/Conn.class.php');
        require('../models/Update.class.php');
        require('../models/Turma.class.php');
        require('../models/TurmaDAO.class.php');
        
        $idTurma =$_POST['txtIdTurma'];
        $nomeTurma = $_POST['txtNomeTurma'];
        $cursoTurma = $_POST['curso'];
        $anoTurma = $_POST['txtAnoTurma'];
       
        $turma = new Turma();
        $turmaDAO = new TurmaDAO();
        
        $turma->setCodTurma($idTurma);
        $turma->setNomeTurma($nomeTurma);
        $turma->setAnoTurma($anoTurma);
        $turma->setCodCurso($cursoTurma);
        
        $turmaDAO->alterar($turma);
        
        header("location:../views/gestor");

//        echo "<pre>";
//        var_dump($alterarTurma);
//        echo "</pre>";
        