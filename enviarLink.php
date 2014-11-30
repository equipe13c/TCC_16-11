<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="shortcut icon" href="imagens/icone001.png" >
        <script type="text/javascript" src="js/funcoes.js"> </script>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/cycle.js"></script>
        <script type="text/javascript" src="js/javascript.js"></script>
        <script type="text/javascript"> 
            onload = function(){
                var imgMiniLogo = document.getElementById("imgMiniLogo");
                var imgLogo = document.getElementById("img-logo");                
                imgMiniLogo.innerHTML = '<img src="imagens/logosReduzidos001.png" alt="" id="miniLogo">';
                imgLogo.innerHTML = '<img src="imagens/logo001.png" alt="" id="logo">';   
                document.getElementById("nav").style.backgroundColor = "#00989E";
                document.getElementById("navReduzido").style.backgroundColor = "#00989E";                 
                document.getElementById("botaoLogin").style.backgroundColor = "#00989E";
                document.getElementById("logar").style.borderBottom = "solid 5px #00989E";               
                document.getElementById("tituloPagina").style.backgroundColor = "#00989E";                
            };       
        </script>
        <title> Recuperar Senha </title>
    </head>
    <body> 
        <section id="container">
            <?php
                include_once 'conexao/conecta.inc';
                include_once 'includes/funcoesUteis.inc';
                session_start();
            ?>
            <header id="cabecalho">
                <?php
                    include_once 'includes/menu.php';
                ?>
                <div id="logar">
                    <?php
                        VerificaSessao('');
                    ?>                    
                </div>
            </header>
            <article id="article"> 
                <div id="area1">
                    <h1 id="tituloPagina"> Recupere sua Senha </h1><br/>
                    <div id="contato">                         
                        <h2> Esqueceu sua senha? Ou alterou e não se lembra? </h2>
                        <h2> Altere Aqui. </h2>                        
                        <div id="formularioContato">
                            <h1> Recuperar para e-mail </h1>
                            <?php 
echo "<meta charset='UTF-8'>";

include 'conexao/conecta.inc';
include_once 'classes/Bcrypt.class.php';

        
$email = $_GET['email']; 

$query = "SELECT EMAIL_USUARIO FROM USUARIO WHERE EMAIL_USUARIO = '$email'";
$result = mysql_query($query);

$totalUsuario = mysql_num_rows($result);
if($totalUsuario === 0){
    echo 'Usuario nao encontrado!<br/> <br/>';
     echo '<a href="javascript:history.back(1)">Voltar</a><br/><br/>';
      echo '<a href="frmcadastro.php">Cadastre-se</a><br/>';
}
else{

$query = "SELECT * FROM USUARIO WHERE EMAIL_USUARIO = '$email'";
$result = mysql_query($query);
$usuarios = mysql_fetch_array($result);
$code = $usuarios['COD_USUARIO'];
$nome = $usuarios['NOME_USUARIO'];
$assunto = "Recuperação de Senha ";
   
$emaildestinatario = $email;
$mensagemHTML = 'Olá'. $nome . '<br/>'
        . 'Link de Confirmação de senha  : <a href=www.multiplayer.url.ph/trocarSenha.php?id='. $code;
$headers = 'From: Equipe 9Bits Multiplayer' . "\r\n" .
    'Reply-To: Equipe 9Bits Multiplayer' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
$envio = mail($emaildestinatario, $assunto, $mensagemHTML, $headers); 
if($envio){
echo "E-mail Enviado para $email,<br/> Verifique Sua Caixa de Mensagens<br/> Caso o E-mail não tenha sido enviado <a href=enviarLink.php?&email='$email'>clique aqui</a>";
    }
}
?>
                        </div>    
                    </div>
                </div>
                </div>                 
            </article>
            <div id="imgFooter" ondragstart='return false'> 
                <img src="imagens/imagemRodape.png" alt=""> 
            </div>
            <footer id="footer" ondragstart='return false'>
                <?php
                    include_once 'includes/rodape.php';
                ?>
            </footer>
        </container>
    </body>
</html> 
