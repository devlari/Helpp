<?php

require('../application/controllers/conexao.php');
require('../application/config/config.php');
require('../application/config/Conn.class.php');


if (isset($_GET["txtRm"]) || isset($_GET["txtCodAtiv"])) {
    if ($_GET["funcao"] == "modalAtivAluno") {
        modalAtivAluno();
    }
    if ($_GET["funcao"] == "modalPp") {
        modalPp();
    }
    if ($_GET["funcao"] == "modalAtiv") {
        modalAtiv();
    }
    if ($_GET["funcao"] == "modalAtivRequisitada") {
        modalAtivRequisitada();
    }
    if ($_GET["funcao"] == "modalGestor") {
        modalGestor();
    }
} else {
    echo "<h1 class='titulodomodal'>Não foram encontrados dados sobre esse aluno!</h1>";
}
function modalAtivAluno()
{
    $conexao = conexao();
    $codAtiv = $_GET["txtCodAtiv"];
    $sql = "SELECT codAtividade, titulo_atividade, instrucao_atividade, arquivo_prof, prazo_entrega from atividade where codAtividade = $codAtiv";
    $result = mysqli_query($conexao, $sql);
    $cont = mysqli_affected_rows($conexao);

    if ($cont > 0) {
        $resultado = mysqli_fetch_array($result);
        $dataArrumada = explode("-", $resultado["prazo_entrega"]);
        $dataNova = $dataArrumada[2] . "/" . $dataArrumada[1] . "/" . $dataArrumada[0];
?>
        <input type="hidden" value="<?php echo $resultado['codAtividade']; ?>">
        <h3 class="tituloModal"><?php echo $resultado['titulo_atividade']; ?></h3>
        <div class="traco"></div>
        <div class="conteudo-modal">
            <div class="descricao">
                <span><?php echo $resultado['instrucao_atividade']; ?></span>
            </div>
            <div class="material">
                <div class="materiais">
                    <a href="../../../system/arquivos/<?php echo $resultado['arquivo_prof']; ?>" download="ativ" class="label">Instrução atividade</a>
                    <i class="fas fa-download"></i>
                </div>
                <span class="prazo-entrega">Prazo de entrega: <?php echo $dataNova; ?></span>
            </div>
            <div class="upload">
                <span class="tituloUpload">Fazer upload de arquivo</span>
                <form action="../../controllers/enviarAtivAluno.php" method="POST" enctype="multipart/form-data">
                    <div class="materiais">
                        <input type='hidden' id='codigoAtividade' name='codigoAtividade' value='<?php echo $codAtiv ?>'>
                        <label for="upload" class="label" id="label">Selecionar arquivo...</label>
                        <input type="file" name="upload" id="upload" required>
                        <i class="fas fa-upload"></i>
                    </div>
                    <input type="submit" value="Enviar" class="btnEnviar">
                    <div class="botao">Fechar</div>
                </form>
            </div>
        </div>
    <?php
    }
}

function modalAtiv()
{
    $conexao = conexao();
    $rm = $_GET['txtRm'];
    $sql = "SELECT a.codAtividade, a.titulo_atividade, a.data_conclusao, a.arquivo_aluno, a.prazo_entrega, b.nomeUsuario from atividade as a inner join usuario as b on a.PP_Aluno_rmAluno = b.rmUsuario where a.PP_Aluno_rmAluno = $rm";
    $result = mysqli_query($conexao, $sql);
    $cont = mysqli_affected_rows($conexao);
    echo mysqli_error($conexao);
    if ($cont > 0) {
        $resultado = mysqli_fetch_array($result);
        $data_prazo = $resultado['prazo_entrega'];
        $data_entrega = $resultado['data_conclusao'];

        $dataPrazoArrumada = explode("-", $data_prazo);
        $dataPrazoNova = $dataPrazoArrumada[2] . "/" . $dataPrazoArrumada[1] . "/" . $dataPrazoArrumada[0];

        $dataEntregaArrumada = explode("-", $data_entrega);
        $dataEntregaNova = $dataEntregaArrumada[2] . "/" . $dataEntregaArrumada[1] . "/" . $dataPrazoArrumada[0];

    ?>
        <h1 class="titulodomodal"><?php echo $resultado['nomeUsuario']; ?></h1>
        <div class="traco"></div>
        <div class="conteudo-modal">
            <form action="../../controllers/atualizandoAtividade.php" method="POST">
                <input name="idAtiv" type="hidden" value="<?php echo $resultado['codAtividade']; ?>">
                <span class="prazo-para">Prazo de entrega: <?php echo $dataPrazoNova; ?></span>
                <h2 class="entregue-em">Entregue em: <?php echo $dataEntregaNova; ?></h2>
                <div class="materiais">
                    <a href="../../../system/arquivos/<?php echo $resultado['arquivo_aluno'] ?>" download='<?php echo $resultado['arquivo_aluno'] ?>' class="label">Arquivo Aluno</a>
                    <i class="fas fa-download"></i>
                </div>
                <div class="mencao">
                    <form action="">
                        <label for="mencaoAtiv" style="margin-top:15px;">Menção:</label>
                        <select name="mencaoAtiv" id="mencaoAtiv">
                            <option value="MB">MB</option>
                            <option value="B">B</option>
                            <option value="R">R</option>
                            <option value="I">I</option>
                        </select>
                </div>
                <input type="submit" style="float: left; margin-right: 7px;" class="botao-fechar" value="Enviar">
            </form>
            <button class="botao-fechar" style="z-index:99999">Fechar</button>
        </div>

    <?php
    } else {
        echo "<h1 class='titulodomodal'>Ops!</h1>
        <div class='traco'></div><h1 class='titulodomodal'>Não foram encontrados dados sobre essa atividade!</h1>";
    }
}

