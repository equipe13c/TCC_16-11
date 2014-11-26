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
                document.getElementById("tituloPagina").style.backgroundColor = "#00989E";
                document.getElementById("nav").style.backgroundColor = "#00989E";
                document.getElementById("navReduzido").style.backgroundColor = "#00989E";
                document.getElementById("logar").style.borderBottom = "solid 5px #00989E"; 
                document.getElementById("botaoLogin").style.backgroundColor = "#00989E";                  
                document.getElementById("tituloPagina").style.backgroundColor = "#00989E";
            };             
        </script>        
        <title> Termos de Uso </title>
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
                    <h1 id="tituloPagina"> Termos de Uso </h1><br/>
                    <div id="termosUso">                         
                        <p> O site MULTIPLAYER funciona como uma plataforma de conteúdo, onde os redatores, designers e outros operadores
                            inserem seus conteúdos sem pagamento de salário ou similar. Todo o conteúdo publicado por um membro pertence a ele,
                            pode ser retirado a qualquer momento pelo mesmo, e este disponibiliza seu conteúdo para o MULTIPLAYER que permite o
                            uso mediante a citação do autor e veículo original, além do compartilhamento recíproco com base na mesma licença.
                            Se você pretende utilizar nosso conteúdo, certifique-se de estar respeitando todos os termos desta licença.
                        </p><br/>
                        <h2> Comentários </h2><br/>
                        <p> O MULTIPLAYER não se responsabiliza pelas opiniões, comentários, imagens e links postados pelos frequentadores dos 
                            sites nos comentários, fóruns e páginas em redes sociais, nem por qualquer dano supostamente decorrente do uso deste 
                            serviço perante usuários ou terceiros. O conteúdo das mensagens não é revisado pelo MULTIPLAYER, sendo de única e 
                            exclusiva responsabilidade civil e penal do autor da mensagem.
                        </p><br/>
                        <h2> Política de Privacidade </h2><br/>
                        <p> O MULTIPLAYER reconhece a importância da privacidade. Aqui coletamos e usamos informações relativas aos registros 
                            quando você visita o MULTIPLAYER e essas informações são guardadas. O MULTIPLAYER nunca repassará essas informações a 
                            terceiros, sejam empresas ou pessoas físicas.
                        </p><br/>                        
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
        </section>
    </body>
</html>