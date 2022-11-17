<?php 
    function cookie($login_cookie){
        if(!isset($login_cookie)){
            echo"<script language='javascript' type='text/javascript'>
            alert('É necessario fazer Login para prosseguir!');window.location
            .href='HTML/formulario de login.html';</script>";
        }
    }