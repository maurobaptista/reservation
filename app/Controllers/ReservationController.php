<?php
class ReservationController extends Controller {

	/**
	*	Call main reservations page
	*	@return view
	**/
	public function index() {
        $this->f3->set('view','reservation/reservation.htm');
	}
	
	/**
	*	Handle input from post and show result
	*	@return view
	**/
	public function create() {
		$info = $this->f3->get('POST');
		$this->f3->set('info', $info);
		
		$error = false;
		
		//Verify if form has CREATE field
        if(!$error && !$this->f3->exists('POST.create')) {
			$msg = 'Couldn´t load FORM properly! Please, reload this page!';
			$this->error($msg);
			$error = true;
		}
				
		//Run validation on Server Side
		$validate = $this->validate($info);
		if (!$error && $validate !== true) {
			$this->error($validate);
			$error = true;
		}
		
		//Verify if captcha is set on and if captcha match
		if (!$error && $this->f3->get('use_captcha') == true && isset($info['g-recaptcha-response']) && $this->check_captcha($info['g-recaptcha-response'])) {
			$msg = 'Captcha seems to be wrong! Please, check and re-type!';
			$this->error($msg);
			$error = true;
		}
		
		//Verify if ip is inside limit 
		if (!$error && ($this->f3->get('limit_ip') > 0) && ($this->check_ip($this->f3->IP))) {
			$msg = 'Sorry, we limit the reservations by IP [max: '.$this->f3->get('limit_ip').'/hour]';
			$this->error($msg);
			$error = true;
		}
		
		//If there is no error, run save
		if (!$error) {
			$reservation = new ReservationModel($this->db);
			
			//Update Info (Remove not used content)
			$info = $this->do_update_info($info);
	
			// Save on DB
			$uniq_id = $this->f3->get('id_prefix').$this->generate_id();
			$ip = $this->f3->IP;
			$reservation->add($info, $uniq_id, $ip);
			
			// Update Session
			$info['reservation']['id'] = $reservation->id;
			$info['reservation']['uniq_id'] = $uniq_id;
			$info['reservation']['ip'] = $ip;
			$this->f3->set('info', $info);
			
			//Send email
			$this->send_email($info, 'client');
			$this->send_email($info, 'admin');
			
			// Show Confirm Page
			$this->success('/success/');
		}
    }
	
	/**
	*	Return page if input was properly validated
	*	@return view
	**/
	public function success() {
		$this->f3->set('view','reservation/confirmation.htm');
	}
	
	/**
	*	Return page if input wasn't properly validated
	*	@return view
	*	@param $msg string
	**/	
	public function error($msg) {
		$this->f3->set('message', $msg);
		$this->f3->set('view','reservation/reservation.htm');		
	}
	
	/**
	*	Run validation on Input
	*	@return boolean or string
	*	@param $info array
	**/
	public function validate($info) {
		$validate = new ValidationController();
		$validation = $validate->validate($info);
		return $validation;
	}
	/**
	*	Generate uniq_id for reservation
	*	@return string
	**/	
	private function generate_id() {
		$an = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$su = strlen($an) - 1;
		return substr($an, rand(0, $su), 1).
			   substr($an, rand(0, $su), 1).
			   substr($an, rand(0, $su), 1).
			   substr($an, rand(0, $su), 1).
			   substr($an, rand(0, $su), 1).
			   substr($an, rand(0, $su), 1);
	}
	/**
	*	Call proper function to send email
	*	@return void
	*	@param $info array
	*	@param $for string (client or admin)
	**/
	private function send_email($info, $for) {
		switch ($this->f3->get('email_protocol')) {
			case 'smtp': return $this->send_email_smtp($info, $for);
			case 'mail': return $this->send_email_mail($info, $for);
		}
	}
	
