
<div class="modal fade" id="1" tabindex="-1" role="basic" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
               <div class="htmlNoPages">                                 
     <div class="gwd-div-1w1r">
                <img src="img/screencapture-localhost-nuevocat-catalogo-panelcatalogo-index-php-1484234674794.png" class="gwd-img-15zi" id="fondo">
              </div>
                    <p class="gwd-p-1cpe">proyecto 1</p>
        <div class="gwd-animation-event event-1-animation" data-event-name="event-1" data-event-time="2100"></div>
                    <img src="img/screencapture-localhost-nuevocat-catalogo-panelcatalogo-index-php-1484237249523.png" class="gwd-img-1yyx gwd-gen-1dv6gwdanimation" id="fondo2">
                    <img src="img/BATERIA.png" class="gwd-img-7tyb gwd-gen-1fv3gwdanimation" id="puntero">
                          
</div>
                                            </div>
                                            <!-- /.modal-content -->

          


                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>



         



<script LANGUAGE="JavaScript">
function confirmDel(url){
//var agree = confirm("¿Realmente desea eliminarlo?");
if (confirm("¿Realmente desea eliminarlo se eliminara todo el contenido ?"))
    window.location.href = url;
else
    return false ;
}
</script>



<?php

//eliminar 
if (isset($_GET['eliminar'])) { 


 $x1=$_GET["codigo"];


                       
if( $x1=="" ){
    echo "<script> alert('campos vacios')</script>";
    echo "<br>";
}else{


$consulta="SELECT * FROM catalogo where id_categoria='$x1'";

$bd->consulta($consulta);
while ($fila=$bd->mostrar_registros()) { 
     $idd= $fila->id_catalogo;


     $consulta="SELECT * FROM galeria where id_catalogo='$idd'";

$bd1 = new GestarBD;  
     $bd1->consulta($consulta);
     while ($fila1=$bd1->mostrar_registros()) { 
        $elimina=$fila1->nomimg;
        $tipoimg=$fila1->tipoimg;

        if($tipoimg==1){
             unlink('../img/'.$elimina.'');//acá le damos la direccion exacta del archivo
        }

     }
     $sql3="delete from galeria where id_catalogo='$idd'";
     $bd1->consulta($sql3);

    $eliminaf=$fila->imgfondo;
    $eliminap=$fila->imgprincipal;
    $elimina1=$fila->img1;
    $elimina2=$fila->img2;
    $elimina3=$fila->img3;
    $tipoimg=$fila->tipoimg;


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
}
$sql2="delete from catalogo where id_categoria='$x1'";
$bd->consulta($sql2);

$sql="delete from categoria where id_categoria='$x1'";
$bd->consulta($sql);

                          

   
                            //echo "Datos Guardados Correctamente";
                            echo '<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Bien!</b> Se Elimino Correctamente... </div>';



}

}


if (isset($_GET['crear'])) { 


$x1=$_GET["codigo"];
$nombre=$_POST["nombre"];

 $sql="SELECT * FROM categoria where nombre='$nombre'";
$bd->consulta($sql);

            if ($bd->numeroFilas($sql) > 0) {
        
 echo '<div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Bien!</b> EL Nombre de este Proyecto Ya existe  ';

                               echo '   </div>';




                   }else{



                            if( $nombre==""  )
                {

                    echo "
   <script> alert('campos vacios')</script>
   ";
                    echo "<br>";
                }else{

                            $sql="INSERT INTO `categoria` ( `nombre`, `idusuario`) VALUES ( '$nombre', '$iduser')";
                                          

$bd->consulta($sql);
   
                            //echo "Datos Guardados Correctamente";
                            echo '<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Bien!</b> Datos Registrados Correctamente Ahora inserta imagenes a tu nuevo catalogo ... ';

  
                               echo '   </div>';
?>
<script>
window.location.href = "?mod=crear&codigo=<?php echo $x1 ?>";
</script>


<?php
}
    } 
}
//ecrear catalogo
?>
<div class="row">
<div class="col-md-12">
<div class="portlet box green">
<div class="portlet-title">
<div class="caption">
<i class="fa fa-comments"></i>Crear Nuevo Proyecto</div>
<div class="tools">
<a href="javascript:;" class="collapse"> </a>
<a href="javascript:;" class="reload"> </a>
</div>
</div>


<div class="portlet-body">
        <div class="table-scrollable">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                    <form role="form" action="?mod=crear&crear=crear" method="post" enctype="multipart/form-data">              
                    
                        <th>Nombre del Proyecto</th>
                        <th><center>Usuario</center></th>
                        <th></th>
                    
                        </thead>
                    <tbody>
                    <tr> 
                        <td><center>
                           <input   type="text" required type="tex" name="nombre" required class="form-control"> 
                        </td>
                        <td>
                        <center>
                         <?php echo $_SESSION['zippy_nombre']; ?>
                         </center>
                        </td>
                        <td><center>
                            <button type="submit" class="btn btn-primary btn-lg" name="lugarguardar" value="Guardar">Registrar Catalogo</button>
                            </center>
                        </td>
                    </form>
                    </tr>
                     
                      </tr>
                        </thead>
                  
                    </table>

 
