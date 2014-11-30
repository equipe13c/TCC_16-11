<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script type="text/javascript" src="js/funcoes.js"> </script>
        <title></title>
    </head>
    <body>
        <section id="container">
            <?php
                include_once 'conexao/conecta.inc';
                include_once 'includes/funcoesUteis.inc';
                session_start();
            ?>
            <header id="cabecalho">
                <figure id="logo">
                    <a href="index.php"> <img src="imagens/logo001.png" alt="" id="img-logo"/>  </a>
                </figure>
                <?php
                include_once 'includes/menu.php';
                ?>
                <div id="login">
                    <fieldset id="frmLogin">
                        <?php
                            VerificaSessao('');
                        ?>
                    </fieldset>
                </div>
                <?php
                include_once 'includes/busca.php';
                ?>
            </header>
            <article id="conteudo">
                <?php 
echo "<meta charset='UTF-8'>";

include 'conexao/conecta.inc';
include_once 'classes/Bcrypt.class.php';

        
$email = $_POST['email']; 

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
    echo "<p class='senha_rec'>Um link de Confirmação de Senha foi Enviado para<br/> "
    . "$email</p><br/>";
   
$emaildestinatario = $email;
$assunto = "Recuperação de Senha ";
$mensagemHTML = 'Olá'. $nome . '<br/>'
        . 'Link de Confirmação de senha  : <a href=www.multiplayer.url.ph/trocarSenha.php?id='. $code;
$headers = "MIME-Version: 1.1\r\n";
$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
$headers .= "From: eu@seudominio.com\r\n"; // remetente
$headers .= "Return-Path: eu@seudominio.com\r\n"; // return-path
$envio = mail($emaildestinatario, $assunto, $mensagemHTML, $headers); 
if($envio){
echo "E-mail Enviado,<br/> Verifique Sua Caixa de Mensagens<br/> Caso o E-mail não tenha sido enviado <a href=reenviarSenha.php>clique aqui</a>";
}
    }
?>
            </article>
            <footer id="rodape">
                <?php
                    include_once 'includes/rodape.php';
                ?>
            </footer>            
        </section>
    </body>
</html>
