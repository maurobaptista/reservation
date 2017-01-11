<?php $other_icon='map-marker'; ?>
<?php $other_field='address'; ?>
<?php $other_text='Address'; ?>
<section class="col col-xs-12">
    <label for="location[<?php echo $trip; ?>][<?php echo $partial; ?>_info][other_<?php echo $other_field; ?>]" class="col-sm-4"><?php echo $other_text; ?> <?php echo $is_required('location|'.$partial.'|other|'.$other_field); ?></label>
    <div class="col-sm-8">
        <label class="input">
            <i class="icon-append fa fa-<?php echo $other_icon; ?>"></i>
            <input type="text" name="location[<?php echo $trip; ?>][<?php echo $partial; ?>_info][other_<?php echo $other_field; ?>]" placeholder="<?php echo $other_text; ?>" value="<?php echo $info['location'][$trip][$partial.'_info']['other_'.$other_field]; ?>" <?php echo $is_confirmation; ?>>
        </label>
    </div>
</section>

<?php $other_icon='map-marker'; ?>
<?php $other_field='apt'; ?>
<?php $other_text='Apt/Suite'; ?>
<section class="col col-xs-12">
    <label for="location[<?php echo $trip; ?>][<?php echo $partial; ?>_info][other_<?php echo $other_field; ?>]" class="col-sm-4"><?php echo $other_text; ?> <?php echo $is_required('location|'.$partial.'|other|'.$other_field); ?></label>
    <div class="col-sm-8">
        <label class="input">
            <i class="icon-append fa fa-<?php echo $other_icon; ?>"></i>
            <input type="text" name="location[<?php echo $trip; ?>][<?php echo $partial; ?>_info][other_<?php echo $other_field; ?>]" placeholder="<?php echo $other_text; ?>" value="<?php echo $info['location'][$trip][$partial.'_info']['other_'.$other_field]; ?>" <?php echo $is_confirmation; ?>>
        </label>
    </div>
</section>

<?php $other_icon='map-marker'; ?>
<?php $other_field='city'; ?>
<?php $other_text='City'; ?>
<section class="col col-xs-12">
    <label for="location[<?php echo $trip; ?>][<?php echo $partial; ?>_info][other_<?php echo $other_field; ?>]" class="col-sm-4"><?php echo $other_text; ?> <?php echo $is_required('location|'.$partial.'|other|'.$other_field); ?></label>
    <div class="col-sm-8">
        <label class="input">
            <i class="icon-append fa fa-<?php echo $other_icon; ?>"></i>
            <input type="text" name="location[<?php echo $trip; ?>][<?php echo $partial; ?>_info][other_<?php echo $other_field; ?>]" placeholder="<?php echo $other_text; ?>" value="<?php echo $info['location'][$trip][$partial.'_info']['other_'.$other_field]; ?>" <?php echo $is_confirmation; ?>>
        </label>
    </div>
</section>

<?php $other_icon='map-marker'; ?>
<?php $other_field='state'; ?>
<?php $other_text='State'; ?>
<section class="col col-xs-12">
    <label for="location[<?php echo $trip; ?>][<?php echo $partial; ?>_info][other_<?php echo $other_field; ?>]" class="col-sm-4"><?php echo $other_text; ?> <?php echo $is_required('location|'.$partial.'|other|'.$other_field); ?></label>
    <div class="col-sm-8">
        <label class="input">
            <i class="icon-append fa fa-<?php echo $other_icon; ?>"></i>
            <input type="text" name="location[<?php echo $trip; ?>][<?php echo $partial; ?>_info][other_<?php echo $other_field; ?>]" placeholder="<?php echo $other_text; ?>" value="<?php echo $info['location'][$trip][$partial.'_info']['other_'.$other_field]; ?>" <?php echo $is_confirmation; ?>>
        </label>
    </div>
</section>

<?php $other_icon='map-marker'; ?>
<?php $other_field='zip_code'; ?>
<?php $other_text='Zip Code'; ?>
<section class="col col-xs-12">
    <label for="location[<?php echo $trip; ?>][<?php echo $partial; ?>_info][other_<?php echo $other_field; ?>]" class="col-sm-4"><?php echo $other_text; ?> <?php echo $is_required('location|'.$partial.'|other|'.$other_field); ?></label>
    <div class="col-sm-8">
        <label class="input">
            <i class="icon-append fa fa-<?php echo $other_icon; ?>"></i>
            <input type="text" name="location[<?php echo $trip; ?>][<?php echo $partial; ?>_info][other_<?php echo $other_field; ?>]" placeholder="<?php echo $other_text; ?>" value="<?php echo $info['location'][$trip][$partial.'_info']['other_'.$other_field]; ?>" <?php echo $is_confirmation; ?>>
        </label>
    </div>
</section>