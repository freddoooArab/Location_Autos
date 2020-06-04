<?php $this->titre = "Le Blogue du prof - " . $this->nettoyer($auto['titre']); ?>

<auto>
    <header>
        <h1 class="titreAuto"><?= $this->nettoyer($auto['titre']) ?></h1>
        <time><?= $this->nettoyer($auto['date']) ?></time>, par <?= $this->nettoyer($auto['nom']) ?>
        <h3 class=""><?= $this->nettoyer($auto['sous_titre']) ?></h3>
    </header>
    <p><?= $this->nettoyer($auto['texte']) ?></p>
    <p><?= $this->nettoyer($auto['type']) ?></p>
</auto>
<hr />
<header>
    <h1 id="titreReponses">Réponses à <?= $this->nettoyer($auto['titre']) ?> :</h1>
</header>
<?= ($reservations->rowCount() == 0) ? '<p class="message">Pas encore de reservations pour cet auto.</p>' : '' ?>
<?php
foreach ($reservations as $reservation):
    ?>
        <p>
            <?= $this->nettoyer($reservation['date']) ?>, <?= $this->nettoyer($reservation['auteur']) ?> dit :<br/>
            <strong><?= $this->nettoyer($reservation['titre']) ?></strong><br/>
            <?= $this->nettoyer($reservation['texte']) ?>
        </p>
<?php endforeach; ?>

<form action="Reservations/ajouter" method="post">
    <h2>Ajouter un reservation</h2>
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


