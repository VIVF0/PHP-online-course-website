<?php
session_start();
$login=$_SESSION['login'];
include "back/cookie.php";
cookie($login);
require 'back/config.php';
require 'back/exibir_perfil.php';
require 'back/exibir_avaliacoes.php';
$avaliacao = new Avaliacoes($mysql);
$avaliacoes = $avaliacao->exibirTodosAvaliacoes($curso['id_curso']);
$perfils = new Perfil($mysql);
$perfil= $perfils->exibirPerfil($login);
$historico=$perfils->exibirHistorico($perfil['id_cliente']);
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Perfil: <?php echo $perfil['nome']; ?></title>
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
        </nav>
        <div class="container">
            <p>Nome: <?php echo $perfil['nome'];?><br><br>
            Email: <?php echo $perfil['usuario'];?></p>
        </div>
    </body>
</html>