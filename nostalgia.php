<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="shortcut icon" href="imagens/icone004.png" >
        <script type="text/javascript" src="js/funcoes.js"> </script>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/cycle.js"></script>
        <script type="text/javascript" src="js/javascript.js"></script>
        <script type="text/javascript">             
            onload = function(){
                var imgMiniLogo = document.getElementById("imgMiniLogo");
                var imgLogo = document.getElementById("img-logo");                
                imgMiniLogo.innerHTML = '<img src="imagens/logosReduzidos004.png" alt="" id="miniLogo">';
                imgLogo.innerHTML = '<img src="imagens/logo004.png" alt="" id="logo">';                              
                document.getElementById("tituloPagina").style.backgroundColor = "#6D6A65";  
                document.getElementById("tituloAside").style.backgroundColor = "#6D6A65";                 
                document.getElementById("logar").style.borderBottom = "solid 5px #6D6A65";
                document.getElementById("nav").style.backgroundColor = "#6D6A65";
                document.getElementById("navReduzido").style.backgroundColor = "#6D6A65";                
                document.getElementById("botaoLogin").style.backgroundColor = "#6D6A65";              
            };             
        </script>   
        <title> Nostalgia </title>
    </head>
    <body>
        <section id="container">
            <?php
                include_once 'conexao/conecta.inc';
                include_once 'includes/funcoesUteis.inc';
                session_start();
            ?>
            <header id="cabecalho"  ondragstart="return false">
                <?php
                include_once 'includes/menu.php';
                ?>
                <div id="logar">
                    <?php
                        VerificaSessao('');
                    ?>                    
                </div>
            </header>
            <article id="conteudo">
                <div id="galeria">  
                    <div id="botoesGaleria">
                        <a href="#" id="prev"> <img src="imagens/previousOutros.png" alt=""> </a>
                        <a href="#" id="next"> <img src="imagens/nextOutros.png" alt=""> </a>
                    </div>
                    <div id="slide">
                        <?php
                             buscarMateriasSlide();
                        ?>    
                    </div>                
                </div>  
                    <div id="corpoConteudo">
                    <div id="materias">  
                        <h1 id="tituloPagina"> Nostalgia </h1>
                         <?php
                             buscarMateriasPrincipal();
                            ?>                            
                        <div id="materiasPequenas">
                            <?php
                             buscarMateriasPequenas();
                            ?>                             
                        </div> 
                    </div>                
                        <div id="paginacaoMateria">

                        </div>
                    </div>
                    <aside id="aside1">
                        <h1 id="tituloAside"> Top Notícias </h1>
                        <div id="materiasAside">
                            <?php
                                buscarMateriasAside2();
                            ?>
                             <?php
                                buscarMateriasAside2();
                            ?>
                        </div>    
                    </aside> 
                
                <div id="voltarTopo">
                    <a href="" class="subir">
                        <img src="imagens/topoOutros.png" alt="">
                        <p> Voltar ao topo </p>
                    </a>                    
                </div>
            </article>
            <div id="imgFooter" ondragstart="return false">
                <img src="imagens/imagemRodape.png">
            </div>
            <footer id="footer">
                <?php
                    include_once 'includes/rodape.php';
                ?>
            </footer>            
        </section>
    </body>
</html>
