<?php
include '../includes/funcoesUteis.inc';
validaAutenticacao('../index.php', '3');
$sql = "UPDATE IMAGEM_USUARIO SET URL_IMAGEM = 'default.jpg' WHERE COD_IMAGEM_USUARIO =".$_SESSION['code'];
if(mysql_query($sql)){
    echo "<script> location.href='index.php' </script>";
}
else{
    echo "erro ao remover a imagem";
}
