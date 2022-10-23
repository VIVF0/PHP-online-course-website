<?php

    $arquivo = $_FILES['arquivo'];
    $diretorio = "arquivos/";

    //2 PARTE
    $tamMaximo = 50000; //Tamanho em bytes

    //3 PARTE
    $extensoes = array(".jpg", ".jpeg", ".gif", ".png");
    $extArquivo = strchr($arquivo['name'], '.');

    if (!in_array($extArquivo, $extensoes)) {
        echo "Extensão não permitida!";
    } else {

        //2 PARTE
        if ($arquivo['size'] > $tamMaximo) {
            echo "Arquivo maior que o tamanho máximo permitido<br>";
            echo "Tamanho do arquivo: " .$arquivo['size'];
        } else {    
            //4 PARTE - RENOMEAR ARQUIVO
            $nomeArquivo = "WBR_" .date("d").date("m").date("yy")."_".date("h").date("i").date("s").$extArquivo;
            //1 PARTE
            //if (move_uploaded_file($arquivo['tmp_name'], $diretorio.$arquivo['name'])) {
            
            if (move_uploaded_file($arquivo['tmp_name'], $diretorio.$nomeArquivo)) {
                //1 PARTE
                //echo "Arquivo gravado com sucesso! " .$arquivo['name'];
                //echo "<br><img src='" .$diretorio.$arquivo['name']. "'>";
                echo "Arquivo gravado com sucesso! " .$nomeArquivo;
                echo "<br><img src='" .$diretorio.$nomeArquivo. "'>";

           } else {
               echo "Erro ao enviar o arquivo!";
           }
        }
    }
