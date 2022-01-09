
<div class="control-group">
    <label for="site_title" class="control-label">Site Title</label>
    <div class="controls">
        <input type="text" name="data[site_title]" id="sit_title" class="input-xlarge" data-rule-required="true" value="<?php echo isset($settingData['site_title']) ? $settingData['site_title'] : '' ?>">
    </div>
</div>
<div class="control-group">
    <label for="admin_email" class="control-label">E-mail Address </label>
    <div class="controls">
        <input type="text" name="data[admin_email]" id="admin_email" class="input-xlarge" data-rule-required="true" data-rule-email="true" value="<?php echo isset($settingData['admin_email']) ? $settingData['admin_email'] : '' ?>">
    </div>
</div>
<div class="control-group">
    <label for="time_zone" class="control-label">Timezone </label>
    <div class="controls">
        <?php
            echo genGroupCombo($listTimeZones, '', '', 'data[time_zone]', 'time_zone', 'class="input-large" data-rule-required="true"',$settingData['time_zone']); 
        ?>
    </div>
</div>
<div class="control-group">
    <label class="control-label">Date Format</label>
    <div class="controls">
        <label class='radio'>
            <input type="radio" name="data[date_format]" value="F j, Y" <?php if ($settingData['date_format'] == 'F j, Y') echo 'checked="checked" '; ?> > <?php echo date('F j, Y'); ?>
        </label>
        <label class='radio'>
            <input type="radio" name="data[date_format]" value="Y/m/d" <?php if ($settingData['date_format'] == 'Y/m/d') echo 'checked="checked" '; ?> > <?php echo date('Y/m/d'); ?>
        </label>
        <label class='radio'>
            <input type="radio" name="data[date_format]" value="m/d/Y" <?php if ($settingData['date_format'] == 'm/d/Y') echo 'checked="checked" '; ?> > <?php echo date('m/d/Y'); ?>
        </label>
        <label class='radio'>
            <input type="radio" name="data[date_format]" value="d/m/Y" <?php if ($settingData['date_format'] == 'd/m/Y') echo 'checked="checked" '; ?> > <?php echo date('d/m/Y'); ?>
        </label>
    </div>
</div>
<div class="control-group">
    <label class="control-label">Time Format</label>
    <div class="controls">
        <label class='radio'>
            <input type="radio" name="data[time_format]" value="g:i a" <?php if ($settingData['time_format'] == 'g:i a') echo 'checked="checked" '; ?> > <?php echo date('g:i a'); ?>
        </label>
        <label class='radio'>
            <input type="radio" name="data[time_format]" value="g:i A" <?php if ($settingData['time_format'] == 'g:i A') echo 'checked="checked" '; ?> > <?php echo date('g:i A'); ?>
        </label>
        <label class='radio'>
            <input type="radio" name="data[time_format]" value="H:i" <?php if ($settingData['time_format'] == 'H:i') echo 'checked="checked" '; ?> > <?php echo date('H:i'); ?>
        </label>
    </div>
</div>  
<div class="control-group">
    <label for="max_login_attempts" class="control-label">Login Attempts</label>
    <div class="controls">
        <select id="max_login_attempts" name="data[max_login_attempts]" class="input-large" data-rule-required="true">
            <option value="">Select</option>
            <option value="1" <?php echo ($settingData['max_login_attempts'] == '1') ? 'selected="selected" ' : '' ; ?> >1</option>
            <option value="2" <?php echo ($settingData['max_login_attempts'] == '2') ? 'selected="selected" ' : '' ; ?> >2</option>
            <option value="3" <?php echo ($settingData['max_login_attempts'] == '3') ? 'selected="selected" ' : '' ; ?> >3</option>
            <option value="4" <?php echo ($settingData['max_login_attempts'] == '4') ? 'selected="selected" ' : '' ; ?> >4</option>
            <option value="5" <?php echo ($settingData['max_login_attempts'] == '5') ? 'selected="selected" ' : '' ; ?> >5</option>
        </select>
        <span class="help-block">Maximum number of login attempts.</span>
    </div>
</div>
<div class="control-group">
    <label for="logo_large" class="control-label">Logo (Large)</label>
    <div class="controls">
        <div class="fileupload fileupload-new" data-provides="fileupload">
            <div class="fileupload-new thumbnail"><img src="<?php echo base_url(); ?>assets/files/default/<?php echo $settingData['logo_large']; ?>" /></div>
            <?php
                if ($this->session->userdata('setting_logo_large'))
                {
                    echo '<div class="thumbnail" style="border-color:#ff0000; max-width: 200px; max-height: 150px; line-height: 20px;">' . $this->session->userdata('setting_logo_large') . '</div>';
                    $this->session->unset_userdata('setting_logo_large');
                }
            ?>
            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
            <div>
                <span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                    <input type="file" accept="image/*"  name="logo_large" id="logo_large"/></span>
                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                <span class="help-block">Recommended size: (<?php echo $attributeData['logo_large']->width . "px X " . $attributeData['logo_large']->height . "px"; ?>)</span>
            </div>
        </div>
    </div>
