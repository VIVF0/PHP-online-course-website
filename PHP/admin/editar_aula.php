<?php

require '../back/config.php';
require '../back/AddAulas.php';
require '../back/redireciona.php';
require '../back/exibir_aula.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $aula = new addAulas($mysql);
    $aula->editar($_POST['id_aula'],$_POST['titulo_aula'], $_POST['descricao_aula'],$_POST['link_video']);
    
    redireciona('index.php');
}
$aula = new Aulas($mysql);
$aul = $aula->encontrarPorId($_GET['id_aula']);
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Editar Aula</title>
        <link rel="stylesheet" type="text/css" href="../../CSS/mod.css">
        <link rel="stylesheet" type="text/css" href="../../CSS/pag_padrao.css">
    </head>
    <body>
        <div class="box">
            <div class="cont"><br>
                <h1>Editar Aula</h1>
                <form action="editar_aula.php" method="POST">
                    <p>
                        <label for="">Digite o título da aula</label><br>
                        <input class="campo-form" type="text" name="titulo_aula" id="titulo_aula"/>
                        <br>Título Atual: <?php echo $aul['titulo_aula']; ?>
                    </p><br>
                    <p>
                        <label for="">Insira o Link do Video</label><br>
                        <input class="campo-form" type="text" name="link_video" id="link_video"/>
                        <br>Link do Video Atual: <a href="<?php echo $aul['link_video']; ?>"><?php echo $aul['link_video']; ?></a>
                    </p><br>
                    <p>
                        <label for="">Digite a descricao da aula</label><br><br>
                        <textarea class="campo-form" type="text" name="descricao_aula" id="descricao_aula"></textarea>
                        <br>Descricão Atual: <?php echo $aul['descricao_aula']; ?>
                    </p><br><br>
                    <input type="hidden" name="id_aula" value="<?php echo $aul['id_aula']; ?>"/>
                    <p>
                        <button class="botao">Editar Curso</button>
                    </p>
                </form><br>
            </div>
        </div>
    </body>
</html>