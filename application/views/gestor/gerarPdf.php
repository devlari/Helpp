<?php

if($_SESSION['cargo'] != "Gestor")
{
    $_SESSION['erro'] = 3;
    header("location:../../");
}

require_once '../../../Libraries/dompdf/lib/html5lib/Parser.php';
require_once '../../../Libraries/dompdf/lib/php-font-lib-master/src/FontLib/Autoloader.php';
require_once '../../../Libraries/dompdf/lib/php-svg-lib-master/src/autoload.php';
require_once '../../../Libraries/dompdf/src/Autoloader.php';

session_start();
//unset($_SESSION['turmas']);
//$turmas = array();
//$turmas[] = $_SESSION["turmas"];

$qntAluno = $_SESSION["contPP"];

$codigo_html = "";

Dompdf\Autoloader::register();
use Dompdf\Dompdf;

$dompdf = new Dompdf();

$codigo_html .= '<h1 align="center">Relatório: Cadastro de PPs</h1><hr>';
$codigo_html .= '<p><b> Total de Progressões Parciais cadastradas: '. $qntAluno .'</b></p>';
$codigo_html .= "<p> ATENÇÃO! <br> As Progressões Parciais referentes as turmas a seguir não foram cadastradas, pois as turmas não estão inseridas no banco!  </p>";

foreach($_SESSION["turmas"] as $turma){
  $codigo_html .= "<b>Turma:</b>" . $turma . "<br>";  
}

$codigo_html .= '<p> ATENÇÃO! <br> As Progressões Parciais referentes as disciplinas a seguir não foram cadastradas, pois as disciplinas não inseridas no banco! </p>';
foreach($_SESSION["disc"] as $disc){
  $discT = explode("-", $disc);
  $disc1 = $discT[0];
  $t = $discT[1];
  $codigo_html .= "<b>Disciplina:</b> " . $disc1 .  " da <b>turma</b> " . $t . "<br>";  
}

if ($qntAluno != 0){
    foreach($_SESSION["alunoPP"] as $pp){
        $info = explode("-", $pp);
        $aluno = $info[0];
        $d = $info[1];
        $codigo_html .= "<p> Foi cadastrado o aluno <b>" . $aluno . "</b> na Progressão parcial de disciplina <b>" . $d . "</b></p><br>";  
    }
}

// carregamos o código HTML no nosso arquivo PDF
$dompdf->loadHtml($codigo_html);

// (Opcional) Defina o tamanho (A4, A3, A2, etc) e a oritenação do papel, que pode ser 'portrait' (em pé) ou 'landscape' (deitado)
$dompdf->setPaper('A4', 'portrait');

// Renderizar o documento
$dompdf->render();

// pega o código fonte do novo arquivo PDF gerado
$output = $dompdf->output();

// defina aqui o nome do arquivo que você quer que seja salvo
file_put_contents("RelatorioPP.pdf", $output);

// redirecionamos o usuário para o download do arquivo
die("<script>location.href='RelatorioPP.pdf';</script>");