<?php

include '../inc/config.php';
include '../inc/comun.php';

$bd = new GestarBD;


if($_FILES["gale1"]!=""){

 $x1=$_GET['codigo'];
 $ver="SELECT * FROM catalogo WHERE id_catalogo='$x1'";
  $bd->consulta($ver);
                                        while ($fila=$bd->mostrar_registros()) { 
      $a=$fila->titulo;

}

   $reporte = null;
     for($x=0; $x<count($_FILES["gale1"]["name"]); $x++)
    {
    $file = $_FILES["gale1"];
    $nombre = $file["name"][$x];
    $tipo = $file["type"][$x];
    $ruta_provisional = $file["tmp_name"][$x];
    $size = $file["size"][$x];
    $codigo = $_GET["codigo"];


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

 $gale="gale_";
    $name2=$gale.$a.$nombre;  

$name3 = preg_replace('[\s+]','', $name2);
        $src = $carpeta.$name3;
       echo  move_uploaded_file($ruta_provisional, $src);
$codigo;


   //  $query = "INSERT INTO `galeria` (`id_catalogo`, `tipoimg`, `nomimg`) VALUES
   // ('$codigo', '1', '$name3')";

   $query = "INSERT INTO `galeria` (`id_galeria`, `id_catalogo`, `tipoimg`, `nomimg`, `des`, `url`) VALUES (NULL, '$codigo', '1', '$name3', '', '');";
   $bd->consulta($query);
    
    

    
 /*  $sql="INSERT INTO `galeria` (`id_catalogo`, `tipoimg`, `nomimg`) VALUES
   ('6', '1', '$nombre')";                 
    $bd->consulta($sql);*/
   
       // echo "<p style='color: blue'>La imagen $nombre ha sido subida con éxito</p>";
 }
    }
       // echo $reporte;


}


if($_FILES["logo"]!=""){

//guardar logo
 $x1=$_GET['codigo'];

//consulto el logo actual
 $ver="SELECT logo FROM pagina WHERE id_pagina='$x1'";
  $bd->consulta($ver);
                                        while ($fila=$bd->mostrar_registros()) { 
   $a=$fila->logo;

                                                                                }
   $reporte = null;
     for($x=0; $x<count($_FILES["logo"]["name"]); $x++)
        {
        $file = $_FILES["logo"];
        $nombre = $file["name"][$x];
        $tipo = $file["type"][$x];
        $ruta_provisional = $file["tmp_name"][$x];
        $size = $file["size"][$x];
        $width = $dimensiones[0];
        $height = $dimensiones[1];
        $carpeta = "../../imgpag/";

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

                 $src = $carpeta.$a;
              echo     move_uploaded_file($ruta_provisional, $src);
           /*  $sql="INSERT INTO `galeria` (`id_catalogo`, `tipoimg`, `nomimg`) VALUES
             ('6', '1', '$nombre')";                 
              $bd->consulta($sql);*/
             
                 // echo "<p style='color: blue'>La imagen $nombre ha sido subida con éxito</p>";
              }
    }
    }
       //fin;




    if($_FILES["portada"]!=""){
/////////////7////
//guardar portada
//////////////////7      
 $x1=$_GET['codigo'];

//consulto el logo actual
 $ver="SELECT portada FROM pagina WHERE id_pagina='$x1'";
  $bd->consulta($ver);
                                        while ($fila=$bd->mostrar_registros()) { 
        $a=$fila->portada;

}


   $reporte = null;
     for($x=0; $x<count($_FILES["portada"]["name"]); $x++)
    {
    $file = $_FILES["portada"];
    $nombre = $file["name"][$x];
    $tipo = $file["type"][$x];
    $ruta_provisional = $file["tmp_name"][$x];
    $size = $file["size"][$x];
    

    $width = $dimensiones[0];
    $height = $dimensiones[1];
    $carpeta = "../../imgpag/";

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

        $src = $carpeta.$a;
    echo move_uploaded_file($ruta_provisional, $src);
 /*  $sql="INSERT INTO `galeria` (`id_catalogo`, `tipoimg`, `nomimg`) VALUES
   ('6', '1', '$nombre')";                 
    $bd->consulta($sql);*/
   
       // echo "<p style='color: blue'>La imagen $nombre ha sido subida con éxito</p>";
  }
    }
    }
       //fin;


////////////////////
//favicon/////////
/////////////////
    if($_FILES["favicon"]!=""){

//guardar logo
 $x1=$_GET['codigo'];

//consulto el logo actual
 $ver="SELECT favicon FROM pagina WHERE id_pagina='$x1'";
  $bd->consulta($ver);
                                        while ($fila=$bd->mostrar_registros()) { 
        $a=$fila->favicon;

}


   $reporte = null;
     for($x=0; $x<count($_FILES["favicon"]["name"]); $x++)
    {
    $file = $_FILES["favicon"];
    $nombre = $file["name"][$x];
    $tipo = $file["type"][$x];
    $ruta_provisional = $file["tmp_name"][$x];
    $size = $file["size"][$x];
    

    $width = $dimensiones[0];
    $height = $dimensiones[1];
    $carpeta = "../../imgpag/";

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

        $src = $carpeta.$a;
      echo   move_uploaded_file($ruta_provisional, $src);
 /*  $sql="INSERT INTO `galeria` (`id_catalogo`, `tipoimg`, `nomimg`) VALUES
   ('6', '1', '$nombre')";                 
    $bd->consulta($sql);*/
   
       // echo "<p style='color: blue'>La imagen $nombre ha sido subida con éxito</p>";
  }
    }
    }
       //fin;




