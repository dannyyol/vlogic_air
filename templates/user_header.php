<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <title><?php print isset($title) ? $title : NULL ?></title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="#">
    <meta name="keywords" content="">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link rel="icon" href="<?php base_url("assets/air/assets/images/favicon.ico")?>"  type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="<?php base_url("assets/air/bower_components/bootstrap/css/bootstrap.min.css")?>" >
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="<?php base_url("assets/air/assets/icon/icofont/css/icofont.css")?>">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="<?php base_url("assets/air/assets/icon/feather/css/feather.css")?>" >
    <!-- Material Icon -->
    <link rel="stylesheet" type="text/css" href="<?php base_url("assets/air/assets/icon/material-design/css/material-design-iconic-font.min.css")?>" >
    <!-- Data Table Css -->
  <link rel="stylesheet" type="text/css" href="<?php base_url("assets/air/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css")?>" >
  <link rel="stylesheet" type="text/css" href="<?php base_url("assets/air/assets/pages/data-table/css/buttons.dataTables.min.css")?>" >
  <link rel="stylesheet" type="text/css" href="<?php base_url("assets/air/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css")?>">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="<?php base_url("assets/air/assets/css/style.css")?>" >
    <link rel="stylesheet" type="text/css" href="<?php base_url("assets/air/assets/css/jquery.mCustomScrollbar.css")?>" >
    <!-- Switch component css -->
    <link rel="stylesheet" type="text/css" href="<?php base_url("assets/air/bower_components/switchery/css/switchery.min.css")?>">
    <!-- Tags css -->
    <link rel="stylesheet" type="text/css" href="<?php base_url("assets/air/bower_components/bootstrap-tagsinput/css/bootstrap-tagsinput.css")?>" />
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php base_url("assets/vlogic/assets/css/custom.css")?>" />
    
    <script src="<?php base_url("assets/plugin/chartjs/Chart.min.css") ?>"></script>
    <script src="<?php base_url("assets/plugin/chartjs/Chart.min.js") ?>"></script>
    <script src="<?php base_url("assets/plugin/chartjs/chart_js_plugin_label.js") ?>"></script>
</head>

<body>
<!-- Pre-loader start -->
<div class="theme-loader">
    <div class="ball-scale">
        <div class='contain'>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
        </div>
    </div>
</div>
<!-- Pre-loader end -->


