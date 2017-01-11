<?php if ($is_confirmation != 'disabled'): ?>
    <fieldset>
        <div class="row">
            <div class="col-md-12" style="">
                <span class="inline-group">
                    <label class="radio">Do you need Round Trip?</label>
                    <label class="radio">
                        <input type="radio" name="choose_round_trip" value="1" <?php if ($info['choose_round_trip'] == 1): ?>checked="checked"<?php endif; ?>>
                        <i></i>Yes</label>
                    <label class="radio">
                        <input type="radio" name="choose_round_trip" value="0" <?php if ($info['choose_round_trip'] != 1): ?>checked="checked"<?php endif; ?>>
                        <i></i>No</label>
                </span>
            </div>
        </div>
    </fieldset>
<?php endif; ?>
<fieldset id="has-round-trip" style="display: <?php if ($info['choose_round_trip'] != 1): ?>none<?php else: ?>block<?php endif; ?>;">
    <div class="row">
        <div class="col-md-12 title" style="background-color: <?php echo $title_bg_color; ?>; color: <?php echo $title_tx_color; ?>;">
            Round-Trip Information
        </div>
        <?php $partial='pick_up'; ?>
        <?php $text='Pick-up'; ?>
        <?php $trip='roundtrip'; ?>
        <div class="col-md-6">
            <?php echo $this->render('reservation/_partials/_location/location.htm',$this->mime,get_defined_vars(),0); ?>
        </div>
        <?php $partial='drop_off'; ?>
        <?php $text='Drop-Off'; ?>
        <div class="col-md-6">
            <?php echo $this->render('reservation/_partials/_location/location.htm',$this->mime,get_defined_vars(),0); ?>
        </div>
    </div>
</fieldset>