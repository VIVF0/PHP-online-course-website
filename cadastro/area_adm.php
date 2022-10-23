<html>

<head>
    <title>
        PHP - MySql
    </title>

</head>

<body>
    <h1>Área ADMIN</h1>
    <br>

    <?php
    session_start();
    if ((!isset($_SESSION['usuario']) == true)) {
        unset($_SESSION['usuario']);
        header('location:index.php');
    }
    $logado = $_SESSION['usuario'];
    ?>

    Seja bem vindo <?php echo $logado; ?> | <a href="sair.php">sair</a>
    <br><br>
    <a href="usuarios.php">Cadastrar Usuário</a>
</body>

</html>