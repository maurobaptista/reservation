<html>
    <head>
        <style>
            @media only screen 
                and (max-width: 768px) {
                    .half { width: 100%!important; }
            }
        </style>
    </head>
    <body style="font-family: 'Open sans',Arial,sans-serif; font-size: 14px;">
        <?php if ($for == 'admin'): ?>
            
                <section>
                    <div style="background-color: <?php echo $title_bg_color; ?>; color: <?php echo $title_tx_color; ?>;margin-bottom: 10px;line-height: 40px;font-size: 20px;padding-left: 5px;margin: 0;padding: 0;width: 100%; float: left;">Reservation Information</div>
                    <div style="margin: 0;padding: 0;width: 100%;float: left;position: relative;color: #666;" >
                        <div style="line-height: 30px;">Reservation ID: <?php echo $info['reservation']['id']; ?></div>
                        <div style="line-height: 30px;">Reservation Code: <?php echo $info['reservation']['uniq_id']; ?></div>
                        <div style="line-height: 30px;">User IP: <?php echo $info['reservation']['ip']; ?></div>
                    </div>
                </section>
            
            <?php else: ?>
                <div style="margin: 0;padding: 0;width: 100%;float: left;position: relative;color: #666; line-height: 30px;">Thanks for your reservation. <strong>Reservation Code: <?php echo $info['reservation']['uniq_id']; ?></strong><BR>
            
        <?php endif; ?>
        <section>
            <div style="background-color: <?php echo $title_bg_color; ?>; color: <?php echo $title_tx_color; ?>;margin-bottom: 10px;line-height: 40px;font-size: 20px;padding-left: 5px;margin: 0;padding: 0;width: 100%; float: left;">Passenger Information</div>
            <div style="margin: 0;padding: 0;width: 50%;float: left;position: relative;color: #666;" class="half" >
                <div style="line-height: 30px;">First Name: <?php echo $info['passenger']['first_name']; ?></div>
                <div style="line-height: 30px;">Last Name: <?php echo $info['passenger']['last_name']; ?></div>
                <div style="line-height: 30px;">Phone Number: <?php echo $info['passenger']['phone_number']; ?></div>
                <div style="line-height: 30px;">E-mail Address: <?php echo $info['passenger']['email_address']; ?></div>
            </div>
            <div style="margin: 0;padding: 0;box-sizing: content-box;width: 50%;float: left;position: relative;color: #666;" class="half" >
                <div style="line-height: 30px;">Number of Passenger: <?php echo $info['passenger']['number_of_passenger']; ?></div>
                <div style="line-height: 30px;">Number of Luggage: <?php echo $info['passenger']['number_of_luggage']; ?></div>
                <div style="line-height: 30px;">Vehicle Type: <?php echo $info['passenger']['vehicle_type']; ?></div>
                <div style="line-height: 30px;">Type of Service: <?php echo $info['passenger']['type_of_service']; ?></div>
            </div>
        </section>
        <section>
            <div style="margin: 0;padding: 0;width: 50%;float: left;position: relative;color: #666;" class="half" >
                <div>
                    <div style="background-color: <?php echo $title_bg_color; ?>; color: <?php echo $title_tx_color; ?>;margin-bottom: 10px;line-height: 40px;font-size: 20px;padding-left: 5px;margin: 0;padding: 0;width: 100%;">Pick Up Information</div>
                </div>
                <?php foreach (($info['location']['trip']['pick_up_info']?:array()) as $key=>$value): ?>
                    <div style="line-height: 30px;"><?php echo ucwords(str_replace('_',' ',$key)); ?>: <?php echo $value; ?></div>
                <?php endforeach; ?>
                <div style="line-height: 30px;">Date: <?php echo $info['location']['trip']['pick_up_date']; ?></div>
                <div style="line-height: 30px;">Time: <?php echo $info['location']['trip']['pick_up_time']; ?></div>
                <div style="line-height: 30px;">Special Instruction: <?php echo $info['location']['trip']['pick_up_instructions']; ?></div>

            </div>
            <div style="margin: 0;padding: 0;box-sizing: content-box;width: 50%;float: left;position: relative;color: #666;" class="half" >
                <div style="background-color: <?php echo $title_bg_color; ?>; color: <?php echo $title_tx_color; ?>;margin-bottom: 10px;line-height: 40px;font-size: 20px;padding-left: 5px;margin: 0;padding: 0;width: 100%;">Drop Off Information</div>
                <?php foreach (($info['location']['trip']['drop_off_info']?:array()) as $key=>$value): ?>
                    <div style="line-height: 30px;"><?php echo ucwords(str_replace('_',' ',$key)); ?>: <?php echo $value; ?></div>
                <?php endforeach; ?>
                <div style="line-height: 30px;">Special Instruction: <?php echo $info['location']['trip']['drop_off_instructions']; ?>            </div>
        </section>
        <?php if ($info['choose_round_trip'] == 1): ?>
            <section>
                <div style="background-color: <?php echo $title_bg_color; ?>; color: <?php echo $title_tx_color; ?>;margin-bottom: 10px;line-height: 40px;font-size: 20px;padding-left: 5px;margin: 0;padding: 0;width: 100%; float: left;">Round Trip Information</div>
                <div style="margin: 0;padding: 0;width: 50%;float: left;position: relative;color: #666;" class="half" >
                    <div>
                        <div style="background-color: <?php echo $title_bg_color; ?>; color: <?php echo $title_tx_color; ?>;margin-bottom: 10px;line-height: 40px;font-size: 20px;padding-left: 5px;margin: 0;padding: 0;width: 100%;">Pick Up Information</div>
                    </div>
                    <?php foreach (($info['location']['roundtrip']['pick_up_info']?:array()) as $key=>$value): ?>
                        <div style="line-height: 30px;"><?php echo ucwords(str_replace('_',' ',$key)); ?>: <?php echo $value; ?></div>
                    <?php endforeach; ?>
                    <div style="line-height: 30px;">Date: <?php echo $info['location']['roundtrip']['pick_up_date']; ?></div>
                    <div style="line-height: 30px;">Time: <?php echo $info['location']['roundtrip']['pick_up_time']; ?></div>
                    <div style="line-height: 30px;">Special Instruction: <?php echo $info['location']['roundtrip']['pick_up_instructions']; ?></div>
                </div>
                <div style="margin: 0;padding: 0;box-sizing: content-box;width: 50%;float: left;position: relative;color: #666;" class="half" >
                    <div>
                        <div style="background-color: <?php echo $title_bg_color; ?>; color: <?php echo $title_tx_color; ?>;margin-bottom: 10px;line-height: 40px;font-size: 20px;padding-left: 5px;margin: 0;padding: 0;width: 100%;">Drop Off Information</div>
                    </div>
                    <?php foreach (($info['location']['roundtrip']['drop_off_info']?:array()) as $key=>$value): ?>
                        <div style="line-height: 30px;"><?php echo ucwords(str_replace('_',' ',$key)); ?>: <?php echo $value; ?></div>
                    <?php endforeach; ?>
                    <div style="line-height: 30px;">Special Instruction: <?php echo $info['location']['roundtrip']['drop_off_instructions']; ?>

                </div>
            </section>
        <?php endif; ?>        
        <section>
            <div style="background-color: <?php echo $title_bg_color; ?>; color: <?php echo $title_tx_color; ?>;margin-bottom: 10px;line-height: 40px;font-size: 20px;padding-left: 5px;margin: 0;padding: 0;width: 100%; float: left;">Payment Information</div>
            <?php if ($info['payment']['cc_on_file']): ?>
                
                    <div style="margin: 0;padding: 0;width: 100%;float: left;position: relative;color: #666;">
                        <div style="line-height: 30px;">Credit Card is on file</div>
                    </div>
                
                <?php else: ?>
                    <?php if ($for == 'admin'): ?>
                        
                            <div style="margin: 0;padding: 0;width: 100%;float: left;position: relative;color: #666;" >
                                <div style="line-height: 30px;">Company: <?php echo $info['payment']['cc_company']; ?></div>
                                <div style="line-height: 30px;">Number: <?php echo $info['payment']['cc_number']; ?></div>
                                <div style="line-height: 30px;">Exp. Date: <?php echo $info['payment']['cc_exp_date']; ?> | CVV: <?php echo $info['payment']['cc_cvv']; ?></div>
                                <div style="line-height: 30px;">Name: <?php echo $info['payment']['cc_name']; ?></div>
                            </div>
                        
                        <?php else: ?>
                            <div style="margin: 0;padding: 0;width: 100%;float: left;position: relative;color: #666;">
                                <div style="line-height: 30px;">Credit Card information hidden for security purpose</div>
                            </div>
                        
                    <?php endif; ?>
                
            <?php endif; ?>
        </section>
        <section style="padding-top: 40px; padding-bottom: 30px;">
            <HR>
            <div style="line-height: 30px;"><strong><?php echo $company_name; ?></strong></div>
            <div style="line-height: 30px;"><?php echo $company_phone; ?></div>
            <div style="line-height: 30px;"><a href="<?php echo $company_website; ?>" target="_blank"><?php echo $company_website; ?></div>
        </section>
    </body>
</html>
