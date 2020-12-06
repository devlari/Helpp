<?php

	session_start();
	include("./controllers/conexao.php");

	$_SESSION['usuario'] = mysqli_real_escape_string($conexao, $_POST['txtRM']);
	$_SESSION['cargo'] = $_POST['cargo'];
	$senha = mysqli_real_escape_string($conexao, $_POST['txtSenha']);

	$query = "SELECT rmUsuario, senhaUsuario, perfilUsuario FROM usuario WHERE rmUsuario = '{$_SESSION['usuario']}' AND senhaUsuario = '{$senha}' AND perfilUsuario = '{$_SESSION['cargo']}'";
	$result = mysqli_query($conexao, $query);
	$row = mysqli_num_rows($result);

	if($row == 1)
	{
		//Senha padrão = "ETECHAS"
		if($senha == "ETECHAS")
		{
			header("location:atualizarSenha.php");
		}
		else
		{
			if($_SESSION['cargo'] == "aluno")
			{
                echo $_SESSION['usuario'];
                echo $_SESSION['cargo'];
                echo $senha;
				header("location:views/aluno");
			}
			if($_SESSION['cargo'] == "professor")
			{
                echo $_SESSION['usuario'];
                echo $_SESSION['cargo'];
                echo $senha;
				header("location:views/professor");
			}
			if($_SESSION['cargo'] == "gestor")
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
       	echo $_SESSION['usuario'];
        echo $_SESSION['cargo'];
        echo $senha;
        var_dump($result);
        //header("location:index.php");
	}
	?>
