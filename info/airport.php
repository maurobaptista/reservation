<?php
/*
 *
 * Set Airport to be used on select (Pick-up Location / Drop-off Location)
 * 
 */

/*
 *
 * If $airports_not_set is set as false, it won't show a not selected value
 * If $airports_not_set is set as string, it will show a not selected value
 * 
 */
$airport_not_set = '--- Select Airport ---';

/*
 *
 * Airports that will be show on Reservation
 * 
 */
$airports = [
    'SFO - San Francisco Airport',
    'OAK - Oakland Airport',
    'SJO - San Jose Airport',
    'BJC - B.JetCenter Oakland',
    'SRJ - San Jose JetCenter',
    'KOJ - Kaiser-Air Oak Jet',
    'ZZZ - not listed add in Special Instructions'
];
?>