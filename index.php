<?php
require 'PHP/back/config.php';
include 'PHP/back/exibir_curso.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $curso = new Cursos($mysql);
    $cursos =$curso->encontrarPorTitulo($_POST['busca_curso']);  
}else{
    $curso = new Cursos($mysql);
    $cursos =$curso->exibirTodos();     
} 
?>
<!DOCTYPE html>
<head lang="pt-br">
    <head>
        <title>Página_Inicial</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="CSS/home.css">
    </head>
    <body>
        <nav>
            <!--Menu-->
            <object width="100%" height="100px" data="HTML/menu.html"></object>
            <!--Carrosel-->
            <center><object class="carrosel" width="1000" height="400" data="HTML/carousel.html"></object></center>
       </nav>    
       <!--Parte das Empresas-->
       <div class="empresas">
            <div class="barra">
                |
            </div>
            <p class="titulo_empresa">Empresas Parceiras</p>
        </div>
        <div class="box">
            <div class="img1">
                <img class="cea" src="IMG/empresas/image 6empresas-1.png">
            </div>
            <div class="img2">
                <img class="renner" src="IMG/empresas/image 6empresas-2.png">
            </div>
            <div class="img3">
                <img class="ml" src="IMG/empresas/image 6empresas-3.png">
            </div>
            <div class="img4">
                <img class="amz" src="IMG/empresas/image 6empresas.png"">
            </div>
            <div class="img5">
                <img class="magalu" src="IMG/empresas/image 7empresas.png">
            </div>
            <div class="img6">
                <img class="poli" src="IMG/empresas/image 8empresas.png">
            </div>
        </div>
        <!--Parte dos planos-->
        <!--<div class="planos">
            <div class="barra">
                |
            </div>
            <p class="titulo_empresa">Planos</p>
        </div>
        <div class="box1">
            <div class="plano1">
                <div class="cont">
                    Plano1
                    <ul class="beneficios">
                        <li>
                            Acesso a todos os cursos
                        </li>
                    </ul> 
                    <button class="btn_sobre">
                        <a href="" target="_parent">Saiba Mais</a>
                    </button>
                </div>
            </div>
            <div class="plano2">
                <div class="cont">
                    Plano2
                    <ul class="beneficios">
                        <li>
                            Acesso a todos os cursos<br>
                        </li>
                        <li>
                            Ajuda a encontro com empresas
                        </li>
                    </ul>
                    <button class="btn_sobre2">
                        <a href="" target="_parent">Saiba Mais</a>
                    </button>
                </div>
            </div>
            <div class="plano3">
                <div class="cont">
                    Plano3
                    <ul class="beneficios">
                        <li>
                            Acesso a todos os cursos
                        </li>
                        <li>
                            Ajuda a encontro com empresas
                        </li>
                    </ul>
                    <button class="btn_sobre3">
                        <a href="" target="_parent">Saiba Mais</a>
                    </button>
                </div>
            </div>
        </div>
        <br><br><br><br><br>-->
        <center><div class="container">
            <form action="index.php" id="buscar_curso" method="POST" name="Pesquisa">    
                <input type="text" id="busca_curso" name="busca_curso" value="" placeholder="Busca de Curso">
                <button><img class="img_lupa" src="IMG/lupa-arredondada.png" ></button>
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
</head>