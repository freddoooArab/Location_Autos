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
        $reservation['auto_id'] = $this->requete->getParametreId("auto_id");
        $reservation['auteur'] = $this->requete->getParametre('auteur');
        $validation_courriel = filter_var($reservation['auteur'], FILTER_VALIDATE_EMAIL);
        if ($validation_courriel) {
            if ($this->requete->getSession()->getAttribut("env") == 'prod') {
                $this->requete->getSession()->setAttribut("message", "Ajouter un reservation n'est pas permis en démonstration");
            } else {
                $reservation['titre'] = $this->requete->getParametre('titre');
                $reservation['texte'] = $this->requete->getParametre('texte');
                // Ajuster la valeur de la case à cocher
                $reservation['prive'] = $this->requete->existeParametre('prive') ? 1 : 0;
                // Ajouter le reservation à l'aide du modèle
                $this->reservation->setReservation($reservation);
            }
            // Éliminer un code d'erreur éventuel
            if ($this->requete->getSession()->existeAttribut('erreur')) {
                $this->requete->getsession()->setAttribut('erreur', '');
            }
            //Recharger la page pour mettre à jour la liste des reservations associés
            $this->rediriger('Autos', 'lire/' . $reservation['auto_id']);
        } else {
            //Recharger la page avec une erreur près du courriel
            $this->requete->getSession()->setAttribut('erreur', 'courriel');
            $this->rediriger('Autos', 'lire/' . $reservation['auto_id']);
        }
    }

}
