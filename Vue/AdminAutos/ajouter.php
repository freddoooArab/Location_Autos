<?php $this->titre = "Location Autos - ajouter une auto"; ?>

<header>
    <h1 id="titreReponses">Ajouter une auto au nom de <u><?= $utilisateur ?></u> :</h1>
</header>
<form action="Adminautos/nouvelAuto" method="post">
    <h2>Ajouter une auto</h2>
    <p>
        <label for="marque">Marque de la voiture</label> : <input type="text" name="marque" id="marque" /> <br />
        <label for="modele">Modèle de la voiture</label> :  <input type="text" name="modele" id="modele" /><br />
        <label for="annee">Année de la voiture</label> :  <input type="date" name="annee" id="annee" /><br />
        <label for="tarif_horaire">Tarif horaire</label> : <input type="number" min="10" name="tarif_horaire" id="tarif_horaire" /> <br />
        <label for="tarif_jour">Tarif Journalier</label> : <input type="number" min="10" name="tarif_jour" id="tarif_jour" /> <br />
        <input type="hidden" name="reservee" value="0" /><br />
        <input type="hidden" name="utilisateur_id" value="<?= $idUtilisateur ?>" />
        <input type="submit" value="Envoyer" />
    </p>
</form>