//////////////////////////////////////////////////////////////////7
///////////////////guardar nuevos primera ves///////////////////////////////////////////7
////////////////////////////////////////////////////////////////



if($_FILES["logon"]!=""){

//guardar logo
 $x1=$_GET['codigo'];

//consulto el logo actual
 $ver="SELECT titulo FROM pagina WHERE id_pagina='$x1'";
  $bd->consulta($ver);
                                        while ($fila=$bd->mostrar_registros()) { 
      $a=$fila->titulo;

}
if($a==""){

  echo "se ha producido un error, primero  registra el titulo de tu pagina en la pestaña datos basicos";
}


   $reporte = null;
     for($x=0; $x<count($_FILES["logon"]["name"]); $x++)
    {
    $file = $_FILES["logon"];
    $nombre = $file["name"][$x];
    $tipo = $file["type"][$x];
    $ruta_provisional = $file["tmp_name"][$x];
    $size = $file["size"][$x];
    

    $width = $dimensiones[0];
    $height = $dimensiones[1];
    $carpeta = "../../imgpag/";

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

$gale="logo_";
    $name2=$gale.$a.$nombre;  
$name3 = preg_replace('[\s+]','', $name2);

        $src = $carpeta.$name3;
      echo   move_uploaded_file($ruta_provisional, $src);
  $sql="UPDATE `pagina` SET `logo` = '$name3' WHERE `pagina`.`id_pagina` = $x1";                 
    $bd->consulta($sql);

   
       // echo "<p style='color: blue'>La imagen $nombre ha sido subida con éxito</p>";
  }
    }
    }
       //fin;




    if($_FILES["portadan"]!=""){
/////////////7////
//guardar portada
//////////////////7      
 $x1=$_GET['codigo'];

$ver="SELECT titulo FROM pagina WHERE id_pagina='$x1'";
  $bd->consulta($ver);
                                        while ($fila=$bd->mostrar_registros()) { 
        $a=$fila->titulo;

}
if($a==""){

  echo "se ha producido un error, primero  registra el titulo de tu pagina en la pestaña datos basicos";
}


   $reporte = null;
     for($x=0; $x<count($_FILES["portadan"]["name"]); $x++)
    {
    $file = $_FILES["portadan"];
    $nombre = $file["name"][$x];
    $tipo = $file["type"][$x];
    $ruta_provisional = $file["tmp_name"][$x];
    $size = $file["size"][$x];
    

    $width = $dimensiones[0];
    $height = $dimensiones[1];
    $carpeta = "../../imgpag/";

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

        $gale="portada_";
    $name2=$gale.$a.$nombre;  
    $name3 = preg_replace('[\s+]','', $name2);
        $src = $carpeta.$name3;



      echo   move_uploaded_file($ruta_provisional, $src);
  $sql="UPDATE `pagina` SET `portada` = '$name3' WHERE `pagina`.`id_pagina` = $x1";                 
    $bd->consulta($sql);
 /*  $sql="INSERT INTO `galeria` (`id_catalogo`, `tipoimg`, `nomimg`) VALUES
   ('6', '1', '$nombre')";                 
    $bd->consulta($sql);*/
   
       // echo "<p style='color: blue'>La imagen $nombre ha sido subida con éxito</p>";
  }
    }
    }
       //fin;


////////////////////
//favicon/////////
/////////////////
    if($_FILES["faviconn"]!=""){

//guardar logo
 $x1=$_GET['codigo'];

$ver="SELECT titulo FROM pagina WHERE id_pagina='$x1'";
  $bd->consulta($ver);
                                        while ($fila=$bd->mostrar_registros()) { 
        $a=$fila->titulo;

}
if($a==""){

  echo "se ha producido un error, primero  registra el titulo de tu pagina en la pestaña datos basicos";
}


   $reporte = null;
     for($x=0; $x<count($_FILES["faviconn"]["name"]); $x++)
    {
    $file = $_FILES["faviconn"];
    $nombre = $file["name"][$x];
    $tipo = $file["type"][$x];
    $ruta_provisional = $file["tmp_name"][$x];
    $size = $file["size"][$x];
    

    $width = $dimensiones[0];
    $height = $dimensiones[1];
    $carpeta = "../../imgpag/";

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

         $gale="favicon_";
    $name2=$gale.$a.$nombre;  
    $name3 = preg_replace('[\s+]','', $name2);
        $src = $carpeta.$name3;
      echo   move_uploaded_file($ruta_provisional, $src);
  $sql="UPDATE `pagina` SET `favicon` = '$name3' WHERE `pagina`.`id_pagina` = $x1";                 
    $bd->consulta($sql);
  }
    }
    }
       //fin;



?>


