<?php 
session_start();
$login=$_SESSION['login'];
include "../PHP/back/cookie.php"; 
cookie($login);
?>
<!DOCTYPE html>
<head lang="pt-br">
    <head>
        <title>Pagamento</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../CSS/home.css">
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
            <form method="POST" action="../PHP/back/cursos.php" id="formulario" name="formulario">
            <div class="Pagamento">
                    <label for="Curso">Curso:&nbsp&nbsp&nbsp</label>
                    <select id="Curso" name="Curso">
                        <option values="">...</option>
                        <option value="Ingles">Ingles</option>
                        <option value="Informatica Basica">Informatica Basica</option>
                        <option value="Atendimento ao Cliente">Atendimento ao Cliente</option>
                    </select><br><br>
                    <button>Continuar</button><br>
            </form>
//enviar para pag de pagament