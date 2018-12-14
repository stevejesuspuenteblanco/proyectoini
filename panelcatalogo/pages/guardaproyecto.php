<?php
include '../inc/config.php';
include '../inc/comun.php';

$bd = new GestarBD;

 $x1=$_GET['codigo'];

 $ver="SELECT * FROM catalogo WHERE id_catalogo='$x1'";
  $bd->consulta($ver);

if($_FILES["fondo"]!=""){



                                        while ($fila=$bd->mostrar_registros()) { 
       $a=$fila->titulo;

}

if($a==""){

  echo "se ha producido un error, primero  registra el titulo del proyecto en la pestaña datos basicos";
}


   $reporte = null;
     for($x=0; $x<count($_FILES["fondo"]["name"]); $x++)
    {
    $file = $_FILES["fondo"];
    $nombre = $file["name"][$x];
    $tipo = $file["type"][$x];
    $ruta_provisional = $file["tmp_name"][$x];
    $size = $file["size"][$x];
    

    $width = $dimensiones[0];
    $height = $dimensiones[1];
    $carpeta = "../../img/";

     if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif')
    {
       echo "<p style='color: red'>Error $nombre, el archivo no es una imagen  </p>";
    }
    else if($size > 1024*1024)// 1024*1024 = 1 MB
    {
        echo "<p style='color: red'>Error $nombre, el tamaño máximo permitido es 1MB</p>";
    }
  //  else if($width > 1800 || $height > 1200)
  //  {
   //     $reporte .= "<p style='color: red'>Error $nombre, tu imagen mide $width x $height y la altura máxima permitida es de 1800 x 1200</p>";
   // }
   
    else
    {

         $gale="fondo_";
    $name2=$gale.$a.$nombre;
    $name3 = preg_replace('[\s+]','', $name2);  


        $src = $carpeta.$name3;
      echo   move_uploaded_file($ruta_provisional, $src);
  $sql="UPDATE `catalogo` SET `imgfondo` = '$name3' WHERE `catalogo`.`id_catalogo` = $x1";                 
    $bd->consulta($sql);
  }
    }
    }
       //fin;




if($_FILES["perfil"]!=""){


                                        while ($fila=$bd->mostrar_registros()) { 
       $a=$fila->titulo;
       $b=$fila->imgprincipal;

}

if($a==""){

  echo "se ha producido un error, primero  registra el titulo del proyecto en la pestaña datos basicos";
}
if($b==""){

   $reporte = null;
     for($x=0; $x<count($_FILES["perfil"]["name"]); $x++)
    {
    $file = $_FILES["perfil"];
    $nombre = $file["name"][$x];
    $tipo = $file["type"][$x];
    $ruta_provisional = $file["tmp_name"][$x];
    $size = $file["size"][$x];
    

    $width = $dimensiones[0];
    $height = $dimensiones[1];
    $carpeta = "../../img/";

     if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif')
    {
       echo "<p style='color: red'>Error $nombre, el archivo no es una imagen  </p>";
    }
    else if($size > 1024*1024)// 1024*1024 = 1 MB
    {
        echo "<p style='color: red'>Error $nombre, el tamaño máximo permitido es 1MB</p>";
    }
  //  else if($width > 1800 || $height > 1200)
  //  {
   //     $reporte .= "<p style='color: red'>Error $nombre, tu imagen mide $width x $height y la altura máxima permitida es de 1800 x 1200</p>";
   // }
   
    else
    {

         $gale="perfil_";
    $name2=$gale.$a.$nombre;  
    $name3 = preg_replace('[\s+]','', $name2);
        $src = $carpeta.$name3;
      echo   move_uploaded_file($ruta_provisional, $src);
  $sql="UPDATE `catalogo` SET `imgprincipal` = '$name3' WHERE `catalogo`.`id_catalogo` = $x1";                 
    $bd->consulta($sql);
  }
    } 
      }else{//fin de b=""

                                   $reporte = null;
                                     for($x=0; $x<count($_FILES["perfil"]["name"]); $x++)
                                    {
                                    $file = $_FILES["perfil"];
                                    $nombre = $file["name"][$x];
                                    $tipo = $file["type"][$x];
                                    $ruta_provisional = $file["tmp_name"][$x];
                                    $size = $file["size"][$x];
                                    

                                    $width = $dimensiones[0];
                                    $height = $dimensiones[1];
                                    $carpeta = "../../img/";

                                   if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif')
                                  {
                                     echo "<p style='color: red'>Error $nombre, el archivo no es una imagen  </p>";
                                  }
                                  else if($size > 1024*1024)// 1024*1024 = 1 MB
                                  {
                                      echo "<p style='color: red'>Error $nombre, el tamaño máximo permitido es 1MB</p>";
                                  }else
                                  {
                                     $src = $carpeta.$b;
                                     echo  move_uploaded_file($ruta_provisional, $src);
                                  }
                                   }//fin for
                           }//fin else
    }
       //fin;




