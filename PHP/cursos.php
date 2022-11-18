<?php
require 'back/config.php';
include 'back/exibir_curso.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $curso = new Cursos($mysql);
    $cursos =$curso->encontrarPorTitulo($_POST['busca_curso']);  
}else{
    $curso = new Cursos($mysql);
    $cursos =$curso->exibirTodos();     
} 
session_start();
$login=$_SESSION['login'];
include "back/cookie.php";
cookie($login);
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Cursos</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../CSS/cursos.css">
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
        <center><div class="container">
            <form action="cursos.php" id="buscar_curso" method="POST" name="Pesquisa">    
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