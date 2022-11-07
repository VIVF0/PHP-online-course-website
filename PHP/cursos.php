<?php
require 'back/config.php';
include 'back/exibir_curso.php';
//$titulo="%".trim($_GET['busca_curso'])."%";
/*if($titulo===null){*/
    $curso = new Cursos($mysql);
    $cursos =$curso->exibirTodos();     
/*} else{
    $curso = new Cursos($mysql);
    $cursos = $curso->encontrarPorTitulo($titulo);
}*/
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Cursos</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../CSS/pag_padrao.css">
        <link rel="stylesheet" type="text/css" href="../CSS/cursos.css">
    </head>
    <body>
        <nav>
            <!--Menu-->
            <object width="100%" height="100px" data="../HTML/menu.html"></object>
            <!--Carrosel-->
       </nav>
        <center><div class="container">
            <form action="cursos.php" id="buscar_curso" method="GET" name="Pesquisa">    
                <input type="text" id="busca_curso" name="busca_curso" value="" placeholder="Busca de Curso">
                <button><img class="img_lupa" src="../IMG/lupa-arredondada.png" ></button>
            </form>
            <?php foreach ($cursos as $curso) : ?>
                <div class="box_curso">
                    <div class="cont">
                        <br><h2>
                            <a href="curso.php?id_curso=<?php echo $curso['id_curso']; ?>">
                                <?php echo $curso['titulo']; ?>
                            </a>
                        </h2>
                        <p>
                            <?php echo nl2br($curso['descricao']); ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
            <br>
        </div></center>
        <script>
            buscar_curso.reset();
        </script>
    </body>

</html>