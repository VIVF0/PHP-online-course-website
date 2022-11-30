<?php
 require_once 'vendor/autoload.php';

 MercadoPago\SDK::setAccessToken("ENV_ACCESS_TOKEN");

 $payment = new MercadoPago\Payment();
 $payment->transaction_amount = 400;
 $payment->description = "Ingles(teste)";
 $payment->payment_method_id = "pix";
 $payment->payer = array(
     "email" => "teste@teste.com",
     "first_name" => "Teste",
     "last_name" => "teste2",
     "identification" => array(
         "type" => "CPF",
         "number" => "19119119100"
      ),
   );

 $payment->save();

?>