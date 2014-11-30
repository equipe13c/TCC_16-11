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

$query = "SELECT EMAIL_USUARIO FROM usuario WHERE EMAIL_USUARIO = '$email'";
$result = mysql_query($query);

$totalUsuario = mysql_num_rows($result);
if($totalUsuario === 0){
    echo 'Usuario nao encontrado!<br/> <br/>';
     echo '<a href="javascript:history.back(1)">Voltar</a><br/><br/>';
      echo '<a href="frmcadastro.php">Cadastre-se</a><br/>';
}
else{

$query = "SELECT NOME_USUARIO, SENHA_USUARIO FROM usuario WHERE EMAIL_USUARIO = '$email'";
$result = mysql_query($query);
$usuarios = mysql_fetch_array($result);
$senha = $usuarios['SENHA_USUARIO'];
$nome = $usuarios['NOME_USUARIO'];
function geraSaltAleatorio($tamanho = 6) {
return substr(md5(mt_rand()), 0, $tamanho); 
}
$salt = geraSaltAleatorio();
$novasenha = Bcrypt::hash($salt);

$emaildestinatario = $email;
$assunto = "Recuperação de Senha ";
$envio = "UPDATE USUARIO SET EMAIL_USUARIO = '$email', SENHA_USUARIO = '$novasenha'  WHERE EMAIL_USUARIO = '$email'";
if(mysql_query($envio)){
    echo "<p class='senha_rec'>Senha Recuperada</p><br/>";
    echo "<p class='senha_rec' id='senha_rec'>Sua Nova Senha é:</p> <p id=senha_reculperada>$salt</p><br/><br/><br/><br/><br/>";
    
$emaildestinatario = $email;
$assunto = "Recuperação de Senha ";
$mensagemHTML = 'Olá'. $nome . '<br/>'
        . 'Sua Senha de Recuperação é : '. $salt;
$headers = 'From: Equipe 9Bits Multiplayer' . "\r\n" .
    'Reply-To: Equipe 9Bits Multiplayer' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
$envio = mail($emaildestinatario, $assunto, $mensagemHTML, $headers); 
if($envio){
echo "E-mail Enviado,<br/> Verifique Sua Caixa de Mensagens<br/> Caso o E-mail não tenha sido enviado <a href=reenviarSenha.php>clique aqui</a>";
}
    
    }else{
    echo 'Erro ao recuperar senha';
}}
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
