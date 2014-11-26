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
            };             
        </script>    
        <title> Escreva-nos </title>    
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
                    <div id="escreva"> 
                        <h1> Escreva-nos </h1><br/>
                        <h2> Aqui você pode enviar sua matéria e se nossos colunistas gostarem, ela pode aparecer no nosso site. </h2>
                        <div id="formularioEscreva">
                            <h1> Envie-nos sua matéria </h1>
                            <form action="#" method="post" id="escrevaForm" onsubmit="return validaContato(this);">
                                <div id="campos">
                                    <p> Nome: </p> <input type="text" name="nomeEscreva" placeholder="Nome" class="campos"> 
                                </div>                            
                                <div id="campos">
                                    <p> E-mail: </p> <input type="text" name="emailEscreva" placeholder="E-mail" class="campos">
                                </div>  
                                <div id="escrevaMensagem">
                                    <p> Matéria: </p> <input type="file" name="materia" class="campoEscreva">
                                </div>                                
                                <input type="submit" value="Enviar" class="botaoForm"/>   
                            </form>
                        </div>    
                    </div>
                </div>
                </div>                 
            </article>
            <div id="imgFooter" ondragstart='return false'> 
                <img src="imagens/ideiaRodape.png" alt=""> 
            </div>
            <footer id="footer" ondragstart='return false'>
                <?php
                    include_once 'includes/rodape.php';
                ?>
            </footer>
        </container>
    </body>
</html>