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

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    if ($_GET['action'] == "i") {

        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        $verifica = mysqli_query($conn, "select * from usuarios where usuario = '" . $usuario . "'");
        $conta = mysqli_num_rows($verifica);

        if ($conta == 0) {
            $result = mysqli_query($conn, "insert into usuarios (nome, email, telefone, usuario, senha) values ('" . $nome . "', '" . $email . "', '" . $telefone . "', '" . $usuario . "', password('" . $senha . "'))");
            if ($result == 1) {
                echo "Usuário cadastrado com sucesso!";
            } else {
                echo "Usuário não pode ser cadastrado!";
            }
        } else {
            echo "Usuário já cadastrado!";
        }
    }

    if ($_GET['action'] == "a") {
        $codigo = $_POST['codigo'];
        $result = mysqli_query($conn, "update usuarios set nome='" . $nome . "', email='" . $email . "', telefone='" . $telefone . "' where codusuario=" . $codigo);
        if ($result == 1) {
            echo "Usuário atualizado com sucesso!";
        } else {
            echo "Usuário não pode ser atualizado!";
        }
    }

    ?>
</body>

</html>