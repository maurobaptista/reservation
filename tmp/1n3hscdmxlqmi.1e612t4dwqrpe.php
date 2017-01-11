<fieldset>
    <div class="row">
        <div class="col-md-12 title" style="background-color: <?php echo $title_bg_color; ?>; color: <?php echo $title_tx_color; ?>;">
            Passenger Information
        </div>
        <div class="col-md-6">
            <section class="col col-xs-12">
                <label for="passenger[first_name]" class="col-sm-4">First Name <?php echo $is_required('passenger|first_name'); ?></label>
                <div class="col-sm-8">
                    <label class="input">
                        <i class="icon-append fa fa-user"></i>
                        <input type="text" name="passenger[first_name]" placeholder="First Name" value="<?php echo $info['passenger']['first_name']; ?>" <?php echo $is_confirmation; ?>>
                    </label>
                </div>
            </section>
            <section class="col col-xs-12">
                <label for="passenger[last_name]" class="col-sm-4">Last Name <?php echo $is_required('passenger|last_name'); ?></label>
                <div class="col-sm-8">
                    <label class="input">
                        <i class="icon-append fa fa-user"></i>
                        <input type="text" name="passenger[last_name]" placeholder="Last Name" value="<?php echo $info['passenger']['last_name']; ?>" <?php echo $is_confirmation; ?>>
                    </label>
                </div>
            </section>
            <section class="col col-xs-12">
                <label for="passenger[phone_number]" class="col-sm-4">Phone Number <?php echo $is_required('passenger|phone_number'); ?></label>
                <div class="col-sm-8">
                    <label class="input">
                        <i class="icon-append fa fa-phone"></i>
                        <input type="text" name="passenger[phone_number]" placeholder="Phone Number" value="<?php echo $info['passenger']['phone_number']; ?>" id="phone_number" <?php echo $is_confirmation; ?>>
                    </label>
                </div>
            </section>
            <section class="col col-xs-12">
                <label for="passenger[email_address]" class="col-sm-4">E-mail Address <?php echo $is_required('passenger|email_address'); ?></label>
                <div class="col-sm-8">
                    <label class="input">
                        <i class="icon-append fa fa-envelope"></i>
                        <input type="text" name="passenger[email_address]" class="form-control" placeholder="E-mail Address" value="<?php echo $info['passenger']['email_address']; ?>" <?php echo $is_confirmation; ?>>
                    </label>
                </div>
            </section>
        </div>
        <div class="col-md-6">
            <section class="col col-xs-12">
                <label for="passenger[number_of_passenger]" class="col-md-5 col-sm-4">Number of Passenger <?php echo $is_required('passenger|number_of_passenger'); ?></label>
                <div class="col-md-7 col-sm-8">
                    <label class="select"> 
                        <select name="passenger[number_of_passenger]" <?php echo $is_confirmation; ?>>
                            <?php if ($number_not_set != false): ?>
                                <option value=""><?php echo $number_not_set; ?></option>
                            <?php endif; ?>
                            <?php foreach (($numbers?:array()) as $number): ?>
                                <option value="<?php echo $number; ?>" <?php if ($info['passenger']['number_of_passenger'] == $number): ?>selected<?php endif; ?>><?php echo $number; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <i></i>
                    </label>
                </div>
            </section>
            <section class="col col-xs-12">
                <label for="passenger[number_of_luggage]" class="col-md-5 col-sm-4">Number of Luggage <?php echo $is_required('passenger|number_of_luggage'); ?></label>
                <div class="col-md-7 col-sm-8">
                    <label class="select"> 
                        <select name="passenger[number_of_luggage]" <?php echo $is_confirmation; ?>>
                            <?php if ($number_not_set != false): ?>
                                <option value=""><?php echo $number_not_set; ?></option>
                            <?php endif; ?>
                            <?php foreach (($numbers?:array()) as $number): ?>
                                <option value="<?php echo $number; ?>" <?php if ($info['passenger']['number_of_luggage'] == $number): ?>selected<?php endif; ?>><?php echo $number; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <i></i>
                    </label>
                </div>
            </section>
            <section class="col col-xs-12">
                <label for="passenger[vehicle_type]" class="col-md-5 col-sm-4">Vehicle Type <?php echo $is_required('passenger|vehicle_type'); ?></label>
                    <div class="col-md-7 col-sm-8">
                        <label class="select"> 
                        <select name="passenger[vehicle_type]" <?php echo $is_confirmation; ?>>
                            <?php if ($vehicle_type_not_set != false): ?>
                                <option value=""><?php echo $vehicle_type_not_set; ?></option>
                            <?php endif; ?>
                            <?php foreach (($vehicle_types?:array()) as $vehicle_type): ?>
                                <option value="<?php echo $vehicle_type; ?>" <?php if ($info['passenger']['vehicle_type'] == $vehicle_type): ?>selected<?php endif; ?>><?php echo $vehicle_type; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <i></i>
                    </div>
                </label>
            </section>
            <section class="col col-xs-12">
                <label for="passenger[type_of_service]" class="col-md-5 col-sm-4">Type of Service <?php echo $is_required('passenger|type_of_service'); ?></label>
                <div class="col-md-7 col-sm-8">
                    <label class="select"> 
                        <select name="passenger[type_of_service]" <?php echo $is_confirmation; ?>>
                            <?php if ($type_of_service_not_set != false): ?>
                                <option value=""><?php echo $type_of_service_not_set; ?></option>
                            <?php endif; ?>
                            <?php foreach (($types_of_service?:array()) as $type_of_service): ?>
                                <option value="<?php echo $type_of_service; ?>" <?php if ($info['passenger']['type_of_service'] == $type_of_service): ?>selected<?php endif; ?>><?php echo $type_of_service; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <i></i>
                    </label>
                </div>
            </section>
        </div>
    </div>
</fieldset>