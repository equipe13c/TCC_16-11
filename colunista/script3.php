<?php
            include '../includes/funcoesUteis.inc';
                include '../conexao/conecta.inc';
                include_once '../classes/Bcrypt.class.php';
                validaAutenticacao('../index.php', '3');



$descricao = $_POST['descricao'];
$jogos = $_POST['jogos'];
$plataforma = $_POST['plataformas'];
$cod = $_SESSION['code'];

$query = "UPDATE USUARIO SET DESCRICAO_USUARIO= '$descricao', PLATAFORMAS_PREFERIDAS= '$plataforma', JOGOS_PREFERIDOS='$jogos' WHERE COD_USUARIO = $cod";
    
if (mysql_query($query)) {
    echo '<script> javascript:history.go(-1);</script>';
    
}else {
    echo 'código ta errado' . mysql_error();
}
?>
