<?php
session_start();
include "../conexao/conecta.inc";
include '../includes/funcoesUteis.inc';
function geraSaltAleatorio($tamanho = 6) {
return substr(md5(mt_rand()), 0, $tamanho); 
}
echo "<meta charset=UTF-8>";
$tituloArtigo = $_POST['titulo_conteudo'];
$codMateria = $_POST['codigo'];
$descricaoArtigo = $_POST['descricao'];
$dataLancamento = $_POST['data_lancamento'];
$plataforma = $_POST['plataforma'];
$conteudoArtigo = $_POST['conteudo'];
$urlVideo = $_POST['urlVideo1'];
$urlVideo = str_replace('watch?v=','embed/',$urlVideo);
$urlVideo2 = $_POST['urlVideo2'];
$urlVideo2 = str_replace('watch?v=','embed/',$urlVideo2);
$subtitulo = $_POST['subtitulo'];
// INICIO UPLOAD IMAGEM_CAPA
$_UP['pasta'] = "../uploads/";
$_UP['tamanho'] = 1024 * 1024 * 4; //2MB;
$_UP['extensao'] = array('jpg','png','gif');
$_UP['renomeia'] = true;
$_UP['erros'][0] = "Não Houve Erros";
$_UP['erros'][1] = "O Arquivo é Maior do que o límite do php";
$_UP['erros'][2] = "Tamanho da imagem ultrapassou o límite exigido";
$_UP['erros'][3] = "Upload feito parcialmente";
$_UP['erros'][4] = "Nao teve upload";


if($_FILES['imagemCapa']['name'] == ""){
    
}
else{
    //
    if($_FILES['imagemCapa']['error'] != 0){
    die("Não foi Possível alterar a imagem Devido a: <br/>". $_UP['erros'][$_FILES['imagemCapa']['erros']]);
    exit;
}
$img_nome = $_FILES['imagemCapa']['name'];
$img_separador = explode('.',$img_nome);
$extensao = strtolower(end($img_separador));
if(array($extensao, $_UP['extensao'])=== false){
    echo "Por Favor Escolha apenas imagens JPG, PNG e GIF";
}
                
else if($_UP['tamanho'] < $_FILES['imagemCapa']['size']){
    echo "Arquivo muito grande, Envie um arquivo1 de até 2MB";
}
else{
    if($_UP['renomeia'] == true){
$salt = geraSaltAleatorio();
        $imgCapaname = $salt.'.jpg';
    }
    else{
        $imgCapaname = $_FILES['imagemCapa']['name'];
    }
    if(move_uploaded_file($_FILES['imagemCapa']['tmp_name'], $_UP['pasta'] . $imgCapaname)){
    
        $sql = "UPDATE IMAGENS_MATERIA SET IMAGEM_CAPA = '$imgCapaname' WHERE COD_MATERIA_IMAGEM = $codMateria";
        mysql_query($sql);
    
    }
    //
    }
    
}
//IMAGEM PRINCIPAL
if($_FILES['imagemPrincipal']['name'] == ""){
    
}
else{
    //
    if($_FILES['imagemPrincipal']['error'] != 0){
    die("Não foi Possível alterar a imagem Devido a: <br/>". $_UP['erros'][$_FILES['imagemPrincipal']['erros']]);
    exit;
}
$img_nome = $_FILES['imagemPrincipal']['name'];
$img_separador = explode('.',$img_nome);
$extensao = strtolower(end($img_separador));
if(array($extensao, $_UP['extensao'])=== false){
    echo "Por Favor Escolha apenas imagens JPG, PNG e GIF";
}
                
else if($_UP['tamanho'] < $_FILES['imagemPrincipal']['size']){
    echo "Arquivo muito grande, Envie um arquivo1 de até 2MB";
}
else{
    if($_UP['renomeia'] == true){
$salt = geraSaltAleatorio();
        $imagemPrincipalname = $salt.'.jpg';
    }
    else{
        $imagemPrincipalname = $_FILES['imagemPrincipal']['name'];
    }
    if(move_uploaded_file($_FILES['imagemPrincipal']['tmp_name'], $_UP['pasta'] . $imagemPrincipalname)){
    
        $sql = "UPDATE IMAGENS_MATERIA SET IMAGEM_PRINCIPAL = '$imagemPrincipalname' WHERE COD_MATERIA_IMAGEM = $codMateria";
        mysql_query($sql);
    
    }
    //
    }
}
//IMAGEM GALERIA1
if($_FILES['imagemGaleria']['name'] == ""){
    
}
else{
    //
    if($_FILES['imagemGaleria']['error'] != 0){
    die("Não foi Possível alterar a imagem Devido a: <br/>". $_UP['erros'][$_FILES['imagemGaleria']['erros']]);
    exit;
}
$img_nome = $_FILES['imagemGaleria']['name'];
$img_separador = explode('.',$img_nome);
$extensao = strtolower(end($img_separador));
if(array($extensao, $_UP['extensao'])=== false){
    echo "Por Favor Escolha apenas imagens JPG, PNG e GIF";
}
                
else if($_UP['tamanho'] < $_FILES['imagemGaleria']['size']){
    echo "Arquivo muito grande, Envie um arquivo1 de até 2MB";
}
else{
    if($_UP['renomeia'] == true){
$salt = geraSaltAleatorio();
        $imagemGalerianame = $salt.'.jpg';
    }
    else{
        $imagemGalerianame = $_FILES['imagemGaleria']['name'];
    }
    if(move_uploaded_file($_FILES['imagemGaleria']['tmp_name'], $_UP['pasta'] . $imagemGalerianame)){
    
        $sql = "UPDATE IMAGENS_MATERIA SET IMAGEM_GALERIA = '$imagemGalerianame' WHERE COD_MATERIA_IMAGEM = $codMateria";
        mysql_query($sql);
    
    }
    //
    }
    
}

