<?php
session_start();
$login=$_SESSION['login'];
include "back/cookie.php";
cookie($login);
require 'back/exibir_perfil.php';
require 'back/config.php';
include 'back/exibir_curso.php';
require 'back/exibir_aula.php';
require 'back/exibir_avaliacoes.php';
$obj_curso = new Cursos($mysql);
$obj_perfil = new Perfil($mysql);
$avaliacao = new Avaliacoes($mysql);
$aula = new Aulas($mysql);
$curso = $obj_curso->encontrarPorId($_GET['id_curso']);
$obj_perfil->valiAssinatura($login,$curso['id_curso']);
$aulas =$aula->exibirTodosAulas($curso['id_curso']);
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
        <link rel="stylesheet" type="text/css" href="../CSS/dark.css">
        <script src="../JS/modonot.js" defer></script>
    </head>
    <body>
        <div class="dark">
            <label class="switch">
                <div class="switch-wrapper">
                    <input type="checkbox" name="toggle-dark" id="toggle-dark">
                    <span class="switch-button"></span>
                </div>
            </label>
        </div>
        <nav>
            <!--Menu-->
            <object width="100%" height="100px" data="menu.php"></object>
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
                        <a href="aula.php?id_aula=<?php echo $aula['id_aula']; ?>" target="_parent">
                        <img class="img_play" src="../IMG/botao-play.png"><?php echo $aula['titulo_aula']; ?>
                        </a>
                    </h2>
                    <br>
                    <p><?php echo nl2br($aula['descricao_aula']);?></p><br><br>
                    <?php foreach($avaliacoes as $avaliacao):?>
                        <?php if($avaliacao['id_aula']==$aula['id_aula']):?>
                            <?php $confere=$obj_perfil->verificarHistorico($login,$avaliacao['id_avaliacao']);?>
                            <h2>
                            <?php if($confere==1):?>
                                <a href="resultado.php?id_avaliacao=<?php echo $avaliacao['id_avaliacao']; ?>" target="_parent">
                            <?php else:?>
                                <a href="avaliacao.php?id_avaliacao=<?php echo $avaliacao['id_avaliacao']; ?>" target="_parent">
                            <?php endif;?>
                            <img class="img_play" src="../IMG/teste.png"><?php echo $avaliacao['titulo_avaliacao']; ?>
                            </a>
                            </h2>
                            <br>
                            <p><?php echo nl2br($avaliacao['descricao_avaliacao']);?></p><br><br>
                        <?php endif;?>
                    <?php endforeach;?>
                <?php endforeach; ?>
            </div>
        </div>
        <div vw class="enabled">
                <div vw-access-button class="active"></div>
                <div vw-plugin-wrapper>
                    <div class="vw-plugin-top-wrapper"></div>
                </div>
            </div>
        <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
        <script>new window.VLibras.Widget('https://vlibras.gov.br/app');</script>
    </body>
</html>