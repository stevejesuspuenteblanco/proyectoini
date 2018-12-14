 <?php 




 $x1=$_GET["galeria"];
//id catalogos    
   $x2=$_GET["catalogo"];
   $ca=$_GET["carga"];
?>


 
    <link href="http://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/validationEngine.jquery.css" rel="stylesheet">
    
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/jquery.validationEngine.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/languages/jquery.validationEngine-es.js"></script>
	<style>
		.top-buffer { 
			margin-top:20px; 
		}
	</style>



<div id="container ">
	<div class="row-fluid top-buffer">
		<div class="col-lg-12 col-lg-offset-0 text-center">
			<form id="miform" method="post" name="miform" >
				<table id="tblprod" class="table table-hover table-bordered">


					  <thead>

<tr><td></td><td><h4><?php
                                                 
$consulta="SELECT * FROM `catalogo` WHERE id_catalogo='$x1'";
//$consulta="SELECT *FROM galeria JOIN catalogo ON galeria.id_catalogo=catalogo.id_catalogo where galeria.id_catalogo='$x1'";
$bd->consulta($consulta);
while ($fila=$bd->mostrar_registros()) { 
echo  $fila->titulo;

 }
 ?></h4><td>  <a class="btn btn-primary " href="?mod=mutipleedita&codigos=<?php echo  $x2 ?>&codigo=<?php echo  $x1 ?>"><i class="fa fa-wrench"> Ver Galeria</i></a>            
 </center></td>
						  
						</tr>


						<tr>
						  <th>N°</th>
						  <th>Url del video que deseas Agregar</th>
						  <th><center>Agregar Otro</center></th>
						  
						</tr>
					  </thead>
					  <tbody>
						<tr>
						  <td>1</td>
						   <td>
							<div class="form-group col-lg-12">
								<input class="form-control validate[required]"name="prod[]" />
							</div>
						 </td>
						 <td>
						 	<button id="btnadd" class="btn btn-primary">+</button></td>
						 	 
						 

						
			  
						</tr>

					  </tbody>
					</table>
				
					<button id="btnsubmit" type="submit" class="btn btn-success">Guardar</button>
			</form>
		</div>
	</div>
	
</div>

<script type="text/javascript">
$(function() {
	var MaxInputs       = 4; //Número Maximo de Campos

    var count = 1;
    jQuery("#miform").validationEngine({promptPosition : "centerRight:0,-5"});
	
   $(document).on("click","#btnadd",function( event ) {  
 if( count <= MaxInputs) //max input box allowed
        {
           

	  count++;


      $('#tblprod tr:last').after('<tr><td>'+count+'</td><td><div class="form-group col-lg-12"><input class="form-control validate[required]" name="prod[]" /></div></td></tr>');
      }
      event.preventDefault();
   });
   
   $( "#miform" ).submit(function( event ) {
          var frm = $(this);
	  var formulario = $(this).serialize();
	  
	  if($('#miform').validationEngine('validate')){
	  $.post( "pages/guarda2.php?codigo=<?php echo $x1 ?>", formulario)
		        .done(function(data){
		          alert( "Videos Agregados exitosamente" );
			  $(frm)[0].reset();
			})
			.fail(function() {
            alert( "error no pude enviar los datos" );
			});
	  }
	  event.preventDefault();
	});
});
	</script>

</div>


</div>

<!-- var MaxInputs       = 8; //Número Maximo de Campos
    var contenedor       = $("#contenedor"); //ID del contenedor
    var AddButton       = $("#agregarCampo"); //ID del Botón Agregar

    //var x = número de campos existentes en el contenedor
    var x = $("#contenedor div").length + 1;
    var FieldCount = x-1; //para el seguimiento de los campos

    $(AddButton).click(function (e) {
        if(x <= MaxInputs) //max input box allowed
        {
            FieldCount++;
            //agregar campo
            $(contenedor).append('<div><input type="text" name="mitexto[]" id="campo_'+ FieldCount +'" placeholder="Texto '+ FieldCount +'"/><a href="#" class="eliminar">&times;</a></div>');
            x++; //text box increment
        }
        return false;
    }); -->