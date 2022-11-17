<?php

require '../back/config.php';
require '../back/AddCursos.php';
require '../back/redireciona.php';
require '../back/exibir_curso.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $curso = new addCursos($mysql);
    $curso->editar($_POST['id_curso'], $_POST['titulo'], $_POST['descricao'],$_POST['custo'],$_POST['carga_horario']);

    redireciona('index.php');
}

$curso = new Cursos($mysql);
$curt = $curso->encontrarPorId($_GET['id_curso']);

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Editar Curso</title>
        <link rel="stylesheet" type="text/css" href="../../CSS/mod.css">
    </head>
    <body>
        <div class="box">
            <div class="cont"><br>
                <h1>Editar Curso</h1>
                <form action="editar_curso.php" method="POST">
                    <p>                        
                        <label for="titulo">Digite o novo título do Curso</label>
                        <input class="campo-form" type="text" name="titulo" id="titulo" value=""/>
                        <br>Título Atual: <?php echo $curt['titulo']; ?>
                    </p><br><br>
                    <p>                        
                        <label for="conteudo">Digite o novo conteúdo do curso</label>
                        <textarea class="campo-form" type="text" name="descricao" id="descricao"></textarea>
                        <br>Descricão Atual: <?php echo $curt['descricao']; ?>
                    </p><br><br>
                    <p>                        
                        <label for="conteudo">Digite o custo do curso</label>
                        <input class="campo-form" type="text" name="custo" id="custo"/>
                        <br>Custo Atual: <?php echo $curt['custo']; ?>
                    </p><br><br>
                    <p>                        
                        <label for="conteudo">Digite o custo do curso</label>
                        <input class="campo-form" type="text" name="carga_horario" id="carga_horario"/>
                        <br>Carga Horario: <?php echo $curt['carga_horario']; ?>
                    </p><br><br>
                    <p>
                        <input type="hidden" name="id_curso" value="<?php echo $curt['id_curso']; ?>" />
                    </p><br>
                    <p>
                        <button class="botao">Editar Curso</button>
                    </p><br>
                </form>
            </div>
        </div>
    </body>
</html>