<section class="col col-xs-12">
    <label for="location[<?php echo $trip; ?>][<?php echo $partial; ?>_instructions]" class="col-sm-4">Special Instructions <?php echo $is_required('location|'.$partial.'|instructions'); ?></label>
    <div class="col-sm-8">
        <label class="textarea">
            <textarea rows="3" name="location[<?php echo $trip; ?>][<?php echo $partial; ?>_instructions]" placeholder="Special Instructions" <?php echo $is_confirmation; ?>><?php echo $info['location'][$trip][$partial.'_instructions']; ?></textarea>
        </label>
    </div>
</section>