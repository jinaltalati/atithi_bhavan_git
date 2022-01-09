<html><head>
    <meta charset="utf-8">
    <title>Login</title>
    <base href="/">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>assets/images/templelogo2.jpeg">
    <link href="<?php echo base_url(); ?>assets/css/styles.51eb3cd004bdf6cc4a6e.bundle.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
   
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<style type="text/css">
input[type="email"],input[type="text"],input[type="password"],
select.form-control {
  background: transparent;
  border: none;
  border-bottom: 1px solid #000000;
  -webkit-box-shadow: none;
  box-shadow: none;
  border-radius: 0;
}

input[type="email"],input[type="text"],input[type="password"]:focus,
select.form-control:focus {
  -webkit-box-shadow: none;
  box-shadow: none;
}

.alert{
    margin-bottom: -10px;
}
</style>
    

<div  class="body-content">
    <div  class="row">
        <div  class="col-md-12 loginBackgroundImg">
            <div  class="col-md-6">
                
            
            </div>
            <div  class="col-md-6">
                <div class="loginForm">

                       <?php echo form_open("dashboard/login");?>
                            
                            <div id="login-block">
                                <h3 style="font-style: italic; color: #d84315">Sarangpur Atithi Bhavan</h3>

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
                                    echo '<div class="alert alert-error" style="color:red;"><button class="close" data-dismiss="alert" type="button">×</button>';
                                    echo $this->session->userdata('message_error');
                                    echo '</div>';
                                    $this->session->unset_userdata('message_error');
                                }
                                ?>

                                <div  class="col-md-12">
                                    <input type="email" name="email" class="form-control" placeholder="Username" required="required">
                                </div>
                                <div class="col-md-12">
                                    <input type="password" name="password" class="form-control" placeholder="Password" required="required">
                                    <div  class="margin-top-10">
                                        <a class="forgotLink" id="lnk_forgotpassword">forgot password?</a>
                                    </div>
                                </div>
                                <div  class="col-md-12 text-right">
                                    <button type="submit" name="admin_login" class="lineButton btn-block">Sign in
                                    </button>
                                    
                                </div>
                                <div  class="clearfix"></div>
                            </div>

                        <?php echo form_close(); ?>

                        <div  class="clearfix"></div>
                   
                    <div  class="clearfix"></div>
                    <div id="forgot-password-block" style="display: none;">
                        <form>
                      
                            <h3 class="margin-top-35 rightToLeftAnimation">Forgot password</h3>
                            <div class="sendOTPForm rightToLeftAnimation">
                                <div class="back-arrow" id="lnk_signup"><i class="material-icons"></i></div>
                                <div class="col-md-12">
                                    <input type="email" name="email" class="form-control" placeholder="Username" required="required">
                                </div>

                                <div  class="col-md-12 text-right">
                                <button type="submit" name="admin_forget_pass" class="lineButton btn-block">Send OTP
                                </button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            
                        </form>
                    </div>
                    <div class="clearfix"></div>
                        
                </div>
            </div>
        </div>
    </div>
</div>
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

<script type="text/javascript" src="https://smarttemple.org/inline.c1cfbf1044520bec133d.bundle.js"></script><script type="text/javascript" src="https://smarttemple.org/polyfills.8f48f8f366a829614999.bundle.js"></script><script type="text/javascript" src="https://smarttemple.org/scripts.211927522454887d894a.bundle.js"></script><script type="text/javascript" src="https://smarttemple.org/vendor.04900451acf3b0ef4e92.bundle.js"></script><!-- <script type="text/javascript" src="https://smarttemple.org/main.54d8a16870c7bda7b7e2.bundle.js"></script> -->

</body></html>


