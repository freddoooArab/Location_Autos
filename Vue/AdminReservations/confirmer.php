<?php $this->titre = "Effacer - " . $this->nettoyer($reservation['nom_client']); ?>

<article>
    <header>
        <p><h1>
            Effacer?
        </h1>
        <?= $this->nettoyer($reservation['nom_client']) ?><br/>
        <?= $this->nettoyer($reservation['adresse_client']) ?><br/> 
        <?= $this->nettoyer($reservation['telephone_client'])?><br/>
        </p>
    </header>
</article>

<form action="AdminReservations/supprimer" method="post">
    <input type="hidden" name="id" value="<?= $this->nettoyer($reservation['id']) ?>" /><br />
    <input type="submit" value="Oui" />
</form>
<form action="Adminautos/lire" method="post" >
    <input type="hidden" name="id" value="<?= $this->nettoyer($reservation['auto_id']) ?>" />
    <input type="submit" value="Annuler" />
</form>


