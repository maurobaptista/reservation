<?php
class ValidationController extends Controller {
	
	private $separator;
	private $required_fields; 
	public function __construct() {
		//Load required fields
		require ('info/required_fields.php');
		$this->required_fields = $required_fields;
		
		$this->separator = '<BR>';
	}
	
	/**
	*	Handle validate on server side
	*	@return bool or string
	*	@param $info array
	**/
    public function validate($info) {
		$erro = '';
		$erro .= $this->passenger_validate($info);
		$erro .= $this->location_validate($info);
		$erro .= $this->payment_validate($info);
		$erro .= $this->terms_and_conditions_validate($info);

		//If there is no Error
		if (strlen($erro) <= 0) return true;
		
		return $erro;
    }
	/**
	*	Handle validate to terms and conditions
	*	@return bool or string
	*	@param $info array
	**/
	private function terms_and_conditions_validate($info) {
		$terms_and_conditions = ['terms_and_conditions' => 'Terms and Conditions'];
		return $this->is_valid($terms_and_conditions, $info, $this->required_fields);	
	}
	/**
	*	Handle validate to passenger information
	*	@return bool or string
	*	@param $info array
	**/
	private function passenger_validate($info) {
		$erro = '';
		$passenger_fields = ['first_name' 			=> 'First Name',
							'last_name' 			=> 'Last Name',
							'phone_number'			=> 'Phone Number',
							'email_address'		  	=> 'Email Address',
							'number_of_passenger' 	=> 'Number of Passenger',
							'number_of_luggage'		=> 'Number of Luggage',
							'vehicle_type'			=> 'Vehicle Type',
							'type_of_service'		=> 'Type of Service'];
		return $this->is_valid($passenger_fields, $info['passenger'], $this->required_fields['passenger']);		
	}
	
	/**
	*	Handle validate to payment information
	*	@return bool or string
	*	@param $info array
	**/
	private function payment_validate($info) {
		$erro = '';
		$payment_fields = ['cc_on_file' 	=> 'Card on File',
						   'cc_company'		=> 'Card Company',
						   'cc_number'		=> 'Card Number',
						   'cc_name'		=> 'Card Name',
						   'cc_exp_date'	=> 'Card Exp Date',
						   'cc_cvv'			=> 'Card CVV'];
		if (!$info['payment']['cc_on_file']) {
			return $this->is_valid($payment_fields, $info['payment'], $this->required_fields['payment']);		
		}
	}
	
	/**
	*	Treat validation location
	*	@return bool or string
	*	@param $info array
	**/
	private function location_validate($info) {
		$erro = '';
		$location_fields_pick_up = ['location'		=> 'Pick Up - Location',
									'date'			=> 'Pick Up - Date',
									'time'			=> 'Pick Up - Time',
									'instructions'	=> 'Pick Up - Instructions'];
		
		$location_fields_drop_off = ['location'		=> 'Drop Off - Location',
									 'instructions' => 'Drop Off - Instructions'];
		
		$erro .= $this->do_validation_location($info, $location_fields_pick_up, 'trip', 'pick_up', 'Pick Up - ');
		$erro .= $this->do_validation_location($info, $location_fields_drop_off, 'trip', 'drop_off', 'Drop Off - ');
		
		if ($info['choose_round_trip'] == 1) {
			$location_fields_pick_up = ['location'		=> 'Round Trip - Pick Up - Location',
										'date'			=> 'Round Trip - Pick Up - Date',
										'time'			=> 'Round Trip - Pick Up - Time',
										'instructions'	=> 'Round Trip - Pick Up - Instructions'];
			
			$location_fields_drop_off = ['location'		=> 'Round Trip - Drop Off - Location',
										 'instructions' => 'Round Trip - Drop Off - Instructions'];
			
			$erro .= $this->do_validation_location($info, $location_fields_pick_up, 'roundtrip', 'pick_up', 'Round Trip - Pick Up - ');
			$erro .= $this->do_validation_location($info, $location_fields_drop_off, 'roundtrip', 'drop_off', 'Round Trip - Drop Off - ');
		}
		
		return $erro;
	}
	
	/**
	*	Direct validation location to correct fields
	*	@return bool or string
	*	@param $info array
	*	@param $fields array
	*	@param $trip string
	*	@param $preifx string
	*	@param $text_prefix string
	**/
	private function do_validation_location($info, $fields, $trip, $prefix, $text_prefix) {
		$erro = '';
		$erro .= $this->is_valid($fields, $info['location'][$trip], $this->required_fields['location'][$prefix], $prefix.'_');
		
		switch ($info['location'][$trip][$prefix.'_location']) {
			case 1: case '1':
				$erro .= $this->do_validation_airport($info['location'][$trip], $this->required_fields['location'][$prefix], $prefix, $text_prefix);
				break;
			case 2: case '2':
				$erro .= $this->do_validation_hotel($info['location'][$trip], $this->required_fields['location'][$prefix], $prefix, $text_prefix);
				break;
			case 2: case '3':
				$erro .= $this->do_validation_other($info['location'][$trip], $this->required_fields['location'][$prefix], $prefix, $text_prefix);
				break;
		}
		
		return $erro;
	}
	
