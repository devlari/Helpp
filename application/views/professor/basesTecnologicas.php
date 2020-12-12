<?php
session_start();
require("../../config/config.php");
require("../../config/Conn.class.php");
require("../../models/AlunoDAO.class.php");

$aluno = new AlunoDAO();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="../../../system/css/navbar.css" />
    <link rel="stylesheet" type="text/css" href="../../../system/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet" />
    <title>Bases tecnológicas</title>
    <script src="https://kit.fontawesome.com/43a2aaa0b4.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav id="navbar-helpp">
        <div class="logo">
            <img src="../../../system/img/helpp.png" />
        </div>
        <ul class="nav-links">
            <li><a href="#" class="inicio"><i class="fas fa-home"></i><span class="spanInicio">Início</span></a></li>
            <li><a href="#" class="ativid"><i class="fas fa-file-alt"></i><span class="spanAtiv">Atividades</span></a></li>
            <li><a href="#" class="ativid"><i class="far fa-plus-square"></i><span class="spanCriarAtiv">Criar atividade</span></a></li>
            <li><a href="#" class="config"><i class="fas fa-cog"></i><span class="spanConfig">Configurações</span></a></li>
            <li><a href="#" class="sair"><i class="fas fa-power-off"><span class="spanSair">Sair</span></i></a></li>
        </ul>
        <div class="burguer" id="burger">
            <div class="linha1"></div>
            <div class="linha2"></div>
            <div class="linha3"></div>
        </div>
    </nav>
    <div class="content-page" id="tela">
        <h1 class="basesTecnologicasTitle">Bases tecnológicas</h1>
        <div class="container">
            <?php
                $rm = $_GET['rmAluno'];
                $query = "SELECT u.nomeUsuario, p.anoPP, d.nomeDisciplina, p.habilidadePP, p.conhecimentoPP, p.tecnologiaPP FROM usuario AS u
                INNER JOIN pp AS p
                ON u.rmUsuario = p.aluno_rmAluno
                INNER JOIN disciplina AS d
                ON p.disciplina_codDisciplina = d.codDisciplina
                WHERE u.rmUsuario = '$rm'";
                $result = $aluno->consultarALuno($query);
            ?>
            <div class="infoPP">
                <h3 class="infoAluno"><span class="infoBold">Aluno: </span>
                <?php
                    foreach ($result as $dados){
                        echo $dados['nomeUsuario']; 
                    } 
                ?></h3>
                <h3 class="infoMateria"><span class="infoBold">PP em: </span>
                <?php
                    foreach ($result as $dados){
                        echo $dados['nomeDisciplina'] . ", " .  $dados['anoPP']; 
                    }  
                ?></h3>
                <h3></h3>
            </div>
        </div>
        <div class="container2">
            <form action="../../controllers/editandoPP.php" method="POST" class="frmBasesTec">
                <input name='rmAluno' type="hidden" value=<?php echo $rm;?>></input>
                <div class="basesTecnologicas">
                    <div class="campoCompetencias">
                        <h3 class="titulo-competencias">Competências</h3>
                        <div class="traco"></div>
                        <textarea class="txtCompetencias" id="txtCompetencias" name="txtCompetencias" placeholder="Digite as competências aqui...">
                        <?php
                            foreach ($result as $dados){
                                echo $dados['conhecimentoPP']; 
                            }  
                        ?>   
                        </textarea>
                    </div>
                    <div class="campoCompetencias">
                        <h3 class="titulo-competencias">Habilidades</h3>
                        <div class="traco"></div>
                        <textarea class="txtCompetencias" id="txtHabilidades" name ="txtHabilidades" placeholder="Digite as habilidades aqui...">
                        <?php
                            foreach ($result as $dados){
                                echo $dados['habilidadePP']; 
                            }  
                        ?>
                        </textarea>
                    </div>
                    <div class="campoCompetencias" style="position: relative">
                        <h3 class="titulo-competencias">Base(s) tecnológica(s) ou científica(s)</h3>
                        <div class="traco"></div>
                        <textarea class="txtCompetencias" id="txtBasesTecnologicas" name = "txtBasesTecnologicas" placeholder="Digite as bases tecnologicas aqui...">
                        <?php
                            foreach ($result as $dados){
                                echo $dados['tecnologiaPP']; 
                            }  
                        ?>
                        </textarea>
                        <input type="submit" value="Salvar" class="btnEnviar" style="position:absolute; bottom:-55px; right:0px;">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="../system/js/app.js"></script>
</body>

</html>