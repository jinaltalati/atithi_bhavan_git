<?php error_reporting(0); ?>
<script src="<?php echo base_url(); ?>assets/js/plugins/fileupload/bootstrap-fileupload.min.js"></script>
<div class="row-fluid">
    <div class="span12">
        <div class="box box-color box-bordered">
            <div class="box-title">
                <h3><i class="glyphicon-settings"></i> Settings</h3>
            </div>
            <div class="box-content">
                <?php
                $frmType = "form-horizontal";
//                if ($this->uri->segment(2) == 'points')
//                {
//                    $frmType = "form-vertical";
//                }
                ?>
                <form action="" method="POST" class='<?php echo $frmType; ?> form-validate' id='form-setting' enctype="multipart/form-data">

                    <?php
                        $data['listTimeZones'] = $listTimeZone;
                        $data['settingData'] = $setting;
                        $data['attributeData'] = $attribute;
                        
                        if ($this->uri->segment(2) == 'stripe')
                        {
                            $this->load->view('settings/settings_stripe.php', $data);
                        }
                        else if ($this->uri->segment(2) == 'twilio')
                        {
                            $this->load->view('settings/settings_twilio.php', $data);
                        }
                        else if ($this->uri->segment(2) == 'provider_online')
                        {
                            $this->load->view('settings/settings_provider_online.php', $data);
                        }
                        else if ($this->uri->segment(2) == 'paypal')
                        {
                            $this->load->view('settings/settings_paypal.php', $data);
                        }
                        else if ($this->uri->segment(2) == 'fees')
                        {
                            $this->load->view('settings/settings_service_fee.php', $data);
                        }
                        else if ($this->uri->segment(2) == 'points')
                        {
                            $this->load->view('settings/settings_points.php', $data);
                        }
                        else
                        {
                            $this->load->view('settings/settings_general.php', $data);
                        }
                    ?>
                    <div class="form-actions">
                        <button type="submit" name="submit" value="submit" id="site_settings" class="btn btn-primary">Save settings</button>
                        <button type="reset" class="btn">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>   