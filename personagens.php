<!DOCTYPE html>
<html>
    <head> 
        <title> Multiplayer </title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
        <link rel="shortcut icon" href="imagens/icone001.png" >
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/cycle.js"></script>
        <script type="text/javascript" src="js/javascript.js"></script>
        <script type="text/javascript">             
            onload = function(){
                var imgMiniLogo = document.getElementById("imgMiniLogo");
                var imgLogo = document.getElementById("img-logo");                
                imgMiniLogo.innerHTML = '<img src="imagens/logosReduzidos001.png" alt="" id="miniLogo">';
                imgLogo.innerHTML = '<img src="imagens/logo001.png" alt="" id="logo">';                              
                document.getElementById("tituloPagina").style.backgroundColor = "#00989E";  
                document.getElementById("tituloAside").style.backgroundColor = "#00989E";                 
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
            <article id="article"> 
                <div id="corpoConteudo">
                    <div id="materias">
                        <h1 id="tituloPagina"> Personagens </h1>
                        <a href="#">
                            <div class="materiaPrincipal">                                
                                    <div id="descricaoImagemPrincipal"> 
                                        <p> Leon - Resident Evil 4 </p>
                                    </div>
                                <img src="imagens/residentEvil4.jpg" alt="">                        
                            </div>
                        </a>
                        <div id="materiasPequenas">
                            <a href="#">
                                <div class="materiasPersonagem">
                                    <img src="imagens/mario1.png" alt="" class="imagemPersonagem1"> 
                                    <img src="imagens/mario2.png" alt="" class="imagemPersonagem2">
                                    <div id="descricaoPersonagem"> 
                                    <h3> Mario </h3> 
                                    </div>
                                </div>                                
                            </a>
                            <a href="#">
                                <div class="materiasPersonagem">
                                    <img src="imagens/batman1.png" alt="" class="imagemPersonagem1"> 
                                    <img src="imagens/batman2.png" alt="" class="imagemPersonagem2">
                                    <div id="descricaoPersonagem"> 
                                    <h3> Batman </h3> 
                                    </div>
                                </div> 
                            </a>
                            <a href="#">
                                <div class="materiasPersonagem">
                                    <img src="imagens/kratos1.png" alt="" class="imagemPersonagem1"> 
                                    <img src="imagens/kratos2.png" alt="" class="imagemPersonagem2">
                                    <div id="descricaoPersonagem"> 
                                    <h3> Kratos </h3> 
                                    </div>
                                </div> 
                            </a>
                            <a href="#">
                                <div class="materiasPersonagem">
                                    <img src="imagens/link1.png" alt="" class="imagemPersonagem1"> 
                                    <img src="imagens/link2.png" alt="" class="imagemPersonagem2">
                                    <div id="descricaoPersonagem"> 
                                    <h3> Link </h3> 
                                    </div>
                                </div> 
                            </a>
                            <a href="#">
                                <div class="materiasPersonagem">
                                    <img src="imagens/altair1.png" alt="" class="imagemPersonagem1"> 
                                    <img src="imagens/altair2.png" alt="" class="imagemPersonagem2">
                                    <div id="descricaoPersonagem"> 
                                    <h3> Altair </h3> 
                                    </div>
                                </div> 
                            </a>
                            <a href="#">
                                <div class="materiasPersonagem">
                                    <img src="imagens/sonic1.png" alt="" class="imagemPersonagem1"> 
                                    <img src="imagens/sonic2.png" alt="" class="imagemPersonagem2">
                                    <div id="descricaoPersonagem"> 
                                    <h3> Sonic </h3> 
                                    </div>
                                </div> 
                            </a> 
                            <a href="#">
                                <div class="materiasPersonagem">
                                    <img src="imagens/luigi1.png" alt="" class="imagemPersonagem1"> 
                                    <img src="imagens/luigi2.png" alt="" class="imagemPersonagem2">
                                    <div id="descricaoPersonagem"> 
                                    <h3> Luigi </h3> 
                                    </div>
                                </div> 
                            </a>
                            <a href="#">
                                <div class="materiasPersonagem">
                                    <img src="imagens/masterChief1.png" alt="" class="imagemPersonagem1"> 
                                    <img src="imagens/masterChief2.png" alt="" class="imagemPersonagem2">
                                    <div id="descricaoPersonagem"> 
                                    <h3> Master Chief </h3> 
                                    </div>
                                </div> 
                            </a>
                            <a href="#">
                                <div class="materiasPersonagem">
                                    <img src="imagens/laraCroft1.png" alt="" class="imagemPersonagem1"> 
                                    <img src="imagens/laraCroft2.png" alt="" class="imagemPersonagem2">
                                    <div id="descricaoPersonagem"> 
                                    <h3> Lara Croft </h3> 
                                    </div>
                                </div> 
                            </a>
                        </div>  
                    </div>              
                        <div id="paginacaoMateria">

                        </div>
                    </div>                    
                    <aside id="aside1">
                        <h1 id="tituloAside"> Top Notícias </h1>
                        <?php
                        buscarMateriasAside2();
                        ?>
                    </aside> 
                <div id="voltarTopo">
                    <a href="" class="subir">
                        <img src="imagens/topo.png" alt="">
                        <p> Voltar ao topo </p>
                    </a>                    
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
        </section>
    </body>
</html>