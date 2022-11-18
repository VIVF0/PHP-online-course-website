<?php 
    session_start();
    if(isset($_SESSION['login'])){
        $login=$_SESSION['login'];
        require 'back/config.php';
        require 'back/exibir_perfil.php';
        $perfils = new Perfil($mysql);
        $perfil= $perfils->exibirPerfil($login);  
        $valida=true;
    }else{
        $valida=false;
    }
    
?>
<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
            <style>
                .logo{background: -webkit-linear-gradient(180deg, #FDFBFB -28.46%, #00FFE0 141.69%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;text-align: center;font-size: 35px;}
                *{margin: 0; padding: 0;}
                body{font-family: arial, helvetica, sans-serif;font-size: 12px;}
                nav{width: 100%;height: 100px;background: linear-gradient(180deg, #001AFF 0%, rgba(47, 162, 187, 0.88) 100%);  position: fixed;font-family: "Helvetica Neue", "Helvetica", "Helvetica", "Arial", "sans-serif";}
                .menu{list-style:none;float:left;}
                .menu li a{color:white; text-decoration:none; padding:5px 10px; display:block;}
                .menu li a:hover{background:#333;color:#fff;-moz-box-shadow:0 3px 10px 0 #CCC;-webkit-box-shadow:0 3px 10px 0 #ccc;text-shadow:0px 0px 5px #fff;}
                .menu li  ul{position:absolute;top:0;right:108px;background:linear-gradient(180deg, rgba(4, 112, 174, 0.82) 0%, rgba(5, 39, 248, 0.98) 100%);display:none;}
                .menu li:hover ul, .menu li.over ul{display:block;}
                .menu li ul li{display:block;width:130px;margin-right: 0px}
                .menu li{position:relative;float:left;display: inline-block;margin-right: 40px;font-size:24px;color:#FDFBFB;}
                .conteiner{display: flex;flex-direction: row;justify-content: center;align-items: center;margin-top: 6px;}
                a.menu_link:link{color: #FDFBFB;text-decoration: none;}
                a.menu_link:hover{background: -webkit-linear-gradient(180deg, #FDFBFB -28.46%, #00FFE0 141.69%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;}
                a.menu_link:visited{color: #FDFBFB;text-decoration: none;}
                img{height: 22px;width: 22px;margin-right: 12px;}
            </style>
    </head>
    <body>
        <nav>
            <h1  class="logo"><a class="menu_link" href="../index.php" target="_parent">Job For All</a></h1>
            <div class="conteiner">
            <ul class="menu">
                <?php if($valida==true):?>
                    <li><a href="perfil.php?id_cliente=<?php echo $perfil['id_cliente']; ?>" target="_parent"><img src="../IMG/menu/botao-redondo-da-conta-com-o-usuario-dentro.png">Perfil</a>
                        <ul>
                            <li><a href="back/logout.php" target="_parent"><img src="../IMG/menu/botao-redondo-da-conta-com-o-usuario-dentro.png">Logout</a></li>
                        </ul>
                    </li>
                <?php else:?>
                    <li><a href="../HTML/formulario de login.html" target="_parent"><img src="../IMG/menu/botao-redondo-da-conta-com-o-usuario-dentro.png">Entrar</a></li>
                <?php endif;?>
                <li><a href="../HTML/doacao.html" target="_parent"><img src="../IMG/menu/mao.png">Doar</a></li>
                <li><a href="cursos.php" target="_parent"><img src="../IMG/menu/curso-online.png">Cursos</a></li>
                <li><a href="../HTML/ajuda.html" target="_parent"><img src="../IMG/menu/ajuda.png">Contato</a></li>
            </ul></div>
        </nav>
    </body>
</html>