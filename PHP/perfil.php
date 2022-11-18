<?php
session_start();
$login=$_SESSION['login'];
include "back/cookie.php";
cookie($login);
require 'back/config.php';
require 'back/exibir_perfil.php';
$perfil = new Perfil($mysql);
$perfil= $perfil->exibirPerfil($login);
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title><?php echo $perfil['nome']; ?></title>
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
            <p>Nome: <?php echo $perfil['nome'];?><br><br>
            Email: <?php echo $perfil['login'];?></p>
        </div>
    </body>
</html>