<?php
 include 'panelcatalogo/inc/functionBD.php';
     // require('./js/index.php');
 $base = new GestarBD();
$user=$_GET["valor"];
      $consulta="SELECT * FROM pagina where idusuario=$user";
      $base->consulta($consulta);


$resultado = mysqli_query($consulta); 
                                        if (mysqli_num_rows($resultado) == 0) {

                                  $host= $_SERVER["HTTP_HOST"];
                                  $ruta= "/catalogo/panelcatalogo/";
                                  $linkk= "http://" . $host . $ruta;

                                            echo "no se han registrado Catalogos";

                                            ?>
                                            <META HTTP-EQUIV="REFRESH" CONTENT="1;URL=<?php echo $linkk; ?>"> 
                                            <?php

                                        }else{




      while ($pagina=$base->mostrar_registros()) {



?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='viewport' content="width=device-width, initial-scale=1.0">

    <title>Catalogo Zippyttech</title>
    <!--Style personalizado-->
    <link rel="stylesheet" href="css/style.css">

    <!--Font-awesome-->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">

    <!--Bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


<!--favicon -->

<link rel="icon" href="imgpag/<?php echo $pagina['favicon']; ?>" type="image/x-icon"/>


   <!--
   <link rel="apple-touch-icon" href="img/favicon.png">
   <link rel="apple-touch-icon" sizes="72x72" href="img/favicon.png">
   <link rel="apple-touch-icon" sizes="114x114" href="img/favicon.png">-->







    <link rel="stylesheet" href="css/css/animate.css">
    <link rel="stylesheet" href="css/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/css/magnific-popup.css">
    <link rel="stylesheet" href="css/css/mediaelementplayer.css">

    <!-- important -->
    <link rel="stylesheet" href="css/css/style.css">
    <style type="text/css">
      /*Estilo para barra scroll*/
      ::-webkit-scrollbar {width: 5px; height: 8px; background: black;}
      ::-webkit-scrollbar-thumb {background-color:gray ; border: 1px solid black;}
    </style>
  </head>
  <body>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.8";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
   


<header>
  <div class="bg-overlay pattern">
        <nav role="navigation" class="navbar-fixed-top nav-catalogo">
          <div class="container">
            <div class="navbar-header page-scroll">
                <a id="logo" href="#" class="navbar-brand" style="padding-top: 15px;"> 




                  <div class="image">
                    <img style="max-height:40px; " src="imgpag/<?php echo $pagina['logo']; ?>" alt="Z">
                  </div>
                </a>
               </div>
              <div class='btn-fb pull-right'>
                <div class="fb-like fb_iframe_widget" data-font="" data-height="20" data-href="<?php echo $pagina['face']; ?>" data-layout="button_count" data-send="false" data-show_faces="true" fb-xfbml-state="rendered"><span style="vertical-align: bottom; width: 104px; height: 20px;"></span></div>
              </div>      
          </div>
        </nav>
    </div>
</header>




<div class="portada" style="background-image: url(imgpag/<?php echo $pagina['portada']; ?>);">
 <div class='texto-portada'>
    <div class='col-md-6 col-lg-6 '>
      <div>
        <strong><h2 class="titulo-portada"><?php echo $pagina['titulo']; ?></h2></strong>
      </div>
      <div class="desc-portada">
        <span><?php echo $pagina['descripcion']; ?>.</span>
      </div>
    </div>
  </div>
  </div>



<div class="contenedor">
    <!-- catalogo -->
    <?php
     
      $categoria = new GestarBD();
      $userId=$user;
      $consulta="SELECT * FROM categoria where idusuario=$userId";
      $categoria->consulta($consulta);
      $indexWhile=0;
      while ($fila=$categoria->mostrar_registros()) {
    ?>
      <div class="row slide catalogo">
        <div class="col-lg-12"><h3 class="titulo-catalogo" ><?php echo $fila['nombre']; ?></h3></div>
        <div class="slides">
        <span  class="left-controls" role="button" aria-label="See Previous Modules">
          <b class="fa fa-chevron-left fa-chevron-left-extra prev" aria-hidden=""></b>
        </span>
        <ul  data-catalogo=""  class="row__inner line big"><!--Begin line-->
          <?php
              $catalogo = new GestarBD();
              $id_categoria= $fila['id_categoria'];
              $consulta="SELECT * FROM catalogo where id_categoria=$id_categoria";
              $catalogo->consulta($consulta);
              while ($row=$catalogo->mostrar_registros()) {
          ?>
            <li class="tile" data-pos="<?php echo  $row['id_catalogo']; ?>">
              <div class="tile__media">
                <img class="tile__img" src="img/<?php echo $row['imgprincipal']; ?>" alt="<?php echo $row['imgprincipal']; ?>"  />
                <div class="slides-hover">
                  <div><img class="slide__img" src="img/<?php echo $row['img1']; ?>" alt="<?php echo $row['img1']; ?>"/></div>
                  <div><img class="slide__img" src="img/<?php echo $row['img2']; ?>" alt="<?php echo $row['img1']; ?>"/></div>
                  <div><img class="slide__img" src="img/<?php echo $row['img3']; ?>" alt="<?php echo $row['img1']; ?>"/></div>
                </div>
              </div>
              <div class="tile__details">
                <div class="tile__title">
                <strong class="info-detail catalogo-titulo"><?php echo $row['titulo']; ?></strong>
                <span class="hide catalogo-contenido"><?php echo $row['contenido']; ?></span>
                <span class="hide catalogo-fondo"><?php echo $row['imgfondo']; ?></span>
                </div>

                <div class="down-flec"><i class="fa fa-chevron-down"></i> </div>
              </div>
              <div class=" center-block"></div>
            </li>
          <?php
            $indexWhile++;
            //TODO:   $consulta.close();               
            }
          ?>
        </ul>
        <span class="right-controls" role="button" aria-label="See Previous Modules">
          <b class="fa fa-chevron-right fa-chevron-right-extra next" aria-hidden="true"></b>
          </span>
        </div>

        <!--start Box info-->
        <div class="info">
          <div class="back-info"></div>
          <i class='fa fa-times pull-right close-btn'></i>
          <div class='row'>
            <div class="content">
              <div class='col-md-6 col-lg-6 texto'>
                <div class="title-caja"> </div>
                <div class="desc-caja"> </div>
                <div class="fb"> </div>
              </div>
            </div>
          </div>
          <ul class="menu">
            <li class="descrip-g current">
              <a>Descripción General</a>          
              <span></span>
            </li>
            <!--<li class="galeria">-->
            <li data-catalogo="" class="galeria">
              <a>Galeria</a>
              <span></span>
            </li>
            <li class="comentarios">
              <a>Comentarios</a>
              <span></span>
            </li>
          </ul>
        </div> <!--End box info-->
      </div>
    <?php
      //TODO:   $categoria.close();               
      }
    ?>
    </div>
  </body>


<footer id="footer" class="footer-inverse" role="contentinfo">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="social">
                    <a target="_blank" href="<?php echo $pagina['twiter']; ?>" class="ico-socialize-twitter1 ico-socialize type2 ico-lg"><i class="fa fa-twitter"></i></a>
                    <a target="_blank" href="<?php echo $pagina['face']; ?>" class="ico-socialize-facebook1 ico-socialize type2 ico-lg"><i class="fa fa-facebook"></i></a>
                </div>
                <p class="copyright"><?php echo $pagina['footer']; ?><a target="_blank" href="<?php echo $pagina['link']; ?>"><?php echo $pagina['link']; ?></a></p>
            </div><!-- End .col-md-6 -->
        </div><!-- End .row -->
    </div><!-- End .container -->
</footer><!-- End #footer -->
</html>
<?php }}?>

<!--
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="bien.js"></script> 
js-->
 <script src="//code.jquery.com/jquery-latest.js"></script>
<script src="js/owl.carousel.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>

<script src="js/categorias.js"></script>