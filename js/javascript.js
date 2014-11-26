//Menu Dropdown
(function($) {

  $.fn.menumaker = function(options) {
      
      var menu = $(this), settings = $.extend({
        title: "menu",
        format: "dropdown",
        sticky: false
      }, options);

      return this.each(function() {
        menu.prepend('<div id="menu-button">' + settings.title + '</div>');
        $(this).find("#menu-button").on('click', function(){
          $(this).toggleClass('menu-opened');
          var mainmenu = $(this).next('ul');
          if (mainmenu.hasClass('open')) { 
            mainmenu.hide().removeClass('open');
          }
          else {
            mainmenu.show().addClass('open');
            if (settings.format === "dropdown") {
              mainmenu.find('ul').show();
            }
          }
        });

        menu.find('li ul').parent().addClass('sub');

        multiTg = function() {
          menu.find(".sub").prepend('<span class="submenu-button"></span>');
          menu.find('.submenu-button').on('click', function() {
            $(this).toggleClass('submenu-opened');
            if ($(this).siblings('ul').hasClass('open')) {
              $(this).siblings('ul').removeClass('open').hide();
            }
            else {
              $(this).siblings('ul').addClass('open').show();
            }
          });
        };

        if (settings.format === 'multitoggle') multiTg();
        else menu.addClass('dropdown');

        if (settings.sticky === true) menu.css('position', 'fixed');

        resizeFix = function() {
          if ($( window ).width() > 768) {
            menu.find('ul').show();
          }

          if ($(window).width() <= 768) {
            menu.find('ul').hide().removeClass('open');
          }
        };
        resizeFix();
        return $(window).on('resize', resizeFix);

      });
  };
})(jQuery);

jQuery(function($){
    var elementoMenu = $("#nav");
    var posicaoMenu = elementoMenu.offset().top;
    $(window).scroll(function(){
        var posicaoAtualScroll = $(window).scrollTop();
        if(posicaoAtualScroll > posicaoMenu){
            elementoMenu.addClass('contentFullFixed');
        } 
        else{
            elementoMenu.removeClass('contentFullFixed');
        }
    });
});

(function($){
    $(document).ready(function(){
        $(document).ready(function() {
            $("#menu").menumaker({
                title: "Menu",
                format: "multitoggle"
            });
            $("#menu").prepend("<div id='menu-line'></div>");
            var foundActive = false, activeElement, linePosition = 0, menuLine = $("#menu #menu-line"), lineWidth, defaultPosition, defaultWidth;
            $("#menu > ul > li").each(function() {
                if ($(this).hasClass('active')) {
                    activeElement = $(this);
                    foundActive = true;
                }
            });

            if (foundActive === false) {
                activeElement = $("#menu > ul > li").first();
            }
            defaultWidth = lineWidth = activeElement.width();
            defaultPosition = linePosition = activeElement.position().left;
            menuLine.css("width", lineWidth);
            menuLine.css("left", linePosition);
            $("#menu > ul > li").hover(function() {
                activeElement = $(this);
                lineWidth = activeElement.width();
                linePosition = activeElement.position().left;
                menuLine.css("width", lineWidth);
                menuLine.css("left", linePosition);
            }, 
            function() {
                menuLine.css("left", defaultPosition);
                menuLine.css("width", defaultWidth);
            });
        });
    });
})(jQuery);

//Slideshow
$(document).ready(function(){
               $('#slide').before('<img id="controleGaleria">').cycle({
                   fx: 'fade',
                   pause: true,
                   timeout: 6000,
                   next: '#next',
                   prev: '#prev'
               }); 
            }); 


//Botão Voltar ao Topo
$(document).ready(function(){
    $(window).scroll(function(){
       if($(this).scrollTop() > 600){
           $('.subir').fadeIn();
       }
       else{
           $('.subir').fadeOut();
       }
    }); 
    $('.subir').click(function(){
        $('html, body').scroll({ scrollTop: 0}, 5000);
    });
});

//Menu Reduzido
$(document).ready(function(){
    $(window).scroll(function(){
       if($(this).scrollTop() > 300){
           $('#navReduzido').fadeIn();
           $('#nav').fadeOut();
           $('#logar').fadeOut();
       }
       else{
           $('#navReduzido').fadeOut();
           $('#nav').fadeIn();           
           $('#logar').fadeIn();
       }
    }); 
});

