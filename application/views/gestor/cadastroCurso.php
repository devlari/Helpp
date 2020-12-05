<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require('../application/config/config.php');
        require('../application/config/Conn.class.php');

        ?>
        <h1>CADASTRAR CURSO</h1>
        <form method="POST" action="cadastrarCurso.php">
            <label for="nomeCurso" id="nomeCurso">Nome do Curso:</label>
            <input type="text" name="txtNomeCurso" id="txtNomeCurso"><br>
            <label for="eixoCurso" id="eixoCurso">Eixo do Curso:</label>
            <input type="text" name="txtEixoCurso" id="txtEixoCurso"><br>
            <button type="submit">Cadastrar</button>
        </form>
    </body>
</html>
