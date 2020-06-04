<?php

require_once 'Controleur/ControleurAdmin.php';
require_once 'Modele/Reservation.php';

class ControleurAdminReservations extends ControleurAdmin {

    private $reservation;

    public function __construct() {
        $this->reservation = new Reservation();
    }

// L'action index n'est pas utilisée mais pourrait ressembler à ceci 
// en ajoutant la fonctionnalité de faire afficher tous les reservations
    public function index() {
        $reservations = $this->reservation->getReservations();
        $this->genererVue(['reservations' => $reservations]);
    }
  
// Confirmer la suppression d'un reservation
    public function confirmer() {
        $id = $this->requete->getParametreId("id");
        // Lire le reservation à l'aide du modèle
        $reservation = $this->reservation->getReservation($id);
        $this->genererVue(['reservation' => $reservation]);
    }

// Supprimer un reservation
    public function supprimer() {
        $id = $this->requete->getParametreId("id");
        // Lire le reservation afin d'obtenir le id de l'auto associé
        $reservation = $this->reservation->getReservation($id);
        // Supprimer le reservation à l'aide du modèle
        $this->reservation->deleteReservation($id);
        //Recharger la page pour mettre à jour la liste des reservations associés
        $this->rediriger('Adminautos', 'lire/' . $reservation['auto_id']);
    }

    // Rétablir un reservation
    public function retablir() {
        $id = $this->requete->getParametreId("id");
        // Lire le reservation afin d'obtenir le id de l'auto associé
        $reservation = $this->reservation->getReservation($id);
        // Supprimer le reservation à l'aide du modèle
        $this->reservation->restoreReservation($id);
        //Recharger la page pour mettre à jour la liste des reservations associés
        $this->rediriger('Adminautos', 'lire/' . $reservation['auto_id']);
    }

}
