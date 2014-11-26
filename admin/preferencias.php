<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="shortcut icon" href="../imagens/icone001.png" >
        <link rel="stylesheet" type="text/css" href="css/style.css">
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
        </script>
        <title> Área Administrativa </title>
    </head>
    <body>
        <section id="container">
            <?php
                include_once '../conexao/conecta.inc';
                include_once '../includes/funcoesUteis.inc';
            ?>
            <header id="cabecalho">
                <?php
                include_once '../includes/menuR.php';
                validaAutenticacao('../index.php','1');
                ?>
            </header>
            <figure id="imgCapa">
                <?php
                buscarDados('imgcapa');
                ?>
            </figure>
            <article id="conteudo">
                <div id="info_user">    
                    <div id="linksAtualizarImg"> 
                        <a href="alterarImg.php"> Alterar</a><br/>
                        <a href="removerImg.php"> Remover</a>
                    </div>
                        <?php
                            $query = "SELECT * FROM IMAGEM_USUARIO WHERE COD_IMAGEM_USUARIO = ".$_SESSION['code'];
                            $result = mysql_query($query);                
                            $imagens = mysql_num_rows($result);
                            if($imagens === 0){
                            $nome = "defaultCapa.jpg";            
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
                        include '../includes/menuA.php';
                    ?>
                </nav>
                <article id="conteudo_infos">
                    <form action="script2.php" method="post" enctype="multipart/form-data">
                        <table id="tabelaPerfil" class="tablealterarCapa2">
                            <tr>
                                <th id="alterar" colspan="3">Alterar Foto de Capa</th>
                            </tr>
                            <tr>
                                <td class="icone"><img src="../imagens/contacts.png" alt="imgNome" id=""> Imagem Capa</td>
                                <td class="info">                     
                            <?php
                                $query = "SELECT * FROM IMAGEM_USUARIO WHERE COD_IMAGEM_USUARIO = ".$_SESSION['code'];
                                $result = mysql_query($query);                
                                $imagens = mysql_num_rows($result);
                                if($imagens === 0){
                                $nome = "defaultCapa.jpg";            
                                mysql_query("INSERT INTO IMAGEM_USUARIO(URL_IMAGEM_CAPA, COD_IMAGEM_USUARIO)
                                VALUES('$nome'".$_SESSION['code'].")");
                                }
                                else{
                                $imagens2 = mysql_fetch_array($result); 
                                $urlImagem = $imagens2['URL_IMAGEM_CAPA'];
                                echo "<img src='../uploads/$urlImagem' alt='Imagem' id='imagemCapa'>";
                                }
                            ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="icone"><img src="../imagens/picture.png" alt="imgNome" id=""></td>
                                <td class="info"><input type="file" name="arquivo" value="Alterar Imagem"></td>
                            </tr>
                            <tr>
                                <td class="icone"><img src="../imagens/checkmark.png" alt="imgNome" id=""></td>
                                <td class="info"><input type="submit" name="alterarImg" class="bsalvar" value="Alterar Foto"></td>
                            </tr>
                        </table>
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