<?php
    require('../../config/config.php');
    require('../../config/Conn.class.php');
    require('../../models/Read.class.php');
    require('../../models/Atividade.class.php');
    require('../../models/AtividadeDAO.class.php');

    if (isset($_GET['codAtiv'])) :
        $idAtiv = $_GET['codAtiv'];
        $lerAtividade = new AtividadeDAO();
        $query = "SELECT * FROM atividade WHERE codAtividade = {echo $idAtiv}";
        $consulta = $lerAtividade->consultarAtividade($query);
    else :
        $idAtiv = null;
    endif;
    ?>
<h1>EDITAR ATIVIDADE</H1>
<form action="../../controllers/editAtividade.php" method="POST" enctype="multipart/form-data">
    <?php foreach ($consulta as $dados):?>
        <input name="id" type="hidden" value="<?php echo $dados['codAtividade']; ?>"><br/>
        <label>Título:</label>
        <input name="titulo" value="<?php echo $dados['titulo_atividade']; ?>"><br/>
        <label>Instrução:</label>
        <input name="instrucao" value="<?php echo $dados['instrucao_atividade']; ?>"><br/>
        <label>Prazo de entrega:</label>
        <input type="date" name="prazoEntrega" value="<?php echo $dados['prazo_entrega'];?>"></input><br/>
        <label>Forma de entrega:</label>
        <input name="formaEntrega" value="<?php echo $dados['forma_entrega']; ?>"><br/>
        <label for="upload">Arquivo:</label>
        <input type="file" name="upload" id="upload"><br/>
    <?php endforeach ?>
    <button type="submit" value="enviar">Editar</button>
</form>