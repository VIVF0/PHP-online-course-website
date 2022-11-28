<?php
// Carregar o Composer
    require '../../vendor/autoload.php';
    require 'config.php';
    require 'exibir_avaliacoes.php';
    $avaliacao = new Avaliacoes($mysql);
    $avaliacoes=$avaliacao->exibirTodosAvaliacoes($_POST['id_curso']);
    $cont[]=[
        'nome'=>$_POST['nome_cliente'],
        'curso'=>$_POST['curso_titulo'],
        'carga_horaria'=>$_POST['carga_horaria']
    ];
    $dados = "<!DOCTYPE html>";
    $dados .= "<html lang='pt-br'>";
    $dados .= "<head>";
    $dados .= "<meta charset='UTF-8'>";
    foreach($cont as $conteudo){
        extract($conteudo);
        $dados .= "<title>Certifico do Curso: ".$conteudo['curso']." de Job for All</title>";
    }
    $dados .= "</head>";
    $dados .= "<body>";
    $dados .= "<h1>Job for All</h1>";
    $dados .= "<h3>CNPJ: 111111111</h3>";
    $dados .= "<h3>(12)23636996</h3>";
    foreach($cont as $conteudo){
    extract($conteudo);
    $dados .= "Certificamos que ".$conteudo['nome']." concluiu o curso online (".$conteudo['curso'].") de carga horaria
    aproximada de ".$conteudo['carga_horaria'].", foi avaliado as seguintes materias:<br>";
    }
    foreach($avaliacoes as $av){
        extract($av);
        $dados .= "<br>Avaliação: ".$av['titulo_avaliacao']."<br>";  
        $dados .= "Descrição: ".$av['descricao_avaliacao']."<br>"; 
        }
    $dados .= "<br><br><center><img src='../../IMG/Coordenador.jpg'></center>";
    $dados .= "</body>";
    $dados .= "</html>";
    // Referenciar o namespace Dompdf
    use Dompdf\Dompdf;

    // Instanciar e usar a classe dompdf
    $dompdf = new Dompdf(['enable_remote' => true]);

    // Instanciar o metodo loadHtml e enviar o conteudo do PDF
    $dompdf->loadHtml($dados);

    // Configurar o tamanho e a orientacao do papel
    // landscape - Imprimir no formato paisagem
    //$dompdf->setPaper('A4', 'landscape');
    // portrait - Imprimir no formato retrato
    $dompdf->setPaper('A4', 'portrait');

    // Renderizar o HTML como PDF
    $dompdf->render();

    // Gerar o PDF
    $dompdf->stream();
