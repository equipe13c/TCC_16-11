<?php
session_start();
include "../conexao/conecta.inc";
include '../includes/funcoesUteis.inc';
function geraSaltAleatorio($tamanho = 6) {
return substr(md5(mt_rand()), 0, $tamanho); 
}
echo "<meta charset=UTF-8>";
$tituloArtigo = $_POST['titulo_conteudo'];
$categoria = $_POST['categoria'];

$data = date('Y-m-d');
$hora = date('H:i:s');
$autor = $_SESSION['code'];
$urlArtigo = $_POST['url_materia'];
$descricaoArtigo = $_POST['descricao'];
$dataLancamento = $_POST['data_lancamento'];
$plataforma = $_POST['plataforma'];
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
                                                                        
                                                                        for( $i=0; $i<sizeof( $categoria ); $i++ ){
                                                                           $categoriaArtigo = $categoria[$i];
                                                                           if($categoriaArtigo == ""){
  
                                                                            echo "<script> javascript:history.go(-1)</script>";

                                                                           }
                                                                           if($categoriaArtigo == "1"){
                                                                               $sql = "INSERT INTO ARTIGO(TITULO_ARTIGO, CATEGORIA_ARTIGO,DATA_ARTIGO, HORA_ARTIGO, AUTOR_ARTIGO, URL_ARTIGO, DESCRICAO_ARTIGO, DATA_LANCAMENTO, CONTEUDO_ARTIGO, TITULO_CONTEUDO_ARTIGO, PLATAFORMA_ARTIGO, URLVIDEO1, URLVIDEO2)
                                                                                VALUES('$tituloArtigo',1,'$data','$hora',$autor,'playstation/$urlArtigo.php','$descricaoArtigo','$dataLancamento', '$conteudoArtigo', '$subtitulo','$plataforma', '$urlVideo', '$urlVideo2')";
                                                                               if(mysql_query($sql)){
                                                                                   echo "Nova Matéria Inserida";
                                                                                   $busca = "SELECT * FROM ARTIGO WHERE TITULO_ARTIGO = '$tituloArtigo' AND URL_ARTIGO = 'playstation/$urlArtigo.php'"; 
                                                                                   $result = mysql_query($busca);
                                                                                   $resultBusca = mysql_fetch_array($result);
                                                                                   $sql = "INSERT INTO IMAGENS_MATERIA(COD_MATERIA_IMAGEM, IMAGEM_CAPA, IMAGEM_PRINCIPAL, IMAGEM_GALERIA, IMAGEM_GALERIA2, IMAGEM_GALERIA3)
                                                                                       VALUES(".$resultBusca['ID_ARTIGO'].", '$imgCapaname', '$imagemPrincipalname', '$imagemGalerianame', '$imagemGaleria2name', '$imagemGaleria3')";
                                                                                   if(mysql_query($sql)){
                                                                                        $codigo_materia = $resultBusca['ID_ARTIGO'];
                                                                                        $urlArtigoP = $resultBusca['URL_ARTIGO'];
                                                                                        $codAutor = $resultBusca['AUTOR_ARTIGO'];
                                                                                                $backMenu1 = "#9C1006";
                                                                                                $backMenu2 = "#9C1006";
                                                                                                $backPrincipal = "#9C1006";
                                                                                                $fundoTitulo = "#9C1006";
                                                                                                $fundoDesc = "#FCC6C0";
                                                                                                $descricaoCol = "#9C1006";
                                                                                                $fundoLogar = "#9C1006";
                                                                                                $logo = "002.png";
                                                                                                $ano = substr($data, 0, 4);
                                                                                                $mes = substr($data, 5, 2);
                                                                                                $dia = substr($data, 8, 2);
                                                                                            $corpo = '<!DOCTYPE html>
                                                                                                
<html>                                                                                  
    <head> 
        <title>'.$tituloArtigo.'</title>
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
                imgMiniLogo.innerHTML = "'."<img src='../imagens/logosReduzidos".$logo."' alt='' id='miniLogo'>".'";
                imgLogo.innerHTML = "'."<img src='../imagens/logo".$logo."' alt='' id='logo'>".'";  
                document.getElementById("nav").style.backgroundColor = "'.$backMenu1.'";                
                document.getElementById("imgPrincipal").style.backgroundColor = "'.$backPrincipal.'"; 
                document.getElementById("tituloMateria").style.backgroundColor = "'.$fundoTitulo.'";
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
                acrescentarAcessos('".$codigo_materia."');
            ?>
            ".'<header id="cabecalho">
                <?php
                   '." include_once '../includes/menuMaterias.php';
                ?>
            ".'<figure id="imgCapa">
                <?php
               '." infosImagensMateria('capa','".$codigo_materia."');
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
                      '."  infosImagensMateria('imgPrincipal','".$codigo_materia."');
                    ?>
                </figure>
               ".' <div id="tituloMateria">
                    <div id="caixaTitulo"><h1 class="editTitulo"> 
                    <?php
                     '."   infoArtigos('titulo','".$urlArtigoP."');
                    ?>
                     </h1></div>
                </div>
               ".' <div id="fundoDescricaoMateria">
                    <div id="descricaoMateria">
                        <p class="editDescricao">
                        <?php
                          '."  infoArtigos('descricao','".$urlArtigoP."');
                        ?>
                        </p>
                       ".' <p class="editPlataforma">
                        <?php
                            echo "<b>Plataforma:</b>    ";
                          '."  infoArtigos('plataforma','".$urlArtigoP."');
                        ?>
                        </p>
                      ".'  <p class="editDatalancamento">
                        <?php
                            echo "<b>Data de Lançamento:</b>    ";
                         '."   infoArtigos('dataLancamento','".$urlArtigoP."');
                        ?>
                        </p>
                    </div>
                </div>    
                ".'<div id="conteudoMateria">
                    <div class="ediConteudoMateria">
                        <div class="editTituloconteudo">
                            <p>
                                <?php
                                 '."   infoArtigos('tituloConteudo','".$urlArtigoP."');
                                ?>
                            </p>
                            ".'<div id="nome_autor">
                                <b>POR</b>
                                <?php
                                  '." infoArtigos('nomeAutor','".$urlArtigoP."');  
                                ?>
                               <b>EM</b> $dia/$mes/$ano 
                            </div>
                        </div>                        
                        <p>
                            <?php
                                infoArtigos('conteudoMateria','".$urlArtigoP."');
                            ?>
                        </p>
                        </div>
                </div>
                ".'<div id="galeriaImagens">
                    <figure class="imagensGaleria" >
                        <?php
                         '."   infosImagensMateria('imagemgaleria1','".$codigo_materia."');
                        ?>
                    </figure>
                   ".' <figure class="imagensGaleria">
                        <?php
                         '."   infosImagensMateria('imagemgaleria2','".$codigo_materia."');
                        ?>
                    </figure>
                   ".' <figure class="imagensGaleria" >
                        <?php
                          '."  infosImagensMateria('imagemgaleria3','".$codigo_materia."');
                        ?>
                    </figure>
                    ".'	<script src="../popupgaleria/vlb_engine/vlbdata1.js" type="text/javascript"></script>
                </div>
                <div id="galeriaVideo">
                    '."<?php buscarUrlVideo('".$codigo_materia."','urlVideo1');
                    buscarUrlVideo('".$codigo_materia."','urlVideo2');
                    ?>
                </div>
                ".'<div id="colunista">     
                    <figure id="autor_materia">
                    <?php
                       '." buscarImagemAutor('".$codAutor."');".'
                    ?>
                    </figure>
                    <div id="descricaoColunista"> 
                        <div id="infoAutor">
                            '." <?php"
        . "buscarDescAutor('".$codAutor."');"
        . "?>".'
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
                       '." <form name='frmComentar' method='post' action='../comentar.php' id='enviar'>
                        ".'<input type="text" id="textocomentario" name="comentario">                    
                        <input type="hidden" name="codigoArtigo" value="'.$codigo_materia.'" > 
                        <input type="submit" name="btnComentar" value="Publicar" class="botaoEnviar" > 
                        </form>
                    </div>   
                    </div>
                    '."<div class='exibirComent'>
                        <?php
                            listarComentarios('".$codigo_materia."');
                        ?>
                    </div>
                </div>
            </article>
           ".' <aside id="aside1">
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
                                                                                   }
                                                                                   else{
                                                                                       echo mysql_error();
                                                                                      echo "nao foi possivel inserir urls imagem";
                                                                                   }
                                                                               }
                                                                               else{
                                                                                   echo mysql_error();
                                                                                   echo "Erro Ao Inserir Matéria";
                                                                               }
                                                                            }
                                                                           if($categoriaArtigo == "2"){
                                                                               $sql = "INSERT INTO ARTIGO(TITULO_ARTIGO, CATEGORIA_ARTIGO,DATA_ARTIGO, HORA_ARTIGO, AUTOR_ARTIGO, URL_ARTIGO, DESCRICAO_ARTIGO, DATA_LANCAMENTO, CONTEUDO_ARTIGO, TITULO_CONTEUDO_ARTIGO, PLATAFORMA_ARTIGO, URLVIDEO1, URLVIDEO2)
                                                                                VALUES('$tituloArtigo',2,'$data','$hora',$autor,'nintendo/$urlArtigo.php','$descricaoArtigo','$dataLancamento', '$conteudoArtigo', '$subtitulo','$plataforma', '$urlVideo', '$urlVideo2')";
                                                                               if(mysql_query($sql)){
                                                                                   echo "Nova Matéria Inserida";
                                                                                   $busca = "SELECT * FROM ARTIGO WHERE TITULO_ARTIGO = '$tituloArtigo' AND URL_ARTIGO = 'nintendo/$urlArtigo.php'"; 
                                                                                   $result = mysql_query($busca);
                                                                                   $resultBusca = mysql_fetch_array($result);
                                                                                   $sql = "INSERT INTO IMAGENS_MATERIA(COD_MATERIA_IMAGEM, IMAGEM_CAPA, IMAGEM_PRINCIPAL, IMAGEM_GALERIA, IMAGEM_GALERIA2, IMAGEM_GALERIA3)
                                                                                       VALUES(".$resultBusca['ID_ARTIGO'].", '$imgCapaname', '$imagemPrincipalname', '$imagemGalerianame', '$imagemGaleria2name', '$imagemGaleria3')";
                                                                                   if(mysql_query($sql)){
                                                                                        $codigo_materia = $resultBusca['ID_ARTIGO'];
                                                                                        $urlArtigoP = $resultBusca['URL_ARTIGO'];
                                                                                        $codAutor = $resultBusca['AUTOR_ARTIGO'];
                                                                                        
        $backMenu1 = "#009FE3";
        $backMenu2 = "#009FE3";
        $backPrincipal = "#009FE3";
        $fundoTitulo = "#009FE3";
        $fundoDesc = "#CEECF5";
        $descricaoCol = "#009FE3";
        $fundoLogar = "#009FE3";
        $logo = "005.png";
 $ano = substr($data, 0, 4);
                                                                                                $mes = substr($data, 5, 2);
                                                                                                $dia = substr($data, 8, 2);
                                                                                            $corpo = '<!DOCTYPE html>
                                                                                                
<html>                                                                                  
    <head> 
        <title>'.$tituloArtigo.'</title>
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
                imgMiniLogo.innerHTML = "'."<img src='../imagens/logosReduzidos".$logo."' alt='' id='miniLogo'>".'";
                imgLogo.innerHTML = "'."<img src='../imagens/logo".$logo."' alt='' id='logo'>".'";  
                document.getElementById("nav").style.backgroundColor = "'.$backMenu1.'";                
                document.getElementById("imgPrincipal").style.backgroundColor = "'.$backPrincipal.'"; 
                document.getElementById("tituloMateria").style.backgroundColor = "'.$fundoTitulo.'";
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
                acrescentarAcessos('".$codigo_materia."');
            ?>
            ".'<header id="cabecalho">
                <?php
                   '." include_once '../includes/menuMaterias.php';
                ?>
            ".'<figure id="imgCapa">
                <?php
               '." infosImagensMateria('capa','".$codigo_materia."');
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
                      '."  infosImagensMateria('imgPrincipal','".$codigo_materia."');
                    ?>
                </figure>
               ".' <div id="tituloMateria">
                    <div id="caixaTitulo"><h1 class="editTitulo"> 
                    <?php
                     '."   infoArtigos('titulo','".$urlArtigoP."');
                    ?>
                     </h1></div>
                </div>
               ".' <div id="fundoDescricaoMateria">
                    <div id="descricaoMateria">
                        <p class="editDescricao">
                        <?php
                          '."  infoArtigos('descricao','".$urlArtigoP."');
                        ?>
                        </p>
                       ".' <p class="editPlataforma">
                        <?php
                            echo "<b>Plataforma:</b>    ";
                          '."  infoArtigos('plataforma','".$urlArtigoP."');
                        ?>
                        </p>
                      ".'  <p class="editDatalancamento">
                        <?php
                            echo "<b>Data de Lançamento:</b>    ";
                         '."   infoArtigos('dataLancamento','".$urlArtigoP."');
                        ?>
                        </p>
                    </div>
                </div>    
                ".'<div id="conteudoMateria">
                    <div class="ediConteudoMateria">
                        <div class="editTituloconteudo">
                            <p>
                                <?php
                                 '."   infoArtigos('tituloConteudo','".$urlArtigoP."');
                                ?>
                            </p>
                            ".'<div id="nome_autor">
                                <b>POR</b>
                                <?php
                                  '." infoArtigos('nomeAutor','".$urlArtigoP."');  
                                ?>
                               <b>EM</b> $dia/$mes/$ano 
                            </div>
                        </div>                        
                        <p>
                            <?php
                                infoArtigos('conteudoMateria','".$urlArtigoP."');
                            ?>
                        </p>
                        </div>
                </div>
                ".'<div id="galeriaImagens">
                    <figure class="imagensGaleria" >
                        <?php
                         '."   infosImagensMateria('imagemgaleria1','".$codigo_materia."');
                        ?>
                    </figure>
                   ".' <figure class="imagensGaleria">
                        <?php
                         '."   infosImagensMateria('imagemgaleria2','".$codigo_materia."');
                        ?>
                    </figure>
                   ".' <figure class="imagensGaleria" >
                        <?php
                          '."  infosImagensMateria('imagemgaleria3','".$codigo_materia."');
                        ?>
                    </figure>
                    ".'	<script src="../popupgaleria/vlb_engine/vlbdata1.js" type="text/javascript"></script>
                </div>
                <div id="galeriaVideo">
                    '."<?php buscarUrlVideo('".$codigo_materia."','urlVideo1');
                    buscarUrlVideo('".$codigo_materia."','urlVideo2');
                    ?>
                </div>
                ".'<div id="colunista">     
                    <figure id="autor_materia">
                    <?php
                       '." buscarImagemAutor('".$codAutor."');".'
                    ?>
                    </figure>
                    <div id="descricaoColunista"> 
                        <div id="infoAutor">
                            '." <?php"
        . "buscarDescAutor('".$codAutor."');"
        . "?>".'
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
                       '." <form name='frmComentar' method='post' action='../comentar.php' id='enviar'>
                        ".'<input type="text" id="textocomentario" name="comentario">                    
                        <input type="hidden" name="codigoArtigo" value="'.$codigo_materia.'" > 
                        <input type="submit" name="btnComentar" value="Publicar" class="botaoEnviar" > 
                        </form>
                    </div>   
                    </div>
                    '."<div class='exibirComent'>
                        <?php
                            listarComentarios('".$codigo_materia."');
                        ?>
                    </div>
                </div>
            </article>
           ".' <aside id="aside1">
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
                                                                                        $url_materia =  "../" . $urlArtigoP;
                                                                                        $formatacao = $corpo;
                                                                                        $fp = fopen($url_materia , "w");
                                                                                        $fw = fwrite($fp, $formatacao);
                                                                                   }
                                                                                   else{
                                                                                       echo mysql_error();
                                                                                      echo "nao foi possivel inserir urls imagem";
                                                                                   }
                                                                               }
                                                                               else{
                                                                                   echo mysql_error();
                                                                                   echo "Erro Ao Inserir Matéria";
                                                                               }
                                                                            }
                                                                           if($categoriaArtigo == "3"){
                                                                               $sql = "INSERT INTO ARTIGO(TITULO_ARTIGO, CATEGORIA_ARTIGO,DATA_ARTIGO, HORA_ARTIGO, AUTOR_ARTIGO, URL_ARTIGO, DESCRICAO_ARTIGO, DATA_LANCAMENTO, CONTEUDO_ARTIGO, TITULO_CONTEUDO_ARTIGO, PLATAFORMA_ARTIGO, URLVIDEO1, URLVIDEO2)
                                                                                VALUES('$tituloArtigo',3, '$data','$hora',$autor,'xbox/$urlArtigo.php','$descricaoArtigo','$dataLancamento', '$conteudoArtigo', '$subtitulo','$plataforma', '$urlVideo', '$urlVideo2')";
                                                                               if(mysql_query($sql)){
                                                                                   echo "Nova Matéria Inserida";
                                                                                   $busca = "SELECT * FROM ARTIGO WHERE TITULO_ARTIGO = '$tituloArtigo' AND URL_ARTIGO = 'xbox/$urlArtigo.php'"; 
                                                                                   $result = mysql_query($busca);
                                                                                   $resultBusca = mysql_fetch_array($result);
                                                                                   $sql = "INSERT INTO IMAGENS_MATERIA(COD_MATERIA_IMAGEM, IMAGEM_CAPA, IMAGEM_PRINCIPAL, IMAGEM_GALERIA, IMAGEM_GALERIA2, IMAGEM_GALERIA3)
                                                                                       VALUES(".$resultBusca['ID_ARTIGO'].", '$imgCapaname', '$imagemPrincipalname', '$imagemGalerianame', '$imagemGaleria2name', '$imagemGaleria3')";
                                                                                   if(mysql_query($sql)){
                                                                                        $codigo_materia = $resultBusca['ID_ARTIGO'];
                                                                                        $urlArtigoP = $resultBusca['URL_ARTIGO'];
                                                                                         $codAutor = $resultBusca['AUTOR_ARTIGO'];
        $backMenu1 = "#8EA50D";
        $backMenu2 = "#8EA50D";
        $backPrincipal = "#8EA50D";
        $fundoTitulo = "#8EA50D";
        $fundoDesc = "#A9F5D0";
        $descricaoCol = "#8EA50D";
        $fundoLogar = "#8EA50D";
        $logo = "003.png";
 $ano = substr($data, 0, 4);
                                                                                                $mes = substr($data, 5, 2);
                                                                                                $dia = substr($data, 8, 2);
                                                                                            $corpo = '<!DOCTYPE html>
                                                                                                
<html>                                                                                  
    <head> 
        <title>'.$tituloArtigo.'</title>
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
                imgMiniLogo.innerHTML = "'."<img src='../imagens/logosReduzidos".$logo."' alt='' id='miniLogo'>".'";
                imgLogo.innerHTML = "'."<img src='../imagens/logo".$logo."' alt='' id='logo'>".'";  
                document.getElementById("nav").style.backgroundColor = "'.$backMenu1.'";                
                document.getElementById("imgPrincipal").style.backgroundColor = "'.$backPrincipal.'"; 
                document.getElementById("tituloMateria").style.backgroundColor = "'.$fundoTitulo.'";
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
                acrescentarAcessos('".$codigo_materia."');
            ?>
            ".'<header id="cabecalho">
                <?php
                   '." include_once '../includes/menuMaterias.php';
                ?>
            ".'<figure id="imgCapa">
                <?php
               '." infosImagensMateria('capa','".$codigo_materia."');
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
                      '."  infosImagensMateria('imgPrincipal','".$codigo_materia."');
                    ?>
                </figure>
               ".' <div id="tituloMateria">
                    <div id="caixaTitulo"><h1 class="editTitulo"> 
                    <?php
                     '."   infoArtigos('titulo','".$urlArtigoP."');
                    ?>
                     </h1></div>
                </div>
               ".' <div id="fundoDescricaoMateria">
                    <div id="descricaoMateria">
                        <p class="editDescricao">
                        <?php
                          '."  infoArtigos('descricao','".$urlArtigoP."');
                        ?>
                        </p>
                       ".' <p class="editPlataforma">
                        <?php
                            echo "<b>Plataforma:</b>    ";
                          '."  infoArtigos('plataforma','".$urlArtigoP."');
                        ?>
                        </p>
                      ".'  <p class="editDatalancamento">
                        <?php
                            echo "<b>Data de Lançamento:</b>    ";
                         '."   infoArtigos('dataLancamento','".$urlArtigoP."');
                        ?>
                        </p>
                    </div>
                </div>    
                ".'<div id="conteudoMateria">
                    <div class="ediConteudoMateria">
                        <div class="editTituloconteudo">
                            <p>
                                <?php
                                 '."   infoArtigos('tituloConteudo','".$urlArtigoP."');
                                ?>
                            </p>
                            ".'<div id="nome_autor">
                                <b>POR</b>
                                <?php
                                  '." infoArtigos('nomeAutor','".$urlArtigoP."');  
                                ?>
                               <b>EM</b> $dia/$mes/$ano 
                            </div>
                        </div>                        
                        <p>
                            <?php
                                infoArtigos('conteudoMateria','".$urlArtigoP."');
                            ?>
                        </p>
                        </div>
                </div>
                ".'<div id="galeriaImagens">
                    <figure class="imagensGaleria" >
                        <?php
                         '."   infosImagensMateria('imagemgaleria1','".$codigo_materia."');
                        ?>
                    </figure>
                   ".' <figure class="imagensGaleria">
                        <?php
                         '."   infosImagensMateria('imagemgaleria2','".$codigo_materia."');
                        ?>
                    </figure>
                   ".' <figure class="imagensGaleria" >
                        <?php
                          '."  infosImagensMateria('imagemgaleria3','".$codigo_materia."');
                        ?>
                    </figure>
                    ".'	<script src="../popupgaleria/vlb_engine/vlbdata1.js" type="text/javascript"></script>
                </div>
                <div id="galeriaVideo">
                    '."<?php buscarUrlVideo('".$codigo_materia."','urlVideo1');
                    buscarUrlVideo('".$codigo_materia."','urlVideo2');
                    ?>
                </div>
                ".'<div id="colunista">     
                    <figure id="autor_materia">
                    <?php
                       '." buscarImagemAutor('".$codAutor."');".'
                    ?>
                    </figure>
                    <div id="descricaoColunista"> 
                        <div id="infoAutor">
                            '." <?php"
        . "buscarDescAutor('".$codAutor."');"
        . "?>".'
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
                       '." <form name='frmComentar' method='post' action='../comentar.php' id='enviar'>
                        ".'<input type="text" id="textocomentario" name="comentario">                    
                        <input type="hidden" name="codigoArtigo" value="'.$codigo_materia.'" > 
                        <input type="submit" name="btnComentar" value="Publicar" class="botaoEnviar" > 
                        </form>
                    </div>   
                    </div>
                    '."<div class='exibirComent'>
                        <?php
                            listarComentarios('".$codigo_materia."');
                        ?>
                    </div>
                </div>
            </article>
           ".' <aside id="aside1">
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
                   
                                                                                        $url_materia =  "../" . $urlArtigoP;
                                                                                        $formatacao = $corpo;
                                                                                        $fp = fopen($url_materia , "w");
                                                                                        $fw = fwrite($fp, $formatacao);
                                                                                   }
                                                                                   else{
                                                                                       echo mysql_error();
                                                                                      echo "nao foi possivel inserir urls imagem";
                                                                                   }
                                                                               }
                                                                               else{
                                                                                   echo mysql_error();
                                                                                   echo "Erro Ao Inserir Matéria";
                                                                               }
                                                                            }
                                                                           if($categoriaArtigo == "4"){
                                                                               $sql = "INSERT INTO ARTIGO(TITULO_ARTIGO, CATEGORIA_ARTIGO,DATA_ARTIGO, HORA_ARTIGO, AUTOR_ARTIGO, URL_ARTIGO, DESCRICAO_ARTIGO, DATA_LANCAMENTO, CONTEUDO_ARTIGO, TITULO_CONTEUDO_ARTIGO, PLATAFORMA_ARTIGO, URLVIDEO1, URLVIDEO2)
                                                                                VALUES('$tituloArtigo',4,'$data','$hora',$autor,'pc/$urlArtigo.php','$descricaoArtigo','$dataLancamento', '$conteudoArtigo', '$subtitulo','$plataforma', '$urlVideo', '$urlVideo2')";
                                                                               if(mysql_query($sql)){
                                                                                   echo "Nova Matéria Inserida";
                                                                                   $busca = "SELECT * FROM ARTIGO WHERE TITULO_ARTIGO = '$tituloArtigo' AND URL_ARTIGO = 'pc/$urlArtigo.php'"; 
                                                                                   $result = mysql_query($busca);
                                                                                   $resultBusca = mysql_fetch_array($result);
                                                                                   $sql = "INSERT INTO IMAGENS_MATERIA(COD_MATERIA_IMAGEM, IMAGEM_CAPA, IMAGEM_PRINCIPAL, IMAGEM_GALERIA, IMAGEM_GALERIA2, IMAGEM_GALERIA3)
                                                                                       VALUES(".$resultBusca['ID_ARTIGO'].", '$imgCapaname', '$imagemPrincipalname', '$imagemGalerianame', '$imagemGaleria2name', '$imagemGaleria3')";
                                                                                   if(mysql_query($sql)){
                                                                                        $codigo_materia = $resultBusca['ID_ARTIGO'];
                                                                                        $urlArtigoP = $resultBusca['URL_ARTIGO'];
                                                                                         $codAutor = $resultBusca['AUTOR_ARTIGO'];
        $backMenu1 = "#F39200";
        $backMenu2 = "#F39200";
        $backPrincipal = "#F39200";
        $fundoTitulo = "#F39200";
        $fundoDesc = "#F7D47F";
        $descricaoCol = "#F39200";
        $fundoLogar = "#F39200";
        $logo = "006.png";
   $ano = substr($data, 0, 4);
                                                                                                $mes = substr($data, 5, 2);
                                                                                                $dia = substr($data, 8, 2);
                                                                                            $corpo = '<!DOCTYPE html>
                                                                                                
<html>                                                                                  
    <head> 
        <title>'.$tituloArtigo.'</title>
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
                imgMiniLogo.innerHTML = "'."<img src='../imagens/logosReduzidos".$logo."' alt='' id='miniLogo'>".'";
                imgLogo.innerHTML = "'."<img src='../imagens/logo".$logo."' alt='' id='logo'>".'";  
                document.getElementById("nav").style.backgroundColor = "'.$backMenu1.'";                
                document.getElementById("imgPrincipal").style.backgroundColor = "'.$backPrincipal.'"; 
                document.getElementById("tituloMateria").style.backgroundColor = "'.$fundoTitulo.'";
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
                acrescentarAcessos('".$codigo_materia."');
            ?>
            ".'<header id="cabecalho">
                <?php
                   '." include_once '../includes/menuMaterias.php';
                ?>
            ".'<figure id="imgCapa">
                <?php
               '." infosImagensMateria('capa','".$codigo_materia."');
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
                      '."  infosImagensMateria('imgPrincipal','".$codigo_materia."');
                    ?>
                </figure>
               ".' <div id="tituloMateria">
                    <div id="caixaTitulo"><h1 class="editTitulo"> 
                    <?php
                     '."   infoArtigos('titulo','".$urlArtigoP."');
                    ?>
                     </h1></div>
                </div>
               ".' <div id="fundoDescricaoMateria">
                    <div id="descricaoMateria">
                        <p class="editDescricao">
                        <?php
                          '."  infoArtigos('descricao','".$urlArtigoP."');
                        ?>
                        </p>
                       ".' <p class="editPlataforma">
                        <?php
                            echo "<b>Plataforma:</b>    ";
                          '."  infoArtigos('plataforma','".$urlArtigoP."');
                        ?>
                        </p>
                      ".'  <p class="editDatalancamento">
                        <?php
                            echo "<b>Data de Lançamento:</b>    ";
                         '."   infoArtigos('dataLancamento','".$urlArtigoP."');
                        ?>
                        </p>
                    </div>
                </div>    
                ".'<div id="conteudoMateria">
                    <div class="ediConteudoMateria">
                        <div class="editTituloconteudo">
                            <p>
                                <?php
                                 '."   infoArtigos('tituloConteudo','".$urlArtigoP."');
                                ?>
                            </p>
                            ".'<div id="nome_autor">
                                <b>POR</b>
                                <?php
                                  '." infoArtigos('nomeAutor','".$urlArtigoP."');  
                                ?>
                               <b>EM</b> $dia/$mes/$ano 
                            </div>
                        </div>                        
                        <p>
                            <?php
                                infoArtigos('conteudoMateria','".$urlArtigoP."');
                            ?>
                        </p>
                        </div>
                </div>
                ".'<div id="galeriaImagens">
                    <figure class="imagensGaleria" >
                        <?php
                         '."   infosImagensMateria('imagemgaleria1','".$codigo_materia."');
                        ?>
                    </figure>
                   ".' <figure class="imagensGaleria">
                        <?php
                         '."   infosImagensMateria('imagemgaleria2','".$codigo_materia."');
                        ?>
                    </figure>
                   ".' <figure class="imagensGaleria" >
                        <?php
                          '."  infosImagensMateria('imagemgaleria3','".$codigo_materia."');
                        ?>
                    </figure>
                    ".'	<script src="../popupgaleria/vlb_engine/vlbdata1.js" type="text/javascript"></script>
                </div>
                <div id="galeriaVideo">
                    '."<?php buscarUrlVideo('".$codigo_materia."','urlVideo1');
                    buscarUrlVideo('".$codigo_materia."','urlVideo2');
                    ?>
                </div>
                ".'<div id="colunista">     
                    <figure id="autor_materia">
                    <?php
                       '." buscarImagemAutor('".$codAutor."');".'
                    ?>
                    </figure>
                    <div id="descricaoColunista"> 
                        <div id="infoAutor">
                            '." <?php"
        . "buscarDescAutor('".$codAutor."');"
        . "?>".'
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
                       '." <form name='frmComentar' method='post' action='../comentar.php' id='enviar'>
                        ".'<input type="text" id="textocomentario" name="comentario">                    
                        <input type="hidden" name="codigoArtigo" value="'.$codigo_materia.'" > 
                        <input type="submit" name="btnComentar" value="Publicar" class="botaoEnviar" > 
                        </form>
                    </div>   
                    </div>
                    '."<div class='exibirComent'>
                        <?php
                            listarComentarios('".$codigo_materia."');
                        ?>
                    </div>
                </div>
            </article>
           ".' <aside id="aside1">
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
                                                                                   }
                                                                                   else{
                                                                                       echo mysql_error();
                                                                                      echo "nao foi possivel inserir urls imagem";
                                                                                   }
                                                                               }
                                                                               else{
                                                                                   echo mysql_error();
                                                                                   echo "Erro Ao Inserir Matéria";
                                                                               }
                                                                            }
                                                                            if($categoriaArtigo == "5"){
                                                                               $sql = "INSERT INTO ARTIGO(TITULO_ARTIGO, CATEGORIA_ARTIGO,DATA_ARTIGO, HORA_ARTIGO, AUTOR_ARTIGO, URL_ARTIGO, DESCRICAO_ARTIGO, DATA_LANCAMENTO, CONTEUDO_ARTIGO, TITULO_CONTEUDO_ARTIGO, PLATAFORMA_ARTIGO, URLVIDEO1, URLVIDEO2)
                                                                                VALUES('$tituloArtigo',5,'$data','$hora',$autor,'nostalgia/$urlArtigo.php','$descricaoArtigo','$dataLancamento', '$conteudoArtigo', '$subtitulo','$plataforma', '$urlVideo', '$urlVideo2')";
                                                                               if(mysql_query($sql)){
                                                                                   echo "Nova Matéria Inserida";
                                                                                   $busca = "SELECT * FROM ARTIGO WHERE TITULO_ARTIGO = '$tituloArtigo' AND URL_ARTIGO = 'nostalgia/$urlArtigo.php'"; 
                                                                                   $result = mysql_query($busca);
                                                                                   $resultBusca = mysql_fetch_array($result);
                                                                                   $sql = "INSERT INTO IMAGENS_MATERIA(COD_MATERIA_IMAGEM, IMAGEM_CAPA, IMAGEM_PRINCIPAL, IMAGEM_GALERIA, IMAGEM_GALERIA2, IMAGEM_GALERIA3)
                                                                                       VALUES(".$resultBusca['ID_ARTIGO'].", '$imgCapaname', '$imagemPrincipalname', '$imagemGalerianame', '$imagemGaleria2name', '$imagemGaleria3')";
                                                                                   if(mysql_query($sql)){
                                                                                        $codigo_materia = $resultBusca['ID_ARTIGO'];
                                                                                        $urlArtigoP = $resultBusca['URL_ARTIGO'];
                                                                                        $codAutor = $resultBusca['AUTOR_ARTIGO'];
                                                                                                $backMenu1 = "#9C1006";
                                                                                                $backMenu2 = "#9C1006";
                                                                                                $backPrincipal = "#9C1006";
                                                                                                $fundoTitulo = "#9C1006";
                                                                                                $fundoDesc = "#FCC6C0";
                                                                                                $descricaoCol = "#9C1006";
                                                                                                $fundoLogar = "#9C1006";
                                                                                                $logo = "002.png";
                                                                                                $ano = substr($data, 0, 4);
                                                                                                $mes = substr($data, 5, 2);
                                                                                                $dia = substr($data, 8, 2);
                                                                                            $corpo = '<!DOCTYPE html>
                                                                                                
<html>                                                                                  
    <head> 
        <title>'.$tituloArtigo.'</title>
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
                imgMiniLogo.innerHTML = "'."<img src='../imagens/logosReduzidos".$logo."' alt='' id='miniLogo'>".'";
                imgLogo.innerHTML = "'."<img src='../imagens/logo".$logo."' alt='' id='logo'>".'";  
                document.getElementById("nav").style.backgroundColor = "'.$backMenu1.'";                
                document.getElementById("imgPrincipal").style.backgroundColor = "'.$backPrincipal.'"; 
                document.getElementById("tituloMateria").style.backgroundColor = "'.$fundoTitulo.'";
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
                acrescentarAcessos('".$codigo_materia."');
            ?>
            ".'<header id="cabecalho">
                <?php
                   '." include_once '../includes/menuMaterias.php';
                ?>
            ".'<figure id="imgCapa">
                <?php
               '." infosImagensMateria('capa','".$codigo_materia."');
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
                      '."  infosImagensMateria('imgPrincipal','".$codigo_materia."');
                    ?>
                </figure>
               ".' <div id="tituloMateria">
                    <div id="caixaTitulo"><h1 class="editTitulo"> 
                    <?php
                     '."   infoArtigos('titulo','".$urlArtigoP."');
                    ?>
                     </h1></div>
                </div>
               ".' <div id="fundoDescricaoMateria">
                    <div id="descricaoMateria">
                        <p class="editDescricao">
                        <?php
                          '."  infoArtigos('descricao','".$urlArtigoP."');
                        ?>
                        </p>
                       ".' <p class="editPlataforma">
                        <?php
                            echo "<b>Plataforma:</b>    ";
                          '."  infoArtigos('plataforma','".$urlArtigoP."');
                        ?>
                        </p>
                      ".'  <p class="editDatalancamento">
                        <?php
                            echo "<b>Data de Lançamento:</b>    ";
                         '."   infoArtigos('dataLancamento','".$urlArtigoP."');
                        ?>
                        </p>
                    </div>
                </div>    
                ".'<div id="conteudoMateria">
                    <div class="ediConteudoMateria">
                        <div class="editTituloconteudo">
                            <p>
                                <?php
                                 '."   infoArtigos('tituloConteudo','".$urlArtigoP."');
                                ?>
                            </p>
                            ".'<div id="nome_autor">
                                <b>POR</b>
                                <?php
                                  '." infoArtigos('nomeAutor','".$urlArtigoP."');  
                                ?>
                               <b>EM</b> $dia/$mes/$ano 
                            </div>
                        </div>                        
                        <p>
                            <?php
                                infoArtigos('conteudoMateria','".$urlArtigoP."');
                            ?>
                        </p>
                        </div>
                </div>
                ".'<div id="galeriaImagens">
                    <figure class="imagensGaleria" >
                        <?php
                         '."   infosImagensMateria('imagemgaleria1','".$codigo_materia."');
                        ?>
                    </figure>
                   ".' <figure class="imagensGaleria">
                        <?php
                         '."   infosImagensMateria('imagemgaleria2','".$codigo_materia."');
                        ?>
                    </figure>
                   ".' <figure class="imagensGaleria" >
                        <?php
                          '."  infosImagensMateria('imagemgaleria3','".$codigo_materia."');
                        ?>
                    </figure>
                    ".'	<script src="../popupgaleria/vlb_engine/vlbdata1.js" type="text/javascript"></script>
                </div>
                <div id="galeriaVideo">
                    '."<?php buscarUrlVideo('".$codigo_materia."','urlVideo1');
                    buscarUrlVideo('".$codigo_materia."','urlVideo2');
                    ?>
                </div>
                ".'<div id="colunista">     
                    <figure id="autor_materia">
                    <?php
                       '." buscarImagemAutor('".$codAutor."');".'
                    ?>
                    </figure>
                    <div id="descricaoColunista"> 
                        <div id="infoAutor">
                            '." <?php"
        . "buscarDescAutor('".$codAutor."');"
        . "?>".'
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
                       '." <form name='frmComentar' method='post' action='../comentar.php' id='enviar'>
                        ".'<input type="text" id="textocomentario" name="comentario">                    
                        <input type="hidden" name="codigoArtigo" value="'.$codigo_materia.'" > 
                        <input type="submit" name="btnComentar" value="Publicar" class="botaoEnviar" > 
                        </form>
                    </div>   
                    </div>
                    '."<div class='exibirComent'>
                        <?php
                            listarComentarios('".$codigo_materia."');
                        ?>
                    </div>
                </div>
            </article>
           ".' <aside id="aside1">
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
                                                                                   }
                                                                                   else{
                                                                                       echo mysql_error();
                                                                                      echo "nao foi possivel inserir urls imagem";
                                                                                   }
                                                                               }
                                                                               else{
                                                                                   echo mysql_error();
                                                                                   echo "Erro Ao Inserir Matéria";
                                                                               }
                                                                            }
                                                                            if($i == 5){
                                                                                break;
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
//FIM UPLOAD IMAGEM_CAPA


