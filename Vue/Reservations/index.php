<?php $this->titre = "Location Autos - Reservations" ?>

<header>
    <h1 id="titreReponses">Reservations :</h1>
</header>
<?php
foreach ($reservations as $reservation):
    ?>
    <?php 
        ?>
        <p>
            Nom du client : <?= $this->nettoyer($reservation['nom_client']) ?><br/>
           <?php if($reservation[4] == 0) : ?>
            Type de réservation : Horaire<br/>
            Durée de la réservation : <?= $this->nettoyer($reservation['temps_desire']) ?> heures<br/>
           <?php else : ?>
            Type de réservation : Journalier<br/>
            Durée de la réservation : <?= $this->nettoyer($reservation['temps_desire']) ?> jours<br/>
           <?php endif;?> 
            <!-- Vers Adminautos si utilisateur en session -->
            <a href="<?= ($utilisateur != '') ? 'Admin' : '' ?>Autos/lire/<?= $this->nettoyer($reservation['auto_id']) ?>" >
                [location de l'auto <i><?= $this->nettoyer($reservation['auto_id']) ?></i>]</a>
        </p>
<?php endforeach; ?>