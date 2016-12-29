<?php
class ReservationModel extends DB\SQL\Mapper {
    public function __construct(DB\SQL $db) {
        parent::__construct($db,'reservation');
    }
	/**
	*	Get all reservation
	*	@return void
	**/
    public function get_all() {
        $this->load();
        return $this->query;
    }
	/**
	*	Get reservation by unique_id
	*	@return void
	*	@param $id string
	**/
    public function get_by_id($id) {
        return $this->load(array('unique_id=?',$id));
        
    }
	/**
	*	Return number of reservations made by an ip on last hour
	*	@return void
	*	@param $ip string
	**/
    public function get_ip_count($ip) {
        return $this->count(array('created_at >= NOW() - INTERVAL 1 HOUR and ip = :ip',
								  ':ip' => $ip));
    }
	/**
	*	Handle insert reservation on DB
	*	@return void
	*	@param $info array
	*	@param $uniq_id string
	*	@param $ip string
	**/
    public function add($info, $uniq_id, $ip) {
        $reservation = $this->save_reservation($uniq_id, $ip);
        $this->save_passenger($reservation->id, $info['passenger']);
        $this->save_trip($reservation->id, $info['location']['trip'], $info['choose_round_trip'], 0);
        if ($info['choose_round_trip'] == 1) $this->save_trip($reservation->id, $info['location']['roundtrip'], $info['choose_round_trip'], 1);
        $this->save_payment($reservation->id, $info['payment']);
    }
	/**
	*	Save reservation on DB
	*	@return void
	*	@param $uniq_id string
	*	@param $ip string
	**/
    private function save_reservation($uniq_id, $ip) {
        $this->unique_id = $uniq_id;
        $this->ip = $ip;
        return $this->save();        
    }
	/**
	*	Save passenger on DB
	*	@return void
	*	@param $reservation_id integer
	*	@param $info array
	**/
    private function save_passenger($reservation_id, $info) {
        $passenger = new DB\SQL\Mapper($this->db,'passenger');
        $passenger->copyFrom($info);
        $passenger->reservation_id = $reservation_id;
        $passenger->save();
    }
	/**
	*	Save trip on DB
	*	@return void
	*	@param $reservation_id integer
	*	@param $info array
	*	@param $has_round_trip bool
	*	@param $is_round_trip bool
	**/    
    private function save_trip($reservation_id, $info, $has_round_trip, $is_round_trip = 0) {
        $trip = new DB\SQL\Mapper($this->db,'trip');
        
        //Verify if this trip has round trip
        $trip->has_round_trip = $has_round_trip;
        $trip->is_round_trip = $is_round_trip;
        
        //Encode info in json
        $trip->pick_up_info = json_encode($info['pick_up_info']);
        $trip->drop_off_info = json_encode($info['drop_off_info']);
                
        //Adust Date Time
        $trip->pick_up_date = date("Y-m-d", strtotime($info['pick_up_date']));
        $trip->pick_up_time = date("H:i:s", strtotime($info['pick_up_time']));

        //Unset used info (to avoid subscription)
        unset($info['pick_up_date']);
        unset($info['pick_up_time']);
        unset($info['pick_up_info']);
        unset($info['drop_off_info']);
        $trip->copyFrom($info);
        
        $trip->reservation_id = $reservation_id;
        
        $trip->save();
    }
	/**
	*	Save payment on DB
	*	@return void
	*	@param $reservation_id integer
	*	@param $info array
	**/
    private function save_payment($reservation_id, $info) {
        $payment = new DB\SQL\Mapper($this->db,'payment');
        $payment->copyFrom($info);
        $payment->reservation_id = $reservation_id;
        $payment->save();
    }
}
?>