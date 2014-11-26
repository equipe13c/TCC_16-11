<?php
include 'includes/funcoesUteis.inc';
include 'conexao/conecta.inc';
session_start();
$codeUser = $_SESSION['code'];
$comentario = $_POST['comentario'];
date_default_timezone_set("Brazil/East");
$codigoArtigo = $_POST['codigoArtigo'];
$hora = date('H:i:s');
$dia = date('Y-m-d');
$sql = "INSERT INTO COMENT(COD_USUARIO,CONTEUDO_COMENT, DATA_COMENT, HORA_COMENT, CODIGO_MATERIA)
        VALUES ($codeUser, '$comentario','$dia','$hora', $codigoArtigo)";
if(mysql_query($sql)){
    echo "<script> javascript:history.go(-1); </script>";
}
else{
    echo "<script> alert('Erro Ao Comentar');</script>";
}
?>
