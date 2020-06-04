<?php

require_once 'Modele/Reservation.php';

$tstReservation = new Reservation;
$reservations = $tstReservation->getReservations(1);
echo '<h3>Test getReservations : </h3>';
var_dump($reservations->rowCount());

$reservation = $tstReservation->getReservation(5);
echo '<h3>Test getReservation : </h3>';
var_dump($reservation);