<?php
namespace App\Controllers;

use \Psr\Http\Message\ResponseInterface as Response;
use \Psr\Http\Message\ServerRequestInterface as Request;

class ReservationController extends Controller {

    public function create(Request $request, Response $response) 
    {
        return $this->view($response, 'reservation.create');
    }
    
}