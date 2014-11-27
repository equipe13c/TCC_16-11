<!DOCTYPE html>
                                                                                                
<html>                                                                                  
    <head> 
        <title>gta v</title>
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
                imgMiniLogo.innerHTML = "<img src='../imagens/logosReduzidos003.png' alt='' id='miniLogo'>";
                imgLogo.innerHTML = "<img src='../imagens/logo003.png' alt='' id='logo'>";  
                document.getElementById("nav").style.backgroundColor = "#8EA50D";                
                document.getElementById("imgPrincipal").style.backgroundColor = "#8EA50D"; 
                document.getElementById("tituloMateria").style.backgroundColor = "#8EA50D";
                document.getElementById("navReduzido").style.backgroundColor = "#8EA50D";
                document.getElementById("fundoDescricaoMateria").style.backgroundColor = "#A9F5D0";
                document.getElementById("descricaoColunista").style.backgroundColor = "#8EA50D";  
                document.getElementById("logar").style.borderBottom = "solid 5px #8EA50D"; 
                document.getElementById("botaoLogin").style.backgroundColor = "#8EA50D";
                document.getElementById("tituloPagina").style.backgroundColor = "#8EA50D";           
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
                acrescentarAcessos('5');
            ?>
            <header id="cabecalho">
                <?php
                    include_once '../includes/menuMaterias.php';
                ?>
            <figure id="imgCapa">
                <?php
                infosImagensMateria('capa','5');
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
                        infosImagensMateria('imgPrincipal','5');
                    ?>
                </figure>
                <div id="tituloMateria">
                    <div id="caixaTitulo"><h1 class="editTitulo"> 
                    <?php
                        infoArtigos('titulo','xbox/gtav.php');
                    ?>
                     </h1></div>
                </div>
                <div id="fundoDescricaoMateria">
                    <div id="descricaoMateria">
                        <p class="editDescricao">
                        <?php
                            infoArtigos('descricao','xbox/gtav.php');
                        ?>
                        </p>
                        <p class="editPlataforma">
                        <?php
                            echo "<b>Plataforma:</b>    ";
                            infoArtigos('plataforma','xbox/gtav.php');
                        ?>
                        </p>
                        <p class="editDatalancamento">
                        <?php
                            echo "<b>Data de Lançamento:</b>    ";
                            infoArtigos('dataLancamento','xbox/gtav.php');
                        ?>
                        </p>
                    </div>
                </div>    
                <div id="conteudoMateria">
                    <div class="ediConteudoMateria">
                        <div class="editTituloconteudo">
                            <p>
                                <?php
                                    infoArtigos('tituloConteudo','xbox/gtav.php');
                                ?>
                            </p>
                            <div id="nome_autor">
                                <b>POR</b>
                                <?php
                                   infoArtigos('nomeAutor','xbox/gtav.php');  
                                ?>
                               <b>EM</b> 27/11/2014 
                            </div>
                        </div>                        
                        <p>
                            <?php
                                infoArtigos('conteudoMateria','xbox/gtav.php');
                            ?>
                        </p>
                        </div>
                </div>
                <div id="galeriaImagens">
                    <figure class="imagensGaleria" >
                        <?php
                            infosImagensMateria('imagemgaleria1','5');
                        ?>
                    </figure>
                    <figure class="imagensGaleria">
                        <?php
                            infosImagensMateria('imagemgaleria2','5');
                        ?>
                    </figure>
                    <figure class="imagensGaleria" >
                        <?php
                            infosImagensMateria('imagemgaleria3','5');
                        ?>
                    </figure>
                    	<script src="../popupgaleria/vlb_engine/vlbdata1.js" type="text/javascript"></script>
                </div>
                <div id="galeriaVideo">
                    <?php buscarUrlVideo('5','urlVideo1');
                    buscarUrlVideo('5','urlVideo2');
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
                             <?phpbuscarDescAutor('29');?>
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
                        <input type="text" id="textocomentario" name="comentario">                    
                        <input type="hidden" name="codigoArtigo" value="5" > 
                        <input type="submit" name="btnComentar" value="Publicar" class="botaoEnviar" > 
                        </form>
                    </div>   
                    </div>
                    <div class='exibirComent'>
                        <?php
                            listarComentarios('5');
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