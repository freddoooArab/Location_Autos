<?php

require_once 'Framework/Vue.php';
$reservation = [
        'id' => '999',
        'auto_id' => '111',
        'date' => '2017-12-31',
        'auteur' => 'auteur Test',
        'prive' => '1',
        'titre' => 'titre Test',
        'texte' => 'texte Test',
    ];
$vue = new Vue('Confirmer', 'AdminReservations');
$vue->generer(['reservation' => $reservation], null);

