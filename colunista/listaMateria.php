<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
         <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
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
    echo "Nenhum Artigo Encontrado" . "<br/><br/>";
}
else{
echo "<div id='busca'>"
."<form action='buscarUsuario.php' method='post'>"
. "<label id='name_busca'> Busca de Usuário</label>"
        . "<input type='text' onKeyPress='return letras();' name='nome_user' id='buscarUsuario'>"
        . "</form>"
        . "</div>";
echo "<div class='tables'>";
    echo "<table class='tabelas'   id='tabelaMateria' >";
    echo "<tr>";
    echo "<th>Imagem</th>";
    echo "<th>Titulo</th>";
    echo "<th>Autor</th>";
    echo "<th>Data/Hora</th>";
    echo "<th colspan='3'>Opções</th>";
        echo "<th>Ação</th>";
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
    echo "<form id='usuariosA' action='desativarUsuario.php' method='post'>";
        echo "<tr class='linhasInfo'>";
        echo "<td class='linhasInfos'><img src='../uploads/$urlImagem' id='imagem_usuario_listagem' alt='imagem'></td>";
        echo "<td><input type='text' readonly='readonly' class='txtInfo3' size='25'  id='usuarioTable' name='titulo' value='" . $artigos['TITULO_ARTIGO'] . "'></td>";
        echo "<td><input type='text' readonly='readonly' class='txtInfo3' size='25'  id='usuarioTable' name='autor' value='" . $autorArtigo . "'></td>";
        echo "<td><input type='hidden' readonly='readonly' class='txtInfo3' size='35'  id='usuarioTable' name='data' value='" . $artigos['DATA_ARTIGO'] . "'></td>";
        echo "<td><input type='hidden' readonly='readonly' class='txtInfo3' size='35'  id='usuarioTable' name='hora' value='" . $artigos['HORA_ARTIGO'] . "'></td>";
        echo "<td><input type='text' readonly='readonly' class='txtInfo3' size='35'  id='usuarioTable' name='data_hora' value='".$artigos['HORA_ARTIGO'].'  ' . $dia.'/'.$mes.'/'.$ano. "'></td>";
        echo "<td><input type='submit' class='botoes' name='editar' value='Editar Matéira'></td>";
        echo "<td><input type='submit' class='botoes' name='editar' value='Excluir Matéira'></td>";
        echo "<td><a href='../$urlArtigo'><input type='button' class='botoes'></a></td>";
        echo "</tr>"; 
        echo "</form>";
}
echo "</table><br/>";
}
$anterior = $pc -1; 
   $proximo = $pc +1; 
   if ($pc>1) 
       { echo " <a href='?pagina=$anterior&tipoUser=$tipoMateria'><- Anterior</a> "; 
       
       } 
       if($pc ==1){/*CODIGO A APARECER PARA VOLTAR PAGINA*/} // Mostrando desabilitado 06/11/13 Rogério
       //echo "|"; 
       // Inicio lógica rogerio
       for($i=1;$i<=$tp;$i++)
       {
           echo "<a href=?pagina=$i&tipoUser=$tipoMateria>".$i . "</a>" . "    ";
       }
       // Fim lógia rogério
       if ($pc<$tp) 
           { echo " <a href='?pagina=$proximo&tipoUser=$tipoMateria'>Próxima -></a>"; 
           
           }
      if($pc == $tp){/*CODIGO A APARECER PARA PASSAR PAGINA*/} // Mostrando desabilitado 06/11/13 Rogério

?>


    </body>
</html>

