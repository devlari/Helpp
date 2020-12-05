<?php

require('../config/config.php');
require('../config/Conn.class.php');
require('../models/Create.class.php');
require('../models/Disciplina.class.php');
require('../models/DisciplinaDAO.class.php');

$nomeDisciplina = $_POST['txtNomeDisciplina'];
$siglaDisciplina = $_POST['txtSiglaDisciplina'];
$elementos = $_POST['elementos'];

$disciplina = new Disciplina();

$disciplina->setNomeDisciplina($nomeDisciplina);
$disciplina->setSiglaDisciplina($siglaDisciplina);

foreach ($elementos as $e):
    $disciplina->setCodTurma($e);

    $disciplinaDAO = new DisciplinaDAO();
    $disciplinaDAO->cadastrar($disciplina);
    
    header("location:../views/gestor");

//    if ($disciplinaDAO->getResultado()):
//        echo "Disciplina cadastrada com sucesso!";
//    endif;
endforeach;

