<?php
    $servername = "localhost";
    $database = "aula";
    $username = "root";
    $password = "";
    // Criando conexão
    $conn = mysqli_connect($servername, $username, $password, $database);
    // Verificar conexão
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    //echo "BD conectado com sucesso!";
    //mysqli_close($conn);
?>
