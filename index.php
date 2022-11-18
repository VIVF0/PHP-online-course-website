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
/*session_start();
$login=$_SESSION['login'];*/
?>
<!DOCTYPE html>
<head lang="pt-br">
    <head>
        <title>Página_Inicial</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="CSS/home.css">
        <link rel="stylesheet" type="text/css" href="CSS/dark.css">
        <script src="JS/modonot.js" defer></script>
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
            <object width="100%" height="100px" data="PHP/menu.php"></object>
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
        <div class="planos">
            <div class="barra">
                |
            </div>
            <p class="titulo_empresa">Cursos:</p><a name="curso"></a>
        </div>
        <center><div class="container">
            <form action="index.php#curso" id="buscar_curso" method="POST" name="Pesquisa">    
                <input type="text" id="busca_curso" name="busca_curso" value="" placeholder="Busca de Curso">
                <button><img class="img_lupa" src="IMG/lupa-arredondada.png" ></button>
            </form>
            <?php foreach ($cursos as $curso) : ?>
                <div class="box_curso">
                    <div class="cont">
                        <br><h2>
                            <a href="PHP/curso.php?id_curso=<?php echo $curso['id_curso']; ?>">
                                <?php echo $curso['titulo']; ?>
                            </a>                            
                        </h2>
                        <p>
                        <br><h3>Custo: R$<?php echo $curso['custo']; ?></h3>
                        <br><h3>Carga Horária: <?php echo $curso['carga_horario']; ?></h3>
                        <br><?php echo nl2br($curso['descricao']); ?>
                        <br><br></p>
                    </div>
                </div>
            <?php endforeach; ?>
            <br>
        </div></center>
        <script>
            buscar_curso.reset();
        </script>
        <div class="chatbot"><script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
<df-messenger
  intent="WELCOME"
  chat-title="Job For All"
  agent-id="9c92cde5-8005-4a96-9a25-fdf3a60dff56"
  language-code="pt-br"
></df-messenger></div>
    </body>
</head>
