<?php 
    session_start();
    $login=$_SESSION['login'];
    include "back/cookie.php";
    require "back/config.php";
    require "back/validacao.php";
    require 'back/exibir_avaliacoes.php';
    require 'back/exibir_perfil.php';
    cookie($login);
    $perfils = new Perfil($mysql);
    $perfil= $perfils->exibirPerfil($login);
    $obj_avaliacao = new Avaliacoes($mysql);
    $avaliacao = $obj_avaliacao->encontrarPorId($_GET['id_avaliacao']);
    $questoes=$obj_avaliacao->exibirQuestao($_GET['id_avaliacao']);
    $resposta=$obj_avaliacao->respostas($perfil['id_cliente'],$_GET['id_avaliacao']);
    $nota=$obj_avaliacao->exibirHistorico($perfil['id_cliente'],$avaliacao['id_avaliacao']);
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Resultado <?php echo $avaliacao['titulo_avaliacao'];?></title>
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
        <br><center><div class="resultado"><h2><p>Resultado "<?php echo $avaliacao['titulo_avaliacao']?>": <?php echo $nota['nota'];?></p></h2></center></div>
        <?php $x=1;?>
        <br><div class="container"><?php foreach($questoes as $questao):?>
                <h3><?php echo $x?>. <?php echo $questao['enunciado'];?>?</h3>
                <?php $i=1;$y=0;?>
                <?php $opcao=$obj_avaliacao->exibirOp($questao['id_questao'])?>
                <?php foreach($opcao as $opcoes):?>
                    <?php if($resposta[$y]['opcao']==$opcoes['n_op']):?>
                        <?php if($questao['resposta']==$opcoes['n_op']):?>
                            <div class="certo"><br><p>&nbsp&nbsp&nbsp&nbsp<?php echo $i?>. <?php echo $opcoes['opcao'];?></p>
                            <br><p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspJustificativa: <?php echo $opcoes['justificativa'];?></p></div>
                        <?php else:?>   
                            <div class="errado"><br><p>&nbsp&nbsp&nbsp&nbsp<?php echo $i?>. <?php echo $opcoes['opcao'];?></p>
                            <br><p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspJustificativa: <?php echo $opcoes['justificativa'];?></p></div>
                        <?php endif; ?>
                    <?php else:?>
                        <br><p>&nbsp&nbsp&nbsp&nbsp<?php echo $i?>. <?php echo $opcoes['opcao'];?></p>
                        <br><p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspJustificativa: <?php echo $opcoes['justificativa'];?></p>
                    <?php endif; ?>
                    <?php $i+=1;$y=0;?>
                <?php endforeach;?><br>
                <?php $x+=1;?>
            <?php endforeach;?></div>
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