 


 <?php


if (isset($_GET['lista'])) { 




echo $nombre=$_POST["nombre"];

                            if( $nombre==""  )
                {

                    echo "
   <script> alert('campos vacios')</script>
   ";
                    echo "<br>";
                }else{

                            $sql="INSERT INTO `categoria` ( `nombre`, `idusuario`) VALUES ( '$nombre', '$iduser')";
                                          

$bd->consulta($sql);
   
                        
    } 
/*}

    if (isset($_GET['catalogo'])) { 
*/

echo $x1=$_GET["codigo"];
echo $titulo=$_POST["titulo"];
echo $contenido=$_POST["contenido"];
echo $imgfondo=$_POST["imgfondo"];
echo $imgprincipal=$_POST["imgprincipal"];
$img1=$_POST["img1"];  
$img2=$_POST["img2"]; 
$img3=$_POST["img3"];
$url=$_POST["url"];


  $foto=$_FILES["foto"]["name"];
  $fotoperfil=$_FILES["imgprincipal"]["name"];
  $fotoimg1=$_FILES["img1"]["name"];      
  $fotoimg2=$_FILES["img2"]["name"];
  $fotoimg3=$_FILES["img3"]["name"];                     


  if($foto!="" )
                {
                     $porciones = explode(" ",$titulo);
    $a=$porciones[0]; // porción1
    $b=$porciones[1];
    $c=$porciones[2];

   
$nom=$a.$b.$c.'fondo.jpg';     
       
                     
                        $fototmp = $_FILES["foto"]["tmp_name"];

/*
                           $actualizar = "UPDATE `inicio` SET 
                                                    `fondo` = '$nom' WHERE `id` =1 ";
                           $bd->consulta($actualizar);
 */
                            //print_r($_FILES);
                            ini_set('memory_limit', '512M');

                            //unlink("../images/municipios/".$nom);

                            copy($fototmp,"images".$foto);
                            $thumb=new thumbnail("images".$foto);
                           //setea el alto de la copia
                            $thumb->size_width(768);//setea el ancho de la copia
                           //$thumb->size_height(252);
                            $thumb->jpeg_quality(85);//setea la calidad jpg
                            //$nom=$_POST["nombre"].".jpg";
                            //$nomfoto=$_FILES['foto']['name'];
                            //$nom1 = explode(".", $nomfoto);
                            //$nom = $nom1[0].".jpg";
                            $thumb->save("../catalogo/img/$nom");            //guardarla en el servidor
                            unlink("images".$foto);   

}
 if($fotoperfil!="" )
                {


$nom2=$titulo.'principal.jpg';
 $foto=$_FILES["imgprincipal"]["name"];
                        $fototmp = $_FILES["imgprincipal"]["tmp_name"];

/*
                           $actualizar = "UPDATE `inicio` SET 
                                                    `fondo` = '$nom' WHERE `id` =1 ";
                           $bd->consulta($actualizar);
 */
                            //print_r($_FILES);
                            ini_set('memory_limit', '512M');

                            //unlink("../images/municipios/".$nom);

                            copy($fototmp,"images".$foto);
                            $thumb=new thumbnail("images".$foto);
                            $thumb->size_width(600);//setea el ancho de la copia
                            //$thumb->size_height(580);//setea el alto de la copia
                            $thumb->jpeg_quality(85);//setea la calidad jpg
                            //$nom=$_POST["nombre"].".jpg";
                            //$nomfoto=$_FILES['foto']['name'];
                            //$nom1 = explode(".", $nomfoto);
                            //$nom = $nom1[0].".jpg";
                            $thumb->save("../catalogo/img/$nom2");            //guardarla en el servidor
                            unlink("images".$foto);   


                  }
if($fotoimg1!="" )
                {


$nomimg1=$titulo.'img1.jpg';
                    $foto=$_FILES["img1"]["name"];
                        $fototmp = $_FILES["img1"]["tmp_name"];

/*
                           $actualizar = "UPDATE `inicio` SET 
                                                    `fondo` = '$nom' WHERE `id` =1 ";
                           $bd->consulta($actualizar);
 */
                            //print_r($_FILES);
                            ini_set('memory_limit', '512M');

                            //unlink("../images/municipios/".$nom);

                            copy($fototmp,"images".$foto);
                            $thumb=new thumbnail("images".$foto);
                            $thumb->size_width(600);//setea el ancho de la copia
                            //$thumb->size_height(580);//setea el alto de la copia
                            $thumb->jpeg_quality(85);//setea la calidad jpg
                            //$nom=$_POST["nombre"].".jpg";
                            //$nomfoto=$_FILES['foto']['name'];
                            //$nom1 = explode(".", $nomfoto);
                            //$nom = $nom1[0].".jpg";
                            $thumb->save("../catalogo/img/$nomimg1");            //guardarla en el servidor
                            unlink("images".$foto);   


                  }
if($fotoimg2!="" )
                {


$nomimg2=$titulo.'img2.jpg';
                    $foto=$_FILES["img2"]["name"];
                        $fototmp = $_FILES["img2"]["tmp_name"];

/*
                           $actualizar = "UPDATE `inicio` SET 
                                                    `fondo` = '$nom' WHERE `id` =1 ";
                           $bd->consulta($actualizar);
 */
                            //print_r($_FILES);
                            ini_set('memory_limit', '512M');

                            //unlink("../images/municipios/".$nom);

                            copy($fototmp,"images".$foto);
                            $thumb=new thumbnail("images".$foto);
                            $thumb->size_width(600);//setea el ancho de la copia
                            //$thumb->size_height(580);//setea el alto de la copia
                            $thumb->jpeg_quality(85);//setea la calidad jpg
                            //$nom=$_POST["nombre"].".jpg";
                            //$nomfoto=$_FILES['foto']['name'];
                            //$nom1 = explode(".", $nomfoto);
                            //$nom = $nom1[0].".jpg";
                            $thumb->save("../catalogo/img/$nomimg2");            //guardarla en el servidor
                            unlink("images".$foto);   


                  }
                  if($fotoimg3!="" )
                {


$nomimg3=$titulo.'img3.jpg';
                    $foto=$_FILES["img3"]["name"];
                        $fototmp = $_FILES["img3"]["tmp_name"];

/*
                           $actualizar = "UPDATE `inicio` SET 
                                                    `fondo` = '$nom' WHERE `id` =1 ";
                           $bd->consulta($actualizar);
 */
                            //print_r($_FILES);
                            ini_set('memory_limit', '512M');

                            //unlink("../images/municipios/".$nom);

                            copy($fototmp,"images".$foto);
                            $thumb=new thumbnail("images".$foto);
                            $thumb->size_width(600);//setea el ancho de la copia
                            //$thumb->size_height(580);//setea el alto de la copia
                            $thumb->jpeg_quality(85);//setea la calidad jpg
                            //$nom=$_POST["nombre"].".jpg";
                            //$nomfoto=$_FILES['foto']['name'];
                            //$nom1 = explode(".", $nomfoto);
                            //$nom = $nom1[0].".jpg";
                            $thumb->save("../catalogo/img/$nomimg3");            //guardarla en el servidor
                            unlink("images".$foto);   


                  }


  

$aa="SELECT id_categoria FROM `categoria` where nombre='$nombre'";
$bd->consulta($aa);
 while($a = $bd->mostrar_registros()){

$a->id_categoria;
 }
              


$sql="INSERT INTO `catalogo` (`imgfondo`, `imgprincipal`, `img1`, `img2`, `img3`, `titulo`, `contenido`, `url`,'id_categoria') VALUES
         ('$nom', '$nom2', '$nomimg1', '$nomimg2', '$nomimg3', '$titulo', '$contenido','$url','$a')";                 

//$sql="UPDATE catalogo SET 
//titulo='$titulo', contenido='$contenido',imgfondo='$imgfondo',imgprincipal='$imgprincipal',img1='$img1', img2='$img2', img3='$img3' where id_catalogo='$x1'";

$bd->consulta($sql);
   
                            //echo "Datos Guardados Correctamente";
                            echo '<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Bien!</b> Datos Registrados Correctamente... ';

                               echo '   </div>';


                           }


       ?>            
                    <div class="row">
                        <div class="col-md-12">
                          
                            <div class="portlet light bordered" id="form_wizard_1">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-layers font-red"></i>
                                        <span class="caption-subject font-red bold uppercase">
                                            <span> Registro de catalogo </span>
                                        </span>
                                    </div>
                                   
                                </div>
                                <div class="portlet-body form">
   
                                    <form class="form-horizontal" action="?mod=cargar&lista=lista" id="submit_form" method="POST">
                                        <div class="form-wizard">
                                            <div class="form-body">
                                                <ul class="nav nav-pills nav-justified steps">
                                                    <li>
                                                        <a href="#tab1" data-toggle="tab" class="step">
                                                            <span class="number"> 1 </span>
                                                            <span class="desc">
                                                                <i class="fa fa-check"></i> Registrar Catalogo </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab2" data-toggle="tab" class="step">
                                                            <span class="number"> 2 </span>
                                                            <span class="desc">
                                                                <i class="fa fa-check"></i> Cargar Contenido </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab3" data-toggle="tab" class="step active">
                                                            <span class="number"> 3 </span>
                                                            <span class="desc">
                                                                <i class="fa fa-check"></i>Galerias internas </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab4" data-toggle="tab" class="step">
                                                            <span class="number"> 4 </span>
                                                            <span class="desc">
                                                                <i class="fa fa-check"></i> Confirmar</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <div id="bar" class="progress progress-striped" role="progressbar">
                                                    <div class="progress-bar progress-bar-success"> </div>
                                                </div>
                                                <div class="tab-content">
                                                    <div class="alert alert-danger display-none">
                                                        <button class="close" data-dismiss="alert"></button> Algo anda mal. </div>
                                                    <div class="alert alert-success display-none">
                                                        <button class="close" data-dismiss="alert"></button> Paso Completado! </div>
                                                    <div class="tab-pane active" id="tab1">
                                                        <h3 class="block">Detalles de tu Catalogo</h3>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Nombre del Catalogo
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" name="nombre" required />
                                                                <span class="help-block"> Introduce el nombre del catalogo  </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="tab2">
                                                        <h3 class="block">Ingresa tu primer catalogo </h3>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"> Titulo 
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" name="titulo" required/>
                                                                <span class="help-block"> Titulo de la caja de contenido</span>
                                                            </div>
                                                        </div>

                                                         <div class="form-group">
                                                            <label class="control-label col-md-3">Contenido</label>
                                                            <div class="col-md-4">
                                                                <textarea class="form-control" rows="3" name="contenido" required></textarea>
                                                                 <span class="help-block"> texto dedescripcion  </span>
                                                            </div>
                                                        </div>


                                                       
                                                         <div class="form-group">
                                                            <label class="control-label col-md-3">Imagen de Fondo 
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                               <input class="form-control" type="file" id="exampleInputFile" required name="foto" value="imgfoto" required>
                                                                <span class="help-block"> Preferiblemente resoluciones 760*250 </span>
                                                            </div>
                                                        </div>
                                                      
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Imagen de Perfil
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                 <input class="form-control" type="file" id="exampleInputFile" required name="imgprincipal" value="imgprincipal"  required>
                                                                <span class="help-block"> Imagen de Perfil del slider </span>
                                                            </div>
                                                        </div>


                                                          <div class="form-group">
                                                            <label class="control-label col-md-3">Imagen perfil slider 1
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                 <input class="form-control" type="file" id="exampleInputFile" required name="img1" value="imgprincipal"  required>
                                                                <span class="help-block"> Imagen que cambia el ver la de perfil </span>
                                                            </div>
                                                        </div>


                                                          <div class="form-group">
                                                            <label class="control-label col-md-3">Imagen Perfil slider 2
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                 <input class="form-control" type="file" id="exampleInputFile" required name="img2" value="imgprincipal"  required>
                                                                <span class="help-block">Imagen que cambia el ver la de perfil </span>
                                                            </div>
                                                        </div>

                                                          <div class="form-group">
                                                            <label class="control-label col-md-3">Imagen Perfil slider 3
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                 <input class="form-control" type="file" id="exampleInputFile" required name="img3" value="imgprincipal"  required>
                                                                <span class="help-block"> Imagen que cambia el ver la de perfil </span>
                                                            </div>
                                                        </div>

                                                      
                                                <button type="submit" class="btn btn-primary btn-lg" name="lugarguardar" value="Guardar">Cargar Imagenes</button>

                                                       
                                                    </div>
                                                    <div class="tab-pane" id="tab3">
                                 </form>
                                   <form >
                               </form>
                 


                            <form action="#" class="dropzone dropzone-file-area" id="my-dropzone" style="width: 500px; margin-top: 50px;">
                                <h3 >Arrastra o sube las imagenes que quieres cargar</h3>
                                <p>  Haz click aqui...!!   </p>
                            </form>
                 


                                                        
                                                    </div>
                                                    <div class="tab-pane" id="tab4">
                                                        <h3 class="block">Confirmacion</h3>
                                                        <h4 class="form-section">Catalogo</h4>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Nombre de catalogo:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="nombre"> </p>
                                                            </div>
                                                        </div>
                                                      
                                                        <h4 class="form-section">Detalles</h4>
                                                          <div class="form-group">
                                                            <label class="control-label col-md-3">Titulo:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="titulo"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">contenido</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="contenido"> </p>
                                                            </div>
                                                        </div>
                                                      
                                                      
                                                      
                                                     
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <a href="javascript:;" class="btn default button-previous">
                                                            <i class="fa fa-angle-left"></i> Atras </a>
                                                        <a href="javascript:;" class="btn btn-outline green button-next"> Continuar
                                                            <i class="fa fa-angle-right"></i>
                                                        </a>
                                                        <a href="javascript:;" class="btn green button-submit"> Cargar
                                                            <i class="fa fa-check"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
