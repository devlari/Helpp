<?php
	include('conexao.php');
	$conexao = conexao();
	session_start();

	$senha = mysqli_real_escape_string($conexao, $_POST['txtSenha']);
	$senha2 = mysqli_real_escape_string($conexao, $_POST['txtSenha2']);

	//Caso o usuário tente acessar a página pelo endereço dela (tentar ir pro atualizando sem colocar as informações no atualizar)
	if(empty($senha) || empty($senha2))
	{
		echo "???";
	}

	if($senha == $senha2)
	{
		$senhaCriptografada = sha1($senha);

		$query = "UPDATE usuario SET senhaUsuario = '{$senhaCriptografada}' WHERE rmUsuario = '{$_SESSION['usuario']}'";

		$result = mysqli_query($conexao, $query);
		
		header("location:../");
	}

?> 
