<section class="col col-xs-12">
    <label for="location[<?php echo $trip; ?>][<?php echo $partial; ?>_date]" class="col-sm-4"><?php echo $text; ?> Date <?php echo $is_required('location|'.$partial.'|date'); ?></label>
    <div class="col-sm-8">
        <label class="input">
            <i class="icon-append fa fa-calendar"></i>
            <input type="text" name="location[<?php echo $trip; ?>][<?php echo $partial; ?>_date]" placeholder="<?php echo $text; ?> Date" value="<?php echo $info['location'][$trip][$partial.'_date']; ?>" id="<?php echo $trip; ?>_<?php echo $partial; ?>_date" <?php echo $is_confirmation; ?>>
        </label>
    </div>
</section>