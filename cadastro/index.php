<html>

<head>
    <title>
        PHP - MySql
    </title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/funcoes_aula.js"></script>
</head>

<body>
<center>
    <h1>Sistema de Autenticação</h1>
    <br>

    <form name="formLogin" method="POST" action="index.php">

        <p>
            Usuário:<br>
            <input type="text" name="usuario">
        </p>
        <p>
            Senha:<br>
            <input type="password" name="senha">
        </p>

        <p>
            <input type="submit" name="entrar" value="Entrar">
        </p>



        <?php
        include 'conexao.php';

        if (isset($_POST['entrar'])) {
            $usuario = $_POST['usuario'];
            $senha = $_POST['senha'];
            $erros = "";

            if (trim($usuario) == "") {
                $erros = erro($erros, "Campo Usuário obrigatório!");
            }
            if (trim($senha) == "") {
                $erros = erro($erros, "Campo Senha obrigatório!");
            }

            if ($erros == "") {

                $verifica = mysqli_query($conn, "select * from usuarios where usuario = '" . $usuario . "' and senha = password('" . $senha . "')");
                $conta = mysqli_num_rows($verifica);
        
                if ($conta != 0) {
                    session_start();
                    $_SESSION['usuario'] = $usuario;
                    header('Location: area_adm.php');
                } else {
                    $erros = erro($erros, "Usuário e/ou senha não conferem!");
                    echo $erros; 
                }

            } else {
                echo $erros;
            }
        }

        function erro($erro, $mensagem)
        {
            $retorno = $mensagem . "<br>" . $erro;
            return $retorno;
        }

        ?>

    </form>
</center>
</body>

</html>