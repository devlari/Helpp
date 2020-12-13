<?php
    require('../config/config.php');
    require('../config/Conn.class.php');
    require('../models/Atividade.class.php');
    require('../models/AtividadeDAO.class.php');

    $codAtiv = $_POST['idAtiv'];
    $mencao = $_POST['mencaoAtiv'];

    $atividade = new Atividade();
    $atividadeDAO = new AtividadeDAO();

    $atividade->setMencaoAtividade($mencao);
    $atividade->setCodigoAtividade($codAtiv);

    $atividadeDAO->enviarMencao($atividade);
    header('location:../views/professor');
?>