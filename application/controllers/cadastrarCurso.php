<?php
        require('../config/config.php');
        require('../config/Conn.class.php');
        require('../models/Create.class.php');
        require('../models/Curso.class.php');
        require('../models/CursoDAO.class.php');
        
        $nomeCurso = $_POST['txtNomeCurso'];
        $eixoCurso = $_POST['txtEixoCurso'];
        
        $curso = new Curso();
        
        $curso->setNomeCurso($nomeCurso);
        $curso->setEixoCurso($eixoCurso);
        
        $cursoDAO =  new CursoDAO();
        $cursoDAO->cadastrar($curso);

        header("location:../views/gestor");

