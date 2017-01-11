<?php
   require_once __DIR__ . '/vendor/google/recaptcha/src/autoload.php';

   global $f3;
   $f3 = require('lib/base.php');
   $f3->config('config/config.ini');
   $f3->config('config/route.ini');

	/**
	*	Function check if field is required and print or not the *
	*	@return void
	*	@param $fields string
	**/
   $f3->set('is_required',
            function($fields) {
               require ('info/required_fields.php');
               
               $fields = explode('|', $fields);
               $required = $required_fields;
               
               foreach ($fields as $field) {
                   $required = $required[$field];
               }
               if ($required['required'][0]) echo '<span class="required">*</span>';
            }
   );
   
   $f3->run();
?>