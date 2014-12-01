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

switch (get_post_action('editar','excluir','editarPersonagem','excluirPersonagem')) {
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
                
echo '<form action="atualizarMateria.php" method="post" enctype="multipart/form-data" class="novaMateria" onsubmit="return validaInserir(this);">
                       <input type="hidden" name="codigo" value="'.$codMateria.'">
                        <figure id="imgCapaMateria">
                            <p> Selecione uma imagem de capa com dimensões 400x250 para esta área.</p>
                            <img id="preview_imageCapa" alt="" src="../uploads/'.$totalResult2['IMAGEM_CAPA'].'">
                            <input type="file" name="imagemCapa" value="" class="imgCapaMateria"  onchange="preview(this,'."'capa'".');" multiple>
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
                            <input type="submit" value="Atualizar Matéria" name="postarMateria" id="btnAtualizarMateria" class="AtualizarMateria">
                            <input type="button" value="Voltar" name="voltarM" onclick="javascript:history.go(-1);" class="AtualizarMateria">
                        </div>
                    </form>';
        //Fim
            //Fim
            break;
case 'editarPersonagem';
        //Inicio
    ?>
        <!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="shortcut icon" href="../imagens/icone001.png" >
        <script type="text/javascript" src="../js/funcoes.js"> </script>
        <script type="text/javascript" src="validacao.js"></script>
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
            


        </script>  
        <title> Área Administrativa </title>
    </head>
    <body >
        <section id="container" >
            <?php
                include_once '../conexao/conecta.inc';
                include_once '../includes/funcoesUteis.inc';
                validaAutenticacao('../index.php','3');
            ?>
            <header id="cabecalho">
                <?php
                
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
        <?php
        $codMateria = $_POST['codigo'];
        $sql = "SELECT * FROM PERSONAGEM WHERE ID_PERSONAGEM = $codMateria";
        $result = mysql_query($sql);
        $totalResult = mysql_fetch_array($result);
        $sql2 = "SELECT * FROM IMAGENS_PERSONAGEM WHERE COD_PERSONAGEM_IMAGEM = $codMateria";
        $result2 = mysql_query($sql2);
        $totalResult2 = mysql_fetch_array($result2);
echo '<form action="atualizarMateria.php" method="post" enctype="multipart/form-data" class="novaMateria" onsubmit="return validaInserir(this);">
                       <input type="hidden" name="codigo" value="'.$codMateria.'">
                        <figure id="imgCapaMateria">
                            <p> Selecione uma imagem de capa com dimensões 400x250 para esta área.</p>
                            <img id="preview_imageCapa" alt="" src="../uploads/'.$totalResult2['IMAGEM_CAPA'].'">
                            <input type="file" name="imagemCapa" value="" class="imgCapaMateria"  onchange="preview(this,'."'capa'".');" multiple>
                        </figure>
                        <figure id="imgPrincipal">                            
                            <p> Selecione uma imagem com dimensões 400x250 para esta área.</p>
                            <img id="preview_image" alt="" src="../uploads/'.$totalResult2['IMAGEM_PRINCIPAL'].'">
                            <input type="file" name="imagemPrincipal" class="imgPrincipal" id="files"  onchange="preview(this,'."'principal'".');" multiple>
                        </figure>
                        <div id="tituloMateria">
                            <input type="text" name="titulo_conteudo" class="textos_materia" id="titulo_materia" value="'.$totalResult['TITULO_PERSONAGEM'].'">
                        </div>                       
                        <div id="fundoDescricaoMateria">
                            <div id="descricaoMateria">
                                <p class="editDescricao">
                                    <textarea name="descricao" class="descricao_materia" id="descricao_materia" >'.$totalResult['DESCRICAO_PERSONAGEM'].'</textarea>
                                </p>
                            </div>
                        </div>      
                        <div id="conteudoMateria">                            
                            <div id="subtituloMateria">
                                <input type="text" name="subtitulo" id="subtitulo_materia" class="subtituloMateria" value="'.$totalResult['TITULO_CONTEUDO_PERSONAGEM'].'">
                            </div>
                            <p> Limite de Caracteres: 1500. </p>
                            <textarea id="campoConteudo1" placeholder="Digite o texto da matéria aqui" name="conteudo" maxlength="1500">'.$totalResult['CONTEUDO_PERSONAGEM'].'</textarea>
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
                            <input type="submit" value="Atualizar Matéria" name="postarMateria" id="btnAtualizarMateria" class="AtualizarMateria">
                            <input type="button" value="Voltar" name="voltarM" onclick="javascript:history.go(-1);" class="AtualizarMateria">
                        </div>
                    </form>';
        //Fim
        ?>
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


                    <?php
            //Fim
            break;
case 'excluir';
    //Inicio
        validaAutenticacao('../index.php', '3');
        $codMateria = $_POST['codigo'];
        $sql = "DELETE FROM COMENT WHERE CODIGO_MATERIA = $codMateria";
        mysql_query($sql);
        $sql2 = "DELETE FROM IMAGENS_MATERIA WHERE COD_MATERIA_IMAGEM = $codMateria";
        mysql_query($sql2);
        $sql3 = "DELETE FROM ARTIGO WHERE ID_ARTIGO = $codMateria";
        $result = mysql_query($sql3);
        if($result){
            echo "Matéria Deletada";
                    function salvaLog($mensagem) {
            date_default_timezone_set("Brazil/East");
        $ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante
        $hora = date('H:i:s'); // Salva a hora atual (formato MySQL)
        $dia = date('Y-m-d');
        $sql = "INSERT INTO LOG(IP_LOG, DATA_LOG, HORA_LOG, MENSAGEM_LOG, ACAO_LOG,AUTOR_LOG,COD_AUTOR_LOG)
        VALUES('$ip','$dia', '$hora', '$mensagem', 13,'".$_SESSION['email']."',".$_SESSION['code'].")";
        mysql_query($sql);
        }
            $mensagem = "$apelido Excluiu Matéria";
            salvaLog($mensagem);
        }
        else{
            echo "erro ao deletar Matéria";
        }
    //Fim   
        break;
case 'excluirPersonagem';
    //Inicio
        validaAutenticacao('../index.php', '3');
        $codMateria = $_POST['codigo'];
        $sql = "DELETE FROM COMENT WHERE COD_PERSONAGEM = $codMateria";
        mysql_query($sql);
        $sql2 = "DELETE FROM IMAGENS_PERSONAGEM WHERE COD_PERSONAGEM_IMAGEM = $codMateria";
        mysql_query($sql2);
        $sql3 = "DELETE FROM PERSONAGEM WHERE ID_PERSONAGEM = $codMateria";
        $result = mysql_query($sql3);
        if($result){
            echo "Personagem Deletado";
                              function salvaLog($mensagem) {
            date_default_timezone_set("Brazil/East");
        $ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante
        $hora = date('H:i:s'); // Salva a hora atual (formato MySQL)
        $dia = date('Y-m-d');
        $sql = "INSERT INTO LOG(IP_LOG, DATA_LOG, HORA_LOG, MENSAGEM_LOG, ACAO_LOG,AUTOR_LOG,COD_AUTOR_LOG)
        VALUES('$ip','$dia', '$hora', '$mensagem', 15,'".$_SESSION['email']."',".$_SESSION['code'].")";
        mysql_query($sql);
        }
            $mensagem = "$apelido Excluiu Personagem";
            salvaLog($mensagem);
        }
        else{
            echo "erro ao deletar Matéria";
        }
    //Fim   
        break;
    default:
       echo "Nenhuma Função Definida";
}
?>
    </body>
</html>