	/**
	*	Handle validate to location - airport
	*	@return bool or string
	*	@param $info array
	*	@param $required array
	*	@param $preifx string
	*	@param $text_prefix string
	**/
	private function do_validation_airport($info, $required, $prefix = '', $text_prefix = '') {
		$airport_fields = ['select'		=> $text_prefix.'Airport',
							'airline'	=> $text_prefix.'Airline Company',
							'flight'	=> $text_prefix.'Flight',
							'arriving'	=> $text_prefix.'Arriving From'];
		if ($prefix == 'drop_off') unset($airport_fields['arriving']);
		
		return $erro .= $this->is_valid($airport_fields, $info[$prefix.'_info'], $this->required_fields['location'][$prefix]['airport'], 'airport_');
	}
	
	/**
	*	Handle validate to location - hotel
	*	@return bool or string
	*	@param $info array
	*	@param $required array
	*	@param $preifx string
	*	@param $text_prefix string
	**/
	private function do_validation_hotel($info, $required, $prefix = '', $text_prefix = '') {
		$hotel_fields = ['name'		=> $text_prefix.'Hotel Name',
						'address'	=> $text_prefix.'Hotel Address',
						'city'		=> $text_prefix.'Hotel City',
						'state'		=> $text_prefix.'Hotel State',
						'zip_code'	=> $text_prefix.'Hotel Zip Code',
						'room'		=> $text_prefix.'Room Number'];
		
		if ($prefix == 'drop_off') unset($hotel_fields['room']);
		
		return $erro .= $this->is_valid($hotel_fields, $info[$prefix.'_info'], $this->required_fields['location'][$prefix]['hotel'], 'hotel_');
	}

	/**
	*	Handle validate to location - other locations
	*	@return bool or string
	*	@param $info array
	*	@param $required array
	*	@param $prefix string
	*	@param $text_prefix string
	**/	
	private function do_validation_other($info, $required, $prefix = '', $text_prefix = '') {
		$other_fields = ['address'	=> $text_prefix.'Address',
						'apt'		=> $text_prefix.'Apt/Suite',
						'city'		=> $text_prefix.'City',
						'state'	=> $text_prefix.'State',
						'zip_code'	=> $text_prefix.'Zip Code'];
		return $erro .= $this->is_valid($other_fields, $info[$prefix.'_info'], $this->required_fields['location'][$prefix]['other'], 'other_');
	}
	
	/**
	*	Pass fields to be validated
	*	@return bool or string
	*	@param $info array
	*	@param $required array
	*	@param $prefix string
	**/	
	private function is_valid($fields, $info, $required, $prefix = '') {
		$erro = '';
		foreach ($fields as $slug => $field) {
			$erro .= $this->do_validation($field, $info[$prefix.$slug], $required[$slug]);
		}
		return $erro;		
	}
	/**
	*	Handle validation on fields
	*	@return bool or string
	*	@param $field string
	*	@param $value array
	*	@param $rules array
	**/
	private function do_validation($field, $value, $rules) {
		$erro = '';
		foreach ($rules as $rule => $data) {
			$erro .= $this->validation($field, $value, $rule, $data);
			if (strlen($erro) > 0) break; //Do no go to second validation, if before isn't valid
		}
		return $erro;
	}
	
	/**
	*	Make validation looking at the rule
	*	@return bool or string
	*	@param $field string
	*	@param $value array
	*	@param $rules array
	*	@param $data array
	**/
	private function validation($field, $value, $rule, $data) {
		switch ($rule) {
			case "required":
				if ($data[0] == true) {	
					if (!$this->validate_required($value))
						return $this->message($field, $data[1]);
				}
				break;
			case "minlength":
				if (!empty($data[0])) {
					if (!$this->validate_length($value, false, $data[0]))
						return $this->message($field, $data[1]);
				}
				break;
			case "maxlength":
				if (!empty($data[0])) {
					if (!$this->validate_length($value, $data[0]))
						return $this->message($field, $data[1]);
				}
				break;
			case "email":
				if ($data[0] == true) {
					if (!$this->validate_email($value)) 
						return $this->message($field, $data[1]);
				}
				break;
			case "date":
				if ($data[0] == true) {
					if (!$this->validate_date($value)) 
						return $this->message($field, $data[1]);
				}
				break;
			case "callback":
				if ($data[0] == true) {
					if (!$this->validate_callback($value, $data[1])) 
						return $this->message($field, $data[2]);
				}
				break;
		}
		return false;
	}
	
