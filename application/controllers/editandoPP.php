<?php
    require ("../config/config.php");
    require ("../config/Conn.class.php");
    require("../models/PP.class.php");
    require("../models/PPDAO.class.php");

    $competencias = $_POST['txtCompetencias'];
    $habilidades = $_POST['txtHabilidades'];
    $basesTecnologicas = $_POST['txtBasesTecnologicas'];
    
    $rmAluno = '170381';
    $codDisciplina = 65;

    echo $competencias . "<br>";
    echo $habilidades . "<br>";
    echo $basesTecnologicas . "<br>";

    $PP = new PP();
    $PPDAO = new PPDAO();

    $PP->setRmAluno($rmAluno);
    $PP->setCodDisciplina($codDisciplina);
    
    $PP->setHabilidadePP($habilidades);
    $PP->setCompetenciaPP($competencias);
    $PP->setBaseTecnologicaPP($basesTecnologicas);
    
    $PPDAO->preencherDoc31($PP);
   
    header("location:../views/professor");
?>

