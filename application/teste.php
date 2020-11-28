<?php

require('conexao.php');
    if (isset($_GET["txtNome"])) {
        $nome = $_GET["txtNome"];
        //instrução que pega nome do aluno, titulo da atividade, descrição/instrução da atividade, data de entrega e prazo de entrega
        $sql = "SELECT nomeUsuario FROM usuario WHERE nomeUsuario like '$nome'";
        $result = mysqli_query($conn, $sql);
        $cont = mysqli_affected_rows($conn);
        if($cont > 0)
        {
            $resultado = mysqli_fetch_array($result);
            ?><h1 class='titulodomodal' id='nomeAlunoAtiv'><?php echo $resultado['nomeUsuario']; ?></h1>
                  <div class='traco'></div>
                  <div class='conteudo-modal'>
                    <span style='margin-bottom:0; font-size:24px; text-align:left;'><?php// echo $resultado['titulo_atividade'];?></span><br/>
                    <span class='prazo-para' id='prazoEntrega'>Prazo de entrega: <?php //echo $resultado['data_conclusao'];?></span>
                    <h2 class='entregue-em' id='dataEntregue'>Entregue em: <?php//echo $resultado['data_conclusao']?></h2>
                    <div class='materiais'>
                        <a href='#' download='<?php //echo $resultado['']?>' class='label'><?php // echo $resultado[''];?></a>
                        <i class='fas fa-download'></i>
                    </div>
                    <button class='botao-fechar'>Fechar</button>
                  </div>
                <?php  
        }
        else{
            echo "<h1 class='titulodomodal'>Não foram encontrados dados sobre essa atividade!</h1>";
        }
        
    }
?>