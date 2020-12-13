<?php
        require('../config/config.php');
        require('../config/Conn.class.php');
        require('../models/Update.class.php');
        require('../models/Atividade.class.php');
        require('../models/AtividadeDAO.class.php');
        
        $idAtiv=$_POST['id'];
        $tituloAtiv = $_POST['titulo'];
        $instrucaoAtiv = $_POST['instrucao'];
        $prazoAtiv = $_POST['prazoEntrega'];
        $formaEntregaAtiv = $_POST['formaEntrega'];
        $nome_temporario = $_FILES['upload']["tmp_name"];

        $atividade = new Atividade();
        $atividadeDAO = new AtividadeDAO();

        $atividade->setCodigoAtividade($idAtiv);
        $atividade->setTituloAtividade($tituloAtiv);
        $atividade->setInstrucaoAtividade($instrucaoAtiv);
        $atividade->setPrazoAtividade($prazoAtiv);
        $atividade->setFormaEntregaAtividade($formaEntregaAtiv);

        if($nome_temporario == null)
        {
            $atividadeDAO->editarAtividade($atividade); 
        }
        else
        {
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

            $atividade->setArquivoProf($nome_final);
            $atividadeDAO->editarAtividadeArquivo($atividade); 
        }

        header("location:../views/professor/");