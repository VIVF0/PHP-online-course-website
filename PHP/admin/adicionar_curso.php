<?php

require '../back/config.php';
require '../back/AddCursos.php';
require '../back/redireciona.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $curso = new addCursos($mysql);
    $curso->adicionar($_POST['titulo'], $_POST['descricao'],$_POST['custo'],$_POST['carga']);
    redireciona('index.php');
}

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Adicionar Curso</title>
        <link rel="stylesheet" type="text/css" href="../../CSS/mod.css">
    </head>
    <body>
        <div class="box">
            <div class="cont"><br>
                <h1>Adicionar Curso</h1>
                <form action="adicionar_curso.php" method="POST">
                    <br><p>
                        <label for="">Digite o título do curso</label><br>
                        <input class="campo-form" type="text" name="titulo" id="titulo"/>
                    </p><br><br>
                    <p>
                        <label for="">Digite a descricao do curso</label><br><br>
                        <textarea class="campo-form" type="text" name="descricao" id="descricao"></textarea>
                    </p><br>
                    <p>
                        <label for="">Digite o custo</label><br><br>
                        <input class="campo-form" type="text" name="custo" id="custo"/>
                    </p><br>
                    <p>
                        <label for="">Digite a carga horario</label><br><br>
                        <input class="campo-form" type="text" name="carga" id="carga"/>
                    </p><br>
                    <p>
                        <button class="botao">Criar Curso</button>
                    </p>
                </form><br>
            </div>
        </div>
    </body>
</html>