</div>
<div class="control-group">
    <label for="logo_large_2x" class="control-label">Logo (Large X 2x)</label>
    <div class="controls">
        <div class="fileupload fileupload-new" data-provides="fileupload">
            <div class="fileupload-new thumbnail"><img src="<?php echo base_url(); ?>assets/files/default/<?php echo $settingData['logo_large_2x']; ?>" />
            </div>
            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
            <?php
                if ($this->session->userdata('setting_logo_large_2x'))
                {
                    echo '<div class="thumbnail" style="border-color:#ff0000; max-width: 200px; max-height: 150px; line-height: 20px;">' . $this->session->userdata('setting_logo_large_2x') . '</div>';
                    $this->session->unset_userdata('setting_logo_large_2x');
                }
            ?>
            <div>
                <span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                    <input type="file" accept="image/*"  name="logo_large_2x" id="logo_large_2x" />
                </span>
                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                <span class="help-block">Recommended size: (<?php echo $attributeData['logo_large_2x']->width . "px X " . $attributeData['logo_large_2x']->height . "px"; ?>)</span>
            </div>
        </div>
    </div>
</div>
<div class="control-group">
    <label for="logo_small" class="control-label">Logo (small)</label>
    <div class="controls">
        <div class="fileupload fileupload-new" data-provides="fileupload">
            <div class="fileupload-new thumbnail"><img src="<?php echo base_url(); ?>assets/files/default/<?php echo $settingData['logo_small']; ?>" /></div>
            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
            <?php
                if ($this->session->userdata('setting_logo_small'))
                {
                    echo '<div class="thumbnail" style="border-color:#ff0000; max-width: 200px; max-height: 150px; line-height: 20px;">' . $this->session->userdata('setting_logo_small') . '</div>';
                    $this->session->unset_userdata('setting_logo_small');
                }
            ?>
            <div>
                <span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                    <input type="file" accept="image/*" name="logo_small" id="logo_small" /></span>
                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                <span class="help-block">Recommended size: (<?php echo $attributeData['logo_small']->width . "px X " . $attributeData['logo_small']->height . "px"; ?>)</span>
            </div>
        </div>
    </div>
</div>
<div class="control-group">
    <label for="logo_small_2x" class="control-label">Logo (small X 2x)</label>
    <div class="controls">
        <div class="fileupload fileupload-new" data-provides="fileupload">
            <div class="fileupload-new thumbnail"><img src="<?php echo base_url(); ?>assets/files/default/<?php echo $settingData['logo_small_2x']; ?>" /></div>
            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
            <?php
                if ($this->session->userdata('setting_logo_small_2x'))
                {
                    echo '<div class="thumbnail" style="border-color:#ff0000; max-width: 200px; max-height: 150px; line-height: 20px;">' . $this->session->userdata('setting_logo_small_2x') . '</div>';
                    $this->session->unset_userdata('setting_logo_small_2x');
                }
            ?>
            <div>
                <span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                    <input type="file" accept="image/*" name="logo_small_2x" id="logo_small_2x" /></span>
                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                <span class="help-block">Recommended size: (<?php echo $attributeData['logo_small_2x']->width . "px X " . $attributeData['logo_small_2x']->height . "px"; ?>)</span>
            </div>
        </div>
    </div>
</div>
<div class="control-group">
    <label for="apple_touch_icon" class="control-label">Apple Touch Icon</label>
    <div class="controls">
        <div class="fileupload fileupload-new" data-provides="fileupload">
            <div class="fileupload-new thumbnail"><img src="<?php echo base_url(); ?>assets/files/default/<?php echo $settingData['apple_touch_icon']; ?>" /></div>
            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
             <?php
                if ($this->session->userdata('setting_apple_touch_icon'))
                {
                    echo '<div class="thumbnail" style="border-color:#ff0000; max-width: 200px; max-height: 150px; line-height: 20px;">' . $this->session->userdata('setting_apple_touch_icon') . '</div>';
                    $this->session->unset_userdata('setting_apple_touch_icon');
                }
            ?>
            <div>
                <span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                    <input type="file" accept="image/*" name="apple_touch_icon" id="apple_touch_icon" /></span>
                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                <span class="help-block">Recommended size: (<?php echo $attributeData['apple_touch_icon']->width . "px X " . $attributeData['apple_touch_icon']->height . "px"; ?>)</span>
            </div>
        </div>
    </div>
</div>
<div class="control-group">
    <label for="favicon" class="control-label">Favicon</label>
    <div class="controls">
        <div class="fileupload fileupload-new" data-provides="fileupload">
            <div class="fileupload-new thumbnail"><img src="<?php echo base_url(); ?>assets/files/default/<?php echo $settingData['favicon']; ?>" /></div>
            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
            <?php
                if ($this->session->userdata('setting_favicon'))
                {
                    echo '<div class="thumbnail" style="border-color:#ff0000; max-width: 200px; max-height: 150px; line-height: 20px;">' . $this->session->userdata('setting_favicon') . '</div>';
                    $this->session->unset_userdata('setting_favicon');
                }
            ?>
            <div>
                <span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                    <input type="file" accept="image/*" name="favicon" id="favicon" /></span>
                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                <span class="help-block">Recommended size: (<?php echo $attributeData['favicon']->width . "px X " . $attributeData['favicon']->height . "px"; ?>)</span>
            </div>
        </div>
    </div>
</div>
  
