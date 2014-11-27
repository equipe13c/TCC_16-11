<!DOCTYPE html>
<html>
    <head>        
         <link rel="stylesheet" type="text/css" href="css/style2.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <title>Área Administrativa</title>
    </head>
    <body>
        <?php        
        include '../includes/funcoesUteis.inc';
        include '../conexao/conecta.inc';  
        include_once '../classes/Bcrypt.class.php';
        validaAutenticacao('../index.php', '1');
        
        
        
$name = $_POST['name'];
$apelido = $_POST['apelido'];
$email = $_POST['email'];
$code = $_POST['cod_user'];
$senha = $_POST['senha'];
$data = $_POST['dataNasc'];

function salvaLog($mensagem,$code,$name,$email,$senha,$data) {
$ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante
$hora = date('Y-m-d H:i:s'); // Salva a hora atual (formato MySQL)
$acao = 3;
$dia = date('Y-m-d');
$sql = "INSERT INTO LOG(IP_LOG, DATA_LOG, HORA_LOG, MENSAGEM_LOG, ACAO_LOG,AUTOR_LOG,COD_AUTOR_LOG)
    VALUES('$ip','$dia', '$hora', '$mensagem', $acao,'".$_SESSION['email']."',".$_SESSION['code'].")";
mysql_query($sql);
$motivo = "Administrador Teve seu Motivo";
$query = "INSERT INTO DESATIVADOS(COD_DESATIVADO, NOME_DESATIVADO, EMAIL_DESATIVADO, 
    SENHA_DESATIVADO,DATA_NASCIMENTO, TEMPO_DESATIVADO, MOTIVO_DESATIVADO)
    VALUES($code,'$name','$email','$senha','$data','$hora','$motivo')";
mysql_query($query);

$sql2 = "UPDATE USUARIO SET TIPO_USUARIO = 4, USUARIO_DESATIVADO = $code WHERE COD_USUARIO = $code";
mysql_query($sql2);
echo "$mensagem às <b>$hora</b> do dia <b>$dia</b>";
}
echo "<meta charset=utf-8>";

    $mensagem = "$apelido Desativado";
salvaLog($mensagem,$code,$name,$email,$senha,$data);
?>        
    </body>
</html>