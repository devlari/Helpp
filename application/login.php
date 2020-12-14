<?php

    session_start();
    include("./controllers/conexao.php");
    $conexao= conexao();

    $_SESSION['usuario'] = mysqli_real_escape_string($conexao, $_POST['txtRM']);
    $_SESSION['cargo'] = $_POST['cargo'];
    $senha = mysqli_real_escape_string($conexao, $_POST['txtSenha']);

    $query = "SELECT rmUsuario, senhaUsuario, perfilUsuario FROM usuario WHERE rmUsuario = '{$_SESSION['usuario']}' AND senhaUsuario = '{$senha}' AND perfilUsuario = '{$_SESSION['cargo']}'";
    $result = mysqli_query($conexao, $query);
    $row = mysqli_num_rows($result);

    echo $query;
    echo mysqli_error($conexao);

    if($row == 1)
    {
        //Senha padrão = "ETECHAS"
        if($senha == "ETECHAS" || $senha == "etechas")
        {
            header("location:views/login/atualizarSenha.php");
        }
        else
        {
                    if($_SESSION['cargo'] == "Aluno")
                    {
                        echo $_SESSION['usuario'];
                        echo $_SESSION['cargo'];
                        echo $senha;
                        header("location:views/aluno");
                    }
                    if($_SESSION['cargo'] == "Professor")
                    {
                        echo "putz";
                        echo $_SESSION['usuario'];
                        echo $_SESSION['cargo'];
                        echo $senha;
                        header("location:views/professor");
                    }
                    if($_SESSION['cargo'] == "Gestor")
                    {
                        echo $_SESSION['usuario'];
                        echo $_SESSION['cargo'];
                        echo $senha;
                        header("location:views/gestor");
                    }
        }
    }
    else
    {
            $_SESSION['erro'] = 1;
            echo $_SESSION['usuario'];
            echo $_SESSION['cargo'];
            echo $senha;
            var_dump($result);
            header("location:index.php");
    }
?>