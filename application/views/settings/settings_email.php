<div class="control-group">
    <label for="smtp_mail_server" class="control-label">Mail Server</label>
    <div class="controls">
        <input type="text" name="data[smtp_mail_server]" id="smtp_mail_server" class="input-xlarge" data-rule-required="true"  value="<?php echo $settingData['smtp_mail_server']; ?>">
    </div>
</div>
<div class="control-group">
    <label for="smtp_email" class="control-label">Login Name</label>
    <div class="controls">
        <input type="text" name="data[smtp_email]" id="smtp_email" class="input-xlarge" data-rule-required="true" data-rule-email="true"  value="<?php echo $settingData['smtp_email']; ?>">
    </div>
</div>                             
<div class="control-group">
    <label for="smtp_email_password" class="control-label">Password</label>
    <div class="controls">
        <input type="password" name="data[smtp_email_password]" id="smtp_email_password" placeholder="*********" data-rule-required="true"  class="input-xlarge"  value="<?php echo $settingData['smtp_email_password']; ?>">
    </div>
</div>
<div class="control-group">
    <label class="control-label">E-mail me whenever</label>
    <div class="controls">
        <?php
        $objEmailMe = json_decode($settingData['email_me_when']);
        
        foreach ($attributeData['email_me_when'] as $key => $value)
        {
            ?>
            <label class='checkbox'>
                <input type="checkbox" name="data[email_me_when][<?php echo $key; ?>]" value="1" <?php if (isset($objEmailMe->$key) && $objEmailMe->$key == "1")
        {
            echo "checked='checked'";
        } ?> ><?php echo $value; ?>
            </label>
    <?php
}
?>
    </div>
</div>
<div class="control-group">
    <label for="email_logo" class="control-label">Email Logo</label>
    <div class="controls">
        <div class="fileupload fileupload-new" data-provides="fileupload">
            <div class="fileupload-new thumbnail"><img src="<?php echo base_url(); ?>assets/files/default/<?php echo $settingData['email_logo']; ?>" /></div>
            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
            <?php
            if (isset($_SESSION['setting']['email_logo']))
            {
                echo '<div class="thumbnail" style="border-color:#ff0000; max-width: 200px; max-height: 150px; line-height: 20px;">' . $_SESSION['setting']['email_logo'] . '</div>';
                unset($_SESSION['setting']['email_logo']);
            }
            ?>
            <div>
                <span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                    <input type="file" accept="image/*"  name="email_logo" id="email_logo" /></span>
                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                <span class="help-block">Recommended size: (<?php echo $attributeData['email_logo']->width . "px X " . $attributeData['email_logo']->height . "px"; ?>)</span>
            </div>
        </div>
    </div>
</div>


