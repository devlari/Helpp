<?php
  
    if(isset($_POST['txtStatusPP']))
    {    
        require("../config/config.php");
        require("../config/Conn.class.php");
        require("../models/PP.class.php");
        require("../models/PPDAO.class.php");


        $dataTermino = date('Y-m-d');
        $status = $_POST['txtStatusPP'];
        $rmAluno = $_POST['rmAluno'];
        $codDisc = $_POST['codDisc'];

    
        $PP = new PP();
        $PPDAO = new PPDAO();
    
        $PP->setDataTerminoPP($dataTermino);
        $PP->setStatusPP($status);
        $PP->setRmAluno($rmAluno);
        $PP->setCodDisciplina($codDisc);
    
        $PPDAO->darBaixa($PP);
    
        header("location:../views/gestor");
    }
    else
    {
        header("location:../views/gestor");
    }
    

?>
