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

    <h1>Cadastro de Usuários</h1>
    <a href="area_adm.php">voltar</a>
    <br><br>

    <form name="formPesquisa" method="POST" action="usuarios.php">

        <a href="cadUsuario.php">Cadastrar</a> |
        Pesquisar: <input type="text" name="pesquisa"><input type="submit" value="pesquisar">
        <?php
        if (isset($_POST['pesquisa'])) {
            echo "<a href='usuarios.php'>Limpar filtro</a>";
        }
        ?>
        <br>

    </form>

    <?php

    //header('Location: index.php?a=a');
    include 'conexao.php';

    $textoP = "";

    if (isset($_POST['pesquisa'])) {
        $textoP = $_POST['pesquisa'];
    }

    //mysqli_query - Definição do Script SQL
    $result = mysqli_query($conn, "select * from usuarios where nome like '" . $textoP . "%'");

    //mysqli_num_rows - Armazena a qtd de registos resultantes de uma consulta
    $nregistos = mysqli_num_rows($result);

    //mysqli_fetch_assoc - Guarda num array o resultado de uma consulta.

    echo "<table width='900' border=1 class='table'>";
    echo "<tr bgcolor='#EEEEEE'>";
    echo "<td colspan=3>Ações</td>";
    echo "<td>Foto</td>";
    echo "<td>Código</td>";
    echo "<td>Nome</td>";
    echo "<td>E-mail</td>";
    echo "<td>Telefone</td>";
    echo "</tr>";

    for ($i = 0; $i < $nregistos; $i++) {
        $registo = mysqli_fetch_assoc($result);
        
        if ($registo['foto'] == ""){
            $foto = "sf.png";            
        } else {
            $foto = $registo['foto'];
        }
        
        echo '<tr><td><a href="delUsuario.php?id=' . $registo['codusuario'] . '" onClick="return confirmaExcluir();">excluir</a></td>';
        echo     '<td><a href="altUsuario.php?id=' . $registo['codusuario'] . '">alterar</a></td>';
        echo     '<td><a href="cadFoto.php?id=' . $registo['codusuario'] . '">foto</a></td>';        
        echo     '<td><img src="arquivos\\' . $foto . '" width=50></td>';
        echo     '<td>' . $registo['codusuario'] .   '</td>';
        echo     '<td>' . $registo['nome'] .     '</td>';
        echo     '<td>' . $registo['email'] .    '</td>';
        echo     '<td>' . $registo['telefone'] . '</td></tr>';
    }

    echo '</table>';

    ?>

</body>

</html>