<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Reservation.php';

class ControleurReservations extends Controleur {

    private $reservation;

    public function __construct() {
        $this->reservation = new Reservation();
    }

// L'action index n'est pas utilisée mais pourrait ressembler à ceci 
// en ajoutant la fonctionnalité de faire afficher tous les reservations
    public function index() {
        $reservations = $this->reservation->getReservationsPublics();
        $this->genererVue(['reservations' => $reservations]);
    }

// Ajoute un reservation à un auto
    public function ajouter() {
        echo "<script>console.log('Debug Objects: " . "ta marraine" . "' );</script>";

         if ($this->requete->getSession()->getAttribut("env") == 'prod') {
            $this->requete->getSession()->setAttribut("message", "Ajouter une reservation n'est pas permis en démonstration");
        } else {
            $reservation['id'] = null;
            $reservation['nom_client'] = $this->requete->getParametreId("nom_client");
            $reservation['adresse_client'] = $this->requete->getParametre('adresse_client');
            $reservation['telephone_client'] = $this->requete->getParametre('telephone_client');
            $reservation['type_reservation'] = $this->requete->getParametre('type_reservation');
            $reservation['temps_desire'] = $this->requete->getParametre('temps_desire');
            $reservation['auto_id'] = $this->requete->getParametre('auto_id');
        // Ajouter le reservation à l'aide du modèle
        $this->reservation->setReservation($reservation);
          $vue = new Vue("index");
        $this->genererVue();
        }
    }
        
 }
