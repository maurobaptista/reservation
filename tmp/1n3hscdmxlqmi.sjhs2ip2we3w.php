<fieldset>
    <div class="row">
        <?php $partial='pick_up'; ?>
        <?php $text='Pick-up'; ?>
        <?php $trip='trip'; ?>
        <div class="col-md-6">
            <?php echo $this->render('reservation/_partials/_location/location.htm',$this->mime,get_defined_vars(),0); ?>
        </div>
        <?php $partial='drop_off'; ?>
        <?php $text='Drop-Off'; ?>
        <div class="col-md-6">
            <?php echo $this->render('reservation/_partials/_location/location.htm',$this->mime,get_defined_vars(),0); ?>
        </div>
    </div>
</fieldset>