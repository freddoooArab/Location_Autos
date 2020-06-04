<?php

require_once 'Framework/Modele.php';

/**
 * Fournit les services d'accès aux genres musicaux 
 * 
 * @author Baptiste Pesquet
 */
class Reservation extends Modele {

    // Renvoie la liste des reservations associés à un auto
    public function getReservations($idAuto = NULL) {
        if ($idAuto == NULL) {
            $sql = 'SELECT r.id,'
                    . ' r.nom_client,'
                    . ' r.adresse_client,'
                    . ' r.telephone_client,'
                    . ' r.type_reservation,'
                    . ' r.temps_desire,'
                    . ' r.auto_id,'
                    . ' a.modele as modeleAuto,'
                    . ' a.marque as marqueAuto'
                    . ' FROM reservations r'
                    . ' INNER JOIN autos a'
                    . ' ON r.auto_id = a.id'
                    . ' ORDER BY id desc';;
        } else {
            $sql = 'SELECT * from reservations'
                    . ' WHERE auto_id = ?'
                    . ' ORDER BY id desc';;
        }
        $reservations = $this->executerRequete($sql, [$idAuto]);
        return $reservations;
    }

    // Renvoie la liste des reservations publics associés à un auto
    public function getReservationsPublics($idAuto = NULL) {
        if ($idAuto == NULL) {
            $sql = 'SELECT r.id,'
                    . ' r.nom_client,'
                    . ' r.adresse_client,'
                    . ' r.telephone_client,'
                    . ' r.type_reservation,'
                    . ' r.temps_desire,'
                    . ' r.auto_id,'
                    . ' a.marque as marqueAuto,'
                    . ' a.marque as marqueAuto'
                    . ' FROM reservations r'
                    . ' INNER JOIN autos a'
                    . ' ON r.auto_id = a.id'
                    . ' WHERE a.reservee = 0'
                    . ' ORDER BY id desc';
        } else {
            $sql = 'SELECT * FROM reservations'
                    . ' WHERE auto_id = ? AND reservee = 0'
                    . ' ORDER BY id desc';;
        }
        $reservations = $this->executerRequete($sql, [$idAuto]);
        return $reservations;
    }

// Renvoie un reservation spécifique
    public function getReservation($id) {
        $sql = 'SELECT * FROM reservations'
                . ' WHERE id = ?';
        $reservation = $this->executerRequete($sql, [$id]);
        if ($reservation->rowCount() == 1) {
            return $reservation->fetch();  // Accès à la première ligne de résultat
        } else {
            throw new Exception("Aucune réservation ne correspond à l'identifiant '$id'");
        }
    }

// Supprime un reservation
    public function deleteReservation($id) {
        $sql = 'UPDATE reservations'
                . ' SET efface = 1'
                . ' WHERE id = ?';
        $result = $this->executerRequete($sql, [$id]);
        return $result;
    }

    // Réactive un reservation
    public function restoreReservation($id) {
        $sql = 'UPDATE reservations'
                . ' SET efface = 0'
                . ' WHERE id = ?';
        $result = $this->executerRequete($sql, [$id]);
        return $result;
    }

// Ajoute un reservation associés à un auto
    public function setReservation($reservation) {
        $sql = 'INSERT INTO reservations ('
                . 'nom_client,'
                . ' adresse_client,'
                . ' telephone_client,'
                . ' type_reservation,'
                . ' temps_desire,'
                . ' auto_id)'
                . ' VALUES(?, ?, ?, ?, ?, ?)';
        $result = $this->executerRequete($sql, [
            $reservation['nom_client'],
            $reservation['adresse_client'],
            $reservation['telephone_client'],
            $reservation['type_reservation'],
            $reservation['temps_desire'],
            $reservation['auto_id']
                ]
        );
        return $result;
    }

}
