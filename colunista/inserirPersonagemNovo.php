<?php
session_start();
include "../conexao/conecta.inc";
include '../includes/funcoesUteis.inc';
function geraSaltAleatorio($tamanho = 6) {
return substr(md5(mt_rand()), 0, $tamanho); 
}
echo "<meta charset=UTF-8>";
$tituloArtigo = $_POST['titulo_conteudo'];
$nome_personagem = $_POST['nome_personagem'];
$data = date('Y-m-d');
$hora = date('H:i:s');
$autor = $_SESSION['code'];
$urlArtigo = $_POST['url_materia'];
$descricaoArtigo = $_POST['descricao'];
$conteudoArtigo = $_POST['conteudo'];
$urlVideo = $_POST['urlVideo1'];
$urlVideo = str_replace('watch?v=','embed/',$urlVideo);
$urlVideo2 = $_POST['urlVideo2'];
$urlVideo2 = str_replace('watch?v=','embed/',$urlVideo2);
$subtitulo = $_POST['subtitulo'];
// INICIO UPLOAD IMAGEM_CAPA
$_UP['pasta'] = "../uploads/";
$_UP['tamanho'] = 1024 * 1024 * 4; //2MB;
$_UP['extensao'] = array('jpg','png','gif');
$_UP['renomeia'] = true;
$_UP['erros'][0] = "Não Houve Erros";
$_UP['erros'][1] = "O Arquivo é Maior do que o límite do php";
$_UP['erros'][2] = "Tamanho da imagem ultrapassou o límite exigido";
$_UP['erros'][3] = "Upload feito parcialmente";
$_UP['erros'][4] = "Nao teve upload";
if($_FILES['imagemOut']['error'] != 0){
    die("Não foi Possível alterar a imagem Devido a: <br/>". $_UP['erros'][$_FILES['imagemOut']['erros']]);
    exit;
}
$img_nome = $_FILES['imagemOut']['name'];
$img_separador = explode('.',$img_nome);
$extensao = strtolower(end($img_separador));
if(array($extensao, $_UP['extensao'])=== false){
    echo "Por Favor Escolha apenas imagens JPG, PNG e GIF";
}
                