</div>
</div>
</div>
<!-- END SAMPLE TABLE PORTLET-->





<style type="text/css">
   
    table {width:100%;box-shadow:0 0 10px #ddd;text-align:left}
  
    td {padding:5px;border:solid #ddd;border-width:0 0 1px;
    }
        .editable span{display:block;}
        .editable span:hover {background:url(img/edit.png) 30% 0  no-repeat; cursor:pointer}

        a.link   
{   
 text-decoration:none;   
 border-bottom: thin dashed;
} 
        
        td input{height:24px;width:200px;border:1px solid #ddd;padding:0 5px;margin:0;border-radius:6px;vertical-align:middle}
        a.enlace{display:inline-block;width:24px;height:24px;margin:0 0 0 5px;overflow:hidden;text-indent:-999em;vertical-align:middle}
            .guardar{background:url(img/save.png) 0 0 no-repeat}
            .cancelar{background:url(img/cancel.png) 0 0 no-repeat}
    
    .mensaje{display:block;text-align:center;margin:0 0 20px 0}
        .ok{display:block;padding:10px;text-align:center;background:green;color:#fff}
        .ko{display:block;padding:10px;text-align:center;background:red;color:#fff}
</style>

<div class="row">
<div class="col-md-12">
<div class="portlet box green">
<div class="portlet-title">
<div class="caption">
<i class="fa fa-comments"></i>Lista de Proyectos</div>
<div class="tools">
<a href="javascript:;" class="collapse"> </a>
<a href="javascript:;" class="reload"> </a>
</div>
</div>


<div class="portlet-body">
        <div class="table-scrollable">
        
<table class="editinplace table table-striped table-hover">
            <tr>
                <th>Cod.</th>
                <th>Nombre</th>
                <th>Cargar</th>
                <th>Editar</th>
                <th>Eliminar</th>
                
            </tr>
        </table>
    </div>
    
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script>
    $(document).ready(function() 
    {
        /* OBTENEMOS TABLA */
        $.ajax({
            type: "GET",
            url: "pages/editinplace.php?tabla=1&codigo=<?php echo $iduser ?>"
        })
        .done(function(json) {
            json = $.parseJSON(json)
            for(var i=0;i<json.length;i++)
            {
                $('.editinplace').append(
                    "<tr><td class='id'width='10%' >"+json[i].id+"</td><td class='editable' data-campo='nombre' width='40%' ><span><a class='link'>"+json[i].nombre+"</a></span></td><td width='10%'> <a class='btn btn-primary btn-lg' href='?mod=portafolio&nuevo&codigos="+json[i].id+"'><i class='icon-plus'></i></a> </td ><td width='10%'> <a class='btn btn-primary btn-lg' href='?mod=portafolioeditar&codigos="+json[i].id+"'><i class='icon-pencil'></i></a></td><td width='10%'><a onclick='if(confirmDel() == false){return false;}' class='btn btn-danger btn-lg' href='?mod=crear&eliminar&codigo="+json[i].id+"'><i class='icon-trash'></i></a></td></tr>");
            }
        });
        
        var td,campo,valor,id;
        $(document).on("click","td.editable span",function(e)
        {
            e.preventDefault();
            $("td:not(.id)").removeClass("editable");
            td=$(this).closest("td");
            campo=$(this).closest("td").data("campo");
            valor=$(this).text();
            id=$(this).closest("tr").find(".id").text();
            td.text("").html("<input type='text' name='"+campo+"' value='"+valor+"'><a class='enlace guardar' href='#'>Guardar</a><a class='enlace cancelar' href='#'>Cancelar</a>");
        });
        
        $(document).on("click",".cancelar",function(e)
        {
            e.preventDefault();
            td.html("<span><a class='link'>"+valor+"</a></span>");
            $("td:not(.id)").addClass("editable");
        });
        
        $(document).on("click",".guardar",function(e)
        {
            $(".mensaje").html("<img src='img/loading.gif'>");
            e.preventDefault();
            nuevovalor=$(this).closest("td").find("input").val();
            if(nuevovalor.trim()!="")
            {
                $.ajax({
                    type: "POST",
                    url: "pages/editinplace.php",
                    data: { campo: campo, valor: nuevovalor, id:id }
                })
                .done(function( msg ) {
                    $(".mensaje").html(msg);
                    td.html("<span><a class='link'>"+nuevovalor+"</a></span>");
                    $("td:not(.id)").addClass("editable");
                    setTimeout(function() {$('.ok,.ko').fadeOut('fast');}, 3000);
                });
            }
            else $(".mensaje").html("<p class='ko'>Debes ingresar un valor</p>");
        });
    });
    
    </script>



<!-- Mas scripts en -->

<!-- END QUICK SIDEBAR -->
</div>


</div>



<a class="btn red btn-outline sbold derecha" data-toggle="modal" href="#1">¿Ayuda? </a>
</div>
</div>
</div>
</div>
</div>






