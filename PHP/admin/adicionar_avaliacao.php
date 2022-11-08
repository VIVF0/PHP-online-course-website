<?php

require '../back/config.php';
require '../back/AddAvaliacao.php';
require '../back/redireciona.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $avaliacao = new addAvaliacao($mysql);
    $avaliacao->adicionar($_POST['titulo_avaliacao'], $_POST['descricao_avaliacao'],$_POST['quant_aula'],$_POST['titulo_curso']);
    //string $titulo, string $descricao,string $quant_aula, string $titulo_curso
    
    for($x=1;$x<=2;$x++){
        $questao=$avaliacao->addquestao($_POST["questao$x"],$_POST['titulo_avaliacao'],$_POST["radio$x"]);
        //addquestao(string $enunciado,string $titulo_avaliacao,string $resposta)
        for($i=1;$i<=2;$i++){
            $opcao=$avaliacao->addopcao($_POST["opcao$i"],$_POST["justificativa$i"],$_POST["questao$x"],"opcao$i");
            //addopcao(string $opcao,string $justificativa,string $enunciado)
        }
    }
    redireciona('index.php');
}

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Adicionar Avaliação</title>
        <link rel="stylesheet" type="text/css" href="../../CSS/mod.css">
    </head>
    <body>
        <div class="box">
            <div class="cont"><br>
                <h1>Adicionar Avaliação:</h1>
                <form id="formquest" nome="formquest" action="adicionar_avaliacao.php" method="POST">
                    <br><p>
                        <label for="">Digite o título do Curso</label><br>
                        <input class="campo-form" type="text" name="titulo_curso" id="titulo_curso"/>
                    </p><br>
                    <p>
                        <label for="">Digite o título da avaliação:</label><br>
                        <input class="campo-form" type="text" name="titulo_avaliacao" id="titulo_avaliacao"/>
                    </p><br>
                    <p>
                        <label for="">Digite a descricao da avaliação:</label><br><br>
                        <textarea class="campo-form" type="text" name="descricao_avaliacao" id="descricao_avaliacao"></textarea>
                    </p><br>
                    <p>
                        <label for="">Digite depois de quantas aulas a prova deve aparecer:</label><br>
                        <input class="campo-form" type="text" name="quant_aula" id="quant_aula"/>
                    </p><br><br>
                    <?php for($x=1;$x<=2;$x++):?>
                        <p>
                        <label for=""><h2>Insira o enunciado da questão <?php echo $x;?>:</h2></label><br>
                        <textarea class="campo-quest" type="text" name="questao<?php echo $x;?>" id="questao<?php echo $x;?>"></textarea>
                        </p>(Marque a bolinha da questão certa!)<br><br>
                        <p>
                        <?php for($i=1;$i<=2;$i++){?>
                            <label for="">Digite a opção <?php echo $i;?>:</label><input type="radio" id="radio<?php echo $x;?>" name="radio<?php echo $x;?>" value="opcao<?php echo $i;?>"><br>
                            <textarea class="campo-quest" type="text" name="opcao<?php echo $i;?>" id="opcao<?php echo $i;?>"></textarea>
                            </p><br> 
                            <label for="">Digite a justificativa da opção <?php echo $i;?>:</label><br>
                            <textarea class="campo-quest" type="text" name="justificativa<?php echo $i;?>" id="justificativa<?php echo $i;?>"></textarea>
                            </p><br><br>
                        <?php }?>
                    <?php endfor; ?>
                    <p>
                        <button class="botao">Criar Avaliação</button>
                    </p>
                </form><br>
            </div>
        </div>
        <script>
            formquest.reset();
        </script>
    </body>
</html>