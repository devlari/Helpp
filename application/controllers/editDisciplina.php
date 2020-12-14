<?php
        require('../config/config.php');
        require('../config/Conn.class.php');
        require('../models/Update.class.php');
        require('../models/Disciplina.class.php');
        require('../models/DisciplinaDAO.class.php');
        
        $idDisciplina=$_POST['txtIdDisciplina'];
        $nomeDisciplina = $_POST['txtNomeDisciplina'];
        $siglaDisciplina = $_POST['txtSiglaDisciplina'];
        
        $disciplina = new Disciplina();
        $disciplinaDAO = new DisciplinaDAO();
        
        $disciplina->setCodDisciplina($idDisciplina);
        $disciplina->setNomeDisciplina($nomeDisciplina);
        $disciplina->setSiglaDisciplina($siglaDisciplina);
        
        $disciplinaDAO->alterar($disciplina);
        
        header("location:../views/gestor/");
        
        
