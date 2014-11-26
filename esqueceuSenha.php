<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="shortcut icon" href="imagens/icone001.png" >
        <script type="text/javascript" src="js/funcoes.js"> </script>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/cycle.js"></script>
        <script type="text/javascript" src="js/javascript.js"></script>
        <script type="text/javascript"> 
            onload = function(){
                var imgMiniLogo = document.getElementById("imgMiniLogo");
                var imgLogo = document.getElementById("img-logo");                
                imgMiniLogo.innerHTML = '<img src="imagens/logosReduzidos001.png" alt="" id="miniLogo">';
                imgLogo.innerHTML = '<img src="imagens/logo001.png" alt="" id="logo">';   
                document.getElementById("nav").style.backgroundColor = "#00989E";
                document.getElementById("navReduzido").style.backgroundColor = "#00989E";                 
                document.getElementById("botaoLogin").style.backgroundColor = "#00989E";
                document.getElementById("logar").style.borderBottom = "solid 5px #00989E";               
                document.getElementById("tituloPagina").style.backgroundColor = "#00989E";                
            };       
        </script>
        <title> Recuperar Senha </title>
    </head>
    <body> 
        <section id="container">
            <?php
                include_once 'conexao/conecta.inc';
                include_once 'includes/funcoesUteis.inc';
                session_start();
            ?>
            <header id="cabecalho">
                <?php
                    include_once 'includes/menu.php';
                ?>
                <div id="logar">
                    <?php
                        VerificaSessao('');
                    ?>                    
                </div>
            </header>
            <article id="article"> 
                <div id="area1">
                    <h1 id="tituloPagina"> Recupere sua Senha </h1><br/>
                    <div id="contato">                         
                        <h2> Esqueceu sua senha? Ou alterou e não se lembra? </h2>
                        <h2> Altere Aqui. </h2>                        
                        <div id="formularioContato">
                            <h1> Recuperar para e-mail </h1>
                            <form action="enviarSenha.php" method="post">
                                <p id="tag_rec"> Recuperar Senha</p><br/><br/>
                                <label id="tag_email_rec">E-mail:</label><input id="rec_email" type="email" name="email" required><br/>
                                <input type="submit" id="btnRec" value="Recuperar">
                            </form>
                        </div>    
                    </div>
                </div>
                </div>                 
            </article>
            <div id="imgFooter" ondragstart='return false'> 
                <img src="imagens/imagemRodape.png" alt=""> 
            </div>
            <footer id="footer" ondragstart='return false'>
                <?php
                    include_once 'includes/rodape.php';
                ?>
            </footer>
        </container>
    </body>
</html> 
