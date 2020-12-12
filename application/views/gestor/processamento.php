<?php
            session_start();
            echo "<h1>Pagina de processamento </h1><br>";
            
            //Chamando a classe PHPExcel e a conexão
            require("../../../Libraries/PHPExcel.php");
            require("../../../Libraries/PHPExcel/IOFactory.php");
            require("../../../application/models/Gestor.class.php");
            
            //Chamando os arquivos responsáveis pela conexão ao banco
            require ("../../../application/config/config.php");
            require ("../../../application/config/Conn.class.php");
            
            //Classes de cadastro
            require ("../../../application/models/Create.class.php");
            require ("../../../application/models/Usuario.php");
            require ("../../../application/models/UsuarioDAO.class.php");
            require ("../../../application/models/AlunoDAO.class.php");
            require ("../../../application/models/Turma.class.php");
            require ("../../../application/models/TurmaDAO.class.php");
            require ("../../../application/models/Disciplina.class.php");
            require ("../../../application/models/DisciplinaDAO.class.php");
            require ("../../../application/models/PP.class.php");
            require ("../../../application/models/PPDAO.class.php");
            require ("../../../application/models/ProfessorDAO.class.php");
            
            //Instanciando as classes
            $Usuario = new application\models\Usuario();
            $UsuarioDAO = new UsuarioDAO();
            $AlunoDAO = new AlunoDAO();
            $profDAO = new ProfessorDAO();
            $PP = new PP();
            $PPDAO = new PPDAO();
            $turma = new Turma();
            $turmaDAO = new TurmaDAO();
            $disc = new Disciplina();
            $discDAO = new DisciplinaDAO();
            
            
            //Verificando se o arquivo não veio vazio
            if(!empty($_FILES['uploadPPs']['tmp_name'])){
                $planilha = $_FILES['uploadPPs']['tmp_name'];
                
                //Carrega automaticamente qualquer tipo de arquivo que for enviado
                $leitura = PHPExcel_IOFactory::createReaderForFile($planilha);
                
                //Carrega o arquivo enviado
                $objPHPExcel = $leitura->load($planilha);
                
                $worksheet = $objPHPExcel->getSheet(2);

                //foreach($worksheet as $sheet){
                    $totalLinhas = $worksheet->getHighestRow();
                    
                    //pegando o total de colunas
                    $colunas = $objPHPExcel->setActiveSheetIndex(2)->getHighestColumn();
                    $totalColunas = PHPExcel_Cell::columnIndexFromString($colunas);
                                        
                    //ALTEREI O FOR PRA IR POUCO DADO PRO BANCO AGORA NO COMEÇO - Xofana
                    for ($row=2; $row<=5; $row++){             
                        for ($coluna=0; $coluna<=$totalColunas; $coluna++){
                            $dados = $worksheet->getCellByColumnAndRow($coluna, $row)->getValue();
                            if ($dados != null){
                                switch($coluna){
                                    case 0: $ordem = $objPHPExcel->getActiveSheet()->getCell('A'. $row)->getValue();
                                    case 1: $rmAluno = $objPHPExcel->getActiveSheet()->getCell('B'. $row)->getValue();break;
                                    case 2: $nomeAluno = $objPHPExcel->getActiveSheet()->getCell('C'. $row)->getValue();break;
                                    case 3: $periodo = $objPHPExcel->getActiveSheet()->getCell('D'. $row)->getValue();break;
                                    case 4: $turmaPP = $objPHPExcel->getActiveSheet()->getCell('E'. $row)->getValue();break;
                                    case 5: $semestreAno = $objPHPExcel->getActiveSheet()->getCell('F'. $row)->getValue();break;
                                    case 6: $disciplina = $objPHPExcel->getActiveSheet()->getCell('G'. $row)->getValue();break;
                                    case 7: $rmProf1 = $objPHPExcel->getActiveSheet()->getCell('H'. $row)->getCalculatedValue();break;
                                    case 8: $professor1 = $objPHPExcel->getActiveSheet()->getCell('I'. $row)->getCalculatedValue();break;
                                    case 9: $rmProf2 = $objPHPExcel->getActiveSheet()->getCell('J'. $row)->getCalculatedValue();break;
                                    case 10: $professor2 = $objPHPExcel->getActiveSheet()->getCell('K'. $row)->getCalculatedValue();break;
                                    case 11: $turmaAtual = $objPHPExcel->getActiveSheet()->getCell('L'. $row)->getValue();break;
                                    default: $nulo = $dados;    
                                }

                            }
                        }
                        
                        //Enviando os valores pra classe usuário
                        $Usuario->setId($rmAluno);
                        $Usuario->setNome($nomeAluno);
                        $Usuario->setPerfil('Aluno');
                        $Usuario->setSenha('ETECHAS');
                        
                        //Enviando os valores para a classe turma
                        $turma->setNomeTurma($turmaPP);
                        $turma->setAnoTurma($semestreAno);
                        $turma->setCodCurso(1); //setado manualmente!
                        
                        //Verifica se turma já existe, se o resultado é falso, ela pode ser cadastrada
                        $turmaDAO->verificaTurma($turma);
                        if ($turmaDAO->getResult() == false){
                           $turmaDAO->cadastrar($turma);
                        }
                        
                        //Verifica se usuário já existe no banco
                        $UsuarioDAO->verificaUsuario($rmAluno);
                        
                        //Se o resultado é falso, significa que não existe, então pode cadastrar
                        if ($UsuarioDAO->getResult() == false){
                            //Cadastrando usuário e aluno
                            $UsuarioDAO->cadastrarUsuario($Usuario);
                            $AlunoDAO->cadastrarAluno($Usuario);
                            
                        }
                        
                        //Verifica se a turma já existe, se sim, ele cadastra o aluno e o codigo da turma na tabela aluno_turma 
                        foreach($turmaDAO->verificaTurma($turma) as $t){
                            $turma->setCodTurma($t["cod_turma"]);
                            $Usuario->setId($rmAluno);
                        }
                        $turmaDAO->cadastrarAlunoTurma($turma, $Usuario);
                        
                        //Cadastrando Professor 1
                        $Usuario->setId($rmProf1);
                        $Usuario->setNome($professor1);
                        $Usuario->setPerfil('Professor');
                        
                        $UsuarioDAO->verificaUsuario($rmProf1);
                        
                        //Se o resultado é falso, significa que não existe, então pode cadastrar
                        if ($UsuarioDAO->getResult() == false){
                            //Cadastrando usuário e professor
                            $UsuarioDAO->cadastrarUsuario($Usuario);
                            $profDAO->cadastrarProfessor($Usuario);
                        }
                     
                        //Verifica se o rm do prof 2 é diferente de 0, se sim significa que há um segundo prof
                        if($rmProf2 != 0){
                            $Usuario->setId($rmProf2);
                            $Usuario->setNome($professor2);
                            $Usuario->setPerfil('Professor');
                            
                            $UsuarioDAO->verificaUsuario($rmProf2);
                            
                            if ($UsuarioDAO->getResult() == false){
                                //Cadastrando usuário e professor
                                $UsuarioDAO->cadastrarUsuario($Usuario);
                                $profDAO->cadastrarProfessor($Usuario);
                            }
                        }
                        
                        //Cadastrando disciplina
                        //Verifica se existe a turma, se sim é pegado o codigo e setado na classe disciplina, e as informações vão pra PP
                        foreach($turmaDAO->verificaTurma($turma) as $t){
                               $disc->setCodTurma($t["cod_turma"]);
                               $PP->setSeriePP($t["nome_turma"]);
                               $PP->setAnoPP($t["ano_turma"]);
                        }
                        
                        $disc->setNomeDisciplina($disciplina);
                        
                        //Verifica se disciplina existe antes de cadastrar
                        if ($discDAO->verificaDisciplina($disc) == false){
                            $discDAO->cadastrar($disc);
                        }
                        
                        //Verifica se disciplina existe, se sim ela é enviada para a classe PP
                        foreach($discDAO->verificaDisciplina($disc) as $d){
                               $PP->setCodDisciplina($d["codDisciplina"]);
                               $PP->setDisciplinaPP($d["nomeDisciplina"]);
                               $disc->setCodDisciplina($d["codDisciplina"]);
                               $id1 = $rmProf1;
                               if($rmProf2 != 0){
                                   $id2 = $rmProf2;
                               }
                        }
                        
                        $discDAO->cadastrarProfDisc($disc, $id1);
                        if($rmProf2 != 0){
                            $discDAO->cadastrarProfDisc($disc, $id2);
                        }

                        //Setando os valores da PP
                        $PP->setRmAluno($rmAluno);
                        $PP->setRmProfessor($rmProf1);
                        $PP->setRmGestor('180115');
                        $PP->setStatusPP('Em aberto');
                        $PP->setCursoPP('Informática');
                        $PP->setAnoPP($semestreAno);
                        
                        $PPDAO->verificaDisciplina($disc);
                        if($PPDAO->getResultado() == false){
                            //Cadastrando PP
                            $PPDAO->cadastrar($PP);
                            $PPDAO->cadastrarProfPP($PP, $id1);
                            if($rmProf2 != 0){
                                $PPDAO->cadastrarProfPP($PP, $id2);
                            }
                        }
                        
                        echo "RM do aluno: " . $rmAluno . "<br>";
                        echo "Nome do aluno: " . $nomeAluno . "<br>";
                        echo "Período: " . $periodo . "<br>";
                        echo "Série/Módulo: " . $turmaPP . "<br>";
                        echo "Semestre/Ano: " . $semestreAno . "<br>";
                        echo "Disciplina: " . $disciplina . "<br>";
                        echo "Rm professor 1: " . $rmProf1 . "<br>";
                        echo "Nome professor 1: " . $professor1 . "<br>";
                        echo "Rm professor 2: " . $rmProf2 . "<br>";
                        echo "Nome professor 2: " . $professor2 . "<br>";
                        echo "Turma atual: " . $turmaAtual . "<br><hr>";
                        //header("location: index.php");
                    }
                    echo "</table>";
                }
            //}
            else{
                echo "Arquivo não foi carregado!";
            }
?>

