<?php $this->titre = "Location Autos - " . $this->nettoyer($auto['marque']); ?>

<header>
    <h1 id="titreReponses">Modifier l'auto <?= $this->nettoyer($auto['marque']) ?> :</h1>
</header>
<h2>Modifier les tarifs d'une auto</h2>
<form action="Adminautos/miseAJour" method="post">
        <label for="marque">Marque</label> : <input readonly type="text" value="<?= $this->nettoyer($auto['marque']) ?>"  name="marque" id="marque"/><br/>
        <label for="modele">Modèle</label> : <input readonly type="text" value="<?= $this->nettoyer($auto['modele']) ?>"  name="modele" id="modele"/><br/>
        <label for="tarif_horaire">Tarif horaire</label> : <input type="number" min="10" name="tarif_horaire" id="tarif_horaire" /> <br />
        <label for="tarif_jour">Tarif Journalier</label> : <input type="number" min="10" name="tarif_jour" id="tarif_jour" /> <br />
        <label type="hidden" for="id"></label><input type="hidden" name="id" id="id" value="<?= $this->nettoyer($auto['id']) ?>" /><br />
        <input type="submit" value="Modifier" />
</form>


