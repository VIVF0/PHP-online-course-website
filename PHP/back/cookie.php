<?php 
    //class usuario{
    function cookie($login_cookie){
        if(!isset($login_cookie)){
            echo"<script language='javascript' type='text/javascript'>
            alert('É necessario fazer Login para prosseguir!');window.location
            .href='http://localhost/Job%20for%20All/Job-for-All/HTML/formulario%20de%20login.html';</script>";
        }
    }
//}