<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">


        <title><?php echo $page_title ?></title>

        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bootstrap/css/bootstrap.min.css">
        <!--<link rel="stylesheet" href="<?php echo base_url(); ?>asset/bootstrap/css/bootstrap-theme.min.css">-->
        <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap-theme.min.css">
       
        <!--<link rel="stylesheet" href="<?php echo base_url(); ?>asset/bootstrap/css/jquery.fancybox.css">-->
        <!--<script src="<?php echo base_url(); ?>asset/js/jquery-1.10.2.min.js"></script>-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        
        <script> var base_url = "<?php echo base_url(); ?>"</script>
        <style>
            /*
 * Base structure
 */

            /* Move down content because we have a fixed navbar that is 50px tall */
            body {
                padding-top: 50px;
            }


            /*
             * Global add-ons
             */

            .sub-header {
                padding-bottom: 10px;
                border-bottom: 1px solid #eee;
            }

            /*
             * Top navigation
             * Hide default border to remove 1px line.
             */
            .navbar-fixed-top {
                border: 0;
            }

            /*
             * Sidebar
             */

            /* Hide for mobile, show later */
            .sidebar {
                display: none;
            }
            @media (min-width: 768px) {
                .sidebar {
                    position: fixed;
                    top: 51px;
                    bottom: 0;
                    left: 0;
                    z-index: 1000;
                    display: block;
                    padding: 20px;
                    overflow-x: hidden;
                    overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
                    background-color: #f5f5f5;
                    border-right: 1px solid #eee;
                }
            }

            /* Sidebar navigation */
            .nav-sidebar {
                margin-right: -21px; /* 20px padding + 1px border */
                margin-bottom: 20px;
                margin-left: -20px;
            }
            .nav-sidebar > li > a{
                padding-right: 20px;
                padding-left: 20px;
            }
            .nav-sidebar > .active > a,
            .nav-sidebar > .active > a:hover,
            .nav-sidebar > .active > a:focus {
                color: #fff;
                background-color: #428bca;
            }
            .nav-sidebar .collapse li {
                padding: 10px;
                list-style-type:none;
            }
            .nav-sidebar .collapse .active,  .nav-sidebar .collapse .active a{
                color: #fff !important;
                background-color: #428bca;
            }

            /*
             * Main content
             */

            .main {
                padding: 20px;
            }
            @media (min-width: 768px) {
                .main {
                    padding-right: 40px;
                    padding-left: 40px;
                }
            }
            .main .page-header {
                margin-top: 0;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand">Library Management System</a>
                    <!--<a class="navbar-brand" href="<?php //echo base_url()                 ?>Home" target="_blank">Visit Site</a>-->
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <!--<li class="<?php //echo ($this->router->class == 'Login' && $this->router->method == 'change_password') ? 'active' : NULL;                 ?>"><a href="<?php //echo base_url()                 ?>admin/Login/change_password">Change Password</a></li>-->

                        <li class="<?php echo ($this->router->class == 'Login' && $this->router->method == 'logout') ? 'active' : NULL; ?>"><a href="<?= base_url('admin/login/logout'); ?>" ><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
                    </ul>

                </div>
            </div>
        </nav>


        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <li><a href=""><i class="glyphicon glyphicon-envelope"></i> Dashboard</a></li>
                    </ul>
                    <ul class="nav nav-sidebar">
                        <li><a href="<?= base_url('admin/department'); ?>"><i class="glyphicon glyphicon-envelope"></i> Department</a></li>
                    </ul>
                    <ul class="nav nav-sidebar">
                        <li>
                            <a href="<?= base_url('admin/author'); ?>"><i class="glyphicon glyphicon-envelope"></i> Author</a>
                        </li>
                    </ul>
                    <ul class="nav nav-sidebar">
                        <li>
                            <a href="<?= base_url('admin/publication'); ?>"><i class="glyphicon glyphicon-envelope"></i> Publication</a>
                        </li>
                    </ul>
                    <ul class="nav nav-sidebar">
                        <li>
                            <a href="<?= base_url('admin/book'); ?>"><i class="glyphicon glyphicon-envelope"></i> Book</a>
                        </li>
                    </ul>
                    <ul class="nav nav-sidebar">
                        <li>
                            <a href="<?= base_url('admin/Issue_Book/add'); ?>"><i class="glyphicon glyphicon-envelope"></i> Issue Book</a>
                        </li>
                    </ul>
                     <ul class="nav nav-sidebar">
                        <li>
                            <a href="<?= base_url('admin/Search/index'); ?>"><i class="glyphicon glyphicon-envelope"></i> Search Book</a>
                        </li>
                    </ul>

                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
