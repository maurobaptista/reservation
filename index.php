<?php
require 'load.php';

$app->get('/create', '\App\Controllers\ReservationController:create');

$app->run();