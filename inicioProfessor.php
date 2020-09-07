<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="css/navbar.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet" />
    <title>Início</title>
    <script src="https://kit.fontawesome.com/43a2aaa0b4.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav>
        <div class="logo">
            <img src="img/helpp.png" />
        </div>
        <ul class="nav-links">
            <li><a href="#" class="inicio"><i class="fas fa-home"></i><span>Início</span></a></li>
            <li><a href="#" class="ativid"><i class="fas fa-file-alt"></i><span>Criar atividade</span></a></li>
            <li><a href="#" class="ativid"><i class="fas fa-file-alt"></i><span>Atividades</span></a></li>
            <li><a href="#" class="config"><i class="fas fa-cog"></i><span>Configurações</span></a></li>
            <li><a href="#" class="sair"><i class="fas fa-power-off"><span>Sair</span></i></a></li>
            <li><a href="#" class="dark-mode"><i class="fas fa-adjust"></i></a></li>
        </ul>
        <div class="burguer" id="burger">
            <div class="linha1"></div>
            <div class="linha2"></div>
            <div class="linha3"></div>
        </div>
    </nav>

    <section class="conteudo">
        <div class="dados-user">
            <ul>
                <li>Olá, Agatha</li>
                <li>RM: 100365</li>
                <li>Cargo: Professor(a)</li>
            </ul>
        </div>
        <div class="retangulo-pp">
            <div class="tabela">
                <div class="div-filtro">
                    <form class="filtro-pp">
                        <div class="div-turma">
                            <label for="filtro_turma1" class="lbl_filtro_turma1">
                                <h1>Turma:</h1>
                            </label>
                            <select class="filtro-turma1" name="filtro_turma1" id="filtro_turma1">
                                <option value="1">Química</option>
                                <option value="2">Física</option>
                            </select>
                        </div>
                        <div class="div-disciplina">
                            <label for="filtro_disciplina">
                                <h1>Disciplina:</h1>
                            </label>
                            <select class="filtro_disciplina1" name="filtro_disciplina" id="filtro_disciplina1">
                                <option>TPI</option>
                            </select>
                        </div>
                    </form>

                </div>
            </div>
            <button class="consultarpp">Consultar PP's</button>
        </div>
    </section>
    <div class="Atividade-titulo">
        <h1>Atividades recebidas</h1>
    </div>
    <section class="atividades_prof">
        <div class="filtro-atividades">
            <form>
                <div class="div-turma1">
                    <label for="filtro-turma2"><h1>Turma:</h1></label>
                    <select name="filtro-turma2" class="filtro-turma2" id="filtro-turma2">
                        <option value="1">3Ai</option>
                        <option value="2">2Be</option>
                        <option value="3">1Bi</option>
                    </select>
                </div>
                <div class="div-materia">
                    <label for="filtro-materia"><h1>Matéria:</h1></label>
                    <select name="filtro-materia" class="filtro-materia" id="filtro-materia">
                        <option value="1">Química</option>
                        <option value="2">Física</option>
                    </select>
                </div>
                <div class="div-atividade">
                    <label for="filtro-atividade"><h1>Atividade:</h1></label>
                    <select name="filtro-atividade" class="filtro-atividade" id="filtro-atividade">
                        <option value="1">Ánions e Cátions</option>
                    </select>
                </div>
                <a class="btnCadastrarAtividade" href="cadastrarAtiv.php">Cadastrar atividade</a>
                <input type="submit" class="btnConsultar" value="Consultar">
            </form>
        </div>
        <div class="tabela-atividades">

        </div>

    </section>
    <footer>
        <div class=rodape-imagem><img src="img/rodape-imagem.png" /></div>
        <div class="rodape">
            <div class="rodape2">
                <a href="https://www.crowntech.rf.gd" target="_blank"><img src="img/crowntech.png"
                        class="logo-rodape" /></a>
                <div class="endereco">
                    <i class="fas fa-map-marker-alt"></i><br />
                    <span class="endereco">R. Alcântara, 113 - Vila Guilherme, São Paulo - SP, 02110-010</span>
                </div>
                <div class="fone">
                    <i class="fas fa-phone-alt"></i><br />
                    <span class="telefone"> (11) 2905-1128<br />
                        (11) 2905-1125</span>
                </div>
                <div class="redes-sociais">
                    <a href="https://www.linkedin.com/crowntech" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    <a href="https://www.twitter.com/crowntech" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.instagram.com/crowntech_" target="_blank"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <div class="modal-container" id="modal-atividade">
        <div class="modal">
            <h3 class="tituloModal">Criação de listas ordenadas e não ordenadas.</h3>
            <div class="conteudo-modal">
                <div class="descricao">
                    <span>Crie um contexto e uma página com listas ordenadas e não ordenadas.</span>
                </div>
                <div class="material">
                    <div class="materiais">
                        <a href="#" download="NomeAtividade.txt" class="label">Atividade</a>
                        <i class="fas fa-download"></i>
                    </div>
                    <span class="prazo-entrega">Prazo de entrega: 27/05/2020 até 23:59.</span>
                </div>
                <div class="upload">
                    <span class="tituloUpload">Fazer upload de arquivo</span>
                    <form action="" method="POST">
                        <div class="materiais">
                            <label for="upload" class="label" id="label">Selecionar arquivo...</label>
                            <input type="file" name="upload" id="upload">
                            <i class="fas fa-upload"></i>
                        </div>
                        <input type="submit" value="Enviar" class="btnEnviar">
                        <button class="botao">Fechar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="js/app.js"></script>
</body>

</html>