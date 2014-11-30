<!DOCTYPE html>
<html>
    <head>
        <title>Novo Usuário</title>
         <link rel="stylesheet" type="text/css" href="css/style2.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <script type="text/javascript" src="../js/validacoes.js"> </script>
         <script type="text/javascript" src="../js/javascript.js"></script>
    </head>
    <body>
        <?php include "../conexao/conecta.inc";
include '../includes/funcoesUteis.inc';
validaAutenticacao('../index.php', '1');
?>
        <fieldset id="frmNovoUsuario">
        <form action="inserirUsuarioNovo.php" name="formCad" method="post" id="cadastrarForm" onsubmit="return validaCadastro(this);">
                            <div id="campos">
                                <p> Nome: </p> <input type="text" name="nome" placeholder="Nome" class="campos"> 
                            </div>
                            <div id="campos">
                                <p> Apelido: </p> <input type="text" name="apelido" placeholder="Apelido" class="campos">
                            </div>
                            <div id="campos">
                                <p> E-mail: </p> <input type="text" name="email" placeholder="E-mail" class="campos">
                            </div>   
                            <div id="campos">
                                <p> Confirmar E-mail: </p> <input type="text" name="confirmemail" placeholder="Confirmar E-mail" class="campos">
                            </div>
                            <div id="campos">
                                <p> Senha: </p> <input type="password" name="senha" placeholder="Senha" class="campos">
                            </div>
                            <div id="campos">
                                <p> Confirmar Senha: </p> <input type="password" name="confirmsenha" placeholder="Confirmar Senha" class="campos">
                            </div>
                            <div id="campos">
                                <p> Data de Nascimento: </p> <input type="text" name="data" placeholder="dd/mm/aaaa" onKeyPress="MascaraData(formCad.data);" maxlength="10" onBlur="validarData(formCad.data);" class="campos">
                            </div>
                           
                               <p>Tipo:</p>
             <select name="tipoUser">
                 <option value="1" selected>Administrador</option>
                 <option value="2" selected>Restrito</option>
                    <option value="3">Colunista</option>
             </select>
                                
                            <br/><br/>
                            
                            <input type="reset" value="Limpar" class="botaoForm"/>
                            <input type="submit" value="Cadastrar" class="botaoForm"/>
                            <br/><br/>                     
                        </form>
        </fieldset>
   </body>
</html>

