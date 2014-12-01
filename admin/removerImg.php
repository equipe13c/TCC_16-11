<?php
include '../includes/funcoesUteis.inc';
validaAutenticacao('../index.php', '1');
        function salvaLog($mensagem) {
            date_default_timezone_set("Brazil/East");
        $ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante
        $hora = date('Y-m-d H:i:s'); // Salva a hora atual (formato MySQL)
        $dia = date('Y-m-d');
        $sql = "INSERT INTO LOG(IP_LOG, DATA_LOG, HORA_LOG, MENSAGEM_LOG, ACAO_LOG,AUTOR_LOG,COD_AUTOR_LOG)
        VALUES('$ip','$dia', '$hora', '$mensagem', 27,'".$_SESSION['email']."',".$_SESSION['code'].")";
        mysql_query($sql);
        }
$sql = "UPDATE IMAGEM_USUARIO SET URL_IMAGEM = 'default.jpg' WHERE COD_IMAGEM_USUARIO =".$_SESSION['code'];
if(mysql_query($sql)){
    $mensagem = 'ADM: '. $_SESSION['apelido'] . " Removeu Foto";
            salvaLog($mensagem,$email);
    echo "<script> location.href='index.php' </script>";
}
else{
    echo "erro ao remover a imagem";
}
