<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="shortcut icon" href="../imagens/icone001.png" >
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
                imgMiniLogo.innerHTML = '<img src="../imagens/logosReduzidos001.png" alt="" id="miniLogo">';
                imgLogo.innerHTML = '<img src="../imagens/logo001.png" alt="" id="logo">';   
                document.getElementById("nav").style.backgroundColor = "#00989E";
                document.getElementById("navReduzido").style.backgroundColor = "#00989E";                 
                document.getElementById("botaoLogin").style.backgroundColor = "#00989E";
                document.getElementById("logar").style.borderBottom = "solid 5px #00989E";               
                document.getElementById("tituloPagina").style.backgroundColor = "#00989E"; 
            };
                      function previewImgPersonagem(input, tipo) {
                    if(tipo == 'imgOut'){
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
 
                    reader.onload = function (e) {
                            $('#preview_imageOut')
                .attr('src', e.target.result)
                                    .width(230)
                    };
                    reader.readAsDataURL(input.files[0]);
                }
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
 
                    reader.onload = function (e) {
                            $('#preview_imageOut2')
                .attr('src', e.target.result)
                                    .width(230)
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
                    if(tipo == 'imgHover'){
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
 
                    reader.onload = function (e) {
                            $('#preview_imageHover')
                .attr('src', e.target.result)
                                    .width(230)
                    };
                    reader.readAsDataURL(input.files[0]);
                }
                                if (input.files && input.files[0]) {
                    var reader = new FileReader();
 
                    reader.onload = function (e) {
                            $('#preview_imageHover2')
                .attr('src', e.target.result)
                                    .width(230)
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
}

        </script>  
        <title> Área Administrativa </title>
    </head>
    <body >
        <section id="container" >
            <?php
                include_once '../conexao/conecta.inc';
                include_once '../includes/funcoesUteis.inc';
            ?>
            <header id="cabecalho">
                <?php
                validaAutenticacao('../index.php','3');
                include_once '../includes/menuR.php';
                
                ?>
            </header>
            <figure id="imgCapa">
                <?php
                buscarDados('imgcapa');
                ?>
                
            </figure>
            <article id="conteudo">
                <div id="info_user">    
                    <figure id="imgUser" onmouseover="mostrarCam();" onmouseout="retirarCam();" >
                        <?php
                            $query = "SELECT * FROM IMAGEM_USUARIO WHERE COD_IMAGEM_USUARIO = ".$_SESSION['code'];
                            $result = mysql_query($query);                
                            $imagens = mysql_num_rows($result);
                            if($imagens === 0){
                            $nome = "default.jpg";            
                            mysql_query("INSERT INTO IMAGEM_USUARIO(URL_IMAGEM, COD_IMAGEM_USUARIO)
                            VALUES('$nome'".$_SESSION['code'].")");
                            }
                            else{
                            $imagens2 = mysql_fetch_array($result); 
                            $urlImagem = $imagens2['URL_IMAGEM'];
                            echo "<img src='../uploads/$urlImagem' id='imagemUser' alt='imagem'>";
                        ?>
                        <div id="imgCam" >
                            <div id="linksMudarImg">
                                <a href="alterarImg.php" > Alterar Imagem </a>
                                <a href="removerImg.php" > Remover Imagem </a> 
                            </div>
                        </div>
                        <nav id="menuImagem" >

                        </nav>    
                    </figure>
                    <div id="nomeUser">
                        <?php
                        $sql = mysql_query("SELECT NOME_USUARIO, APELIDO_USUARIO FROM USUARIO WHERE COD_USUARIO =". $_SESSION['code']); 
                        $result = mysql_fetch_array($sql); 
                        echo '<h1 class="username">'.$result['NOME_USUARIO'].'<br/>( '.$result['APELIDO_USUARIO'].' )</h1>';
                        }
                        ?>
                    </div>
                </div>
                <nav id="menu2">
                    <?php 
                        include '../includes/menuC.php';
                    ?>
                </nav>
                <article id="conteudo_infos">
                    <form action="inserirPersonagemNovo.php" method="post" enctype="multipart/form-data" class="novaMateria" onsubmit="return validaInserir(this);">
                        <div id="categoria">
                        <figure id="imgOut">
                            <p> Selecione uma imagem de capa com dimensões 400x250 para esta área.</p>
                            <img id="preview_imageOut" alt="" src="">
                            <input type="file" name="imagemOut" class="imgOutPersonagem"  onchange="previewImgPersonagem(this,'imgOut');" multiple>
                        </figure>
                        <figure id="imgHover">
                            <p> Selecione uma imagem de capa com dimensões 400x250 para esta área.</p>
                            <img id="preview_imageHover" alt="" src="">
                            <input type="file" name="imagemHover" class="imgHoverPersonagem"  onchange="previewImgPersonagem(this,'imgHover');" multiple>
                        </figure>
                        <figure id="previewEfeito">
                            <img id="preview_imageOut2" alt="" src="" class="imagemPersonagem1">
                            <img id="preview_imageHover2" alt="" src="" class="imagemPersonagem2">
                            <div id="descricaoPersonagem"> 
                                <h3> <input type="text" name="nome_personagem" value="" id="nome_personagem" placeholder="NOME PERSONAGEM"> </h3> 
                                    </div>
                        </figure>
                        </div>
                        <figure id="imgCapaMateria">
                            <p> Selecione uma imagem de capa com dimensões 400x250 para esta área.</p>
                            <img id="preview_imageCapa" alt="" src="">
                            <input type="file" name="imagemCapa" class="imgCapaMateria"  onchange="preview(this,'capa');" multiple>
                        </figure>
                        <figure id="imgPrincipal">                            
                            <p> Selecione uma imagem com dimensões 400x250 para esta área.</p>
                            <img id="preview_image" alt="" src="">
                            <input type="file" name="imagemPrincipal" class="imgPrincipal" id="files" onchange="preview(this,'principal');" multiple>
                        </figure>
                        <div id="tituloMateria">
                            <input type="text" name="titulo_conteudo" class="textos_materia" id="titulo_materia" placeholder="Digite aqui o título da Matéria">
                        </div>                       
                        <div id="fundoDescricaoMateria">
                            <div id="descricaoMateria">
                                <p class="editDescricao">
                                    <textarea name="descricao" class="descricao_materia" id="descricao_materia" placeholder="Descrição do Jogo"></textarea>
                                </p>
                            </div>
                        </div>      
                        <div id="conteudoMateria">                            
                            <div id="subtituloMateria">
                                <input type="text" name="subtitulo" id="subtitulo_materia" class="subtituloMateria" placeholder="Subtítulo da Matéria">
                            </div>
                            <p> Limite de Caracteres: 1500. </p>
                            <textarea id="campoConteudo1" placeholder="Digite o texto da matéria aqui" name="conteudo" maxlength="1500"></textarea>
                        </div>
                        <div id="galeriaImagens">
                            <figure class="imagensGaleria" >
                                <p> imagem 255x150</p>
                                <img id="preview_imageGaleria1" alt="" src="">
                                <input type="file" name="imagemGaleria" class="imgGaleria1" onchange="preview(this,'galeria1');" multiple>
                            </figure>
                            <figure class="imagensGaleria">
                                <p> imagem 255x150</p>
                                <img id="preview_imageGaleria2" alt="" src="">
                                <input type="file" name="imagemGaleria2" class="imgGaleria1" onchange="preview(this,'galeria2');" multiple>
                            </figure>
                            <figure class="imagensGaleria" >
                                <p> imagem 255x150</p>
                                <img id="preview_imageGaleria3" alt="" src="">
                                <input type="file" name="imagemGaleria3" class="imgGaleria1" onchange="preview(this,'galeria3');" multiple>
                            </figure>                                
                        </div>
                        <div id="galeriaVideo">
                            <div id="opcoesVideo1">
                            <input type="text" name="urlVideo1" class='txtUrlVideos' id="urlVideo1" placeholder="DIGITE A URL DO VIDEO">
                            <input type='button' class='previewVideos' id="preverVideo1" onclick="previewVideo('urlVideo1','iframeVideo1','galeriaVideo1');" value="Prever Vídeo"> </button>
                            <input type='button' class='retirarVideos' id="retirarVideo1" onclick="retirarVideo('video1','galeriaVideo1');" value="Retirar Vídeo"> </button>
                            </div>
                            <div id="opcoesVideo2">
                            <input type="text" name="urlVideo2" id="urlVideo2" class='txtUrlVideos' placeholder="DIGITE A URL DO VIDEO">
                            <input type='button' class='previewVideos' id="preverVideo2" onclick="previewVideo('urlVideo2','iframeVideo2','galeriaVideo2');" value="Prever Video"> </button>
                            <input type='button' class='retirarVideos' id="retirarVideo2" onclick="retirarVideo('video2','galeriaVideo2');" value="Retirar Vídeo"> </button>
                            </div>
                            <div id="video1" style="display:none">
                                <iframe width="425" id="iframeVideo1" height="300" src="" frameborder="0" allowfullscreen></iframe>
                            </div>
                            <div id="video2" style="display:none">
                                <iframe width="425" id="iframeVideo2" height="300" src="" frameborder="0" allowfullscreen></iframe>     
                            </div>
                        </div>
                        <div id="urlMateria">
                           <input type="text" name="url_materia" class='txtUrlMateria' id="urlMaterias" placeholder="DIGITE A URL DA MATÉRIA">
                        </div>
                        <div id="postarMateria">
                            <input type="submit" value="Postar Matéria" name="postarMateria" class="inserirMateria">
                        </div>
                    </form> 
                </article>                
            </article>
            <div id="imgFooter" ondragstart="return false">
                <img src="../imagens/imagemRodape.png">
            </div>
            <footer id="footer">
                <?php
                    include_once '../includes/rodapeAdmin.php';
                ?>
            </footer>            
        </section>
    </body>
</html>
