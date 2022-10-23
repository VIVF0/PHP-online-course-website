<html>

<head>
    <title>Aula PHP</title>
</head>

<body>

<?php
    session_start();
    if ((!isset($_SESSION['usuario']) == true)) {
        unset($_SESSION['usuario']);
        header('location:index.php');
    }
    ?>

    <h1>Cadastro de Clientes</h1>
    <a href="usuarios.php">voltar</a>

    <br>
    <br>

    <?php
        include 'conexao.php';

        $id = $_GET['id'];
        $nome = "";

        //mysqli_query - Definição do Script SQL
        $result = mysqli_query($conn, "select * from usuarios where codusuario=" . $id);

        //mysqli_num_rows - Armazena a qtd de registos resultantes de uma consulta
        $nregistos = mysqli_num_rows($result);

        for ($i = 0; $i < $nregistos; $i++) {
            $registo = mysqli_fetch_assoc($result);
            $codigo = $registo['codusuario'];
            $nome = $registo['nome'];

            if ($registo['foto'] == ""){
                $foto = "sf.png";            
            } else {
                $foto = $registo['foto'];
            }

        }
        ?>


    <h2>Cadastro de foto para o usuário [<?php echo $nome ?>]</h2>

    <?php 
    if ($foto != "sf.png") {

        echo "<img src='arquivos\\". $foto . "' width=50 heigth=50>";
        echo "<br><a href='delFoto.php?id=" . $codigo . "&foto=". $foto ."'>excluir foto</a>";
    } else {
    ?>
    <form name="uploadArquivos" method="POST" action="uploadFoto.php" enctype="multipart/form-data">
    
        <input type="hidden" name="codigo" value="<?php echo $codigo ?>">
        Selecione um arquivo: <input name="arquivo" type="file" class="form-label"><br>
        <input type="submit" value="Enviar">
    
    </form>
    <?php } ?>
</body>
</html>