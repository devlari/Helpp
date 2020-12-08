<?php

require('../config/config.php');
require('../config/Conn.class.php');
require('../models/Atividade.class.php');
require('../models/AtividadeDAO.class.php');

$titulo = $_POST['txtNomeAtiv'];
$turma = $_POST['turma'];
$descricao = $_POST['txtDescAtiv'];
$modoEntrega =  $_POST['modoEntrega'];

$prazoEntrega = explode('T', $_POST['txtPrazoEntrega']);
$data = $prazoEntrega[0];
$horario = $prazoEntrega[1];

$arquivo = $_FILES['upload']['tmp_name'];

$atividade = new Atividade();
$atividadeDAO = new AtividadeDAO();

$atividade->setTituloAtividade($titulo);
$atividade->setInstrucaoAtividade($descricao);
$atividade->setFormaEntregaAtividade($modoEntrega);
$atividade->setPrazoAtividade($data);

$atividadeDAO->cadastrarAtividade($atividade);

header("location:../views/professor");


/*echo $titulo . "<br>";
echo $turma . "<br>";
echo $descricao . "<br>";
echo $modoEntrega . "<br>";
echo $data . "<br>";
echo $arquivo . "<br>";*/