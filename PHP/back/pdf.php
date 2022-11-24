<?php
// Carregar o Composer
    require '../../vendor/autoload.php';

    // Referenciar o namespace Dompdf
    use Dompdf\Dompdf;

    // Instanciar e usar a classe dompdf
    $dompdf = new Dompdf();

    // Instanciar o metodo loadHtml e enviar o conteudo do PDF
    $dompdf->loadHtml('Celke - Gerar PDF com PHP');

    // Configurar o tamanho e a orientacao do papel
    // landscape - Imprimir no formato paisagem
    //$dompdf->setPaper('A4', 'landscape');
    // portrait - Imprimir no formato retrato
    $dompdf->setPaper('A4', 'portrait');

    // Renderizar o HTML como PDF
    $dompdf->render();

    // Gerar o PDF
    $dompdf->stream();
