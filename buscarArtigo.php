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
                document.getElementById("tituloAside").style.backgroundColor = "#00989E"; 
                document.getElementById("tituloGaleria").style.backgroundColor = "#00989E"
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
                <div id="corpoConteudoGaleria2">
                     <h1 id="tituloGaleria"> Novidades  </h1>
                        <?php
                            $tituloArtigo = $_GET['tituloArtigo'];
                            $query = "SELECT * FROM ARTIGO WHERE TITULO_ARTIGO OR CONTEUDO_ARTIGO LIKE '%$tituloArtigo%'";
                            $total_reg = "4";
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
                                    
                                    $sql = "SELECT * FROM IMAGENS_MATERIA WHERE COD_MATERIA_IMAGEM =".$artigos['ID_ARTIGO'];
                                    $resultBusca = mysql_query($sql);
                                    $totalBusca = mysql_fetch_array($resultBusca);
                                    $imagemMini = $totalBusca['IMAGEM_PRINCIPAL'];
                                    $descricaoArtigo = $artigos['DESCRICAO_ARTIGO'];
                                    $tituloArtigo = $artigos['TITULO_ARTIGO'];
                                    $urlArtigo = $artigos['URL_ARTIGO'];
                                    $dataArtigo = $artigos['DATA_ARTIGO'];
                                    $ano = substr($dataArtigo, 0, 4);
                                    $mes = substr($dataArtigo, 5, 2);
                                    $dia = substr($dataArtigo, 8, 2);
                                    $autorArtigo = $artigos['AUTOR_ARTIGO'];
                                    $sql = "SELECT * FROM USUARIO WHERE COD_USUARIO = $autorArtigo";
                                    $buscaCod = mysql_query($sql);
                                    $resultCod = mysql_fetch_array($buscaCod);
                                    
                                    echo '<div class="materiasBusca">';
                                    echo '<figure class="figura_materia">';
                                    echo '<img src="uploads/'.$imagemMini.'" class="imagem_miniatura_materia">';
                                    echo '</figure>';
                                    echo '<p class="texto_titulo_materia">';
                                    echo ''.$tituloArtigo .'';
                                    echo '</p>';
                                    echo '<p class="texto_materia">';
                                    echo ''.$descricaoArtigo .'';
                                    echo '</p>';
                                    echo '<p class="verMais">';
                                    echo ' <a href="'.$urlArtigo.'">Ver Mais...</a>';
                                    echo '</p>';
                                    echo '<p class="dataArtigos">';
                                    echo '<b>Data: </b>'.$dia.'/'.$mes.'/'.$ano;
                                    echo '</p>';
                                    echo '<p class="autorArtigo">';
                                    echo '<b>Autor: </b>'.$resultCod['NOME_USUARIO'];
                                    echo '</p>';
                                    echo '</div>';
                            }
                            }
                            echo '<div id="paginacaoBuscar">';
                            $anterior = $pc -1; 
   $proximo = $pc +1; 
   if ($pc>1) 
       { echo " <a href='?pagina=$anterior&tituloArtigo=$tituloArtigo'>< Anterior</a> "; 
       
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
           { echo " <a href='?pagina=$proximo&tituloArtigo=$tituloArtigo'> Próximo ></a>"; 
           
           }
      if($pc == $tp){/*CODIGO A APARECER PARA PASSAR PAGINA*/} // Mostrando desabilitado 06/11/13 Rogério
      echo "</div>";
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
