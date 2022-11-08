<?php

require '../back/config.php';
include '../back/AddAvaliacao.php';
require '../back/redireciona.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $avaliacao = new addAvaliacao($mysql);
        $avaliacao->remover($_POST['id_avaliacao']);
        redireciona('index.php');
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Excluir Avaliação</title>
        <link rel="stylesheet" type="text/css" href="../../CSS/mod.css">
    </head>
    <body>
        <br><br><br><br><br><br><br><br><br><div class="box">
            <div class="cont">
            <br><h3>Você realmente deseja excluir a avaliação?</h3><br>
                <form method="POST" action="excluir_avaliacao.php">
                    <p>
                        <input type="hidden" name="id_avaliacao" id="id_avaliacao" value="<?php echo $_GET['id_avaliacao'];?>" />
                        <br><br><button class="botao">Excluir</button>
                    </p>
                </form><br>
            </div>
        </div><br><br><br><br><br><br><br>
    </body>
</html>