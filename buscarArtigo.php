<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="shortcut icon" href="imagens/icone001.png" >
        <script type="text/javascript" src="js/funcoes.js"> </script>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/cycle.js"></script>
        <script type="text/javascript" src="js/javascript.js"></script>
        <script type="text/javascript">             
            onload = function(){
                var imgMiniLogo = document.getElementById("imgMiniLogo");
                var imgLogo = document.getElementById("img-logo");                
                imgMiniLogo.innerHTML = '<img src="imagens/logosReduzidos001.png" alt="" id="miniLogo">';
                imgLogo.innerHTML = '<img src="imagens/logo001.png" alt="" id="logo">'; 
                document.getElementById("tituloPagina").style.backgroundColor = "#00989E";      
                document.getElementById("tituloAside").style.backgroundColor = "#00989E"; 
                document.getElementById("tituloGaleria").style.backgroundColor = "#00989E";
                document.getElementById("nav").style.backgroundColor = "#00989E";
                document.getElementById("navReduzido").style.backgroundColor = "#00989E";                
                document.getElementById("botaoLogin").style.backgroundColor = "#00989E";
                document.getElementById("logar").style.borderBottom = "solid 5px #00989E";           
            };             
        </script>   
        <title> Multiplayer </title>
    </head>
    <body>
        <section id="container">
            <?php
                include_once 'conexao/conecta.inc';
                include_once 'includes/funcoesUteis.inc';
                session_start();
            ?>
            <header id="cabecalho"  ondragstart="return false">
                <?php
                include_once 'includes/menu.php';
                ?>
                <div id="logar">
                    <?php
                        VerificaSessao('');
                    ?>                    
                </div>
            </header>
            <article id="conteudo">
                <div id="corpoConteudoGaleria">
                     <h1 id="tituloAside"> Top Notícias </h1>
                        <?php
                        $tituloArtigo = $_GET['tituloArtigo'];
                            $query = "SELECT * FROM ARTIGO WHERE TITULO_ARTIGO OR CONTEUDO_ARTIGO LIKE '%".$tituloArtigo."%'";
                            $total_reg = "3";
                            $pc= isset($_GET['pagina'])? $_GET['pagina'] : "1";
                            $inicio = $pc - 1; 
                            $inicio = $inicio * $total_reg;
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
                                    $sql = "SELECT * FROM IMAGENS_MATERIAS WHERE COD_MATERIA_IMAGEM =".$artigos['ID_ARTIGO'];
                                    $resultBusca = mysql_query($sql);
                                    $totalBusca = mysql_fetch_array($resultBusca);
                                    
                                    $imagemMini = $totalBusca['IMAGEM_PRINCIPAL'];
                                    $descricaoArtigo = $artigos['DESCRICAO_ARTIGO'];
                                    $urlArtigo = $artigos['URL_ARTIGO'];
                                    echo '<div class="materias">';
                                    echo '<figure class="figura_materia">';
                                    echo '<a href="'.$urlArtigo.'"><img src="uploads/'.$imagemMini.'" class="imagem_miniatura_materia"></a>';
                                    echo '</figure>';
                                    echo '<p class="texto_materia">';
                                    echo '<a href="'.$urlArtigo.'">'.$descricaoArtigo .'</a>';
                                    echo '</p>';
                                    echo '</div>';
                            }
                            }
                            $anterior = $pc -1; 
   $proximo = $pc +1; 
   if ($pc>1) 
       { echo " <a href='?pagina=$anterior&tituloArtigo=$tituloArtigo'><- Anterior</a> "; 
       
       } 
       if($pc ==1){/*CODIGO A APARECER PARA VOLTAR PAGINA*/} // Mostrando desabilitado 06/11/13 Rogério
       //echo "|"; 
       // Inicio lógica rogerio
       for($i=1;$i<=$tp;$i++)
       {
           echo "<a href=?pagina=$i&tituloArtigo=$tituloArtigo>".$i . "</a>" . "    ";
       }
       // Fim lógia rogério
       if ($pc<$tp) 
           { echo " <a href='?pagina=$proximo&tituloArtigo=$tituloArtigo'>Próxima -></a>"; 
           
           }
      if($pc == $tp){/*CODIGO A APARECER PARA PASSAR PAGINA*/} // Mostrando desabilitado 06/11/13 Rogério

                        ?>
                </div>
 <aside id="aside1">
                        <h1 id="tituloAside"> Top Notícias </h1>
                        <div id="materiasAside">
                            <?php
                                buscarMateriasAside2();
                            ?>
                        </div>    
                    </aside> 
                
                <div id="voltarTopo">
                    <a href="javascript:toTop();" class="subir">
                        <img src="imagens/topo.png" alt="">
                        <p> Voltar ao topo </p>
                    </a>                    
                </div>
            </article>
            <div id="imgFooter" ondragstart="return false">
                <img src="imagens/imagemRodape.png">
            </div>    
            <footer id="footer">
                <?php
                    include_once 'includes/rodape.php';
                ?>
            </footer>            
        </section>
    </body>
</html>
