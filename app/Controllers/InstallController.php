<?php
class InstallController extends Controller {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function install()
	{
		$install = new InstallModel($this->db, $this->f3->get('db_name'));

		try {
			if ($install->install_database()) {
				echo 'Table installed';
			} else {
				echo 'Table was already installed';
			}
		} catch (\RuntimeException $e) {
			echo $e->getMessage();
		}
    }
}
