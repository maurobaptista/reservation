<section class="col col-xs-12">
    <label for="location[<?php echo $trip; ?>][<?php echo $partial; ?>_time]" class="col-sm-4"><?php echo $text; ?> Time <?php echo $is_required('location|'.$partial.'|time'); ?></label>
    <div class="col-sm-8">
        <label class="input">
            <i class="icon-append fa fa-clock-o"></i>
            <input type="text" name="location[<?php echo $trip; ?>][<?php echo $partial; ?>_time]" placeholder="<?php echo $text; ?> Time" value="<?php echo $info['location'][$trip][$partial.'_time']; ?>" id="<?php echo $trip; ?>_<?php echo $partial; ?>_time" <?php echo $is_confirmation; ?>>
        </label>
    </div>
</section>