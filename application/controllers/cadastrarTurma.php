<?php
        require('../../application/config/config.php');
        require('../../application/config/Conn.class.php');
        require('../../application/models/Create.class.php');
        require('../../application/models/Turma.class.php');
        require('../../application/models/TurmaDAO.class.php'); 
        
        $nomeTurma = $_POST['txtNomeTurma'];
        $cursoTurma = $_POST['curso'];
        $anoTurma = $_POST['txtAnoTurma'];
        
        $turma = new Turma();
        
        $turma->setNomeTurma($nomeTurma);
        $turma->setAnoTurma($anoTurma);
        $turma->setCodCurso($cursoTurma);
        
        
        $turmaDAO =  new TurmaDAO();
        $turmaDAO->cadastrar($turma);
        
        if($turmaDAO->getResult()):
            echo "Turma cadastrada com sucesso!";
            header("location:../views/Gestor/");
        endif;
        

?>

