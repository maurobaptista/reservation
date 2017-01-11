<!-- Check with header should be loaded -->
<?php if ($load_view == 'custom'): ?>
    <?php echo $this->render('../../ui/view/custom_header.htm',$this->mime,get_defined_vars(),0); ?>
    <?php else: ?><?php echo $this->render('header.htm',$this->mime,get_defined_vars(),0); ?>
<?php endif; ?>
<!-- End Check -->
<?php echo $this->render($view,$this->mime,get_defined_vars(),0); ?>
<?php echo $header; ?>

<script>
    var app_info = '<?php echo base64_encode(json_encode($required_fields)); ?>';
</script>
<!-- Check with footer should be loaded -->
<?php if ($load_view == 'custom'): ?>
    <?php echo $this->render('../../ui/view/custom_footer.htm',$this->mime,get_defined_vars(),0); ?>
    <?php else: ?><?php echo $this->render('footer.htm',$this->mime,get_defined_vars(),0); ?>
<?php endif; ?>
<!-- End Check -->