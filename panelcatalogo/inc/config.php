<?php 

//contraseña
$passs="";
//Configuración general
$config = array(
	"titulo"=>"zippyttech?",
	"subtitulo"=>"Inicio",
	"url"=>"http://{$_SERVER['HTTP_HOST']}/catalogo/", //Con / al final
	//"url" => "http://localhost/simpleCMS/",
	"charset"=>"utf-8",

	"friendlyurls"=>false,



	//Datos para la configuracion del envio de correo
	"emailadmin"=>"",
	"emailenvios"=>"",
	"nombreenvios"=>"zippyttech?",
	"servidor"=>"localhost",
	"basedatos"=>"catalogo",
	"usuario"=>"root",
	"pass"=>"$passs",

	"googleanalytics"=>false,//Codigo UA- usado en las analiticas de Google
	"googlesiteverification"=>false,
	"mssiteverification"=>false
	); ?>

		<?php

$dbhost="localhost";
$dbname="catalogo";
$dbuser="root";
$dbpass="$passs";
$db = new mysqli($dbhost,$dbuser,$dbpass,$dbname);

?>