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
    $disciplina = $_POST['disciplina'];

    $nome_temporario = $_FILES['upload']["tmp_name"];
    $nome_real = $_FILES['upload']["name"];
    $extensao_real = pathinfo($nome_real);
    $extensao_real = $extensao_real['extension'];
    $tamanho = mt_rand(8, 50);
    $all_str = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!-_@$";
    $nome_final = "";
    for ($i = 0; $i <= $tamanho; $i++) {
        $nome_final .= $all_str[mt_rand(0, 65)];
    }
    $nome_final = $nome_final . "." . $extensao_real;
    copy($nome_temporario, "../../system/arquivos/$nome_final");

    $atividade = new Atividade();
    $atividadeDAO = new AtividadeDAO();

    $buscar = $atividadeDAO->buscarRMAtiv($turma, $disciplina);

    $atividade->setCodigoDisciplina($disciplina);
    $atividade->setTituloAtividade($titulo);
    $atividade->setInstrucaoAtividade($descricao);
    $atividade->setFormaEntregaAtividade($modoEntrega);
    $atividade->setPrazoAtividade($data);
    $atividade->setArquivoProf($nome_final);
    $atividade->setStatus("Não entregue");

    echo $disciplina, $turma;
    
    foreach($buscar as $alunos)
    {
        $atividade->setRmAluno($alunos['rmAluno']);
        $atividadeDAO->cadastrarAtividade($atividade);

        echo "<pre>";
        var_dump($atividade);
        echo "</pre>";
    }


    header("location:../views/professor");


/*echo $titulo . "<br>";
echo $turma . "<br>";
echo $descricao . "<br>";
echo $modoEntrega . "<br>";
echo $data . "<br>";
echo $arquivo . "<br>";*/