if($_FILES["transi"]!=""){



                                        while ($fila=$bd->mostrar_registros()) { 
       $a=$fila->titulo;
       $b=$fila->img1;

}

if($a==""){

  echo "se ha producido un error, primero  registra el titulo del proyecto en la pestaña datos basicos";
}
if($b==""){

   $reporte = null;
     for($x=0; $x<count($_FILES["transi"]["name"]); $x++)
    {
  
  

     $file = $_FILES["transi"];
    $nombre = $file["name"][$x];
    $tipo = $file["type"][$x];
    $ruta_provisional = $file["tmp_name"][$x];
    $size = $file["size"][$x];
    

    $width = $dimensiones[0];
    $height = $dimensiones[1];
    $carpeta = "../../img/";

     if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif')
    {
       echo "<p style='color: red'>Error $nombre, el archivo no es una imagen  </p>";
    }
    else if($size > 1024*1024)// 1024*1024 = 1 MB
    {
        echo "<p style='color: red'>Error $nombre, el tamaño máximo permitido es 1MB</p>";
    }
  //  else if($width > 1800 || $height > 1200)
  //  {
   //     $reporte .= "<p style='color: red'>Error $nombre, tu imagen mide $width x $height y la altura máxima permitida es de 1800 x 1200</p>";
   // }
   
    else
    {


    $gale="transicion_";
    $name2=$gale.$a.$nombre;  
    $name3 = preg_replace('[\s+]','', $name2);
        $src = $carpeta.$name3;
      echo   move_uploaded_file($ruta_provisional, $src);
  $sql="UPDATE `catalogo` SET `img1` = '$name3' WHERE `catalogo`.`id_catalogo` = $x1";                 
   $bd->consulta($sql);


  }
    } 
      } else{//fin de b=""

                                   $reporte = null;
                                     for($x=0; $x<count($_FILES["transi"]["name"]); $x++)
                                    {
                                    $file = $_FILES["transi"];
                                    $nombre = $file["name"][$x];
                                    $tipo = $file["type"][$x];
                                    $ruta_provisional = $file["tmp_name"][$x];
                                    $size = $file["size"][$x];
                                    

                                    $width = $dimensiones[0];
                                    $height = $dimensiones[1];
                                    $carpeta = "../../img/";

                                   if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif')
                                  {
                                     echo "<p style='color: red'>Error $nombre, el archivo no es una imagen  </p>";
                                  }
                                  else if($size > 1024*1024)// 1024*1024 = 1 MB
                                  {
                                      echo "<p style='color: red'>Error $nombre, el tamaño máximo permitido es 1MB</p>";
                                  }else
                                  {
                                     $src = $carpeta.$b;
                                     echo  move_uploaded_file($ruta_provisional, $src);
                                  }
                                   }//fin for
                           }//fin else
    }
       //fin;

