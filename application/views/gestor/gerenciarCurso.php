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
            require('../../models/Curso.class.php');
            require('../../models/CursoDAO.class.php');
        ?>
        <h1>Gerenciar Cursos</h1>
        <table border = '1'>
            <tr>
                <td>Nome:</td>
                <td>Eixo:</td>
                <td>Ação:</td>
                <td>Ação:</td>
            </tr>            
            <?php
            $cursoDAO = new CursoDAO();
            $query = "SELECT * FROM curso";

            foreach ($cursoDAO->consultar($query) AS $curso):
                echo "<tr>";
                echo "<td>" . $curso["nome_curso"] . "</td>";
                echo "<td>" . $curso["eixo_curso"] . "</td>";
                echo "<td><a href=editarCurso.php?ID={$curso["cod_curso"]}>Editar</a></td>";
                echo "<td><a href=#>Excluir</a></td>";
                echo "</tr>";
            endforeach;
            ?>
        </table>
    </body>
</html>