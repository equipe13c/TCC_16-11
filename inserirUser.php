<?php
include "conexao/conecta.inc";
include "cadastro.php";
include_once 'classes/Bcrypt.class.php';
echo "<meta charset=UTF-8>";
$nome = $_POST['nome'];
$apelido = $_POST['apelido'];
$senha = $_POST['senha'];
$confirmsenha = $_POST['confirmsenha'];
$email = $_POST['email'];
$confirmemail = $_POST['confirmemail'];
$data = $_POST['data'];
$dia = substr($data, 0, 2);
$mes = substr($data, 3, 2);
$ano = substr($data,6, 4);
$dataFormatada = $ano.'-'.$mes.'-'.$dia;
$tipo = 2;
        function salvaLog($mensagem,$code,$email) {
        $ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante
        $hora = date('Y-m-d H:i:s'); // Salva a hora atual (formato MySQL)
        $dia = date('Y-m-d');
        $sql = "INSERT INTO LOG(IP_LOG, DATA_LOG, HORA_LOG, MENSAGEM_LOG, ACAO_LOG,AUTOR_LOG,COD_AUTOR_LOG)
        VALUES('$ip','$dia', '$hora', '$mensagem', 10,'$email',$code)";
        mysql_query($sql);
        }
    function isMail($email){
    $er = "/^(([0-9a-zA-Z]+[-._+&])*[0-9a-zA-Z]+@([-0-9a-zA-Z]+[.])+[a-zA-Z]{2,6}){0,1}$/";
    if (preg_match($er, $email)){
    return true;
    } else {
    return false;
    }
}
if ($_POST["palavra"] == $_SESSION["palavra"]){
if(!($senha !== $confirmsenha)&& !($email !== $confirmemail))
{

if($email === ""){
    echo "<script>cadastroF2();</script>";
}
else{
if (isMail($email)){
        $senha = Bcrypt::hash($senha);
    $query = "INSERT INTO USUARIO (NOME_USUARIO,APELIDO_USUARIO, SENHA_USUARIO, EMAIL_USUARIO, DATA_NASCIMENTO, TIPO_USUARIO)
        VALUES('$nome','$apelido', '$senha', '$email', '$dataFormatada', $tipo)";
        if(mysql_query($query)){
               echo "<script>cadastroE();</script>";
                $busca = "SELECT * FROM USUARIO WHERE EMAIL_USUARIO='$email'";
                $resultado = mysql_query($busca);
                $users = mysql_fetch_assoc($resultado);
                $code = $users['COD_USUARIO'];
                $buscas = "SELECT * FROM LOG WHERE AUTOR_LOG='$email'";
                $resultados = mysql_query($buscas);
                $users2 = mysql_fetch_array($resultados);
                echo $users2['ACAO_LOG'];
                $mensagem = "$apelido: Realizou Cadastro";
                salvaLog($mensagem,$code,$email);
                $codigo = mysql_query("SELECT COD_USUARIO FROM USUARIO WHERE EMAIL_USUARIO = '$email'");   
                $resultCode = mysql_num_rows($codigo);
                if($resultCode === 0){
                }
                else{
                $codigos = mysql_fetch_array($codigo); 
                $codUsuario = $codigos['COD_USUARIO'];                
                $nome = "default.jpg";
                $imgCapa = "defaultCapa.jpg";
                mysql_query("INSERT INTO IMAGEM_USUARIO(URL_IMAGEM, COD_IMAGEM_USUARIO, URL_IMAGEM_CAPA)
                VALUES('$nome',$codUsuario, '$imgCapa')");
                }
        }
        else{
echo "<script>cadastroF5();</script>";
        }  
    
} 
        else{
echo "<script>cadastroF4();</script>";
        } 
}
    }
    else{
echo "<script>cadastroF3();</script>";
    }
}
else{
echo "<script>cadastroF();</script>";
}
?>  

