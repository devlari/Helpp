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
        require('../../models/Disciplina.class.php');
        require('../../models/DisciplinaDAO.class.php');
        
        if (isset($_GET['ID'])):
            $idDisciplina = $_GET['ID'];
        
            $lerDisciplina = new DisciplinaDAO();
            $query = "SELECT * FROM disciplina WHERE codDisciplina = {$idDisciplina}";
            $lerDisciplina->consultar($query);
            
        else:
            $idDisciplina = null;
        endif;
        ?>
        <H1>Editar Disciplina</h1>
        <form class="editarDisciplina" method="POST" action="../../controllers/editDisciplina.php">
            <?php  foreach ($lerDisciplina->consultar($query) AS $disciplina); ?>
            <input type="hidden" name="txtIdDisciplina" id="txtIdDisciplina" value="<?php echo $idDisciplina ?>"><br>
            <label for="nomeDisciplina" id="nomeDisciplina">Nome da Disciplina:</label>
            <input type="text" name="txtNomeDisciplina" id="txtNomeDisciplina" value="<?php echo $disciplina["nomeDisciplina"]; ?>"><br>
            <label for="siglaDisciplina" id="siglaDisciplina">Sigla da Disciplina:</label>
            <input type="text" name="txtSiglaDisciplina" id="txtSiglaDisciplina" value="<?php echo $disciplina["siglaDisciplina"]; ?>"><br>
            <button type="submit">Alterar</button>
        </form>
    </body>
</html>
