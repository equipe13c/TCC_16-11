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
            <header id="header" ondragstart='return false'>
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
                    <h1 id="tituloPagina"> Gêneros </h1>
                        <div id="materiasPequenas">
                            <a href="#">
                                <div class="materias">                                
                                        <div id="descricaoImagem"> 
                                            <h3> Ação </h3>
                                        </div>
                                        <img src="imagens/gta-materia.jpg" alt="" id="imagemMaterias">                        
                                </div>
                            </a>
                            <a href="#">
                                <div class="materias">                                
                                        <div id="descricaoImagem"> 
                                            <h3> Aventura </h3> 
                                        </div>
                                        <img src="imagens/gta-materia.jpg" alt="" id="imagemMaterias">                        
                                </div>
                            </a>
                            <a href="#">
                                <div class="materias">                                
                                        <div id="descricaoImagem"> 
                                            <h3> Corrida </h3> 
                                        </div>
                                        <img src="imagens/gta-materia.jpg" alt="" id="imagemMaterias">                        
                                </div>
                            </a>
                            <a href="#">
                                <div class="materias">                                
                                        <div id="descricaoImagem"> 
                                            <h3> Plataforma </h3> 
                                        </div>
                                        <img src="imagens/gta-materia.jpg" alt="" id="imagemMaterias">                        
                                </div>
                            </a>
                            <a href="#">
                                <div class="materias">                                
                                        <div id="descricaoImagem"> 
                                            <h3> FPS </h3>
                                        </div>
                                        <img src="imagens/gta-materia.jpg" alt="" id="imagemMaterias">                        
                                </div>
                            </a>
                            <a href="#">
                                <div class="materias">                                
                                        <div id="descricaoImagem"> 
                                            <h3> Terror </h3>
                                        </div>
                                        <img src="imagens/gta-materia.jpg" alt="" id="imagemMaterias">                        
                                </div>
                            </a> 
                            <a href="#">
                                <div class="materias">                                
                                        <div id="descricaoImagem"> 
                                            <h3> Casual </h3>
                                        </div>
                                        <img src="imagens/gta-materia.jpg" alt="" id="imagemMaterias">                        
                                </div>
                            </a>
                            <a href="#">
                                <div class="materias">                                
                                        <div id="descricaoImagem"> 
                                            <h3> RPG </h3>
                                        </div>
                                        <img src="imagens/gta-materia.jpg" alt="" id="imagemMaterias">                        
                                </div>
                            </a>
                            <a href="#">
                                <div class="materias">                                
                                        <div id="descricaoImagem"> 
                                            <h3> Luta </h3>  
                                        </div>
                                        <img src="imagens/gta-materia.jpg" alt="" id="imagemMaterias">                        
                                </div>
                            </a>
                        </div> 
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
                    <a href="javascript:toTop();" class="subir">
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
