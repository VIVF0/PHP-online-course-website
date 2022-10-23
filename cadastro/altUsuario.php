<html>

<head>
    <title>
        PHP - MySql
    </title>

    <script src="js/funcoes_aula.js"></script>
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

    <form name="formCadastro" method="POST" onsubmit="return validaForm();" action="addUsuario.php?action=a">

        <?php
        include 'conexao.php';

        $id = $_GET['id'];
        $codigo = "";
        $nome = "";
        $email = "";
        $telefone = "";
        $usuario = "";

        //mysqli_query - Definição do Script SQL
        $result = mysqli_query($conn, "select * from usuarios where codusuario=" . $id);

        //mysqli_num_rows - Armazena a qtd de registos resultantes de uma consulta
        $nregistos = mysqli_num_rows($result);

        for ($i = 0; $i < $nregistos; $i++) {
            $registo = mysqli_fetch_assoc($result);
            $codigo = $registo['codusuario'];
            $nome = $registo['nome'];
            $telefone = $registo['telefone'];
            $email = $registo['email'];
            $usuario = $registo['usuario'];
        }
        ?>

        <p>
            Código:<br>
            <?php echo ($codigo); ?>
        </p>
        <p>
            Nome:<br>
            <input type="text" name="nome" value=<?php echo ($nome); ?>>
        </p>
        <p>
            E-mail:<br>
            <input type="text" name="email" value=<?php echo ($email); ?>>
        </p>
        <p>
            Telefone:<br>
            <input type="text" name="telefone" value=<?php echo ($telefone); ?>>
        </p>
        <p>
            Usuário:<br>
            <input type="text" name="usuario" readonly value=<?php echo ($usuario); ?>>
        </p>

        <p>
            <input type="submit" value="Gravar">
        </p>

        <span id="erros_form"></span>
    </form>
</body>

</html>