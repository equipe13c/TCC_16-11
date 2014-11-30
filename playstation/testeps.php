<!DOCTYPE html>
                                                                                                
<html>                                                                                  
    <head> 
        <title>teste</title>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link rel="stylesheet" type="text/css" href="../css/styleMaterias.css"/>
        <script type="text/javascript" src="../js/funcoes.js"> </script>
        <script type="text/javascript" src="../js/jquery.js"></script>
        <script type="text/javascript" src="../js/cycle.js"></script>
        <script type="text/javascript" src="../js/javascript.js"></script>
        <script type="text/javascript" src="../js/menu2.js"></script>
        <script type="text/javascript" src="../js/restrito.js"></script>
        <link rel="stylesheet" href="../popupgaleria/vlb_files1/vlightbox1.css" type="text/css" />
	<link rel="stylesheet" href="../popupgaleria/vlb_files1/visuallightbox.css" type="text/css" media="screen" />
        <script src="../popupgaleria/vlb_engine/jquery.min.js" type="text/javascript"></script>
	<script src="../popupgaleria/vlb_engine/visuallightbox.js" type="text/javascript"></script>
        <script type="text/javascript"> 
            onload = function(){
                var imgMiniLogo = document.getElementById("imgMiniLogo");
                var imgLogo = document.getElementById("img-logo"); 
                imgMiniLogo.innerHTML = "<img src='../imagens/logosReduzidos002.png' alt='' id='miniLogo'>";
                imgLogo.innerHTML = "<img src='../imagens/logo002.png' alt='' id='logo'>";  
                document.getElementById("nav").style.backgroundColor = "#9C1006";                
                document.getElementById("imgPrincipal").style.backgroundColor = "#9C1006"; 
                document.getElementById("tituloMateria").style.backgroundColor = "#9C1006";
                document.getElementById("tituloAside").style.backgroundColor = "#9C1006";
                document.getElementById("navReduzido").style.backgroundColor = "#9C1006";
                document.getElementById("fundoDescricaoMateria").style.backgroundColor = "#FCC6C0";
                document.getElementById("descricaoColunista").style.backgroundColor = "#9C1006";  
                document.getElementById("logar").style.borderBottom = "solid 5px #9C1006"; 
                document.getElementById("botaoLogin").style.backgroundColor = "#9C1006";
                document.getElementById("tituloPagina").style.backgroundColor = "#9C1006";           
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
                acrescentarAcessos('11');
            ?>
            <header id="cabecalho">
                <?php
                    include_once '../includes/menuMaterias.php';
                ?>
            <figure id="imgCapa">
                <?php
                infosImagensMateria('capa','11');
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
                        infosImagensMateria('imgPrincipal','11');
                    ?>
                </figure>
                <div id="tituloMateria">
                    <div id="caixaTitulo"><h1 class="editTitulo"> 
                    <?php
                        infoArtigos('titulo','playstation/testeps.php');
                    ?>
                     </h1></div>
                </div>
                <div id="fundoDescricaoMateria">
                    <div id="descricaoMateria">
                        <p class="editDescricao">
                        <?php
                            infoArtigos('descricao','playstation/testeps.php');
                        ?>
                        </p>
                        <p class="editPlataforma">
                        <?php
                            echo "<b>Plataforma:</b>    ";
                            infoArtigos('plataforma','playstation/testeps.php');
                        ?>
                        </p>
                        <p class="editDatalancamento">
                        <?php
                            echo "<b>Data de Lançamento:</b>    ";
                            infoArtigos('dataLancamento','playstation/testeps.php');
                        ?>
                        </p>
                    </div>
                </div>    
                <div id="conteudoMateria">
                    <div class="ediConteudoMateria">
                        <div class="editTituloconteudo">
                            <p>
                                <?php
                                    infoArtigos('tituloConteudo','playstation/testeps.php');
                                ?>
                            </p>
                            <div id="nome_autor">
                                <b>POR</b>
                                <?php
                                   infoArtigos('nomeAutor','playstation/testeps.php');  
                                ?>
                               <b>EM</b> 30/11/2014 
                            </div>
                        </div>                        
                        <p>
                            <?php
                                infoArtigos('conteudoMateria','playstation/testeps.php');
                            ?>
                        </p>
                        </div>
                </div>
                <div id="galeriaImagens">
                    <figure class="imagensGaleria" >
                        <?php
                            infosImagensMateria('imagemgaleria1','11');
                        ?>
                    </figure>
                    <figure class="imagensGaleria">
                        <?php
                            infosImagensMateria('imagemgaleria2','11');
                        ?>
                    </figure>
                    <figure class="imagensGaleria" >
                        <?php
                            infosImagensMateria('imagemgaleria3','11');
                        ?>
                    </figure>
                    	<script src="../popupgaleria/vlb_engine/vlbdata1.js" type="text/javascript"></script>
                </div>
                <div id="galeriaVideo">
                    <?php buscarUrlVideo('11','urlVideo1');
                    buscarUrlVideo('11','urlVideo2');
                    ?>
                </div>
                <div id="colunista">     
                    <figure id="autor_materia">
                    <?php
                        buscarImagemAutor('29');
                    ?>
                    </figure>
                    <div id="descricaoColunista"> 
                        <div id="infoAutor">
                             <?php buscarDescAutor('29');?> 
                        </div>
                    </div>
                </div>
                <div id="comentario">
                    <h1 id='tituloComentario'>Comentários</h1> 
                    <div class="comentarios">                        
                    <figure class="imagem_user"> 
                        <?php
                            buscarFotoUser();
                        ?>
                    </figure>                              
                    <div class="coment">
                        <form name='frmComentar' method='post' action='../comentar.php' id='enviar'>
                        <input type="text" id="textocomentario" name="comentario">                    
                        <input type="hidden" name="codigoArtigo" value="11" > 
                        <input type="submit" name="btnComentar" value="Publicar" class="botaoEnviar" > 
                        </form>
                    </div>   
                    </div>
                    <div class='exibirComent'>
                       
                        <?php
                            listarComentarios('11');
                        ?>
                    </div>
                </div>
            </article>
            <aside id="aside1">
               <h1 id="tituloAside"> Top Notícias </h1>
                    <?php
                       buscarMateriasAside();
                   ?>
                <br/>
            </aside>
            <div id="voltarTopo">
                <a href="" class="subir">
                    <img src="../imagens/topoPs.png" alt="">
                    <p> Voltar ao topo </p>
                </a>                    
            </div>
            <div id='imgFooter' ondragstart='return false'> 
                <img src='../imagens/ideiaRodape.png' alt=''> 
            </div>
            <footer id="footer">
                <?php
                    include_once '../includes/rodapeMaterias.php';
                ?>
            </footer>            
        </section>
    </body>
</html>