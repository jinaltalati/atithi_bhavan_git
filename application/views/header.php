<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <!-- Apple devices fullscreen -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <!-- Apple devices fullscreen -->
        <meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
        <meta name='robots' content='noindex,follow' />
        <title><?php echo $title; ?></title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
        <!-- Bootstrap responsive -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css">
        <!-- jQuery UI -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/jquery-ui/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/jquery-ui/smoothness/jquery.ui.theme.css">
        <!-- PageGuide -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/pageguide/pageguide.css">
        <!-- Fullcalendar -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/fullcalendar/fullcalendar.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/fullcalendar/fullcalendar.print.css" media="print">
        <!-- chosen -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/chosen/chosen.css">
        <!-- select2 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/select2/select2.css">
        <!-- icheck -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/icheck/all.css">
        <!-- Theme CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom_style.css">
        <!-- Color CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/themes.css">

        <!-- dataTables -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/datatable/TableTools.css">

        <!-- jQuery -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>

        <!-- Nice Scroll -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
        <!-- jQuery UI -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/jquery-ui/jquery.ui.core.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/jquery-ui/jquery.ui.widget.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/jquery-ui/jquery.ui.mouse.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/jquery-ui/jquery.ui.draggable.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/jquery-ui/jquery.ui.resizable.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/jquery-ui/jquery.ui.sortable.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/jquery-ui/jquery.ui.datepicker.min.js"></script>
        <!-- Touch enable for jquery UI -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/touch-punch/jquery.touch-punch.min.js"></script>
        <!-- slimScroll -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <!-- vmap -->
<!--        <script src="<?php echo base_url(); ?>assets/js/plugins/vmap/jquery.vmap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/vmap/jquery.vmap.world.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/vmap/jquery.vmap.sampledata.js"></script>-->
        <!-- Bootbox -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/bootbox/jquery.bootbox.js"></script>
        <!-- Flot -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/flot/jquery.flot.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/flot/jquery.flot.bar.order.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/flot/jquery.flot.pie.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/flot/jquery.flot.resize.min.js"></script>
        <!-- imagesLoaded -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/imagesLoaded/jquery.imagesloaded.min.js"></script>
        <!-- PageGuide -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/pageguide/jquery.pageguide.js"></script>
        <!-- FullCalendar -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/fullcalendar/fullcalendar.min.js"></script>
        <!-- Chosen -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/chosen/chosen.jquery.min.js"></script>
        <!-- select2 -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/select2/select2.min.js"></script>
        <!-- icheck -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/icheck/jquery.icheck.min.js"></script>

        <!-- Theme framework -->
        <script src="<?php echo base_url(); ?>assets/js/eakroko.min.js"></script>
        <!-- Theme scripts -->
        <script src="<?php echo base_url(); ?>assets/js/application.min.js"></script>
        <!-- Just for demonstration -->
        <script src="<?php echo base_url(); ?>assets/js/demonstration.min.js"></script>

        <!-- Validation -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/validation/jquery.validate.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/validation/additional-methods.min.js"></script>

        <!--[if lte IE 9]>
                        <script src="<?php echo base_url(); ?>assets/js/plugins/placeholder/jquery.placeholder.min.js"></script>
                        <script>
                                $(document).ready(function() {
                                        $('input, textarea').placeholder();
                                });
                        </script>
                <![endif]-->

        <!-- Favicon -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.ico" />
        <!-- Apple devices Homescreen icon -->
        <link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>assets/img/apple-touch-icon-precomposed.png" />

        <!-- dataTables -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/datatable/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/datatable/TableTools.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/datatable/ColReorderWithResize.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/datatable/ColVis.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/datatable/jquery.dataTables.columnFilter.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/datatable/jquery.dataTables.grouping.js"></script>      

        <script src="<?php echo base_url(); ?>assets/js/for_pages/general.js"></script>
        <script type="text/javascript" >
            var BASE_URL = '<?php echo base_url(); ?>';
            /*$(document).ready(function() {
                setTimeout("$('.alert').slideUp(1000)", 5000);
            });*/
        </script>

        <!-- Fancy Box -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/plugins/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />

    </head>
    <?php if($this->session->userdata('role_id') == '2'){ ?>
        <body  class="theme-satgreen">
            <style type="text/css">
                #left .subnav .subnav-title .active { background: #56af45; }
            </style>
    <?php } else { ?>
        <body class="theme-lightgrey">
    <?php } ?>
        <div>
            <h4><center><a href="<?php echo base_url(); ?>" id="brand">Atithi Bhavan<!-- <?php // echo SITE_TITLE;  ?> --> </a></center></h4>
        </div>
        <div id="navigation">
            <div class="container-fluid"> <a href="javascript:void(0);" class="toggle-nav" rel="tooltip" data-placement="bottom" title="Toggle navigation"><i class="icon-reorder"></i></a>
