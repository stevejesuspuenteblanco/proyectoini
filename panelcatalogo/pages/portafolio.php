

<script LANGUAGE="JavaScript">
function confirmDel(url){
//var agree = confirm("¿Realmente desea eliminarlo?");
if (confirm("¿Realmente desea eliminar este catalogo ?"))
    window.location.href = url;
else
    return false ;
}
</script>


<?php 
if (isset($_GET['eliminar'])) { 


 $x1=$_GET["codigo"];

                       
if( $x1=="" )
                {             
    echo "
   <script> alert('campos vacios')</script>";
                    echo "<br>";                    
                }
        else
           {
$sql2="delete from galeria where id_catalogo='$x1'";
$bd->consulta($sql2);

$sql="delete from catalogo where id_catalogo='$x1'";
$bd->consulta($sql);
//$sql3="delete from galeria where id_catalogo='$x2'";
//$bd->consulta($sql3);
//echo "Datos Guardados Correctamente";
  echo '<div class="alert alert-success alert-dismissable">
        <i class="fa fa-check"></i>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <b>Bien!</b> Se Elimino Correctamente... </div>';
}
}
?>


<?php
 $x2=$_GET["codigos"];

if (isset($_GET['lista'])) { 

 $x2;
 $titulo=$_POST["titulo"];
 $contenido=$_POST["contenido"];
 $imgfondo=$_POST["imgfondo"];
 $imgprincipal=$_POST["imgprincipal"];
 $img1=$_POST["img1"];  
 $img2=$_POST["img2"]; 
 $img3=$_POST["img3"];
 $url=$_POST["url"];


  $foto=$_FILES["foto"]["name"];
  $fotoperfil=$_FILES["imgprincipal"]["name"];
  $fotoimg1=$_FILES["img1"]["name"];      
  $fotoimg2=$_FILES["img2"]["name"];
  $fotoimg3=$_FILES["img3"]["name"];      

if($titulo==""){

}else{

 $sql1="SELECT * FROM catalogo where titulo='$titulo' and contenido ='$contenido'";
$bd->consulta($sql1);




if ($bd->numeroFilas() > 0) {
                           }else{
  


$sql="INSERT INTO `catalogo` (`imgfondo`, `imgprincipal`, `img1`, `img2`, `img3`, `titulo`, `contenido`, `url`,`id_categoria`) VALUES
         ('$nom', '$nom2', '$nomimg1', '$nomimg2', '$nomimg3', '$titulo', '$contenido','$url','$x2')";                 
$bd->consulta($sql);
   
                            //echo "Datos Guardados Correctamente";
                            echo '<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Bien!</b> Datos Registrados Correctamente...  ';

                               echo '   </div>';

}
//litsa cargados 

$ver="SELECT id_catalogo FROM catalogo WHERE titulo='$titulo'";
  $bd->consulta($ver);
                                        while ($fila=$bd->mostrar_registros()) { 
        $id=$fila->id_catalogo;

 

}
?>
           <div class="portlet-body">
                                   
                                    <div class="tabbable tabbable-tabdrop">
                                       <ul class="nav nav-tabs">

                                            <li >
                                                <a href="#tab1" data-toggle="tab">Datos del Proyecto</a>
                                            </li>
                                            <li class="active">
                                                <a href="#tab2" data-toggle="tab">Imagen de fondo </a>
                                            </li>
                                            <li>
                                                <a href="#tab3" data-toggle="tab">Imagen de portada</a>
                                            </li>
                                            <li>
                                                <a href="#tab4" data-toggle="tab">Imagen de transición 1</a>
                                            </li>
                                             <li>
                                                <a href="#tab5" data-toggle="tab">Imagen de transición 2</a>
                                            </li>
                                             <li>
                                                <a href="#tab6" data-toggle="tab">Imagen de transición 3</a>
                                            </li>
                                           
                                            
                                        </ul>

<div class="tab-content">
          <div class="tab-pane " id="tab1">
            <div class="col-md-12">
              <div class="portlet-body">
        <div class="table-scrollable">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                    <form role="form" action="#" method="post" enctype="multipart/form-data">
                    
                        <th><center>Titulo de seccion</center></th>
                        <th><center>Contenido</center></th>                  
                    </thead>
                    <tbody>
                    <tr> 
                        
                        <td>
                        <center>
                           <?php echo  $titulo ?>
                           </center>
                        </td>
                        <td>
                        <center>
                           <?php echo  $contenido ?>
                        </center>
                       
                        </td>
                        </tr>
                       
                  
                        </tbody>
                            </center>
                           </form>
                          </tr>
                        </thead>
                    </table>
                  </div>
                </div>


            </div>
          </div>

      <div class="tab-pane active" id="tab2">
        <div class="col-md-6">
          <input id="input-711" name="fondo[]" type="file" multiple class="file-loading">
            <script type="text/javascript">
                $("#input-711").fileinput({
                    uploadUrl: "pages/guardaproyecto.php?codigo=<?php echo  $id ?>", // server upload action
                    uploadAsync: true,
                    maxFileCount: 1,
                    showBrowse: false,
                    browseOnZoneClick: true
                }).on('fileuploaded', function(event, data, previewId, index) {
                    $.ajax({
                      type: "GET",
                      url: "./ajax/carga.php?fondo&codigo=<?php echo  $id ?>",
                      success: function(data) {
                        $('#Info').fadeIn(1000).html(data);
                      }
                    });
                }) ;

              $(document).ready(function() {          
                $.ajax({
                  type: "GET",
                  url: "./ajax/carga.php?fondo&codigo=<?php echo  $id ?>",
                  success: function(data) {
                    $('#Info').fadeIn(1000).html(data);
                  }
                });
              });    

          </script>
         
        </div>  
      <div class="col-md-6"> 
              <div class="note note-info">
                                        <h4 class="block">Imagen de Fondo</h4>
                                        <p>Registra la imagen de fondo Para  esta ira en el contenido  de tu proyeto sugerimos lo siguiente:</br>
                                        - Imagenes de menos de 1 MB de peso.</br>
                                        - imagenes ancahas ejemplo 800*1600 </p>
              </div>
              
          </div>
          
      </div>

          <div class="tab-pane " id="tab3">
              <div class="col-md-6">
          <input id="perfil" name="perfil[]" type="file" multiple class="file-loading">

                <script type="text/javascript">
                $("#perfil").fileinput({
                    uploadUrl: "pages/guardaproyecto.php?codigo=<?php echo  $id ?>", // server upload action
                    uploadAsync: true,
                    maxFileCount: 1,
                    showBrowse: false,
                    browseOnZoneClick: true
                }).on('fileuploaded', function(event, data, previewId, index) {
                    $.ajax({
                      type: "GET",
                      url: "./ajax/carga.php?fondo&codigo=<?php echo  $id ?>",
                      success: function(data) {
                        $('#Info').fadeIn(1000).html(data);
                      }
                    });
                }) ;

              $(document).ready(function() {          
                $.ajax({
                  type: "GET",
                  url: "./ajax/carga.php?fondo&codigo=<?php echo  $id ?>",
                  success: function(data) {
                    $('#Info').fadeIn(1000).html(data);
                  }
                });
              });    
                </script>
        </div>  
      <div class="col-md-6"> 
              <div class="note note-info">
                                        <h4 class="block">Imagen de Perfil</h4>
                                        <p> Para Insertar tu imagen de perfi sugerimos lo siguiente:</br>
                                        - Imagenes de menos de 1 MB de peso.</br>
                                        - Images de buna resolucion  </p>
              </div>
             
          </div>
          
          </div>

          <div class="tab-pane " id="tab4">
           <div class="col-md-6">
          <input id="transi" name="transi[]" type="file" multiple class="file-loading">

                <script type="text/javascript">
                $("#transi").fileinput({
                    uploadUrl: "pages/guardaproyecto.php?codigo=<?php echo  $id ?>", // server upload action
                    uploadAsync: true,
                    maxFileCount: 1,
                    showBrowse: false,
                    browseOnZoneClick: true
                }).on('fileuploaded', function(event, data, previewId, index) {
                    $.ajax({
                      type: "GET",
                      url: "./ajax/carga.php?fondo&codigo=<?php echo  $id ?>",
                      success: function(data) {
                        $('#Info').fadeIn(1000).html(data);
                      }
                    });
                }) ;

              $(document).ready(function() {          
                $.ajax({
                  type: "GET",
                  url: "./ajax/carga.php?fondo&codigo=<?php echo  $id ?>",
                  success: function(data) {
                    $('#Info').fadeIn(1000).html(data);
                  }
                });
              }); 
                </script>
        </div>  
      <div class="col-md-6"> 
              <div class="note note-info">
                                        <h4 class="block">Imagenes de transicion 1</h4>
                                        <p> Para Insertar tu imagen de transicion deven ser preferiblemente:</br>
                                        - Imagenes de menos de 1 MB de peso.</br>
                                        - Preferilemente Imagenes tipo "PNG-jpg" </p>
              </div>
          </div>  
          
          </div>

             <div class="tab-pane " id="tab5">
           <div class="col-md-6">
          <input id="transi1" name="transi1[]" type="file" multiple class="file-loading">

                <script type="text/javascript">
                $("#transi1").fileinput({
                    uploadUrl: "pages/guardaproyecto.php?codigo=<?php echo  $id ?>", // server upload action
                    uploadAsync: true,
                    maxFileCount: 1,
                    showBrowse: false,
                    browseOnZoneClick: true
                }).on('fileuploaded', function(event, data, previewId, index) {
                    $.ajax({
                      type: "GET",
                      url: "./ajax/carga.php?fondo&codigo=<?php echo  $id ?>",
                      success: function(data) {
                        $('#Info').fadeIn(1000).html(data);
                      }
                    });
                }) ;

              $(document).ready(function() {          
                $.ajax({
                  type: "GET",
                  url: "./ajax/carga.php?fondo&codigo=<?php echo  $id ?>",
                  success: function(data) {
                    $('#Info').fadeIn(1000).html(data);
                  }
                });
              }); 
                </script>
        </div>  
      <div class="col-md-6"> 
              <div class="note note-info">
                                        <h4 class="block">Imagenes de transicion 2</h4>
                                        <p> Para Insertar tu imagen de transicion deven ser preferiblemente:</br>
                                        - Imagenes de menos de 1 MB de peso.</br>
                                        - Preferilemente Imagenes tipo "PNG-jpg" </p>
              </div>
          </div> 
           
          </div>
             <div class="tab-pane " id="tab6">
           <div class="col-md-6">
          <input id="transi2" name="transi2[]" type="file" multiple class="file-loading">

                <script type="text/javascript">
                $("#transi2").fileinput({
                    uploadUrl: "pages/guardaproyecto.php?codigo=<?php echo  $id ?>", // server upload action
                    uploadAsync: true,
                    maxFileCount: 1,
                    showBrowse: false,
                    browseOnZoneClick: true
                }).on('fileuploaded', function(event, data, previewId, index) {
                    $.ajax({
                      type: "GET",
                      url: "./ajax/carga.php?fondo&codigo=<?php echo  $id ?>",
                      success: function(data) {
                        $('#Info').fadeIn(1000).html(data);
                      }
                    });
                }) ;

              $(document).ready(function() {          
                $.ajax({
                  type: "GET",
                  url: "./ajax/carga.php?fondo&codigo=<?php echo  $id ?>",
                  success: function(data) {
                    $('#Info').fadeIn(1000).html(data);
                  }
                });
              }); 
                </script>
        </div>  
      <div class="col-md-6"> 
              <div class="note note-info">
                                        <h4 class="block">Imagenes de transicion 3</h4>
                                        <p> Para Insertar tu imagen de transicion deven ser preferiblemente:</br>
                                        - Imagenes de menos de 1 MB de peso.</br>
                                        - Preferilemente Imagenes tipo "PNG-jpg" </p>
              </div>
          </div>  
           
          </div>


  
</div>    

</div>      







<div class="col-md-12"> 
</br>
           <div id="Info"></div>
           </div>       


<?php
}
     
}
//editar titulo


  if (isset($_GET['nuevo'])) { 

?>
  
           <div class="portlet-body">
                                   
                                    <div class="tabbable tabbable-tabdrop">
                                       <ul class="nav nav-tabs">

                                            <li class="active">
                                                <a href="#tab1" data-toggle="tab">Datos del Proyecto</a>
                                            </li>
                                            
                                            
                                        </ul>
<div class="tab-content">
          <div class="tab-pane active" id="tab1">
            <div class="col-md-12">
              <div class="portlet-body">
        <div class="table-scrollable">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                    <form role="form" action="?mod=portafolio&lista=lista&codigos=<?php echo $x2?>" method="post" enctype="multipart/form-data">
                    <center>
                        <th>Titulo de seccion</th>
                        <th>Contenido</th>                  
                    </thead>
                    <tbody>
                    <tr> 
                                          <td>
                            <input   type="text" required type="tex" name="titulo" required class="form-control"> 
                        </td>
                        <td>
                           <textarea class="form-control" rows="2"  name="contenido"></textarea>
                       
                        </td>
                        </tr>
                         <tr> 
                        
                        <td>
                           
                        </td>
                        <td>
                        <button type="submit" class="btn btn-primary btn-lg" name="lugarguardar" value="Guardar">Registrar Proyecto</button>
                       
                        </td>
                        </tr>
                        </tbody>
                            </center>
                           </form>
                          </tr>
                        </thead>
                    </table>
                  </div>
                </div>


            </div>
          </div>

     
</div>      
<?php
}
?>
   



<!-- Mas scripts en -->

<!-- END QUICK SIDEBAR -->



                         </div>

                         </div>
                              </div>