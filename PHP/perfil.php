<?php

require 'back/config.php';
require 'back/exibir_perfil.php';
$perfil = new Perfil($mysql);
$perfil= $perfil->exibirPerfil($_GET['id_usuario']);
/*include "back/cookie.php";
cookie($_COOKIE['login']);*/
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
            <object width="100%" height="100px" data="../HTML/menu.html"></object>
            <!--Carrosel-->
        </nav>
        <div class="container">
            
        </div>
    </body>
</html>