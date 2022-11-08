<?php
  //Variáveis
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $assunto=$_POST['assunto'];
  $mensagem = $_POST['mensagem'];
  //Compo E-mail
  $arquivo = "
    <html>
      <p><b>Nome: </b>$nome</p>
      <p><b>E-mail: </b>$email</p>
      <p><b>Mensagem: </b>$mensagem</p>
    </html>
  ";
  //Emails para quem será enviado o formulário
  $destino = "vitorfreireparaty@gmail.com";

  //Este sempre deverá existir para garantir a exibição correta dos caracteres
  $headers  = "MIME-Version: 1.0\n";
  $headers .= "Content-type: text/html; charset=iso-8859-1\n";
  $headers .= "From: $nome <$email>";
  /*echo "Nome: $nome<br>";
  echo "Email: $email<br>";
  echo "Assunto: $assunto<br>";
  echo "Mensagem: $mensagem<br>";*/
  //Enviar
  mail($destino, $assunto, $arquivo,$headers);
  header("Location:ajuda.html");
  die();