else if($_UP['tamanho'] < $_FILES['imagemOut']['size']){
    echo "Arquivo muito grande, Envie um arquivo1 de até 2MB";
}
else{
    if($_UP['renomeia'] == true){
$salt = geraSaltAleatorio();
        $imgOutname = $salt.'.jpg';
    }
    else{
        $imgOutname = $_FILES['imagemOut']['name'];
    }
    if(move_uploaded_file($_FILES['imagemOut']['tmp_name'], $_UP['pasta'] . $imgOutname)){

        // INICIO UPLOAD IMAGEM_out
if($_FILES['imagemHover']['error'] != 0){
    die("Não foi Possível alterar a imagem Devido a: <br/>". $_UP['erros'][$_FILES['imagemHover']['erros']]);
    exit;
}
$img_nome = $_FILES['imagemHover']['name'];
$img_separador = explode('.',$img_nome);
$extensao = strtolower(end($img_separador));
if(array($extensao, $_UP['extensao'])=== false){
    echo "Por Favor Escolha apenas imagens JPG, PNG e GIF";
}
                
else if($_UP['tamanho'] < $_FILES['imagemHover']['size']){
    echo "Arquivo muito grande, Envie um arquivo1 de até 2MB";
}
else{
    if($_UP['renomeia'] == true){
$salt = geraSaltAleatorio();
        $imgHovername = $salt.'.jpg';
    }
    else{
        $imgHovername = $_FILES['imagemHover']['name'];
    }
    if(move_uploaded_file($_FILES['imagemHover']['tmp_name'], $_UP['pasta'] . $imgHovername)){
        // INICIO UPLOAD IMAGEM_OUT
if($_FILES['imagemCapa']['error'] != 0){
    die("Não foi Possível alterar a imagem Devido a: <br/>". $_UP['erros'][$_FILES['imagemCapa']['erros']]);
    exit;
}
$img_nome = $_FILES['imagemCapa']['name'];
$img_separador = explode('.',$img_nome);
$extensao = strtolower(end($img_separador));
if(array($extensao, $_UP['extensao'])=== false){
    echo "Por Favor Escolha apenas imagens JPG, PNG e GIF";
}
                
else if($_UP['tamanho'] < $_FILES['imagemCapa']['size']){
    echo "Arquivo muito grande, Envie um arquivo1 de até 2MB";
}
else{
    if($_UP['renomeia'] == true){
$salt = geraSaltAleatorio();
        $imgCapaname = $salt.'.jpg';
    }
    else{
        $imgCapaname = $_FILES['imagemCapa']['name'];
    }
    if(move_uploaded_file($_FILES['imagemCapa']['tmp_name'], $_UP['pasta'] . $imgCapaname)){
            
                    // INICIO UPLOAD IMAGEM_PRINCIPAL
                        $_UP['pasta'] = "../uploads/";
                        $_UP['tamanho'] = 1024 * 1024 * 4; //2MB;
                        $_UP['extensao'] = array('jpg','png','gif');
                        $_UP['renomeia'] = true;
                        $_UP['erros'][0] = "Não Houve Erros";
                        $_UP['erros'][1] = "O Arquivo é Maior do que o límite do php";
                        $_UP['erros'][2] = "Tamanho da imagem ultrapassou o límite exigido";
                        $_UP['erros'][3] = "Upload feito parcialmente";
                        $_UP['erros'][4] = "Nao teve upload";
                        if($_FILES['imagemPrincipal']['error'] != 0){
                            die("Não foi Possível alterar a imagem Devido a: <br/>". $_UP['erros'][$_FILES['imagemPrincipal']['erros']]);
                            exit;
                        }
                        $img_nome = $_FILES['imagemPrincipal']['name'];
                        $img_separador = explode('.',$img_nome);
                        $extensao = strtolower(end($img_separador));
                        if(array($extensao, $_UP['extensao'])=== false){
                            echo "Por Favor Escolha apenas imagens JPG, PNG e GIF";
                        }
                        else if($_UP['tamanho'] < $_FILES['imagemPrincipal']['size']){
                            echo "Arquivo muito grande, Envie um arquivo1 de até 2MB";
                        }
                        else{
                            if($_UP['renomeia'] == true){
                        $salt = geraSaltAleatorio();
                                $imagemPrincipalname = $salt.'.jpg';
                            }
                            else{
                                $imagemPrincipalname = $_FILES['imagemPrincipal']['name'];
                            }
                            if(move_uploaded_file($_FILES['imagemPrincipal']['tmp_name'], $_UP['pasta'] . $imagemPrincipalname)){
                                // INICIO UPLOAD IMAGEM_GALERIA 
                                    $_UP['pasta'] = "../uploads/";
                                    $_UP['tamanho'] = 1024 * 1024 * 4; //2MB;
                                    $_UP['extensao'] = array('jpg','png','gif');
                                    $_UP['renomeia'] = true;
                                    $_UP['erros'][0] = "Não Houve Erros";
                                    $_UP['erros'][1] = "O Arquivo é Maior do que o límite do php";
                                    $_UP['erros'][2] = "Tamanho da imagem ultrapassou o límite exigido";
                                    $_UP['erros'][3] = "Upload feito parcialmente";
                                    $_UP['erros'][4] = "Nao teve upload";
                                    if($_FILES['imagemGaleria']['error'] != 0){
                                        die("Não foi Possível alterar a imagem Devido a: <br/>". $_UP['erros'][$_FILES['imagemGaleria']['erros']]);
                                        exit;
                                    }
                                    $img_nome = $_FILES['imagemGaleria']['name'];
                                    $img_separador = explode('.',$img_nome);
                                    $extensao = strtolower(end($img_separador));
                                    if(array($extensao, $_UP['extensao'])=== false){
                                        echo "Por Favor Escolha apenas imagens JPG, PNG e GIF";
                                    }
                                    else if($_UP['tamanho'] < $_FILES['imagemGaleria']['size']){
                                        echo "Arquivo muito grande, Envie um arquivo1 de até 2MB";
                                    }
                                    else{
                                        if($_UP['renomeia'] == true){
                                    $salt = geraSaltAleatorio();
                                            $imagemGalerianame = $salt.'.jpg';
                                        }
                                        else{
                                            $imagemGalerianame = $_FILES['imagemGaleria']['name'];
                                        }
                                        if(move_uploaded_file($_FILES['imagemGaleria']['tmp_name'], $_UP['pasta'] . $imagemGalerianame)){
                                            // INICIO UPLOAD IMAGEM2_GALERIA
                                                $_UP['pasta'] = "../uploads/";
                                                $_UP['tamanho'] = 1024 * 1024 * 4; //2MB;
                                                $_UP['extensao'] = array('jpg','png','gif');
                                                $_UP['renomeia'] = true;
                                                $_UP['erros'][0] = "Não Houve Erros";
                                                $_UP['erros'][1] = "O Arquivo é Maior do que o límite do php";
                                                $_UP['erros'][2] = "Tamanho da imagem ultrapassou o límite exigido";
                                                $_UP['erros'][3] = "Upload feito parcialmente";
                                                $_UP['erros'][4] = "Nao teve upload";
                                                if($_FILES['imagemGaleria2']['error'] != 0){
                                                    die("Não foi Possível alterar a imagem Devido a: <br/>". $_UP['erros'][$_FILES['imagemGaleria2']['erros']]);
                                                    exit;
                                                }
                                                $img_nome = $_FILES['imagemGaleria2']['name'];
                                                $img_separador = explode('.',$img_nome);
                                                $extensao = strtolower(end($img_separador));
                                                if(array($extensao, $_UP['extensao'])=== false){
                                                    echo "Por Favor Escolha apenas imagens JPG, PNG e GIF";
                                                }
                                                else if($_UP['tamanho'] < $_FILES['imagemGaleria2']['size']){
                                                    echo "Arquivo muito grande, Envie um arquivo1 de até 2MB";
                                                }
                                                else{
                                                    if($_UP['renomeia'] == true){
                                                $salt = geraSaltAleatorio();
                                                        $imagemGaleria2name = $salt.'.jpg';
                                                    }
                                                    else{
                                                        $imagemGaleria2name = $_FILES['imagemGaleria2']['name'];
                                                    }
                                                    if(move_uploaded_file($_FILES['imagemGaleria2']['tmp_name'], $_UP['pasta'] . $imagemGaleria2name)){
                                                        // INICIO UPLOAD IMAGEM3_GALERIA
                                                            $_UP['pasta'] = "../uploads/";
                                                            $_UP['tamanho'] = 1024 * 1024 * 4; //2MB;
                                                            $_UP['extensao'] = array('jpg','png','gif');
                                                            $_UP['renomeia'] = true;
                                                            $_UP['erros'][0] = "Não Houve Erros";
                                                            $_UP['erros'][1] = "O Arquivo é Maior do que o límite do php";
                                                            $_UP['erros'][2] = "Tamanho da imagem ultrapassou o límite exigido";
                                                            $_UP['erros'][3] = "Upload feito parcialmente";
                                                            $_UP['erros'][4] = "Nao teve upload";
                                                            if($_FILES['imagemGaleria3']['error'] != 0){
                                                                die("Não foi Possível alterar a imagem Devido a: <br/>". $_UP['erros'][$_FILES['imagemGaleria3']['erros']]);
                                                                exit;
                                                            }
                                                            $img_nome = $_FILES['imagemGaleria3']['name'];
                                                            $img_separador = explode('.',$img_nome);
                                                            $extensao = strtolower(end($img_separador));
                                                            if(array($extensao, $_UP['extensao'])=== false){
                                                                echo "Por Favor Escolha apenas imagens JPG, PNG e GIF";
                                                            }
                                                            else if($_UP['tamanho'] < $_FILES['imagemGaleria3']['size']){
                                                                echo "Arquivo muito grande, Envie um arquivo1 de até 2MB";
                                                            }
                                                            else{
                                                                if($_UP['renomeia'] == true){
                                                            $salt = geraSaltAleatorio();
                                                                    $imagemGaleria3 = $salt.'.jpg';
                                                                }
                                                                else{
                                                                    $imagemGaleria3 = $_FILES['imagemGaleria3']['name'];
                                                                }
                                                                if(move_uploaded_file($_FILES['imagemGaleria3']['tmp_name'], $_UP['pasta'] . $imagemGaleria3)){
                                                                    // INICIO UPLOAD IMAGEM3_GALERIA
                                                                        
                                                                               $sql = "INSERT INTO PERSONAGEM(NOME_PERSONAGEM,TITULO_PERSONAGEM,DATA_PERSONAGEM, HORA_PERSONAGEM, AUTOR_PERSONAGEM, URL_PERSONAGEM, DESCRICAO_PERSONAGEM, CONTEUDO_PERSONAGEM, TITULO_CONTEUDO_PERSONAGEM, URLVIDEO1, URLVIDEO2)
                                                                                VALUES('$nome_personagem','$tituloArtigo','$data','$hora',$autor,'personagens/$urlArtigo.php','$descricaoArtigo', '$conteudoArtigo', '$subtitulo', '$urlVideo', '$urlVideo2')";
                                                                               if(mysql_query($sql)){
                                                                                   
                                                                                   $busca = "SELECT * FROM PERSONAGEM WHERE TITULO_PERSONAGEM = '$tituloArtigo' AND URL_PERSONAGEM = 'personagens/$urlArtigo.php'"; 
                                                                                   $result = mysql_query($busca);
                                                                                   $resultBusca = mysql_fetch_array($result);
                                                                                   $sql2 = "INSERT INTO IMAGENS_PERSONAGEM(COD_PERSONAGEM_IMAGEM, IMAGEM_CAPA, IMAGEM_PRINCIPAL, IMAGEM_GALERIA, IMAGEM_GALERIA2, IMAGEM_GALERIA3,IMAGEM_OUT,IMAGEM_HOVER)
                                                                                       VALUES(".$resultBusca['ID_PERSONAGEM'].", '$imgCapaname', '$imagemPrincipalname', '$imagemGalerianame', '$imagemGaleria2name', '$imagemGaleria3','$imgOutname','$imgHovername')";
                                                                                   if(mysql_query($sql2)){
                                                                                        $codigo_materia = $resultBusca['ID_PERSONAGEM'];
                                                                                        $urlArtigoP = $resultBusca['URL_PERSONAGEM'];
                                                                                        $codAutor = $resultBusca['AUTOR_PERSONAGEM'];
                                                                                        echo "Novo Personagem Inserido";
                                                                                                $backMenu1 = "#00989E";
                                                                                                $backMenu2 = "#00989E";
                                                                                                $backPrincipal = "#00989E";
                                                                                                $fundoTitulo = "#00989E";
                                                                                                $fundoDesc = "#83FF7B";
                                                                                                $descricaoCol = "#00989E";
                                                                                                $fundoLogar = "#00989E";
                                                                                                $logo = "001.png";
                                                                                                $ano = substr($data, 0, 4);
                                                                                                $mes = substr($data, 5, 2);
                                                                                                $dia = substr($data, 8, 2);
                                                                                            $corpo = '<!DOCTYPE html>
                                                                                                
<html>                                                                                  
    <head> 
        <title>'.$tituloArtigo.'</title>
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
                imgMiniLogo.innerHTML = "'."<img src='../imagens/logosReduzidos".$logo."' alt='' id='miniLogo'>".'";
                imgLogo.innerHTML = "'."<img src='../imagens/logo".$logo."' alt='' id='logo'>".'";  
                document.getElementById("nav").style.backgroundColor = "'.$backMenu1.'";                
                document.getElementById("imgPrincipal").style.backgroundColor = "'.$backPrincipal.'"; 
                document.getElementById("tituloMateria").style.backgroundColor = "'.$backPrincipal.'";
                document.getElementById("tituloAside").style.backgroundColor = "'.$backPrincipal.'";
                document.getElementById("navReduzido").style.backgroundColor = "'.$backMenu2.'";
                document.getElementById("fundoDescricaoMateria").style.backgroundColor = "'.$fundoDesc.'";
                document.getElementById("descricaoColunista").style.backgroundColor = "'.$descricaoCol.'";  
                document.getElementById("logar").style.borderBottom = "solid 5px '.$descricaoCol.'"; 
                document.getElementById("botaoLogin").style.backgroundColor = "'.$fundoLogar.'";
                document.getElementById("tituloPagina").style.backgroundColor = "'.$fundoLogar.'";           
                var imgMiniLogo = document.getElementById("imgMiniLogo");
            };
        </script>       
        
    </head> 
<body>
        <section id="container">
            <?php
               '." include_once '../conexao/conecta.inc';
                include_once '../includes/funcoesUteis.inc';
                session_start();
            ?>
            ".'<header id="cabecalho">
                <?php
                   '." include_once '../includes/menuMaterias.php';
                ?>
            ".'<figure id="imgCapa">
                <?php
               '." infosImagensMateria2('capa','".$codigo_materia."');
                ?>                
            </figure>
               ".' <div id="logar">
                    <?php
                      '." VerificaSessao2('');".'
                    ?>                    
                </div>
            </header>
            <article id="conteudo">
                <figure id="imgPrincipal">
                    <?php
                      '."  infosImagensMateria2('imgPrincipal','".$codigo_materia."');
                    ?>
                </figure>
               ".' <div id="tituloMateria">
                    <div id="caixaTitulo"><h1 class="editTitulo"> 
                    <?php
                     '."   infoArtigos2('titulo','".$urlArtigoP."');
                    ?>
                     </h1></div>
                </div>   
                ".'<div id="conteudoMateria">
                    <div class="ediConteudoMateria">
                        <div class="editTituloconteudo">
                            <p>
                                <?php
                                 '."   infoArtigos2('tituloConteudo','".$urlArtigoP."');
                                ?>
                            </p>
                            ".'<div id="nome_autor">
                                <b>POR</b>
                                <?php
                                  '." infoArtigos2('nomeAutor','".$urlArtigoP."');  
                                ?>
                               <b>EM</b> $dia/$mes/$ano 
                            </div>
                        </div>                        
                        <p>
                            <?php
                                infoArtigos2('conteudoMateria','".$urlArtigoP."');
                            ?>
                        </p>
                        </div>
                </div>
                ".'<div id="galeriaImagens">
                    <figure class="imagensGaleria" >
                        <?php
                         '."   infosImagensMateria2('imagemgaleria1','".$codigo_materia."');
                        ?>
                    </figure>
                   ".' <figure class="imagensGaleria">
                        <?php
                         '."   infosImagensMateria2('imagemgaleria2','".$codigo_materia."');
                        ?>
                    </figure>
                   ".' <figure class="imagensGaleria" >
                        <?php
                          '."  infosImagensMateria2('imagemgaleria3','".$codigo_materia."');
                        ?>
                    </figure>
                    ".'	<script src="../popupgaleria/vlb_engine/vlbdata1.js" type="text/javascript"></script>
                </div>
                <div id="galeriaVideo">
                    '."<?php buscarUrlVideo2('".$codigo_materia."','urlVideo1');
                    buscarUrlVideo2('".$codigo_materia."','urlVideo2');
                    ?>
                </div>
                ".'<div id="colunista">     
                    <figure id="autor_materia">
                    <?php
                       '." buscarImagemAutor2('".$codAutor."');".'
                    ?>
                    </figure>
                    <div id="descricaoColunista"> 
                        <div id="infoAutor">
                            '." <?php"
        . " buscarDescAutor('".$codAutor."');"
        . "?>".'
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
                       '." <form name='frmComentar' method='post' action='../comentar2.php' id='enviar'>
                        ".'<input type="text" id="textocomentario" name="comentario">                    
                        <input type="hidden" name="codigoArtigo" value="'.$codigo_materia.'" > 
                        <input type="submit" name="btnComentar" value="Publicar" class="botaoEnviar" > 
                        </form>
                    </div>   
                    </div>
                    '."<div class='exibirComent'>
                        <?php
                            listarComentarios2('".$codigo_materia."');
                        ?>
                    </div>
                </div>
            </article>
           ".' <aside id="aside1">
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
            '."<div id='imgFooter' ondragstart='return false'> 
                <img src='../imagens/ideiaRodape.png' alt=''> 
            </div>
            ".'<footer id="footer">
                <?php
                   '." include_once '../includes/rodapeMaterias.php';
                ?>
            </footer>            
        </section>
    </body>
</html>";
                   
                                                                                        $url_materia = "../" . $urlArtigoP;
                                                                                        $formatacao = $corpo;
                                                                                        $fp = fopen($url_materia , "w");
                                                                                        $fw = fwrite($fp, $formatacao);
                                                                                   }else{
                                                                                   echo mysql_error();
                                                                                   echo "Erro Ao Inserir Matéria";
                                                                               }
                                                                               }
                                                                               
                                                                    // FIM UPLOAD IMAGEM3_GALERIA
                                                                }
                                                                else{
                                                                }
                                                            }
                                                        // FIM UPLOAD IMAGEM3_GALERIA
                                                    }
                                                    else{
                                                    }
                                                }
                                            // FIM UPLOAD IMAGEM2_GALERIA
                                        }
                                        else{
                                        }
                                    }
                                // FIM UPLOAD IMAGEM_GALERIA
                            }
                            else{
                            }
                        }
                    // FIM UPLOAD IMAGEM_PRINCIPAL
                }
                else{
                }
            }
                    
    }
    else{
        
    }
}
//FIM UPLOAD IMAGEM_CAPA
    }
    else{
        
    }
}
//FIM UPLOAD IMAGEM_CAPA
