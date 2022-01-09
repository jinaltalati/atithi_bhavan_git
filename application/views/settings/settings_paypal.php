<div class="control-group">
    <label class="control-label">Select Paypal Mode</label>
    <div class="controls">
        <label class='radio'>
            <input type="radio" name="data[paypal_mode]"  value="sandbox" <?php if ($settingData['paypal_mode'] == 'sandbox') echo 'checked="checked" '; ?>>  Sandbox
        </label>
        <label class='radio'>
            <input type="radio" name="data[paypal_mode]"  value="live" <?php if ($settingData['paypal_mode'] == 'live') echo 'checked="checked" '; ?>> Live
        </label>

    </div>
</div> 

<div class="control-group">
    <h3 class="">Sandbox Paypal Detail</h3>
</div>
<div class="control-group">
    <label for="sandbox_paypal_client_id" class="control-label">Paypal Client Id</label>
    <div class="controls">
        <input type="text"  name="data[sandbox_paypal_client_id]" id="sandbox_paypal_client_id" class="input-xxlarge" data-rule-required="true" value="<?php echo isset($settingData['sandbox_paypal_client_id']) ? $settingData['sandbox_paypal_client_id'] : '' ?>">
    </div>
</div>
<div class="control-group">
    <label for="sandbox_paypal_secret" class="control-label">Paypal Secret key</label>
    <div class="controls">
        <input type="text"  name="data[sandbox_paypal_secret]" id="sandbox_paypal_secret" class="input-xxlarge" data-rule-required="true" value="<?php echo isset($settingData['sandbox_paypal_secret']) ? $settingData['sandbox_paypal_secret'] : '' ?>">
    </div>
</div>
<div class="control-group">
    <h3 class="">Live Paypal Detail</h3>
</div>
<div class="control-group">
    <label for="live_paypal_client_id" class="control-label">Paypal Client Id</label>
    <div class="controls">
        <input type="text"  name="data[live_paypal_client_id]" id="live_paypal_client_id" class="input-xxlarge" data-rule-required="true" value="<?php echo isset($settingData['live_paypal_client_id']) ? $settingData['live_paypal_client_id'] : '' ?>">
    </div>
</div>
<div class="control-group">
    <label for="live_paypal_secret" class="control-label">Paypal Secret key</label>
    <div class="controls">
        <input type="text"  name="data[live_paypal_secret]" id="live_paypal_secret" class="input-xxlarge" data-rule-required="true" value="<?php echo isset($settingData['live_paypal_secret']) ? $settingData['live_paypal_secret'] : '' ?>">
    </div>
</div>