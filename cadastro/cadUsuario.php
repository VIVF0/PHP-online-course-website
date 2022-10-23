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

    <form name="formCadastro" method="POST" onsubmit="return validaForm();" action="addUsuario.php?action=i">

        <p>
            Nome:<br>
            <input type="text" name="nome" class="form-control" width="500px">
        </p>
        <p>
            E-mail:<br>
            <input type="text" name="email">
        </p>
        <p>
            Telefone:<br>
            <input type="text" name="telefone">
        </p>
        <p>
            Usuário:<br>
            <input type="text" name="usuario">
        </p>
        <p>
            Senha:<br>
            <input type="password" name="senha">
        </p>

        <p>
            <input type="submit" value="Gravar">
        </p>

        <span id="erros_form"></span>
    </form>
</body>

</html>