<?php
include 'conexao.php';

$codigo = $_GET['id'];
$arquivo = "arquivos\\" . $_GET['foto'];

if (!unlink($arquivo))
{
  echo ("Erro ao deletar $arquivo");
}
else
{
    $result = mysqli_query($conn, "update usuarios set foto='' where codusuario=" . $codigo);
    echo ("Deletado $arquivo com sucesso!");
    echo ("<br><br><a href='usuarios.php'>Voltar</a>");
}

?>