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
    <body >
        <section id="container" >
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
                <article id="conteudo_infos"> <br/>
                    <form action="exibeUsers.php" method="get">
                    <table id="tabelaPerfil" class="bordasimple">
                            <tr class="linhasInfos">
                                <td class="icone"><img src="../imagens/data.png" alt="imgMail" id="mailImg"></td>
                                <td class="info" id="tipoUser">  Selecione o Tipo de Usuário: </td>
                                <td class="info" id="tipoUser"> 
                                <select name="tipoUser">
                                    <option selected value="1">ADM</option>
                                    <option value="2">RES</option>
                                    <option value="3">COL</option>
                                </select><br/>
                                <td class="editList"> <input id="buttonUsers" type="submit" value="Listar">  </td>   
                            </tr> </table>                  
                   </form>
                   <form action="listarDesativados.php" method="get">
                    <table id="tabelaPerfil" class="bordasimple" style="margin-bottom: 20px;">
                            <tr class="linhasInfos">
                                <td class="icone"><img src="../imagens/data.png" alt="imgMail" id="mailImg"></td>
                                <td class="info" id="tipoUser">  Selecione o Tipo de Usuário: </td>
                                <td class="info" id="tipoUser">    
                                    
                
                
                <select name="tipoUser">
                    <option value="4">Desativados</option>
                </select><br/>
                   <td class="editList"> <input id="buttonUsers" type="submit" value="Listar">  </td>
                
                                                 

                            </tr> </table>
                  
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