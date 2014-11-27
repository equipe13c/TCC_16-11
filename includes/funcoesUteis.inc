<?php
function VerificaSessao(){
               if(isset($_SESSION["tipo"])){
                    $logado = true;
                    } 
                    else{
                    $logado = false;
                    }
                if(!($logado !== true)){
                if($_SESSION['tipo'] == '1'){
                echo '<div class="foto_usuario">';
                $query = "SELECT * FROM IMAGEM_USUARIO WHERE COD_IMAGEM_USUARIO = ".$_SESSION['code'];
                $result = mysql_query($query);                
                $imagens = mysql_num_rows($result);
                if($imagens === 0){
                $nome = "default.jpg";            
                mysql_query("INSERT INTO IMAGEM_USUARIO(URL_IMAGEM, COD_IMAGEM_USUARIO)
                VALUES('$nome'".$_SESSION['code'].")");
                }
                else{
                $imagens2 = mysql_fetch_array($result); 
                $urlImagem = $imagens2['URL_IMAGEM'];
                echo "<img src='uploads/$urlImagem' class='imgUsuario' alt='imagem'>";
                $sql = mysql_query("SELECT NOME_USUARIO, APELIDO_USUARIO FROM USUARIO WHERE COD_USUARIO =". $_SESSION['code']); 
                $result = mysql_fetch_array($sql); 
                echo "<h1 id='nome_adm'>" . $result['APELIDO_USUARIO']."</h1>";
                }
                echo '</div><br/><br/>';
                echo '<div class="links_usuario">';
                    echo "<a href='admin/index.php'>Painel </a><br/>";
                    echo "<a href='admin/sair.php'>Logout </a><br/>";
                  echo '</div>';
                }
                if($_SESSION['tipo'] == '2'){
                  echo '<div class="foto_usuario">';
                $query = "SELECT * FROM IMAGEM_USUARIO WHERE COD_IMAGEM_USUARIO = ".$_SESSION['code'];
                $result = mysql_query($query);                
                $imagens = mysql_num_rows($result);
                if($imagens === 0){
                $nome = "default.jpg";            
                mysql_query("INSERT INTO IMAGEM_USUARIO(URL_IMAGEM, COD_IMAGEM_USUARIO)
                VALUES('$nome'".$_SESSION['code'].")");
                }
                else{
                $imagens2 = mysql_fetch_array($result); 
                $urlImagem = $imagens2['URL_IMAGEM'];
                echo "<img src='uploads/$urlImagem' class='imgUsuario' alt='imagem'>";
                $sql = mysql_query("SELECT NOME_USUARIO, APELIDO_USUARIO FROM USUARIO WHERE COD_USUARIO =". $_SESSION['code']); 
                $result = mysql_fetch_array($sql); 
                echo "<h1 id='nome_adm'>" . $result['APELIDO_USUARIO']."</h1>";
                }
                echo '</div><br/><br/>';
                echo '<div class="links_usuario">';
                  echo "<a href='restrito/painel.php'>Perfil </a><br/>";
                  echo "<a href='restrito/sair.php'>Logout </a><br/>";
                echo '</div>';
                }
                if($_SESSION['tipo'] == '3'){
                  echo '<div class="foto_usuario">';
                $query = "SELECT * FROM IMAGEM_USUARIO WHERE COD_IMAGEM_USUARIO = ".$_SESSION['code'];
                $result = mysql_query($query);                
                $imagens = mysql_num_rows($result);
                if($imagens === 0){
                $nome = "default.jpg";            
                mysql_query("INSERT INTO IMAGEM_USUARIO(URL_IMAGEM, COD_IMAGEM_USUARIO)
                VALUES('$nome'".$_SESSION['code'].")");
                }
                else{
                $imagens2 = mysql_fetch_array($result); 
                $urlImagem = $imagens2['URL_IMAGEM'];
                echo "<img src='uploads/$urlImagem' class='imgUsuario' alt='imagem'>";
                $sql = mysql_query("SELECT NOME_USUARIO, APELIDO_USUARIO FROM USUARIO WHERE COD_USUARIO =". $_SESSION['code']); 
                $result = mysql_fetch_array($sql); 
                echo "<h1 id='nome_adm'>" . $result['APELIDO_USUARIO']."</h1>";
                }
                echo '</div><br/><br/>';
                echo '<div class="links_usuario">';
                    echo "<a href='colunista/painel.php'>Perfil </a><br/>";
                    echo "<a href='colunista/index.php'>Nova Matéria </a><br/>";
                    echo "<a href='colunista/inserirPersonagem.php'>Novo Personagem </a><br/>";
                    echo "<a href='colunista/sair.php'>Logout </a><br/>";
                echo '</div>';
                }
                }
                else{
                    
                    echo '                    
                        <form name="formulario" action="login.php" method="post" id="login"> 
                        <img src="imagens/user.png" alt="" class="imgUsuario">
                        <label class="txtLogin"> Usuário: </label><input type="email" name="email"><br/><br/>
                        <label class="txtLogin"> Senha: </label><input type="password" name="senha"><br/><br/>
                        <div id="msglogin"></div>
                        <input type="submit" name="submit" class="btnLogin" value="Entrar" id="botaoLogin"/><br/><br/>
                        <a class="linksLogin" href="cadastro.php">Cadastre-se </a>
                        <a class="linksLogin" href="esqueceuSenha.php">Esqueceu sua senha? </a>
                        </form>';
                }            
}
function VerificaSessao2(){
               if(isset($_SESSION["tipo"])){
                    $logado = true;
                    } 
                    else{
                    $logado = false;
                    }
                if(!($logado !== true)){
                if($_SESSION['tipo'] == '1'){
                echo '<div class="foto_usuario">';
                $query = "SELECT * FROM IMAGEM_USUARIO WHERE COD_IMAGEM_USUARIO = ".$_SESSION['code'];
                $result = mysql_query($query);                
                $imagens = mysql_num_rows($result);
                if($imagens === 0){
                $nome = "default.jpg";            
                mysql_query("INSERT INTO IMAGEM_USUARIO(URL_IMAGEM, COD_IMAGEM_USUARIO)
                VALUES('$nome'".$_SESSION['code'].")");
                }
                else{
                $imagens2 = mysql_fetch_array($result); 
                $urlImagem = $imagens2['URL_IMAGEM'];
                echo "<img src='../uploads/$urlImagem' class='imgUsuario' alt='imagem'>";
                $sql = mysql_query("SELECT NOME_USUARIO, APELIDO_USUARIO FROM USUARIO WHERE COD_USUARIO =". $_SESSION['code']); 
                $result = mysql_fetch_array($sql); 
                echo "<h1 id='nome_adm'>" . $result['APELIDO_USUARIO']."</h1>";
                }
                echo '</div><br/><br/>';
                echo '<div class="links_usuario">';
                    echo "<a href='../admin/index.php'>Painel </a><br/>";
                    echo "<a href='../admin/sair.php'>Logout </a><br/>";
                  echo '</div>';
                }
                if($_SESSION['tipo'] == '2'){
                  echo '<div class="foto_usuario">';
                $query = "SELECT * FROM IMAGEM_USUARIO WHERE COD_IMAGEM_USUARIO = ".$_SESSION['code'];
                $result = mysql_query($query);                
                $imagens = mysql_num_rows($result);
                if($imagens === 0){
                $nome = "default.jpg";            
                mysql_query("INSERT INTO IMAGEM_USUARIO(URL_IMAGEM, COD_IMAGEM_USUARIO)
                VALUES('$nome'".$_SESSION['code'].")");
                }
                else{
                $imagens2 = mysql_fetch_array($result); 
                $urlImagem = $imagens2['URL_IMAGEM'];
                echo "<img src='../uploads/$urlImagem' class='imgUsuario' alt='imagem'>";
                $sql = mysql_query("SELECT NOME_USUARIO, APELIDO_USUARIO FROM USUARIO WHERE COD_USUARIO =". $_SESSION['code']); 
                $result = mysql_fetch_array($sql); 
                echo "<h1 id='nome_adm'>" . $result['APELIDO_USUARIO']."</h1>";
                }
                echo '</div><br/><br/>';
                echo '<div class="links_usuario">';
                  echo "<a href='../restrito/painel.php'>Perfil </a><br/>";
                  echo "<a href='../restrito/sair.php'>Logout </a><br/>";
                echo '</div>';
                }
                if($_SESSION['tipo'] == '3'){
                  echo '<div class="foto_usuario">';
                $query = "SELECT * FROM IMAGEM_USUARIO WHERE COD_IMAGEM_USUARIO = ".$_SESSION['code'];
                $result = mysql_query($query);                
                $imagens = mysql_num_rows($result);
                if($imagens === 0){
                $nome = "default.jpg";            
                mysql_query("INSERT INTO IMAGEM_USUARIO(URL_IMAGEM, COD_IMAGEM_USUARIO)
                VALUES('$nome'".$_SESSION['code'].")");
                }
                else{
                $imagens2 = mysql_fetch_array($result); 
                $urlImagem = $imagens2['URL_IMAGEM'];
                echo "<img src='../uploads/$urlImagem' class='imgUsuario' alt='imagem'>";
                $sql = mysql_query("SELECT NOME_USUARIO, APELIDO_USUARIO FROM USUARIO WHERE COD_USUARIO =". $_SESSION['code']); 
                $result = mysql_fetch_array($sql); 
                echo "<h1 id='nome_adm'>" . $result['APELIDO_USUARIO']."</h1>";
                }
                echo '</div><br/><br/>';
                echo '<div class="links_usuario">';
                    echo "<a href='../colunista/painel.php'>Perfil </a><br/>";
                    echo "<a href='../colunista/index.php'>Nova Matéria </a><br/>";
                    echo "<a href='../colunista/sair.php'>Logout </a><br/>";
                echo '</div>';
                }
                }
                else{
                    
                    echo '                    
                        <form name="formulario" action="../login.php" method="post" id="login"> 
                        <img src="../imagens/user.png" alt="" class="imgUsuario">
                        <label class="txtLogin"> Usuário: </label><input type="email" name="email"><br/><br/>
                        <label class="txtLogin"> Senha: </label><input type="password" name="senha"><br/><br/>
                        <div id="msglogin"></div>
                        <input type="submit" name="submit" class="btnLogin" value="Entrar"/><br/><br/>
                        <a class="linksLogin" href="../cadastro.php">Cadastre-se </a>
                        <a class="linksLogin" href="../esqueceuSenha.php">Esqueceu sua senha? </a>
                        </form>';
                }            
}
function validaAutenticacao($link, $tipo){
    
    echo '<meta charset=UTF-8>';
    session_start();
if(!isset($_SESSION['email']) or !isset($_SESSION['senha'])){
    if($tipo == '1'){
        
    }else{
    echo '<script> 
        alert("Acesso negado!\n Você não efetuouu login.")
    location.href="'.$link.'"
            </script>';
    }
}else{
    if($tipo == '1'){ include_once '../conexao/conecta.inc';
                      include_once '../classes/Bcrypt.class.php';}
    if($tipo == '2'){ include_once '../conexao/conecta.inc';
                      include_once '../classes/Bcrypt.class.php';}
    if($tipo == '3'){ include_once '../conexao/conecta.inc';
                      include_once '../classes/Bcrypt.class.php';}
    $email = $_SESSION['email'];
    $senha = $_SESSION['senha'];
    $query = "SELECT * FROM USUARIO WHERE EMAIL_USUARIO='$email'";
    $result = mysql_query($query);
    $totalUSUARIOs = mysql_num_rows($result);
    if($totalUSUARIOs !== 0){
        //testando senha
        $USUARIOs = mysql_fetch_assoc($result);
        $senhaBanco = $USUARIOs['SENHA_USUARIO'];
        $tipoBanco = $USUARIOs['TIPO_USUARIO']; 
        if (Bcrypt::check($senha, $senhaBanco)) {
   
        }else{
        session_destroy();            
        echo '<script> 
        alert("Acesso negado!\n Senha não confere.")
        location.href="'.$link.'"
         </script>';         
        }
        
    }else{
            session_destroy();
           // echo $totalUSUARIOs;
           echo '<script> 
       alert("Acesso negado!\n Email não confere.")
    location.href="'.$link.'"
           </script>';
            
        }
}
if($tipoBanco == '1'){

}
else{
if($tipoBanco == '2'){
if ($tipo !== $tipoBanco){
    echo '<script> 
       alert("Acesso negado!\n Você não tem permissão para acessar esta página!.")
    location.href="'.$link.'"
           </script>';
}
}
if($tipoBanco == '3'){
if ($tipo !== $tipoBanco){
    echo '<script> 
       alert("Acesso negado!\n Você não tem permissão para acessar esta página!.")
    location.href="'.$link.'"
           </script>';
}
}
}
}
function get_post_action($name){
    $params = func_get_args();

    foreach ($params as $name) {
        if (isset($_POST[$name])) {
            return $name;
        }
    }
}
function verificaComment(){
    $sql = "SELECT * FROM COMENTARIO WHERE ID_MATERIA = ";
    echo '            <article id="comment" >
                <figure class="autor_comment"> </figure>
               <p class="comentario_materia"> </p>
            </article>';
}
function buscarDados($string){
    if($string == "nome"){
        $sql = mysql_query("SELECT NOME_USUARIO FROM USUARIO WHERE COD_USUARIO =". $_SESSION['code']); 
        $result = mysql_fetch_array($sql); 
        echo $result['NOME_USUARIO'];
    }
    if($string == "apelido"){
         $sql = mysql_query("SELECT APELIDO_USUARIO FROM USUARIO WHERE COD_USUARIO =". $_SESSION['code']); 
         $result = mysql_fetch_array($sql); 
         echo $result['APELIDO_USUARIO']; 
    }
    if($string == "data"){
        $sql = mysql_query("SELECT DATA_NASCIMENTO FROM USUARIO WHERE COD_USUARIO =". $_SESSION['code']); 
        $result = mysql_fetch_array($sql);  
        $data = $result['DATA_NASCIMENTO']; 
        $ano = substr($data, 0, 4);
        $mes = substr($data, 5, 2);
        $dia = substr($data, 8, 2);
         echo "$dia / $mes / $ano";
    }
    if($string == "estado"){
        $sql = mysql_query("SELECT ESTADO_USUARIO FROM USUARIO WHERE COD_USUARIO =". $_SESSION['code']); 
        $result = mysql_fetch_array($sql);  
        echo $data = $result['ESTADO_USUARIO'];
    }
    if($string == "imgcapa"){
        $query = "SELECT * FROM IMAGEM_USUARIO WHERE COD_IMAGEM_USUARIO = ".$_SESSION['code'];
        $result = mysql_query($query);                
        $imagens = mysql_num_rows($result);
        if($imagens === 0){
        $nome = "defaultCapa.jpg";            
        mysql_query("INSERT INTO IMAGEM_USUARIO(URL_IMAGEM_CAPA, COD_IMAGEM_USUARIO)
        VALUES('$nome'".$_SESSION['code'].")");
        }
        else{
        $imagens2 = mysql_fetch_array($result); 
        $urlImagem = $imagens2['URL_IMAGEM_CAPA'];
        echo "<img src='../uploads/$urlImagem' alt='Imagem' id='imgCapasource'>";
        }
    
    }

    
}
function corpoMateria($corpo){
    $corpo = '';
}
function infosImagensMateria($string,$code){

                if($string == "imagemgaleria1"){   
                    $query = "SELECT * FROM IMAGENS_MATERIA WHERE COD_MATERIA_IMAGEM = $code";
                    $result = mysql_query($query);                
                    $imagens = mysql_num_rows($result);
                    if($imagens === 0){
                    $nome = "defaultCapa.jpg";            
                    mysql_query("INSERT INTO IMAGENS_MATERIA(IMAGEM_CAPA, COD_MATERIA_IMAGEM)
                    VALUES('$nome','$code')");
                    }
                    else{
                    $imagens2 = mysql_fetch_array($result); 
                    $urlImagem = $imagens2['IMAGEM_GALERIA'];
                    echo '<a class="vlightbox1" href="../uploads/'.$urlImagem.'"><img src="../uploads/'.$urlImagem.'" alt="" /></a>';
                    }
                }
                if($string == "imagemgaleria2"){   
                    $query = "SELECT * FROM IMAGENS_MATERIA WHERE COD_MATERIA_IMAGEM = $code";
                    $result = mysql_query($query);                
                    $imagens = mysql_num_rows($result);
                    if($imagens === 0){
                    $nome = "defaultCapa.jpg";            
                    mysql_query("INSERT INTO IMAGENS_MATERIA(IMAGEM_CAPA, COD_MATERIA_IMAGEM)
                    VALUES('$nome','$code')");
                    }
                    else{
                    $imagens2 = mysql_fetch_array($result); 
                    $urlImagem = $imagens2['IMAGEM_GALERIA2'];
                    echo '<a class="vlightbox1" href="../uploads/'.$urlImagem.'"><img src="../uploads/'.$urlImagem.'" alt="" /></a>';
                    }
                }
                if($string == "imagemgaleria3"){   
                    $query = "SELECT * FROM IMAGENS_MATERIA WHERE COD_MATERIA_IMAGEM = $code";
                    $result = mysql_query($query);                
                    $imagens = mysql_num_rows($result);
                    if($imagens === 0){
                    $nome = "defaultCapa.jpg";            
                    mysql_query("INSERT INTO IMAGENS_MATERIA(IMAGEM_CAPA, COD_MATERIA_IMAGEM)
                    VALUES('$nome','$code')");
                    }
                    else{
                    $imagens2 = mysql_fetch_array($result); 
                    $urlImagem = $imagens2['IMAGEM_GALERIA3'];
                    echo '<a class="vlightbox1" href="../uploads/'.$urlImagem.'"><img src="../uploads/'.$urlImagem.'" alt="" /></a>';
                    }
                }
                if($string == "capa"){   
                    $query = "SELECT * FROM IMAGENS_MATERIA WHERE COD_MATERIA_IMAGEM = $code";
                    $result = mysql_query($query);                
                    $imagens = mysql_num_rows($result);
                    if($imagens === 0){
                    $nome = "defaultCapa.jpg";            
                    mysql_query("INSERT INTO IMAGENS_MATERIA(IMAGEM_CAPA, COD_MATERIA_IMAGEM)
                    VALUES('$nome','$code')");
                    }
                    else{
                    $imagens2 = mysql_fetch_array($result); 
                    $urlImagem = $imagens2['IMAGEM_CAPA'];
                    echo "<img src='../uploads/$urlImagem' alt='Imagem' id='imgFundo'>";
                    }
                }
                if($string == "imgPrincipal"){   
                    $query = "SELECT * FROM IMAGENS_MATERIA WHERE COD_MATERIA_IMAGEM = $code";
                    $result = mysql_query($query);                
                    $imagens = mysql_num_rows($result);
                    if($imagens === 0){
                    $nome = "imgPrincipalDefault.jpg";            
                    mysql_query("INSERT INTO IMAGENS_MATERIA(IMAGEM_PRINCIPAL, COD_MATERIA_IMAGEM)
                    VALUES('$nome','$code')");
                    }
                    else{
                    $imagens2 = mysql_fetch_array($result); 
                    $urlImagem = $imagens2['IMAGEM_PRINCIPAL'];
                    echo "<img src='../uploads/$urlImagem' alt='Imagem' id='imagemPrincipal'>";
                    }
                }
}
function  infoArtigos($string,$url){
    
    if($string == "dataLancamento"){
        $sql = "SELECT * FROM ARTIGO WHERE URL_ARTIGO = '$url'";
        $result = mysql_query($sql);                
        $info = mysql_num_rows($result);
        if($info === 0){
        }
        else{
        $informacao = mysql_fetch_array($result); 
        $infoRecebida = $informacao['DATA_LANCAMENTO'];
        $ano = substr($infoRecebida, 0, 4);
        echo $ano;
        }
    }
    if($string == "plataforma"){
        $sql = "SELECT * FROM ARTIGO WHERE URL_ARTIGO = '$url'";
        $result = mysql_query($sql);                
        $info = mysql_num_rows($result);
        if($info === 0){
        }
        else{
        $informacao = mysql_fetch_array($result); 
        $infoRecebida = $informacao['CATEGORIA_ARTIGO'];
        $query = "SELECT * FROM CATEGORIA WHERE COD_CATEGORIA = $infoRecebida";
        $resultado = mysql_query($query);
        $resultadoQuery = mysql_fetch_array($resultado);
        echo $resultadoQuery['NOME_CATEGORIA'];
        }
    }
    if($string == "titulo"){
        $sql = "SELECT * FROM ARTIGO WHERE URL_ARTIGO = '$url'";
        $result = mysql_query($sql);                
        $info = mysql_num_rows($result);
        if($info === 0){
        }
        else{
        $informacao = mysql_fetch_array($result); 
        $infoRecebida = $informacao['TITULO_ARTIGO'];
        echo "$infoRecebida";
        }
    }
    if($string == "descricao"){
        $sql = "SELECT * FROM ARTIGO WHERE URL_ARTIGO = '$url'";
        $result = mysql_query($sql);                
        $info = mysql_num_rows($result);
        if($info === 0){
        }
        else{
        $informacao = mysql_fetch_array($result); 
        $infoRecebida = $informacao['DESCRICAO_ARTIGO'];
        echo "$infoRecebida";
        }
    }
    if($string == "tituloConteudo"){
        $sql = "SELECT * FROM ARTIGO WHERE URL_ARTIGO = '$url'";
        $result = mysql_query($sql);                
        $info = mysql_num_rows($result);
        if($info === 0){
        }
        else{
        $informacao = mysql_fetch_array($result); 
        $infoRecebida = $informacao['TITULO_CONTEUDO_ARTIGO'];
        echo "$infoRecebida";
        }
    }
    if($string == "conteudoMateria"){
        $sql = "SELECT * FROM ARTIGO WHERE URL_ARTIGO = '$url'";
        $result = mysql_query($sql);                
        $info = mysql_num_rows($result);
        if($info === 0){
        }
        else{
        $informacao = mysql_fetch_array($result); 
        $infoRecebida = $informacao['CONTEUDO_ARTIGO'];
        echo "$infoRecebida";
        }
    }
    if($string == "nomeAutor"){
        $sql = "SELECT * FROM ARTIGO WHERE URL_ARTIGO = '$url'";
        $result = mysql_query($sql);                
        $info = mysql_num_rows($result);
        if($info === 0){
        }
        else{
        $informacao = mysql_fetch_array($result); 
        $infoRecebida = $informacao['AUTOR_ARTIGO'];
        $sql = "SELECT * FROM USUARIO WHERE COD_USUARIO = '$infoRecebida'";
        $result = mysql_query($sql);  
        $nomeResult = mysql_fetch_array($result);
        echo $nomeResult['NOME_USUARIO']; 
        }
    }
}
function buscarMateriasAside(){
                            $query = "SELECT * FROM ARTIGO ORDER BY DATA_ARTIGO DESC";
                            $total_reg = "10";
                            $inicio = 0;
                            $limite = mysql_query("$query LIMIT $inicio,$total_reg"); 
                            $result = mysql_query($query);                
                            $tr = mysql_num_rows($result);
                            $tp = $tr / $total_reg;
                            if($tr === 0){
                                echo "Nenhum Artigo encontrado";
                            }
                            else{
                                while($artigos = mysql_fetch_array($limite))
                                {      
                                    $codigoImagem = $artigos['ID_ARTIGO'];
                                    $urlArtigo = $artigos['URL_ARTIGO'];
                                    $tituloArtigo = $artigos['TITULO_ARTIGO'];
                                    $sql = "SELECT * FROM IMAGENS_MATERIA WHERE COD_MATERIA_IMAGEM = $codigoImagem";
                                    $resultado = mysql_query($sql);
                                    $artigos2 = mysql_fetch_array($resultado);
                                    $imagemMini = $artigos2['IMAGEM_PRINCIPAL'];
                                    echo '<div class="materiaAside">';
                                    echo '<a href="../'.$urlArtigo.'"><div class="descricaoMateriaAside">';
                                    echo '<p>'.$tituloArtigo .'</p>';
                                    echo '</div></a>';
                                    echo '<img src="../uploads/'.$imagemMini.'" class="imagemMateriaAside">';
                                    echo '</div>';
                            }
                            }
}
function buscarMateriasAside2(){
                            $query = "SELECT * FROM ARTIGO ORDER BY ACESSOS DESC";
                            $total_reg = "7";
                            $inicio = 0;
                            $limite = mysql_query("$query LIMIT $inicio,$total_reg"); 
                            $result = mysql_query($query);                
                            $tr = mysql_num_rows($result);
                            $tp = $tr / $total_reg;
                            if($tr === 0){
                                echo "Nenhum Artigo encontrado";
                            }
                            else{
                                while($artigos = mysql_fetch_array($limite))
                                {      
                                    $codigoImagem = $artigos['ID_ARTIGO'];
                                    $urlArtigo = $artigos['URL_ARTIGO'];
                                    $tituloArtigo = $artigos['TITULO_ARTIGO'];
                                    $sql = "SELECT * FROM IMAGENS_MATERIA WHERE COD_MATERIA_IMAGEM = $codigoImagem";
                                    $resultado = mysql_query($sql);
                                    $artigos2 = mysql_fetch_array($resultado);
                                    $imagemMini = $artigos2['IMAGEM_PRINCIPAL'];
                                    echo '<div class="materiaAside" >';
                                    echo '<a href="'.$urlArtigo.'"><div class="descricaoMateriaAside">';
                                    echo '<p>'.$tituloArtigo .'</p>';
                                    echo '</div></a>';
                                    echo '<img src="uploads/'.$imagemMini.'" class="imagemMateriaAside">';
                                    echo '</div>';
                            }
                            }
}
function buscarMateriasSlide(){
                            $query = "SELECT * FROM ARTIGO ORDER BY DATA_ARTIGO DESC";
                            $total_reg = "4";
                            $inicio = 0;
                            $limite = mysql_query("$query LIMIT $inicio,$total_reg"); 
                            $result = mysql_query($query);                
                            $tr = mysql_num_rows($result);
                            $tp = $tr / $total_reg;
                            if($tr === 0){
                                echo "Nenhum Artigo encontrado";
                            }
                            else{
                                while($artigos = mysql_fetch_array($limite))
                                {      
                                    $codigoImagem = $artigos['ID_ARTIGO'];
                                    $urlArtigo = $artigos['URL_ARTIGO'];
                                    $tituloArtigo = $artigos['TITULO_ARTIGO'];
                                    $descricaoArtigo = $artigos['DESCRICAO_ARTIGO'];
                                    $sql = "SELECT * FROM IMAGENS_MATERIA WHERE COD_MATERIA_IMAGEM = $codigoImagem";
                                    $resultado = mysql_query($sql);
                                    $artigos2 = mysql_fetch_array($resultado);
                                    $imagemMini = $artigos2['IMAGEM_PRINCIPAL'];
                                    $imagemCapa = $artigos2['IMAGEM_CAPA'];
                                    echo '<a href="'.$urlArtigo.'">';
                                    echo '<div id="descricaoSlide">';
                                    echo $descricaoArtigo;
                                    echo '</div></a>';
                                    echo '<img src="uploads/'.$imagemMini.'" class="imgGaleria">';
                                    echo '</a>';
                            }
                            }
}
function buscarMateriasSlideP(){
                            $query = "SELECT * FROM ARTIGO  WHERE CATEGORIA_ARTIGO = 1 ORDER BY DATA_ARTIGO DESC";
                            $total_reg = "4";
                            $inicio = 0;
                            $limite = mysql_query("$query LIMIT $inicio,$total_reg"); 
                            $result = mysql_query($query);                
                            $tr = mysql_num_rows($result);
                            $tp = $tr / $total_reg;
                            if($tr === 0){
                                echo "Nenhum Artigo encontrado";
                            }
                            else{
                                while($artigos = mysql_fetch_array($limite))
                                {      
                                    $codigoImagem = $artigos['ID_ARTIGO'];
                                    $urlArtigo = $artigos['URL_ARTIGO'];
                                    $tituloArtigo = $artigos['TITULO_ARTIGO'];
                                    $descricaoArtigo = $artigos['DESCRICAO_ARTIGO'];
                                    $sql = "SELECT * FROM IMAGENS_MATERIA WHERE COD_MATERIA_IMAGEM = $codigoImagem";
                                    $resultado = mysql_query($sql);
                                    $artigos2 = mysql_fetch_array($resultado);
                                    $imagemMini = $artigos2['IMAGEM_PRINCIPAL'];
                                    $imagemCapa = $artigos2['IMAGEM_CAPA'];
                                    echo '<a href="'.$urlArtigo.'">';
                                    echo '<div id="descricaoSlide">';
                                    echo $descricaoArtigo;
                                    echo '</div></a>';
 echo '<a href="'.$urlArtigo.'"><img src="uploads/'.$imagemMini.'" class="imgGaleria"></a>';
                                    echo '</a>';
                            }
                            }
}
function buscarMateriasSlideX(){
                            $query = "SELECT * FROM ARTIGO  WHERE CATEGORIA_ARTIGO = 3 ORDER BY DATA_ARTIGO DESC";
                            $total_reg = "4";
                            $inicio = 0;
                            $limite = mysql_query("$query LIMIT $inicio,$total_reg"); 
                            $result = mysql_query($query);                
                            $tr = mysql_num_rows($result);
                            $tp = $tr / $total_reg;
                            if($tr === 0){
                                echo "Nenhum Artigo encontrado";
                            }
                            else{
                                while($artigos = mysql_fetch_array($limite))
                                {      
                                    $codigoImagem = $artigos['ID_ARTIGO'];
                                    $urlArtigo = $artigos['URL_ARTIGO'];
                                    $tituloArtigo = $artigos['TITULO_ARTIGO'];
                                    $descricaoArtigo = $artigos['DESCRICAO_ARTIGO'];
                                    $sql = "SELECT * FROM IMAGENS_MATERIA WHERE COD_MATERIA_IMAGEM = $codigoImagem";
                                    $resultado = mysql_query($sql);
                                    $artigos2 = mysql_fetch_array($resultado);
                                    $imagemMini = $artigos2['IMAGEM_PRINCIPAL'];
                                    $imagemCapa = $artigos2['IMAGEM_CAPA'];
                                    echo '<a href="'.$urlArtigo.'">';
                                    echo '<div id="descricaoSlide">';
                                    echo $descricaoArtigo;
                                    echo '</div></a>';
 echo '<a href="'.$urlArtigo.'"><img src="uploads/'.$imagemMini.'" class="imgGaleria"></a>';
                                    echo '</a>';
                            }
                            }
}
function buscarMateriasSlidePC(){
                            $query = "SELECT * FROM ARTIGO  WHERE CATEGORIA_ARTIGO = 4 ORDER BY DATA_ARTIGO DESC";
                            $total_reg = "4";
                            $inicio = 0;
                            $limite = mysql_query("$query LIMIT $inicio,$total_reg"); 
                            $result = mysql_query($query);                
                            $tr = mysql_num_rows($result);
                            $tp = $tr / $total_reg;
                            if($tr === 0){
                                echo "Nenhum Artigo encontrado";
                            }
                            else{
                                while($artigos = mysql_fetch_array($limite))
                                {      
                                    $codigoImagem = $artigos['ID_ARTIGO'];
                                    $urlArtigo = $artigos['URL_ARTIGO'];
                                    $tituloArtigo = $artigos['TITULO_ARTIGO'];
                                    $descricaoArtigo = $artigos['DESCRICAO_ARTIGO'];
                                    $sql = "SELECT * FROM IMAGENS_MATERIA WHERE COD_MATERIA_IMAGEM = $codigoImagem";
                                    $resultado = mysql_query($sql);
                                    $artigos2 = mysql_fetch_array($resultado);
                                    $imagemMini = $artigos2['IMAGEM_PRINCIPAL'];
                                    $imagemCapa = $artigos2['IMAGEM_CAPA'];
                                    echo '<a href="'.$urlArtigo.'">';
                                    echo '<div id="descricaoSlide">';
                                    echo $descricaoArtigo;
                                    echo '</div></a>';
 echo '<a href="'.$urlArtigo.'"><img src="uploads/'.$imagemMini.'" class="imgGaleria"></a>';
                                    echo '</a>';
                            }
                            }
}
function buscarMateriasSlideN(){
                            $query = "SELECT * FROM ARTIGO  WHERE CATEGORIA_ARTIGO = 2 ORDER BY DATA_ARTIGO DESC";
                            $total_reg = "4";
                            $inicio = 0;
                            $limite = mysql_query("$query LIMIT $inicio,$total_reg"); 
                            $result = mysql_query($query);                
                            $tr = mysql_num_rows($result);
                            $tp = $tr / $total_reg;
                            if($tr === 0){
                                echo "Nenhum Artigo encontrado";
                            }
                            else{
                                while($artigos = mysql_fetch_array($limite))
                                {      
                                    $codigoImagem = $artigos['ID_ARTIGO'];
                                    $urlArtigo = $artigos['URL_ARTIGO'];
                                    $tituloArtigo = $artigos['TITULO_ARTIGO'];
                                    $descricaoArtigo = $artigos['DESCRICAO_ARTIGO'];
                                    $sql = "SELECT * FROM IMAGENS_MATERIA WHERE COD_MATERIA_IMAGEM = $codigoImagem";
                                    $resultado = mysql_query($sql);
                                    $artigos2 = mysql_fetch_array($resultado);
                                    $imagemMini = $artigos2['IMAGEM_PRINCIPAL'];
                                    $imagemCapa = $artigos2['IMAGEM_CAPA'];
                                    echo '<a href="'.$urlArtigo.'">';
                                    echo '<div id="descricaoSlide">';
                                    echo $descricaoArtigo;
                                    echo '</div></a>';
 echo '<a href="'.$urlArtigo.'"><img src="uploads/'.$imagemMini.'" class="imgGaleria"></a>';
                                    echo '</a>';
                            }
                            }
}
function buscarMateriasPrincipal(){
    $query = "SELECT * FROM ARTIGO ORDER BY ID_ARTIGO DESC";
                            $total_reg = "1";
                            $inicio = 0;
                            $limite = mysql_query("$query LIMIT $inicio,$total_reg"); 
                            $result = mysql_query($query);                
                            $tr = mysql_num_rows($result);
                            $tp = $tr / $total_reg;
                            if($tr === 0){
                                echo "Nenhum Artigo encontrado";
                            }
                            else{
                                while($artigos = mysql_fetch_array($limite))
                                {      
                                    $codigoImagem = $artigos['ID_ARTIGO'];
                                    $urlArtigo = $artigos['URL_ARTIGO'];
                                    $tituloArtigo = $artigos['TITULO_ARTIGO'];
                                    $descricaoArtigo = $artigos['DESCRICAO_ARTIGO'];
                                    $sql = "SELECT * FROM IMAGENS_MATERIA WHERE COD_MATERIA_IMAGEM = $codigoImagem";
                                    $resultado = mysql_query($sql);
                                    $artigos2 = mysql_fetch_array($resultado);
                                    $imagemMini = $artigos2['IMAGEM_PRINCIPAL'];
                                    $imagemCapa = $artigos2['IMAGEM_CAPA'];
                                    echo '<a href="'.$urlArtigo.'">';
                                    echo '<div class="materiaPrincipal">';
                                    echo '';
                                    echo '<div id="descricaoImagemPrincipal">';
                                    echo '<p>'.$descricaoArtigo.'</P>';
                                    echo '</div>';                                   
                                    echo ' <img src="uploads/'.$imagemMini.'" alt="" id="imagemMaterias">';
                                    echo '</div>';
                                    echo '</a>';
                            }
                            }
}
function buscarMateriasPequenas(){
    $query = "SELECT * FROM ARTIGO ORDER BY ID_ARTIGO DESC";
                            $total_reg = "6";
                            $inicio = 0;
                            $limite = mysql_query("$query LIMIT $inicio,$total_reg"); 
                            $result = mysql_query($query);                
                            $tr = mysql_num_rows($result);
                            $tp = $tr / $total_reg;
                            if($tr === 0){
                                echo "Nenhum Artigo encontrado";
                            }
                            else{
                                while($artigos = mysql_fetch_array($limite))
                                {      
                                    $codigoImagem = $artigos['ID_ARTIGO'];
                                    $urlArtigo = $artigos['URL_ARTIGO'];
                                    $tituloArtigo = $artigos['TITULO_ARTIGO'];
                                    $descricaoArtigo = $artigos['DESCRICAO_ARTIGO'];
                                    $sql = "SELECT * FROM IMAGENS_MATERIA WHERE COD_MATERIA_IMAGEM = $codigoImagem";
                                    $resultado = mysql_query($sql);
                                    $artigos2 = mysql_fetch_array($resultado);
                                    $imagemMini = $artigos2['IMAGEM_PRINCIPAL'];
                                    $imagemCapa = $artigos2['IMAGEM_CAPA'];
                                    echo '<a href="'.$urlArtigo.'">';
                                    echo '<div class="materias">';
                                    echo '<div id="descricaoImagem">';
                                    echo '<p>'.$descricaoArtigo.'</P>';
                                    echo '</div>';                                   
                                    echo ' <img src="uploads/'.$imagemMini.'" alt="" id="imagemMaterias">';
                                    echo '</div>';
                                    echo '</a>';
                            }
                            }
}
function buscarImagemAutor($autor){
                    $query = "SELECT * FROM IMAGEM_USUARIO WHERE COD_IMAGEM_USUARIO = $autor";
                    $result = mysql_query($query);                
                    $imagens = mysql_num_rows($result);
                    if($imagens === 0){
                    $nome = "Default.jpg";            
                    mysql_query("INSERT INTO IMAGEM_USUARIO(URL_IMAGEM, COD_MATERIA_IMAGEM)
                    VALUES('$nome','22')");
                    }
                    else{
                    $imagens2 = mysql_fetch_array($result); 
                    $urlImagem = $imagens2['URL_IMAGEM'];
                    echo "<img src='../uploads/$urlImagem' alt='Imagem' id='imgAutor'>";
                    }
}
function buscarDescricaoUsuario($autor){
                    $query = "SELECT * FROM USUARIO WHERE COD_USUARIO = $autor";
                    $result = mysql_query($query);                
                    $imagens = mysql_num_rows($result);
                    $imagens2 = mysql_fetch_array($result); 
                    $urlImagem = $imagens2['DESCRICAO_USUARIO'];
                    echo "$urlImagem";
}
function buscarFotoUser(){
        echo '<meta charset=UTF-8>';
    if(!isset($_SESSION['email']) or !isset($_SESSION['senha'])){
        echo "<img src='../uploads/Default.jpg' id='imagemUsuario' alt='imagem'>";
    }
else{
                            $query = "SELECT * FROM IMAGEM_USUARIO WHERE COD_IMAGEM_USUARIO = ".$_SESSION['code'];
                            $result = mysql_query($query);                
                            $imagens = mysql_num_rows($result);
                            if($imagens === 0){
                            $nome = "default.jpg";            
                            mysql_query("INSERT INTO IMAGEM_USUARIO(URL_IMAGEM, COD_IMAGEM_USUARIO)
                            VALUES('$nome'".$_SESSION['code'].")");
                            }
                            else{
                            $imagens2 = mysql_fetch_array($result); 
                            $urlImagem = $imagens2['URL_IMAGEM'];
                            echo "<img src='../uploads/$urlImagem' id='imagemUsuario' alt='imagem'>";
                            }
}
}
function listarComentarios($string){
                            $query = "SELECT * FROM COMENT WHERE CODIGO_MATERIA = $string  ORDER BY COD_COMENT DESC";
                            $result = mysql_query($query);                
                            $imagens = mysql_num_rows($result);
                            while($comentarios = mysql_fetch_array($result)){ 
                            $comentario = $comentarios['CONTEUDO_COMENT'];
                            $codComent = $comentarios['COD_COMENT'];
                            $dataComent = $comentarios['DATA_COMENT'];
                                    $ano = substr($dataComent, 0, 4);
                                    $mes = substr($dataComent, 5, 2);
                                    $dia = substr($dataComent, 8, 2);
                            $horaComent = $comentarios['HORA_COMENT'];    
                                    $hora = substr($horaComent, 0, 2);
                                    $min = substr($horaComent, 3, 2);
                            $codigoUser = $comentarios['COD_USUARIO'];
                            $query2 = "SELECT * FROM USUARIO WHERE COD_USUARIO = $codigoUser";
                            $resultado1 = mysql_query($query2);
                            $usuarios = mysql_fetch_array($resultado1);
                            $nomeUser = $usuarios['NOME_USUARIO'];
                            $sql = "SELECT * FROM IMAGEM_USUARIO WHERE COD_IMAGEM_USUARIO = $codigoUser";
                            $resultado = mysql_query($sql);                
                            $imagens2 = mysql_fetch_array($resultado); 
                            $urlImagem = $imagens2['URL_IMAGEM'];
                            echo '<figure class="imagem_user">'; 
                            echo "<img src='../uploads/$urlImagem' class='imagemUsuario' alt='imagem'>";
                            echo '</figure>';
                            echo '<div class="coment">';
                            echo '<form action="../removerComent.php" method="post">';
                            echo "<input type='text' class='nome_comentario' readonly='readonly' disabled='disabled' name='nomeUserComent' value='$nomeUser'>";
                            echo "<input type='text'  id='data_comentario' readonly='readonly' disabled='disabled' name='dataComent' value='$hora:$min, $dia / $mes / $ano'>";
                            echo "<input type='text' class='texto_comentario' readonly='readonly' disabled='disabled' name='textComentario' value='$comentario'>";
                            echo "</form>";
                            echo '</div>';
                            }
}
function buscarUrlVideo($code,$url){
                    $query = "SELECT URLVIDEO1,URLVIDEO2 FROM ARTIGO WHERE ID_ARTIGO = $code";
                    $result = mysql_query($query);                
                    $videos = mysql_num_rows($result);
                    $videos2 = mysql_fetch_array($result);

                    $urlVideo1 = $videos2['URLVIDEO1'];
                    $urlVideo2 = $videos2['URLVIDEO2'];
                    if($urlVideo1 === ''){
                        echo '<script>document.getElementById("galeriaVideo").style.display = "none";</script>';
                    }
                    else{
                    if($url == 'urlVideo1'){
                    echo "<div id='video1'>";
                    echo "<iframe width='370' id='iframeVideo1' height='245' src='$urlVideo1' frameborder='0' allowfullscreen></iframe>";
                    echo "</div>";
                    }                   
                    if($url == 'urlVideo2'){
                    echo "<div id='video2'>";
                    echo "<iframe width='370' id='iframeVideo2' height='245' src='$urlVideo2' frameborder='0' allowfullscreen></iframe>";
                    echo "</div>";
                    }  
                    }
                    }
function acrescentarAcessos($id){
                    $query = "SELECT * FROM ARTIGO WHERE ID_ARTIGO = $id";
                    $result = mysql_query($query);                
                    $acessos = mysql_num_rows($result);
                    $acessos2 = mysql_fetch_array($result); 
                    $totalAcessos = $acessos2['ACESSOS'];
                    $totalAcessos = $totalAcessos + 1;
                    $sql = "UPDATE ARTIGO SET ACESSOS = $totalAcessos WHERE ID_ARTIGO = $id";
                    mysql_query($sql);
}
function buscarDescAutor($id){
                    $query = "SELECT * FROM USUARIO WHERE COD_USUARIO = $id";
                    $result = mysql_query($query);                
                    $descricaoUser = mysql_num_rows($result);
                    $descricaoUser2 = mysql_fetch_array($result); 
                    $resultDescricao = $descricaoUser2['DESCRICAO_USUARIO'];
                    echo $resultDescricao;
}

?>

