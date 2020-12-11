<?php 
function conexao(){
	/*define('host','localhost');
	define('usuario','root');
	define('senha','');
	define('bd','teste_tcc');*/
        
    $host = "localhost";
		$usuario = "root";
		$senha = "";
		$banco = "helpp";

        $conn = @mysqli_connect($host,$usuario,$senha,$banco) or die ("Não foi possível conectar-se.");
        
        mysqli_query($conn,"SET NAMES 'utf8'");
        mysqli_query($conn,"SET character_set_connection=utf8");
	mysqli_query($conn,"SET character_set_client=utf8");
	mysqli_query($conn,"SET character_set_results=utf8");

	// O 3308 é a porta que o MYSQL tá no meu pc (Lari), se der algum problema pode tirar e colocar o número da porta do teu pc 
	return $conn;
}
?>