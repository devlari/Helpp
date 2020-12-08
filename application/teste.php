<?php

require('../application/controllers/conexao.php');
require('../application/config/config.php');
require('../application/config/Conn.class.php');
if (isset($_GET["txtRm"])) {
    $rm = $_GET["txtRm"];
    //instrução que pega nome do aluno, titulo da atividade, descrição/instrução da atividade, data de entrega e prazo de entrega
    $sql = "Select a.disciplinaPP, a.anoPP, a.conhecimentoPP, a.habilidadePP, a.tecnologiaPP, a.mencaoFinal, a.statusPP, b.nomeUsuario from pp a inner join usuario b on a.aluno_rmAluno = b.rmUsuario where a.aluno_rmAluno = $rm";
    $sql2 = "Select titulo_atividade, mencao_atividade from atividade a inner join pp b on a.PP_Aluno_rmAluno = b.aluno_rmAluno where b.aluno_rmAluno = $rm";
    $result = mysqli_query($conexao, $sql);
    $result2 = mysqli_query($conexao, $sql2);
    $cont = mysqli_affected_rows($conexao);
    $cont2 = mysqli_affected_rows($conexao);
    if ($cont > 0 && $cont2) {
        $resultado2 = mysqli_fetch_array($result2);
        $resultado = mysqli_fetch_array($result);
?>
        <!--<h1 class='titulodomodal' id='nomeAlunoAtiv'><?php // echo $resultado['nomeUsuario']; 
                                                            ?></h1>
                  <div class='traco'></div>
                  <div class='conteudo-modal'>
                    <span style='margin-bottom:0; font-size:24px; text-align:left;'><?php// echo $resultado['titulo_atividade'];?></span><br/>
                    <span class='prazo-para' id='prazoEntrega'>Prazo de entrega: <?php //echo $resultado['data_conclusao'];
                                                                                    ?></span>
                    <h2 class='entregue-em' id='dataEntregue'>Entregue em: <?php//echo $resultado['data_conclusao']?></h2>
                    <div class='materiais'>
                        <a href='#' download='<?php //echo $resultado['']
                                                ?>' class='label'><?php // echo $resultado[''];
                                                                                            ?></a>
                        <i class='fas fa-download'></i>
                    </div>
                    <button class='botao-fechar'>Fechar</button>
                  </div>-->
        <h1 class="titulodomodal" style="font-size:30px; font-weight:900"><?php echo $resultado['nomeUsuario'] ;?></h1>
        <div class="traco"></div>
        <div class="conteudo-modal">
            <div class="linha-um-doc30">
                <span class="dados-pp">PP em: <?php echo $resultado['anoPP'];?><br /><?php echo $resultado['disciplinaPP']; ?></span>
                <div class="tabela-ativ-geral">
                    <table class="tabela-atividades-pp" id="tabela-ativ-pp">
                        <tr>
                            <th class="headerAtividade">Atividade</th>

                            <th class="headerMencaoGeral">Menção</th>
                        </tr>
                        <tr>
                            <td class="celulaAtividadeNome"><?php echo $resultado2['titulo_atividade']?></td>
                            <td class="celulaMencaoGeral"><?php echo $resultado2['mencao_atividade']?></td>
                        </tr>
                        <tr>
                            <td class="celulaAtividadeNome"><?php echo $resultado2['titulo_atividade']?></td>
                            <td class="celulaMencaoGeral"><?php echo $resultado2['mencao_atividade']?></td>
                        </tr>
                    </table>
                </div>
                <div class="Status-Mencao-PP">
                    <h1 class="statusPP"><?php echo $resultado['statusPP'];?></h1>
                    <h3 class="mencaoFinal">Menção final: <?php echo $resultado['mencaoFinal']?></h3>
                </div>
            </div>
            <div class="requerimentos">
                <div class="competencias">
                    <h3 class="titulo-competencias">Competências</h3>
                    <div class="traco"></div>
                    <div class="spn-requerimentos">
                        <!--<span>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Mollitia in, molestias perspiciatis omnis illo sunt est enim, quidem corporis, nisi aliquid incidunt sequi delectus vel ipsum. Eligendi ullam tempora placeat?</span>-->
                    </div>
                </div>
                <div class="competencias">
                    <h3 class="titulo-competencias">Habilidades</h3>
                    <div class="traco"></div>
                    <div class="spn-requerimentos">
                        <!--<span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam fugit ipsum obcaecati porro, iusto odio?</span>-->
                    </div>
                </div>
                <div class="competencias">
                    <h3 class="titulo-competencias">Base(s) Tecnológica(s) ou Cientifíca</h3>
                    <div class="traco"></div>
                    <div class="spn-requerimentos">
                        <!--<span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam odit, temporibus harum sunt debitis quod. Ipsa adipisci repudiandae amet quasi.</span>-->
                    </div>
                </div>
            </div>
    <?php
    } else {
        echo "<h1 class='titulodomodal'>Não foram encontrados dados sobre essa atividade!" . $rm . "</h1>";
    }
}
    ?>