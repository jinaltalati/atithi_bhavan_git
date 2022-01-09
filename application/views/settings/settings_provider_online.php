<div class="control-group">
    <label for="provider_online_time" class="control-label">Provider Online Time</label>
    <div class="controls">
        <input type="number" min="1" name="data[provider_online_time]" id="provider_online_time" class="input-xlarge" data-rule-required="true" value="<?php echo isset($settingData['provider_online_time']) ? $settingData['provider_online_time'] : '' ?>">
        <span class="help-block">(Time in Hours)</span>
    </div>
</div>
<div class="control-group">
    <label for="provider_online_notification" class="control-label">Provider Online Notification</label>
    <div class="controls">
        <textarea name="data[provider_online_notification]" id="provider_online_notification" class="input-xlarge" data-rule-required="true"><?php echo isset($settingData['provider_online_notification']) ? $settingData['provider_online_notification'] : '' ?></textarea>
        <span class="help-block">(On request provider will get this message)</span>
    </div>
</div>