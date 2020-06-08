<?php $this->titre = "Location Autos - Reservations" ?>

<header>
    <h1 id="titreReponses">Reservations d'autos :</h1>
</header>
<?php
foreach ($reservations as $reservation):
    ?>
        <p><a href="AdminReservations/confirmer/<?= $this->nettoyer($reservation['id']) ?>" >
                [Effacer]</a>
            <?= $this->nettoyer($reservation['nom_client']) ?>
            <?= $this->nettoyer($reservation['adresse_client']) ?><br/>
            <?= $this->nettoyer($reservation['telephone_client']) ?><br/>
            <?= $this->nettoyer($reservation['temps_desire']) ?><br />
            <a href="Adminautos/lire/<?= $this->nettoyer($reservation['auto_id']) ?>" >
                [écrit pour l'auto <i><?= $this->nettoyer($reservation['marqueAuto']) ?></i>]</a></a>
        </p>
<?php endforeach; ?>