<style>
    body, html{overflow:hidden!important}.body-content{background:#fff}.MT10{margin-top:10px!important}.MT40{margin-top:40px!important}.loginBackgroundImg{background-image:url(<?= base_url(); ?>assets/images/frontlogo1.jpg)!important;background-position:0 0;background-repeat:no-repeat;background-size:contain;height:100%;position:fixed}.loginForm{width:500px;margin-top:120px;padding-left:50px;overflow:hidden;height:280px;min-height:280px;max-height:280px}.loginForm   h3{padding-left:15px;margin:0;margin-bottom:10px;color:#333;font-size:28px}.loginForm   .form-control{margin-top:5px;color:#666}.forgotLink{font-size:15px;text-decoration:none;padding:0;margin:0;font-style:italic;color:#333;position:relative;top:-7px}.forgotLink:hover{text-decoration:underline}.loginForm   .md-input-element{font-size:18px}button.lineButton{margin-top:20px;min-height:39px!important;line-height:39px!important}.add-icon   .material-icons, .add-icon   .resendOtp{position:absolute;right:14px;top:25px;cursor:pointer;color:#d2d2d2}.add-icon   .material-icons:hover{color:rgba(0,0,0,.85)}.back-arrow{position:relative;left:-44px;margin-top:-45px;display:block}.back-arrow   i{background:#f3f2f2;padding:5px;border-radius:35px;cursor:pointer}.add-icon   .resendOtp{font-size:15px;top:28px;cursor:pointer}.add-icon   .resendOtp   a{color:#666!important}.add-icon   .resendOtp:hover{text-decoration:underline;color:#333!important}#md-overlay-0{top:18px!important}#md-overlay-0   .md-menu-panel{min-width:370px!important;max-width:600px!important}.rightToLeftAnimation{-webkit-animation:rightToLeft .4s ease-out;animation:rightToLeft .4s ease-out;position:relative}@-webkit-keyframes rightToLeft{0%{right:-500px}to{right:0}}@keyframes rightToLeft{0%{right:-500px}to{right:0}}.leftToRightAnimation{-webkit-animation:leftToRight .4s ease-out;animation:leftToRight .4s ease-out;position:relative}@-webkit-keyframes leftToRight{0%{right:500px}to{right:0}}@keyframes leftToRight{0%{right:500px}to{right:0}}.loginLoader{height:39px;background:#ff9800;text-align:center!important}.loginLoader   img{width:28px;margin-top:5px}.disabledWrapper{position:fixed;height:100%;width:100%;top:0;left:0;cursor:wait}</style><style>.md-sidenav-container,.md-sidenav-content{transform:translate3d(0,0,0);display:block}.md-sidenav-container{position:relative;box-sizing:border-box;-webkit-overflow-scrolling:touch;overflow:hidden}.md-sidenav-backdrop,.md-sidenav-container[fullscreen]{position:absolute;top:0;bottom:0;right:0;left:0}.md-sidenav-container[fullscreen].md-sidenav-opened{overflow:hidden}.md-sidenav-backdrop{display:block;z-index:2;visibility:hidden}.md-sidenav-backdrop.md-sidenav-shown{visibility:visible}@media screen and (-ms-high-contrast:active){.md-sidenav-backdrop{opacity:.5}}.md-sidenav-content{position:relative;height:100%;overflow:auto}md-sidenav,md-sidenav.md-sidenav-closing{transform:translate3d(-100%,0,0)}md-sidenav{display:block;position:absolute;top:0;bottom:0;z-index:3;min-width:5%;outline:0}md-sidenav.md-sidenav-closed{visibility:hidden}md-sidenav.md-sidenav-opened,md-sidenav.md-sidenav-opening{box-shadow:0 8px 10px -5px rgba(0,0,0,.2),0 16px 24px 2px rgba(0,0,0,.14),0 6px 30px 5px rgba(0,0,0,.12);transform:translate3d(0,0,0)}md-sidenav.md-sidenav-opening{visibility:visible}md-sidenav.md-sidenav-end,md-sidenav.md-sidenav-end.md-sidenav-closing{transform:translate3d(100%,0,0)}md-sidenav.md-sidenav-side{z-index:1}md-sidenav.md-sidenav-end{right:0}md-sidenav.md-sidenav-end.md-sidenav-closed{visibility:hidden}md-sidenav.md-sidenav-end.md-sidenav-opened,md-sidenav.md-sidenav-end.md-sidenav-opening{box-shadow:0 8px 10px -5px rgba(0,0,0,.2),0 16px 24px 2px rgba(0,0,0,.14),0 6px 30px 5px rgba(0,0,0,.12);transform:translate3d(0,0,0)}md-sidenav.md-sidenav-end.md-sidenav-opening{visibility:visible}[dir=rtl] md-sidenav,[dir=rtl] md-sidenav.md-sidenav-closing{transform:translate3d(100%,0,0)}[dir=rtl] md-sidenav.md-sidenav-closed{visibility:hidden}[dir=rtl] md-sidenav.md-sidenav-opened,[dir=rtl] md-sidenav.md-sidenav-opening{box-shadow:0 8px 10px -5px rgba(0,0,0,.2),0 16px 24px 2px rgba(0,0,0,.14),0 6px 30px 5px rgba(0,0,0,.12);transform:translate3d(0,0,0)}[dir=rtl] md-sidenav.md-sidenav-opening{visibility:visible}[dir=rtl] md-sidenav.md-sidenav-end{left:0;right:auto;transform:translate3d(-100%,0,0)}[dir=rtl] md-sidenav.md-sidenav-end.md-sidenav-closed{visibility:hidden}[dir=rtl] md-sidenav.md-sidenav-end.md-sidenav-closing{transform:translate3d(-100%,0,0)}[dir=rtl] md-sidenav.md-sidenav-end.md-sidenav-opened,[dir=rtl] md-sidenav.md-sidenav-end.md-sidenav-opening{box-shadow:0 8px 10px -5px rgba(0,0,0,.2),0 16px 24px 2px rgba(0,0,0,.14),0 6px 30px 5px rgba(0,0,0,.12);transform:translate3d(0,0,0)}[dir=rtl] md-sidenav.md-sidenav-end.md-sidenav-opening{visibility:visible}.md-sidenav-focus-trap{height:100%}.md-sidenav-focus-trap>.cdk-focus-trap-content{box-sizing:border-box;height:100%;overflow-y:auto;transform:translateZ(0)}.md-sidenav-invalid{display:none}</style><style>.md-sidenav-content,md-sidenav{transition:transform .4s cubic-bezier(.25,.8,.25,1)}.md-sidenav-backdrop.md-sidenav-shown{transition:background-color .4s cubic-bezier(.25,.8,.25,1)}</style><style>md-input,md-textarea{display:inline-block;position:relative;font-family:Roboto,"Helvetica Neue",sans-serif;line-height:normal;text-align:left}.md-input-element.md-end,[dir=rtl] md-input,[dir=rtl] md-textarea{text-align:right}.md-input-wrapper{margin:16px 0}.md-input-table{display:inline-table;flex-flow:column;vertical-align:bottom;width:100%}.md-input-table>*{display:table-cell}.md-input-infix{position:relative}.md-input-element{font:inherit;background:0 0;color:currentColor;border:none;outline:0;padding:0;width:100%}[dir=rtl] .md-input-element.md-end{text-align:left}.md-input-element:-moz-ui-invalid{box-shadow:none}.md-input-element:-webkit-autofill+.md-input-placeholder.md-float{display:block;padding-bottom:5px;transform:translateY(-100%) scale(.75);width:133.33333%}.md-input-placeholder{position:absolute;left:0;top:0;font-size:100%;pointer-events:none;z-index:1;width:100%;display:none;white-space:nowrap;text-overflow:ellipsis;overflow-x:hidden;transform:translateY(0);transform-origin:bottom left;transition:transform .4s cubic-bezier(.25,.8,.25,1),scale .4s cubic-bezier(.25,.8,.25,1),color .4s cubic-bezier(.25,.8,.25,1),width .4s cubic-bezier(.25,.8,.25,1)}.md-input-placeholder.md-empty{display:block;cursor:text}.md-input-placeholder.md-float.md-focused,.md-input-placeholder.md-float:not(.md-empty){display:block;padding-bottom:5px;transform:translateY(-100%) scale(.75);width:133.33333%}[dir=rtl] .md-input-placeholder{transform-origin:bottom right;left:auto;right:0}.md-input-underline{position:absolute;height:1px;width:100%;margin-top:4px;border-top-width:1px;border-top-style:solid}.md-input-underline.md-disabled{background-image:linear-gradient(to right,rgba(0,0,0,.26) 0,rgba(0,0,0,.26) 33%,transparent 0);background-size:4px 1px;background-repeat:repeat-x;border-top:0;background-position:0}.md-input-underline .md-input-ripple{position:absolute;height:2px;z-index:1;top:-1px;width:100%;transform-origin:top;opacity:0;transform:scaleY(0);transition:transform .4s cubic-bezier(.25,.8,.25,1),opacity .4s cubic-bezier(.25,.8,.25,1)}.md-input-underline .md-input-ripple.md-focused{opacity:1;transform:scaleY(1)}.md-hint{display:block;position:absolute;font-size:75%;bottom:-.5em}.md-hint.md-right{right:0}[dir=rtl] .md-hint{right:0;left:auto}[dir=rtl] .md-hint.md-right{right:auto;left:0}
</style>