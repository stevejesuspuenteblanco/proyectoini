  <link href="assets/fileinput.css" media="all" rel="stylesheet" type="text/css" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="assets/fileinput.js" type="text/javascript"></script>
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js" type="text/javascript"></script>
 <link href="https://fonts.googleapis.com/css?family=Bungee|Cambo|Finger+Paint|Frijole|Shadows+Into+Light" rel="stylesheet">
  <style>

.aa{
   font-family: 'Frijole', cursive;
  font-size: 100%;

  }
  .a{
   font-family: 'Finger Paint', cursive;
  font-size: 100%;

  }
  .b{
  font-family: 'Cambo', serif;
  font-size: 100%;
  
  }
  .c{
 font-family: 'Bungee', cursive;
  font-size: 100%;
  
  }
  .d{
  font-family: 'Shadows Into Light', cursive;
  font-size: 100%;
  
  } 
</style>       


                            <!-- BEGIN TAB PORTLET-->
                            <div class="portlet light bordered">


<?php 

if (isset($_GET['lista'])) { 

  
  $iduser;
  $titulo=$_POST["titulo"];
  $contenido=$_POST["contenido"];
 //$o=$_POST["logo"];
 //$imgprincipal=$_POST["portada"];
 //$img1=$_POST["favicon"];  
  $face=$_POST["facebook"]; 
  $twitter=$_POST["twitter"];
  $link=$_POST["link"];
  $footer=$_POST["footer"];


  $foto=$_FILES["portada"]["name"];
  $logo= $_FILES['imagen'];
//echo $logo=$_FILES["logo"]["name"];
  $favicon=$_FILES["imagen2"];   
  $fuente=$_FILES["fuente"];      

                    
if($titulo=="" ){
echo "";
}else{

$sql="INSERT INTO `pagina` (`id_pagina`, `idusuario`, `portada`, `titulo`, `descripcion`, `logo`, `face`, `twiter`, `footer`, `link`, `favicon`, `fuente`) VALUES (NULL, '$iduser', '', '$titulo', '$contenido', '', '$face', 'twitter', '$footer', '$link', '', '$fuente');";
$bd->consulta($sql);
                                  
//$sql="UPDATE catalogo SET 
//titulo='$titulo', contenido='$contenido',imgfondo='$imgfondo',imgprincipal='$imgprincipal',img1='$img1', img2='$img2', img3='$img3' where id_catalogo='$x1'";


   
                            //echo "Datos Guardados Correctamente";
                            echo '<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Bien!</b> Datos Registrados Correctamente... ';

                               echo '   </div>';


     
}
}





if (isset($_GET['edita'])) { 

$x2;
   $titulo=$_POST["titulo"];
   $contenido=$_POST["contenido"];
 //$o=$_POST["logo"];
 //$imgprincipal=$_POST["portada"];
 //$img1=$_POST["favicon"];  
   $face=$_POST["facebook"]; 
   $twitter=$_POST["twitter"];
   $link=$_POST["link"];
   $footer=$_POST["footer"];
   $fuente=$_POST["fuente"];



                            if( $titulo==""  )
                {

                    echo "";
                   
                }else{
                   

$sql="UPDATE pagina SET titulo='$titulo', descripcion='$contenido', face='$face',twiter='$twitter',footer='$footer',link='$link',fuente='$fuente' where idusuario='$iduser'";  
$bd->consulta($sql);
   
                            //echo "Datos Guardados Correctamente";   ,imgfondo='$nom',imgprincipal='$nom2',img1='$nomimg1', img2='$nomimg2', img3='$nomimg3',url='$url'
                            echo '<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Bien!</b> Datos Editados Correctamente... ';

                               echo '   </div>';
}
}

?>
                                
                                <div class="portlet-body">
                                   
                                    <div class="tabbable tabbable-tabdrop">
                                        <ul class="nav nav-tabs">

                                            <li class="active">
                                                <a href="#tab1" data-toggle="tab">Datos Basicos de la pagina</a>
                                            </li>
                                            <li >
                                                <a href="#tab2" data-toggle="tab">Imagen de logo</a>
                                            </li>
                                            <li>
                                                <a href="#tab3" data-toggle="tab">Imagen de portada</a>
                                            </li>
                                            <li>
                                                <a href="#tab4" data-toggle="tab">favicon</a>
                                            </li>
                                           
                                            
                                        </ul>
