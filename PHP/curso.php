<?php

require 'back/config.php';
include 'back/exibir_curso.php';
require 'back/exibir_aula.php';
require 'back/exibir_avaliacoes.php';
$obj_curso = new Cursos($mysql);
$curso = $obj_curso->encontrarPorId($_GET['id_curso']);
$aula = new Aulas($mysql);
$aulas =$aula->exibirTodosAulas($curso['id_curso']);
$avaliacao = new Avaliacoes($mysql);
$avaliacoes = $avaliacao->exibirTodosAvaliacoes($curso['id_curso']);
$cont=count($aulas);
$x=0;$y=0;$i=0;
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title><?php echo $curso['titulo']; ?></title>
        <meta charset="UTF-8">
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
            <div class="aulas">
                <?php foreach($aulas as $aula):?>
                    <h2>
                        <a href="aula.php?id_aula=<?php echo $aula['id_aula']; ?>">
                        Aula: <img class="img_play" src="../IMG/botao-play.png"><?php echo $aula['titulo_aula']; ?>
                        </a>
                    </h2>
                    <br>
                    <p>Descrição: <?php echo nl2br($aula['descricao_aula']);?></p><br><br>
                    <?php foreach($avaliacoes as $avaliacao):?>
                        <?php if($avaliacao['id_aula']==$aula['id_aula']):?>
                            <h2>
                            <a href="avaliacao.php?id_avaliacao=<?php echo $avaliacao['id_avaliacao']; ?>">
                            Avaliação: <img class="img_play" src="../IMG/teste.png"><?php echo $avaliacao['titulo_avaliacao']; ?>
                            </a>
                            </h2>
                            <br>
                            Descrição: <p><?php echo nl2br($avaliacao['descricao_avaliacao']);?></p><br><br>
                        <?php endif;?>
                    <?php endforeach;?>
                <?php endforeach; ?>
            </div>
        </div>
    </body>
</html>