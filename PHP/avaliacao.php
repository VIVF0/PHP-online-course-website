<?php
session_start();
$login=$_SESSION['login'];
include "back/cookie.php";
require 'back/config.php';
require 'back/exibir_avaliacoes.php';
require 'back/exibir_perfil.php';
require "back/validacao.php";
include "back/redireciona.php";
//cookie($login);
$obj_avaliacao = new Avaliacoes($mysql);
$obj_perfil = new Perfil($mysql);
$avaliacao = $obj_avaliacao->encontrarPorId($_GET['id_avaliacao']);
$obj_perfil->valiAssinatura($login,$avaliacao['id_curso']);
$questoes=$obj_avaliacao->exibirQuestao($_GET['id_avaliacao']);
$perfil= $obj_perfil->exibirPerfil($login);
$confere=$obj_perfil->verificarHistorico($login,$avaliacao['id_avaliacao']);
$direcionar=$avaliacao['id_avaliacao'];
if($confere==1){
    echo"<script language='javascript' type='text/javascript'>alert('Você já fez a prova, então só vai ser possivel ver o resultado da sua prova');window.location.href='resultado.php?id_avaliacao=$direcionar';</script>";}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $notas = new valida($mysql);
    $nota=0;
    for($i=1;$i<3;$i++){
        $nota+=$notas->valida($_POST["id_questao".$i],$_POST["radio".$i]);
        $notas->insertOp($avaliacao['id_avaliacao'],$_POST["id_questao".$i],$_POST["radio".$i],$perfil['id_cliente']);
    }
    date_default_timezone_set('America/Sao_Paulo');
    $date = date('Y-m-d H:i');
    $notas->insertnota($perfil['id_cliente'],$_GET['id_avaliacao'],$nota,$date);
    $obj_perfil->validaFimCurso($login,$avaliacao['id_curso']);
    redireciona("resultado.php?id_avaliacao=".$avaliacao['id_avaliacao']);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title><?php echo $avaliacao['titulo_avaliacao'];?></title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../CSS/avaliacao.css">
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
        <br><div class="container">
            <div class="aulas">
                <h2>   
                    Titulo: <?php echo $avaliacao['titulo_avaliacao']; ?>
                </h2>
                <br>
                <p><h3>Descrição:</h3><?php echo nl2br($avaliacao['descricao_avaliacao']);?></p>
            </div>
            <form id="formProva" nome="formProva" action="avaliacao.php?id_avaliacao=<?php echo $avaliacao['id_avaliacao']; ?>" method="POST">
                <div class="avaliacao"><?php $x=1;?>
                <input type="hidden" id="<?php echo $avaliacao['id_avaliacao']; ?>" name="<?php echo $avaliacao['id_avaliacao']; ?>" value="<?php echo $avaliacao['id_avaliacao']; ?>">
            <?php foreach($questoes as $questao):?>
                <h3><?php echo $questao['enunciado'];?>:</h3>
                <?php $opcao=$obj_avaliacao->exibirOp($questao['id_questao'])?>
                <?php $i=1;?>
                <input type="hidden" id="id_questao<?php echo $x;?>" name="id_questao<?php echo $x;?>" value="<?php echo $questao['id_questao'];?>">
                <?php foreach($opcao as $opcoes):?>
                    <br><p><input type="radio" id="radio<?php echo $x;?>" name="radio<?php echo $x;?>" value="opcao<?php echo $i;?>">  <?php echo $opcoes['opcao'];?></p>
                    <?php $i+=1;?>
                <?php endforeach;?><br>
                <?php $x+=1;?>
            <?php endforeach;?>
            <p>
                <button>Enviar</button>
            </p></form>
            </div><br>
            <script>
                formProva.reset();
            </script>
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