<?php

require '../back/config.php';
include '../back/AddAulas.php';
require '../back/redireciona.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $aulas = new addAulas($mysql);
        $aulas->remover($_POST['id_aula']);
        redireciona('index.php');
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Excluir Aula</title>
        <link rel="stylesheet" type="text/css" href="../../CSS/mod.css">
    </head>
    <body>
        <br><br><br><br><br><br><br><br><br><div class="box">
            <div class="cont">
            <br><h3>Você realmente deseja excluir a Aula?</h3><br>
                <form method="POST" action="excluir_aula.php">
                    <p>
                        <input type="hidden" name="id_aula" id="id_aula" value="<?php echo $_GET['id_aula'];?>" />
                        <br><br><button class="botao">Excluir</button>
                    </p>
                </form><br>
            </div>
        </div><br><br><br><br><br><br><br>
    </body>
</html>