<!DOCTYPE html>
                                                                                                
<html>                                                                                  
    <head> 
        <title>altair</title>
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
                document.getElementById("nav").style.backgroundColor = "#00989E";                
                document.getElementById("imgPrincipal").style.backgroundColor = "#00989E"; 
                document.getElementById("tituloMateria").style.backgroundColor = "#00989E";
                document.getElementById("tituloAside").style.backgroundColor = "#00989E";
                document.getElementById("navReduzido").style.backgroundColor = "#00989E";
                document.getElementById("fundoDescricaoMateria").style.backgroundColor = "#83FF7B";
                document.getElementById("descricaoColunista").style.backgroundColor = "#00989E";  
                document.getElementById("logar").style.borderBottom = "solid 5px #00989E"; 
                document.getElementById("botaoLogin").style.backgroundColor = "#00989E";
                document.getElementById("tituloPagina").style.backgroundColor = "#00989E";           
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
                acrescentarAcessos('8');
            ?>
            <header id="cabecalho">
                <?php
                    include_once '../includes/menuMaterias.php';
                ?>
            <figure id="imgCapa">
                <?php
                infosImagensMateria('capa','8');
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
                        infosImagensMateria('imgPrincipal','8');
                    ?>
                </figure>
                <div id="tituloMateria">
                    <div id="caixaTitulo"><h1 class="editTitulo"> 
                    <?php
                        infoArtigos('titulo','personagens/altair.php');
                    ?>
                     </h1></div>
                </div>   
                <div id="conteudoMateria">
                    <div class="ediConteudoMateria">
                        <div class="editTituloconteudo">
                            <p>
                                <?php
                                    infoArtigos('tituloConteudo','personagens/altair.php');
                                ?>
                            </p>
                            <div id="nome_autor">
                                <b>POR</b>
                                <?php
                                   infoArtigos('nomeAutor','personagens/altair.php');  
                                ?>
                               <b>EM</b> 01/12/2014 
                            </div>
                        </div>                        
                        <p>
                            <?php
                                infoArtigos('conteudoMateria','personagens/altair.php');
                            ?>
                        </p>
                        </div>
                </div>
                <div id="galeriaImagens">
                    <figure class="imagensGaleria" >
                        <?php
                            infosImagensMateria('imagemgaleria1','8');
                        ?>
                    </figure>
                    <figure class="imagensGaleria">
                        <?php
                            infosImagensMateria('imagemgaleria2','8');
                        ?>
                    </figure>
                    <figure class="imagensGaleria" >
                        <?php
                            infosImagensMateria('imagemgaleria3','8');
                        ?>
                    </figure>
                    	<script src="../popupgaleria/vlb_engine/vlbdata1.js" type="text/javascript"></script>
                </div>
                <div id="galeriaVideo">
                    <?php buscarUrlVideo('8','urlVideo1');
                    buscarUrlVideo('8','urlVideo2');
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
                <h1 id="tituloComentario">Comentários</h1>
                    <div class="comentarios">                        
                    <figure class="imagem_user"> 
                        <?php
                            buscarFotoUser();
                        ?>
                    </figure>                                            
                    <div class="coment">
                        <form name='frmComentar' method='post' action='../comentar.php' id='enviar'>
                        <input type="text" id="textocomentario" name="comentario">                    
                        <input type="hidden" name="codigoArtigo" value="8" > 
                        <input type="submit" name="btnComentar" value="Publicar" class="botaoEnviar" > 
                        </form>
                    </div>   
                    </div>
                    <div class='exibirComent'>
                        <?php
                            listarComentarios('8');
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
                <a href="javascript:toTop();" class="subir">
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