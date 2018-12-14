<?php 
include 'inc/comun.php'; ?>
<!DOCTYPE html>

<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>HeavyDeveloper</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="assets/global/css/components.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="../css/login.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->        <link href="BebasNeue.otf" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="shortcut icon" href="favicon.ico" /> </head>


    <!-- END HEAD -->

    <body class="login">
        <!-- BEGIN LOGO -->






 <?php
    $bd = new GestarBD;

   


//agregar usuario nuevo

     if(isset($_POST["crear"])){

         $codigo=$_POST["codigo"];
         $nombre=$_POST["nombre"];
         $correo=$_POST["correo"];
         $password=$_POST["password"];

  


        $query = "SELECT * FROM token WHERE token = '$codigo'";
        $bd->consulta($query);
        if ($temp_resg = $bd->mostrar_registros()) {
         $token=$temp_resg->idtoken;
         $limite2=$temp_resg->limite;

                                                    }


$count="SELECT count(id_token) FROM administrador WHERE id_token='$token'";    
$suma1 = $bd->consulta($count);
 while ($fila =$bd->mostrar_row()) {
        $suma=$fila[0]; 
 }  

  if($limite2<=$suma) {
echo '<div class="form-box">
                        <div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>El codigo ha alcanzado su limite.</b>
                                    </div>
                                </div>';


  }else{
                                                    if($token!=""){

                                                         $bd2 = new GestarBD;

            $insertUser = "INSERT INTO `administrador` (`pass` ,`nombre`  ,`correo` , `id_token`, `nivel`)
                                VALUES ('$password', '$nombre', '$correo',  '$token','0' ) ";
            $bd2->consulta($insertUser);

         

            echo '<div class="form-box">
                        <div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Registro !</b>  Has confirmado tu cuenta correctamente, ya Puedes Ingresa al sistema.
                                    </div>
                                </div>';

                                                                    }
                                else{

  echo '<div class="form-box">
                        <div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>El usuario no se registro correctamente.</b>
                                    </div>
                                </div>';

                                }
                            }
                        }


   
    if(isset($_POST["correo"])){
            
                    $destino = $_POST['email'];
                //$cs=mysqli_query($sql,$conexion);
               
                $usuario = $bd->SelectText('*', 'administrador', "correo='$destino'",false,null,null);
                $bd->consulta($usuario);
                if ($mostrar = $bd->mostrar_registros()) {
                    $nombre= $mostrar->nombre;
                    $mail= $mostrar->correo;
                    $clave= $mostrar->pass;
                    $correozippy="apps@zippyttech.com";
            
                    $casilla = 'yond1994@gmail.com';
                    $asunto = '';
                    $cabeceras = "From: "  .$correozippy.  "\r\n";
                    $cabeceras .= "Reply-To: ".$correozippy. "\r\n";
                    // $cabeceras .= "CC: apps@zippyttech.com\r\n";
                    $cabeceras .= "MIME-Version: 1.0\r\n";
                    $cabeceras .= "Content-Type: text/html; charset=UTF-8\r\n";

                    $mensaje = '<html><body>';
                    $mensaje = '<center>';
                    $mensaje .= '<img src="http://www.zippyttech.com/images/principal/logo.png" alt="Space Invaders" width="70" />';
                    $mensaje .= '<table rules="all" border="1" style="border-color: #666;" cellpadding="10">';
                    $mensaje .= "<tr style='background: #eee;'><td><strong>Nombre:</strong> </td><td>" . $nombre . "</td></tr>";
                    $mensaje .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($_POST['email']) . "</td></tr>";
                    $mensaje .= "<tr><td><strong>tu clave es:</strong> </td><td>" . $clave . "</td></tr>";
                    $mensaje .= "<tr><td><strong>Link para iniciar sesion </strong> </td><td>" . $registro. "</td></tr>";
                    $mensaje .= "</table>";
                    $mensaje .= '</br>';
                    $mensaje .= "</body></html>";
                    $para = "$mail";
                    $asunto = 'Reupera tu contraseña';
                    

                  $bool = mail($para, $asunto, $mensaje, $cabeceras);
                  
                    if($bool){
                        echo '<div class="form-box">
                                    <div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Recuperar Contraseña !</b>Se ha enviado a su correo electronico la contraseña 
                                    </div>
                                </div>';
                    }
                    else{
                    //echo "<script > alert('no se Recuperaron sus datos correctamente el  correo: $destino no  se encuentra registrado ')</script>";
                    echo '<div class="form-box">
                                    <div class="alert alert-warning alert-dismissable">
                                        <i class="fa fa-warning"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Recuperar Contraseña !</b>No se Recuperaron sus datos correctamente el  correo: '.$destino.' 
                                    </div>
                                </div>';
                }
                }
            
        }
       





    if (isset($_POST["iniciar"])) {
        # code...
         $usuario = $_POST["usuario"];
          $password = $_POST["pass"];
      


        $query1 = "SELECT * FROM administrador WHERE correo = '$usuario'";
        $bd->consulta($query1);
        if ($nivelusu = $bd->mostrar_registros()) {

           echo  $nivel=$nivelusu->nivel;
        /* $nivel=$nivelusu['nivel']; */      
                                                    }
        if($nivel==1){
        
        $usuario = $bd->SelectText('*', 'administrador', "correo='$usuario' AND pass='$password' AND nivel='$nivel'",false,null,null);
        $bd->consulta($usuario);
        if ($mostrar = $bd->mostrar_registros()) {
            
            
            $_SESSION['zippyvalida'] = true;
            $_SESSION['zippy_nivel'] = $mostrar->nivel;
            $_SESSION['zippy_nombre'] = $mostrar->nombre;
            $_SESSION['zippy_apellido'] = $mostrar->apellido;
            $_SESSION['zippy_nive_usua'] = $mostrar->nive_usua;
            $_SESSION['zippy_usuario'] = $mostrar->usuario;
            $_SESSION['zippy_correo'] = $mostrar->correo;
            $_SESSION['zippy_id'] = $mostrar->id;
                    
            
            header("Location: indexadmin.php?admin=principal1");
            exit;
        }
    }elseif ($nivel==0) {


           $usuario = $bd->SelectText('*', 'administrador', "correo='$usuario' AND pass='$password' AND nivel='$nivel'",false,null,null);
        $bd->consulta($usuario);
        if ($mostrar = $bd->mostrar_registros()) {
            
            
            $_SESSION['zippyvalida'] = true;
            $_SESSION['zippy_nivel'] = $mostrar->nivel;
            $_SESSION['zippy_nombre'] = $mostrar->nombre;
            $_SESSION['zippy_apellido'] = $mostrar->apellido;
            $_SESSION['zippy_nive_usua'] = $mostrar->nive_usua;
            $_SESSION['zippy_usuario'] = $mostrar->usuario;
            $_SESSION['zippy_correo'] = $mostrar->correo;
            $_SESSION['zippy_id'] = $mostrar->id;
                    
            
            header("Location: index.php?mod=principal");
            exit;
    }
}

         else {
            //header("Location: login.php");
            echo '<div class="form-box">
                        <div class="alert alert-warning alert-dismissable">
                                        <i class="fa fa-warning"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Inicio de Sesión !</b> '.$nivel.' Usuario o Contraseña Incorrectos. Intente de nuevo.
                                    </div>
                                </div>';
        }
    }
    $codigo = $_GET['codigo'];
    if (isset($codigo)) {
        $query = "SELECT * FROM registros_temp WHERE codigo = '$codigo'";
        $bd->consulta($query);
        if ($temp_resg = $bd->mostrar_registros()) {

            $insertUser = "INSERT INTO `administrador` (`usuario` ,`pass` ,`nombre`  ,`correo` ,`nive_usua`, codigo_user, codigo_referr)
                                VALUES (
                                 '$temp_resg[usuario]', '$temp_resg[pass]', '$temp_resg[nombre]',  '$temp_resg[email]' , '$temp_resg[nive_usua]', '$codigo', '$temp_resg[codigo_referr]'
                                ) ";
            $bd->consulta($insertUser);

            $borrarTemp = "DELETE FROM registros_temp WHERE codigo = '$codigo'";
            $bd->consulta($borrarTemp);

            echo '<div class="form-box">
                        <div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Registro !</b>  Has confirmado tu cuenta correctamente Ingresa al sistema.
                                    </div>
                                </div>';
        }else{

        }
    }
    ?>