if($_FILES["transi1"]!=""){


 
                                        while ($fila=$bd->mostrar_registros()) { 
       $a=$fila->titulo;
       $b=$fila->img2;
}

if($a==""){

  echo "se ha producido un error, primero  registra el titulo del proyecto en la pestaña datos basicos";
}

if($b==""){
   $reporte = null;
     for($x=0; $x<count($_FILES["transi1"]["name"]); $x++)
    {
  

     $file = $_FILES["transi1"];
  $nombre = $file["name"][$x];
    $tipo = $file["type"][$x];
    $ruta_provisional = $file["tmp_name"][$x];
    $size = $file["size"][$x];
    

    $width = $dimensiones[0];
    $height = $dimensiones[1];
    $carpeta = "../../img/";

     if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif')
    {
       echo "<p style='color: red'>Error $nombre, el archivo no es una imagen  </p>";
    }
    else if($size > 1024*1024)// 1024*1024 = 1 MB
    {
        echo "<p style='color: red'>Error $nombre, el tamaño máximo permitido es 1MB</p>";
    }
  //  else if($width > 1800 || $height > 1200)
  //  {
   //     $reporte .= "<p style='color: red'>Error $nombre, tu imagen mide $width x $height y la altura máxima permitida es de 1800 x 1200</p>";
   // }
   
    else
    {


    $gale="transicion_1_";
    $name2=$gale.$a.$nombre;  
    $name3 = preg_replace('[\s+]','', $name2);
        $src = $carpeta.$name3;
      echo   move_uploaded_file($ruta_provisional, $src);
  $sql="UPDATE `catalogo` SET `img2` = '$name3' WHERE `catalogo`.`id_catalogo` = $x1";                 
   $bd->consulta($sql);


  }
    }
      } else{//fin de b=""

                                   $reporte = null;
                                     for($x=0; $x<count($_FILES["transi1"]["name"]); $x++)
                                    {
                                    $file = $_FILES["transi1"];
                                    $nombre = $file["name"][$x];
                                    $tipo = $file["type"][$x];
                                    $ruta_provisional = $file["tmp_name"][$x];
                                    $size = $file["size"][$x];
                                    

                                    $width = $dimensiones[0];
                                    $height = $dimensiones[1];
                                    $carpeta = "../../img/";

                                   if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif')
                                  {
                                     echo "<p style='color: red'>Error $nombre, el archivo no es una imagen  </p>";
                                  }
                                  else if($size > 1024*1024)// 1024*1024 = 1 MB
                                  {
                                      echo "<p style='color: red'>Error $nombre, el tamaño máximo permitido es 1MB</p>";
                                  }else
                                  {
                                     $src = $carpeta.$b;
                                     echo  move_uploaded_file($ruta_provisional, $src);
                                  }
                                   }//fin for
                           }//fin else
    }
       //fin;
if($_FILES["transi2"]!=""){

                                        while ($fila=$bd->mostrar_registros()) { 
       $a=$fila->titulo;
       $b=$fila->img3;

}

if($a==""){

  echo "se ha producido un error, primero  registra el titulo del proyecto en la pestaña datos basicos";
}
if($b==""){


   $reporte = null;
     for($x=0; $x<count($_FILES["transi2"]["name"]); $x++)
    {
  

     $file = $_FILES["transi2"];
  $nombre = $file["name"][$x];
    $tipo = $file["type"][$x];
    $ruta_provisional = $file["tmp_name"][$x];
    $size = $file["size"][$x];
    

    $width = $dimensiones[0];
    $height = $dimensiones[1];
    $carpeta = "../../img/";

     if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif')
    {
       echo "<p style='color: red'>Error $nombre, el archivo no es una imagen  </p>";
    }
    else if($size > 1024*1024)// 1024*1024 = 1 MB
    {
        echo "<p style='color: red'>Error $nombre, el tamaño máximo permitido es 1MB</p>";
    }
  //  else if($width > 1800 || $height > 1200)
  //  {
   //     $reporte .= "<p style='color: red'>Error $nombre, tu imagen mide $width x $height y la altura máxima permitida es de 1800 x 1200</p>";
   // }
   
    else
    {


    $gale="transicion_2_";
    $name2=$gale.$a.$nombre;  
    $name3 = preg_replace('[\s+]','', $name2);
        $src = $carpeta.$name3;
      echo   move_uploaded_file($ruta_provisional, $src);
  $sql="UPDATE `catalogo` SET `img3` = '$name3' WHERE `catalogo`.`id_catalogo` = $x1";                 
   $bd->consulta($sql);


  }
    }
     }else{//fin de b=""

                                   $reporte = null;
                                     for($x=0; $x<count($_FILES["transi2"]["name"]); $x++)
                                    {
                                    $file = $_FILES["transi2"];
                                    $nombre = $file["name"][$x];
                                    $tipo = $file["type"][$x];
                                    $ruta_provisional = $file["tmp_name"][$x];
                                    $size = $file["size"][$x];
                                    

                                    $width = $dimensiones[0];
                                    $height = $dimensiones[1];
                                    $carpeta = "../../img/";

                                   if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif')
                                  {
                                     echo "<p style='color: red'>Error $nombre, el archivo no es una imagen  </p>";
                                  }
                                  else if($size > 1024*1024)// 1024*1024 = 1 MB
                                  {
                                      echo "<p style='color: red'>Error $nombre, el tamaño máximo permitido es 1MB</p>";
                                  }else
                                  {
                                     $src = $carpeta.$b;
                                     echo  move_uploaded_file($ruta_provisional, $src);
                                  }
                                   }//fin for
                           }//fin else


      } 
       //fin

