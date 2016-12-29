<fieldset>
    <div class="row">
        <div class="col-md-12 title" style="background-color: <?php echo $title_bg_color; ?>; color: <?php echo $title_tx_color; ?>;">
            Payment Information
        </div>
        <section class="col-md-12">
                <label class="checkbox"><input type="checkbox" name="payment[cc_on_file]" id="cc_on_file" <?php if ($info['payment']['cc_on_file']): ?>checked="checked"<?php endif; ?>><i></i>Is your Credit Card in our file? </label>
        </section>
        <div class="row" id="cc" style="display: <?php if ($info['payment']['cc_on_file']): ?>none<?php else: ?>block<?php endif; ?>;">
            <div class="col-md-12">
                <?php $payment_field='cc_company'; ?>
                <?php $payment_text='Card Company'; ?>
                <section class="col col-md-6">
                    <label for="payment[<?php echo $payment_field; ?>]" class="col-sm-4"><?php echo $payment_text; ?> <?php echo $is_required('payment|'.$payment_field); ?></label>
                    <div class="col-sm-8">
                        <label class="select"> 
                            <select name="payment[<?php echo $payment_field; ?>]" id="cc_company">
                                <?php if (($credit_card_not_set != false)): ?>
                                    <option value=""><?php echo $credit_card_not_set; ?></option>
                                <?php endif; ?>
                                <?php foreach (($credit_cards?:array()) as $credit_card): ?>
                                    <option value="<?php echo $credit_card; ?>" <?php if (($credit_card == $info['payment'][$payment_field])): ?>selected<?php endif; ?>><?php echo $credit_card; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <i></i>
                        </label>
                    </div>
                </section>
            </div>
            <div class="col-md-6">
                <?php $payment_icon='credit-card'; ?>
                <?php $payment_field='cc_number'; ?>
                <?php $payment_text='Card Number'; ?>
                <section class="col col-xs-12">
                    <label for="payment[<?php echo $payment_field; ?>]" class="col-sm-4"><?php echo $payment_text; ?> <?php echo $is_required('payment|'.$payment_field); ?></label>
                    <div class="col-sm-8">
                        <label class="input">
                            <i class="icon-append fa fa-<?php echo $payment_icon; ?>"></i>
                            <input type="text" name="payment[<?php echo $payment_field; ?>]" placeholder="<?php echo $payment_text; ?>" value="<?php echo $info['payment'][$payment_field]; ?>" id="cc_number">
                        </label>
                    </div>
                </section>
                
                <?php $payment_icon='credit-card'; ?>
                <?php $payment_field='cc_name'; ?>
                <?php $payment_text='Name on Card'; ?>
                <section class="col col-xs-12">
                    <label for="payment[<?php echo $payment_field; ?>]" class="col-sm-4"><?php echo $payment_text; ?> <?php echo $is_required('payment|'.$payment_field); ?></label>
                    <div class="col-sm-8">
                        <label class="input">
                            <i class="icon-append fa fa-<?php echo $payment_icon; ?>"></i>
                            <input type="text" name="payment[<?php echo $payment_field; ?>]" placeholder="<?php echo $payment_text; ?>" value="<?php echo $info['payment'][$payment_field]; ?>">
                        </label>
                    </div>
                </section>
            </div>
            <div class="col-md-6">
                <?php $payment_icon='calendar'; ?>
                <?php $payment_field='cc_exp_date'; ?>
                <?php $payment_text='Exp. Date'; ?>
                <section class="col col-lg-6 col-md-12">
                    <label for="payment[<?php echo $payment_field; ?>]" class="col-sm-4"><?php echo $payment_text; ?> <?php echo $is_required('payment|'.$payment_field); ?></label>
                    <div class="col-sm-8">
                        <label class="input">
                            <i class="icon-append fa fa-<?php echo $payment_icon; ?>"></i>
                            <input type="text" name="payment[<?php echo $payment_field; ?>]" placeholder="<?php echo $payment_text; ?>" value="<?php echo $info['payment'][$payment_field]; ?>" id="cc_exp_date">
                        </label>
                    </div>
                </section>
                <?php $payment_icon='lock'; ?>
                <?php $payment_field='cc_cvv'; ?>
                <?php $payment_text='CVV'; ?>
                <section class="col col-lg-6 col-md-12">
                    <label for="payment[<?php echo $payment_field; ?>]" class="col-sm-4"><?php echo $payment_text; ?> <?php echo $is_required('payment|'.$payment_field); ?></label>
                    <div class="col-sm-8">
                        <label class="input">
                            <i class="icon-append fa fa-<?php echo $payment_icon; ?>"></i>
                            <input type="text" name="payment[<?php echo $payment_field; ?>]" placeholder="<?php echo $payment_text; ?>" value="<?php echo $info['payment'][$payment_field]; ?>" id="cc_cvv">
                        </label>
                    </div>
                </section>
            </div>
        </div>
    </div>
</fieldset>