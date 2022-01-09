<!DOCTYPE html>
<html>
    <head>
        <title><?php echo SITE_TITLE . ' - ' . $title; ?></title>
        <!-- for-mobile-apps -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="#" />
        <!-- //for-mobile-apps -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/front/swipebox.css">
        <link href="<?php echo base_url(); ?>assets/css/front/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo base_url(); ?>assets/css/front/style.css" rel="stylesheet" type="text/css" media="all" />
        <!--animate-->
        <link href="<?php echo base_url(); ?>assets/css/front/animate.css" rel="stylesheet" type="text/css" media="all">
        <!--//end-animate-->
        <link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <!-- js -->
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
            function hideURLbar(){ window.scrollTo(0,1); } </script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/front/jquery-2.1.4.min.js"></script>
        <!-- //js -->
    </head>
    <body>
        <!--banner-->
        <div class="main-bar">
            <div class="container">
                <div class="header-nav">
                    <nav class="navbar navbar-default">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header logo">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <h1>
                                <a class="navbar-brand link link--yaku" href="index.html"><span>E</span><span>X</span><span>A</span><span>M</span><span>/</span><span>Q</span><span>U</span><span>I</span><span>Z</span></a>
                            </h1>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                            <nav class="cl-effect-1">
                                <ul class="nav navbar-nav ">
                                    <li>
                                        <a class="hvr-overline-from-left button2 active scroll" href="#">Home</a>
                                    </li>
                                    <li>
                                        <a class="hvr-overline-from-left button2 scroll" href="#">Instructor</a>
                                    </li>
                                    <li>
                                        <a class="hvr-overline-from-left button2 scroll" data-toggle="modal" data-target="#LoginModal" href="javascript:void(0);">Login</a>
                                    </li>
                                    <li>
                                        <a class="hvr-overline-from-left button2 scroll" data-toggle="modal" data-target="#SignModal" href="javascript:void(0);">Sign Up</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- /navbar-collapse -->
                    </nav>
                </div>
            </div>
        </div>