<body style="margin:0; padding:0;width:660px;">
<div style="float:left; width:660px; background:#368DDF; border-bottom:#E02B33 solid 10px;">
<!--<div style="margin:15px 0 15px 30px; float:left; width:93px; height:64px;">
    <img src="<?php //echo base_url(); ?>assets/files/default/logo-big@2x.png" alt="" height="66" width="auto"/>
</div>-->
<div style="float:left; margin:34px 0 0 100px; color:#fff; letter-spacing:5px; font-size: 20px;">Password Changed</div>
</div>
<?php 
$data = $this->_ci_cached_vars;
?>
<div style="float:left; width:660px; background:#fff;">
    
<span style="margin-left: 15px;margin-top: 30px;float: left;width: 100%;font-size: 16px;font-family: 'calibri';">Hello, <?php echo $data['user']; ?></span> 

<span style="margin-left: 15px;margin-top: 15px;float: left;width: 100%;font-size: 16px;font-family: 'calibri';">Your password has been changed successfully. Below is your new credentials.</span> 

     <span style="margin-left: 15px;margin-top: 10px;float: left;width: 100%;font-size: 16px;font-family: 'calibri';">
        <span style='width: 150px;float: left;'>
            User ID : 
        </span> 
        <span style='font-weight: bold;margin-left: 20px;float: left;'>
            <?php echo $data['email']; ?>
        </span>
     </span> 

     <span style="margin-left: 15px;margin-top: 10px;float: left;width: 100%;font-size: 16px;font-family: 'calibri';">
        <span style='width: 150px;float: left;'>
            Password : 
        </span> 
        <span style='font-weight: bold;margin-left: 20px;float: left;'>
            <?php echo $data['password']; ?>
        </span>
     </span>                                

     <span style="margin-left: 15px;margin-top: 10px;float: left;width: 100%;font-size: 16px;font-family: 'calibri';">
        <span style='width: 150px;float: left;'>
            Login - URL : 
        </span> 
        <span style='font-weight: bold;margin-left: 20px;float: left;'>
            <a href='<?php echo base_url() ?>' style='color: #368DDF;text-decoration: none;border-bottom: 1px solid #67B0D1;'>
                     <?php echo base_url(); ?>
            </a>
        </span>
     </span>     
 
 <div style="float:left; width:660px;color: #fff;background:#368DDF; border-bottom: #E02B33 solid 10px;">
     
    
     <span style="margin-left: 15px;margin-left: 15px;margin-top: 10px;float: left;width: 50%;font-size: 16px;font-family: 'calibri';margin-bottom: 15px;">
         <a href='<?php echo base_url(); ?>' style='color: #000;text-decoration: none;border-bottom: 1px solid #3A93E3;font-weight: bold;'><?php echo base_url(); ?></a>
     </span>
 </div>

</div>
</body>