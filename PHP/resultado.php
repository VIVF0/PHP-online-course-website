<?php 
    require "back/config.php";
    require "back/validacao.php";
    require 'back/exibir_avaliacoes.php';
    $notas = new valida($mysql);
    $obj_avaliacao = new Avaliacoes($mysql);
    $avaliacao = $obj_avaliacao->encontrarPorId($_GET['id_avaliacao']);
    $nota=0;
    for($i=1;$i<3;$i++){
        $nota+=$notas->valida($_POST["id_questao".$i],$_POST["radio".$i]);
    }
    //$notas->insertnota($_GET['id_aula'],$_GET['id_avaliacao'],$nota,$data,$horario);
    $questoes=$obj_avaliacao->exibirQuestao($_GET['id_avaliacao']);
    /*include "back/cookie.php";
    cookie($_COOKIE['login']);*/
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
            <object width="100%" height="100px" data="../HTML/menu.html"></object>
       </nav>
        <br><center><div class="resultado"><h2><p>Resultado "<?php echo $avaliacao['titulo_avaliacao']?>": <?php echo $nota;?></p></h2></center></div>
        <?php $x=1;?>
        <br><div class="container"><?php foreach($questoes as $questao):?>
                <h3><?php echo $x?>. <?php echo $questao['enunciado'];?>?</h3>
                <?php $i=1;?>
                <?php $opcao=$obj_avaliacao->exibirOp($questao['id_questao'])?>
                <?php foreach($opcao as $opcoes):?>
                    <?php if($_POST["radio".$x]==$opcoes['n_op']):?>
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
                    <?php $i+=1;?>
                <?php endforeach;?><br>
                <?php $x+=1;?>
            <?php endforeach;?></div>
    </body>
</html>