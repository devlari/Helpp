<?php

require('../application/config/config.php');
require('../application/config/Conn.class.php');
require('../application/models/PP.class.php');
require('../application/models/PPDAO.class.php');

$titulo = $_POST['txtNomeAtiv'];
$turma = $_POST['turma'];
$descricao = $_POST['txtDescAtiv'];
$modoEntrega = $_POST['modoEntrega'];
$prazoEntrega = $_POST['txtPrazoEntrega'];
$arquivo = $_FILES['upload']['tmp_name'];

echo $titulo . "<br>";
echo $turma . "<br>";
echo $descricao . "<br>";
echo $modoEntrega . "<br>";
echo $prazoEntrega . "<br>";
echo $arquivo . "<br>";