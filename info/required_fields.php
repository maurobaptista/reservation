<?php
/*
 *
 * Set Required Fields on the form
 * 
 */

$required_fields = [
    'passenger' => [
        'first_name'            => ['required'  => ['true', 'Please enter your first name'],
                                    'minlength' => ['2', 'Please enter at least 2 characters']],
        'last_name'             => ['required'  => ['true', 'Please enter your last name'],
                                    'minlength' => ['2', 'Please enter at least 2 characters']],
        'phone_number'          => ['required'  => ['true', 'Please enter your phone number']],
        'email_address'         => ['required'  => ['true', 'Please enter an email address'],
                                    'email'     => ['true', 'Please enter a valid email address']],
        'number_of_passenger'   => ['required'  => ['true', 'Please enter the number of passenger'],
                                    'callback'  => ['true', 'callback_is_on_number_file', 'Please choose a proper number of passenger']],
        'number_of_luggage'     => ['required'  => ['true', 'Please enter the number of luggage'],
                                    'callback'  => ['true', 'callback_is_on_number_file', 'Please choose a proper number of luggage']],
        'vehicle_type'          => ['required'  => ['true', 'Please enter the vehicle type'],
                                    'callback'  => ['true', 'callback_is_on_vehicle_type_file', 'Please choose a proper vehicle type']],
        'type_of_service'       => ['required'  => ['true', 'Please enter the type of service'],
                                    'callback'  => ['true', 'callback_is_on_type_of_service_file', 'Please choose a proper type of service']],
    ],
    'location' => [
        'pick_up'               => [
            'location'          => ['required' => ['true', 'Please select an location'],
                                    'callback' => ['true', 'callback_is_on_location_file', 'Please choose a proper location']],
            'date'              => ['required' => ['true', 'Please select a date'],
                                    'date'     => ['true', 'Please insert a date']],
            'time'              => ['required' => ['true', 'Please select a time']],
            'instructions'      => ['required' => ['', 'Please insert instructions']],
            'airport'           => [
                'select'        => ['required' => ['true', 'Please select an airport'],
                                    'callback' => ['true', 'callback_is_on_airport_file', 'Please choose a proper airport']],
                'airline'       => ['required' => ['true', 'Please enter an airline company']],
                'flight'        => ['required' => ['true', 'Please enter your fligth number']],
                'arriving'      => ['required' => ['', 'Please enter where are you arriving from']],                
            ],
            'hotel'             => [
                'name'          => ['required' => ['true', 'Please enter the hotel name']],
                'address'       => ['required' => ['true', 'Please senter the hotel address']],
                'city'          => ['required' => ['true', 'Please enter the hotel city']],
                'state'         => ['required' => ['true', 'Please enter the hotel state']],
                'zip_code'      => ['required' => ['true', 'Please enter the hotel zip code']],
                'room'          => ['required' => ['true', 'Please enter your room number']], 
            ],
            'other'             => [
                'address'       => ['required' => ['true', 'Please enter the address']],
                'apt'           => ['required' => ['true', 'Please enter the apt/suite number']], 
                'city'          => ['required' => ['true', 'Please enter the city']],
                'state'         => ['required' => ['true', 'Please enter the state']],
                'zip_code'      => ['required' => ['true', 'Please enter the zip code']],
            ]
        ],
        'drop_off'              => [
            'location'          => ['required' => ['true', 'Please select an location'],
                                    'callback' => ['true', 'callback_is_on_location_file', 'Please choose a proper location']],
            'instructions'      => ['required' => ['', 'Please insert instructions']],
            'airport'           => [
                'select'        => ['required' => ['true', 'Please select an airport'],
                                    'callback' => ['true', 'callback_is_on_airport_file', 'Please choose a proper airport']],
                'airline'       => ['required' => ['true', 'Please enter an airline company']],
                'flight'        => ['required' => ['', 'Please enter your fligth number']],
            ],
            'hotel'             => [
                'name'          => ['required' => ['true', 'Please enter the hotel name']],
                'address'       => ['required' => ['true', 'Please senter the hotel address']],
                'city'          => ['required' => ['true', 'Please enter the hotel city']],
                'state'         => ['required' => ['true', 'Please enter the hotel state']],
                'zip_code'      => ['required' => ['true', 'Please enter the hotel zip code']],
            ],
            'other'             => [
                'address'       => ['required' => ['true', 'Please enter the address']],
                'apt'           => ['required' => ['true', 'Please enter the apt/suite number']], 
                'city'          => ['required' => ['true', 'Please enter the city']],
                'state'         => ['required' => ['true', 'Please enter the state']],
                'zip_code'      => ['required' => ['true', 'Please enter the zip code']],
            ]
        ]
    ],
    'payment' => [
        'cc_on_file'            => ['required'  => ['', 'Please mark if you have the card on our file']],
        'cc_company'            => ['required'  => ['true', 'Please enter your credit card company'],
                                    'callback'  => ['true', 'callback_is_on_credit_card_file', 'Please choose a proper Credit Card']],
        'cc_number'             => ['required'  => ['true', 'Please enter your credit card number']],
        'cc_name'               => ['required'  => ['true', 'Please enter the name on your credit card']],
        'cc_exp_date'           => ['required'  => ['true', 'Please enter the expiration date of your credit card'],
                                    'callback'  => ['true', 'callback_cc_exp_date', 'Please check your card expiration date']],
        'cc_cvv'                => ['required'  => ['true', 'Please enter CCV from your credit card'],
                                     'minlength'=> ['3', 'The CVV must have between 3 and 4 numbers'],
                                     'maxlength'=> ['4', 'The CVV must have between 3 and 4 numbers']
                                    ]
    ],
    'terms_and_conditions'      => ['required'  => ['true', 'You must accept the terms and conditions']]
];
?>