	/**
	*	Handle send email by smtp
	*	@return void
	*	@param $info array
	*	@param $for string (client or admin)
	**/
	private function send_email_smtp($info, $for) {
		require ('lib/PHPMailer/vendor/autoload.php');
		
		$this->f3->set('for', $for);
		
		$mail = new PHPMailer();
		
		$mail->SMTPDebug =  $this->f3->get('email_debug'); ;                               // Enable verbose debug output
		
		$mail->isSMTP();                                    // Set mailer to use SMTP
		$mail->Host = $this->f3->get('smtp_host');  		// Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                             // Enable SMTP authentication
		$mail->Username = $this->f3->get('smtp_user');      // SMTP username
		$mail->Password = $this->f3->get('smtp_pwd');       // SMTP password
		$mail->SMTPSecure = $this->f3->get('smtp_scheme');  // Enable TLS encryption, `ssl` also accepted
		$mail->Port = $this->f3->get('smtp_port');          // TCP port to connect to
		
		
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->setFrom($this->f3->get('email_sender'), $this->f3->get('email_name'));
		
		if ($for == 'client') {
			$mail->addAddress($info['passenger']['email_address'], $info['passenger']['first_name'].' '.$info['passenger']['last_name']);     // Add a recipient
			$mail->Subject = $this->f3->get('company_name').' - Code: '.$info['reservation']['uniq_id'].' - Online Reservation';
		} else if ($for == 'admin') {
			$mail->addAddress($this->f3->get('email_sender'), $this->f3->get('email_name'));     // Add a recipient
			$mail->Subject =  'New Online Reservation - Code: '.$info['reservation']['uniq_id'];
		}
		
		$file = 'email/email_reservation.htm';
		$body = Template::instance()->render($file,'application/htm');
		$mail->Body = $body;
		
		$email_return ='';
		if (!$mail->send()) $this->f3->set('email_error', 1);
	}

	/**
	*	Handle send email by mail function
	*	@return void
	*	@param $info array
	*	@param $for string (client or admin)
	**/
	private function send_email_mail($info, $for) {
		if ($for == 'client') {
			$to = $info['passenger']['email_address'];     // Add a recipient
			$subject = $this->f3->get('company_name').' - Code: '.$info['reservation']['uniq_id'].' - Online Reservation';
		} else if ($for == 'admin') {
			$to = $this->f3->get('email_sender');     // Add a recipient
			$subject = 'New Online Reservation - Code: '.$info['reservation']['uniq_id'];
		}
		
		$file = 'email/email_reservation.htm';
		$body = Template::instance()->render($file,'application/htm');
		
		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		
		// More headers
		$headers .= 'From: <'.$this->f3->get('email_sender').'>' . "\r\n";
		
		if (!mail($to,$subject,$file,$headers)) $this->f3->set('email_error', 1);
	}
	
    /**
	*	Remove indexes that are not used on location
	*	@return array
	*	@param $info array
	**/
	private function do_update_info($info) {
		$location = $info['location'];
		
		$location['trip']['pick_up_info'] 			= $this->update_info('pick_up',  $location['trip']);
		$location['trip']['drop_off_info'] 			= $this->update_info('drop_off', $location['trip']);
		$location['roundtrip']['pick_up_info'] 		= $this->update_info('pick_up',  $location['roundtrip']);
		$location['roundtrip']['drop_off_info'] 	= $this->update_info('drop_off', $location['roundtrip']);
		
		$info['location'] = $location;
		
		return $info;
	}
	
    /**
	*	Remove indexes that are not used on location
	*	@return array
	*	@param $info array
	**/
	private function update_info($prefix, $info) {
        $info_array = $info[$prefix.'_info'];
        
        $airport 	= ['airport_select', 'airport_airline', 'airport_flight', 'airport_arriving'];
        $hotel 		= ['hotel_name', 'hotel_address', 'hotel_city', 'hotel_state', 'hotel_zip_code', 'hotel_room'];
        $other 		= ['other_address', 'other_apt', 'other_city', 'other_state', 'other_zip_code'];

        switch($info[$prefix.'_location']) {
            case 1: case '1':
                return $this->remove_from_info($info_array, array_merge($hotel, $other));
            case 2: case '2':
                return $this->remove_from_info($info_array, array_merge($airport, $other));
            case 3: case '3':
                return $this->remove_from_info($info_array, array_merge($hotel, $airport));
        }
    }
    /**
	*	Unset indexes not used from form post
	*	@return array
	*	@param $info array
	*	@param $array_to_unset array
	**/    
    private function remove_from_info($info, $array_to_unset) {
        foreach ($array_to_unset as $unset) {
            if (isset($info[$unset])) unset($info[$unset]);
        }
        return $info;
    }
    /**
	*	Compare captcha created with typed
	*	@return bool
	*	@param $captcha string
	**/   
	public function check_captcha($response) {
		$recaptcha = new \ReCaptcha\ReCaptcha($this->f3->get('captcha_serverkey'));
		$resp = $recaptcha->verify($_POST['g-recaptcha-response'], $this->f3->IP);
		return ($resp->isSuccess()?false:true);
	}
    /**
	*	Check if limit_ip is being respected
	*	@return bool
	*	@param $ip string
	**/   
	public function check_ip($ip) {
		$check_ip = new ReservationModel($this->db);
		return ($check_ip->get_ip_count($ip) >= $this->f3->get('limit_ip'));
	}
}
?>