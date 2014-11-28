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
function validaCadastro(form){    
    if (form.nome.value==""){
        alert("Preencha o nome corretamente.");
        form.nome.focus();
        return false;
    }   
    if (form.apelido.value==""){
        alert("Preencha o apelido corretamente.");
        form.apelido.focus();
        return false;
    }          
    var filtro_mail = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    if (!filtro_mail.test(form.email.value) || form.email.value==""){
        alert("Preencha o E-mail corretamente.");
        form.email.focus();
        return false;
    }
    if (!filtro_mail.test(form.confirmaEmail.value) || form.confirmaEmail.value==""){
        alert("Confirme seu E-mail corretamente.");
        form.confirmaEmail.focus();
        return false;
    }
    if (form.email.value!=form.confirmaEmail.value){
        alert("O E-mail e a confirmação devem ser iguais");
        form.confirmaEmail.focus();
        return false;
    }
    if (form.senha.value==""){
        alert("Preencha a senha corretamente.");
        form.senha.focus();
        return false;
    }
    if (form.senha.value=="" || form.senha.value.length < 8){
        alert("A senha deve conter pelo menos 8 dígitos.");
        form.senha.focus();
        return false;
    }                
    if (form.confirmaSenha.value=="" || form.confirmaSenha.value.length < 8){
        alert("Preencha a confirmação de senha corretamente.");
        form.confirmaSenha.focus();
        return false;
    }
    if (form.senha.value!=form.confirmaSenha.value){
        alert("A senha e a confirmação devem de ser iguais.");
        form.confirmaSenha.focus();
        return false;
    }
    if (form.dataNascimento.value==""){
        alert("Preencha a data de nascimento da seguinte forma: dd/mm/aaa.");
        form.dataNascimento.focus();
        return false;
    }
     if (form.termos.checked == false ){
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