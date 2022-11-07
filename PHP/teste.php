<?php
    require 'back/config.php';
    include 'back/exibir_curso.php';
    //$titulo="teste";
    $curso = new Cursos($mysql);
    $cursos = $curso->encontrarPorId('1');
    //echo $cursos['titulo']."__________";
    foreach ($cursos as $l){
        echo $l['titulo']."__________";
    }
    echo "fim";