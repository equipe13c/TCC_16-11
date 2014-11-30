<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style.css">         
        <link rel="shortcut icon" href="../imagens/icone001.png" >
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
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
    <body>
        <?php include "../conexao/conecta.inc";
include '../includes/funcoesUteis.inc';
validaAutenticacao('../index.php', '3'); 
$tipoMateria = $_GET['tipoMateria'];
$codeU = $_SESSION['code'];
$query = "SELECT * FROM ARTIGO WHERE CATEGORIA_ARTIGO = '$tipoMateria' AND AUTOR_ARTIGO = $codeU ORDER BY ID_ARTIGO ASC";
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
    ."<form action='buscarUsuario.php' method='post'>"
    . "<label> Busca de Usuário</label>"
    . "<input type='text' onKeyPress='return letras();' name='nome_user' id='caixaMateria'>"
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
    
    $sql = "SELECT IMAGEM_PRINCIPAL FROM IMAGENS_MATERIA WHERE COD_MATERIA_IMAGEM = ".$artigos['ID_ARTIGO'];
                $result2 = mysql_query($sql);   
                $imagens = mysql_fetch_array($result2); 
                $urlImagem = $imagens['IMAGEM_PRINCIPAL'];
       $sql2 = "SELECT * FROM USUARIO WHERE COD_USUARIO = ".$artigos['AUTOR_ARTIGO'];
                $result3 = mysql_query($sql2);   
                $imagens2 = mysql_fetch_array($result3);          
                $autorArtigo = $imagens2['NOME_USUARIO'];
                
                $ano = substr($artigos['DATA_ARTIGO'], 0, 4);
                $mes = substr($artigos['DATA_ARTIGO'], 5, 2);
                $dia = substr($artigos['DATA_ARTIGO'], 8, 2);                                                      
                $urlArtigo = $artigos['URL_ARTIGO'];
    echo "<form id='usuariosA' action='opcoes.php' method='post'>";
        echo "<tr>";
        echo "<td style='display: none'><input type='hidden' readonly='readonly' class='txtInfo3' size='35'  id='usuarioTable' name='codigo' value='" . $artigos['ID_ARTIGO'] . "'></td>";
        echo "<td><img src='../uploads/$urlImagem' id='imagem_materia_listagem' alt='imagem'></td>";        
        echo "<td>" . $artigos['TITULO_ARTIGO'] . "</td>";
        echo "<td>" . $autorArtigo . "</td>";
        echo "<td>" . $dia.'/'.$mes.'/'.$ano. "</td>";
        echo "<td>" . $artigos['HORA_ARTIGO'] . "</td>";
        echo "<td><input type='submit' class='botoes' name='editar' value='Editar Matéira'></td>";
        echo "<td><input type='submit' class='botoes' name='excluir' value='Excluir Matéira'></td>";
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


    </body>
</html>

