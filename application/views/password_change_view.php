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
        <!-- icheck -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/icheck/all.css">
        <!-- Theme CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
        <!-- Color CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/themes.css">


        <!-- jQuery -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>

        <!-- Nice Scroll -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
        <!-- Validation -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/validation/jquery.validate.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/validation/additional-methods.min.js"></script>
        <!-- icheck -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/icheck/jquery.icheck.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/eakroko.js"></script>

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

    </head>

    <body class='login'>
        <div class="wrapper">
            <h1>
                <?php  echo SITE_TITLE;  ?>
<!--                <a href="<?php  //echo base_url();  ?>"><img src="<?php echo base_url(); ?>assets/img/logo-big.png" alt="" class='retina-ready' width="59" height="49"/></a>-->
            </h1>
            
            <?php
                    if ($this->session->userdata('message_success'))
                    {
                        echo '<div class="alert alert-success"><button class="close" data-dismiss="alert" type="button">×</button>';
                        echo $this->session->userdata('message_success');
                        echo '</div>';
                        $this->session->unset_userdata('message_success');
                    }
                    else if ($this->session->userdata('message_error'))
                    {
                        echo '<div class="alert alert-error"><button class="close" data-dismiss="alert" type="button">×</button>';
                        echo $this->session->userdata('message_error');
                        echo '</div>';
                        $this->session->unset_userdata('message_error');
                    }
                    ?>
            
            <div class="login-body" id="login-block">
                <h2>Change Password</h2>
                <?php echo form_open("dashboard/changePassword",array('class'=>'form-validate', 'id' => 'frm-user'));?>
                    <div class="control-group">
                        <div class="email controls">
                            <input type="text" name='email' disabled="disabled" id="email" placeholder="Email address" class='input-block-level' data-rule-required="true" data-rule-email="true" value="<?php echo $user_email; ?>" />
                            <input type="hidden" name="password_salt" id="password_salt" value="<?php echo $pass_salt; ?>" />
                        </div>
                    </div>
                    <div class="control-group">                        
                        <div class="controls">
                            <input type="password" name="password" id="password" data-rule-required='true' data-rule-minlength='6' class='input-block-level' value="" placeholder="New password">
                        </div>
                    </div>
                    <div class="control-group">                        
                        <div class="controls">
                            <input type="password" name="cpassword" id="cpassword"  data-rule-equalto="#password" class='input-block-level' value="" placeholder="Confirm password">
                        </div>
                    </div>
                    <div class="submit">
                        <input type="submit" name="admin_login" value="Change Password" class='btn btn-primary'>
                    </div>
                <?php echo form_close(); ?>
                <div class="forget">
                    <a href="javascript:void(0);" id="lnk_forgotpassword"><span>Sign in?</span></a>
                </div>
            </div>
            
            <!--------------------------------------- Forgot Password Block ------------------------------------->
            <div class="login-body" id="forgot-password-block" style="display: none;">
                <h2>SIGN IN</h2>
                <?php echo form_open("dashboard/login",array('class'=>'form-validate'));?>
                    <div class="control-group">
                        <div class="email controls">
                            <input type="text" name='email' id="email" placeholder="Email address" class='input-block-level' data-rule-required="true" data-rule-email="true" value="">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="pw controls">
                            <input type="password" name="password" id="password" placeholder="Password" class='input-block-level' data-rule-required="true" value="">
                        </div>
                    </div>
                    <div class="submit">
                        <input type="submit" name="admin_login" value="Sign me in" class='btn btn-primary'>
                    </div>
                <?php echo form_close(); ?>
                <div class="forget">
                    <a href="javascript:void(0);" id="lnk_signup"><span>Change Password?</span></a>
                </div>
            </div>
            
        </div>
    </body>
    
    <script type="text/javascript">
        $(document).ready(function() {
            
            setTimeout("$('.alert').slideUp(1000)", 5000);

            /** Chnage view to Forgot password **/
            $("#lnk_forgotpassword").click(function() {
                $("#login-block").fadeOut("3000", function() {
                    $("#forgot-password-block").fadeIn("4000", function() {        });
                });
            });

            /** Chnage view to Sign up **/
            $("#lnk_signup").click(function() {
                 $("#forgot-password-block").fadeOut("3000", function() {
                    $("#login-block").fadeIn("4000", function() {        });
                });
            });
        });
    </script> 
    

</html>
