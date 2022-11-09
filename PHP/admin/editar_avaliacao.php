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
$questao=$avaliacoes->exibirQuestao($_GET['id_avaliacao']);
$cont=2;
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
                    <input type="hidden" name="id_avaliacao" value="<?php echo $avaliacao['id_avaliacao']; ?>"/>
                    <?php for($x=0;$x<=$cont;$x++):?>
                        <p>
                        <label for=""><h2>Insira o enunciado da questão <?php echo $x;?>:</h2></label><br>
                        <textarea class="campo-quest" type="text" name="questao<?php echo $x;?>" id="questao<?php echo $x;?>"></textarea>
                        </p>(Marque a bolinha da questão certa!)<br><br>
                        <?php echo $questao['enunciado'];?>
                        <p>
                        <?php for($i=1;$i<=$contOP;$i++){?>
                            <label for="">Digite a opção <?php echo $i;?>:</label><input type="radio" id="radio<?php echo $x;?>" name="radio<?php echo $x;?>" value="opcao<?php echo $i;?>"><br>
                            <textarea class="campo-quest" type="text" name="opcao<?php echo $i;?>" id="opcao<?php echo $i;?>"></textarea>
                            </p><br> 
                            <label for="">Digite a justificativa da opção <?php echo $i;?>:</label><br>
                            <textarea class="campo-quest" type="text" name="justificativa<?php echo $i;?>" id="justificativa<?php echo $i;?>"></textarea>
                            </p><br><br>
                        <?php }?>
                    <?php endfor; ?>
                    <p>
                        <button class="botao">Editar Curso</button>
                    </p>
                </form><br>
            </div>
        </div>
    </body>
</html>