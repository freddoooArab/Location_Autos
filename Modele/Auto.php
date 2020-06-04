<?php

require_once 'Framework/Modele.php';

/**
 * Fournit les services d'accès aux autos 
 * 
 * @author André Pilon
 */
class Auto extends Modele {

// Renvoie la liste de tous les autos, triés par identifiant décroissant avec le nom de l'utilisateus lié
    public function getAutos() {
//        $sql = 'select autos.id, titre, sous_titre, utilisateur_id, date, texte, type, nom from autos, utilisateurs'
//                . ' where autos.utilisateur_id = utilisateurs.id order by ID desc';
        $sql = 'SELECT a.id,'
                . ' a.marque,'
                . ' a.modele,'
                . ' a.annee,'
                . ' a.tarif_horaire,'
                . ' a.tarif_jour,'
                . ' a.utilisateur_id,'
                . ' u.nom,'
                . ' u.identifiant'
                . ' FROM autos a'
                . ' INNER JOIN utilisateurs u'
                . ' ON a.utilisateur_id = u.id'
                . ' ORDER BY id desc';
        $autos = $this->executerRequete($sql);
        return $autos;
    }

// Renvoie la liste de tous les autos, triés par identifiant décroissant
    public function setAuto($auto) {
        $sql = 'INSERT INTO autos ('
                . ' marque,'
                . ' modele,'
                . ' annee,'
                . ' tarif_horaire,'
                . ' tarif_jour,'
                . ' utilisateur_id)'
                . ' VALUES(?, ?, ?, ?, ?, ?)';
        $result = $this->executerRequete($sql, [
            $auto['marque'],
            $auto['annee'],
            $auto['modele'],
            $auto['tarif_horaire'],
            $auto['tarif_jour'],
            $auto['utilisateur_id']
                ]
        );
        return $result;
    }

// Renvoie les informations sur un auto avec le nom de l'utilisateur lié
    function getAuto($idAuto) {
        $sql = 'SELECT a.id,'
                . ' a.marque,'
                . ' a.modele,'
                . ' a.annee,'
                . ' a.tarif_horaire,'
                . ' a.tarif_jour,'
                . ' a.utilisateur_id,'
                . ' u.nom'
                . ' FROM autos a'
                . ' INNER JOIN utilisateurs u'
                . ' ON a.utilisateur_id = u.id'
                . ' WHERE a.id=?';
        $auto = $this->executerRequete($sql, [$idAuto]);
        if ($auto->rowCount() == 1) {
            return $auto->fetch();  // Accès à la première ligne de résultat
        } else {
            throw new Exception("Aucune auto ne correspond à l'identifiant '$idAuto'");
        }
    }

// Met à jour un auto
    public function updateAuto($auto) {
        $sql = 'UPDATE autos'
                . ' SET marque = ?,'
                . ' modele = ?,'
                . ' annee = ?,'
                . ' tarif_horaire = ?,'
                . ' tarif_jour = ?,'
                . ' utilisateur_id = ?'
                . ' WHERE id = ?';
        $result = $this->executerRequete($sql, [
            $auto['marque'],
            $auto['annee'],
            $auto['modele'],
            $auto['tarif_horaire'],
            $auto['tarif_jour'],
            $auto['utilisateur_id']
                ]
        );
        return $result;
    }

}
