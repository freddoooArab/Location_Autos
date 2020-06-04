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
            $auto['utilisateur_id'] = $this->requete->getParametreId('utilisateur_id');
            $auto['titre'] = $this->requete->getParametre('titre');
            $auto['sous_titre'] = $this->requete->getParametre('sous_titre');
            $auto['texte'] = $this->requete->getParametre('texte');
            $auto['type'] = $this->requete->getParametre('type');
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
            $auto['utilisateur_id'] = $this->requete->getParametreId('utilisateur_id');
            $auto['titre'] = $this->requete->getParametre('titre');
            $auto['sous_titre'] = $this->requete->getParametre('sous_titre');
            $auto['texte'] = $this->requete->getParametre('texte');
            $auto['type'] = $this->requete->getParametre('type');
            $this->auto->updateAuto($auto);
            $this->executerAction('index');
        }
    }

}
