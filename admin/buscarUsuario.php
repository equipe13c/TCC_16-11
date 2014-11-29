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
                        include '../includes/menuA.php';
                    ?>
                </nav>
                <article id="conteudo_infos"> <br/>
                    
                    <?php

$nome_user = $_POST['nome_user'];

$query = "SELECT * FROM USUARIO WHERE NOME_USUARIO LIKE '%$nome_user%' ORDER BY COD_USUARIO ASC";
$total_reg = "5";
$pc= isset($_GET['pagina'])? $_GET['pagina'] : "1";
$inicio = $pc - 1; 
$inicio = $inicio * $total_reg;
$limite = mysql_query("$query LIMIT $inicio,$total_reg"); 
$result = mysql_query($query);
$tr = mysql_num_rows($result);

$tp = $tr / $total_reg;
if($tr == 0){
    echo "<p id=naoEncontrado>Nenhum Usuário Encontrado</p><br/>"
    . "<a href=javascript:history.go(-1); id='voltaBuscaUsuario'>Voltar</a>";
}
else{
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
        echo "<th colspan='8'> Filtrar </th>";    
    echo "</tr>"; 
    echo "<tr>";       
    echo "<td><a href='#'> Todos </a> </td>"; 
    echo "<td><a href='#'> Nome </a> </td>";    
    echo "<td><a href='#'> Data de Nascimento </a></td>";
    echo "<td><a href='#'> Administradores </a></td>";
    echo "<td><a href='#'> Colunistas </a></td>";
    echo "<td><a href='#'> Restritos </a></td>";
    echo "<td><a href='#'> Ativados </a></td>";
    echo "<td><a href='#'> Desativados </a></td>";
    echo "</tr>";
    echo "</table>";
echo "</div>";    
echo "<div class='tables'>";
    echo "<table class='tabelaUsuarios'>";
    echo "<tr>";    
    echo "<th style='display: none'>Código</th>";
    echo "<th style='display: none'>Senha</th>";
    echo "<th>Imagem</th>";
    echo "<th>Nome</th>";
    echo "<th>Apelido</th>";
    echo "<th>E-mail</th>";
    echo "<th>Tipo</th>";
    echo "<th>Data de Nascimento</th>";
    echo "<th>Ação</th>";
    echo "</tr>";
while($usuarios = mysql_fetch_array($limite))
{         
    
    $sql = "SELECT URL_IMAGEM FROM IMAGEM_USUARIO WHERE COD_IMAGEM_USUARIO = ".$usuarios['COD_USUARIO'];
                $result2 = mysql_query($sql);   
                $imagens = mysql_fetch_array($result2); 
                $urlImagem = $imagens['URL_IMAGEM'];
                
    $sql5 = "SELECT * FROM TIPO WHERE COD_TIPO = ".$usuarios['TIPO_USUARIO'];
                $result5 = mysql_query($sql5);   
                $tipos = mysql_fetch_array($result5); 
                $tipoUsuario = $tipos['TIPO_USUARIO'];            
                
    echo "<form id='usuariosA' action='motivo.php' method='post'>";
        echo "<td class='info' style='display: none'> <input type='text' readonly='readonly' class='txtInfo3' size='5'  id='usuarioTable' name='cod_user' value='" . $usuarios['COD_USUARIO'] . "'></td>";
        echo "<td style='display: none' type='hidden' readonly='readonly' class='txtInfo3' size='3' id='usuarioTable' name='senha' value='" . $usuarios['SENHA_USUARIO'] . "' > </td>";
        echo "<td class='linhasInfos'><a href=../uploads/$urlImagem><img src='../uploads/$urlImagem' id='imagem_usuario_listagem' alt='imagem'></a></td>";
        echo "<td><input type='text' readonly='readonly' class='txtInfo3' size='25'  id='usuarioTable' name='name' value='" . $usuarios['NOME_USUARIO'] . "'></td>";
        echo "<td><input type='text' readonly='readonly' class='txtInfo3' size='25'  id='usuarioTable' name='apelido' value='" . $usuarios['APELIDO_USUARIO'] . "'></td>";
        echo "<td><input type='text' readonly='readonly' class='txtInfo3' size='35'  id='usuarioTable' name='email' value='" . utf8_encode($usuarios['EMAIL_USUARIO']) . "'></td>";
        echo "<td><input type='text' readonly='readonly' class='txtInfo3' size='13'  id='usuarioTable' name='tipo' value='" . $tipoUsuario . "'></td>";
        echo "<td><input type='text' readonly='readonly' class='txtInfo3' size='10'  id='usuarioTable' name='dataNasc' value='" . $usuarios['DATA_NASCIMENTO'] . "'></td>";
        echo "<td></td>";
        echo "</tr>"; 
        echo "</form>";
}
echo "</table><br/>";
echo "</div>";   
}
 echo "<div id='paginacaoVisualizarUser'>";
$anterior = $pc -1; 
   $proximo = $pc +1; 
   if ($pc>1) 
       { echo " <a href='?pagina=$anterior><- Anterior</a> "; 
       
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
           { echo " <a href='?pagina=$proximo>Próxima -></a>"; 
           
           }
      if($pc == $tp){/*CODIGO A APARECER PARA PASSAR PAGINA*/} // Mostrando desabilitado 06/11/13 Rogério
echo "</div>";
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