<?php 
	define('host','localhost');
	define('usuario','root');
	define('senha','');
	define('bd','helpp');

	// O 3308 é a porta que o MYSQL tá no meu pc (Lari), se der algum problema pode tirar e colocar o número da porta do teu pc 
	$conexao = mysqli_connect(host,usuario,senha,bd, "3306") or die ("Não foi possível conectar-se.");
	?>