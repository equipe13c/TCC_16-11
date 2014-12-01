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
            function validaSenha(form){    
    
    if (form.senhaAtual.value==""){
        alert("Preencha a senha corretamente.");
        form.senhaAtual.focus();
        return false;
    }
    if (form.senha.value=="" || form.senha.value.length < 8){
        alert("A senha deve conter pelo menos 8 dígitos.");
        form.senha.focus();
        return false;
    }                
    if (form.confirmSenha.value=="" || form.confirmSenha.value.length < 8){
        alert("Preencha a confirmação de senha corretamente.");
        form.confirmesenhaUser.focus();
        return false;
    }
    if (form.senha.value!=form.confirmSenha.value){
        alert("A senha e a confirmação devem de ser iguais.");
        form.confirmesenhaUser.focus();
        return false;
    }
    else{ return true;}
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

     $senhaAtual = $_POST['senhaAtual'];
     $senha = $_POST['senha'];
     $codigo = $_POST['codigo'];
     $query = "SELECT * FROM USUARIO WHERE COD_USUARIO = $codigo";
     $result = mysql_query($query);
     $totalUsuario = mysql_num_rows($result);
     $usuarios = mysql_fetch_array($result);

     if($totalUsuario === 0){
         echo '<p id="tituloSenha">Usuário nao encontrado!</p><br/> <br/>';
         echo '<p id="tituloSenha" <a class="voltarSenha" href="javascript:history.back(1)">Voltar</a></p><br/><br/>'; 
     }
     else{
     if($senhaAtual == $usuarios['SENHA_USUARIO']){
     $query = "UPDATE USUARIO SET SENHA_USUARIO = $senha WHERE COD_USUARIO = $codigo";
     $result = mysql_query($query);
     if($result){
         echo 'SENHA ALTERADA';
     }
     }
     else{
         echo '<script> alert("Senha Atual Incorreta");</script>';
         echo '<script>javascript:history.go(-1);</script>';
     }
     }
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
