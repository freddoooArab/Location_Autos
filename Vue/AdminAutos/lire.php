<?php $this->titre = "Location Autos - " . $this->nettoyer($auto['modele']); ?>

<article>
    <header>
        <h1 class="titreAuto"><?= $this->nettoyer($auto['marque']) ?> <?= $this->nettoyer($auto['modele'])?></h1>
    </header>
    <p>
        Année : <?= $this->nettoyer($auto['annee']) ?><br>
        Tarif horaire : <?= $this->nettoyer($auto['tarif_horaire']) ?>$<br>
        Tarif par jour : <?= $this->nettoyer($auto['tarif_jour']) ?>$<br>
    </p>
</article>
<hr />
<header>
    <h1 id="titreReponses">Réservation <?= $this->nettoyer($auto['marque']) ?> <?= $this->nettoyer($auto['modele']) ?> :</h1>
</header>
<?= ($reservations->rowCount() == 0) ? '<p class="message">Pas encore de reservations pour cet auto.</p>' : '' ?>
<?php
foreach ($reservations as $reservation):
    ?>
        <a href="AdminReservations/confirmer/<?= $this->nettoyer($reservation['id']) ?>" >
            [Effacer]</a><br/>
        <?= $this->nettoyer($reservation['nom_client']) ?><br/>
        <?= $this->nettoyer($reservation['adresse_client']) ?><br/> 
        <?= $this->nettoyer($reservation['telephone_client'])?><br/>
<?php endforeach; ?>



