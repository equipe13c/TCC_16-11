<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="shortcut icon" href="../imagens/icone001.png" >
        <script type="text/javascript" src="../js/funcoes.js"> </script>
        <script type="text/javascript" src="validacao.js"></script>
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
        <title> Área Administrativa </title>
    </head>
    <body >
        <section id="container" >
            <?php
                include_once '../conexao/conecta.inc';
                include_once '../includes/funcoesUteis.inc';
                validaAutenticacao('../index.php','3');
            ?>
            <header id="cabecalho">
                <?php
                
                include_once '../includes/menuR.php';
                
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
                        include '../includes/menuC.php';
                    ?>
                </nav>
                <article id="conteudo_infos">
<?php
$codeU = $_SESSION['code'];
$query = "SELECT * FROM PERSONAGEM AUTOR_PERSONAGEM = $codeU ORDER BY ID_PERSONAGEM ASC";
$total_reg = 10;
$pc= isset($_GET['pagina'])? $_GET['pagina'] : "1";
$inicio = $pc - 1; 
$inicio = $inicio * $total_reg;
$limite = mysql_query("$query LIMIT $inicio,$total_reg"); 
$result = mysql_query($query);
$tr = mysql_num_rows($result);

$tp = $tr / $total_reg;
if($tr == 0){
    echo "<p class='semUsuario'> Nenhum Registro Encontrado </p>";
}
else{
    
echo "<div id='buscaMaterias'>"
    ."<form action='buscarPersonagem.php' method='get'>"
    . "<label> Personagem: </label>"
    . "<input type='text' onKeyPress='return letras();' name='nome_personagem' id='caixaMateria'>"
    . "<input type='submit' name='botaoBuscaMateria' id='botaoBuscaMateria' value='Buscar'>"    
    . "</form>"
    . "</div>";
echo "<div class='tables'>";
    echo "<table class='' id='tabelaMateria' >";
    echo "<tr>";
    echo "<th style='display: none'>Código</th>";
    echo "<th>Imagem</th>";
    echo "<th>Titulo</th>";
    echo "<th>Autor</th>";
    echo "<th colspan='2'>Data/Hora</th>";
    echo "<th colspan='3'>Opções</th>";
    echo "</tr>";
while($artigos = mysql_fetch_array($limite))
{         
    
    $sql = "SELECT IMAGEM_PRINCIPAL FROM IMAGENS_PERSONAGEM WHERE COD_PERSONAGEM_IMAGEM = ".$artigos['ID_PERSONAGEM'];
                $result2 = mysql_query($sql);   
                $imagens = mysql_fetch_array($result2); 
                $urlImagem = $imagens['IMAGEM_PRINCIPAL'];
       $sql2 = "SELECT * FROM USUARIO WHERE COD_USUARIO = ".$artigos['AUTOR_PERSONAGEM'];
                $result3 = mysql_query($sql2);   
                $imagens2 = mysql_fetch_array($result3);          
                $autorArtigo = $imagens2['NOME_USUARIO'];
                
                $ano = substr($artigos['DATA_PERSONAGEM'], 0, 4);
                $mes = substr($artigos['DATA_PERSONAGEM'], 5, 2);
                $dia = substr($artigos['DATA_PERSONAGEM'], 8, 2);                                                      
                $urlArtigo = $artigos['URL_PERSONAGEM'];
    echo "<form id='usuariosA' action='opcoes.php' method='post'>";
        echo "<tr>";
        echo "<td style='display: none'><input type='hidden' readonly='readonly' class='txtInfo3' size='35'  id='usuarioTable' name='codigo' value='" . $artigos['ID_PERSONAGEM'] . "'></td>";
        echo "<td><img src='../uploads/$urlImagem' id='imagem_materia_listagem' alt='imagem'></td>";        
        echo "<td>" . $artigos['TITULO_PERSONAGEM'] . "</td>";
        echo "<td>" . $autorArtigo . "</td>";
        echo "<td>" . $dia.'/'.$mes.'/'.$ano. "</td>";
        echo "<td>" . $artigos['HORA_PERSONAGEM'] . "</td>";
        echo "<td><input type='submit' class='botoes2' name='editarPersonagem' value='Editar Matéria'></td>";
        echo "<td><input type='submit' class='botoes2' name='excluirPersonagem' value='Excluir Matéria'></td>";
        echo "<td><a href='../$urlArtigo' target='_blank'> Visualizar Matéria </a></td>";
        echo "</tr>"; 
        echo "</form>";
}
echo "</table><br/>";
}

 echo "<div id='paginacaoEditarMateria'>";
$anterior = $pc -1; 
   $proximo = $pc +1; 
   if ($pc>1) 
       { echo " <a href='?pagina=$anterior&tipoMateria=$tipoMateria'>< Anterior</a> "; 
       
       } 
       if($pc ==1){/*CODIGO A APARECER PARA VOLTAR PAGINA*/} // Mostrando desabilitado 06/11/13 Rogério
       //echo "|"; 
       // Inicio lógica rogerio
       for($i=1;$i<=$tp;$i++)
       {
           echo "<a href=?pagina=$i&tipoMateria=$tipoMateria>".$i . "</a>" . "    ";
       }
       // Fim lógia rogério
       if ($pc<$tp) 
           { echo " <a href='?pagina=$proximo&tipoMateria=$tipoMateria'>Próxima ></a>"; 
           
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