<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
        <nav class="navbar header-navbar pcoded-header">
            <div class="navbar-wrapper">

                <div class="navbar-logo">
                    <a class="mobile-menu" id="mobile-collapse" href="#!">
                        <i class="feather icon-menu"></i>
                    </a>
                    <a href="<?php base_url('dashboard/new_job') ?>">
                        <img class="img-fluid" src="<?php base_url("assets/air/assets/images/logo.png") ?>" alt="vlogic-Logo" style="width:100px" />
                    </a>
                    <a class="mobile-options">
                        <i class="feather icon-more-horizontal"></i>
                    </a>
                </div>

                <div class="navbar-container container-fluid">
                    <ul class="nav-left">
                        <li class="header-search">
                            <div class="main-search morphsearch-search">
                                <form method="GET" action="<?php base_url("dashboard/search/query/") ?>">
                                    <div class="input-group">
                                        <span class="input-group-addon search-close"><i class="feather icon-x"></i></span>
                                        <input type="text" class="form-control" name="q" placeholder="Search by Jobs..." required />
                                        <span class="input-group-addon search-btn"><i class="feather icon-search"></i></span>
                                    </div>
                                </form>
                            </div>
                        </li>
                    </ul>
                    <ul class="nav-right">
                        <li class="user-profile header-notification">
                            <div class="dropdown-primary dropdown">
                                <div class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php base_url("uploads/users/".call_sess(USER_SESSION, 'user_avater')) ?>" class="img-radius" alt="User-Profile-Image">
                                    <span><b class="text-dark">Welcome,</b> <?php print call_sess(USER_SESSION, 'name') ?></span>
                                    <i class="feather icon-chevron-down"></i>
                                </div>
                                <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                    <li>
                                        <a href="<?php base_url('dashboard/settings') ?>">
                                            <i class="feather icon-settings"></i> Settings
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php base_url('dashboard/dashboard/signout') ?>">
                                            <i class="feather icon-log-out"></i> Logout
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Sidebar chat start -->
        
        <!-- Sidebar inner chat end-->
        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                <nav class="pcoded-navbar">
                    <div class="pcoded-inner-navbar main-menu">
                        <div class="pcoded-navigatio-lavel" style="color: #fff!important">Navigation</div>
                        <ul class="pcoded-item pcoded-left-item">
                            <li class="active">
                                <a href="<?php base_url('dashboard') ?>">
                                    <span class="pcoded-micon text-white"><i class="text-white zmdi zmdi-desktop-mac"></i></span>
                                    <span class="pcoded-mtext text-white">Dashboard</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="<?php base_url('dashboard/new_job') ?>">
                                    <span class="pcoded-micon text-white"><i class="text-white zmdi zmdi-book"></i></span>
                                    <span class="pcoded-mtext text-white">New Job</span>
                                </a>
                            </li>
                            <li class="pcoded-hasmenu">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon text-white"><i class="text-white zmdi zmdi-assignment"></i></span>
                                    <span class="pcoded-mtext text-white">View Jobs</span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <?php foreach($years as $year): ?>
                                            <li class="pcoded-hasmenu">
                                                <a href="javascript:void(0)">
                                                    <span class="pcoded-micon text-white"><i class="text-white zmdi zmdi-assignment"></i></span>
                                                    <span class="pcoded-mtext text-white">Year <?php print $year['v_year'] ?></span>
                                                </a>

                                                <ul class="pcoded-submenu">
                                                    <?php for($i=0;$i<=count($months)-1;$i++): ?>
                                                        <li class="pcoded-hasmenu">
                                                            <a href="javascript:void(0)" >
                                                                <span class="pcoded-mtext text-white"><?php print ucfirst($months[$i]) ?></span>
                                                            </a>
                                                            
                                                            <ul class="pcoded-submenu">
                                                                <li>
                                                                    <a href="<?php base_url('dashboard/file/month/'.$months[$i].'/'.$year['v_year']) ?>" >
                                                                        <small><span class="pcoded-mtext text-white">All</span></small>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?php base_url('dashboard/file/month/'.$months[$i].'/'.$year['v_year'].'/'.simple_encrypt('Consolidation - air')) ?>" >
                                                                        <small><span class="pcoded-mtext text-white">Consolidation - Air</span></small>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?php base_url('dashboard/file/month/'.$months[$i].'/'.$year['v_year'].'/'.simple_encrypt('Consolidation - sea')) ?>" >
                                                                        <small><span class="pcoded-mtext text-white">Consolidation - Sea</span></small>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?php base_url('dashboard/file/month/'.$months[$i].'/'.$year['v_year'].'/'.simple_encrypt('Air freight')) ?>" >
                                                                        <small><span class="pcoded-mtext text-white">Air Freight</span></small>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?php base_url('dashboard/file/month/'.$months[$i].'/'.$year['v_year'].'/'.simple_encrypt('Sea freight')) ?>" >
                                                                        <small><span class="pcoded-mtext text-white">Sea Freight</span></small>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?php base_url('dashboard/file/month/'.$months[$i].'/'.$year['v_year'].'/'.simple_encrypt('Other')) ?>" >
                                                                        <small><span class="pcoded-mtext text-white">Other</span></small>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                <?php endfor ?>
                                                </ul>
                                            </li>
                                    <?php endforeach ?>
                                </ul>
                            </li>
                            <li class="">
                                 <a href="<?php base_url('dashboard/clearing_payments') ?>">
                                     <span class="pcoded-micon text-white"><i class="text-white zmdi zmdi-receipt"></i></span>
                                     <span class="pcoded-mtext text-white">Clearing Payments</span>
                                 </a>
                             </li>
                            <li class="pcoded-hasmenu">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon text-white"><i class="text-white zmdi zmdi-receipt"></i></span>
                                    <span class="pcoded-mtext text-white">Document Exchange</span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li>
                                        <a href="<?php base_url('dashboard/doc_ex') ?>">
                                             <span class="pcoded-micon text-white"><i class="text-white zmdi zmdi-receipt"></i></span>
                                             <span class="pcoded-mtext text-white">Add New</span>
                                         </a>
                                    </li>
                                    
                                    <li class="">
                                         <a href="<?php base_url('dashboard/all_doc_ex') ?>">
                                             <span class="pcoded-micon text-white"><i class="text-white zmdi zmdi-receipt"></i></span>
                                             <span class="pcoded-mtext text-white">View Existing</span>
                                         </a>
                                     </li>
                                </ul>
                             </li>
                            
                            <li class="pcoded-hasmenu">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon text-white"><i class="text-white zmdi zmdi-accounts"></i></span>
                                    <span class="pcoded-mtext text-white">Clients</span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li>
                                        <a href="<?php base_url('dashboard/new_client') ?>">
                                             <span class="pcoded-micon text-white"><i class="text-white zmdi zmdi-account"></i></span>
                                             <span class="pcoded-mtext text-white">Add New</span>
                                         </a>
                                    </li>
                                    
                                    <li class="">
                                         <a href="<?php base_url('dashboard/all_clients') ?>">
                                             <span class="pcoded-micon text-white"><i class="text-white zmdi zmdi-accounts"></i></span>
                                             <span class="pcoded-mtext text-white">View Existing</span>
                                         </a>
                                     </li>
                                </ul>
                             </li>
                        <div class="pcoded-navigatio-lavel" style="color: #fff!important">Account</div>
                        <ul class="pcoded-item pcoded-left-item">
                            <li class="">
                                <a href="<?php base_url('dashboard/settings') ?>">
                                    <span class="pcoded-micon text-white"><i class="feather icon-settings"></i></span>
                                    <span class="pcoded-mtext text-white" >Settings</span>
                                </a>
                            </li>
                            <?php  print call_sess(USER_SESSION, 'manage')?>
                            <li class="">
                                <a href="<?php base_url('dashboard/dashboard/signout') ?>">
                                    <span class="pcoded-micon text-white"><i class="text-white zmdi zmdi-power"></i></span>
                                    <span class="pcoded-mtext text-white" >Logout</span>
                                </a>
                            </li>
                        </ul>
                        <div class="pcoded-navigatio-lavel" style="color: #fff!important">Support</div>
                        <ul class="pcoded-item pcoded-left-item">
                            <li class="">
                                <a href="mailto:info@vlogic.com" target="_top">
                                    <span class="pcoded-micon text-white"><i class="feather icon-help-circle"></i></span>
                                    <span class="pcoded-mtext text-white" >info@vlogin.com</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="mailto:admin@vlogic.com" target="_top">
                                    <span class="pcoded-micon text-white"><i class="feather icon-help-circle"></i></span>
                                    <span class="pcoded-mtext text-white" >admin@vlogin.com</span>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                 </nav>