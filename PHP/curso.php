<?php

require 'config.php';
include 'exibir_curso.php';
require 'exibir_aula.php';

$obj_curso = new Cursos($mysql);
$curso = $obj_curso->encontrarPorId($_GET['id_curso']);
$aula = new Aulas($mysql);
$aulas =$aula->exibirTodos($curso['id_curso']);

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title><?php echo $curso['titulo']; ?></title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../CSS/pag_padrao.css">
        <link rel="stylesheet" type="text/css" href="../CSS/curso.css">
    </head>
    <body>
        <nav>
            <!--Menu-->
            <object width="100%" height="100px" data="../HTML/menu.html"></object>
            <!--Carrosel-->
       </nav>
        <div class="container">
            <div class="curso">       
                <h1>
                    Curso: <?php echo $curso['titulo']; ?>
                </h1>
                <br>
                <p>
                    <?php echo nl2br($curso['descricao']); ?>
                </p>
            </div> <br><br><br>
            <h2>Aulas:</h2><br>
            <div class="aulas">
                <?php foreach ($aulas as $aula) :?>
                    <h2>
                        <a href="aula.php?id_aula=<?php echo $aula['id_aula']; ?>">
                        <img class="img_play" src="../IMG/botao-play.png"><?php echo $aula['titulo_aula']; ?>
                        </a>
                    </h2>
                    <br>
                    <p><?php echo nl2br($aula['descricao_aula']);?></p>
                <?php endforeach; ?>
            </div>

        </div>
    </body>
</html>