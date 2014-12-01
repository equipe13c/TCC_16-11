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
            };             
        </script>   
        <title> Multiplayer </title>
    </head>   
    <body>
        <section id="container">
            <?php
                include_once 'conexao/conecta.inc';
                include_once 'includes/funcoesUteis.inc';
                session_start();
            ?>
            <header id="cabecalho"  ondragstart="return false">
                <?php
                include_once 'includes/menu.php';
                ?>
                <div id="logar">
                    <?php
                        VerificaSessao('');
                    ?>                    
                </div>
                <div id="propaganda">
                        <iframe src="http://www.brasilgameshow.com.br/publico/contador-horizontal.php" style="width: 544px; height: 100px; display: block; margin: 0 auto; border: none; overflow: hidden;"></iframe> 
                    </div>
            </header>
            <article id="conteudo">
                
                    <h1 id="tituloGaleria"> Enviar Senha  </h1>                     
                
                    <div id="corpoConteudo">
                    <div id="senha">                         
                            <?php 
                            include_once 'classes/Bcrypt.class.php';

     $email = $_POST['email']; 
     $query = "SELECT EMAIL_USUARIO FROM usuario WHERE EMAIL_USUARIO = '$email'";
     $result = mysql_query($query);

     $totalUsuario = mysql_num_rows($result);
     if($totalUsuario === 0){
         echo '<p id="tituloSenha">Usuário nao encontrado!</p><br/> <br/>';
          echo '<p id="tituloSenha" <a class="voltarSenha" href="javascript:history.back(1)">Voltar</a></p><br/><br/>';
           
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
     $seguranca = $usuarios['COD_USUARIO'] + 299202;
     $hash = base64_encode($seguranca);
     $emaildestinatario = $email;
     $assunto = "Recuperação de Senha ";
     $envio = "UPDATE USUARIO SET EMAIL_USUARIO = '$email', SENHA_USUARIO = '$novasenha'  WHERE EMAIL_USUARIO = '$email'";
     if(mysql_query($envio)){
         echo "<p id='tituloSenha'>Senha Recuperada</p><br/>";
     

     $emaildestinatario = $email;
     $assunto = "Recuperação de Senha ";
     $mensagemHTML = 'Acesse o Link abaixo para trocar sua Senha<br/>http://www.multiplayer.url.ph/trocarSenha?&id='.$hash;
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
     $envio = mail($emaildestinatario, $assunto, $mensagemHTML, $headers); 
     if($envio){
     echo "<center><p class='verifiqueSenha'>E-mail Enviado, verifique Sua Caixa de Mensagens<br/> Caso o E-mail não tenha sido enviado <a href=reenviarSenha.php>clique aqui</a><p class='verifiqueSenha'></center> ";
     echo "<a id='voltarSenha' href=index.php><p id='tituloSenha'>Voltar</p></a><br/>";
     }

         }else{
         echo "<p class='verifiqueSenha'>Erro ao recuperar senha</p>";
     }}
?>  
                    </div>
            </article>
            <div id="imgFooter" ondragstart="return false">
                <img src="imagens/imagemRodape.png">
            </div>    
            <footer id="footer">
                <?php
                    include_once 'includes/rodape.php';
                ?>
            </footer>            
        </section>
    </body>
</html>
