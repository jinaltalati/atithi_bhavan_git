
<div class="control-group">
    <label class="control-label">Site Status</label>
    <div class="controls">
        <label class='radio'>
            <input type="radio" name="data[site_status]"  value="live" <?php if ($settingData['site_status'] == 'live') echo 'checked="checked" '; ?>> Live
        </label>
        <label class='radio'>
            <input type="radio" name="data[site_status]"  value="maintenance" <?php if ($settingData['site_status'] == 'maintenance') echo 'checked="checked" '; ?>> Under Maintenance
        </label>
        <label class='radio'>
            <input type="radio" name="data[site_status]"  value="development" <?php if ($settingData['site_status'] == 'development') echo 'checked="checked" '; ?>> Under Development
        </label>
    </div>
</div>   

<div class="control-group">
    <label for="dafault_avtar" class="control-label">Default Avtar</label>
    <div class="controls">
        <div class="fileupload fileupload-new" data-provides="fileupload">
            <div class="fileupload-new thumbnail"><img src="<?php echo base_url(); ?>assets/files/default/<?php echo $settingData['dafault_avtar']; ?>" /></div>
            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
            <?php
                if ($this->session->userdata('setting_dafault_avtar'))
                {
                    echo '<div class="thumbnail" style="border-color:#ff0000; max-width: 200px; max-height: 150px; line-height: 20px;">' . $this->session->userdata('setting_dafault_avtar') . '</div>';
                    $this->session->unset_userdata('setting_dafault_avtar');
                }
            ?>
            <div>
                <span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                    <input type="file" accept="image/*" name="dafault_avtar" id="dafault_avtar" /></span>
                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                <span class="help-block">Recommended size: (<?php echo $attributeData['dafault_avtar']->width . "px X " . $attributeData['dafault_avtar']->height . "px"; ?>)</span>
            </div>
        </div>
    </div>
</div>