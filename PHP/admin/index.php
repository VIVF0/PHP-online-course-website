<?php

require '../back/config.php';
include '../back/exibir_curso.php';
include '../back/exibir_aula.php';
$curso = new Cursos($mysql);
$cursos = $curso->exibirTodos();
$aula = new Aulas($mysql);
$aulas = $aula->exibirAulas();
?>
<!DOCTYPE html>
<head lang="pt-br">
    <head>
        <title>Home_Admin</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../../CSS/admin.css">
    </head>
    <body>
        <br><div class="box">
            <br><center><h1>Página Administrativa<br>Cursos:</h1></center>
        <div><br><br>
            <?php foreach ($cursos as $curt) { ?>
            <div id="curso-admin">
                <div class="cont">       
                    <br><p>Titulo: <?php echo $curt['titulo']; ?></p>
                    <p>Descricao: <?php echo $curt['descricao']; ?></p><br>
                    <nav>
                        <a class="botao" href="editar_curso.php?id_curso=<?php echo $curt['id_curso']; ?>">Editar</a>
                        <a class="botao" href="excluir_curso.php?id_curso=<?php echo $curt['id_curso']; ?>">Excluir</a>
                    </nav><br>
                </div> 
            </div>
            <?php } ?>
        </div>
        <br><center><div class="botao-block"><a href="adicionar_curso.php">Adicionar Curso</a></div></center><br>
        </div>
        <br><br>
        <br><div class="box">
            <br><center><h1>Aulas: </h1></center>
        <div><br><br>
            <?php foreach ($aulas as $aul) { ?>
            <div id="curso-admin">
                <div class="cont">       
                    <br><p>Titulo_Aula: <?php echo $aul['titulo_aula']; ?></p>
                    <p>Descricao: <?php echo $aul['descricao_aula']; ?></p><br>
                    <p>Curso: <?php echo $aul['titulo']; ?></p><br>
                    <nav>
                        <a class="botao" href="editar_aula.php?id_aula=<?php echo $aul['id_aula']; ?>">Editar</a>
                        <a class="botao" href="excluir_aula.php?id_aula=<?php echo $aul['id_aula']; ?>">Excluir</a>
                    </nav><br>
                </div> 
            </div>
            <?php } ?>
        </div>
        <br><center><div class="botao-block"><a href="adicionar_aula.php">Adicionar Aula</a></div></center><br>
        </div>

    </body>
</head>