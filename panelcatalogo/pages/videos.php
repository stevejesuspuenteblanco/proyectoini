
<?php
//id de galerias
    $x1=$_GET["galeria"];
//id catalogos    
    $x2=$_GET["catalogo"];
    $ca=$_GET["carga"];



 

for($x =0 ; $x <= $_POST['cantidad'] ; $x++) 
if(isset($_POST["num" . $x])) {
$url=  $_POST["url".$x ];
$des=$_POST["descripcion".$x ];
 $carga=$_POST["carga"];

 $url2 = str_replace("watch?v=", "embed/", $url, $count);
echo $str;  

 $consulta2="INSERT INTO galeria (tipoimg, nomimg, des, url, id_catalogo) VALUES ('2', '$url', '$des', '$url2', '$x1')";
 mysqli_query($consulta2);



 header("Location:?mod=videos&catalogo=".$x2."&galeria=".$x1."&carga=".$carga."");

}


 if ($ca==1) { 
  echo '<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Bien!</b> Videos Guardados con exito  ';

                               echo '   </div>';
                               }


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
        <center>
                    <table class="table table-striped table-hover">
                        <thead>


 <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  


   <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                             
                                                   <center>
                                             <th>Titulo del Proyecto</th>
                                             
                                             <th>Cargar Galeria al contenido </th>
                                             
                                             <th>Editar Galerias </th>                       
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
  

  
<td>
<?php




                                                 
$consulta="SELECT * FROM catalogo where id_categoria='$x2'";
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

  
<form id="form1" name="form1" method="post" action="?mod=videos&catalogo=<?php echo $x2 ?>&galeria=<?php echo $x1 ?>">
  N. de Videos Que quieres Registrar:
  <input name="cantidad" type="number" min="1" id="cantidad" value="1" >
  <input type="hidden" name="carga" value="2" >
  <input type="submit" name="Submit" value="Ok" >

</form>





</td>
                  
                                                        </td>
                                                        <td>
       
           <center>
 <a class="btn btn-primary " href="?mod=mutiple&edita&codigos=<?php echo  $x2 ?>&codigo=<?php echo  $x1 ?>"><i class="fa fa-wrench"></i></a>          
 </center>
        
        
        
                                                        </td>

                                                </tr>
                                     
                                                  
                                            </tbody>
                                        </table>



<?php if($cantidad==""){
 ?>

  <?php
  $cantidad=1;
  While($cantidad<=$_POST['cantidad']){ 
  ?>

<form method="POST">
<table width="auto" border="0" class="table table-striped table-hover">
  <tr>
    <td></td>
    <td>URL:</td>
    <td>Descripcion del video:</td>
  </tr>
  <tr>
    <td><? echo "$cantidad"; ?></td>
    <td><input class="form-control" type="url" placeholder="https://www.youtube.com/" name="url<?php echo "$cantidad";?>" required></td>
    <td><input  class="form-control" type="text" name="descripcion<?php echo $cantidad ?>" required></td>
  <input name="num<?php echo $cantidad ?>" type="hidden">
   <input name="carga" type="hidden" value="1">
  <input  name="cantidad" type="hidden" id="cantidad" value="<?php echo $_POST['cantidad']; ?>" />
<?php
$cantidad++;
}
?>
  </tr>
  <tr>
    <td colspan="3" align="right">
    
   
    </td>

<?php } ?>  
  </tr>

</table>
 <button  name="submit"  name="submit"  class="btn btn-primary fa fa-floppy-o"></button>
</form>                                    




</div>
</div>
  </div>
</div>
<!-- END SAMPLE TABLE PORTLET-->
</div>
</div>
