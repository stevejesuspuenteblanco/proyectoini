


<script LANGUAGE="JavaScript">
function confirmDel(url){
//var agree = confirm("¿Realmente desea eliminarlo?");
if (confirm("¿Realmente desea eliminar este proyecto se eliminara todo su contenido y galerias ?"))
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



 $consulta="SELECT * FROM galeria where id_catalogo='$x1'";
 $bd->consulta($consulta);
 while ($fila=$bd->mostrar_registros()) { 
    
             $x1;
             $elimina=$fila->nomimg;
               $tipoimg=$fila->tipoimg;

  if($tipoimg==1){
 unlink('../img/'.$elimina.'');//acá le damos la direccion exacta del archivo
 }

 }
 
//elimnna las imagenes de las carpetas
$consulta="SELECT * FROM catalogo where id_catalogo='$x1'";
$bd->consulta($consulta);
while ($fila=$bd->mostrar_registros()) { 
    
             $x1;
              $eliminaf=$fila->imgfondo;
              $eliminap=$fila->imgprincipal;
              $elimina1=$fila->img1;
              $elimina2=$fila->img2;
              $elimina3=$fila->img3;
              $tipoimg=$fila->tipoimg;

}
if($eliminaf!=""){
unlink('../img/'.$eliminaf.'');//acá le damos la direccion exacta del archivo
}
if($eliminap!=""){
unlink('../img/'.$eliminap.'');//acá le damos la direccion exacta del archivo
}
if($elimina1!=""){
unlink('../img/'.$elimina1.'');//acá le damos la direccion exacta del archivo
}
if($elimina2!=""){
unlink('../img/'.$elimina2.'');//acá le damos la direccion exacta del archivo
}
if($elimina3!=""){
unlink('../img/'.$elimina3.'');//acá le damos la direccion exacta del archivo
}



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

?>
  
       


 <div class="row">
     <div class="col-md-12">
       



 
<div id="Info"></div>
<div id="Info2"></div>
<?php

 $consulta="SELECT * FROM categoria  where categoria.id_categoria='$x2'";
  $bd->consulta($consulta);
  $proyecto="";

  while ($fila=$bd->mostrar_registros()) { 
    $proyecto= $fila->nombre;
  }
 $consulta="SELECT * FROM catalogo  where catalogo.id_categoria='$x2'";
 $bd->consulta($consulta);

?>
 <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject bold uppercase">Editar contenido del proyecto:<b style="color: #2889b9"> <?php echo  $proyecto ?> </b></span>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
                                        <thead>
                                            <tr>
                                           
                                                <th class="all">Proyecto</th>
                                                <th class="min-phone-l">Titulo</th>
                                                <th class="min-phone-l">Contenido</th>
                                               
                                                <th class="none">Cargar</th>
                                                <th class="none">Galeria</th>
                                                <th class="none">Eliminar</th>
                                                


                                            </tr>
                                        </thead>
                                        <tbody>

                                           <?php


                      $consulta="SELECT * FROM catalogo where id_categoria='$x2'";
                      $bd->consulta($consulta);
                      while ($fila=$bd->mostrar_registros()) { 
                        $id=$fila->id_catalogo;
                                ?>   

                                            <tr data-id="<?php echo  $id ?>">
                                                <td><?php echo  $fila->titulo; ?></td>
 <td><input  id="username<?php echo $id  ?>2" class=" form-control input-circle" type="text" value="<?php echo  $fila->titulo; ?>" required placeholder="Codigo de Registro" name="codigo" />
                                <script type="text/javascript">
                            $(document).ready(function() {  
                                $('#username<?php echo $id  ?>2').blur(function(){
                                    
                                    $('#Info2').html('<img src="ajax/loader.gif" alt="" />').fadeOut(1000);

                                    var username = $(this).val();       
                                    var dataString = 'username='+username;
                                    
                                    $.ajax({
                                        type: "POST",
                                        url: "ajax/editar2.php?codigo=<?php echo  $id ?>",
                                        data: dataString,
                                        success: function(data) {
                                            $('#Info2').fadeIn(1000).html(data);
                                            //alert(data);
                                        }
                                    });
                                });              
                            });    
                            </script>
 </td>

     

    <td><!-- input  id="username<?php echo $id  ?>" class=" form-control input-circle" type="text" value="<?php echo  $fila->contenido; ?>" required placeholder="Codigo de Registro" name="codigo" /> -->

    <textarea  id="username<?php echo $id  ?>" class=" form-control input-circle" type="text" value="<?php echo  $fila->contenido; ?>" required placeholder="Codigo de Registro" name="codigo"> <?php echo  $fila->contenido; ?>  </textarea>
                              <script type="text/javascript">
                              $(document).ready(function() {  
                              $('#username<?php echo $id  ?>').blur(function(){
                                  
                                  $('#Info').html('<img src="ajax/loader.gif" alt="" />').fadeOut(1000);

                                  var username = $(this).val();       
                                  var dataString = 'username='+username;
                                  
                                  $.ajax({
                                      type: "POST",
                                      url: "ajax/editar.php?codigo=<?php echo  $id ?>",
                                      data: dataString,
                                      success: function(data) {
                                          $('#Info').fadeIn(1000).html(data);
                                          //alert(data);
                                      }
                                  });
                              });              
                          });    
                          </script>
            </td>

                                               
                                  <td>
                                      <!-- imagen de fondo -->
                                 <a class="btn red btn-outline sbold" data-toggle="modal" href="#<?php echo $id  ?> ">Imagen Fondo </a>
                                 <!-- imagen deperfil -->
                                 <a class="btn red btn-outline sbold" data-toggle="modal" href="#perfil<?php echo $id  ?>">Imagen Perfil </a>
                                 <!--  imagen de transaccion 1 -->
                                 <a class="btn red btn-outline sbold" data-toggle="modal" href="#img1<?php echo $id  ?>">Imagen de transición 1 </a>
                                 <!-- imagen de transaccion 2 -->
                                 <a class="btn red btn-outline sbold" data-toggle="modal" href="#img2<?php echo $id  ?>">Imagen de transición 2 </a>
                                 <!-- imagen de transaccion 3 -->
                                 <a class="btn red btn-outline sbold" data-toggle="modal" href="#img3<?php echo $id  ?>">Imagen de transición 3 </a>
                                 <!-- eliminar -->
                                
                                  </td>

<!-- carga de galeria -->

                           <td>
                                      <!-- imagen de fondo -->
                                 <a class="btn red btn-outline sbold" data-toggle="modal" href="#galeria1<?php echo $id  ?> ">Cargar Imagenes</a>
                                 <!-- imagen deperfil -->
                                 <a class="btn red btn-outline sbold "  data-toggle="modal" href="?mod=videosvarios&galeria=<?php echo $id  ?>">Cargar Videos</a>
                                 <!--  imagen de transaccion 1 -->
                                 <a class="btn red btn-outline sbold" data-toggle="modal" href="?mod=mutipleedita&codigo=<?php echo  $id ?>">Editar Galeria</a>
                         </td>



                         <td>
                                 <!-- eliminar -->
                                 <a onclick="if(confirmDel() == false){return false;}" class="btn btn-danger btn-lg" href="?mod=portafolioeditar&eliminar=eliminar&codigo=<?php echo  $fila->id_catalogo; ?>&codigos=<?php echo  $x2 ?>"><i class="icon-trash"></i></a>
                          </td>


                               


<div class="modal fade" id="galeria1<?php echo $id  ?>" tabindex="-1" role="basic" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Cargar Galeria a: <n><?php echo  $fila->titulo; ?></n></h4>
                                                </div>
                                                <div class="modal-body">  seleccione maximo 5 imagenes.   </div>
                                                <div class="modal-footer">
                                               
                                                <input id="gale<?php echo  $id ?>" name="gale1[]" type="file" multiple class="file-loading">
                         

                                                  <script type="text/javascript">
                                                 $("#gale<?php echo  $id ?>").fileinput({
                                                      uploadUrl: "pages/guarda.php?codigo=<?php echo  $id ?>", // server upload action
                                                      uploadAsync: true,
                                                      maxFileCount: 5,
                                                      showBrowse: false,
                                                      browseOnZoneClick: true
                                                  });
                                                  </script>


                                                
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>




<div class="modal fade" id="<?php echo $id  ?>" tabindex="-1" role="basic" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Nombre del proyecto: <n><?php echo  $fila->titulo; ?></n></h4>
                                                </div>
                                                <div class="modal-body">  Imagen de fondo Actual: <img width="80px" src="../img/<?php echo  $fila->imgfondo; ?>">    </div>
                                                <div class="modal-footer">
                                               
                                                <input id="fondo<?php echo  $id ?>" name="fondoedita[]" type="file" multiple class="file-loading">
                         

                                                  <script type="text/javascript">
                                                 $("#fondo<?php echo  $id ?>").fileinput({
                                                      uploadUrl: "pages/guardaproyecto.php?codigo=<?php echo  $id ?>", // server upload action
                                                      uploadAsync: true,
                                                      maxFileCount: 1,
                                                      showBrowse: false,
                                                      browseOnZoneClick: true
                                                  });
                                                  </script>


                                                
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>

                                     



   <div class="modal fade" id="perfil<?php echo $id  ?>" tabindex="-1" role="basic" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Titulo del Proyecto: <?php echo  $fila->titulo; ?></h4>
                                                </div>
                                                <div class="modal-body">Imagen de Perfil Actual:  <img width="80px" src="../img/<?php echo  $fila->imgprincipal; ?>"></div>
                                                <div class="modal-footer">
                                                  
                                                  <input id="perfil1<?php echo  $id ?>" name="perfil[]" type="file" multiple class="file-loading">
                                                  <script type="text/javascript">
                                                             $("#perfil1<?php echo  $id ?>").fileinput({
                                                                uploadUrl: "pages/guardaproyecto.php?codigo=<?php echo  $id ?>", // server upload action
                                                                uploadAsync: true,
                                                                maxFileCount: 1,
                                                                showBrowse: false,
                                                                browseOnZoneClick: true
                                                            });
                                                   </script>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->


           

   <div class="modal fade" id="img1<?php echo $id  ?>" tabindex="-1" role="basic" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Editar Imagen de transición 1</h4>
                                                </div>
                                                <div class="modal-body">Imagen Actual:  <img width="80px" src="../img/<?php echo  $fila->img1; ?>"></div>
                                                <div class="modal-footer">
                                                  
                                                  <input id="img11<?php echo  $id ?>" name="transi[]" type="file" multiple class="file-loading">
                                                  <script type="text/javascript">
                                                             $("#img11<?php echo  $id ?>").fileinput({
                                                                uploadUrl: "pages/guardaproyecto.php?codigo=<?php echo  $id ?>", // server upload action
                                                                uploadAsync: true,
                                                                maxFileCount: 1,
                                                                showBrowse: false,
                                                                browseOnZoneClick: true
                                                            });
                                                   </script>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
                                                
    

   <div class="modal fade" id="img2<?php echo $id  ?>" tabindex="-1" role="basic" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Editar Imagen de transición 2</h4>
                                                </div>
                                                <div class="modal-body">Imagen Actual:  <img width="80px" src="../img/<?php echo  $fila->img2; ?>"></div>
                                                <div class="modal-footer">
                                                  
                                                  <input id="img22<?php echo  $id ?>" name="transi1[]" type="file" multiple class="file-loading">
                                                  <script type="text/javascript">
                                                             $("#img22<?php echo  $id ?>").fileinput({
                                                                uploadUrl: "pages/guardaproyecto.php?codigo=<?php echo  $id ?>", // server upload action
                                                                uploadAsync: true,
                                                                maxFileCount: 1,
                                                                showBrowse: false,
                                                                browseOnZoneClick: true
                                                            });
                                                   </script>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
    

   <div class="modal fade" id="img3<?php echo $id  ?>" tabindex="-1" role="basic" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Editar Imagen de transición 3</h4>
                                                </div>
                                                <div class="modal-body">Imagen Actual:  <img width="80px" src="../img/<?php echo  $fila->img3; ?>"></div>
                                                <div class="modal-footer">
                                                  
                                                  <input id="img33<?php echo  $id ?>" name="transi2[]" type="file" multiple class="file-loading">
                                                  <script type="text/javascript">
                                                             $("#img33<?php echo  $id ?>").fileinput({
                                                                uploadUrl: "pages/guardaproyecto.php?codigo=<?php echo  $id ?>", // server upload action
                                                                uploadAsync: true,
                                                                maxFileCount: 1,
                                                                showBrowse: false,
                                                                browseOnZoneClick: true
                                                            });
                                                   </script>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                   
                                            </tr>
                                         

                                           <?php 


                                                       


                                                              }
                                            ?>  
                                        </tbody>
                                    </table>
                                </div>
                            </div>
              
                                      
                         </div>
                           </div>
                              </div>
                               

<script type="text/javascript">
$(document).ready(function(){


       $(".btn").click(function(){
        $(".modal-identity").text($(this).parents("tr").attr("data-id"));
      });
});
</script>


  <div class="modal fade" id="video" tabindex="-1" role="basic" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Cargar Videos: <n><?php echo  $fila->titulo; ?></n></h4>
                                                </div>
                                                <div class="modal-identity"></div>
                                                <div class="modal-body">  Cargue un  maximo de 5 videos.   </div>
                                                <div class="modal-footer">
                                              

                                                
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>



<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>