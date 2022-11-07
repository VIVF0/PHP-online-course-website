<?php

require '../back/config.php';
require '../back/AddAulas.php';
require '../back/redireciona.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $aula = new addAulas($mysql);
    $aula->adicionar($_POST['titulo_aula'], $_POST['descricao_aula'],$_POST['titulo_curso'],$_POST['link_video']);
    
    redireciona('index.php');
}

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Adicionar Aula</title>
        <link rel="stylesheet" type="text/css" href="../../CSS/mod.css">
    </head>
    <body>
        <div class="box">
            <div class="cont"><br>
                <h1>Adicionar Aula</h1>
                <form action="adicionar_aula.php" method="POST">
                    <br><p>
                        <label for="">Digite o título do curso</label><br>
                        <input class="campo-form" type="text" name="titulo_curso" id="titulo_curso"/>
                    </p><br>
                    <p>
                        <label for="">Digite o título da aula</label><br>
                        <input class="campo-form" type="text" name="titulo_aula" id="titulo_aula"/>
                    </p><br>
                    <p>
                        <label for="">Insira o Link do Video</label><br>
                        <input class="campo-form" type="text" name="link_video" id="link_video"/>
                    </p><br>
                    <p>
                        <label for="">Digite a descricao da aula</label><br><br>
                        <textarea class="campo-form" type="text" name="descricao_aula" id="descricao_aula"></textarea>
                    </p><br><br>
                    <p>
                        <button class="botao">Criar Aula</button>
                    </p>
                </form><br>
            </div>
        </div>
    </body>
</html>