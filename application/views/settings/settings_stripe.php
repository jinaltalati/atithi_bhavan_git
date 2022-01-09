<div class="control-group">
    <label class="control-label">Select Stripe Mode</label>
    <div class="controls">
        <label class='radio'>
            <input type="radio" name="data[stripe_mode]"  value="sandbox" <?php if ($settingData['stripe_mode'] == 'sandbox') echo 'checked="checked" '; ?>>  Sandbox
        </label>
        <label class='radio'>
            <input type="radio" name="data[stripe_mode]"  value="live" <?php if ($settingData['stripe_mode'] == 'live') echo 'checked="checked" '; ?>> Live
        </label>

    </div>
</div> 

<div class="control-group">
    <h3 class="">Sandbox Stripe Detail</h3>
</div>
<div class="control-group">
    <label for="sandbox_stripe_secret" class="control-label">Stripe Secret key</label>
    <div class="controls">
        <input type="text"  name="data[sandbox_stripe_secret]" id="sandbox_stripe_secret" class="input-xxlarge" data-rule-required="true" value="<?php echo isset($settingData['sandbox_stripe_secret']) ? $settingData['sandbox_stripe_secret'] : '' ?>">
    </div>
</div>
<div class="control-group">
    <label for="sandbox_stripe_pk" class="control-label">Stripe PK key</label>
    <div class="controls">
        <input type="text"  name="data[sandbox_stripe_pk]" id="sandbox_stripe_pk" class="input-xxlarge" data-rule-required="true" value="<?php echo isset($settingData['sandbox_stripe_pk']) ? $settingData['sandbox_stripe_pk'] : '' ?>">
    </div>
</div>
<div class="control-group">
    <label for="sandbox_stripe_client_id" class="control-label">Stripe Client Id</label>
    <div class="controls">
        <input type="text"  name="data[sandbox_stripe_client_id]" id="sandbox_stripe_client_id" class="input-xxlarge" data-rule-required="true" value="<?php echo isset($settingData['sandbox_stripe_client_id']) ? $settingData['sandbox_stripe_client_id'] : '' ?>">
    </div>
</div>

<div class="control-group">
    <h3 class="">Live Stripe Detail</h3>
</div>
<div class="control-group">
    <label for="live_stripe_secret" class="control-label">Stripe Secret key</label>
    <div class="controls">
        <input type="text"  name="data[live_stripe_secret]" id="live_stripe_secret" class="input-xxlarge" data-rule-required="true" value="<?php echo isset($settingData['live_stripe_secret']) ? $settingData['live_stripe_secret'] : '' ?>">
    </div>
</div>
<div class="control-group">
    <label for="live_stripe_pk" class="control-label">Stripe PK key</label>
    <div class="controls">
        <input type="text"  name="data[live_stripe_pk]" id="live_stripe_pk" class="input-xxlarge" data-rule-required="true" value="<?php echo isset($settingData['live_stripe_pk']) ? $settingData['live_stripe_pk'] : '' ?>">
    </div>
</div>
<div class="control-group">
    <label for="live_stripe_client_id" class="control-label">Stripe Client Id</label>
    <div class="controls">
        <input type="text"  name="data[live_stripe_client_id]" id="live_stripe_client_id" class="input-xxlarge" data-rule-required="true" value="<?php echo isset($settingData['live_stripe_client_id']) ? $settingData['live_stripe_client_id'] : '' ?>">
    </div>
</div>