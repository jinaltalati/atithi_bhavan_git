<div class="control-group">
    <label for="time_to_reply" class="control-label">Time To Reply</label>
    <div class="controls">
        <input type="number" min="10" name="data[time_to_reply]" id="time_to_reply" class="input-xlarge" data-rule-required="true" value="<?php echo isset($settingData['time_to_reply']) ? $settingData['time_to_reply'] : '' ?>">
        <span class="help-block">(Time in Seconds)</span>
    </div>
</div>


<!--<div class="control-group">
    <label for="provider_online_time" class="control-label">Provider Online Time</label>
    <div class="controls">
        <input type="number" min="10" name="data[provider_online_time]" id="provider_online_time" class="input-xlarge" data-rule-required="true" value="<?php echo isset($settingData['provider_online_time']) ? $settingData['provider_online_time'] : '' ?>">
        <span class="help-block">(Time in Hours)</span>
    </div>
</div>-->

<?php if(false) {?>
<div class="control-group">
    <label class="control-label">SMS Notification</label>
    <div class="controls">
        <label class='radio'>
            <input type="radio" name="data[sms_notification]"  value="on" <?php if ($settingData['sms_notification'] == 'on') echo 'checked="checked" '; ?>>  On
        </label>
        <label class='radio'>
            <input type="radio" name="data[sms_notification]"  value="off" <?php if ($settingData['sms_notification'] == 'off') echo 'checked="checked" '; ?>> Off
        </label>
    </div>
</div> 
<?php } ?>

<div class="control-group">
    <label class="control-label">Email Notification</label>
    <div class="controls">
        <label class='radio'>
            <input type="radio" name="data[email_notification]"  value="on" <?php if ($settingData['email_notification'] == 'on') echo 'checked="checked" '; ?>>  On
        </label>
        <label class='radio'>
            <input type="radio" name="data[email_notification]"  value="off" <?php if ($settingData['email_notification'] == 'off') echo 'checked="checked" '; ?>> Off
        </label>
    </div>
</div> 

<div class="control-group">
    <label for="service_fee" class="control-label">Service Fees (%)</label>
    <div class="controls">
        <input type="text"  name="data[service_fee]" id="service_fee" class="input-xlarge" data-rule-required="true" min="0" max="90" value="<?php echo isset($settingData['service_fee']) ? $settingData['service_fee'] : '' ?>">
    </div>
</div>

<div class="control-group">
    <label for="dispute_hours" class="control-label">Dispute Hours</label>
    <div class="controls">
        <input type="text"  name="data[dispute_hours]" id="dispute_hours" class="input-xlarge" data-rule-required="true" min="0" max="2000" value="<?php echo isset($settingData['dispute_hours']) ? $settingData['dispute_hours'] : '' ?>">
        <span class="help-block">(Provide/User can raise their dispute up to this hours after request is accepted)</span>
    </div>
</div>