function modalPp()
{
    $conexao = conexao();
    $rm = $_GET["txtRm"];
    //instrução que pega nome do aluno, titulo da atividade, descrição/instrução da atividade, data de entrega e prazo de entrega
    $sql = "Select a.aluno_RmAluno, a.disciplina_codDisciplina, a.disciplinaPP, a.anoPP, a.conhecimentoPP, a.habilidadePP, a.tecnologiaPP, a.mencaoFinal, a.statusPP, b.nomeUsuario from pp a inner join usuario b on a.aluno_rmAluno = b.rmUsuario where a.aluno_rmAluno = $rm";
    $result = mysqli_query($conexao, $sql);
    $cont = mysqli_affected_rows($conexao);
    if ($cont > 0) {
        $sql2 = "Select titulo_atividade, mencao_atividade from atividade a inner join pp b on a.PP_Aluno_rmAluno = b.aluno_rmAluno where b.aluno_rmAluno = $rm";
        $result2 = mysqli_query($conexao, $sql2);
        $cont2 = mysqli_affected_rows($conexao);
        $resultado = mysqli_fetch_array($result);


    ?>
        <h1 class="titulodomodal" style="font-size:30px; font-weight:900;"><?php echo $resultado['nomeUsuario']; ?></h1>
        <div class="traco"></div>
        <div class="conteudo-modal">
            <form action="" method="POST" id="form-mencao-final">
            <div class="linha-um-doc30">
                <span class="dados-pp">PP em: <?php echo $resultado['anoPP']; ?><br /><?php echo $resultado['disciplinaPP']; ?></span>
                <div class="tabela-ativ-geral">
                    <?php
                    if ($cont2 > 0) {
                        $resultado2 = mysqli_fetch_array($result2);
                    ?>
                        <table class="tabela-atividades-pp" id="tabela-ativ-pp">
                            <tr>
                                <th class="headerAtividade">Atividade</th>

                                <th class="headerMencaoGeral">Menção</th>
                            </tr>
                            <tr>
                                <td class="celulaAtividadeNome"><?php echo $resultado2['titulo_atividade'] ?></td>
                                <td class="celulaMencaoGeral"><?php echo $resultado2['mencao_atividade'] ?></td>
                            </tr>
                        <?php } else {
                        echo "<h3>opa, esse aluno n tem atividades</h3>";
                    } ?>
                        </table>
                </div>
                <div class="Status-Mencao-PP">
                    <h1 class="statusPP"><?php echo $resultado['statusPP']; ?></h1>
                    <label name="mencao-final-pp">Menção final:</label>
                    <select name="mencao-final-pp" id="mencao-final-pp" required>
                        <option value="0" disabled selected>Selecione uma menção</option>
                        <option value="1">MB</option>
                        <option value="2">B</option>
                        <option value="3">R</option>
                        <option value="4">I</option>
                    </select>
                    
                </div>
            </div>
            <div class="requerimentos">
                <div class="competencias">
                    <h3 class="titulo-competencias">Competências</h3>
                    <div class="traco"></div>
                    <div class="spn-requerimentos">
                        <span><?php echo $resultado['conhecimentoPP']; ?></span>
                    </div>
                </div>
                <div class="competencias">
                    <h3 class="titulo-competencias">Habilidades</h3>
                    <div class="traco"></div>
                    <div class="spn-requerimentos">
                        <span><?php echo $resultado['habilidadePP']; ?></span>
                    </div>
                </div>
                <div class="competencias">
                    <h3 class="titulo-competencias">Base(s) Tecnológica(s) ou Cientifíca</h3>
                    <div class="traco"></div>
                    <div class="spn-requerimentos">
                        <span><?php echo $resultado['tecnologiaPP']; ?></span>
                    </div>
                </div>
            </div>
            <div class="botao12">
                <input type="submit" class="botao-fechar" value="Salvar" id="btnSalvarDoc" style="margin-right:10px" onclick="verificaSelect()">
                </form>
                <a class="botao-editar" href="basesTecnologicas.php?rmAluno=<?php echo $resultado['aluno_RmAluno'] ?>&codDisc=<?php echo $resultado['disciplina_codDisciplina']; ?>">Editar</a>
                <a class="botao-fechar">Fechar</a>
            </div>
        <?php
    }
}

