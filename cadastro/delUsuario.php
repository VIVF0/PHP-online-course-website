<html>

<head>
    <title>
        PHP - MySql
    </title>

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

    $result = mysqli_query($conn, "delete from usuarios where codusuario=" . $id);

    if ($result == 1) {
        echo "Usuário excluído com sucesso!";
    } else {
        echo "Usuário não pode ser excluído!";
    }

    ?>

</body>

</html>