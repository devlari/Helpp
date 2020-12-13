<?php

require('../config/config.php');
require('../config/Conn.class.php');
require('../models/Delete.class.php');
require('../models/Curso.class.php');
require('../models/CursoDAO.class.php');

if (isset($_GET['ID'])):
    $idCurso = $_GET['ID'];

    $curso = new Curso();
    $cursoDAO = new CursoDAO();

    $cursoDAO->excluir($idCurso);
    
    echo "<pre>";
    var_dump($cursoDAO->excluir($idCurso));    
    echo "</pre>";
    

    //header("location:../views/gestor");

else:
    $idTurma = null;
    endif;