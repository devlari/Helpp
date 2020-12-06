<?php
        require('../config/config.php');
        require('../config/Conn.class.php');
        require('../models/Update.class.php');
        require('../models/Curso.class.php');
        require('../models/CursoDAO.class.php');
        
        $idCurso=$_POST['txtIdCurso'];
        $nomeCurso = $_POST['txtNomeCurso'];
        $eixoCurso = $_POST['txtEixoCurso'];
        
        $curso = new Curso();
        $cursoDAO = new CursoDAO();
        
        $curso->setCodCurso($idCurso);
        $curso->setNomeCurso($nomeCurso);
        $curso->setEixoCurso($eixoCurso);
        
        $cursoDAO->alterar($curso); 

        header("location:../views/gestor/gerenciarCurso.php");