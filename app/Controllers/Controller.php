<?php
class Controller {
 
    protected $f3;
    protected $db;
 
    function __construct() {

		$f3 = Base::instance();

		$port =  ($f3->get('use_socket') != true)?'port=':'unix_socket=';
		$db = new DB\SQL (
			'mysql:host='.$f3->get('db_host').';'.$port.$f3->get('db_port').';dbname='.$f3->get('db_name'),
			$f3->get('db_user'),
			$f3->get('db_pass')
		);

		$this->f3 = $f3;
		$this->db = $db;
    }
	
	function call_basic() {
		require_once('info/load.php');
	}
}
?>
