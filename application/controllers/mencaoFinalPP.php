<?php
  
    echo $_POST['mencao-final'];
    if(isset($_POST['mencao-final']) && $_POST['mencao-final'] != "0")
    {    
        require ("../config/config.php");
        require ("../config/Conn.class.php");
        require("../models/PP.class.php");
        require("../models/PPDAO.class.php");

        $mencaoFinal = $_POST['mencao-final'];
        $dataTermino = date('Y-m-d');
        $rmAluno = $_POST['rmAluno'];
        $codDisc = $_POST['codDisc'];
        $status = "Concluída";
    
        $PP = new PP();
        $PPDAO = new PPDAO();
    
        $PP->setMencaoFinalPP($mencaoFinal);
        $PP->setRmAluno($rmAluno);
        $PP->setCodDisciplina($codDisc);
    
        $PPDAO->darNotaFinal($PP);
    
        header("location:../views/professor");
    }
    else
    {
        header("location:../views/professor");
    }
    

?>
