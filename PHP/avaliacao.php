<?php
require 'back/config.php';
require 'back/exibir_avaliacoes.php';
$obj_avaliacao = new Avaliacoes($mysql);
$avaliacao = $obj_avaliacao->encontrarPorId($_GET['id_avaliacao']);
$questoes=$obj_avaliacao->exibirQuestao($_GET['id_avaliacao']);
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title><?php echo $avaliacao['titulo_avaliacao'];?></title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../CSS/avaliacao.css">
    </head>
    <body>
        <nav>
            <!--Menu-->
            <object width="100%" height="100px" data="../HTML/menu.html"></object>
       </nav>
        <br><div class="container">
            <div class="aulas">
                <h2>   
                    Titulo: <?php echo $avaliacao['titulo_avaliacao']; ?>
                </h2>
                <br>
                <p><h3>Descrição:</h3><?php echo nl2br($avaliacao['descricao_avaliacao']);?></p>
            </div>
            <form id="formProva" nome="formProva" action="" method="POST">
                <div class="avaliacao"><?php $x=0;?>
            <?php foreach($questoes as $questao):?>
                <h3><?php echo $questao['enunciado'];?>:</h3>
                <?php $opcao=$obj_avaliacao->exibirOp($questao['id_questao'])?>
                <?php $i=0;?>
                <?php foreach($opcao as $opcoes):?>
                    <br><p><input type="radio" id="radio<?php echo $x;?>" name="radio<?php echo $x;?>" value="opcao<?php echo $i;?>">  <?php echo $opcoes['opcao'];?></p>
                    <?php $i+=1;?>
                <?php endforeach;?><br>
                <?php $x+=1;?>
            <?php endforeach;?>
            <p>
                <button class="botao">Enviar</button>
            </p></form>
            </div>
            <script>
                formProva.reset();
            </script>
    </body>
</html>