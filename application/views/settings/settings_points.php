<div class="control-group">
    <h3 class="">Out Of 1000 Points</h3>
</div>

<div class="control-group">
    <h3 class="">Threshold</h3>
</div>
<div class="control-group">
    <label for="initial_points" class="control-label">Initial Points</label>
    <div class="controls">
        <input type="text"  name="data[initial_points]" id="initial_points" class="input-xlarge" data-rule-required="true" data-rule-number="true" min="0" max="999" value="<?php echo isset($settingData['initial_points']) ? $settingData['initial_points'] : '' ?>">
        <span class="help-block">(Provider get this points on registration.)</span>
    </div>
</div>
<div class="control-group">
    <label for="play_for_points" class="control-label">Play For Threshold</label>
    <div class="controls">
        <input type="text"  name="data[play_for_points]" id="play_for_points" class="input-xlarge" data-rule-required="true" data-rule-number="true" min="0" max="999" value="<?php echo isset($settingData['play_for_points']) ? $settingData['play_for_points'] : '' ?>">
        <span class="help-block">(After this points provider is allow for 'PLAY FOR' Option.)</span>
    </div>
</div>
<div class="control-group">
    <label for="accouht_dismiss_points" class="control-label">Account Dismiss Threshold</label>
    <div class="controls">
        <input type="text"  name="data[accouht_dismiss_points]" id="accouht_dismiss_points" class="input-xlarge" data-rule-required="true" data-rule-number="true" min="0" max="999" value="<?php echo isset($settingData['accouht_dismiss_points']) ? $settingData['accouht_dismiss_points'] : '' ?>">
        <span class="help-block">(Provider will not receive new request if the point goes below this number.)</span>
    </div>
</div>


<div class="control-group">
    <h3 class="">Awaiting Customer Support Threshold</h3>
</div>
<div class="control-group">
    <label for="customer_support_threshhold" class="control-label">Awaiting Customer Support Threshold</label>
    <div class="controls">
        <input type="text"  name="data[customer_support_threshhold]" id="customer_support_threshhold" class="input-xlarge" data-rule-required="true" data-rule-number="true" min="0" max="5" value="<?php echo isset($settingData['customer_support_threshhold']) ? $settingData['customer_support_threshhold'] : '' ?>">
        <span class="help-block">(If user give ratings below this threshold the request goes to customer support.)</span>
    </div>
</div>



<div class="control-group">
    <h3 class="">Gain Points</h3>
</div>
<div class="control-group">
    <label for="accepting_request_points" class="control-label">Accepting a Service</label>
    <div class="controls">
        <input type="text"  name="data[accepting_request_points]" id="accepting_request_points" class="input-xlarge" data-rule-required="true" data-rule-number="true" min="0" max="999" value="<?php echo isset($settingData['accepting_request_points']) ? $settingData['accepting_request_points'] : '' ?>">
    </div>
</div>
<div class="row-fluid">
    <div class="span5">
        <div class="control-group">
            <label for="good_rating_points" class="control-label">Receiving a Good Rating</label>
            <div class="controls">
                <input type="text"  name="data[good_rating_points]" id="good_rating_points" class="input-xlarge" data-rule-required="true" data-rule-number="true" min="0" max="999" value="<?php echo isset($settingData['good_rating_points']) ? $settingData['good_rating_points'] : '' ?>">
                <span class="help-block">(If receive more than <?php echo $settingData['good_rating_stars']; ?> ratings.)</span>
            </div>
        </div>
    </div>
    <?php if(false) { ?>
    <div class="span3">
        <div class="control-group">
            <label for="good_rating_stars" class="control-label">Good Rating</label>
            <div class="controls">
                <input type="text"  name="data[good_rating_stars]" id="good_rating_stars" class="input-xlarge" data-rule-required="true" data-rule-number="true" min="0" max="999" value="<?php echo isset($settingData['good_rating_stars']) ? $settingData['good_rating_stars'] : '' ?>">
            </div>
        </div>
    </div>
    <?php } ?>
</div>



<div class="control-group">
    <h3 class="">Lose Points</h3>
</div>
<div class="control-group">
    <label for="decline_service_points" class="control-label">Declining Service</label>
    <div class="controls">
        <input type="text"  name="data[decline_service_points]" id="decline_service_points" class="input-xlarge" data-rule-required="true" data-rule-number="true" min="0" max="999" value="<?php echo isset($settingData['decline_service_points']) ? $settingData['decline_service_points'] : '' ?>">
    </div>
</div>
<div class="control-group">
    <label for="not_complete_service_points" class="control-label">Accepting and then not completing a service</label>
    <div class="controls">
        <input type="text"  name="data[not_complete_service_points]" id="not_complete_service_points" class="input-xlarge" data-rule-required="true" data-rule-number="true" min="0" max="999" value="<?php echo isset($settingData['not_complete_service_points']) ? $settingData['not_complete_service_points'] : '' ?>">
    </div>
</div>
<div class="row-fluid">
    <div class="span5">
        <div class="control-group">
            <label for="bad_rating_points" class="control-label">Receiving Bad Rating</label>
            <div class="controls">
                <input type="text"  name="data[bad_rating_points]" id="bad_rating_points" class="input-xlarge" data-rule-required="true" data-rule-number="true" min="0" max="999" value="<?php echo isset($settingData['bad_rating_points']) ? $settingData['bad_rating_points'] : '' ?>">
                <span class="help-block">(If receive less than <?php echo $settingData['bad_rating_stars']; ?> ratings.)</span>
            </div>
        </div>
    </div>
    <?php if(false) { ?>
    <div class="span3">
        <div class="control-group">
            <label for="bad_rating_stars" class="control-label">Bad Rating</label>
            <div class="controls">
                <input type="text"  name="data[bad_rating_stars]" id="bad_rating_stars" class="input-xlarge" data-rule-required="true" data-rule-number="true" min="0" max="999" value="<?php echo isset($settingData['bad_rating_stars']) ? $settingData['bad_rating_stars'] : '' ?>">
            </div>
        </div>
    </div>
    <?php } ?>
</div>