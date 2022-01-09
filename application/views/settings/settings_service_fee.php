<div class="control-group">
    <h3 class="">Service Fee</h3>
</div>
<div class="control-group">
    <label for="service_fee" class="control-label">Service Fees (%)</label>
    <div class="controls">
        <input type="text"  name="data[service_fee]" id="service_fee" class="input-xlarge" data-rule-required="true" min="0" max="90" value="<?php echo isset($settingData['service_fee']) ? $settingData['service_fee'] : '' ?>">
    </div>
</div>