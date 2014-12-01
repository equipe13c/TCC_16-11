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
            function edit(valor, id1, id2, id3){
                if(valor === "preferencias"){
                    document.getElementById(id1).disabled = false;
                    document.getElementById(id1).style.backgroundColor = "#FFF";
                    document.getElementById(id1).style.color = "#000";
                    document.getElementById(id1).focus();
                    document.getElementById(id2).disabled = false;
                    document.getElementById(id2).style.backgroundColor = "#FFF";
                    document.getElementById(id2).style.color = "#000";
                    document.getElementById(id3).disabled = false;
                    document.getElementById(id3).style.backgroundColor = "#FFF";
                    document.getElementById(id3).style.color = "#000";
                    var salvar =  document.getElementById("editPreferencias");
                    salvar.innerHTML = '<input type="submit" name="salvarPreferencias" class="bsalvar" value="Salvar">';
                }
               
            }
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
                validaAutenticacao('../index.php','3');
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
                            $nome = "defaultCapa.jpg";            
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
                    <form action="script2.php" method="post" enctype="multipart/form-data" id="teste">
                        <div id="tabelaPreferencias">
                            <div id="alterarCapa">
                                <p> Alterar Imagem de Capa </p>
                                <div class="alterar" >                     
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
                                </div>                                                         
                                <div class="infoInputs">
                                    <input type="file" name="arquivo" >                          
                                </div>                                
                                <div class="infoInputs">
                                    <input type="submit" name="alterarImg"  class="bsalvar" value="Alterar Foto">                                
                                </div>
                            </div>
                         
                       
                    </form>  
                    <form action="script3.php" method="post" enctype="multipart/form-data" >
                       <div class="areasPreferencia">                                
                                <div class="preferencias">  
                                    <p> Descrição: </p> 
                                    <textarea id="descricao" name="descricao" disabled="disabled"><?php buscarPreferencia('descricao', $_SESSION['code']);?></textarea> <br/>                               
                                </div>
                                <div class="preferencias">  
                                    <p> Jogos Preferidos: </p> 
                                    <textarea id="jogos" name="jogos" disabled="disabled"><?php buscarPreferencia('jogo', $_SESSION['code']);?></textarea> <br/>                             
                                </div>
                           
                                <div class="preferencias">  
                                    <p> Plataformas Preferidas: </p> 
                                    <textarea id="plataformas" name="plataformas" disabled="disabled"><?php buscarPreferencia('plataforma', $_SESSION['code']);?></textarea> <br/>                               
                                                                        
                                </div>
                                <div class="infoInputs" id="editPreferencias">
                                    <a onclick="edit('preferencias', 'descricao', 'jogos', 'plataformas')" href="#teste"><img src="../imagens/edit.png" alt="editImage" class="editImage"> Editar</a>                               
                                </div>
                            </div>
                        </form>
                     </div>
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