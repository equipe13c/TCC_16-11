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
        <section id="container" >
            <?php
                include_once '../conexao/conecta.inc';
                include_once '../includes/funcoesUteis.inc';
            ?>
            
                <article id="conteudo_infos">
<?php
$tipoLog = $_GET['tipoLog'];
$query = "SELECT * FROM LOG WHERE ACAO_LOG = $tipoLog";

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
. "<label id='name_busca_log'>Busca de Usuário</label>"
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
    echo "<th>Ação</th>";
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
       { echo " <a href='?pagina=$anterior&tipoLog=$tipoLog'><- Anterior</a> "; 
       
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
           { echo " <a href='?pagina=$proximo&tipoLog=$tipoLog'>Próxima -></a>"; 
           
           }
      if($pc == $tp){/*CODIGO A APARECER PARA PASSAR PAGINA*/} // Mostrando desabilitado 06/11/13 Rogério

?>
            </article>           
        </section>
</html>