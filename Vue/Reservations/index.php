<?php $this->titre = "Location Autos - Reservations" ?>

<header>
    <h1 id="titreReponses">Reservations :</h1>
</header>
<?php
foreach ($reservations as $reservation):
    ?>
    <?php 
        ?>
        <p><?= $this->nettoyer($reservation['date']) ?>, <?= $this->nettoyer($reservation['auteur']) ?> dit <?= $this->nettoyer($reservation['prive']) ? '(EN PRIVÉ)' : '' ?> : <br/>
            <strong><?= $this->nettoyer($reservation['titre']) ?></strong><br/>
            <?= $this->nettoyer($reservation['texte']) ?><br />
            <!-- Vers Adminautos si utilisateur en session -->
            <a href="<?= ($utilisateur != '') ? 'Admin' : '' ?>Autos/lire/<?= $this->nettoyer($reservation['auto_id']) ?>" >
                [écrit pour l'auto <i><?= $this->nettoyer($reservation['titreAuto']) ?></i>]</a>
        </p>
<?php endforeach; ?>