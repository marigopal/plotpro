<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BTechPlotPro</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="../template_files/plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="../template_files/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../template_files/bower_components/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="../template_files/bower_components/Ionicons/css/ionicons.min.css">
        <link rel="stylesheet" href="../template_files/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="../template_files/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="../template_files/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
        <link rel="stylesheet" href="../template_files/dist/css/adminlte.min.css">
        <link rel="stylesheet" href="../template_files/dist/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="../template_files/bower_components/morris.js/morris.css">
        <link rel="stylesheet" href="../template_files/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
        <link rel="stylesheet" href="../template_files/bower_components/jvectormap/jquery-jvectormap.css">
        <link rel="stylesheet" href="../template_files/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
        <link rel="stylesheet" href="../template_files/toastr/toastr.min.css">
        <link rel="stylesheet" href="../template_files/plugins/daterangepicker/daterangepicker.css">
        <link rel="stylesheet" href="../template_files/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        <link rel="stylesheet" href="../template_files/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <link rel="stylesheet" href="../template_files/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
        <link rel="stylesheet" href="../template_files/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <link rel="stylesheet" href="../template_files/plugins/select2/css/select2.min.css">
        <link rel="stylesheet" href="../template_files/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
        <link rel="stylesheet" href="../template_files/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
        <link rel="stylesheet" href="../template_files/plugins/bs-stepper/css/bs-stepper.min.css">
        <link rel="stylesheet" href="../template_files/plugins/dropzone/min/dropzone.min.css">
        <link rel="stylesheet" href="../template_files/dist/css/style.css">

    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="/home/" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="/users/profile?id=<?php echo $_COOKIE['user_id'] ?>" class="nav-link">Profile</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                            <i class="fas fa-expand-arrows-alt"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="javascript:void(0)" onclick="systemlogout(this)">
                            <i class="fas fa-power-off"></i>
                        </a>
                    </li>
                </ul>
            </nav>