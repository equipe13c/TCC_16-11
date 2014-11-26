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
        <title> Mapa do Site </title>
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
                    <h1 id="tituloPagina"> Termos de Uso </h1><br/>
                    <div id="mapaSite">                         
                        <h2> Está Perdido? </h2><br/>
                        <p> Multiplayer </p>
                        <a href="index.php"> Home </a>                        
                        <a href="quem_somos.php"> Quem Somos </a>                        
                        <a href="contato.php"> Contato </a>
                        <a href="termos_uso.php"> Termos de Uso </a>
                        <a href="cadastro.php"> Cadastro </a>
                        <a href="mapa_site.php"> Mapa do Site </a>
                        <p> Colunas </p>
                        <a href="series.php"> Séries </a>
                        <a href="personagens.php"> Personagens </a>
                        <a href="generos.php"> Gêneros </a>
                        <a href="nostalgia.phps"> Nostalgia </a>
                        <p> Plataformas </p>
                        <a href="playstation.php"> Playstation </a>
                        <a href="nintendo.php"> Nintendo </a>
                        <a href="xbox.php"> Xbox </a>
                        <a href="pc.php"> PC </a>                        
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

