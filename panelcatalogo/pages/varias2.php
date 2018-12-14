
        <link href="assets/fileinput.css" media="all" rel="stylesheet" type="text/css" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="assets/fileinput.js" type="text/javascript"></script>
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js" type="text/javascript"></script>
<?php
//id de galerias
    $x1=$_GET["galeria"];
//id catalogos    
    $x2=$_GET["catalogo"];
?>

<div class="row">
<div class="col-md-12">
<div class="portlet box green">
<div class="portlet-title">
<div class="caption">
<i class="fa fa-comments"></i>Seleccione el catalogo que deseas agregarle galerias  (solo se veran categorias que tengan catalogos registrados)</div>
<div class="tools">
<a href="javascript:;" class="collapse"> </a>
<a href="javascript:;" class="reload"> </a>
</div>
</div>


<div class="portlet-body">
        <div class="table-scrollable">
                    <table class="table table-striped table-hover">
                        <thead>



   <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                             
                                                   <center>
                                             <th>Titulo del Proyecto</th>
                                             
                                             <th> </th>
                                             <th> </th>
                                             <th>Editar Galerias </th>
                                               

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                



  
<td>
<?php


                                                 
$consulta="SELECT * FROM `catalogo` WHERE id_catalogo='$x1'";
//$consulta="SELECT *FROM galeria JOIN catalogo ON galeria.id_catalogo=catalogo.id_catalogo where galeria.id_catalogo='$x1'";
$bd->consulta($consulta);
while ($fila=$bd->mostrar_registros()) { 
echo  $fila['titulo'];

 }
 ?>
    
            </td>

<!--<fieldset id="buildyourform">
</fieldset>
<input type="button" value="Agregar url Video +" class="add" id="add" />-->       
    <td>
    </td>
    <td>


                                                        </center>

                                                        </td>
                                                        <td>
       
          
 <a class="btn btn-primary " href="?mod=mutipleedita&codigos=<?php echo  $x2 ?>&codigo=<?php echo  $x1 ?>"><i class="fa fa-wrench"></i></a>          
 </center>
        
        
        
                                                        </td>

                                                </tr>
                                     
                                                  
                                            </tbody>
                                        </table>

<input id="input-711" name="file[]" type="file" multiple class="file-loading">

<script type="text/javascript">
$("#input-711").fileinput({
    uploadUrl: "pages/guarda.php?codigo=<?php echo  $x1 ?>", // server upload action
    uploadAsync: true,
    maxFileCount: 5,
    showBrowse: false,
    browseOnZoneClick: true
});
</script>





 




</div>
</div>
  </div>
</div>
<!-- END SAMPLE TABLE PORTLET-->
</div>
</div>


