<?php
  require_once "../pagamento/vendor/autoload.php";
  require "back/config.php";
  require "back/exibir_curso.php";
  require 'credenciais.php';
  require 'pagamento.php';
  $curso = new Cursos($mysql); 
  MercadoPago\SDK::setAccessToken(access_token:SAND_TOKEN);
  
  $payment = new MercadoPago\Payment();
  $payment->transaction_amount = $_POST['custo'];
  $payment->description = $_POST['titulo'];
  $payment->payment_method_id = "pix";
  $payment->payer = array(
      "email" => $_POST['email'],
      "first_name" => $_POST['payerFirstName'],
      "last_name" => $_POST['payerLastName'],
      "identification" => array(
          "type" => "CPF",
          "number" => $_POST['cpf']
        ),
    );

  $payment->save();
  echo $parte1;
  echo "<img style='width:300px;height:300px' scr='data:image/png;base64,".$payment->point_of_interaction->transaction_data->qr_code_base64." alt='Pix do cliente X'>";
  echo "<br><br>".$parte2;
  $curso->insertAssinatura($_POST['id_cliente'],$_POST['id_curso']); 
