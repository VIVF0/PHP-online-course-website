<?php

require '../back/config.php';
include '../back/exibir_curso.php';
include '../back/exibir_aula.php';
include '../back/exibir_avaliacoes.php';
$curso = new Cursos($mysql);
$cursos = $curso->exibirTodos();
$aula = new Aulas($mysql);
$aulas = $aula->exibirAulas();
$avaliacao = new Avaliacoes($mysql);
$avaliacoes = $avaliacao->exibirAvaliacoes();
$historico= $curso->cursoAssinados();
?>
<!DOCTYPE html>
<head lang="pt-br">
    <head>
        <title>Home_Admin</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../../CSS/admin.css">
    </head>
    <body>
        <br><br><center><h1>Página Administrativa</h1></center>
        <br><div class="box">
            <br><center><h1>Assinatura:</h1></center>
        <br><br>
            <div id="curso-admin">  
                <center><Br><table border="1"> 
                        <tr>
                            <th>Curso</th>
                            <th>Alunos</th>
                        </tr><?php $i=0;?>
                        <?php foreach ($cursos as $curt) { ?>
                        <tr>
                            <td><?php echo $curt['titulo'];?></td>
                            <?php if(isset($historico[$i]['assinantes'])):?>
                                <td class="valor"><?php echo $historico[$i]['assinantes'];?></td><?php $i+=1;?>
                            <?php else: ?>
                                <td class="valor">0</td>
                            <?php endif;?>
                        </tr>
                        <?php } ?>
                    </table></center><Br>
            </div><br><Br>
        </div>
        <br><div class="box">
            <br><center><h1>Cursos:</h1></center>
        <div><br><br>
            <?php foreach ($cursos as $curt) { ?>
            <div id="curso-admin">
                <div class="cont">       
                    <br><p>Titulo: <?php echo $curt['titulo']; ?></p>
                    <p>Descricao: <?php echo $curt['descricao']; ?></p><br>
                    <nav>
                        <a class="botao" href="editar_curso.php?id_curso=<?php echo $curt['id_curso']; ?>">Editar</a>
                        <a class="botao" href="excluir_curso.php?id_curso=<?php echo $curt['id_curso']; ?>">Excluir</a>
                    </nav><br>
                </div> 
            </div>
            <?php } ?>
        </div>
        <br><center><div class="botao-block"><a href="adicionar_curso.php">Adicionar Curso</a></div></center><br>
        </div>
        <br><br>
        <br><div class="box">
            <br><center><h1>Aulas:</h1></center>
        <div><br><br>
            <?php foreach ($aulas as $aul) { ?>
            <div id="curso-admin">
                <div class="cont">       
                    <br><p>Titulo_Aula: <?php echo $aul['titulo_aula']; ?></p>
                    <p>Descricao: <?php echo $aul['descricao_aula']; ?></p><br>
                    <p>Curso: <?php echo $aul['titulo']; ?></p><br>
                    <nav>
                        <a class="botao" href="editar_aula.php?id_aula=<?php echo $aul['id_aula']; ?>">Editar</a>
                        <a class="botao" href="excluir_aula.php?id_aula=<?php echo $aul['id_aula']; ?>">Excluir</a>
                    </nav><br>
                </div> 
            </div>
            <?php } ?>
        </div>
        <br><center><div class="botao-block"><a href="adicionar_aula.php">Adicionar Aula</a></div></center><br>
        </div>
        
        <br><br>
        <br><div class="box">
            <br><center><h1>Avaliações:</h1></center>
        <div><br><br>
            <?php foreach ($avaliacoes as $aval) { ?>
            <div id="curso-admin">
                <div class="cont">       
                    <br><p>Titulo_Avaliação: <?php echo $aval['titulo_avaliacao']; ?></p>
                    <p>Descricão_Avaliação: <?php echo $aval['descricao_avaliacao']; ?></p><br>
                    <p>Curso: <?php echo $aval['titulo']; ?></p><br>
                    <nav>
                        <a class="botao" href="editar_avaliacao.php?id_avaliacao=<?php echo $aval['id_avaliacao']; ?>">Editar</a>
                        <a class="botao" href="excluir_avaliacao.php?id_avaliacao=<?php echo $aval['id_avaliacao']; ?>">Excluir</a>
                    </nav><br>
                </div> 
            </div>
            <?php } ?>
        </div>
        <br><center><div class="botao-block"><a href="adicionar_avaliacao.php">Adicionar Avaliação</a></div></center><br>
        </div>
    </body>
</head>