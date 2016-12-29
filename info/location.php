<?php
/*
 *
 * Set Location to be used on select (Pick-up Location / Drop-off Location)
 * 
 */

/*
 *
 * If $location_not_set is set as false, it won't show a not selected value
 * If $location_not_set is set as string, it will show a not selected value
 * 
 */
$location_not_set = '--- Select Location ---';

/*
 *
 * Vehicle Type that will be show on Reservation
 * 
 */
$locations = [
    1 => 'Airport',
    2 => 'Hotel',
    3 => 'Other Locations'
];
?>