////////// editar imagenes  y borrando la anterior



    if($_FILES["fondoedita"]!=""){
                    $ver="SELECT titulo,imgfondo FROM catalogo WHERE id_catalogo='$x1'";
                    $bd->consulta($ver);
                    while ($fila=$bd->mostrar_registros()) { 
                                             $a=$fila->titulo;
                                             $b=$fila->imgfondo;

                                                             }
              if($a==""){
                  echo "se ha producido un error, primero  registra el titulo del proyecto en la pestaña datos basicos";
                        }
            if($b==""){
                          $reporte = null;
                          for($x=0; $x<count($_FILES["fondoedita"]["name"]); $x++)
                          {
                          $file = $_FILES["fondoedita"];
                          $nombre = $file["name"][$x];
                          $tipo = $file["type"][$x];
                          $ruta_provisional = $file["tmp_name"][$x];
                          $size = $file["size"][$x];
                          $width = $dimensiones[0];
                          $height = $dimensiones[1];
                          $carpeta = "../../img/";

                               if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif')
                              {
                                 echo "<p style='color: red'>Error $nombre, el archivo no es una imagen  </p>";
                              }
                              else if($size > 1024*1024)// 1024*1024 = 1 MB
                              {
                                  echo "<p style='color: red'>Error $nombre, el tamaño máximo permitido es 1MB</p>";
                              }else{

                                 $gale="fondo_";
                                 $name2=$gale.$a.$nombre;  
                                 $name3 = preg_replace('[\s+]','', $name2);
                                 $src = $carpeta.$name3;
                                 echo   move_uploaded_file($ruta_provisional, $src);
                                 $sql="UPDATE `catalogo` SET `imgfondo` = '$name3' WHERE `catalogo`.`id_catalogo` = $x1";                 
                                 $bd->consulta($sql);
                                    }
                              }//fin for
                          }else{//fin de b=""

                                   $reporte = null;
                                     for($x=0; $x<count($_FILES["fondoedita"]["name"]); $x++)
                                    {
                                    $file = $_FILES["fondoedita"];
                                    $nombre = $file["name"][$x];
                                    $tipo = $file["type"][$x];
                                    $ruta_provisional = $file["tmp_name"][$x];
                                    $size = $file["size"][$x];
                                    

                                    $width = $dimensiones[0];
                                    $height = $dimensiones[1];
                                    $carpeta = "../../img/";

                                   if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif')
                                  {
                                     echo "<p style='color: red'>Error $nombre, el archivo no es una imagen  </p>";
                                  }
                                  else if($size > 1024*1024)// 1024*1024 = 1 MB
                                  {
                                      echo "<p style='color: red'>Error $nombre, el tamaño máximo permitido es 1MB</p>";
                                  }else
                                  {
                                     $src = $carpeta.$b;
                                     echo  move_uploaded_file($ruta_provisional, $src);
                                  }
                                   }//fin for
                           }//fin else
}//fin edita fondo;



//editar galerias




 if($_FILES["galeria"]!=""){
$x2=$_GET['codigo2'];

                    $ver="SELECT nomimg, id_galeria FROM galeria WHERE id_galeria='$x2'";
                    $bd->consulta($ver);
                    while ($fila=$bd->mostrar_registros()) { 
                                             $a=$fila->nomimg;
                                              $b=$fila->id_galeria;

                                                             }
              if($a==""){
                  echo "se ha producido un error, primero  registra el titulo del proyecto en la pestaña datos basicos";
                        }else{//fin de b=""

                                   $reporte = null;
                                     for($x=0; $x<count($_FILES["galeria"]["name"]); $x++)
                                    {
                                    $file = $_FILES["galeria"];
                                    $nombre = $file["name"][$x];
                                    $tipo = $file["type"][$x];
                                    $ruta_provisional = $file["tmp_name"][$x];
                                    $size = $file["size"][$x];
                                    

                                    $width = $dimensiones[0];
                                    $height = $dimensiones[1];
                                    $carpeta = "../../img/";

                                  if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif')
                                  {
                                     echo "<p style='color: red'>Error $nombre, el archivo no es una imagen  </p>";
                                  }
                                  else if($size > 1024*1024)// 1024*1024 = 1 MB
                                  {
                                      echo "<p style='color: red'>Error $nombre, el tamaño máximo permitido es 1MB</p>";
                                  }else
                                  {
                                     $src = $carpeta.$a;
                                     echo  move_uploaded_file($ruta_provisional, $src);

                                  }
                                   }//fin for
                           }//fin else
}//fin edita fondo;


?>

