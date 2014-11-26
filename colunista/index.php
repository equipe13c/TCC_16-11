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
        <title> Multiplayer </title>
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
                            <a onclick="mostrarLinks();"  href="#" id="camera"></a>
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
                    <form action="update.php" method="post">
                        <table id="tabelaPerfil" class="bordasimples">
                            <tr class="linhasInfo">
                                <td class="icone"><img src="../imagens/mail.png" alt="imgMail" id="mailImg"></td>
                                <td class="info">Endereço de e-mail</td>
                                <td class="campos"><input type="text" class="txtInfo" disabled="disabled" id="emailInfo"   value="<?php echo $_SESSION['email']; ?>"></td>
                                <td class="edit"><img src="../imagens/edit.png" alt="editImage" class="editImage"><a onclick="edit('email', '<?php echo $_SESSION['email']; ?>')" href="#">Editar</a></td>                            
                            </tr>
                            <tr class="linhasInfo">
                                <td class="icone"><img src="../imagens/lock.png" alt="imgCidade" id="senhaImg"></td>
                                <td class="info">Senha</td>
                                <td class="campos"><input type="password" class="txtInfo" disabled="disabled" id="senhaInfo" name="senhaUser" value="default"></td>
                                <td class="edit" id="salvarSenha"><img src="../imagens/edit.png" alt="editImage" class="editImage"><a href="alterarSenha.php">Editar</a></td>                            
                            </tr>
                            <tr class="linhasInfo">
                                <td class="icone"><img src="../imagens/nome.png" alt="imgNome" id="nomeImg"></td>
                                <td class="info">Nome completo</td>
                                <td class="campos"><input type="text" class="txtInfo" disabled="disabled"  id="nomeInfo" name="nomeUser"  value="<?php  buscarDados('nome'); ?>"></td>
                                <td class="edit" id="salvarName"><img src="../imagens/edit.png" alt="editImage" class="editImage"><a onclick="edit('nome')" href="#">Editar</a></td>                            
                            </tr>
                            <tr class="linhasInfo">
                                <td class="icone"><img src="../imagens/nome.png" alt="imgNome" id="nomeImg"></td>
                                <td class="info">Apelido</td>
                                <td class="campos"><input type="text" class="txtInfo" disabled="disabled"  id="apelidoInfo" name="apelidoUser" value="<?php buscarDados('apelido'); ?>"></td>
                                <td class="edit" id="salvarApel"><img src="../imagens/edit.png" alt="editImage" class="editImage"><a onclick="edit('apelido')" href="#">Editar</a></td>                            
                            </tr>
                            <tr class="linhasInfo">
                                <td class="icone"><img src="../imagens/data.png" alt="imgData" id="dataImg"></td>
                                <td class="info">Data de nascimento</td>
                                <td class="campos"><input type="text" class="txtInfo" disabled="disabled"  id="dataInfo"  value="<?php buscarDados('data'); ?>"></td>
                                <td class="edit"></td>                            
                            </tr>
                            <tr class="linhasInfo">
                                <td class="icone"><img src="../imagens/cidade.png" alt="imgCidade" id="cidadeImg"></td>
                                <td class="info">Estado</td>
                                <td class="campos"><input type="text" class="txtInfo" disabled="disabled" id="cidadeInfo" name="estadoUser" value="<?php buscarDados('estado'); ?>"></td>
                                <td class="edit" id="salvarCid"><img src="../imagens/edit.png" alt="editImage" class="editImage"><a onclick="edit('cidade')" href="#">Editar</a></td>                            
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