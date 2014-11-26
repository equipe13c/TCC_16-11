<!DOCTYPE html>
<html>                                                                                  
    <head> 
        <title>GTA V</title>
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
                imgMiniLogo.innerHTML = "<img src='../imagens/logosReduzidos005.png' alt='' id='miniLogo'>";
                imgLogo.innerHTML = "<img src='../imagens/logo005.png' alt='' id='logo'>";  
                document.getElementById("nav").style.backgroundColor = "#009FE3";                
                document.getElementById("imgPrincipal").style.backgroundColor = "#009FE3"; 
                document.getElementById("tituloMateria").style.backgroundColor = "#009FE3";
                document.getElementById("navReduzido").style.backgroundColor = "#009FE3";
                document.getElementById("fundoDescricaoMateria").style.backgroundColor = "#CEECF5";
                document.getElementById("descricaoColunista").style.backgroundColor = "#009FE3";  
                document.getElementById("logar").style.borderBottom = "solid 5px #009FE3"; 
                document.getElementById("botaoLogin").style.backgroundColor = "#009FE3";
                document.getElementById("tituloPagina").style.backgroundColor = "#009FE3";            
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
                infosImagensMateria('capa','2');
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
                        infosImagensMateria('imgPrincipal','2');
                    ?>
                </figure>
                <div id="tituloMateria">
                    <div id="caixaTitulo"><h1 class="editTitulo"> Zelda U
                    <?php
                        infoArtigos('titulo','nintendo/GTA.php');
                    ?>
                     </h1></div>
                </div>
                <div id="fundoDescricaoMateria">
                    <div id="descricaoMateria">
                        <p class="editDescricao">
                        <?php
                            infoArtigos('descricao','nintendo/GTA.php');
                        ?>
                        </p>
                        <p class="editPlataforma">
                        <?php
                            echo "<b>Desenvolvedora:</b>    ";
                            infoArtigos('plataforma','nintendo/GTA.php');
                        ?>
                        </p>
                        <p class="editDatalancamento">
                        <?php
                            echo "<b>Data de Lançamento:</b>    ";
                            infoArtigos('dataLancamento','nintendo/GTA.php');
                        ?>
                        </p>
                    </div>
                </div>    
                <div id="conteudoMateria">
                    <p class="editTituloconteudo">
                    <?php
                        infoArtigos('tituloConteudo','nintendo/GTA.php');
                    ?>
                    </p>
                    <p class="ediConteudoMateria">
                    <?php
                        infoArtigos('conteudoMateria','nintendo/GTA.php');
                    ?>
                    </p>
                </div>
                <div id="galeriaImagens">
                    <figure class="imagensGaleria" >
                        <?php
                            infosImagensMateria('imagemgaleria1','2');
                        ?>
                    </figure>
                    <figure class="imagensGaleria">
                        <?php
                            infosImagensMateria('imagemgaleria2','2');
                        ?>
                    </figure>
                    <figure class="imagensGaleria" >
                        <?php
                            infosImagensMateria('imagemgaleria3','2');
                        ?>
                    </figure>
                </div>
                <div id="conteudoMateria2">                    
                    <p class="ediConteudoMateria">
                    <?php
                        infoArtigos('conteudoMateria2','nintendo/GTA.php');
                    ?>
                    </p>
                </div>
                <div id="galeriaVideo">                    
                    <p class="ediConteudoMateria">
                    <?php
                        infoArtigos('conteudoMateria','nintendo/GTA.php');
                    ?>
                    </p>
                </div>
                <div id="colunista">     
                    <figure id="autor_materia">
                    <?php
                        buscarImagemAutor('2');
                    ?>
                    </figure>
                    <div id="descricaoColunista"> 
                        <p>                     
                            <?php
                                    buscarDescAutor('2');
                            ?> 
                        </p>
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
                        <input type="hidden" name='codigoArtigo' value='2' > 
                        <input type="submit" name='btnComentar' value="Publicar" class="botaoEnviar" > 
                        </form>
                    </div>   
                    </div>
                    <div class='exibirComent'>
                        <?php
                            listarComentarios('2');
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