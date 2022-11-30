<?php 
session_start();
$login=$_SESSION['login'];
include "../PHP/back/cookie.php"; 
include '../PHP/back/exibir_curso.php';
include '../PHP/back/exibir_perfil.php';
require 'back/config.php';
cookie($login);
$curso = new Cursos($mysql);
$cursos =$curso->encontrarPorId($_POST['titulo']);  
$perfils = new Perfil($mysql);
$perfil =$perfils->exibirPerfil($login);  
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Pagamento</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../CSS/compra_curso.css">
        <link rel="stylesheet" type="text/css" href="../CSS/dark.css">
        <script src="inf/main.js" defer></script>
        <script src="../JS/modonot.js" defer></script>
    </head>
    <body>
        <div class="dark">
            <label class="switch">
                <div class="switch-wrapper">
                    <input type="checkbox" name="toggle-dark" id="toggle-dark">
                    <span class="switch-button"></span>
                </div>
            </label>
        </div>
        <nav>
            <!--Menu-->
            <object width="100%" height="100px" data="../PHP/menu.php"></object>
        </nav>
        <script src="https://sdk.mercadopago.com/js/v2"></script>
        <div class="fundo">
          <center><div class="preenchimento">
            <form id="form-checkout" action="envpagamento.php" method="POST">
              <label for="payerFirstName">Nome:</label>
              <input id="payerFirstName" name="payerFirstName" type="text" placeholder="Insira seu primeiro nome"><br>
              <label for="payerLastName">Sobrenome:</label>
              <input id="payerLastName" name="payerLastName" type="text" placeholder="Insira seu sobrenome"><br>
              <label for="email">E-mail:</label>
              <input id="email" name="email" type="text" placeholder="Insira seu e-mail"><br>
              <label for="identificationNumber">CPF:</label>
              <input id="cpf" name="cpf" type="text" placeholder="Insira seu CPF"><br>
              <p>Curso selecionado: <h3><?php echo $cursos['titulo']; ?></h3></p>
              <p>Valor a ser pago: <h3>R$<?php echo $cursos['custo']; ?></h3></p>
              <input type="hidden" name="custo" id="custo" value="<?php echo $cursos['custo'] ?>">
              <input type="hidden" name="titulo" id="titulo" value="<?php echo $cursos['titulo'] ?>">
              <input type="hidden" name="id_curso" id="id_curso" value="<?php echo $cursos['id_curso'] ?>">
              <input type="hidden" name="id_cliente" id="id_cliente" value="<?php echo $perfil['id_cliente'] ?>">
              <br>
              <button type="submit">Pagar</button>
            </form>
          </div></center>
        </div>
    </body>
</html>   