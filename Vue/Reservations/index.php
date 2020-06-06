<?php $this->titre = "Location Autos - Reservations" ?>

<header>
    <h1 id="titreReponses">Reservations :</h1>
</header>
<?php
foreach ($reservations as $reservation):
    ?>
    <?php 
        ?>
        <p><?= $this->nettoyer($reservation['nom_client']) ?>, <?= $this->nettoyer($reservation['adresse_client']) ?> : <br/>
            <strong><?= $this->nettoyer($reservation['temps_desire']) ?></strong><br/>
            <?= $this->nettoyer($reservation['type_reservation']) ?><br />
            <!-- Vers Adminautos si utilisateur en session -->
            <a href="<?= ($utilisateur != '') ? 'Admin' : '' ?>Autos/lire/<?= $this->nettoyer($reservation['auto_id']) ?>" >
                [écrit pour l'auto <i><?= $this->nettoyer($reservation['auto_id']) ?></i>]</a>
        </p>
<?php endforeach; ?>