<div class="tab-content">
    <div class="tab-pane active" id="tab1">
    <!-- contenido datos basicos -->

  
<div class="col-md-12">



<div class="portlet-body">
   <div class="table-scrollable">
       <table class="table table-striped table-hover">
          <thead>
                  <?php



                    $consulta="SELECT * FROM pagina where idusuario=$iduser";
                                                  $resultado =$bd-> consulta($consulta); 
                                                  if ($bd->numeroFilas() == 0) {
                  ?>                                           
                    <tr>
                    <form role="form" action="?mod=pagina&lista=lista" method="post" enctype="multipart/form-data">              
                    <center>
                      <th><center>Titulo</center></th>
                      <th><center>Contenido</center></th>
                    </center>
                    </tr>
          </thead>
                    <tbody>
                    <tr> 
                        
                        <td>
                            <input   type="text" required type="tex" name="titulo" value="" required class="form-control"> 
                        </td>
                        <td>
                          <textarea class="form-control" rows="2"  name="contenido"></textarea>
                        </td>
                       
                    </tr>
                      <th><center>facebook</center></th>
                      <th><center>Twitter</center></th>
                    </tr>
                </thead>
                    <tbody>
              <tr> 
                <td>
                  <input class="form-control" type="text" id="exampleInputFile" value=""  name="facebook" >
                </td>
                <td> 
                    <input class="form-control" type="text" id="exampleInputFile"  value="" name="twitter" >  
                </td>
              </tr>
                    </div>                 
                    </tbody> 
                   
                    <th><center>Link de Pagina</center></th>
                    <th><center>Contenido del pie de pagina</center></th>   
                      </tr>
                        </thead>
                    <tbody>
                       <tr> 
                      
                    <td>
                    <input class="form-control" type="text" id="exampleInputFile" value=""  name="link" >
                    </td>
                     <td>
                    <textarea class="form-control" rows="2"  name="footer"></textarea>
                   
                    </td>
                    </tr>
                    </div>                 
                    </tbody>  

                     <th><center></center></th>
                    <th><center></center></th>
                       
                      </tr>
                        </thead>
                    <tbody>
                       <tr> 
                       
                   <td>
<select class="form-control"  name="fuente">
  <option class="aa" value="1"><p>Esta fuente se llama Frijole</p> </option> 
  <option class="a" value="2" selected><b>Esta fuente se llama Finger</b></option>
  <option class="b" value="3">Esta fuente se llama Cambo</option>
  <option class="c" value="4">Esta fuente se llama Bungee</option> 
  <option class="d" value="5" >Esta fuente se llama Shadows </option>
</select>
                   </td>
                    <td>
                    <div class="col-md-10"></div>
                    <center>
<button type="submit" class="btn btn-primary btn-lg" name="lugarguardar" value="Guardar">Guardar Cambios</button>
</center>
                    </td>
                    </tr>
               
                    </div>                 
                    </tbody>  
                     </table>
                     </form>


     
                    </table> 
</div>
</div>
</div>
<!-- END SAMPLE TABLE PORTLET-->

         

    </div>

    <!-- foto de logo -->
    <div class="tab-pane " id="tab2">
        <div class="col-md-6">
          <input id="input-711" name="logon[]" type="file" multiple class="file-loading">

                <script type="text/javascript">
                $("#input-711").fileinput({
                    uploadUrl: "pages/guarda.php?codigo=<?php echo  $pagina->id_pagina ?>", // server upload action
                    uploadAsync: true,
                    maxFileCount: 1,
                    showBrowse: false,
                    browseOnZoneClick: true
                });
                </script>
        </div>  
      <div class="col-md-6"> 
      <div class="note note-info">
                                        <h4 class="block">Imagen de logo</h4>
                                        <p> Para Insertar tu imagen de logo sugerimos lo siguiente:</br>
                                        - Imagenes de menos de 1 MB de peso.</br>
                                        - Preferilemente Imagenes tipo "PNG" </p>
      </div>
<!-- actualiza el itframe -->
<span id="iframe">
    <iframe  id="foo" width="100%" height="200" src="../index.php?valor=<?php echo $iduser ?>" frameborder="0" scrolling="no" allowfullscreen></iframe>
</span>
<!-- tiempo del iframe -->
          <script>
             var src = $('#foo').attr('src');
             setInterval(function () {
                  $('#foo').remove();
                  var iframe_html = '<iframe src="'+ src +'" width="100%" height="200" frameborder="0" scrolling="no" allowfullscreen></iframe>';
                  $('#iframe').html(iframe_html);
              }, 15000);
          </script>

      </div>
    </div>


    <!-- foto de portada -->
    <div class="tab-pane" id="tab3">
      <div class="col-md-6">
        <input id="inputportada" name="portadan[]" type="file" multiple class="file-loading">

                  <script type="text/javascript">
                  $("#inputportada").fileinput({
                      uploadUrl: "pages/guarda.php?codigo=<?php echo  $pagina->id_pagina ?>", // server upload action
                      uploadAsync: true,
                      maxFileCount: 1,
                      showBrowse: false,
                      browseOnZoneClick: true
                  });
                  </script>
      </div>

       <div class="col-md-6"> 
      <div class="note note-info">


                                        <h4 class="block">Imagen de Portada</h4>
                                        <p> Para Insertar tu imagen de logo sugerimos lo siguiente:</br>
                                        - Imagenes de menos de 1 MB de peso.</br>
                                        - imagenes anchas Ejemplo (800*1200).</p>
      </div>
<!-- actualiza el itframe -->
<span id="iframe2">
    <iframe  id="foo2" width="100%" height="200" src="../index.php?valor=<?php echo $iduser ?>" frameborder="0" scrolling="no" allowfullscreen></iframe>
</span>

          <script>
             var src = $('#foo2').attr('src');
             setInterval(function () {
                  $('#foo').remove();
                  var iframe_html = '<iframe src="'+ src +'" width="100%" height="200" frameborder="0" scrolling="no" allowfullscreen></iframe>';
                  $('#iframe2').html(iframe_html);
              }, 15000);
          </script>

      </div>
      </div>
    <!-- foto de favicon -->
     <div class="tab-pane" id="tab4">
       <div class="col-md-6">




         <input id="inputfavicon" name="faviconn[]" type="file" multiple class="file-loading">

                  <script type="text/javascript">
                  $("#inputfavicon").fileinput({
                      uploadUrl: "pages/guarda.php?codigo=<?php echo  $pagina->id_pagina ?>", // server upload action
                      uploadAsync: true,
                      maxFileCount: 1,
                      showBrowse: false,
                      browseOnZoneClick: true
                  });
                  </script>
        </div>
  <div class="col-md-6"> 
      <div class="note note-info">


                                        <h4 class="block">Favicon</h4>
                                        <p>Para Insertar tu imagen de favicon sugerimos lo siguiente:</br>
                                        - Imagen con poco peso.</br>
                                        - imagen pequeña (50*50).</p>

      </div>
      <center>
      <IMG SRC="../imgpag/favicon.PNG" WIDTH=190 HEIGHT=80 BORDER=2>
      </center>
      </div>

      </div>
    </div>
  </div>


<?php
                                       
}

        
         $consulta="SELECT * FROM pagina where idusuario=$iduser";
         $resultado =$bd-> consulta($consulta); 
         if ($bd->numeroFilas() > 0) {  


      $bd->consulta($consulta);
      while ($pagina=$bd->mostrar_registros()) {
        ?>

                            <tr>
  <form role="form" action="?mod=pagina&edita=edita" method="post" enctype="multipart/form-data">              
  <center>
      <th>Titulo</th>
      <th>Contenido</th>
      </center>
      </tr>
  </thead>
    <tbody>  

        <tr> 
            <td>
                <input   type="text" required type="tex" name="titulo" value="<?php echo $pagina->titulo; ?>" required class="form-control"> 
            </td>
          <td>
              <textarea class="form-control" rows="2"  name="contenido"><?php echo $pagina->descripcion; ?></textarea>
          </td>
           
        </tr>
          <th><center>facebook</center></th>
          <th><center>Twitter</center></th>
                       
        </tr>
        </thead>
        <tbody>
           <tr> 
                     
              <td>
                 <input class="form-control" type="text" id="exampleInputFile" value="<?php echo $pagina->face; ?>"  name="facebook" >
              </td>
              <td> 
                    <input class="form-control" type="text" id="exampleInputFile"  value="<?php echo $pagina->twiter; ?>" name="twitter" >  
 
               </td>
            </tr>
          </div>                 
        </tbody> 
                   
          <th><center>Link de Pagina</center></th>
          <th><center>Pie de pagina</center></th>   
          </tr>
        </thead>
          <tbody>
            <tr> 
              <td>
                    <input class="form-control" type="url" id="exampleInputFile" value="<?php echo $pagina->link; ?>"  name="link" >
              </td>
              <td>
                     <textarea class="form-control" rows="2"  name="footer"><?php echo $pagina->footer; ?></textarea>

                    <!-- input class="form-control" type="text" id="exampleInputFile"  value="<?php echo $pagina->footer; ?>" name="footer" > -->
              </td>
            </tr>
           </div>                 
          </tbody>  

          <th><center>Tipo de fuente </center></th>
          <th><center></center></th>
                       
        </tr>
      </thead>
      <tbody>
        <tr> 
          <td>
            <select class="form-control"  name="fuente">
              <option class="aa" value="1"><p>Esta fuente se llama Frijole</p> </option> 
              <option class="a" value="2" selected><b>Esta fuente se llama Finger</b></option>
              <option class="b" value="3">Esta fuente se llama Cambo</option>
              <option class="c" value="4">Esta fuente se llama Bungee</option> 
              <option class="d" value="5" >Esta fuente se llama Shadows </option>
            </select>
          </td>
          <td>
            <div class="col-md-10"></div>
            <center>
<button type="submit" class="btn btn-primary btn-lg" name="lugarguardar" value="Guardar">Guardar Cambios</button>
</center>
          </td>
        </tr>
       </div>                 
      </tbody>  
                     </table>
                     </form>


     
                    </table> 
</div>
</div>
</div>
<!-- END SAMPLE TABLE PORTLET-->

         

    </div>

    <!-- foto de logo -->
    <div class="tab-pane " id="tab2">
        <div class="col-md-6">
<?php
if( $pagina->logo==""){
?>
 <input id="input-711" name="logon[]" type="file" multiple class="file-loading">

                <script type="text/javascript">
                $("#input-711").fileinput({
                    uploadUrl: "pages/guarda.php?codigo=<?php echo  $pagina->id_pagina ?>", // server upload action
                    uploadAsync: true,
                    maxFileCount: 1,
                    showBrowse: false,
                    browseOnZoneClick: true

                });
                </script>
        </div>  

<?php
}else{
?>
          <input id="input-711" name="logo[]" type="file" multiple class="file-loading">

                <script type="text/javascript">
                $("#input-711").fileinput({
                    uploadUrl: "pages/guarda.php?codigo=<?php echo  $pagina->id_pagina; ?>", // server upload action
                    uploadAsync: true,
                    maxFileCount: 1,
                    showBrowse: false,
                    browseOnZoneClick: true
                });
                </script>
        </div>  
<?php
      }  ?>  
      <div class="col-md-6"> 
      <div class="note note-info">
                                        <h4 class="block">Imagen de logo</h4>
                                        <p> Para Insertar tu imagen de logo sugerimos lo siguiente:</br>
                                        - Imagenes de menos de 1 MB de peso.</br>
                                        - Preferilemente Imagenes tipo "PNG" </p>
      </div>
<!-- actualiza el itframe -->
<span id="iframe">
    <iframe  id="foo" width="100%" height="200" src="../index.php?valor=<?php echo $iduser ?>" frameborder="0" scrolling="no" allowfullscreen></iframe>
</span>
<!-- tiempo del iframe -->
          <script>
             var src = $('#foo').attr('src');
             setInterval(function () {
                  $('#foo').remove();
                  var iframe_html = '<iframe src="'+ src +'" width="100%" height="200" frameborder="0" scrolling="no" allowfullscreen></iframe>';
                  $('#iframe').html(iframe_html);
              }, 15000);
          </script>

      </div>
    </div>


    <!-- foto de portada -->
    <div class="tab-pane" id="tab3">
      <div class="col-md-6">
<?php
if( $pagina->portada==""){
?>
 <input id="inputportada" name="portadan[]" type="file" multiple class="file-loading">
 

                <script type="text/javascript">
                $("#inputportada").fileinput({
                    uploadUrl: "pages/guarda.php?codigo=<?php echo  $pagina->id_pagina ?>", // server upload action
                    uploadAsync: true,
                    maxFileCount: 1,
                    showBrowse: false,
                    browseOnZoneClick: true
                });
                </script>
        </div>  

<?php
}else{
?>




        <input id="inputportada" name="portada[]" type="file" multiple class="file-loading">

                  <script type="text/javascript">
                  $("#inputportada").fileinput({
                      uploadUrl: "pages/guarda.php?codigo=<?php echo  $pagina->id_pagina ?>", // server upload action
                      uploadAsync: true,
                      maxFileCount: 1,
                      showBrowse: false,
                      browseOnZoneClick: true
                  });
                  </script>
      </div>

<?php
}
?>
       <div class="col-md-6"> 
      <div class="note note-info">


                                        <h4 class="block">Imagen de Portada</h4>
                                        <p> Para Insertar tu imagen de logo sugerimos lo siguiente:</br>
                                        - Imagenes de menos de 1 MB de peso.</br>
                                        - imagenes anchas Ejemplo (800*1200).</p>
      </div>
<!-- actualiza el itframe -->

<!-- <iframe height="100%" width="100%" scrolling="auto" name="iframe" id="iframe" src="http://localhost/nuevocat/catalogo/index.php?valor=2&ver=1.0" ></iframe> -->

<span id="iframe2">
    <iframe  id="foo2" width="100%" height="200" src="../index.php?valor=<?php echo $iduser ?>" frameborder="0" scrolling="no" allowfullscreen></iframe>
</span>

          <script>
             var src = $('#foo2').attr('src');
             setInterval(function () {
                  $('#foo2').remove();
                  var iframe_html = '<iframe src="'+ src +'" width="100%" height="200" frameborder="0" scrolling="no" allowfullscreen></iframe>';
                   $('#iframe2').html(iframe_html);
              }, 15000);
          </script>

      </div>
      </div>
    <!-- foto de favicon -->
     <div class="tab-pane" id="tab4">
       <div class="col-md-6">
<?php
if( $pagina->favicon==""){
?>
 <input id="inputfavicon" name="faviconn[]" type="file" multiple class="file-loading">
 

                <script type="text/javascript">
                $("#inputfavicon").fileinput({
                    uploadUrl: "pages/guarda.php?codigo=<?php echo  $pagina->id_pagina ?>", // server upload action
                    uploadAsync: true,
                    maxFileCount: 1,
                    showBrowse: false,
                    browseOnZoneClick: true
                });
                </script>
        </div>  

<?php
}else{
?>





         <input id="inputfavicon" name="favicon[]" type="file" multiple class="file-loading">

                  <script type="text/javascript">
                  $("#inputfavicon").fileinput({
                      uploadUrl: "pages/guarda.php?codigo=<?php echo  $pagina->id_pagina ?>", // server upload action
                      uploadAsync: true,
                      maxFileCount: 1,
                      showBrowse: false,
                      browseOnZoneClick: true
                  });
                  </script>
        </div>
    <?php
      }
       ?> 
  <div class="col-md-6"> 
      <div class="note note-info">


                                        <h4 class="block">Favicon</h4>
                                        <p>Para Insertar tu imagen de favicon sugerimos lo siguiente:</br>
                                        - Imagen con poco peso.</br>
                                        - imagen pequeña (50*50).</p>

      </div>
      <center>
      <IMG SRC="../imgpag/favicon.PNG" WIDTH=190 HEIGHT=80 BORDER=2>
      </center>
      </div>

      </div>
    </div>
  </div>
      <?php
}
}
?>
                                   
                                    
                                </div>
                            </div>




<!-- END SAMPLE TABLE PORTLET-->
</div>
</div>


<!-- Mas scripts en -->

<!-- END QUICK SIDEBAR -->


