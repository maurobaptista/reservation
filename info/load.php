<?php
require('required_fields.php');
$this->f3->set('required_fields',$required_fields);

require('credit_card.php');
$this->f3->set('credit_card_not_set',$credit_card_not_set);
$this->f3->set('credit_cards',$credit_cards);

require('number.php');
$this->f3->set('number_not_set',$number_not_set);
$this->f3->set('numbers',$numbers);

require('type_of_service.php');
$this->f3->set('type_of_service_not_set',$type_of_service_not_set);
$this->f3->set('types_of_service',$types_of_service);

require('vehicle_type.php');
$this->f3->set('vehicle_type_not_set',$vehicle_type_not_set);
$this->f3->set('vehicle_types',$vehicle_types);

require('location.php');
$this->f3->set('location_not_set',$location_not_set);
$this->f3->set('locations',$locations);

require ('airport.php');
$this->f3->set('airport_not_set',$airport_not_set);
$this->f3->set('airports',$airports);
?>