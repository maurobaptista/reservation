<div class="col-xs-12 title" style="background-color: <?php echo $title_bg_color; ?>; color: <?php echo $title_tx_color; ?>;">
    <?php echo $text; ?> Information
</div>

<section class="col col-xs-12">
    <label for="location[<?php echo $trip; ?>][<?php echo $partial; ?>_location]" class="col-sm-4"><?php echo $text; ?> Location <?php echo $is_required('location|'.$partial.'|location'); ?></label>
    <div class="col-sm-8">
        <label class="select"> 
            <select name="location[<?php echo $trip; ?>][<?php echo $partial; ?>_location]" id="<?php echo $partial; ?>_<?php echo $trip; ?>_location" class="select_location"  <?php echo $is_confirmation; ?>>
                <?php if ($location_not_set != false): ?>
                    <option value=""><?php echo $location_not_set; ?></option>
                <?php endif; ?>
                <?php foreach (($locations?:array()) as $location_id=>$location): ?>
                    <option value="<?php echo $location_id; ?>" <?php if ($info['location'][$trip][$partial.'_location'] == $location_id): ?>selected<?php endif; ?>><?php echo $location; ?></option>
                <?php endforeach; ?>
            </select>
            <i></i>
        </label>
    </div>
</section>
<section id="<?php echo $partial; ?>_<?php echo $trip; ?>_location1" class="<?php echo $partial; ?>_<?php echo $trip; ?>_location_section" style="display: <?php if ($info['location'][$trip][$partial.'_location'] != 1): ?>none<?php else: ?>block<?php endif; ?>;">
    <?php echo $this->render('reservation/_partials/_location/airport.htm',$this->mime,get_defined_vars(),0); ?>
</section>
<section id="<?php echo $partial; ?>_<?php echo $trip; ?>_location2" class="<?php echo $partial; ?>_<?php echo $trip; ?>_location_section" style="display: <?php if ($info['location'][$trip][$partial.'_location'] != 2): ?>none<?php else: ?>block<?php endif; ?>;">
    <?php echo $this->render('reservation/_partials/_location/hotel.htm',$this->mime,get_defined_vars(),0); ?>
</section>
<section id="<?php echo $partial; ?>_<?php echo $trip; ?>_location3" class="<?php echo $partial; ?>_<?php echo $trip; ?>_location_section" style="display: <?php if ($info['location'][$trip][$partial.'_location'] != 3): ?>none<?php else: ?>block<?php endif; ?>;">
    <?php echo $this->render('reservation/_partials/_location/other_location.htm',$this->mime,get_defined_vars(),0); ?>
</section>
<section id="<?php echo $partial; ?>_<?php echo $trip; ?>_location_datetime" class="<?php echo $partial; ?>_<?php echo $trip; ?>_location_section" style="display: <?php if ($info['location'][$trip][$partial.'_location'] != ''): ?>block<?php else: ?>none<?php endif; ?>;">
    <?php if (($partial == 'pick_up')): ?>
        <?php echo $this->render('reservation/_partials/_common/date.htm',$this->mime,get_defined_vars(),0); ?>
        <?php echo $this->render('reservation/_partials/_common/time.htm',$this->mime,get_defined_vars(),0); ?>
    <?php endif; ?>
    <?php echo $this->render('reservation/_partials/_common/special_instructions.htm',$this->mime,get_defined_vars(),0); ?>
</section>