<?php
session_start();
$login=$_SESSION['login'];
include "back/cookie.php";
require 'back/config.php';
require 'back/exibir_aula.php';
require 'back/exibir_perfil.php';
cookie($login);
$obj_perfil = new Perfil($mysql);
$obj_aula = new Aulas($mysql);
$aulas = $obj_aula->encontrarPorId($_GET['id_aula']);
$obj_perfil->valiAssinatura($login,$aulas['id_curso']);
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title><?php echo $aulas['titulo_aula'];?></title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../CSS/aula.css">
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
        <br><center><div class="container">
            <div class="aulas">
                <h2>   
                    Titulo: <?php echo $aulas['titulo_aula']; ?>
                </h2>
                <br>
                <p><h3>Descrição:</h3><?php echo nl2br($aulas['descricao_aula']);?></p>
            </div>
            <br><br></div></center>
            <center><div class="video"><iframe src="<?php echo $aulas['link_video']; ?>" style="position:relative;left:0;width:100%;height:500px;" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe></div><script src="https://player.vimeo.com/api/player.js"></script></center>
            <br><br>
            <div vw class="enabled">
                <div wight="100px" vw-access-button class="active"></div>
                <div vw-plugin-wrapper>
                    <div class="vw-plugin-top-wrapper"></div>
                </div>
            </div>
            <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
            <script>new window.VLibras.Widget('https://vlibras.gov.br/app');</script>
    </body>
</html>