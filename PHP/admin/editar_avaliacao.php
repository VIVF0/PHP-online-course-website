<?php

require '../back/config.php';
require '../back/AddAvaliacao.php';
require '../back/redireciona.php';
require '../back/exibir_avaliacoes.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $avaliacao = new addAvaliacao($mysql);
    $avaliacao->editar($_POST['id_avaliacao'],$_POST['titulo_avaliacao'], $_POST['descricao_avaliacao'],$_POST['link_video']);
    
    redireciona('index.php');
}
$avaliacoes = new Avaliacoes($mysql);
$avaliacao = $avaliacoes->encontrarPorId($_GET['id_avaliacao']);
$questoes=$avaliacoes->exibirQuestao($_GET['id_avaliacao']);
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Editar Avaliação</title>
        <link rel="stylesheet" type="text/css" href="../../CSS/mod.css">
    </head>
    <body>
        <div class="box">
            <div class="cont"><br>
                <h1>Editar Avaliação</h1>
                <form action="editar_avaliacao.php" method="POST">
                    <p>
                        <label for="">Digite o título da Avaliação:</label><br>
                        <input class="campo-form" type="text" name="titulo_avaliacao" id="titulo_avaliacao"/>
                        <br>Título Atual: <?php echo $avaliacao['titulo_avaliacao']; ?>
                    </p><br>
                    <p>
                        <label for="">Insira a depois de qual aula a prova deve ser apresentada:</label><br>
                        <input class="campo-form" type="text" name="link_video" id="link_video"/>
                        <br>Prova Atual: <?php echo $avaliacao['titulo_aula']; ?></a>
                    </p><br>
                    <p>
                        <label for="">Digite a descricao da Avaliação:</label><br><br>
                        <textarea class="campo-form" type="text" name="descricao_avaliacao" id="descricao_avaliacao"></textarea>
                        <br>Descricão Atual: <?php echo $avaliacao['descricao_avaliacao']; ?>
                    </p><br><br>
                    <?php $x=0;?>
                    <input type="hidden" name="id_avaliacao" value="<?php echo $avaliacao['id_avaliacao']; ?>"/>
                    <?php foreach($questoes as $questao):?>
                        <p>
                        <label for=""><h2>Insira o enunciado da questão <?php echo $x;?>:</h2></label><br>
                        <textarea class="campo-quest" type="text" name="questao<?php echo $x;?>" id="questao<?php echo $x;?>"></textarea>
                        </p>(Marque a bolinha da questão certa!)<br><br>
                        Atual: <?php echo $questao['enunciado'];?>
                        <p>
                        <?php $opcao=$avaliacoes->exibirOp($questao['id_questao'])?>
                        <?php $i=1;?>
                        <input type="hidden" id="id_questao<?php echo $x;?>" name="id_questao<?php echo $x;?>" value="<?php echo $questao['id_questao'];?>">
                        <?php foreach($opcao as $opcoes):?>
                            <br><p><input type="radio" id="radio<?php echo $x;?>" name="radio<?php echo $x;?>" value="opcao<?php echo $i;?>">  
                            <label for=""><h3>Insira a nova opcao <?php echo $i;?>:</h3></label><br>
                            <textarea class="campo-quest" type="text" name="opcao<?php echo $x;?>" id="opcao<?php echo $x;?>"></textarea>
                            Atual: <?php echo $opcoes['opcao'];?></p>
                            <?php $i+=1;?>
                        <?php endforeach;?><br>
                        <?php $x+=1;?>
                    <?php endforeach;?>
                    <p>
                        <button class="botao">Editar Curso</button>
                    </p>
                </form><br>
            </div>
        </div>
    </body>
</html>