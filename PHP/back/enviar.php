<?php
  //Variáveis
  $nome = $_REQUEST['nome'];
  $email = $_REQUEST['email'];
  $assunto=$_REQUEST['assunto'];
  $mensagem = $_REQUEST['mensagem'];

  //Compo E-mail
  $arquivo = "
    <html>
      <p><b>Nome: </b>$nome</p>
      <p><b>E-mail: </b>$email</p>
      <p><b>Mensagem: </b>$mensagem</p>
    </html>
  ";
  
  //Emails para quem será enviado o formulário
  $destino = "email@empresa.com";

  //Este sempre deverá existir para garantir a exibição correta dos caracteres
  $headers  = "MIME-Version: 1.0\n";
  $headers .= "Content-type: text/html; charset=iso-8859-1\n";
  $headers .= "From: $nome <$email>";
  //Enviar
  mail($destino, $assunto, $arquivo,$headers);
  header("Location:ajuda.html");
  die();
?>