//Validação de Login
function validaLogin(form){
    var filtro_mail = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    if (!filtro_mail.test(form.emailLogin.value)){
        alert("Preencha o E-mail corretamente.");
        form.emailLogin.focus();
        return false;
    }
    if (!filtro_mail.test(form.emailLogin.value) || form.emailLogin.value==""){
        alert("Preencha o E-mail corretamente.");
        form.emailLogin.focus();
        return false;
    }
    if (form.senhaLogin.value==""){
        alert("Preencha a senha corretamente.");
        form.senhaLogin.focus();
        return false;
    }
    if (form.senhaLogin.value=="" || form.senhaLogin.value.length < 8){
        alert("A senha deve conter pelo menos 8 dígitos.");
        form.senhaLogin.focus();
        return false;
    } 
};

//Validação de Cadastro
function validaCadastro(formCad){    
    if (formCad.nome.value==""){
        alert("Preencha o nome corretamente.");
        formCad.nome.focus();
        return false;
    }   
    if (formCad.apelido.value==""){
        alert("Preencha o apelido corretamente.");
        formCad.apelido.focus();
        return false;
    }          
    var filtro_mail = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    if (!filtro_mail.test(formCad.email.value) || formCad.email.value==""){
        alert("Preencha o E-mail corretamente.");
        formCad.email.focus();
        return false;
    }
    if (!filtro_mail.test(formCad.confirmemail.value) || formCad.confirmemail.value==""){
        alert("Confirme seu E-mail.");
        formCad.confirmemail.focus();
        return false;
    }
  
    if (formCad.confirmemail.value!=formCad.email.value){
        alert("O e-mail e a confirmação devem ser iguais");
        formCad.confirmemail.focus();
        return false;
        
    }
    if (formCad.senha.value==""){
        alert("Preencha a senha corretamente.");
        formCad.senha.focus();
        return false;
    }
    if (formCad.senha.value=="" || formCad.senha.value.length < 8){
        alert("A senha deve conter pelo menos 8 dígitos.");
        formCad.senha.focus();
        return false;
        
    } 
    
    if (formCad.confirmsenha.value!=formCad.senha.value){
        alert("O senha e a confirmação devem ser iguais");
        formCad.confirmsenha.focus();
        return false;
        
    }
    
    if (formCad.data.value==""){
        alert("Preencha a data de nascimento corretamente");
        formCad.data.focus();
        return false;
    }
     if (formCad.termos.checked == false ){
        alert("Você deve aceitar os Temos de Uso para se cadastrar.");
        return false;
    }
    else{ return true;}
};

//Validação Contato
function validaContato(form){
    if (form.nomeContato.value==""){
        alert("Preencha o nome corretamente.");
        form.nomeContato.focus();
        return false;
    }  
    var filtro_mail = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;    
    if (!filtro_mail.test(form.emailContato.value) || form.emailContato.value==""){
        alert("Preencha o E-mail corretamente.");
        form.emailContato.focus();
        return false;
    }
};  

