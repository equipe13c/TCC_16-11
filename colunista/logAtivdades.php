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
        <title></title>
    </head>
    <body>
        <section id="container">
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
                        <figure id="imgCam" >                       
                            <a onmousedown="mostrarLinks();"  id="camera"></a>
                        </figure>
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
                <?php
                    $sql = "SELECT * FROM LOG WHERE COD_AUTOR_LOG =".$_SESSION['code'];
                    $total_reg = "5";
                    $pc= isset($_GET['pagina'])? $_GET['pagina'] : "1";
                    $inicio = $pc - 1; 
                    $inicio = $inicio * $total_reg;
                    $limite = mysql_query("$sql LIMIT $inicio,$total_reg");
                    $resultado = mysql_query($sql);
                    $tr = mysql_num_rows($resultado);
                    $tp = $tr / $total_reg;
                    
                    if($tr === 0){
                        echo "Nenhuma Ação Encontrada";
                    }
                    else{
                        echo '<table id="tabelaPerfil" class="bordasimples">
                            <tr class="linhasInfo">
                            <th> Data </th>
                            <th> Hora</th>
                            <th> Ação</th>
                            </tr>';
                        while ($acoes = mysql_fetch_array($limite))
                        {
                            echo '<tr class="linhasInfo">';
                            echo '<td class="valores">'.$acoes['DATA_LOG'].'</td>';
                            echo '<td class="valores">'.$acoes['HORA_LOG'].'</td>';
                            $query2 = "SELECT NOME_ACAO FROM ACOES_LOG WHERE COD_ACOES_LOG =". $acoes['ACAO_LOG'];
                            $result1 = mysql_query($query2);
                            $acao = mysql_fetch_array($result1);
                            echo '<td class="valores">'.$acao['NOME_ACAO'].'</td>';
                            echo '</tr>';
                        }
                        echo '</table>';
                    $anterior = $pc -1; 
                    $proximo = $pc +1; 
                    if ($pc>1) 
                    { echo " <a href='?pagina=$anterior'><- Anterior</a> "; 

                    } 
                    if($pc ==1){/*CODIGO A APARECER PARA VOLTAR PAGINA*/} // Mostrando desabilitado 06/11/13 Rogério
                    //echo "|"; 
                    // Inicio lógica rogerio
                    for($i=1;$i<=$tp;$i++)
                    {
                        echo "<a href=?pagina=$i>".$i . "</a>" . "    ";
                    }
                    // Fim lógia rogério
                    if ($pc<$tp) 
                        { echo " <a href='?pagina=$proximo'>Próxima -></a>"; 

                        }
                   if($pc == $tp){/*CODIGO A APARECER PARA PASSAR PAGINA*/} // Mostrando desabilitado 06/11/13 Rogério

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