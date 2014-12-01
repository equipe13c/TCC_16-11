<?php
include_once 'index.php';
$email = isset($_POST['email'])?$_POST['email']:null;
$senha = isset($_POST['senha'])?$_POST['senha']:null;
//echo $email . '    ' . $senha;
include_once 'classes/Bcrypt.class.php';
include 'conexao/conecta.inc';
$query = "SELECT * FROM USUARIO WHERE EMAIL_USUARIO = '$email'";
$result = mysql_query($query);
$totalUSUARIO = mysql_num_rows($result);
if($totalUSUARIO === 0){
    echo "<script>loginF4();</script>";
}
else{
//Agora preciso Testar a senha do usuário
    $USUARIOS = mysql_fetch_array($result); 
    $codeUSUARIO = $USUARIOS['COD_USUARIO'];
    $senhaUSUARIO = $USUARIOS['SENHA_USUARIO'];
    $tipoUSUARIO = $USUARIOS['TIPO_USUARIO'];
    $nomeUSUARIO = $USUARIOS['NOME_USUARIO'];
    $apelidoUSUARIO = $USUARIOS['APELIDO_USUARIO'];
    if($tipoUSUARIO == "4"){
               echo "<script>loginF3();</script>";
            }
    else{
    if (Bcrypt::check($senha, $senhaUSUARIO)) {
        $_SESSION['code'] = $codeUSUARIO;
        $_SESSION['email'] = $email;
        $_SESSION['nome'] = $nomeUSUARIO;
        $_SESSION['senha'] = $senha;
        $_SESSION['tipo'] = $tipoUSUARIO;
        $_SESSION['apelido'] = $apelidoUSUARIO;
        $logado = true;
        function salvaLog($mensagem,$email) {
            date_default_timezone_set("Brazil/East");
        $ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante
        $hora = date('Y-m-d H:i:s'); // Salva a hora atual (formato MySQL)
        $dia = date('Y-m-d');
        $sql = "INSERT INTO LOG(IP_LOG, DATA_LOG, HORA_LOG, MENSAGEM_LOG, ACAO_LOG,AUTOR_LOG,COD_AUTOR_LOG)
        VALUES('$ip','$dia', '$hora', '$mensagem', 1,'".$_SESSION['email']."',".$_SESSION['code'].")";
        mysql_query($sql);
        }
        if($tipoUSUARIO === '3'){
            $mensagem = $_SESSION['apelido'] . " efetuou Login";
            salvaLog($mensagem,$email);
            echo "<script>loginE();</script>";
        }
        if($tipoUSUARIO === '2'){
            $mensagem = $_SESSION['apelido'] . " efetuou Login";
            salvaLog($mensagem,$email);
            echo "<script>loginE();</script>";
        }
    else if($tipoUSUARIO === '1'){
            $mensagem = 'ADM: '. $_SESSION['apelido'] . " efetuou Login";
            salvaLog($mensagem,$email);
            echo "<script>loginE();</script>";
    }
    }
    else{
            echo "<script>loginF();</script>";
    }
    }
    
}