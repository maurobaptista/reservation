jQuery(function($) {
    //Mask fields
    $("#phone_number").mask("(999) 999-9999");
    $("#cc_exp_date").mask("99/99?99");
    $("#cc_cvv").mask("999?9");

    $('#cc_company').change(function () {
        if ($(this).val() == 'American Express')
            $("#cc_number").mask("9999-999999-99999");
        else
            $("#cc_number").mask("9999-9999-9999-9999");
    });
                
    //Call Datepicker Trip
    $('#trip_pick_up_date').datepicker({
        dateFormat  : 'mm/dd/yy',
        prevText    : '<i class="fa fa-chevron-left"></i>',
        nextText    : '<i class="fa fa-chevron-right"></i>'
    });
    $('#trip_pick_up_time').timepicker({
        minuteStep: 5,
        showInputs: false
    });
        
    //Call Datepicker Round Trip
    $('#roundtrip_pick_up_date').datepicker({
        dateFormat  : 'mm/dd/yy',
        prevText    : '<i class="fa fa-chevron-left"></i>',
        nextText    : '<i class="fa fa-chevron-right"></i>'
    });
    $('#roundtrip_pick_up_time').timepicker();
    
    //Receive required fields from php
    var info = JSON.parse(atob(app_info));
    
    // validate signup form on keyup and submit
    $("#reservation_form").validate({
        errorClass: "form_error",
        rules: {
            //Rules Passenger
            'passenger[first_name]'             : {required: Boolean(info['passenger']['first_name']['required'][0]),
                                                   minlength: Number(info['passenger']['first_name']['minlength'][0])},
            'passenger[last_name]'              : {required: Boolean(info['passenger']['last_name']['required'][0]),
                                                   minlength: Number(info['passenger']['last_name']['minlength'][0])},
            'passenger[phone_number]'           : {required: Boolean(info['passenger']['phone_number']['required'][0])},
            'passenger[email_address]'          : {required: Boolean(info['passenger']['email_address']['required'][0]),
                                                   email: Boolean(info['passenger']['email_address']['email'][0])},
            'passenger[number_of_passenger]'    : {required: Boolean(info['passenger']['number_of_passenger']['required'][0])},
            'passenger[number_of_luggage]'      : {required: Boolean(info['passenger']['number_of_luggage']['required'][0])},
            'passenger[vehicle_type]'           : {required: Boolean(info['passenger']['vehicle_type']['required'][0])},
            'passenger[type_of_service]'        : {required: Boolean(info['passenger']['type_of_service']['required'][0])},

            //Rules Location Trip Pick-up
            'location[trip][pick_up_location]'  : {required: Boolean(info['location']['pick_up']['location']['required'][0])},
            'location[trip][pick_up_date]'      : {required: Boolean(info['location']['pick_up']['date']['required'][0]),
                                                   required: Boolean(info['location']['pick_up']['date']['date'][0])},
            'location[trip][pick_up_time]'      : {required: Boolean(info['location']['pick_up']['time']['required'][0])},
            'location[trip][pick_up_instructions]'           : {required: Boolean(info['location']['pick_up']['instructions']['required'][0])},

            //Airport
            'location[trip][pick_up_info][airport_select]'   : {required: Boolean(info['location']['pick_up']['airport']['select']['required'][0])},
            'location[trip][pick_up_info][airport_airline]'  : {required: Boolean(info['location']['pick_up']['airport']['airline']['required'][0])},
            'location[trip][pick_up_info][airport_flight]'   : {required: Boolean(info['location']['pick_up']['airport']['flight']['required'][0])},
            'location[trip][pick_up_info][airport_arriving]' : {required: Boolean(info['location']['pick_up']['airport']['arriving']['required'][0])},

            //Hotel
            'location[trip][pick_up_info][hotel_name]'       : {required: Boolean(info['location']['pick_up']['hotel']['name']['required'][0])},
            'location[trip][pick_up_info][hotel_address]'    : {required: Boolean(info['location']['pick_up']['hotel']['address']['required'][0])},
            'location[trip][pick_up_info][hotel_city]'       : {required: Boolean(info['location']['pick_up']['hotel']['city']['required'][0])},
            'location[trip][pick_up_info][hotel_state]'      : {required: Boolean(info['location']['pick_up']['hotel']['state']['required'][0])},
            'location[trip][pick_up_info][hotel_zip_code]'   : {required: Boolean(info['location']['pick_up']['hotel']['zip_code']['required'][0])},
            'location[trip][pick_up_info][hotel_room]'       : {required: Boolean(info['location']['pick_up']['hotel']['room']['required'][0])},

            //Other Location
            'location[trip][pick_up_info][other_address]'    : {required: Boolean(info['location']['pick_up']['other']['address']['required'][0])},
            'location[trip][pick_up_info][other_apt]'        : {required: Boolean(info['location']['pick_up']['other']['apt']['required'][0])},
            'location[trip][pick_up_info][other_city]'       : {required: Boolean(info['location']['pick_up']['other']['city']['required'][0])},
            'location[trip][pick_up_info][other_state]'      : {required: Boolean(info['location']['pick_up']['other']['state']['required'][0])},
            'location[trip][pick_up_info][other_zip_code]'   : {required: Boolean(info['location']['pick_up']['other']['zip_code']['required'][0])},
            
            //Rules Location Trip Drop-off
            'location[trip][drop_off_location]'               : {required: Boolean(info['location']['drop_off']['location']['required'][0])},
            'location[trip][drop_off_instructions]'           : {required: Boolean(info['location']['drop_off']['instructions']['required'][0])},

            //Airport
            'location[trip][drop_off_info][airport_select]'   : {required: Boolean(info['location']['drop_off']['airport']['select']['required'][0])},
            'location[trip][drop_off_info][airport_airline]'  : {required: Boolean(info['location']['drop_off']['airport']['airline']['required'][0])},
            'location[trip][drop_off_info][airport_flight]'   : {required: Boolean(info['location']['drop_off']['airport']['flight']['required'][0])},

            //Hotel
            'location[trip][drop_off_info][hotel_name]'       : {required: Boolean(info['location']['drop_off']['hotel']['name']['required'][0])},
            'location[trip][drop_off_info][hotel_address]'    : {required: Boolean(info['location']['drop_off']['hotel']['address']['required'][0])},
            'location[trip][drop_off_info][hotel_city]'       : {required: Boolean(info['location']['drop_off']['hotel']['city']['required'][0])},
            'location[trip][drop_off_info][hotel_state]'      : {required: Boolean(info['location']['drop_off']['hotel']['state']['required'][0])},
            'location[trip][drop_off_info][hotel_zip_code]'   : {required: Boolean(info['location']['drop_off']['hotel']['zip_code']['required'][0])},

            //Other Location
            'location[trip][drop_off_info][other_address]'    : {required: Boolean(info['location']['drop_off']['other']['address']['required'][0])},
            'location[trip][drop_off_info][other_apt]'        : {required: Boolean(info['location']['drop_off']['other']['apt']['required'][0])},
            'location[trip][drop_off_info][other_city]'       : {required: Boolean(info['location']['drop_off']['other']['city']['required'][0])},
            'location[trip][drop_off_info][other_state]'      : {required: Boolean(info['location']['drop_off']['other']['state']['required'][0])},
            'location[trip][drop_off_info][other_zip_code]'   : {required: Boolean(info['location']['drop_off']['other']['zip_code']['required'][0])},

            //Rules Location RoundTrip Pick-up
            'location[roundtrip][pick_up_location]'               : {required: Boolean(info['location']['pick_up']['location']['required'][0])},
            'location[roundtrip][pick_up_date]'                   : {required: Boolean(info['location']['pick_up']['date']['required'][0]),
                                                                     required: Boolean(info['location']['pick_up']['date']['date'][0])},
            'location[roundtrip][pick_up_time]'                   : {required: Boolean(info['location']['pick_up']['time']['required'][0])},
            'location[roundtrip][pick_up_instructions]'           : {required: Boolean(info['location']['pick_up']['instructions']['required'][0])},

            //Airport
            'location[roundtrip][pick_up_info][airport_select]'   : {required: Boolean(info['location']['pick_up']['airport']['select']['required'][0])},
            'location[roundtrip][pick_up_info][airport_airline]'  : {required: Boolean(info['location']['pick_up']['airport']['airline']['required'][0])},
            'location[roundtrip][pick_up_info][airport_flight]'   : {required: Boolean(info['location']['pick_up']['airport']['flight']['required'][0])},
            'location[roundtrip][pick_up_info][airport_arriving]' : {required: Boolean(info['location']['pick_up']['airport']['arriving']['required'][0])},

            //Hotel
            'location[roundtrip][pick_up_info][hotel_name]'       : {required: Boolean(info['location']['pick_up']['hotel']['name']['required'][0])},
            'location[roundtrip][pick_up_info][hotel_address]'    : {required: Boolean(info['location']['pick_up']['hotel']['address']['required'][0])},
            'location[roundtrip][pick_up_info][hotel_city]'       : {required: Boolean(info['location']['pick_up']['hotel']['city']['required'][0])},
            'location[roundtrip][pick_up_info][hotel_state]'      : {required: Boolean(info['location']['pick_up']['hotel']['state']['required'][0])},
            'location[roundtrip][pick_up_info][hotel_zip_code]'   : {required: Boolean(info['location']['pick_up']['hotel']['zip_code']['required'][0])},
            'location[roundtrip][pick_up_info][hotel_room]'       : {required: Boolean(info['location']['pick_up']['hotel']['room']['required'][0])},

            //Other Location
            'location[roundtrip][pick_up_info][other_address]'    : {required: Boolean(info['location']['pick_up']['other']['address']['required'][0])},
            'location[roundtrip][pick_up_info][other_apt]'        : {required: Boolean(info['location']['pick_up']['other']['apt']['required'][0])},
            'location[roundtrip][pick_up_info][other_city]'       : {required: Boolean(info['location']['pick_up']['other']['city']['required'][0])},
            'location[roundtrip][pick_up_info][other_state]'      : {required: Boolean(info['location']['pick_up']['other']['state']['required'][0])},
            'location[roundtrip][pick_up_info][other_zip_code]'   : {required: Boolean(info['location']['pick_up']['other']['zip_code']['required'][0])},
            
            //Rules Location RoundTrip Drop-off
            'location[roundtrip][drop_off_location]'               : {required: Boolean(info['location']['drop_off']['location']['required'][0])},
            'location[roundtrip][drop_off_instructions]'           : {required: Boolean(info['location']['drop_off']['instructions']['required'][0])},

            //Airport
            'location[roundtrip][drop_off_info][airport_select]'   : {required: Boolean(info['location']['drop_off']['airport']['select']['required'][0])},
            'location[roundtrip][drop_off_info][airport_airline]'  : {required: Boolean(info['location']['drop_off']['airport']['airline']['required'][0])},
            'location[roundtrip][drop_off_info][airport_flight]'   : {required: Boolean(info['location']['drop_off']['airport']['flight']['required'][0])},

            //Hotel
            'location[roundtrip][drop_off_info][hotel_name]'       : {required: Boolean(info['location']['drop_off']['hotel']['name']['required'][0])},
            'location[roundtrip][drop_off_info][hotel_address]'    : {required: Boolean(info['location']['drop_off']['hotel']['address']['required'][0])},
            'location[roundtrip][drop_off_info][hotel_city]'       : {required: Boolean(info['location']['drop_off']['hotel']['city']['required'][0])},
            'location[roundtrip][drop_off_info][hotel_state]'      : {required: Boolean(info['location']['drop_off']['hotel']['state']['required'][0])},
            'location[roundtrip][drop_off_info][hotel_zip_code]'   : {required: Boolean(info['location']['drop_off']['hotel']['zip_code']['required'][0])},

            //Other Location
            'location[roundtrip][drop_off_info][other_address]'    : {required: Boolean(info['location']['drop_off']['other']['address']['required'][0])},
            'location[roundtrip][drop_off_info][other_apt]'        : {required: Boolean(info['location']['drop_off']['other']['apt']['required'][0])},
            'location[roundtrip][drop_off_info][other_city]'       : {required: Boolean(info['location']['drop_off']['other']['city']['required'][0])},
            'location[roundtrip][drop_off_info][other_state]'      : {required: Boolean(info['location']['drop_off']['other']['state']['required'][0])},
            'location[roundtrip][drop_off_info][other_zip_code]'   : {required: Boolean(info['location']['drop_off']['other']['zip_code']['required'][0])},
        
            //Rules Payment
            'payment[cc_on_file]'             : {required: Boolean(info['payment']['cc_on_file']['required'][0])},
            'payment[cc_company]'             : {required: Boolean(info['payment']['cc_company']['required'][0])},
            'payment[cc_number]'              : {required: Boolean(info['payment']['cc_number']['required'][0])},
            'payment[cc_name]'                : {required: Boolean(info['payment']['cc_name']['required'][0])},
            'payment[cc_exp_date]'            : {required: Boolean(info['payment']['cc_exp_date']['required'][0])},
            'payment[cc_cvv]'                 : {required: Boolean(info['payment']['cc_cvv']['required'][0])},
        },
        messages: {
            //Message Passenger
            'passenger[first_name]'             : {required: info['passenger']['first_name']['required'][1],
                                                   minlength: info['passenger']['first_name']['minlength'][1]},
            'passenger[last_name]'              : {required: info['passenger']['last_name']['required'][1],
                                                   minlength: info['passenger']['last_name']['minlength'][1]},
            'passenger[phone_number]'           : {required: info['passenger']['phone_number']['required'][1]},
            'passenger[email_address]'          : {required: info['passenger']['email_address']['required'][1],
                                                   email: info['passenger']['email_address']['email'][1]},
            'passenger[number_of_passenger]'    : {required: info['passenger']['number_of_passenger']['required'][1]},
            'passenger[number_of_luggage]'      : {required: info['passenger']['number_of_luggage']['required'][1]},
            'passenger[vehicle_type]'           : {required: info['passenger']['vehicle_type']['required'][1]},
            'passenger[type_of_service]'        : {required: info['passenger']['type_of_service']['required'][1]},
            
            //Message Location Trip Pick-up
            'location[trip][pick_up_location]'  : {required: info['location']['pick_up']['location']['required'][1]},
            'location[trip][pick_up_date]'      : {required: info['location']['pick_up']['date']['required'][1],
                                                   required: info['location']['pick_up']['date']['date'][1]},
            'location[trip][pick_up_time]'      : {required: info['location']['pick_up']['time']['required'][1]},
            'location[trip][pick_up_instructions]'           : {required: info['location']['pick_up']['instructions']['required'][1]},

            //Airport
            'location[trip][pick_up_info][airport_select]'   : {required: info['location']['pick_up']['airport']['select']['required'][1]},
            'location[trip][pick_up_info][airport_airline]'  : {required: info['location']['pick_up']['airport']['airline']['required'][1]},
            'location[trip][pick_up_info][airport_flight]'   : {required: info['location']['pick_up']['airport']['flight']['required'][1]},
            'location[trip][pick_up_info][airport_arriving]' : {required: info['location']['pick_up']['airport']['arriving']['required'][1]},

            //Hotel
            'location[trip][pick_up_info][hotel_name]'       : {required: info['location']['pick_up']['hotel']['name']['required'][1]},
            'location[trip][pick_up_info][hotel_address]'    : {required: info['location']['pick_up']['hotel']['address']['required'][1]},
            'location[trip][pick_up_info][hotel_city]'       : {required: info['location']['pick_up']['hotel']['city']['required'][1]},
            'location[trip][pick_up_info][hotel_state]'      : {required: info['location']['pick_up']['hotel']['state']['required'][1]},
            'location[trip][pick_up_info][hotel_zip_code]'   : {required: info['location']['pick_up']['hotel']['zip_code']['required'][1]},
            'location[trip][pick_up_info][hotel_room]'       : {required: info['location']['pick_up']['hotel']['room']['required'][1]},
            
            //Other Location
            'location[trip][pick_up_info][other_address]'    : {required: info['location']['pick_up']['other']['address']['required'][1]},
            'location[trip][pick_up_info][other_apt]'        : {required: info['location']['pick_up']['other']['apt']['required'][1]},
            'location[trip][pick_up_info][other_city]'       : {required: info['location']['pick_up']['other']['city']['required'][1]},
            'location[trip][pick_up_info][other_state]'      : {required: info['location']['pick_up']['other']['state']['required'][1]},
            'location[trip][pick_up_info][other_zip_code]'   : {required: info['location']['pick_up']['other']['zip_code']['required'][1]},
            
            //Message Location Trip Drop-off
            'location[trip][drop_off_location]'               : {required: info['location']['drop_off']['location']['required'][1]},
            'location[trip][drop_off_instructions]'           : {required: info['location']['drop_off']['instructions']['required'][1]},

            //Airport
            'location[trip][drop_off_info][airport_select]'   : {required: info['location']['drop_off']['airport']['select']['required'][1]},
            'location[trip][drop_off_info][airport_airline]'  : {required: info['location']['drop_off']['airport']['airline']['required'][1]},
            'location[trip][drop_off_info][airport_flight]'   : {required: info['location']['drop_off']['airport']['flight']['required'][1]},
            
            //Hotel
            'location[trip][drop_off_info][hotel_name]'       : {required: info['location']['drop_off']['hotel']['name']['required'][1]},
            'location[trip][drop_off_info][hotel_address]'    : {required: info['location']['drop_off']['hotel']['address']['required'][1]},
            'location[trip][drop_off_info][hotel_city]'       : {required: info['location']['drop_off']['hotel']['city']['required'][1]},
            'location[trip][drop_off_info][hotel_state]'      : {required: info['location']['drop_off']['hotel']['state']['required'][1]},
            'location[trip][drop_off_info][hotel_zip_code]'   : {required: info['location']['drop_off']['hotel']['zip_code']['required'][1]},
            
            //Other Location
            'location[trip][drop_off_info][other_address]'    : {required: info['location']['drop_off']['other']['address']['required'][1]},
            'location[trip][drop_off_info][other_apt]'        : {required: info['location']['drop_off']['other']['apt']['required'][1]},
            'location[trip][drop_off_info][other_city]'       : {required: info['location']['drop_off']['other']['city']['required'][1]},
            'location[trip][drop_off_info][other_state]'      : {required: info['location']['drop_off']['other']['state']['required'][1]},
            'location[trip][drop_off_info][other_zip_code]'   : {required: info['location']['drop_off']['other']['zip_code']['required'][1]},

            //Message Location Round Trip Pick-up
            'location[roundtrip][pick_up_location]'               : {required: info['location']['pick_up']['location']['required'][1]},
            'location[roundtrip][pick_up_date]'                   : {required: info['location']['pick_up']['date']['required'][1],
                                                                     required: info['location']['pick_up']['date']['date'][1]},
            'location[roundtrip][pick_up_time]'                   : {required: info['location']['pick_up']['time']['required'][1]},
            'location[roundtrip][pick_up_instructions]'           : {required: info['location']['pick_up']['instructions']['required'][1]},

            //Airport
            'location[roundtrip][pick_up_info][airport_select]'   : {required: info['location']['pick_up']['airport']['select']['required'][1]},
            'location[roundtrip][pick_up_info][airport_airline]'  : {required: info['location']['pick_up']['airport']['airline']['required'][1]},
            'location[roundtrip][pick_up_info][airport_flight]'   : {required: info['location']['pick_up']['airport']['flight']['required'][1]},
            'location[roundtrip][pick_up_info][airport_arriving]' : {required: info['location']['pick_up']['airport']['arriving']['required'][1]},

            //Hotel
            'location[roundtrip][pick_up_info][hotel_name]'       : {required: info['location']['pick_up']['hotel']['name']['required'][1]},
            'location[roundtrip][pick_up_info][hotel_address]'    : {required: info['location']['pick_up']['hotel']['address']['required'][1]},
            'location[roundtrip][pick_up_info][hotel_city]'       : {required: info['location']['pick_up']['hotel']['city']['required'][1]},
            'location[roundtrip][pick_up_info][hotel_state]'      : {required: info['location']['pick_up']['hotel']['state']['required'][1]},
            'location[roundtrip][pick_up_info][hotel_zip_code]'   : {required: info['location']['pick_up']['hotel']['zip_code']['required'][1]},
            'location[roundtrip][pick_up_info][hotel_room]'       : {required: info['location']['pick_up']['hotel']['room']['required'][1]},
            
            //Other Location
            'location[roundtrip][pick_up_info][other_address]'    : {required: info['location']['pick_up']['other']['address']['required'][1]},
            'location[roundtrip][pick_up_info][other_apt]'        : {required: info['location']['pick_up']['other']['apt']['required'][1]},
            'location[roundtrip][pick_up_info][other_city]'       : {required: info['location']['pick_up']['other']['city']['required'][1]},
            'location[roundtrip][pick_up_info][other_state]'      : {required: info['location']['pick_up']['other']['state']['required'][1]},
            'location[roundtrip][pick_up_info][other_zip_code]'   : {required: info['location']['pick_up']['other']['zip_code']['required'][1]},
            
            //Message Location RoundTrip Drop-off
            'location[roundtrip][drop_off_location]'               : {required: info['location']['drop_off']['location']['required'][1]},
            'location[roundtrip][drop_off_instructions]'           : {required: info['location']['drop_off']['instructions']['required'][1]},

            //Airport
            'location[roundtrip][drop_off_info][airport_select]'   : {required: info['location']['drop_off']['airport']['select']['required'][1]},
            'location[roundtrip][drop_off_info][airport_airline]'  : {required: info['location']['drop_off']['airport']['airline']['required'][1]},
            'location[roundtrip][drop_off_info][airport_flight]'   : {required: info['location']['drop_off']['airport']['flight']['required'][1]},
            
            //Hotel
            'location[roundtrip][drop_off_info][hotel_name]'       : {required: info['location']['drop_off']['hotel']['name']['required'][1]},
            'location[roundtrip][drop_off_info][hotel_address]'    : {required: info['location']['drop_off']['hotel']['address']['required'][1]},
            'location[roundtrip][drop_off_info][hotel_city]'       : {required: info['location']['drop_off']['hotel']['city']['required'][1]},
            'location[roundtrip][drop_off_info][hotel_state]'      : {required: info['location']['drop_off']['hotel']['state']['required'][1]},
            'location[roundtrip][drop_off_info][hotel_zip_code]'   : {required: info['location']['drop_off']['hotel']['zip_code']['required'][1]},
            
            //Other Location
            'location[roundtrip][drop_off_info][other_address]'    : {required: info['location']['drop_off']['other']['address']['required'][1]},
            'location[roundtrip][drop_off_info][other_apt]'        : {required: info['location']['drop_off']['other']['apt']['required'][1]},
            'location[roundtrip][drop_off_info][other_city]'       : {required: info['location']['drop_off']['other']['city']['required'][1]},
            'location[roundtrip][drop_off_info][other_state]'      : {required: info['location']['drop_off']['other']['state']['required'][1]},
            'location[roundtrip][drop_off_info][other_zip_code]'   : {required: info['location']['drop_off']['other']['zip_code']['required'][1]},

        
            //Rules Payment
            'payment[cc_on_file]'             : {required: info['payment']['cc_on_file']['required'][1]},
            'payment[cc_company]'             : {required: info['payment']['cc_company']['required'][1]},
            'payment[cc_number]'              : {required: info['payment']['cc_number']['required'][1]},
            'payment[cc_name]'                : {required: info['payment']['cc_name']['required'][1]},
            'payment[cc_exp_date]'            : {required: info['payment']['cc_exp_date']['required'][1]},
            'payment[cc_cvv]'                 : {required: info['payment']['cc_cvv']['required'][1]},
        },
        // Do not change code below
        errorPlacement : function(error, element) {
            error.insertAfter(element.parent());
        }
    });
    
    //Change Location Options
    $('.select_location').on('change', function () {
       var id = $(this).attr('id');
       $('.' + id + '_section').hide();
       var option = $('#' + id).val();       
       if ($(this).val()) {
            $('#' + id + '_datetime').show();
            $('#' + id + option).show();
       }
    });
    
    //Verify if Round Trip is selected
    $('input:radio[name=choose_round_trip]').on('change', function () {
        var value = $('input:radio[name=choose_round_trip]:checked').val();
        if (value == 1) {
            $('#has-round-trip').show();
        } else {
            $('#has-round-trip').hide();            
        }
    });
    
    //Verify if Credit Card is on file
    $('#cc_on_file').on('click', function () {
        $('#cc').toggle();
    });
});