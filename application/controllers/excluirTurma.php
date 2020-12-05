<?php

require('../config/config.php');
require('../config/Conn.class.php');
require('../models/Delete.class.php');
require('../models/Turma.class.php');
require('../models/TurmaDAO.class.php');

if (isset($_GET['ID'])):
    $idTurma = $_GET['ID'];
    
    $turmaDAO = new TurmaDAO();
    $turmaDAO->excluir($idTurma);
    
//    echo "<pre>";
//    var_dump($lerTurma);    
//    echo "</pre>";
    

        header("location:../views/gestor");

else:
    $idTurma = null;
    endif;