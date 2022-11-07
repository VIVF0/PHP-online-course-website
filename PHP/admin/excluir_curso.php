<?php

require '../back/config.php';
include '../back/AddCursos.php';
require '../back/redireciona.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $curso = new addCursos($mysql);
        $curso->remover($_POST['id_curso']);
        redireciona('index.php');
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Excluir Curso</title>
        <link rel="stylesheet" type="text/css" href="../../CSS/mod.css">
        <link rel="stylesheet" type="text/css" href="../../CSS/pag_padrao.css">
    </head>
    <body>
        <br><br><br><br><br><br><br><br><br><div class="box">
            <div class="cont">
            <br><h3>Você realmente deseja excluir o Curso?</h3><br>
                <form method="POST" action="excluir_curso.php">
                    <p>
                        <input type="hidden" name="id_curso" id="id_curso" value="<?php echo $_GET['id_curso'];?>" />
                        <br><br><button class="botao">Excluir</button>
                    </p>
                </form><br>
            </div>
        </div><br><br><br><br><br><br><br>
    </body>
</html>