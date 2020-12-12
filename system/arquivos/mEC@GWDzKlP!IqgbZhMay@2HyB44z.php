<?php
    session_start();

    include "conexao.php";

    $nome = $_POST['txtNome'];
    $autor = $_POST['txtAutor'];
    $data = $_POST['data'];
    $genero = $_POST['txtGenero'];
    $valor_unit = $_POST['txtPreco'];

    $nome_temporario = $_FILES['txt_foto']["tmp_name"];
	$nome_real = $_FILES['txt_foto']["name"];
	$extensao_real = pathinfo($nome_real);//, PATHINFO_EXTENSION); // VERDADEIRA FORMA DE GUARDAR A EXTENSÃO DO ARQUIVO NA VARIÁVEL
	$extensao_real = $extensao_real['extension']; // NÃO SERVE PRA ARMAZENAR A STRING DA EXTENSÃO
	// echo $extensao_real; // TESTE PARA VER O QUE ESTÁ SENDO GUARDADO NA VARIÁVEL $extensão_real
	//$extensao_real = strtolower($extensao_real);
	$tamanho = mt_rand(8,50);
	$all_str = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!-_@$";
	$nome_final = "";
			for($i=0;$i<=$tamanho; $i++)
			{
				$nome_final .= $all_str[mt_rand(0,65)];
			
			}
				$nome_final = $nome_final . "." . $extensao_real;
				copy($nome_temporario, "img/foto_livro/$nome_final");

    $sql = "insert into livro (nome, dt_lancamento, genero, autor, foto, valor_unitario) 
            values ('$nome', '$data', '$genero', '$autor', '$nome_final', $valor_unit)";
	
	mysqli_query ($conn, $sql);
	
    header("location:index.php");
    
            
    
            
    

?>