//Validação de Senha
function validaCad(form){
if (form.senhaAtual.value==""){
        alert("Preencha a senha corretamente.");
        form.senhaAtual.focus();
        return false;
    }
    if (form.senhaAtual.value=="" || form.senhaAtual.value.length < 8){
        alert("A senha deve conter pelo menos 8 dígitos.");
        form.senhaAtual.focus();
        return false;
    }          
    if (form.senhaUser.value==""){
        alert("Preencha a senha corretamente.");
        form.senhaUser.focus();
        return false;
    }
    if (form.senhaUser.value=="" || form.senhaUser.value.length < 8){
        alert("A senha deve conter pelo menos 8 dígitos.");
        form.senhaUser.focus();
        return false;
    } 
    
    
    if (form.senhaUser.value=="" || form.confirmesenhaUser.value.length < 8){
        alert("Preencha a confirmação de senha corretamente.");
        form.confirmesenhaUser.focus();
        return false;
    }
    if (form.senhaUser.value!=form.confirmesenhaUser.value){
        alert("A senha e a confirmação devem de ser iguais.");
        form.confirmesenhaUser.focus();
        return false;
    }
};

      
function validaInserir(form){
if (form.imagemCapa.value==""){
        document.getElementById('preview_imageCapa').style.border = "1px solid red";
        form.imagemCapa.focus();
        return false;
    }
    else{
        document.getElementById('preview_imageCapa').style.border = "0px";
    }
if (form.imagemPrincipal.value==""){
        document.getElementById('preview_image').style.border = "1px solid red";
        form.imagemPrincipal.focus();
        return false;
    }
    else{
        document.getElementById('preview_image').style.border = "0px";
    }
if (form.titulo_conteudo.value==""){
        document.getElementById('titulo_materia').style.border = "1px solid red";
        form.titulo_conteudo.focus();
        return false;
    }
    else{
        document.getElementById('titulo_materia').style.border = "0px";
    }
if (form.descricao.value==""){
        document.getElementById('descricao_materia').style.border = "1px solid red";
        form.descricao.focus();
        return false;
    }
    else{
        document.getElementById('descricao_materia').style.border = "0px";
    }
if (form.plataforma.value==""){
        document.getElementById('ids').style.border = "1px solid red";
        form.plataforma.focus();
        return false;
    }
    else{
        document.getElementById('ids').style.border = "0px";
    }
    if(document.getElementById('multiPlataformas'.style.display == 'inline')){
        if (form.multiPlataforma.value==""){
            document.getElementById('multiPlataformas').style.border = "1px solid red";
            form.multiPlataforma.focus();
            return false;
        }
        else{
            document.getElementById('multiPlataformas').style.border = "0px";
        }
    }
    if(document.getElementById('outrasPlataformas'.style.display == 'inline')){
        if (form.outrasPlataforma.value==""){
            document.getElementById('outrasPlataformas').style.border = "1px solid red";
            form.outrasPlataforma.focus();
            return false;
        }
        else{
            document.getElementById('outrasPlataformas').style.border = "0px";
        }
    }
    
if (form.data_lancamento.value==""){
        document.getElementById('data_lancamento').style.border = "1px solid red";
        form.data_lancamento.focus();
        return false;
    }
    else{
        document.getElementById('data_lancamento').style.border = "0px";
    }
if (form.subtitulo.value==""){
        document.getElementById('subtitulo_materia').style.border = "1px solid red";
        form.subtitulo.focus();
        return false;
    }
    else{
        document.getElementById('subtitulo_materia').style.border = "0px";
    }
    ///
if (form.conteudo.value==""){
        document.getElementById('campoConteudo1').style.border = "1px solid red";
        form.conteudo.focus();
        return false;
    }
    else{
        document.getElementById('campoConteudo1').style.border = "0px";
    }
    //galeria
 if (form.imagemGaleria.value==""){
        document.getElementById('preview_imageGaleria1').style.border = "1px solid red";
        form.imagemGaleria.focus();
        return false;
    }
    else{
        document.getElementById('preview_imageGaleria1').style.border = "0px";
    }
    
 if (form.imagemGaleria2.value==""){
        document.getElementById('preview_imageGaleria2').style.border = "1px solid red";
        form.imagemGaleria2.focus();
        return false;
    }
    else{
        document.getElementById('preview_imageGaleria2').style.border = "0px";
    }
    
 if (form.imagemGaleria3.value==""){
        document.getElementById('preview_imageGaleria3').style.border = "1px solid red";
        form.imagemGaleria3.focus();
        return false;
    }
    else{
        document.getElementById('preview_imageGaleria3').style.border = "0px";
    }
    //Videos
 if (form.urlVideo1.value==""){
        document.getElementById('urlVideo1').style.border = "1px solid red";
        form.urlVideo1.focus();
        return false;
    }
    else{
        document.getElementById('urlVideo1').style.border = "0px";
    }
    
 if (form.urlVideo2.value==""){
        document.getElementById('urlVideo2').style.border = "1px solid red";
        form.urlVideo2.focus();
        return false;
    }
    else{
        document.getElementById('urlVideo2').style.border = "0px";
    }
    
 if (form.url_materia.value==""){
        document.getElementById('urlMaterias').style.border = "1px solid red";
        form.url_materia.focus();
        return false;
    }
    else{
        document.getElementById('urlMaterias').style.border = "0px";
    }

};