<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="<?php base_url("assets/vlogic/assets/images/favicon.ico") ?>" type="image/x-icon">
        <link rel="stylesheet" href="<?php base_url("assets/vlogic/assets/css/main.css") ?>">
        <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="<?php base_url("assets/vlogic/assets/css/custom.css") ?>">
        <script src="<?php base_url("assets/vlogic/assets/js/app.js") ?>"></script>
        <title><?php print isset($title) ? $title : NULL ?></title>
    </head>
    <body>
        <div class="top-bar-box pl-0">
            <div class="container-fluid">
                <div class="top-bar">
                    <a class="logo-box" href="<?php base_url('dashboard') ?>">
                        <img class="logo rounded" src="<?php base_url("assets/vlogic/assets/images/logo.png") ?>" alt="Generic placeholder image">
                        <div class="title"><?php print SITENAME ?></div>
                    </a>
                    <div class="page-info"><?php print SITENAME ?> / SEA SHIPPING / DASHBOARD</div>
                    <div class="top-side-box">
                        <div class="notification-box">
                            
                            <?php print date('F d D, Y') ?>
                        </div>
                    </div>
                    <div class="mobile-nav-toggle"> <i class="icon mdi mdi-menu" aria-hidden="true"></i> Menu </div>
                    <div class="user-profile">
                        <img class="user-image" src="<?php base_url("uploads/users/".call_sess(USER_SESSION, 'user_avater')) ?>" alt="Generic placeholder image">
                        <div class="info">
                            <div class="user-name"><?php print call_sess(USER_SESSION, 'name') ?></div>
                            <div class="user-info"><?php print call_sess(USER_SESSION, 'user_role') ?></div>
                        </div>
                        <div class="user-profile-content">
                            <a href="<?php base_url('dashboard/settings') ?>"> <i class="icon mdi mdi-settings" aria-hidden="true"></i> Settings </a>
                            <a href="<?php base_url('dashboard/dashboard/signout') ?>"> <i class="icon mdi mdi-logout-variant" aria-hidden="true"></i> Logout </a>
                        </div>
                    </div>
                </div>
                <div class="mail-top-bar-box">
                    <div class="mail-top-bar">
                        <div class="side-bar d-none d-lg-flex align-items-center text-size-15 font-weight-normal">File Manager</div>
                        <div class="main-bar">
                            <div class="row h-100">
                                <div class="col-12 col-xl-5">
                                    <div class="d-flex align-items-center h-100 position-relative">
                                        <form action="<?php base_url('dashboard/file_manager/result') ?>" method="POST">
                                        <input type="text" class="form-control w-100 py-7 border-color-1" name="searchfile" placeholder="Search">
                                        <i class="mdi mdi-magnify text-size-18 position-absolute post-14 posr-8 text-color-2" aria-hidden="true"></i>
                                        </form> 
                                    </div>
                                </div>
                                <div class="col-7 d-none d-xl-flex align-items-center h-100">
                                    <div class="ml-auto">3.34 GB (19%) of 17 GB used</div>
                                    <div class="fw-3 fh-3 rounded-circle bg-color-1 d-inline-block mx-8"></div>
                                    <a class="text-primary" href="<?php base_url('dashboard') ?>"><button class="btn btn-primary fw-140 font-weight-normal">Dashboard</button></a> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-wrapper ml-0 mt-150 mt-lg-105">
            <div class="container-fluid">
                <div class="box-layout">
                    <div class="file-manager-menu-layout fadeInLeft animated">
                        <button class="btn btn-primary fw-140 mt-10 font-weight-normal" data-toggle="modal" data-target="#exampleModalCenter">UPLOAD FILE</button>
                        <div class="title">Files</div>
                        <ul>
                            <li class="active">
                                <a href="<?php base_url('dashboard/file_manager') ?>">
                                    <i class="icon mdi mdi-inbox" aria-hidden="true"></i> All Files 
                                    <div class="badge badge-pill badge-secondary"><?php print $all ?></div>
                                </a>
                            </li>
                            <li>
                                <a href="<?php base_url('dashboard/file_manager/images') ?>">
                                    <i class="icon mdi mdi-film" aria-hidden="true"></i> Images
                                    <div class="badge badge-pill badge-secondary"><!-- <?php print $img ?> --></div>

                                </a>
                            </li>
                            <li>
                                <a href="<?php base_url('dashboard/file_manager/documents') ?>">
                                    <i class="icon mdi mdi-file-xml" aria-hidden="true"></i> Documents 
                                    <div class="badge badge-pill badge-secondary"><!-- <?php print $fil ?> --></div>
                                </a>
                            </li>
                        </ul>
                        <div class="title">Other</div>
                        <ul>
                            <li>
                                <a href="<?php base_url('dashboard/file_manager/archive') ?>"><i class="icon mdi mdi-inbox" aria-hidden="true"></i> Archive</a>
                            </li>
                            <li>
                                <a href="<?php base_url('dashboard') ?>"><i class="icon mdi mdi-home-lock-open" aria-hidden="true"></i> Dashboard</a>
                            </li>
                        </ul>
                        <!-- <div class="title">Tags</div>
                        <ul>
                            <li>
                                <a href="">
                                    <div class="fw-8 fh-8 mr-5 bg-danger rounded-circle d-inline-block mr-10"></div>
                                    Red
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <div class="fw-8 fh-8 mr-5 bg-primary rounded-circle d-inline-block mr-10"></div>
                                    Blue
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <div class="fw-8 fh-8 mr-5 bg-warning rounded-circle d-inline-block mr-10"></div>
                                    Yellow
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <div class="fw-8 fh-8 mr-5 bg-success rounded-circle d-inline-block mr-10"></div>
                                    Green
                                </a>
                            </li>
                        </ul> -->
                    </div>