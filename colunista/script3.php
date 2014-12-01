<?php
            include '../includes/funcoesUteis.inc';
                include '../conexao/conecta.inc';
                include_once '../classes/Bcrypt.class.php';
                validaAutenticacao('../index.php', '3');



$descricao = $_POST['descricao'];
$jogos = $_POST['jogos'];
$plataforma = $_POST['plataformas'];
$cod = $_SESSION['code'];
       function salvaLog($mensagem) {
        $ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante
         date_default_timezone_set("Brazil/East");
        $hora = date('H:i:s'); // Salva a hora atual (formato MySQL)
        $dia = date('Y-m-d');
        $sql = "INSERT INTO LOG(IP_LOG, DATA_LOG, HORA_LOG, MENSAGEM_LOG, ACAO_LOG,AUTOR_LOG,COD_AUTOR_LOG)
        VALUES('$ip','$dia', '$hora', '$mensagem1', 19,'".$_SESSION['email']."',".$_SESSION['code'].")";
        mysql_query($sql);
        $sql2 = "INSERT INTO LOG(IP_LOG, DATA_LOG, HORA_LOG, MENSAGEM_LOG, ACAO_LOG,AUTOR_LOG,COD_AUTOR_LOG)
        VALUES('$ip','$dia', '$hora', '$mensagem2', 20,'".$_SESSION['email']."',".$_SESSION['code'].")";
        mysql_query($sql2);
        $sql3 = "INSERT INTO LOG(IP_LOG, DATA_LOG, HORA_LOG, MENSAGEM_LOG, ACAO_LOG,AUTOR_LOG,COD_AUTOR_LOG)
        VALUES('$ip','$dia', '$hora', '$mensagem3', 21,'".$_SESSION['email']."',".$_SESSION['code'].")";
        mysql_query($sql3);
        }

$query = "UPDATE USUARIO SET DESCRICAO_USUARIO= '$descricao', PLATAFORMAS_PREFERIDAS= '$plataforma', JOGOS_PREFERIDOS='$jogos' WHERE COD_USUARIO = $cod";
    
if (mysql_query($query)) {
    echo '<script> javascript:history.go(-1);</script>';
                $mensagem1 = "$apelido Alterou Descricao";
                $mensagem2 = "$apelido Alterou Jogos Preferidos";
                $mensagem3 = "$apelido Alterou Plataformas Preferidas";
                
            salvaLog($mensagem1,$mensagem2,$mensagem3);
}else {
    echo 'código ta errado' . mysql_error();
}
?>
