<!DOCTYPE html>
<html>                                                                                  
    <head> 
        <title> TheSims4</title>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
        <script type="text/javascript" src="../js/funcoes.js"> </script>
        <script type="text/javascript" src="../js/jquery.js"></script>
        <script type="text/javascript" src="../js/cycle.js"></script>
        <script type="text/javascript" src="../js/javascript.js"></script>
        <script type="text/javascript" src="../js/menu2.js"></script>
        <script type="text/javascript" src="../js/restrito.js"></script>
        <script type="text/javascript"> 
            onload = function(){
                var imgMiniLogo = document.getElementById("imgMiniLogo");
                var imgLogo = document.getElementById("img-logo"); 
                imgMiniLogo.innerHTML = "<img src='../imagens/logosReduzidos006.png' alt='' id='miniLogo'>";
                imgLogo.innerHTML = "<img src='../imagens/logo006.png' alt='' id='logo'>";  
                document.getElementById("nav").style.backgroundColor = "#F39200";                
                document.getElementById("imgPrincipal").style.backgroundColor = "#F39200"; 
                document.getElementById("tituloMateria").style.backgroundColor = "#F39200";
                document.getElementById("navReduzido").style.backgroundColor = "#F39200";
                document.getElementById("fundoDescricaoMateria").style.backgroundColor = "#F7D47F";
                document.getElementById("descricaoColunista").style.backgroundColor = "#F39200";  
                document.getElementById("logar").style.borderBottom = "solid 5px #F39200"; 
                document.getElementById("botaoLogin").style.backgroundColor = "#F39200";
                document.getElementById("tituloPagina").style.backgroundColor = "#F39200";            
                var imgMiniLogo = document.getElementById("imgMiniLogo");
            };
        </script>       
        
    </head> 
<body>
        <section id="container">
            <?php
                include_once '../conexao/conecta.inc';
                include_once '../includes/funcoesUteis.inc';
                session_start();
            ?>
            <header id="cabecalho">
                <?php
                    include_once '../includes/menuMaterias.php';
                ?>
            <figure id="imgCapa">
                <?php
                infosImagensMateria('capa','1');
                ?>
                
            </figure>
                <div id="logar">
                    <?php
                       VerificaSessao2('');
                    ?>                    
                </div>

            </header>



            <article id="conteudo">
                <figure id="imgPrincipal">
                    <?php
                        infosImagensMateria('imgPrincipal','1');
                    ?>
                </figure>
                <div id="tituloMateria">
                    <div id="caixaTitulo"><h1 class="editTitulo"> Zelda U
                    <?php
                        infoArtigos('titulo','pc/thesims4.php');
                    ?>
                     </h1></div>
                </div>
                <div id="fundoDescricaoMateria">
                    <div id="descricaoMateria">
                        <p class="editDescricao">
                        <?php
                            infoArtigos('descricao','pc/thesims4.php');
                        ?>
                        </p>
                        <p class="editPlataforma">
                        <?php
                            echo "<b>Desenvolvedora:</b>    ";
                            infoArtigos('plataforma','pc/thesims4.php');
                        ?>
                        </p>
                        <p class="editDatalancamento">
                        <?php
                            echo "<b>Data de Lançamento:</b>    ";
                            infoArtigos('dataLancamento','pc/thesims4.php');
                        ?>
                        </p>
                    </div>
                </div>    
                <div id="conteudoMateria">
                    <div class="ediConteudoMateria">
                        <div class="editTituloconteudo">
                            <p>
                                <?php
                                    infoArtigos('tituloConteudo','pc/thesims4.php');
                                ?>
                            </p>
                        </div>                        
                        <p>
                            <?php
                                infoArtigos('conteudoMateria','pc/thesims4.php');
                            ?>
                        </p>
                        </div>
                </div>
                <div id="galeriaImagens">
                    <figure class="imagensGaleria" >
                        <?php
                            infosImagensMateria('imagemgaleria1','1');
                        ?>
                    </figure>
                    <figure class="imagensGaleria">
                        <?php
                            infosImagensMateria('imagemgaleria2','1');
                        ?>
                    </figure>
                    <figure class="imagensGaleria" >
                        <?php
                            infosImagensMateria('imagemgaleria3','1');
                        ?>
                    </figure>
                </div>
                <div id="galeriaVideo">
                            <div id="video1">
                                <iframe width="370" id="iframeVideo1" height="245" src="" frameborder="0" allowfullscreen></iframe>
                            </div>
                            <div id="video2">
                                <iframe width="370" id="iframeVideo2" height="245" src="" frameborder="0" allowfullscreen></iframe>     
                            </div>
                </div>
                <div id="colunista">     
                    <figure id="autor_materia">
                    <?php
                        buscarImagemAutor('29');
                    ?>
                    </figure>
                    <div id="descricaoColunista"> 
                        <div id="infoAutor">
                            
                        </div>
                    </div>
                </div>
                <div id="comentario">
                    <div class="comentarios">
                        
                    <figure class="imagem_user"> 
                        <?php
                            buscarFotoUser();
                        ?>
                    </figure>
                                            
                    <div class="coment">
                        <form name='frmComentar' method='post' action='../comentar.php' id='enviar'>
                        <textarea id='textocomentario' name='comentario'> </textarea>                        
                        <input type="hidden" name='codigoArtigo' value='1' > 
                        <input type="submit" name='btnComentar' value="Publicar" class="botaoEnviar" > 
                        </form>
                    </div>   
                    </div>
                    <div class='exibirComent'>
                        <?php
                            listarComentarios('1');
                        ?>
                    </div>
                </div>
            </article>
            <aside id="aside1">
                    <?php
                       buscarMateriasAside();
                   ?>
                <br/>
            </aside>
            <div id="voltarTopo">
                <a href="" class="subir">
                    <img src="imagens/topo.png" alt="">
                    <p> Voltar ao topo </p>
                </a>                    
            </div>
            <div id="imgFooter" ondragstart='return false'> 
                <img src="../imagens/ideiaRodape.png" alt=""> 
            </div>
            <footer id="footer">
                <?php
                    include_once '../includes/rodapeMaterias.php';
                ?>
            </footer>            
        </section>
    </body>
</html>'