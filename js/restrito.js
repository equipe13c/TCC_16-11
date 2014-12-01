            function alterarDados(){
                var alterar = document.getElementById("conteudo_infos");
                alterar.innerHTML = "";
            }

            function edit(valor,valor2){
                if(valor === "email"){
                    var email = document.getElementById("conteudo_infos");
                    email.innerHTML = '<form action="update.php" method="post" name="formCad">'
                            +'<table id="tabelaPerfil" class="editEmailTable">'
                        +'<tr class="linhasInfo" id="toplinha">'
                            +'<td class="icone2"><img src="../imagens/mail.png" alt="imgMail" id="mailImg"></td>'
                            +'<td class="info2">E-mail Atual</td>'
                            +'<td class="campos2"><input type="text" disabled="disabled" name="email_usuario"  class="txtInfo2" id="emailInfo"  value="'+valor2+'"></td>'
                            +'<td class="valid"></td>'
                        +'</tr>'
                        +'<tr class="linhasInfo">'
                            +'<td class="icone2"><img src="../imagens/mail.png" alt="imgMail" id="mailImg"></td>'
                            +'<td class="info2">Novo e-mail</td>'
                            +'<td class="campos2"><input type="text" name="confirmemail_usuario" class="txtInfo2" id="emailInfo1" onblur="validacaoEmail(formCad.confirmemail_usuario,'+"'"+ 'valid1 '+"'"+');"   value="'+valor2+'"></td>'
                            +'<td class="valid" id="valid1"></td>'
                        +'<tr class="linhasInfo">'
                            +'<td class="icone2"><img src="../imagens/mail.png" alt="imgMail" id="mailImg"></td>'
                            +'<td class="info2">Confirmar e-mail</td>'
                            +'<td class="campos2"><input type="text" name="confirmemail_usuario2" class="txtInfo2" id="emailInfo2" onblur="validacaoEmail(formCad.confirmemail_usuario2, '+"'"+ 'valid2 '+"'"+');"  value="'+valor2+'"></td>'
                            +'<td class="valid" id="valid2"> </td>'
                        +'</tr>'
                        +'<tr class="linhasInfo" id="bottomlinha">'
                            +'<td class="salvarEdit" colspan="2"><input type="submit" value="Salvar Alterações" name="salvarDados" class="designButton"></td>'
                            +'<td class="salvarEdit" colspan="2"><input type="submit" value="Retornar" name="Retornar" class="designButton"></td>'
                        +'</tr>'
                    +'</table>'
                    +'</form>';
                }
                if(valor === "nome"){
                    document.getElementById(valor+"Info").disabled = false;
                    document.getElementById(valor+"Info").style.backgroundColor = "#FFF";
                    document.getElementById(valor+"Info").style.color = "#000";
                    document.getElementById(valor+"Info").focus();
                    var salvar =  document.getElementById("salvarName");
                    salvar.innerHTML = '<input class="bsalvar" type="submit" value="Salvar" name="salvarNome">';
                }
                
                if(valor === "apelido"){
                    document.getElementById(valor+"Info").disabled = false;
                    document.getElementById(valor+"Info").style.backgroundColor = "#FFF";
                    document.getElementById(valor+"Info").style.color = "#000";
                    document.getElementById(valor+"Info").focus();
                    var salvar =  document.getElementById("salvarApel");
                    salvar.innerHTML = '<input class="bsalvar" type="submit" value="Salvar" name="salvarApelido">';
                }
                if(valor === "cidade"){
                    document.getElementById(valor+"Info").disabled = false;
                    document.getElementById(valor+"Info").style.backgroundColor = "#FFF";
                    document.getElementById(valor+"Info").style.color = "#000";
                    document.getElementById(valor+"Info").focus();
                    var salvar =  document.getElementById("salvarCid");
                    salvar.innerHTML = '<input class="bsalvar" type="submit" value="Salvar" name="salvarEstado">';
                }
                if(valor === "comentario"){
                    document.getElementByClassName(valor).disabled = false;
                    document.getElementByClassName(valor).style.backgroundColor = "#FFF";
                    document.getElementByClassName(valor).style.color = "#000";
                    document.getElementByClassName(valor).focus();
                    var salvar =  document.getElementById("salvarCid");
                    salvar.innerHTML = '<input class="bsalvar" type="submit" value="Salvar" name="salvarEstado">';
                }
                if(valor === "removeComentario"){
                    document.getElementByClassName(valor).disabled = false;
                    document.getElementByClassName(valor).style.backgroundColor = "#FFF";
                    document.getElementByClassName(valor).style.color = "#000";
                    document.getElementByClassName(valor).focus();
                    var salvar =  document.getElementById("salvarCid");
                    salvar.innerHTML = '<input class="bsalvar" type="submit" value="Salvar" name="salvarEstado">';
                }
            }
             
            function validacaoEmail(field,idiv) { 
            var email = document.getElementById('emailInfo1').value;
            var confirm = document.getElementById('emailInfo2').value;

            if(email == confirm){
            usuario = field.value.substring(0, field.value.indexOf("@")); 
            dominio = field.value.substring(field.value.indexOf("@")+ 1, field.value.length); 
            if ((usuario.length >=1) && (dominio.length >=3) && (usuario.search("@")==-1) && (dominio.search("@")==-1) && (usuario.search(" ")==-1) && (dominio.search(" ")==-1) && (dominio.search(".")!=-1) && (dominio.indexOf(".") >=1)&& (dominio.lastIndexOf(".") < dominio.length - 1)) 
            { 
            document.getElementById('valid1').innerHTML='<img src="../imagens/ico_valid.gif" alt="imgValid" class="validacaoOK">';
            document.getElementById('valid2').innerHTML='<img src="../imagens/ico_valid.gif" alt="imgValid" class="validacaoOK">';
            }
            else{ 
            document.getElementById('valid1').innerHTML='<img src="../imagens/ico_unvalid.gif" alt="imgValid" class="validacaoOK">';
            document.getElementById('valid2').innerHTML='<img src="../imagens/ico_unvalid.gif" alt="imgValid" class="validacaoOK">';
            } 
            }
            else{
            document.getElementById('valid1').innerHTML='<img src="../imagens/ico_unvalid.gif" alt="imgValid" class="validacaoOK">';
            document.getElementById('valid2').innerHTML='<img src="../imagens/ico_unvalid.gif" alt="imgValid" class="validacaoOK">';
            confirm.focus();
            }
            } 
            function mostrarCam(){
            var mostrar = document.getElementById("camera");
            mostrar.innerHTML = '<img src="../imagens/camera.png" class="imgCamera" alt="imgCamera">';
            }
            function retirarCam(){
            var retirar = document.getElementById("camera");
            retirar.innerHTML = '<img src="../imagens/fundoTransparente.png"  class="imgCamera" alt="imgCamera">';
            }
            function mostrarLinks(){
            var mostrar = document.getElementById("menuImagem");
            mostrar.innerHTML = '<div id="menuImg">\n\
                                <ul>\n\
                                <li><a href="#"></a>\n\
                                <ul >\n\
                                <li class="sub" ><a href="alterarImg.php"><img src="../imagens/editBranca.png" alt="removeImage" id="editImgFoto"  >    Alterar imagem</a></li>\n\
                                <li class="sub" ><a href="removerImg.php"><img src="../imagens/removeImg.png" alt="removeImage" class="editImgFoto">    Remover imagem</a></li>\n\
                                </ul>\n\
                                </li>\n\
                                </ul>\n\
                                </div>';
            }
            function retirarLinks(){
            var mostrar = document.getElementById("menuImagem");
            mostrar.innerHTML = '';
            }

function validaSenha(){
    var senha = document.getElementById('senhaInfo1').value;
    var confirmsenha = document.getElementById('senhaInfo2').value;
    if((senha == '') && (confirmsenha == '')){
    document.getElementById('valid1').innerHTML="<img src='../imagens/ico_unvalid.gif' alt='Senha Inválida'>";
    document.getElementById('valid2').innerHTML="<img src='../imagens/ico_unvalid.gif' alt='Senha Inválida'>";
    }
    else{
    if(senha == confirmsenha){
    document.getElementById('valid1').innerHTML="<img src='../imagens/ico_valid.gif' alt='Senha Válida'>";
    document.getElementById('valid2').innerHTML="<img src='../imagens/ico_valid.gif' alt='Senha Válida'>";    
    }
    else{
    document.getElementById('valid1').innerHTML="<img src='../imagens/ico_unvalid.gif' alt='Senha Inválida'>";
    document.getElementById('valid2').innerHTML="<img src='../imagens/ico_unvalid.gif' alt='Senha Inválida'>";
    confirmsenha.focus();
        }
    }
}
