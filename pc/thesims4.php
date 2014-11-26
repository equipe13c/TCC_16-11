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
        <link rel="stylesheet" href="../popupgaleria/vlb_files1/vlightbox1.css" type="text/css" />
	<link rel="stylesheet" href="../popupgaleria/vlb_files1/visuallightbox.css" type="text/css" media="screen" />
        <script src="../popupgaleria/vlb_engine/jquery.min.js" type="text/javascript"></script>
	<script src="../popupgaleria/vlb_engine/visuallightbox.js" type="text/javascript"></script>
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
                acrescentarAcessos('1');
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
                            <div id="nome_autor">
                                <b>POR</b>
                                <?php
                                   infoArtigos('nomeAutor','pc/thesims4.php');  
                                ?>
                               <b>EM</b> 20/12/1900
                            </div>
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
                    	<script src="../popupgaleria/vlb_engine/vlbdata1.js" type="text/javascript"></script>
                </div>
                <div id="galeriaVideo">
                    <?php buscarUrlVideo('1','urlVideo1');
                    buscarUrlVideo('1','urlVideo2');
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
                        <input type="text" id='textocomentario' name='comentario'>                    
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
</html>
