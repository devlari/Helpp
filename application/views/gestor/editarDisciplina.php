<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../../system/css/navbar.css" />
    <link rel="stylesheet" type="text/css" href="../../../system/css/style.css">

    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet" />
    <title>Início</title>
    <script src="https://kit.fontawesome.com/43a2aaa0b4.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    require('../../config/config.php');
    require('../../config/Conn.class.php');
    require('../../models/Read.class.php');
    require('../../models/Disciplina.class.php');
    require('../../models/DisciplinaDAO.class.php');

    if (isset($_GET['ID'])) :
        $idDisciplina = $_GET['ID'];

        $lerDisciplina = new DisciplinaDAO();
        $query = "SELECT * FROM disciplina WHERE codDisciplina = {$idDisciplina}";
        $lerDisciplina->consultar($query);

    else :
        $idDisciplina = null;
    endif;
    ?>
    <div class="wrapper">
        <div class="editarTurma">
            <h1 class="tituloForm3">Editar Disciplina</h1>
            <form class="formAtiv" method="POST" action="../../controllers/editDisciplina.php">
                <?php foreach ($lerDisciplina->consultar($query) as $disciplina); ?>
                <input type="hidden" name="txtIdDisciplina" id="txtIdDisciplina" value="<?php echo $idDisciplina ?>"><br>
                <label for="nomeDisciplina" id="nomeDisciplina">Nome da Disciplina:</label>
                <input type="text" name="txtNomeDisciplina" id="txtNomeDisciplina" value="<?php echo $disciplina["nomeDisciplina"]; ?>"><br>
                <label for="siglaDisciplina" id="siglaDisciplina">Sigla da Disciplina:</label>
                <input type="text" name="txtSiglaDisciplina" id="txtSiglaDisciplina" value="<?php echo $disciplina["siglaDisciplina"]; ?>"><br>
                <button type="submit" class="btnAlterar">Alterar</button>
            </form>
        </div>
    </div>
</body>

</html>