function modalGestor()
{
    $conexao = conexao();
    $rm = $_GET["txtRm"];
    $disciplina = $_GET["disciplina"];
    $sql = "Select a.aluno_RmAluno, a.disciplina_codDisciplina, a.disciplinaPP, a.anoPP, a.conhecimentoPP, a.habilidadePP, a.tecnologiaPP, a.mencaoFinal, a.statusPP, b.nomeUsuario from pp a inner join usuario b on a.aluno_rmAluno = b.rmUsuario where a.aluno_rmAluno = $rm and a.disciplinaPP = '$disciplina'";
    $result = mysqli_query($conexao, $sql);
    $cont = mysqli_affected_rows($conexao);
    if ($cont > 0) {
        $resultado = mysqli_fetch_array($result);
        ?>
            <form action="" method="POST">
                <h1 class="titulodomodal" style="font-size:30px; font-weight:900;"><?php echo $resultado['nomeUsuario']; ?></h1>
                <div class="traco"></div>
                <div class="conteudo-modal">
                    <div class="linha-um-doc30">
                        <span class="dados-pp">PP em: <?php echo $resultado['anoPP']; ?><br /><?php echo $resultado['disciplinaPP']; ?></span>
                        <div class="tabela-ativ-geral"></div>
                        <div class="Status-Mencao-PP">
                            <label for="txtStatusPP" style="font-weight:bold;">Status:</label>
                            <select name="txtStatusPP" id="txtStatusPP">
                                <!-- MOSTRAR O VALUE DO STATUS VINDO DO BANCO(TA ESTATICO)-->
                                <option value="0">Em aberto</option>
                                <option value="1">Concluida</option>
                            </select>
                            <h3 class="mencaoFinal">Menção final: <?php echo $resultado['mencaoFinal']; ?></h3>
                        </div>
                    </div>
                    <div class="requerimentos">
                        <div class="competencias">
                            <h3 class="titulo-competencias">Competências</h3>
                            <div class="traco"></div>
                            <div class="spn-requerimentos">
                                <span><?php echo $resultado['conhecimentoPP']; ?></span>
                            </div>
                        </div>
                        <div class="competencias">
                            <h3 class="titulo-competencias">Habilidades</h3>
                            <div class="traco"></div>
                            <div class="spn-requerimentos">
                                <span><?php echo $resultado['habilidadePP']; ?></span>
                            </div>
                        </div>
                        <div class="competencias">
                            <h3 class="titulo-competencias">Base(s) Tecnológica(s) ou Cientifíca</h3>
                            <div class="traco"></div>
                            <div class="spn-requerimentos">
                                <span><?php echo $resultado['tecnologiaPP']; ?></span>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="botao-fechar" value="Salvar"/>
            </form>
            <button class="botao-fechar">Fechar</button>
        </div>

        <?php
    }
}

function modalAtivRequisitada()
{
    $conexao = conexao();
    $codAtiv = $_GET['txtCodAtiv'];
    $sql = "SELECT codAtividade, titulo_atividade, instrucao_atividade, arquivo_prof, prazo_entrega from atividade where codAtividade = $codAtiv";
    $result = mysqli_query($conexao, $sql);
    $cont = mysqli_affected_rows($conexao);
    if ($cont > 0) {
        $resultado = mysqli_fetch_array($result);
        $dataArrumada = explode("-", $resultado["prazo_entrega"]);
        $dataNova = $dataArrumada[2] . "/" . $dataArrumada[1] . "/" . $dataArrumada[0];
        ?>
            <h1 class="titulodomodal"><?php echo $resultado['titulo_atividade']; ?></h1>
            <div class="traco"></div>
            <div class="conteudo-modal">
                <div class="descricao">
                    <span style="font-weight:bold;">Descrição: </span><br /><span style="font-weight:400"><?php echo $resultado['instrucao_atividade']; ?></span>
                </div>
                <span class="prazo-para">Prazo de entrega: <?php echo $dataNova; ?></span>
                <div class="materiais">
                    <a href="../../../system/arquivos/<?php echo $resultado['arquivo_prof'] ?>" download='<?php echo $resultado['arquivo_prof']; ?>' class="label">Arquivo </a>
                    <i class="fas fa-download"></i>
                </div>
                <div class="botao12">
                    <a class="botao-editar" href="editarAtividade.php?codAtiv=<?php echo $resultado['codAtividade']; ?>">Editar</a>
                    <a class="botao-editar" href="../naoseiqualéocaminho/<?php echo $resultado['codAtividade']; ?>">Excluir</a>
                    <button class="botao-fechar">Fechar</button>
                </div>
            </div>
    <?php
    }
}


    ?>