<html>

<head>
    <title>Aula PHP</title>
    <script src="js/funcoes.js"></script>
</head>

<body>

    <h1>Upload de Arquivos</h1>

    <form name="uploadArquivos" method="POST" action="upload.php" enctype="multipart/form-data">
    
        Selecione um arquivo: <input name="arquivo" type="file"><br>
        <input type="submit" value="Enviar">
    
    </form>
</body>
</html>