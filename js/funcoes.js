function loginE(){
    document.getElementById('msglogin').innerHTML = "<h3 class='msgloginE'>Login Efetuado</h3>";
    setTimeout("window.location.href ='index.php'",3000);
}
function loginF(){
    document.getElementById('msglogin').innerHTML = "<h3 class='msgloginF'>Senha Inválida</h3>";
}
function loginF2(){
    document.getElementById('msglogin').innerHTML = "<h3 class='msgloginF'>Usuário Inválido</h3>";
}
function loginF3(){
    document.getElementById('msglogin').innerHTML = "<h3 class='msgloginF'>Usuário Desativado</h3>";
}
function loginF4(){
    document.getElementById('msglogin').innerHTML = "<h3 class='msgloginF'>Usuário Não Encontrado</h3>";
}
function cadastroF(){
    document.getElementById('msgCad').innerHTML = "<h3 class='msgloginF'>Captcha Incorreto</h3>";
}
function cadastroF2(){
    document.getElementById('msgCad').innerHTML = "<h3 class='msgloginF'>E-mail ou Senha nao conferem</h3>";
}
function cadastroF3(){
    document.getElementById('msgCad').innerHTML = "<h3 class='msgloginF'>Campo de E-mail não Definidos</h3>";
}
function cadastroF4(){
    document.getElementById('msgCad').innerHTML = "<h3 class='msgloginF'>E-mail Inválido</h3>";
}
function cadastroF5(){
    document.getElementById('msgCad').innerHTML = "<h3 class='msgloginF'>E-mail já Cadastrado</h3>";
}
function cadastroE(){
    document.getElementById('msgCadastro2').innerHTML = '<div id="msgCadastro">'+
                    '<p> Cadastro realizado com sucesso. </p>'+
                '</div>';
}

function mostraOculta(opc, id, id2){  
     var textbox = document.getElementById(id);
     var textbox2 = document.getElementById(id2);  
                if(document.getElementById(opc).value == 'Multiplataforma'){  
                        if(textbox.style.display == 'none'){  
                            textbox.style.display = 'inline';  
                        }  
                    }else {  
                        textbox.style.display = 'none';  
                    }  
                    if(document.getElementById(opc).value == 'Outro'){  
                        if(textbox2.style.display == 'none'){  
                            textbox2.style.display = 'inline';  
                        }  
                    }else {  
                        textbox2.style.display = 'none';  
                    }  
                } 
                

                !window.jQuery && document.write('<script src="http://tecnowarez.com/site/scripts/js/jquery-1.4.3.min.js"><\/script>');
                function preview(input, tipo) {
                    if(tipo == 'capa'){
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
 
                    reader.onload = function (e) {
                            $('#preview_imageCapa')
                .attr('src', e.target.result)
                                    .width(950)
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
                    if(tipo == 'principal'){
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
 
                    reader.onload = function (e) {
                            $('#preview_image')
                .attr('src', e.target.result)
                                    .width(400)
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
            
                    if(tipo == 'galeria1'){
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
 
                    reader.onload = function (e) {
                            $('#preview_imageGaleria1')
                .attr('src', e.target.result)
                                    .width(255)
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
            
                    if(tipo == 'galeria2'){
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
 
                    reader.onload = function (e) {
                            $('#preview_imageGaleria2')
                .attr('src', e.target.result)
                                    .width(255)
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
            
                    if(tipo == 'galeria3'){
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
 
                    reader.onload = function (e) {
                            $('#preview_imageGaleria3')
                .attr('src', e.target.result)
                                    .width(255)
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
            }


 function mostraOculta2(opc, id){  
     var textbox = document.getElementById(id); 
     if(id=='categorias'){
                        document.getElementById("imgPrincipal").style.backgroundColor = "#00989E";
                        document.getElementById("tituloMateria").style.backgroundColor = "#00989E";               
                        document.getElementById("fundoDescricaoMateria").style.backgroundColor = "#26C8D1";
     }

                if(document.getElementById(opc).checked){

                        if(textbox.style.display == 'none'){  
                           textbox.style.display = 'inline';  
                           document.getElementById("imgPrincipal").style.marginTop = "460px";
                                            }  
                    }else {  
                        textbox.style.display = 'none'; 

                    }                  
                }                 
                function ocultar(id,tipo){
                    document.getElementById(id).style.display = 'none';
                    document.getElementById("imgPrincipal").style.marginTop = "390px";
                    if(document.getElementById('checkboxNintendo').checked == true){
                        document.getElementById('checkboxNintendo').checked = false;
                    }
                    if(tipo=='nintendo'){
                        document.getElementById("imgPrincipal").style.backgroundColor = "#009FE3";
                        document.getElementById("tituloMateria").style.backgroundColor = "#009FE3";               
                        document.getElementById("fundoDescricaoMateria").style.backgroundColor = "#CEECF5";
                    }
                    if(tipo=='ps'){
                        document.getElementById("imgPrincipal").style.backgroundColor = "#9C1006";
                        document.getElementById("tituloMateria").style.backgroundColor = "#9C1006";               
                        document.getElementById("fundoDescricaoMateria").style.backgroundColor = "#FCC6C0";
                    }
                    if(tipo=='pc'){
                        document.getElementById("imgPrincipal").style.backgroundColor = "#F39200";
                        document.getElementById("tituloMateria").style.backgroundColor = "#F39200";               
                        document.getElementById("fundoDescricaoMateria").style.backgroundColor = "#F7D47F";
                    }
                    if(tipo=='xbox'){
                        document.getElementById("imgPrincipal").style.backgroundColor = "#8EA50D";
                        document.getElementById("tituloMateria").style.backgroundColor = "#8EA50D";               
                        document.getElementById("fundoDescricaoMateria").style.backgroundColor = "#A9F5D0";
                    }

                }
                
                function previewVideo(info,id, id2){
                    if(document.getElementById(info).value == ""){
                        var urlVideo = document.getElementById(info);
                        urlVideo.style.border = "1px solid red";
                        urlVideo.focus();
                        
                    }
                    else{
                    if(id2 == 'galeriaVideo1'){
                    var urlVideo = document.getElementById("urlVideo1").value;  
                    var res = urlVideo.replace("watch?v=", "embed/");                   
                    document.getElementById(id).src = res;
                    document.getElementById("video1").style.display = 'inline'; 
                    }
                    if(id2 == 'galeriaVideo2'){
                    var urlVideo = document.getElementById("urlVideo2").value;                   
                    var res = urlVideo.replace("watch?v=", "embed/");                   
                    document.getElementById(id).src = res;
                    document.getElementById("video2").style.display = 'inline';
                    }
                }
                }
                function retirarVideo(id, id2){
                    if(id2 == 'galeriaVideo1'){
                    document.getElementById("urlVideo1").value = "";  
                    document.getElementById("video1").style.display = 'none'; 
                    }
                    if(id2 == 'galeriaVideo2'){
                    document.getElementById("urlVideo2").value = "";  
                    document.getElementById("video2").style.display = 'none';
                    }
                }

                