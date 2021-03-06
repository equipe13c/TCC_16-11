<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="shortcut icon" href="../imagens/icone001.png" >
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
        <title>Área Administrativa</title>
    </head>
    <body>
        <section id="container">
            <?php
                include_once '../conexao/conecta.inc';
                include_once '../includes/funcoesUteis.inc';
            ?>
            <header id="cabecalho">
                <?php                
                validaAutenticacao('../index.php','1');
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
                        include '../includes/menuA.php';
                    ?>
                </nav>
                <article id="conteudo_infos">
                    <div id="novoUsuario">
                        <form action="inserirUsuarioNovo.php" id="cadastroForm" method="post" name="formCad2"> 
                            <div id="campos">
                                <p> Nome: </p> <input type="text" name="nome" placeholder="Nome" class="campos" onKeyPress="return letras();"> 
                            </div>
                            <div id="campos">
                                <p> Apelido: </p> <input type="text" name="apelido" placeholder="Apelido" class="campos" onKeyPress="return letras();">
                            </div>
                            <div id="campos">
                                <p> E-mail: </p> <input type="text" name="email" placeholder="E-mail" class="campos">
                            </div>   
                            <div id="campos">
                                <p> Confirmar E-mail: </p> <input type="text" name="confirmemail" placeholder="Confirmar E-mail" class="campos">
                            </div>
                            <div id="campos">
                                <p> Senha: </p> <input type="password" name="senha" placeholder="Senha" class="campos">
                            </div>
                            <div id="campos">
                                <p> Confirmar Senha: </p> <input type="password" name="confirmsenha" placeholder="Confirmar Senha" class="campos">
                            </div>
                            <div id="campos">
                                <p> Data de Nascimento: </p> <input type="text" name="data" placeholder="dd/mm/aaaa" onKeyPress="MascaraData(formCad.data);" maxlength="10" onBlur="validarData(formCad.data);" class="campos">
                            </div>
                            <div id="campos">
                                <p> Tipo: </p> 
                            <div id="campos">
                                <select name="tipoUser">
                                    <option value="1" selected>Administrador</option>
                                    <option value="2" >Restrito</option>
                                    <option value="3">Colunista</option>
                                </select>
                            </div>
                            </div>
                                                        
                            <input type="submit" value="Cadastrar" name="cadastrar" class="botaoForm"/>
                            <input type="reset" value="Limpar" name="limpar" class="botaoForm"/>
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
