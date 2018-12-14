
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


 <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
   <script>
     $(function(){   
       $("#file").on("change", function(){
           /* Limpiar vista previa */
           $("#vista-previa").html('');
              $("#respuesta").html('');
           var archivos = document.getElementById('file').files;
           var navegador = window.URL || window.webkitURL;
           /* Recorrer los archivos */
           for(x=0; x<archivos.length; x++)
           {
               /* Validar tamaño y tipo de archivo */
               var size = archivos[x].size;
               var type = archivos[x].type;
               var name = archivos[x].name;
                if (name =='')//1MB
               {
                   $("#vista-previa").append("<p style='color: red'> Seleccione las imagenes</p>");
               }
               else if (size > 1024*1024)//1MB
               {
                   $("#vista-previa").append("<p style='color: red'>El archivo "+name+" supera el máximo permitido 1MB</p>");
               }
               else if(type != 'image/jpeg' && type != 'image/jpg' && type != 'image/png' && type != 'image/gif')
               {
                   $("#vista-previa").append("<p style='color: red'>El archivo "+name+" no es del tipo de imagen permitida.</p>");
               }
               else
               {
                 var objeto_url = navegador.createObjectURL(archivos[x]);
                 $("#vista-previa").append("<img src="+objeto_url+" width='250' height='250'>");
               }
           }
       });
       
       $("#btn").on("click", function(){
            var formData = new FormData($("#formulario")[0]);
            var ruta = "pages/multiple-ajax.php";
            $.ajax({
                url: ruta,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(datos)
                {
                    $("#respuesta").html(datos);
                }
            });
           });
       
     });
    </script>
   <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                             
                                                   <center>
                                             <th>Titulo del Proyecto</th>
                                             
                                             <th>Cargar Galeria al contenido </th>
                                             <th>Cargar Contenido </th>
                                             <th>Editar Galerias </th>
                                               

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                
   <!--        codigo para varios videos deyoutube
<script type="text/javascript">
//agrgar campos
  $(document).ready(function() {
    $("#add").click(function() {
        var intId = $("#buildyourform div").length + 1;
        var fieldWrapper = $("<div class=\"fieldwrapper\" id=\"field" + intId + "\"/>");
        var fName = $("<input placeholder='https://www.youtube.com/'\ type=\"text\" class=\"fieldname\" />");
        var fType = $("<select class=\"fieldtype\"><option value=\"checkbox\">Youtube</option><option value=\"textbox\">Otro</option></select>");
        var removeButton = $("<input type=\"button\" class=\"remove\" value=\"-\" />");
        removeButton.click(function() {
            $(this).parent().remove();
        });
        fieldWrapper.append(fName);
        fieldWrapper.append(fType);
        fieldWrapper.append(removeButton);
        $("#buildyourform").append(fieldWrapper);
    });
    $("#preview").click(function() {
        $("#yourform").remove();
        var fieldSet = $("<fieldset id=\"yourform\"><legend>Your Form</legend></fieldset>");
       
        $("body").append(fieldSet);
    });
});


</script>
-->



  
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
   
<form method="post" id="formulario" enctype="multipart/form-data">
   <input required type="file" id="file" name="file[]" multiple>
    <input type="hidden" name="codigo" value="<?php echo $x1 ?>">
</td>
<td><center>
    <button  class="btn btn-primary fa fa-floppy-o"  type="button" id="btn"></button>
    </center></td>
</form>

                                                        </center>

                                                        </td>
                                                        <td>
       
           <center>
 <a class="btn btn-primary " href="?mod=mutiple&edita&codigos=<?php echo  $x2 ?>&codigo=<?php echo  $x1 ?>"><i class="fa fa-wrench"></i></a>          
 </center>
        
        
        
                                                        </td>

                                                </tr>
                                     
                                                  
                                            </tbody>
                                        </table>


<div id="respuesta"></div>

  <div id="vista-previa"></div>
 





 




</div>
</div>
  </div>
</div>
<!-- END SAMPLE TABLE PORTLET-->
</div>
</div>


