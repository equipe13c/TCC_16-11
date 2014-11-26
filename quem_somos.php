<!DOCTYPE html>
<html>
    <head> 
        <title> Multiplayer </title>
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
                document.getElementById("logar").style.borderBottom = "solid 5px #00989E";
                document.getElementById("nav").style.backgroundColor = "#00989E";
                document.getElementById("navReduzido").style.backgroundColor = "#00989E";                
                document.getElementById("botaoLogin").style.backgroundColor = "#00989E";
            };             
        </script>        
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
                    <div id="integrantes">
                        <h1> Quem Somos </h1><br/>
                        <h2> O site Multiplayer foi desenvolvido pela equipe 9Bits. </h2>
                        <div class="integrante">
                            <img src="imagens/integrante01.jpg"> <p> Gabrieli - Monografia </p>
                        </div>
                        <div class="integrante">
                            <img src="imagens/integrante02.jpg"> <p> Larissa - Monografia </p>
                        </div>
                        <div class="integrante">
                            <img src="imagens/integrante03.jpg"> <p> Jessica - Publicidade e Marketing </p>
                        </div>
                        <div class="integrante">
                            <img src="imagens/integrante04.jpg"> <p> Lucas - Publicidade e Marketing </p>
                        </div>
                        <div class="integrante">
                            <img src="imagens/integrante05.jpg"> <p> Josimar - Front-End </p>
                        </div>
                        <div class="integrante">
                            <img src="imagens/integrante06.jpg"> <p> Alessandro - Front-End </p>
                        </div>
                        <div class="integrante">
                            <img src="imagens/integrante07.jpg"> <p> João Gabriel - Front-End </p>
                        </div>
                        <div class="integrante">
                            <img src="imagens/integrante08.jpg"> <p> Jonathan - Back-End </p>
                        </div>
                        <div class="integrante">
                            <img src="imagens/integrante09.jpg"> <p> Vinicius - Back-End </p>
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
        </section>
    </body>
</html>