<script type="text/javascript" src="ajax/jquery-1.3.2.js"></script>
<link href="css.css" media="screen" rel="stylesheet" type="text/css" />
<script type="text/javascript">
$(document).ready(function() {  
    $('#username').blur(function(){
        
        $('#Info').html('<img src="ajax/loader.gif" alt="" />').fadeOut(1000);

        var username = $(this).val();       
        var dataString = 'username='+username;
        
        $.ajax({
            type: "POST",
            url: "ajax/check_username_availablity.php",
            data: dataString,
            success: function(data) {
                $('#Info').fadeIn(1000).html(data);
                //alert(data);
            }
        });
    });              
});    
</script>

     <div class="hidden-xs hidden-sm col-md-8 fondo grande">   
    
<?php 
include ("animacion.html")
?>

    
     </div>   <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
         <div class="content col-md-4 ">

           
            <!-- BEGIN LOGIN FORM -->
             
            <form  name="frmLogin" class="login-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <h3 class="form-title font-green">Inicio de sesion</h3>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> Ingrese su Correo y Contraseña. </span>
                </div>
                
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Correo</label>
                    <input class="form-control form-control-solid placeholder-no-fix input-circle2" type="text"  placeholder="Usuario/Email" name="usuario" /> 

                    </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Contraseña</label>
                    <input class="form-control form-control-solid placeholder-no-fix input-circle2" type="password"  placeholder="Contraseña" name="pass" /> </div>
                     <input name="iniciar" type="hidden"> 
                    <center>
                <div class="form-actions">
                    <button type="submit"  class="btn green uppercase">Entrar</button>
                    </br>
                    </br>
                 
                </div>
                </center>
                </form>
               <form name="frmLogin" class="login-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                  </center> 
                 <div class="form-actions">
                   
                    <label class="rememberme check">
                        <input type="hidden" name="remember" value="1" /></label>
                        
                    <a href="javascript:;" id="forget-password" class="forget-password">¿Olvido su Contraseña?</a>
                </div>
                <div class="login-options">
                   
                    <ul class="social-icons">
                        <li>
                            <a class="social-icon-color facebook" data-original-title="facebook" href="javascript:;"></a>
                        </li>
                        <li>
                            <a class="social-icon-color twitter" data-original-title="Twitter" href="javascript:;"></a>
                        </li>
                        
                       
                    </ul>
                </div>
                <div class="create-account">
                    <p>
                        <a href="javascript:;" id="register-btn" class="uppercase">Crear Cuenta</a>
                    </p>
                </div>
            </form>
            <!-- END LOGIN FORM -->
            <!-- BEGIN FORGOT PASSWORD FORM -->
            <form class="forget-form" action="" method="post">
                <h3 class="font-green">¿Olvido Su Contraseña?</h3>
                <p>Ingrese su correo.</p>
                <div class="form-group">
                    <input class="form-control placeholder-no-fix input-circle2" type="email" required autocomplete="off"   placeholder="Email" name="email" />
                     </div>
                <div class="form-actions">
                    <button type="button" id="back-btn" class="btn btn-default">Atras</button>
                   
                     <button type="submit"  name="correo" id="register-submit-btn" class="btn green uppercase pull-right">Enviar</button>
                </div>
            </form>
            
            <!-- END FORGOT PASSWORD FORM -->
            <!-- BEGIN REGISTRATION FORM -->
            <form class="register-form" action="" method="post">
                <h3 class="font-green">Crear Cuenta</h3>
                <p class="hint"> Ingrese los datos para registrarse: </p>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Codigo de Registro</label>
                    <input  id="username" class=" form-control input-circle2" type="text" required placeholder="Codigo de Registro" name="codigo" />
            <div id="Info"></div>

                     </div>

                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Nombre</label>
                    <input class="form-control placeholder-no-fix input-circle2" type="text" required placeholder="Nombre" name="nombre" /> </div>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Email</label>
                    <input class="form-control placeholder-no-fix input-circle2" type="email"  required placeholder="Email" name="correo" /> </div>
               
                
              
                <p class="hint"> Contraseña: </p>
                 <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <input class="form-control placeholder-no-fix input-circle2" type="password" autocomplete="off" id="register_password" placeholder="Password" name="password" /> </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Repita su Password</label>
                    <input class="form-control placeholder-no-fix input-circle2" type="password" autocomplete="off" placeholder="Repita su contraseña" name="rpassword" /> </div>
                <div class="form-group margin-top-20 margin-bottom-20">
                    
                    <div id="register_tnc_error"> </div>
                </div>
                <div class="form-actions">
                    <button type="button" id="register-back-btn" class="btn btn-default">Atras</button>
                    <button type="submit"  name="crear" id="register-submit-btn" class="btn green uppercase pull-right">Registrar</button>
                </div>
            </form>
            <!-- END REGISTRATION FORM -->
<!--             <style>
@font-face {
  font-family: 'Bebas';
  /* Antes de descargar el archivo, le decimos al buscador
  que intente buscar en local la fuente con nombre
  Cabin, Cabin Regular o Cabin-Regular */
  src: local('Bebas'),
       local('Cabin Regular'),
       local('Cabin-Regular'),
       url(./css/BebasNeue.otf) format('woff');
}

.cabin {
    font-family: 'Bebas';
}
</style> 

<p class="cabin">Estas letras se mostrarán en la fuente "Cabin"</p> -->
        </div>
       
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="assets/global/plugins/jquery-validation/js/jquery.validate.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="assets/pages/scripts/login.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->





    </body>

</html>