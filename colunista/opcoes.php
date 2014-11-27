<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script type="text/javascript" src="../js/funcoes.js"> </script>
        <script type="text/javascript" src="../js/jquery.js"></script>
        <script type="text/javascript" src="../js/cycle.js"></script>
        <script type="text/javascript" src="../js/javascript.js"></script>
        <script type="text/javascript" src="../js/menu2.js"></script>
        <script type="text/javascript" src="../js/restrito.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
<?php
include '../includes/funcoesUteis.inc';

switch (get_post_action('editar')) {
case 'editar';
        //Inicio
        validaAutenticacao('../index.php', '3');
        $codMateria = $_POST['codigo'];
        $sql = "SELECT * FROM ARTIGO WHERE ID_ARTIGO = $codMateria";
        $result = mysql_query($sql);
        $totalResult = mysql_fetch_array($result);
        $sql2 = "SELECT * FROM IMAGENS_MATERIA WHERE COD_MATERIA_IMAGEM = $codMateria";
        $result2 = mysql_query($sql2);
        $totalResult2 = mysql_fetch_array($result2);
                
echo '<form action="inserirMateriaNova.php" method="post" enctype="multipart/form-data" class="novaMateria" onsubmit="return validaInserir(this);">
                       
                        <figure id="imgCapaMateria">
                            <p> Selecione uma imagem de capa com dimensões 400x250 para esta área.</p>
                            <img id="preview_imageCapa" alt="" src="../uploads/'.$totalResult2['IMAGEM_CAPA'].'">
                            <input type="file" name="imagemCapa" class="imgCapaMateria"  onchange="preview(this,'."'capa'".');" multiple>
                        </figure>
                        <figure id="imgPrincipal">                            
                            <p> Selecione uma imagem com dimensões 400x250 para esta área.</p>
                            <img id="preview_image" alt="" src="../uploads/'.$totalResult2['IMAGEM_PRINCIPAL'].'">
                            <input type="file" name="imagemPrincipal" class="imgPrincipal" id="files"  onchange="preview(this,'."'principal'".');" multiple>
                        </figure>
                        <div id="tituloMateria">
                            <input type="text" name="titulo_conteudo" class="textos_materia" id="titulo_materia" value="'.$totalResult['TITULO_ARTIGO'].'">
                        </div>                       
                        <div id="fundoDescricaoMateria">
                            <div id="descricaoMateria">
                                <p class="editDescricao">
                                    <textarea name="descricao" class="descricao_materia" id="descricao_materia" >'.$totalResult['DESCRICAO_ARTIGO'].'</textarea>
                                </p>
                                <p class="editPlataforma">
                                    Plataforma
                                    <div id="plataforma">  
                                            <select name="plataforma" class="plataforma" id="ids" onchange="mostraOculta('."'ids'".', '."'multiPlataforma'".', '."'outraPlataforma'".' );">  
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
                                    <input type="text" name="data_lancamento" id="data_lancamento" class="dataLancamento" value="'.$totalResult['DATA_LANCAMENTO'].'">
                                </div>
                            </div>
                        </div>      
                        <div id="conteudoMateria">                            
                            <div id="subtituloMateria">
                                <input type="text" name="subtitulo" id="subtitulo_materia" class="subtituloMateria" value="'.$totalResult['TITULO_CONTEUDO_ARTIGO'].'">
                            </div>
                            <p> Limite de Caracteres: 1500. </p>
                            <textarea id="campoConteudo1" placeholder="Digite o texto da matéria aqui" name="conteudo" maxlength="1500">'.$totalResult['CONTEUDO_ARTIGO'].'</textarea>
                        </div>
                        <div id="galeriaImagens">
                            <figure class="imagensGaleria" >
                                <p> imagem 255x150</p>
                                <img id="preview_imageGaleria1" alt="" src="../uploads/'.$totalResult2['IMAGEM_GALERIA'].'">
                                <input type="file" name="imagemGaleria" value="../uploads/'.$totalResult2['IMAGEM_GALERIA'].'" class="imgGaleria1" onchange="preview(this,'."'galeria1'".');" multiple>
                            </figure>
                            <figure class="imagensGaleria">
                                <p> imagem 255x150</p>
                                <img id="preview_imageGaleria2" alt="" src="../uploads/'.$totalResult2['IMAGEM_GALERIA2'].'">
                                <input type="file" name="imagemGaleria2"  class="imgGaleria1" onchange="preview(this,'."'galeria2'".');" multiple>
                            </figure>
                            <figure class="imagensGaleria" >
                                <p> imagem 255x150</p>
                                <img id="preview_imageGaleria3" alt="" src="../uploads/'.$totalResult2['IMAGEM_GALERIA3'].'">
                                <input type="file" name="imagemGaleria3" value="../uploads/'.$totalResult2['IMAGEM_GALERIA'].'" class="imgGaleria1" onchange="preview(this,'."'galeria3'".');" multiple>
                            </figure>                                
                        </div>
                        <div id="galeriaVideo">
                            <div id="opcoesVideo1">
                            <input type="text" name="urlVideo1" class='."'txtUrlVideos'".' id="urlVideo1" value="'.$totalResult['URLVIDEO1'].'">
                            <input type='."'button'".' class='."'previewVideos'".' id="preverVideo1" onclick="previewVideo('."'urlVideo1'".','."'iframeVideo1'".','."'galeriaVideo1'".');" value="Prever Vídeo"> </button>
                            <input type='."'button'".' class='."'retirarVideos'".' id="retirarVideo1" onclick="retirarVideo('."'video1'".','."'galeriaVideo1'".');" value="Retirar Vídeo"> </button>
                            </div>
                            <div id="opcoesVideo2">
                            <input type="text" name="urlVideo2" id="urlVideo2" class='."'txtUrlVideos'".' value="'.$totalResult['URLVIDEO2'].'">
                            <input type='."'button'".' class='."'previewVideos'".' id="preverVideo2" onclick="previewVideo('."'urlVideo2'".','."'iframeVideo2'".','."'galeriaVideo2'".');" value="Prever Video"> </button>
                            <input type='."'button'".' class='."'retirarVideos'".' id="retirarVideo2" onclick="retirarVideo('."'video2'".','."'galeriaVideo2'".');" value="Retirar Vídeo"> </button>
                            </div>
                            <div id="video1" style="display:none">
                                <iframe width="425" id="iframeVideo1" height="300" src="" frameborder="0" allowfullscreen></iframe>
                            </div>
                            <div id="video2" style="display:none">
                                <iframe width="425" id="iframeVideo2" height="300" src="" frameborder="0" allowfullscreen></iframe>     
                            </div>
                        </div>
                        <div id="postarMateria">
                            <input type="submit" value="Postar Matéria" name="postarMateria" class="inserirMateria">
                            <input type="button" value="Voltar Matéria" name="voltarM" onclick="voltar();" class="inserirMateria">
                        </div>
                    </form>';
        //Fim
            //Fim
            break;
    default:
       echo "Nenhuma Função Definida";
}
?>
    </body>
</html>