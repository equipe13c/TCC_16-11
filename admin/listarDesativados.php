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
                document.getElementById("imgMiniLogo").innerHTML = '<img src="../imagens/logosReduzidos001.png" alt="" id="miniLogo">';
                var imgLogo = document.getElementById("img-logo");
                imgLogo.innerHTML = '<img src="../imagens/logo001.png" alt="" id="logo">';
                document.getElementById("navReduzido").style.backgroundColor = "#00989E";  
                document.getElementById("nav").style.backgroundColor = "#00989E";              
                document.getElementById("imgPrincipal").style.backgroundColor = "#009FE3"; 
                document.getElementById("tituloMateria").style.backgroundColor = "#009FE3";
                document.getElementById("logar").style.borderBottom = "solid 5px #009FE3"; 
                document.getElementById("botaoLogin").style.backgroundColor = "#009FE3";
                document.getElementById("tituloPagina").style.backgroundColor = "#009FE3";            

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
                    <div id="linksAtualizarImg">
                        <a href="alterarImg.php"> Alterar </a>
                        <a href="removerImg.php"> Remover </a>
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
                <article id="conteudo_infos">
                    <?php 
    $tipoUser = $_GET['tipoUser'];

$query = "SELECT * FROM DESATIVADOS ORDER BY COD_DESATIVADO ASC"; 

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
echo "<div class='tables'>";
    echo "<table class='tabelas' id='tabelausuario'>";
    echo "<tr>";
    echo "<th>Código</th>";
    echo "<th>Nome</th>";
    echo "<th>Apelido</th>";
    echo "<th>E-mail</th>";
    echo "<th>Data Nasc.</th>";
    echo "<th>Tempo Desativado</th>";
    echo "<th>Motivo</th>";
    echo "<th>Imagem</th>";
    echo "<th>Ação</th>";
    echo "</tr>";
while($usuarios = mysql_fetch_array($limite))
{         
    $sql = "SELECT URL_IMAGEM FROM IMAGEM_USUARIO WHERE COD_IMAGEM_USUARIO = ".$usuarios['COD_DESATIVADO'];
                $result2 = mysql_query($sql);   
                $imagens = mysql_fetch_array($result2); 
                $urlImagem = $imagens['URL_IMAGEM'];
                
    echo "<form id='usuariosA' action='form.php' method='post'>";
        echo "<tr>";
        echo "<td><input type='text' readonly='readonly' class='txtInfo3' size='5'  id='usuarioTable' name='cod_user' value='" . $usuarios['COD_DESATIVADO'] . "'></td>";
        echo "<td><input type='text' readonly='readonly' class='txtInfo3' size='25'  id='usuarioTable' name='name' value='" . $usuarios['NOME_DESATIVADO'] . "'></td>";
        echo "<td><input type='text' readonly='readonly' class='txtInfo3' size='25'  id='usuarioTable' name='apelido' value='" . $usuarios['APELIDO_DESATIVADO'] . "'></td>";
        echo "<td><input type='text' readonly='readonly' class='txtInfo3' size='35'  id='usuarioTable' name='email' value='" . utf8_encode($usuarios['EMAIL_DESATIVADO']) . "'></td>";
        echo "<td><input type='text' readonly='readonly' class='txtInfo3' size='10'  id='usuarioTable' name='dataNasc' value='" . $usuarios['DATA_NASCIMENTO'] . "'></td>";
        echo "<td><input type='text' readonly='readonly' class='txtInfo3' size='10'  id='usuarioTable' name='tempo' value='" . $usuarios['TEMPO_DESATIVADO'] . "'></td>";
        echo "<td><input type='text' readonly='readonly' class='txtInfo3' size='3'  id='usuarioTable' name='motivo' value='" . $usuarios['MOTIVO_DESATIVADO'] . "'></td>";
        echo "<td><a href=../uploads/$urlImagem><img src='../uploads/$urlImagem' id='imagem_usuario_listagem' alt='imagem'></a></td>";
        echo "<td><input type='submit' class=botoes name='Reativar' value='Reativar'></td>";
        echo "</tr>"; 
        echo "</form>";
}
echo "</table>";
}
$anterior = $pc -1; 
   $proximo = $pc +1; 
   if ($pc>1) 
       { echo " <a href='?pagina=$anterior&tipoUser=$tipoUser'><- Anterior</a> "; 
       
       } 
       if($pc ==1){/*CODIGO A APARECER PARA VOLTAR PAGINA*/} // Mostrando desabilitado 06/11/13 Rogério
       //echo "|"; 
       // Inicio lógica rogerio
       for($i=1;$i<=$tp;$i++)
       {
           echo "<a href=?pagina=$i&tipoUser=$tipoUser>".$i . "</a>" . "    ";
       }
       // Fim lógia rogério
       if ($pc<$tp) 
           { echo " <a href='?pagina=$proximo&tipoUser=$tipoUser'>Próxima -></a>"; 
           
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