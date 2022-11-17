<?php
require 'back/config.php';
require 'back/exibir_aula.php';
$obj_aula = new Aulas($mysql);
$aulas = $obj_aula->encontrarPorId($_GET['id_aula']);
/*include "back/cookie.php";
cookie($_COOKIE['login']);*/
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
            <object width="100%" height="100px" data="../HTML/menu.html"></object>
            <!--Carrosel-->
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
    </body>
</html>