<div class="control-group">
    <h3 class="">Twilio Settings</h3>
</div>
<div class="control-group">
    <label for="twilio_account_sid" class="control-label">Account Sid</label>
    <div class="controls">
        <input type="text"  name="data[twilio_account_sid]" id="twilio_account_sid" class="input-xlarge" data-rule-required="true" value="<?php echo isset($settingData['twilio_account_sid']) ? $settingData['twilio_account_sid'] : '' ?>">
    </div>
</div>
<div class="control-group">
    <label for="twilio_auth_token" class="control-label">Authorization Token</label>
    <div class="controls">
        <input type="text"  name="data[twilio_auth_token]" id="twilio_auth_token" class="input-xlarge" data-rule-required="true" value="<?php echo isset($settingData['twilio_auth_token']) ? $settingData['twilio_auth_token'] : '' ?>">
    </div>
</div>
<div class="control-group">
    <label for="twilio_sender" class="control-label">Twilio Sender</label>
    <div class="controls">
        <input type="text"  name="data[twilio_sender]" id="twilio_sender" class="input-xlarge" data-rule-required="true" value="<?php echo isset($settingData['twilio_sender']) ? $settingData['twilio_sender'] : '' ?>">
    </div>
</div>