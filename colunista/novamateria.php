<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script type="text/javascript" src="../js/funcoes.js"> </script>
        <script type="text/javascript" src="../js/jquery.js"></script>
        <script type="text/javascript" src="../js/cycle.js"></script>
        <script type="text/javascript" src="../js/javascript.js"></script>
        <script type="text/javascript" src="../js/menu2.js"></script>
        <script type="text/javascript" src="../js/restrito.js"></script>
        <title></title>
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
        </script>  
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
                        <figure id="imgCam" >                       
                            <a onmousedown="mostrarLinks();"  id="camera"></a>
                        </figure>
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
                    <form action="inserirMateriaNova.php" method="post" enctype="multipart/form-data" class="novaMateria" onsubmit="return validaInserir(this);">
                        <div id="categoria">
                            <h1> Selecione Uma Categoria Abaixo: </h1> <br/>
                            <ul class="inputRadios">
                            <li class="inputRadio radioNintendo">
                              <input name="categoria[]"  value="2" type="radio" id="radioNintendo" onclick="ocultar('categorias','nintendo');">
                              <label for="radioNintendo">Nintendo</label><br/><br/><br/>
                              <p> Nintendo </p>
                            </li>

                            <li class="inputRadio radioPc">
                              <input name="categoria[]"  value="4" type="radio" id="radioPc" onclick="ocultar('categorias','pc');">
                              <label for="radioPc">PC</label><br/><br/><br/>
                              <p> PC </p>
                            </li>

                            <li class="inputRadio radioPlaystation">
                              <input name="categoria[]"  value="1" type="radio" id="radioPlaystation" onclick="ocultar('categorias','ps');">
                              <label for="radioPlaystation">Playstation</label><br/><br/><br/>
                              <p> Playstation </p>
                            </li>

                            <li class="inputRadio radioXbox">
                              <input name="categoria[]"  value="3" type="radio" id="radioXbox" onclick="ocultar('categorias','xbox');">    
                              <label for="radioXbox">Xbox</label><br/><br/><br/>
                              <p> Xbox </p>
                            </li>
                            <li class="inputRadio radioNostalgia">
                              <input name="categoria[]"  value="0" type="radio" id="radioNostalgia" onclick="ocultar('categorias','nostalgia');">    
                              <label for="radioNostalgia">Xbox</label><br/><br/><br/>
                              <p>  </p>
                            </li>
                            <li class="inputRadio radioMulti">
                              <input name="categoria[]"  value="0" type="radio" id="radioMulti" onclick="mostraOculta2('radioMulti','categorias','imgPrincipal');">    
                              <label for="radioMulti">Xbox</label><br/><br/><br/>
                              <p> Multiplataforma </p>
                            </li>
                          </ul>
                            
                            
                            <div id="categorias" style="display:none;">

                                <ul class="inputCheckboxs">
                                  <li class="inputCheckbox checkboxNintendo">
                                    <input name="categoria[]"  value="2"  type="checkbox" id="checkboxNintendo">
                                    <label for="checkboxNintendo">Nintendo</label><br/><br/><br/>
                                    <p> Nintendo </p>
                                  </li>

                                  <li class="inputCheckbox checkboxPc">
                                    <input name="categoria[]" value="4"  type="checkbox" id="checkboxPc">
                                    <label for="checkboxPc">PC</label><br/><br/><br/>
                                    <p> PC </p>
                                  </li>

                                  <li class="inputCheckbox checkboxPlaystation">
                                    <input name="categoria[]" value="1"  type="checkbox" id="checkboxPlaystation">
                                    <label for="checkboxPlaystation">Playstation</label><br/><br/><br/>
                                    <p> Playstation </p>
                                  </li>

                                  <li class="inputCheckbox checkboxXbox">
                                    <input name="categoria[]" value="3"  type="checkbox" id="checkboxXbox">    
                                    <label for="checkboxXbox">Xbox</label><br/><br/><br/>
                                    <p> Xbox </p>
                                  </li>
                                </ul>
                                <input name="categoria[]" style="display: none;" value="0"  type="checkbox" id="checkboxXbox" checked>
                            </div>
                            
                            
                            
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
                                <p class="editPlataforma">
                                    Plataforma
                                    <div id="plataforma">  
                                            <select name="plataforma" class="plataforma" id="ids" onchange="mostraOculta('ids', 'multiPlataforma', 'outraPlataforma' );">  
                                                <optgroup label="Nintendo">
                                                    <option> NES - Nintendinho </option>
                                                    <option> Nintendo 64 </option>
                                                    <option> Nintendo 3DS </option>  
                                                    <option> Nintendo DS </option>  
                                                    <option> Nintendo GameCube </option>
                                                    <option> Nintendo Wii </option>
                                                    <option> Nintendo Wii U </option>                               
                                                    <option> SNES - Super Nintendo </option>                                                     
                                                </optgroup>
                                                <optgroup label="PC">
                                                    <option> PC </option>
                                                </optgroup>
                                                <optgroup label="PlayStation">
                                                    <option> PlayStation One </option>
                                                    <option> PlayStation 2 </option>
                                                    <option> PlayStation 3 </option>
                                                    <option> PlayStation 4 </option>
                                                    <option> PSP </option>
                                                    <option> PS Vita </option> 
                                                </optgroup>
                                                <optgroup label="Xbox">
                                                    <option> Xbox </option>
                                                    <option> Xbox 360 </option>
                                                    <option> Xbox One </option>  
                                                </optgroup>   
                                                <optgroup label="Outras Opções">
                                                    <option value="Multiplataforma"> Multiplataforma </option>  
                                                    <option value="Outro"> Outra </option>
                                                </optgroup> 
                                            </select>
                                    </div>
                                <div id="multiPlataforma" style="display: none;">  
                                    <input type="text" name="multiPlataforma" id="multiPlataformas" maxlength="100" placeholder="Digite mais de uma plataforma"/>  
                                </div>
                                <div id="outraPlataforma" style="display: none;">  
                                    <input type="text" name="outraPlataforma" id="outrasPlataformas" maxlength="20" placeholder="Digite outra plataforma"/>  
                                </div>                                                                
                                <div class="editDatalancamento">
                                 <p id="textData"> Data de Lançamento </p>
                                    <input type="text" name="data_lancamento" id="data_lancamento" class="dataLancamento" >
                                </div>
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
