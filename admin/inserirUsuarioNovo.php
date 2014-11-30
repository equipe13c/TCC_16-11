<?php
include "../conexao/conecta.inc";
include '../includes/funcoesUteis.inc';
include_once '../classes/Bcrypt.class.php';

validaAutenticacao('../index.php', '1');
echo "<meta charset=UTF-8>";
$nome = $_POST['nome'];
$apelido = $_POST['apelido'];
$senha = $_POST['senha'];
$confirmsenha = $_POST['confirmsenha'];
$email = $_POST['email'];
$confirmemail = $_POST['confirmemail'];
$data = $_POST['data'];
$tipo = $_POST['tipoUser'];
function salvaLog($mensagem) {
        $ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante
        $hora = date('Y-m-d H:i:s'); // Salva a hora atual (formato MySQL)
        $acao = 10;
        $dia = date('Y-m-d');
        $sql = "INSERT INTO LOG(IP_LOG, DATA_LOG, HORA_LOG, MENSAGEM_LOG, ACAO_LOG,AUTOR_LOG,COD_AUTOR_LOG)
        VALUES('$ip','$dia', '$hora', '$mensagem', '$acao','".$_SESSION['email']."',".$_SESSION['code'].")";
        mysql_query($sql);
        }
if(!($senha !== $confirmsenha)&& !($email !== $confirmemail))
{
    if($tipo == "1"){
    $senha = Bcrypt::hash($senha);    
    $query = "INSERT INTO USUARIO (NOME_USUARIO, APELIDO_USUARIO, SENHA_USUARIO, EMAIL_USUARIO, DATA_NASCIMENTO, TIPO_USUARIO)
        VALUES('$nome', '$apelido', '$senha', '$email', '$data', $tipo)";
    }
    else if($tipo == "2"){
    $senha = Bcrypt::hash($senha);    
    $query = "INSERT INTO USUARIO (NOME_USUARIO, APELIDO_USUARIO, SENHA_USUARIO, EMAIL_USUARIO, DATA_NASCIMENTO, TIPO_USUARIO)
        VALUES('$nome', '$apelido', '$senha', '$email', '$data', $tipo)";
    }
    else if($tipo == "3"){
        $senha = Bcrypt::hash($senha);
        $query = "INSERT INTO USUARIO (NOME_USUARIO, APELIDO_USUARIO, SENHA_USUARIO, EMAIL_USUARIO, DATA_NASCIMENTO, TIPO_USUARIO)
        VALUES('$nome', '$apelido', '$senha', '$email', '$data', $tipo)";   
    }
if($email === ""){
    echo "Desculpe, Campo de E-mail nao Definidos";
}
else{
  if(mysql_query($query)){
    echo "Novo Usuário cadastrado";
    $mensagem = "$apelido Cadastrado";
salvaLog($mensagem);
    $codigo = mysql_query("SELECT COD_USUARIO FROM USUARIO WHERE EMAIL_USUARIO = '$email'");   
                $resultCode = mysql_num_rows($codigo);
if($resultCode === 0){
}
else{
$codigos = mysql_fetch_array($codigo); 
$codUsuario = $codigos['COD_USUARIO'];                
$nome = "default.jpg";            
mysql_query("INSERT INTO IMAGEM_USUARIO(URL_IMAGEM, COD_IMAGEM_USUARIO)
VALUES('$nome',$codUsuario)");
}
}
else{
    echo "Não Foi Possível Realizar o Cadastro<br/>";
    echo $tipo."<br/";
    
}  
}
}
?>  

