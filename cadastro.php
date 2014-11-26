<!DOCTYPE html>
<html>
    <head> 
        <title> Multiplayer </title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
        <link rel="shortcut icon" href="imagens/icone001.png" >
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/cycle.js"></script>
        <script type="text/javascript" src="js/javascript.js"></script>
        <script type="text/javascript" src="js/validacoes.js"></script>
        <script type="text/javascript" src="js/funcoes.js"></script>
        <script type="text/javascript">             
            onload = function(){
                var imgLogo = document.getElementById("img-logo");
                var imgMiniLogo = document.getElementById("imgMiniLogo");
                imgLogo.innerHTML = '<img src="imagens/logo001.png" alt="" id="logo">'; 
                imgMiniLogo.innerHTML = '<img src=".imagens/logosReduzidos001.png" alt="" id="miniLogo">';
                document.getElementById("nav").style.backgroundColor = "#00989E";
                document.getElementById("navReduzido").style.backgroundColor = "#00989E";
                document.getElementById("logar").style.borderBottom = "solid 5px #00989E"; 
                document.getElementById("botaoLogin").style.backgroundColor = "#00989E";
                
                //Aqui estou verificando se o campo data foi prrenchido  
if (dataentrada == ""){  
    alert ('Preencha o campo com a data de entrada');      
    form_registra_entrada.dataentrada.focus();  
    return false;  
}  
// Verificar se o formato da data digitada está correto       
var patternData = /^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/;  
if(!patternData.test(dataentrada)){  
    alert("Digite a data no formato Dia/Mês/Ano");  
    form_registra_entrada.dataentrada.focus();  
    return false;  
}

var patternValidaData = /^(((0[1-9]|[12][0-9]|3[01])([-.\/])(0[13578]|10|12)([-.\/])(\d{4}))|(([0][1-9]|[12][0-9]|30)([-.\/])(0[469]|11)([-.\/])(\d{4}))|((0[1-9]|1[0-9]|2[0-8])([-.\/])(02)([-.\/])(\d{4}))|((29)(\.|-|\/)(02)([-.\/])([02468][048]00))|((29)([-.\/])(02)([-.\/])([13579][26]00))|((29)([-.\/])(02)([-.\/])([0-9][0-9][0][48]))|((29)([-.\/])(02)([-.\/])([0-9][0-9][2468][048]))|((29)([-.\/])(02)([-.\/])([0-9][0-9][13579][26])))$/; 
                
            };  
        </script>        
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
                <div id="msgCadastro2">

                </div>
                <div id="area1">
                    <div id="entrar">
                        <h1> Login </h1>
                        <form action="#" method="post" id="entrarForm" onsubmit="return validaLogin(this);">
                            <div id="campos">
                                <p> E-mail: </p> <input type="text" name="emailLogin" placeholder="E-mail" class="campos">
                            </div>
                            <div id="campos">
                                <p> Senha: </p> <input type="password" name="senhaLogin" placeholder="Senha" class="campos">
                            </div>
                            <input type="submit" value="Entrar" class="botaoForm"/>
                            <br/>                            
                            <a href="#"> Recupere sua senha aqui. </a>
                            <br/><br/>                       
                        </form>
                    </div>
                    <div id="cadastrar">
                        <h1> Cadastrar </h1>
                        <div id='msgCad'>
                            
                        </div>
                        <form action="inserirUser.php" name="formCad" method="post" id="cadastrarForm" onsubmit="return validaCadastro(this);">
                            <div id="campos">
                                <p> Nome: </p> <input type="text" name="nome" placeholder="Nome" class="campos"> 
                            </div>
                            <div id="campos">
                                <p> Apelido: </p> <input type="text" name="apelido" placeholder="Apelido" class="campos">
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
                                <div id="captcha2">
                                    <script type="text/javascript">
                                    atualizarCaptcha();
                                    </script>
                                </div>
                                <input type="text" id="captchaPalavra" class="campoCaptcha"  name="palavra" maxlength="6" onKeyPress="return letrasNumeros();">
                                <a id="atualizarCaptcha" onclick="atualizarCaptcha();"> Mudar Captcha </a>                            
                            </div>        
                            <br/><br/>
                            <input type="checkbox" name="termos" id="termos"> <a href="termos_uso.php"> Concordo Com os Termos de Uso </a>
                            <br/>
                            <input type="reset" value="Limpar" class="botaoForm"/>
                            <input type="submit" value="Cadastrar" class="botaoForm"/>
                            <br/><br/>                     
                        </form>
                    </div>
                </div>                 
            </article>
            <div id="imgFooter" ondragstart='return false'> 
                <img src="imagens/ideiaRodape.png" alt=""> 
            </div>
            <footer id="footer" ondragstart='return false'>
                <?php
                    include_once 'includes/rodape.php';
                ?>
            </footer>
        </container>
    </body>
</html>