<!--            <div class="container-fluid"> <a href="<?php echo base_url().''; ?>" id="brand"><img style="height: 44px; width: 140px;" src="<?php echo base_url(); ?>assets/images/brand_logo.png" alt="Logo">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a> <a href="javascript:void(0);" class="toggle-nav" rel="tooltip" data-placement="bottom" title="Toggle navigation"><i class="icon-reorder"></i></a>-->
                <ul class='main-nav'>
                    <!-- <li <?php //echo ($this->router->class == 'dashboard') ? "class='active'" : ""; ?> > <a href="<?php //echo base_url().''; ?>" > <span>Dashboard</span> </a> </li> -->

                    <?php if($this->session->userdata('role_id') == '1') { ?> 
                        <li <?php echo ($this->router->class == 'admins') ? "class='active'" : ""; ?> > <a href="javascript:void(0);" data-toggle="dropdown" class='dropdown-toggle'> <span>Admins</span> <span class="caret"></span> </a>
                            <ul class="dropdown-menu">
                                <li> <a href="<?php echo base_url(); ?>admins/">Admins</a> </li>
                                <li> <a href="<?php echo base_url(); ?>admins/add/">Add Admin</a> </li>
                               
                            </ul>
                        </li>

                        <li <?php echo ($this->router->class == 'building') ? "class='active'" : ""; ?> > <a href="javascript:void(0);" data-toggle="dropdown" class='dropdown-toggle'> <span>Building</span> <span class="caret"></span> </a>
                            <ul class="dropdown-menu">
                                <li> <a href="<?php echo base_url(); ?>building/">Building</a> </li>
                                <li> <a href="<?php echo base_url(); ?>building/add/">Add Building</a> </li>
                            </ul>
                        </li>

                        <!-- <li <?php echo ($this->router->class == 'floor') ? "class='active'" : ""; ?> > <a href="javascript:void(0);" data-toggle="dropdown" class='dropdown-toggle'> <span>Floor</span> <span class="caret"></span> </a>
                            <ul class="dropdown-menu">
                                <li> <a href="<?php echo base_url(); ?>floor/">Floor</a> </li>
                                <li> <a href="<?php echo base_url(); ?>floor/add/">Add Floor</a> </li>
                            </ul>
                        </li> -->

                        <li <?php echo ($this->router->class == 'room') ? "class='active'" : ""; ?> > <a href="javascript:void(0);" data-toggle="dropdown" class='dropdown-toggle'> <span>Room</span> <span class="caret"></span> </a>
                            <ul class="dropdown-menu">
                                <li> <a href="<?php echo base_url(); ?>room/">Room</a> </li>
                                <li> <a href="<?php echo base_url(); ?>room/add/">Add Room</a> </li>
                            </ul>
                        </li>

                        <li <?php echo ($this->router->class == 'booking') ? "class='active'" : ""; ?> > <a href="javascript:void(0);" data-toggle="dropdown" class='dropdown-toggle'> <span>Booking</span> <span class="caret"></span> </a>
                            <ul class="dropdown-menu">
                                <li> <a href="<?php echo base_url(); ?>booking/">Booked Room List</a> </li>
                                <!-- <li> <a href="<?php echo base_url(); ?>booking/add/">Booking</a> </li> -->
                            </ul>
                        </li>

                        
                    <?php } ?>
                </ul>
                <div class="user">
                    <div class="dropdown"> <a href="javascript:void(0);" class='dropdown-toggle' data-toggle="dropdown" style="text-transform: capitalize;"><?php echo $this->session->userdata('user_name') . ' ' . $this->session->userdata('user_lname'); ?> 
<!--                            <img src="<?php //echo base_url(); ?>assets/img/demo/user-avatar.jpg" alt="">-->
                        </a>

                        <ul class="dropdown-menu pull-right">
                         <!--    <li> <a href="<?php //echo base_url(); ?>editProfile">Edit profile</a> </li> -->
                            <!--                            <li> <a href="javascript:void(0);">Account settings</a> </li>-->
                            <li> <a href="<?php echo base_url(); ?>dashboard/logout">Sign out</a> </li>
                        </ul>
                    </div>  
                </div>
            </div>
        </div>
        <div class="container-fluid" id="content">
            <div id="main">
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="pull-left">
                            <h1><?php echo $title; ?></h1>
                        </div>
                        <div class="pull-right">
                            <ul class="stats">
<!--                                <li class='satgreen'> <i class="icon-user"></i>
                                    <?php
                                    /** Get Totlal Number of user * */
                                    //$this->db->from('users');
                                    //$this->db->where_in('role_id', array('1', '2', '4'));
                                    //$cntUsers = $this->db->count_all_results();
                                    ?>
                                    <div class="details"> <span class="big"><?php //echo number_format($cntUsers); ?></span> <span>User</span> </div>
                                </li>-->
                     

<!--                                <li class='lightred'> <i class="icon-calendar"></i>
                                    <div class="details"> <span class="big">February 22, 2013</span> <span>Wednesday, 13:56</span> </div>
                                </li>-->
                            </ul>
                        </div>
                    </div>
                    <?php
                    if ($this->session->userdata('message_success'))
                    {
                        echo '<div class="alert alert-success">
        <button class="close" data-dismiss="alert" type="button">×</button>';
                        echo $this->session->userdata('message_success');
                        echo '</div>';
                        $this->session->unset_userdata('message_success');
                    }
                    else if ($this->session->userdata('message_error'))
                    {
                        echo '<div class="alert alert-error">
        <button class="close" data-dismiss="alert" type="button">×</button>';
                        echo $this->session->userdata('message_error');
                        echo '</div>';
                        $this->session->unset_userdata('message_error');
                    }
                    ?>