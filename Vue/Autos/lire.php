<?php $this->titre = "Location Autos - " . $this->nettoyer($auto['marque']); ?>

<article>
    <header>
        <h1 class="titreAuto"><?= $this->nettoyer($auto['marque']) ?> <?= $this->nettoyer($auto['modele']) ?></h1>
    </header>
    <p>Année : <?= $this->nettoyer($auto['annee']) ?></p>
    <p>Tarif horaire : <?= $this->nettoyer($auto['tarif_horaire']) ?>$</p>
    <p>Tarif par jour : <?= $this->nettoyer($auto['tarif_jour']) ?>$</p>
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
            Type de réservation : <?= $this->nettoyer($reservation['type_reservation']) ?><br/>
            Durée de la réservation : <?= $this->nettoyer($reservation['temps_desire']) ?><br/>
        </p>
<?php endforeach; ?>

<?php if($reservations->rowCount()== 0) : ?>
<form action="Reservations/ajouter" method="post">
    <h2>Faire un reservation</h2>
    <p>
        <label for="auteur">Courriel de l'auteur (xxx@yyy.zz)</label> : <input type="text" name="auteur" id="auteur" /> 
        <?= ($erreur == 'courriel') ? '<span style="color : red;">Entrez un courriel valide s.v.p.</span>' : '' ?> 
        <br />
        <label for="texte">Titre</label> :  <input type="text" name="titre" id="titre" /><br />
        <label for="texte">Reservation</label> :  <textarea type="text" name="texte" id="texte" >Écrivez votre reservation ici</textarea><br />
        <label for="prive">Privé?</label><input type="checkbox" name="prive" />
        <input type="hidden" name="auto_id" value="<?= $this->nettoyer($auto['id']) ?>" /><br />
        <input type="submit" value="Envoyer" />
    </p>
</form>
<?php else : ?>    
        <hr/>
        <h3>Temps restant à la location : </h3>
        <!--Mettre le compteur de temps restant sur la location.-->
<?php endif; ?>



