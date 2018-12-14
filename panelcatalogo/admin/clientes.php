
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


  $x1=$_GET["codigo1"];
                      
if( $x1=="" ){
                echo "";

             }else{



 $consultap="SELECT * FROM pagina where idusuario='$x1'";

    $bd2 = new GestarBD;  
    $bd2->consulta($consultap);
     while ($fila2=$bd2->mostrar_registros()) { 
      $portada=$fila2->portada;
      $icono=$fila2->logo;
      $favicon=$fila2->favicon;

       if($portada!=""){
             unlink('../imgpag/'.$portada.'');//acá le damos la direccion exacta del archivo
        }

       if($icono!=""){
             unlink('../imgpag/'.$logo.'');//acá le damos la direccion exacta del archivo
        }

       if($favicon!=""){
             unlink('../imgpag/'.$favicon.'');//acá le damos la direccion exacta del archivo
        }

     }



 $sql5="delete from pagina where idusuario='$x1'";
 $bd->consulta($sql5);
            


// // $consulta="SELECT * FROM catalogo where id_categoria='$x1'";

            $consulta="SELECT * FROM administrador
                 INNER JOIN categoria ON categoria.idusuario=administrador.id
                INNER JOIN catalogo ON catalogo.id_categoria=categoria.id_categoria 
                 WHERE administrador.id='$x1'
                  ";

   $bd->consulta($consulta);
  while ($fila=$bd->mostrar_registros()) { 
      $idd= $fila->id_catalogo;
       $idcata= $fila->id_categoria;


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

    $sql2="delete from catalogo where id_categoria='$idcata'";
    $bd->consulta($sql2);


 $sql="delete from categoria where idusuario='$x1'";
 $bd->consulta($sql);


 $sql4="delete from administrador where id='$x1'";
 $bd->consulta($sql4);
                          

   
                            //echo "Datos Guardados Correctamente";
                            echo '<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Bien!</b> Se Elimino Correctamente... </div>';



}

}

 

if (isset($_GET['guarda'])) { 

  
  
  $codigo=$_POST["codigo"]; 
   $limite=$_POST["limite"];
  $paquete=$_POST["paquete"];


                    
if($codigo=="" ){
echo "";
}else{


$sql="INSERT INTO `token` (`idtoken`, `token`, `limite`, `idtoken_idpaquete`) VALUES (NULL, '$codigo', '$limite', '$paquete');";
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
?>
<div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject bold uppercase">Lista De Clientes</span>
                                    </div>
                                  
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
                                        <thead>
                                            <tr>
                                           
                                                <th class="all">Nombre</th>
                                                <th class="min-phone-l">Correo</th>
                                                <th class="min-phone-l">Token</th>
                                                <th class="min-phone-l">Paquetes</th>
                                                <th class="none">Eliminar</th>
                                               

                                            </tr>
                                        </thead>
                                        <tbody>
<tr>
                                           <?php



    $consulta="SELECT * FROM token
     INNER JOIN paquete ON token.idtoken_idpaquete=paquete.id_paquete
     INNER JOIN administrador ON administrador.id_token=token.idtoken WHERE nivel='0'";
    $bd->consulta($consulta);
    while ($fila=$bd->mostrar_registros()) { 
      
echo "
       
          <td>

 ".$fila->nombre."
          </td>

          <td>



 ".$fila->correo."
          </td>

          <td>
 ".$limite1=$fila->token."
          </td>

        
   <td>
 ".$limite1=$fila->nombre_p." "?>
          </td>
                                      
       
    <td>  <a onclick="if(confirmDel() == false){return false;}" class="btn btn-danger" href="?admin=clientes&eliminar&codigo1=<?php echo  $fila->id ?>"><i class="icon-trash"></i></a>     </td>      
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
                </div>
