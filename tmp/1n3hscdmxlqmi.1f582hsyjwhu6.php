<?php $is_confirmation='disabled'; ?>
<section style="margin-bottom: 30px;">
    <form action="#" method="post" class="smart-form" novalidate="novalidate">
		<div class="alert alert-success fade in">
			<i class="fa-fw fa fa-check"></i>
			<strong>We got your reservation!</strong> Reservation code: <?php echo $info['reservation']['uniq_id']; ?>

		</div>	
		<?php if ($email_error == 1): ?>
			<div class="alert alert-danger fade in">
				<i class="fa-fw fa fa-times"></i>
				<strong>E-mail not send!</strong> Please call us at <?php echo $company_phone; ?> and tell us your reservation code.
			</div>			
		<?php endif; ?>
		<p>Thanks for your reservation. Follow below all information about it. You will receive an email in a short time.</p>
        <?php echo $this->render('reservation/_partials/1_user_info.htm',$this->mime,get_defined_vars(),0); ?>
		<?php echo $this->render('reservation/_partials/2_location_trip.htm',$this->mime,get_defined_vars(),0); ?>
		<?php echo $this->render('reservation/_partials/3_location_roundtrip.htm',$this->mime,get_defined_vars(),0); ?>
		<div class="alert alert-info fade in">
				<i class="fa-fw fa fa-info"></i>
				<strong>Payment Info</strong> Credit card informations hidden for safety purpose
			</div>
    </form>
</section>