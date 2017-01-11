<?php $hotel_icon='bed'; ?>
<?php $hotel_field='name'; ?>
<?php $hotel_text='Hotel Name'; ?>
<section class="col col-xs-12">
    <label for="location[<?php echo $trip; ?>][<?php echo $partial; ?>_info][hotel_<?php echo $hotel_field; ?>]" class="col-sm-4"><?php echo $hotel_text; ?> <?php echo $is_required('location|'.$partial.'|hotel|'.$hotel_field); ?></label>
    <div class="col-sm-8">
        <label class="input">
            <i class="icon-append fa fa-<?php echo $hotel_icon; ?>"></i>
            <input type="text" name="location[<?php echo $trip; ?>][<?php echo $partial; ?>_info][hotel_<?php echo $hotel_field; ?>]" placeholder="<?php echo $hotel_text; ?>" value="<?php echo $info['location'][$trip][$partial.'_info']['hotel_'.$hotel_field]; ?>" <?php echo $is_confirmation; ?>>
        </label>
    </div>
</section>

<?php $hotel_icon='bed'; ?>
<?php $hotel_field='address'; ?>
<?php $hotel_text='Address'; ?>
<section class="col col-xs-12">
    <label for="location[<?php echo $trip; ?>][<?php echo $partial; ?>_info][hotel_<?php echo $hotel_field; ?>]" class="col-sm-4"><?php echo $hotel_text; ?> <?php echo $is_required('location|'.$partial.'|hotel|'.$hotel_field); ?></label>
    <div class="col-sm-8">
        <label class="input">
            <i class="icon-append fa fa-<?php echo $hotel_icon; ?>"></i>
            <input type="text" name="location[<?php echo $trip; ?>][<?php echo $partial; ?>_info][hotel_<?php echo $hotel_field; ?>]" placeholder="<?php echo $hotel_text; ?>" value="<?php echo $info['location'][$trip][$partial.'_info']['hotel_'.$hotel_field]; ?>" <?php echo $is_confirmation; ?>>
        </label>
    </div>
</section>

<?php $hotel_icon='bed'; ?>
<?php $hotel_field='city'; ?>
<?php $hotel_text='City'; ?>
<section class="col col-xs-12">
    <label for="location[<?php echo $trip; ?>][<?php echo $partial; ?>_info][hotel_<?php echo $hotel_field; ?>]" class="col-sm-4"><?php echo $hotel_text; ?> <?php echo $is_required('location|'.$partial.'|hotel|'.$hotel_field); ?></label>
    <div class="col-sm-8">
        <label class="input">
            <i class="icon-append fa fa-<?php echo $hotel_icon; ?>"></i>
            <input type="text" name="location[<?php echo $trip; ?>][<?php echo $partial; ?>_info][hotel_<?php echo $hotel_field; ?>]" placeholder="<?php echo $hotel_text; ?>" value="<?php echo $info['location'][$trip][$partial.'_info']['hotel_'.$hotel_field]; ?>" <?php echo $is_confirmation; ?>>
        </label>
    </div>
</section>

<?php $hotel_icon='bed'; ?>
<?php $hotel_field='state'; ?>
<?php $hotel_text='State'; ?>
<section class="col col-xs-12">
    <label for="location[<?php echo $trip; ?>][<?php echo $partial; ?>_info][hotel_<?php echo $hotel_field; ?>]" class="col-sm-4"><?php echo $hotel_text; ?> <?php echo $is_required('location|'.$partial.'|hotel|'.$hotel_field); ?></label>
    <div class="col-sm-8">
        <label class="input">
            <i class="icon-append fa fa-<?php echo $hotel_icon; ?>"></i>
            <input type="text" name="location[<?php echo $trip; ?>][<?php echo $partial; ?>_info][hotel_<?php echo $hotel_field; ?>]" placeholder="<?php echo $hotel_text; ?>" value="<?php echo $info['location'][$trip][$partial.'_info']['hotel_'.$hotel_field]; ?>" <?php echo $is_confirmation; ?>>
        </label>
    </div>
</section>

<?php $hotel_icon='bed'; ?>
<?php $hotel_field='zip_code'; ?>
<?php $hotel_text='Zip Code'; ?>
<section class="col col-xs-12">
    <label for="location[<?php echo $trip; ?>][<?php echo $partial; ?>_info][hotel_<?php echo $hotel_field; ?>]" class="col-sm-4"><?php echo $hotel_text; ?> <?php echo $is_required('location|'.$partial.'|hotel|'.$hotel_field); ?></label>
    <div class="col-sm-8">
        <label class="input">
            <i class="icon-append fa fa-<?php echo $hotel_icon; ?>"></i>
            <input type="text" name="location[<?php echo $trip; ?>][<?php echo $partial; ?>_info][hotel_<?php echo $hotel_field; ?>]" placeholder="<?php echo $hotel_text; ?>" value="<?php echo $info['location'][$trip][$partial.'_info']['hotel_'.$hotel_field]; ?>" <?php echo $is_confirmation; ?>>
        </label>
    </div>
</section>

<?php if (($partial == 'pick_up')): ?>
    <?php $hotel_icon='bed'; ?>
    <?php $hotel_field='room'; ?>
    <?php $hotel_text='Room Number'; ?>
    <section class="col col-xs-12">
        <label for="location[<?php echo $trip; ?>][<?php echo $partial; ?>_info][hotel_<?php echo $hotel_field; ?>]" class="col-sm-4"><?php echo $hotel_text; ?> <?php echo $is_required('location|'.$partial.'|hotel|'.$hotel_field); ?></label>
        <div class="col-sm-8">
            <label class="input">
                <i class="icon-append fa fa-<?php echo $hotel_icon; ?>"></i>
                <input type="text" name="location[<?php echo $trip; ?>][<?php echo $partial; ?>_info][hotel_<?php echo $hotel_field; ?>]" placeholder="<?php echo $hotel_text; ?>" value="<?php echo $info['location'][$trip][$partial.'_info']['hotel_'.$hotel_field]; ?>" <?php echo $is_confirmation; ?>>
            </label>
        </div>
    </section>
<?php endif; ?>