 function validaInserir(form){
if (form.imagemCapa.value==""){
        document.getElementById('previewCapa').style.border = '1px solid red';
        form.imagemCapa.focus();
        return false;
    }
if (form.imagemPrincipal.value==""){
        document.getElementById('previewPrincipal').style.border = '1px solid red';
        form.imagemPrincipal.focus();
        return false;
    }
if (form.titulo_conteudo.value==""){
        document.getElementById('titulo_materia').style.border = '1px solid red';
        form.titulo_conteudo.focus();
        return false;
    }
if (form.descricao.value==""){
        document.getElementById('descricao_materia').style.border = '1px solid red';
        form.descricao.focus();
        return false;
    }
if (form.plataforma.value==""){
        document.getElementById('ids').style.border = '1px solid red';
        form.plataforma.focus();
        return false;
    }
if(document.getElementById('multiPlataformas').style.display == 'inline'){
if (form.multiPlataforma.value==""){
        document.getElementById('multiPlataformas').style.border = '1px solid red';
        form.multiPlataforma.focus();
        return false;
    }
}
if(document.getElementById('outrasPlataformas').style.display == 'inline'){
if (form.outraPlataforma.value==""){
        document.getElementById('outrasPlataformas').style.border = '1px solid red';
        form.outraPlataforma.focus();
        return false;
    }
}
    
if (form.data_lancamento.value==""){
        document.getElementById('data_lancamento').style.border = '1px solid red';
        form.data_lancamento.focus();
        return false;
    }
    
if (form.subtitulo.value==""){
        document.getElementById('subtitulo_materia').style.border = '1px solid red';
        form.subtitulo.focus();
        return false;
    }
    
if (form.conteudo.value==""){
        document.getElementById('campoConteudo1').style.border = '1px solid red';
        form.conteudo.focus();
        return false;
    }
    
if (form.imagemGaleria.value==""){
        document.getElementById('img1').style.border = '3px solid red';
        form.imagemGaleria.focus();
        return false;
    }
if (form.imagemGaleria2.value==""){
        document.getElementById('img2').style.border = '3px solid red';
        form.imagemGaleria2.focus();
        return false;
    }
if (form.imagemGaleria3.value==""){
        document.getElementById('img3').style.border = '3px solid red';
        form.imagemGaleria3.focus();
        return false;
    }
if (form.imagemGaleria.value==""){
        document.getElementById('data_lancamento').style.border = '1px solid red';
        form.imagemGaleria.focus();
        return false;
    }
if (form.urlVideo1.value==""){
        document.getElementById('urlVideo1').style.border = '1px solid red';
        form.urlVideo1.focus();
        return false;
    }
if (form.urlVideo2.value==""){
        document.getElementById('urlVideo2').style.border = '1px solid red';
        form.urlVideo2.focus();
        return false;
    }
if (form.url_materia.value==""){
        document.getElementById('urlMaterias').style.border = '1px solid red';
        form.url_materia.focus();
        return false;
    }
}