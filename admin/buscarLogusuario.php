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
        <title>Área Administrativa</title>
    </head>
    <body >
        <section id="container" >
            <?php
                include_once '../conexao/conecta.inc';
                include_once '../includes/funcoesUteis.inc';
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
                <article id="conteudo_infos">
<?php
$nome_user_log = $_GET['nome_user_log'];
$tipoLog = $_GET['tipo_log'];
$query = "SELECT * FROM LOG WHERE ACAO_LOG = $tipoLog AND MENSAGEM_LOG LIKE '%$nome_user_log%'";
$total_reg = "10";
$pc= isset($_GET['pagina'])? $_GET['pagina'] : "1";
$inicio = $pc - 1; 
$inicio = $inicio * $total_reg;
$limite = mysql_query("$query LIMIT $inicio,$total_reg"); 
$result = mysql_query($query);
$tr = mysql_num_rows($result);

$tp = $tr / $total_reg;
if($tr == 0){
    echo "Nenhum Usuário Encontrado";
}
else{
echo "<div id='busca'>"
."<form action='buscarLogusuario.php' method='get'>"
. "<label id='name_busca'>Busca de Usuário</label>"
        . "<input type='hidden' value='$tipoLog' name='tipo_log'>"
        . "<input type='text' onKeyPress='return letras();' name='nome_user_log'>"
        . "</form>"
        . "</div>";
echo "<div class='tables'>";
    echo "<table class='tabelas' id='tabelausuario'>";
    echo "<tr>";
    echo "<th>Código</th>";
    echo "<th>IP</th>";
    echo "<th>Data</th>";
    echo "<th>Hora</th>";
    echo "<th>Mensagem</th>";
    echo "<th>Autor</th>";
    echo "</tr>";
while($usuarios = mysql_fetch_array($limite))
{                       
    echo "<form id='usuariosA' action='form.php' method='post'>";
        echo "<tr>";
        echo "<td><input type='text' readonly='readonly' class='edituser' size='5'  id='usuarioTable' name='cod_log' value='" . $usuarios['COD_LOG'] . "'></td>";
        echo "<td text-align='center'><input type='text' readonly='readonly' class='edituser' size='10'  id='usuarioTable' name='ip_log' value='" . $usuarios['IP_LOG'] . "'></td>";
        echo "<td text-align='center'><input type='text' readonly='readonly' class='edituser' size='10'  id='usuarioTable' name='data_log' value='" . $usuarios['DATA_LOG'] . "'></td>";
        echo "<td text-align='center'><input type='text' readonly='readonly' class='edituser' size='10'  id='usuarioTable' name='hora_log' value='" . $usuarios['HORA_LOG'] . "'></td>";
        echo "<td><input type='text' readonly='readonly' class='edituser' size='35'  id='usuarioTable' name='mensagem_log' value='" . $usuarios['MENSAGEM_LOG'] . "'></td>";
        echo "<td><input type='text' readonly='readonly' class='edituser' size='25'  id='usuarioTable' name='autor_log' value='" . $usuarios['AUTOR_LOG'] . "'></td>";
        echo "</tr>"; 
        echo "</form>";
}
echo "</table>";
}
$anterior = $pc -1; 
   $proximo = $pc +1; 
   if ($pc>1) 
       { echo " <a href='?pagina=$anterior&nome_user_log=$nome_user_log&tipo_log=$tipoLog'><- Anterior</a> "; 
       
       } 
       if($pc ==1){/*CODIGO A APARECER PARA VOLTAR PAGINA*/} // Mostrando desabilitado 06/11/13 Rogério
       //echo "|"; 
       // Inicio lógica rogerio
       for($i=1;$i<=$tp;$i++)
       {
           echo "<a href=?pagina=$i&nome_user_log=$nome_user_log&tipo_log=$tipoLog>".$i . "</a>" . "    ";
       }
       // Fim lógia rogério
       if ($pc<$tp) 
           { echo " <a href='?pagina=$proximo&nome_user_log=$nome_user_log&tipo_log=$tipoLog'>Próxima -></a>"; 
           
           }
      if($pc == $tp){/*CODIGO A APARECER PARA PASSAR PAGINA*/} // Mostrando desabilitado 06/11/13 Rogério

?>
           </article>                
            </article>
            <div id="imgFooter" ondragstart='return false'> 
                <img src="../imagens/ideiaRodape.png" alt=""> 
            </div>
            <footer id="footer">
                <?php
                    include_once '../includes/rodapeAdmin.php';
                ?>
            </footer>            
        </section>
    </body>
</html>