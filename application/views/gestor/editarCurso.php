<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    <?php
        require('../../config/config.php');
        require('../../config/Conn.class.php');
        require('../../models/Read.class.php');
        require('../../models/Curso.class.php');
        require('../../models/CursoDAO.class.php');
        
        if (isset($_GET['ID'])):
            $idCurso = $_GET['ID'];
            $lerCurso = new CursoDAO();
            $query = "SELECT * FROM curso WHERE cod_curso = {$idCurso}";
            $lerCurso->consultar($query);
        else:
            $idCurso = null;
        endif;
        ?>
        <H1>Editar Curso</h1>
        <form class="editarCurso" method="POST" action="../../controllers/editCurso.php">
            <?php  foreach ($lerCurso->consultar($query) AS $curso); ?>
            <input type="hidden" name="txtIdCurso" id="txtIdCurso" value="<?php echo $idCurso ?>"><br>
            <label for="nomeCurso" id="nomeCurso">Nome do Curso:</label>
            <input type="text" name="txtNomeCurso" id="txtNomeCurso" value="<?php echo $curso["nome_curso"]; ?>"><br>
            <label for="eixoCurso" id="eixoCurso">Eixo:</label>
            <input type="text" name="txtEixoCurso" id="txtEixoCurso" value="<?php echo $curso["eixo_curso"]; ?>"><br>
            <button type="submit">Alterar</button>
        </form>
    </body>
</html>