//IMAGEM GALERIA2
if($_FILES['imagemGaleria2']['name'] == ""){
    
}
else{
    //
    if($_FILES['imagemGaleria2']['error'] != 0){
    die("Não foi Possível alterar a imagem Devido a: <br/>". $_UP['erros'][$_FILES['imagemGaleria2']['erros']]);
    exit;
}
$img_nome = $_FILES['imagemGaleria2']['name'];
$img_separador = explode('.',$img_nome);
$extensao = strtolower(end($img_separador));
if(array($extensao, $_UP['extensao'])=== false){
    echo "Por Favor Escolha apenas imagens JPG, PNG e GIF";
}
                
else if($_UP['tamanho'] < $_FILES['imagemGaleria2']['size']){
    echo "Arquivo muito grande, Envie um arquivo1 de até 2MB";
}
else{
    if($_UP['renomeia'] == true){
$salt = geraSaltAleatorio();
        $imagemGaleria2name = $salt.'.jpg';
    }
    else{
        $imagemGaleria2name = $_FILES['imagemGaleria2']['name'];
    }
    if(move_uploaded_file($_FILES['imagemGaleria2']['tmp_name'], $_UP['pasta'] . $imagemGaleria2name)){
    
        $sql = "UPDATE IMAGENS_MATERIA SET IMAGEM_GALERIA2 = '$imagemGaleria2name' WHERE COD_MATERIA_IMAGEM = $codMateria";
        mysql_query($sql);
    
    }
    //
    }
    
}

//IMAGEM GALERIA3
if($_FILES['imagemGaleria3']['name'] == ""){
    
}
else{
    //
    if($_FILES['imagemGaleria3']['error'] != 0){
    die("Não foi Possível alterar a imagem Devido a: <br/>". $_UP['erros'][$_FILES['imagemGaleria3']['erros']]);
    exit;
}
$img_nome = $_FILES['imagemGaleria3']['name'];
$img_separador = explode('.',$img_nome);
$extensao = strtolower(end($img_separador));
if(array($extensao, $_UP['extensao'])=== false){
    echo "Por Favor Escolha apenas imagens JPG, PNG e GIF";
}
                
else if($_UP['tamanho'] < $_FILES['imagemGaleria3']['size']){
    echo "Arquivo muito grande, Envie um arquivo1 de até 2MB";
}
else{
    if($_UP['renomeia'] == true){
$salt = geraSaltAleatorio();
        $imagemGaleria3 = $salt.'.jpg';
    }
    else{
        $imagemGaleria3 = $_FILES['imagemGaleria3']['name'];
    }
    if(move_uploaded_file($_FILES['imagemGaleria3']['tmp_name'], $_UP['pasta'] . $imagemGaleria3)){
    
        $sql = "UPDATE IMAGENS_MATERIA SET IMAGEM_GALERIA = '$imagemGaleria3' WHERE COD_MATERIA_IMAGEM = $codMateria";
        mysql_query($sql);
    
    }
    //
    }
    
}
$query = "SELECT * FROM ARTIGO WHERE ID_ARTIGO = $codMateria";
$result = mysql_query($query);
$totalResult = mysql_fetch_array($result);
if($tituloArtigo == $totalResult['TITULO_ARTIGO']){
}
else if($tituloArtigo == ""){
}
else{
        $sql = "UPDATE ARTIGO SET TITULO_ARTIGO = '$tituloArtigo' WHERE ID_ARTIGO = $codMateria";
        mysql_query($sql);
}
if($descricaoArtigo == $totalResult['DESCRICAO_ARTIGO']){
}
else if($descricaoArtigo == ""){
}
else{
        $sql = "UPDATE ARTIGO SET DESCRICAO_ARTIGO = '$descricaoArtigo' WHERE ID_ARTIGO = $codMateria";
        mysql_query($sql);
}
if($dataLancamento == $totalResult['DATA_LANCAMENTO']){
}
else if($dataLancamento == ""){
}
else{
        $sql = "UPDATE ARTIGO SET DATA_LANCAMENTO = '$dataLancamento' WHERE ID_ARTIGO = $codMateria";
        mysql_query($sql);
}
if($subtitulo == $totalResult['TITULO_CONTEUDO_ARTIGO']){
}
else if($subtitulo == ""){
}
else{
        $sql = "UPDATE ARTIGO SET TITULO_CONTEUDO_ARTIGO = '$subtitulo' WHERE ID_ARTIGO = $codMateria";
        mysql_query($sql);
}
if($conteudoArtigo == $totalResult['CONTEUDO_ARTIGO']){
}
else if($conteudoArtigo == ""){
}
else{
        $sql = "UPDATE ARTIGO SET CONTEUDO_ARTIGO = '$conteudoArtigo' WHERE ID_ARTIGO = $codMateria";
        mysql_query($sql);
}
if($urlVideo == $totalResult['URLVIDEO1']){
}
else if($urlVideo == ""){
}
else{
        $sql = "UPDATE ARTIGO SET URLVIDEO1 = '$urlVideo' WHERE ID_ARTIGO = $codMateria";
        mysql_query($sql);
}
if($urlVideo2 == $totalResult['URLVIDEO2']){
}
else if($urlVideo2 == ""){
}
else{
        $sql = "UPDATE ARTIGO SET URLVIDEO2 = '$urlVideo2' WHERE ID_ARTIGO = $codMateria";
        mysql_query($sql);
}
echo "MATÉRIA ATUALIZADA";
ECHO "<a onclick='javascript:history.go(-1);'>Voltar</a>";