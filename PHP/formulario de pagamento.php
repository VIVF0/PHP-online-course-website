<?php 
session_start();
$login=$_SESSION['login'];
include "../PHP/back/cookie.php"; 
include '../PHP/back/exibir_curso.php';
include '../PHP/back/exibir_perfil.php';
require 'back/config.php';
cookie($login);
$perfil= new Perfil($mysql);
$id=$perfil->exibirPerfil($login);
$curso = new Cursos($mysql);
//$cursos =$curso->cursofalta($id['id_cliente']);  
$cursos =$curso->exibirTodos();  
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Pagamento</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../CSS/compra_curso.css">
        <link rel="stylesheet" type="text/css" href="../CSS/dark.css">
        <script src="inf/main.js" defer></script>
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
            <object width="100%" height="100px" data="../PHP/menu.php"></object>
       </nav>
        <center><div class="fundo"><br><br><br>
            <div class="Pagamento">
                <h3>Selecione o curso que deseja comprar!</h3><br><Br>
                    <?php if(!is_null($cursos)):?>
                        <form method="POST" action="form_pagamento.php" id="formulario" name="formulario">
                        <label for="titulo">Curso:&nbsp&nbsp&nbsp</label>
                        <select id="titulo" name="titulo">
                        <?php foreach($cursos as $curso):?>    
                            <option value="<?php echo $curso['id_curso']; ?>"><?php echo $curso['titulo'];?></option>
                        <?php endforeach;?>     
                        </select><br><br>
                        <button>Continuar</button><br>
                    <?php else:?>
                        <p>Você já compro todos os cursos!</p>
                    <?php endif;?>
            </div>
            </form></center>
        </div>
    </body>
</html> 