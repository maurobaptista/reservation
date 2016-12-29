<?php if ($message): ?>
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong><?php echo $this->raw($message); ?></strong>
    </div>
<?php endif; ?>
<section style="margin-bottom: 30px;">
	<form action="<?php echo $BASE.'/create'; ?>" method="post" class="smart-form" id="reservation_form" novalidate="novalidate">
		<?php echo $this->render('reservation/_partials/1_user_info.htm',$this->mime,get_defined_vars(),0); ?>
		<?php echo $this->render('reservation/_partials/2_location_trip.htm',$this->mime,get_defined_vars(),0); ?>
		<?php echo $this->render('reservation/_partials/3_location_roundtrip.htm',$this->mime,get_defined_vars(),0); ?>
		<?php echo $this->render('reservation/_partials/4_payment.htm',$this->mime,get_defined_vars(),0); ?>
		<?php echo $this->render('reservation/_partials/5_terms_and_conditions.htm',$this->mime,get_defined_vars(),0); ?>
		<?php if ($use_captcha == true): ?>
			<?php echo $this->render('reservation/_partials/6_captcha.htm',$this->mime,get_defined_vars(),0); ?>
			<?php else: ?><?php echo $this->render('reservation/_partials/6_no_captcha.htm',$this->mime,get_defined_vars(),0); ?>
		<?php endif; ?>
		<input type="hidden" name="create" value="create" />
	</form>
</section>
<?php echo $this->render('terms/modal.htm',$this->mime,get_defined_vars(),0); ?>
