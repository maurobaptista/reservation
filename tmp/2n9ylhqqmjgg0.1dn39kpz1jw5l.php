<!-- Terms and Conditions -->
<div class="modal fade" id="modal_terms_and_conditions" tabindex="-1" role="dialog" aria-labelledby="terms_and_conditions_label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="terms_and_conditions_label">Terms and Conditions of Service</h4>
      </div>
      <div class="modal-body">
		<?php echo $this->render('terms/terms_and_conditions.htm',$this->mime,get_defined_vars(),0); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Privacy Policy -->
<div class="modal fade" id="modal_privacy_policy" tabindex="-1" role="dialog" aria-labelledby="privacy_policy_label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="privacy_policy_label">Privacy Policy</h4>
      </div>
      <div class="modal-body">
		<?php echo $this->render('terms/privacy_policy.htm',$this->mime,get_defined_vars(),0); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>