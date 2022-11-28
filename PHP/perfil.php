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
        <div class="cont">   
        <br><p>Nome: <?php echo $perfil['nome'];?><br><br>
            Email: <?php echo $perfil['usuario'];?></p>
            <div class='tabela'>
            <table> 
                <tr>
                    <th>&nbspCurso&nbsp</th>
                    <th>&nbspStatus do Curso&nbsp</th>
                    <th class="botao"></th>
                </tr>
            <?php foreach($assinatura as $assi): ?>
                <?php $cursos=$curso->encontrarPorId($assi['id_curso']);?>
                <tr>
                    <td><p>&nbsp<?php echo $cursos['titulo']; ?>&nbsp</p></td>
                    <td><p>&nbsp<?php echo $assi['status_curso']; ?>&nbsp</p></td>
                    <td class='bt'><?php if($assi['status_curso']=='COMPLETO'):?>
                        <form action="back/pdf.php" method="POST"><input type="hidden" id="nome_cliente" name="nome_cliente" value="<?php echo $perfil['nome']; ?>">
                        <input type="hidden" id="curso_titulo" name="curso_titulo" value="<?php echo $cursos['titulo']; ?>">
                        <input type="hidden" id="carga_horaria" name="carga_horaria" value="<?php echo $cursos['carga_horario']; ?>">
                        <input type="hidden" id="id_curso" name="id_curso" value="<?php echo $cursos['id_curso']; ?>">
                        <button>Certificado</button></form>
                    <?php endif; ?></td>
                </tr>
            <?php endforeach;?>
            </table></div>
            
            <div class='prova'>
            <table> 
                <tr>
                    <th><p>&nbspAvaliação</p></th>
                    <th><p>&nbspNota&nbsp&nbsp</p></th>
                    <th><p>&nbspHorario e Data</p></th>
                </tr>
            <?php foreach($historico as $hist): ?>
                <?php $Avaliacao=$avaliacao->encontrarPorId($hist['id_avaliacao']);?>
                <tr>
                    <td><p>&nbsp<?php echo $Avaliacao['titulo_avaliacao']; ?>&nbsp</p></td>
                    <td><p>&nbsp<?php echo $hist['nota']; ?></p></td>
                    <td><p>&nbsp<?php echo $hist['hora_data']; ?>&nbsp</p></td>
                </tr>
            <?php endforeach;?>
            </table></div>
            </div> </div>
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