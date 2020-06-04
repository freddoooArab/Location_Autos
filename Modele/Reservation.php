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
            $sql = 'SELECT c.id,'
                    . ' c.auto_id,'
                    . ' c.date,'
                    . ' c.auteur,'
                    . ' c.titre,'
                    . ' c.texte,'
                    . ' c.prive,'
                    . ' c.efface,'
                    . ' a.titre as titreAuto'
                    . ' FROM reservations c'
                    . ' INNER JOIN autos a'
                    . ' ON c.auto_id = a.id'
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
            $sql = 'SELECT c.id,'
                    . ' c.auto_id,'
                    . ' c.date,'
                    . ' c.auteur,'
                    . ' c.titre,'
                    . ' c.texte,'
                    . ' c.prive,'
                    . ' c.efface,'
                    . ' a.titre as titreAuto'
                    . ' FROM reservations c'
                    . ' INNER JOIN autos a'
                    . ' ON c.auto_id = a.id'
                    . ' WHERE c.efface = 0 AND c.prive = 0'
                    . ' ORDER BY id desc';
        } else {
            $sql = 'SELECT * FROM reservations'
                    . ' WHERE auto_id = ? AND efface = 0 AND prive = 0'
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
            throw new Exception("Aucun reservation ne correspond à l'identifiant '$id'");
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
                . 'auto_id,'
                . ' date,'
                . ' auteur,'
                . ' titre,'
                . ' texte,'
                . ' prive)'
                . ' VALUES(?, NOW(), ?, ?, ?, ?)';
        $result = $this->executerRequete($sql, [
            $reservation['auto_id'],
            $reservation['auteur'],
            $reservation['titre'],
            $reservation['texte'],
            $reservation['prive']
                ]
        );
        return $result;
    }

}
