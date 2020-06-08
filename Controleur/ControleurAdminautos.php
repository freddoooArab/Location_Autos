<?php

require_once 'Controleur/ControleurAdmin.php';
require_once 'Modele/Auto.php';
require_once 'Modele/Reservation.php';

class ControleurAdminAutos extends ControleurAdmin {

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
        $reservations = $this->reservation->getReservations($idAuto);
        $this->genererVue(['auto' => $auto, 'reservations' => $reservations, 'erreur' => $erreur]);
    }

    public function ajouter() {
        $vue = new Vue("Ajouter");
        $this->genererVue();
    }

// Enregistre le nouvel auto et retourne à la liste des autos
    public function nouvelAuto() {
        if ($this->requete->getSession()->getAttribut("env") == 'prod') {
            $this->requete->getSession()->setAttribut("message", "Ajouter un auto n'est pas permis en démonstration");
        } else {
            $auto['marque'] = $this->requete->getParametre('marque');
            $auto['modele'] = $this->requete->getParametre('modele');
            $auto['annee'] = $this->requete->getParametre('annee');
            $date = strtotime($auto['annee']);
            $date_year = date('Y', $date);
            $auto['annee'] =  $date_year;
            $auto['tarif_horaire'] = $this->requete->getParametre('tarif_horaire');
            $auto['tarif_jour'] = $this->requete->getParametre('tarif_jour');
            $auto['reservee'] = $this->requete->getParametre('reservee');
            $auto['utilisateur_id'] = $this->requete->getParametreId('utilisateur_id');
            $this->auto->setAuto($auto);
            $this->executerAction('index');
        }
    }

// Modifier un auto existant    
    public function modifier() {
        $id = $this->requete->getParametreId('id');
        $auto = $this->auto->getAuto($id);
        $this->genererVue(['auto' => $auto]);
    }

// Enregistre l'auto modifié et retourne à la liste des autos
    public function miseAJour() {
        if ($this->requete->getSession()->getAttribut("env") == 'prod') {
            $this->requete->getSession()->setAttribut("message", "Modifier un auto n'est pas permis en démonstration");
        } else {
            $auto['id'] = $this->requete->getParametreId('id');
            $auto['marque'] = $this->requete->getParametre('marque');
            $auto['modele'] = $this->requete->getParametre('modele');
            $auto['tarif_horaire'] = $this->requete->getParametre('tarif_horaire');
            $auto['tarif_jour'] = $this->requete->getParametre('tarif_jour');
            $this->auto->updateAuto($auto);
            $this->executerAction('index');
        }
    }

}
