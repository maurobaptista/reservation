<section class="col col-xs-12">
    <label for="location[<?php echo $trip; ?>][<?php echo $partial; ?>_info][airport_select]" class="col-sm-4">Airport <?php echo $is_required('location|'.$partial.'|airport|select'); ?></label>
    <div class="col-sm-8">
        <label class="select"> 
            <select name="location[<?php echo $trip; ?>][<?php echo $partial; ?>_info][airport_select]" class="select_location" <?php echo $is_confirmation; ?>>
                <?php if (($airport_not_set != false)): ?>
                    <option value=""><?php echo $airport_not_set; ?></option>
                <?php endif; ?>
                <?php foreach (($airports?:array()) as $airport): ?>
                    <option value="<?php echo $airport; ?>" <?php if (($airport == $info['location'][$trip][$partial.'_info']['airport_select'])): ?>selected<?php endif; ?>><?php echo $airport; ?></option>
                <?php endforeach; ?>
            </select>
            <i></i>
        </label>
    </div>
</section>


<?php $airport_icon='plane'; ?>
<?php $airport_field='airline'; ?>
<?php $airport_text='Airline Company'; ?>
<section class="col col-xs-12">
    <label for="location[<?php echo $trip; ?>][<?php echo $partial; ?>_info][airport_<?php echo $airport_field; ?>]" class="col-sm-4"><?php echo $airport_text; ?> <?php echo $is_required('location|'.$partial.'|airport|'.$airport_field); ?></label>
    <div class="col-sm-8">
        <label class="input">
            <i class="icon-append fa fa-<?php echo $airport_icon; ?>"></i>
            <input type="text" name="location[<?php echo $trip; ?>][<?php echo $partial; ?>_info][airport_<?php echo $airport_field; ?>]" placeholder="<?php echo $airport_text; ?>" value="<?php echo $info['location'][$trip][$partial.'_info']['airport_'.$airport_field]; ?>" <?php echo $is_confirmation; ?>>
        </label>
    </div>
</section>

<?php $airport_field='flight'; ?>
<?php $airport_text='Fligth Number'; ?>
<section class="col col-xs-12">
    <label for="location[<?php echo $trip; ?>][<?php echo $partial; ?>_info][airport_<?php echo $airport_field; ?>]" class="col-sm-4"><?php echo $airport_text; ?> <?php echo $is_required('location|'.$partial.'|airport|'.$airport_field); ?></label>
    <div class="col-sm-8">
        <label class="input">
            <i class="icon-append fa fa-<?php echo $airport_icon; ?>"></i>
            <input type="text" name="location[<?php echo $trip; ?>][<?php echo $partial; ?>_info][airport_<?php echo $airport_field; ?>]" placeholder="<?php echo $airport_text; ?>" value="<?php echo $info['location'][$trip][$partial.'_info']['airport_'.$airport_field]; ?>" <?php echo $is_confirmation; ?>>
        </label>
    </div>
</section>

<?php if (($partial == 'pick_up')): ?>
    <?php $airport_field='arriving'; ?>
    <?php $airport_text='Arriving From'; ?>
    <section class="col col-xs-12">
        <label for="location[<?php echo $trip; ?>][<?php echo $partial; ?>_info][airport_<?php echo $airport_field; ?>]" class="col-sm-4"><?php echo $airport_text; ?> <?php echo $is_required('location|'.$partial.'|airport|'.$airport_field); ?></label>
        <div class="col-sm-8">
            <label class="input">
                <i class="icon-append fa fa-<?php echo $airport_icon; ?>"></i>
                <input type="text" name="location[<?php echo $trip; ?>][<?php echo $partial; ?>_info][airport_<?php echo $airport_field; ?>]" placeholder="<?php echo $airport_text; ?>" value="<?php echo $info['location'][$trip][$partial.'_info']['airport_'.$airport_field]; ?>" <?php echo $is_confirmation; ?>>
            </label>
        </div>
    </section>
<?php endif; ?>
