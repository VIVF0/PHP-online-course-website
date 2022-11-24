<?php
session_start();
$login=$_SESSION['login'];
include "back/cookie.php";
cookie($login);
require 'back/config.php';
require 'back/exibir_perfil.php';
require 'back/exibir_avaliacoes.php';
require 'back/exibir_curso.php';
$curso= new Cursos($mysql);
$avaliacao = new Avaliacoes($mysql);
$perfils = new Perfil($mysql);
$perfil= $perfils->exibirPerfil($login);
$assinatura= $perfils->exibirAssinatura($login);
$historico=$perfils->exibirHistorico($perfil['id_cliente']);
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Perfil: <?php echo $perfil['nome']; ?></title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../CSS/perfil.css">
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
        </nav>
        <div class="container">
            <img src="">
            <p>Nome: <?php echo $perfil['nome'];?><br><br>
            Email: <?php echo $perfil['usuario'];?></p>
        </div>
        <div class="assinatura">
            <table border="1"> 
                <tr>
                    <th>Curso</th>
                    <th>Status</th>
                </tr>
            <?php foreach($assinatura as $assi): ?>
                <?php $curso=$curso->encontrarPorId($assi['id_curso']);?>
                <tr>
                    <td><p><?php echo $curso['titulo']; ?>&nbsp</p></td>
                    <td>Ativo</td>
                </tr>
            <?php endforeach;?>
            </table>
        </div>
        <div class="historico">
            <table border="1"> 
                <tr>
                    <th><p>Avaliação</p></th>
                    <th><p>Nota&nbsp&nbsp</p></th>
                    <th><p>Horario e Data</p></th>
                </tr>
            <?php foreach($historico as $hist): ?>
                <?php $Avaliacao=$avaliacao->encontrarPorId($hist['id_avaliacao']);?>
                <tr>
                    <td><p><?php echo $Avaliacao['titulo_avaliacao']; ?>&nbsp</p></td>
                    <td><p><?php echo $hist['nota']; ?></p></td>
                    <td><p><?php echo $hist['hora_data']; ?>&nbsp</p></td>
                </tr>
            <?php endforeach;?>
            </table>
        </div>
        <div vw class="enabled">
                <div vw-access-button class="active"></div>
                <div vw-plugin-wrapper>
                    <div class="vw-plugin-top-wrapper"></div>
                </div>
            </div>
        <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
        <script>new window.VLibras.Widget('https://vlibras.gov.br/app');</script>
    </body>
</html>