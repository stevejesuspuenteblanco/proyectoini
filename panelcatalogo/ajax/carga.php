<?php

//include '../inc/comun.php';
include '../inc/config.php';
//include '../inc/functionBD.php';
include '../inc/comun.php';

$bd = new GestarBD;


//include('dbcon.php');

if($_REQUEST)
{ 
$x1=$_GET['codigo'];


	$consulta="SELECT * FROM catalogo where id_catalogo='$x1'";
    $bd->consulta($consulta);
     sleep(1);
    while ($fila=$bd->mostrar_registros()) {
 	$a= $fila->imgfondo;
 	$b= $fila->imgprincipal;
 	$c= $fila->img1;
 	$d= $fila->img2;
 	$e= $fila->img3;

 											}
if (isset($_GET['fondo'])) {




if($a!="" and  $b!=""  and  $c!="" and  $d!="" and $e!="" ) // not available
  {
  
    echo '


    <div class="progress active">

        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100" style="width: 100%">

                <span class="sr-only"> 100% Complete (danger) </span>

             </div>
            </div>

            <a class="btn red btn-outline sbold derecha" data-toggle="modal" href="?mod=crear">Ver Proyectos </a>';
  
  }else if($a!="" and  $b!="" and  $c!="" and $d!="") // not available
  {
  
    echo '<div class="progress d active">
        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="80" style="width: 80%">

                <span class="sr-only"> 80% Complete (danger) </span>

             </div>
            </div>';
  
  }
											
else if($a!="" and  $b!=""  and  $c!="") // not available
	{
	
		echo '<div class="progress  active">
   			<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="60" style="width: 60%">

                <span class="sr-only"> 60% Complete (danger) </span>

             </div>
            </div>';
	
	}else if($a!="" and  $b!="" ) // not available
  {
  
    echo '<div class="progress active">
        <div class="progress-bar list-group-item bg-yellow bg-font-yellows" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="40" style="width: 40%">

                <span class="sr-only"> 40% Complete (danger) </span>

             </div>
            </div>';
  
  }
	else if($a!="" )
	{
	echo '<div class="progress ">
   			<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="10" style="width: 10%">

                <span class="sr-only"> 10% Complete (danger) </span>

             </div>
            </div>';
            
	}  
  else 
  {
  echo '<div class="progress  ">
       <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="01" aria-valuemin="0" aria-valuemax="100" style="width: 01%">
                                            <span class="sr-only"> 01% Complete </span>
                                        </div>
            </div>';
          


  }
}

if (isset($_GET['perfil'])) {

if($b!="" && $a!=="" ){

echo '<div class="progress progress-striped active">
        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="10" style="width: 40%">

                <span class="sr-only"> 40% Complete (danger) </span>

             </div>
            </div>';
  }

else if($a=="" && $b=="") // not available
	{
	
		echo '<div class="progress progress-striped active">
   			<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="10" style="width: 1%">

                <span class="sr-only"> 1% Complete (danger) </span>

             </div>
            </div>';
            
	}else  {

echo '<div class="progress progress-striped active">
   			<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="10" style="width: 40%">

                <span class="sr-only"> 40% Complete (danger) </span>

             </div>
            </div>';



	}

}


if (isset($_GET['slide1'])) {

if($a=="" && $b==""  ) // not available
	{
	
		echo '<div class="progress progress-striped active">
   			<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="10" style="width: 1%">

                <span class="sr-only"> 1% Complete (danger) </span>

             </div>
            </div>';
	
	}
	 else if($a!="")
	{
	echo '<div class="progress progress-striped active">
   			<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="20" style="width: 20%">

                <span class="sr-only"> 20% Complete (danger) </span>

             </div>
            </div>';
            
	}
   else if($a!="" && $b!="")
  {
  echo '<div class="progress progress-striped active">
        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="40" style="width: 20%">

                <span class="sr-only"> 40% Complete (danger) </span>

             </div>
            </div>';
            
  }
}
	
}?>