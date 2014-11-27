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
        <script type="text/javascript" src="../js/restrito.js"></script>
        <title></title>
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
                    <form action="update.php" method="post" name="formCad">
                        <table id="tabelaPerfil" class="editEmailTable">
                            <tr class="linhasInfo" id="toplinha">
                                <td class="icone2"><img src="../imagens/lock.png" alt="imgMail" class="senhaImg"></td>
                                <td class="info2">Senha Atual</td>
                                <td class="campos2"><input type="password" name="senhaAtual" value="" class="txtInfo2" id="senhaInfo" ></td>
                                <td class="valid"></td>
                            </tr>
                            <tr class="linhasInfo">
                                <td class="icone2"><img src="../imagens/lock.png" alt="imgMail" class="senhaImg"></td>
                                <td class="info2">Novo Senha</td>
                                <td class="campos2"><input type="password" name="senhaUser" class="txtInfo2" id="senhaInfo1" onblur="validaSenha();"></td>
                                <td class="valid" id="valid1"></td>
                            <tr class="linhasInfo">
                                <td class="icone2"><img src="../imagens/lock.png" alt="imgMail" class="senhaImg"></td>
                                <td class="info2">Confirmar Senha</td>
                                <td class="campos2"><input type="password" name="confirmesenhaUser" class="txtInfo2" id="senhaInfo2" onblur="validaSenha();"></td>
                                <td class="valid" id="valid2"> </td>
                            </tr>
                            <tr class="linhasInfo" id="bottomlinha">
                                <td class="salvarEdit" colspan="2"><input type="submit" value="Salvar Alterações" name="salvarSenha" class="designButton"></td>
                                    <td class="salvarEdit" colspan="2"><input type="submit" value="Retornar" name="Retornar" class="designButton"></td>
                            </tr>
                        </table>
                    </form>  
                </article>                
            </article>
            <footer id="footer">
                <?php
                    include_once '../includes/rodape.php';
                ?>
            </footer>            
        </section>
    </body>
</html>