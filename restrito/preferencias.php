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
        <title> Área Restrita </title>
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
                validaAutenticacao('../index.php','2');
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
                        include '../includes/menuR2.php';
                    ?>
                </nav>
                <article id="conteudo_infos">
                    <form action="script2.php" method="post" enctype="multipart/form-data">
                        <table id="tabelaPerfil" class="bordasimples">
                            <tr class="linhasInfo">
                                <td class="info">Imagem de Capa</td>
                                <td class="campos"><?php
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
                                ?></td>
                                <td class="edit">
                                    <input type="file" name="arquivo" value="Alterar Imagem" class="inputPreferencias"> <br/>
                                    <input type="submit" name="alterarImg" class="inputPreferencias" value="Alterar Foto">    
                                </td>                            
                            </tr>
                            <tr class="linhasInfo">
                                <td class="info">Jogos Preferidos</td>
                                <td class="campos"><input type="text" class="txtInfo" disabled="disabled"  id="nomeInfo" name="nomeUser"  value="<?php  buscarDados('nome'); ?>"></td>
                                <td class="edit" id="salvarName"><img src="../imagens/edit.png" alt="editImage" class="editImage"><a onclick="edit('nome')" href="#">Editar</a></td>                                
                            </tr>
                            <tr class="linhasInfo">
                                <td class="info">Plataformas Preferidas</td>
                                <td class="campos"><input type="text" class="txtInfo" disabled="disabled"  id="nomeInfo" name="nomeUser"  value="<?php  buscarDados('nome'); ?>"></td>
                                <td class="edit" id="salvarName"><img src="../imagens/edit.png" alt="editImage" class="editImage"><a onclick="edit('nome')" href="#">Editar</a></td>                            
                            </tr>
                            <tr class="linhasInfo">
                                <td class="info">Apelido</td>
                                <td class="campos"><input type="text" class="txtInfo" disabled="disabled"  id="apelidoInfo" name="apelidoUser" value="<?php buscarDados('apelido'); ?>"></td>
                                <td class="edit" id="salvarApel"><img src="../imagens/edit.png" alt="editImage" class="editImage"><a onclick="edit('apelido')" href="#">Editar</a></td>                            
                            </tr>
                            <tr class="linhasInfo">
                                <td class="info">Data de nascimento</td>
                                <td class="campos"><input type="text" class="txtInfo" disabled="disabled"  id="dataInfo"  value="<?php buscarDados('data'); ?>"></td>
                                <td class="edit"></td>                            
                            </tr>
                            <tr class="linhasInfo">
                                <td class="info">Estado</td>
                                <td class="campos"><input type="text" class="txtInfo" disabled="disabled" id="cidadeInfo" name="estadoUser" value="<?php buscarDados('estado'); ?>"></td>
                                <td class="edit" id="salvarCid"><img src="../imagens/edit.png" alt="editImage" class="editImage"><a onclick="edit('estado')" href="#">Editar</a></td>                            
                            </tr>
                        </table>
                        <div id="">                                      
                            <div class="alterar">                     
                                
                            </div>                                                         
                            <div class="infoInputs">
                                                     
                            </div>                                
                            <div class="infoInputs">
                                                            
                            </div>
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