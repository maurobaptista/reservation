<?php
class InstallModel extends DB\SQL\Mapper {

    protected $db;
    protected $db_name;
    public function __construct($db, $db_name) {
        $this->db = $db;
        $this->db_name = $db_name;
    }
	
    public function install_database() {
        if (! $this->has_table('reservation')) {
            $this->create_db_passenger();
            $this->create_db_reservation();
            $this->create_db_payment();
            $this->create_db_trip();
            return true;
        } else return false;
    }

    public function has_table($table_name) {
        $exist = $this->db->exec("
            SELECT count(*)
            FROM information_schema.tables
            WHERE table_schema = '{$this->db_name}'
            AND table_name = '{$table_name}'");

        return (isset($exist[0]['count(*)']) && ((int) $exist[0]['count(*)']));
    }

    public function create_db_reservation ()
    {
        $this->db->exec("CREATE TABLE IF NOT EXISTS  reservation (
              id int(11) NOT NULL AUTO_INCREMENT,
              unique_id varchar(64) NOT NULL,
              ip varchar(32) NOT NULL,
              created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
              PRIMARY KEY (id),
              UNIQUE KEY unique_id (unique_id)
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
            ");
    }

    public function create_db_passenger ()
    {
        $this->db->exec("CREATE TABLE IF NOT EXISTS passenger (
              id int(11) NOT NULL AUTO_INCREMENT,
              reservation_id int(11) NOT NULL,
              first_name varchar(128) NOT NULL,
              last_name varchar(128) NOT NULL,
              phone_number varchar(128) NOT NULL,
              email_address varchar(128) NOT NULL,
              number_of_passenger int(11) NOT NULL,
              number_of_luggage int(11) NOT NULL,
              vehicle_type varchar(128) NOT NULL,
              type_of_service varchar(128) NOT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
        ");
    }

    public function create_db_payment()
    {
        $this->db->exec("CREATE TABLE IF NOT EXISTS  payment (
              id int(11) NOT NULL AUTO_INCREMENT,
              reservation_id int(11) NOT NULL,
              cc_on_file tinyint(4) NOT NULL DEFAULT 0,
              cc_company varchar(16) DEFAULT NULL,
              cc_number text,
              cc_name varchar(128) DEFAULT NULL,
              cc_exp_date varchar(7) DEFAULT NULL,
              cc_cvv int(4) DEFAULT NULL,
              PRIMARY KEY (id)
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
        ");
    }

    public function create_db_trip()
    {
        $this->db->exec("CREATE TABLE IF NOT EXISTS  trip (
              id int(11) NOT NULL AUTO_INCREMENT,
              reservation_id int(11) NOT NULL,
              pick_up_location varchar(16) NOT NULL,
              pick_up_info text NOT NULL,
              pick_up_date date NOT NULL,
              pick_up_time time NOT NULL,
              pick_up_instructions text,
              drop_off_location varchar(16) NOT NULL,
              drop_off_info text NOT NULL,
              drop_off_instructions text,
              has_round_trip tinytext,
              is_round_trip tinytext,
              PRIMARY KEY (id)
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
        ");
    }
}
