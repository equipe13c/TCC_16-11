<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style2.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" lang="pt-br">
        <title>Listagem de Usuário</title>
    </head>
    <body>
<?php
session_start();
include '../conexao/conecta.inc';
include '../includes/funcoesUteis.inc';
$nome_user_log = $_GET['nome_user_log'];
$query = "SELECT * FROM LOG WHERE MENSAGEM_LOG LIKE '%$nome_user_log%'";
$total_reg = "10";
$pc= isset($_GET['pagina'])? $_GET['pagina'] : "1";
$inicio = $pc - 1; 
$inicio = $inicio * $total_reg;
$limite = mysql_query("$query LIMIT $inicio,$total_reg"); 
$result = mysql_query($query);
$tr = mysql_num_rows($result);

$tp = $tr / $total_reg;
if($tr == 0){
    echo "<p class='semUsuario'> Nenhum Usuário Encontrado </p>";
}
else{
echo "<div id='busca'>"
."<form action='buscarLogusuario.php' method='get'>"
. "<label id='name_busca'>Busca de Usuário</label>"
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
       { echo " <a href='?pagina=$anterior&nome_user_log=$nome_user_log'><- Anterior</a> "; 
       
       } 
       if($pc ==1){/*CODIGO A APARECER PARA VOLTAR PAGINA*/} // Mostrando desabilitado 06/11/13 Rogério
       //echo "|"; 
       // Inicio lógica rogerio
       for($i=1;$i<=$tp;$i++)
       {
           echo "<a href=?pagina=$i&nome_user_log=$nome_user_log>".$i . "</a>" . "    ";
       }
       // Fim lógia rogério
       if ($pc<$tp) 
           { echo " <a href='?pagina=$proximo&nome_user_log=$nome_user_log'>Próxima -></a>"; 
           
           }
      if($pc == $tp){/*CODIGO A APARECER PARA PASSAR PAGINA*/} // Mostrando desabilitado 06/11/13 Rogério

?>
    </body>
</html>