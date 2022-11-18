<?php
/*if($_POST['entrar']==true){*/
  $login = $_POST['login'];
  $entrar = $_POST['entrar'];
  $senha = md5($_POST['senha']);
/*}else{
  $sair=$_POST['sair'];
}*/
$connect = mysqli_connect('localhost', 'root', '', 'job_for_all');
  if (isset($entrar)) {
    $verifica = mysqli_query($connect,"SELECT * FROM conta WHERE usuario ='$login' AND senha = '$senha'");
      if (mysqli_num_rows($verifica)<=0){
        echo"<script language='javascript' type='text/javascript'>
        alert('Login e/ou senha incorretos');window.location
        .href='../../HTML/formulario de login.html';</script>";
      }else{
        session_start();
        $_SESSION['login']=$login;
        header("Location:../../index.php");
    }
  }/*elseif(isset($sair)){
    session_destroy();
    header("Location:../../index.php");
  }*/
?>