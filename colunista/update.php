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
        <title> Área Administrativa </title>
    </head>
    <body >
        <section id="container" >
            <?php
                include_once '../conexao/conecta.inc';
                include_once '../includes/funcoesUteis.inc';
                include_once '../classes/Bcrypt.class.php';
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
                <article id="conteudo_infos" >
                    <?php
                                            
                            function salvaLog($mensagem,$acao) {
                            $ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante
                            $hora = date('Y-m-d H:i:s'); // Salva a hora atual (formato MySQL)
                            $dia = date('Y-m-d');
                            $sql = "INSERT INTO LOG(IP_LOG, DATA_LOG, HORA_LOG, MENSAGEM_LOG, ACAO_LOG,AUTOR_LOG,COD_AUTOR_LOG)
                            VALUES('$ip','$dia', '$hora', '$mensagem', $acao,'".$_SESSION['email']."',".$_SESSION['code'].")";
                            mysql_query($sql);
                            }
                    switch (get_post_action('salvarDados','Retornar','salvarNome','salvarApelido','salvarEstado','salvarSenha')) {
                    case 'salvarSenha':   
                    //Inicio
                        $senhaAtual = $_POST['senhaAtual'];
                        $senha = $_POST['senhaUser'];
                        $confirmSenha = $_POST['confirmesenhaUser'];
                        $sql = "SELECT * FROM USUARIO WHERE COD_USUARIO =".$_SESSION['code'];
                        if($resultado = mysql_query($sql)){
                            $result = mysql_fetch_array($resultado);
                            $senhaBanco = $result['SENHA_USUARIO'];
                            if (Bcrypt::check($senhaAtual, $senhaBanco)) {
                                if($senha == $confirmSenha){
                                    $pass = Bcrypt::hash($senha);
                                    $query = "UPDATE USUARIO SET SENHA_USUARIO = '$pass' WHERE COD_USUARIO =".$_SESSION['code'];
                                    if(mysql_query($query)){
                                         echo "<script> location.href='../index.php' </script>";
                                         echo "<script> alert('Senha alterada, por favor logue-se novamente!'); </script>";
                                         session_destroy();
                                    }
                                    else{
                                        echo 'erro ao alterar senha';
                                    }
                                }
                                else{
                                    echo "senhas nao correspondem";
                                }                                
                            }
                            else{
                                echo "Senha Atual Incorreta!";
                            }
                        }
                        else{
                            
                        }
                    //Fim
                    break;
                    case 'salvarNome':
                    //Inicio    
                        $nome = $_POST['nomeUser'];
                        $sql = "SELECT NOME_USUARIO, APELIDO_USUARIO FROM USUARIO WHERE COD_USUARIO =".$_SESSION['code'];
                        $result = mysql_query($sql);
                        $totalbusca = mysql_num_rows($result);
                        $usuarioEmail = mysql_fetch_array($result);
                        if($totalbusca === 0){                           
                        }
                        else{
                             if($nome == $usuarioEmail['NOME_USUARIO']){
                                Echo "Nome Digitado, igual ao Nome atual";
                            }
                            else{
                                $sql2 = "UPDATE USUARIO SET NOME_USUARIO = '$nome' WHERE COD_USUARIO =" . $_SESSION['code'];
                                if(mysql_query($sql2)){
                                    echo "<script> location.href='index.php' </script>";
                                    $apelido = $usuarioEmail['APELIDO_USUARIO'];
                                    $mensagem = "$apelido Alterou Nome";
                                    $acao = 8;
                                    salvaLog($mensagem,$acao);
                                    
                                }
                                else{
                                    echo "erro ao alterar Nome";
                                }
                            }
                        }
                    //Fim    
                    break;
                    case 'salvarApelido':
                    //Inicio    
                        $apelido1 = $_POST['apelidoUser'];
                        $sql = "SELECT NOME_USUARIO, APELIDO_USUARIO FROM USUARIO WHERE COD_USUARIO =".$_SESSION['code'];
                        $result = mysql_query($sql);
                        $totalbusca = mysql_num_rows($result);
                        $usuarioEmail = mysql_fetch_array($result);
                        if($totalbusca === 0){                           
                        }
                        else{
                             if($apelido1 == $usuarioEmail['APELIDO_USUARIO']){
                                Echo "Apelido Digitado, igual ao Apelido atual";
                            }
                            else{
                                $sql2 = "UPDATE USUARIO SET APELIDO_USUARIO = '$apelido1' WHERE COD_USUARIO =" . $_SESSION['code'];
                                if(mysql_query($sql2)){
                                    echo "<script> location.href='index.php' </script>";
                                    $apelido = $usuarioEmail['APELIDO_USUARIO'];
                                    $mensagem = "$apelido Alterou Apelido";
                                    $acao = 12;
                                    salvaLog($mensagem,$acao);
                                    
                                }
                                else{
                                    echo "erro ao alterar Apelido";
                                }
                            }
                        }
                    //Fim    
                    break;
                    case 'salvarDados':
                    //Inicio
                        $email = $_POST['confirmemail_usuario'];
                        $confirmEmail = $_POST['confirmemail_usuario2'];
                        if($email == $confirmEmail){
                            $query = "SELECT EMAIL_USUARIO FROM USUARIO WHERE EMAIL_USUARIO = '$email'";
                            $result = mysql_query($query);
                            $totalResult = mysql_num_rows($result);
                            if($totalResult === 0){ 
                        $sql = "SELECT EMAIL_USUARIO, APELIDO_USUARIO FROM USUARIO WHERE COD_USUARIO =".$_SESSION['code'];
                        $result = mysql_query($sql);
                        $totalbusca = mysql_num_rows($result);
                        $usuarioEmail = mysql_fetch_array($result);
                        if($totalbusca === 0){                           
                        }
                        else{
                             if($email == $usuarioEmail['EMAIL_USUARIO']){
                                Echo "E-mail Digitado, igual ao email atual";
                            }
                            else{
                                $sql2 = "UPDATE USUARIO SET EMAIL_USUARIO = '$email' WHERE COD_USUARIO =" . $_SESSION['code'];
                                if(mysql_query($sql2)){
                                    echo "<script> location.href='../index.php' </script>";
                                    echo "<script> alert('E-mail alterado, por favor logue-se novamente!'); </script>";
                                    $apelido = $usuarioEmail['APELIDO_USUARIO'];
                                    $mensagem = "$apelido Alterou E-mail";
                                    $acao = 7;
                                    salvaLog($mensagem,$acao);
                                    session_destroy();
                                }
                                else{
                                    echo "erro ao alterar E-mail";
                                }
                            }
                        }
                        }
                        else{
                           Echo "E-mail Já Existente";
                            echo "<a href=javascript:history.go(-1)> Voltar</a>"; 
                        }
                        }
                        else{
                            Echo "E-mail Diferentes";
                            echo "<a href=javascript:history.go(-1)> Voltar</a>";
                        }

                    //Fim
                    break;
                    case 'Retornar':
                        //Inicio
                            echo "<script>location.href='index.php'</script>";
                                    
                        //Fim
                        break;
                    case 'salvarEstado':
                    //Inicio
                        $estado = $_POST['estadoUser'];
                        $sql = "SELECT ESTADO_USUARIO, APELIDO_USUARIO FROM USUARIO WHERE COD_USUARIO =".$_SESSION['code'];
                        $result = mysql_query($sql);
                        $totalbusca = mysql_num_rows($result);
                        $usuarioEmail = mysql_fetch_array($result);
                        if($totalbusca === 0){                           
                        }
                        else{
                                $sql2 = "UPDATE USUARIO SET ESTADO_USUARIO = '$estado' WHERE COD_USUARIO =" . $_SESSION['code'];
                                if(mysql_query($sql2)){
                                    echo "<script> location.href='index.php' </script>";
                                    $apelido = $usuarioEmail['APELIDO_USUARIO'];
                                    $mensagem = "$apelido Alterou Estado";
                                    $acao = 8;
                                    salvaLog($mensagem,$acao);
                                    
                                }
                                else{
                                    echo "erro ao alterar Nome";
                                }
                            }
                    //Fim
                    break;
                    default:
                        echo "Nenhuma Função Pré definida";
                       
                    }   
                    ?>
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