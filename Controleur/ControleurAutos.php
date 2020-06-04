<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Auto.php';
require_once 'Modele/Reservation.php';

class ControleurAutos extends Controleur {

    private $auto;
    private $reservation;

    public function __construct() {
        $this->auto = new Auto();
        $this->reservation = new Reservation();
    }

// Affiche la liste de tous les autos du blog
    public function index() {
        $autos = $this->auto->getAutos();
        $this->genererVue(['autos' => $autos]);
    }

// Affiche les détails sur un auto
    public function lire() {
        $idAuto = $this->requete->getParametreId("id");
        $auto = $this->auto->getAuto($idAuto);
        $erreur = $this->requete->getSession()->existeAttribut("erreur") ? $this->requete->getsession()->getAttribut("erreur") : '';
        $reservations = $this->reservation->getReservationsPublics($idAuto);
        $this->genererVue(['auto' => $auto, 'reservations' => $reservations, 'erreur' => $erreur]);
    }

}
