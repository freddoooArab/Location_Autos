<?php $this->titre = "Location Autos - " . $this->nettoyer($auto['marque']); ?>

<article>
    <header>
        <h1 class="titreAuto"><?= $this->nettoyer($auto['marque']) ?> <?= $this->nettoyer($auto['modele']) ?></h1>
    </header>
    <p>Année : <?= $this->nettoyer($auto['annee']) ?><br/>
       Tarif horaire : <?= $this->nettoyer($auto['tarif_horaire']) ?>$<br/>
       Tarif par jour : <?= $this->nettoyer($auto['tarif_jour']) ?>$<br/>
    </p>
</article>
<hr />
<header>
    <h1 id="titreReponses">Réservation de <?= $this->nettoyer($auto['marque']) ?> <?= $this->nettoyer($auto['modele']) ?></h1>
</header>
<?= ($reservations->rowCount() == 0) ? '<p class="message">Pas encore de reservations pour cette auto.</p>' : '' ?>
<?php
foreach ($reservations as $reservation):
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
        </p>
<?php endforeach; ?>

<?php if($reservations->rowCount()== 0) : ?>
        <h2>Faire une reservation</h2>
<form action="Reservations/ajouter" method="post">
    <p>
        <label for="nom_client">Votre nom complet</label> :  <input type="text" name="nom_client" id="nom_client" /><br />
        <label for="adresse_client">Votre adresse</label> :  <input type="text" name="adresse_client" id="adresse_client" /><br />
        <label for="telephone_client">Votre numéro de téléphone</label> :  <input type="text" name="telephone_client" id="telephone_client" /><br />
        <input type="radio" id="horaire" name="type_reservation" value="0" checked=unchecked>
        <label for="type">Location par heure :</label>
        <input type="radio" id="jour" name="type_reservation" value="1" checked=checked>
        <label for="type">Location par jour :</label><br />
         <label for="temps_desire">Temps désiré en heures ou jours</label> :  <input type="text" name="temps_desire" id="temps_desire" /><br />
        <input type="hidden" name="auto_id" value="<?= $this->nettoyer($auto['id']) ?>" /><br />
        <input type="submit" value="Envoyer" />
    </p>
</form>
<?php else : ?>    
        <hr/>
        <h3>Temps restant à la location : </h3>
        <!--Mettre le compteur de temps restant sur la location.-->
<?php endif; ?>



