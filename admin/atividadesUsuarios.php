<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">        
        <link rel="shortcut icon" href="../imagens/icone001.png" >
        <link rel="stylesheet" type="text/css" href="css/style.css">
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
    function mostrarLogs(){
                    document.getElementById('mostrarLogs').style.display = 'inline';
                }
        </script>
        <title> Área Administrativa </title>
    </head>
    <body >
        <section>
        <?php             
             include '../includes/funcoesUteis.inc';
             include '../conexao/conecta.inc';
             validaAutenticacao('index.php','1');
             ?>
            <header id="cabecalho">
                <?php
                include_once '../includes/menuR.php';
                validaAutenticacao('../index.php','1');
                ?>
            </header>
            <figure id="imgCapa">
                <?php
                buscarDados('imgcapa');
                ?>
                
            </figure>
            <article id="conteudo">
                <div id="info_user">  
                    <div id="linksAtualizarImg"> 
                        <a href="alterarImg.php"> Alterar</a><br/>
                        <a href="removerImg.php"> Remover</a>
                    </div>                     
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
                <article id="conteudo_infos"> <br/>
                         <?php 
                        echo "<div id='buscaUsuarios'>"
                        ."<form action='buscarUsuario.php' method='post'>"
                        . "<label> Busca de Usuário</label>"
                        . "<input type='text' onKeyPress='return letras();' name='nome_user' id='caixaUser'>"
                        . "<input type='submit' name='botaoBuscaUser' id='botaoBuscaUser' value='Buscar'>"    
                        . "</form>"
                        . "</div>";
                        
                            echo "<div class='tables'>";
                            echo "<table class='tabelaUsuarios'>";
                            echo "<tr>";    
                            echo "<th colspan='10'>Filtrar Atividades de Usuários</th>";                            
                            echo "</tr>";    
                            echo "<tr>";    
                            echo "<td><a href='listarLog.php?&tipoLog=1'  target='logsUser' onclick='mostrarLogs();'> Efetuaram Login </a></td>";
                            echo "<td><a href='listarLog.php?&tipoLog=2'  target='logsUser' onclick='mostrarLogs();'> Alteraram Foto </a></td>";
                            echo "<td><a href='listarLog.php?&tipoLog=3'  target='logsUser' onclick='mostrarLogs();'> Desativados </a></td>";
                            echo "<td><a href='listarLog.php?&tipoLog=5'  target='logsUser' onclick='mostrarLogs();'> Reativados </a></td>";
                            echo "<td><a href='listarLog.php?&tipoLog=6'  target='logsUser' onclick='mostrarLogs();'> Alteraram Senha </a></td>";
                            echo "<td><a href='listarLog.php?&tipoLog=7'  target='logsUser' onclick='mostrarLogs();'> Alteraram E-mail </a></td>";
                            echo "<td><a href='listarLog.php?&tipoLog=8'  target='logsUser' onclick='mostrarLogs();'> Alteraram Nome </a></td>";
                            echo "<td><a href='listarLog.php?&tipoLog=9'  target='logsUser' onclick='mostrarLogs();'> Comentaram Artigo </a></td>";
                            echo "<td><a href='listarLog.php?&tipoLog=10'  target='logsUser' onclick='mostrarLogs();'> Fizeram Cadastro </a></td>";
                            echo "<td><a href='listarLog.php?&tipoLog=11'  target='logsUser' onclick='mostrarLogs();'> Efetuaram Logout </a></td>";
                            echo "</tr>";                            
                            echo "</div>";                                                     
                            echo "</table>";
                            echo "<div id= style='display:none;'>"   
                            ."<iframe  id='mostrar_logs'  src='' frameborder='0' allowfullscreen name='logsUser'></iframe> "    
                            ."</div>";
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