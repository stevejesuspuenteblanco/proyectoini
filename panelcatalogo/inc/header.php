<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="?mod=principal">
                        <img src="./fotos/logo.png" alt="logo" class="logo-default" /> </a>
                    <div class="menu-toggler sidebar-toggler"> </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <!-- BEGIN NOTIFICATION DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                      
                       
                        <!-- END USER LOGIN DROPDOWN -->
                        <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-quick-sidebar-toggler">
                            <a href="./logout.php" onclick="window.location = './logout.php'" class="dropdown-toggle">
                                <i class="icon-logout"></i>
                            </a>
                        </li>
                        <!-- END QUICK SIDEBAR TOGGLER -->
                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
     
        <div class="page-container">
           
            <div class="page-sidebar-wrapper">
              
                <div class="page-sidebar navbar-collapse collapse">
                  
                    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                        <li class="sidebar-toggler-wrapper hide">
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <div class="sidebar-toggler"> </div>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                        </li>
                       
                     
                        <li class="nav-item start active open">
                            <a href="?mod=principal" class="nav-link nav-toggle">
                                <i class="icon-wrench"></i>
                                <span class="title">Paneles de Pagina</span>
                                <span class="selected"></span>
                                <span class="arrow open"></span>
                            </a>
                            <ul class="sub-menu">
                             <li class="nav-item start ">
                                    <a href="?mod=principal" class="nav-link ">
                                        <i class="fa fa-home"></i>
                                        <span class="title">INICIO</span>
                                      
                                    </a>
                                </li>
                               
                                <li class="nav-item start ">
                                    <a href="?mod=pagina" class="nav-link ">
                                        <i class="fa fa-paper-plane-o"></i>
                                    
                                        
                                        <span class="title">PORTADA</span>
                                      
                                    </a>
                                </li>
                                <li class="nav-item start ">
                                    <a href="?mod=crear" class="nav-link ">
                                        <i class="fa fa-suitcase"></i>
                                        <span class="title">PROYECTOS</span>
                                      
                                    </a>
                                </li>
                                
                                
                                 <li class="nav-item start ">
                                    <a href="?mod=administrador" class="nav-link ">
                                        <i class="fa fa-user"></i>
                                        <span class="title">ADMINISTRADOR</span>
                                       
                                    </a>
                                </li>
                                <li>
                                </br>
                                </li>
                                <li>
                                <?php
$host= $_SERVER["HTTP_HOST"];

$ruta= "/catalogo/index.php?valor=";
$linkk= "http://" . $host . $ruta . $iduser;
?>
 <center>
<a target="_black"  class="btn btn-verde text-uppercase" href="<?php echo $linkk;?>"><i class="fa fa-globe"></i>TU WEB</a>
</center>
                                </li>
                                 <li>
                                </br>
                                </li>
                            </ul>
                        </li>
                    
                    </ul>
                    <!-- END SIDEBAR MENU -->
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN THEME PANEL -->
                    
                    <!-- END THEME PANEL -->
                    <!-- BEGIN PAGE BAR -->
                  
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                   