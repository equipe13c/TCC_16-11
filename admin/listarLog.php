        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
            <?php
                include_once '../conexao/conecta.inc';
                include_once '../includes/funcoesUteis.inc';
                
$tipoLog = $_GET['tipoLog'];
$query = "SELECT * FROM LOG WHERE ACAO_LOG = $tipoLog";

$total_reg = "5";
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
echo '<table id="tabelaAtividadesLog" class="">
        <tr class="linhasInfo">
        <th> Código </th>
        <th> IP </th>
        <th> Data </th>
        <th> Hora </th>        
        <th> Ação </th>        
        <th> Usuário </th>
        </tr>';    
while($usuarios = mysql_fetch_array($limite))
{                       
    echo "<form id='usuariosA' action='form.php' method='post'>";
        echo "<tr>";
        echo "<td><input type='text' readonly='readonly' class='txtInfo3' size='5'  id='usuarioTable' name='cod_log' value='" . $usuarios['COD_LOG'] . "'></td>";
        echo "<td text-align='center'><input type='text' readonly='readonly' class='txtInfo3' size='10'  id='usuarioTable' name='ip_log' value='" . $usuarios['IP_LOG'] . "'></td>";
        echo "<td text-align='center'><input type='text' readonly='readonly' class='txtInfo3' size='10'  id='usuarioTable' name='data_log' value='" . $usuarios['DATA_LOG'] . "'></td>";
        echo "<td text-align='center'><input type='text' readonly='readonly' class='txtInfo3' size='10'  id='usuarioTable' name='hora_log' value='" . $usuarios['HORA_LOG'] . "'></td>";
        echo "<td><input type='text' readonly='readonly' class='txtInfo3' size='35'  id='usuarioTable' name='mensagem_log' value='" . $usuarios['MENSAGEM_LOG'] . "'></td>";
        echo "<td><input type='text' readonly='readonly' class='txtInfo3' size='25'  id='usuarioTable' name='autor_log' value='" . $usuarios['AUTOR_LOG'] . "'></td>";
        echo "</tr>"; 
        echo "</form>";
}
echo "</table>";
echo "<div id='paginacaoAtividadesLog'>";
}
$anterior = $pc -1; 
   $proximo = $pc +1; 
   if ($pc>1) 
       { echo " <a href='?pagina=$anterior&tipoLog=$tipoLog'>< Anterior</a> "; 
       
       } 
       if($pc ==1){/*CODIGO A APARECER PARA VOLTAR PAGINA*/} // Mostrando desabilitado 06/11/13 Rogério
       //echo "|"; 
       // Inicio lógica rogerio
       for($i=1;$i<=$tp;$i++)
       {
           echo "<a href=?pagina=$i&tipoLog=$tipoLog>".$i . "</a>" . "    ";
       }
       // Fim lógia rogério
       if ($pc<$tp) 
           { echo " <a href='?pagina=$proximo&tipoLog=$tipoLog'>Próxima ></a>"; 
           
           }
      if($pc == $tp){/*CODIGO A APARECER PARA PASSAR PAGINA*/} // Mostrando desabilitado 06/11/13 Rogério
    echo "</div>";
?>