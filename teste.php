<!DOCTYPE html>
<head>
    <head>


    </head>
    <body>
        <?php
        # Nome do arquivo html
        $pagename = "pastatest/paginahtml.html";

        # Texto a ser salvo no arquivo
        $texto = "<h1>Test Page Edu</h1>";

        #Criar o arquivo
        $fp = fopen($pagename , "w");
        $fw = fwrite($fp, $texto);

        #Verificar se o arquivo foi salvo.
        if($fw == strlen($texto)) {
            echo 'Arquivo criado com sucesso!!';
        }else{
            echo 'falha ao criar arquivo';
        }
        ?>        
    </body>

</head>