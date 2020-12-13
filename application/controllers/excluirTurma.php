<?php

require('../config/config.php');
require('../config/Conn.class.php');
require('../models/Delete.class.php');
require('../models/Turma.class.php');
require('../models/TurmaDAO.class.php');

if (isset($_GET['ID'])):
    $idTurma = $_GET['ID'];

    $turma = new Turma();
    $turmaDAO = new TurmaDAO();

    //$turmaDAO->
    //$turmaDAO->excluir($idTurma);
    
   echo "<pre>";
   var_dump();    
   echo "</pre>";
    

        //header("location:../views/gestor");

else:
    $idTurma = null;
    endif;