	/**
	*	Writes the proper error message
	*	@return string
	*	@param $field string
	*	@param $msg string
	**/
	private function message($field, $msg) {
		return '['.$field.'] '.$msg.$this->separator; 
	}
	/**
	*	Check if cc_exp_date is valid
	*	@return bool
	*	@param $value string
	**/
	private function callback_cc_exp_date($value) {
		list($month, $year) = explode('/', $value);
		
		//Verify if expiration Month is between 1 and 12
		if (($month > 12) || ($month < 1)) return false;
		
		//Verify if expiration Year is between Current Year and Current Year + 20
		$current_year = date('Y');
		if (($year > ($current_year + 20) || ($year < $current_year))) return false;
		
		//Verify if expiration date is valid
		if ($year == $current_year) {
			$current_month = date('m');
			if ($month < $current_month) return false;
		}
		
		return true;
	}
	/**
	*	Check if airport is in file airport
	*	@return bool
	*	@param $value string
	**/
	private function callback_is_on_airport_file($value) {
		require ('info/airport.php');
		return (array_search($value, $airports) !== false);
	}
	/**
	*	Check if credit card is in file credit card
	*	@return bool
	*	@param $value string
	**/
	private function callback_is_on_credit_card_file($value) {
		require ('info/credit_card.php');
		return (array_search($value, $credit_cards) !== false);
	}
	/**
	*	Check if location is in file location
	*	@return bool
	*	@param $value string
	**/
	private function callback_is_on_location_file($value) {
		require ('info/location.php');
		return (array_key_exists((int)$value, $locations) !== false);
	}
	/**
	*	Check if number is in file number
	*	@return bool
	*	@param $value string
	**/
	private function callback_is_on_number_file($value) {
		require ('info/number.php');
		return (array_search($value, $numbers) !== false);
	}
	/**
	*	Check if type of service is in file type of service
	*	@return bool
	*	@param $value string
	**/
	private function callback_is_on_type_of_service_file($value) {
		require ('info/type_of_service.php');
		return (array_search($value, $types_of_service) !== false);
	}
	/**
	*	Check if vehicle type is in file vehicle type
	*	@return bool
	*	@param $value string
	**/
	private function callback_is_on_vehicle_type_file($value) {
		require ('info/vehicle_type.php');
		return (array_search($value, $vehicle_types) !== false);
	}
	/**
	*	Verify if email is valid
	*	@return bool
	*	@param $value string
	**/
	private function validate_email($value) {
		return ((filter_var($value, FILTER_VALIDATE_EMAIL)) == $value);
	}

	/**
	*	Verify if integer is valid and in range
	*	@return bool
	*	@param $value string
	*	@param $max integer
	*	@param $min integer
	**/
	private function validate_int($value, $max = false, $min = false) {
		if (!$max && !$min) return (filter_var($value, FILTER_VALIDATE_INT));
		if ($max && !$min) return (filter_var($value, FILTER_VALIDATE_INT, array("options" => array("max_range"=>$max))));
		if (!$max && $min) return (filter_var($value, FILTER_VALIDATE_INT, array("options" => array("min_range"=>$min))));
		if ($max && $min) return (filter_var($value, FILTER_VALIDATE_INT, array("options" => array("min_range"=>$min, "max_range"=>$max))));
		return false;
	}
	
	/**
	*	Call validation callback function
	*	@return bool
	*	@param $value string
	*	@param $callback string
	**/
	private function validate_callback($value, $callback) {
		return filter_var($value, FILTER_CALLBACK, array("options"=>array($this, $callback)));
	}
	/**
	*	Verify if field required was filled
	*	@return bool
	*	@param $value string
	**/
	private function validate_required($value) {
		return $this->validate_length($value);
	}
	/**
	*	Verify if string is in range
	*	@return bool
	*	@param $value string
	*	@param $max integer
	*	@param $min integer
	**/
	private function validate_length($value, $max = false, $min = false) {
		$value_len = strlen($value);
		if (!$max && !$min) return ($value_len > 0);
		if ($max && !$min) return ($value_len <= $max);
		if (!$max && $min) return ($value_len >= $min);
		if ($max && $min)  return (($max <= $value_len) && ($value_len <= $min));
		return false;
	}
	/**
	*	Verify if date is valid (mm/dd/yyyy)
	*	@return bool
	*	@param $date string
	**/
	private function validate_date($date) {
		list($month, $day, $year) = explode('/', $date);
		return checkdate($month, $day, $year);
	}
}
?>