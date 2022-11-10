<?php 
    require "back/config.php";
    require "back/validacao.php";
    require 'back/exibir_avaliacoes.php';
    $notas = new valida($mysql);
    $obj_avaliacao = new Avaliacoes($mysql);
    $avaliacao = $obj_avaliacao->encontrarPorId($_GET['id_avaliacao']);
    $nota=0;
    for($i=1;$i<3;$i++){
        $nota+=$notas->valida($_POST["id_questao".$i],$_POST["radio".$i]);
    }
    //$notas->insertnota($_GET['id_aula'],$_GET['id_avaliacao'],$nota,$data,$horario);
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Resultado <?php echo $avaliacao['titulo_avaliacao'];?></title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../CSS/avaliacao.css">
    </head>
    <body>
        <nav>
            <!--Menu-->
            <object width="100%" height="100px" data="../HTML/menu.html"></object>
       </nav>
        <br><div class="container"><h2><p>O Resultado da Prova de <?php echo $avaliacao['titulo_avaliacao']?>: <?php echo $nota;?></p></h2></div>
    </body>
</html>