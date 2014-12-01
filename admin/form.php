<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
         <link rel="stylesheet" type="text/css" href="css/style2.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
<?php
include '../includes/funcoesUteis.inc';

switch (get_post_action('Reativar', 'Elevar', 'Rebaixar', 'Desativar')) {
case 'Reativar';
        //Inicio
        validaAutenticacao('../index.php', '1');
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $data = $_POST['dataNasc'];
                    $code = $_POST['cod_user'];
                    $sql = "SELECT * FROM DESATIVADOS WHERE COD_DESATIVADO=$code";
                    $result = mysql_query($sql);
                    $totalResult = mysql_fetch_array($result);
                    echo $tipoDesativado = $totalResult['TIPO_DESATIVADO'];
                    function salvaLog($mensagem,$name,$data,$code,$email, $tipoDesativado) {
                         date_default_timezone_set("Brazil/East");
                    $ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante
                    $hora = date('H:i:s'); // Salva a hora atual (formato MySQL)
                    $dia = date('Y-m-d');
                    $sql = "INSERT INTO LOG(COD_LOG, IP_LOG, DATA_LOG, HORA_LOG, MENSAGEM_LOG, ACAO_LOG,AUTOR_LOG)
                        VALUES(".$_SESSION['code'].",'$ip','$dia', '$hora', '$mensagem', 5,'$email')";
                    mysql_query($sql);
                    $sql2 = "UPDATE USUARIO SET TIPO_USUARIO = $tipoDesativado, USUARIO_DESATIVADO = null WHERE COD_USUARIO = $code";
                    mysql_query($sql2);
                    
                    $query = "DELETE FROM DESATIVADOS WHERE COD_DESATIVADO = $code";
                    mysql_query($query);
 $url = $_SERVER['HTTP_REFERER'];
       echo "<script>location.href='$url'</script>";
                    }
                    echo "<meta charset=utf-8>";
                    $mensagem = "Usuário $name Reativado";
                    salvaLog($mensagem,$name,$data,$code,$email,$tipoDesativado);
        //Fim
            //Fim
            break;
case 'Elevar';
    //início
        validaAutenticacao('../index.php', '1');
        $name = $_POST['name'];
     $code = $_POST['cod_user'];
     $sql = "SELECT * FROM USUARIO WHERE COD_USUARIO = $code";
     $result = mysql_query($sql);
     $totalResult = mysql_fetch_array($result);
                 function salvaLog($mensagem) {
        $ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante
         date_default_timezone_set("Brazil/East");
        $hora = date('H:i:s'); // Salva a hora atual (formato MySQL)
        $dia = date('Y-m-d');
        $sql = "INSERT INTO LOG(IP_LOG, DATA_LOG, HORA_LOG, MENSAGEM_LOG, ACAO_LOG,AUTOR_LOG,COD_AUTOR_LOG)
        VALUES('$ip','$dia', '$hora', '$mensagem1', 25,'".$_SESSION['email']."',".$_SESSION['code'].")";
        mysql_query($sql);
        }
     if($totalResult['TIPO_USUARIO'] === '2'){
         $sql_up = "UPDATE USUARIO SET TIPO_USUARIO = 3, USUARIO_DESATIVADO = null WHERE COD_USUARIO = $code";
         mysql_query($sql_up);
         echo $name." Foi Elevado Para Colunista";
         echo "<script>javascript:history.go(-1);</script>";
     }else if($totalResult['TIPO_USUARIO'] === '3'){
         $sql_up = "UPDATE USUARIO SET TIPO_USUARIO = 1, USUARIO_DESATIVADO = null WHERE COD_USUARIO = $code";
         mysql_query($sql_up);
     echo $name." Foi Elevado Para Administrador";
          $url = $_SERVER['HTTP_REFERER'];
       echo "<script>location.href='$url'</script>";
                      $mensagem = "$apelido Elevado";
                
            salvaLog($mensagem);
      }else if($totalResult['TIPO_USUARIO'] === '1'){
          $url = $_SERVER['HTTP_REFERER'];
       echo "<script>location.href='$url'</script>";
                        $mensagem = "$apelido Elevado";
                
            salvaLog($mensagem);
      }
    //fim
    break;
case 'Rebaixar';
    //início
    validaAutenticacao('../index.php', '1');
        $name = $_POST['name'];
     $code = $_POST['cod_user'];
     $sql = "SELECT * FROM USUARIO WHERE COD_USUARIO = $code";
     $result = mysql_query($sql);
     $totalResult = mysql_fetch_array($result);
            function salvaLog($mensagem) {
        $ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante
         date_default_timezone_set("Brazil/East");
        $hora = date('H:i:s'); // Salva a hora atual (formato MySQL)
        $dia = date('Y-m-d');
        $sql = "INSERT INTO LOG(IP_LOG, DATA_LOG, HORA_LOG, MENSAGEM_LOG, ACAO_LOG,AUTOR_LOG,COD_AUTOR_LOG)
        VALUES('$ip','$dia', '$hora', '$mensagem1', 24,'".$_SESSION['email']."',".$_SESSION['code'].")";
        mysql_query($sql);
        }
     if($totalResult['TIPO_USUARIO'] === '2'){
       
         echo '<script>alert("'.$name. 'não pode ser rebaixado pois já é usuário restrito.");</script>';
        echo "<script> javascript:history.go(-1); </script>";
     }else if($totalResult['TIPO_USUARIO'] === '3'){
         $sql_up = "UPDATE USUARIO SET TIPO_USUARIO = 2, USUARIO_DESATIVADO = null WHERE COD_USUARIO = $code";
         mysql_query($sql_up);
                    $mensagem = "$apelido Rebaixado";
                
            salvaLog($mensagem);
       echo '<script>alert("'.$name. 'Foi rebaixado Para usuário restrito.");</script>';
         $url = $_SERVER['HTTP_REFERER'];
       echo "<script>location.href='$url'</script>";
      }else if($totalResult['TIPO_USUARIO'] === '1'){
         $sql_up = "UPDATE USUARIO SET TIPO_USUARIO = 3, USUARIO_DESATIVADO = null WHERE COD_USUARIO = $code";
         mysql_query($sql_up);
                        $mensagem = "$apelido Rebaixado";
                
            salvaLog($mensagem);
         $url = $_SERVER['HTTP_REFERER'];
       echo "<script>location.href='$url'</script>";
             
      }
    //fim
    break;
case 'Desativar';
    //início
    validaAutenticacao('../index.php', '1');
    
$apelido = $_POST['apelido'];
$code = $_POST['cod_user'];

$sql4 = "SELECT * FROM USUARIO WHERE COD_USUARIO = $code";
     $result = mysql_query($sql4);
     $totalResult = mysql_fetch_array($result);
     $nomeUsuario = $totalResult['NOME_USUARIO'];
     $apelidoUsuario = $totalResult['APELIDO_USUARIO'];
     $emailUsuario = $totalResult['EMAIL_USUARIO'];
      $senhaUsuario = $totalResult['SENHA_USUARIO'];
      $tipoUsuario = $totalResult['TIPO_USUARIO'];
      $dataUsuario = $totalResult['DATA_NASCIMENTO'];
      $estadoUsuario = $totalResult['ESTADO_USUARIO'];
      $descricaoUsuario = $totalResult['DESCRICAO_USUARIO'];
    $plataformasUsuario = $totalResult['PLATAFORMAS_PREFERIDAS'];
     $jogosUsuario = $totalResult['JOGOS_PREFERIDOS'];
     
     

function salvaLog($mensagem,$code,$nomeUsuario,$apelidoUsuario,$emailUsuario,$senhaUsuario,$tipoUsuario,$dataUsuario,$estadoUsuario,$descricaoUsuario,$plataformasUsuario,$jogosUsuario) {
                         date_default_timezone_set("Brazil/East");
                    $ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante
                    $hora = date('H:i:s'); // Salva a hora atual (formato MySQL)
$acao = 3;
$dia = date('Y-m-d');
echo $code;

     
$sql = "INSERT INTO LOG(IP_LOG, DATA_LOG, HORA_LOG, MENSAGEM_LOG, ACAO_LOG,AUTOR_LOG,COD_AUTOR_LOG)
    VALUES('$ip','$dia', '$hora', '$mensagem', $acao,'".$_SESSION['email']."',".$_SESSION['code'].")";
mysql_query($sql);

$query = "INSERT INTO DESATIVADOS(COD_DESATIVADO, NOME_DESATIVADO, APELIDO_DESATIVADO, EMAIL_DESATIVADO, 
    SENHA_DESATIVADO,TIPO_DESATIVADO, DATA_NASCIMENTO, ESTADO_DESATIVADO, DESCRICAO_DESATIVADO, PLATAFORMAS_DESATIVADO, JOGOS_DESATIVADO)
    VALUES($code,'$nomeUsuario', '$apelidoUsuario', '$emailUsuario','$senhaUsuario', $tipoUsuario, '$dataUsuario','$estadoUsuario',
        '$descricaoUsuario', '$plataformasUsuario', '$jogosUsuario')";
if(mysql_query($query)){
    echo 'Desativado';
}else{
    echo 'Não foi possível desativar o usuário' . mysql_error();
}
$sql2 = "UPDATE USUARIO SET TIPO_USUARIO = 4, USUARIO_DESATIVADO = $code WHERE COD_USUARIO = $code";
mysql_query($sql2);
 $url = $_SERVER['HTTP_REFERER'];
       echo "<script>location.href='$url'</script>";
}
echo "<meta charset=utf-8>";

    $mensagem = "$apelido Desativado";
salvaLog($mensagem,$code,$nomeUsuario,$apelidoUsuario,$emailUsuario,$senhaUsuario,$tipoUsuario,$dataUsuario,$estadoUsuario,$descricaoUsuario,$plataformasUsuario,$jogosUsuario);
    //fim
    break;
    default:
       echo "Nenhuma Função Definida";
}
?>
    </body>
</html>